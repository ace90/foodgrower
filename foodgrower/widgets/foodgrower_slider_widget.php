<?php
/*
Plugin Name: Widget Plugin
Description: This will add to your slider in your homepage
Version: 1.0
*/
class foodgrower_slider_widget extends WP_Widget {

    // Controller
    function __construct() {
        $widget_ops = array('classname' => 'slider_class', 'description' => __('This will add to your slider in your homepage', 'fg_widget_plugin'));
        $control_ops = array('width' => 400, 'height' => 300);
        parent::WP_Widget(false, $name = __('FG - Slider', 'fg_widget_plugin'), $widget_ops, $control_ops );
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
                 $fg_detail = esc_attr($instance['fg_detail']);
                 $fg_link = esc_attr($instance['fg_link']);
                 $fg_button = esc_attr($instance['fg_button']);

                 
                 $fg_title2 = esc_attr($instance['fg_title2']);
                 $fg_image_src2 = esc_attr($instance['fg_image_src2']);
                 $fg_detail2 = esc_attr($instance['fg_detail2']);
                 $fg_link2 = esc_attr($instance['fg_link2']);
                 $fg_button2 = esc_attr($instance['fg_button2']);


                 $fg_title3 = esc_attr($instance['fg_title3']);
                 $fg_image_src3 = esc_attr($instance['fg_image_src3']);
                 $fg_detail3 = esc_attr($instance['fg_detail3']);
                 $fg_link3 = esc_attr($instance['fg_link3']);
                 $fg_button3 = esc_attr($instance['fg_button3']);

                 $fg_title4 = esc_attr($instance['fg_title4']);
                 $fg_image_src4 = esc_attr($instance['fg_image_src4']);
                 $fg_detail4 = esc_attr($instance['fg_detail4']);
                 $fg_link4 = esc_attr($instance['fg_link4']);
                 $fg_button4 = esc_attr($instance['fg_button4']);
            } else {
                 $fg_title = '';
                 $fg_image = '';
                 $fg_detail = '';
                 $fg_link = '';
                 $fg_button = '';

                 $fg_title2 = '';
                 $fg_image2 = '';
                 $fg_detail2 = '';
                 $fg_link2 = '';
                 $fg_button2 = '';

                 $fg_title3 = '';
                 $fg_image3 = '';
                 $fg_detail3 = '';
                 $fg_link3 = '';
                 $fg_button3 = '';

                 $fg_title4 = '';
                 $fg_image4 = '';
                 $fg_detail4 = '';
                 $fg_link4 = '';
                 $fg_button4 = '';
            }

            ?>

