<?php
function save_fruitpack_options() {

	if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

		$slug = (isset($_GET['slug'])) ? $_GET['slug'] : null;
		$optionName = 'fruit-pack-active-modules';

		if ( get_option( $optionName ) !== false ) {
			if ( $slug !== null ) {
				$data = get_option( $optionName );
				if ( in_array( $slug, $data ) ) {
					$key = array_search( $slug, $data);
					unset($data[$key]);
				} else {
					$data[] = $slug;
				}
				update_option( $optionName, $data );
			}
		} else {
			add_option( $optionName, array($slug) );
		}

		die();
	} else {
		die( 'Get out of here sucka' );
	}
}