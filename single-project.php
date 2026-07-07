<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package New_Base
 */

get_header();
?>

	<main id="main" class="site-main page__site-main">

		<?php
		while ( have_posts() ) :
			the_post();

				
    
    get_template_part( 'template-parts/content', 'flexible_sections' );



		endwhile; // End of the loop.
		?>
		
	</main><!-- #main -->

<?php
get_footer();
