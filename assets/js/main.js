
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
		$('#wc-traycheckout-cc-card-expiry').mask('99/9999');		 		 
		
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
	
	// var ativa=$('.menu-item.active a').attr('href');
	ativa =  window.location.href ;
	console.log('ativa:'+ativa);
	var variavel = $('#sidebar a[href="' + ativa + '"]');
	// console.log('variavel'+variavel);
	variavel.addClass('ativo');
		// console.log(variavel);


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
	 		$('#modal-conteudo-2').attr('modal-estado','inativo');
			// $('#modal-conteudo').fadeOut();
			$(' #botao-fechar').fadeOut();
			$('#modal-conteudo .wpcf7-response-output').hide();
			$('#modal-conteudo-2 .wpcf7-response-output').hide();
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
      $(".ajax-load-more-wrap").ajaxloadmore(); // re-initiate Ajax Load More

		});

	});
	$(document).on("click",".encomendarAdd", function (e) {
		e.preventDefault();
	 	$('#fundo-modal').attr('modal-estado','ativo');
	 	$('#modal-conteudo').attr('modal-estado','ativo');
		// $('#modal-conteudo').fadeIn();
		$(' #botao-fechar').fadeIn();
		// $('#encomendaLink').val($(this).attr('data-link'));
		$('#encomendaNome').attr('href', $(this).attr('data-link'));
		// $('#encomendaNome').val($(this).attr('data-nome'));
		$('#encomendaNome').html($(this).attr('data-nome') );
		id_produto = $(this).attr('data-prod-id');
		$('#submitbtn').attr('id_produto',id_produto)
	 	$(' #botao-fechar, #fundo-modal').click(function(e){
			e.preventDefault();
	 		fecha();
	 		});
	 });
	$("#modal-conteudo .wpcf7").on('mailsent.wpcf7',function(e){
		setTimeout(fecha, 1000);

		
	});
	// popup	 
	// popup	 
	// popup	 
	// popup	 
	// popup	 
	// popup	 
	function popup(){
		function getCookie(c_name) {
		    var c_value = document.cookie;
		    var c_start = c_value.indexOf(" " + c_name + "=");
		    if (c_start == -1) {
		        c_start = c_value.indexOf(c_name + "=");
		    }
		    if (c_start == -1) {
		        c_value = null;
		    } else {
		        c_start = c_value.indexOf("=", c_start) + 1;
		        var c_end = c_value.indexOf(";", c_start);
		        if (c_end == -1) {
		            c_end = c_value.length;
		        }
		        c_value = unescape(c_value.substring(c_start, c_end));
		    }
		    return c_value;
		}
		var visit=getCookie("cookie");
		// visit = null;
	    if (visit==null){
	        $('#fundo-modal').attr('modal-estado','ativo');
		 	$('#modal-conteudo-2').attr('modal-estado','ativo');
			// $('#modal-conteudo').fadeIn();
			$(' #botao-fechar-2').fadeIn();
			$(' #botao-fechar-2, #fundo-modal').click(function(e){
				e.preventDefault();
		 		fecha();
	 		});
	        var expire=new Date();
	        expire=new Date(expire.getTime()+7776000000);
	        document.cookie="cookie=here; expires="+expire;

	    }
	}
	popup();
	// popup	 
	// popup	 
	// popup	 
	// popup	 
	// popup	 

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



	$(document).on("click",".wc-proceed-to-checkout .cliente", function (e) {

  		e.preventDefault();
  		$(".form-login-carrinho").fadeIn();
  		$(this).prop('disabled', 'disabled');
  	});

  	$(document).on("click","#submitbtn", function (e) {
  		e.preventDefault();

  		var data = {
				'action': 'login_carrinho',
				'nome':$('#email').val(),
				'senha': $('#senha').val(),
				'id_produto':$(this).attr('id_produto')
		};	
		$.post(odin_main.ajaxurl, data, function(response) {
           	response=jQuery.parseJSON(response)
           	console.log(response)
           	$("#resultado-login").html(response.html)
           	if (response.ok == 1){
           		$('body').fadeOut();
           		window.location.href = $('#checkout-url').val();

           	}
		});
  	});
	$(document).on("click",".woocommerce-cart .control-prod", function (e) {
  		$('input[name="update_cart"]' ).removeProp( 'disabled');
	});
	


	$('#shipping_postcode').change(function(e) {
		$("#shipping_city").attr('disabled','disabled');
        $("#shipping_neighborhood").attr('disabled','disabled');
        $("#shipping_address_1").attr('disabled','disabled');
    	var cep_code = $(this).val();
	    if( cep_code.length <= 0 ) return;
    	$.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code }, function(result){
            if( result.status!=1 ){
	           alert(result.message || "Houve um erro desconhecido");
    	       return;
        	}

        	$("#shipping_postcode").val( result.code );
        	var estado = result.state;
            $("#shipping_state option[value="+estado+"]").attr('selected','selected');
            $("#shipping_city").val( result.city );
            $("#shipping_neighborhood").val( result.district );
            $("#shipping_address_1").val( result.address );
            $("#shipping_city").removeProp( 'disabled');
        	$("#shipping_neighborhood").removeProp( 'disabled');
        	$("#shipping_address_1").removeProp( 'disabled');
        });
   	});
	function updatescore(){
		console.log('chamou');
            var thisgamemarks= 2300;
            var thequizid = 5;
            $.post("updatemark.php", { quizidvalue: thequizid, newmarkvalue: thisgamemarks } );
            }
});