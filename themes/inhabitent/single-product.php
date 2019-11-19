<?php

/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */
	get_header();

$tmp='';
?>

<div id="primary" class="single-area">
	<main id="main" class="single-main" role="main">
    <ul>

        <?php while (have_posts()) : the_post(); ?>
           <li> <?=the_post_thumbnail('large')?> </li>
            <li><?=the_title()?></li>
            <li>$ <?=number_format(the_field('product-price'), 2, ".")?></li>
            <li><?=the_content()?></li>
            <li><i class="fa fa-facebook-f">&nbsp LIKE</i>
            <i class="fa fa-twitter">&nbsp TWEET</i>
            <i class="fa fa-pinterest">&nbsp PIN</i></li>
            
        <?php endwhile; 
        ?>
    </ul>
	</main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>