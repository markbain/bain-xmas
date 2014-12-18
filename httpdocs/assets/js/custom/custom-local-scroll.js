// When the document is loaded...
$(document).ready(function(){
	$( "#menu-main a" ).click(function( event ) {
  event.preventDefault();
  // Local Scroll //
	$('#menu-main').localScroll({
		duration: 1000,
		target:'body'
	});
});
});
