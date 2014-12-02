// Eventify, Responsive HTML5 Event Template - Version 1.1 //

// Javascripts //
$(document).ready(function () {
	
	// Top Bar //
	$('.top-bar nav').addClass('hidden');
	$('.menu-link').on('click', function (
		e) {
		e.preventDefault();
		$('.top-bar nav').toggleClass(
			'hidden');
	});
	$(window).scroll(function () {
		if ($(window).scrollTop() <= 50) {
			$('.top-bar').removeClass('alt')
		} else {
			$('.top-bar').addClass('alt')
		}
	});
	$(window).load(function () {
		if ($(window).scrollTop() <= 30) {
			$('.top-bar').removeClass('alt')
		} else {
			$('.top-bar').addClass('alt')
		}
	});
	//
	$('#mainnav .nav a').click(function (e) {
		e.preventDefault();
		var des = $(this).attr('href');
		if ($('.navbar').hasClass(
			'in')) {
			$('.navbar .btn-navbar').trigger(
				'click');
		}
		goToSectionID(des);
	})
	
	// Local Scroll //
	$('#mainnav li').localScroll({
		duration: 1000
	});
	$('.logo').localScroll({
		duration: 1000
	});
	
	// One Page Nav //
	$('.top-bar').onePageNav({
		currentClass: 'current',
		filter: ':not(.external)'
	});
	
	// Calculate the viewport height //
	var viewHeight = $(window).height();
	$("#intro").css({
		'height': viewHeight
	});
	$(window).on('resize', function () {
		var viewHeight = $(window).height();
		$("#intro").css({
			'height': viewHeight
		});
	});
	
	// Flexslider
	// Can also be used with $(document).ready()
	$('.flexslider').flexslider({
		animation: "slide"
	});
	
	// Tabs //
	$('#schedule-tabs a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	})
	
	// Tooltip //
	$("[rel=tooltip]").tooltip();
	$("[data-rel=tooltip]").tooltip();
	
	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
	$('#intro').parallax("50%", 0.1);
	$('#venue').parallax("50%", 0.02);
	
	// Carousel //
	$(".speakers-carousel").carousel({
		dispItems: 1,
		direction: "horizontal",
		pagination: false,
		loop: true,
		autoSlide: true,
		autoSlideInterval: 5000,
		delayAutoSlide: 2000,
		effect: "slide",
		animSpeed: "slow",
		showEmptyItems: false,
	});
	
	// Toggle //
	$('.toggle-item-title').click(function () {
		$(this).next().slideToggle();
		$(this).toggleClass(
			'ui-state-active');
	});
	

	
	// Contact Form //
	$('#contactform').validationEngine();
    
    // send the form by ajax when sumbitted
    $('#contactform').submit(function(e){
        e.preventDefault();
        var submitUrl = $(this).attr('action');
        $.ajax({
            url: submitUrl,
            type: 'POST',
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('#submit').attr('disabled', 'disabled');
                $('#ErrorMsgs').fadeOut('slow').html('<div class="alert alert-info">Checking...<a href="#" class="close">&times;</a></div>').fadeIn('slow');
            },
            success: function(data) {
                if(data.status === 'success'){
                    $('#contactform')[0].reset();
                }
                $('#ErrorMsgs').html(data.message).fadeIn('slow');
                $('#submit').removeAttr('disabled');
            }
        });
        return false;
    });

	
	// Google Map //
	$('#map_canvas').gmap({
		'center': new google.maps.LatLng(41.390954, 2.168001), // Change this to your desired latitude and longitude
		'zoom': 17,
		'mapTypeControl': false,
		'scrollwheel': false,
		'navigationControl': false,
		'streetViewControl': false,
		'styles': [{
			stylers: [{
				gamma: 0.60
			}, {
				hue: "#333333"
			}, {
				invert_lightness: false
			}, {
				lightness: 2
			}, {
				saturation: -30
			}, {
				visibility: "on"
			}]
		}]
	});
	var image = {
		url: 'assets/images/marker.png', // Define the map marker file here
		// This marker is 51 pixels wide by 63 pixels tall.
		size: new google.maps.Size(51, 63),
		// The origin for this image is 0,0.
		origin: new google.maps.Point(0, 0),
		// The anchor for this image is the base of the flagpole at 26,63.
		anchor: new google.maps.Point(26, 63)
	};
	$('#map_canvas').gmap().bind('init', function () {
		$('#map_canvas').gmap('addMarker', {
			'id': 'marker-1',
			'position': '41.390954,2.168001',
			'bounds': false,
			'icon': image
		}).click(function () {
			$('#map_canvas').gmap('openInfoWindow', {
				'content': '<h4>ELT Innovation in Action</h4><p><strong>Oxford TEFL Barcelona</strong><br>Calle Diputación, 279, Barcelona, Spain </p>'
			}, this);
		});
	});
	
	// end		
})
