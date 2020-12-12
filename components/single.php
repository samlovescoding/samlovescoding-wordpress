<div class="container-samlovescoding">

  <div class="single">
    <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post();
    ?>
        <h1 class="single-title"><?php the_title(); ?></h1>
        <div class="single-meta">

          <div class="single-meta-field">
            <div class="single-meta-field-key">Written On</div>
            <div class="single-meta-field-value"><?php the_date('M d, Y'); ?></div>
          </div>
          <div class="single-meta-field">
            <div class="single-meta-field-key">Read Time</div>
            <div class="single-meta-field-value"><?php the_field('read_time'); ?></div>
          </div>
        </div>
        <div class="single-content">
          <?php the_content(); ?>
        </div>
    <?php
      endwhile;
    endif;
    ?>
  </div>
</div>
