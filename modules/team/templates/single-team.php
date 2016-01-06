<?php 

/**
 * The Template for displaying all single team posts.
 *
 * Override this template by creating a single-team.php file in the root of your theme directory
 */

get_header();

/**
 * fp-team-single-before hook
 *
 */
do_action( 'fp-team-single-before' );

/**
 * fp-team-single-container hook
 *
 * @hooked FruitpackTeamHooks::single_container - 10
 */
do_action( 'fp-team-single-container' );

/**
 * fp-team-single-before-main hook
 *
 */
do_action( 'fp-team-single-before-main' );

if ( have_posts() ): while ( have_posts() ): the_post();
	
	/**
	 * fp-team-single-container hook
	 *
	 * @hooked FruitpackTeamHooks::single_content_side - 10
	 * @hooked FruitpackTeamHooks::single_content_main - 20
	 */
	do_action( 'fp-team-single-content' ); 

endwhile;
endif;

/**
 * fp-team-single-after-main hook
 *
 */
do_action( 'fp-team-single-after-main' ); 

/**
 * fp-team-single-container hook
 *
 * @hooked FruitpackTeamHooks::single_container_close - 10
 */
do_action( 'fp-team-single-container-close' );

/**
 * fp-team-single-after hook
 *
 */
do_action( 'fp-team-single-after');

get_footer();