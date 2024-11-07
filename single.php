<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container d-md-flex">
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="posts-header pt-5 pb-3">
        <p class="posts-date"><?php esc_html_e(get_the_date()); ?></p>
        <h1 class="fw-bold"><?php esc_html(the_title()); ?></h1>
        <div class="author d-flex gap-2">
          <div class="avatar-img">
            <?php
              global $post;
              $author_id = $post->post_author;
              $avatar_url = get_the_author_meta( 'avatar', $author_id );
            ?>
          <?php echo get_avatar( get_the_author(), 24, '', 'Profile Picture', array( 'class' => 'avatar', 'src' => $avatar_url ) ); ?>
          </div>
          <a href="#" class="author-name fw-bold"><?php esc_html_e(get_the_author()); ?></a>
        </div>
      </div>

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-img mb-4">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php endif; ?>
      
      <div class="content-section"><?php esc_html(the_content()); ?></div>

      <h2 class="fw-bold">Read next</h2>
      <div class="unfeatured col-12 d-flex flex-wrap">
        <div class="col-12 col-md-6 p-1 mt-2 mb-2">
          <?php $next_post = get_next_post();
          if ( $next_post ) : ?>
          <a href="<?php echo get_permalink( $next_post->ID ); ?>">
            <div class="text-dark d-flex gap-3">
              <img class="col-12 d-block rounded-4" src="<?php echo esc_html(get_the_post_thumbnail_url( $next_post->ID )); ?>" style="height: 90px; width: 90px" alt="News image">
              <div class="latest-news-text">
                <div class="latest-news-date"><?php echo date( 'F j, Y', strtotime( $next_post->post_date ) ); ?></div>
                <h4 class="latest-news-title fw-bold"><?php esc_html_e( $next_post->post_title ); ?></h4>
              </div>
            </div>
            </a>
        <?php endif; ?>
        </div>
        <div class="col-12 col-md-6 p-1 mt-2 mb-2">
          <?php $prev_post = get_previous_post();
          if ( $prev_post ) : ?>
          <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
            <div class="text-dark d-flex gap-3">
              <img class="col-12 d-block rounded-4" src="<?php echo esc_html(get_the_post_thumbnail_url( $prev_post->ID )); ?>" style="height: 90px; width: 90px" alt="News image">
              <div class="latest-news-text">
                <div class="latest-news-date"><?php echo date( 'F j, Y', strtotime( $prev_post->post_date ) ); ?></div>
                <h4 class="latest-news-title fw-bold lines-2"><?php esc_html_e( $prev_post->post_title ); ?></h4>
              </div>
            </div>
          </a>
          <?php endif; ?>
        </div>
      </div>
      <?php endwhile; endif; ?>
      
      <?php 

      while(have_posts()) {
        the_post();
      }
      ?>
  
  </div>

  <div class="col-12 col-lg-4 mt-5">
    <?php dynamic_sidebar('sidebar-widget'); ?>
  </div>

  </div>
</div>

<?php  get_footer(); ?>