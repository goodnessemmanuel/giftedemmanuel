<?php
/**
 * Biography 
 *
 * @package   Biography 
 * @copyright Copyright(c) 2021, Biography 
 *
 * Plugin Name: Biography 
 * Plugin URI: https://infobasenaija.com
 * Description: The easy way to create biography and add details to the biography.
 * Version: 1.0
 * Author: Oche Ejeh
 * Author URI: https://giftedemmanuel.com
 * Text Domain: biography
 * Domain Path: languages
 */

/** 
 *prevent users/hackers from calling 
 *this plugin directly
 */
if  ( !function_exists( "add_action" ) ) {
    echo "Hi dear! I am just a plugin not much I can do when called directly";
    exit;
}

/**
 * activating plugin
 */

// Setup
define("BIOGRAPHY_PLUGIN_URL", __FILE__);

// includes 
require "inc/activate.php";
require "inc/init.php";
include ('blocks/enqueue.php');

// Hooks
register_activation_hook( __FILE__, 'bi_activate_plugin' );
add_action( 'init', 'biography_init' );
add_action('enqueue_block_editor_assets', 'bi_enqueue_editor_assets'); //for custom blocks
add_action('enqueue_block_assets', 'bi_enqueue_assets'); //for custom blocks for frontend

// Shotcodes
