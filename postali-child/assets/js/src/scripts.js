/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";
	var width = $(window).outerWidth();
	var mobile = false;
	if( width < 992) {
		mobile = true;
	}

    //Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		$('#full-nav').toggleClass('active');
		$('body').toggleClass('fixed');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#full-nav').slideToggle(400);
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#full-nav').slideUp(400);
	});	

	//Mobile menu accordion toggle for sub pages
	if(mobile) {
		$('#full-nav > .menu > li.menu-item-has-children a').append('<div class="accordion-toggle"><span class="icon-icon-chevron-right"></span></span></div>');
		$('#full-nav > .menu > li.menu-item-has-children a' ).click(function() {
			$(this).parent().find('> ul').slideToggle(400);
			$(this).toggleClass('toggle-background');
			$(this).find('.icon-icon-chevron-right').toggleClass('toggle-rotate');
	  });
	}

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

	// Toggle search function in nav
	(function() {
		var width = $(window).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			// load clicky search scripts for desktop
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close-x');
						$('#full-nav > .menu').addClass('disabled');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#full-nav > .menu').removeClass('disabled');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#full-nav > .menu').removeClass('disabled');
						open = false;
						return;
					}
				}
			});
		}
	})();

	// Scrolling menu background change
	(function() {
		var scrollPosition = window.pageYOffset;
		if( $('.page-header.white, .page-header .ltblue').length ) {
			$('header').addClass('scrolling-nav');
		} else {
			function setMenuBackground() {
				if (scrollPosition > 5) {
					$('header').addClass('scrolling-nav');
				} else {
					$('header').removeClass('scrolling-nav');
				}
			}setMenuBackground();
			$(document).on('scroll', function() {
				scrollPosition = $(document).scrollTop();
				setMenuBackground();
			});
		}
	})();

	// Keep card height equal
	(function() {
		if( $('.card-holder > .equal-height').length && width > 992 ) {
			function setEqualHeight() {
				var heights = [];
				$('.card.practice-area.equal-height').each(function() {
					heights.push( parseInt($(this).height()) );
				});
				var largestHeight = heights[0];
				heights.forEach(function(item) {
					if (largestHeight < item) {
						largestHeight = item;
					}
				}); 
				$('.card.equal-height').css('height', largestHeight);
			}
			setEqualHeight();
			//TODO: Resize needs to reset largest height
			$(window).resize(setEqualHeight);
		}	
	})();

	//Triggers link click on entire click area when parent container has child link element
	(function() {
		$('.link-hunter').on('click', function() {
			var link = $(this).find('a').attr('href');
			window.location.href = link;
		});
	})();

    $(document).ready(function() {
        $('.close-notice-banner').on('click', function() {
            $('.notice-banner').slideToggle('medium');
            $('#header, #header-top_mobile').css('margin-top', '0');
        });
    });

});