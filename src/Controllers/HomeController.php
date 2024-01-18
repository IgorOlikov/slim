<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class HomeController extends BaseController
{
    public function index(Request $request,Response $response)
    {
       $queryBuilder = $this->connection->getQueryBuilder();

        $queryBuilder->select('*')->from('posts');

        $result  = $queryBuilder->executeQuery()->fetchAssociative();

        $response->getBody()->write(json_encode($result));
        //$twig->render();//
        return $response;


    }


}