<div class="best-bookmakers my-4 rounded-3 px-4 py-3 position-relative">
  <p class="best-banner rounded-4 w-50 text-center fw-bold position-absolute"><?php esc_html(the_field('best_operator')) ?></p>
  <div class="bookmakers-content d-flex justify-content-between align-items-center gap-3 flex-md-row flex-column pt-3">
    <div class="d-flex">
      <img class="rounded-3" src=<?php echo esc_url(get_field('operator_image')['url']); ?> alt="logo" style="height: 55px; width: 55px">
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
        <a class="recensions text-decoration-none" href="<?php esc_url(the_permalink()); ?>">Recensie</a>
    </div>
  </div>
  <h6 class="fw-bold"><?php esc_html(the_field('bonus')) ?></h6>
  <div>
    <div class="d-flex flex-column">
    <?php if( have_rows('operator_features') ):
      while( have_rows('operator_features') ): the_row(); ?>

      <div class="d-flex">
        <i class="bonus-icons fa-solid fa-check me-2"></i>
        <p class="bonus-features"><?php esc_html(the_sub_field('features')); ?></p>
      </div>
        
    <?php endwhile;
    
    endif; ?>
  </div>
   </div>
  <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-danger text-dark fw-bold cta-btn">Bezoek nu</a>
</div>
<p class="welcome-bonus-text px-2 mt-3"><?php esc_html(the_field('welcome_bonus_text')); ?></p>
</div>