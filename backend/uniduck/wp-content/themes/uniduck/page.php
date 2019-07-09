<?php get_header(); ?>

<div id="page">
    <div class="container">
        <?php 
        
        if (have_posts());
            while(have_posts()) {
                the_post();
        ?>
    
            <h3><?php the_title(); ?></h3>
    
            <?php if (has_post_thumbnail()) { ?>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="images" />
            <?php } ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
    
        <?php }  ?>

    </div>
</div>

<?php get_footer(); ?>