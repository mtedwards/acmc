<?php 
  $syd = get_field('sydney');
  $melb = get_field('melbourne');
  $filterClass = 'all';
  if($syd and ! $melb){$filterClass = 'sydney';}
  if($melb and ! $syd){$filterClass = 'melbourne';}
  if($melb and $syd){$filterClass = 'sydney melbourne';}
  
  $name = get_the_title(); // Initial displayed section
  $dataTitle = sanitize($name);
?>
<article class="<?php echo $filterClass; ?>" data-title="<?php echo $dataTitle; ?>">
  <a onClick="ga('send', 'event', 'talent', 'open', '<?php echo $name; ?>');" href="#" name="<?php echo $dataTitle; ?>">  
    
    <?php
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
		  <div class="small-12 columns">
				<h4><?php echo $name; ?></h4>
				<?php include(locate_template('includes/contact-buttons.php'));  ?>
				<?php the_excerpt(); ?>
				<p><a onClick="ga('send', 'event', 'talent', '<?php echo $name; ?>', 'read more');" href="<?php the_permalink(); ?>">Read More</a></p>
		  </div>
		</div>
		<?php $appearances = get_field('appearing');
		  if($appearances){
		 ?>
  		<div class="row">
  			<div class="twelve columns">
  			 <h5>Appearing:</h5>
  	     <ul class="appearences">
  	       <?php foreach($appearances as $appearance){ 
    	       $link = $appearance['link_to'];
  	       ?>
  	         <li><a href="<?php bloginfo('url'); ?>/<?php echo $link; ?>"><?php echo $appearance['date']; ?> | <?php echo $appearance['note']; ?></a></li>
  	       <?php } // end for each ?>
  	     </ul>			
  			</div> 
  		</div>
		<?php } // end if $appearances ?>
  </div><?php // end popup section ?>
</article>