<?php
/**
 * Template part for displaying page content in page.php
 *
 */
?>
<?php


// Check value exists.
if( have_rows('page_sections') ):

    // Loop through rows.
    while ( have_rows('page_sections') ) : the_row();


		// Case: Image Header Area.  
		include("blocks/header_image.php");

		// Case: Flex blocks  
		include("blocks/flexible_content.php");

		// Case: Project Teaser 
		include("blocks/project_teaser.php");

		// Case: Newest Products
		include("blocks/new_products.php");

		// Case: Popular Products
		include("blocks/popular_products.php");

		// Case: Banner Grün
		include("blocks/banner_green.php");

		// Case: Slider 
		include("blocks/slider.php");

		// Case: Images with Caption 
		include("blocks/image_row.php");

        

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>