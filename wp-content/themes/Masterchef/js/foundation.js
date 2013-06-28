// @codekit-prepend "respond.js"
// @codekit-prepend "header-slider.js"
// @codekit-prepend "foundation/foundation.js"
// @codekit-prepend "foundation/foundation.topbar.js"
// @codekit-prepend "bookings.js"
// @codekit-prepend "boxes.js"
// @codekit-prepend "fitvids.js"

$(document).ready(function(){
    // Hide nav on iphone
    window.scrollTo(0,1);
    // Target your .container, .wrapper, .post, etc.
    $(".entry-content").fitVids();
  });
