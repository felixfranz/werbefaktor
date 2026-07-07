<?php 

        // Case: Headline.  
        if( get_row_layout() == 'headline' ):

            $size = get_sub_field('headline_size');
            $headline = get_sub_field('my_headline');



            echo '<' . $size . '>' . $headline . '</'. $size . '>';
        endif; // end headline

?>