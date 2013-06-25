
 //$('.bookings>article:nth-of-type(7n)').after('<div class="content"></div>');
 
 $('.bookings>article a').on('click',function(e){
  // Stop Link from working
  e.preventDefault();
  if($(this).hasClass('select')){
    $(this).removeClass('select');
    $('.content').empty().removeClass('open');
  } else {
  	if($(this).hasClass('closed')) {
  		$('a').removeClass('select');
  		$('.content').empty().removeClass('open');
  	} else {
    	$('a').removeClass('select');
		$('.content').empty().removeClass('open');
		var content = $(this).parent().find('div').html();
		var box = $(this).parent().nextAll('.content').first();
		$(box).addClass('open').html(content);
		$(this).addClass('select');
	}
  }
});