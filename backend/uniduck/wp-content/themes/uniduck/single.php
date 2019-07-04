<?php get_header(); ?>


<?php 
    while(have_posts()) {
        the_post();
    }
?>

    <article class="blog-post">
        <div class="meta-featured-img">
        <!-- should be print the image -->
        </div>
        <div class="meta-header">
            <span class="meta-date"><?php the_date(); ?></span>
            <h3 class="heading">
            <?php the_title(); ?>
            </h3>
            <div class="meta-tag">
            <?php the_tags('<div class="item">', '</div><div class="item">', '</div>'); ?>
            </div>
        </div>
        <div class="meta-content">
            <p>
            <?php the_content(); ?>
            </p>
        </div>
    </article>


<?php 
comment_form();
?>



<?php get_footer(); ?>