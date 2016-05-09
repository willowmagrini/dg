<?php 
							if( get_post_type( ) == "product"){

								wc_get_template_part( 'content', 'prod-lista' );	
							}
						 	else{
						 		// $paginas .="
						 		// <article>".
						 		// 	"<a href='".get_permalink( ).">
									// 	<h1>".get_the_title( )."</h1>
						 		// 	</a>
						 		// </article>";
						 		$paginas .="
						 		<article>
						 			<a href='".get_permalink( )."'>
						 				<h1>".get_the_title( )."</h1>
						 			</a>
						 		</article>";
						 		echo $paginas;
						 	}
						  ?>