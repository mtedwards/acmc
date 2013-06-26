// Define Functions
 if($('.boxes article').length){
function contentDiv() {
    $('.added').remove();
    $('.boxes article').removeClass('current');
    var docWidth = +$('.boxes').width();
    var articleWidth = +$('.boxes article').width();
    articleWidth = articleWidth;
    var ratio = docWidth / articleWidth;
    ratio = Math.floor(ratio);
    if(ratio == 0) {
      ratio = 1;
    }
    ratio = ratio + 'n';
    $('article.show:nth-of-type(' + ratio + ')').after('<div class="content added"></div>');
}

// Fire everything to start off
$('.boxes article').addClass('show');
contentDiv();

// RESIZE -   
$(window).resize(function() {
  contentDiv();
});

// filtering
var articles = $('.boxes article');

$('.filters a').click(function(e){
  $('.filters a').removeClass('active-filter');
  $(this).addClass('active-filter');
  e.preventDefault();
  var filter = $(this).data('filter');
  $('.boxes').empty();
  if( filter == "all") {
    $('.boxes').hide().html(articles).fadeIn(1000).append('<div class="content"></div>');
  } else {
    filter = '.'+filter;
    filter_articles = $(articles).filter(filter);
    $('.boxes').hide().html(filter_articles).fadeIn(1000).append('<div class="content"></div>');
  }
  
  contentDiv();
  
  });


// ARTICLE CLICK
$('.boxes').on('click', 'article',function(e){
  e.preventDefault();
  content = $(this).find('div.details').html();
  box = $(this).nextAll('.content').first();
  if($(this).hasClass('current')) {
  
     $(this).removeClass('current');
     $(box).removeClass('open').empty();
     $(this).parent().find('.content').empty(); 
 
  } else {
 
    $('article').removeClass('current');
    $(this).addClass('current');
    $(this).parent().find('.content').empty(); 
    $('.open').removeClass('open').empty();
    $(box).addClass('open').html(content);
  
  }
 
 });
   }