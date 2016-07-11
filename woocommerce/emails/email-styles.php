<?php
/**
 * Email Styles
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-styles.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load colours
$bg              = get_option( 'woocommerce_email_background_color' );
$body            = get_option( 'woocommerce_email_body_background_color' );
$base            = get_option( 'woocommerce_email_base_color' );
$base_text       = wc_light_or_dark( $base, '#202020', '#ffffff' );
$text            = get_option( 'woocommerce_email_text_color' );

$bg_darker_10    = wc_hex_darker( $bg, 10 );
$body_darker_10  = wc_hex_darker( $body, 10 );
$base_lighter_20 = wc_hex_lighter( $base, 20 );
$base_lighter_40 = wc_hex_lighter( $base, 40 );
$text_lighter_20 = wc_hex_lighter( $text, 20 );

// !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
?>
#wrapper {
    background-color: <?php echo esc_attr( $bg ); ?>;
    margin: 0;
    padding: 70px 0 70px 0;
    -webkit-text-size-adjust: none !important;
    width: 100%;
}

#template_container {
    box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important;
    background-color: <?php echo esc_attr( $body ); ?>;
    border: 1px solid <?php echo esc_attr( $bg_darker_10 ); ?>;
    border-radius: 0 !important;
}

#template_header {
    background-color: <?php echo esc_attr( $base ); ?>;
    border-radius: 0 !important;
    color: <?php echo esc_attr( $base_text ); ?>;
    border-bottom: 0;
    font-weight: bold;
    line-height: 100%;
    vertical-align: middle;
    font-family: Roboto, Arial, sans-serif;
}
#tit{
    text-align:center;
}
#template_header h1 {
    color: #FCEA0D;
}

#template_footer td {
    padding: 0;
    -webkit-border-radius: 0;
}

#template_footer #credit {
    border:0;
    color: <?php echo esc_attr( $base_lighter_40 ); ?>;
    font-family: Arial;
    font-size:12px;
    line-height:125%;
    text-align:center;
    padding: 0 48px 48px 48px;
}

#body_content {
    background-color: <?php echo esc_attr( $body ); ?>;
}

#body_content table td {
    padding: 48px;
}

#body_content table td td {
    padding: 12px;
}

#body_content table td th {
    padding: 12px;
}

#body_content p {
    margin: 0 0 16px;
}

#body_content_inner {
    color: <?php echo esc_attr( $text_lighter_20 ); ?>;
    font-family: Roboto, Arial, sans-serif;
    font-size: 14px;
    line-height: 150%;
    text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

.td {
    color: <?php echo esc_attr( $text_lighter_20 ); ?>;
    border: 1px solid <?php echo esc_attr( $body_darker_10 ); ?>;
}

.text {
    color: <?php echo esc_attr( $text ); ?>;
    font-family: Roboto, Arial, sans-serif;
}

.link {
    color: <?php echo esc_attr( $base ); ?>;
}

#header_wrapper {
    padding: 36px 48px;
    display: block;
}

h1 {
    letter-spacing: 5px;
    color: #FCEA0D;
    font-family: Roboto, Arial, sans-serif;
    font-size: 44px;
    font-weight: 700;
    line-height: 150%;
    margin: 0;
    text-align: center;
    text-shadow: 0 1px 0 <?php echo esc_attr( $base_lighter_20 ); ?>;
    -webkit-font-smoothing: antialiased;
}
#atendimento{
    background-color:#20B8D4;
   
}
#atendimento a:hover{
    color:#fff!important;
    text-decoration:none;
}
#atendimento a, .ii a[href]{
    font-weight: bold;

    color:#fff!important;
    text-decoration:none;
}
#footerbaixo h6{
    margin:10px;
    font-size:10px;
    color:#e5332a;
}
#footerbaixo{
    background-color:#FCEA0D;

}
#atendimento h3{
     color:#fff;
     margin: 11px 0 8px;

 }
#atendimento h3, #deepfooter h2, #footerbaixo h6{
    text-align:center;
}
#deepfooter h2{{
    color:#FCEA0D;
        font-size: 25px;

}
h2 {background-color:#20b8d4;
    padding:5px;
    text-transform:uppercase;
    color: #fff;
    display: inline-block;
    font-family: Roboto, Arial, sans-serif;
    font-size: 18px;
    font-weight: bold;
    line-height: 130%;
    margin: 16px 0 8px;
    text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}
th{
    text-transform:uppercase;
}
tfoot td span{
    font-weight:bold;
}
#deepfooter h2{
    background:transparent;
    display:block; 
    letter-spacing: 3px;

}
#texto-footer{
    
    line-height:1.3;
}
#h2{
    font-size:27px;
}
.vermelho{
    color:#e5332a;
    font-weight:bold;
}
.azul{
    color:#20B8D4;   
}
#dados h2{
    display:block;
    background:#e5332a;
    color:#fff;
    text-align:center;   
}
#dados h3{
    background-color:#20b8d4;
    color:#fff;
    padding:5px;
    text-transform:uppercase;
}
h3 {
    color: <?php echo esc_attr( $base ); ?>;
    display: block;
    font-family: Roboto, Arial, sans-serif;
    font-size: 16px;
    font-weight: bold;
    line-height: 130%;
    text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

a {
    color: <?php echo esc_attr( $base ); ?>;
    font-weight: normal;
    text-decoration: underline;
}

img {
    border: none;
    display: inline;
    font-size: 14px;
    font-weight: bold;
    height: auto;
    line-height: 100%;
    outline: none;
    text-decoration: none;
    text-transform: capitalize;
}
<?php
