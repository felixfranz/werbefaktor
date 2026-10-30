<?php
/*
Template Name: Produktion

 */
/**
 *
 * @package New_Base
 */

get_header();
$page_intro = get_field("page_intro");
?>

	<main id="main" class="site-main page__site-main">

  <section class="taxonomy-header fullwidth taxonomy-header-production">
    <div class="inner-wrap wrap flex flex-col gap-m">

        <h1><?php the_title(); ?></h1>

        <?php if ($page_intro) : ?>
            <div class="taxonomy-intro text-content">
               <?php echo wp_kses_post($page_intro); ?>
            </div>
        <?php endif; ?>
</div>

</section>
<div class="sticky-border fullwidth"><span></span></div>

  <?php
global $post;

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,          // Retrieves all child pages
    'post_parent'    => $post->ID,   // Only targets direct descendants
    'order'          => 'ASC',
    'orderby'        => 'menu_order' // Matches the order set in Page Attributes
);

$child_query = new WP_Query( $args );

if ( $child_query->have_posts() ) : 
    echo '<section class="flex flex-col post-list">';
    while ( $child_query->have_posts() ) : $child_query->the_post(); 
    $preview_text = get_field("preview_text");
    ?>
        <article class="flex flex-row post-preview gap-m">
          <div class="preview-image col-33">
            <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                  
                
                    <?php else :  ?>
                    <div class="image-placeholder">

                    </div>
                
                    <?php endif; ?>
          </div>
            <div class="preview-text col-66 flex flex-col gap-m">
              <div class="text">
                  <h3><?php the_title(); ?></h3>
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
