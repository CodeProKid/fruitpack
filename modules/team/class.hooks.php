<?php

class FruitpackTeamHooks {
	
	public function __construct() {

		//archive hooks
		add_action( 'fp-team-archive-container', array( $this, 'archive_container' ), 10 );
		add_action( 'fp-team-archive-container-close', array( $this, 'archive_container_close' ), 10 );
		add_action( 'fp-team-archive-title', array( $this, 'archive_title' ), 10 );
		add_action( 'fp-team-archive-single', array( $this, 'display_image' ), 10 );
		add_action( 'fp-team-archive-single', array( $this, 'team_member_name' ), 20 );
		add_action( 'fp-team-archive-single', array( $this, 'team_member_job_title' ), 30 );

		//single hooks
		add_action( 'fp-team-single-container', array( $this, 'single_container' ), 10 );
		add_action( 'fp-team-single-container-close', array( $this, 'single_container_close' ), 10 );
		add_action( 'fp-team-single-content', array( $this, 'single_content_side' ), 10 );
		add_action( 'fp-team-single-content', array( $this, 'single_content_main' ), 20 );
		add_action( 'fp-team-single-more-info', array( $this, 'more_info' ), 10 );

	}

	public static function archive_container() {

		$containerClass = apply_filters( 'fp-team-container-class', 'content-container' );
		echo '<section class="fp-jobs-archive-container ' . $containerClass . '">';
		echo '<div class="row">';

	}

	public static function archive_container_close() {

		echo '</div>';
		echo '</section>';

	}

	public static function archive_title() {

		$title = apply_filters( 'fp-team-archive-title-text', post_type_archive_title( '', false ) );
		echo '<div class="large-12 columns center-text fp-team-title-container">';
			echo '<h1>' . $title . '</h1>';
		echo '</div>';

	}

	public static function display_image() {

		$imageSize = apply_filters( 'fp-team-archive-image-size', 'fp-team' );

		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $imageSize );
		}

	}

	public static function team_member_name() {

		the_title( '<h3>', '</h3>' );

	}

	public static function team_member_job_title() {

		$jobTitle = get_field( 'job_title' );
		if ( $jobTitle ) {
			echo '<h4 class="job-tite">' . esc_html( $jobTitle ) . '</h4>';
		}

	}

	public static function single_container() {

		$containerClass = apply_filters( 'fp-team-container-class', 'content-container' );
		echo '<section class="fp-jobs-single-container ' . $containerClass . '">';
		echo '<div class="row">';

	}

	public static function single_container_close() {

		echo '</section>';
		echo '</div>';

	}

	public static function single_content_side() {

		$imgSize = apply_filters( 'fp-team-single-image-size', 'fp-team' );

		echo '<aside class="medium-4 columns">';
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( $imgSize );
			}
			do_action( 'fp-team-single-more-info' );
		echo '</aside>';

	}

	public static function single_content_main() {

		$jobTitle = get_field( 'job_title' );

		echo '<article class="' . join( ' ', get_post_class( 'medium-8 columns' ) ) . '">';
		the_title( '<h1>', '</h1>' );

		if ( $jobTitle ) {
			echo '<h3 class="fp-team-single-job-title">' . esc_html( $jobTitle ) . '</h3>';
		}

		the_content();

		echo '</article>';

	}

	public static function more_info() {

		$linkedIn = get_field( 'linkedin_url' );

		if ( $linkedIn ) {
			echo '<p><a class="fp-team-linkedin-link" href="' . esc_url( $linkedIn ) . '">LinkedIn Profile</p></a>';
		}

	}

}

new FruitpackTeamHooks;