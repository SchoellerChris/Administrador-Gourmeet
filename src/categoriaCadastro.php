<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/categoriaCadastro/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        

        // Render index view
        return $container->get('renderer')->render($response, 'cadastroCategoria.phtml', $args);
    });

    $app->post('/categoriaCadastroNoBanco/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");
        $conexao = $container ->get('pdo');      
        
        $params = $request -> getParsedBody();

        $resultSet = $conexao->query("INSERT INTO categoria (nomeCategoria) VALUES ('".$params['categoria']."');");


        

        // Render index view
        return $container->get('renderer')->render($response, 'cadastroCategoria.phtml', $args);
    });
};
