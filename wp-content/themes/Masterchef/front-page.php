<?php get_header(); the_post(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  		  <div class="boxed">
    		  <?php 
    		    $boxes = get_field('feature_boxes');
    		    if($boxes){
      		    foreach($boxes as $box){
      		      $title = $box['title'];
        		    $link = $box['internal_link'];
                $image = $box['image'];
                if($link = $box['link']){
                  $link = $box['link'];
                } else {
                  $link = $box['internal_link'];
                }
                include(locate_template('boxed.php'));      
              }
            } ?>
  		  </div>
  			 <hr>
					<h2><?php the_title(); ?></h2>

  				<div class="entry-content ">
  					<?php the_content(); ?>
  				</div>
  				<div class="row">
  					<div class="large-6 columns">
  						<!-- <a href="<?php the_field('syd_link','options') ?>" class="button white" target="_blank">Book Sydney</a> -->
  						<a href="/sydney" class="button white">Sydney On Sale July 16</a>
      		  
  					</div>
  				  <div class="large-6 columns">
  						<!-- <a href="<?php the_field('melb_link','options') ?>" class="button white" target="_blank">Book Melbourne</a> -->
  						<a href="/melbourne" class="button white">Melbourne On Sale July 16</a>
  					</div> 
  				</div>
  		  <hr>
			</article>	
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>