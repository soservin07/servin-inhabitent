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
		$query=get_queried_object();
		if($query->slug=='do'){
			echo '<h2>'. strtoupper($query->slug).'</h2>';
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		}
		else{
			wp_title('');
		}
		
		// the_archive_title( '<h1 class="page-title">', '</h1>' );
		
	
		?>
		</h2>

		<section class="article-content">

			<?php 
			if($query->slug=='do'){
				$posts=get_posts(array('post_type'=>'product','numberposts'=>-1,'orderby'=>'post_title','tax_query'=>array('taxonomy'=>'products_type',
				'field'=>'slug','terms'=>'do')));
			echo '<pre>';
				print_r($posts);
			echo '</pre>';
			}
			else{
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); 
		
						get_template_part( 'template-parts/content' );
		
					endwhile; 
				else : 
					get_template_part( 'template-parts/content', 'none' );
				endif;
			}
			wp_reset_postdata();
			
			?>

			<?php //the_posts_navigation(); ?>

			</section>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
