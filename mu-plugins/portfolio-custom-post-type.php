<?php
/**
 * portfolio custom post types
 */
function wporg_custom_post_type(){

    register_post_type('bio',
        array(
            'labels'      => array(
                'name'          => __( 'Biography', 'textdomain' ),
                'edit_item'     => __( 'Edit Biography', 'textdomain' ),
                'new_item'      => __( 'New Biography', 'textdomain' ),
                'add_new_item'  => __( 'Add New Biography', 'textdomain' )
            ),
            'public'        => true,
            'menu_icon'     => 'dashicons-format-gallery',
            'supports'      => array('title', 'thumbnail')
        )
    );

    register_post_type('skill',
        array(
            'labels'      => array(
                'name'          => __( 'Skills', 'textdomain' ),
                'singular_name' => __( 'Skill', 'textdomain' ),
                'edit_item'     => __( 'Edit Skill', 'textdomain' ),
            'new_item'              => __( 'New Skill', 'textdomain' ),
            'add_new_item'      => __( 'Add New Skill', 'textdomain' ),
                'all_items'     => __( 'All Skills', 'textdomain' )
            ),
            'public'      => true,
            'has_archive' => true,
            'menu_icon'   => 'dashicons-awards',
            'supports' => array('title')
        )
    );

    register_post_type('project',
        array(
            'labels'      => array(
                'name'          => __( 'Projects', 'textdomain' ),
                'singular_name' => __( 'Project', 'textdomain' ),
                'edit_item'     => __( 'Edit Project', 'textdomain' ),
                'new_item'      => __( 'New Portfolio Project', 'textdomain' ),
                'add_new_item'  => __( 'Add New Portfolio Project', 'textdomain' ),
                'all_items'     => __( 'All Projects', 'textdomain' )
            ),
            'public'      => true,
            'has_archive' => true,
            'menu_icon'   => 'dashicons-portfolio',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    register_post_type('service',
        array(
            'labels'      => array(
                'name'          => __( 'Services', 'textdomain' ),
                'singular_name' => __( 'Service', 'textdomain' ),
                'edit_item'     => __( 'Edit Service', 'textdomain' ),
                'new_item'      => __( 'New Service', 'textdomain' ),
                'add_new_item'  => __( 'Add New Service', 'textdomain' ),
                'all_items'     => __( 'All Services', 'textdomain' )
            ),
            'public'      => true,
            'has_archive' => true,
            'menu_icon'   => 'dashicons-admin-network',
            'supports' => array('title')
        )
    );

    register_post_type('education',
        array(
            'labels'      => array(
                'name'          => __( 'Educations', 'textdomain' ),
                'singular_name' => __( 'Education', 'textdomain' ),
                'edit_item'     => __( 'Edit Education', 'textdomain' ),
                'new_item'      => __( 'New Education', 'textdomain' ),
                'add_new_item'  => __( 'Add New Education', 'textdomain' ),
                'all_items'     => __( 'All Education', 'textdomain' )
            ),
            'public'       => true,
            'show_in_rest' => true,
            'has_archive'  => true,
            'menu_icon'    => 'dashicons-admin-network',
            'supports' => array('editor')
        )
    );

}
add_action("init", "wporg_custom_post_type");
