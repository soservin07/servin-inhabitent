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
				$img = get_field('front-banner');
				$img2 = get_template_directory_uri() . '/res/logos/inhabitent-logo-full.svg';
				?>

				<!-- <button class="search-link">
					<i class="fa fa-search"></i>
				</button> -->
			</nav><!-- #site-navigation -->
			<?php
				$tmpDisplay='block';
				if(is_single()){
					$tmpDisplay='none';
				}
			?>
			<div class="head-pic" style='background: linear-gradient(
						to bottom,
						rgba(0, 0, 0, 0.3),
						0,
						rgba(0, 0, 0, 0.2)
						),
						url("<?php echo $img2;?>"),url(" <?php echo $img['url'];?> ");
						background-repeat:no-repeat;
						background-size:100vmax,15vmax;
						background-position:left top ,center;
						display:<?php echo $tmpDisplay; ?>'>
						</div>
			
		</header> <!-- #masthead -->

		<div id="content" class="site-content">