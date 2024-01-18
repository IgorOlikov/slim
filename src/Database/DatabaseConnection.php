<?php

namespace App\Database;

use Doctrine\DBAL\DriverManager as DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Query\QueryBuilder;

class DatabaseConnection
{
    public $queryBuilder;
    private $conn;
    private $connectionParams;

    /**
     * @throws Exception
     */
    public function __construct(DatabaseConfig $config)
    {
        $this->connectionParams = $config->getDbConfig();

        $this->conn = DriverManager::getConnection($this->connectionParams);

        $this->queryBuilder = $this->conn->createQueryBuilder();
    }



}