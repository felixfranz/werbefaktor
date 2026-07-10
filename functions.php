<?php
/**
 * New Base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package New_Base
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function new_base_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on New Base, use a find and replace
		* to change 'new-base' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'new-base', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-primary' => esc_html__( 'Primary', 'new-base' ),
			'menu-footer' => esc_html__( 'Footer Menu', 'new-base' ),
			'menu-footer-production' => esc_html__( 'Footer Menu: Produktion', 'new-base' ),
			'menu-footer-infos' => esc_html__( 'Footer Menu: Infos', 'new-base' ),
			'menu-header-top' => esc_html__( 'Header Menu: Top Bar', 'new-base' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'new_base_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'new_base_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function new_base_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'new_base_content_width', 640 );
}
add_action( 'after_setup_theme', 'new_base_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function new_base_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'new-base' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'new-base' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'new_base_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function new_base_scripts() {

	//wp_enqueue_style( 'new-base-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'new-base-style', get_stylesheet_directory_uri().'/library/css/style.css', array(), _S_VERSION );
	wp_style_add_data( 'new-base-style', 'rtl', 'replace' );

    // DASHICONS ICONS
	wp_register_style( 'dashicons-stylesheet', get_stylesheet_directory_uri() . '/library/fonts/dashicons/css/dashicons.css', array(), '', 'all' );
	wp_enqueue_style( 'dashicons-stylesheet' );

	// FONT AWESOME ICONS
	wp_register_style( 'fontawesome-stylesheet', get_stylesheet_directory_uri() . '/library/fonts/fontawesome/css/all.min.css', array(), '', 'all' );
	wp_enqueue_style( 'fontawesome-stylesheet' );

	 wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11.2.10'
    );

    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11.2.10',
        true
    );


	wp_enqueue_script('jquery');
    wp_register_script( 'mixitup-js', get_stylesheet_directory_uri() . '/js/libs/mixitup.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'mixitupagination-js', get_stylesheet_directory_uri() . '/js/libs/mixitup-pagination.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'mixitupmultifilter-js', get_stylesheet_directory_uri() . '/js/libs/mixitup-multifilter.min.js', array( 'jquery' ), '', true );

    wp_enqueue_script( 'mixitup-js' );
	wp_enqueue_script( 'mixitupagination-js' );
	wp_enqueue_script( 'mixitupmultifilter-js' );
	wp_enqueue_script( 'new-base-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), _S_VERSION, true );


}
add_action( 'wp_enqueue_scripts', 'new_base_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

remove_filter('the_content', 'wpautop');

/** 
* remove comments
*/
function disable_comments_for_cpt() {
    remove_post_type_support('product', 'comments');
    remove_post_type_support('product', 'trackbacks');
}
add_action('init', 'disable_comments_for_cpt', 100);

function hide_comment_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'hide_comment_menu');

function disable_cpt_comments($open, $post_id) {
    $post = get_post($post_id);

    if ($post && $post->post_type === 'product') {
        return false;
    }

    return $open;
}

add_filter('comments_open', 'disable_cpt_comments', 10, 2);
add_filter('pings_open', 'disable_cpt_comments', 10, 2);

// special breadcrumbs

add_filter( 'wpseo_breadcrumb_links', 'custom_taxonomy_breadcrumbs' );

function custom_taxonomy_breadcrumbs( $links ) {

    if ( is_singular( 'product' ) ) {

        global $post;

        $terms = get_the_terms( $post->ID, 'product_category' );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

            $term = $terms[0];
            $parents = array_reverse( get_ancestors( $term->term_id, 'product_category' ) );

            $new_links = array();

            foreach ( $parents as $parent_id ) {

                $parent = get_term( $parent_id );

                $new_links[] = array(
                    'url'  => get_term_link( $parent ),
                    'text' => $parent->name,
                );
            }

            $new_links[] = array(
                'url'  => get_term_link( $term ),
                'text' => $term->name,
            );

            array_splice( $links, count( $links ) - 1, 0, $new_links );
        }
    }

    return $links;
}


add_filter( 'wpseo_breadcrumb_links', function( $links ) {

    if ( ! is_tax() ) {
        return $links;
    }

    $term = get_queried_object();

    if ( ! is_taxonomy_hierarchical( $term->taxonomy ) ) {
        return $links;
    }

    $parents = array_reverse(
        get_ancestors(
            $term->term_id,
            $term->taxonomy,
            'taxonomy'
        )
    );

    $new_links = [];

    foreach ( $parents as $parent_id ) {

        $parent = get_term( $parent_id, $term->taxonomy );

        $new_links[] = [
            'url'  => get_term_link( $parent ),
            'text' => $parent->name,
        ];
    }

    array_splice(
        $links,
        count( $links ) - 1,
        0,
        $new_links
    );

    return $links;

} );

