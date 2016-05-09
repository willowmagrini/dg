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

	<main id="content" class="col-sm-12" tabindex="-1" role="main">

			<div class="row" id="slider-1">
				<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		$args = array(
					'post_type' => 'slide',
					'tax_query' => array(
						array(
							'taxonomy' => 'slider',
							'field'    => 'slug',
							'terms'    => 'slider-1',
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
					<div class="slide-1">
						<?php 
							 if (get_field('link_externo')=="") {
								$link = get_field('link2' );
							}
							else{
								$link=get_field('link_externo');
							}
						if (!get_field('bot_slider_1' )) {?>
						<div class="texto-slider">
							
							<a style="color:<?php echo get_field('cor_do_botao'); ?>" href="<?php echo $link;?>">
							<?php 
								the_content( );	?>
							</a>
						</div>

						<a style="color:<?php echo get_field('cor_do_botao'); ?>" href="<?php echo $link;?>">
							<?php the_post_thumbnail( 'slider-1' );?>
						</a>
						<?php 
						} 
						else{?>
						<div class="texto-slider">
							<?php the_content( );?>
							<button style="border-color:<?php echo get_field('cor_do_botao'); ?>" class="comprar-slider">
								<a style="color:<?php echo get_field('cor_do_botao'); ?>" href="<?php echo $link;?>">
									Comprar
								</a>
							</button>
						</div>
						<?php the_post_thumbnail( 'slider-1' );
						}?>


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
						<?php if (get_field('link_externo')=="") {
								$link = get_field('link2' );
							}
							else{
								$link=get_field('link_externo');
							} ?>
					<a href="<?php echo $link; ?>">

					<div class="borda"></div></a>
					<?php 


					the_content( );	
					the_post_thumbnail( 'slider-2' );			
					// get_template_part('content', 'slider-1');
					?>
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
			
			
			<div class="row" id="slider-3">
				<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		$args = array(
					'post_type' => 'slide',
					'tax_query' => array(
						array(
							'taxonomy' => 'slider',
							'field'    => 'slug',
							'terms'    => 'slider-3',
						),
					),				);
	
		$WP_query_slider = new WP_Query( $args );
	
		if( $WP_query_slider->have_posts()  )
		{
			?>
			<?php
				while ( $WP_query_slider->have_posts() ) 
				{
					$WP_query_slider->the_post();
					?>
					<div class="slide-3">
						<?php if (get_field('link_externo')=="") {
								$link = get_field('link2' );
							}
							else{
								$link=get_field('link_externo');
							} ?>
						<div class="texto-slider">
						<a href="<?php echo $link; ?>">
						<?php
						$titulo=get_the_taxonomies($post->ID);
						the_content( );
						?>
						</a>			
						</div>
						<a href="<?php echo $link; ?>">
						<?php
						the_post_thumbnail( 'slider-1' );	
						?>		
						</a>			
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
		
		$term_id= get_term_by( 'slug', 'slider-3' ,'slider');
		$description=term_description( $term_id->term_id, 'slider' ) ;
					echo "<h3 class='legenda-slider' >".$description."</h3>";?>
			<?php echo get_theme_mod('legenda');?>
			<div class="row lista-produtos" id="produtos-home">
				<?php
		
		$args = array(
					'posts_per_page' => 8,
					'post_type' => 'product',
					'orderby'        => 'meta_value_num',
					'order'          => 'DESC',
					'meta_key'       => 'wcmvp_product_view_count',
				);
	
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

<?php
get_footer();
