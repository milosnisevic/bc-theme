<?php

// Hero section shortcode
function my_four_columns_shortcode( $atts ) {
  extract( shortcode_atts( array(
      'icon1' => '',
      'title1' => '',
      'icon2' => '',
      'title2' => '',
      'icon3' => '',
      'title3' => '',
      'icon4' => '',
      'title4' => '',
  ), $atts ) );

  $output = '<div class="four-columns mb-5 d-flex py-2 flex-wrap rounded-3 bg-dark text-light">';
  $output .= '<div class="column col-6 col-md-3 d-flex gap-2 border-end justify-content-start justify-content-md-center">';
  $output .= '<div class="icon"><i class="' . $icon1 . '"></i></div>';
  $output .= '<div class="title">' . $title1 . '</div>';
  $output .= '</div>';
  $output .= '<div class="column col-6 col-md-3 d-flex gap-2 border-end justify-content-start justify-content-md-center">';
  $output .= '<div class="icon"><i class="' . $icon2 . '"></i></div>';
  $output .= '<div class="title">' . $title2 . '</div>';
  $output .= '</div>';
  $output .= '<div class="column col-6 col-md-3 d-flex gap-2 border-end justify-content-start justify-content-md-center">';
  $output .= '<div class="icon"><i class="' . $icon3 . '"></i></div>';
  $output .= '<div class="title">' . $title3 . '</div>';
  $output .= '</div>';
  $output .= '<div class="column col-6 col-md-3 d-flex gap-2 justify-content-start justify-content-md-center">';
  $output .= '<div class="icon"><i class="' . $icon4 . '"></i></div>';
  $output .= '<div class="title">' . $title4 . '</div>';
  $output .= '</div>';
  $output .= '</div>';

  return $output;
}
add_shortcode( 'four_columns', 'my_four_columns_shortcode' );

?>