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
			<li><i class="fa fa-envelope"></i> info@inhabitent.com</li>
			<li>
				<i class="fa fa-phone"></i>(+1)-778-456-7891
			</li>
			<li><a href="#"><i class="fa fa-facebook-square"></i></a>
				<a href="#"><i class="fa fa-twitter-square"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
			</li>
		</ul>
		<ul class="business-hour">
			<li>BUSINESS HOURS</li>
			<li><strong>Monday-Friday : </strong>9am to 5pm</li>
			<li><strong>Saturday : </strong>10am to 2pm</li>
			<li><strong>Sunday : </strong>Closed</li>
		</ul>
		<img src="<?php echo get_template_directory_uri() . '/res/logos/text-white.svg'; ?>" alt="dark-forest" class="footer-logo">
	</div>
	<p class="site-copy">&copyCOPYRIGHT © 2019 INHABITENT</p>
	</div> <!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>

</html>