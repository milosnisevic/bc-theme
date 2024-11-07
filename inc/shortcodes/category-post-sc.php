<?php

// Category posts shortcode
add_shortcode('category_posts', 'latestNews');

function latestNews($atts) {
  $atts = shortcode_atts(array(
      'category' => '',
      'posts_per_page' => '',
      'layout' => 'latest-news', // default
      'button' => 'true' // default
      ), $atts);

  $args = array(
      'category_name' => $atts['category'],
      'posts_per_page' => $atts['posts_per_page'],
      'order' => 'DESC',
      'orderby' => 'date'
  );

  $posts = new WP_Query($args);

  ob_start();
  ?>
   <div class="<?php echo esc_attr($atts['layout']); ?> row my-3">
  <?php
  if ($posts->have_posts()){
    $count = 0;
    while ($posts->have_posts()) {
    $posts->the_post();
    $count++;

    $category = get_the_category();
    $category_link = get_category_link($category[0]->cat_ID);
    
    get_template_part( 'template-parts/' . $atts['layout'], null, [
      'count' => $count
    ] );
   }
   
   
  if ($atts['layout'] === 'latest-news') { ?>
      </div>
    <?php }

    $button_text = ($atts['layout'] === 'latest-news') ? 'Meer wedtips' : 'Meer nieuws';

  if($atts['button'] === 'true' ) {

    ?> 
  <a class="btn-orange d-block m-auto btn rounded-3 p-2 px-3 fw-bold text-dark mb-3" href="<?php echo $category_link ?>"><?php echo $button_text; ?></a>
    <?php
  }
  ?>
  </div>
 
  <?php
  
  wp_reset_postdata();
  
    }
    
  return ob_get_clean();
}

?>