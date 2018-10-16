<?php
get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>
    <div class="content-wrapper">
      <header>
        <h1><?php echo single_post_title(); ?></h1>
      </header>

      <div class="content-entry">
        <div class="gallery-wrapper">
        </div>
      </div>
      
      <script type="text/javascript">
      </script>
    </div>
  <?php endwhile;
endif;
get_footer();