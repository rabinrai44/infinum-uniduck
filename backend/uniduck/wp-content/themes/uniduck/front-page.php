<?php 

/** 
 * Template Name: Front Page Layout
 * Template Post Type: Post, Page
*/


get_header(); ?>

<header class="hero">
      <div class="container text-center">
        <div class="hero-content">
            <?php 
            $key_name = get_post_custom_values($key = 'hero_title');
            
            if ($key_name) { 

            echo '<h1 class="hero-title">'. $key_name[0] . '</h1>';

            } else {

                echo '<h1 class="hero-title">The Unicorn & a Duck</h1>';

             }
            ?>
            <?php get_search_form(); ?> 
        </div>
      </div>
  </header>

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
                  <?php the_excerpt();  ?>
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
        <?php

        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => 3
        );

        $posts = new WP_Query($args);

        if ($posts-> have_posts()) :

        while($posts-> have_posts()): 
              $posts-> the_post(); 
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
        wp_reset_query(); 
         ?>
        </section>
      </div>

  <div class="container">
    <div class="loadmore btn btn-primary btn-loadmore">Load more</div>
  </div>
</main>

<!-- Load more post button works script | Ajax request -->
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
    var page = 2;
    jQuery(function($) {
      $('body').on('click', '.loadmore', function() {
        var data = {
          action: 'load_posts_by_ajax',
          page: page,
          security: '<?php echo wp_create_nonce("load_more_posts"); ?>'
        };

        // show 'Loading...' message while ajax request
        $('.loadmore').html('Loading...');
        setTimeout(() => {
          $.post(ajaxurl, data, function(response) {

            // show load more if still have a post
            if (response) {
              $('.loadmore').html('Load more');
            }

            // hide button if not more post to load
            if (response === '') {
              $('.loadmore').hide();
            }
            $('.blog-posts').append(response);
            page++;
          });
        }, 200);
      });
    });

</script>

<?php get_footer(); ?>