<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

class HomeController
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * HomeController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response)
    {

        $html = $this->container->get('templating')->render('index.html.twig');
        $response->getBody()->write($html);
        return $response;
    }


}