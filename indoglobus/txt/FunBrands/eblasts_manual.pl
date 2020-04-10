##
## Copyright (C) 2002 Indigo Dynamic Networks, LLC
## All Rights Reserved
##
## NOTICE:  
## All information, intellectual, and technical concepts contained
## herein are the sole property of Indigo Dynamic Networks, LLC
## and are confidential and protected by trade secret or copyright law.  
## Dissemination or reproduction of these contents is strictly forbidden 
## without prior written consent by Indigo Dynamic Networks, LLC
##

use strict;
use warnings;
use DBI;
use JSON;
use List::Util 'max';
use LWP::UserAgent;
use LWP::ConnCache;
use Time::HiRes qw(time);
use Time::localtime;
use Time::Local;
#use DateTime;

use constant BRAND_BOUNCEU => 1;
use constant BRAND_PIU => 2;
use constant BILL_METHOD_PARTY => 1;
use constant BILL_METHOD_OPEN => 2;
use constant BILL_METHOD_FIELD => 3;
use constant BILL_METHOD_CAMP => 4;
use constant BLAST_STATUS_PENDING => 2;
use constant BLAST_STATUS_ACTIVE => 3;
use constant BLAST_STATUS_COMPLETE => 4;

chdir('/srv/www/vmsms/cron/');

my $dbh = DBI->connect(
    'dbi:Pg:dbname=vmsms2_staging;host=10.0.1.144',
    'vmsms_staging', 'secret',
     #'dbi:Pg:dbname=vmsms2_staging;host=10.0.1.144',
    #'vmsms_staging', 'secret',
    { AutoCommit => 0, RaiseError => 1 });

# First, try to obtain an advisory lock.
my ($locked) = $dbh->selectrow_array("select pg_try_advisory_lock(888464,6344001)");

if (!$locked) {
    # another script is still running.... exit until next time.
    exit;
}

$dbh->do("select begin_vm_sess('system')");

#Post sendgrid commands here.
my $url = 'https://api.sendgrid.com/api/mail.send.json';

my $national_sent = 0;

#Cache our connection info
my $ua = LWP::UserAgent->new;
$ua->timeout(30);
$ua->from('support@fun-brands.com');
$ua->conn_cache(LWP::ConnCache->new());

# prepare the log insert statement.
my $insert_sth = $dbh->prepare(q{
	insert into eblasts_sent
	(blast_id, email, reason) values (?,?,'') }
);

# Get all the campaigns we need to send right now.
# (put them into an array)

my $eblasts = $dbh->selectall_arrayref(q{
    select e.*, s.timezone, b.brand_name, s.title as store_name
    from eblasts e
    left join stores s on e.store_id = s.store_id
    left join brands b on e.brand_id = b.brand_id
    left join addresses sa on s.address_id = sa.address_id
    where (e.store_id is null or (s.enabled = 1 and s.excluded = 0))
    and not e.bday_club
    and e.blast_status in (2,3)
    and e.blast_type = 2 -- manual
    and e.active_date < (now() + '10 minutes'::interval) and e.blast_id = 13939
    order by coalesce(e.store_id,0) desc},
    { Slice => { } }
);

