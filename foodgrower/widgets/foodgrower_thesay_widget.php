<?php
/*
Plugin Name: Widget Plugin
*/
class foodgrower_thesay_widget extends WP_Widget {

    // Controller
    function __construct() {
        $widget_ops = array('classname' => 'thesay_class', 'description' => __('Show the list of customer who give you feedback', 'wp_widget_plugin'));
        $control_ops = array('width' => 400, 'height' => 300);
        parent::WP_Widget(false, $name = __('FG - The Say', 'wp_widget_plugin'), $widget_ops, $control_ops );
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
              $args = array( 'taxonomy' => 'the_say_cat' );
              $terms = get_terms('the_say_cat', $args);

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
              <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Customer FeedBack Limit', 'wp_widget_plugin'); ?></label>
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

        $args = array( 'post_type' => 'the_say','tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'the_say_cat',
                    'field' => 'slug',
                    'terms' => $category
                )
            ),'posts_per_page' => $limit);

        $loop = new WP_Query( $args );

        ?>
          <div class="blockD">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h3><?php echo $title ?></h3>
                          <div class="blockD-box">
                               <div class="flexslider-thesay">
                                <ul class="slides">
                                  <?php   while ( $loop->have_posts() ) : $loop->the_post();  ?>
                                  <li>  
                                      <div class="blockD-content">
                                          <div class="blockD-content-box">
                                             <?php the_content();?>
                                          </div>
                                          <div class="blockD-content-author">
                                              - <?php the_title();?> -
                                          </div>
                                      </div>
                                  </li>
                                   <?php   endwhile; ?>          
                                </ul>
                              </div>
                                
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        <?php
       echo $after_widget;
    }
}


function register_thesay_widget() {
    register_widget( 'foodgrower_thesay_widget' );
}
add_action('widgets_init', 'register_thesay_widget');
?>