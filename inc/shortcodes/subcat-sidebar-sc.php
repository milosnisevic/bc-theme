<?php

// Subcategories sidebar shortcode
add_shortcode('subcategories_sidebar', 'subcategoriesSidebar');

function subcategoriesSidebar( $atts ) {
  $atts = shortcode_atts( array(
      'category' => '',
  ), $atts);

  $subcategories = [];

  if ( $atts['category'] ) {
      $parent_category = get_category_by_slug( $atts['category'] );

      $subcategories = get_categories( array(
          'orderby' => 'name',
          'hide_empty' => false,
          'taxonomy' => 'category',
          'child_of' => $parent_category->term_id
      ) );
  }

  ob_start();

  if ( count( $subcategories ) > 0 ) {
      foreach ( $subcategories as $subcategory ) {
        $subcategory_link = get_term_link( $subcategory );
        if ( ! is_wp_error( $subcategory_link ) ) {
            get_template_part( 'template-parts/subcategories-sidebar', null, [
                'subcategory_name' => $subcategory->name,
                'subcategory_link' => $subcategory_link,
            ] );
        }
      }
  }
  wp_reset_postdata();

  return ob_get_clean();
}

?>