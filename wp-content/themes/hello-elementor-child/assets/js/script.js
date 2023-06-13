(function($) {
	
	"use strict";
	
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.loader-wrap').length){
			$('.loader-wrap').delay(1000).fadeOut(500);
		}
		TweenMax.to($(".loader-wrap .overlay"), 1.2, {
			force3D: true,
			left: "100%",
			ease: Expo.easeInOut,
		});
	}

	if ($(".preloader-close").length) {
		$(".preloader-close").on("click", function(){
			$('.loader-wrap').delay(200).fadeOut(500);
		});
	}
	
	
	
	//Update Header Style and Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var scrollLink = $('.scroll-to-top');
			
			var HeaderHight = $('.main-header').height();
			if (windowpos >= HeaderHight) {
				siteHeader.addClass('fixed-header');
				scrollLink.fadeIn(300);
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.fadeOut(300);
			}
			
		}
	}
	
	headerStyle();
	
	
	//Submenu Dropdown Toggle
	if($('.main-header li.dropdown ul').length){
		$('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
		
		//Dropdown Button
		$('.main-header li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
		
		//Dropdown Menu / Fullscreen Nav
		$('.fullscreen-menu .navigation li.dropdown > a').on('click', function() {
			$(this).next('ul').slideToggle(500);
		});
		
		//Disable dropdown parent link
		$('.navigation li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});
		
		//Disable dropdown parent link
		$('.main-header .navigation li.dropdown > a,.hidden-bar .side-menu li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});
		
		$('.cart-box .dropdown-menu').click(function(e) {
			e.stopPropagation();
		});
		
	}
	
	
	// Add Current Class Auto
	function dynamicCurrentMenuClass(selector) {
		let FileName = window.location.href.split("/").reverse()[0];

		selector.find("li").each(function () {
			let anchor = $(this).find("a");
			if ($(anchor).attr("href") == FileName) {
				$(this).addClass("current");
			}
		});
		// if any li has .current elmnt add class
		selector.children("li").each(function () {
			if ($(this).find(".current").length) {
				$(this).addClass("current");
			}
		});
		// if no file name return
		if ("" == FileName) {
			selector.find("li").eq(0).addClass("current");
		}
	}
	
	if ($('.main-header .header-lower .main-menu .navigation').length) {
		dynamicCurrentMenuClass($('.main-header .header-lower .main-menu .navigation'));
	}
	
	
	
	//Mobile Nav Hide Show
	if($('.mobile-menu').length){
		
		$('.mobile-menu .menu-box').mCustomScrollbar();
		
		var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
		$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
		$('.sticky-header .main-menu').append(mobileMenuContent);
		
		//Dropdown Button
		$('.mobile-menu li.dropdown .dropdown-btn').on('click', function() {
			$(this).toggleClass('open');
			$(this).prev('ul').slideToggle(500);
		});
		//Menu Toggle Btn
		$('.mobile-nav-toggler').on('click', function() {
			$('body').addClass('mobile-menu-visible');
		});

		//Menu Toggle Btn
		$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
			$('body').removeClass('mobile-menu-visible');
		});
		
	}
	
	
	//Header Search
	if($('.search-box-outer').length) {
		$('.search-box-outer').on('click', function() {
			$('body').addClass('search-active');
		});
		$('.close-search').on('click', function() {
			$('body').removeClass('search-active');
		});
		
		$('.search-popup .color-layer').on('click', function() {
			$('body').removeClass('search-active');
		});
	}
	
	
	
	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));
			
			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}
	
	
	
	// Testimonial Section Four Carousel
	if($('.shop-detail-section').length){
		var thumbsCarousel = new Swiper('.shop-detail-section .thumbs-carousel', {
	      spaceBetween: 0,
	      slidesPerView: 4,
	      direction: 'vertical',
	      breakpoints: {
		      320: {       
			      spaceBetween: 20,
	     		  direction: 'horizontal',
			      slidesPerView: 3, 
		      },
		      640: {       
			      spaceBetween: 20,
	     		  direction: 'horizontal',
			      slidesPerView: 4, 
		      } ,
		      1023: {       
			      spaceBetween: 30,
			      slidesPerView: 4, 
		      } 
		  
		   }
	    });

	    var contentCarousel = new Swiper('.shop-detail-section .content-carousel', {
	      spaceBetween: 0,
	      loop:true,
	      navigation: {
	        nextEl: '.swiper-button-next',
	        prevEl: '.swiper-button-prev',
	      },
	      thumbs: {
	        swiper: thumbsCarousel
	      },
	    });
	}
	
	
	
	
	 //Jquery Spinner / Quantity Spinner
	if($('.qty-spinner').length){
		$("input.qty-spinner").TouchSpin({
		  verticalbuttons: true
		});
	}
	
	
	
	
	//Hidden Sidebar
	if ($('.hidden-bar,.fullscreen-menu').length) {
		var hiddenBar = $('.hidden-bar');
		var hiddenBarOpener = $('.nav-toggler');
		var hiddenBarCloser = $('.hidden-bar-closer,.close-menu');
		$('.hidden-bar-wrapper').mCustomScrollbar();
		
		//Show Sidebar
		hiddenBarOpener.on('click', function () {
			$('body').addClass('visible-menu-bar');
			hiddenBar.addClass('visible-sidebar');
		});
		
		//Hide Sidebar
		hiddenBarCloser.on('click', function () {
			$('body').removeClass('visible-menu-bar');
			hiddenBar.removeClass('visible-sidebar');
		});
	}
	
	
	
	//Parallax Scene for Icons
	if($('.parallax-scene-1').length){
		var scene = $('.parallax-scene-1').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-2').length){
		var scene = $('.parallax-scene-2').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-3').length){
		var scene = $('.parallax-scene-3').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-4').length){
		var scene = $('.parallax-scene-4').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	
	
	
	//Main Slider Carousel
	function sliderOneActive($scope, $) {
		$('.main-slider-carousel').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="flaticon-left"></span>', '<span class="flaticon-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});
	}
	
	// Single Item Carousel
	function testimonialActive($scope, $) {
		$('.single-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			autoplayTimeout:5000,
			navText: [ '<span class="flaticon-left"></span>', '<span class="flaticon-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});
	}
	
	// Single Item Carousel
	function nftSingleActive($scope, $) {
		$('.single-item-carousel2').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			autoplayTimeout:5000,
			navText: [ '<span class="flaticon-left"></span>', '<span class="flaticon-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:2
				}
			}
		});
	}
	
	// Two Item Carousel
	function testimonialV2Active($scope, $) {
		$('.two-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="flaticon-left"></span>', '<span class="flaticon-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:2
				},
				1200:{
					items:2
				}
			}
		});
	}
	
	
	
	
	// Three Item Carousel
	function nftItemGridCarousel($scope, $) {
		$('.three-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="flaticon-left"></span>', '<span class="flaticon-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				700:{
					items:2
				},
				800:{
					items:2
				},
				1024:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}
	
	
	
	//Gallery Filters
	function mixiFilterActive($scope, $) {
		$('.filter-list').mixItUp({});
	}
	
	
	// Services Carousel
	function barnixProjectCarouselActive($scope, $) {

		var ServicesCarousel = $('.services-carousel')
		ServicesCarousel.owlCarousel({
			autoplay: true,
			loop:true,
			margin:0,
			nav:true,
			smartSpeed: 700,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				768:{
					items:2
				},
				1024:{
					items:3
				},
				1200:{
					items:4
				},
				1400:{
					items:4
				}
			}
			
		});
	}
	
	
	
	
	// Testimonial Carousel
	if ($('.testimonial-carousel').length) {

		var TestimonialCarousel = $('.testimonial-carousel')
		TestimonialCarousel.owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 700,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				768:{
					items:1
				},
				1024:{
					items:2
				},
				1200:{
					items:2
				},
				1400:{
					items:2
				}
			}
			
		});
		TestimonialCarousel.on('mousewheel', '.owl-stage', function (e) {
			if (e.deltaY>0) {
				TestimonialCarousel.trigger('next.owl');
			} else {
				TestimonialCarousel.trigger('prev.owl');
			}
			e.preventDefault();
		});
	}
	
	
	
	// Testimonial Carousel
	if ($('.testimonial-carousel-two').length) {
	
		var TestimonialCarouselTwo = $('.testimonial-carousel-two')
		TestimonialCarouselTwo.owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 700,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				768:{
					items:1
				},
				1024:{
					items:2
				},
				1200:{
					items:2
				},
				1400:{
					items:2
				}
			}
			
		});
		TestimonialCarouselTwo.on('mousewheel', '.owl-stage', function (e) {
			if (e.deltaY>0) {
				TestimonialCarouselTwo.trigger('next.owl');
			} else {
				TestimonialCarouselTwo.trigger('prev.owl');
			}
			e.preventDefault();
		});
	}
	
	
	
	
	//Accordion Box
	if($('.accordion-box').length){
		$(".accordion-box").on('click', '.acc-btn', function() {
			
			var outerBox = $(this).parents('.accordion-box');
			var target = $(this).parents('.accordion');
			
			if($(this).hasClass('active')!==true){
				$(outerBox).find('.accordion .acc-btn').removeClass('active');
			}
			
			if ($(this).next('.acc-content').is(':visible')){
				return false;
			}else{
				$(this).addClass('active');
				$(outerBox).children('.accordion').removeClass('active-block');
				$(outerBox).find('.accordion').children('.acc-content').slideUp(300);
				target.addClass('active-block');
				$(this).next('.acc-content').slideDown(300);	
			}
		});	
	}
	
	
	
	
	// Sponsors Item Carousel
	if ($('.sponsors-carousel').length) {
		$('.sponsors-carousel').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:2
				},
				600:{
					items:3
				},
				800:{
					items:4
				},
				1024:{
					items:5
				},
				1200:{
					items:5
				}
			}
		});    		
	}
	
	
	
	
	// Sponsors Carousel Two
	function sponsorsFiveActive($scope, $) {
		$('.sponsors-carousel-two').owlCarousel({
			loop:true,
			margin:20,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="flaticon-left-arrow-1"></span>', '<span class="flaticon-right-arrow-1"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:2
				},
				600:{
					items:3
				},
				800:{
					items:4
				},
				1024:{
					items:5
				},
				1200:{
					items:6
				}
			}
		});    		
	}

	// Home seven testimonial
	function testimonialHomeSeven($scope, $) {
		if ($('.bar-video-testimonial-slider').length) {
			$('.bar-video-testimonial-slider').owlCarousel({
				loop:true,
				nav:false,
				dots: true,
				smartSpeed: 500,
				autoplay: 4000,
				items: 1,
			});
		}
	}

	// Home seven partner
	function partnerHomeSeven($scope, $) {
		if ($('.bar-video-sponsor-slider').length) {
			$('.bar-video-sponsor-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:false,
				smartSpeed: 500,
				autoplay: 4000,
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:2
					},
					800:{
						items:3
					},
					1024:{
						items:4
					},
					1600:{
						items:6
					},
					1920:{
						items:7
					}
				}
			});
		}
	}


	
	
	
	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));
			
			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}
	
	
	
	
	//LightBox Image
	if($('.lightbox-image').length) {
		$('.lightbox-image').magnificPopup({
		  type: 'image',
		  gallery:{
		    enabled:true
		  }
		});
	}

	
	//LightBox Video
	if($('.lightbox-video').length) {
		$('.lightbox-video').magnificPopup({
	      // disableOn: 700,
	      type: 'iframe',
	      mainClass: 'mfp-fade',
	      removalDelay: 160,
	      preloader: false,
	      iframe:{
	        patterns:{
	          youtube:{
	          index: 'youtube.com',
	          id: 'v=',
	          src: 'https://www.youtube.com/embed/%id%'
	        },
	      },
	      srcAction:'iframe_src',
	    },
	      fixedContentPos: false
	    });
	}
	
	
	// Odometer
	if ($(".odometer").length) {
		$('.odometer').appear();
		$('.odometer').appear(function(){
			var odo = $(".odometer");
			odo.each(function() {
				var countNumber = $(this).attr("data-count");
				$(this).html(countNumber);
			});
			window.odometerOptions = {
				format: 'd',
			};
		});
	}
	
	
	//Contact Form Validation
	if($('#contact-form').length){
		$('#contact-form').validate({
			rules: {
				username: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			}
		});
	}
	
	
	
	// Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1500);
	
		});
	}
	
	
	
	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

