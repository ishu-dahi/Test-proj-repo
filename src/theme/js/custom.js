// Set active menu
document.addEventListener('DOMContentLoaded', function () {
	var currentPageHref = window.location.href;
	var currentPagePathname = window.location.pathname;

	if (currentPageHref || currentPagePathname) {
		setActiveMenu();
	}

	// School menu highlight
	function setActiveMenu() {
		var allMenuItems = document.querySelectorAll(
			'li > a'
		);

		for (var j = 0; j < allMenuItems.length; j++) {
			allMenuItems[j].classList.remove('active');
			var menuItemATag = allMenuItems[j];
			var menuItemATagLink = menuItemATag.href;

			if (menuItemATagLink === currentPageHref || menuItemATagLink === currentPagePathname) {
				menuItemATag.parentNode.classList.add('active');
			}
		}
	}
});

document.addEventListener('DOMContentLoaded', function () {
	// Body freeze
	var hamburgmenu = document.querySelectorAll('.dj-mobile-open-btn');
	var targetbody = document.body;

	for (var i = 0; i < hamburgmenu.length; i++) {
		hamburgmenu[i].addEventListener('click', function () {
			if (targetbody.classList.contains('no-scroll')) {
				targetbody.classList.remove('no-scroll');
			} else {
				targetbody.classList.add('no-scroll');
			}
		});
	}

	// Sticky top
	jQuery(window).width() > 665 && jQuery(window).on('scroll', function (o) {
		jQuery(window).scrollTop() > 10 ? jQuery('.wpu-main-header').addClass('sticky-topp') : jQuery('.wpu-main-header').removeClass('sticky-topp');
	});

	// Click event to scroll to top
	// Check to see if the window is top if not then display button
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scrollToTop').fadeIn();
		} else {
			jQuery('.scrollToTop').fadeOut();
		}
	});

	// Click event to scroll to top
	jQuery('.scrollToTop').click(function () {
		jQuery('html, body').animate({ scrollTop: 0 }, 800);
		return false;
	});
});

document.addEventListener('DOMContentLoaded', function () {
	// Font resize
	jQuery("#small").click(function(event){
		jQuery("h1,h2,h3,p").animate({"font-size":"12px"});
	});

	jQuery("#medium").click(function(event){
		jQuery("h1").animate({"font-size":"26px"});
		jQuery("h2").animate({"font-size":"20px"});
		jQuery("h3").animate({"font-size":"18px"});
		jQuery("p").animate({"font-size":"14px"});
		jQuery("p.fs-16").animate({"font-size":"18px"});
	});

	jQuery("#large").click(function(event){
		jQuery("h1,h2,h3").animate({"font-size":"140%"});
		jQuery("p").animate({"font-size":"120%"});
	});

	jQuery(".font-resizer a").click(function() {
		jQuery(".font-resizer a").removeClass("selected");
		jQuery(this).addClass("selected");
	});
});

// About page button UI
document.addEventListener('DOMContentLoaded', function () {
	function replaceAll(string, search, replace) {
		return string.split(search).join(replace);
	}

	jQuery('button.bd-btn-bhasha-daan, .btn-bhashadaan-cst').each(function () {
		var element = jQuery(this);
		var bdText = jQuery(element).html();
		var bdTextArray = ['Daan', 'दान', 'দান', 'দান', 'દાન', 'ದಾನ್‌', 'ദാനില്‍', 'ଦାନ', 'ਦਾਨ', 'டானுக்குச்', 'దాన్'];
		jQuery.each(bdTextArray, function (index, val) {
			if (bdText.includes(val)) {
				jQuery(element).html(
					replaceAll(
						bdText,
						val,
						'<span class="yellow"> ' + val + ' </span>'
					)
				);
			}
		});
	});
});

