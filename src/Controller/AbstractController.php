<?php


namespace App\Controller;


use Psr\Container\ContainerInterface;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AbstractController
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

    public function render(Request $request, Response $response, $template, array $data=[]): Response
    {
        $html = $this->container->get('templating')->render($template, $data);
        $response->getBody()->write($html);
        return $response;
    }

}