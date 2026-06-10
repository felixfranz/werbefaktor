<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package New_Base
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-to-content-link" href="#main" id="primary">
  Skip to content
</a>


<div class="page wrap">

	<header class="header page__header flex flex-col fullwidth">
		<div class="header__top-header top-header flex flex-row">
			<div class="inner-wrap wrap flex flex-row">
				<div class="header__quick-contact">
					email telefon
				</div>
			<nav class="header__menu-top nav-menu-top flex">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-header-top',
					'menu_class'           => 'menu-top',
					'container'            => 'div',
					'container_class'      => 'menu-top-container',
				)
			);
			?>

		</nav><!-- .main-navigation -->
			</div>

		

		</div>
		<div class="header__bottom-header bottom-header flex">
			<div class="inner-wrap wrap flex flex-row">

			<div class="logo header__logo">
			
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> werbe<span>faktor</span> </a>

			</div><!-- .site-branding -->

		<nav class="main-navigation header__main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-primary',
					'menu_class'           => 'menu main-navigation__menu',
					'container'            => 'div',
					'container_class'      => 'main-navigatinon__container',
					'walker' => new Category_Description_Walker(),
				)
			);
			?>

		</nav><!-- .main-navigation -->
		<div class="search-container">
			<form role="search" method="get" class="search-form" action="/">
    <div class="search-wrapper">
        <input type="search" class="search-field" placeholder="Search..." name="s">
        <button type="submit" class="search-submit">
            <span></span>
        </button>
    </div>
</form>
		</div>
</div>

		</div>
		
	</header><!-- .header -->
