<?php
/**
 * Custom Case Results Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_results() {

// set up labels
    $labels = array(
        'name' => 'Results',
        'singular_name' => 'Result',
        'add_new' => 'Add New Case Result',
        'add_new_item' => 'Add New Case Result',
        'edit_item' => 'Edit Results',
        'new_item' => 'New Results',
        'all_items' => 'All Results',
        'view_item' => 'View Results',
        'search_items' => 'Search Case Results',
        'not_found' =>  'No Results Found',
        'not_found_in_trash' => 'No Results found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Case Results',

    );
    //register post type
    register_post_type( 'Results', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-analytics',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'case-results', 'with_front' => false ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        )
    );

}
add_action( 'init', 'create_custom_post_type_results' );

function register_results_category() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = [
       'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
       'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
       'search_items'      => __( 'Search Categories', 'textdomain' ),
       'all_items'         => __( 'All Categories', 'textdomain' ),
       'view_item'         => __( 'View Category', 'textdomain' ),
       'parent_item'       => __( 'Parent Category', 'textdomain' ),
       'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
       'edit_item'         => __( 'Edit Category', 'textdomain' ),
       'update_item'       => __( 'Update Category', 'textdomain' ),
       'add_new_item'      => __( 'Add New Category', 'textdomain' ),
       'new_item_name'     => __( 'New Category Name', 'textdomain' ),
       'not_found'         => __( 'No Categories Found', 'textdomain' ),
       'back_to_items'     => __( 'Back to Categories', 'textdomain' ),
       'menu_name'         => __( 'Category', 'textdomain' ),
   ];
   $args = [
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'case-results/case-category', 'with_front' => false ),
   ];
   register_taxonomy( 'case-category', [ 'results' ], $args );
}
add_action( 'init', 'register_results_category', 0 );