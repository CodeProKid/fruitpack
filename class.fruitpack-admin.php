<?php

class Fruitpack_Admin {

	public function __construct() {

		add_action( 'admin_menu', array( $this, 'register_options_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueues' ) );
		self::setup_settings_page();

	}

	public static function register_options_page() {
		add_plugins_page( 'Fruit Pack', 'Fruit Pack', 'manage_options', 'fruit-pack.php' , array( 'Fruitpack_Admin', 'options_page_content' ) );
	}

	public static function options_page_content() {

		echo '<div class="wrap">';
			echo '<h1>Fruit Pack Modules</h1>';
			echo '<div class="fruit-pack-module-wrapper">';
				echo FruitPack::get_modules();
			echo '</div>';
			echo '<div class="fruit-pack-sync-button">';
				submit_button( 'Sync Modules' );
			echo '</div>';
		echo '</div>';

	}

	public static function setup_settings_page() {

		if( function_exists('acf_add_options_page') ) {
			acf_add_options_sub_page(array(
        'page_title'  => 'Fruit Pack Settings',
        'menu_title'  => 'Fruit Pack Settings',
        'parent_slug' => 'plugins.php',
      ));
    }

    if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array (
				'key' => 'group_563931a6e6559',
				'title' => 'Github Settings',
				'fields' => array (
					array (
						'key' => 'field_563931bfe4a0b',
						'label' => 'Github Username',
						'name' => 'github_username',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_563931f1e4a0c',
						'label' => 'Repository Slug',
						'name' => 'repository_slug',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_563931ffe4a0d',
						'label' => 'Authorization Key',
						'name' => 'authorization_key',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'acf-options-fruit-pack-settings',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
			));

			endif;

	}

	public static function enqueues() {

		wp_enqueue_style( 'fruitpack-admin-style', plugin_dir_url(__FILE__) . '/css/admin-styles.css' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'fruitpack-admin-js', plugin_dir_url(__FILE__) . '/js/admin.js' );

	}

}

new Fruitpack_Admin;