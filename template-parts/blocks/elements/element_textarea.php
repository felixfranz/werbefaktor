<?php 

               // Case: Text Area.  
            if( get_row_layout() == 'text' ):
                  $text = get_sub_field('my_textarea');
                  $text_size = get_sub_field('text_size');
                echo '<div class="text text--'. $text_size .'">'. $text . '</div>';
            
            endif; // end text area

?>

