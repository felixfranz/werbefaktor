<?php 

// Case: Header Area.  
if( get_row_layout() == 'section_header_image' ):
          
        $header_image_text = get_sub_field('header_image_text');
        $header_image_subline = get_sub_field('header_image_subline');
        ?>


            <h1><?php echo($header_image_text); ?></h1>

<?php 

endif;

?>