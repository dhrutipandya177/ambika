(function(){var a=jQuery;var c=(function(){function d(){this.fadeDuration=500;this.fitImagesInViewport=true;this.resizeDuration=700;this.positionFromTop=50;this.showImageNumberLabel=true;this.alwaysShowNavOnTouchDevices=false;this.wrapAround=false}d.prototype.albumLabel=function(e,f){return"Image "+e+" of "+f};return d})();var b=(function(){function d(e){this.options=e;this.album=[];this.currentImageIndex=void 0;this.init()}d.prototype.init=function(){this.enable();this.build()};d.prototype.enable=function(){var e=this;a("body").on("click","a[rel^=lightbox], area[rel^=lightbox], a[data-lightbox], area[data-lightbox]",function(f){e.start(a(f.currentTarget));return false})};d.prototype.build=function(){var e=this;a("<div id='lightboxOverlay' class='lightboxOverlay'></div><div id='lightbox' class='lightbox'><div class='lb-outerContainer'><div class='lb-container'><img class='lb-image' src='' /><div class='lb-nav'><a class='lb-prev' href='' ></a><a class='lb-next' href='' ></a></div><div class='lb-loader'><a class='lb-cancel'></a></div></div></div><div class='lb-dataContainer'><div class='lb-data'><div class='lb-details'><span class='lb-caption'></span><span class='lb-number'></span></div><div class='lb-closeContainer'><a class='lb-close'></a></div></div></div></div>").appendTo(a("body"));this.$lightbox=a("#lightbox");this.$overlay=a("#lightboxOverlay");this.$outerContainer=this.$lightbox.find(".lb-outerContainer");this.$container=this.$lightbox.find(".lb-container");this.containerTopPadding=parseInt(this.$container.css("padding-top"),10);this.containerRightPadding=parseInt(this.$container.css("padding-right"),10);this.containerBottomPadding=parseInt(this.$container.css("padding-bottom"),10);this.containerLeftPadding=parseInt(this.$container.css("padding-left"),10);this.$overlay.hide().on("click",function(){e.end();return false});this.$lightbox.hide().on("click",function(f){if(a(f.target).attr("id")==="lightbox"){e.end()}return false});this.$outerContainer.on("click",function(f){if(a(f.target).attr("id")==="lightbox"){e.end()}return false});this.$lightbox.find(".lb-prev").on("click",function(){if(e.currentImageIndex===0){e.changeImage(e.album.length-1)}else{e.changeImage(e.currentImageIndex-1)}return false});this.$lightbox.find(".lb-next").on("click",function(){if(e.currentImageIndex===e.album.length-1){e.changeImage(0)}else{e.changeImage(e.currentImageIndex+1)}return false});this.$lightbox.find(".lb-loader, .lb-close").on("click",function(){e.end();return false})};d.prototype.start=function(k){var q=this;var e=a(window);e.on("resize",a.proxy(this.sizeOverlay,this));a("select, object, embed").css({visibility:"hidden"});this.sizeOverlay();this.album=[];var p=0;function n(i){q.album.push({link:i.attr("href"),title:i.attr("data-title")||i.attr("title")})}var m=k.attr("data-lightbox");var o;if(m){o=a(k.prop("tagName")+'[data-lightbox="'+m+'"]');for(var h=0;h<o.length;h=++h){n(a(o[h]));if(o[h]===k[0]){p=h}}}else{if(k.attr("rel")==="lightbox"){n(k)}else{o=a(k.prop("tagName")+'[rel="'+k.attr("rel")+'"]');for(var g=0;g<o.length;g=++g){n(a(o[g]));if(o[g]===k[0]){p=g}}}}var l=e.scrollTop()+this.options.positionFromTop;var f=e.scrollLeft();this.$lightbox.css({top:l+"px",left:f+"px"}).fadeIn(this.options.fadeDuration);this.changeImage(p)};d.prototype.changeImage=function(h){var f=this;this.disableKeyboardNav();var g=this.$lightbox.find(".lb-image");this.$overlay.fadeIn(this.options.fadeDuration);a(".lb-loader").fadeIn("slow");this.$lightbox.find(".lb-image, .lb-nav, .lb-prev, .lb-next, .lb-dataContainer, .lb-numbers, .lb-caption").hide();this.$outerContainer.addClass("animating");var e=new Image();e.onload=function(){var m,j,k,o,i,n,l;g.attr("src",f.album[h].link);m=a(e);g.width(e.width);g.height(e.height);if(f.options.fitImagesInViewport){l=a(window).width();n=a(window).height();i=l-f.containerLeftPadding-f.containerRightPadding-20;o=n-f.containerTopPadding-f.containerBottomPadding-120;if((e.width>i)||(e.height>o)){if((e.width/i)>(e.height/o)){k=i;j=parseInt(e.height/(e.width/k),10);g.width(k);g.height(j)}else{j=o;k=parseInt(e.width/(e.height/j),10);g.width(k);g.height(j)}}}f.sizeContainer(g.width(),g.height())};e.src=this.album[h].link;this.currentImageIndex=h};d.prototype.sizeOverlay=function(){this.$overlay.width(a(window).width()).height(a(document).height())};d.prototype.sizeContainer=function(i,e){var h=this;var g=this.$outerContainer.outerWidth();var l=this.$outerContainer.outerHeight();var k=i+this.containerLeftPadding+this.containerRightPadding;var f=e+this.containerTopPadding+this.containerBottomPadding;function j(){h.$lightbox.find(".lb-dataContainer").width(k);h.$lightbox.find(".lb-prevLink").height(f);h.$lightbox.find(".lb-nextLink").height(f);h.showImage()}if(g!==k||l!==f){this.$outerContainer.animate({width:k,height:f},this.options.resizeDuration,"swing",function(){j()})}else{j()}};d.prototype.showImage=function(){this.$lightbox.find(".lb-loader").hide();this.$lightbox.find(".lb-image").fadeIn("slow");this.updateNav();this.updateDetails();this.preloadNeighboringImages();this.enableKeyboardNav()};d.prototype.updateNav=function(){var f=false;try{document.createEvent("TouchEvent");f=(this.options.alwaysShowNavOnTouchDevices)?true:false}catch(g){}this.$lightbox.find(".lb-nav").show();if(this.album.length>1){if(this.options.wrapAround){if(f){this.$lightbox.find(".lb-prev, .lb-next").css("opacity","1")}this.$lightbox.find(".lb-prev, .lb-next").show()}else{if(this.currentImageIndex>0){this.$lightbox.find(".lb-prev").show();if(f){this.$lightbox.find(".lb-prev").css("opacity","1")}}if(this.currentImageIndex<this.album.length-1){this.$lightbox.find(".lb-next").show();if(f){this.$lightbox.find(".lb-next").css("opacity","1")}}}}};d.prototype.updateDetails=function(){var e=this;if(typeof this.album[this.currentImageIndex].title!=="undefined"&&this.album[this.currentImageIndex].title!==""){this.$lightbox.find(".lb-caption").html(this.album[this.currentImageIndex].title).fadeIn("fast").find("a").on("click",function(f){location.href=a(this).attr("href")})}if(this.album.length>1&&this.options.showImageNumberLabel){this.$lightbox.find(".lb-number").text(this.options.albumLabel(this.currentImageIndex+1,this.album.length)).fadeIn("fast")}else{this.$lightbox.find(".lb-number").hide()}this.$outerContainer.removeClass("animating");this.$lightbox.find(".lb-dataContainer").fadeIn(this.options.resizeDuration,function(){return e.sizeOverlay()})};d.prototype.preloadNeighboringImages=function(){if(this.album.length>this.currentImageIndex+1){var f=new Image();f.src=this.album[this.currentImageIndex+1].link}if(this.currentImageIndex>0){var e=new Image();e.src=this.album[this.currentImageIndex-1].link}};d.prototype.enableKeyboardNav=function(){a(document).on("keyup.keyboard",a.proxy(this.keyboardAction,this))};d.prototype.disableKeyboardNav=function(){a(document).off(".keyboard")};d.prototype.keyboardAction=function(h){var j=27;var i=37;var f=39;var e=h.keyCode;var g=String.fromCharCode(e).toLowerCase();if(e===j||g.match(/x|o|c/)){this.end()}else{if(g==="p"||e===i){if(this.currentImageIndex!==0){this.changeImage(this.currentImageIndex-1)}else{if(this.options.wrapAround&&this.album.length>1){this.changeImage(this.album.length-1)}}}else{if(g==="n"||e===f){if(this.currentImageIndex!==this.album.length-1){this.changeImage(this.currentImageIndex+1)}else{if(this.options.wrapAround&&this.album.length>1){this.changeImage(0)}}}}}};d.prototype.end=function(){this.disableKeyboardNav();a(window).off("resize",this.sizeOverlay);this.$lightbox.fadeOut(this.options.fadeDuration);this.$overlay.fadeOut(this.options.fadeDuration);a("select, object, embed").css({visibility:"visible"})};return d})();a(function(){var d=new c();var e=new b(d)})}).call(this);