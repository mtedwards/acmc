<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h2>Instagram Feed <a href="http://instagram.com/MCDiningandBar" target="_blank">#mcdb</a></h2>
				</header>
				<div class="entry-content">
				  <div class="instagram"></div>
				  <!-- <button class="more-instagram">Get More</button> -->
				</div>
			</article>
		<?php endwhile; ?>
		
		<?php else : ?>
			
		
	<?php endif; // end have_posts() check ?>
	
	<?php
				    $theurl = 'https://api.instagram.com/v1/users/self/media/liked?access_token=432324504.5b9e1e6.68a7b3abd5c9438f8afa65f107995f09';
            
            if ( false === ( $result = get_transient( 'instragram' ) ) ) {
              // It wasn't there, so regenerate the data and save the transient
              $result = wp_remote_get($theurl);
              set_transient( 'instragram', $result, 60*60*12 );

            }
            
            // processing further
            $result    = json_decode( $result['body'] ); ?>
            
            <script type="text/javascript">
              $(document).ready(function(){
              
                 
              function createPhotoElement(photo) {
                  var image_url = photo.images.low_resolution.url; // 306 x 306
                  //var image_url = photo.images.thumbnail.url; // 150 x 150
                  //var image_url = photo.images.standard_resolution.url; // 612 x 612
                  var likes = photo.likes.count;
                  var user = photo.user.username;
                  var username = photo.user.full_name;
                  var userurl = 'http://instagram.com/' + user;
                  var type = photo.type;
                  
                  var innerHtml = $('<img>')
                    .addClass('instagram-' + type )
                    .attr('src', image_url);
                  
                  
                  var cap_details = '<figcaption><i class="likes icon-heart"> ' + likes + '</i><i class="user"><a href="' + userurl + '" target="_blank">' + username + '</a></i></figcaption>';
              
                  innerHtml = $('<a>')
                      .attr('target', '_blank')
                      .attr('href', photo.link)
                      .append(innerHtml);
            
                  return $('<figure>')
                    .addClass('myImg')
                    .attr('id', photo.id)
                    .append(innerHtml)
                    .append(cap_details);
                }
            
            
            
              var stuff = <?php print json_encode($result); ?>;
              var url = <?php print json_encode($theurl); ?>;
              
              var that = $('div.instagram');
              
              var next_link = stuff.pagination.next_max_like_id;
              
              var photos = stuff.data;
              
              for(var i = 0;i < photos.length-1;i++)
              {
                var photo = photos[i];
                that.append(createPhotoElement(photo));
              }
              
              that.after('<div style="clear:both; margin-top:20px; text-align:center;"><a href="#" class="button white insta-next" style="width:300px; margin:0 auto;" data-next="' + url + '&max_like_id=' + next_link + '">More Photos</a></div>');
            
            
              $("body").on("click",".insta-next", function(event){
                event.preventDefault();
                $(this).addClass('clicked').fadeOut('slow');
                var new_url = $(this).data('next');
                //alert(new_url);
                $.ajax({
                        type: "GET",
                        dataType: "jsonp",
                        cache: false,
                        url: new_url,
                        success: function(data) {
                          var photos = data.data;
                          console.log(data);
                          var next_link = data.pagination.next_max_like_id;
                          for(var i = 0;i < photos.length-1;i++)
                            {
                              var photo = photos[i];
                              that.append(createPhotoElement(photo));
                            }
                            if(next_link){
                              that.after('<div style="clear:both; margin-top:20px; text-align:center;"><a href="#" class="button white insta-next" style="width:300px; margin:0 auto;" data-next="' + url + '&max_like_id=' + next_link + '">More Photos</a></div');
                              } else {
                                that.after('<div style="clear:both; margin-top:20px; text-align:center;"><h4>You\'ve reached the end.<br>Follow us on Instragram for more...<br><a href="http://instagram.com/MCDiningandBar" target="_blank">@MCDiningandBar</a></h4></div>');
                              }
                          }
                          
                        });
            
              });
            });
            
          </script>

	

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>