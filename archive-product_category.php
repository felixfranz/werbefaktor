<?php get_header(); ?>

<main id="main" class="site-main page__site-main">

						<h1 class="archive-title h2"><?php post_type_archive_title(); ?></h1>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> >

											
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

									
												<h1>
													<?php the_title();?>
												</h1>
												<h2>
													<?php
													$categories = get_the_category();
 
													if ( ! empty( $categories ) ) {
													    echo esc_html( $categories[0]->name );   
													}
												?></h2>
												</div>

											</a>

											<section class="entry-content clearfix" >

											
											</section> <!-- end article section -->


										</article> <!-- end article -->

							<?php endwhile; ?>

							

							<?php else : ?>
	</main><!-- #main -->

<?php get_footer(); ?>
