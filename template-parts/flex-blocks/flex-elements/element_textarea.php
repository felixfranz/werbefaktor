<?php 

               // Case: Text Area.  
            if( get_row_layout() == 'text' ):
                  $text = get_sub_field('my_textarea');
                echo '<p>'. $text . '</p>';
            
            endif; // end text area

?>