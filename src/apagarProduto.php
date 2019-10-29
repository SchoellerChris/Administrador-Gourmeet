<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/apagarCategoria/[{idProduto]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");
        $conexao = $container ->get('pdo');   
        
        
      $resultSet =  $conexao->query('DELETE FROM categoria WHERE idCategoria = "'.$args['idProduto'].'";');
      
      return $container->get('renderer')->render($response, 'viewProduto.phtml', $args);

        
    });
};
