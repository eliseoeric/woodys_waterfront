<?php

// let's create the function for the custom type
function register_reviews() {
    // creating (registering) the custom type
    register_post_type( 'review', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array ( 'labels'              => array (
            'name'               => __( 'Reviews', 'Waterfront' ), /* This is the Title of the Group */
            'singular_name'      => __( 'Review', 'Waterfront' ), /* This is the individual type */
            'all_items'          => __( 'All Reviews', 'Waterfront' ), /* the all items menu item */
            'add_new'            => __( 'Add New', 'Waterfront' ), /* The add new menu item */
            'add_new_item'       => __( 'Add New Review', 'Waterfront' ), /* Add New Display Title */
            'edit'               => __( 'Edit', 'Waterfront' ), /* Edit Dialog */
            'edit_item'          => __( 'Edit Review', 'Waterfront' ), /* Edit Display Title */
            'new_item'           => __( 'New Review', 'Waterfront' ), /* New Display Title */
            'view_item'          => __( 'View Reveiw', 'Waterfront' ), /* View Display Title */
            'search_items'       => __( 'Search Reviews', 'Waterfront' ), /* Search Custom Type Title */
            'not_found'          => __( 'Nothing found in the Database.', 'Waterfront' ), /* This displays if there are no entries yet */
            'not_found_in_trash' => __( 'Nothing found in Trash', 'Waterfront' ), /* This displays if there is nothing in the trash */
            'parent_item_colon'  => ''
        ), /* end of arrays */
                'description'         => __( 'Post type for adding TripAdvisor or Yelp Reviews to feature on the site.', 'Waterfront' ), /* Custom Type Description */
                'public'              => true,
                'publicly_queryable'  => true,
                'exclude_from_search' => false,
                'show_ui'             => true,
                'query_var'           => true,
                'menu_position'       => 8, /* this is what order you want it to appear in on the left hand side menu */
                'menu_icon'           => 'dashicons-format-quote', /* the icon for the custom post type menu */
                'rewrite'             => array ( 'slug' => 'review', 'with_front' => false ), /* you can specify its url slug */
                'has_archive'         => 'reviews', /* you can rename the slug here */
                'capability_type'     => 'post',
                'hierarchical'        => false,
            /* the next one is important, it tells what's enabled in the post editor */
                'supports'            => array ( 'title', 'editor', 'thumbnail', 'excerpt' )
        ) /* end of options */
    ); /* end of register post type */

    /* this adds your post categories to your custom post type */
    // register_taxonomy_for_object_type( 'category', 'edu_program' );

}

// adding the function to the Wordpress init
add_action( 'init', 'register_reviews' );


