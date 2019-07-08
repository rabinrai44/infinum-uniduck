<form class="search-bar" method="get" action="<?php echo home_url(); ?>" role="search">
  <input type="search" class="search-bar-input search-field" 
    placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
     value="<?php echo get_search_query() ?>" name="s" 
     title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
</form>