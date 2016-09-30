<?php
/**
 * Template Name: Home Page
 *
 * Displays the Home page with slider
 *
 */
?>

<?php get_header(); ?>
<?php
    if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( 'fg_homepage' ) ):  ?>  
    	<div>Add widgets here</div>
    <?php endif; ?>
    
<?php get_footer(); ?>