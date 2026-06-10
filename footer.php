<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package New_Base
 */

?>

	<footer class="site-footer page__site-footer">

		<div class="footer-top flex flex-row  inner-wrap wrap">
			<div class="flex col-50 items-left">

				<nav class="">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer',
						'menu_class'           => 'menu footer__footer-menu footer-menu',
						'container'            => 'div',
						'container_class'      => 'footer-menu__container',
					)
				);
				?>

				</nav><!-- .footer-menu -->
			</div>
			<div class="flex col-50 footer-adress flex-col">
				<?php 
				$link_facebook 	= get_field('options_facebook', 'option');
				$link_youtube 	= get_field('options_youtube', 'option');
				$link_linkedin 	= get_field('options_linkedin', 'option');
				$link_instagram = get_field('options_instagram', 'option');

				$adress = get_field('x-move_adresse', 'option');

				//echo $adress;
				 ?>
				 <div class="social_container">
							<?php if ($link_facebook) {
							echo '<a href="' . $link_facebook .' "><span class="social_icon"><i class="fab fa-facebook" aria-hidden="true"></i></span></a>';
							} 	?>
							<?php if ($link_youtube) {
							echo '<a href="' . $link_youtube .' "><span class="social_icon"><i class="fab fa-youtube" aria-hidden="true"></i></span></a>';
							} 	?>
							<?php if ($link_linkedin) {
							echo '<a href="' . $link_linkedin .' "><span class="social_icon"><i class="fab fa-linkedin" aria-hidden="true"></i></span></a>';
							} 	?>
							<?php if ($link_instagram) {
							echo '<a href="' . $link_instagram .' "><span class="social_icon"><i class="fab fa-instagram" aria-hidden="true"></i></span></a>';
							} 	?>
				</div>
			</div>
		</div>

		<div class="footer-bottom">

		</div>

		<a href="#main" class="arrow back-to-top"><span></span></a>

	</footer><!-- #footer -->
</div><!-- #page -->

<?php get_template_part( 'template-parts/overlay', '' ); ?>

<?php wp_footer(); ?>
</body>
</html>
