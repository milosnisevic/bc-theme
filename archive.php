<?php get_header(); ?>

<div class="container d-md-flex">
  <div class="row">
    <div class="col-12 col-lg-8">

      <?php
        $title = get_the_archive_title();
        $catTitle = str_replace( 'Category: ', '', $title );
        $category_id = get_queried_object_id();
      ?>
      
      <h2 class="fw-bold mt-5"><?php echo $catTitle ?></h2>
      <div class="row post-container">
        <div class="featured col-12 mb-5">
            <div class="row gx-0">
              <a class="col-md-6" href="<?php esc_url(the_permalink()); ?>">
                <div class="badge rounded-pill bg-light text-dark fw-bold py-2 px-3 position-absolute m-3">FEATURED</div>
                <img class="rounded-4 w-100" src="<?php echo esc_html(get_the_post_thumbnail_url()); ?>" alt="Featured image">
              </a>
              <a class="col-md-6" href="<?php esc_url(the_permalink()); ?>">
                <div class="featured-info h-100 col-12 text-dark d-flex flex-column justify-content-center p-3 rounded-4">
                  <div class=""><?php echo esc_attr(get_the_date()); ?></div>
                  <h4 class="mt-2 fw-bold"><?php esc_html(the_title()); ?></h4>
                  <p><?php esc_html(the_excerpt()); ?></p>
                </div>
              </a>
            </div>
        </div>

      <?php
      if ( have_posts() ) : 
       $first_post = true; 
       while ( have_posts() ) : the_post(); 
       if ( $first_post ) : 
       $first_post = false; 
       else :
       ?>

        <div class="unfeatured col-12 col-lg-6">
          <div class="unfeatured-post py-1 mt-2 d-md-flex">
            <a href="<?php esc_url(the_permalink()); ?>">
              <div class="text-dark d-flex gap-3">
                <img class="col-12 d-block rounded-4" src="<?php echo esc_html(get_the_post_thumbnail_url()); ?>" style="height: 90px; width: 90px" alt="News image">
                <div class="latest-news-text">
                  <div class="latest-news-date"><?php echo esc_attr(get_the_date()); ?></div>
                  <h4 class="latest-news-title fw-bold lines-2"><?php esc_html(the_title()); ?></h4>
                </div>
              </div>
            </a>
          </div>
        </div>
       <?php
           endif;
          endwhile;
        endif; 
        ?>
      </div>

      <?php 

        if (paginate_links()) {
          $checkedPagination = get_term_meta($category_id, 'use_pagination');
          if ($checkedPagination[0]) {
      ?>
          <div class="d-flex justify-content-center my-5">
            <?php the_posts_pagination(); ?>
          </div>
            <?php
        } else {
            ?>
          <div class="d-flex justify-content-center mt-4 ps-4">
            <button data-cat="<?php echo $category_id; ?>" class="btn btn-orange load-more mb-4">Load more</button>
          </div>
            <?php
            }
           } 
           ?>

  </div>

  <div class="col-12 col-lg-4 mt-5">
    <?php dynamic_sidebar('sidebar-widget'); ?>
  </div>

  </div>
</div>

<?php get_footer(); ?>