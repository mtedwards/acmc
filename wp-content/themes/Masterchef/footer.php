</section><!-- Container End -->

<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

<footer class="row full-width" role="contentinfo">
	<div class="small-12 large-4 columns">
		<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
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
</body>
</html>