<?php
class FruitpackSitemapShortcode {

	public function __construct() {
		add_shortcode( 'sitemap', array( $this, 'create_shortcode' ) );
	}

	public static function create_shortcode( $atts ) {

		extract( shortcode_atts(
			array(
				'auto' => 'true',
				'toplevel' => 'false',
			), $atts )
		);

		if ( $auto == 'true' ) {

			if ( $toplevel == 'true' ) {
				$depth = 1;
			} else {
				$depth = 0;
			}

			$sitemap = wp_list_pages( array( 'echo' => 0, 'depth' => $depth ) );

		} else {

			$menuArgs = array(
				'theme_location' => 'sitemap',
				'echo'           => false,
				'menu_class'     => 'ul-sitemap-menu',
				'fallback_cb'    => 'wp_page_menu',
			);

			$sitemap = wp_nav_menu( $menuArgs );

		}

		return $sitemap;

	}

}

new FruitpackSitemapShortcode;