BLAST:
foreach my $eblast (@$eblasts) {
    #Prepare the Store ID & URL list.
    my $store_mapping;
    if ($eblast->{brand_id} == 1) {
        my $stores_resp = $ua->get('https://www.bounceu.com/api/storelist.php');
        die "Unable to get store list" unless ($stores_resp->is_success);
        $store_mapping = decode_json $stores_resp->content;
    } elsif ($eblast->{brand_id} == 2) {
        my $stores_resp = $ua->get('https://www.pumpitupparty.com/api/storelist.php');
        die "Unable to get store list" unless ($stores_resp->is_success);
        $store_mapping = decode_json $stores_resp->content;
    }
    if ($eblast->{timezone}) {
        #set the timezone to match the store, just in case.
        $dbh->do(" SET TIMEZONE TO ? ", undef, $eblast->{timezone});
    }

    if ($eblast->{blast_status} == BLAST_STATUS_PENDING) {
        # If status=2 (pending) set to 3 (sending)
        $dbh->do("update eblasts set blast_status=3 where blast_id=?",
            undef, $eblast->{blast_id});

        $dbh->commit;
    }
    #To fetch Store address
    my $add_sql = '';
    my (@store_address, @store_city, @store_state, @store_zip, @store_phone, @store_urls, @store_email);
    if (toint($eblast->{store_id}) > 0) {
        my $add_row;
        my $add_sql = qq{select s.store_id,s.brand_id,s.address_id,
                     ad.address1,ad.address2, initcap(ad.city) as city,ad.state,ad.zip,ad.phone,
                     CASE s.brand_id WHEN 1 THEN coalesce(nullif(ad.email, ''), 'birthdays\@bounceufun.com')
                                     WHEN 2 THEN coalesce(nullif(ad.email, ''), 'pumpitup\@pumpitupfun.com')
                                     WHEN 3 THEN coalesce(nullif(ad.email, ''), 'pumpitup\@pumpitupfun.com')
                     END as email
                     from stores s
                     join addresses ad on s.address_id = ad.address_id
                    where s.store_id = ?};
        my $add_sth = $dbh->prepare($add_sql);
        $add_sth->execute($eblast->{store_id});
        while ($add_row = $add_sth->fetchrow_hashref) {
            # retrieve one row
            push (@store_address, $add_row->{address1}.($add_row->{address2} ? " ".$add_row->{address2} : "") );
            push (@store_city, $add_row->{city});
            push (@store_state, $add_row->{state});
            push (@store_zip, $add_row->{zip});
            push (@store_phone, $add_row->{phone});
            push (@store_urls, $store_mapping->{$add_row->{store_id}});
            push (@store_email, $add_row->{email});
        }

    }

    #end of address information

    my $criteria = decode_json $eblast->{criteria};
    my $trigger_type = $criteria->{trigger_type};

    my $sql = '';
    my @params = ($eblast->{blast_id}, $eblast->{brand_id});

    # For each campaign, query the database for a target list.
    if ($trigger_type eq 'all_cust') {
        $sql = qq{
        select distinct on (src.email)
        src.email, src.first_name, src.last_name
        from all_customers_v src
        left join eblasts_sent es
            on es.email = src.email
            and es.blast_id = ?
        where es.email is null
        and src.brand_id = ?
    };

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and src.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }
    }

    if ($trigger_type eq 'futr_bd') {
        $sql = qq{
			select distinct on (src.email)
			src.email, src.first_name, src.last_name,
			src.child_first, src.child_last, src.birthday,
			to_char(birth_date, 'FMMonth FMDDth') as birth_date
			from all_customers_v src
			left join eblasts_sent es
				on es.email = src.email
				and es.blast_id = ?
			where es.email is null
			and src.brand_id = ?
			and src.birth_date is not null
		};

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and src.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }

        if (toint($criteria->{futr_bd_min}) > 0) {
            $sql .= " and next_date(src.birth_date) >= (current_date + ?::integer) ";
            push (@params, toint($criteria->{futr_bd_min}));
        }

        if (toint($criteria->{futr_bd_max}) > 0) {
            $sql .= " and next_date(src.birth_date) <= (current_date + ?::integer) ";
            push (@params, toint($criteria->{futr_bd_max}));
        }
    }

    if ($trigger_type eq 'exc_futr_bd') {
        $sql = qq{
			select distinct on (src.email)
			src.email, src.first_name, src.last_name,
			src.child_first, src.child_last, src.birthday,
			to_char(next_date(src.birth_date), 'yyyy-mm-dd') as next_bday,
			to_char(src.birth_date, 'FMMonth FMDDth') as birth_date
			from all_customers_v src
			left join eblasts_sent es
				on es.email = src.email
				and es.blast_id = ?
			where es.email is null
			and src.brand_id = ?
		};

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and src.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }

        $sql .= " and ( next_date(src.birth_date) < (current_date + ?::integer) ";
        push (@params, toint($criteria->{exc_futr_bd_min}) >= 0 ? toint($criteria->{exc_futr_bd_min}) : 0);

        $sql .= " OR next_date(src.birth_date) > (current_date + ?::integer) ) ";
        push (@params, toint($criteria->{exc_futr_bd_max}) >= 0 ? toint($criteria->{exc_futr_bd_max}) : 366);
    }

    if ($trigger_type eq 'days_bf_booked') {
        $sql = qq{
			select distinct on (src.email)
			src.email, src.first_name, src.last_name, src.event_id, src.encrypted_id,
			src.child_first, src.child_last, src.birth_date
			from days_before_booked_v src
			left join eblasts_sent es
				on es.email = src.email
				and es.reason = src.event_id::varchar
				and es.blast_id = ?
			where es.email is null
			and src.brand_id = ?
			and src.method_id = 1
		};

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and src.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }

        if (toint($criteria->{no_of_days_bf_booked_min}) > 0) {
            $sql .= " and src.no_of_days_bf_booked >= ? ";
            push (@params, toint($criteria->{no_of_days_bf_booked_min}));
        }

        if (toint($criteria->{no_of_days_bf_booked_max}) > 0) {
            $sql .= " and src.no_of_days_bf_booked <= ? ";
            push (@params, toint($criteria->{no_of_days_bf_booked_max}));
        }

        if ($criteria->{incl_oo_party_next} && $criteria->{incl_oo_party_next} != 1) {
            $sql .= " AND src.optout = ? ";
            push (@params, 0);
        }

    }

    if ($trigger_type eq 'days_after_booked') {
        $sql = qq{
            select distinct on (src.email)
            src.email, src.first_name, src.last_name, src.event_id, src.encrypted_id,
            src.child_first, src.child_last, src.birth_date
            from days_after_booked_v src
            left join eblasts_sent es
                on es.email = src.email
                and es.reason = src.event_id::varchar
                and es.blast_id = ?
            where es.email is null
            and src.brand_id = ?
            and src.method_id = 1
        };

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and src.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }

        if (toint($criteria->{no_of_days_after_booked}) > 0) {
            $sql .= " and src.no_of_days_after_booked >= ? ";
            push (@params, toint(0));

            $sql .= " and src.no_of_days_after_booked <= ? ";
            push (@params, toint($criteria->{no_of_days_after_booked}));
        }

        if ($criteria->{incl_oo_booked_party} && $criteria->{incl_oo_booked_party} != 1) {
            $sql .= " AND src.optout = ? ";
            push (@params, 0);
        }

    }
    if ($trigger_type eq 'abandoned_booking') {
    my @params2=();
         $sql = qq{
            select distinct (src.email) from(
            select  b.brand_id, d.email,c.birth_date
            from inquiries a, stores b, customers c, addresses d, inquiry_statuses e, inquiry_methods x
            where a.store_id = b.store_id
            and a.customer_id = c.customer_id
            and c.address_id = d.address_id
            and a.status_id = e.status_id
            and a.method_id = x.method_id
            and e.status_name <> 'Booked'
            and a.create_date >= (current_date - (?::integer ))
            and a.create_date <= (current_date - (?::integer ))
         };
         push(@params2, toint($criteria->{no_days_abandoned_booking_max}) >= 0 ? toint($criteria->{no_days_abandoned_booking_max}) : 30);
         push (@params2, toint($criteria->{no_days_abandoned_booking_min}) >= 0 ? toint($criteria->{no_days_abandoned_booking_min}) : 0);

         if (toint($eblast->{store_id}) > 0) {
            $sql .= " and a.store_id = ?::integer ) src ";
         push(@params2, toint($eblast->{store_id}));
        }
        $sql .= " left join eblasts_sent es on es.email = src.email and es.blast_id = ? where es.email is null  and src.brand_id= ?::integer";
        unshift(@params,@params2)
     }

    if ($trigger_type eq 'hosted_bd') {
        $sql = qq{
			select distinct on (src.email)
			src.email, src.first_name, src.last_name
			from past_hosts_v src
			left join eblasts_sent es
				on es.email = src.email
				and es.blast_id = ?
			where es.email is null
			and src.brand_id = ?
			and src.method_id = 1
		};

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and src.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }

        if (toint($criteria->{hosted_bd_min}) > 0) {
            $sql .= " and src.start_date < (current_date - ?::integer + 1) ";
            push (@params, toint($criteria->{hosted_bd_min}));
        }

        if (toint($criteria->{hosted_bd_max}) > 0) {
            $sql .= " and src.start_date > (current_date - ?::integer) ";
            push (@params, toint($criteria->{hosted_bd_max}));
        }
    }

    if ($trigger_type eq 'hosted_ft') {
        $sql = qq{
			select distinct on (src.email)
			src.email, src.first_name, src.last_name
			from past_hosts_v src
			left join eblasts_sent es
				on es.email = src.email
				and es.blast_id = ?
			where es.email is null
			and src.brand_id = ?
			and src.method_id = 3
		};

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and src.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }

        if (toint($criteria->{hosted_ft_min}) > 0) {
            $sql .= " and src.start_date < (current_date - ?::integer + 1) ";
            push (@params, toint($criteria->{hosted_ft_min}));
        }

        if (toint($criteria->{hosted_ft_max}) > 0) {
            $sql .= " and src.start_date > (current_date - ?::integer) ";
            push (@params, toint($criteria->{hosted_ft_max}));
        }
    }

    if ($trigger_type eq 'attended') {
        my @extypes;
        if ($criteria->{incl_bd}) {
            push (@extypes, BILL_METHOD_PARTY);
        }
        if ($criteria->{incl_ft}) {
            push (@extypes, BILL_METHOD_FIELD);
        }
        if ($criteria->{incl_ob}) {
            push (@extypes, BILL_METHOD_OPEN);
        }
        if ($criteria->{incl_ca}) {
            push (@extypes, BILL_METHOD_CAMP);
        }

        push (@params, arraytopgarray(@extypes));

        $sql = qq{
			select distinct on (src.email)
			src.email, src.first_name, src.last_name,
			src.child_first, src.child_last
			from past_attendees_v src
			left join eblasts_sent es
				on es.email = src.email
				and es.blast_id = ?
			where es.email is null
			and src.brand_id = ?
			and src.method_id = ANY(?)
		};

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and src.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }

        if (toint($criteria->{attended_min}) > 0) {
            $sql .= " and src.start_date < (current_date - ?::integer + 1) ";
            push (@params, toint($criteria->{attended_min}));
        }

        if (toint($criteria->{attended_max}) > 0) {
            $sql .= " and src.start_date > (current_date - ?::integer) ";
            push (@params, toint($criteria->{attended_max}));
        }

    }

    if ($criteria->{req_ages} && ($criteria->{req_min_age} || $criteria->{req_max_age})) {
        if (toint($criteria->{req_min_age}) > 0) {
            $sql .= q{
				and src.birth_date is not null
				and src.birth_date <= (current_date - (?::integer * '1 year'::interval))
			};

            push (@params, toint($criteria->{req_min_age}));
        }
        if (toint($criteria->{req_max_age}) > 0) {
            $sql .= q{
				and src.birth_date is not null
				and src.birth_date >= (current_date - (?::integer * '1 year'::interval))
			};

            push (@params, toint($criteria->{req_max_age}));
        }
    }

    if ($criteria->{ex_bd_hosts} || $criteria->{ex_ft_hosts}) {
        my @extypes;
        if ($criteria->{ex_bd_hosts}) {
            push (@extypes, BILL_METHOD_PARTY);
        }
        if ($criteria->{ex_ft_hosts}) {
            push (@extypes, BILL_METHOD_FIELD);
        }

        $sql .= q{
			and src.email not in (
				select fhv.email from future_hosts_v fhv
				where fhv.method_id = ANY(?)
		};

        push (@params, arraytopgarray(@extypes));

        if (toint($eblast->{store_id}) > 0) {
            $sql .= " and fhv.store_id = ?::integer ";
            push (@params, toint($eblast->{store_id}));
        }

        $sql .= " ) "; # not in
    }

    my $sth = $dbh->prepare($sql);
    $sth->execute(@params);
    my $remain = $sth->rows;

    # For each target address, insert into eblasts_sent,
    # build data array
    # When array reaches 50 (or out of data), post to sendgrid.

    my (@to_list, @host_first, @host_last, @child_first, @child_last, @bdate, @bday, @encrypted_id, @store_address_list, @store_city_list, @store_state_list, @store_zip_list, @store_phone_list, @store_url_list, @store_email_list);

    my $time = time();
    #print "Starting time: $time, Destinations = $remain\n";

    while (my $hash_ref = $sth->fetchrow_hashref) {
        push (@to_list, $hash_ref->{email});
        push (@host_first, $hash_ref->{first_name});
        push (@host_last, $hash_ref->{last_name});
        push (@child_first, $hash_ref->{child_first});
        push (@child_last, $hash_ref->{child_last});
        push (@bdate, $hash_ref->{birth_date});
        push (@bday, $hash_ref->{birthday});
        push (@encrypted_id, $hash_ref->{encrypted_id});
        push (@store_address_list, @store_address);
        push (@store_city_list, @store_city);
        push (@store_state_list, @store_state);
        push (@store_zip_list, @store_zip);
        push (@store_phone_list, @store_phone);
        push (@store_url_list, @store_urls);
        push (@store_email_list, @store_email);

        $insert_sth->execute($eblast->{blast_id}, $hash_ref->{email});

        if (scalar(@to_list) >= 50) {
            $dbh->commit;

            sendmail($eblast,
                \@to_list,
                \@host_first,
                \@host_last,
                \@child_first,
                \@child_last,
                \@bdate,
                \@bday,
                \@encrypted_id,
                \@store_address_list,
                \@store_city_list,
                \@store_state_list,
                \@store_zip_list,
                \@store_phone_list,
                \@store_url_list,
                \@store_email_list);

            @to_list = @host_first = @host_last =
                @child_first = @child_last = @bdate = @bday = @encrypted_id =
                @store_address_list = @store_city_list = @store_state_list = @store_zip_list = @store_phone_list = @store_url_list = @store_email_list = ();

            if ((!$eblast->{store_id}) && ($national_sent >= 1500)) {
                #60-100/10min loop = 360-600 per hour, 8600-14400 per day.
                #150/10min loop = 900 per hour, 21600 per day
                #200/10min loop = 1200 per hour, 28800 per day
                #300/10min loop = 1800 per hour, 43200 per day
                #400/10min loop = 2400 per hour, 57600 per day
                #500/10min loop = 3000 per hour, 72000 per day
                #700/10min loop = 4200 per hour, 100,800 per day
                #1000/10min loop = 6000 per hour, 144,000 per day
                #1500/10min loop = 9000 per hour, 216,000 per day
                $national_sent = 0;
                next BLAST;
            }
        }
    }

    if (scalar(@to_list) > 0) {
        $dbh->commit;

        sendmail($eblast,
            \@to_list,
            \@host_first,
            \@host_last,
            \@child_first,
            \@child_last,
            \@bdate,
            \@bday,
            \@encrypted_id,
            \@store_address_list,
            \@store_city_list,
            \@store_state_list,
            \@store_zip_list,
            \@store_phone_list,
            \@store_url_list,
            \@store_email_list);

        @to_list = @host_first = @host_last =
            @child_first = @child_last = @bdate = @bday = @encrypted_id =
            @store_address_list = @store_city_list = @store_state_list = @store_zip_list = @store_phone_list = @store_url_list = @store_email_list = ();
    }

    $time = time();
    #print "Ending time: $time\n";

    # set status = 4 (completed)

    $dbh->do("update eblasts set blast_status=4 where blast_id=?",
        undef, $eblast->{blast_id});

    $dbh->commit;

    $national_sent = 0;
}

