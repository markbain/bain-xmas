/*
===============================================
		
		Remove "no-js" class  
	
===============================================
*/	

jQuery( document ).ready( function( $ ) {
	document.documentElement.className = 
       document.documentElement.className.replace("no-js","js");
});

/*
=====================================================
		
		Back to top scrolling
	
=====================================================
*/		


	jQuery(document).ready(function( $ ){
		// scroll body to 0px on click
		$('#back-to-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

/*
=====================================================
		
		Responsive Nav
	
=====================================================
*/	

jQuery(document).ready(function( $ ){

/*
 * var navigation2 = responsiveNav(".hidden-search", {
     customToggle: "search-toggle",
	  navClass: "hidden-search", // String: Default CSS class. If changed, you need to edit the CSS too!
  		navActiveClass: "js-search-active", //
 });
 */

	var navigation1 = responsiveNav(".main-navigation", {
			customToggle: "nav-toggle",                 // Selector: Specify the ID of a custom toggle
			// Swapping no-js to js with script instead
		});
	});




/*
=====================================================
		
		Google Fonts 
	
=====================================================
*/	

jQuery(document).ready(function($) { // Wrap all scripts in this

  WebFontConfig = {
    google: { families: [ 'Ubuntu:300,400,700:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();  
}); // Wrap all scripts in this


/*
=====================================================
		
		FlexSlider.js 
	
=====================================================
*/	

jQuery(document).ready(function($) { // Wrap all scripts in this

$(window).load(function() {
    $('.testimonials-slider').flexslider({
			animationLoop: false,
    		slideshow: false,
			animation: "slide",
		 	directionNav: false,
		 	smoothHeight: true,
	 	});
  });

/* Client logo carousel */
$(window).load(function() {
    $('.logo-carousel').flexslider({
			animationLoop: true,
    		animation: "slide",
		 	slideshowSpeed: 4000,  
			itemWidth: 210,
    		itemMargin: 5
	 	});
  });

}); // end Wrap all scripts in this

/*
=====================================================
		
		Headroom.js 
	
=====================================================
*/	

jQuery(document).ready(function($) { // Wrap all scripts in this

	// grab an element
	var myElement = document.querySelector(".site-header");
	// construct an instance of Headroom, passing the element
var headroom = new Headroom(myElement, {
  "offset": 105,
  "tolerance": 5,
  "classes": {
    "initial": "animated",
    // "top": "headroom--top slideUp",
   //	"notTop": "headroom--not-top slideDown"
  }
});
	// initialise
	headroom.init(); 

}); // end Wrap all scripts in this
