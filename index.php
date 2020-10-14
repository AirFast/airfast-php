<?php
error_reporting( E_ALL );

require_once __DIR__ . '/autoloader.php';

$ctrl = isset( $_GET['ctrl'] ) ? $_GET['ctrl'] : 'News';
$act  = isset( $_GET['act'] ) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';
$actionName = 'action' . $act;

$controller = new $controllerClassName();
$controller->$actionName();