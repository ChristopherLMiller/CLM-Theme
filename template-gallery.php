<?php
/* Template Name: Gallery Page */

get_header(); ?>

<div class="content-wrapper">
	<header>
		<h1><?php echo single_post_title(); ?></h1>
	</header>
	<div class="content-entry">
    
    <?php get_template_part('template-parts/post/content', 'nodate'); ?>
    
    <div class="gallery-buttons">
      <button class="category_selection" data-name="all">All</button>
      <?php foreach (clm_gallery::get_instance()->get_all_gallery_categories() as $category) : ?>
        <button class="category_selection" data-name="<?php echo $category->name; ?>"><?php echo $category->name; ?></button>
      <?php endforeach; ?>
    </div>
    
    <div class="gallery-wrapper">
      <?php foreach (clm_gallery::get_instance()->get_galleries() as $gallery) : 
        $url = clm_gallery::get_instance()->get_featured_gallery_image($gallery->ID);
        $deg = rand(-10, 10); ?>
        <div class="gallery-thumb <?php echo clm_gallery::get_instance()->get_gallery_categories($gallery->ID); ?>" style="transform: rotateZ(<?php echo $deg; ?>deg);" data-category="">
          <a href="<?php echo $gallery->guid; ?>">
            <img src="<?php echo $url; ?>" />
            <p class="caption"><?php echo $gallery->post_title; ?> (<?php echo clm_gallery::get_instance()->get_num_images($gallery->ID); ?> images)</p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
	</div>
</div>

<script type="text/javascript">
  jQuery(document).ready(($) => {
    $('.category_selection').click((event) => {
      let category_name = $(event.target).data('name');

      $('.gallery-thumb').fadeOut(100);
      $(`.${category_name}`).fadeIn(200);

      if (category_name == "all") {
        $('.gallery-thumb').fadeIn(200);
      }
    });
  });
</script>
<?php get_footer();