<?php

require_once 'vendor/autoload.php';
$config = require_once 'config.php';

$db = \Classes\Db::instance($config['DB_DATABASE'], $config['DB_HOST'], $config['DB_PORT'], $config['DB_DRIVER'], $config['DB_USERNAME'], $config['DB_PASSWORD']);

