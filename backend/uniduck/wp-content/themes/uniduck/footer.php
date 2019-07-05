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
    <div class="follow-us">
        <div class="item">
        Like <strong class="text-primary">Uniduck</strong> on
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Icons/ic-facebook.svg" alt="ic-facebook" />
        </div>
        <div class="item">
        Follow <strong class="text-primary">@Uniduck</strong> on
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Icons/ic-twitter.svg" alt="ic-twitter" />
        </div>
        <div class="item">
        Follow <strong class="text-primary">Uniduck</strong> on
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Icons/ic-instagram.svg" alt="ic-instagram" />
        </div>
    </div>
    </div>
</footer>
    <?php wp_footer(); ?>
    </body>
</html>