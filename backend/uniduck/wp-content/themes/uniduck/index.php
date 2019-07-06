<?php get_header(); ?>


 <main class="main">
      <div class="container">
         <!-- Blog Featured -->
    
        <?php
        $args = array(
          'posts_per_page' => 1,
          'meta_key' => 'meta-checkbox',
          'meta_value' => 'yes'
        );

        $featuredPost = new WP_Query($args);

        if ($featuredPost-> have_posts()) :
          while($featuredPost-> have_posts()) : 
            $featuredPost-> the_post();
        ?>
            <section class="blog-featured">
              <div class="blog-featured-img">
                <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
              </div>
              <article class="blog-featured-post">
                <div class="meta-header">
                  <span class="meta-date"><?php the_date(); ?></span>
                  <h3 class="heading heading-featured">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h3>
                  <div class="meta-tag">
                    <?php the_tags('<div class="item">', '</div><div class="item">', '</div>'); ?>
                  </div>
                </div>
                <div class="meta-content">
                  <p>
                  <?php the_excerpt();  ?>...<a
                      href="<?php the_permalink(); ?>"
                      class="readmore primary-text"
                      >Read more</a
                    >
                  </p>
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
          endif;
          endwhile; else: 
          endif;
          wp_reset_postdata();
          ?>          
      </div>
      <div class="container">
        <!-- Blog Main -->
        <section class="blog-posts">
        <?php while(have_posts()) { 
            the_post(); ?>
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
          }
        wp_reset_query(); 
         ?>

        </section>
      </div>
          <div class="loadmore">
            <a href="#" class="btn btn-primary btn-loadmore">Load More</a>
          </div>
    </main>


<?php get_footer(); ?>