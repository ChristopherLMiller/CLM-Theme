
<?php
/**
* The template used to display archive content
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="content">
    <?php the_content(); ?>


  <?php
  $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
  if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;

  $my_query = new WP_Query('post_type=post&nopaging=1');
  if($my_query->have_posts()) {
    echo '<h1 class="widget-title">Last '.$how_many_last_posts.' Posts <i class="fa fa-bullhorn" style="vertical-align: baseline;"></i></h1>&nbsp;';
    echo '<div class="archives-latest-section"><ol>';
    $counter = 1;
    while($my_query->have_posts() && $counter <= $how_many_last_posts) {
      $my_query->the_post();
      ?>
      <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
      <?php
      $counter++;
    }
    echo '</ol></div>';
    wp_reset_postdata();
  }
  ?>

  <h1 class="widget-title">Our Authors <i class="fa fa-user" style="vertical-align: baseline;"></i></h1>&nbsp;
  <div class="archives-authors-section">
    <ul>
      <?php wp_list_authors('exclude_admin=0&optioncount=1'); ?>
    </ul>
  </div>

  <h1 class="widget-title">By Month <i class="fa fa-calendar" style="vertical-align: baseline;"></i></h1>&nbsp;
  <div class="archives-by-month-section">
    <p><?php wp_get_archives('type=monthly&format=custom&after= |'); ?></p>
  </div>

</div><!-- .entry-content -->

</article><!-- #post-## -->
