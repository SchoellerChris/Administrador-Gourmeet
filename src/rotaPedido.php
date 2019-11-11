<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
  $container = $app->getContainer();

  $app->get('/pedidos/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $conexao = $container->get('pdo');


    $resultSet =  $conexao->query('SELECT * FROM pedido WHERE statusPagamento = 0');

    $args['pedidos'] = $resultSet;

    return $container->get('renderer')->render($response, 'viewPedido.phtml', $args);
  });
  $app->get('/pedidosPagos/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $conexao = $container->get('pdo');


    $resultSet =  $conexao->query('SELECT * FROM pedido WHERE statusPagamento = 1');

    $args['pedidosPagos'] = $resultSet;

    return $container->get('renderer')->render($response, 'viewPedidoPago.phtml', $args);
  });
  $app->get('/clientes/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $conexao = $container->get('pdo');


    $resultSet =  $conexao->query('SELECT * FROM pedido');

    $args['pedidosClientes'] = $resultSet;

    return $container->get('renderer')->render($response, 'viewClientes.phtml', $args);
  });
};