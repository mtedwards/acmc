// Define Functions

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

function contentDiv_tier2() {
    $('.tier_2 .added').remove();
    $('.tier_2 article.show.eq(3)').after('<div class="content added"></div>');
}



if($('.boxes article').length){
    $('.boxes article').addClass('show');
    setTimeout(contentDiv, 500);
}

if($('.boxes.tier_2 article').length){
    setTimeout(contentDiv_tier2, 500);
}

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
$('.boxes').on('click', 'article > a',function(e){
  e.preventDefault();
  thisArticle = $(this).closest('article');
  content = $(thisArticle).find('div.details').html();
  box = $(thisArticle).nextAll('.content').first();
  
  if($(thisArticle).hasClass('current')) {
  
     $(thisArticle).removeClass('current');
     $(box).removeClass('open').empty();
     $(thisArticle).parent().find('.content').empty(); 
 
  } else {
 
    $('article').removeClass('current');
    $(thisArticle).addClass('current');
    $(thisArticle).parent().find('.content').empty(); 
    $('.open').removeClass('open').empty();
    $(box).addClass('open').html(content);
  
  }
 });
 
 