</section><!-- Container End -->


<footer class="full-width" role="contentinfo">
  <div class="row">
  	<div class="small-12 large-14 columns">
		  <?php the_field('footer_text','options'); ?>
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