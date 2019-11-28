<?php

/**
 * Template part for displaying page content in page.php.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title">
            <?php
            if (is_post_type_archive('product')) {
                echo 'SHOP STUFF';
            }
            ?>
        </h1>
    </header><!-- .entry-header -->

    <div class="page-content">
        <ul>

            <?php
            $tmp = '';
            $terms = get_terms(array(
                'taxonomy' => 'product-type'
            ));
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $x) {
                    $tmp .= '<li><a href="' . get_term_link($x) . '">' . $x->slug . '</a></li>';
                }
                echo $tmp;
            }

            ?>

            <?php
            // wp_link_pages( array(
            // 	'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
            // 	'after'  => '</div>',
            // ) );
            ?>
        </ul>
        <section class="product-list">

            <ul>
                <?php
                $args = array(
                    'numberposts'        => -1, // -1 is for all
                    'post_type'        => 'product', // or 'post', 'page'
                    'tax_query' => array('taxonomy' => 'product-type'),
                    'orderby' => 'title',
                    'order' => 'ASC'

                );
                $tmp = '';
                $posts = get_posts($args);
                foreach ($posts as $x) {

                    setup_postdata($x);
                    $tmp .= '<li><a href="' . $x->guid . '">
							<nav>' . get_the_post_thumbnail($x->ID, 'medium') . '</nav>
							<span><h2>' . get_the_title($x) . '</h2> <p>$' . number_format(get_field('product-price', $x->ID), 2, ".", ",") . '</p></span>
						</a></li>';
                }
                echo $tmp;
                ?>
            </ul>
        </section>
    </div><!-- .entry-content -->
</article><!-- #post-## -->