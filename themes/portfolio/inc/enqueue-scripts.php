<?php
/**
 * function loads all frontend scripts
 */
function portfolio_scripts(){
    wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'bootstrap', get_theme_file_uri ("/assets/css/bootstrap.min.css"));
    wp_enqueue_style( 'font-awesome', get_theme_file_uri("/assets/css/font-awesome.min.css"));
    wp_enqueue_style( 'animation-style', get_theme_file_uri() . "/assets/animate/animate.css");

    wp_enqueue_script('jquery-script', get_theme_file_uri( '/assets/js/jquery-3.3.1.min.js' ), array(), '1.1', true );
    wp_enqueue_script('popper-script', get_theme_file_uri( '/assets/js/popper.js' ), array(), '1.1', true );
    wp_enqueue_script('bootstrap-script', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array('jquery'), '1.1', true );
    wp_enqueue_script('imageload-isotope', get_theme_file_uri( '/assets/isotope/imagesloaded.pkgd.min.js'), array(), '1.1', true );
    wp_enqueue_script('isotope-script', get_theme_file_uri( '/assets/isotope/isotope.pkgd.min.js'), array(), '1.1', true );
    wp_enqueue_script('progressbar-script', get_theme_file_uri( '/assets/progressbar/progressbar.min.js'), array(), '1.1', true );
    wp_enqueue_script('image-tilt-script', get_theme_file_uri( '/assets/image-tilt/tilt.jquery.min.js'), array(), '1.1', true );
    wp_enqueue_script('animation-script', get_theme_file_uri( '/assets/animate/wow.min.js'), array(), '1.1', true );
    // main js
    wp_enqueue_script('main-script', get_theme_file_uri( '/assets/js/custom.js'), array(), '1.1', true );
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );
