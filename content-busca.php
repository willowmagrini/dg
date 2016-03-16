<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

	<?php 
		if(true){?>
			<div class="col-sm-4 produto-home produto">
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
							echo '<h4><a href="'.get_permalink($post->ID).'">'.$product->get_title().'</a></h4>';
							the_excerpt();
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
							</div>							<?php 
							do_action( 'woocommerce_after_shop_loop_item' );


							// woocommerce_simple_add_to_cart()

							// echo $product->get_price_html();
							// the_title();
							// echo $product->get_image( 'product' );
							// echo '<a href="'. $product->add_to_cart_url()	 .'">' .  $product->add_to_cart_text() . "</a>";			
							?>
						</div><!--<div class="produto-fundo">-->
					</div><?php 
		}
		?>

