<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package foodgrower
 */
?>
<div id="secondary" class="widget-area col-sm-3 sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-foodgrower' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-foodgrower' ); ?>
	</div>
	<?php endif; ?>
</div>
