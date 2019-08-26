<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require '../vendor/autoload.php';
require "../src/BLL/AppServices/AppServices.php";

$app = new \Slim\App();

require_once "../src/API/customers.php";

$app->run();