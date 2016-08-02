<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
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

	<div id='slider-prod' class=""><?php

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop === 0 || $loop % $columns === 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns === 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'produto-galeria' ), 0, $attr = array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

			$image_class = esc_attr( implode( ' ', $classes ) );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" >%s</a>', $image_link, $image_class, $image_caption, $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

	?>
	</div>
	<?php
}
