/*
===============================================
		
		Headroom.js  
	
===============================================
*/		

jQuery( document ).ready( function( $ ) { // Wrap all scripts in this


// grab an element
var myElement = document.querySelector(".site-header");
// construct an instance of Headroom, passing the element
var headroom  = new Headroom(myElement, {
  "tolerance": 100,
  "offset": 53,
  "classes": {
			// when element is initialised
        initial : "headroom",
        // when scrolling up
        pinned : "headroom--pinned",
        // when scrolling down
        unpinned : "headroom--unpinned",
        // when above offset
        top : "headroom--top",
        // when below offset
        notTop : "headroom--not-top"
  }
});
// initialise
headroom.init();

(function($) {

});

}); // Wrap all scripts in this
