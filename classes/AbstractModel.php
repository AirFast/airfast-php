<?php

abstract class AbstractModel {

	protected static $table;
	protected $data = [];

	public function __set( $k, $v ) {

		$this->data[ $k ] = $v;

	}

	public function __get( $k ) {

		return $this->data[ $k ];

	}

	public static function findAll() {

		$db  = new DB();
		$sql = 'SELECT * FROM ' . static::$table . ' ORDER BY post_date DESC';

		$db->setClassName( get_called_class() );

		return $db->query( $sql );

	}

	public static function findOneById( $id ) {

		$db  = new DB();
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

		$db->setClassName( get_called_class() );

		return $db->query( $sql, [ ':id' => $id ] )[0];

	}

	public function insert() {

		$cols = array_keys( $this->data );
		$data = [];

		foreach ( $cols as $col ) {
			$data[ ':' . $col ] = $this->data[ $col ];
		}

		$sql = 'INSERT INTO ' . static::$table . '(' . implode( ', ', $cols ) . ') VALUES (' . implode( ', ', array_keys( $data ) ) . ')';

		$db = new DB();

		return $db->execute( $sql, $data );

	}

	public function update() {

		$keys = array_keys( $this->data );
		$cols = [];
		$data = [];

		foreach ( $keys as $key ) {
			$cols[] = $key . '=:' . $key;
			$data[ ':' . $key ] = $this->data[ $key ];
		}

		$lastItem = array_pop($cols );

		$sql = 'UPDATE ' . static::$table . ' SET ' . implode( ', ', $cols ) . ' WHERE ' . $lastItem;

		$db = new DB();

		return $db->execute( $sql, $data );

	}

	public function delete( $id ) {

		$sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

		$db = new DB();

		return $db->execute( $sql, [ ':id' => $id ] );

	}

}