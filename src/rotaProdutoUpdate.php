<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->post('/produtoUpdateNoBanco/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");
        $conexao = $container->get('pdo');
        $params = $request -> getParsedBody();

        // Busca todos os produtos
        //$resultSet = $conexao->query('UPDATE produto '".$params['nomeProduto']."';')->fetchAll();


        $args['produtos'] = $resultSet;

    



        // Render index view
        return $container->get('renderer')->render($response, 'viewProduto.phtml', $args);
    });
};