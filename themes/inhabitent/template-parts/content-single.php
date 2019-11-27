<?php

/**
 * Template part for displaying single posts.
 *
 * @package RED_Starter_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php

		if (is_singular('product')) {
			if (has_post_thumbnail()) {
				the_post_thumbnail('large');
			}
			the_title('<h1 class="entry-title">', '</h1>');
			echo  'the price was ---> $';
			the_field('product-price');
		} elseif (is_singular('adventures')) {
			$tmpClass = 'title-adventures';
			if (has_post_thumbnail()) {
				the_post_thumbnail('full');
			}
			the_title('<h1 class="entry-title ' . $tmpClass . '">', '</h1>');
		}
		?>


		<?php

		if (!is_singular('adventures')) {

			echo '<div class="entry-meta journal-meta">';
			echo '<nav>';
			the_post_thumbnail('full');
			the_title('<h1 class="entry-title">', '</h1>');
			
			echo '<nav class="post-entry">';
			red_starter_posted_on();
			red_starter_comment_count();
			red_starter_posted_by();
			echo '</nav>';

			echo '</nav></div>';
		} else {
			red_starter_posted_by(); //for adventures singular page
		}



		?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content();
		if (!is_singular('adventures')) {
			
			red_starter_entry_footer();
		}

		
		?>
	</div><!-- .entry-content -->


	<footer class="entry-footer">
		<ul class="social-sites">
			<li><a href="fb.com">
					<i class="fa fa-facebook-square"></i>LIKE
				</a></li>
			<li><a href="twitter.com">
					<i class="fa fa-twitter-square"></i>TWEET
				</a></li>
			<li><a href="pinterest.com">
					<i class="fa fa-pinterest-square"></i>PIN
				</a></li>
		</ul>
		
		<?php
		// red_starter_comment_count();

		comments_template();

		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->