<?php 
/////////////CPT escola
add_action( 'init', 'slide_cpt' );

function slide_cpt() {
	$labels = array(                        
		'name'               => 'slides',
		'singular_name'      => 'Slide',
		'menu_name'          => 'Slides',
		'name_admin_bar'     => 'Slide',
		'add_new'            => 'Adicionar Novo',
		'add_new_item'       => 'Adicionar Novo slide',
		'new_item'           => 'Novo slide' ,
		'edit_item'          => 'Editar slide',
		'view_item'          => 'Ver todos' ,
		'all_items'          => 'Todos' ,
		'search_items'       => 'Buscar',
		'parent_item_colon'  => 'Pai' ,
		'not_found'          => 'Nenhum encontrado' ,
		'not_found_in_trash' => 'Nenhum encontrado na lixeira' ,
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' => 'dashicons-images-alt2',
		'supports'           => array( 'title', 'thumbnail','editor')
	);

	register_post_type( 'slide', $args );
}
/////////////////////////////////////////

function add_custom_taxonomies() {
	  // Add new "Locations" taxonomy to Posts
	  register_taxonomy('slider', 'slide', array(
	    // Hierarchical taxonomy (like categories)
	    'hierarchical' => true,
	    // This array of options controls the labels displayed in the WordPress Admin UI
	    'labels' => array(
	      'name' => _x( 'Slider', 'taxonomy general name' ),
	      'singular_name' => _x( 'Slider', 'taxonomy singular name' ),
	      'search_items' =>  __( 'Buscar Sliders' ),
	      'all_items' => __( 'Todos sliders' ),
	      'edit_item' => __( 'Editar slider' ),
	      'update_item' => __( 'Atualizar' ),
	      'add_new_item' => __( 'Adicionar novo slider' ),
	      'new_item_name' => __( 'Novo slider' ),
	      'menu_name' => __( 'Slider' ),
		  'separate_items_with_commas' => __('Separe os itens com virgulas'),
		  'choose_from_most_used' => __('Escolha dentre os mais utilizados')
		
	
	    ),
	    // Control the slugs used for this taxonomy
	    'rewrite' => array(
	      'slug' => 'slider', // This controls the base slug that will display before each term
	      'with_front' => false, // Don't display the category base before "/locations/"
	      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
	    ),
	  ));
	
	}
	add_action( 'init', 'add_custom_taxonomies', 0 );