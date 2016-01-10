<?php
function save_fruitpack_options() {

	if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

		$folder = (isset($_GET['folder'])) ? $_GET['folder'] : '';
		$file = (isset($_GET['filename'])) ? $_GET['filename'] : 'index.php';
		$name = (isset($_GET['name'])) ? $_GET['name'] : null;

		$optionName = 'fruit-pack-active-modules';
		if ( get_option( $optionName ) ) {

			if ( $name !== null ) {
				$data = get_option( $optionName );
				if ( array_key_exists( $name, $data ) ) {
					unset($data[$name]);
				} else {
					$data[$name] = array( 'filename' => $file, 'folder' => $folder );
				}
				update_option( $optionName, $data );
			}

		} else {

			$data = array( $name => array( 'filename' => $file, 'folder' => $folder ) );
			update_option( $optionName, $data );

		}

		die();
	} else {
		die( 'Get out of here sucka' );
	}

}

function sync_modules() {

	if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

		Fruitpack_Json::sync_json();

		die();
	} else {
		die( 'Get out of here sucka' );
	}

}