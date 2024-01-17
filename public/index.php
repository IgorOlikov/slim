<?php

use App\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;
use Slim\Views\Twig;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();

$container->set('Twig', Twig::class);

AppFactory::setContainer($container);


$app = AppFactory::create();


//dd($app->getContainer());


$app->get('/', function (Request $request, Response $response, $args,Twig $twig) {
    $response->getBody()->write("Hello world!");
    //$twig->render();//
    return $response;
});

$app->get('/home',[HomeController::class,'index']);



$app->run();
