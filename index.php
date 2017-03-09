<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/oi/{nome}', function (Request $request, Response $response) {
    $nome = $request->getAttribute('nome');
    $response->getBody()->write("Olá, $nome!");

    return $response;
});

$app->get('/categorias', function (Request $request, Response $response) {

    $categorias = array();
    array_push($categorias, "Categoria 1");
    array_push($categorias, "Categoria 2");
    array_push($categorias, "Categoria 3");

    $categoriasJSON = json_encode(array("categorias" => $categorias));

    $response->getBody()->write(json_encode($categoriasJSON));

    return $response;
});

$app->run();