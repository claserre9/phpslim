<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

class HomeController extends AbstractController
{

    public function index(Request $request, Response $response): Response
    {
        return $this->render($request, $response, 'index.html.twig' , ["nom"=>"Matt"]);
    }


}