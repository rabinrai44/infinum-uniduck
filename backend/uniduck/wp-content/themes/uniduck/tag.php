<?php
/**
 * Template for displaying tags
 */
get_header(); ?>


 <main class="main container">
      <div class="page-tag">
          <h1>The Tag: <?php single_tag_title(); ?></h1>
          <hr />

          <?php
          
          if (have_posts()) :
                while(have_posts()) :
                    the_post();
                ?>
                <article class="blog-post">
                    <div class="meta-featured-img">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="img-unicorn" />
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
        ?>
</div>
</main>

<?php get_footer(); ?>