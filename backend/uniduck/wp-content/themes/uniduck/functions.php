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


/**
 * @uniduck_custom_meta()
 * Custom meta features for the post
 */
function uniduck_custom_meta() {
    add_meta_box('uniduck_meta', __('Featured Posts', 'uniduck-textdomain'), 'uniduck_meta_callback', 'post');
}

function uniduck_meta_callback($post) {
    $featured = get_post_meta($post->ID);
    ?>
    <div class="uniduck-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes"
             <?php if (isset($featured['meta-checkbox'])) checked($featured['meta-checkbox'][0], 'yes'); ?>
             >
             <?php _e('Featured this post', 'uniduck-textdomain') ?>
        </label>
    </div>
<?php 
}
add_action('add_meta_boxes', 'uniduck_custom_meta');


/** 
 * @uniduck_meta_save()
 * Saves the custom meta input
*/
function uniduck_meta_save($post_id) {
    // checks save status
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_once = (isset($_POST['uniduck_once']) && 
             wp_verify_once($_POST['uniduck_once'], basename(__FILE__) )) ? 'true' : 'false';
    
    // check for input and save
    if (isset($_POST['meta-checkbox'])) {
        update_post_meta($post_id, 'meta-checkbox', 'yes');
    } else {
        update_post_meta($post_id, 'meta-checkbox', '');
    }
}

add_action('save_post', 'uniduck_meta_save');

?>