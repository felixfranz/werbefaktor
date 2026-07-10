<?php 

// Case: Box Row 
if( get_row_layout() == 'box_row' ):  ?>


        <section class="content-section box-row flex fullwidth  ">
            
            <div class="flex flex-row gap-m inner-wrap wrap">

            <?php 

            // check for rows (parent repeater)
            if( have_rows('boxes') ): 
                // loop through rows (parent repeater)
                while( have_rows('boxes') ): the_row();

                // get fields
                $background = get_sub_field('box_color');
                $headline = get_sub_field('headline');
                $text = get_sub_field('text');
                $button_text = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');

            ?> 
        
        <div class="flex box flex-col bg-<?php echo $background; ?> "> 
            
            <div class="box-content flex flex-col gap-m">
                <h2 class="underline"><?php echo($headline); ?></h2>
                <?php echo($text); ?>
            </div>
            

            <?php if($button_text){ ?>
                <div class="button-container flex items-left"> <a href="<?php echo($button_link); ?>" class="button button--on-color"><?php echo($button_text); ?></a></div>
            <?php } ?> 


        </div> <?php // end box

        // End loop.
        endwhile; // end while repeater

        endif; // end repeater ?>

    </div> <?php // end inner-wrapper ?>
   
    </section>


<?php

endif;

?>