<?php 
  $syd = get_field('sydney');
  $melb = get_field('melbourne');
  $filterClass = 'all';
  if($syd and ! $melb){$filterClass = 'sydney';}
  if($melb and ! $syd){$filterClass = 'melbourne';}
  if($melb and $syd){$filterClass = 'sydney melbourne';}
?>
<article class="<?php echo $filterClass; ?>">
  <?php // Initial displayed section ?>
  <a href="#" data-cat="news" data-state="vic">  
    
    <?php
      $name = get_the_title();
      $img = get_the_post_thumbnail(); 
      echo $img;  
    ?>
    <div class="small-details">
      <b><?php echo $name; ?></b>
    </div>
  </a>
  
  <?php // Popup section ?>
  <div class="details">
    <?php echo $img; ?>
		<div class="row">
		  <div class="large-6 columns">
				<h4><?php echo $name; ?></h4>
				<?php 
  				$options = get_field('options');
  				foreach($options as $option){
    			 $visable = $option['sydney_option'];
    			 if('$visable'){
      			 echo $option['content_option'];
    			 }	
  				}
				?>
		  </div>
		  <div class="large-6 columns right">
		    <div class="contact-buttons">
				 <a href="<?php the_field('weblink'); ?>" target="_blank" class="button web">Book now</a>
		    </div>
		  </div>
		</div>
  </div><?php // end popup section ?>
</article>