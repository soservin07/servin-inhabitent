<?php

/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">
		<ul class="contact-info">
			<li>CONTACT INFO</li>
			<li><i class="fa fa-envelope"></i> <?php echo the_field('email'); ?></li>
			<li>
				<i class="fa fa-phone"></i><?php echo the_field('tel-no'); ?>
			</li>
			<li><a href="#"><i class="fa fa-facebook-square"></i></a>
				<a href="#"><i class="fa fa-twitter-square"></i></a>
				<a href="#"><i class="fa fa-google-plus-g"></i></a>
			</li>
		</ul>
		<ul class="business-hour">
			<li>BUSINESS HOURS</li>
			<li><strong>Monday-Friday : </strong><?php the_field('sched1'); ?></li>
			<li><strong>Saturday : </strong><?php echo the_field('sched2'); ?></li>
			<li><strong>Sunday : </strong><?php echo the_field('sched3'); ?></li>
		</ul>
	</div> <!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>

</html>