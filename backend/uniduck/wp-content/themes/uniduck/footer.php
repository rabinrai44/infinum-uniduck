<footer class="footer">
    <div class="container flex-item-column">
    <div class="site-copyright">
        <?php if (has_custom_logo()) : 
            the_custom_logo();
            else: ?>
            <h3><?php echo bloginfo('name'); ?></h3>
           <?php endif; ?>
        <p>&copy; <?php echo date('Y') . " "; echo bloginfo('name'); ?>. All rights reserved.</p>
    </div>
    <?php dynamic_sidebar('footer-followus-link'); ?>
    </div>
</footer>
    <?php wp_footer(); ?>
    </body>
</html>