<?php
namespace App\Controllers;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends BaseController
{
    public function index(Request $request,Response $response)
    {
        return $this->twig->render($response,'test.html.twig');
    }

    public function studentsCount(Request $request, Response $response)
    {
        $this->queryBuilder->select('*')->from('students');

        $result = $this->queryBuilder->executeQuery()->rowCount();

        $response->getBody()->write(json_encode($result));
        return $response;
    }

    public function students(Request $request, Response $response)
    {
        $this->queryBuilder->select('*')->from('students');

        $result = $this->queryBuilder->executeQuery()->fetchAllAssociative();

         $response->getBody()->write(json_encode($result));
        return $response;
    }

    public function store(Request $request,Response $response)
    {
        $data = $request->getBody();
        $data = json_decode($data, true);

        ['name' => $name,'age' => $age,'country' => $country] = $data;

        $this->queryBuilder->insert('students')
            ->values(['name' => '?', 'age' => '?', 'country' => '?'])
            ->setParameter(0,$name)
            ->setParameter(1,$age)
            ->setParameter(2,$country);
        $this->queryBuilder->executeQuery();

        $response->getBody()->write(json_encode(["success"=>true,"message"=> 'Successful created']));

        return $response;
    }
    public function show(Request $request,Response $response)
    {
        $studentId = $request->getAttribute('id');

        $this->queryBuilder->select('*')->from('students')->where("id = $studentId");
        $result = $this->queryBuilder->executeQuery()->fetchAllAssociative();

        $response->getBody()->write(json_encode($result));

        return $response;
    }
    public function update(Request $request,Response $response)
    {
        $data = $request->getBody();
        $data = json_decode($data, true);

        ['id' => $id,'name' => $name,'age' => $age,'country' => $country] = $data;

        $query = $this->queryBuilder->update('students')
            ->set('name', ':name')
            ->set('age', ':age')
            ->set('country',':country')
            ->where('id = :id')
            ->setParameter('name',$name)->setParameter('age',$age)->setParameter('country',$country)
            ->setParameter('id',$id);
            $query->executeQuery();

        $response->getBody()->write(json_encode(["success"=>true,"message"=>"Student Updated Succcessfully"]));

        return $response;
    }

    public function delete(Request $request,Response $response)
    {
        $studentId = $request->getAttribute('id');

        $this->queryBuilder->delete('students')->where("id = $studentId")->executeQuery();

        $response->getBody()->write(json_encode(["success"=>true,"message"=>"Student Deleted Succcessfully"]));

        return $response;
    }




}