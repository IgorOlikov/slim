<?php

namespace App\Controllers;

use App\Database\DatabaseConnection;
use Slim\Views\Twig;

class BaseController
{

    protected DatabaseConnection $connection;
    //protected Twig $twig;

    public function __construct(
        DatabaseConnection $connection,
       //Twig $twig
       // Twig $twig,
    )
    {
        $this->connection = $connection;
        //$this->twig = $twig;
    }


}