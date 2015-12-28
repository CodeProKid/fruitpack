<?php

class FruitpackSidebarUtils {
	
	public function __construct() {

		add_action( 'fru_sidebar', array( $this, 'build_sidebar' ), 20 );
		add_filter( 'fru_content_class_filter', array( $this, 'content_class' ), 20 );
		add_filter( 'fru_container_class_filter', array( $this, 'container_class' ), 20 );

	}

	// Sidebar list (used in custom fields)
	public static function sidebar_list() {

    global $wp_registered_sidebars;
    $sidebars = array();
    foreach ( $GLOBALS['wp_registered_sidebars'] as $id => $sidebar ) {
      $sidebars[$sidebar['id']] = $sidebar['name'];
    }
    return $sidebars;

  }

  public static function container_class( $args ) {

  	global $wp_query;
		$id = $wp_query->get_queried_object_id();
  	$layout = get_field( 'fru_layout', $id );

  	if ( $layout == 'full-width' ) {
  		$args = 'full-width';
  	} else {
  		$args = 'row';
  	}

  	return $args;

  }

  public static function content_class( $args ) {

  	global $wp_query;
		$id = $wp_query->get_queried_object_id();
		$sidebar = get_field( 'fru_sidebar', $id );

		if ( $sidebar == 'left-sidebar' ) {
			$args = 'large-8 large-push-4 columns';
		} elseif ( $sidebar == 'no-sidebar' ) {
			$args = 'large-12 columns';
		} else {
			$args = 'large-8 columns';
		}

		return $args;

  }

  public static function build_sidebar() {

  	global $wp_query;
		$id = $wp_query->get_queried_object_id();
  	$sidebar = get_field( 'fru_sidebar', $id );
  	$sidebarSelect = get_field( 'fru_choose_sidebar', $id );
  	$sidebarWidth = apply_filters( 'fru_sidebar_width', 'large-4' );

  	if ( $sidebar == 'left-sidebar' ) {
  		$class = 'large-pull-8';
  	} else {
  		$class = '';
  	}

  	if ( $sidebar != 'no-sidebar' ) {
  		if ( $sidebarSelect ) {
	  		echo '<aside class="sidebar sidebar-' . esc_attr( $sidebarSelect ) . ' columns ' . $sidebarWidth . ' ' . $class . '">';
	  			dynamic_sidebar( $sidebarSelect );
	  		echo '</aside>';
	  	} else {
	  		echo '<aside class="sidebar sidebar-default columns ' . $sidebarWidth . '">';
					dynamic_sidebar( 'default' );
				echo '</aside>';
	  	}

  	}

  }

}

new FruitpackSidebarUtils;