<?php

namespace Classes;

class Db
{
    /**
     * @var \PDO
     */
    private $connection = null;

    /**
     * @var Db|null
     */
    private static $instance = null;

    /**
     * Db constructor.
     * @param string $db
     * @param string $host
     * @param string $port
     * @param string $driver
     * @param string $username
     * @param string $psw
     */
    private function __construct(string $db, string $host, string $port, string $driver, string $username, string $psw)
    {
        $dsn = $driver . ':dbname=' . $db . ';host=' . $host . ':'.$port;
        $this->connection = new \PDO($dsn, $username, $psw);
        self::$instance = $this;
    }

    /**
     * @param string $db
     * @param string $host
     * @param string $port
     * @param string $driver
     * @param string $username
     * @param string $psw
     * @return static
     */
    public static function instance(string $db = '', string $host = '', string $port = '', string $driver = '', string $username = '', string $psw = ''): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($db, $host, $port, $driver, $username, $psw);
        }

        return self::$instance;
     }

    /**
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        return $this->connection;
    }

}