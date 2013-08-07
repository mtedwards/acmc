<?php /*
  Template Name: Talent Archve
*/ ?>

<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
  	
  	<div class="row">
    	<div class="small-12 columns">
    		<?php the_post(); the_content(); ?>
    	</div> 
    </div>


	<div class="filters">
    <a onClick="ga('send', 'event', 'talent', 'filter', 'all');" href="#" class="active-filter" data-filter="all">ALL</a>
    <a onClick="ga('send', 'event', 'talent', 'filter', 'Sydnay');" href="#" data-filter="sydney">SYDNEY</a>
    <a onClick="ga('send', 'event', 'talent', 'filter', 'Melbourne');" href="#" data-filter="melbourne">MELBOURNE</a>
  </div>
 
 <?php
 $args = array( 
     'post_type' => array('talent'),      
     'posts_per_page' => 50,                
     'order' => 'ASC',
     'orderby' => 'menu_order',
     );
 
 $the_query = new WP_Query( $args );
 
  if ( $the_query->have_posts() ) : ?>
		<div class="boxes">
  		
  		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  			<?php get_template_part('talent-box'); ?>
  		<?php endwhile; ?>
  		<div class="content"></div>
		</div>
	<?php endif; // end have_posts() check 
	   // Reset Post Data
	   wp_reset_postdata(); ?>
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>