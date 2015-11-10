<?php

//add custom post type

function est() {

	$labels = array(
		'name'                => _x( 'est', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'est', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'EST', 'text_domain' ),
		'name_admin_bar'      => __( 'EST', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'est', 'text_domain' ),
		'description'         => __( 'Szablony do EST', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 80,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => false,
		'has_archive'         => true,		
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'est', $args );

}

add_action( 'init', 'est', 0 );

//add shortcode column
add_filter('manage_est_posts_columns', 'est_table_ext');
function est_table_ext( $defaults ) {
    $defaults['shortcode']  = 'shortcode';
    return $defaults;
}

//fill shortcode column
add_action( 'manage_est_posts_custom_column', 'est_table_ext_fill', 10, 2 );

function est_table_ext_fill( $column_name, $post_id ) {
    if ($column_name == 'shortcode') {
    echo '[est id="'.$post_id.'"]';
	}
}
?>