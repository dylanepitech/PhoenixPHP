<?php 
namespace Routes;
require_once __DIR__ . '/../vendor/autoload.php';
$router = new Router();
$router->Route('/','HomeController@view');