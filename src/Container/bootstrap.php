<?php

use DI\ContainerBuilder;

require __DIR__ . '/../../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__. '/config.php');
$containerBuilder->addDefinitions(__DIR__ . '/twig.php');
//$containerBuilder->addDefinitions(__DIR__. '/middleware.php');
$container = $containerBuilder->build();

return $container;