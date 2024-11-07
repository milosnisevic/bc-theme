<?php get_header(); ?>

<div class="container d-md-flex">
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="hero-section rounded-3 mt-5 mb-3 d-flex flex-wrap">
        <div class="hero-content pt-5 ps-4 col-6 col-md-8">
          <h2 class="fw-bold"><?php the_field('hero_title'); ?></h2>
          <p class="mb-5"><?php the_field('hero_content'); ?></p>
          <a class="btn btn-light d-none d-md-inline-block fw-bold my-4 p-3" href="#"><?php the_field('hero_button'); ?></a>
        </div>
        <div class="hero-img pt-4 col-6 col-md-4">
          <img src="<?php echo get_field('hero_image')['url']; ?>" alt="Hero image">
        </div>
        <a class="btn w-100 btn-light fw-bold m-2 p-3 d-md-none" href="#"><?php the_field('hero_button'); ?></a>
      </div>

      <?php 

      while(have_posts()) {
        the_post();
        the_content();
      }
      ?>
  
  </div>

  <div class="col-12 col-lg-4 mt-5">
    <?php dynamic_sidebar('sidebar-widget'); ?>
  </div>

  </div>
</div>

<?php  get_footer(); ?>