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

		// Case: Bewegungs Teaser 
		include("blocks/bewegungs_teaser.php");

		// Case: Katalog Teaser 
		include("blocks/katalog_teaser.php");

		// Case: Safety Teaser 
		include("blocks/safety_teaser.php");

		// Case: Project Teaser 
		include("blocks/project_teaser.php");

		// Case: Slider 
		include("blocks/slider.php");

		// Case: Images with Caption 
		include("blocks/image_row.php");

		// Case: Social Links & Streetwear
		include("blocks/social_streetwear.php");

		// Case: Social Links & Streetwear
		include("blocks/skate_switch.php");
	
        

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>