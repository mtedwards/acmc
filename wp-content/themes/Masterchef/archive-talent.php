<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	<div class="filters">
    <a href="#" class="active-filter" data-filter="all">ALL</a>
    <a href="#" data-filter="sydney">SYDNEY</a>
    <a href="#" data-filter="melbourne">MELBOURNE</a>
  </div>
	<?php if ( have_posts() ) : ?>
		<div class="boxes">
  		<?php /* Start the Loop */ ?>
  		<?php while ( have_posts() ) : the_post(); ?>
  			<?php get_template_part('talent-box'); ?>
  		<?php endwhile; ?>
  		<div class="content"></div>
		</div>
	<?php endif; // end have_posts() check ?>
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>