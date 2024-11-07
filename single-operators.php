<?php get_header(); ?>

<div class="container d-md-flex">
  <div class="row">
    <div class="col-12 col-lg-8">

  

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