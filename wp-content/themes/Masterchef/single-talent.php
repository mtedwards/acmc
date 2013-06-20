<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      	<header>
      	 <div class="row">
      	 	<div class="small-6 columns">
      	 		<h2><?php the_title(); ?></h2>
      	 	</div>
      	 	<div class="small-6 columns text-right">
      	 		<h2><a href="/talent">Back to Talent</a></h2>
      	 	</div>  
      	 </div>
      	</header>
      	<div class="entry-content module">
      	  <?php the_post_thumbnail(); ?>
      	  <div class="contact-buttons">
      		  <a href="#" class="button">Button</a>
      		</div>
      		<?php the_content(); ?>
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