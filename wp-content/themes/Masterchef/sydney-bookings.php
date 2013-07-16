<?php 
/*
  Template Name: Bookings Sydney
*/
get_header(); the_post(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns bookings" role="main">
	 	<div class="filter-link">
		   <a class="active-filter" href="<?php bloginfo('url'); ?>/sydney">SYDNEY</a>
		   <a href="<?php bloginfo('url'); ?>/melbourne">MELBOURNE</a>
	 	</div>
	 	
	 <div class="row bookings-text">
	 		<div class="small-12 columns">
	 			<?php the_content(); ?>
	 		</div> 
	 	</div>
		
		<article class="day"><a>M</a></article>
		<article class="day"><a>T</a></article>
		<article class="day"><a>W</a></article>
		<article class="day"><a>T</a></article>
		<article class="day"><a>F</a></article>
		<article class="day"><a>S</a></article>
		<article class="day"><a>S</a></article>		 
		
		<?php 
			//define NOW
			$now = date('Ymd') ."\n";
			//$now = '20130820';
			
			$args = array( 
			    'post_type' => array(
			            'bookings',
			            ),                 
			    'orderby' => 'menu_order',
			    'order' => 'ASC',
			    'meta_key' => 'city',
			    'meta_value' => 'sydney',                // Change for Melbourne Page
			    );
			
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post();

		  $start_date = get_field('start_date');
			$monday = '<span>' . date("M", strtotime($start_date)) . "</span>\n" . date("j", strtotime($start_date));
			$monday_analytics_date = date("j M", strtotime($start_date));
			
			$tuesday = date('Ymd', strtotime("+1 day", strtotime($start_date)));
			$tuesday_day = '<span>' . date("M", strtotime($tuesday)) . "</span>\n" . date("j", strtotime($tuesday));
			$tuesday_long_day = date("D j F", strtotime($tuesday)) . "\n";
			$tuesday_analytics_date = date("j M", strtotime($tuesday));			
			
			$wednesday = date('Ymd', strtotime("+2 day", strtotime($start_date)));
			$wednesday_day = '<span>' . date("M", strtotime($wednesday)) . "</span>\n" . date("j", strtotime($wednesday));
			$wednesday_long_day = date("D j F", strtotime($wednesday)) . "\n";
			$wednesday_analytics_date = date("j M", strtotime($wednesday));
						
			$thursday = date('Ymd', strtotime("+3 day", strtotime($start_date)));
			$thursday_day = '<span>' . date("M", strtotime($thursday)) . "</span>\n" . date("j", strtotime($thursday));
			$thursday_long_day = date("D j F", strtotime($thursday)) . "\n";
			$thursday_analytics_date = date("j M", strtotime($thursday));
			
			$friday = date('Ymd', strtotime("+4 day", strtotime($start_date)));
			$friday_day = '<span>' . date("M", strtotime($friday)) . "</span>\n" . date("j", strtotime($friday));
			$friday_long_day = date("D j F", strtotime($friday)) . "\n";
			$friday_analytics_date = date("j M", strtotime($friday));
			
			$saturday= date('Ymd', strtotime("+5 day", strtotime($start_date)));
			$saturday_day = '<span>' . date("M", strtotime($saturday)) . "</span>\n" . date("j", strtotime($saturday));
			$saturday_long_day = date("D j F", strtotime($saturday)) . "\n";
			$saturday_analytics_date = date("j M", strtotime($saturday));
			
			$sunday = date('Ymd', strtotime("+6 day", strtotime($start_date)));
			$sunday_day = '<span>' . date("M", strtotime($sunday)) . "</span>\n" . date("j", strtotime($sunday));
			$sunday_long_day = date("D j F", strtotime($sunday)) . "\n";
			$sunday_analytics_date = date("j M", strtotime($sunday));
			?>


				<article class="single-day"> <?php // Monday ?>
		 				<a class="closed" href="#"><?php echo $monday; ?></a>
				 </article>
				 
				<article class="single-day"> <?php // Tuesday ?>
		 			<?php if(get_field('tue_sold_out')) { ?>
		 				<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $tuesday_analytics_date; ?>');" class="sold" href="#"><?php echo $tuesday_day; ?></a>
		 			<?php } elseif($tuesday < $now) { ?>
		 			  <a class="closed" href="#"><?php echo $tuesday_day; ?></a>
		 			<?php } else { ?>
				    	<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $tuesday_analytics_date; ?>');" href="#"><?php echo $tuesday_day; ?></a>
				    <?php } ?>
				     <div class="day-details">
              <div class="row">
              	<div class="large-8 columns">
              		<h4><?php echo $tuesday_long_day; ?></h4>
              		<?php if(get_field('tue_paragraph_text')) {
              				the_field('tue_paragraph_text');
            			} elseif(get_field('default_paragraph')) {
            			    the_field('default_paragraph');
            			} else {
              				the_field('syd_text','options');
            			} ?>
            		
              	</div>
              	<div class="large-4 columns">
              		
              		<?php if( get_field('tue_booking_link') ) {
              			echo '<a href="' . get_field('tue_booking_link') . '" class="button white">Book Now</a>';
              		} else {
              			echo '<a href="' . get_field("syd_link","options") . '" class="button white">Book Now</a>';
              		} ?>
              		<?php $notes = get_field('tue_announcements'); 
              			if($notes){
              				foreach($notes as $note){
              					echo '<h6>' . $note['text'] . '</h6>';
              				}
              			}
              		?>
              	</div>
                            </div><?php // end row ?>
              <div class="row">
                
                <?php 
                  /* FIRST IMAGE BOX */
                  
                  if(get_field('default_box_1_image')){
                   if(get_field('default_box_1_ext_link')) { $link1 = get_field('default_box_1_ext_link'); } else { $link1 = get_field('default_box_1_int_link');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('default_box_1_image'); ?>"/>
                    <p><?php the_field('default_box_1_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_1_external_link','options')) {$link1 = get_field('box_1_external_link','options');} else {$link1 = get_field('box_1_internal_link','options');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('box_1_image','options'); ?>"/>
                    <p><?php the_field('box_1_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* SECOND IMAGE BOX */
                  
                  if(get_field('default_box_2_image')){
                   if(get_field('default_box_2_ext_link')) {$link2 = get_field('default_box_2_ext_link');} else {$link2 = get_field('default_box_2_int_link');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('default_box_2_image'); ?>"/>
                    <p><?php the_field('default_box_2_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_2_external_link','options')) {$link2 = get_field('box_2_external_link','options');} else {$link2 = get_field('box_2_internal_link','options');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('box_2_image','options'); ?>"/>
                    <p><?php the_field('box_2_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* THIRD IMAGE BOX */
                  
                  if(get_field('default_box_3_image')){
                   if(get_field('default_box_1_ext_link')) {$link3 = get_field('default_box_3_ext_link');} else {$link3 = get_field('default_box_3_int_link');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('default_box_3_image'); ?>"/>
                    <p><?php the_field('default_box_3_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_3_external_link','options')) {$link3 = get_field('box_3_external_link','options');} else {$link3 = get_field('box_3_internal_link','options');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('box_3_image','options'); ?>"/>
                    <p><?php the_field('box_3_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                  
              </div>
            </div>
				 </article>
				 
				 <article class="single-day"> <?php // Wednesday ?>
		 			<?php if(get_field('wed_sold_out')) { ?>
		 				<aonClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $wednesday_analytics_date; ?>');" class="sold" href="#"><?php echo $wednesday_day; ?></a>
		 			<?php } elseif($wednesday < $now) { ?>
		 			  <a class="closed" href="#"><?php echo $wednesday_day; ?></a>
		 			<?php } else { ?>
				    	<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $wednesday_analytics_date; ?>');" href="#"><?php echo $wednesday_day; ?></a>
				    <?php } ?>
				    <div class="day-details">
              <div class="row">
              	<div class="large-8 columns">
              		<h4><?php echo $wednesday_long_day; ?></h4>
              		<?php if(get_field('wed_paragraph_text')) {
              				the_field('wed_paragraph_text');
            			} elseif(get_field('default_paragraph')) {
            			    the_field('default_paragraph');
            			} else {
              				the_field('syd_text','options');
            			} ?>
            		
              	</div>
              	<div class="large-4 columns">
              		
              		<?php if( get_field('wed_booking_link') ) {
              			echo '<a href="' . get_field('wed_booking_link') . '" class="button white">Book Now</a>';
              		} else {
              			echo '<a href="' . get_field("syd_link","options") . '" class="button white">Book Now</a>';
              		} ?>
              		<?php $notes = get_field('wed_announcements'); 
              			if($notes){
              				foreach($notes as $note){
              					echo '<h6>' . $note['text'] . '</h6>';
              				}
              			}
              		?>
              	</div>
              </div><?php // end row ?>
              <div class="row">
                
                <?php 
                  /* FIRST IMAGE BOX */
                  
                  if(get_field('default_box_1_image')){
                   if(get_field('default_box_1_ext_link')) {$link1 = get_field('default_box_1_ext_link');} else {$link1 = get_field('default_box_1_int_link');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('default_box_1_image'); ?>"/>
                    <p><?php the_field('default_box_1_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_1_external_link','options')) {$link1 = get_field('box_1_external_link','options');} else {$link1 = get_field('box_1_internal_link','options');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('box_1_image','options'); ?>"/>
                    <p><?php the_field('box_1_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* SECOND IMAGE BOX */
                  
                  if(get_field('default_box_2_image')){
                   if(get_field('default_box_2_ext_link')) {$link2 = get_field('default_box_2_ext_link');} else {$link2 = get_field('default_box_2_int_link');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('default_box_2_image'); ?>"/>
                    <p><?php the_field('default_box_2_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_2_external_link','options')) {$link2 = get_field('box_2_external_link','options');} else {$link2 = get_field('box_2_internal_link','options');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('box_2_image','options'); ?>"/>
                    <p><?php the_field('box_2_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* THIRD IMAGE BOX */
                  
                  if(get_field('default_box_3_image')){
                   if(get_field('default_box_1_ext_link')) {$link3 = get_field('default_box_3_ext_link');} else {$link3 = get_field('default_box_3_int_link');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('default_box_3_image'); ?>"/>
                    <p><?php the_field('default_box_3_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_3_external_link','options')) {$link3 = get_field('box_3_external_link','options');} else {$link3 = get_field('box_3_internal_link','options');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('box_3_image','options'); ?>"/>
                    <p><?php the_field('box_3_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                  
              </div>
            </div>
				 </article>
				 
				 <article class="single-day"> <?php // Thursday ?>
		 			<?php if(get_field('thur_sold_out')) { ?>
		 				<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $thursday_analytics_date; ?>');" class="sold" href="#"><?php echo $thursday_day; ?></a>
		 			<?php } elseif($thursday < $now) { ?>
		 			  <a class="closed" href="#"><?php echo $thursday_day; ?></a>
		 			<?php } else { ?>
				    	<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $thursday_analytics_date; ?>');" href="#"><?php echo $thursday_day; ?></a>
				    <?php } ?>
				    <div class="day-details">
              <div class="row">
              	<div class="large-8 columns">
              		<h4><?php echo $thursday_long_day; ?></h4>
              		<?php if(get_field('thur_paragraph_text')) {
              				the_field('thur_paragraph_text');
            			} elseif(get_field('default_paragraph')) {
            			    the_field('default_paragraph');
            			} else {
              				the_field('syd_text','options');
            			} ?>
            		
              	</div>
              	<div class="large-4 columns">
              		
              		<?php if( get_field('thur_booking_link') ) {
              			echo '<a href="' . get_field('thur_booking_link') . '" class="button white">Book Now</a>';
              		} else {
              			echo '<a href="' . get_field("syd_link","options") . '" class="button white">Book Now</a>';
              		} ?>
              		<?php $notes = get_field('thurs_announcements'); 
              			if($notes){
              				foreach($notes as $note){
              					echo '<h6>' . $note['text'] . '</h6>';
              				}
              			}
              		?>
              	</div>
                            </div><?php // end row ?>
              <div class="row">
                
                <?php 
                  /* FIRST IMAGE BOX */
                  
                  if(get_field('default_box_1_image')){
                   if(get_field('default_box_1_ext_link')) {$link1 = get_field('default_box_1_ext_link');} else {$link1 = get_field('default_box_1_int_link');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('default_box_1_image'); ?>"/>
                    <p><?php the_field('default_box_1_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_1_external_link','options')) {$link1 = get_field('box_1_external_link','options');} else {$link1 = get_field('box_1_internal_link','options');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('box_1_image','options'); ?>"/>
                    <p><?php the_field('box_1_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* SECOND IMAGE BOX */
                  
                  if(get_field('default_box_2_image')){
                   if(get_field('default_box_2_ext_link')) {$link2 = get_field('default_box_2_ext_link');} else {$link2 = get_field('default_box_2_int_link');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('default_box_2_image'); ?>"/>
                    <p><?php the_field('default_box_2_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_2_external_link','options')) {$link2 = get_field('box_2_external_link','options');} else {$link2 = get_field('box_2_internal_link','options');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('box_2_image','options'); ?>"/>
                    <p><?php the_field('box_2_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* THIRD IMAGE BOX */
                  
                  if(get_field('default_box_3_image')){
                   if(get_field('default_box_1_ext_link')) {$link3 = get_field('default_box_3_ext_link');} else {$link3 = get_field('default_box_3_int_link');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('default_box_3_image'); ?>"/>
                    <p><?php the_field('default_box_3_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_3_external_link','options')) {$link3 = get_field('box_3_external_link','options');} else {$link3 = get_field('box_3_internal_link','options');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('box_3_image','options'); ?>"/>
                    <p><?php the_field('box_3_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                  
              </div>
            </div>
				 </article>
				 
				 <article class="single-day"> <?php // Friday ?>
		 			<?php if(get_field('fri_sold_out')) { ?>
		 				<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $friday_analytics_date; ?>');" class="sold" href="#"><?php echo $friday_day; ?></a>
		 			<?php } elseif($friday < $now) { ?>
		 			  <a class="closed" href="#"><?php echo $friday_day; ?></a>
		 			<?php } else { ?>
				    	<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $friday_analytics_date; ?>');" href="#"><?php echo $friday_day; ?></a>
				    <?php } ?>
				    <div class="day-details">
              <div class="row">
              	<div class="large-8 columns">
              		<h4><?php echo $friday_long_day; ?></h4>
              		<?php if(get_field('fri_paragraph_text')) {
              				the_field('fri_paragraph_text');
            			} elseif(get_field('default_paragraph')) {
            			    the_field('default_paragraph');
            			} else {
              				the_field('syd_text','options');
            			} ?>
            		
              	</div>
              	<div class="large-4 columns">
              		
              		<?php if( get_field('fri_booking_link') ) {
              			echo '<a href="' . get_field('fri_booking_link') . '" class="button white">Book Now</a>';
              		} else {
              			echo '<a href="' . get_field("syd_link","options") . '" class="button white">Book Now</a>';
              		} ?>
              		<?php $notes = get_field('fri_announcements'); 
              			if($notes){
              				foreach($notes as $note){
              					echo '<h6>' . $note['text'] . '</h6>';
              				}
              			}
              		?>
              	</div>
                           </div><?php // end row ?>
              <div class="row">
                
                <?php 
                  /* FIRST IMAGE BOX */
                  
                  if(get_field('default_box_1_image')){
                   if(get_field('default_box_1_ext_link')) {$link1 = get_field('default_box_1_ext_link');} else {$link1 = get_field('default_box_1_int_link');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('default_box_1_image'); ?>"/>
                    <p><?php the_field('default_box_1_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_1_external_link','options')) {$link1 = get_field('box_1_external_link','options');} else {$link1 = get_field('box_1_internal_link','options');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('box_1_image','options'); ?>"/>
                    <p><?php the_field('box_1_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* SECOND IMAGE BOX */
                  
                  if(get_field('default_box_2_image')){
                   if(get_field('default_box_2_ext_link')) {$link2 = get_field('default_box_2_ext_link');} else {$link2 = get_field('default_box_2_int_link');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('default_box_2_image'); ?>"/>
                    <p><?php the_field('default_box_2_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_2_external_link','options')) {$link2 = get_field('box_2_external_link','options');} else {$link2 = get_field('box_2_internal_link','options');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('box_2_image','options'); ?>"/>
                    <p><?php the_field('box_2_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* THIRD IMAGE BOX */
                  
                  if(get_field('default_box_3_image')){
                   if(get_field('default_box_1_ext_link')) {$link3 = get_field('default_box_3_ext_link');} else {$link3 = get_field('default_box_3_int_link');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('default_box_3_image'); ?>"/>
                    <p><?php the_field('default_box_3_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_3_external_link','options')) {$link3 = get_field('box_3_external_link','options');} else {$link3 = get_field('box_3_internal_link','options');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('box_3_image','options'); ?>"/>
                    <p><?php the_field('box_3_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                  
              </div>
            </div>
				 </article>
				 
				 <article class="single-day"> <?php // Saturday ?>
		 			<?php if(get_field('sat_sold_out')) { ?>
		 				<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $saturday_analytics_date; ?>');" class="sold" href="#"><?php echo $saturday_day; ?></a>
		 			<?php } elseif($saturday < $now) { ?>
		 			  <a class="closed" href="#"><?php echo $saturday_day; ?></a>
		 			<?php } else { ?>
				    	<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $saturday_analytics_date; ?>');" href="#"><?php echo $saturday_day; ?></a>
				    <?php } ?>
				    <div class="day-details">
              <div class="row">
              	<div class="large-8 columns">
              		<h4><?php echo $saturday_long_day; ?></h4>
              		<?php if(get_field('sat_paragraph_text')) {
              				the_field('sat_paragraph_text');
            			} elseif(get_field('default_paragraph')) {
            			    the_field('default_paragraph');
            			} else {
              				the_field('syd_text','options');
            			} ?>
            		
              	</div>
              	<div class="large-4 columns">   		
              		<?php if( get_field('sat_booking_link') ) {
              			echo '<a href="' . get_field('sat_booking_link') . '" class="button white">Book Now</a>';
              		} else {
              			echo '<a href="' . get_field("syd_link","options") . '" class="button white">Book Now</a>';
              		} ?>
              		<?php $notes = get_field('sat_announcements'); 
              			if($notes){
              				foreach($notes as $note){
              					echo '<h6>' . $note['text'] . '</h6>';
              				}
              			}
              		?>
              	</div>
                            </div><?php // end row ?>
              <div class="row">
                
                <?php 
                  /* FIRST IMAGE BOX */
                  
                  if(get_field('default_box_1_image')){
                   if(get_field('default_box_1_ext_link')) {$link1 = get_field('default_box_1_ext_link');} else {$link1 = get_field('default_box_1_int_link');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('default_box_1_image'); ?>"/>
                    <p><?php the_field('default_box_1_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_1_external_link','options')) {$link1 = get_field('box_1_external_link','options');} else {$link1 = get_field('box_1_internal_link','options');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('box_1_image','options'); ?>"/>
                    <p><?php the_field('box_1_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* SECOND IMAGE BOX */
                  
                  if(get_field('default_box_2_image')){
                   if(get_field('default_box_2_ext_link')) {$link2 = get_field('default_box_2_ext_link');} else {$link2 = get_field('default_box_2_int_link');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('default_box_2_image'); ?>"/>
                    <p><?php the_field('default_box_2_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_2_external_link','options')) {$link2 = get_field('box_2_external_link','options');} else {$link2 = get_field('box_2_internal_link','options');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('box_2_image','options'); ?>"/>
                    <p><?php the_field('box_2_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* THIRD IMAGE BOX */
                  
                  if(get_field('default_box_3_image')){
                   if(get_field('default_box_1_ext_link')) {$link3 = get_field('default_box_3_ext_link');} else {$link3 = get_field('default_box_3_int_link');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('default_box_3_image'); ?>"/>
                    <p><?php the_field('default_box_3_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_3_external_link','options')) {$link3 = get_field('box_3_external_link','options');} else {$link3 = get_field('box_3_internal_link','options');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('box_3_image','options'); ?>"/>
                    <p><?php the_field('box_3_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                  
              </div>
            </div>
				 </article>
				 
				 <article class="single-day"> <?php // Sunday ?>
		 			<?php if(get_field('sun_sold_out')) { ?>
		 				<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $sunday_analytics_date; ?>');" class="sold" href="#"><?php echo $sunday_day; ?></a>
		 			<?php } elseif($sunday < $now) { ?>
		 			  <a class="closed" href="#"><?php echo $sunday_day; ?></a>
		 			<?php } else { ?>
				    	<a onClick="ga('send', 'event', 'booking-date', 'open', '<?php echo $sunday_analytics_date; ?>');" href="#"><?php echo $sunday_day; ?></a>
				    <?php } ?>
				    <div class="day-details">
              <div class="row">
              	<div class="large-8 columns">
              		<h4><?php echo $sunday_long_day; ?></h4>
              		<?php if(get_field('sun_paragraph_text')) {
              				the_field('sun_paragraph_text');
            			} elseif(get_field('default_paragraph')) {
            			    the_field('default_paragraph');
            			} else {
              				the_field('syd_text','options');
            			} ?>
            		
              	</div>
              	<div class="large-4 columns">   		
              		<?php if( get_field('sun_booking_link') ) {
              			echo '<a href="' . get_field('sun_booking_link') . '" class="button white">Book Now</a>';
              		} else {
              			echo '<a href="' . get_field("syd_link","options") . '" class="button white">Book Now</a>';
              		} ?>
              		<?php $notes = get_field('sun_announcements'); 
              			if($notes){
              				foreach($notes as $note){
              					echo '<h6>' . $note['text'] . '</h6>';
              				}
              			}
              		?>
              	</div>
                            </div><?php // end row ?>
              <div class="row">
                
                <?php 
                  /* FIRST IMAGE BOX */
                  
                  if(get_field('default_box_1_image')){
                   if(get_field('default_box_1_ext_link')) {$link1 = get_field('default_box_1_ext_link');} else {$link1 = get_field('default_box_1_int_link');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('default_box_1_image'); ?>"/>
                    <p><?php the_field('default_box_1_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_1_external_link','options')) {$link1 = get_field('box_1_external_link','options');} else {$link1 = get_field('box_1_internal_link','options');} ?>
                  <a href="<?php echo $link1; ?>" class="image-box">
                    <img src="<?php the_field('box_1_image','options'); ?>"/>
                    <p><?php the_field('box_1_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* SECOND IMAGE BOX */
                  
                  if(get_field('default_box_2_image')){
                   if(get_field('default_box_2_ext_link')) {$link2 = get_field('default_box_2_ext_link');} else {$link2 = get_field('default_box_2_int_link');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('default_box_2_image'); ?>"/>
                    <p><?php the_field('default_box_2_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_2_external_link','options')) {$link2 = get_field('box_2_external_link','options');} else {$link2 = get_field('box_2_internal_link','options');} ?>
                  <a href="<?php echo $link2; ?>" class="image-box">
                    <img src="<?php the_field('box_2_image','options'); ?>"/>
                    <p><?php the_field('box_2_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                <?php 
                  /* THIRD IMAGE BOX */
                  
                  if(get_field('default_box_3_image')){
                   if(get_field('default_box_1_ext_link')) {$link3 = get_field('default_box_3_ext_link');} else {$link3 = get_field('default_box_3_int_link');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('default_box_3_image'); ?>"/>
                    <p><?php the_field('default_box_3_text'); ?></p>
                  </a>
               <?php } else { ?>
                  <?php if(get_field('box_3_external_link','options')) {$link3 = get_field('box_3_external_link','options');} else {$link3 = get_field('box_3_internal_link','options');} ?>
                  <a href="<?php echo $link3; ?>" class="image-box">
                    <img src="<?php the_field('box_3_image','options'); ?>"/>
                    <p><?php the_field('box_3_title','options'); ?></p>
                  </a>
                <?php } ?>
                
                  
              </div>
            </div>
				 </article>
				 
			<div class="content"></div>
			<?php
			endwhile; 
			endif;
			
			// Reset Post Data
			wp_reset_postdata();
			
			?>
			<div class="row">
				<div class="small-12 columns guide">
					<h5>Date Guide</h5>
					<p><b class="date-guide"></b>Dates in orange are sold out.</p>
				</div> 
			</div>
			
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>