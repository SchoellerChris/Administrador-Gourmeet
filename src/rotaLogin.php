<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/login/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");  
        
        
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
    
    $app->post('/login/', function (Request $request, Response $response, array $args) use ($container) {
        
        $container->get('logger')->info("Slim-Skeleton '/' route");

        $conexao = $container ->get('pdo');      
        
        $params = $request -> getParsedBody();

        $resultSet = $conexao->query('SELECT * FROM usuario WHERE email = "'. $params['email'] . '" AND senha = "' . md5($params['senha']) . '"')->fetchALL();


        
        if (count($resultSet)==1) {
            $_SESSION['login']['ehLogado'] = true;
            $_SESSION['login']['nome'] = $resultSet['nome'];


            return $response -> withRedirect('http://localhost:1234/');
            
        } else {
            
            return $response -> withRedirect('/login/');
            $_SESSION['ehLogado'] = false;
            
            return $response->withRedirect('/login/fail');
              
            exit;
        }
        

        
        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
};
