<?php 

function bi_activate_plugin( )
{
    # check  to ensure user's version of wordpress is upto date or not less than version 5.0
    if ( version_compare( get_bloginfo( 'version' ),  5.0, "<" ) ) {
        wp_die( __("You must update your version of wordpress to use this plugin"),  "biography" );
    }
}