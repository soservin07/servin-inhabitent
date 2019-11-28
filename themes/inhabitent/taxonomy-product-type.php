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
            echo '<h2>' . strtoupper($query->slug) . '</h2>';
            the_archive_description('<div class="taxonomy-description">', '</div>');

            ?>
        </h2>

        <section class="tax-content">
            <?php /******************Start the Loop */ ?>
            <?php while (have_posts()) : the_post();
                $price = number_format(get_field('product-price', get_the_ID()), 2, ".", ","); ?>


                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class=" tax-header">
                        <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('large');
                            }
                            echo '<h2 class="tax-title"><a href="' . get_permalink() . '">' . get_the_title() . '<p>$' . $price . '</p></a></h2>';

                            ?>


                    </header><!-- .entry-header -->

                    <!-- <div class="entry-content">
                        <?php
                            // if (!is_post_type_archive('adventures')) {
                            //     the_excerpt();
                            // } else {
                            //     echo '<a href="' . get_permalink() . '">READ MORE</a>';
                            // }

                            ?>
                    </div> -->
                </article><!-- #post-## -->


            <?php endwhile; ?>

        </section>


    </main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); 
?>
<?php get_footer(); ?>