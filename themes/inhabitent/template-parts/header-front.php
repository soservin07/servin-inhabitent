<?php

/**
 * The header for our theme.
 *
 * @package RED_Starter_Theme
 */
$tmpDisplay = 'flex';
$img = get_field('front-banner');
$img2 = get_template_directory_uri() . '/res/logos/inhabitent-logo-full.svg';
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

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
				get_search_form();
				wp_nav_menu(
					array(
						'theme_location' => 'top-menu',
					)
				);

				?>

				<!-- <button class="search-link">
					<i class="fa fa-search"></i>
				</button> -->
			</nav><!-- #site-navigation -->
			<?php

			if (is_single() || is_page('about')) {
				$tmpDisplay = 'none';
			}
			?>
			<div class="head-pic" style='background: linear-gradient(rgba(0,0,0,0.25),rgba(0,0,0,0.10)),url("<?php print $img["url"]; ?>");background-size:100vmax;background-position:left top;display: <?php print $tmpDisplay; ?> '>
				<img class="logo-bilog" src=" <?php print $img2; ?>" alt="inhabitent">;

			</div>

		</header> <!-- #masthead -->

		<div id="content" class="site-content">