<?php
header('Access-Control-Allow-Origin:*'); 
header('Access-Control-Allow-Headers:X-Request-With');
header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';


$app = new \Slim\App();
$app->get('/hello/{emri}', function (Request $request, Response $response) {
    $emri = $request->getAttribute('emri');
    $response->getBody()->write("Hello, $emri");

    return $response;
});


$app->run();


?>
