</section><!-- Container End -->


<footer class="full-width" role="contentinfo">
  <div class="row">
  	<div class="small-12 large-12 columns">
		  <?php $logos = get_field('partner_logos','options'); 
  		  if($logos) { ?>
    		 <ul class="footer_logos"> 
    		  <?php foreach($logos as $logo) { ?>
    		    <li>
    		      <a onClick="ga('send', 'event', 'partners', 'footer', '<?php echo $logo['partner_name']; ?>'" href="<?php echo $logo['logo_link']; ?>" target="_blank">
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
  	<div class="small-12 large-12 columns follow">
  	 <h3>Follow:</h3>
  	 <a onClick="ga('send', 'event', 'follow', 'footer', 'facebook'"  class="facebook icon-facebook" href="https://www.facebook.com/MCDiningandBar" target="_blank"></a>
  	 <a onClick="ga('send', 'event', 'follow', 'footer', 'twitter'"  class="twitter icon-twitter" href="https://twitter.com/MCDiningandBar" target="_blank"></a>
  	 <a onClick="ga('send', 'event', 'follow', 'footer', 'instagram'"  class="instagram icon-instagram" href="http://instagram.com/MCDiningandBar" target="_blank"></a>
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

<script type="text/javascript">
adroll_adv_id = "2FASQ53YHJEFNBBKSKDOBT";
adroll_pix_id = "4SRGFMFKCRBS5FIM46Z2KB";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>

</body>
</html>