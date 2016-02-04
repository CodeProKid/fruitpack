<?php
/**
 * Plugin Name: Fruition Security
 * Description: Setting up some simple security settings
 * Slug: security
 * Icon: dashicons-lock
 */

defined( 'ABSPATH' ) or die();

// Allow minor core updates.
add_filter( 'allow_minor_auto_core_updates', '__return_true' );

// Don't allow major core updates.
add_filter( 'allow_major_auto_core_updates', '__return_false' );

// Don't allow theme updates.
add_filter( 'auto_update_theme', '__return_false' );

// Only allow automatic plugin updates to akismet. 
if ( !function_exists('fru_auto_update_specific_plugins') ) {
	function fru_auto_update_specific_plugins ( $update, $item ) {
	  // Array of plugin slugs to always auto-update
	  $plugins = array ( 
	    'akismet',
	  );
	  if ( in_array( $item->slug, $plugins ) ) {
	    return true; // Always update plugins in this array
	  } else {
	    return false; // Else, do not auto update
	  }
	}
	add_filter( 'auto_update_plugin', 'fru_auto_update_specific_plugins', 10, 2 );
}

// Disable emails for site updates the go through successfully. 
add_filter( 'auto_core_update_send_email', false, 'success' );

// Remove generator wp version meta tag
remove_action('wp_head', 'wp_generator');

// Deactivate admin editor
if ( !defined('DISALLOW_FILE_EDIT') ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

if ( ! is_admin()){
  if(preg_match('/(wp-comments-post)/', $_SERVER['REQUEST_URI']) === 0 ) {
     if (!empty($_POST['author'])) {
        fp_kill_enumeration();
     }
  }

  if(preg_match('/author=([0-9]*)/', $_SERVER['QUERY_STRING']) === 1)
  fp_kill_enumeration();

  add_filter('redirect_canonical','fp_detect_enumeration', 10,2);
}

add_filter('redirect_canonical','fp_detect_enumeration', 10,2);
function fp_detect_enumeration ($redirect_url, $requested_url) {
if (preg_match('/\?author(%00[0%]*)?=([0-9]*)(\/*)/', $requested_url)===1  | isset($_POST['author']) ) {
     fp_kill_enumeration();
   } else {
     return $redirect_url;
   }
}

function fp_kill_enumeration() {
     openlog('wordpress('.$_SERVER['HTTP_HOST'].')',LOG_NDELAY|LOG_PID,LOG_AUTH);
     syslog(LOG_INFO,"Attempted user enumeration from {$_SERVER['REMOTE_ADDR']}");
     closelog();
     wp_die('forbidden');
}
