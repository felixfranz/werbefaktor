<?php 

// Case:  Banner Grün  
if( get_row_layout() == 'section_banner_green' ):

        // get fields
        $banner_green = get_field('banner_green', 'option');
       
        $teaser_headline = $banner_green['headline'];
        $teaser_text = $banner_green['text'];
        $button_text = $banner_green['button_text'];
        $button_link = $banner_green['button_link'];

        ?>
        <section class="flex fullwidth banner banner__green">
            <div class="inner-wrap flex flex-row wrap">
                <div class="flex flex-col items-left items-justify-center col-66">
                    <?php  echo '<span class="banner__headline">' . $teaser_headline . '</span>'; ?>

                </div>
                <div class="flex flex-col items-left items-justify-center gap-l col-33">
                   
                    <?php  echo '<p class="banner__text">' . $teaser_text. '</p>'; ?>

                  
                   <?php if($button_text){ ?>
                    <div class="button-container flex items-left"> <a href="<?php echo($button_link); ?>" class="button button--on-color"><?php echo($button_text); ?></a></div>
                <?php } ?> 
                </div>
            </div>

        </section>


<?php 

endif;

?>