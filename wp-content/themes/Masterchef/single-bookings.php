<?php get_header(); the_post(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns bookings" role="main">
		<h2><?php  the_title(); ?></h2>
		<h3><?php the_field('header'); ?></h3>
		
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
			$dates = get_field('dates');
			foreach($dates as $day){
			// Dates
				$disabled = 0;
				$date = $day['date'];
				$day_number = date("j", strtotime($date)) . "\n";
				if($day_number == 1){$day_number = date("j M", strtotime($date)) . "\n"; }
				$day_of_week = date("w", strtotime($date)) . "\n";
				if($day_of_week == 1){$disabled = 'closed';} 
				$day_long = date("D j F", strtotime($date)) . "\n";
		 ?>
		 	<?php if($disabled === 'closed'){ ?>
		 		<article class="closed single-day">
		 			<a><?php echo $day_number; ?></a>
		 		</article>
		 	<?php } else { ?>
				<article class="single-day">
				    <a href="#"><?php echo $day_number; ?></a>
				    <div class="day-details">
					    <div class="row">
					    	<div class="large-8 columns">
					    		<h4><?php echo $day_long; ?></h4>
					    		<?php if($day['description']) {
					    				echo $day['description'];
									} else {
					    				the_field('syd_text','options');
									} ?>
								
					    	</div>
							<div class="large-4 columns">
								
								<?php if( $day['booking_link'] ) {
									echo '<a href="' . $day["booking_link"] . '" class="button white">Book Now</a>';
								} else {
									echo '<a href="' . get_field("syd_link","options") . '" class="button white">Book Now</a>';
								} ?>
								<?php $notes = $day['notifications']; 
									if($notes){
										foreach($notes as $note){
											echo '<h6>' . $note['note_text'] . '</h6>';
										}
									}
								?>
								
							</div>
					    </div>
				    </div>
				 </article>
			<?php } // end if ?>
		<?php } //end for each ?>
	
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>