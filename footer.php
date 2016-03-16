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

	</div><!-- #wrapper -->
	<div id="cadastro-footer" class="">
		<div>
			<h3 class="inline-block">cadastre-se para receber nossas <span>novidades</span> e <span>promoções</span></h3> 
		<?php echo do_shortcode( '[contact-form-7 id="116" title="cadastro" class=inline-block]' );?>
		</div>
	</div>
	<footer id="footer" role="contentinfo">
		<div  class="row">
			<div class="col-sm-3">
				<h2>DEEP GEEK</h2>
				<p>Uma empresa do grupo SUPE
				<br>R. Estavão Lopes, 49 - Butantã
				<br>São Paulo, SP, Brasil</p>
				<h3 id="fale">FALE CONOSCO:</h3>
				<p>Whats App (11) 9 8757 3800 
				<br>Tel. (11)3097 8443</p>
				<p>STARTUP E COMMERCE COMERCIAL LTDA - ME<br> CNPJ. 22.968.470/0001-86</p>
				<div id="logos-footer">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pay.png" alt="">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pag.png" alt="">
				</div>
			</div>
			<div class="col-sm-3">
				<h3>SOBRE NÓS</h3>
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
				<div class="menus-footer">
					<h3>SUPORTE</h3>
					<?php
						wp_nav_menu(array('theme_location' => 'menu-footer',));
					?>
				</div>
				<div class="menus-footer">
					<h3>MINHA CONTA</h3>
					<?php 
						wp_nav_menu(array('theme_location' => 'menu-footer-2',));
					?>
				</div>

			</div>
			<div id="contato-footer"class="col-sm-3">
				<h3>CONTATE-NOS</h3>
				<p>
					<?php
					echo do_shortcode( '[contact-form-7 id="45" title="Footer"]' );;

					?>
				</p>
			</div>

		</div>
		<div class=" rodape container">
			<p>&copy; 2015  SUPE - startup e commerce comercial.</p>
		</div><!-- .container -->
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
