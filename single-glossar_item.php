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
                <?php post_class('glossar-entry flex flex-col gap-m'); ?>
             >

                <header class="glossar-entry-header">

                    <h1>
					
                        <?php the_title(); ?>
                    </h1>

                </header>


                <div class="glossar-entry-content flex flex-col gap-s">

                    <?php the_content(); ?>

                </div>

				<?php //get_template_part( 'template-parts/content', 'flexible_sections' ); ?>

            </article>

           <?php
           $glossar_related_products = get_field('glossar_related_products');
           
           if( $glossar_related_products ): ?>
			<section class="related_products section-with-tag flex flex-col gap-m">

			<div class="section-tag section-tag--blue"><span>Für Sie</span></div>

			<h3 class="section-title">Passende Produkte</h3>
				<div class="products-grid products-grid-4">
				<?php foreach( $glossar_related_products as $post ): 

					// Setup this post for WP functions (variable must be named $post).
					setup_postdata($post); ?>
					<article <?php post_class('product-card flex flex-col gap-m'); ?>>

                        <a href="<?php the_permalink(); ?>" class="flex flex-col gap-s">

                          
                                <div class="product-card__image-container">
                                      <?php if (has_post_thumbnail()) : ?>
                                         <?php the_post_thumbnail('medium'); ?>
                                       
                                      
                                          <?php else :  ?>
                                          <div class="image-placeholder">

                                          </div>
                                      
                                         <?php endif; ?>
                                        <div class="details-link text--small">Details</div>  
                                </div>
                         
                            <div class="product-card__content flex flex-col gap-s">
                                <h2><?php the_title(); ?></h2>
                                <p class="text--small product-card__description"><?php echo get_field("preview_text"); ?></p>
                            </div>
                            
                        </a>

                    </article>
				<?php endforeach; ?>
				</div>
				<?php 
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
				</section>
			<?php endif; ?>

            <?php 
            
            // get fields
        $banner_contact = get_field('banner_more_infos', 'option');
       
        $teaser_headline = $banner_contact['headline'];
        $teaser_text = $banner_contact['text'];
        $tag_text = $banner_contact['tag_text'];
        $tag_color = $banner_contact['tag_color'];


        ?>
       <section class="banner_contact section-with-tag flex flex-col gap-m">

			<div class="section-tag section-tag--blue"><span><?php echo($tag_text); ?></span></div>
            <div class="inner-wrap flex flex-col col-66 wrap">
                <div class="flex flex-col">
                    <?php  echo '<h3>' . $teaser_headline . '</h3>'; ?>
                   
                    <?php  echo $teaser_text ?>

                </div>
            </div>

        </section>

			

<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
