<?php get_header(); the_post(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns partners" role="main">
				<div class="entry-content">
					<?php $prem_partners = get_field('prem_partners'); 
  					if($prem_partners){ ?>
    					<div class="tier_1">
    					<?php foreach($prem_partners as $prem){ ?>
      					<article>
                <?php // Initial displayed section ?>
                <a href="#">  
                  <img src="<?php echo $prem['image']; ?>"/>
                  <div class="small-details">
                    <b><?php echo $prem['title']; ?></b>
                  </div>
                </a>
                <?php // Popup section ?>
                <div class="details">
                  <img src="<?php echo $prem['image']; ?>"/>
              		<div class="row">
              		  <div class="small-12  columns">
              				<h4><?php echo $prem['title']; ?></h4>
              				<?php echo $prem['content']; ?>
              				<p><a href="<?php echo $prem['link']; ?>">Visit <?php echo $prem['title']; ?>'s Website</a></p>
              		  </div>
              		</div>
                </div><?php // end popup section ?>
              </article>
    				<?php	
    				  } //foreach ?>
    					</div>
  				<?php	} // end if 
					?>
					<hr>
					<?php $mid_partners = get_field('mid_partners'); 
  				  if($mid_partners){ ?>
  				  <div class="tier_2">
    				<?php foreach($mid_partners as $mid){ ?>
      					<article>
                <?php // Initial displayed section ?>
                <a href="#">  
                  <img src="<?php echo $mid['image']; ?>"/>
                  <div class="small-details">
                    <b><?php echo $mid['title']; ?></b>
                  </div>
                </a>
                <?php // Popup section ?>
                <div class="details">
                  <img src="<?php echo $mid['image']; ?>"/>
              		<div class="row">
              		  <div class="small-12  columns">
              				<h4><?php echo $mid['title']; ?></h4>
              				<?php echo $mid['content']; ?>
              				<p><a href="<?php echo $mid['link']; ?>">Visit <?php echo $mid['title']; ?>'s Website</a></p>
              		  </div>
              		</div>
                </div><?php // end popup section ?>
              </article>

    				<?php	
    				  } //foreach ?>
  				  </div>
  				<?php	
  				  } // end if 
					?>
					<hr>
					<?php $low_partners = get_field('low_partners');
					 if($low_partners){ ?>
					   <div class="tier_3">
    					<?php foreach($low_partners as $low){ ?>
      					<?php the_title(); ?>
    				<?php	
    				  } //foreach ?>
					   </div>
  				<?php	
  				  } // end if 
					?>
				</div>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>