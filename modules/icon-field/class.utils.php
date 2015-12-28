<?php
class FruitpackIconfieldUtils {

	public static function get_icons() {

		$file = get_template_directory() . '/public/fonts/iconlist.json';
		$iconList = array();
		if ( file_exists( $file ) ) {
			$icons = file_get_contents( $file );
			$iconList = json_decode( $icons, true );
		}
		return $iconList;
	}

}