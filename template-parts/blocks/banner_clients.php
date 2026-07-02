<?php 

// Case: Bewegungs Teaser  
if( get_row_layout() == 'safety_teaser' ):
          
    
        // get fields
        $teaser_headline = get_field('safe-headline', 'option');
        $teaser_text = get_field('safe-text_area','option', false, false, );
        $button = get_field('component_button', 'option');

        // get button options
        $button_text = $button['button_text'];
        $button_link = $button['button_link'];
        $button_style = $button['button_style'];
        $button_size = $button['button_size'];
        
        // options
        $teaser_color = get_sub_field('teaser_farbe');

        ?>
        <section class="flex fullwidth bg-<?php echo $teaser_color; ?>">
            <div class="flex flex-col items-center items-justify-center gap-l inner-wrap wrap col-66">
                <?php  echo '<h1>' . $teaser_headline . '</h1>'; ?>
                <?php  echo '<p>' . $teaser_text. '</p>'; ?>

                <div class="flex flex-row gap-md items-center">

                <?php 
                
                if( have_rows('safety-logos', 'option') ):

                // Loop through rows.
                while ( have_rows('safety-logos','option') ) : the_row(); 
                $image = get_sub_field('safe-image');
                 $size = 'medium';
                  $thumb = $image['sizes'][ $size ];?>


                            <div class="col-33"><img src="<?php echo $thumb; ?>" alt=""></div>

                <?php  endwhile; // end while row

                endif;  // end if row ?>

                </div>
                <?php if($button_text){ ?>
                   <div class="button-container"> <a href="<?php echo($button_link); ?>" class="button <?php echo($button_style); ?> button--<?php echo($button_size); ?>"><?php echo($button_text); ?></a></div>
               <?php } ?>
            </div>
        </section>


<?php 

endif;

?>