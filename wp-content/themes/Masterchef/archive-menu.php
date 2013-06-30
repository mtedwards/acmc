<?php /*
  Template Name: Menu Archve
*/ ?>

<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	<?php
	$args = array( 
	    'post_type' => array(
	            'menus',
	            ),                
	    'order' => 'DESC',
	    'orderby' => 'date',
	    );
	$the_query = new WP_Query( $args );
	
	// The Loop
	if ( $the_query->have_posts() ) :?>
		<div class="boxes open-first">
  		<?php 
	while ( $the_query->have_posts() ) : $the_query->the_post();
	  get_template_part('menu-box');
	endwhile; ?>
  		<div class="content"></div>
		</div>
	<?php endif;
	
	wp_reset_postdata();?>
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>