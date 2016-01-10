<?php
class FruitpackPluginWhitelist {
	
	public function __construct() {
		add_action( 'activate_plugin', array( $this, 'kill_install' ) );
	}

	private static function plugin_whitelist() {

		$plugins = apply_filters( 'fruitpack-plugin-whitelist', array(
			'Akismet',
			'Fruit Pack',
			'Gravity Forms',
			'Advanced Custom Fields Pro',
			'Advanced Custom Fields',
			'Jetpack',
			'Yoast SEO',
			'The Events Calendar',
			'Force Regenerate Thumbnails',
			'Regenerate Thumbnails',
			'AJAX Thumbnail Rebuild',
			'Instagram Feed',
			'Gravity Forms Constant Contact Add-on',
			'WooCommerce',
			'WooThemes Helper',
			'WordPress Importer',
			'WooCommerce Authorize.net CIM Gateway',
		));

		return $plugins;

	}

	public static function kill_install( $plugin ) {

		$pluginData = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin, false, false );
		$pluginName = $pluginData['Name'];
		$whiteList = self::plugin_whitelist();
		$dieText = '<p>Sorry, but the plugin: ' . $pluginName . ' is not on the pre-approved plugin list for this site. Please contact an administrator.</p>';

		if ( ! in_array( $pluginName, $whiteList ) ) {
			wp_die( $dieText, 'Plugin Not Allowed' );
		}

	}

}

new FruitpackPluginWhitelist;