<?php
// check that this gallery is available to be seen by the user, if not redirect to the gallery home page
if (!clm_gallery::get_instance()->user_can_view_gallery(get_the_ID())) {
  var_dump(site_url('/gallery'));
  wp_redirect( site_url('/gallery') );
  exit;
}


get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>
    <div class="content-wrapper">
      <header>
        <h1><?php echo single_post_title(); ?></h1>
      </header>

      <div class="content-entry">
        <div class="gallery-wrapper">
          <?php foreach (clm_gallery::get_instance()->get_images(get_the_ID()) as $image) : ?>
            <a href="<?php echo $image->guid; ?>" class="gallery-thumb">
              <img src="<?php echo get_the_post_thumbnail_url($image->ID, 'large'); ?>"/>
              <p class="caption"><?php echo $image->post_title; ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      
      <script type="text/javascript">
      </script>
    </div>
  <?php endwhile;
endif;
get_footer();