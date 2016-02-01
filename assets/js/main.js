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
    items : 2,
    autoPlay : true,
    navigation : true,
    navigationText : ["<div class='prev-slider-2 nav-slider'></div>","<div class='prox-slider-2 nav-slider'></div>"],
    pagination:false
    
 
});
	$('#slider-1').owlCarousel({
 
    // Most important owl features
    items : 1,
    autoPlay:true,
    
 
	});
	
	$('#slider-3').owlCarousel({
 
    // Most important owl features
    items : 1,
    autoPlay:true,
    navigation : true,
    navigationText : ["<div class='prev-slider-2 nav-slider'></div>","<div class='prox-slider-2 nav-slider'></div>"],
    pagination:false
    
 
});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();
	function ver_qtd(elemento){
		valor=parseInt($(elemento).siblings('input').val());
		num=parseInt($(elemento).attr('data-value'));
		max=parseInt($(elemento).siblings('input').attr('max'));
		min=parseInt($(elemento).siblings('input').attr('min'));
		soma=valor+num;
		if (soma <= max && soma >= min ){
			return soma
		}
		else {
			return valor
		}
	}
	$('.control-prod').click(function(e){
		e.preventDefault();
		$(this).siblings('input').val(ver_qtd($(this)));
	});
	$( ".produto .qty" ).focusout(function() {
		max=parseInt($(this).attr('max'));
		min=parseInt($(this).attr('min'));
		if ($(this).val() > max){
			$(this).val(max)
		}
		if ($(this).val() < min){
			$(this).val(min);
		}
	});



});
