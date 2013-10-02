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
  					<div class="large-12 columns">
  						<a href="<?php the_field('melb_link','options') ?>" class="button white" target="_blank">Book Melbourne - <i><?php the_field('melb_dates','options') ?></i></a>
  					</div> 
  				</div>
  		  <hr>
  		  <div class="boxed">
            <?php
            $image = null;
            $args = array( 
                //'post_type' => 'post',
                'posts_per_page' => 3,
                'meta_key' => 'featured',                    //(string) - Custom field key.
                'meta_value' => true,                //(string) - Custom field value.
                'meta_compare' => '=',
                'order' => 'DESC',
                'orderby' => 'date',
                );
            
            $the_query = new WP_Query( $args );
            
            // The Loop
            if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $title = get_the_title();
        		    $link = get_permalink();
        		    $format = get_post_format();
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
               ?>
              <article class="news-box">
                <a onClick="ga('send', 'event', 'boxes', 'front-page', '<?php echo $title ?>');" href="<?php echo $link; ?>">
                  <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                  <div class="small-details">
                    <b><?php echo $title; ?></b>
                  </div>
                </a>
              </article>
            <?php endwhile;
            endif;
              // Reset Post Data
              wp_reset_postdata();
            
            ?>   
  		  </div>
			</article>	
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>