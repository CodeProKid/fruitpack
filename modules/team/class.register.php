<?php

class FruitpackTeam {

	public static function __construct() {
		add_action( 'init', array( $this, 'team' ) );
	}

	/**
	* Registers a new post type
	* @uses $wp_post_types Inserts new post type object into the list
	*
	* @param string  Post type key, must not exceed 20 characters
	* @param array|string  See optional args description above.
	* @return object|WP_Error the registered post type object, or an error object
	*/
	public static function team() {
	
		$labels = array(
			'name'                => __( 'Team Members', 'fruitpack' ),
			'singular_name'       => __( 'Team Member', 'fruitpack' ),
			'add_new'             => _x( 'Add New Team Member', 'fruitpack', 'fruitpack' ),
			'add_new_item'        => __( 'Add New Team Member', 'fruitpack' ),
			'edit_item'           => __( 'Edit Team Member', 'fruitpack' ),
			'new_item'            => __( 'New Team Member', 'fruitpack' ),
			'view_item'           => __( 'View Team Member', 'fruitpack' ),
			'search_items'        => __( 'Search Team Members', 'fruitpack' ),
			'not_found'           => __( 'No Team Members found', 'fruitpack' ),
			'not_found_in_trash'  => __( 'No Team Members found in Trash', 'fruitpack' ),
			'parent_item_colon'   => __( 'Parent Team Member:', 'fruitpack' ),
			'menu_name'           => __( 'Team Members', 'fruitpack' ),
		);
	
		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'Team CPT',
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 22,
			'menu_icon'           => 'dashicons-groups',
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' )
		);
	
		register_post_type( 'team', $args );
	}
	
	
}

new FruitpackTeam;