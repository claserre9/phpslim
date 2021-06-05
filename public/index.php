<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Controller\HomeController;


require __DIR__ . "/../vendor/autoload.php";

$container = new Container();

$loader = new FilesystemLoader(__DIR__ . '/../templates');

$container->set('templating', function () use ($loader) {
    return new Environment($loader, [
        'auto_reload ' => true
    ]);
});

AppFactory::setContainer($container);


$app = AppFactory::create();

$app->get("/", HomeController::class . ':index');

$app->run();
