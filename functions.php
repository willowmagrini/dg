<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
// require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
// require_once get_template_directory() . '/core/classes/class-post-status.php';
// require_once get_template_directory() . '/core/classes/class-term-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since 2.2.0
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since 2.2.0
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since 2.2.0
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();
	wp_enqueue_style( 'odin-custom-style', $template_url . '/assets/css/custom.css', array(), null, 'all' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:700,400,300|Roboto:400,700,300', array(), null, 'all' );

	wp_enqueue_script( 'owl-js',$template_url .'/inc/owl-carousel/owl-carousel/owl.carousel.js', array(), null, true );
	wp_enqueue_style( 'owl-style', $template_url .'/inc/owl-carousel/owl-carousel/owl.carousel.css', array(), null, 'all' );
	wp_enqueue_style( 'owl-theme', $template_url .'/inc/owl-carousel/owl-carousel/owl.theme.css', array(), null, 'all' );

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// General scripts.
		// Bootstrap.
		wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

		// FitVids.
		wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

		// Main jQuery.
		wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );


	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';
/**
*custom post types
*/
require_once get_template_directory() . '/inc/custom-post.php';
/**
*custom fields
*/
require_once get_template_directory() . '/inc/custom-fields.php';


/**
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}
function menu() {
  register_nav_menu('menu-topo',__( 'Menu Topo' ));
  register_nav_menu('menu-categorias',__( 'Menu Categorias' ));
  register_nav_menu('menu-footer',__( 'Menu Footer Suporte' ));
  register_nav_menu('menu-footer-2',__( 'Menu Footer Minha' ));

}

add_action( 'init', 'menu' );
add_action('init', 'add_excerpt_pages');
function add_excerpt_pages() {
add_post_type_support( 'page', 'excerpt' );
}
add_image_size( 'slider-1', 1200, 557, array( 'left', 'top' ) ); // Hard crop left top
add_image_size( 'slider-2', 642, 400, array( 'left', 'top' ) ); // Hard crop left top
add_image_size( 'slider-3', 1200, 557, array( 'left', 'top' ) ); // Hard crop left top



///////add to cart
function cs_wc_loop_add_to_cart_scripts() {
    if ( is_shop() || is_product_category() || is_product_tag() || is_product()  || is_home() ): ?>

<script>
    jQuery( document ).ready( function( $ ) {
        $( document ).on( 'change', '.quantity .qty', function() {
            $( this ).parent( '.quantity' ).next( '.add_to_cart_button' ).attr( 'data-quantity', $( this ).val() );
        });
    });
</script>

    <?php endif;
}
add_action( 'wp_footer', 'cs_wc_loop_add_to_cart_scripts' );

///adiciona no menu///
add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    if ( $args->theme_location == 'menu-topo') {
        $items .= "<li class='menu-item menu-item-type-post_type menu-item-object-page carrinho-menu'>
			<div class='inline-block carrinho-link'><a class='inline-block cart-contents' href='".WC()->cart->get_cart_url()."'>
			<img src='".get_template_directory_uri()."/assets/images/carrinho.png' alt=''></a></div>
			<div class='inline-block carrinho-cont'>". WC()->cart->get_cart_contents_count() ."</div> <div class='inline-block carrinho-valor' ".WC()->cart->get_cart_total()."</li>";
    }

    return $items;
}	


/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box( 'customizador', __( 'Customização do texto', 'textdomain' ), 'wpdocs_my_display_callback', 'slide' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function wpdocs_my_display_callback( $post ) {



	$terms = wp_get_post_terms( $post->ID, 'slider' ); 
	$slider=$terms[0]->slug;
	

	?>
<style>
#acf-tamanho_da_fonte_do_titulo,#acf-cor_da_fonte_do_titulo, #acf-tamanho_da_fonte_do_texto, #acf-cor_do_texto, #acf-preco{
	display:inline-block;
	margin:0 20px;
}
#edit-slug-box{
	display:none;
}
#acf-tamanho_da_fonte_do_titulo, #acf-tamanho_da_fonte_do_texto {
	text-align: center;
}
#acf-tamanho_da_fonte_do_titulo input, #acf-tamanho_da_fonte_do_texto input{
	width:40px;

}
	#customizador{
		overflow:scroll;
}
	#customizador img{
		width:initial;
		height: initial;
}
#dummyId div{
	line-height: initial;

}
</style>	
	<!-- <img src="<?php echo get_template_directory_uri();?>/inc/imagem.php" width="200" height="80"> -->

	<div style="position:relative">
		<div style="position:relative;z-index:9"></div>
<?php
			echo get_the_post_thumbnail($post->ID, $slider,  array( 'id' => 'thumb-canvas' ));
		?>
		<canvas id="canvas"  style="position:absolute;top:0;z-index:999;left:0;background:transparent;text-align:center;"> -->
			This text is displayed if your browser does not support HTML5 Canvas.

		</canvas>
		
		<div id="dummyId">
			

		</div>
		

	</div>
	<div id="log"></div>
</section>

	<?php
    // Display code/markup goes here. Don't forget to include nonces!
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
}
add_action( 'save_post', 'wpdocs_save_meta_box' );


function myposttype_admin_js($hook_suffix) {

		global $typenow; if ($typenow=="slide") {

			echo '<script type="text/javascript">
			jQuery(document).ready(function($) {
var canvas;
var ctx;
var x = 50;
var y = 50;
var dx = 5;
var dy = 3;

var determineFontHeight = function(fontStyle) {
  var body = document.getElementById("dummyId");
  var dummy = document.createElement("div");

  var dummyText = document.createTextNode("M");
  dummy.appendChild(dummyText);

  dummy.setAttribute("style", fontStyle);
	dummy.className="dummyclass";
  	body.appendChild(dummy);
  var result = dummy.clientHeight;
  body.removeChild(dummy);

  return result;
};
 tam_tit = document.getElementById("acf-field-tamanho_da_fonte_do_titulo").value;
cor_tit = document.getElementById("acf-field-cor_da_fonte_do_titulo").value;
tam_txt = document.getElementById("acf-field-tamanho_da_fonte_do_texto").value;
cor_txt = document.getElementById("acf-field-cor_do_texto").value;
 console.log( tam_tit )
 console.log( cor_tit )
 console.log( tam_txt )
 console.log( cor_txt )
var style = "font-family: Roboto; font-size: " + tam_tit + ";";
var pixelHeight = determineFontHeight(style);
	var dragok = false,
	 tit1 = document.getElementById("acf-field-titulo_linha_1"),
  	canvas = document.getElementById("canvas");
text1=tit1.value;
console.log("text1:"+text1)
thumb = document.getElementById("thumb-canvas");
console.log(WIDTH);
var WIDTH = thumb.offsetWidth;
console.log(WIDTH);

var HEIGHT = thumb.height;
canvas.width=WIDTH;
canvas.height=HEIGHT;
var bodyRectY = document.body.getBoundingClientRect(),
    elemRectY = canvas.getBoundingClientRect(),
    offsetY   = elemRectY.top - bodyRectY.top + +40;

var bodyRectX = document.body.getBoundingClientRect(),
    elemRectX = canvas.getBoundingClientRect(),
    offsetX   = elemRectX.left - bodyRectX.left ;

function rect(x,y,w,h) {
 ctx.font = tam_tit+"px Roboto";
 ctx.fillText(text1, x, y);
}

function clear() {
 ctx.clearRect(0, 0, WIDTH, HEIGHT);
}

function init() {
 canvas = document.getElementById("canvas");
 ctx = canvas.getContext("2d");
 return setInterval(draw, 10);
}

function draw() {
 clear();
 ctx.fillStyle = "#FAF7F8";
 ctx.fillStyle = cor_tit;
 textLength = ctx.measureText(text1); // TextMetrics object
 textLength = textLength.width
    
 
 rect(x - 15, y + 15, textLength, 30);

}



	 

function myMove(e){

 if (dragok){
  x = e.pageX - offsetX -textLength/2;
  y = e.pageY - offsetY-pixelHeight/2;
 }
}

function myDown(e){
jQuery( "#log" ).html( 
  	"e.pageY: "+e.pageY+
  	"<br>y:"+ y+
	"<br>canvas.offsetTop:"+canvas.offsetTop +
	"<br>pageY: " + event.pageY+
	"<br>offsetY: " + offsetY+
	"<br>canvas.scrollLeft: " + canvas.scrollLeft+


	"<br>e.pageY< y + 15 + offsetY"+
  	 "<br>"+e.pageY +"<"+ y + " + " + 15 +" + "+ offsetY+

	"<br>e.pageY> y - 15 + offsetY"+
  	 "<br>"+e.pageY +">"+ y + " - " + 15 +" + " + offsetY+

  	"<br><br>e.pageX: "+e.pageX+
  	"<br>x:"+ x+
  	"<br>canvas.offsetLeft:"+canvas.offsetLeft +
	"<br>offsetX: " + offsetX+

  	"<br>pageX: " + event.pageX+
  	"<br>e.pageX < x + textLength + offsetX"+
  	"<br>"+ e.pageX +" < "+ textLength + " + " + 15 + " + " + offsetX+

  	"<br>e.pageX > x - 15 + offsetX" +
  	"<br>"+ e.pageX +" > "+ x + " - " + 15 + " + " + offsetX);



 if (
 	e.pageX < x + textLength + offsetX &&
  	e.pageX > x - textLength + offsetX &&
   	e.pageY < y + pixelHeight + offsetY &&
	e.pageY > y - pixelHeight + offsetY){
  x = (e.pageX - offsetX) - textLength/2;
  y = (e.pageY - offsetY) - pixelHeight/2;
  dragok = true;
  canvas.onmousemove = myMove;
 }
}

function myUp(){
 dragok = false;
 canvas.onmousemove = null;
}

init();
canvas.onmousedown = myDown;
canvas.onmouseup = myUp;

});
</script>';		


		}

	}

	add_action('admin_print_footer_scripts', 'myposttype_admin_js');