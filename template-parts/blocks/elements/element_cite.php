<?php 

            // Case: Zitat  
            if( get_row_layout() == 'cite' ):
                  $cite = get_sub_field('cite');
                  $author = get_sub_field('cite_author');
                echo '<div class="cite-container>"<p class="cite">'. $cite . '</p>';
                echo '<p class="author">'. $author . '</p></div>';
            
            endif; // end zitat

?>