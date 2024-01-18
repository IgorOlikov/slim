<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;


return [
       // /app/src/Templates
    'view' => function(){
        return Twig::create('/app/src/Templates',['cache => false']);
        },
        TwigMiddleware::class => function (ContainerInterface $container){
            return TwigMiddleware::createFromContainer($container->get(App::class));
    },
];