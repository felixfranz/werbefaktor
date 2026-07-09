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

		<?php 
		// get fields
        $banner_contact = get_field('banner_more_infos', 'option');
       
        $teaser_headline = $banner_contact['headline'];
        $teaser_text = $banner_contact['text'];
        $tag_text = $banner_contact['tag_text'];
        $tag_color = $banner_contact['tag_color'];


        ?>
       <section class="related_products section-with-tag flex flex-col gap-m">

			<div class="section-tag section-tag--pink"><span><?php echo($tag_text); ?></span></div>
            <div class="inner-wrap flex flex-col col-66 wrap">
                <div class="flex flex-col">
                    <?php  echo '<h3>' . $teaser_headline . '</h3>'; ?>
                   
                    <?php  echo $teaser_text ?>

                </div>
            </div>

					<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'new-base' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>

        </section>


		
		
	</main><!-- #main -->

<?php
get_footer();
