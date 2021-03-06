<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
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
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
<?php $user_id = $order->user_id;
$user=get_user_by('id', $user_id ); 
$email=$user->user_email; 
?>
<p>
	<b id="h2">Olá, seu pedido foi liberado!</b>
</p>
<p>
	Recebemos a confirmacão de pagamento da sua operadora bancária. Seu pedido já está sendo preparado!
</p>
<p>
	<b>Esperamos que você tenha uma ótima experiência com seu(s) novo(s) produto(s)!</b>
</p>	
<p>
	Por favor confira abaixo os detalhes de seu pedido.
</p>
	

<?php

/**
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Emails::order_schema_markup() Adds Schema.org markup.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
?>
<div id="dados">
	<?php 
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
 ?>
</div>
<p id="texto-footer">
	Estamos sempre em busca dos melhores e mais interessantes produtos para nossos clientes, trazendo o que há de mais atual nas franquias de cinema, TV, games e quadrinhos. Todos nossos itens são licenciados e oficiais. Para qualquer dúvida ou sugestão, por favor entre em contato.
</p>
<?php 
do_action( 'woocommerce_email_footer', $email );
