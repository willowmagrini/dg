<?php 

add_action( 'wp_enqueue_scripts', 'ajax_localize', 1 );
function ajax_localize(){

}

add_action( 'wp_ajax_ordena_prod', 'ordena_prod_func' );
add_action( 'wp_ajax_nopriv_ordena_prod', 'ordena_prod_func' );
function ordena_prod_func(){
	$post=$_POST;
	// echo $post['ordem'];
	$resposta=array();
	$resposta['html']="";
	$tax=$post['tax'];
	switch ($post['ordem']) {
		case '0':
		echo do_shortcode('[ajax_load_more  taxonomy="product_cat" taxonomy_terms="'.$tax.'" button_loading_label="carregando" scroll_distance ="-200" button_label="Mais" repeater="repeater1" post_type="product"  posts_per_page="12"  scroll="true"]');
			break;
		
		case '1':
		echo do_shortcode('[ajax_load_more  taxonomy="product_cat"  taxonomy_terms="'.$tax.'" orderby="title" order="ASC" button_loading_label="carregando" scroll_distance ="-200" button_label="Mais" repeater="repeater1" post_type="product"  posts_per_page="12"  scroll="true"]');
		break;
		
		case '2':
		echo do_shortcode('[ajax_load_more  taxonomy="product_cat"  taxonomy_terms="'.$tax.'" orderby="meta_value_num" meta_key="_price" order="ASC" button_loading_label="carregando" scroll_distance ="-200" button_label="Mais" repeater="repeater1" post_type="product"  posts_per_page="12"  scroll="true"]');
		break;

		case '3':
		echo do_shortcode('[ajax_load_more  taxonomy="product_cat"  taxonomy_terms="'.$tax.'" orderby="meta_value_num" meta_key="_price" order="DESC" button_loading_label="carregando" scroll_distance ="-200" button_label="Mais" repeater="repeater1" post_type="product"  posts_per_page="12"  scroll="true"]');
		break;

		default:
			# code...
			break;
	}
	// 	$WP_Query_produtos = new WP_Query( $args );
	
	// 	if( $WP_Query_produtos->have_posts()  )
	// 	{
	// 			while ( $WP_Query_produtos->have_posts() ) 
	// 			{
	// 				$WP_Query_produtos->the_post();
	// 				$resposta['html'] .=load_template_part( 'content', 'prod-lista' );
	// 			}			
	// 	wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	// }
	// echo $resposta['html'];

	wp_die();
}

// login no carrinho
add_action( 'wp_ajax_login_carrinho', 'login_carrinho_func' );
add_action( 'wp_ajax_nopriv_login_carrinho', 'login_carrinho_func' );
function login_carrinho_func(){
	global $user_ID;  
	global $woocommerce;  
	$resposta=array();
	$post=$_POST;
	$senha = esc_sql($post['senha']);
	$nome = esc_sql($post['nome']);
	$id_produto=esc_sql($post['id_produto']);

	if( username_exists($nome) OR email_exists($nome ) ){
		$lembrar=false;
		$login_data = array();  
		$login_data['user_login'] = $nome;  
		$login_data['user_password'] = $senha;  
		$login_data['remember'] = $lembrar;  
		$user_verify = wp_signon( $login_data, true );   
		if ( is_wp_error($user_verify) )   
			{  
	  		$resposta['html']= "<span class='error'>".__( 'E-mail ou Senha Inválidos', 'woocommerce' ) ." </span>";  
	   		$resposta['ok'] = 0;
	 	}
	 	else   {  
	 		if ($id_produto != "") {



	 			$resposta['html']=encomenda($id_produto, $user_verify->user_email, $user_verify->ID);
		   		$resposta['ok'] = 2;

	 			echo json_encode($resposta);

				wp_die( ); 
	 		}  
	   		$resposta['html']="Login efetuado";  
	   		$resposta['ok'] = 1;

	 	}  

		
  	}
  	elseif ($senha != '' AND $nome !='') {
	
		// Generate the password and create the user
		$user_id = wp_create_user( $nome, $senha, $nome );
		// Set the role
		$user = new WP_User( $user_id );
		$user->set_role( 'customer' );
		
		$resposta['html']= encomenda( $id_produto, $user->user_email, $user->ID);
		$resposta['ok'] = 2;

  	}
  	else{
  		$resposta['html']= "<span class='error'>".__( 'Algo não foi preenchido'.$id_produto, 'woocommerce' ) ." </span>";  
		$resposta['ok'] = 0;
  	}
	echo json_encode($resposta);
	wp_die( ); 

}

//login no carrinho
function encomenda($id_produto, $usuario, $id_usuario){
	// $resposta['html']='user:'.$user_verify->user_email.'id_prod: '.$id_produto;  
	$emails = get_post_meta($id_produto,'encomenda')[0];
	add_post_meta($id_produto, 'encomenda', $usuario);  
	// $produtos = get_user_meta($id_produto,'encomendas',1);
	// update_user_meta(  $user_verify->ID, 'encomendas', $id_produto);
	return implode(',',array_unique(get_post_meta($id_produto,'encomenda' )));
}
add_filter('wp_insert_post_data', 'notificacao_estoque', 10, 2);
function notificacao_estoque(){
	
}