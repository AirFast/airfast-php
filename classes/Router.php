<?php


class Router {

	private $url;
	private $urlData;
	private $urlPath;
	private $defaultControllerName = 'News';
	private $defaultActionName = 'Index';

	public function __construct() {

		$this->url     = $_SERVER['REQUEST_URI'];
		$this->urlData = parse_url( $this->url );
		$this->urlPath = explode( '/', trim( $this->urlData['path'], '/' ) );

	}

	public function route() {

		$controllerName = isset( $this->urlPath[0] ) ? ucfirst( $this->urlPath[0] ) : $this->defaultControllerName;
		$action = isset( $this->urlPath[1] ) ? ucfirst( $this->urlPath[1] ) : $this->defaultActionName;


		$controllerClassName = $controllerName . 'Controller';
		$actionName = 'action' . $action;

		$controller = new $controllerClassName();

		return $controller->$actionName();

	}

}