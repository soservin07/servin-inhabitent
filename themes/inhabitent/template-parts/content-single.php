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
			if(has_post_thumbnail()){
				the_post_thumbnail('large'); 
			}
			the_title('<h1 class="entry-title">', '</h1>');
			echo  'the price was ---> $';
			the_field('product-price');
		}
		else{
			if(has_post_thumbnail()){
				the_post_thumbnail('full'); 
			}
			the_title('<h1 class="entry-title">', '</h1>');
		}
		?>

		<div class="entry-meta">
			<?php
			if(!is_singular('adventures')){
				red_starter_posted_on();
				echo '/'  ;
				red_starter_comment_count();
				echo ' / ';
				red_starter_posted_by();
			}
			else{
				red_starter_posted_by();//for adventures singular page
			}
			
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php


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
		<?php //red_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->