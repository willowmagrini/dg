<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script async defer src="//assets.pinterest.com/js/pinit.js"></script>


</head>
<?php if (is_search()) {
	$classe="archive post-type-archive-product  woocommerce";
}
else{
	$classe="";
} ?>

<body <?php body_class($classe); ?>>
	<a id="skippy" class="sr-only sr-only-focusable" href="#content">
		<div class="container">
			<span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span>
		</div>
	</a>

	<header id="header" role="banner">
		<div id="top-navigation" class="navbar navbar-default col-sm-12">
			<nav class=" " role="navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-topo',
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav',
							'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
							'walker'         => new Odin_Bootstrap_Nav_Walker()
						)
					);
				?>
			
			

			</nav><!-- .navbar-collapse -->

		</div>
		<div class="container">
			<div class="logo  col-sm-3">
				<?php
					$header_image = get_header_image();
					if ( ! empty( $header_image ) ) :
				?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
					</a>
				<?php endif; ?>
			</div><!-- .site-header-->

			<div id="main-navigation" class="navbar navbar-default col-sm-9">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
					<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand visible-xs-block" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</div>
				<nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
					<form method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
						<label for="navbar-search" class="sr-only">
							<?php _e( 'Search:', 'odin' ); ?>
						</label>
						<div class="form-group">
							<input placeholder="busca"type="search" class="form-control" name="s" id="navbar-search" />
							<!-- <input type="hidden" name="post_type" value="product"> -->
						</div>
						<button type="submit" class="busca btn btn-default">	
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/lupa.png" alt="">
						</button>
					</form>
				</nav><!-- .navbar-collapse -->
			</div><!-- #main-navigation-->

		</div><!-- .container-->
	</header><!-- #header -->

	<div id="wrapper" class="container">
