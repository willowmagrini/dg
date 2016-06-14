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
	<h1>Resultados da busca por: <b><?php echo $term; ?></b></h1>

	<?php 
	global $wpdb;
	// If you use a custom search form
	// $keyword = sanitize_text_field( $_POST['keyword'] );
	// If you use default WordPress search form
	$keyword = $term;
	$keyword ='%'. $keyword .'%';// Thanks Manny Fleurmond
	// Search in all custom fields
	$post_ids_meta = $wpdb->get_col( $wpdb->prepare("
	SELECT DISTINCT post_id FROM {$wpdb->postmeta}
	WHERE meta_value LIKE '%s'
	", $keyword ));
	// Search in post_title and post_content
	$post_ids_post = $wpdb->get_col( $wpdb->prepare("
	SELECT DISTINCT ID FROM {$wpdb->posts}
	WHERE post_title LIKE '%s'
	OR post_content LIKE '%s'
	", $keyword, $keyword ));
	$post_ids = array_merge( $post_ids_meta, $post_ids_post );
	// Query arguments
	$args = array(
	'post_type'=>'product',
	'posts_per_page'=>'-1',
	'post__in'=> $post_ids,
	);
	$post_ids = implode(",", $post_ids);
	// echo $post_ids;
		
		$products = new WP_Query($args);
		$pages = new WP_Query(array( 's' => $term, 'post_type'=>'page', 'posts_per_page'=>'-1' ));
		$NumResultsProducts = $products->found_posts;
		$NumResultsPage = $pages->found_posts;
		if ($NumResultsProducts == 0 && $NumResultsPage ==0) {
			echo '<h4>Nenhum resultado para a busca: <b>'.$term.'</b></h4>';
		}
		else{
			if ($NumResultsProducts !== 0) {
				echo "<h2>Produtos:</h2>";?>
				<div class="busca-produtos">
				<?php
				echo do_shortcode('[ajax_load_more post__in="'.$post_ids.'" post_type="product"  posts_per_page="30"  scroll="false" button_label="Mais resultados"]');
				?>
				</div>
			<?php 			}
			if ($NumResultsPage !== 0) {
				echo '<h2>Páginas:</h2>
				<div class="busca-paginas">';
				echo do_shortcode('[ajax_load_more repeater="repeater2" post_type="page"  posts_per_page="3" search="'. $term .'" scroll="false" button_label="Mais resultados"]');
				echo '</div>';	
			}			
		}
		?>
</main>
<?php 
 get_footer( '' ); ?>