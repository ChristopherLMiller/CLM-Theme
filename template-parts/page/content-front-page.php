<?php
/**
 * Displays content for front page
 * 
 * @package CLM
 * @since 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h2 class="entry-title"><a href="<?php echo $post->guid; ?>"><?php the_title(); ?></a></h2>
  <div class="background">
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

      <p class="posted"><?php echo the_time('j M, Y @ G:i'); ?></p>
      <?php
				/* translators: %s: Name of current post */
				the_content(
				  sprintf(
				  	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'CLM' ),
				  	get_the_title()
				  )
				);
			?>
      <?php edit_post_link(); ?>
    </div>
  </div>
</article>