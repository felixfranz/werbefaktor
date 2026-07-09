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
<?php 
$main_email 	= get_field('business_email', 'option');
$main_phone 	= get_field('phone_number', 'option');
$main_adress 	= get_field('business_adress', 'option')

?>
	<footer class="site-footer page__site-footer">

		<div class="footer-top flex flex-row gap-m inner-wrap wrap">
			<div class="flex col-25 items-left">
			<div class="footer-logo"></div>
			<p><?php echo($main_adress); ?></p>
				
			</div>

			<div class="flex col-25 items-left">
			<h5>Kontakt</h5>
			<ul class="footer__top-menu nav">
					<li><?php echo '<a href="mailto:' . $main_email .' ">' . $main_email .'</a>'; ?></li>
					<li><?php echo '<a href="tel:' . $main_phone .' ">' . $main_phone .'</a>'; ?></li>
</ul>
			</div>

			<div class="flex col-25 items-left">
				<h5>Produktion</h5>
				<nav class="">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer-production',
						'menu_class'           => 'menu footer__top-menu footer-menu',
						'container'            => 'div',
						'container_class'      => 'footer-menu__container',
					)
				);
				?>

				</nav>
			</div>

			<div class="flex col-25 items-left">
				<h5>Informationen</h5>
				<nav class="">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer-infos',
						'menu_class'           => 'menu footer__top-menu footer-menu',
						'container'            => 'div',
						'container_class'      => 'footer-menu__container',
					)
				);
				?>

				</nav>
			</div>
			

		</div>

		<div class="footer-bottom">
			 <div class="footer-bottom__container flex wrap flex-row">
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

		</div>

		<a href="#main" class="arrow back-to-top"><span></span></a>

	</footer><!-- #footer -->
</div><!-- #page -->

<?php get_template_part( 'template-parts/overlay', '' ); ?>

<?php wp_footer(); ?>
</body>
</html>
