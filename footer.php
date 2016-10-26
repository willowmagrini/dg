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
		<?php 
			// echo do_shortcode( '[contact-form-7 id="116" title="cadastro" class=inline-block]' );
			echo do_shortcode( '[contact-form-7 id="174"  class=inline-block]' );?>
		</div>
	</div>
	<footer id="footer" role="contentinfo">
		<div  class="row">
			<div class="col-sm-3">
				<h2>DEEP GEEK</h2>
				<p>Uma empresa do grupo SUPE
				<br>Rua Estevão Lopes, 49 - Butantã
				<br>São Paulo, SP, Brasil</p>
				<h3 id="fale">FALE CONOSCO:</h3>
				<p>Whats App (11) 9 8152 2479
				<br>Tel. (11)3097 8443
				<br><a class="email-footer" href="mailto:atendimento@deepgeek.com.br">atendimento@deepgeek.com.br</a>
				</p>
				<p>STARTUP E COMMERCE COMERCIAL LTDA - ME<br> CNPJ. 22.968.470/0001-86</p>
				<div id="logos-footer">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pay.png" alt="">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pag.png" alt="">
				</div>
						<div class="clearfix"></div>

			</div>
			<div class="col-sm-3">
				<h3>SOBRE NÓS</h3>
				<p>
					<?php 
					$page = get_page_by_title( 'sobre nos' );
					echo $page->post_excerpt; 
					?>
				</p>
					<?php $odin_general_opts = get_option( 'odin_general' );?>
				<p>Conheça nossas redes sociais</p>
				<div class="sociais">
					<?php if ($odin_general_opts['facebook'] != ''){?>
						<a target="_blank" href="<?php echo $odin_general_opts['facebook'] ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/face.png" alt="">
						</a>
					<?php }?>
					<?php if ($odin_general_opts['twitter'] != ''){?>
						<a target="_blank" href="<?php echo $odin_general_opts['twitter'] ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png" alt="">
						</a>
					<?php }?>
					<?php if ($odin_general_opts['instagram'] != ''){?>
						<a target="_blank" href="<?php echo $odin_general_opts['instagram'] ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="">
						</a>
					<?php }?>
					<?php if ($odin_general_opts['pinterest'] != ''){?>
						<a target="_blank" href="<?php echo $odin_general_opts['pinterest'] ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pinterest.png" alt="">
						</a>
					<?php }?>
				
				</div>
						<div class="clearfix"></div>

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
			<div class="clearfix"></div>

			</div>
			<div id="contato-footer"class="col-sm-3">
				<h3>CONTATE-NOS</h3>
				<p>
					<?php
					// echo do_shortcode( '[contact-form-7 id="45" title="Footer"]' );
					echo do_shortcode( '[contact-form-7 id="173" title="Footer"]' );

					?>


				</p>
						<div class="clearfix"></div>

			</div>
		<div class="clearfix"></div>
			<div class=" rodape ">
				<p>&copy; 2015  SUPE - startup e commerce comercial.</p>
			</div><!-- .container -->
		</div>

		<div class="clearfix"></div>
		
		
	</footer><!-- #footer -->
	<div id="fundo-modal">	<img id="ajax-loader" style="display:none" src="<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif">
	</div>
	<div class="clearfix"></div>

	<div id="modal-conteudo">
		<a href="#">
			<div style="display:none" id="botao-fechar">x</div>
		</a>
		<div class="animated fadeIn" id="html">
			<?php 
			
			if (is_user_logged_in()) {
				$user=wp_get_current_user(); 
				?>
				<div class="aviso-encomenda" >
					<h2>Produto Esgotado</h2>
					<p>Você sera notificado no e-mail <?php echo $user->user_email ?> quando o produto <a id="encomendaNome"></a> entrar no estoque.
				</div>
				<?php 
				
			}
			else{
				?>
			<div class="encomenda-form wpcf7">
				<h2>Entre ou cadastre-se:</h2>
				<form id="wp_login_form" class="form-login-esgotado"action="" method="post">  
					<input id='email' placeholder="E-mail" type="text" name="username" class="text" value="">
					<input id='senha' placeholder="Senha" type="password" name="password" class="text" value="">  
					<input class="button login" type="submit" id="submitbtn" name="submit" value="Login">
					<input type="hidden" name="checkout-url" id="checkout-url"value='<?php echo esc_url( wc_get_checkout_url() ) ?>' >  
				</form>  

			</div>

		<?php 
				}
		?>
			<?php 
				// echo do_shortcode('[contact-form-7 id="182" title="Encomenda"]' ); 
				// echo do_shortcode('[contact-form-7 id="284" title="Encomenda"]' ); 

			?>
		</div>		
		<div class="clearfix"></div>
	</div>
	<div id="modal-conteudo-2">
		<a href="#">
			<div style="display:none" id="botao-fechar-2"></div>
		</a>
		<div class="animated fadeIn" id="html">
			<div class="popup">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/deepgeek.png" alt="">
				<h4>CADASTRE-SE PARA RECEBER NOSSAS <b>NOVIDADES</b> E<b> PROMOÇÕES</b></h4>	
				<?php 
					// echo do_shortcode('[contact-form-7 id="182" title="Encomenda"]' ); 
					// echo do_shortcode('[contact-form-7 id="116" title="cadastro"]' ); 
					echo do_shortcode('[contact-form-7 id="174" title="newsletter"]' ); 
				?>
				
				<p>USE O <b>CUPOM</b></p>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/DG20.png" alt=""/>	
				<h5>E GANHE <b>20% DE DESCONTO</b> NA PRIMEIRA COMPRA</h5>
					
			</div>

		</div>		
		<div class="clearfix"></div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>
