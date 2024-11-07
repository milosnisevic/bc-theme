<?php

  add_action('rest_api_init', 'registerSearch');

  function registerSearch() {
    register_rest_route('academy/v1', 'search', [
      'methods' => WP_REST_SERVER::READABLE,
      'callback' => 'academySearchResults'
    ]);
  }

  function academySearchResults($data) {
    $posts = new WP_Query([
      'post_type' => ['post', 'page', 'operators'],
      's' => sanitize_text_field($data['term'])
    ]);

    $postsResults = [];

    while($posts->have_posts()) {
      $posts->the_post();
      array_push($postsResults, [
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'excerpt' => get_the_excerpt(),
        'thumbnail' => get_the_post_thumbnail_url()
      ]);
    }
    
    return $postsResults;

  }

?>