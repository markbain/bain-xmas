
/*
=====================================================
		
		Responsive-nav.js
	
=====================================================
*/

jQuery(document).ready(function($) { // Wrap all scripts in this

	var navigation = responsiveNav(".nav-collapse", {
			animate: true,                    // Boolean: Use CSS3 transitions, true or false
			transition: 284,                  // Integer: Speed of the transition, in milliseconds
			label: "Menu",                    // String: Label for the navigation toggle
			insert: "before",                  // String: Insert the toggle before or after the navigation
			customToggle: "main-menu-toggle",                 // Selector: Specify the ID of a custom toggle
			closeOnNavClick: true,           // Boolean: Close the navigation when one of the links are clicked
			openPos: "relative",              // String: Position of the opened nav, relative or static
			navClass: "nav-collapse",         // String: Default CSS class. If changed, you need to edit the CSS too!
			navActiveClass: "js-nav-active",  // String: Class that is added to <html> element when nav is active
			// jsClass: " ",                    // String: 'JS enabled' class which is added to <html> element
			// Swapping no-js to js with Modernizr instead
			init: function(){},               // Function: Init callback
			open: function(){},               // Function: Open callback
			close: function(){}               // Function: Close callback
		});

}); // end Wrap all scripts in this

