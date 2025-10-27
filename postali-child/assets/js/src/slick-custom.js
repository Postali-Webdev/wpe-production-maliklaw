/**
 * Slick Custom
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

	$('#slider').slick({
		dots: false,
		infinite: true,
		fade: true,
		autoplay: true,
  		autoplaySpeed: 5000,
  		speed: 1300,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: false,
    	nextArrow: false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out'
	});

	 $('.language-slide').slick({
		 dots: false,
		 infinite: true,
		 autoplay: true,
		 prevArrow: false,
		 nextArrow: false,
		 slidesToShow: 1,
		 slidesToScroll: 1,
		 speed: 1000,
		 pauseOnHover: false,
		 accesibility: false,
		 draggable: false,
		 swipe: false
	 });

	 if( width < 992) {
		$('.card-slider').slick({
			dots: false,
			infinite: true,
			autoplay: false,
			arrows: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			speed: 1000,
		});
	}


	
});