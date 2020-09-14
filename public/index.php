<?php

require_once '../boot.php';

/**
 * @param string $uri
 * @return mixed|void
 * @throws Exception
 */
function runApp(string $uri)
{
    switch (explode('?', $uri)[0]) {
        case '/dbs/foo/tables/source/csv':
            $class = \Classes\CsvDownloader::class;
            break;
        case '/dbs/foo/tables/source/json':
            $class = \Classes\JsonDownloader::class;
            break;
        default:
            throw new Exception('route not found');
    }

    return (new $class())->download(new \Classes\DataRepository(\Classes\Db::instance()), $_GET);
}

try {
    runApp($_SERVER['REQUEST_URI']);
} catch (\Throwable $exception) {
    echo $exception->getMessage();
}