<?php

use App\Controllers\HomeController;
use DI\Bridge\Slim\Bridge;
use Slim\Views\TwigMiddleware;

$container = require '../src/Container/bootstrap.php';

$app = Bridge::create($container);

$app->add(TwigMiddleware::class);


$app->get('/',[HomeController::class,'index']);




$app->run();
