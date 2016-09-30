<?php
/**
 * The template for displaying all single pages.
 *
 * @package foodgrower
 */

get_header(); ?>
<div class="container innerpage">
	<div id="primary" class="content-area col-sm-9">
		<main id="main" class="site-main" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// Previous/next post navigation.
					//twentyfourteen_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						echo "<div class='single-comment'>";
						comments_template();
						echo "</div>";
					}
				endwhile;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
