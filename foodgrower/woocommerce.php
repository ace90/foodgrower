<?php
/**
 * The template for displaying all pages.
 *
 * @package foodgrower
 */

get_header(); ?>
<div class="container inner woocommercehere">
	<div id="primary" class="content-area col-sm-9">
		<main id="main" class="site-main" role="main">

			<?php 
				if ( is_singular( 'product' ) ) {
					?>
				<div class="single-product-woo">
					<?php woocommerce_content(); ?>
				</div>
			<?php
		  	}else{
		   		//For ANY product archive.
		   		//Product taxonomy, product search or /shop landing
		    	woocommerce_get_template( 'archive-product.php' );
		  	}?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="secondary" class="widget-area col-sm-3 sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'shop-sidebar-foodgrower' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'shop-sidebar-foodgrower' ); ?>
	</div>
	<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>
