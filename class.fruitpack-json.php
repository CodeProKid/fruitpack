<?php

class Fruitpack_Json {
	
	public function __construct() {
		add_action( 'updated_option', array( $this, 'generate_json' ), 10, 3 );
	}

	public static function generate_json( $option, $old_value, $value ) {

		if ( $option == 'fruit-pack-active-modules' ) {

			file_put_contents( FRUITPACK__JSON_FULL_PATH, json_encode($value) );

		}
	}

}

new Fruitpack_Json;