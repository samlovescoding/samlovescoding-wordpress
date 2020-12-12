<div class="portfolio-item-heading" data-aos="fade" data-aos-duration="1000">
  <h1>
    Work Portfolio
  </h1>
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
        <a class="portfolio-item-link" href="<?php the_permalink(); ?>">
          <div class="portfolio-item" data-aos="fade">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('portfolio-thumbnail', [
                'class' => 'portfolio-item-image'
              ]);
            }
            ?>
            <div class="portfolio-item-meta">
              <div class="portfolio-item-title"><?php the_title(); ?></div>
              <div class="portfolio-item-category">
                <?php
                $tags_string = "";
                $tags = get_the_tags();
                foreach ($tags as $tag) {
                  $tags_string .= $tag->name . ", ";
                }
                $tags_string = trim($tags_string, ", ");
                echo $tags_string;
                ?>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php
    endwhile;
    ?>
  </div>
</div>
