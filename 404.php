<?php get_header(); ?>

<div class="container d-md-flex">
  <div class="row">
    <div class="col-12 col-lg-8">

      <img class="image-404 mt-5" src=<?php echo get_theme_file_uri('/images/404.webp') ?> alt="404 image">
      <h1 class="fw-bold mt-5">It seems you’re lost</h1>
      <p>But worry no more - we’ll get you back on the right track. Here are some pages you might have wanted to go on:</p>
      <a href="<?php bloginfo('url'); ?>" class="btn btn-orange fw-bold">Home Page</a>

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

<?php get_footer(); ?>