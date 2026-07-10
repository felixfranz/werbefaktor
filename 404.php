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

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class=><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'new-base' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'new-base' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">


					<?php
					/* translators: %1$s: smiley */
					$new_base_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'new-base' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$new_base_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
