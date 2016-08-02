<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
get_header(); ?>
	<?php 
		get_sidebar('taxonomy');
		$term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

	?>

	<main id="content" class="col-sm-9" tabindex="-1" role="main">
		
		<select name="ordem" id="ordem">
			
			<option value="0">Mais recentes</option>
			<option value="1">Ordem alfabética</option>
			<option value="2">Menor preço</option>
			<option value="3">Maior preço</option>
		</select>
		<input type='hidden' name='tax' id="taxAjax" value='<?php echo $term->slug; ?>'>
		<div class="clearfix"></div>
		<?php 
		
 		echo '<h4 id="titulo-tax">'.$term->name.'</h4>';
		?>
			<div class="row lista-produtos" id="produtos-home">
				<?php
		
		$args = array(
					'posts_per_page' => 10,
					'post_type' => 'product',
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => $term->slug,
						),
					),	
				);
		?>

		<?php 
		echo do_shortcode('[ajax_load_more taxonomy="product_cat" button_loading_label="carregando" taxonomy_terms="'.$term->slug.'" scroll_distance ="-200" button_label="Mais" repeater="repeater1" post_type="product"  posts_per_page="9"  scroll="true"]');
	// 	$WP_Query_produtos = new WP_Query( $args );
	
	// 	if( $WP_Query_produtos->have_posts()  )
	// 	{
	// 		?>
	 		<?php
	// 			while ( $WP_Query_produtos->have_posts() ) 
	// 			{
				

	// 				$WP_Query_produtos->the_post();
	// 				get_template_part( 'content', 'prod-lista' );

	// 			}
	// 			?>
	 	<?php 
	// 		?>
				<?php
			
	// 	wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	// }
	?>
			</div>
			


	</main><!-- #main -->
	<div class="clearfix"></div>
	<?php 
		$term_id= get_term_by( 'slug', 'slider-2' ,'slider');
		$description=term_description( $term_id->term_id, 'slider' ) ;
		echo "<h3 class='legenda-slider' >".$description."</h3>";?>

<div class="row" id="slider-2">
				<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		$args = array(
					'post_type' => 'slide',
					'tax_query' => array(
						array(
							'taxonomy' => 'slider',
							'field'    => 'slug',
							'terms'    => 'slider-2',
						),
					),
				);
	
		$WP_query_slider = new WP_Query( $args );
	
		if( $WP_query_slider->have_posts()  )
		{
			?>
			<?php
				while ( $WP_query_slider->have_posts() ) 
				{
					$WP_query_slider->the_post();
					?>
					<div class="slide-2">
						<?php 
							 if (get_field('link_externo')=="") {
								$link = get_field('link2' );
							}
							else{
								$link=get_field('link_externo');
							}
						?>
					<a href="<?php echo $link; ?>">
					<div class="borda"></div>
					</a>
					<?php

					the_content( );	?>
					<?php the_post_thumbnail( 'slider-2' );	?>
					</div>
					<?php
				}
				?>
		<?php 
		
			?>
				<?php
			
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	?>
			</div>

<?php
get_footer();