<?php

use DI\ContainerBuilder;

require __DIR__ . '/../../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__. '/config.php');
$containerBuilder->addDefinitions(__DIR__. '/Twig.php');
$container = $containerBuilder->build();

return $container;