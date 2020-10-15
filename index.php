<?php
error_reporting( E_ALL );

require_once __DIR__ . '/autoloader.php';

$router = new Router();

$router->route();