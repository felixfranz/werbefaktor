<?php 
 
// Element Class 
class vc_custom_button extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_custom_button_mapping' ),12 );
        add_shortcode( 'vc_call_custom_button', array( $this, 'vc_call_custom_button_html' ) );
    }
     
    // Element Mapping
    public function vc_custom_button_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Button', 'text-domain'),
                'base' => 'vc_call_custom_button',
                'description' => __('Button', 'text-domain'), 
                'category' => __('custom Custom Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/library/images/vc_icons/element-icon-button.svg',
                 'params' => array(

                     array(
                    'type' => 'vc_link',
                    'heading' => __( 'Link', 'js_composer' ),
                    'param_name' => 'image_link',
                    'admin_label' => false,
                    'description' => __( '', 'js_composer' ),
                    'group' => 'General',
                     ),

                     array(
                        "type" => "dropdown",
                        "heading" => __("Button Farbe", 'text-domain') ,
                        "param_name" => "vc_link_style",
                        'group' => 'General',
                        "value" => array(
                            "Bitte Auswählen" => "bitte Auswählen",
                            "Grün" => "btn_green",
                            "Weiß" => "btn_white",
                            "Grau" => "btn_gray"
                            
                            ) ,
                            "description" => __("", 'text-domain')

                    ), // end params            
              )
            )
        );                                       
    }
        
// Element HTML
public function vc_call_custom_button_html( $atts ) {

    $atts = vc_map_get_attributes('vc_call_custom_button', $atts);
    extract($atts);

    $link = vc_build_link( $image_link );


    $output = '  <a href="'.esc_url($link['url']).'" class="button '. $vc_link_style .'" target="'.$link['target'].'">'.$link['title'].'</a>';   
    
   
                  
    return $output;  
}
     
} // End Element Class
 
// Element Class Init
new vc_custom_button(); 

?>