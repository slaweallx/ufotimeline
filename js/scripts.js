/*
	scripts.js
	
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	
	Copyright: (c) 2024 Alexander "Alx" Agnarson, http://alx.media
*/

"use strict";

jQuery(document).ready(function($) {

/*  Toggle header search
/* ------------------------------------ */
	$('.toggle-search').on('click', function() {
		$('.toggle-search').toggleClass('active');
		$('.search-expand').fadeToggle(250);
            setTimeout(function(){
                $('.search-expand input').focus();
            }, 300);
	});

/*  Toggle header more btn (close on click outside)
/* ------------------------------------ */
	var open = false;
	var openBtn = function(){
		$('#header-more-btn-wrap').addClass('active');
		open = true;
	}
	var closeBtn = function(){
		$('#header-more-btn-wrap').removeClass('active');
		open = false;
	}
	$('#header-more-btn').click( function(event) {
		event.stopPropagation();
		var toggle = open ? closeBtn : openBtn;
		toggle();
	});
	$(document).click( function(event){
		if ( !$(event.target).closest('#header-more-btn-wrap').length ) {
			closeBtn();   
		}
	});	
	
/*  Fade in progress circle and menu btn
/* ------------------------------------ */	
	$('.progress-circle').addClass('loaded');
	$('.menu-toggle').addClass('loaded');
	$('.slick-intro-wrap').addClass('loaded');

/*  Scroll to top
/* ------------------------------------ */
	$('a#back-to-top').on('click', function() {
		$('html, body').animate({scrollTop:0},'slow');
		return false;
	});

/*  Expand social links
/* ------------------------------------ */
	$(".type-entry-expand-btn").on("click", function(e) {
	  e.preventDefault();
	  var currentBox = $(this).parent().parent().parent(".type-entry-outer").toggleClass("active");
	  $(".type-entry-outer.active").not(currentBox).removeClass("active");
	});

/*  Expand social links people
/* ------------------------------------ */
	$(".type-people-expand-btn").on("click", function(e) {
	  e.preventDefault();
	  var currentBox = $(this).parent().parent(".type-people").toggleClass("active");
	  $(".type-people.active").not(currentBox).removeClass("active");
	});	

/*  Expand social links websites
/* ------------------------------------ */
	$(".type-websites-expand-btn").on("click", function(e) {
	  e.preventDefault();
	  var currentBox = $(this).parent().parent(".type-websites").toggleClass("active");
	  $(".type-websites.active").not(currentBox).removeClass("active");
	});	

/*  Expand additional information
/* ------------------------------------ */
	$(".type-entry-extra-btn").on("click", function(e) {
	  e.preventDefault();
	  var currentBox = $(this).parent().parent().parent(".type-entry-outer").toggleClass("active-extra");
	  $(".type-entry-outer.active-extra").not(currentBox).removeClass("active-extra");
	});
	
/*  Expand quotes
/* ------------------------------------ */
	$(".type-entry-quote").on("click", function(e) {
	  e.preventDefault();
	  var currentBox = $(this).parent(".type-entry-bottom").toggleClass("quote-expand");
	  $(".type-entry-bottom.quote-expand").not(currentBox).removeClass("quote-expand");
	});	

/*  Expand faq
/* ------------------------------------ */
	$(".faq-block-click").on("click", function(e) {
	  e.preventDefault();
	  var currentBox = $(this).parent(".faq-block").toggleClass("active");
	  $(".faq-block").not(currentBox).removeClass("active");
	});	

/*  Toggle nav
/* ------------------------------------ */
	$(".menu-toggle").on("click", function(e) {
	  e.preventDefault();
	  var currentBox = $(".menu-toggle").toggleClass("active");
	  $(".menu-toggle").not(currentBox).removeClass("active");
	});		

	$(".menu-toggle").on("click", function(e) {
      if ($(".menu-toggle").hasClass('active')) {
          $("body").addClass('nav-active');
      } else {
          $("body").removeClass('nav-active');
      }
    });
	$('.fixed-nav-back').click(function(){
      $(".menu-toggle").removeClass('active');
      $("body").removeClass('nav-active');
    });
	
/*  Animate numbers
/* ------------------------------------ */	
	$('.animate-number').each(function () {
	  var $this = $(this);
	  jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
		duration: 1000,
		easing: 'swing',
		step: function () {
		  $this.text(Math.ceil(this.Counter));
		}
	  });
	});

/*  Fitvids
/* ------------------------------------ */
	function responsiveVideo() {
			if ( $().fitVids ) {
				$('#wrapper').fitVids();
			}	
		}
		
	responsiveVideo();

