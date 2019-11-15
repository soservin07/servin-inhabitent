<?php

/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */
$query = 'select distinct a.slug from wp_terms as a inner join wp_term_taxonomy as b where a.term_id=b.term_taxonomy_id order by ASC';
$args = array(
	'taxonomy' => 'product-type',
	'order' => 'ASC',
);
$arrays = new WP_Term_Query($args);
// $taxs = get_terms(array('taxonomy' => 'product-type'));
// var_dump($arrays);
$imgPath = '';

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<section class="shop-stuff">
			<!--START CODING for geting SHOP STUFF-TAXONOMIES****-->
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
		<!--END CODING for shop stuff-->
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => '10',
			'order' => 'DESC'
		);
		$journal_posts = new WP_Query($args);
		?>
		<section class="inhabitent-journal">
			<h2>INHABITENT JOURNAL</h2>
			<div>
				<?php

				if ($journal_posts->have_posts()) {
					echo '<ul>';
					while ($journal_posts->have_posts()) {
						$journal_posts->the_post();
						the_post_thumbnail('medium');
						echo '<h2>' . get_the_title() . '</h2>';
						echo get_comments_number() . " comments";
					}
				}

				// if ($arrays->have_posts()) {
				// 	foreach ($arrays->have_posts() as $x) {
				// 		$x->the_post();
				// 		the_title();
				// 	}
				// while ($arrays->have_posts()) {
				// 	$arrays->the_post();
				// 	the_title();
				// 	the_date();
				// 	the_permalink();
				// }
				// }
				// the_post_navigation();
				// wp_reset_postdata();
				?>
				<pre>
<?php
// print_r($arrays); 
?>
</pre>

			</div>
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