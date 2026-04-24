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
		include("flex-blocks/header_image.php");

		// Case: Flex blocks  
		include("flex-blocks/flexible_content.php");

		// Case: Bewegungs Teaser 
		include("flex-blocks/bewegungs_teaser.php");

		// Case: Katalog Teaser 
		include("flex-blocks/katalog_teaser.php");

		// Case: Safety Teaser 
		include("flex-blocks/safety_teaser.php");

		// Case: Slider 
		include("flex-blocks/slider.php");

		// Case: Images with Caption 
		include("flex-blocks/image_row.php");
	
        

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>