            <!-- slider 1 -->
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
                <label for="<?php echo $this->get_field_id('fg_detail'); ?>"><?php _e('Details', 'wp_widget_plugin'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('fg_detail'); ?>" name="<?php echo $this->get_field_name('fg_detail'); ?>"><?php echo $fg_detail; ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('fg_link'); ?>"><?php _e('Link', 'wp_widget_plugin'); ?></label>
                <input type="text" value="<?php echo $fg_link;?>" name="<?php echo $this->get_field_name('fg_link'); ?>" id="<?php $this->get_field_id('fg_link'); ?>" 
                class="widefat" />
            </p>
             <p>
                <label for="<?php echo $this->get_field_id('fg_button'); ?>"><?php _e('Button Name', 'wp_widget_plugin'); ?></label>
                <input type="text" value="<?php echo $fg_button;?>" name="<?php echo $this->get_field_name('fg_button'); ?>" id="<?php $this->get_field_id('fg_button'); ?>" 
                class="widefat" />
            </p>
            <div style="height:1px; background-color:#000;"></div>
              <!-- slider 2 -->
            <p>
                <label for="<?php echo $this->get_field_id('fg_title2'); ?>"><?php esc_html_e('Title ','foodgrower') ?></label>
                <input type="text" value="<?php echo $fg_title2;?>" name="<?php echo $this->get_field_name('fg_title2'); ?>" id="<?php $this->get_field_id('fg_title2'); ?>" 
                class="widefat" />
            </p>
            <p>
              <label for="<?php echo $this->get_field_name( 'fg_image_src2' ); ?>"><?php _e( 'Image:', 'foodgrower' ); ?></label>
              <div style="width:100%; height:120px; overflow:hidden;">
                  <img class="image_demo" id="img_demo_<?php echo $this->get_field_id( 'fg_image_src2' ); ?>" width="100%" src="<?php echo esc_url( $instance['fg_image_src2'] ); ?>" />
              </div>
              <input name="<?php echo $this->get_field_name( 'fg_image_src2' ); ?>" id="<?php echo $this->get_field_id( 'fg_image_src2' ); ?>" class="widefat fg_image_src2" type="hidden" value="<?php echo $fg_image_src2 ?>" /><br><br>
              <button id="<?php echo $this->get_field_id('fg_image_src_button2'); ?>" class="button button-primary custom_media_button" data-fieldid="<?php echo $this->get_field_id('fg_image_src2'); ?>"><?php _e( 'Upload Image','foodgrower' ); ?></button>  
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('fg_detail2'); ?>"><?php _e('Details', 'wp_widget_plugin'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('fg_detail2'); ?>" name="<?php echo $this->get_field_name('fg_detail2'); ?>"><?php echo $fg_detail2; ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('fg_link2'); ?>"><?php _e('Link', 'wp_widget_plugin'); ?></label>
                <input type="text" value="<?php echo $fg_link2;?>" name="<?php echo $this->get_field_name('fg_link2'); ?>" id="<?php $this->get_field_id('fg_link2'); ?>" 
                class="widefat" />
            </p>
             <p>
                <label for="<?php echo $this->get_field_id('fg_button2'); ?>"><?php _e('Button Name', 'wp_widget_plugin'); ?></label>
                <input type="text" value="<?php echo $fg_button2;?>" name="<?php echo $this->get_field_name('fg_button2'); ?>" id="<?php $this->get_field_id('fg_button2'); ?>" 
                class="widefat" />
            </p>
            <div style="height:1px; background-color:#000;"></div>
            <!-- slider 3 -->
            <p>
                <label for="<?php echo $this->get_field_id('fg_title3'); ?>"><?php esc_html_e('Title ','foodgrower') ?></label>
                <input type="text" value="<?php echo $fg_title3;?>" name="<?php echo $this->get_field_name('fg_title3'); ?>" id="<?php $this->get_field_id('fg_title3'); ?>" 
                class="widefat" />
            </p>
            <p>
              <label for="<?php echo $this->get_field_name( 'fg_image_src3' ); ?>"><?php _e( 'Image:', 'foodgrower' ); ?></label>
              <div style="width:100%; height:120px; overflow:hidden;">
                  <img class="image_demo" id="img_demo_<?php echo $this->get_field_id( 'fg_image_src3' ); ?>" width="100%" src="<?php echo esc_url( $instance['fg_image_src3'] ); ?>" />
              </div>
              <input name="<?php echo $this->get_field_name( 'fg_image_src3' ); ?>" id="<?php echo $this->get_field_id( 'fg_image_src3' ); ?>" class="widefat fg_image_src3" type="hidden" value="<?php echo $fg_image_src3 ?>" /><br><br>
              <button id="<?php echo $this->get_field_id('fg_image_src_button3'); ?>" class="button button-primary custom_media_button" data-fieldid="<?php echo $this->get_field_id('fg_image_src3'); ?>"><?php _e( 'Upload Image','foodgrower' ); ?></button>  
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('fg_detail3'); ?>"><?php _e('Details', 'wp_widget_plugin'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('fg_detail3'); ?>" name="<?php echo $this->get_field_name('fg_detail3'); ?>"><?php echo $fg_detail; ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('fg_link3'); ?>"><?php _e('Link', 'wp_widget_plugin'); ?></label>
                <input type="text" value="<?php echo $fg_link3;?>" name="<?php echo $this->get_field_name('fg_link3'); ?>" id="<?php $this->get_field_id('fg_link3'); ?>" 
                class="widefat" />
            </p>
             <p>
                <label for="<?php echo $this->get_field_id('fg_button3'); ?>"><?php _e('Button Name', 'wp_widget_plugin'); ?></label>
                <input type="text" value="<?php echo $fg_button3;?>" name="<?php echo $this->get_field_name('fg_button3'); ?>" id="<?php $this->get_field_id('fg_button3'); ?>" 
                class="widefat" />
            </p>
            <div style="height:1px; background-color:#000;"></div>
             <!-- slider 4 -->
            <p>
                <label for="<?php echo $this->get_field_id('fg_title4'); ?>"><?php esc_html_e('Title ','foodgrower') ?></label>
                <input type="text" value="<?php echo $fg_title4;?>" name="<?php echo $this->get_field_name('fg_title4'); ?>" id="<?php $this->get_field_id('fg_title4'); ?>" 
                class="widefat" />
            </p>
            <p>
              <label for="<?php echo $this->get_field_name( 'fg_image_src4' ); ?>"><?php _e( 'Image:', 'foodgrower' ); ?></label>
              <div style="width:100%; height:120px; overflow:hidden;">
                  <img class="image_demo" id="img_demo_<?php echo $this->get_field_id( 'fg_image_src4' ); ?>" width="100%" src="<?php echo esc_url( $instance['fg_image_src4'] ); ?>" />
              </div>
              <input name="<?php echo $this->get_field_name( 'fg_image_src4' ); ?>" id="<?php echo $this->get_field_id( 'fg_image_src4' ); ?>" class="widefat fg_image_src4" type="hidden" value="<?php echo $fg_image_src4 ?>" /><br><br>
              <button id="<?php echo $this->get_field_id('fg_image_src_button4'); ?>" class="button button-primary custom_media_button" data-fieldid="<?php echo $this->get_field_id('fg_image_src4'); ?>"><?php _e( 'Upload Image','foodgrower' ); ?></button>  
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('fg_detail4'); ?>"><?php _e('Details', 'wp_widget_plugin'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('fg_detai4l'); ?>" name="<?php echo $this->get_field_name('fg_detail4'); ?>"><?php echo $fg_detail4; ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('fg_link4'); ?>"><?php _e('Link', 'wp_widget_plugin'); ?></label>
                <input type="text" value="<?php echo $fg_link4;?>" name="<?php echo $this->get_field_name('fg_link4'); ?>" id="<?php $this->get_field_id('fg_link4'); ?>" 
                class="widefat" />
            </p>
             <p>
                <label for="<?php echo $this->get_field_id('fg_button4'); ?>"><?php _e('Button Name', 'wp_widget_plugin'); ?></label>
                <input type="text" value="<?php echo $fg_button4;?>" name="<?php echo $this->get_field_name('fg_button4'); ?>" id="<?php $this->get_field_id('fg_button4'); ?>" 
                class="widefat" />
            </p>

    <?php 
        
    }

