<?php

/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header();
$args=array(
	'post_type'=>'post',
	'numberposts'=>-1,
	'orderby'=>'title',
	'order'=>'DESC');
$query=get_posts($args);
?>

<div id="primary" class="home-area">
	<main id="main" class="home-main" role="main">

	

	<?php 
	if(is_page('find-us')){
		 while (have_posts()) : the_post(); 
		get_template_part('template-parts/content', 'page');
	 	endwhile; // End of the loop.
	}
	elseif(is_page('home')){
		echo '<ul class="home-list">';
	

		echo '</ul>';
	}
	 ?>

	

	

	
		

	</main><!-- #main -->
	<?php get_sidebar(); 
?>
</div><!-- #primary -->


<?php get_footer(); ?>