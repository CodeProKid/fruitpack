<?php

class Fruitpack_Admin {

	public function __construct() {

		add_action( 'admin_menu', array( $this, 'register_options_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueues' ) );

	}

	public static function register_options_page() {
		add_plugins_page( 'Fruit Pack', 'Fruit Pack', 'manage_options', 'fruit-pack.php' , array( 'Fruitpack_Admin', 'options_page_content' ) );
	}

	public static function options_page_content() {

		echo '<div class="wrap">';
			echo '<h1>Fruit Pack Modules</h1>';
			echo '<div class="fruit-pack-module-wrapper">';
				echo FruitPack::get_modules();
			echo '</div>';
		echo '</div>';

	}

	public static function enqueues() {

		wp_enqueue_style( 'fruitpack-admin-style', plugin_dir_url(__FILE__) . '/css/admin-styles.css' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'fruitpack-admin-js', plugin_dir_url(__FILE__) . '/js/admin.js' );

	}

}

new Fruitpack_Admin;