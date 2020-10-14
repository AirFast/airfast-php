<?php

class NewsController {

	public function actionAll() {

		$items = NewsModel::findAll();
		var_dump($items);
		die();

		$view  = new View();

		$view->items = $items;
		$view->display( 'news/all.php' );

	}

	public function actionOne() {

		$id   = $_GET['id'];
		$item = NewsModel::getOne( $id );
		$view = new View();

		$view->item = $item;
		$view->display( 'news/one.php' );

	}

}