<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h2><?php the_title(); ?></h2>
				</header>
				<div class="entry-content module">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
		
		<?php else : ?>
			
		
	<?php endif; // end have_posts() check ?>
	

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>