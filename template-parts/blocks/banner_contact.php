<?php 

// Case:  Banner Grün  
if( get_row_layout() == 'banner_contact' ):

        // get fields
        $banner_contact = get_field('banner_more_infos', 'option');
       
        $teaser_headline = $banner_contact['headline'];
        $teaser_text = $banner_contact['text'];
        $tag_text = $banner_contact['tag_text'];
        $tag_color = $banner_contact['tag_color'];


        ?>
       <section class="related_products section-with-tag flex flex-col gap-m">

			<div class="section-tag section-tag--pink"><span><?php echo($tag_text); ?></span></div>
            <div class="inner-wrap flex flex-col col-66 wrap">
                <div class="flex flex-col">
                    <?php  echo '<h3>' . $teaser_headline . '</h3>'; ?>
                   
                    <?php  echo $teaser_text ?>

                </div>
            </div>

        </section>


<?php 

endif;

?>