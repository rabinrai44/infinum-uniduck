<?php get_header(); ?>


 <main class="main">
      <div class="container">
        <!-- Blog Featured -->
        <section class="blog-featured">
          <div class="blog-featured-img">
            <img src="Assets/Images/img-unicorn.png" alt="" />
          </div>
          <article class="blog-featured-post">
            <div class="meta-header">
              <span class="meta-date">June 25, 2019</span>
              <h3 class="heading heading-featured">
                The Legend of the Unicorn - Myths and Legends
              </h3>
              <div class="meta-tag">
                <div class="item">
                  <a href="#" class="btn btn-small">Unicorn</a>
                </div>
                <div class="item">
                  <a href="#" class="btn btn-small">Pinky</a>
                </div>
                <div class="item">
                  <a href="#" class="btn btn-small">Magic</a>
                </div>
                <div class="item">
                  <a href="#" class="btn btn-small">Love</a>
                </div>
              </div>
            </div>
            <div class="meta-content">
              <p>
                Once upon a time in a kingdom far-far-away in the lands of the
                never-ending spring, a king sat in his golden throne and ruled
                his kingdom in perfect harmony. A person can feel nothing but
                exuberance at the sight of...<a
                  href="#"
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
                <span class="icon icon-comment"></span> 22 comments
              </div>
            </div>
          </article>
        </section>
      </div>
      <div class="container">
        <!-- Blog Main -->
        <section class="blog-posts">
        <?php while(have_posts()) { 
            the_post(); ?>
          <article class="blog-post">
            <div class="meta-featured-img">
              <img src="Assets/Images/img-unicorn2.png" alt="img-unicorn" />
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
              <p>
                <?php the_excerpt(); ?>...<a
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
        <?php } ?>

        </section>
      </div>
          <div class="loadmore">
            <a href="#" class="btn btn-primary btn-loadmore">Load More</a>
          </div>
    </main>


<?php get_footer(); ?>