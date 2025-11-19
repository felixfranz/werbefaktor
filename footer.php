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

	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- NAV TOGGLE AND PAGE OVERLAY TO AVOID SCREENREADERS ON TOP -->
<a class="nav-toggle" href="#"> 
	MENU<span></span>
</a>

<div class="page-overlay">
	<div class="page-overlay__container wrap">

			<nav class="mobile-menu page-overlay__mobile-menu">

				<?php wp_nav_menu(array(
							'container' => false,                           // remove nav container

							'menu_class' => 'menu page-overlay__menu menu__mobile_menu',               // adding custom nav class
							'theme_location' => 'menu-1',                                // limit the depth of the nav
							'fallback_cb' => ''                             // fallback function (if there is one)
				)); ?>

			</nav>
			
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
