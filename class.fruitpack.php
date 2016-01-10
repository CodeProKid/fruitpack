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

		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		foreach ( $modules as $module ) {

			$moduleFolder = basename($module);
			$moduleData = get_plugins( '/' . basename(dirname(__FILE__)) . '/modules/' . basename( $module ) );
			$moduleFile = key( $moduleData );
			$class = '';
			if ( $activeModules && array_key_exists( $moduleData[$moduleFile]['Name'], $activeModules ) ) {
				$class = 'active';
			}
			echo '<div class="fruit-pack-module ' . $class . '" data-folder="' . esc_attr( $moduleFolder ) . '" data-name="' . esc_attr( $moduleData[$moduleFile]['Name'] ) . '" data-filename="' . esc_attr( $moduleFile ) . '">';
				echo '<div class="fruit-pack-module__inner">';
					echo '<h2>' . $moduleData[$moduleFile]['Name'] . '</h2>';
					echo '<i class="dashicons ' . $moduleData[$moduleFile]['Icon'] . '"></i>';
					echo '<p>' . $moduleData[$moduleFile]['Description'] . '</p>';
				echo '</div>';
				echo '<div class="fruit-pack-module__action ' . $class . '">';
					echo '<p>'; 
						echo '<i class="dashicons dashicons-update"></i>';
						echo '<span class="action-text">';
						if ( $class == 'active' ) {
							echo 'Deactivate Module';
						} else {
							echo 'Activate Module';
						}
						echo '</span>';
					echo '</p>';
				echo '</div>';
			echo '</div>';
		}

	}

}

new Fruitpack;