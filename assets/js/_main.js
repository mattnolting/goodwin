/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var Roots = {
	// All pages
	common: {
		init: function() {

			// JavaScript to be fired on all pages
			var removeClass = true,
			item = '.item, .flip-container';
			$(item).click(function(){
				$(item).not(this).removeClass('active');
				$(this).toggleClass('active');
				removeClass = false;
			});

			$("html").click(function () {
				if (removeClass) {
					$(item).removeClass('active');
				}
				removeClass = true;
			});


			$('.modals li').on('click',function(){
				var src = $(this).html();
				console.log(src);

				//var text = $(this).attr('src');

				//start of new code new code
				var index = $(this).index();

				var html = '';
				// html += img;
				html += '<div class="content">' + src + '</div>';
				html += '<div class="navigation">';
				html += '<a class="controls next" href="'+ (index+2) + '">next</a>';
				html += '<a class="controls previous" href="' + (index) + '">prev</a>';
				html += '</div>';

				$('#myModal').modal();
				$('#myModal').on('shown.bs.modal', function(){
					$('#myModal .modal-body').html(html);
					//new code
					$('a.controls').trigger('click');
				});
				$('#myModal').on('hidden.bs.modal', function(){
					$('#myModal .modal-body').html('');
				});
		   });

			$('.flip').click(function(){
				if(!$(this).hasClass('active')) {
					$(this).addClass('active');
				} else {
					$(this).removeClass('active');
				}

				$('.flip').not(this).removeClass('active');
			});

			$('.flip').on('tap',function(){
				$(this).addClass('active');
				$('.flip').not(this).removeClass('active');
			});

			$('.equalheights').equalHeights();
			$(window).resize(function() {
				$('.equalheights').equalHeights();
			});
		}
	},
	// Home page
	home: {
		init: function() {
			$('.flexslider').flexslider({
				controlNav: false
			});

			// var $liCollection = $(".slide-flip .slide"),
			// 	$firstListItem = $liCollection.first();

			// $liCollection.each(function() {

			// });

			// var degrees = 180;
			// $liCollection.first().addClass("active");

			// setInterval(function() {
			// 	var $activeListItem = $(".active");
			// 	$activeListItem.removeClass("active").css({
			// 		'-webkit-transform' : 'rotateY('+degrees+'deg)',
			// 		'-moz-transform' : 'rotateY('+degrees+'deg)',
			// 		'-ms-transform' : 'rotateY('+degrees+'deg)',
			// 		'-o-transform' : 'rotateY('+degrees+'deg)',
			// 		'transform' : 'rotateY('+degrees+'deg)',
			// 		'zoom' : 1
			// 	});
			// 	var $nextListItem = $activeListItem.closest('.slide').next();

			// 	if ($nextListItem.length == 0) {
			// 		$nextListItem = $firstListItem;
			// 	}

			// 	$nextListItem.addClass("active").css({
			// 		'-webkit-transform' : 'rotateY('+degrees+'deg)',
			// 		'-moz-transform' : 'rotateY('+degrees+'deg)',
			// 		'-ms-transform' : 'rotateY('+degrees+'deg)',
			// 		'-o-transform' : 'rotateY('+degrees+'deg)',
			// 		'transform' : 'rotateY('+degrees+'deg)',
			// 		'zoom' : 1
			// 	});
			// }, 2000);
		}
	},
	// About us page, note the change from about-us to about_us.
	about_us: {
		init: function() {
						alert('test2');

			// JavaScript to be fired on the about us page
		}
	},
	page_who_we_are: {
		init: function() {
			//var photo_width = $('.people .owl-item').width();

			$(".people .owl-carousel").owlCarousel({
				items: 4,
				itemsDesktop : [1170,4],
				itemsDesktopSmall:	[970,3],
				itemsTablet: [768,2],
				itemsMobile : [600,1],
				autoPlay : 3000,
				slideSpeed : 300,
				stopOnHover : true,
				pagination : false,
				afterUpdate : function(){
					photo_width = $('.people .owl-item').width();
					$('.people .bio').animate({ width: photo_width });
				},
				/*beforeMove : function() {
					$('.people .owl-item').removeClass('active');
					photo_width = $('.people .owl-item').not('.active').width();
					$('.people .owl-item').animate({ width: photo_width });
				}*/
			});

/*
			photo_width = $('.people .owl-item').width();
			$('.people .bio').css({ width: photo_width });

			$('.people .owl-item figure').click(function(){
				if(!$(this).parent().parent().hasClass('active')) {
					$(this).parent().parent().addClass('active');
					$(this).parent().parent().animate({ width : photo_width * 2 });
					$(this).next('.bio').animate({ left: 0 });

					$('.people .owl-item figure').not(this).parent().parent().animate({ width : photo_width });
					$('.people .owl-item figure').not(this).next('.bio').animate({ left: -photo_width });
				}
			});

			$('.people .close').click(function(){
				if($(this).parent().parent().parent().hasClass('active')) {
					$(this).parent().parent().parent().removeClass('active');
					$(this).parent().parent().parent().animate({ width : photo_width });
					$(this).parent('.bio').animate({ left: -photo_width });
				}
			});

			$(window).resize(function(){
				$('.people .owl-item').animate({ width : photo_width }).removeClass('active');
			});

			$('.close').click(function(){
				var photo_width = $(this).width();
				$(this).animate({ width : photo_width });
			});
*/


			var element_width = 455,
				bio_width = 400;

			$('.flexslider').flexslider({
				slideshow: true,
				slideshowSpeed: 2000,
				animation: "slide",
				animationLoop: true,
				itemWidth: element_width,
				minItems: 1,
				maxItems: 4,
				pauseOnHover: true,
				pausePlay: false,               //Boolean: Create pause/play dynamic element
				pauseText: 'figure',             //String: Set the text for the "pause" pausePlay item
				playText: '.close',
				before: function(){
					$('.bio').animate({ left: -bio_width });
					$('.flexslider li').animate({ width : photo_width }).removeClass('active').animate({ width: element_width });
				}
			});

			var photo_width = $('.flexslider .group').width();

			$('.flexslider li figure').click(function(){
				if($(this).parent().hasClass('active')) {
					$(this).parent().removeClass('active');
					$(this).parent().animate({ width : element_width });
					$('.bio').animate({ left: -element_width });
				}

				if(!$(this).parent().hasClass('active')) {
					$(this).parent().addClass('active');
					$(this).parent().animate({ width : element_width + bio_width });
					$(this).next('.bio').animate({ left: 0 });

					$('.flexslider li figure').not(this).parent().animate({ width : photo_width });
					$('.flexslider li figure').not(this).next('.bio').animate({ left: -element_width });
				}
			});

			$('.flexslider .close').click(function(){
				if($(this).parent().parent().hasClass('active')) {
					$(this).parent().parent().removeClass('active');
					$(this).parent().parent().animate({ width : element_width });
					$(this).parent('.bio').animate({ left: -element_width });
				}
			});
		}
	},
	landing: {
		init: function(){
						alert('test2');

		}
	},
	our_approach: {
		init: function() {

		}
	}
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
	fire: function(func, funcname, args) {
	var namespace = Roots;
	funcname = (funcname === undefined) ? 'init' : funcname;
	if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
		namespace[func][funcname](args);
	}
	},
	loadEvents: function() {
	UTIL.fire('common');

	$.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
		UTIL.fire(classnm);
	});
	}
};

$(document).ready(UTIL.loadEvents);
})(jQuery); // Fully reference jQuery after this point.

		$(document).on('click', 'a.controls', function(){
			//console.log('works');

			// var index = $(this).attr('href');
			// var src = $('ul.row li:nth-child('+ index +') img').attr('src');

			// $('.modal-body img').attr('src', src);

			var index = $(this).attr('href');
			var html = $('ul.row li:nth-child('+ index +')').html();

			$('.modal-body .content').html(html);


			var newPrevIndex = parseInt(index) - 1;
			var newNextIndex = parseInt(newPrevIndex) + 2;

			if($(this).hasClass('previous')){
				$(this).attr('href', newPrevIndex);
				$('a.next').attr('href', newNextIndex);
			}else{
				$(this).attr('href', newNextIndex);
				$('a.previous').attr('href', newPrevIndex);
			}

			var total = $('ul.row li').length + 1;
			//hide next button
			if(total === newNextIndex){
				$('a.next').hide();
			}else{
				$('a.next').show();
			}
			//hide previous button
			if(newPrevIndex === 0){
				$('a.previous').hide();
			}else{
				$('a.previous').show();
			}


			return false;
		});


