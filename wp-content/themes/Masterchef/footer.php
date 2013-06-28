</section><!-- Container End -->


<footer class="full-width" role="contentinfo">
  <div class="row">
  	<div class="small-12 large-12 columns">
		  <?php $logos = get_field('partner_logos','options'); 
  		  if($logos) { ?>
    		 <ul class="footer_logos"> 
    		  <?php foreach($logos as $logo) { ?>
    		    <li>
    		      <a href="<?php echo $logo['logo_link']; ?>" target="_blank">
    		        <?php $logo_img = $logo['logo_image']; ?>
    		        <img src="<?php echo $logo_img['url']; ?>" alt="<?php echo $logo_img['alt']; ?>"/>
    		      </a>
    		    </li>
    		  <?php } // end for each ?>
    		 </ul>
  		 <? } // end if logos?>  
		  <ul>
		  </ul>
		</div>
  </div>
  <div class="row">
  	<div class="small-12 large-8 large-centered columns">
		  <small><?php the_field('footer_text','options'); ?></small>
		</div>
  </div>
</footer>

<?php wp_footer(); ?>

  <script>
  	$(document).foundation();
  </script>
  <script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
    if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
    js.src=p+"://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
  </script>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js"></script>
</body>
</html>