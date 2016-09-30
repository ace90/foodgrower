<?php
/**
 * Template Name: Inner without sidebar
 *
 * Displays the Home page with slider
 *
 */
?>

<?php get_header(); ?>
<div class="container inner pagehere">
	<div id="primary" class="content-area col-sm-10">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div>
    
<?php get_footer(); ?>