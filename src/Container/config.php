<?php

use App\Database\DatabaseConfig;
use App\Database\DatabaseConnection;
use function DI\autowire;






return [
    'DatabaseConnection' => autowire(DatabaseConnection::class),
    'DatabaseConfig' => autowire(DatabaseConfig::class),
];
