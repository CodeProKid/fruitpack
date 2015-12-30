<?php

class FruitpackSitemapRegister {

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'register_menu' ) );
	}

	public static function register_menu() {
		register_nav_menu( 'sitemap', __( 'Sitemap', 'fruitpack' ) );
	}

}

new FruitpackSitemapRegister;