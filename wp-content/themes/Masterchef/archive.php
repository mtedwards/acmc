<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
	<?php if ( have_posts() ) : ?>
	 <h2>Latest News</h2>
		<?php /* Start the Loop */ ?>
		<div class="news-list">
		<?php while ( have_posts() ) : the_post(); ?>
		  	
  	<?php $format = get_post_format();
  	   if ( has_post_thumbnail() ) {
	  	     $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'news-thumb', false, '');
           $image = $image[0];
        } else {   
            if($format === "video"){  
              $url = get_field('video_url');
              $pos = strpos($url, 'youtu.be');
          		if ($pos === false) {
            		$url =  str_replace("http://www.youtube.com/watch?v=","",$url);
          			$image = 'http://img.youtube.com/vi/' . $url . '/0.jpg';
          		} else {
          			//YouTube
          			$url =  str_replace("http://youtu.be/","",$url);
          			$image = 'http://img.youtube.com/vi/' . $url . '/0.jpg';
          		}
            } elseif($format === "gallery") {
              $images = get_field('images');
              $image = $images[0]['sizes']['news-thumb'];
            }			
       } // end if has image
       if($image){ 
         if($format === "video"){?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('module has-image video'); ?>>
            <?php } else { ?>
			   <article id="post-<?php the_ID(); ?>" <?php post_class('module has-image'); ?>>
			 <?php }//end has video ?>
			<?php } else { ?>
			 <article id="post-<?php the_ID(); ?>" <?php post_class('module'); ?>>
		  <?php } //end if image ?>
				<header>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php reverie_entry_meta(); ?>
				</header>
				<div class="entry-content">
				  <?php if($image){ ?>
				    <a class="image-link" href="<?php the_permalink(); ?>"><img class="alignleft" src="<?php echo $image; ?>"></img></a>
				  <?php } ?>
					<?php the_excerpt(); ?>
					<a class="button other" href="<?php the_permalink(); ?>">Read More...</a>
				</div>
			</article>
			<?php $image = null; ?>
		<?php endwhile; ?>
		</div><?php //end news-list ?>
		<?php reverie_pagination(); ?>
		<?php else : ?>
			
	<?php endif; // end have_posts() check ?>
	

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>