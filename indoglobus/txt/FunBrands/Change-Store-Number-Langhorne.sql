
-- [[OLD_ID]] = 158
-- [[NEW_ID]] = 1158
-- [[NEW_NO]] = 1231
-- [[STORE_NAME]] = Langhorne


-----------------------------------------------------------------------------------------------------------------

--in vmsms2_prod database
ALTER TABLE events DISABLE TRIGGER tr_history_log_events;
ALTER TABLE event_types DISABLE TRIGGER tr_history_log_event_types;

begin transaction;

update tbl_callcenter_store_info set store_id = 1158 where store_id = 158;

-- OLD, NEW, LEGAL,OWNER, STAFFID
select renumber_store(158, 1158, 'Fun Brands', 'Fun Brands', 'mmaradia');

rollback;
commit;

-- enable the trigger after the commit
ALTER TABLE events ENABLE TRIGGER tr_history_log_events;
ALTER TABLE event_types ENABLE TRIGGER tr_history_log_event_types;

begin transaction;

update stores set mgr_email = 'reporting@fun-brands.com', owner_first = 'Fun',
owner_last = 'Brands' where store_id = 1158;

update addresses set email = 'reporting@fun-brands.com' where address_id = 360342;

select * from payment_types where store_id = 158;

-- ** NOT SURE WHAT TO SET HERE
-- update payment_types set gateway_user = 'ventura2', gateway_pass = 'wwHTak92+AL<' where type_id in (994,995,996);


rollback;
commit;

-----------------------------------------------------------------------------------------------------------------

--in piucms database

begin transaction;

select renumber_store(158, 1158, 'mmaradia');

rollback;
commit;

--flush pumpitupparty.com or bounceu.com wordpress page cache


-----------------------------------------------------------------------------------------------------------------

-- ** KEPT THIS COMMENTED BECAUSE COULD NOT FIND "Langhorne" ON IIS 

/*
--On production iis/sql server
use ois2
select * from store where LocationName like '%Langhorne%';

begin transaction;

update store set StoreReferenceNumber = 1158 where id = [[GET_FROM_ABOVE]];

rollback;
commit;

use PumpItUp;
select * from Store where LocationName like '%Langhorne%';

begin transaction;

update store set StoreReferenceNumber = 1158 where storeid = [[GET_FROM_ABOVE]];

rollback;
commit;
*/
-----------------------------------------------------------------------------------------------------------------


-- Make sure there is no queued confirmation letter jobs with old store id in the Pheanstalk queue


-----------------------------------------------------------------------------------------------------------------


--RENUMBER CACTUS:

-- [[NEW_ID]] =
-- [[OLD_ID]] =

-- IMPORTANT: FIRST RUN SYNC BY NEW STORE FROM VMSMS OR CREATE NEW STORE IN CACTUS
 insert into locations (id, organization_id, location_id, name, from_emails, updated_by, created_at, updated_at, display_name, address, city, state, zip, phone, email, url, division, division_id)
 select '2-1158', organization_id, '158', name, from_emails, updated_by, created_at, updated_at, display_name, address, city, state, zip, phone, email, url, division, division_id
 from locations
 where id = '2-158';


select * from locations where id in ('2-1158', '2-158');

-- ** CAN'T FIND ANYTHING UNDER BROADCAST
select * from broadcasts where owner_id = '2-1158';
select * from broadcasts where owner_id = '2-158';

select count(*) from recipients where location_id = '1158';
select count(*) from recipients where location_id = '158';


begin transaction;

update templates set owner_id = '2-1158' where owner_id = '2-158' and resource_owner_id = 70 and organization_id = '2';
update templates_history_log set owner_id = '2-1158' where owner_id = '2-158' and resource_owner_id = 70 and organization_id = '2';

update broadcasts set owner_id = '2-1158' where owner_id = '2-158' and resource_owner_id = 70 and organization_id = '2';
update broadcasts_history_log set owner_id = '2-1158' where owner_id = '2-158' and organization_id = '2';

update folders set owner_id = '2-1158' where owner_id = '2-158' and resource_owner_id = 70 and organization_id = '2';

update files set owner_id = '2-1158' where owner_id = '2-158' and resource_owner_id = 70 and organization_id = '2';

update recipients set location_id = '1158' where location_id = '158' and organization_id = '2';
update recipients_query_log set location_id = '1158' where location_id = '158' and organization_id = '2';

update resource_locations set location_id = '2-1158' where location_id = '2-158';
update resource_locations_history_log set location_id = '2-1158' where location_id = '2-158';

update user_locations set location_id = '2-1158' where location_id = '2-158';
update user_locations_history_log set location_id = '2-1158' where location_id = '2-158';

update cancelled_subscription_locations set location_id = '2-1158' where location_id = '2-158';

update locations_history_log set id = '2-1158', location_id = '1158' where id = '2-158' and organization_id = '2';

delete from locations where id = '2-158' and organization_id = '2';


rollback transaction ;

commit transaction;
