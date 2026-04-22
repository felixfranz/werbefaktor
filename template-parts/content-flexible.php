<?php
/**
 * Template part for displaying page content in page.php
 *
 */

?>
<?php
get_template_part( 'test' );

// Check value exists.
if( have_rows('page_sections') ):

    // Loop through rows.
    while ( have_rows('page_sections') ) : the_row();


	// Case: Image Header Area.  
	include("flex-content/header_image.php");

	// Case: Flex Content  
	include("flex-content/flexible_content.php");

	// Case: Bewegungs Teaser 
	include("flex-content/bewegungs_teaser.php");

	// Case: Katalog Teaser 
	include("flex-content/katalog_teaser.php");

	// Case: Safety Teaser 
	include("flex-content/safety_teaser.php");

	// Case: Slider 
	include("flex-content/slider.php");

	// Case: Images with Caption 
	include("flex-content/image_row.php");
	
        

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>