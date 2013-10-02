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
	
	  <?php
	    $video = get_field('video_url');
      $video = apply_filters('the_content', $video);
      echo $video;
    ?>
		<?php the_content(); ?>
	</div>
	<footer>
	</footer>
	<hr />
</article>