// Sticky menu home v7
	$(window).on('scroll', function() {
		if ($(window).scrollTop() > 250) {
			$('.bar-video-header-section').addClass('sticky_on')
		} else {
			$('.bar-video-header-section').removeClass('sticky_on')
		}
	});

// Mobile  menu home v7
	$('.open_mobile_menu').on("click", function() {
		$('.mobile_menu_wrap').toggleClass("mobile_menu_on");
	});
	$('.open_mobile_menu').on('click', function () {
		$('body').toggleClass('mobile_menu_overlay_on');
	});
	if($('.mobile_menu li.dropdown ul').length){
		$('.mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fas fa-caret-right"></span></div>');
		$('.mobile_menu li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
	}
	$(".dropdown-btn").on("click", function () {
		$(this).toggleClass("toggle-open");
	});

/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).on('scroll', function() {
		headerStyle();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	$(window).on('load', function() {
		handlePreloader();
	});	

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-video-partner-v7.default', partnerHomeSeven);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-video-testimonial-v7.default', testimonialHomeSeven);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-slider-banner.default', sliderOneActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-slider-v3-banner.default', sliderOneActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-project-widget.default', barnixProjectCarouselActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-testimonial.default', testimonialActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-testimonial-v6.default', testimonialActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-testimonial-v2.default', testimonialV2Active);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-testimonial-v3.default', testimonialV2Active);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-sponsor-v5-widget.default', sponsorsFiveActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-slider-v4-banner.default', nftSingleActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-nft-product-slider.default', nftItemGridCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/barnix-nft-product-filter.default', mixiFilterActive);
	});

})(window.jQuery);