<?php

require_once '../boot.php';

function runApp(string $uri)
{
    switch ($uri) {
        case '/dbs/foo/tables/source/csv':
            echo 'csv';
            break;
        case '/dbs/foo/tables/source/json':
            echo 'json';
            break;
        default:
            throw new Exception('route not found');
    }
}

try {
    runApp($_SERVER['REQUEST_URI']);
} catch (\Throwable $exception) {
    echo $exception->getMessage();
}