<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container d-md-flex">
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="posts-header pt-5 pb-3"> 
        <h1 class="fw-bold"><?php esc_html(the_title()); ?></h1>
      </div>

      <?php if ( has_post_thumbnail() ) : ?>
        
        <div class="featured-img mb-4">
          <?php the_post_thumbnail(); ?>
        </div>
        
      <?php endif; ?>
      
      <div class="content-section"><?php esc_html(the_content()); ?></div>

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

<?php get_footer(); ?>