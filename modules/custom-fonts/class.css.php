<?php

  /**
  * CSS
  */
  class FruCSS {

    public function __construct() {
      add_action( 'wp_head', array('FruCSS', 'frupress_styles') );
    }

    public static function frupress_styles() {

      $custom_css = '<style type="text/css">';

      if( have_rows('fru_font_family', 'option') ):
        // loop through the rows of data
        while ( have_rows('fru_font_family', 'option') ) : the_row();
          if( get_row_layout() == 'fru_body' ):
            $fru_body_font_family_name = get_sub_field('fru_body_font_family_name');
            $fru_body_font_fallback    = get_sub_field('fru_body_font_fallback');
            $fru_body_font_size        = get_sub_field('fru_body_font_size');
            $fru_body_font_color       = get_sub_field('fru_body_font_color');
            $custom_css .= "
              p, ul, ol {
                font-family: {$fru_body_font_family_name}, {$fru_body_font_fallback};
                font-size: {$fru_body_font_size}px;
                color: {$fru_body_font_color};
              }
            ";
          elseif( get_row_layout() == 'fru_primary_menu_font' ):
            $fru_primary_menu_font_family_name = get_sub_field('fru_primary_menu_font_family_name');
            $fru_primary_menu_font_fallback    = get_sub_field('fru_primary_menu_font_fallback');
            $fru_primary_menu_font_size        = get_sub_field('fru_primary_menu_font_size');
            $fru_primary_menu_font_color       = get_sub_field('fru_primary_menu_font_color');
            $custom_css .= "
                header nav ul li a {
                  font-family: {$fru_primary_menu_font_family_name}, {$fru_primary_menu_font_fallback};
                  font-size: {$fru_primary_menu_font_size}px;
                  color: {$fru_primary_menu_font_color};
                }
              ";
          elseif( get_row_layout() == 'fru_heading_1' ):
            $fru_h1_font_family_name = get_sub_field('fru_h1_font_family_name');
            $fru_h1_font_fallback    = get_sub_field('fru_h1_font_fallback');
            $fru_h1_font_size        = get_sub_field('fru_h1_font_size');
            $fru_h1_font_color       = get_sub_field('fru_h1_font_color');
            $custom_css .= "
                h1 {
                  font-family: {$fru_h1_font_family_name}, {$fru_h1_font_fallback};
                  font-size: {$fru_h1_font_size}px;
                  color: {$fru_h1_font_color};
                }
              ";
          elseif( get_row_layout() == 'fru_heading_2' ):
            $fru_h2_font_family_name = get_sub_field('fru_h2_font_family_name');
            $fru_h2_font_fallback    = get_sub_field('fru_h2_font_fallback');
            $fru_h2_font_size        = get_sub_field('fru_h2_font_size');
            $fru_h2_font_color       = get_sub_field('fru_h2_font_color');
            $custom_css .= "
                h2 {
                  font-family: {$fru_h2_font_family_name}, {$fru_h2_font_fallback};
                  font-size: {$fru_h2_font_size}px;
                  color: {$fru_h2_font_color};
                }
              ";
          elseif( get_row_layout() == 'fru_heading_3' ):
            $fru_h3_font_family_name = get_sub_field('fru_h3_font_family_name');
            $fru_h3_font_fallback    = get_sub_field('fru_h3_font_fallback');
            $fru_h3_font_size        = get_sub_field('fru_h3_font_size');
            $fru_h3_font_color       = get_sub_field('fru_h3_font_color');
            $custom_css .= "
                h3 {
                  font-family: {$fru_h3_font_family_name}, {$fru_h3_font_fallback};
                  font-size: {$fru_h3_font_size}px;
                  color: {$fru_h3_font_color};
                }
              ";
          elseif( get_row_layout() == 'fru_heading_4' ):
            $fru_h4_font_family_name = get_sub_field('fru_h4_font_family_name');
            $fru_h4_font_fallback    = get_sub_field('fru_h4_font_fallback');
            $fru_h4_font_size        = get_sub_field('fru_h4_font_size');
            $fru_h4_font_color       = get_sub_field('fru_h4_font_color');
            $custom_css .= "
                h4 {
                  font-family: {$fru_h4_font_family_name}, {$fru_h4_font_fallback};
                  font-size: {$fru_h4_font_size}px;
                  color: {$fru_h4_font_color};
                }
              ";
          elseif( get_row_layout() == 'fru_heading_5' ):
            $fru_h5_font_family_name = get_sub_field('fru_h5_font_family_name');
            $fru_h5_font_fallback    = get_sub_field('fru_h5_font_fallback');
            $fru_h5_font_size        = get_sub_field('fru_h5_font_size');
            $fru_h5_font_color       = get_sub_field('fru_h5_font_color');
            $custom_css .= "
                h5 {
                  font-family: {$fru_h5_font_family_name}, {$fru_h5_font_fallback};
                  font-size: {$fru_h5_font_size}px;
                  color: {$fru_h5_font_color};
                }
              ";
          elseif( get_row_layout() == 'fru_heading_6' ):
            $fru_h6_font_family_name = get_sub_field('fru_h6_font_family_name');
            $fru_h6_font_fallback    = get_sub_field('fru_h6_font_fallback');
            $fru_h6_font_size        = get_sub_field('fru_h6_font_size');
            $fru_h6_font_color       = get_sub_field('fru_h6_font_color');
            $custom_css .= "
                h6 {
                  font-family: {$fru_h6_font_family_name}, {$fru_h6_font_fallback};
                  font-size: {$fru_h6_font_size}px;
                  color: {$fru_h6_font_color};
                }
              ";
          endif;
        endwhile;
      endif;

      $custom_css .= '</style>';
      $custom_css = preg_replace("/[\r\n]*/","",$custom_css);
      echo $custom_css;
    }

  }

  new FruCSS;