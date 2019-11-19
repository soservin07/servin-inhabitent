<?php

/**
 * Template part for displaying page content in page.php.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php //the_title('<h1 class="entry-title">', '</h1>'); 
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html('Pages:'),
			'after'  => '</div>',
		));
		?>
	</div>
	<?php
	if (is_page('find-us')) {
		echo '<section class="widget-section">';
		get_sidebar();
		echo '</section>';
	}
	?>
	<!-- .entry-content -->
</article><!-- #post-## -->