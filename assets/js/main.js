jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});
	$('#slider-2').owlCarousel({
 
    // Most important owl features
    items : 1,
    
 
});
	$('#slider-1').owlCarousel({
 
    // Most important owl features
    items : 1,
    
 
	});
	
	$('#slider-3').owlCarousel({
 
    // Most important owl features
    items : 1,
    
 
});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();
});
