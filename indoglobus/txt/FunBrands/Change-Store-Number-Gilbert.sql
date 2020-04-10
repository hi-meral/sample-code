
-- [[OLD_ID]] = 1101
-- [[NEW_ID]] = 2101
-- [[NEW_NO]] = 2101
-- [[STORE_NAME]] = Gilbert


ALTER TABLE inquiry_sort_options
DROP CONSTRAINT inquiry_sort_options_store_id_fkey,
ADD CONSTRAINT inquiry_sort_options_store_id_fkey
  FOREIGN KEY (store_id)
  REFERENCES stores(store_id)
  ON UPDATE CASCADE;
  
-----------------------------------------------------------------------------------------------------------------

--in vmsms2_prod database
ALTER TABLE events DISABLE TRIGGER tr_history_log_events;
ALTER TABLE event_types DISABLE TRIGGER tr_history_log_event_types;

begin transaction;


--update inquiry_sort_options set store_id = 302101 where store_id = 1101;

-- OLD, NEW, LEGAL,OWNER, STAFFID
select renumber_store(1101, 2101, 'Golob Corporation Inc', 'Joe Golob', 'mmaradia');

update tbl_callcenter_store_info set store_id = 2101 where store_id = 1101;

rollback;
commit;

-- enable the trigger after the commit
ALTER TABLE events ENABLE TRIGGER tr_history_log_events;
ALTER TABLE event_types ENABLE TRIGGER tr_history_log_event_types;

begin transaction;

update stores set mgr_email = 'joe_golob@yahoo.com', owner_first = 'Joe', owner_last = 'Golob' where store_id = 2101;

rollback;
commit;

-----------------------------------------------------------------------------------------------------------------

--in piucms database

begin transaction;

select renumber_store(1101, 2101, 'mmaradia');

rollback;
commit;

--flush pumpitupparty.com or bounceu.com wordpress page cache


-----------------------------------------------------------------------------------------------------------------

-- THESE RECORDS ARE NOT FOUND

--On production iis/sql server
--use ois2
select * from store where LocationName like '%gilbert%';

begin transaction;

update store set StoreReferenceNumber = 2101 where id = [[GET_FROM_ABOVE]];

rollback;
commit;

--use PumpItUp;
select * from Store where LocationName like '%gilbert%';

begin transaction;

update store set StoreReferenceNumber = 2101 where storeid = [[GET_FROM_ABOVE]];

rollback;
commit;

-----------------------------------------------------------------------------------------------------------------


-- Make sure there is no queued confirmation letter jobs with old store id in the Pheanstalk queue


-----------------------------------------------------------------------------------------------------------------


--RENUMBER CACTUS:

-- [[NEW_ID]] = 2101
-- [[OLD_ID]] = 1101


-- IMPORTANT: FIRST RUN SYNC BY NEW STORE FROM VMSMS OR CREATE NEW STORE IN CACTUS
 insert into locations (id, organization_id, location_id, name, from_emails, updated_by, created_at, updated_at, display_name, address, city, state, zip, phone, email, url, division, division_id)
 select '2-2101', organization_id, '1101', name, from_emails, updated_by, created_at, updated_at, display_name, address, city, state, zip, phone, email, url, division, division_id
 from locations
 where id = '2-1101';

select * from locations where id in ('2-2101', '2-1101');

-- ** CAN'T FIND ANYTHING UNDER BROADCAST
select * from broadcasts where owner_id = '2-2101';
select * from broadcasts where owner_id = '2-1101';

select count(*) from recipients where location_id = '2101';
select count(*) from recipients where location_id = '1101';


begin transaction;

update templates set owner_id = '2-2101' where owner_id = '2-1101' and resource_owner_id = 70 and organization_id = '2';
update templates_history_log set owner_id = '2-2101' where owner_id = '2-1101' and resource_owner_id = 70 and organization_id = '2';

update broadcasts set owner_id = '2-2101' where owner_id = '2-1101' and resource_owner_id = 70 and organization_id = '2';
update broadcasts_history_log set owner_id = '2-2101' where owner_id = '2-1101' and organization_id = '2';

update folders set owner_id = '2-2101' where owner_id = '2-1101' and resource_owner_id = 70 and organization_id = '2';

update files set owner_id = '2-2101' where owner_id = '2-1101' and resource_owner_id = 70 and organization_id = '2';

update recipients set location_id = '2101' where location_id = '1101' and organization_id = '2';
update recipients_query_log set location_id = '2101' where location_id = '1101' and organization_id = '2';

update resource_locations set location_id = '2-2101' where location_id = '2-1101';
update resource_locations_history_log set location_id = '2-2101' where location_id = '2-1101';

update user_locations set location_id = '2-2101' where location_id = '2-1101';
update user_locations_history_log set location_id = '2-2101' where location_id = '2-1101';

update cancelled_subscription_locations set location_id = '2-2101' where location_id = '2-1101';

update locations_history_log set id = '2-2101', location_id = '2101' where id = '2-1101' and organization_id = '2';

delete from locations where id = '2-1101' and organization_id = '2';


rollback transaction ;

commit transaction;