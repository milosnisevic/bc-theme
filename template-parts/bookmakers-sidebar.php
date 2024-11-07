<div class="bookmakers-sidebar rounded-3 d-flex justify-content-between align-items-center gap-3 p-3 px-4 position-relative ms-2 mb-3">
    <div class="d-flex">
      <a class="ranking-number" href="<?php esc_url(the_permalink()); ?>"><?php echo $args['post_counter'] ?></a>
      <a href="<?php esc_url(the_permalink()); ?>"><img class="rounded-3" src=<?php echo esc_url(get_field('operator_image')['url']); ?> alt="logo" style="height: 55px; width: 55px"></a>
      <div class="d-flex flex-column ms-2">
        <p class="my-0 fw-bold"><?php esc_html(the_title()); ?></p>
        <div class="d-flex justify-content-evenly">
         <?php
            $args = array(
              'post_type' => 'operators',
              'posts_per_page' => -1,
              'p' => get_the_ID()
              );

            $operators = new WP_Query( $args );

            if ( $operators->have_posts() ) {
            while ( $operators->have_posts() ) : $operators->the_post();
            $rating = get_field('operator_rating');
            if ( $rating ) {
            $stars = '';
            for ( $i = 1; $i <= 5; $i++ ) {
                if ( $i <= $rating ) {
                    $stars .= '<img class="stars" src="' . get_stylesheet_directory_uri() . '/images/star.svg" alt="star">' ;
                } else {
                    $stars .= '<img class="stars" src="' . get_stylesheet_directory_uri() . '/images/star-empty.svg" alt="star empty">';
                }
            }
            echo $stars;
            } else {
            echo 'No rating';
            }
            endwhile;
            }
            ?>
        </div>
        </div>
    </div>
      <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-danger text-light fw-bold cta-btn cta-btn-sidebar">Bezoek nu</a>
    </div>