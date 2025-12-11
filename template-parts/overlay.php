<?php
/**
 * Template part for page overlay
 *
 *
 * @package New_Base
 */

?>

<!-- NAV TOGGLE AND PAGE OVERLAY TO AVOID SCREENREADERS ON TOP -->
<a class="nav-toggle" href="#"> 
	<span class="type">MENU</span><span class="bars"></span>
</a>

<div class="page-overlay">



	<div class="page-overlay__overlay-right overlay-right">
		<div class="overlay-right__container">


		<nav class="mobile-menu page-overlay__mobile-menu">

		<?php wp_nav_menu(array(
					'container'  => false,
					'menu_class' => 'page-overlay__menu menu__mobile_menu',               // adding custom nav class
					'theme_location' => 'menu-1',                                // limit the depth of the nav
					'fallback_cb' => ''                             // fallback function (if there is one)
		)); ?>

		</nav>

		<?php 
					$link_facebook 	= get_field('options_facebook', 'option');
					$link_youtube 	= get_field('options_youtube', 'option');
					$link_linkedin 	= get_field('options_linkedin', 'option');
					$link_instagram = get_field('options_instagram', 'option'); ?>

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

</div>

<div class="page-overlay__overlay-left overlay-left">
		<div class="overlay-left__container">
			<div class="quick-cta">
				<a class="quick-cta__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> </a>
				<h2>Sie planen ein Projekt?</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, non illum. Eaque cumque, mollitia itaque ipsa cupiditate illo excepturi maiores, accusamus quod exercitationem autem delectus porro veritatis voluptates id explicabo?</p>
				<a href="#" class="button">Kontakt</a>
			</div>
			<div class="overlay__quick-contact quick-contact">
				<ul>
					<li><span class="text"><strong>T:</strong></span> <a href="tel:+49 60 27 4 09 33 80"><span class="social_icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></span><span class="text"> +49 (0) 60 27 / 4 09 33 80</span></a> </li>
					<li class="hide"><strong>Fax:</strong><span class="text">+49 (0) 60 27 / 4 09 33 89</li>
					<li><span class="text"><strong>E:</strong></span> <a href="mailto:info@x-move.net"><span class="social_icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></span><span class="text">info@x-move.net</span></a> </li>
				</ul>
				
			</div>
		</div>
</div>