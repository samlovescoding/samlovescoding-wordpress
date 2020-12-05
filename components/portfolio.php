<div class="portfolio-item-heading">
  <h1>Work Portfolio</h1>
</div>

<div class="container-samlovescoding">
  <div class="row">
    <?php
    $query = new WP_Query([
      'post_type' => 'portfolio'
    ]);
    while ($query->have_posts()) :
      $query->the_post();
    ?>
      <div class="col-md-6 portfolio-item-container">
        <div class="portfolio-item">
          <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail('portfolio-thumbnail');
          }
          ?>
          <div class="portfolio-item-title"><?php the_title(); ?></div>
        </div>
      </div>
    <?php
    endwhile;
    ?>
  </div>
</div>
