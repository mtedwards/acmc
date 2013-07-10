<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title(); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>
	<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
    ga('create', 'UA-41912894-1', 'masterchefdining.com.au');
    ga('send', 'pageview');
  
  </script>

</head>

<body <?php body_class(); ?>>
  <header class="mainhead" role="banner">
	<div class="slider">
		<?php $headerImages = get_field('header_images','options');
		  shuffle($headerImages);
		  $i = 0;
			foreach($headerImages as $headerImage) {
			 if($i == 0)  { ?>
			   <img data-src="<?php echo $headerImage['image_file']; ?>" src="<?php echo $headerImage['image_file']; ?>" alt="MasterChef Dining 2013"/>		
  		<?php 
  			 $i++;
  			 } else { ?>
    			 <img data-src="<?php echo $headerImage['image_file']; ?>" alt="MasterChef Dining 2013"/>		
  			 <?php 
  			 $i++;
  			 } //end if i=0;
  		} // end for each ?>
    </div>

    <div class="container">
      <div class="row">
      	<div class="small-12 columns">
      	  <div class="header-image"  role="img">
      		  <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php wp_title(); ?></a></h1>
      		</div>
      		<div class="call-to-action">
      		  <a onClick="ga('send', 'event', 'book', 'header', 'Sydney');" href="/sydney" class="button white-trans">Sydney <i>On Sale July 16</i></a>
      		  <a onClick="ga('send', 'event', 'book', 'header', 'Melbourne');" href="/melbourne" class="button white-trans">Melbourne <i>On Sale July 16</i></a>
      		 <!--
        		 <a onClick="ga('send', 'event', 'book', 'header', 'Sydney');" href="<?php the_field('syd_link','options') ?>" class="button white-trans" target="_blank">Book Sydney <i><?php the_field('syd_dates','options') ?></i></a>
      		  <a onClick="ga('send', 'event', 'book', 'header', 'Melbourne');" href="<?php the_field('melb_link','options') ?>" class="button white-trans" target="_blank">Book Melbourne <i><?php the_field('melb_dates','options') ?></i></a>
      		  -->
      		</div>
        </div><?php //end columns ?>	
      </div><?php //end row ?>
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