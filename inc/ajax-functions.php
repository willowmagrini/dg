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

	$args = array(
					'posts_per_page' => 8,
					'post_type' => 'product',
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => $post['tax'],
						),
					),	
				);
	switch ($post['ordem']) {
		case '0':
			# code...
			break;
		
		case '1':
			$args['orderby']= 'title';
			$args['order']= 'ASC';

		break;
		
		case '2':
			$args['orderby']= 'meta_value_num';
			$args['meta_key']= '_price';
			$args['order']= 'ASC';
			break;
		
		default:
			# code...
			break;
	}
		$WP_Query_produtos = new WP_Query( $args );
	
		if( $WP_Query_produtos->have_posts()  )
		{
				while ( $WP_Query_produtos->have_posts() ) 
				{
					$WP_Query_produtos->the_post();
					$resposta['html'] .=load_template_part( 'content', 'prod-lista' );
				}			
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	echo $resposta['html'];

	wp_die();
}