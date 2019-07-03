<?php get_header(); ?>


<?php while(have_posts()) { 
    // post loop
    the_post();
    ?>

    <h1><?php the_title(); ?></h1>

<?php } ?>


<?php get_footer(); ?>