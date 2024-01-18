<?php

use App\Database\DatabaseConfig;
use App\Database\DatabaseConnection;
use Slim\Views\Twig;
use function DI\autowire;
use function DI\create;


return [
    'DatabaseConnection' => autowire(DatabaseConnection::class),
    'DatabaseConfig' => autowire(DatabaseConfig::class),
    //'Twig' => function(){
    //    return Twig::create(__DIR__ . '/../Templates',
    //        ['cache' => __DIR__ . '/../cache']);
    //}

];
