<?php 

        // Case: Headline.  
        if( get_row_layout() == 'headline' ):
            
            $headline = get_sub_field('my_headline');
            echo '<h2>'. $headline . '</h2>';
        endif; // end headline

?>