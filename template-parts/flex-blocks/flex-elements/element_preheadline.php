<?php 

                // Case: Preheadline.  
        if( get_row_layout() == 'preheadline' ):
                $preheadline = get_sub_field('my_preheadline');
            echo '<h4>'. $preheadline . '</h4>';
        
        endif; // end preheadline

?>