<?php

class View implements Iterator {

	const PATH = __DIR__ . '/../views/';

	protected $data = [];

	public function __set( $key, $val ) {

		$this->data[ $key ] = $val;

	}

	private function render( $template ) {

		foreach ( $this->data as $key => $val ) {
			$$key = $val;
		}

		ob_start();
		include self::PATH . $template;
		$contents = ob_get_contents();
		ob_end_clean();

		return $contents;

	}

	public function display( $template ) {

		echo $this->render( $template );

	}

	public function current() {

		$data = current( $this->data );
		return $data;

	}

	public function next() {

		$data = next( $this->data );
		return $data;

	}

	public function key() {

		$data = key( $this->data );
		return $data;

	}

	public function valid() {

		$key = key( $this->data );
		$data = ( NULL !== $key && false !== $key );
		return $data;

	}

	public function rewind() {

		reset( $this->data );

	}
}