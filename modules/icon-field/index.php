<?php
/*
Plugin Name: ACF Icon Field
Plugin URI: PLUGIN_URL
Description: Adds custom field for ACF
Icon: dashicons-editor-help
Slug: icon-field
Version: 1.0.0
Author: Ryan Kanner
Author URI: http://rkanner.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

require_once( dirname(__FILE__) . '/class.utils.php' );
function fp_include_field_types_icon_field( $version ) {
	
	require_once( FRUITPACK__PLUGIN_DIR . 'modules/icon-field/acf-icon_field-v5.php' );
	
}
add_action('acf/include_field_types', 'fp_include_field_types_icon_field');	

	
?>