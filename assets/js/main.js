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
    itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
     
    autoPlay : true,
    navigation : true,
    navigationText : ["<div class='prev-slider-2 nav-slider'></div>","<div class='prox-slider-2 nav-slider'></div>"],
    pagination:false

    
 
});
	$('#slider-1').owlCarousel({
 
    // Most important owl features
    items : 1,
    autoPlay:true,
    itemsDesktop : [1000,1], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,1], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    
 
	});
	
	$('#slider-3').owlCarousel({
     itemsDesktop : [1000,1], //5 items between 1000px and 901px
     itemsDesktopSmall : [900,1], // betweem 900px and 601px
     itemsTablet: [600,1], //2 items between 600 and 0


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
	
	var ativa=$('.menu-item.active a').attr('href');
	var variavel = $('#menu-menu-categorias a[href="' + ativa + '"]');
	variavel.addClass('ativo');
		console.log(variavel);

$('body').on("load", function() {
	var h = document.getElementById("slider-2").offsetHeight;
	$('.borda').css('height', h -10 + "px");
});

});

