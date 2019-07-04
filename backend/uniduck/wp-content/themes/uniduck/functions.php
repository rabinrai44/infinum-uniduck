<?php

/**
 * @uniduck_setup_files()
 * Load the require files for the theme
 * Stylesheet, JavaScript, Fonts and etc.  
 */
function uniduck_setup_files() {
    wp_enqueue_style('uniduck_style', get_stylesheet_uri(), NULL, microtime(), all);
    wp_enqueue_script('uniduck_javascript', get_theme_file_uri('Assets/JS/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'uniduck_setup_files');

/**
 * @uniduck_init()
 * Theme support
 * custom_log, post thumbnail, title tag, html5 and etc.
 */
function uniduck_init() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'uniduck_init');

?>