// for youtube video
document.addEventListener('DOMContentLoaded', function (){youTubes_makeDynamic()});
function youTubes_makeDynamic() {
	var $ytIframes = jQuery('iframe[src*="youtube.com"]');
	$ytIframes.each(function (i, e) {
		var $ytFrame = jQuery(e);
		var ytKey; var tmp = $ytFrame.attr('src').split(/\//); tmp = tmp[tmp.length - 1]; tmp = tmp.split('?'); ytKey = tmp[0];
		var $ytLoader = jQuery('<div class="ytLoader">');
			$ytLoader.append(jQuery('<img class="w-100" src="https://i.ytimg.com/vi/' + ytKey + '/hqdefault.jpg">'));
			$ytLoader.append(jQuery('<i class="fa fa-play-circle-o play-icon"></i>'));
			$ytLoader.data('$ytFrame', $ytFrame);
			$ytFrame.replaceWith($ytLoader);
			$ytLoader.click(function () {
			var $ytFrame = $ytLoader.data('$ytFrame');
			$ytFrame.attr('src', $ytFrame.attr('src') + '?autoplay=1');
			$ytLoader.replaceWith($ytFrame);
		});
	});
}; 
 

// 
document.addEventListener('DOMContentLoaded', function () {
	jQuery( '.js-testimonialVideo').click(function(e) { 
		e.preventDefault();
		var elem = jQuery(this);
		jQuery('#testimonialVideoModal').on('hidden', function () { 
			modal.find('iframe').attr('src','#') 
		});
		var videoUrl = elem.attr('data-video-url'); 
		console.log("video url","===>   "+videoUrl)
		var modal = jQuery('#testimonialVideoModal')  
		if(videoUrl!="#"){ 
			modal.find('iframe').attr('src',videoUrl)
			jQuery('#testimonialVideoModal').modal('show');  
		}
	  });
});

document.addEventListener('DOMContentLoaded', function () {

	var pageURL = window.location.href;
	var urlarr = pageURL.split("/");
	var langName;
	if(pageURL.includes("localhost")){
		 langName=urlarr[4];
	}else{
	 langName=urlarr[3];
	}  
	var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1); 
	jQuery('body').addClass(lastURLSegment);  
	jQuery('body').addClass(langName); 

});
 


document.addEventListener('DOMContentLoaded', function () {
	$('.js-menu').on('click', function () {
        $('.js-menu').toggleClass('active');  
        $('body').toggleClass('noScroll activeMenu');  
		$(window).resize(function(){location.reload();});
    });
});

document.addEventListener( 'DOMContentLoaded', function() {

	new Splide( '.imaginSlide', {
		perPage    : 2,
		releaseWheel: boolean = false,
		type    : 'loop',
		autoplay: 'pause',
		padding: 30,
		direction: 'ltr',
		breakpoints: {
			640: {
				perPage: 1,
			},
		},
  	} ).mount();  
  }); 

  document.addEventListener( 'DOMContentLoaded', function() {

	var splide = new Splide( '.js-newsSplide', {
		perPage  : 3,
		focus    : 'center',
		trimSpace: false,
		arrows: false,
		pagination: false,
		padding: 10,  
	  } );
	  
	  splide.mount(); 
  }); 
 

  document.addEventListener('DOMContentLoaded', function () {
	jQuery( '.js-newsVideo').click(function(e) { 
		e.preventDefault();
		var elem = jQuery(this);
		jQuery('#newsVideoModal').on('hidden', function () { 
			modal.find('iframe').attr('src','#') 
		});
		var videoUrl = elem.attr('data-video-url'); 
		var modal = jQuery('#newsVideoModal') 
		if(videoUrl!="#"){
			modal.find('iframe').attr('src',videoUrl)
			jQuery('#newsVideoModal').modal('show');  
		}
	  });
});

document.addEventListener('DOMContentLoaded', function () {
	jQuery( '.js-closeBannerIPDAY').click(function(e) { 
		jQuery('.js-BannerIPDAY').addClass('d-none'); 
	});
});

document.addEventListener('DOMContentLoaded', function () {
	jQuery( '.js-closeBannerApp').click(function(e) { 
		jQuery('.js-BannerApp').addClass('d-none');
	}); 
});


document.addEventListener('DOMContentLoaded', function () {
	jQuery('body').on('hidden.bs.modal', '.modal', function () {
			 
	});
});

 
  
 