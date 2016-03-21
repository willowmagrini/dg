<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
	<?php 
		get_sidebar('taxonomy');
		$term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

	?>

	<main id="content" class="col-sm-9" tabindex="-1" role="main">
		<select name="ordem" id="ordem">
			<option value="0">Recentes</option>
			<option value="1">Alfabética</option>
			<option value="2">Por preço</option>
		</select>
		<input type='hidden' name='tax' id="taxAjax" value='<?php echo $term->slug; ?>'>
		<div class="clearfix"></div>
		<?php 
		
 		echo '<h4 id="titulo-tax">'.$term->name.'</h4>';
		?>
			<div class="row lista-produtos" id="produtos-home">
				<?php
		
		$args = array(
					'posts_per_page' => 8,
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
		$WP_Query_produtos = new WP_Query( $args );
	
		if( $WP_Query_produtos->have_posts()  )
		{
			?>
			<?php
				while ( $WP_Query_produtos->have_posts() ) 
				{
				

					$WP_Query_produtos->the_post();
					get_template_part( 'content', 'prod-lista' );

				}
				?>
		<?php 
			?>
				<?php
			
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	?>
			</div>
			


	</main><!-- #main -->
	<div class="clearfix"></div>
	<?php $odin_general_opts = get_option( 'odin_general' );
		echo "<h3 class='legenda-slider' >".$odin_general_opts['slider_2']."</h3>";?>

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
					<div class="borda"></div>
					<a href="<?php echo get_field('link2' ); ?>">
					<?php

					the_content( );	
					the_post_thumbnail( 'slider-2' );			
					// get_template_part('content', 'slider-1');
					?></a>
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