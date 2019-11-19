<?php

/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */
if (is_page('about')) {
    get_template_part('template-parts/header', 'front');
} else {
    get_header();
}
?>

<div id="primary" class="content-area">
    <main id="main" class="about-main" role="main">
        <div class="about-banner">

            <?php
            the_post_thumbnail('full');
            the_title('<h2>', '</h2>');
            ?>
        </div>
        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content', 'page'); ?>

        <?php endwhile; // End of the loop. 
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); 
?>
<?php get_footer(); ?>