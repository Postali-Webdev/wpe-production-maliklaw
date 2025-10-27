<?php
/**
 * Custom Case Results Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_jobs() {

// set up labels
    $labels = array(
        'name' => 'Jobs',
        'singular_name' => 'Job',
        'add_new' => 'Add New Job',
        'add_new_item' => 'Add New Job',
        'edit_item' => 'Edit Jobs',
        'new_item' => 'New Jobs',
        'all_items' => 'All Jobs',
        'view_item' => 'View Jobs',
        'search_items' => 'Search Jobs',
        'not_found' =>  'No Jobs Found',
        'not_found_in_trash' => 'No Jobs found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Jobs',

    );
    //register post type
    register_post_type( 'Jobs', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-analytics',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'jobs', 'with_front' => false ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        )
    );

}
add_action( 'init', 'create_custom_post_type_jobs' );
