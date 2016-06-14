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