/*  Slick featured posts
/* ------------------------------------ */
	$.fn.randomize = function (selector) {
		var $elems = selector ? $(this).find(selector) : $(this).children(),
			$parents = $elems.parent();

		$parents.each(function () {
			$(this).children(selector).sort(function (childA, childB) {
				// * Prevent last slide from being reordered
				if($(childB).index() !== $(this).children(selector).length - 0.5) {
					return Math.round(Math.random()) - 0.5;
				}
			}.bind(this)).detach().appendTo(this);
		});

		return this;
	};

	$(".slick-featured").randomize().slick({
	  centerMode: true,
	  centerPadding: '0',
	  slidesToShow: 5,
	  appendArrows: '.slick-featured-nav',
	  dots: true,
	  responsive: [
		 {
		  breakpoint: 1500,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 4
		  }
		},
		 {
		  breakpoint: 1280,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 3
		  }
		},
		{
		  breakpoint: 1024,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 640,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '50px',
			slidesToShow: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	$('.slick-featured-wrap-outer').show();	

/*  Slick intro texts
/* ------------------------------------ */
	$.fn.randomize = function (selector) {
		var $elems = selector ? $(this).find(selector) : $(this).children(),
			$parents = $elems.parent();

		$parents.each(function () {
			$(this).children(selector).sort(function (childA, childB) {
				// * Prevent last slide from being reordered
				if($(childB).index() !== $(this).children(selector).length - 0.5) {
					return Math.round(Math.random()) - 0.5;
				}
			}.bind(this)).detach().appendTo(this);
		});

		return this;
	};

	$(".slick-intro").randomize().slick({
		appendArrows: '.slick-intro-nav',
		dots: false,
		arrows: true,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		autoplay: true,
		autoplaySpeed: 10000,
	});

/*  Mixitup tabs
/* ------------------------------------ */		
    var containerEl = document.querySelector('[data-ref~="mixitup-container"]');
    var mixer;

	if (containerEl) {
		mixer = mixitup(containerEl, {
			selectors: {
				target: '[data-ref~="mixitup-target"]'
			},
			animation: {
				enable: false,
			},
		});
	}
	
/*  Show mobile bottom menu on scroll-up
/* ------------------------------------ */	
	function debounce(func, wait = 5, immediate = true) {
	  let timeout;
	  return function() {
		let context = this, args = arguments;
		let later = function() {
		  timeout = null;
		  if (!immediate) func.apply(context, args);
		};
		let callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	  };
	};

	let scrollPos = 0;
	const nav = document.querySelector('#header-mobile-categories');

	function checkPosition() {
	  let windowY = window.scrollY;
	  if (windowY < scrollPos) {
		// Scrolling UP
		nav.classList.add('is-visible');
		nav.classList.remove('is-hidden');
	  } else {
		// Scrolling DOWN
		nav.classList.add('is-hidden');
		nav.classList.remove('is-visible');
	  }
	  scrollPos = windowY;
	}

	// window.addEventListener('scroll', checkPosition);
	window.addEventListener('scroll', debounce(checkPosition));
	
/*  Trap focus
/* ------------------------------------ */	
	// add all the elements inside modal which you want to make focusable
	const  focusableElements =
		'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
	const modal = document.querySelector('.search-trap-focus'); // select the modal by it's id

	if ( modal ) { 
		const firstFocusableElement = modal.querySelectorAll(focusableElements)[0]; // get first element to be focused inside modal
		const focusableContent = modal.querySelectorAll(focusableElements);
		const lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside modal


		document.addEventListener('keydown', function(e) {
		  let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

		  if (!isTabPressed) {
			return;
		  }

		  if (e.shiftKey) { // if shift key pressed for shift + tab combination
			if (document.activeElement === firstFocusableElement) {
			  lastFocusableElement.focus(); // add focus for the last focusable element
			  e.preventDefault();
			}
		  } else { // if tab key is pressed
			if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
			  firstFocusableElement.focus(); // add focus for the first focusable element
			  e.preventDefault();
			}
		  }
		});	
	}

});

/*  Progress circle
/* ------------------------------------ */
window.onload = function() {
  const container = document.querySelector('.progress-container');
  const svg = document.querySelector('svg');
  const progressBar = document.querySelector('.progress-bar');
  const pct = document.querySelector('.pct');
  const totalLength = progressBar.getTotalLength();
    
  setTopValue(svg);
  
  progressBar.style.strokeDasharray = totalLength;
  progressBar.style.strokeDashoffset = totalLength;
  
  window.addEventListener('scroll', () => {
    setProgress(container, pct, progressBar, totalLength);
  });
  
  window.addEventListener('resize', () => {
    setTopValue(svg);
  });
}

function setTopValue(svg) {
  svg.style.top = document.documentElement.clientHeight * 0.5 - (svg.getBoundingClientRect().height * 0.5) + 'px';
}


function setProgress(container, pct, progressBar, totalLength) {
  const clientHeight = document.documentElement.clientHeight;
  const scrollHeight = document.documentElement.scrollHeight;
  const scrollTop = document.documentElement.scrollTop;
  
  const percentage = scrollTop / (scrollHeight - clientHeight);
  //const percentage = Math.min(scrollTop * 1.02 / (scrollHeight - clientHeight),1);
  if(percentage === 1) {
    container.classList.add('completed');
  } else {
    container.classList.remove('completed');
  }
  pct.innerHTML = Math.round(percentage * 100) + '%';
  progressBar.style.strokeDashoffset = totalLength - totalLength * percentage;  
}