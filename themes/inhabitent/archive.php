<?php

/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="main-site" role="main">
		<h2>
			<?php
			$query = get_queried_object();
			if ($query->slug == 'do') {
				echo '<h2>' . strtoupper($query->slug) . '</h2>';
				the_archive_description('<div class="taxonomy-description">', '</div>');
			} else {
				wp_title('');
			}

			// the_archive_title( '<h1 class="page-title">', '</h1>' );


			?>
		</h2>

		<section class="article-content">
			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php

							the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
							?>
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('xl'); ?>
						<?php endif; ?>



						<?php if ('post' === get_post_type()) : ?>
							<div class="entry-meta">
								<?php red_starter_posted_on(); ?> / <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?> / <?php red_starter_posted_by(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php
							if (!is_post_type_archive('adventures')) {
								the_excerpt();
							} else {
								echo '<a href="' . get_permalink() . '">READ MORE</a>';
							}

							?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->


			<?php endwhile; ?>

		</section>


	</main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); 
?>
<?php get_footer(); ?>