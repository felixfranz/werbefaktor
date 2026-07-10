<?php 

// Case: Box Row 
if( get_row_layout() == 'banner_dark' ):  ?>


        <section class="content-section banner-2by2 flex fullwidth bg-dark">
            
            <div class="flex flex-row inner-wrap wrap">
            
            <div class="2by2-grid grid col-66">

            
            <?php 

            // check for rows (parent repeater)
            if( have_rows('boxes') ): 
                // loop through rows (parent repeater)
                while( have_rows('boxes') ): the_row();

                // get fields
                $box_color = get_sub_field('box_color');
                $headline = get_sub_field('headline');
                $subline = get_sub_field('subline');


            ?> 
        
        <div class="flex box grid-item flex-col box-<?php echo $box_color; ?> "> 
            
            <div class="box-content flex flex-col gap-xs">
                <h3 class="subline"><?php echo($subline); ?></h3>
                <h2><?php echo($headline); ?></h2>
                
            </div>
            

        </div> <?php // end box

        // End loop.
        endwhile; // end while repeater

        endif; // end repeater ?>

        </div>

    </div> <?php // end inner-wrapper ?>
   
    </section>


<?php

endif;

?>