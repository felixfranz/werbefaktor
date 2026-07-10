<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Base
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

	</header><!-- .entry-header -->


	<div class="entry-summary">
		<p><?php echo get_the_excerpt(); ?></p>
	</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
