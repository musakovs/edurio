<?php

namespace Classes;

class DataRepository
{
    /**
     * @var Db
     */
    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function get(int $offset, int $limit)
    {
        return $this->db
            ->getConnection()
            ->query("select * from test order by a asc limit {$offset}, {$limit}")
            ->fetchAll(\PDO::FETCH_ASSOC);
    }
}