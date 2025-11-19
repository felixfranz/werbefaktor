<?php 
 
// Element Class 
class vc_custom_headline extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_custom_headline_mapping' ),12 );
        add_shortcode( 'vc_call_custom_headline', array( $this, 'vc_call_custom_headline_html' ) );
    }
     
    // Element Mapping
    public function vc_custom_headline_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Custom Headline', 'text-domain'),
                'base' => 'vc_call_custom_headline',
                'description' => __('Display Headline', 'text-domain'), 
                'category' => __('Custom Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/library/images/vc_icons/element-icon-headline-colored.svg',
                 'params' => array(

                  array(
                    'type' => 'textarea',
                    'heading' => __( 'Text', 'js_composer' ),
                    'param_name' => 'vc_headline_text',
                    'description' => __( '', 'js_composer' ),
                    'admin_label' => true,
                    'group' => 'General',
                  ),

                    array(
                        "type" => "dropdown",
                        "heading" => __("Größe", 'text-domain') ,
                        "param_name" => "vc_headline_size",
                        'group' => 'General',
                        'admin_label' => true,
                        "value" => array(
                            "Bitte Auswählen" => "medium",
                             "Klein" => "small",
                            "Medium" => "medium",
                            "Groß" => "big",
                            ) ,
                            "description" => __("", 'text-domain')

                    ), // end params       
                    
                    array(
                        "type" => "dropdown",
                        "heading" => __("Ausrichtung", 'text-domain') ,
                        "param_name" => "vc_headline_align",
                        'group' => 'General',
                        'admin_label' => false,
                        "value" => array(
                            "Bitte Auswählen" => "left",
                             "Links" => "left",
                            "Mittig" => "center",
     
                            ) ,
                            "description" => __("", 'text-domain')

                    ), // end params

                     array(
                    'type' => 'vc_link',
                    'heading' => __( 'Link', 'js_composer' ),
                    'param_name' => 'headline_link',
                    'admin_label' => false,
                    'description' => __( 'Falls die Headline verlinkt sein soll', 'js_composer' ),
                    'group' => 'General',
                  ), // end params 

                   array(
                        "type" => "checkbox",
                        "heading" => "Mit Logo",
                        "param_name" => "check_logo",
                        'group' => 'General',
                        "value" => array(
                                "" => "true"
                            ),
                    ),
              )
            )
        );                                       
    }
        
// Element HTML
public function vc_call_custom_headline_html( $atts ) {

    $atts = vc_map_get_attributes('vc_call_custom_headline', $atts);
    extract($atts);

    $link = vc_build_link( $headline_link );
    //baseline
    $header_size = "h2";

    $icon = '';

    if($check_logo === 'true'){  
        $icon .= "logo_headline";  
    };

    if($vc_headline_size == "small"){
        $header_size = "h4";
    }
     if($vc_headline_size == "medium"){
        $header_size = "h3";
    }
     if($vc_headline_size == "big"){
        $header_size = "h2";
    }
   
        $output = '<'.$header_size.' class="custom_headline '.$icon.' '. $vc_headline_align .'">';

        if($headline_link){
            $output .=  '<a href="'.esc_url($link['url']).'" target="'.$link['target'].'">';
        }

        $output .=  $vc_headline_text ;'</'.$header_size.'>';    
        
        if($headline_link){
            $output .=  '</a>';
        }       
        
        $output .=  '</'.$header_size.'>';   
        
                  
    return $output;  
}
     
} // End Element Class
 
// Element Class Init
new vc_custom_headline(); 

?>