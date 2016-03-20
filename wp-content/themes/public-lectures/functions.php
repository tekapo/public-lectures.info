<?php

/**
 */
//add categories and tags to pages

function add_taxonomies_to_pages() {
    register_taxonomy_for_object_type( 'post_tag', 'page' );
    register_taxonomy_for_object_type( 'category', 'page' );
}

add_action( 'init', 'add_taxonomies_to_pages' );


if ( !is_admin() ) {
    add_action( 'pre_get_posts', 'category_and_tag_archives' );
}

// Add Page as a post_type in the archive.php and tag.php 

function category_and_tag_archives( $wp_query ) {

    $my_post_array = array( 'post', 'page' );

    if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
        $wp_query->set( 'post_type', $my_post_array );

    if ( $wp_query->get( 'tag' ) )
        $wp_query->set( 'post_type', $my_post_array );
}

if ( !function_exists( 'school' ) ) {

// Register Custom Post Type
    function school() {

        $labels = array(
            'name'                  => 'Schools',
            'singular_name'         => 'school',
        );
        $args   = array(
            'label'               => 'school',
            'description'         => 'each school',
            'labels'              => $labels,
            'supports'            => array(),
            'taxonomies'          => array( 'category', 'post_tag' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        register_post_type( 'school', $args );
    }

    add_action( 'init', 'school', 0 );
}

if ( !function_exists( 'course' ) ) {

// Register Custom Post Type
    function course() {

        $labels = array(
            'name'                  => 'course',
            'singular_name'         => 'course',
        );
        $args   = array(
            'label'               => 'course',
            'description'         => 'each course',
            'labels'              => $labels,
            'supports'            => array(),
            'taxonomies'          => array( 'category', 'post_tag' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        register_post_type( 'course', $args );
    }

    add_action( 'init', 'course', 0 );
}