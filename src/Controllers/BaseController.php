<?php

namespace App\Controllers;


use App\Database\DatabaseConnection;
use DI\Attribute\Inject;
use Slim\App;
use Slim\Views\Twig;


class BaseController
{

    protected DatabaseConnection $connection;
    protected App $app;
    protected Twig $twig;

    public function __construct(
        DatabaseConnection $connection,
       App $app,

    )
    {
        $this->connection = $connection;
        $this->app = $app;
        $this->twig = $app->getContainer()->get('view');


    }


}