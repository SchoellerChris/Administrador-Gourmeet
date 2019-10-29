<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/produtoCadastro/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");



        $conexao = $container->get('pdo');

        $resultSet = $conexao->query("SELECT * FROM categoria");

        $args['mostrarCategoria'] = $resultSet;

        // Render index view
        return $container->get('renderer')->render($response, 'cadastroProduto.phtml', $args);
    });

    $app->post('/produtoCadastroNoBanco/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");
        $conexao = $container->get('pdo');

        $params = $request->getParsedBody();

        $resultSet = $conexao->query("INSERT INTO produto (nomeProduto, descProduto, precoProduto, idCategoria, ehDestaque) VALUES ('" . $params['nomeProduto'] . "','" . $params['descProduto'] . "'," . $params['precoProduto'] . "," . $params['idCategoria'] . "," . $params['ehDestaque'] . ");");


        // Render index view

        return $container->get('renderer')->render($response, 'cadastroProduto.phtml', $args);
    });
};
