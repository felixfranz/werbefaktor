<?php 

        // Case: Button.  
        if( get_row_layout() == 'button' ):
            $button = get_sub_field('component_button');
                // get button options
                $button_text = $button['button_text'];
                $button_link = $button['button_link'];
                $button_style = $button['button_style'];
                $button_size = $button['button_size'];

                ?>
                <a href="<?php echo($button_link); ?>" class="button <?php echo($button_style); ?> button--<?php echo($button_size); ?>"><?php echo($button_text); ?></a>
            <?php 
        
        endif; // end button

?>