<div class="blog-post-heading">
  <h1>Blog</h1>
</div>

<div class="container-samlovescoding">
  <?php
  while (have_posts()) :
    the_post();
  ?>
    <div class="blog-post">
      <div class="blog-post-title"><?php the_title(); ?></div>
      <div class="blog-post-excerpt"><?php echo get_the_excerpt(); ?></div>
    </div>
  <?php
  endwhile;
  ?>
</div>
