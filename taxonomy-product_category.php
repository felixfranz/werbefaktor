<?php
get_header();

$current_term = get_queried_object();

// Validate taxonomy term
if (
    !($current_term instanceof WP_Term) ||
    $current_term->taxonomy !== 'product_category'
) {
    get_footer();
    return;
}

// ACF fields for the current translated taxonomy term
$term_description_raw = get_field('page_text', $current_term);
$term_description_raw = is_string($term_description_raw)
    ? $term_description_raw
    : '';

$term_description = preg_replace(
    '/<p>\s*(?:&nbsp;|\s|<br\s*\/?>)*<\/p>/i',
    '',
    $term_description_raw
);

// Additional ACF content
$term_description_additional_raw = get_field(
    'page_text_additional',
    $current_term
);

$term_description_additional_raw =
    is_string($term_description_additional_raw)
        ? $term_description_additional_raw
        : '';

$term_description_additional = function_exists('clean_wysiwyg')
    ? clean_wysiwyg($term_description_additional_raw)
    : $term_description_additional_raw;

// Parent taxonomy term
$parent = '';
$parent_id = 0;

$is_top_level = ((int) $current_term->parent === 0);

if (!$is_top_level) {

    $parent_term = get_term(
        $current_term->parent,
        'product_category'
    );

    if ($parent_term instanceof WP_Term) {
        $parent = $parent_term->slug;
        $parent_id = $parent_term->term_id;
    }
}
?>

<main id="main" class="taxonomy-product-category">
	<div class="product__breadcrumb">

		<?php
            if ( function_exists('custom_taxonomy_breadcrumbs') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
        ?>
	</div>
<section class="taxonomy-header fullwidth taxonomy-header-<?php echo esc_html($current_term->slug); if($parent){ echo " parent-".$parent;}?> ">
    <div class="inner-wrap wrap flex flex-col gap-m">

        <h1><?php echo esc_html($current_term->name); ?></h1>

        <?php if ($term_description) : ?>
            <div class="taxonomy-intro text-content">
               <?php echo wp_kses_post($term_description); ?>
            </div>
        <?php endif; ?>
</div>

</section>
<div class="sticky-border fullwidth"><span></span></div>

    <?php if ($is_top_level) : ?>

        <?php
        $child_terms = get_terms([
            'taxonomy'   => 'product_category',
            'parent'     => $current_term->term_id,
            'hide_empty' => true,
            'orderby'    => 'name',
            'order'      => 'ASC',
        ]);
        ?>

        <?php if (!empty($child_terms) && !is_wp_error($child_terms)) : ?>

            <section class="subcategory-grid">

            <?php foreach ($child_terms as $term) : ?>

                <?php
                $term_link = get_term_link($term);

                $description = term_description($term->term_id, 'product_category');

                // ACF Gallery field
                $gallery = get_field('category_gallery', $term);

                if (!is_array($gallery)) {
                    $gallery = [];
                }

                ?>

                <article class="subcategory-card">

                    <?php if ($gallery) : ?>

                       <div  class="swiper js-swiper subcategory-slider"
                                
                                data-loop="true"
                                data-pagination="true"
                                data-navigation="true"
                            >
                            <div class="swiper-wrapper">

                              <?php foreach ($gallery as $image) : ?>

                                    <?php
                                    $image_url = '';

                                    if (is_array($image)) {

                                        // ACF Image Array
                                        $image_url = $image['sizes']['large']
                                            ?? $image['url']
                                            ?? '';

                                    } elseif (is_numeric($image)) {

                                        // Attachment ID
                                        $image_url = wp_get_attachment_image_url(
                                            (int) $image,
                                            'large'
                                        );

                                    } elseif (is_string($image)) {

                                        // Image URL
                                        $image_url = $image;
                                    }

                                    if (!$image_url) {
                                        continue;
                                    }
                                    ?>

                                    <div class="swiper-slide">
                                        <img
                                            src="<?php echo esc_url($image_url); ?>"
                                            alt=""
                                            loading="lazy"
                                        >
                                    </div>

                                <?php endforeach; ?>

                            </div>
                             <div class="swiper-pagination test"></div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>

                        <?php else : ?> 
                        <div class="product-card__image-container">
                            <div class="image-placeholder"> </div>
                        </div>

                    <?php endif; ?>

                    <div class="subcategory-content flex flex-col gap-m">
                    <div class="category_card-text-wrapper flex flex-col gap-s">
                        <h3>
                            <a  href="<?php echo esc_url($term_link); ?>"
                        > <?php echo esc_html($term->name); ?> </a>
                        </h3>

                        <?php if ($description) : ?>
                            <div class="subcategory-description">
                               <div class="text--small"> <?php echo wp_kses_post($description); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                        <a class="subcategory-button button button--subtle button--small"
                            href="<?php echo esc_url($term_link); ?>"
                        >
                            Zu den Produkten <span>›</span> 
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </section>

         <?php endif; ?>

    <?php else : ?>

        <div class="products-grid products-grid-4">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

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

                <?php endwhile; ?>

            <?php else : ?>

                <p>No products found.</p>

            <?php endif; ?>

        </div>

        <?php the_posts_pagination(); ?>

    <?php endif; ?>

    <?php if ($term_description_additional) : ?>
    <section class="taxonomy-footer fullwidth taxonomy-footer-<?php echo esc_html($current_term->slug); if($parent){ echo " parent-".$parent;}?> ">
    <div class="sticky-border fullwidth"><span></span></div>   
    <div class="inner-wrap wrap flex flex-col gap-m">

            <div class="taxonomy-intro text-content flex flex-col gap-m">
                <?php echo wp_kses_post($term_description_additional); ?>
            </div>
            
        </div>

    </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>