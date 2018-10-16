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
          <a
              href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" 
              class="gallery-thumb foobox" 
              rel="gallery"
            >
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"/>
            <p class="caption"><?php echo get_the_content(); ?></p>
          </a>
        </div>
      </div>
      
      <script type="text/javascript">
      </script>
    </div>
  <?php endwhile;
endif;
get_footer();