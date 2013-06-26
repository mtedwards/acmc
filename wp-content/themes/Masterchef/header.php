<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <header class="mainhead" role="banner">
	<div class="slider">
		<?php $headerImages = get_field('header_images','options');
			foreach($headerImages as $headerImage) { ?>
			<img src="<?php echo $headerImage['image_file']; ?>"/>		
		<?php } ?>
    </div>

    <div class="container">
      <div class="row">
      	<div class="small-12 large-8 columns header-image" role="img">
      		<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
      	</div>
      	<div class="small-12 large-4 columns">
      	 <div class="call-to-action">
      		<a href="<?php the_field('syd_link','options') ?>" class="button white-trans" target="_blank">Book Sydney <span><?php the_field('syd_dates','options') ?></span></a>
      		<a href="<?php the_field('melb_link','options') ?>" class="button white-trans" target="_blank">Book Melbourne <span><?php the_field('syd_dates','options') ?></span></a>
      	 </div>
      	</div>
      </div>
    </div><?php //end container ?>
  </header>
  
  <div class="contain-to-grid">
  	<!-- Starting the Top-Bar -->
  	<nav class="top-bar">
  	    <ul class="title-area">
  	    <li class="name"></li>
  	    <?php $title = get_the_title(); ?>
  			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  	   </ul>
  	    <section class="top-bar-section">
  	    <?php
  	        wp_nav_menu( array(
  	            'theme_location' => 'primary',
  	            'container' => false,
  	            'depth' => 0,
  	            'items_wrap' => '<ul class="left">%3$s</ul>',
  	            'walker' => new reverie_walker( array(
  	                'in_top_bar' => true,
  	                'item_type' => 'li'
  	            ) ),
  	        ) );
  	    ?>
  	    </section>
  	</nav>
  	<!-- End of Top-Bar -->
  </div>
  
  <!-- Start the main container -->
  <section class="main-content container row" role="document">