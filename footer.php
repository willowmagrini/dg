<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

		</div><!-- .row -->
	</div><!-- #wrapper -->

	<footer id="footer" role="contentinfo">
		<div  class="row">
			<div class="col-sm-3">
				<h2>DEEP GEEK</h2>
				<p>R. Estavão Lopes, 49 - Butantã</p>
				<p>São Paulo, SP, Brasil</p>
				<h3 id="fale">Fale conosco:</h3>
				<p>Whats App (11) 9 8757 3800 Tel. (11)3097 8443</p>
				<p>Tel. (11)3097 8443</p>
			</div>
			<div class="col-sm-3">
				<h3>Sobre nós</h3>
				<p>
					<?php 
					$page = get_page_by_title( 'sobre nos' );
					echo $page->post_excerpt; 
					?>
				</p>
				<p>Conheça nossas redes sociais</p>
				<div class="sociais">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/face.png" alt="">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png" alt="">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pinterest.png" alt="">
				</div>
			</div>
			<div class="col-sm-3">
				<h3>Suporte</h3>
				<?php
					wp_nav_menu(array('theme_location' => 'menu-footer',));
				?>
				<h3>Minha Conta</h3>
				<?php 
					wp_nav_menu(array('theme_location' => 'menu-footer-2',));
				?>

			</div>
			<div class="col-sm-3">
				<h3>Contate-nos</h3>
				<p>
					<?php
					echo do_shortcode( '[contact-form-7 id="45" title="Footer"]' );;

					?>
				</p>
			</div>

		</div>
		<div class="container">
			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'odin' ); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Odin</a> forces and <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'odin' ), 'http://wpod.in/', 'http://wordpress.org/' ); ?></p>
		</div><!-- .container -->
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
