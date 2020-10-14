<?php

class DB {

	private static $db;

	public function __construct() {

		require_once __DIR__ . '/../config/config.php';
		self::$db = new PDO('mysql:dbname=' . $config['db']['database'] . ';host=' . $config['db']['host'], $config['db']['user'], $config['db']['password']);

	}

	public function query( $sql, $params = [] ) {

		$sth = self::$db->prepare( $sql );

		$sth->execute( $params );
		return $sth->fetchAll();

	}

	public function execute( $sql ) {

		mysqli_query( self::$db, $sql );

	}

	public function queryAll( $sql, $class = 'stdClass' ) {

		$res = mysqli_query( self::$db, $sql );

		if ( false === $res ) {
			return false;
		}

		$ret = [];

		while ( $row = mysqli_fetch_object( $res, $class ) ) {
			$ret[] = $row;
		}

		return $ret;

	}

	public function queryOne( $sql, $class = 'stdClass' ) {

		return $this->queryAll( $sql, $class )[0];

	}

}