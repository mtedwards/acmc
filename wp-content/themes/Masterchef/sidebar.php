<aside id="sidebar" class="small-12 large-4 columns">
  <div class="share addthis_toolbox">
      <h3>Share</h3>
      <a class="addthis_button_compact"></a>
      <a class="addthis_button_pinterest_share"></a>
      <a class="addthis_button_email"></a>
      <a class="addthis_button_twitter"></a>
      <a onClick="alert('This')" class="addthis_button_facebook"></a>
	</div>

  <div class="widget twitter">
    	<h2>Tweets <a href="http://twitter.com/MCDiningandBar" class="white button" target="_blank">@MCDiningandBar</a></h2>
		<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/MCDiningandBar" data-widget-id="342532044649291776" data-chrome="noborders noheader" width="450" height="500">@MCDiningandBar</a>
  </div>
  
<!--
  <div class="widget">
    <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler_003.png" alt="Tip-Doubler" />
  </div>
-->
  
  <div class="widget tip-doubler">
      <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Header.png" alt="Tip-Doubler" />
      <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_TextAbove.png" alt="Tip-Doubler" />
      <?php $tip = get_field('tip-doubler','options');
        if($tip == 'closed') {?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_closed.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'zero') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel0.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'five') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel5.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'ten') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel10.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'fifteen') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel15.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'twenty') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel20.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'twentyfive') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel25.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'thirty') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel30.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'thirtyfive') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel35.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'forty') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel40.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'fortyfive') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel45.png" alt="Tip-Doubler" />
        <?php } elseif($tip == 'fifty') { ?>
          <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_Syd35Mel50.png" alt="Tip-Doubler" />
        <?php } ?>
      <img src="<?php bloginfo('template_url'); ?>/img/Tip-Doubler/MCD-TD_TextBelow.png" alt="Tip-Doubler" />
  </div>
  
</aside><!-- /#sidebar -->