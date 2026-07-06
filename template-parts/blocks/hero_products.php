<?php 

// Case: Bewegungs Teaser  
if( get_row_layout() == 'hero_product_banner' ):
          
    
        // get fields
        $variant = get_sub_field('variante');

        if ($variant == "fullsize") {
             $fullsize = get_sub_field('hero_fullsize');
             $headline = $fullsize['headline'];
             $text = $fullsize['text'];
             $background = $fullsize['background'];
             $tag_text = $fullsize['tag_text'];
             $link_text = $fullsize['link_text'];

             $product = $fullsize['link'];

             

             $image = $fullsize['image'];
             $image_url = $image['url'];

             ?>
            
             <section class="hero_product hero_product--full flex gap-m flex-row hero-bg-<?php echo $background;?>">
                <div class="hero__background bg-<?php echo $background;?>"></div>
                <div class="flex flex-col items-left items-justify-center gap-s col-50">
                    <div class="section-tag"> <?php echo $tag_text;?></div>
                    <h2><?php echo $headline;?></h2>
                    <div class="hero_text">
                         <?php echo $text;?>
                    </div>
                    <a href="<?php echo $product;?>" class="button button--on-color"><?php echo $link_text;?></a>
                </div>
                <div class="flex items-justify-center col-50">
                    <div class="hero__image-container">
                         <img src="<?php echo $image_url; ?>"/>
                    </div>
                </div>

             </section>
             <?php




        }

        if ($variant == "50_50") { ?>
        <section class="flex flex-row gap-m">
        <?php
           
            
        if( have_rows('doppel_hero_product') ):
            // Loop through rows.
            while ( have_rows('doppel_hero_product') ) : the_row(); 
            
             $headline = get_sub_field('headline');
             $text = get_sub_field('text');
             $background = get_sub_field('background');
             $tag_text = get_sub_field('tag_text');
             $link_text = get_sub_field('link_text');
             $product = get_sub_field('link');
            
             
            ?>

            <div class="hero_product hero_product--half flex flex-row col-50 hero-bg-<?php echo $background;?>">
                
                <div class="flex flex-col items-left items-justify-center gap-s">
                    <div class="section-tag"> <?php echo $tag_text;?></div>
                    <h2><?php echo $headline;?></h2>
                    <div class="hero_text">
                         <?php echo $text;?>
                    </div>
                    <a href="<?php echo $product;?>" class="button button--on-color"><?php echo $link_text;?></a>
                </div>
      

        </div>

            <?php  endwhile; // end while row

        endif;  // end if row ?>
            
        </section>

      <?php   } ?>
       

<?php 

endif;

?>