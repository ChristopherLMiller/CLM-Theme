<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div class="content-wrapper">
  <header>
    <h1>Archives</h1>
  </header>

  <div class="content-entry">
    <?php if ( have_posts() ) : ?>
      <?php while (have_posts() ) : the_post();
        get_template_part('template-parts/post/content', 'tmpl_archives' );
      endwhile;

      the_posts_pagination(
        array(
          'prev_text'       => '<span class="screen-reader-text">' . __('Previous Page', 'CLM' ) . '</span>',
          'next_text'       => '<span class="screen-reader-text">' . __('Next Page', 'CLM' ) . '</span>',
          'before_page_number'  => '<span class="meta-nav screen-reader-text' . __('Page', 'CLM' ) . ' </span>',
        )
      );

    else: 
      get_template_part('template-parts/post/content', 'none');
    endif; ?>
    <div class="sidebar">
    <?php get_sidebar('archive'); ?>
  </div>
  </div>
</div>
<?php get_footer(); ?>