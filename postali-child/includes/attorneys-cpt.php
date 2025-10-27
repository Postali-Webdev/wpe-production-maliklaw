<?php
/**
 * Custom Attorneys Custom Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function create_custom_post_type_attorneys() {

// set up labels
    $labels = array(
        'name' => 'Attorneys',
        'singular_name' => 'Attorney',
        'add_new' => 'Add New Attorney',
        'add_new_item' => 'Add New Attorney',
        'edit_item' => 'Edit Attorney',
        'new_item' => 'New Attorney',
        'all_items' => 'All Attorneys',
        'view_item' => 'View Attorneys',
        'search_items' => 'Search Attorneys',
        'not_found' =>  'No Attorneys Found',
        'not_found_in_trash' => 'No Attorneys found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Attorneys',

    );
    //register post type
    register_post_type( 'Attorneys', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-businessman',
        'has_archive' => false,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => '/'),
        'rewrite' => array( 'slug' => 'about', 'with_front' => false ), // Has /about/ as pre front for the theme, if there are more then attorneys to be listed under here this need removed
        )
    );

}
add_action( 'init', 'create_custom_post_type_attorneys' );

function register_attorney_role() {
     // Add new taxonomy, make it hierarchical (like categories)
     $labels = [
        'name'              => _x( 'Roles', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Role', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Roles', 'textdomain' ),
        'all_items'         => __( 'All Roles', 'textdomain' ),
        'view_item'         => __( 'View Role', 'textdomain' ),
        'parent_item'       => __( 'Parent Role', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Role:', 'textdomain' ),
        'edit_item'         => __( 'Edit Role', 'textdomain' ),
        'update_item'       => __( 'Update Role', 'textdomain' ),
        'add_new_item'      => __( 'Add New Role', 'textdomain' ),
        'new_item_name'     => __( 'New Role Name', 'textdomain' ),
        'not_found'         => __( 'No Roles Found', 'textdomain' ),
        'back_to_items'     => __( 'Back to Roles', 'textdomain' ),
        'menu_name'         => __( 'Role', 'textdomain' ),
    ];
    $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'role' ),
    ];
    register_taxonomy( 'role', [ 'attorneys' ], $args );
}
add_action( 'init', 'register_attorney_role', 0 );