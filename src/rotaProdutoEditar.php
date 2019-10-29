<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
  $container = $app->getContainer();

  $app->get('/editarProduto/[{idProduto}]', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $conexao = $container->get('pdo');


    $resultSet =  $conexao->query('SELECT * FROM produto WHERE idProduto = "' . $args['idProduto'] . '";');

    $args['produtoEditar'] = $resultSet;

    return $container->get('renderer')->render($response, 'editarProduto.phtml', $args);
  });

  $app->post('/produtoEditado/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $conexao = $container->get('pdo');

    $params = $request->getParsedBody();

    $resultSet =  $conexao->query('UPDATE produto SET nomeProduto = "' . $params["nome"] . '", descProduto = "' . $params["descricao"] . '", precoProduto = ' . $params["preco"] . ' WHERE idProduto = ' . $params["idProduto"] . ';');

    $args['produtoEditar'] = $resultSet;

    return $container->get('renderer')->render($response, 'editarProduto.phtml', $args);
  });
};
