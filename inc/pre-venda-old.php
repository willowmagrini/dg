<?php 
// add a product type
add_filter( 'product_type_selector', 'wdm_add_custom_product_type' );
function wdm_add_custom_product_type( $types ){
    $types[ 'pre' ] = __( 'willow Product' );
    return $types;
}
add_action( 'init', 'wdm_create_custom_product_type' );
function wdm_create_custom_product_type(){

     class WC_Product_Wdm extends WC_Product{
        public function __construct( $product ) {

           $this->product_type = 'pre';
           parent::__construct( $product );
           // add additional functions here
        }
    }
}




// add the settings under ‘General’ sub-menu
add_action( 'woocommerce_product_options_general_product_data', 'wdm_add_custom_settings' );
function wdm_add_custom_settings() {

    global $woocommerce, $post;
    print_r(wc_get_product($post));
    echo  '<script>
    jQuery(document).ready(function($) {
        $("#datepicker").datepicker();
    });
</script>';
    echo ' <div class="options_group show_if_willow_prod_2"><div id="datepicker"></div>
    <input type="hidden" name="tipo" value="pre-produto">';

    // Create a number field, for example for UPC
    // woocommerce_wp_text_input(
    //   array(
    //    'id'                => 'dias_envio',
    //    'label'             => __( 'Dias para o envio', 'woocommerce' ),
    //    'placeholder'       => '',
    //    'desc_tip'    => 'true',
    //    'description'       => __( 'Digite o numero de dias ', 'woocommerce' ),
    //    'type'              => 'number'
    //    ));

    // // Create a checkbox for product purchase status
    //   woocommerce_wp_checkbox(
    //    array(
    //    'id'            => 'wdm_is_purchasable',
    //    'label'         => __('Is Purchasable', 'woocommerce' )
    //    ));

    echo '</div>';
}




add_action( 'woocommerce_process_product_meta', 'wdm_save_custom_settings' );
function wdm_save_custom_settings( $post_id ){
// save UPC field
$wdm_product_upc = $_POST['wdm_upc_field'];
if( !empty( $wdm_product_upc ) )
update_post_meta( $post_id, 'wdm_upc_field', esc_attr( $wdm_product_upc) );

// save purchasable option
$wdm_purchasable = isset( $_POST['wdm_is_purchasable'] ) ? 'yes' : 'no';
update_post_meta( $post_id, 'wdm_is_purchasable', $wdm_purchasable );
}

// to use the field values just use get_post_meta, and you are good to go!

add_action('woocommerce_product_options_sku', 'wdm_start_buffer');
add_action('woocommerce_product_options_pricing', 'wdm_end_buffer');

function wdm_start_buffer(){
  ob_start();
}

function wdm_end_buffer(){
  // Get value of buffering so far
  $getContent = ob_get_contents();

 // Stop buffering
 ob_end_clean();

 $getContent = str_replace('show_if_simple', 'show_if_simple  show_if_willow_prod_2', $getContent);
 echo $getContent;
}

/**
 * Load jQuery datepicker.
 *
 * By using the correct hook you don't need to check `is_admin()` first.
 * If jQuery hasn't already been loaded it will be when we request the
 * datepicker script.
 */
function wpse_enqueue_datepicker() {
    // Load the datepicker script (pre-registered in WordPress).
    wp_enqueue_script( 'jquery-ui-datepicker' );

    // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
    wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );  
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_datepicker' );



 ?>