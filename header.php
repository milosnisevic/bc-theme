<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
 </head>
<body <?php body_class(); ?>>
<header class="border-bottom">
 <div class="upper-header col-12 text-center text-secondary fs-0 py-3"><?php the_field('header_compliance', 'option'); ?></div>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <div class="navbar-brand">
        <?php echo get_custom_logo(); ?>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-grow-0" id="navbarNavDropdown">
        <?php wp_nav_menu([
          'theme_location' => 'headerMenuLocation',
          'menu_class' => 'navbar-nav',
          'sub_menu_class' => 'dropdown-menu',
        ]); ?>
      </div>
    </div>
  </nav>
</header>
  
