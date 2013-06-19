<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-9 columns" role="main">
  <div class="slider">
    <?php include('slider.php'); ?>
  </div>
    
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
  		<h2>Cooking doesn't get better than this!!</h2>
  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
	<div class="small-12 columns">
	 <ul class="small-block-grid-1 large-block-grid-3">
	   <li>
  	   <div class="flex-video">
        <iframe width="420" height="315" src="http://www.youtube.com/embed/jJjiuAr_LKY" frameborder="0" allowfullscreen></iframe>
      </div>
	   </li>
	   <li>
  	   <div class="panel">
          <h4>Cook like the whole world is watching</h4>
          <p>Food must be sexy!</p>
        </div>
	   </li>
	   <li>
  	   <div class="panel">
          <h4>Cook like the whole world is watching</h4>
          <p>Food must be sexy!</p>
        </div>
	   </li>
	 </ul>
<?php get_footer(); ?>