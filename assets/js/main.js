
jQuery(document).ready(function($) {
	
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );
	
	
	$(document).on("click",".wc_payment_method", function () {
		var elemento = $(this).children('.payment_box');
		if ($(this).attr('data-conteudo')=='') {
			$(this).attr('data-conteudo', elemento.html());
			$('#conteudo-pagamento').html(elemento.html());
			 elemento.html('teste');
			 elemento.css('display','none');
		}
		else{
			$('#conteudo-pagamento').html($(this).attr('data-conteudo'));
				elemento.html('');
				elemento.css('display','none');
		} 		 
		
	});
	// $('#payment_method_pagseguro').click();
		


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
	     
	    autoPlay : false,
	    navigation : true,
	    navigationText : ["<div class='prev-slider-2 nav-slider'></div>","<div class='prox-slider-2 nav-slider'></div>"],
	    pagination:false

    
 
	});
		$('#slider-prod').owlCarousel({
	 
	    // Most important owl features
	    items : 1,
	    itemsDesktop : [1000,1], //5 items between 1000px and 901px
	      itemsDesktopSmall : [900,1], // betweem 900px and 601px
	    autoPlay : true,
	    navigation : false,
	    pagination:true

	    
	 
	});
		$('#slider-1').owlCarousel({
	 
	  
	    items : 1,
	    autoPlay:8000,
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
	    autoPlay:false,
	    navigation : true,

	    navigationText : ["<div class='prev-slider-3 '></div>","<div class='nav-slider prox-slider-3'></div>"],
	    pagination:false
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();

	$(document).on("click",".control-prod", function (e) {
		e.preventDefault();
		$(this).siblings('input').val(ver_qtd($(this)));

		
	});
	$(document).on("focusout",".produto .qty", function (e) {
		$(this).siblings('input').val(ver_qtd($(this)));
		max=parseInt($(this).attr('max'));
		min=parseInt($(this).attr('min'));
		if ($(this).val() > max){
			$(this).val(max)
		}
		if ($(this).val() < min){
			$(this).val(min);
		}
		
	});
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

	// $('.control-prod').click(function(e){
	// 	e.preventDefault();
	// 	$(this).siblings('input').val(ver_qtd($(this)));
	// });
	// $( ".produto .qty" ).focusout(function() {
	// 	max=parseInt($(this).attr('max'));
	// 	min=parseInt($(this).attr('min'));
	// 	if ($(this).val() > max){
	// 		$(this).val(max)
	// 	}
	// 	if ($(this).val() < min){
	// 		$(this).val(min);
	// 	}

	// });
	
	var ativa=$('.menu-item.active a').attr('href');
	var variavel = $('#menu-menu-categorias a[href="' + ativa + '"]');
	variavel.addClass('ativo');
		console.log(variavel);

$('body').on("load", function() {
	var h = document.getElementById("slider-2").offsetHeight;
	$('.borda').css('height', h -10 + "px");
});
 $(window).load(function() {  $('body').fadeIn();  });

$("#cadastro-footer .wpcf7").on('mailsent.wpcf7',function(e){
	$('#cadastro-footer input').parent().hide();
});
$("#cadastro-footer .wpcf7").on('invalid.wpcf7',function(e){
	$('#cadastro-footer input[type="email"]').css('outline','solid red 1px');
});
$( ".wpcf7-form-control" ).focus(function() {
  	if ($(this).val()=='Mensagem' || $(this).val()=="Nome" || $(this).val()=="E-mail"){
  		$(this).val('');
  	}
});
function fecha(){

			$('#fundo-modal').attr('modal-estado','inativo');
	 		$('#modal-conteudo').attr('modal-estado','inativo');
			$('#modal-conteudo #html').fadeOut();
			$(' #botao-fechar').fadeOut();
			$('#modal-conteudo .wpcf7-response-output').hide();
		}
$('#ordem').change(function(e) {
		e.preventDefault();
		// console.log('change');
		var data = {
				'action': 'ordena_prod',
				'tax':$('#taxAjax').val(),
				'ordem': $(this).val()
		};		
		$.post(odin_main.ajaxurl, data, function(response) {
			// console.log(response);
			$('#produtos-home').html(response);
		});

	});
	$('.encomendarAdd').click(function(e){
		e.preventDefault();
	 	$('#fundo-modal').attr('modal-estado','ativo');
	 	$('#modal-conteudo').attr('modal-estado','ativo');
		$('#modal-conteudo #html').fadeIn();
		$(' #botao-fechar').fadeIn();
		$('#encomendaLink').val($(this).attr('data-link'));
		$('#encomendaNome').val($(this).attr('data-nome'));
	 	$(' #botao-fechar, #fundo-modal').click(function(e){
			e.preventDefault();
	 		fecha();
	 		});
	 });
	$("#modal-conteudo .wpcf7").on('mailsent.wpcf7',function(e){
		setTimeout(fecha, 1000);

		
	});	 
		
	$( "select").click(function() {
		if ($('.single_add_to_cart_button').attr('disabled')=='disabled') {

		}
		else{
		}

  	});
  	if ($("body").hasClass('single-product')){
  		$('.single_add_to_cart_button').attrchange({
  	trackValues: true, 
 	 callback: function (event) {
 	 	if (event.attributeName == 'disabled'){
 	 		if(event.newValue=='disabled'){
	 	 		$(' #encomenda').fadeIn();
	 	 		if ($('.single_add_to_cart_button').attr('title')===undefined) {
	 	 			$('#encomenda').html('');
	 	 		}
	 	 		else{
		 	 		$('#encomenda').html($('.single_add_to_cart_button').attr('title'));
	 	 		}
 	 		}
 	 		else if(event.newValue===undefined){
 	 			if ($('.single_add_to_cart_button').attr('title')===undefined) {
	 	 			$('#encomenda').html('');
	 	 		}
	 	 		else{

	 	 			$('#encomenda').html($('.single_add_to_cart_button').attr('title'));
	 	 		}
 	 		}
 	 		
 	 	}
 	 	
	//event.attributeName - Attribute Name
	//event.oldValue - Prev Value
	//event.newValue - New Value
  	}
	});
  	}
  	
  
});

