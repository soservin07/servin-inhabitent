<?php

/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header();

?>

<div id="primary" class="home-area">
	<main id="main" class="home-main" role="main">
	<h2 class="page-title">
		<?=get_the_archive_title()?>
	</h2>


		<?php
			echo '<ul class="home-list">';
			while(have_posts()){
				the_post();
				$url = get_permalink(); ?>
		<li>
			<nav>
				<?php the_post_thumbnail('large'); ?>
				<h2><a href=" <?php echo $url; ?> "><?php echo the_title(); ?></a>
				</h2>
				<span><?php print get_the_date('d F Y') ?>&nbsp|&nbsp <?php print get_comments_number() ?> Comments &nbsp|&nbsp By <?php print get_author_name() ?>
				</span>
			</nav>
			<p><?php
						echo the_excerpt();

						?>
			</p>
			<a href="<?php echo $url; ?>" class="read-more">READ MORE <i class="fa fa-long-arrow-alt-right"></i></a>
		</li>
		<?php
			}
			echo '</ul>';
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