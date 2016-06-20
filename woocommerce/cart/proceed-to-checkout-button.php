<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<button href="http://rede.com.br/deepgeek/teste-de-login/" class="checkout-button cliente button alt wc-forward">
	<?php echo __( 'Já sou cliente', 'woocommerce' ); ?>

</button>
<a href="<?php echo esc_url( wc_get_checkout_url() ) ;?>" class="checkout-button estranho button alt wc-forward">
	<?php echo __( 'Não sou cliente', 'woocommerce' ); ?>

</a>
<a href="<?php echo esc_url( wc_get_checkout_url() ) ;?>" class="checkout-button comprar button alt wc-forward">
	<?php echo __( 'Comprar', 'woocommerce' ); ?>

</a>
<form id="wp_login_form" class="form-login-carrinho"action="" method="post">  
	<input id='email' placeholder="E-mail" type="text" name="username" class="text" value="">
	<input id='senha' placeholder="Senha" type="password" name="password" class="text" value="">  
	<input class="button login" type="submit" id="submitbtn" name="submit" value="Login">
	<input type="hidden" name="checkout-url" id="checkout-url"value='<?php echo esc_url( wc_get_checkout_url() ) ?>' >  
</form>  
<div id="resultado-login"></div> <!-- To hold validation results -->  

	<div class="clearfix"></div>
