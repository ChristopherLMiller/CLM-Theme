<?php
/* Template Name: No Date
 * Main template file
 * @package CLM
 */
global $post;
get_header(); ?>

<div class="content-wrapper">
	<header>
		<h1><?php echo the_title(); ?></h1>
	</header>

	<div class="content-entry">
	
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', 'nodate' );
				endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
	</div>
</div>

<?php get_footer();
