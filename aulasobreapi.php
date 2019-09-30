<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require_once "vendor/autoload.php";

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$configuration = new \Slim\Container($configuration);

$mid01 = function(Request $request, Response $response, $next): Response{
    $response->getBody()->write("Dentro do middleware 01<br>");
    $response = $next($request, $response);
    $response->getBody()->write("Dentro do middleware 02");

    return $response;
};


$app = new \Slim\App($configuration);

// $app->group('/carros', function() use($app){
//     $app->get('/',);
//     $app->get('/asd', );
// })->add($mid01);

// $app->get('/carros[/{nome}]', function(Request $request, Response $response, array $args){
//     $limit = $request->getQueryParams()['limit'] ?? 10;

//     $nome = $args['nome'] ?? 'sedan';

//     return $response->getBody()
//         ->write("{$limit} Carros do banco de dados com o nome {$nome}");
// });

$app->post('/carros', function(Request $request, Response $response, array $args) : Response{
    $data = $request->getParsedBody();
    
    //  print_r($data);die;

    $marca = $data['marca'] ?? '';
    
    $response->getBody()->write("Carro {$marca} (POST)<br>");

    return $response;

})->add($mid01);

$app->put('/carros', function(Request $request, Response $response, array $args){
    $data = $request->getParsedBody();
    //  print_r($data);die;

    $marca = $data['marca'] ?? '';
    
    return $response->getBody()->write("Carro {$marca} (PUT)");
});

$app->delete('/carros', function(Request $request, Response $response, array $args){
    $data = $request->getParsedBody();
    
    //  print_r($data);die;

    $marca = $data['marca'] ?? '';
    
    return $response->getBody()->write("Carro {$marca} (DELETE)");
});

$app->run();