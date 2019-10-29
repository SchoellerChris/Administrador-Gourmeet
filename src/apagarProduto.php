<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
  $container = $app->getContainer();

  $app->get('/apagarProduto/[{idProduto}]', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $conexao = $container->get('pdo');

    $resultSet =  $conexao->query('DELETE FROM produto WHERE idProduto = "' . $args['idProduto'] . '";');

    return $response->withRedirect('/produtos/');
  });
};
