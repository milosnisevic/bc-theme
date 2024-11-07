<?php

// Searchbar shortcode
add_shortcode('search_bar', 'addSearchBar');

function addSearchBar($atts) {
  $atts = shortcode_atts( array(
    'placeholder' => '',
  ), $atts );

  ob_start();

  get_template_part('template-parts/searchbar-sidebar', null, [
    'atts' => $atts,
    'posts_per_page' => 5
  ]);

  wp_reset_postdata();

  return ob_get_clean();
}

?>