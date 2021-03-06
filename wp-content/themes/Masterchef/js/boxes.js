// Define Functions

           /*
             $(this).addClass('current');
           content = $(this).find('div.details').html();
           $(this).nextAll('.content').first().addClass('open').html(content);
*/  

function contentDiv() {
    $('.added').remove();
    $('.boxes article').removeClass('current');
    var docWidth = +$('.boxes').width();
    var articleWidth = +$('.boxes article').width();

    var ratio = docWidth / articleWidth;
    ratio = Math.floor(ratio);
    if(ratio == 0) {
      ratio = 1;
    }
    ratio = ratio + 'n';
    $('article.show:nth-of-type(' + ratio + ')').after('<div class="content added"></div>');
    
    if($('.boxes.open-first article').length){

        thisArticle = $('.boxes.open-first article').first();
        
        $(thisArticle).addClass('current');
        
        content = $(thisArticle).find('div.details').html();
        box = $(thisArticle).nextAll('.content').first();
        
        $(box).addClass('open').html(content);
        
    }
    
    if(window.location.hash) {
      var hash = location.hash.replace('#', '');
      
      $('.open').removeClass('open').empty();
      $('article').removeClass('current');
      
        thisArticle = $('.boxes article[data-title="' + hash +'"]');
        
        $(thisArticle).addClass('current');
        
        content = $(thisArticle).find('div.details').html();
        box = $(thisArticle).nextAll('.content').first();
        
        $(box).addClass('open').html(content);      
    }
}

function contentDiv_tier2() {
    $('.tier_2 .added').remove();
    
    var docWidth = +$('.boxes.tier_2').width();
    var articleWidth = +$('.boxes.tier_2 article').width();

    var ratio2 = docWidth / articleWidth;
    ratio2 = Math.floor(ratio2);
    if(ratio2 == 0) {
      ratio2 = 1;
    }
    ratio2 = ratio2 + 'n';

    $('.tier_2 article.second:nth-of-type(' + ratio2 + ')').after('<div class="content added"></div>');
}




if($('.boxes article').length){
    $('.boxes article').addClass('show');
    setTimeout(contentDiv, 500);
}

if($('.boxes.tier_2 article').length){
  $('.boxes.tier_2 article').removeClass('show').addClass('second');
    setTimeout(contentDiv_tier2, 600);
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
 
 