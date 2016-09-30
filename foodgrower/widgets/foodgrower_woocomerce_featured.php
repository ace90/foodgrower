<?php
/*
Plugin Name: Widget Plugin
*/
class foodgrower_woocommerce_featured extends WP_Widget {

    // Controller
    function __construct() {
        $widget_ops = array('classname' => 'fg_woommerce_class', 'description' => __('Display the category you add in your woocommerce', 'wp_widget_plugin'));
        $control_ops = array('width' => 400, 'height' => 300);
        parent::WP_Widget(false, $name = __('FG - Woocommerce Featured Product', 'wp_widget_plugin'), $widget_ops, $control_ops );
    }

    // constructor
    function wp_my_plugin() {
        parent::WP_Widget(false, $name = __('My Theme widget Woocommerce', 'wp_widget_plugin') );
    }


    /// widget form creation
    function form($instance) {

            // Check values
            if( $instance) {
                 $title = esc_attr($instance['title']);
                 $category = esc_attr($instance['category']);
                 $limit = esc_attr($instance['limit']);
           
            } else {
                 $title = '';
                 $limit = '';
                 $category = '';  
            }

?>

            <p>
              <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title ','food grower') ?></label>
              <input type="text" value="<?php echo $title;?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php $this->get_field_id('title'); ?>" class="widefat" />
            </p>
              
            <p>
              <label>Select Category</label>
              <select name="<?php echo $this->get_field_name('category'); ?>" id="<?php $this->get_field_id('category'); ?>">
             <?php 
              $args = array( 'taxonomy' => 'product_cat' );
              $terms = get_terms('product_cat', $args);

              if (count($terms) > 0) {
                  foreach ($terms as $term) { 
                      $sel = ($term->term_id == $category) ? "selected='selected'" : "";                      
                      echo "<option {$sel} value='$term->slug'>{$term->name}</option>";
                  }
              }
        
             ?>
              </select>
            </p>
            <p>
              <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Product Limit', 'wp_widget_plugin'); ?></label>
              <input type="text" value="<?php echo $limit;?>" name="<?php echo $this->get_field_name('limit'); ?>" id="<?php $this->get_field_id('limit'); ?>" lass="widefat" /> 
            </p>
    <?php }

    // widget update
    // update widget
    function update($new_instance, $old_instance) {
          $instance = $old_instance;
          // Fields
          $instance['title'] = strip_tags($new_instance['title']);
          $instance['limit'] = strip_tags($new_instance['limit']);
          $instance['category'] = strip_tags($new_instance['category']);
         return $instance;
    }


    // display widget
    function widget($args, $instance) {
       extract( $args );
       // these are the widget options
       $title = apply_filters('widget_title', $instance['title']);
       $limit = $instance['limit'];
       $category = $instance['category'];
       echo $before_widget;
       // Display the widget       

        $args = array( 'post_type' => 'product','tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $category
                )
            ),'posts_per_page' => $limit);

        $loop = new WP_Query( $args );

        ?>
          <div class="blockE clearfix">
            <ul>                
                  <?php   while ( $loop->have_posts() ) : $loop->the_post();  ?>
                   <li rel="<?php echo get_the_ID()?>">

                      <div class="blockE-image"><?php echo  woocommerce_get_product_thumbnail();?></div>
                      <div class="blockE-text">
                        <?php $_product = wc_get_product(get_the_ID());?>
                        <h3><?php echo get_the_title() ?></h3>
                          <div class="blockE-price">
                            <?php if($_product->get_regular_price()): ?>
                            <div class="discount-price"><?php  echo get_woocommerce_currency_symbol(). $_product->get_regular_price();?></div>
                            <?php endif;
                            if($_product->get_price()):
                            ?>
                              <div class="real-price"><?php echo get_woocommerce_currency_symbol().$_product->get_price(); ?></div>
                            <?php endif;?>
                          </div>
                          <div class="text-center">
                           <?php 
                      global $product;
                      echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                        sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s add-to-cart">%s</a>',
                          esc_url( $product->add_to_cart_url() ),
                          esc_attr( isset( $quantity ) ? $quantity : 1 ),
                          esc_attr( $product->id ),
                          esc_attr( $product->get_sku() ),
                          esc_attr( isset( $class ) ? $class : 'button' ),
                          esc_html( $product->add_to_cart_text() )
                        ),
                      $product );
                    ?></div>
                      </div> 
                    </li>
                    <?php   endwhile; ?>                      
              </ul>
          </div>
        <?php
       echo $after_widget;
    }
}


function register_woocommerce_featured() {
    register_widget( 'foodgrower_woocommerce_featured' );
}
add_action('widgets_init', 'register_woocommerce_featured');
?>