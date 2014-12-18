/*
=====================================================
		
		Full height intro
	
=====================================================
*/	

jQuery(document).ready(function($) { // Wrap all scripts in this
	// Calculate the viewport height //
	var viewHeight = $(window).height();
	$(".hero").css({
		'min-height': viewHeight
	});
	$(window).on('resize', function () {
		var viewHeight = $(window).height();
		$(".hero").css({
			'min-height': viewHeight
		});
	});
});
