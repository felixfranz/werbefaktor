<?php 

          // Case: Image  
            if( get_row_layout() == 'image' ):
                  $image = get_sub_field('image');

                echo '<img src="' . $image['url'] . '"/>';
            
            endif;

?>