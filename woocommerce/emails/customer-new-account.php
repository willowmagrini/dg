<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
<?php $user_id = $order->user_id;
$user=get_user_by('login', $user_login ); 
$email=$user->user_email; 
?>
<p>
	<b id="h2">
		Bem vindo a DeepgeeK!
	</b>
</p>
<p>
	Sua conta foi criada com sucesso. Seu usuário é <a class="azul" href="mailto:<?php echo esc_html( $email ); ?>"><?php echo esc_html( $email ); ?></a>
</p>
<p>
	Utilize o cupon <span class="vermelho">DG20%OFF</span> e ganhe <b>20% de desconto</b> em sua primeira compra <span class="vermelho">*</span>. 
</p>
<p>
	<b>
		Acesse o link abaixo para ver seus pedidos e gerenciar suas informações.
	</b>
	<a class="azul" href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">MINHA CONTA</a>
</p>

<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>

	<p><?php printf( __( "Your password has been automatically generated: <strong>%s</strong>", 'woocommerce' ), esc_html( $user_pass ) ); ?></p>

<?php endif; ?>

<p id="texto-footer">
	Consideramos as informações pessoais de nossos clientes e visitantes muito importantes e exatamente por isso garantimos a privacidade de toda e qualquer informação submetida no site através de métodos de segurançaa aplicados em nossa plataforma.
</p>
<?php $url = site_url();
 ?>
<p><span class="vermelho">*</span>Desconto não cumulativo, vale apenas para a primeira compra realizada no site <a class="azul" href="<?php echo $url; ?>"> DEEPGEEK.COM.BR</a></p>
<?php do_action( 'woocommerce_email_footer', $email ); ?>
