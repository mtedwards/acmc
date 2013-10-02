<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      	 <div class="row">
      	 	<div class="small-6 columns">
      	 		<h2><?php $name = get_the_title(); echo $name; ?></h2>
      	 	</div>
      	 	<div class="small-6 columns text-right">
      	 		<h4><a href="/talent"><span class="entypo-left-open-big"></span> Back to Talent</a></h4>
      	 	</div>  
      	 </div>
      	<div class="entry-content module"> 
      	  <div class="row">
      	  	<div class="small-12 columns">
      	  		 <?php the_post_thumbnail(); ?>
      	  	</div> 
      	  </div>
      	  <div class="row">
      	  	<div class="small-12 columns">
      	  		 <?php include(locate_template('includes/contact-buttons.php'));  ?>
      	  		 <?php the_content(); ?>
      	  	</div> 
      	  </div>
      	  <?php $appearances = get_field('appearing');
      		  if($appearances){
      		 ?>
        		<div class="row">
        			<div class="twelve columns">
        			 <h5>Appearing:</h5>
        	     <ul class="appearences">
        	       <?php foreach($appearances as $appearance){ 
          	       $link = $appearance['link_to'];
        	       ?>
        	         <li><a href="<?php bloginfo('url'); ?>/<?php echo $link; ?>"><?php echo $appearance['date']; ?> | <?php echo $appearance['note']; ?></a></li>
        	       <?php } // end for each ?>
        	     </ul>			
        			</div> 
        		</div>
      		<?php } // end if $appearances ?>
      	</div>
      	<hr />
      </article>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>