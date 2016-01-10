<?php

class FruitpackSaveModules {

	public function __construct() {
		add_action( 'wp_ajax_save_fruitpack', array( $this, 'save_fruitpack_options' ) );
		add_action( 'wp_ajax_sync_modules', array( $this, 'sync_modules' ) );
	}

	public static function save_fruitpack_options() {

		if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

			$folder = (isset($_GET['folder'])) ? $_GET['folder'] : '';
			$file = (isset($_GET['filename'])) ? $_GET['filename'] : 'index.php';
			$name = (isset($_GET['name'])) ? $_GET['name'] : null;
			$pluginFolder = basename(dirname(__FILE__)) . '/';
			$fullFile = 'modules/' . $folder . '/' . $file;

			$optionName = 'fruit-pack-active-modules';

			if ( get_option( $optionName ) ) {

				if ( $name !== null ) {
					$data = get_option( $optionName );
					if ( array_key_exists( $name, $data ) ) {
						unset( $data[$name] );
						do_action( 'deactivate_' . $pluginFolder . $fullFile );
					} else {
						$data[$name] = array( 'filename' => $file, 'folder' => $folder );
						if ( file_exists( FRUITPACK__PLUGIN_DIR . $fullFile ) ) {
							require_once( FRUITPACK__PLUGIN_DIR . $fullFile );
						}
						do_action( 'activate_' . $pluginFolder . $fullFile );
					}
					update_option( $optionName, $data );
				}

			} else {

				$data = array( $name => array( 'filename' => $file, 'folder' => $folder ) );
				update_option( $optionName, $data );
				if ( file_exists( FRUITPACK__PLUGIN_DIR . $fullFile ) ) {
					require_once( FRUITPACK__PLUGIN_DIR . $fullFile );
				}
				do_action( 'activate_' . $pluginFolder . $fullFile );

			}

			return;
		} else {
			die( 'Get out of here sucka' );
		}

	}

	public static function sync_modules() {

		if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

			Fruitpack_Json::sync_json();

			return;
		} else {
			die( 'Get out of here sucka' );
		}

	}

}

new FruitpackSaveModules;