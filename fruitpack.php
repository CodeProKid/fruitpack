<?php
/* 
Plugin Name: Fruit Pack
Description: Framework for frupress boilerplate
Version: 0.6.2-alpha
Author: Ryan Kanner
Author URI: http:rkanner.com
*/

define( 'FRUITPACK__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'FRUITPACK__ACTIVE_THEME_DIR', get_stylesheet_directory() );
$jsonSaveDir = apply_filters( 'fruitpack_json_save_location', FRUITPACK__ACTIVE_THEME_DIR );
define( 'FRUITPACK__JSON_SAVE_DIR', $jsonSaveDir );
$fileName = apply_filters( 'fruitpack_json_filename', 'fruitpack-sync.json' );
define( 'FRUITPACK__JSON_FULL_PATH', FRUITPACK__JSON_SAVE_DIR . '/' . $fileName );

require_once( FRUITPACK__PLUGIN_DIR . 'class.fruitpack-admin.php' );
require_once( FRUITPACK__PLUGIN_DIR . 'class.fruitpack.php' );
require_once( FRUITPACK__PLUGIN_DIR . 'class.fruitpack-save.php' );
require_once( FRUITPACK__PLUGIN_DIR . 'class.fruitpack-json.php' );
require_once( FRUITPACK__PLUGIN_DIR . 'class.fruitpack-updater.php' );

$updater = new Fruitpack_updater(__FILE__);
$updater->set_username( get_field( 'github_username', 'options' ) );
$updater->set_repository( get_field( 'repository_slug', 'options' ) );
$updater->authorize( get_field( 'authorization_key', 'options' ) );
$updater->initialize();

$activeModules = get_option( 'fruit-pack-active-modules' );

if ( ! function_exists( 'get_plugins' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if ( $activeModules ){
	foreach ( $activeModules as $module ) {
		$moduleFile = FRUITPACK__PLUGIN_DIR . 'modules/' . $module['folder'] . '/' . $module['filename'];
		if ( file_exists( $moduleFile) ) {
			require_once( $moduleFile );
		}
	}
}