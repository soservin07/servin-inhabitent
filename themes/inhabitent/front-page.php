<?php

/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */
/**************************************START CODING for geting SHOP STUFF-TAXONOMIES****/
$args = array(
	'taxonomy' => 'product-type',
	'order' => 'ASC',
);
$arrays = new WP_Term_Query($args);

$imgPath = '';
get_template_part('template-parts/header', 'front');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<section class="shop-stuff">

			<h2> SHOP STUFF</h2>
			<div>
				<ul class="shop-list">
					<?php
					// if (has_tag($taxs)) : return;
					// endif;
					$query = '';
					foreach ($arrays->get_terms() as $x) {

						$imgPath = set_img_path($x->slug);
						$query .= '<li>
					<img src="' . $imgPath . '" alt="' . $x->name . '" >
					<p>' . $x->description . '</p>
					<a href="' . get_term_link($x) . '"><p>' . $x->name . '</p></a>
					</li>';
					}

					echo $query;
					wp_reset_postdata();
					wp_reset_query();
					?>

				</ul>
			</div>
		</section>
		<!--END CODING for shop stuff
		*************START for CODING JOURNAL SECTION***************
		-->
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => '3',
			'orderby' => array('title' => 'DESC')
		);
		$journal_posts = new WP_Query($args);
		?>
		<section class="inhabitent-journal">
			<h2>INHABITENT JOURNAL</h2>
			<?php

			if ($journal_posts->have_posts()) {
				$query = '<ul>';
				while ($journal_posts->have_posts()) {
					$journal_posts->the_post();
					$query .= '<li>';
					$query .= '<nav>' . get_the_post_thumbnail($journal_posts->post_id, 'medium') . '</nav>';
					$query .= '<p>' . get_the_date('d F Y') . ' / ' . get_comments_number() . ' Comments</p>';
					$query .= '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
					$query .= '<a href="' . get_the_permalink() . '" class="read-entry">READ ENTRY</a>';
					$query .= '</li>';
				}
				$query .= '</ul>';
				echo $query;
			}

			wp_reset_postdata();
			?>
		</section>
		<!--END CODING for Journal
		*************START CODING for Latest ADVENTURES***************
		-->
		<?php
		$args = array(
			'post_type' => 'adventures',
			'posts_per_page' => '4',
			'orderby' => array('publish_date' => 'ASC')
		);
		$journal_posts = new WP_Query($args);
		?>
		<section class="latest-adv">
			<h2>LATEST ADVENTURES</h2>
			<?php
			if ($journal_posts->have_posts()) {
				$query = '<ul>';
				while ($journal_posts->have_posts()) {
					$journal_posts->the_post();
					$query .= '<li>
								' . get_the_post_thumbnail($journal_posts->post_id, 'medium') . '
								<h2>
								<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
								</h2>
								<a href="' . get_the_permalink() . '">READ MORE</a>';

					$query .= '</li>';
				}
				$query .= '</ul>';
				$query .= '<a href="' . get_post_type_archive_link('adventures') . '" class="more-adv">MORE ADVENTURES</a>';

				echo $query;
			}

			wp_reset_postdata();
			?>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

<?php
function  set_img_path($name)
{
	$tmpPath = '';
	switch ($name) {
		case 'do':
			$tmpPath = get_template_directory_uri() . '/res/icons/do.svg';
			break;
		case 'eat':
			$tmpPath = get_template_directory_uri() . '/res/icons/eat.svg';
			break;
		case 'sleep':
			$tmpPath = get_template_directory_uri() . '/res/icons/sleep.svg';
			break;
		case 'wear':
			$tmpPath = get_template_directory_uri() . '/res/icons/wear.svg';
			break;
	}
	// echo $tmpPath;
	return $tmpPath;
}
?>