<div class="unfeatured col-12 col-lg-6">
  <div class="col-12 p-1 mt-2 mb-2">
    <a href="<?php esc_url(the_permalink()); ?>">
      <div class="text-dark d-flex gap-3">
        <img class="col-12 d-block rounded-4" src="<?php echo esc_html(get_the_post_thumbnail_url()); ?>" style="height: 90px; width: 90px" alt="News image">
          <div class="latest-news-text">
          <div class="latest-news-date"><?php echo esc_attr(get_the_date()); ?></div>
          <h4 class="latest-news-title fw-bold lines-2"><?php esc_html(the_title()); ?></h4>
        </div>
      </div>
    </a>
  </div>
</div>


    
    
    