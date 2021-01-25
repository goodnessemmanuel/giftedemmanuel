<?php

/**
 * Register  custom post function
 *
 */
function biography_init()
{
    $labels = array(
        'name'                  => _x('Biography', 'Post type general name', 'biography'),
        'singular_name'         => _x('Biography', 'Post type singular name', 'biography'),
        'menu_name'             => _x('Biography', 'Admin Menu text', 'biography'),
        'name_admin_bar'        => _x('Biography', 'Add New on Toolbar', 'biography'),
        'add_new'               => __('Add New', 'biography'),
        'add_new_item'          => __('Add New biography', 'biography'),
        'new_item'              => __('New Biography', 'biography'),
        'edit_item'             => __('Edit biography', 'biography'),
        'view_item'             => __('View Biography', 'biography'),
        'all_items'             => __('All Biography', 'biography'),
        'search_items'          => __('Search biography', 'biography'),
        'parent_item_colon'     => __('Parent biography:', 'biography'),
        'not_found'             => __('No biography found.', 'biography'),
        'not_found_in_trash'    => __('No biography found in Trash.', 'biography'),
        'featured_image'        => _x('Biography Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'biography'),
        'set_featured_image'    => _x('Set background image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'biography'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'biography'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'biography'),
        'archives'              => _x('Biography archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'biography'),
        'insert_into_item'      => _x('Insert into biography', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'biography'),
        'uploaded_to_this_item' => _x('Uploaded to this biography', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'biography'),
        'filter_items_list'     => _x('Filter biography list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'biography'),
        'items_list_navigation' => _x('biography list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'biography'),
        'items_list'            => _x('Biography list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'biography'),
    );

    $args = array(
        'labels'                    => $labels,
        'description'               => 'biography custom post type.',
        'public'                    => true,
        'publicly_queryable'        => true,
        'show_ui'                   => true,
        'show_in_menu'              => true,
        'query_var'                 => true,
        'rewrite'                   => array('slug' => 'biography'),
        'capability_type'           => 'post',
        'has_archive'               => true,
        'hierarchical'              => false,
        'menu_position'             => 20,
        'supports'                  => array('title', 'editor', 'author', 'thumbnail'),
        'show_in_rest'              => true,
        'menu_icon'                 => 'dashicons-format-gallery'
    );

    register_post_type( 'biography', $args );
}
