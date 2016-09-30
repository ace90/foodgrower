<?php 
/**
 * Enqueues scripts and styles.
 *
 * @since Food Grower 1.0
 */


 if ( ! function_exists( 'foodgrower_widgets_init' ) ) {

 	function foodgrower_widgets_init() {

 		register_sidebar( array(
			'name'          => __( 'Homepage', 'food grower' ),
			'id'            => 'fg_homepage',
			'description'   => __( 'Display at the homepage template.', 'food grower' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

 		register_sidebar( array(
			'name'          => __( 'Footer One', 'food grower' ),
			'id'            => 'footer_one',
			'description'   => __( 'Display at the footer part.', 'food grower' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar( array(
			'name'          => __( 'Footer Two', 'food grower' ),
			'id'            => 'footer_two',
			'description'   => __( 'Display at the footer part.', 'food grower' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar( array(
			'name'          => __( 'Footer Three', 'food grower' ),
			'id'            => 'footer_three',
			'description'   => __( 'Display at the footer part.', 'food grower' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar( array(
            'name'          => __( 'Sidebar', 'food grower' ),
            'id'            => 'sidebar-foodgrower',
            'description'   => __( 'Display the content in your sidebar.', 'food grower' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s sidebox">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));

        register_sidebar( array(
            'name'          => __( 'Shop Sidebar', 'food grower' ),
            'id'            => 'shop-sidebar-foodgrower',
            'description'   => __( 'Display the content in your sidebar.', 'food grower' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s sidebox">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));

 	}

 	add_action( 'widgets_init', 'foodgrower_widgets_init' );

}

if ( ! function_exists( 'foodgrower_scripts' ) ) {
	 function foodgrower_scripts() {		
		 wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css');
		 wp_register_style( 'flexslider', get_stylesheet_directory_uri() . '/assets/css/flexslider.css');
         wp_enqueue_style( 'foodgrower-style', get_stylesheet_directory_uri() . '/style.css');
		 wp_enqueue_style( 'bootstrap' );
		 wp_enqueue_style( 'flexslider' );

		 wp_enqueue_script( 'foodgrower-jquery', get_stylesheet_directory_uri()  . '/assets/js/jquery.js', array('jquery'), '23546', true );
		 wp_enqueue_script( 'foodgrower-bootstrap.min', get_stylesheet_directory_uri()  . '/assets/js/bootstrap.min.js', array('jquery'), '2016018', true );
		 wp_enqueue_script( 'foodgrower-customscript', get_stylesheet_directory_uri()  . '/assets/js/customscript.js', array('jquery'), '20160119', true );	    
	     wp_enqueue_script( 'foodgrower-flexslider', get_stylesheet_directory_uri()  . '/assets/js/jquery.flexslider.js', array('jquery'), '20160118', true );
	      
	}

	add_action( 'wp_enqueue_scripts', 'foodgrower_scripts' );
}


if ( ! function_exists( 'foodgrower_header_menu' ) ) :
include_once('inc/navwalker.php');
/**
 * Header menu (should you choose to use one)
 */
function foodgrower_header_menu() {
  // display the WordPress Custom Menu if available
  wp_nav_menu(array(
    'menu'              => 'primary',
    'menu_id'           => 'menux',
    'theme_location'    => '',
    'depth'             => 3,
    'container'         => 'div',
    'container_class'   => '',
    'menu_class'        => 'navbar-nav nav',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'   			=> new  wp_bootstrap_navwalker()
  ));
} /* end header menu */
endif;


if ( ! function_exists( 'foodgrower_admin_script' ) ) :
// add admin scripts
function foodgrower_admin_script($hook) {

    wp_enqueue_media();
    
    if( $hook == 'widgets.php' || $hook == 'customize.php' ){     
      wp_enqueue_script('widget-js', get_stylesheet_directory_uri()  . '/assets/js/widget.js', array('media-upload'), '1.0', true); 
    }
}
add_action('admin_enqueue_scripts', 'foodgrower_admin_script');
endif;

/******** INCLUDES AREA for widgets **********/
include_once('widgets/foodgrower_slider_widget.php');
include_once('widgets/foodgrower_featured_widget.php');
include_once('widgets/foodgrower_bottombanner_widget.php');
include_once('widgets/foodgrower_woocomerce_featured.php');
include_once('widgets/foodgrower_thesay_widget.php');

/****INCLUDES CUSTOMIZE****/
include_once('inc/customize/foodgrower-customize-class.php');

/**ADDING YOUR CUSTOMER FEEDBACK HERE**/
function foodgrower_the_say(){
 
    $labels = array(
        'name' => _x( 'The Say', 'the_say' ),
        'singular_name' => _x( 'The Say', 'the_say' ),
        'add_new' => _x( 'Add Customer', 'the_say' ),
        'add_new_item' => _x( 'Add Customer Name', 'the_say' ),
        'edit_item' => _x( 'Edit the say', 'the_say' ),
        'new_item' => _x( 'New Customer Feedback', 'the_say' ),
        'view_item' => _x( 'View the say', 'the_say' ),
        'search_items' => _x( 'Search the say', 'the_say' ),
        'not_found' => _x( 'No customer feedback found', 'the_say' ),
        'not_found_in_trash' => _x( 'No customer feedback found in Trash', 'the_say' ),
        'parent_item_colon' => _x( 'Parent the say:', 'the_say' ),
        'menu_name' => _x( 'the say', 'the_say' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List of feedback from customer to display',
        'supports' => array( 'title', 'editor'),
        'taxonomies' => array('the_say_cat'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' =>true,
        'menu_position' => 5,
        'menu_icon' => false,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'the_say', $args );
}
 
add_action( 'init', 'foodgrower_the_say' );


//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_thesay_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_thesay_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'menu_name' => __( 'Categories' ),
  );  

// Now register the taxonomy

  register_taxonomy('the_say_cat',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'the_say' ),
  ));

}

/****WOOCOMMERCE START HERE****/
include_once('inc/woocommerce-function.php');

function loop_columns() {
return 3; // 5 products per row
}
add_filter('loop_shop_columns', 'loop_columns', 999);

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

/**
* adding function to header.php
**/
function foodgrower_logo(){?>
		<?php if ( get_theme_mod( 'foodgrower_image_upload' ) ) : 

                  $themelogo = get_theme_mod( 'foodgrower_image_upload' );

                  $themelogo_size = getimagesize($themelogo);

                  $themelogo_width = $themelogo_size[0];

                  $themelogo_height = $themelogo_size[1];

              ?>
              <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src='<?php echo esc_url( get_theme_mod( 'foodgrower_image_upload' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> Logo' class="img-responsive full" height="<?php echo($themelogo_height);?>" width="<?php echo($themelogo_width);?>"></a>
			<?php else: ?>
					<?php
					 if ( is_front_page() && is_home() ) : ?>
					  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					 <?php else : ?>
					  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					 <?php endif;

					 $description = get_bloginfo( 'description', 'display' );
					 if ( $description || is_customize_preview() ) : ?>
					  <p class="site-description"><?php echo $description; ?></p>
					 <?php endif;?>
            <?php endif;?>     
<?php }
?>