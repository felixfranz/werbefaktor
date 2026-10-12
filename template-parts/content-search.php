<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Base
 */

?>

<?php 
$the_id		= get_the_id();
$post_type =  get_post_type_object(get_post_type( $the_id )); 
$post_type_slug = get_post_type( $the_id ); 
$post_type_name =  $post_type->labels->singular_name;
if($post_type_slug == "page"){
	$post_type_name = "Information";
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('product-card flex flex-col gap-m'); ?>>

	<a href="<?php the_permalink(); ?>" class="flex flex-col gap-s">


			<div class="product-card__image-container">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('medium'); ?>
					
					
						<?php else :  ?>
						<div class="image-placeholder">

						</div>
					
						<?php endif; ?>
					<div class="details-link text--small">Details</div>  
					<div class="tag tag_<?php echo($post_type_slug); ?>">
							<?php echo($post_type_name); ?>
					</div>
					
			</div>
		
		<div class="product-card__content flex flex-col gap-s">
			<h2><?php the_title(); ?> <?php echo($post_type_name); ?></h2>
			<p class="text--small product-card__description"><?php // echo get_the_excerpt(); ?></p>
		</div>
		
	</a>

</article> <!-- #post-<?php the_ID(); ?> -->
