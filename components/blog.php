<div id="blog-post-heading" class="blog-post-heading">
  <h1>Blog</h1>
</div>
<div class="container-samlovescoding container-screen">
  <?php
  global $wp_query;
  while (have_posts()) :
    the_post();
    $index = $wp_query->current_post + 1;
  ?>
    <a class="blog-post-link" href="<?php the_permalink(); ?>">
      <div class="blog-post" data-aos="fade">
        <div class="blog-post-title"><?= $index ?>. <?php the_title(); ?></div>
        <div class="blog-post-excerpt"><?php echo get_the_excerpt(); ?></div>
      </div>
    </a>
  <?php
  endwhile;
  ?>
</div>
