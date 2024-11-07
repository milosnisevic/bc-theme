<?php

// Operator list shortcode
add_shortcode('operator_list', 'testOperator');

function testOperator( $atts ) {
  $atts = shortcode_atts( array(
    'post_type' => '',
  ), $atts );
  
  $args = array(
    'post_type' => $atts['post_type'],
    'posts_per_page' => -1,
    'order' => 'ASC',
  );
  
  $posts = new WP_Query( $args );
  
  ob_start();

  if ($posts->have_posts()){
    ?>
    <div class="operator-list">
    <?php
    while ($posts->have_posts()) {
        $posts->the_post();
        get_template_part('template-parts/operator-bonus');
    }
    wp_reset_postdata();
    ?>
    </div>
   <?php
}

return ob_get_clean();
}

?>
