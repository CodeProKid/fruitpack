<?php

class FruitpackShortcodes {

	public function __construct() {
		add_shortcode( 'columns', array( $this, 'column_shortcode' ) );
    add_shortcode( 'container', array( $this, 'container_shortcode' ) );
    add_shortcode( 'button', array( $this, 'button_shortcode' ) );
	}

	public static function column_shortcode( $atts, $content = null ) {

    extract( shortcode_atts(
      array(
        'lg'    => '12',
        'md'    => '12',
        'sm'    => '12',
        'class' => '',
      ), $atts )
    );

		return '<div class="large-' . $lg . ' medium-' . $md . ' small-' . $sm . ' columns">' . do_shortcode( $content ) . '</div>';

	}

  public static function container_shortcode( $atts, $content = null ) {

    extract( shortcode_atts(
      array(
        'class' => 'row',
      ), $atts )
    );

    return '<div class="' . $class . '">' . do_shortcode( $content ) . '</div>';

  }

  public static function button_shortcode( $atts ) {

    extract( shortcode_atts(
      array(
        'class' => 'green',
        'url'   => '#',
        'text'  => '',
      ), $atts )
    );

    return '<a class="button ' . esc_attr( $class ) . '" href="' . esc_url( $url ) . '">' . esc_html( $text ) . '</a>';

  }

}

new FruitpackShortcodes;