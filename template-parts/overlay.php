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
	<div class="overlay__header">
		<div class="logo overlay-logo">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <span>werbe</span>faktor </a>
		</div>
		<?php 
					$main_email 	= get_field('business_email', 'option');
					$main_phone 	= get_field('phone_number', 'option');
					
					?>
					<div class="overlay__header-buttons">
					<span><?php echo '<a href="mailto:' . $main_email .' "><span class="social_icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></span></a>'; ?></span>
					<span><?php echo '<a href="tel:' . $main_phone .' "><span class="social_icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></span></a>'; ?></span>
					</div>
	</div>
	
	<div class="page-overlay__container">

			<nav class="mobile-menu page-overlay__mobile-menu">

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-primary',
					'menu_class'           => 'menu main-navigation__menu',
					'container'            => 'div',
					'container_class'      => 'main-navigation__container',
					'walker' => new Category_Description_Walker(),
				)
			);
			?>
			<!-- <a class="mobile-search-link" href="#">Suche</a> -->

			</nav>
			<div class="search-container">
			<form role="search" method="get" class="search-form" action="/">
    			<div class="search-wrapper">
					<input type="search" class="search-field" placeholder="Suchen..." name="s">
					<button type="submit" class="search-submit"><span></span></button>
				</div>
			</form>
		</div>

			<nav class="mobile-menu page-overlay__mobile-menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-header-top',
					'menu_class'           => 'mobile-menu-bottom',
					'container'            => 'div',
					'container_class'      => 'mobile-menu-bottom__container',
				)
			);
			?>

		</nav><!-- .main-navigation -->

	</div>	

</div>