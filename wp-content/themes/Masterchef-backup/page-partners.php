<?php get_header(); the_post(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns partners" role="main">
	 <div class="row">
    	<div class="small-12 columns">
    		<?php the_content(); ?>
    	</div> 
    </div>

	
				<div class="entry-content">
					<?php $prem_partners = get_field('prem_partners'); 
  					if($prem_partners){ ?>
    					<div class="tier_1 boxes">
    					<?php foreach($prem_partners as $prem){ 
      					$dataTitle = sanitize($prem['title']);
    					?>
    					 
      					<article data-title="<?php echo $dataTitle; ?>">
                <?php // Initial displayed section ?>
                <a onClick="ga('send', 'event', 'partners', 'open', '<?php echo $prem['title']; ?>');" href="#">  
                  <img src="<?php echo $prem['image']; ?>" alt="<?php echo $prem['title']; ?>"/>
                  <div class="small-details">
                    <b><?php echo $prem['title']; ?></b>
                  </div>
                </a>
                <?php // Popup section ?>
                <div class="details">
              		<div class="row">
              		  <div class="small-12  columns">
              				<h4><?php echo $prem['title']; ?></h4>
              				<?php echo $prem['content']; ?>
              				<p><a onClick="ga('send', 'event', 'partners', 'Tier 1', '<?php echo $prem['title']; ?>');" href="<?php echo $prem['link']; ?>" target="_blank">Visit <?php echo $prem['title']; ?>'s Website</a></p>
              		  </div>
              		</div>
                </div><?php // end popup section ?>
              </article>
    				<?php	
    				  } //foreach ?>
    				  <div class="content"></div>
    					</div>
  				<?php	} // end if 
					?>
					<hr>
					<?php $mid_partners = get_field('mid_partners'); 
  				  if($mid_partners){ ?>
  				  <div class="tier_2 boxes">
    				<?php  foreach($mid_partners as $mid){ 
      				  $dataTitle = sanitize($mid['title']);
    				?>
      					<article data-title="<?php echo $dataTitle; ?>">
                <?php // Initial displayed section ?>
                <a onClick="ga('send', 'event', 'partners', 'open', '<?php echo $mid['title']; ?>'" href="#">  
                  <img src="<?php echo $mid['image']; ?>" alt="<?php echo $mid['title']; ?>"/>
                  <div class="small-details">
                    <b><?php echo $mid['title']; ?></b>
                  </div>
                </a>
                <?php // Popup section ?>
                <div class="details">
              		<div class="row">
              		  <div class="small-12  columns">
              				<h4><?php echo $mid['title']; ?></h4>
              				<?php echo $mid['content']; ?>
              				<?php 
              				  $mid_link =  $mid['link'];
              				  if($mid_link){ ?>
              				<p><a onClick="ga('send', 'event', 'partners', 'Tier 2', '<?php echo $mid['title']; ?>'" href="<?php echo $mid['link']; ?>" target="_blank">Visit <?php echo $mid['title']; ?>'s Website</a></p>
              				<?php } ?>
              		  </div>
              		</div>
                </div><?php // end popup section ?>
              </article>

    				<?php	
    				  } //foreach ?>
    				  <div class="content"></div>
  				  </div>
  				<?php	
  				  } // end if 
					?>
					<hr>
					<?php $low_partners = get_field('low_partners');
					 if($low_partners){ ?>
					   <div class="tier_3">
    					<?php foreach($low_partners as $low){ ?>
      					<a onClick="ga('send', 'event', 'partners', 'Tier 3', '<?php echo $low['title']; ?>'" href='<?php echo $low['link']; ?>' target="_blank"><img src="<?php echo $low['image']; ?>" alt="MasterChef Dining Partner"/></a>
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