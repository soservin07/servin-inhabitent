<?php

/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */
if (!is_singular('adventures')) {

	get_header();
} else {
	get_template_part('template-parts/header', 'front');
}
$tmpClass = '';
$tmpClass2 = '';
if (is_singular('adventures')) {
	$tmpClass = 'area-adventures';
	$tmpClass2 = 'main-adventures';
}

?>

<div id="primary" class="si-area <?= $tmpClass ?>">
	<main id="main" class="si-main <?= $tmpClass2 ?>" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part('template-parts/content', 'single'); ?>

			<?php //the_post_navigation(); 
				?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				// if (comments_open() || get_comments_number()) :
				// 	comments_template();
				// endif;
				?>

		<?php endwhile; // End of the loop. 
		?>

	</main><!-- #main -->
	<?php
	if (!is_singular('adventures')) {

		get_sidebar();
	}
	?>
</div><!-- #primary -->


<?php get_footer(); ?>