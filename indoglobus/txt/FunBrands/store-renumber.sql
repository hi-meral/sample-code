
-- [[OLD_ID]] = 100088
-- [[NEW_ID]] = 101088 
-- [[NEW_NO]] = 1088 
-- [[STORE_NAME]] = Shawnee


-----------------------------------------------------------------------------------------------------------------

--in vmsms2_prod database
ALTER TABLE events DISABLE TRIGGER tr_history_log_events;
ALTER TABLE event_types DISABLE TRIGGER tr_history_log_event_types;

begin transaction;

update tbl_callcenter_store_info set store_id = [[NEW_ID]] where store_id = [[OLD_ID]];

-- OLD, NEW, LEGAL,OWNER, STAFFID
select renumber_store([[OLD_ID]], [[NEW_ID]], 'Pump It Up of KC, LLC', 'Seth Freiden', 'smishra');

rollback;
commit;

-- enable the trigger after the commit
ALTER TABLE events ENABLE TRIGGER tr_history_log_events;
ALTER TABLE event_types ENABLE TRIGGER tr_history_log_event_types;

begin transaction;

update stores set mgr_email = 'sfreiden@ustoy.com', owner_first = 'Seth', 
owner_last = 'Freiden' where store_id = [[NEW_ID]];

rollback;
commit;

-----------------------------------------------------------------------------------------------------------------

--in piucms database

begin transaction;

select renumber_store([[OLD_ID]], [[NEW_ID]], 'smishra');

rollback;
commit;

--flush pumpitupparty.com or bounceu.com wordpress page cache


-----------------------------------------------------------------------------------------------------------------


--On production iis/sql server
use ois2
select * from store where LocationName like '%[[STORE_NAME]]%';

begin transaction;

update store set StoreReferenceNumber = [[NEW_ID]] where id = [[GET_FROM_ABOVE]];

rollback;
commit;

use PumpItUp;
select * from Store where LocationName like '%[[STORE_NAME]]%';

begin transaction;

update store set StoreReferenceNumber = [[NEW_NO]] where storeid = [[GET_FROM_ABOVE]];

rollback;
commit;

-----------------------------------------------------------------------------------------------------------------


-- Make sure there is no queued confirmation letter jobs with old store id in the Pheanstalk queue


-----------------------------------------------------------------------------------------------------------------


--RENUMBER CACTUS:

-- [[NEW_ID]] = 
-- [[OLD_ID]] = 

-- IMPORTANT: FIRST RUN SYNC BY NEW STORE FROM VMSMS OR CREATE NEW STORE IN CACTUS
-- insert into locations (id, organization_id, location_id, name, from_emails, updated_by, created_at, updated_at, display_name, address, city, state, zip, phone, email, url, division, division_id)
-- select '2-[[NEW_ID]]', organization_id, '[[OLD_ID]]', name, from_emails, updated_by, created_at, updated_at, display_name, address, city, state, zip, phone, email, url, division, division_id
-- from locations
-- where id = '2-[[OLD_ID]]';


select * from locations where id in ('2-[[NEW_ID]]', '2-[[OLD_ID]]');

select * from broadcasts where owner_id = '2-[[NEW_ID]]';
select * from broadcasts where owner_id = '2-[[OLD_ID]]';

select count(*) from recipients where location_id = '[[NEW_ID]]';
select count(*) from recipients where location_id = '[[OLD_ID]]';


begin transaction;

update templates set owner_id = '2-[[NEW_ID]]' where owner_id = '2-[[OLD_ID]]' and resource_owner_id = 70 and organization_id = '2';
update templates_history_log set owner_id = '2-[[NEW_ID]]' where owner_id = '2-[[OLD_ID]]' and resource_owner_id = 70 and organization_id = '2';

update broadcasts set owner_id = '2-[[NEW_ID]]' where owner_id = '2-[[OLD_ID]]' and resource_owner_id = 70 and organization_id = '2';
update broadcasts_history_log set owner_id = '2-[[NEW_ID]]' where owner_id = '2-[[OLD_ID]]' and organization_id = '2';

update folders set owner_id = '2-[[NEW_ID]]' where owner_id = '2-[[OLD_ID]]' and resource_owner_id = 70 and organization_id = '2';

update files set owner_id = '2-[[NEW_ID]]' where owner_id = '2-[[OLD_ID]]' and resource_owner_id = 70 and organization_id = '2';

update recipients set location_id = '[[NEW_ID]]' where location_id = '[[OLD_ID]]' and organization_id = '2';
update recipients_query_log set location_id = '[[NEW_ID]]' where location_id = '[[OLD_ID]]' and organization_id = '2';

update resource_locations set location_id = '2-[[NEW_ID]]' where location_id = '2-[[OLD_ID]]';
update resource_locations_history_log set location_id = '2-[[NEW_ID]]' where location_id = '2-[[OLD_ID]]';

update user_locations set location_id = '2-[[NEW_ID]]' where location_id = '2-[[OLD_ID]]';
update user_locations_history_log set location_id = '2-[[NEW_ID]]' where location_id = '2-[[OLD_ID]]';

update cancelled_subscription_locations set location_id = '2-[[NEW_ID]]' where location_id = '2-[[OLD_ID]]';

update locations_history_log set id = '2-[[NEW_ID]]', location_id = '[[NEW_ID]]' where id = '2-[[OLD_ID]]' and organization_id = '2';

delete from locations where id = '2-[[OLD_ID]]' and organization_id = '2';


rollback transaction ;

commit transaction;
