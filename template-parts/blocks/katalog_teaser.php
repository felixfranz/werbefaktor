<?php 

// Case: Bewegungs Teaser  
if( get_row_layout() == 'katalog_teaser' ):


          
        // set slug for row post
        $ID = get_sub_field('katalog_content');
        
        // set up args
        $args = array(
        'p'           => $ID,
        'post_type'      => 'row',
        'posts_per_page' => 1
        );

        // get post 
        $my_posts = get_posts($args);

        if( $my_posts ) :
       
        
        // get fields by ID
        $teaser_headline = get_field('headline', $ID);
        $teaser_text = get_field('text_area', $ID, false, false, );

         $image = get_field('katalog_image', $ID);

         $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];

        $button = get_field('component_button', $ID);
        // get button options
        $button_text = $button['button_text'];
        $button_link = $button['button_link'];
        $button_style = $button['button_style'];
        $button_size = $button['button_size'];
        
        // options
        $teaser_color = get_sub_field('teaser_farbe');

        ?>
        <section class="flex fullwidth bg-light-blue deco-top deco-style-plain">
            <div class="flex flex-row items-left gap-md inner-wrap wrap">
                <div class="col-50 flex flex-col">
                <?php  echo '<h3>test' . $teaser_headline . '</h3>'; ?>
                <?php  echo '<p>' . $teaser_text. '</p>'; ?>
                <?php if($button){ ?>
                   <a href="<?php echo($button_link); ?>" class="button <?php echo($button_style); ?> button--<?php echo($button_size); ?>"><?php echo($button_text); ?></a>
               <?php } ?>
               </div>
               <div class="col-50 flex flex-col">
                   <img src="<?php echo $url; ?>" alt="" class="image-offset">
               </div>
            </div>

        </section>

        <?php

       
       
        endif; // end if row post

        ?>


<?php 

endif;

?>