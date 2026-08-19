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

	<main id="main" class="site-main page__site-main single-glossar">



		<?php
		while ( have_posts() ) :
			the_post(); ?>

  <article
                id="post-<?php the_ID(); ?>"
                <?php post_class('glossar-entry'); ?>
            >

                <header class="glossar-entry-header">

                    <h2>
					
                        <?php the_title(); ?>
                    </h2>

                </header>


                <div class="glossar-entry-content">

                    <?php the_content(); ?>

                </div>

				<?php get_template_part( 'template-parts/content', 'flexible_sections' ); ?>

            </article>

			

<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
