<?php
/* Archive
 * @package CLM
 */
global $post;
get_header(); ?>

<div class="content-wrapper">
	<header>
		<h1>Archives From My Desk</h1>
	</header>

	<div class="content-entry">
	
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', get_post_format() );
				endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
	</div>
</div>

<?php get_footer();