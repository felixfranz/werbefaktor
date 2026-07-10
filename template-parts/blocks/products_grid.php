<?php 

// Case: Bewegungs Teaser  
if( get_row_layout() == 'section_products_grid' ):

    $product_selection = get_sub_field('product_selection');



if( $product_selection ): ?>
			<section class="related_products  flex flex-col gap-m">

				<div class="products-grid products-grid-4">
				<?php foreach( $product_selection as $post ): 

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

endif;

?>
<?php wp_reset_postdata(); ?>