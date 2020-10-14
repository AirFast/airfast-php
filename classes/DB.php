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

}