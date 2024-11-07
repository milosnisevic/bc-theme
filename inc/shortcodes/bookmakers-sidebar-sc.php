<?php

// Bookmakers sidebar shortcode
add_shortcode('bookmakers_sidebar', 'bookmakersSidebar');

function bookmakersSidebar( $atts ) {
  $atts = shortcode_atts( array(
    'post_type' => '',
    'limit' => ''
  ), $atts );
  
  $args = array(
    'post_type' => $atts['post_type'],
    'posts_per_page' => $atts['limit'],
    'order' => 'ASC',
  );
  
  $posts = new WP_Query( $args );
  
  ob_start();

  if ($posts->have_posts()){
    while ($posts->have_posts()) {
        $posts->the_post();

        $post_counter = $posts->current_post + 1;
        get_template_part('template-parts/bookmakers-sidebar', null, [
          'post_counter' => $post_counter
        ]);
    }
    wp_reset_postdata();
}

return ob_get_clean();
}

?>