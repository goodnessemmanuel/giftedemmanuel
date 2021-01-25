<?php

function bi_enqueue_editor_assets(){
    wp_register_script(
        'bi_block_main',
        plugins_url('/blocks/src/main.js',BIOGRAPHY_PLUGIN_URL ),
        array( 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-api', 'wp-compose', 'wp-data' ),
        filemtime( plugin_dir_path(BIOGRAPHY_PLUGIN_URL ) . '/blocks/src/main.js')
    );

    wp_enqueue_script('bi_block_main');

}

function bi_enqueue_assets(){
    wp_register_style(
        'bi_fontawesome_css',
        plugins_url('/blocks/src/assets/css/font-awesome.min.css',BIOGRAPHY_PLUGIN_URL )
    );
    wp_register_style(
        'bi_block_main_css',
        plugins_url('/blocks/src/blocks-main.css',BIOGRAPHY_PLUGIN_URL )
    );

    wp_enqueue_style('bi_fontawesome_css');
    wp_enqueue_style('bi_block_main_css');

}