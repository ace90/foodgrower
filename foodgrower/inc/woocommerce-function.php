<?php

/**
*  display watchout product
*/
add_action( 'wp_ajax_add_foobar', 'prefix_ajax_add_foobar' );
add_action( 'wp_ajax_nopriv_add_foobar', 'prefix_ajax_add_foobar' );

function prefix_ajax_add_foobar() {
   $product_id  = intval( $_POST['product_id'] );
    // add code the add the product to your cart
    global $woocommerce;
 
    query_posts("p=".$product_id."&post_type=product");
	while (have_posts()): the_post(); 
	   $_product = wc_get_product(get_the_ID());
	      global $product;
	   $html  = "<h2>".get_the_title()."</h2>";
	   $html .= "<div class='pickone_woo row'>";
	   $html .= "<div class='col-sm-5'>".woocommerce_get_product_thumbnail()."<div class='text-center pickbutton'>".                   
                    apply_filters( 'woocommerce_loop_add_to_cart_link',
                        sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s add-to-cart add-cart-nowx">%s</a>',
                          esc_url( '?add-to-cart='. get_the_ID()),
                          esc_attr( isset( $quantity ) ? $quantity : 1 ),
                          esc_attr( $product->id ),
                          esc_attr( $product->get_sku() ),
                          esc_attr( isset( $class ) ? $class : 'button' ),
                          esc_html( $product->add_to_cart_text() )
                        ),
                      $product ).                    
	   			"</div></div>";
	   $html .= "<div class='col-sm-7 '>
	   			<h3>Description</h3>
	   			<div class='woo-desc'>".get_post($product_id)->post_content."</div>";
	   $html .= '<div class="blockE-price clearfix">';
                 if($_product->get_regular_price()):
       $html .=  '<div class="discount-price">'.get_woocommerce_currency_symbol(). $_product->get_regular_price().'</div>';
                 endif;
                 if($_product->get_price()):
       $html .=  '<div class="real-price">'.get_woocommerce_currency_symbol().$_product->get_price().'</div>';
                 endif;
	   $html .= "</div></div>";
	   echo $html;
	endwhile;                

    die();
}


/**
* add to cart and ajax
**/
add_action( 'wp_ajax_add_cart_now2', 'prefix_ajax_add_cart_now2' );
add_action( 'wp_ajax_nopriv_add_cart_now2', 'prefix_ajax_add_cart_now2' );

function prefix_ajax_add_cart_now2(){
	global $woocommerce;
    $cart = $woocommerce->cart->cart_contents;
    echo  WC()->cart->get_cart_contents_count() + 1;
    die();
}


/**
* add to cart and ajax
**/
add_action( 'wp_ajax_add_cart_now', 'prefix_ajax_add_cart_now' );
add_action( 'wp_ajax_nopriv_add_cart_now', 'prefix_ajax_add_cart_now' );

function prefix_ajax_add_cart_now(){

	 $product_id  = intval( $_POST['product_id'] );
	 	global $woocommerce;
		//echo do_shortcode('[add_to_cart id="{$product_id}"]');

	 die();
}



function woocommerce_watchout(){

	if ( class_exists( 'WooCommerce' )) {
?>
		<div class="woocommerce_watchout">
				<div class="woocommerce_watchout_container container">
					<a href="javascript_void(0)" class="closex">x</a>
					<div>
					</div>
				</div>
		</div>
<?php
	}
}


add_action('foodgrower_header_right',woocommerce_search);

function woocommerce_search(){               
?>
	 <div class="search-box clearfix ">
                <div class="pull-right">
		<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ) ?>">
		    <div>
		      <input type="text" value="<?php echo get_search_query()?>" name="s" id="s" placeholder="search...." />
		      <input type="submit" id="searchsubmit" value="" />
		      <?php if ( class_exists( 'WooCommerce' )):?>
		      	<input type="hidden" name="post_type" value="product" />
		  	  <?php endif;?>
		    </div>
		 </form>

	  </div>
    </div>
<?php 
}


/**
* woocommerce check items
**/

if ( ! function_exists( 'foodgrower_header_cart' ) ) {
	/**
	 * Display Header Cart
	 *
	 */

	add_action('foodgrower_cart_view','foodgrower_header_cart');
	function foodgrower_header_cart() {
		if ( class_exists( 'WooCommerce' ) ) {
			?>
			<div class="cart">
		                       
					<ul class="foodgrower-box-woo">
						<li class="clearfix">
							<?php foodgrower_cart_link(); ?>   
							<div class="foodgrower-woo-cart" >
									<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
							</div>
						</li>
						
					</ul>
			</div>
			<?php
		}
	}
}


if ( ! function_exists( 'foodgrower_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 */
	function foodgrower_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
				<span class="count"><?php echo wp_kses_data( sprintf( _n( '%d ', '%d ', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) );?></span>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cart.jpg" class="img-responsive">
			</a>
		<?php
	}
}






?>