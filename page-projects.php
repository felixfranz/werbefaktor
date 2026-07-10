<?php
/*
Template Name: Projekte

 */
/**
 *
 * @package New_Base
 */

get_header();
?>

	<main id="main" class="site-main page__site-main">

  <?php 
  $terms = get_terms( array(
    'taxonomy'   => 'project-category', // Ersetze dies mit deinem Taxonomy-Slug
    'hide_empty' => false,                   // Zeigt auch Kategorien ohne Beiträge an
) );

?>

  <div class="filter flex flex-row gap-s">
						
							<button class="filter-button" type="button" data-filter="all" class="mixitup-control-active"><?php echo _e('Alle Projekte', 'werbefaktor')?></button>
<?php 
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

    foreach ( $terms as $term ) { ?>
  
       <button class="filter-button "type="button" data-filter=".<?php echo  esc_html( $term->slug ) ;?>"><?php echo esc_html( $term->name );?></button>
      
  <?php  }

} 
  ?> 
												
	</div>

  <?php
global $post;

$args = array(
    'post_type'      => 'project',
    'order'          => 'ASC',
    'orderby'        => 'menu_order' // Matches the order set in Page Attributes
);

$child_query = new WP_Query( $args );

if ( $child_query->have_posts() ) : 
    echo '<section class="flex flex-col post-list projects-list">';
    while ( $child_query->have_posts() ) : $child_query->the_post(); 
    $preview_text = get_field("preview_text");
    $terms = get_the_terms( get_the_ID(), 'project-category' );
    ?>
        <article class="flex flex-row post-preview gap-m mix <?php
						
						// Projekt Kategorien als Klassen reinschreiben
						if ( $terms && ! is_wp_error( $terms ) ) : 
								 
									$term_links = array();
								 
									foreach ( $terms as $term ) {
										$term_links[] = $term->slug;
						
										echo $term->slug.' ';
									}
														 
								endif;
						
						?>" data-post-cat="<?php // Projekt Kategorien als Klassen reinschreiben
						if ( $terms && ! is_wp_error( $terms ) ) : 
								 
									$term_links = array();
								 
									foreach ( $terms as $term ) {
										$term_links[] = $term->slug;
						
										echo $term->slug.' ';
									}
														 
								endif;
						
						?>">
          <div class="preview-image col-33">
            <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                  
                
                    <?php else :  ?>
                    <div class="image-placeholder">

                    </div>
                
                    <?php endif; ?>
          </div>
            <div class="preview-text col-66 flex flex-col gap-s">
                <h3><?php the_title(); ?></h3>
                <div>

                  <?php echo($preview_text); ?>
                </div>
                 <div class="button-container flex items-left"> 
                  <a href="<?php the_permalink(); ?>" class="button button--blue">Mehr Informationen</a>
                </div>

            </div>
        </article>
    <?php endwhile;
    echo '</section>';
    wp_reset_postdata(); // Restores original global $post data
endif;
?>

	</main><!-- #main -->

<?php

get_footer();
