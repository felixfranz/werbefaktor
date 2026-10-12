<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package New_Base
 */

get_header();
?>

	<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h2>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'new-base' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h2>
			</header><!-- .page-header -->

			<section class="search-result products-grid-container  flex flex-col gap-m">
				
			<div class="products-grid products-grid-4">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			
			echo '</div>';

			the_posts_navigation();

	
			echo paginate_links([
				'total' => $wp_query->max_num_pages,
			]);


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
