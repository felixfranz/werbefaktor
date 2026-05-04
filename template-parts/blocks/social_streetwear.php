<?php 

// Case: Header Area.  
if( get_row_layout() == 'social_streetwear' ):
          
        $image = get_sub_field('background_image');
        $opacity = get_sub_field('opacity');
        $social_headline = get_sub_field('social_headline');
        $streetwear_link = get_sub_field('streetwear_link');

        $link_facebook 	= get_field('options_facebook', 'option');
        $link_youtube 	= get_field('options_youtube', 'option');
        $link_linkedin 	= get_field('options_linkedin', 'option');
        $link_instagram = get_field('options_instagram', 'option'); 

        if($image):

            // Image variables.
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];


        endif;
        ?>

        <section class="fullwidth flex section__social-streetwear">
            
            <div class="image-container">
                <img src="<?php echo $url; ?>"/>
                <div class="backdrop" style="opacity:<?php echo $opacity; ?>%"></div>
            </div>

                <div class="flex flex-row items-left gap-md inner-wrap wrap">

                    <div class="flex flex-col items-center items-vert-center col-50 socials">
                        <h3 class="color-white"><?php echo($social_headline); ?></h3>
                        <div class="flex icon-container socials_icon-container gap-md">
                            <div class="col-25">	<?php if ($link_facebook) {
								echo '<a href="' . $link_facebook .' "><span class="social_icon"><i class="fab fa-facebook" aria-hidden="true"></i></span></a>';
								} 	?></div>
                            <div class="col-25"><?php if ($link_youtube) {
								echo '<a href="' . $link_youtube .' "><span class="social_icon"><i class="fab fa-youtube" aria-hidden="true"></i></span></a>';
								} 	?></div>
                            <div class="col-25"><?php if ($link_linkedin) {
								echo '<a href="' . $link_linkedin .' "><span class="social_icon"><i class="fab fa-linkedin" aria-hidden="true"></i></span></a>';
								} 	?></div>
                            <div class="col-25"><?php if ($link_instagram) {
								echo '<a href="' . $link_instagram .' "><span class="social_icon"><i class="fab fa-instagram" aria-hidden="true"></i></span></a>';
								} 	?></div>

                        </div>
                    </div>
                    
                    <div class="flex flex-col items-center col-50 items-vert-center">
                        
                            <a href="<?php echo $streetwear_link; ?>" class="streetwear-logo"></a>
                        
                    </div>

            </div>
        </section>

<?php 

endif;

?>