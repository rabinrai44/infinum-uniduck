<?php 

/** 
 * Single Post Template
*/

$thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
 get_header(); 
 
 ?>


    <?php 
    
    if(have_posts());
        while(have_posts()) {
            the_post();
    // check if there is post thumbnail attached
    if (has_post_thumbnail()) { ?>

    <header class="blog-header" 
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
 url('<?php echo $thumbnail_url; ?>')">
        <div class="container flex-item-column blog-header-content text-center">
            <h1 class="blog-title">
            <?php the_title(); ?>
            </h1>
            <div class="blog-author"><span class="dashicons-before dashicons-admin-users"></span> <?php the_author(); ?></div>
        </div>
        <div class="back-to-blog">
            <a href="<?php echo site_url(''); ?>">Back to blog</a>
        </div>
        </header>
        <?php 

    } else { // fallback ?>
    <header class="blog-header">
      <div class="container flex-item-column blog-header-content text-center">
        <h1 class="blog-title">
          <?php the_title(); ?>
        </h1>
        <div class="blog-author"><span class="dashicons-before dashicons-admin-users"></span> <?php the_author(); ?></div>
      </div>
      <div class="back-to-blog">
        <a href="<?php echo site_url(''); ?>">Back to blog</a>
      </div>
    </header>
    <?php } ?>
    <div class="container container-narrow flex-item-column">
        
        <div class="blog-single">
    
            <div class="blog-content">
                
                <?php the_content(); ?>    
    
                <div class="meta-header">
                    <div class="meta-tag">
                    <?php the_tags('<div class="item">', '</div><div class="item">', '</div>'); ?>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
    <?php } ?>



<?php get_footer(); ?>