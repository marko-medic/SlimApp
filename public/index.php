<?php

require '../vendor/autoload.php';
$app = new \Slim\App();
require_once "../src/API/customers.php";
$app->run();