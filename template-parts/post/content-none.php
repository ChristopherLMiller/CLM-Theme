<?php
/**
 * Template part for displaying a message that posts cannot be found
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
    <h1><?php _e( '404 Not Found.', 'CLM' ); ?></h1>
    <p>The page you are looking for seems to have vanished, or just never existed.  Try giving it a search, and if you believe this an error contact the administrator.</p>
		<?php get_search_form();?>
	</div>
</article>