<?php 

        // Case: Button.  
        if( get_row_layout() == 'slider' ):
            $gallery = get_sub_field('slider_images');


                ?>
                 <?php if ($gallery) : ?>

                       <div  class="swiper js-swiper subcategory-slider"
                                
                                data-loop="true"
                                data-pagination="true"
                                data-navigation="true"
                            >
                            <div class="swiper-wrapper">

                                <?php foreach ($gallery as $image) : ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($image['sizes']['large']); ?>">
                                    </div>
                                <?php endforeach; // end Bilder Test ?>

                            </div>
                             <div class="swiper-pagination test"></div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>


                    <?php endif; ?>
            <?php 
        
        endif; // end button

?>