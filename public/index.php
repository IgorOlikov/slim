<?php

use App\Controllers\HomeController;
use DI\Bridge\Slim\Bridge;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;


$container = require '../src/Container/bootstrap.php';



$twig = Twig::create(__DIR__ . '/../src/Templates',['cache' => false]);



$app = Bridge::create($container);

$app->add(TwigMiddleware::create($app,$twig));

//dd($app);


$app->get('/home',[HomeController::class,'index']);


$app->get('/', function (Request $request, Response $response, \App\Database\DatabaseConnection $connection) {

    $view = Twig::fromRequest($request);


   $queryBuilder = $connection->getQueryBuilder();

   $queryBuilder->select('*')->from('posts');
   $result  = $queryBuilder->executeQuery()->fetchAssociative();

    return $view->render($response,'test.html',['title' => $result['title']]);
    //$response->getBody()->write(json_encode($result));
    //return $response;
});



$app->run();
