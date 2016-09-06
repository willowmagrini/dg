<?php
/**
* Retrieve a page given its slug.
*
* @global wpdb $wpdb WordPress database abstraction object.
*
* @param string       $page_slug  Page slug
* @param string       $output     Optional. Output type. OBJECT, ARRAY_N, or ARRAY_A.
*                                 Default OBJECT.
* @param string|array $post_type  Optional. Post type or array of post types. Default 'page'.
* @return WP_Post|null WP_Post on success or null on failure
*/
function get_page_by_slug( $page_slug, $output = OBJECT, $post_type = 'page' ) {
	global $wpdb;

	if ( is_array( $post_type ) ) {
		$post_type = esc_sql( $post_type );
		$post_type_in_string = "'" . implode( "','", $post_type ) . "'";
		$sql = $wpdb->prepare( "
			SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type IN ($post_type_in_string)
		", $page_slug );
	} else {
		$sql = $wpdb->prepare( "
			SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type = %s
		", $page_slug, $post_type );
	}

	$page = $wpdb->get_var( $sql );

	if ( $page )
		return get_post( $page, $output );

	return null;
}
?>