<?php 

// Case: Client Row
if( get_row_layout() == 'banner_clients' ): 
 $headline = get_sub_field('banner_text');
 $gallery = get_sub_field('client_logos');
?>


        <section class="content-section clients-banner flex fullwidth  ">
            
            <div class="flex flex-row clients-banner-inner">
                
                <div class="flex items-center col-33">
                    <h3><?php echo($headline); ?></h3>
                </div>

                <div class="grid logo-grid col-auto">

                    <?php 

                    // check for rows (parent repeater)
                    if ($gallery) : 
                        // loop through rows (parent repeater)
                        foreach ($gallery as $image) : 

                        // get fields
                        $image_url = $image['url'];
                        

                    ?> 
                    <div class="grid-item flex items-center">
                        <img src="<?php echo $image_url; ?>"/> 
                    </div>
                    
                        
                    <?php // end logo grid item

                     endforeach; // end Bilder 

                    endif; // end repeater ?>

                </div> <?php // end grid ?>
           
        </div> <?php // end inner-wrapper ?>
   
    </section>


<?php

endif;

?>