<?php
namespace App\Controllers;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends BaseController
{
    public function index(Request $request,Response $response)
    {


        $this->queryBuilder->select('*')->from('students');

        $result = $this->queryBuilder->executeQuery()->fetchAllAssociative();

        //dd($result);

        //$result = $response->getBody()->write(json_encode($result));

        return $this->twig->render($response,'test.html.twig');
        //return $response;

    }


    public function json(Request $request, Response $response)
    {
        $this->queryBuilder->select('*')->from('students');

        $result = $this->queryBuilder->executeQuery()->fetchAllAssociative();

         $response->getBody()->write(json_encode($result));
        return $response;
    }

    public function store(Request $request,Response $response)
    {

    }
    public function show(Request $request,Response $response)
    {

    }
    public function update(Request $request,Response $response)
    {

    }

    public function delete(Request $request,Response $response)
    {

    }




}