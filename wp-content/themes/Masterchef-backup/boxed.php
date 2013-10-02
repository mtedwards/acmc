<?php 
  /*
    To call, pass following variables
    $link
    $image
    $title
  */
 ?>
<article>
  <a onClick="ga('send', 'event', 'boxes', 'front-page', '<?php echo $title ?>');" href="<?php echo $link; ?>">
    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
    <div class="small-details">
      <b><?php echo $title; ?></b>
    </div>
  </a>
</article>