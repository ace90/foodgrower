<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta charset=iso-8859-1>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name = "format-detection" content = "telephone=no" />
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,400i,500,700,700i" rel="stylesheet">

<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
</head>
<body <?php body_class(); ?>>		
<header id="header" class="site-header">
	  <div class="container">
      <div class="row">
          <div class="col-sm-3 header-left">
                  <?php foodgrower_logo() ?>
            </div>
            <div  class="col-sm-9 header-right">
            <?php do_action("foodgrower_header_right") ?>
              <div id="menu">
              <nav class="navbar navbar-default"> 
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button aria-expanded="false" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed menu-mobile" type="button"> <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/mobile-menu.png"> </button>
                  </div>
                  
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                    <!-- START MENU HERE -->
                        <?php foodgrower_header_menu();?>
                    <!-- END MENU HERE -->
                  </div>
                  <!-- /.navbar-collapse --> 
                </nav>
                <?php do_action("foodgrower_cart_view");?>
               </div>
              
            </div>
        </div>
    </div>
</header>
<div class="dummy-header"></div>


