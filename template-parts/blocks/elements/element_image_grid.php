<?php 

        // Case: Button.  
        if( get_row_layout() == 'image_grid' ):
            $gallery = get_sub_field('grid_images');

            $content = "";

                ?>
                 <?php if ($gallery) : ?>

                       <div  class="image_grid" >
                         
                                <?php foreach ($gallery as $image) : 
                                    $content .= '<div class="grid_image">';
                                    $content .= '<a class="gallery_image" data-slb-group="lighbox-2" href="'. $image['url'] .'">'; 
                                    $content .= '<img src="'. esc_url($image['sizes']['large']) .'" data-slb-group="lighbox-1">';
                                    $content .= '</a></div>';
                                    ?>
                                    
                                <?php endforeach; // end Bilder 
                                // start Lightbox
                                if ( function_exists('slb_activate') ){
                                $content = slb_activate($content);
                                }
                                    
                                echo $content;
                                 ?>
                                

                            </div>
                           
                    


                    <?php endif; ?>
            <?php 
        
        endif; // end button

?>