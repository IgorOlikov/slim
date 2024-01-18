<?php

namespace App\Database;

class DatabaseConfig {
    private array $dbSettings;
    //private $errorSettings;

    public function __construct()
    {
        $this->dbSettings = [
            'dbname' => 'app',
            'user' => 'app',
            'password' => 'password',
            'host' => 'postgresql',
            'driver' => 'pgsql',
        ];
    }
    public function getDbConfig(): array
    {
        return $this->dbSettings;
    }

}