    // widget update
    // update widget
    function update($new_instance, $old_instance) {
          $instance = $old_instance;
          // Fields
          $instance['fg_title'] = strip_tags($new_instance['fg_title']);
          $instance['fg_image_src'] = strip_tags($new_instance['fg_image_src']);
          $instance['fg_detail'] = strip_tags($new_instance['fg_detail']);
          $instance['fg_link'] = strip_tags($new_instance['fg_link']);
          $instance['fg_button'] = strip_tags($new_instance['fg_button']);

           $instance['fg_title2'] = strip_tags($new_instance['fg_title2']);
          $instance['fg_image_src2'] = strip_tags($new_instance['fg_image_src2']);
          $instance['fg_detail2'] = strip_tags($new_instance['fg_detail2']);
          $instance['fg_link2'] = strip_tags($new_instance['fg_link2']);
          $instance['fg_button2'] = strip_tags($new_instance['fg_button2']);

           $instance['fg_title3'] = strip_tags($new_instance['fg_title3']);
          $instance['fg_image_src3'] = strip_tags($new_instance['fg_image_src3']);
          $instance['fg_detail3'] = strip_tags($new_instance['fg_detail3']);
          $instance['fg_link3'] = strip_tags($new_instance['fg_link3']);
          $instance['fg_button3'] = strip_tags($new_instance['fg_button3']);

           $instance['fg_title4'] = strip_tags($new_instance['fg_title4']);
          $instance['fg_image_src4'] = strip_tags($new_instance['fg_image_src4']);
          $instance['fg_detail4'] = strip_tags($new_instance['fg_detail4']);
          $instance['fg_link4'] = strip_tags($new_instance['fg_link4']);
          $instance['fg_button4'] = strip_tags($new_instance['fg_button4']);
         return $instance;
    }


