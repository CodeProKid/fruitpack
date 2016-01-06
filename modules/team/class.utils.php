<?php

class FruitpackTeamUtils {
	
	public static function __construct() {

		add_filter( 'archive_template', array( $this, 'load_archive_template' ) );
		add_filter( 'single_template', array( $this, 'load_single_template' ) );

	}

	public static function load_archive_template( $archive_template ) {
		
		$themeTemplate = self::find_template( 'archive-team.php' );

		if ( ! $themeTemplate ) {
			
			global $post;
			if ( is_post_type_archive( 'team' ) ) {
				$archive_template = dirname(__FILE__) . '/templates/archive-team.php';
			}

		}

		return $archive_template;

	}

	public static function load_single_template( $single_template ) {

		$themeTemplate = self::find_template( 'single-team.php' );

		if ( ! $themeTemplate ) {
			
			global $post;
			if ( $post->post_type == 'team' ) {
				$single_template = dirname(__FILE__) . 'templates/single-team.php';
			}

		}

		return $single_template;

	}

	private function find_template( $templateName ) {

		$tempDest = get_stylesheet_directory() . '/' . $templateName;
		
		if ( file_exists( $tempDest ) ) {
			return true;
		} else {
			return false;
		}

	}

}

new FruitpackTeamUtils;