<?php
/*
Plugin Name: Widget Plugin
Description: This will add to your featured in your homepage
Version: 1.0
*/
class foodgrower_bottombanner_widget extends WP_Widget {

	// Controller
    function __construct() {
        $widget_ops = array('classname' => 'bottombanner_class', 'description' => __('You might interested adding an advertisement or link that direct to your booking form', 'fg_widget_plugin'));
        $control_ops = array('width' => 400, 'height' => 300);
        parent::WP_Widget(false, $name = __('FG - Bottom Banner', 'fg_widget_plugin'), $widget_ops, $control_ops );
    }

    // constructor
    function wp_my_plugin() {
        parent::WP_Widget(false, $name = __('My Widget', 'fg_widget_plugin') );
    }

    /// widget form creation
    function form($instance) {

            // Check values
            if( $instance) {
                 $fg_title = esc_attr($instance['fg_title']);
                 $fg_image_src = esc_attr($instance['fg_image_src']);
                 $fg_link = esc_attr($instance['fg_link']);
                 $fg_button_name = esc_attr($instance['fg_button_name']);
            } else {
                  $fg_title = '';
                 $fg_image = '';
                 $fg_link = '';
                 $fg_button_name = '';
            }


            ?>

              <p>
                <label for="<?php echo $this->get_field_id('fg_title'); ?>"><?php esc_html_e('Title ','foodgrower') ?></label>
                <input type="text" value="<?php echo $fg_title;?>" name="<?php echo $this->get_field_name('fg_title'); ?>" id="<?php $this->get_field_id('fg_title'); ?>" 
                class="widefat" />
              </p>
              
              <p>
                <label for="<?php echo $this->get_field_name( 'fg_image_src' ); ?>"><?php _e( 'Image:', 'foodgrower' ); ?></label>
                <div style="width:100%; height:120px; overflow:hidden;">
                    <img class="image_demo" id="img_demo_<?php echo $this->get_field_id( 'fg_image_src' ); ?>" width="100%" src="<?php echo esc_url( $instance['fg_image_src'] ); ?>" />
                </div>
                <input name="<?php echo $this->get_field_name( 'fg_image_src' ); ?>" id="<?php echo $this->get_field_id( 'fg_image_src' ); ?>" class="widefat fg_image_src" type="hidden" value="<?php echo $fg_image_src ?>" /><br><br>
                <button id="<?php echo $this->get_field_id('fg_image_src_button'); ?>" class="button button-primary custom_media_button" data-fieldid="<?php echo $this->get_field_id('fg_image_src'); ?>"><?php _e( 'Upload Image','foodgrower' ); ?></button>  
              </p>

               <p>
                <label for="<?php echo $this->get_field_id('fg_button_name'); ?>"><?php esc_html_e('Button Name','foodgrower') ?></label>
                <input type="text" value="<?php echo $fg_button_name;?>" name="<?php echo $this->get_field_name('fg_button_name'); ?>" id="<?php $this->get_field_id('fg_button_name'); ?>" 
                class="widefat" />
              </p>

               <p>
                <label for="<?php echo $this->get_field_id('fg_link'); ?>"><?php esc_html_e('Button Link','foodgrower') ?></label>
                <input type="text" value="<?php echo $fg_link;?>" name="<?php echo $this->get_field_name('fg_link'); ?>" id="<?php $this->get_field_id('fg_link'); ?>" 
                class="widefat" />
              </p>

              
    <?php }

     function update($new_instance, $old_instance) {
          $instance = $old_instance;
          // Fields
          $instance['fg_title'] = strip_tags($new_instance['fg_title']);
          $instance['fg_image_src'] = strip_tags($new_instance['fg_image_src']);
          $instance['fg_link'] = strip_tags($new_instance['fg_link']);
          $instance['fg_button_name'] = strip_tags($new_instance['fg_button_name']);
          return $instance;
    }

        // display widget
    function widget($args, $instance) {
       extract( $args );
       // these are the widget options

        $fg_title = $instance['fg_title'];
        $fg_image_src = $instance['fg_image_src'];
        $fg_link = $instance['fg_link'];
        $fg_button_name = $instance['fg_button_name'];
       echo $before_widget;
       // Display the widget       ?>

           <div class="blockC">
            <div class="blockC-image"><img class="img-responsive" src="<?php echo $fg_image_src?>"></div>
              <div class="blockC-text">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><?php echo $fg_title;?></h3>
                            <a href="<?php echo $fg_link ?>"><?php echo $fg_button_name ?></a>
                          </div>
                      </div>
                  </div>          
              </div>
          </div>
		<?php 
       	echo $after_widget;
    }
}

function register_foodgrower_bottombanner_widget() {
    register_widget( 'foodgrower_bottombanner_widget' );
}
add_action('widgets_init', 'register_foodgrower_bottombanner_widget');
?>