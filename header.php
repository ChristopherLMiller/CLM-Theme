<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#982929">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/manifest.json">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<!-- Site navigation sidebar-->
		<aside class="navigation-sidebar slideInLeft">
			<div class="page-title">
				<img src="<?php $image = wp_get_attachment_image_src(get_theme_mod( 'custom_logo' ), 'full'); echo $image[0]; ?>" />
				<a class="animated BounceInLeft" href="<?php echo esc_url( home_url( '/' ) ); ?>"><h2><span class="block">C</span>hristopher <span class="block">L</span>ee <span class="block">M</span>iller</h2></a>
				<h3><?php echo get_bloginfo('description'); ?></h3>
			</div>
			<nav>
				<?php wp_nav_menu(array(
					'theme_location' => 'primary',				
				)); ?>
			</nav>
			<div class="social-media">
				<ul>
					<li class="faa-pulse animated-hover">
						<a href="https://www.facebook.com/chris.miller.54943">
							<span class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-facebook fa-stack-1x"></i>
							</span>
						</a>
					</li>
					<li class="faa-pulse animated-hover">
						<a href="https://github.com/ChristopherLMiller">
							<span class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-github-alt fa-stack-1x"></i>
							</span>
						</a>
					</li>
					<li class="faa-pulse animated-hover">
						<a href="www.linkedin.com/in/christopher-l-miller">
							<span class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-linkedin fa-stack-1x"></i>
							</span>
						</a>
					</li>
					<li class="faa-pulse animated-hover">
						<a href="https://twitter.com/moose517">
							<span class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-twitter fa-stack-1x"></i>
							</span>
						</a>
					</li>
			</div>
		</aside>
    <aside class="mobile-navigation">
      <div class="page-title">
        <button class="hamburger hamburger--spin" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h2><span class="block">C</span>hristopher <span class="block">L</span>ee <span class="block">M</span>iller</h2></a>
      </div>
      <nav>
				<?php wp_nav_menu(array(
					'theme_location' => 'primary',				
				)); ?>
			</nav>
    </aside>

		<!-- Begin output of content -->
		<main>
