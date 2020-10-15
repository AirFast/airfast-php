<?php

class NewsController {

	public function actionIndex() {

		$items = NewsModel::findAll();
		$view  = new View();

		$view->items = $items;
		$view->display( 'news/all.php' );

	}

	public function actionOne() {

		if (isset( $_GET['id'] )) {
			$id   = $_GET['id'];
		} else {
			$this->actionAll();
			return;
		}

		$item = NewsModel::findOneById( $id );
		$view = new View();

		$view->item = $item;
		$view->display( 'news/one.php' );

	}

	public function actionInsert() {

		$article = new NewsModel();
		$article;

	}

}