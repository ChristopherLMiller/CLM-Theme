<?php
/* Main template file
 * @package CLM
 */
get_header(); ?>

<div class="content-wrapper">
  <header>
		<h1>Recents From My Desk</h1>
  </header>
  
	<div class="content-entry">
    <?php while (have_posts()) : the_post();
      get_template_part('template-parts/page/content', 'front-page');
    endwhile; ?>
	</div>
</div>

<?php get_footer();
