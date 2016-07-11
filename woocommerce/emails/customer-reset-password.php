<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
<p>
	<b id="h2">
		Redefinição de senha.
	</b>
</p>
<p>
	Para redefinir sua senha acesse o link: 
	 <a class="azul" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>">
			<?php _e( 'REDEFINIR SENHA', 'woocommerce' ); ?></a>
</p>
<p>
	Se isso foi um engano, apenas ignore este e-mail e nada acontecerá.
</p>
<p id="texto-footer">
	Consideramos as informações pessoais de nossos clientes e visitantes muito importantes e exatamente por isso garantimos a privacidade de toda e qualquer informação submetida no site através de métodos de segurançaa aplicados em nossa plataforma.
</p>
<?php do_action( 'woocommerce_email_footer', $email ); ?>
