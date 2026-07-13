<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package New_Base
 */

get_header();
?>

	<main id="main" class="site-main">

		<section class="no-results not-found flex flex-col gap-m">
			<header class="page-header">
				<h1 class=><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'new-base' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content flex flex-col gap-m">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'new-base' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

				




			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
