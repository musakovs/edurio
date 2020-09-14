<?php

require_once 'boot.php';

$connection = \Classes\Db::instance()->getConnection();

$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

$connection->exec("
CREATE TABLE test (
        a int,
        b tinyint,
        c tinyint
    ) ENGINE=InnoDB
    ");

$connection->exec('alter table test add index search_a(a)');

$connection->exec("CREATE FUNCTION tmpInsert ()
        RETURNS INT DETERMINISTIC

    BEGIN

        DECLARE i INT;

        SET i = 1;

        label1: WHILE i <= 1000000 DO
            insert into test (a, b, c) VALUES (i, mod(i,3), mod(i,5));
                SET i = i + 1;
            END WHILE label1;

        RETURN i;

    END;");

$connection->exec('select tmpInsert()');

print_r($connection->errorInfo());