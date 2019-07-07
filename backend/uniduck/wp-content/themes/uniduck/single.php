<?php get_header(); ?>

    <?php 
    
    if(have_posts());
        while(have_posts()) {
            the_post();
    ?>
    
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