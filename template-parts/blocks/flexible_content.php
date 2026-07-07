<?php 

// Case: Flexibler Content  
if( get_row_layout() == 'flex_content_various' ):

        // section options
        $background = get_sub_field('background_color');
        $deco_bar_position   = get_sub_field('deco_bar');
        $deco_bar_style = get_sub_field('deco_bar_style');
  

        ?>
        <section class="content-section flex fullwidth  bg-<?php echo $background; ?> ">
            
            <div class="flex flex-row items-left gap-m inner-wrap wrap">

        <?php 


        // check for rows (parent repeater)
        if( have_rows('flex_repeater') ): 
            // loop through rows (parent repeater)
            while( have_rows('flex_repeater') ): the_row();

            // column options
            $col_width = get_sub_field('column_width');

        ?> <div class="flex flex-col items-left col-<?php echo $col_width; ?>"> <?php 

        // Check for flexible content Elements
        if( have_rows('my_content') ):

        // Loop through rows.
        while ( have_rows('my_content') ) : the_row();


            // Case: Headline.  
            include("elements/element_headline.php");

            // Case: Preheadline.  
            include("elements/element_preheadline.php");

            // Case: button.  
            include("elements/element_button.php");

            // Case: text.  
            include("elements/element_textarea.php");

            // Case: cite.  
            include("elements/element_cite.php");

            // Case: image.  
            include("elements/element_image.php");

            // Case: Slider.  
            include("elements/element_slider.php");


            // End loop.
    endwhile; // end while content elements

    // No value.
    else :

    endif; // end content

?> </div> <?php

    // End loop.
    endwhile; // end while repeater

    // No value.
    else :

    endif; // end repeater ?>


    </div>
            
        
    </section>
    <?php

endif;

?>