    // display widget
    function widget($args, $instance) {
       extract( $args );
       // these are the widget options
       $fg_title = apply_filters('widget_title', $instance['fg_title']);
       $fg_image_src = $instance['fg_image_src'];
       $fg_detail = $instance['fg_detail'];
       $fg_link = $instance['fg_link'];
       $fg_button = $instance['fg_button'];

        $fg_title2 = apply_filters('widget_title', $instance['fg_title2']);
       $fg_image_src2 = $instance['fg_image_src2'];
       $fg_detail2 = $instance['fg_detail2'];
       $fg_link2 = $instance['fg_link2'];
       $fg_button2 = $instance['fg_button2'];

        $fg_title3 = apply_filters('widget_title', $instance['fg_title3']);
       $fg_image_src3 = $instance['fg_image_src3'];
       $fg_detail3 = $instance['fg_detail3'];
       $fg_link3 = $instance['fg_link3'];
       $fg_button3 = $instance['fg_button3'];

        $fg_title4 = apply_filters('widget_title', $instance['fg_title4']);
       $fg_image_src4 = $instance['fg_image_src4'];
       $fg_detail4 = $instance['fg_detail4'];
       $fg_link4 = $instance['fg_link4'];
       $fg_button4 = $instance['fg_button4'];
       echo $before_widget;
       // Display the widget       
       ?>
            <section id="banner">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12">
                         <?php if($fg_image_src || $fg_image_src2 || $fg_image_src3 || $fg_image_src4):?>
                          <div class="banner-box">
                                 <div class="flexslider">
                                  <ul class="slides">
                                    <?php if( $fg_image_src):?>
                                    <li>
                                        <div class="banner-image"><img class="img-responsive" src="<?php echo $fg_image_src?>"></div>
                                        <div class="banner-text">
                                          <div>
                                          <h3><?php echo $fg_title ?></h3>
                                          <p><?php echo $fg_detail ?></p>
                                          <a href="<?php echo  $fg_link; ?>"><?php echo $fg_button; ?></a>
                                        </div>
                                        </div>
                                    </li> 
                                     <?php endif;?>
                                      <?php if( $fg_image_src2):?>
                                    <li>
                                        <div class="banner-image"><img class="img-responsive" src="<?php echo $fg_image_src2?>"></div>
                                        <div class="banner-text">
                                          <div>
                                          <h3><?php echo $fg_title2 ?></h3>
                                          <p><?php echo $fg_detail2 ?></p>
                                          <a href="<?php echo  $fg_link2; ?>"><?php echo $fg_button2; ?></a>
                                        </div>
                                        </div>
                                    </li> 
                                     <?php endif;?>
                                     <?php if( $fg_image_src3):?>
                                     <li>
                                        <div class="banner-image"><img class="img-responsive" src="<?php echo $fg_image_src3?>"></div>
                                        <div class="banner-text">
                                          <div>
                                          <h3><?php echo $fg_title3 ?></h3>
                                          <p><?php echo $fg_detail3 ?></p>
                                          <a href="<?php echo  $fg_link3; ?>"><?php echo $fg_button3; ?></a>
                                        </div>
                                        </div>
                                    </li> 
                                     <?php endif;?>
                                     <?php if( $fg_image_src4):?>
                                    <li>
                                        <div class="banner-image"><img class="img-responsive" src="<?php echo $fg_image_src4?>"></div>
                                        <div class="banner-text">
                                          <div>
                                          <h3><?php echo $fg_title4 ?></h3>
                                          <p><?php echo $fg_detail4 ?></p>
                                          <a href="<?php echo  $fg_link4; ?>"><?php echo $fg_button4; ?></a>
                                        </div>
                                        </div>
                                    </li> 
                                     <?php endif;?>                       
                                  </ul>
                                </div>
                            </div>
                        </div>
                      <?php else:?>
                      <div class="inner" style="padding-top:80px">
                          Please provide image in your slider
                      </div>
                      <?php endif;?>
                    </div>
                </div>
            </section>
       <?php 
       echo $after_widget;
    }
}


function register_foodgrower_slider_widget() {
    register_widget( 'foodgrower_slider_widget' );
}
add_action('widgets_init', 'register_foodgrower_slider_widget');
?>