<?php
class FruitpackArchiveMeta {

	public function __construct() {
		self::add_options_page();
		add_action( 'init', array( $this, 'register_fields' ), 999 );
		add_filter( 'fp_archive_meta_fields', array( $this, 'add_title_field' ), 10, 3 );
		add_filter( 'fp_archive_meta_fields', array( $this, 'add_content_field' ), 20, 3 );
		add_filter( 'fp_archive_meta_fields', array( $this, 'add_image_field' ), 30, 3 );
	}

	public static function add_options_page() {
		if( function_exists('acf_add_options_page') ) {

			acf_add_options_sub_page(array(
					'page_title' => 'Post Archive Settings',
					'menu_title' => 'Archive Settings',
					'parent_slug' => 'theme-general-settings',
			));

		}
	}

	public static function register_fields() {

		if( ! function_exists('acf_add_local_field_group') ) {
			return;
		}

		$postTypes = get_post_types( array( 'public' => true ), 'objects' );
		if ( ! $postTypes ) {
			return;
		}
		$i = 0;
		foreach ( $postTypes as $postType ):
			$i++;
			$fields = apply_filters( 'fp_archive_meta_fields', array(), $i, $postType );

			acf_add_local_field_group( array (
					'key' => 'group_56c2ae1db5b5' . $i,
					'title' => $postType->labels->singular_name . ' Archive Settings',
					'fields' => $fields,
					'location' => array (
							array (
									array (
											'param' => 'options_page',
											'operator' => '==',
											'value' => 'acf-options-archive-settings',
									),
							),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'standard',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
					'active' => 1,
					'description' => '',
			));

		endforeach;
	}

	public function add_title_field( $fields, $i, $postType ) {

		$fields[] = array (
				'key' => 'field_56c2b22531e8' . $i,
				'label' => $postType->labels->name . ' Title',
				'name' => $postType->name . '_title',
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
		);

		return $fields;

	}

	public function add_content_field( $fields, $i, $postType ) {

		$fields[] = array (
				'key' => 'field_56c2b22e31e8' . $i,
				'label' => $postType->labels->name . ' Content',
				'name' => $postType->name .'_content',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
		);

		return $fields;

	}

	public function add_image_field( $fields, $i, $postType ) {

		$fields[] = 	array (
				'key' => 'field_56c2b23931e8' . $i,
				'label' => $postType->labels->name . ' Hero Image',
				'name' => $postType->name . '_hero_image',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
		);

		return $fields;

	}

}

new FruitpackArchiveMeta;