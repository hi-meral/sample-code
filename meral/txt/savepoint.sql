SELECT @@autocommit;

SET autocommit=0;

SET autocommit=1;

SAVEPOINT identifier;

ROLLBACK TO identifier;

COMMIT;
