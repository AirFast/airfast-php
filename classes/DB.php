<?php

class DB {

	private static $db;
	private static $className;

	public function __construct( $className = 'stdClass' ) {

		require_once __DIR__ . '/../config/config.php';
		self::$db = new PDO( 'mysql:dbname=' . $config['db']['database'] . ';host=' . $config['db']['host'], $config['db']['user'], $config['db']['password'] );

		self::$className = $className;
	}

	public function query( $sql, $params = [] ) {

		$sth = self::$db->prepare( $sql );

		$sth->execute( $params );

		return $sth->fetchAll( PDO::FETCH_CLASS, static::$className );

	}

}