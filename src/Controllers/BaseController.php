<?php

namespace App\Controllers;


use App\Database\DatabaseConnection;
use DI\Attribute\Inject;
use Doctrine\DBAL\Query\QueryBuilder;
use Slim\App;
use Slim\Views\Twig;


class BaseController
{


    protected App $app;
    protected Twig $twig;
    protected QueryBuilder $queryBuilder;

    public function __construct(
        DatabaseConnection $connection,
       App $app,

    )
    {
        $this->app = $app;
        $this->twig = $app->getContainer()->get('view');
        $this->queryBuilder = $connection->queryBuilder;
    }

    public function queryBuilder() : QueryBuilder
    {
        return $this->queryBuilder;
    }


}