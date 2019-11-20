<?php

/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header();
$args = array(
	'post_type' => 'post',
	'numberposts' => -1,
	'orderby' => 'title',
	'order' => 'DESC',
	'post_excerpt' => 200
);
$query = get_posts($args);
?>

<div id="primary" class="home-area">
	<main id="main" class="home-main" role="main">



		<?php
		if (is_page('find-us')) {
			while (have_posts()) : the_post();
				get_template_part('template-parts/content', 'page');
			endwhile; // End of the loop.
		} elseif (is_page('journal')) {
			echo '<ul class="home-list">';
			foreach ($query as $x) {
				setup_postdata($x);
				// echo get_the_post_thumbnail($x, 'large');
				// echo get_the_title($x);
				// echo get_the_date('d F Y', $x);
				// echo get_comments_number($x);
				// echo get_author_name($x->post_author);
				// echo $x->post_content;
				$url = get_permalink($x); ?>
				<li>
					<nav>
						<?php echo get_the_post_thumbnail($x, 'large'); ?>
						<h2><a href=" <?php echo $url; ?> "><?php echo get_the_title($x); ?></a>
						</h2>
						<span><?php print get_the_date('d F Y', $x) ?>&nbsp|&nbsp <?php print get_comments_number($x) ?> Comments &nbsp|&nbsp By:<?php print get_author_name($x->post_author) ?>
						</span>
					</nav>
					<p><?php
								echo get_excerpt_by_id($x->ID);

								?>
					</p>
					<a href="<?php echo $url; ?>" class="read-more">READ MORE <i class="fa fa-long-arrow-alt-right"></i></a>
				</li>
		<?php
			}
			echo '</ul>';
		}
		?>



	</main><!-- #main -->
	<?php get_sidebar();
	?>
</div><!-- #primary -->


<?php get_footer();

function get_excerpt_by_id($post_id)
{
	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = ($the_post ? $the_post->post_content : null); //Gets post_content to be used as a basis for the excerpt
	$excerpt_length = 50; //Sets excerpt length by word count
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);

	if (count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '[....]');
		$the_excerpt = implode(' ', $words);
	endif;

	return $the_excerpt;
}

?>