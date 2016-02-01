<?php

class FruitpackTeam {

	public function __construct() {

		add_action( 'init', array( $this, 'team' ) );
		add_action( 'init', array( $this, 'team_category' ) );
		add_action( 'pre_get_posts', array( $this, 'team_orderby' ) );
		add_filter('acf/settings/load_json', array( $this, 'add_acf_folder' ) );
		self::team_image();

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
	
		$labels = apply_filters( 'fp_register_team_labels', array(
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
		) );
	
		$args = apply_filters( 'fp_register_team_args', array(
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
		) );
	
		register_post_type( 'team', $args );

	}

	/**
	 * Create a taxonomy
	 *
	 * @uses  Inserts new taxonomy object into the list
	 * @uses  Adds query vars
	 *
	 * @param string  Name of taxonomy object
	 * @param array|string  Name of the object type for the taxonomy object.
	 * @param array|string  Taxonomy arguments
	 * @return null|WP_Error WP_Error if errors, otherwise null.
	 */
	public static function team_category() {
	
		$labels = apply_filters( 'fp_register_team_category_labels', array(
			'name'					=> _x( 'Team Categories', 'Taxonomy plural name', 'fruitpack' ),
			'singular_name'			=> _x( 'Team Category', 'Taxonomy singular name', 'fruitpack' ),
			'search_items'			=> __( 'Search Team Categories', 'fruitpack' ),
			'popular_items'			=> __( 'Popular Team Categories', 'fruitpack' ),
			'all_items'				=> __( 'All Team Categories', 'fruitpack' ),
			'parent_item'			=> __( 'Parent Team Category', 'fruitpack' ),
			'parent_item_colon'		=> __( 'Parent Team Category', 'fruitpack' ),
			'edit_item'				=> __( 'Edit Team Category', 'fruitpack' ),
			'update_item'			=> __( 'Update Team Category', 'fruitpack' ),
			'add_new_item'			=> __( 'Add New Team Category', 'fruitpack' ),
			'new_item_name'			=> __( 'New Team Category Name', 'fruitpack' ),
			'add_or_remove_items'	=> __( 'Add or remove Team Categories', 'fruitpack' ),
			'choose_from_most_used'	=> __( 'Choose from most used fruitpack', 'fruitpack' ),
			'menu_name'			    => __( 'Team Category', 'fruitpack' ),
		) );
	
		$args = apply_filters( 'fp_register_team_category', array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => false,
			'hierarchical'      => true,
			'show_tagcloud'     => false,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => false,
			'query_var'         => true,
			'capabilities'      => array(),
		) );
	
		register_taxonomy( 'team-category', array( 'team' ), $args );

	}

	public static function team_image() {
		add_image_size( 'fp-team', 400, 400, true );
	}

	public static function add_acf_folder( $paths ) {
		
		$paths[] = dirname(__FILE__) . '/acf-json';
		return $paths; 

	}

	public static function team_orderby( $query ) {

		$pt = $query->get( 'post_type' );
		if ( $query->is_main_query() && $pt == 'team' ) {
			$query->set( 'orderby', 'menu_order' );
			$query->set( 'order', 'ASC' );
		}

	}
	
	
}

new FruitpackTeam;