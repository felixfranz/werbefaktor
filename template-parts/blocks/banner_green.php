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
        <section class="flex fullwidth">
            <div class="flex flex-col items-center items-justify-center gap-l inner-wrap wrap col-66">
                <?php  echo '<h1>' . $teaser_headline . '</h1>'; ?>
                <?php  echo '<p>' . $teaser_text. '</p>'; ?>

                </div>
                <?php if($button_text){ ?>
                   <div class="button-container"> <a href="<?php echo($button_link); ?>" class="button"><?php echo($button_text); ?></a></div>
               <?php } ?>
            </div>
        </section>


<?php 

endif;

?>