<?php 
 
// Element Class 
class vc_custom_element extends WPBakeryShortCode {
     
    // Element Initiation
    function __construct() {
        add_action( 'init', array( $this, 'vc_custom_element_mapping' ),12 );
        add_shortcode( 'vc_call_custom_element', array( $this, 'vc_call_custom_element_html' ) );
    }
     
    // Element Mapping
    public function vc_custom_element_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => 'Custom element', // Name of the Element
                'base' => 'vc_call_custom_element',
                'description' => 'Display element', 
                'category' => 'Custom Elements',   
                'icon' => get_template_directory_uri().'/library/images/vc_icons/element-icon.svg',
                // Possible parameter - delete what you do not need
                'params' => array(

                // TEXTAREA
                  array(
                    'type' => 'textfield', // defines type of param
                    'heading' => 'Textfield', // Shown Headline 
                    'param_name' => 'element_textfield', // variable name for processing later
                    'description' => '', // description of element
                    'admin_label' => true, // do you want to see the value in the page builder layout
                    'group' => 'General', // if you want to seperate Params in Tabs, just name a Group different
                  ),
                
                  // TEXTFIELD - SMALLER THAN AREA
                array(
                    'type' => 'textarea',
                    'heading' =>'Textarea',
                    'param_name' => 'element_textarea',
                    'description' => '',
                    'admin_label' => true,
                    'group' => 'General',
                  ),

                  // DROPDOWN
                    array(
                        "type" => "dropdown",
                        "heading" => "Größe",
                        "param_name" => "element_dropdown",
                        'group' => 'General', 
                        'admin_label' => true,
                        "description" => "Description of Parameter",
                        "value" => array(
                            "Shown Value" => "my_value",
                            "Value" => "small",
                            "Woot" => "medium"
                            ) ,
                    ),    
                
                    // LINK
                     array(
                    'type' => 'vc_link',
                    'heading' => 'Link',
                    'param_name' => 'element_link',
                    'admin_label' => false,
                    'description' => '',
                    'group' => 'General',
                  ), 
                
                  // CHECKBOX
                   array(
                        "type" => "checkbox",
                        "heading" => "My Checkbox",
                        "param_name" => "element_checkbox",
                        'group' => 'General',
                        "value" => array(
                                "YES" => "true" // true if checked
                            ),
                    ),

                    // PARAM WITH DEPENDECY - in this case textfield but can be anything
                    array(
                    'type' => 'textfield',
                    'heading' => 'Text',
                    'param_name' => 'element_depended_text',
                    'description' => '',
                     "dependency" => array(
                        "element" => "element_checkbox", // NAME OF THE DEPENCECY
                        "not_empty" => true
                      ),
                    'admin_label' => false,
                    'group' => 'General',
                  ),
                    
                    // IMAGE
                     array(
                    'type' => 'attach_image',
                    'heading' => 'My Image',
                    'param_name' => 'element_image',
                    'admin_label' => false,
                    'description' => '',
                    'group' => 'General',
                  ), 

                  // WYSIWYG TEXTAREA
                  array(
                    "type" => "textarea_html",
                    "heading" => "My WYSIWYG Textarea",
                    "param_name" => "content", // must be named "content"
                    'group' => 'General',
                    )
              )
            )
        );                                       
    }
        
// Element HTML
public function vc_call_custom_element_html( $atts, $content = null) {

    // get all the params/attributes from the element
    $atts = vc_map_get_attributes('vc_call_custom_element', $atts);

    extract($atts); // paramsare now also variables with the value and same name as the param, eg $element_textfield

    // Build Image
    $image = wp_get_attachment_url( $atts['element_image'] );

    // Build a link
    $link           = vc_build_link( $element_link );
    $link_href      = esc_url($link['url']);
    $link_target    = $link['target']; // _blank etc
    $link_text      = $link['title'];

    $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content


    // generate the return variable
    $output = '';

    // add content to the variable with . before the =;
    $output .= '<div class="my_element">'; // start the element

    // if an element exists do stuff
    if($element_textfield){
        $output .=  '<h3>' . $element_textfield . '</h3>';
    }

    if($element_textarea){
        $output .=  '<p>' . $element_textarea . '</p>';
    }
    
    if($image){
     $output .= '<img src="'. $image . '" >';
    }

    if($link){
        $output .=  '<p><a href="'. $link_href .'" target="' . $link_target . '">'. $link_text .'</a></p>';
    }

    if($content){
        $output .=  '<div>'. $content .'</div>';
    }

    $output .= '</div>'; // close the element
   
 
        
    // echo the output                   
    return $output;  
}
     
} // End Element Class
 
// Element Class Init
new vc_custom_element(); 

?>