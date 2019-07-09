<?php
/**
 * The template for displaying archive pages
 *
 */

get_header();
?>

<main class="main container">
    <div class="page-archive">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1>Archive</h1>
                <?php
                the_archive_title( '<h1>', '</h1>' );
                the_archive_description( '<div>', '</div>' );
                ?>
                <hr />
            </header>

            <?php
            
            while ( have_posts() ) :
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

            the_posts_navigation();

        else :

            echo '<h3>No Archive found</h3>';

        endif;
        ?>
    </div>
</main>
<?php
get_footer();
