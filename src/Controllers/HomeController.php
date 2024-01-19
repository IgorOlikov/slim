<?php
namespace App\Controllers;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends BaseController
{
    public function index(Request $request,Response $response)
    {


        $this->queryBuilder->select('*')->from('posts');

        $result = $this->queryBuilder->executeQuery()->fetchAssociative();

        return $this->twig->render($response,'test.html',['title' => $result['title']]);

        $response->getBody()->write(json_encode($result));

        return $response;


    }


}