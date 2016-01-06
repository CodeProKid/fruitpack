<?php

/**
 * The Template for displaying all team posts.
 *
 * Override this template by creating a archive-team.php file in the root of your theme directory
 */

$gridClasses = FruitpackTeamUtils::build_grid_classes();

get_header();

/**
 * fp-team-archive-before hook
 *
 */
do_action( 'fp-team-archive-before' );

/**
 * fp-team-archive-before hook
 *
 * @hooked FruitpackTeamHooks::archive_container - 10
 */
do_action( 'fp-team-archive-container' );

/**
 * fp-team-archive-title hook
 *
 * @hooked FruitpackTeamHooks::archive_title - 10
 */
do_action( 'fp-team-archive-title' );

/**
 * fp-team-archive-before-team-list hook
 *
 */
do_action( 'fp-team-archive-before-team-list' );
?>

<?php if ( have_posts() ): ?>
	<ul class="<?php echo $gridClasses; ?>">
	<?php while ( have_posts() ): the_post(); ?>
		<li class="fp-team-archive-single-job">

			<?php 
			/**
			 * fp-team-archive-title hook
			 *
			 * @hooked FruitpackTeamHooks::display_image - 10
			 * @hooked FruitpackTeamHooks::team_member_name - 20
			 * @hooked FruitpackTeamHooks::team_member_job_title - 30
			 */
			do_action( 'fp-team-archive-single' ); 
			?>

		</li>
	<?php endwhile; ?>
	</ul>
<?php else: ?>
	<h2>No Team Members Found</h2>
<?php endif; ?>

<?php 

/**
 * fp-team-archive-after-team-list hook
 *
 */
do_action( 'fp-team-archive-after-team-list' );

/**
 * fp-team-archive-container-close hook
 *
 * @hooked FruitpackTeamHooks::archive_container_close - 10
 */
do_action( 'fp-team-archive-container-close' );

/**
 * ffp-team-archive-after hook
 *
 */
do_action( 'fp-team-archive-after' ); 
?>

<?php get_footer(); ?>