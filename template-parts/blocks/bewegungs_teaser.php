<?php 

// Case: Bewegungs Teaser  
if( get_row_layout() == 'bewegungs_teaser' ):
          
        // set slug for row post
        $the_slug = 'bewegungs-teaser';
        
        // set up args
        $args = array(
        'name'           => $the_slug,
        'post_type'      => 'row',
        'posts_per_page' => 1
        );

        // get post 
        $my_posts = get_posts($args);

        if( $my_posts ) :
        // get ID
        $ID = $my_posts[0]->ID;
        // get fields by ID
        $teaser_headline = get_field('headline', $ID);
        $teaser_text = get_field('text_area', $ID, false, false, );

        $button = get_field('bewegungs_button_component_button', $ID);
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
                <?php if($button){ ?>
                   <div class="button-container"> <a href="<?php echo($button_link); ?>" class="button <?php echo($button_style); ?> button--<?php echo($button_size); ?>"><?php echo($button_text); ?></a></div>
               <?php } ?>
            </div>
        </section>

        <?php

       
       
        endif; // end if row post

        ?>


<?php 

endif;

?>