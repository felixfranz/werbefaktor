<?php 

// Case: Header Area.  
if( get_row_layout() == 'section_header_image' ):
          
        $header_image_text = get_sub_field('header_image_text');
        $header_image_subline = get_sub_field('header_image_subline');

        $image = get_sub_field('header_image');
        $opacity = get_sub_field('abdunklung');


        if($image):

            // Image variables.
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];


        endif;
        ?>
<section class="fullwidth flex section__image-header">
            
            <div class="image-container">
                <img src="<?php echo $url; ?>"/>
                <div class="backdrop" style="opacity:<?php echo $opacity; ?>%"></div>
            </div>

            <div class="deco-container"> </div>

                <div class="flex flex-row items-center items-justify-center gap-md inner-wrap wrap">

                    <div class="flex flex-col items-center col-66 items-vert-center text-align-center flex-content">
                                <div class="monkey-outline"></div>
                               <h1><?php echo($header_image_text); ?></h1>
                               <h3><?php echo($header_image_subline); ?></h3>

                    </div>

            </div>
        </section>



         
<?php 

endif;

?>
