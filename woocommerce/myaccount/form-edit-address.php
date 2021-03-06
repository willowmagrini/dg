<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>

	<form method="post">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h3>

		<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

		<?php foreach ( $address as $key => $field ) : ?>

			<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>

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
		<?php     

			if (get_user_meta( $current_user->ID, 'sexo', true ) !="") {
				$sexo =  get_user_meta( $current_user->ID, 'sexo', true );

			}
			else{
				$sexo =  'Sexo';				
			};
		 ?>
		<p class="form-row form-row my-field-class form-row-last " id="sexo_field">
			<label for="sexo" class="">
				Sexo
			</label>
			<input type="text" class="input-text " name="sexo" id="sexo" placeholder="<?php echo $sexo ?>" value="">
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

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
			<a class="voltar-conta button" href="../../" >Ir para Minha conta</a>