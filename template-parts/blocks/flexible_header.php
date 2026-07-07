<?php 

// Case: Bewegungs Teaser  
if( get_row_layout() == 'flexible_header' ):
          
    
        // get fields
        $variant = get_sub_field('variant');
        $headline = get_sub_field('headline');
        $subheadline = get_sub_field('subheadline');
        $text = get_sub_field('text');
        
        $image = '';
        $opacity = '';
        $background_color = '';
        $image_url= '';
      

        if ($variant == "image_full" || $variant =="image_50") {

            $image = get_sub_field('background_image');
            $opacity = get_sub_field('image_opacity');
            $background_color = get_sub_field('background_color');
            $image_url = $image['url'];
        }

    ?>
            
             <section class="flexible_header header--<?php echo $variant;?> flex gap-m flex-row header-bg-<?php echo $background_color;?>">
                <?php 
                 if ($variant == "image_full" || $variant =="image_50") { ?>

                <div class="header__background bg-<?php echo $variant;?> bg-<?php echo $background_color;?>">
                    <img src="<?php echo $image_url; ?>"/> 
                    <div class="backdrop" style="opacity:<?php echo $opacity; ?>%"></div>
                </div>

                 <?php } // end if ?>
                
                
                <div class="flex flex-col gap-s header__content">

                    <?php if ($subheadline) { ?>
                    <h2><?php echo $headline;?></h2>
                    <?php } ?>

                    <?php if ($subheadline) {
                        echo '<h3 class="subheadline">'.$subheadline.'</h3>';
                    } ?>

                    <?php if($text) { ?>
                    <div class="header_text flex flex-col">
                         <?php echo $text;?>
                    </div>
                    <?php } ?>
                    
                    <a href="#" class="scroll_down"><span></span></a>
                </div>
                
             </section>
            
    

       

<?php 

endif;

?>