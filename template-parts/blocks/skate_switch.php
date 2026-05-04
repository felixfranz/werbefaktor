<?php 

// Case: Header Area.  
if( get_row_layout() == 'skate_switch' ):
          
        $image_full = get_sub_field('fullsize_background');
        $headline_full = get_sub_field('fullsize_headline');
        $text_full = get_sub_field('fullsize_text');
        $button_full = get_sub_field('fullsize_button_component_button');

        // get button options
        $button_full_text = $button_full['button_text'];
        $button_full_link = $button_full['button_link'];
        $button_full_style = $button_full['button_style'];
        $button_full_size = $button_full['button_size'];

        if($image_full):
            // Image variables.
            $url_full = $image_full['url'];
            $title_full = $image_full['title'];
            $alt_full = $image_full['alt'];

        endif;
       


        $image_light = get_sub_field('light_background');
        $headline_light = get_sub_field('light_headline');
        $text_light = get_sub_field('light_text');
        $button_light = get_sub_field('light_button_component_button');

        // get button options
        $button_light_text = $button_light['button_text'];
        $button_light_link = $button_light['button_link'];
        $button_light_style = $button_light['button_style'];
        $button_light_size = $button_light['button_size'];

        if($image_light):
            // Image variables.
            $url_light = $image_light['url'];
            $title_light = $image_light['title'];
            $alt_light = $image_light['alt'];

        endif;
        ?>

        <section class="fullwidth flex section__skate-switch deco-bottom deco-style-color">
            
                    <div class="flex flex-col items-center items-vert-center col-50 skate__fullsize">
                        <div class="image-container"> 
                            <img src="<?php echo $url_full; ?>"/>
                        </div>
                        <div class="content-container flex flex-col items-center items-justify-center gap-md">
                            <h3 class="color--white"><?php echo($headline_full); ?></h3>
                            <p class="color--white"><?php echo($text_full); ?></p>
                            <?php if($button_full){ ?>
                            <div class="button-container"> 
                                <a href="<?php echo($button_full_link); ?>" class="button button--color-white <?php echo($button_full_style); ?> button--<?php echo($button_full_size); ?>"><?php echo($button_full_text); ?></a>
                            </div>
                         <?php } ?>
                        </div>

                    </div>

                      <div class="flex flex-col items-center items-vert-center col-50 skate__lightweight bg-light-blue">
                        <div class="image-container" style="display:none"> 
                           <img src="<?php echo $url_light; ?>"/>
                        </div>
                        <div class="content-container flex flex-col items-center items-justify-center gap-md">
                            <h3><?php echo($headline_light); ?></h3>
                            <p><?php echo($text_light); ?></p>
                            <?php if($button_light){ ?>
                            <div class="button-container"> 
                                <a href="<?php echo($button_light_link); ?>" class="button <?php echo($button_light_style); ?> button--<?php echo($button_light_size); ?>"><?php echo($button_light_text); ?></a>
                            </div>
                         <?php } ?>
                        </div>

                    </div>
                    
        </section>

<?php 

endif;

?>