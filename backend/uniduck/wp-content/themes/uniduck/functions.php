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

?>