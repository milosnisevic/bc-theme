<?php

// Banner shortcode
add_shortcode('banner', 'addBanner');

function addBanner($atts) {
  $atts = shortcode_atts( array(
    'title' => '',
  ), $atts );

  ob_start();

  get_template_part('template-parts/banner-section', null, [
    'atts' => $atts
  ]);
  wp_reset_postdata();

  return ob_get_clean();
}

?>