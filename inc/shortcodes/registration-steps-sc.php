<?php

// Registration steps shortcode
add_shortcode('registration_banner', 'registrationBanner');

function registrationBanner() {

  ob_start();

  get_template_part('template-parts/registration-banner');
  wp_reset_postdata();

  return ob_get_clean();
}

?>