<?php 
    if($args['count'] === 1) {
      ?>
      <div class="featured col-12 col-lg-6 p-1 mt-2 mb-2">
				<div class="col-12 d-flex flex-wrap">
						<a href="<?php esc_url(the_permalink()); ?>">
              <div class="badge rounded-pill bg-light text-dark fw-bold py-2 px-3 position-absolute m-3">FEATURED</div>
              <img class="rounded-4 w-100" src="<?php echo esc_html(get_the_post_thumbnail_url()); ?>" alt="Featured image">
						  <div class="col-12 mt-3 text-dark">
                <div class=""><?php echo esc_attr(get_the_date()); ?></div>
                <h4 class="mt-2 fw-bold lines-2"><?php esc_html(the_title()); ?></h4>
              </div>
            </a>
					</div>
        </div>
        <div class="unfeatured col-12 col-lg-6">
      <?php
    } else {
      if($args['count'] > 1) {
      }
      ?>
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
     <?php
    }
    ?> 
    
    
