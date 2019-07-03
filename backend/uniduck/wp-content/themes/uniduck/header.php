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
      <div class="container flex-item-column">
        <div class="logo">
          <a href="/">
            <img src="Assets/Images/Logo.png" alt="Uniduck Logo" />
          </a>
        </div>
        <ul class="navbar-nav" id="navbar_nav">
          <li>
            <a href="#" class="nav-link">Home</a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <button class="btn btn-primary">
                <span class="icon icon-ios"></span> Get for IOS
              </button></a
            >
          </li>
          <li>
            <a href="#" class="nav-link">
              <button class="btn">
                <span class="icon icon-unicorn"></span> Unicorn Owners
              </button></a
            >
          </li>
        </ul>
        <div class="menu-icon" id="menu_icon">
          <div class="menu-icon-middle"></div>
        </div>
      </div>
    </nav>