<?php get_header(); ?>

<div class="container d-md-flex">
  <div class="row">
    <div class="col-12 col-lg-8">

      <h1 class="fw-bold mt-5 mb-4">Zoekresultaten voor: <span><?php esc_html_e(get_search_query()); ?></span></h1>

      <?php
      while(have_posts()) {
        the_post();
      ?>

      <div class="mb-4">
        <a class="search-title fw-bold fs-2" href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e(the_title()); ?></a>
        <p><?php esc_html(the_excerpt()); ?></p>
        <a class="btn btn-more" href="<?php esc_url(the_permalink()); ?>">Lees verder...</a>
      </div>

      <?php
      }
      ?>

      <div class="my-4"><?php the_posts_pagination(); ?></div>
    </div>

  <div class="col-12 col-lg-4 mt-5">
    <?php dynamic_sidebar('sidebar-widget'); ?>
  </div>

  </div>
</div>

<?php get_footer(); ?>