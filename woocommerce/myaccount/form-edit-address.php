<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>			<a class="voltar-conta button" href="../../" >Voltar para Minha conta</a>
<?php 
$page_title   = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );
?>

<?php wc_print_notices(); ?>

<?php if ( ! $load_address ) : ?>

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php else : ?>

	<form method="post">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h3>

		<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

		<?php 
		// print_r($address);

		foreach ( $address as $key => $field ) : ?>
			<?php if ($key=='billing_postcode' OR $key == 'shipping_postcode'): ?>

			<?php elseif ($key=='billing_country'): ?>
				
				<?php 
				$field['class'][0]="form-row-first";
				woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>
				<p class="form-row form-row form-row-last  validate-postcode validate-required" id="" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode"><label for="billing_postcode" class="">CEP <abbr class="required" title="obrigatório">*</abbr></label><input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" autocomplete="postal-code" value="<?php echo $address['billing_postcode']['value'] ?>"></p>

				<?php
					// $address['billing_postcode']['clear'] = 0;
					// $address['billing_postcode']['class'] = '';

					// print_r($address['billing_postcode']);
				 	// woocommerce_form_field( 'billing_postcode', $address['billing_postcode'], ! empty( $_POST[ 'billing_postcode' ] ) ? wc_clean( $_POST[ 'billing_postcode' ] ) : $address['billing_postcode']['value'] ); 
				 ?>
			<?php elseif ($key=='shipping_country'): ?>
				
				<?php 
				$field['class'][0]="form-row-first";
				woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>
				<p class="form-row form-row form-row-last  validate-postcode validate-required" id="shipping_postcode_postcode" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode"><label for="shipping_postcode" class="">CEP <abbr class="required" title="obrigatório">*</abbr></label><input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="" autocomplete="postal-code" value="<?php echo $address['shipping_postcode']['value'] ?>"></p>
				<?php
					// $address['billing_postcode']['clear'] = 0;
					// $address['billing_postcode']['class'] = '';

					// print_r($address['billing_postcode']);
				 	// woocommerce_form_field( 'billing_postcode', $address['billing_postcode'], ! empty( $_POST[ 'billing_postcode' ] ) ? wc_clean( $_POST[ 'billing_postcode' ] ) : $address['billing_postcode']['value'] ); 
				 ?>
			<?php else: ?>
				<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>
			<?php endif ?>	

		<?php endforeach; ?>
		<?php     
				$current_user = wp_get_current_user();

			if (get_user_meta( $current_user->ID, 'date_of_birth', true ) !="") {
				$placeholder =  get_user_meta( $current_user->ID, 'date_of_birth', true );

			}
			else{
				$placeholder =  'dd/mm/aaaa';				
			};
		 ?>
		<p class="form-row form-row my-field-class form-row-first " id="date_of_birth_field">
			<label for="date_of_birth" class="">
				Data de nascimento
			</label>
			<input type="text" class="input-text " name="nascimento" id="nascimento" placeholder="<?php echo $placeholder ?>" value="">
		</p>
		<div class="clear"></div>
		<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

		<p>
			<input type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save Address', 'woocommerce' ); ?>" />
			<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
			<input type="hidden" name="action" value="edit_address" />

		</p>

	</form>

<?php endif; ?>
