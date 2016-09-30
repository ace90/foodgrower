<?php
/*
Plugin Name: Widget Plugin
Description: This will add to your featured in your homepage
Version: 1.0
*/
class foodgrower_featured_widget extends WP_Widget {

	// Controller
    function __construct() {
        $widget_ops = array('classname' => 'featured_class', 'description' => __('Add your featured post here. You can setup many featured you want by posting it', 'fg_widget_plugin'));
        $control_ops = array('width' => 400, 'height' => 300);
        parent::WP_Widget(false, $name = __('FG - Featured Post', 'fg_widget_plugin'), $widget_ops, $control_ops );
    }

    // constructor
    function wp_my_plugin() {
        parent::WP_Widget(false, $name = __('My Widget', 'fg_widget_plugin') );
    }

    /// widget form creation
    function form($instance) {

            // Check values
            if( $instance) {
                 $fg_category = esc_attr($instance['fg_category']);
                 $fg_category_num = esc_attr($instance['fg_category_num']);
            } else {
                 $fg_category = '';
                 $fg_category_num = '';
            }


            ?>

            <p>
            	<label>Select Category</label>
            	<?php 
            		 wp_dropdown_categories( array(
		              'hide_empty'       => 0,
		              'name'             => $this->get_field_name('fg_category'),
		              'orderby'          => 'name',
		              'hierarchical'     => true,
		               'selected'         =>  $fg_category,
		              'show_option_none' => __('None'),
		              'id' => $this->get_field_id('fg_category')
		          ) );
            	?>
            </p>
           
           <p>
           		<label>Number of Featured</label>        
           		<select id="<?php echo $this->get_field_id('fg_category_num'); ?>" name="<?php echo $this->get_field_name('fg_category_num') ?>">
           			<?php
           				for($x=2;$x<8;$x++){
           					$num_sel = ($fg_category_num == $x) ? "selected='selected'" : "";
           					echo "<option $num_sel value='$x'>$x</option>";
           				}
           			?>
           		</select>
           </p>
    <?php }

     function update($new_instance, $old_instance) {
          $instance = $old_instance;
          // Fields
          $instance['fg_category'] = strip_tags($new_instance['fg_category']);
          $instance['fg_category_num'] = strip_tags($new_instance['fg_category_num']);
         return $instance;
    }

        // display widget
    function widget($args, $instance) {
       extract( $args );
       // these are the widget options

       $fg_category = $instance['fg_category'];
        $fg_category_num = $instance['fg_category_num'];
       echo $before_widget;
       // Display the widget       ?>

       <div class="container">         
				   <div class="featured">
	    <?php 
	    $even=1;
		$args = array( 'posts_per_page' => $fg_category_num, 'category' => $fg_category);
        query_posts($args);
		if (have_posts()) : while (have_posts()) : the_post(); 
					

					if ($even % 2 == 0) {
					 $even = "pull-right";
					}?>
				        <div class="row blockB ek">
				        	<div class="col-sm-6 <?php echo $even;?> blockB-left">
				            	<div class="blockB-image">
				                	<?php the_post_thumbnail(); ?>
				                </div>
				            </div>
				            <div class="col-sm-6 blockB-right">
				            	<div class="blockB-text">
				                	<h3><?php the_title(); ?></h3>
									<?php $content = get_the_content(); echo mb_strimwidth($content, 0,300, '...');?>
				 					<a href="<?php the_permalink();?>" class="read-more">READ MORE</a>
				                </div>
				            </div>
				        </div>
		<?php 
			$even++;
			endwhile; 
		endif; ?>
		 </div>
		</div>		
		<?php 
       	echo $after_widget;
    }
}

function register_foodgrower_featured_widget() {
    register_widget( 'foodgrower_featured_widget' );
}
add_action('widgets_init', 'register_foodgrower_featured_widget');
?>