<?php

/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		?>

		<?php get_template_part('template-parts/content', 'product'); ?>

		<?php
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
?>
<?php get_footer(); ?>