<footer class="footer">
    <div class="container flex-item-column">
    <div class="site-copyright">
        <?php if (has_custom_logo()) : 
            the_custom_logo();
            else: ?>
            <h1><a href="<?php echo site_url(''); ?>"><?php echo get_bloginfo('name'); ?> </a></h1>
           <?php endif; ?>
        <p>&copy; 2019 Uniduck All rights reserved.</p>
    </div>
    <?php dynamic_sidebar('footer-followus-link'); ?>
    </div>
</footer>
    <?php wp_footer(); ?>
    </body>
</html>