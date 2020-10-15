<?php

class AdminController {

	public function actionIndex() {

		$items = NewsModel::findAll();
		$view  = new View();

		$view->items = $items;
		$view->display( 'admin/index.php' );

	}

	public function actionAdd() {

	}

	public function actionEdit() {

		if ( isset( $_GET['id'] ) ) {
			$id = $_GET['id'];
		} else {
			$this->actionIndex();

			return;
		}

		$item = NewsModel::findOneById( $id );
		$view = new View();

		$view->item = $item;
		$view->display( 'admin/edit.php' );

	}

	public function actionInsert() {

		$article = new NewsModel();
		$article;

	}

	public function actionUpdate() {

		if ( isset( $_GET['id'] ) ) {
			$id = $_GET['id'];
		} else {
			$this->actionEdit();

			return;
		}

		$article = new NewsModel();

		$article->title = $_POST['title'];
		$article->text  = $_POST['text'];
		$article->id    = $id;

		$article->update();
		header( 'Location: /admin/edit?id=' . $id );

	}

}