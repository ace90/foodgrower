<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package foodgrower
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'unite' ),
				'after'  => '</div>',
			) );

			edit_post_link( __( 'Edit', 'foodgrower' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
