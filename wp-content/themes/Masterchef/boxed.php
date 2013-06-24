<?php 
  /*
    To call, pass following variables
    $link
    $image
    $title
  */
 ?>
<article>
  <a href="<?php echo $link; ?>">
    <img src="<?php echo $image; ?>">
    <div class="small-details">
      <b><?php echo $title; ?></b>
    </div>
  </a>
</article>