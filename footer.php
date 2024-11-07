<footer class="container border-top pt-3">
  <?php dynamic_sidebar('widget-id'); ?>
</footer>

<div class="compliance">
  <div class="compliance-text col-12 text-center text-secondary py-2"><?php the_field('footer_compliance', 'option'); ?></div>
  <div class="col-12 text-center py-2"><a class="text-secondary text-decoration-none" href=<?php the_field('compliance_link', 'option'); ?>><?php the_field('link_text', 'option'); ?></a></div>
  <div class="compliance-imgs d-md-flex align-items-center justify-content-center text-center">
      <div class="text-center"><img class="me-3" style="height: 40px; width: 300px" src=<?php the_field('logo_1', 'option'); ?>></div>
      <div class="d-inline"><img class="me-3" style="height: 50px; width: 143px" src=<?php the_field('logo_2', 'option'); ?>></div>
      <div class="d-inline"><img class="me-3" style="height: 45px; width: 105px" src=<?php the_field('logo_3', 'option'); ?>></div>
      <div class="text-center"><img style="height: 50px; width: 106px" src=<?php the_field('logo_4', 'option'); ?>></div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>