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

    <div class="blog-post-related container flex-item-column">
        <?php
            // List at least 1 related post
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                $first_tag = $tags[0]->term_id;
                echo '<h4 class="heading primary-text">Related posts</h4>';
            $args=array(
            'tag__in' => array($first_tag),
            'post__not_in' => array($post->ID),
            'posts_per_page'=>1,
            'caller_get_posts'=>1
            );
            $my_query = new WP_Query($args);
            if( $my_query->have_posts() ) { ?>
            
            <div class="related-posts">
                <?php 
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                

                    <article class="blog-post">
                        <div class="meta-featured-img">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="img-unicorn" />
                        </div>
                        <div class="content">
                            <div class="meta-header">
                            <h3 class="heading">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>                           
                            </div>
                            <div class="meta-content">            
                                <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                <a class="primary-text" href="<?php the_permalink(); ?>">Read more</a>
                            </div>                           
                        </div>
                    </article>
                
                <?php
                endwhile;
                }
                wp_reset_query();
                }
            ?>
        </div>
    </div>


<?php get_footer(); ?>