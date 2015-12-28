<?php 
class FruitpackSidebarCustomFields {

  public function __construct() {
    add_action( 'init', array( $this, 'sidebar_settings' ) );
  }

  // Basic Page Layout
  public static function sidebar_settings() {

    if( function_exists('register_field_group') ):

      register_field_group(array (
        'key' => 'group_5464f35b6c4dc',
        'title' => 'Page Layout',
        'fields' => array (
          array (
            'key' => 'field_5465033cb9a54',
            'label' => 'Layout',
            'name' => 'fru_layout',
            'prefix' => '',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'choices' => array (
              'full-width' => 'Full Width',
              'boxed-width' => 'Boxed',
            ),
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => 'boxed-width : Boxed',
            'layout' => 'horizontal',
          ),
          array (
            'key' => 'field_5464f3866ed16',
            'label' => 'Sidebar',
            'name' => 'fru_sidebar',
            'prefix' => '',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'choices' => array (
              'no-sidebar' => 'No Sidebar',
              'right-sidebar' => 'Right Sidebar',
              'left-sidebar' => 'Left Sidebar',
            ),
            'default_value' => array (
              'no-sidebar' => 'No Sidebar',
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 1,
            'placeholder' => '',
            'disabled' => 0,
            'readonly' => 0,
          ),
          array (
            'key' => 'field_54650398b9a55',
            'label' => 'Choose Sidebar',
            'name' => 'fru_choose_sidebar',
            'prefix' => '',
            'type' => 'select',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_5464f3866ed16',
                  'operator' => '!=',
                  'value' => 'no-sidebar',
                ),
              ),
            ),
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'choices' => FruitpackSidebarUtils::sidebar_list(),
            // 'default_value' => '',
            'default_value' => array_slice(FruitpackSidebarUtils::sidebar_list(), 0, 1),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'placeholder' => '',
            'disabled' => 0,
            'readonly' => 0,
          ),
        ),
        'location' => array (
          array (
            array (
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'page',
            ),
          ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
      ));

    endif;
  }

}

new FruitpackSidebarCustomFields;