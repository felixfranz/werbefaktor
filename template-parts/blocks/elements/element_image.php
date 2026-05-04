<?php 

          // Case: Image  
            if( get_row_layout() == 'image' ):
                  $image = get_sub_field('image');
                  
                  if($image):

                    // Image variables.
                  $url = $image['url'];
                  $title = $image['title'];
                  $alt = $image['alt'];
                  $caption = $image['caption'];

                  // Thumbnail size attributes.
                  $size = 'thumbnail';
                  $thumb = $image['sizes'][ $size ];
                  $width = $image['sizes'][ $size . '-width' ];
                  $height = $image['sizes'][ $size . '-height' ];

                  endif;

                echo '<img src="' . $url . '"/>';
               
            
            endif;

?>