<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class CarrosController{
    public function getCarros(Request $request, Response $response, array $args): Response{
        // $response->getBody()->write("Hello word");

        $response = $response->withJson([
            "message" => "Hello Word"
        ]);

        $lojasDAO = new LojasDAO();
        $lojasDAO->teste();

        return $response;
    }
}

