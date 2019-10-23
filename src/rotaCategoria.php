<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/categorias/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");
        $conexao = $container->get('pdo');

        // Busca todas as categorias
        $resultSet = $conexao->query('SELECT * FROM categoria')->fetchAll();


        $args['categorias'] = $resultSet;

    



        // Render index view
        return $container->get('renderer')->render($response, 'viewCategoria.phtml', $args);
    });
};