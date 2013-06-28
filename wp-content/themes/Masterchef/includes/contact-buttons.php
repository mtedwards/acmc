<div class="contact-buttons">
 <?php // Facebook
   $fb = get_field('fbtext');
   if($fb) {?>
     <a href="<?php the_field('fblink'); ?>" target="_blank" class="button facebook">
       <?php echo $fb; ?>
     </a>
  <?php } ?>
  
  <?php // Twitter
   $tw = get_field('twtext');
   if($tw) {?>
     <a href="<?php the_field('twlink'); ?>" target="_blank" class="button twitter">
       <?php echo $tw; ?>
     </a>
  <?php } ?>
 
  <?php // Website
   $web = get_field('webtext');
   if($web) {?>
     <a href="<?php the_field('weblink'); ?>" target="_blank" class="button web">
       <?php echo $web; ?>
     </a>
  <?php } ?>
 
  <?php // Other
   $other = get_field('othertext');
   if($other) {?>
     <a href="<?php the_field('otherlink'); ?>" target="_blank" class="button other">
       <?php echo $other; ?>
     </a>
  <?php } ?>
  
    <?php // Dimmi
   $dim = get_field('dimtext');
   if($dim) {
     if(is_page('Talent')){} else {
   ?>
     <a href="<?php the_field('dimlink'); ?>" target="_blank" class="button dimmi">
       <?php echo $dim; ?>
     </a>
  <?php 
    } // end if Talent
  } // end if Dimmi
  ?>
  
</div>
