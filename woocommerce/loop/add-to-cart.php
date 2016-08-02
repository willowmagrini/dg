<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.
global $product;
?>

<?php if ( ! $product->is_in_stock() ) : ?>

    <a href="<?php echo apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ); ?>" class="button"><?php echo apply_filters( 'out_of_stock_add_to_cart_text', __( 'Read more', 'woocommerce' ) ); ?></a>

<?php else : ?>

    <?php
        $link = array(
            'url'   => '',
            'label' => '',
            'class' => ''
        );
        switch ( $product->product_type ) {
            case "variable" :
                $link['url']    = apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
                $link['label']  = apply_filters( 'variable_add_to_cart_text', __( 'Select options', 'woocommerce' ) );
            break;
            case "grouped" :
                $link['url']    = apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
                $link['label']  = apply_filters( 'grouped_add_to_cart_text', __( 'View options', 'woocommerce' ) );
            break;
            case "external" :
                $link['url']    = apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
                $link['label']  = apply_filters( 'external_add_to_cart_text', __( 'Read More', 'woocommerce' ) );
            break;
            default :
                if ( $product->is_purchasable() ) {
                    $link['url']    = apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
                    $link['label']  = apply_filters( 'add_to_cart_text', __( 'Add to cart', 'woocommerce' ) );
                    $link['class']  = apply_filters( 'add_to_cart_class', 'add_to_cart_button' );
                } else {
                    $link['url']    = apply_filters( 'not_purchasable_url', get_permalink( $product->id ) );
                    $link['label']  = apply_filters( 'not_purchasable_text', __( 'Read More', 'woocommerce' ) );
                }
            break;
        }
        // If there is a simple product.
        if ( $product->product_type == 'simple' ) {
            ?>
            <form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype="multipart/form-data">
                <?php
                    // Displays the quantity box.
                    woocommerce_quantity_input(
                        array(
                            'max_value'=>$product->get_stock_quantity(),
                            'min_value'=>1
                        ));
                    // Display the submit button.
                    echo sprintf( '<button type="submit" data-product_id="%s" data-product_sku="%s" data-quantity="1" class="%s button product_type_simple">%s</button>', esc_attr( $product->id ), esc_attr( $product->get_sku() ), esc_attr( $link['class'] ), esc_html( $link['label'] ) );
                ?>
            </form>
            <?php
        } else {
          echo apply_filters( 'woocommerce_loop_add_to_cart_link', sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s button product_type_%s">%s</a>', esc_url( $link['url'] ), esc_attr( $product->id ), esc_attr( $product->get_sku() ), esc_attr( $link['class'] ), esc_attr( $product->product_type ), esc_html( $link['label'] ) ), $product, $link );
        }
    ?>

<?php endif; ?>