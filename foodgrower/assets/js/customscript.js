var template = {
	header:function(){	
		$(window).scroll(function(){
				 var scrollTop = $(window).scrollTop();
				if(scrollTop>=250){
					var d = $("#header").hasClass("headT");

					if(!d){
						$("#header").addClass("headT");
					}

				}else{
					$("#header").removeClass("headT");
				}

				template.menuAdjust();
		});
		
		template.menuAdjust();
		 
	},
	bodyScroll:function(){
		
		var d = $(window).height();
		$(window).scroll(function(){
				
				$(".ek").each(function(){
					var x = $(this).offset().top;
					var scrollTop = $(window).scrollTop();
					var d = $(window).height();
					if(scrollTop >= (x - d)){
						$(this).addClass('arr');
					}				
				});
		});
	},
	menuAdjust:function(){

		var k = $(window).width();
		var mobileWidth = $(window).width();
		if(mobileWidth <= 768){

			$("#header").removeClass("headT");
		}
	
		$(window).on('resize', function(){

			var mobileWidth = $(this).width();
			if(mobileWidth <= 768){

				$("#header").removeClass("headT");
			}
		});	
	},
	woocommerce_watchout:function(){

		$('.watchout').click(function(){
			var product_id = $(this).attr('rel');

			var data = {
                action: 'add_foobar',
                product_id: product_id
            };

            jQuery.post('/wp-admin/admin-ajax.php' , data, function(response) {
                if(response != 0) {
                   $(".woocommerce_watchout_container div").html(response);
                   $(".woocommerce_watchout").css('display','block');
                } 

            });
            
			return false;
		});

		$(".closex").click(function(){
			$(".woocommerce_watchout").css('display','none');
			$(".woocommerce_watchout_container div").html('');
			return false;
		});
	},
	woocommerce_add_to_cart:function(){
	    
	    $(document).on('click','.add-cart-nowx', function() { // code
			var product_id = $(this).attr('rel');			
			
			var data = {
                action: 'add_cart_now',
                product_id: product_id
            };

             jQuery.post('/wp-admin/admin-ajax.php' , data, function(response) {
                if(response != 0) {
                   alert(response);
                } 

            });
             return false;
		});
	},
	woocommerce_item_count:function(){

		$(document).on('click','.ajax_add_to_cart',function(){


			var data = {
                action: 'add_cart_now2',
                 product_id:1
            };

             jQuery.post('/wp-admin/admin-ajax.php' , data, function(response) {
                if(response != 0) {
                   $('.cart-contents span').html(response);
                } 

            });

			return false;
		});

		
	}
};

$(document).ready(function(){
	
	template.header();
	template.woocommerce_watchout();
	template.bodyScroll();
	template.woocommerce_item_count();

	$(window).load(function(){
      $('.flexslider').flexslider({
        animation: "fade",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });

       $('.flexslider-thesay').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
});