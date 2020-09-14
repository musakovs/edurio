<?php

namespace Classes;

class DataRepository
{
    /**
     * @var Db
     */
    private $db;

    /**
     * DataRepository constructor.
     * @param Db $db
     */
    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function get(int $offset, int $limit)
    {
        return $this->db
            ->getConnection()
            ->query("select * from test order by a asc limit {$offset}, {$limit}")
            ->fetchAll(\PDO::FETCH_ASSOC);
    }
}