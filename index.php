<?php
error_reporting( E_ALL );

//$url = $_SERVER['REQUEST_URI'];
//$_SERVER['REQUEST_URI'] = '/admin/post';
//$arr = parse_url($url);
//$path = explode('/', $arr['path']);
//var_dump($arr);
//
//die();

require_once __DIR__ . '/autoloader.php';

$ctrl = isset( $_GET['ctrl'] ) ? $_GET['ctrl'] : 'News';
$act  = isset( $_GET['act'] ) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';
$actionName = 'action' . $act;

$controller = new $controllerClassName();
$controller->$actionName();