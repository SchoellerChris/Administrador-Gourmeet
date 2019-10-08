<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {

        if ($_SESSION['login']['ehlogado'] != true);{
            return $response->withRedirect('/login/');
 
        exit;
    }
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");


        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });

    $app->get('/cardapio/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/cardapio' route");

        

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
};
