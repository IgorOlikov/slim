<?php

namespace App\Controllers;


use App\Database\DatabaseConnection;
use DI\Attribute\Inject;
use Doctrine\DBAL\Query\QueryBuilder;
use Slim\App;
use Slim\Views\Twig;
//"Slim\Views\Twig"

class BaseController
{

    protected App $app;
    protected Twig $twig;
    protected QueryBuilder $queryBuilder;

    public function __construct(
        DatabaseConnection $connection,
       App $app,
        Twig $twig,
    )
    {
        $this->twig = $twig;
        $this->app = $app;
        $this->queryBuilder = $connection->queryBuilder;
    }

    public function queryBuilder() : QueryBuilder
    {
        return $this->queryBuilder;
    }


}