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
 * custom_log, post thumbnail, title tag, comment-form, comment-list, html5 and etc.
 */
function uniduck_init() {
    // Default logo style
    $logo = array(
        'height' => 100,
        'width' => 260,
        'flex-height' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $logo);
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', 
        array('comment-list', 'comment-form', 'search-form')
    );
}

add_action('after_setup_theme', 'uniduck_init');

/**
 * @add_class_the_tags()
 * Customize the tags link by custom class
 */
function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="btn btn-small"', $html);
    return $html;
}
add_filter('the_tags','add_class_the_tags',10,1);

?>