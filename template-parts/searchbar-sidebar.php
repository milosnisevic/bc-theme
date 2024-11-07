<div class="results-wrapper">

  <form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="search-form d-flex gap-1 mb-3">
    <input autocomplete=off type="search" id="" class="rounded-4 search-wrapper w-100 py-2" name="s" value="<?php echo get_search_query() ?>" placeholder="<?php esc_html_e($args['atts']['placeholder']); ?>"  required />
    <button type="submit" class="search-btn rounded-4 border-0"><i class="fa-solid fa-magnifying-glass"></i></button>
  </form>
  
  <div class="results search-overlay" data-limit="<?php echo $args['posts_per_page'] ?>">
    
  </div>

</div>
    
  