$dbh->commit;
$dbh->disconnect;

sub sendmail {
    my $blast = shift;
    my $to_list = shift;
    my $host_first = shift;
    my $host_last = shift;
    my $child_first = shift;
    my $child_last = shift;
    my $bdate = shift;
    my $bday = shift;
    my $encrypted_id = shift;
    my $store_address = shift;
    my $store_city = shift;
    my $store_state = shift;
    my $store_zip = shift;
    my $store_phone = shift;
    my $store_urls = shift;
    my $store_email = shift;

    #my @to_list = @$to_list;
    #print "Sending email to: @to_list \n";

    my $categories;
    if ($blast->{brand_id} == 2) {
        $categories = [ 'SMSeblast' ];
    }
    elsif ($blast->{brand_id} == 1) {
        $categories = [ 'VMeblast' ];
    }

    my $params = {
        to          => $to_list,
        unique_args => { blast_id => $blast->{blast_id} },
        category    => $categories,
        sub         => {
            '{cust_firstname}'  => $host_first,
            '{cust_lastname}'   => $host_last,
            '{child_firstname}' => $child_first,
            '{child_lastname}'  => $child_last,
            '{child_birthdate}' => $bdate,
            '{child_birthday}'  => $bday,
            '{encrypted_id}'    => $encrypted_id,
            '{store_address}'   => $store_address,
            '{store_city}'      => $store_city,
            '{store_state}'     => $store_state,
            '{store_zip}'       => $store_zip,
            '{store_phone}'     => $store_phone,
            '{store_url}'       => $store_urls,
            '{preheader_text}'  => $blast->{preheader_text}
        },
    };

    #	filters		=> { drop => { settings => { enable => 1 } } },

    my $json = JSON->new;
    #$json->space_before(1);
    #$json->space_after(1);
    my $xsmtp = $json->encode($params);
    #$xsmtp =~ s/(.{1,72})(\s)/$1\n   /g;

    my $fromname = $blast->{brand_name};
    if ($blast->{store_name}) {
        $fromname .= ' of '.$blast->{store_name};
    }

    # Get html content and replce todayplus nn with date +nn
    print $blast->{email_html};
        exit;

    my $html = $blast->{email_html};
    my $text = $blast->{email_text};
    my $inside;
    my %monthname = ( 1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June',
        7               => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');


    #end of token [todayplusnn] replacement

    my $data;

    if ($blast->{brand_id} == 2) {
        $data = {
            api_user    => 'piufunlocalsms',
            api_key     => 'JqT5MPUG9pR7',
            'x-smtpapi' => $xsmtp,
            to          => 'it-alerts@fun-brands.com',
            subject     => $blast->{email_subject},
            html        => $html,
            text        => $text,
            from        => 'pumpitup@pumpitupfun.com',
            fromname    => $fromname,
            replyto     => $store_email,
        };
        if (!$blast->{store_id}) {
            $data->{api_user} = 'piufunnationalsms';
            $data->{api_key} = 'LMHgzSy830LN';
        }
    }
    elsif ($blast->{brand_id} == 1) {
        $data = {
            api_user    => 'bulocal',
            api_key     => 'kzNNGt8B4JFT',
            'x-smtpapi' => $xsmtp,
            to          => 'it-alerts@fun-brands.com',
            subject     => $blast->{email_subject},
            html        => $html,
            text        => $text,
            from        => 'birthdays@bounceufun.com',
            fromname    => $fromname,
            replyto     => $store_email,
        };
        if (!$blast->{store_id}) {
            $data->{api_user} = 'bunational';
            $data->{api_key} = 'tPfbc1NodCfn';
        }
    }

    my $response = $ua->post($url, $data);
    my $sent_count = scalar(@$to_list);

    if ($response->is_success) {
        #print "Success: ", $response->decoded_content, " Sent: $sent_count\n";

        $dbh->do("select add_eblast_metrics(?, now(), ?, 0,0,0,0,0,0,0,0,0)",
            undef, $blast->{blast_id}, $sent_count);
    }
    else {
        print "Error: ", $response->status_line, "\n";
        print $response->decoded_content, "\n";
        exit;
    }

    if (!$blast->{store_id}) {
        $national_sent += $sent_count;

        #print "Sleeping for national eblast... \n";
        #sleep(20);
    }
}

sub arraytopgarray {
    my $pg = '{'.join(',', @_).'}';

    return $pg;
}
sub toint {
    my $in = shift;

    if (!defined($in)) {
        return 0;
    }

    if ($in =~ /^(\d+)$/) {
        return $1;
    }
    else {
        return 0;
    }
}
