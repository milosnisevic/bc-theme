<div class="registration d-flex flex-column gap-3 flex-md-row justify-content-evenly my-5">
  <?php if( have_rows('registration_steps') ):
      while( have_rows('registration_steps') ): the_row(); ?>
    <div class="registration-box">
     <h5 class="fw-bold mb-3"><?php esc_html(the_sub_field('registration_steps_title')); ?></h5>
     <p><?php esc_html(the_sub_field('registration_steps_content')); ?></p>
    </div>

  <?php endwhile;
    
  endif; ?>
</div>