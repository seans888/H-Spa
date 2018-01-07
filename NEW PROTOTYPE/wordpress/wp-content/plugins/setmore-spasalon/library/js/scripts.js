
jQuery(document).ready(function($){
	
	var $window = $(window),
        $menu = $('div.menu');
	
	function checkWindowSize() {
		var width = $window.width();
		if ( width < 1024 ) {
			return $menu.addClass('nav-mobile');
		}
		$menu.removeClass('nav-mobile');
	}
	
	$window
        .resize(checkWindowSize)
        .trigger('checkWindowSize');
		
	checkWindowSize();
	
	/* prepend menu icon */
	$('div.menu').prepend('<div id="menu-icon"><span class="fa fa-bars"></span></div>');
	
	
	/* toggle nav */
	$("#menu-icon").on("click", function(){
		$("div.menu > ul").slideToggle();
		$(this).toggleClass("active");
	});
	
	/* jquery cycle */
	// var $slider = $('.cycle-slideshow');
// 	$slider.imagesLoaded( function() {
// 		$('#load-cycle').hide(); 
// 		$slider.show();
// 	});
// 	
	var $container = $('#grid-wrap');
	
	$container.masonry({
	  itemSelector : '.grid-box',
	});
	
	$container.imagesLoaded( function() {
	  $container.masonry({
		  itemSelector : '.grid-box',
	  });
	});
	
	$(window).resize(function() {
		$container.masonry({
		  itemSelector : '.grid-box',
		});
	});
	$('#load-cycle').hide(); 
	// Fix for Safari
	
	var fixSafariMargin = function() {
		// check if the browser is Safari
		if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {                  
			$('footer[role=contentinfo]').css('display', 'block');
			$('#site-generator').css('display', 'block');
			$('#site-generator').css('padding-top', '25px');
		}
	}
	
	fixSafariMargin();
	
	$(window).resize(function() {
		fixSafariMargin();
	});
	
	
	$(window).scroll(function() {

	if ($(this).scrollTop() > 50){  
		$('#branding').addClass("sticky-header");
	}
	else{
		$('#branding').removeClass("sticky-header");
	}

	if ($(this).scrollTop() > 230){  
		$('#branding').addClass("sticky");
	}
	else{
		$('#branding').removeClass("sticky");
	}
  });
	
	

});
   
	jQuery(document).ready(function() {
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.crunchify-top').fadeIn(duration);
			} else {
				jQuery('.crunchify-top').fadeOut(duration);
			}
		});
 
		jQuery('.crunchify-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
	});

