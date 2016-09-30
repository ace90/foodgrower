<footer id="footer">

	 <?php if ( is_active_sidebar('footer_one') || is_active_sidebar('footer_two') || is_active_sidebar('footer_three') ) : ?>
	<div class="container">
    	<div class="row">
        	<div class="col-sm-4">
                <?php dynamic_sidebar( 'footer_one'); ?> 
            </div>
            <div class="col-sm-4">
                <?php dynamic_sidebar( 'footer_two'); ?> 
            </div>
            <div class="col-sm-4">
                <?php dynamic_sidebar( 'footer_three'); ?> 
            </div>
        </div>
    </div>
<?php endif; ?>
    <div class="container">
            <div class="row">
                    <div class="col-sm-12 website-by">
                        <span>nindotatemplate@copyright 2016</span>
                    </div>
            </div>
    </div>
</footer>

<?php 
woocommerce_watchout();

wp_footer(); ?>
</body>
</html>