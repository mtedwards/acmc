function slideShow(){var e=$(".slider img.active"),t=e.next().length?e.next():e.siblings().first();setTimeout(slideShow,1e4);e.removeClass("active");t.addClass("active")}function contentDiv(){$(".added").remove();$(".boxes article").removeClass("current");var e=+$(".boxes").width(),t=+$(".boxes article").width();t=t;var n=e/t;n=Math.floor(n);n==0&&(n=1);n+="n";$("article.show:nth-of-type("+n+")").after('<div class="content added"></div>')}images=$(".slider img");$(images).last().addClass("active");slideShow();var libFuncName=null;if(typeof jQuery=="undefined"&&typeof Zepto=="undefined"&&typeof $=="function")libFuncName=$;else if(typeof jQuery=="function")libFuncName=jQuery;else{if(typeof Zepto!="function")throw new TypeError;libFuncName=Zepto}(function(e,t,n,r){"use strict";t.matchMedia=t.matchMedia||function(e,t){var n,r=e.documentElement,i=r.firstElementChild||r.firstChild,s=e.createElement("body"),o=e.createElement("div");o.id="mq-test-1";o.style.cssText="position:absolute;top:-100em";s.style.background="none";s.appendChild(o);return function(e){o.innerHTML='&shy;<style media="'+e+'"> #mq-test-1 { width: 42px; }</style>';r.insertBefore(s,i);n=o.offsetWidth===42;r.removeChild(s);return{matches:n,media:e}}}(n);Array.prototype.filter||(Array.prototype.filter=function(e){if(this==null)throw new TypeError;var t=Object(this),n=t.length>>>0;if(typeof e!="function")return;var r=[],i=arguments[1];for(var s=0;s<n;s++)if(s in t){var o=t[s];e&&e.call(i,o,s,t)&&r.push(o)}return r});Function.prototype.bind||(Function.prototype.bind=function(e){if(typeof this!="function")throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");var t=Array.prototype.slice.call(arguments,1),n=this,r=function(){},i=function(){return n.apply(this instanceof r&&e?this:e,t.concat(Array.prototype.slice.call(arguments)))};r.prototype=this.prototype;i.prototype=new r;return i});Array.prototype.indexOf||(Array.prototype.indexOf=function(e){if(this==null)throw new TypeError;var t=Object(this),n=t.length>>>0;if(n===0)return-1;var r=0;if(arguments.length>1){r=Number(arguments[1]);r!=r?r=0:r!=0&&r!=Infinity&&r!=-Infinity&&(r=(r>0||-1)*Math.floor(Math.abs(r)))}if(r>=n)return-1;var i=r>=0?r:Math.max(n-Math.abs(r),0);for(;i<n;i++)if(i in t&&t[i]===e)return i;return-1});e.fn.stop=e.fn.stop||function(){return this};t.Foundation={name:"Foundation",version:"4.2.0",cache:{},init:function(t,n,r,i,s,o){var u,a=[t,r,i,s],f=[],o=o||!1;o&&(this.nc=o);this.rtl=/rtl/i.test(e("html").attr("dir"));this.scope=t||this.scope;if(n&&typeof n=="string"&&!/reflow/i.test(n)){if(/off/i.test(n))return this.off();u=n.split(" ");if(u.length>0)for(var l=u.length-1;l>=0;l--)f.push(this.init_lib(u[l],a))}else{/reflow/i.test(n)&&(a[1]="reflow");for(var c in this.libs)f.push(this.init_lib(c,a))}typeof n=="function"&&a.unshift(n);return this.response_obj(f,a)},response_obj:function(e,t){for(var n=0,r=t.length;n<r;n++)if(typeof t[n]=="function")return t[n]({errors:e.filter(function(e){if(typeof e=="string")return e})});return e},init_lib:function(e,t){return this.trap(function(){if(this.libs.hasOwnProperty(e)){this.patch(this.libs[e]);return this.libs[e].init.apply(this.libs[e],t)}return function(){}}.bind(this),e)},trap:function(e,t){if(!this.nc)try{return e()}catch(n){return this.error({name:t,message:"could not be initialized",more:n.name+" "+n.message})}return e()},patch:function(e){this.fix_outer(e);e.scope=this.scope;e.rtl=this.rtl},inherit:function(e,t){var n=t.split(" ");for(var r=n.length-1;r>=0;r--)this.lib_methods.hasOwnProperty(n[r])&&(this.libs[e.name][n[r]]=this.lib_methods[n[r]])},random_str:function(e){var t="0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz".split("");e||(e=Math.floor(Math.random()*t.length));var n="";for(var r=0;r<e;r++)n+=t[Math.floor(Math.random()*t.length)];return n},libs:{},lib_methods:{set_data:function(e,t){var n=[this.name,+(new Date),Foundation.random_str(5)].join("-");Foundation.cache[n]=t;e.attr("data-"+this.name+"-id",n);return t},get_data:function(e){return Foundation.cache[e.attr("data-"+this.name+"-id")]},remove_data:function(t){if(t){delete Foundation.cache[t.attr("data-"+this.name+"-id")];t.attr("data-"+this.name+"-id","")}else e("[data-"+this.name+"-id]").each(function(){delete Foundation.cache[e(this).attr("data-"+this.name+"-id")];e(this).attr("data-"+this.name+"-id","")})},throttle:function(e,t){var n=null;return function(){var r=this,i=arguments;clearTimeout(n);n=setTimeout(function(){e.apply(r,i)},t)}},data_options:function(t){function u(e){return!isNaN(e-0)&&e!==null&&e!==""&&e!==!1&&e!==!0}function a(t){return typeof t=="string"?e.trim(t):t}var n={},r,i,s=(t.attr("data-options")||":").split(";"),o=s.length;for(r=o-1;r>=0;r--){i=s[r].split(":");/true/i.test(i[1])&&(i[1]=!0);/false/i.test(i[1])&&(i[1]=!1);u(i[1])&&(i[1]=parseInt(i[1],10));i.length===2&&i[0].length>0&&(n[a(i[0])]=a(i[1]))}return n},delay:function(e,t){return setTimeout(e,t)},scrollTo:function(n,r,i){if(i<0)return;var s=r-e(t).scrollTop(),o=s/i*10;this.scrollToTimerCache=setTimeout(function(){if(!isNaN(parseInt(o,10))){t.scrollTo(0,e(t).scrollTop()+o);this.scrollTo(n,r,i-10)}}.bind(this),10)},scrollLeft:function(e){if(!e.length)return;return"scrollLeft"in e[0]?e[0].scrollLeft:e[0].pageXOffset},empty:function(e){if(e.length&&e.length>0)return!1;if(e.length&&e.length===0)return!0;for(var t in e)if(hasOwnProperty.call(e,t))return!1;return!0}},fix_outer:function(e){e.outerHeight=function(e,t){return typeof Zepto=="function"?e.height():typeof t!="undefined"?e.outerHeight(t):e.outerHeight()};e.outerWidth=function(e){return typeof Zepto=="function"?e.width():typeof bool!="undefined"?e.outerWidth(bool):e.outerWidth()}},error:function(e){return e.name+" "+e.message+"; "+e.more},off:function(){e(this.scope).off(".fndtn");e(t).off(".fndtn");return!0},zj:function(){return typeof Zepto!="undefined"?Zepto:jQuery}()};e.fn.foundation=function(){var e=Array.prototype.slice.call(arguments,0);return this.each(function(){Foundation.init.apply(Foundation,[this].concat(e));return this})}})(libFuncName,this,this.document);(function(e,t,n,r){"use strict";Foundation.libs.topbar={name:"topbar",version:"4.2.0",settings:{index:0,stickyClass:"sticky",custom_back_text:!0,back_text:"Back",is_hover:!0,scrolltop:!0,init:!1},init:function(n,r,i){Foundation.inherit(this,"data_options");var s=this;typeof r=="object"?e.extend(!0,this.settings,r):typeof i!="undefined"&&e.extend(!0,this.settings,i);if(typeof r!="string"){e(".top-bar, [data-topbar]").each(function(){e.extend(!0,s.settings,s.data_options(e(this)));s.settings.$w=e(t);s.settings.$topbar=e(this);s.settings.$section=s.settings.$topbar.find("section");s.settings.$titlebar=s.settings.$topbar.children("ul").first();s.settings.$topbar.data("index",0);var n=e("<div class='top-bar-js-breakpoint'/>").insertAfter(s.settings.$topbar);s.settings.breakPoint=n.width();n.remove();s.assemble();s.settings.$topbar.parent().hasClass("fixed")&&e("body").css("padding-top",s.outerHeight(s.settings.$topbar))});s.settings.init||this.events();return this.settings.init}return this[r].call(this,i)},events:function(){var n=this,r=this.outerHeight(e(".top-bar, [data-topbar]"));e(this.scope).off(".fndtn.topbar").on("click.fndtn.topbar",".top-bar .toggle-topbar, [data-topbar] .toggle-topbar",function(i){var s=e(this).closest(".top-bar, [data-topbar]"),o=s.find("section, .section"),u=s.children("ul").first();i.preventDefault();if(n.breakpoint()){if(!n.rtl){o.css({left:"0%"});o.find(">.name").css({left:"100%"})}else{o.css({right:"0%"});o.find(">.name").css({right:"100%"})}o.find("li.moved").removeClass("moved");s.data("index",0);s.toggleClass("expanded").css("min-height","")}if(!s.hasClass("expanded")){if(s.hasClass("fixed")){s.parent().addClass("fixed");s.removeClass("fixed");e("body").css("padding-top",r)}}else if(s.parent().hasClass("fixed")){s.parent().removeClass("fixed");s.addClass("fixed");e("body").css("padding-top","0");n.settings.scrolltop&&t.scrollTo(0,0)}}).on("mouseenter mouseleave",".top-bar li",function(t){if(!n.settings.is_hover)return;/enter|over/i.test(t.type)?e(this).addClass("hover"):e(this).removeClass("hover")}).on("click.fndtn.topbar",".top-bar li.has-dropdown",function(t){if(n.breakpoint())return;var r=e(this),i=e(t.target),s=r.closest("[data-topbar], .top-bar"),o=s.data("topbar");if(n.settings.is_hover&&!Modernizr.touch)return;t.stopImmediatePropagation();i[0].nodeName==="A"&&i.parent().hasClass("has-dropdown")&&t.preventDefault();r.hasClass("hover")?r.removeClass("hover").find("li").removeClass("hover"):r.addClass("hover")}).on("click.fndtn.topbar",".top-bar .has-dropdown>a, [data-topbar] .has-dropdown>a",function(t){if(n.breakpoint()){t.preventDefault();var r=e(this),i=r.closest(".top-bar, [data-topbar]"),s=i.find("section, .section"),o=i.children("ul").first(),u=r.next(".dropdown").outerHeight(),a=r.closest("li");i.data("index",i.data("index")+1);a.addClass("moved");if(!n.rtl){s.css({left:-(100*i.data("index"))+"%"});s.find(">.name").css({left:100*i.data("index")+"%"})}else{s.css({right:-(100*i.data("index"))+"%"});s.find(">.name").css({right:100*i.data("index")+"%"})}i.css("min-height",n.height(r.siblings("ul"))+n.outerHeight(o,!0))}});e(t).on("resize.fndtn.topbar",function(){n.breakpoint()||e(".top-bar, [data-topbar]").css("min-height","").removeClass("expanded").find("li").removeClass("hover")}.bind(this));e("body").on("click.fndtn.topbar",function(t){var n=e(t.target).closest("[data-topbar], .top-bar");if(n.length>0)return;e(".top-bar li, [data-topbar] li").removeClass("hover")});e(this.scope).on("click.fndtn",".top-bar .has-dropdown .back, [data-topbar] .has-dropdown .back",function(t){t.preventDefault();var r=e(this),i=r.closest(".top-bar, [data-topbar]"),s=i.children("ul").first(),o=i.find("section, .section"),u=r.closest("li.moved"),a=u.parent();i.data("index",i.data("index")-1);if(!n.rtl){o.css({left:-(100*i.data("index"))+"%"});o.find(">.name").css({left:100*i.data("index")+"%"})}else{o.css({right:-(100*i.data("index"))+"%"});o.find(">.name").css({right:100*i.data("index")+"%"})}i.data("index")===0?i.css("min-height",0):i.css("min-height",n.height(a)+n.outerHeight(s,!0));setTimeout(function(){u.removeClass("moved")},300)})},breakpoint:function(){return e(t).width()<=this.settings.breakPoint||e("html").hasClass("lt-ie9")},assemble:function(){var t=this;this.settings.$section.detach();this.settings.$section.find(".has-dropdown>a").each(function(){var n=e(this),r=n.siblings(".dropdown"),i=n.attr("href");if(i&&i.length>1)var s=e('<li class="title back js-generated"><h5><a href="#"></a></h5></li><li><a class="parent-link js-generated" href="'+i+'">'+n.text()+"</a></li>");else var s=e('<li class="title back js-generated"><h5><a href="#"></a></h5></li>');t.settings.custom_back_text==1?s.find("h5>a").html("&laquo; "+t.settings.back_text):s.find("h5>a").html("&laquo; "+n.html());r.prepend(s)});this.settings.$section.appendTo(this.settings.$topbar);this.sticky()},height:function(t){var n=0,r=this;t.find("> li").each(function(){n+=r.outerHeight(e(this),!0)});return n},sticky:function(){var n="."+this.settings.stickyClass;if(e(n).length>0){var r=e(n).length?e(n).offset().top:0,i=e(t),s=this.outerHeight(e(".top-bar"));i.scroll(function(){if(i.scrollTop()>=r){e(n).addClass("fixed");e("body").css("padding-top",s)}else if(i.scrollTop()<r){e(n).removeClass("fixed");e("body").css("padding-top","0")}})}},off:function(){e(this.scope).off(".fndtn.topbar");e(t).off(".fndtn.topbar")},reflow:function(){}}})(Foundation.zj,this,this.document);$(".bookings>article:nth-of-type(7n)").after('<div class="content"></div>');$(".bookings>article a").on("click",function(e){e.preventDefault();if($(this).hasClass("select")){$(this).removeClass("select");$(".content").empty().removeClass("open")}else if($(this).hasClass("closed")){$("a").removeClass("select");$(".content").empty().removeClass("open")}else{$("a").removeClass("select");$(".content").empty().removeClass("open");var t=$(this).parent().find("div").html(),n=$(this).parent().nextAll(".content").first();$(n).addClass("open").html(t);$(this).addClass("select")}});$(".boxes article").addClass("show");contentDiv();$(window).resize(function(){contentDiv()});var articles=$(".boxes article");$(".filters a").click(function(e){$(".filters a").removeClass("active-filter");$(this).addClass("active-filter");e.preventDefault();var t=$(this).data("filter");$(".boxes").empty();if(t=="all")$(".boxes").hide().html(articles).fadeIn(1e3).append('<div class="content"></div>');else{t="."+t;filter_articles=$(articles).filter(t);$(".boxes").hide().html(filter_articles).fadeIn(1e3).append('<div class="content"></div>')}contentDiv()});$(".boxes").on("click","article",function(e){e.preventDefault();content=$(this).find("div.details").html();box=$(this).nextAll(".content").first();if($(this).hasClass("current")){$(this).removeClass("current");$(box).removeClass("open").empty();$(this).parent().find(".content").empty()}else{$("article").removeClass("current");$(this).addClass("current");$(this).parent().find(".content").empty();$(".open").removeClass("open").empty();$(box).addClass("open").html(content)}});