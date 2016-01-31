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

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">

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

						the_content( );	
						the_post_thumbnail( 'slider-1' );			
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
					<?php

					the_content( );	
					the_post_thumbnail( 'slider-3' );			
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
			<div class="row lista-produtos" id="produtos-home">
				
			</div>


	</main><!-- #main -->

<?php
get_footer();
