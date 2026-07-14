<?php 

        // Case: Button.  
        if( get_row_layout() == 'image_grid' ):



            $gallery = get_sub_field('grid_images');
            $image_grid_count = get_sub_field('grid_style');
            $image_style = get_sub_field('image_style');

            if ($image_grid_count == '') {
                $image_grid_count = 'image_grid-3';   
            }

            if ($image_style == '') {
                $image_style = 'style--images';   
            }


            $content = "";

                ?>
                 <?php if ($gallery) : ?>

                       <div  class="image_grid <?php echo $image_grid_count; ?>" >
                         
                                <?php foreach ($gallery as $image) : 

                                    $content .= '<div class="grid_image">';
                                    // regular grid style with lightbox
                                    if($grid_style == 'style--images') {
                                    $content .= '<a class="gallery_image" data-slb-group="lighbox-2" href="'. $image['url'] .'">'; 
                                    $content .= '<img src="'. esc_url($image['sizes']['large']) .'" data-slb-group="lighbox-1">';
                                    $content .= '</a>';                                    
                                    }  
                                    if($image_style == 'style--logos') {
                                    // grid style without lightbox
                                    $content .= '<img src="'. esc_url($image['sizes']['large']) .'" class="grid_logo">';
                                    }

                                    $content .= '</div>';
                                    ?>
                                    
                                <?php endforeach; // end Bilder 
                                if($grid_style == 'style--images') {
                                     // start Lightbox
                                    if ( function_exists('slb_activate') ){
                                    $content = slb_activate($content);
                                    }                                  
                                }  
                               
                                    
                                echo $content;
                                 ?>
                                
                            </div>
                           
                    


                    <?php endif; ?>
            <?php 
        
        endif; // end button

?>