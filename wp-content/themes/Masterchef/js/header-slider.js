images = $('.slider img');

$.each(images, function(){
   $(this).attr('src',$(this).data('src'));
});

$(images).last().addClass('active');
setTimeout(slideShow, 10000);

function slideShow() {
  var current = $('.slider img.active');
  var next = current.next().length ? current.next() : current.siblings().first();
   setTimeout(slideShow, 10000);
  current.removeClass('active');
  next.addClass('active');
}