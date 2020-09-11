<?php

require_once 'boot.php';

$connection = \Classes\Db::instance()->getConnection();

$connection->query("
begin;
    CREATE TABLE test (
        a int,
        b tinyint,
        c tinyint
    ) ENGINE=InnoDB

    CREATE FUNCTION tmpInsert ()
        RETURNS INT DETERMINISTIC

    BEGIN

        DECLARE i INT;

        SET i = 1;

        label1: WHILE i <= 1000000 DO
            insert into test1 (a, b, c) VALUES (i, mod(i,3), mod(i,5));
                SET i = i + 1;
            END WHILE label1;

        RETURN i;

    END;

    select tmpInsert();

    drop function tmpInsert;
commit;
");