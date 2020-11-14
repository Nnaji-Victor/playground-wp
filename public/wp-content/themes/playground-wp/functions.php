<?php 
    add_theme_support('custom-logo');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');

    // public function register_post_types(){
    //     register_taxonomy_for_object_type('category', 'case');
    //     register_taxonomy_for_object_type('post_tag', 'case');

    //     register_post_type('case',
    //         array(
    //             'labels' => array(
    //                 'name' => __('Case Study', 'case'),
    //                 'singular_name' => __('Case Study', 'case'),
    //                 'add_new' => __('Add New', 'case'),
    //                 'add_new_item' => __('Add New Case Study', 'case'),
    //                 'edit' => __('Edit', 'case'),
    //                 'edit_item' => __('Edit Case Study', 'case'),
    //                 'new_item' => __('New Case Study', 'case'),
    //                 'view' => __('View Case Study', 'case'),
    //                 'view_item' => __('View Case Study', 'case'),
    //                 'search_items' => __('Search Case Study', 'case'),
    //                 'not_found' => __('No Case Studies found', 'case'),
    //                 'not_found_in_trash' => __('No Case Studies found in Trash', 'case'),
    //             ),
    //             'public' => true,
    //             'hierarchical' => true,
    //             'has_archive' => true,
    //             'supports' => array(
    //                 'title',
    //                 'editor',
    //                 'thumbnail',
    //             ),
    //             'show_in_rest' => true,
    //             'menu_icon' => 'dashicons-media-document',
    //             'can_export' => true,
    //             'taxonomies' => array(
    //                 'post_tag',
    //                 'category',
    //             ),
    //             'rewrite' => array(
    //                 'slug' => '/',
    //                 'with_front' => false,
    //             ),
    //             'show_in_graphql' => true,
    //             'graphql_single_name' => 'CaseStudy',
    //             'graphql_plural_name' => 'CaseStudies',
    //     ));
    // }
?>