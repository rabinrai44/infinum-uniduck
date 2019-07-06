<?php

/**
 * @uniduck_setup_files()
 * Load the require files for the theme
 * Stylesheet, JavaScript, Fonts and etc.  
 */
function uniduck_setup_files() {
    wp_enqueue_style('uniduck_style', get_stylesheet_uri(), NULL, microtime(), all);
    wp_enqueue_script('jquery', get_template_directory_uri(), 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array('jquery'), '3.4.1', false);
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
 * @register_uniduck_menus()
 * Allows user to create and display the menu for the theme 
 */
function register_uniduck_menus() {
    register_nav_menus(
        array(
            'primary' => __('Primary Menu'),
            'secondary' => __('Secondary Menu')
        )
        );
}
add_action('init', 'register_uniduck_menus');


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


/** 
* @special_nav_item_class()
* Add a class nav-item for the nav items
* If found current-menu-item then add nav-item-active class
*/
function special_nav_item_class ($classes, $item) {
    
    $classes[] = 'nav-item';
    
    if (in_array('current-menu-item', $classes) ){
        
        $classes[] = 'nav-item-active';
        
    }
    
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_item_class' , 10 , 2);

/**
* @new_excerpt_more()
* Replaces the excerpt "more" text by a link.
*/
function new_excerpt_more($more) {
    global $post;
    return '...  <a class="primary-text" href="' . get_permalink($post->ID) . '"> Read more &raquo;  </a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * @uniduck_custom_exerpt_lenth()
 * Filter except length to 45 words.
 * Uniduck custom excerpt length
 */ 
function uniduck_custom_excerpt_length( $length ) {
return 45;
}
add_filter( 'excerpt_length', 'uniduck_custom_excerpt_length', 999 );

/**
 * @load_posts_by_ajax_callback()
 * append the posts when request fire-up 
 * if more posts in database
*/
function uniduck_load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => '3',
        'paged' => $paged,
    );

    $my_posts = new WP_Query( $args );

    if ( $my_posts->have_posts() ) :
       
        while ( $my_posts->have_posts() ) : 
                $my_posts->the_post(); ?>

             <article class="blog-post">
                <div class="meta-featured-img">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="meta-header">
                <span class="meta-date"><?php the_date(); ?></span>
                <h3 class="heading">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <div class="meta-tag">
                <?php the_tags('<div class="item">', '</div><div class="item">', '</div>'); ?>
                </div>
                </div>
                <div class="meta-content">            
                    <?php the_excerpt(); ?>
                </div>
                <div class="meta-footer">
                <div class="meta-like">
                    <span class="icon icon-heart"></span>
                    37 faves
                </div>
                <div class="meta-comment">
                    <span class="icon icon-comment"></span> <?php echo get_comments_number(get_the_ID()); ?> comments
                </div>
                </div>
            </article>
        <?php 
        endwhile;
    endif; 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax', 'uniduck_load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'uniduck_load_posts_by_ajax_callback');
?>