images = $('.slider img');

$(images).last().addClass('active');
slideShow();

function slideShow() {
  var current = $('.slider img.active');
  var next = current.next().length ? current.next() : current.siblings().first();
   setTimeout(slideShow, 10000);
  current.removeClass('active');
  next.addClass('active');
}