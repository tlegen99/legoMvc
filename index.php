<?php

use components\Database;
use components\Router;

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('ROOT', dirname(__FILE__));
require_once ROOT.'/vendor/autoload.php';

$database = new Database();

$router = new Router();
$router->run();