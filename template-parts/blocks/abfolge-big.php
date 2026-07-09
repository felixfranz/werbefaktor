<?php 

// Case: Flexibler Content  
if( get_row_layout() == 'abfolge' ):


        ?>
        <section class="content-section abfolge-section items-center flex flex-col fullwidth ">
            
        <?php 


        // check for rows (parent repeater)
        if( have_rows('flow_steps') ): 
            // loop through rows (parent repeater)
            while( have_rows('flow_steps') ): the_row();

            // column options
            $headline = get_sub_field('headline');
            $text = get_sub_field('text');
            $icon_array = get_sub_field('icon');

       

        ?> 
        <div class="flex items-center block__step">

            <div class="icon_container">
                <div class="abfolge_icon">
                   <i class="dashicons <?php echo($icon_array); ?>"></i> 
                </div>
            </div>

        <div class="flex flex-col items-center col-66 gap-m"> 
           <h2> <?php echo $headline; ?></h2>
           <div>
            <?php echo($text); ?>
           </div>
         </div>

        </div>

    <?php

    // End loop.
    endwhile; // end while repeater

    // No value.
    else :

    endif; // end repeater ?>
            
        
    </section>

    <?php

endif;

?>