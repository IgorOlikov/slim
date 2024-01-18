<?php

namespace App\Database;

use Doctrine\DBAL\DriverManager as DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Query\QueryBuilder;

class DatabaseConnection
{
    private $qb;
    private $conn;
    private $connectionParams;

    /**
     * @throws Exception
     */
    public function __construct(DatabaseConfig $config)
    {
        $this->connectionParams = $config->getDbConfig();

        $this->conn = DriverManager::getConnection($this->connectionParams);

        $this->qb = $this->conn->createQueryBuilder();
    }

    public function getQueryBuilder() : QueryBuilder
    {
        return $this->qb;
    }


}