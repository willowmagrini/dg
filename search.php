<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( '' ); 
get_sidebar('taxonomy');

?>
 <main id="content" class="col-sm-9" tabindex="-1" role="main">
 	<?php $term = $_GET['s'];?>
	<h1>Resultados da busca por:<b><?php echo $term; ?></b></h1>

	<?php 
	echo "<h2>Produtos:</h2>";?>
	<div class="busca-produtos">
		<?php
	echo do_shortcode('[ajax_load_more repeater="repeater1" post_type="product"  posts_per_page="3" search="'. $term .'" scroll="false" button_label="Mais resultados"]');
	?>
	</div>

	<!-- busca-produtos -->
	<?php 
	echo '<h2>Páginas:</h2>
	<div class="busca-paginas">';
	echo do_shortcode('[ajax_load_more repeater="repeater2" post_type="page"  posts_per_page="3" search="'. $term .'" scroll="false" button_label="Mais resultados"]');
	echo '</div>';

?>
</main>
<?php 
 get_footer( '' ); ?>