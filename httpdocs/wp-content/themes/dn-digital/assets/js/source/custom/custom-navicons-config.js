/*
===============================================
		
		Navicons config
	
===============================================
*/	
jQuery( document ).ready( function( $ ) { // Wrap all scripts in this
	(function() {
				// initialize all
				
				[].slice.call( document.querySelectorAll( '.si-icons-default > .si-icon' ) ).forEach( function( el ) {
					var svgicon = new svgIcon( el, svgIconConfig );
				} );

				new svgIcon( document.querySelector( '.si-icons-easing .si-icon-plus' ), svgIconConfig, { easing : mina.backin } );
				new svgIcon( document.querySelector( '.si-icons-easing .si-icon-hamburger-cross' ), svgIconConfig, { easing : mina.elastic, speed: 600 } );

				
				new svgIcon( document.querySelector( '.si-icons-hover .si-icon-nav-up-arrow' ), svgIconConfig, { easing : mina.backin, evtoggle : 'mouseover', size : { w : 32, h : 32 } } );
				
			})();
}); // Wrap all scripts in this
