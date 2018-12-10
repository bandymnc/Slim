<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../classes/Students.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = 'localhost';
$config['db']['user']   = 'bandy2';
$config['db']['pass']   = '';
$config['db']['dbname'] = 'iskola';

$app = new \Slim\App(['settings' => $config]);
$container = $app->getContainer();

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$app->get('/tanulok', function (Request $request, Response $response) {
    $iskolasok = new Students($this->db);
    $tanulok = $iskolasok->getStudents();

    foreach($tanulok as $index)
   {
    echo $index->getFirstName();
    echo $index->getId();
   }
  
    return $response;
});


$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->run();