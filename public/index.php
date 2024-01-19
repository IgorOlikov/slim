<?php

use App\Controllers\HomeController;
use DI\Bridge\Slim\Bridge;
use Slim\Views\TwigMiddleware;

$container = require '../src/Container/bootstrap.php';

$app = Bridge::create($container);

$app->add(TwigMiddleware::class);


$app->get('/',[HomeController::class,'index']);

$app->get('/json',[HomeController::class,'json']);

$app->post('/store/{id}',[HomeController::class,'store']);

$app->get('/show/{id}',[HomeController::class,'show']);

$app->put('/update/{id}',[HomeController::class,'update']);

$app->delete('/delete/{id}',[HomeController::class,'delete']);


$app->run();
