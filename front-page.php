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
						<div class="texto-slider">
							<?php

							the_content( );	

							// get_template_part('content', 'slider-1');
							
							?>
							
							<button class="comprar-slider">Comprar</button>						

						</div>
						<?php
	 						the_post_thumbnail( 'slider-1' );	

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
					<div class="slide-3">
						<div class="texto-slider">
						<?php
						$titulo=get_the_taxonomies($post->ID);
						the_content( );	
						// get_template_part('content', 'slider-1');
						?>
						</div>
						<?php
						the_post_thumbnail( 'slider-1' );	
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
<?php 
					echo "<h3 class='legenda-slider' >".$odin_general_opts['slider_3']."</h3>";?>
			<?php echo get_theme_mod('legenda');?>
			<div class="row lista-produtos" id="produtos-home">
				<?php
		
		$args = array(
					'posts_per_page' => 8,
					'post_type' => 'product',
					'meta_query' => array(
						array(
							'key'     => '_featured',
							'value'   => 'yes',
						),
					),
				);
	
		$WP_Query_produtos = new WP_Query( $args );
	
		if( $WP_Query_produtos->have_posts()  )
		{
			?>
			<?php
				while ( $WP_Query_produtos->have_posts() ) 
				{
					$WP_Query_produtos->the_post();
					?>
					<div class="col-sm-3 produto-home produto">
						<?php

						$product = wc_get_product( get_the_ID() );
						// echo '<pre>';
						// var_dump($product);
						// echo '</pre>';
						?>
						<div class="produto-imagem">
						<?php
							echo $product->get_image( 'shop_catalog');

							do_action( 'woocommerce_after_shop_loop_item_title' );
						?>
						</div>
						<div class="produto-fundo">
							<?php
							echo '<h4>'.$product->get_title().'</h4>';
							the_excerpt();
							?>

							
							<?php

							// echo "<pre>";
							// 	print_r( );
							// echo "<pre>";
							do_action( 'woocommerce_after_shop_loop_item' );


							// woocommerce_simple_add_to_cart()

							// echo $product->get_price_html();
							// the_title();
							// echo $product->get_image( 'product' );
							// echo '<a href="'. $product->add_to_cart_url()	 .'">' .  $product->add_to_cart_text() . "</a>";			
							?>
							<div class="sociais">
								<a onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink( );?>', 'myWin', 'toolbar=no, directories=no,location=no, status=yes, menubar=no, resizable=no, scrollbars=yes, width=600,height=400'); return false" target="_blank" href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/face-prod.png" alt="">
								</a>

								<a onclick="window.open('https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Frede.com.br%2Fdeepgeek%2F&ref_src=twsrc%5Etfw&text=<?php echo $product->get_title();?>&tw_p=tweetbutton&url=<?php echo get_permalink( );?>', 'myWin', 'toolbar=no, directories=no,location=no, status=yes, menubar=no, resizable=no, scrollbars=yes, width=600,height=400'); return false" TARGET="_blank" 
								href="#" 
								>	
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-prod.png" alt="">
								</a>
								<a data-pin-do="buttonPin" data-pin-count="above" data-pin-custom="true" href="http://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink( )) ;?>&media=<?php echo wp_get_attachment_url($product->get_image_id());?>&description=<?php echo $product->get_title();?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pinterest-prod.png" class="pin-btn"height="25"/></a>
							</div>
						</div><!--<div class="produto-fundo">-->
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


	</main><!-- #main -->

<?php
get_footer();
