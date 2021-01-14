<?php
/**
 * Menu navigation
 */
function portfolio_features() {
    add_theme_support( 'title-tag' );
    register_nav_menus(
      array(
        'main-menu' => __('Main Menu'),
        'social-menu' => __('Social Menu')
       )
    );
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' )
    );

    add_theme_support( 'custom-logo', $defaults );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'portfolio_features');

/**
 * Enqueue scripts and styles.
 */
require 'inc/enqueue-scripts.php';

//replace the document title seperator with a pipe
function modify_document_title_separator( $sep ) {
    $sep = "|";
    return $sep;
}
add_filter( 'document_title_separator', 'modify_document_title_separator' );

/**
 * add bootstrap classes to anchor tags of li elements 
 * -1 will add custom CSS class to every menu item, 
 * while if you will use 1 ut will add Custom css 
 * classes to 1st link only
*/
function add_menu_li_a_class($ulclass) {
    return preg_replace('/<a/', '<a class="nav-link"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menu_li_a_class');