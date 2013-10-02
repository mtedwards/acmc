//get sizes and ratio
  var docWidth = +$('.container').width();
  var articleWidth = +$('article').width();
  articleWidth = articleWidth + 20;
  var ratio = docWidth / articleWidth;
  ratio = Math.floor(ratio);
  if(ratio == 0){
    ratio = 1;
  }
  ratio = ratio + 'n';

  // Insert the box (allow for responsive and filtering)
  
  $('article:nth-of-type(' + ratio + ')').after('<div class="content added"></div>');
  
  $(window).resize(function() {
    $('.added').remove();
    $('article').removeClass('current');
    var docWidth = +$('.container').width();
    var articleWidth = +$('article').width();
    articleWidth = articleWidth + 20;
    var ratio = docWidth / articleWidth;
    ratio = Math.floor(ratio);
    if(ratio == 0){
      ratio = 1;
    }
    ratio = ratio + 'n';
    $('article:nth-of-type(' + ratio + ')').after('<div class="content added"></div>');
  });

$('article').on('click',function(e){
  // Stop Link from working
  e.preventDefault();
  
  // Get the content from the clicked article
  content = $(this).find('div').html();
  
  // Fend the next spot to put the conent
  box = $(this).nextAll('.content').first();
    
  // OK is the clicked article open?
  
  if($(this).hasClass('current')) {
      // If so, close it and remove the active content
     $(this).removeClass('current');
     $(box).removeClass('open').empty();
     $(this).parent().find('.content').empty(); 
  } else {
      // No? Ok then...
    // Reset the active article
    $('article').removeClass('current');
    
    //activate the clicked post
    $(this).addClass('current');
    
    // empty all contnet boxes
    $(this).parent().find('.content').empty(); 
   
    // reset all open content boxes
    $('.open').removeClass('open').empty();
    
    // Open the current box and 
    $(box).addClass('open').html(content);
  }
 })