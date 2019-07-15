<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Uniduck | WP Demo</title>
    <?php wp_head(); ?>
  </head>

  <body>
    <nav class="navbar">
      <div class="container flex-item-column-at-small">
        <div class="logo">
          <?php if (has_custom_logo()) : 
            the_custom_logo();
            else: ?>
            <h1><a href="<?php echo site_url(''); ?>"><?php echo get_bloginfo('name'); ?> </a></h1>
           <?php endif; ?>

        </div>
        <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'navbar-nav',
            'menu_id' => 'navbar_nav'
          ));
        ?>
        <!-- TODO: should be display buttons -->
        
       
        <div class="menu-icon" id="menu_icon">
          <div class="menu-icon-middle"></div>
        </div>
      </div>
    </nav>