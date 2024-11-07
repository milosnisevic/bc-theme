<?php get_header(); ?>


<?php 

if (get_page_template_slug() === 'templates/full-width.php') {
  get_template_part('templates/full-width');
} else if (get_page_template_slug() === 'templates/sidebar-left.php') {
  get_template_part('templates/sidebar-left');
} else {
  get_template_part('templates/sidebar-right');
}

?>


<?php  get_footer(); ?>