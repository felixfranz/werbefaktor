<?php 

// Case: Flexibler Content  
if( get_row_layout() == 'abfolge_start' ):

    // get fields
        $headline = get_sub_field('headline');
        $headline_abfolge = get_sub_field('headline_abfolge');
        $subheadline = get_sub_field('subheadline');
        $text = get_sub_field('text');
        $button_text = get_sub_field('button_text');
        $button_link = get_sub_field('button_link');

        ?>
        <section class="content-section abfolge_start-section flex flex-row fullwidth ">

        <div class="flex flex-row items-left gap-m inner-wrap wrap">

        <div class="flex col-50 flex-col gap-m">
            <h2><?php echo($headline); ?></h2>
            <h4><?php echo($subheadline); ?></h4>
            <div><?php echo($text); ?></div>
            <?php if($button_text){ ?>
                <div class="button-container flex items-left"> <a href="<?php echo($button_link); ?>" class="button button--blue"><?php echo($button_text); ?></a></div>
            <?php } ?> 
        </div>

        <div class="flex flex-col gap-m items-center col-50">

        <h3><?php echo($headline_abfolge); ?></h3>

        <div class="abfolge-small flex flex-col">

        <?php 

        // check for rows (parent repeater)
        if( have_rows('flow_steps') ): 
            // loop through rows (parent repeater)
            while( have_rows('flow_steps') ): the_row();

            // column options
            $headline = get_sub_field('headline');
            $icon_array = get_sub_field('icon');

        ?> 
        <div class="flex flex-row items-center gap-s block__step">

                <div class="abfolge_icon--small">
                   <i class="dashicons <?php echo($icon_array); ?>"></i>
                </div>
                 <h4 class="abfolge_headline"> <?php echo $headline; ?></h4>
          
        </div>

        <?php

        // End loop.
        endwhile; // end while repeater

        endif; // end repeater ?>
     </div>

    </div>
            
        </div> <?php // end inner-wrapper ?>
    </section>

    <?php

endif;

?>