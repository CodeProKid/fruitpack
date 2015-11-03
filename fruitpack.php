<?php
/* 
Plugin Name: Fruit Pack
Description: Framework for frupress boilerplate
Version: 0.1-alpha
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
require_once( FRUITPACK__PLUGIN_DIR . 'save.php' );
require_once( FRUITPACK__PLUGIN_DIR . 'class.fruitpack-json.php' );

$activeModules = get_option( 'fruit-pack-active-modules' );

foreach ( $activeModules as $folderName ) {
	require_once( FRUITPACK__PLUGIN_DIR . 'modules/' . $folderName . '/index.php' );
}