class Category_Description_Walker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="sub-menu">';
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {

		$menu_overview_link_text = "Zur Übersicht";

        // Preserve WordPress menu classes
        $classes = empty($item->classes) ? [] : (array) $item->classes;

        $class_names = implode(
            ' ',
            array_map('sanitize_html_class', $classes)
        );

        // Preserve menu item ID
        $output .= '<li id="menu-item-' . $item->ID . '" class="' . esc_attr($class_names) . ' mega-menu">';

        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= esc_html($item->title);
        $output .= '</a>';

        // Only on top-level taxonomy items
        if ($depth === 0 && $item->object === 'product_category') {

            $term = get_term($item->object_id, 'product_category');

            if ($term && !is_wp_error($term)) {

                $children = get_terms([
                    'taxonomy'   => 'product_category',
                    'parent'     => $term->term_id,
                    'hide_empty' => true,
                ]);

                if ($children) {

                    $output .= '<div class="sub-menu-container">';

					 /*
                    |--------------------------------------------------------------------------
                    | LEFT SIDEBAR
                    |--------------------------------------------------------------------------
                    */

					$output .= '<div class="mega-menu-sidebar">';

					 // Description block
                    if (!empty($term->description)) {
                        $output .= '<div class="menu-description"><p class="text--small">';
                        $output .= wp_kses_post($term->description);
                        $output .= '<p></div>';
                    }

                    // Parent category link
                    $output .= '<div class="menu-item parent-category-link">';
                    $output .= '<a href="' . esc_url(get_term_link($term)) . '">';
                    //$output .= 'View All ' . esc_html($term->name);
					$output .= $menu_overview_link_text;
                    $output .= '</a>';
                    $output .= '</div>';

					$output .= '</div>';

					  /*
                    |--------------------------------------------------------------------------
                    | RIGHT SIDE LINKS
                    |--------------------------------------------------------------------------
                    */

					$output .= '<ul class="sub-menu">';

                    // Child categories
                    foreach ($children as $child) {

                        $output .= '<li class="menu-item child-category-item">';
                        $output .= '<a href="' . esc_url(get_term_link($child)) . '">';
                        $output .= esc_html($child->name);
                        $output .= '</a>';
                        $output .= '</li>';
                    }

                    $output .= '</ul></div>';
                }
            }
        }



		/*
        |--------------------------------------------------------------------------
        | REGULAR PAGE MEGA MENU
        |--------------------------------------------------------------------------
        */
		


		elseif ($depth === 0 && $item->object === 'page') {

		 $parent_page = get_post($item->object_id);

		 $menu_source = get_field(
			'menu_source',
			$item->object_id
		);

		switch ($menu_source) {

			case 'projects':

				$items = get_posts([
					'post_type'      => 'project',
					'posts_per_page' => -1,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				]);

				break;

			case 'child_pages':
			default:

				$items = get_pages([
					'child_of'    => $item->object_id,
					'parent'      => $item->object_id,
					'sort_column' => 'menu_order',
				]);

				break;
		}



            if ($items) {


                $output .= '<div class="sub-menu-container">';

                /*
                |--------------------------------------------------------------------------
                | LEFT SIDEBAR
                |--------------------------------------------------------------------------
                */

                $output .= '<div class="mega-menu-sidebar">';

                // ACF field on page
                $menu_description = get_field(
                    'menu-description',
                    $item->object_id
                );

                if (!empty($menu_description)) {

                    $output .= '<div class="menu-description"><p class="text--small">';
                    $output .= wp_kses_post($menu_description);
                    $output .= '</p></div>';
                }

                // Parent page link
                $output .= '<div class="parent-category-link">';

                $output .= '<a href="' . esc_url(get_permalink($parent_page)) . '">';
               // $output .= 'View All ' . esc_html($parent_page->post_title);
			 
					$output .= $menu_overview_link_text;
                $output .= '</a>';

                $output .= '</div>';

                $output .= '</div>';

                /*
                |--------------------------------------------------------------------------
                | RIGHT SIDE LINKS
                |--------------------------------------------------------------------------
                */

                $output .= '<ul class="sub-menu">';

                foreach ($items as $menu_item) {

					if ($menu_source === 'projects') {

						$url = get_permalink($menu_item);
						$title = $menu_item->post_title;

					} else {

						$url = get_permalink($menu_item);
						$title = $menu_item->post_title;
					}

					$output .= '<li class="menu-item">';
					$output .= '<a href="' . esc_url($url) . '">';
					$output .= esc_html($title);
					$output .= '</a>';
					$output .= '</li>';
				}

                $output .= '</ul>';

                $output .= '</div>';
            }
        }

        $output .= '</li>';
    }
}

// REWRITE URLS TO MATCH TYPO3 STRUCTURE

function clean_wysiwyg($content) {
    return preg_replace('/<p>(?:\s|&nbsp;|<br\s*\/?>)*<\/p>/i', '', $content);
}