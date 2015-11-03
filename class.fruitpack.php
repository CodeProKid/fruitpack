<?php

class Fruitpack {
	
	public function __construct() {
		add_action( 'extra_plugin_headers', array( $this, 'add_extra_plugin_headers' ) );
	}	

	public static function add_extra_plugin_headers( $headers ) {
		$headers['icon'] = 'Icon';
		$headers['slug'] = 'Slug';
		return $headers;
	}

	public static function get_modules() {
		
		$modules = glob( FRUITPACK__PLUGIN_DIR . 'modules/*', GLOB_ONLYDIR );
		$activeModules = get_option( 'fruit-pack-active-modules' );

		foreach ( $modules as $module ) {
			$pluginData = get_plugin_data( $module . '/index.php', 'false', 'false' );
			$class = '';
			if ( in_array($pluginData['Slug'], $activeModules ) ) {
				$class = 'active';
			}
			echo '<div class="fruit-pack-module ' . $class . '" data-slug="' . $pluginData['Slug'] . '">';
				echo '<div class="fruit-pack-module__inner">';
					echo '<h2>' . $pluginData['Name'] . '</h2>';
					echo '<i class="dashicons ' . $pluginData['Icon'] . '"></i>';
					echo '<p>' . $pluginData['Description'] . '</p>';
				echo '</div>';
			echo '</div>';
		}

	}

}

new Fruitpack;