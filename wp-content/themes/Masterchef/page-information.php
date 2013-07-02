<?php get_header(); the_post();?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns boxes open-first" role="main">

  	<div class="row">
    	<div class="small-12 columns">
    		<?php the_content(); ?>
    	</div> 
    </div>

	
	 <?php $info_boxes = get_field('information_boxes');
	   if($info_boxes) {
	     foreach($info_boxes as $info_box) {
	     
	     $name = $info_box['title'];
	     $dataTitle = sanitize($name);
	  ?>
			
			
			<article data-title="<?php echo $dataTitle; ?>">
        <a onClick="ga('send', 'event', 'information', 'open', '<?php echo $name; ?>');" href="#">  
          
          <?php
            $img = $info_box['images'];
          ?>
          <img src="<?php echo $img;?>">  
          <div class="small-details">
            <b><?php echo $name; ?></b>
          </div>
        </a>
        
        <?php // Popup section ?>
        <div class="details">
      		<div class="row">
      		  <div class="small-12 columns">
      		    <?php if($info_box['map_image']) { ?>
      				  <a onClick="ga('send', 'event', 'information', 'map', '<?php echo $name; ?>');" class="map" href="<?php echo $info_box['map_link']; ?>" target="_blank"><img src="<?php echo $info_box['map_image']; ?>" alt="<?php echo $name; ?> Map" target="_blank"/></a>
      				<?php } ?>
      				<?php echo $info_box['content']; ?>
      		  </div>
      		</div>
        </div><?php // end popup section ?>
      </article>
			
			
			<?php } // end for each ?>
		<div class="content"></div>	
	<?php } //end if $info_boxes ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>