<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="content">
    
    <?php if ( has_post_thumbnail() ) :
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

        // Calculate aspect ratio: h / w * 100%.
		    $ratio = $thumbnail[2] / $thumbnail[1] * 100;
		  ?>

		  <div class="featured-image" style="background: url(<?php echo esc_url( $thumbnail[0] ); ?>) no-repeat; background-size: cover;">
			  <div class="featured-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		  </div>
    <?php endif; ?>
    <h2 class="article-title"><?php the_title(); ?></h2>
    <p class="posted"><?php echo the_time('j M, Y @ G:i'); ?></p>
    <?php
			/* translators: %s: Name of current post */
			the_content(
			  sprintf(
			  	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'CLM' ),
			  	get_the_title()
			  )
			);
      
      wp_link_pages(
        array(
          'before'      => '<div class="page-links">' . __('Pages:', 'CLM'),
          'after'       => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after'  => '</span>'
        )
      );
		?>
    <?php edit_post_link(); ?>
	</div>
</article>
