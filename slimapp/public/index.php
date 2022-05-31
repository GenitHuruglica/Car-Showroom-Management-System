<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App();
$app->get('/hello/{emri}', function (Request $request, Response $response) {
    $emri = $request->getAttribute('emri');
    $response->getBody()->write("Pershendetje, $emri");

    return $response;
});

require '../src/routes/automjetet.php';
$app->run();


?>