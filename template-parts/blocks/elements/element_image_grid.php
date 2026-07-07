<?php 

        // Case: Button.  
        if( get_row_layout() == 'image_grid' ):
            $gallery = get_sub_field('grid_images');

            $content = "";

                ?>
                 <?php if ($gallery) : ?>

                       <div  class="image_grid" >
                         
                                <?php foreach ($gallery as $image) : 
                                    
                                    ?>
                                    <div class="grid_image">
                                        <img src="<?php echo esc_url($image['sizes']['large']); ?>">
                                    </div>
                                <?php endforeach; // end Bilder ?>

                            </div>
                           
                    


                    <?php endif; ?>
            <?php 
        
        endif; // end button

?>