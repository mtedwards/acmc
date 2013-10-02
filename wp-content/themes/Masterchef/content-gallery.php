<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('module'); ?>>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php reverie_entry_meta(); ?>
	</header>
	<div class="entry-content">
	 <div class="row">
	   <div class="twelve columns">
	   	 <?php $images = get_field('images'); 
  	   	 if($images): ?>
  	   	   <ul class="clearing-thumbs" data-clearing>
  	   	   <?php foreach($images as $image){ ?>
    	   	   <li><a href="<?php echo $image['sizes']['large']; ?>"><img data-caption="<?php echo $image['caption']; ?>" src="<?php echo $image['sizes']['thumbnail']; ?>"></img></a></li>
    	   	 <?php  }//end foreach; ?>
  	   	   </ul>
    	   <?php endif;
	   	 ?>
	   </div> 	
	 </div>
	 <div class="row">
	   <div class="twelve columns">
	     <?php the_content(); ?>
	   </div> 	
	 </div>
	</div>
	<footer>
	</footer>
	<hr />
</article>