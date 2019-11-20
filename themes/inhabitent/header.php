<?php

/**
 * The header for our theme.
 *
 * @package RED_Starter_Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
	<?php
	//add_action('wp_enqueue_scripts', function () {
	//	wp_enqueue_script('jquery');
	//}); 
	?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html('Skip to content'); ?></a>

		<header id="masthead" class="main-header" role="banner">
			<div class="main-branding">
				<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="head-navigation" role="navigation">
				<?php
				get_search_form();
				wp_nav_menu(
					array(
						'theme_location' => 'top-menu',
					)
				);
				$img = get_field('main-banner');
				$img2 = get_template_directory_uri() . '/res/logos/inhabitent-logo-full.svg';
				?>

			</nav><!-- #site-navigation -->

		</header> <!-- #masthead -->

		<div id="content" class="site-content">