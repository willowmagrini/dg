<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$has_row    = false;
$alt        = 1;
$attributes = $product->get_attributes();

ob_start();

?>
<table class="shop_attributes">
	<tr>			
		<th>Nome do produto</th>
		<td>
			<?php echo get_the_title( ); ?>
		</td>
	</tr>
	<tr>			
		<th>Código do produto</th>
		<td>
			<?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?>
		</td>
	</tr>
	
	<?php
	if (get_field('marca')!="") { ?>
	<tr>			
		<th>Fabricante</th>
		<td>
		<?php
			echo get_field( 'marca');?>
		</td>
	</tr>
	<?php } ?>
	<?php
	if (get_field('serie')!="") { ?>
	<tr>			
		<th>Série</th>
		<td>
		<?php
			echo get_field( 'serie');?>
		</td>
	</tr>
	<?php } ?>

	<?php
	if (get_field('escala')!="") { ?>
	<tr>			
		<th>Escala</th>
		<td>
		<?php
			echo get_field( 'escala');
		 ?>
		</td>
	</tr>
	<?php } ?>


	<?php
	if (get_field('conteudo_da_embalagem')!="") { ?>
	<tr>			
		<th>Contém na embalagem</th>
		<td>
		<?php
			echo get_field( 'conteudo_da_embalagem');
		 ?>
		</td>
	</tr>
	<?php } ?>
	

	<?php if ( $product->enable_dimensions_display() ) : ?>

		<?php if ( $product->has_weight() ) : $has_row = true; ?>
			<tr class="<?php if ( ( $alt = $alt * -1 ) === 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Weight', 'woocommerce' ) ?></th>
				<td class="product_weight"><?php echo $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $product->has_dimensions() ) : $has_row = true; ?>
			<tr class="<?php if ( ( $alt = $alt * -1 ) === 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Dimensions', 'woocommerce' ) ?></th>
				<td class="product_dimensions"><?php echo $product->get_dimensions(); ?><span> (comprimento x largura x altura)</span></td>
			</tr>
		<?php endif; ?>

	<?php endif; ?>


	
	<?php
	if (get_field('dimensoes')!="") { ?>
	<tr>			
		<th>Dimensões do produto</th>
		<td>
			<?php echo get_field( 'dimensoes'); ?><span> (comprimento x largura x altura)</span>
		</td>
	</tr>
	<?php } ?>


	<?php foreach ( $attributes as $attribute ) :
		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		} else {
			$has_row = true;
		}
		?>
		<tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
			<th><?php echo wc_attribute_label( $attribute['name'] ); ?></th>
			<td><?php
				if ( $attribute['is_taxonomy'] ) {

					$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				} else {

					// Convert pipes to commas and display values
					$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				}
			?></td>
		</tr>
	<?php endforeach; ?>

</table>
<?php
if ( $has_row ) {
	echo ob_get_clean();
} else {
	ob_end_clean();
}
