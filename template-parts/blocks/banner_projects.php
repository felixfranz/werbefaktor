<?php 

// Case:  Banner Grün  
if( get_row_layout() == 'banner_projects' ):

        // get fields
        $banner_projects = get_field('banner_projects', 'option');
       
        $teaser_headline = $banner_projects['headline'];
        $teaser_text = $banner_projects['text'];
        $button_text = $banner_projects['button_text'];
        $button_link = $banner_projects['button_link'];

        ?>
        <section class="flex fullwidth banner banner__purple">
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