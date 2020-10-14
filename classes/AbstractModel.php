<?php

abstract class AbstractModel {

	protected static $table;

	public static function findAll() {

		$db  = new DB( get_called_class() );
		$sql = 'SELECT * FROM ' . static::$table;

		return $db->query( $sql );

	}

	public static function findOneById( $id ) {

		$db  = new DB( get_called_class() );
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

		return $db->query( $sql, [ ':id' => $id ] )[0];

	}

}