<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<aside id="sidebar" class="col-sm-3" role="complementary">
	<?php
		wp_nav_menu(array('theme_location' => 'menu-categorias',));
	?>
</aside><!-- #sidebar -->
