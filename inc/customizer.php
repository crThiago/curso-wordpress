<?php

function wpcurso_customizer( $wp_curtimize )
{
    // Copyright
    $wp_curtimize->add_section(
        'sec_copyright',
        array(
            'title' => __( 'Copyright', 'wpcurso' ),
            'description' => __( 'Copyright Section', 'wpcurso' )
        )
    );

    $wp_curtimize->add_setting(
        'set_copyright',
        array(
            'type' => 'theme_mod',
            'default' => __( 'Copyright X - All Right Reserved', 'wpcurso' ),
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );
    
    $wp_curtimize->add_control(
        'set_copyright',
        array(
            'label' => __( 'Copyright', 'wpcurso' ),
            'description' => __( 'Choose whether to show the Services section or not', 'wpcurso' ),
            'section' => 'sec_copyright',
            'type' => 'text'
        )
    );
    

    // Map

    $wp_curtimize->add_section(
        'sec_map',
        array(
            'title' => __( 'Map', 'wpcurso' ),
            'description' => __( 'Map Section', 'wpcurso' )
        )
    );

    // API KEY

    $wp_curtimize->add_setting(
        'set_map_apikey',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );
    
    $wp_curtimize->add_control(
        'set_map_apikey',
        array(
            'label' => __( 'API key', 'wpcurso' ),
            'description' => sprintf( 
                __( 'Get your key <a target="_blank" href="%s">here</a>', 'wpcurso' ),
                'http://google.com.br'
            ),
            'section' => 'sec_map',
            'type' => 'text'
        )
    );

    // Address

    $wp_curtimize->add_setting(
        'set_map_address',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'esc_textarea'
        )
    );
    
    $wp_curtimize->add_control(
        'set_map_address',
        array(
            'label' => __( 'Type your address here', 'wpcurso' ),
            'description' => __( 'No special characters allowed', 'wpcurso' ),
            'section' => 'sec_map',
            'type' => 'textarea'
        )
    );

     // Slider

    $wp_curtimize->add_section(
        'sec_slider',
        array(
            'title' => __( 'Slider', 'wpcurso' ),
            'description' => __( 'Slider Section', 'wpcurso' )
        )
    );

    // Design

    $wp_curtimize->add_setting(
        'set_slider_design',
        array(
            'type' => 'theme_mod',
            'default' => '1',
            'sanitize_callback' => 'wpcurso_slug_sanitize_select'
        )
    );
    
    $wp_curtimize->add_control(
        'set_slider_design',
        array(
            'label' => __( 'Choose your design type here', 'wpcurso' ),
            'description' => __( 'Choose your design type', 'wpcurso' ),
            'section' => 'sec_slider',
            'type' => 'select',
            'choices' => array(
                '1' => __( 'Design 1', 'wpcurso' ),
                '2' => __( 'Design 2', 'wpcurso' ),
                '3' => __( 'Design 3', 'wpcurso' ),
                '4' => __( 'Design 4', 'wpcurso' )
            )
        )
    );
    
    // Limit

    $wp_curtimize->add_setting(
        'set_slider_limit',
        array(
            'type' => 'theme_mod',
            'default' => '3',
            'sanitize_callback' => 'absint'
        )
    );
    
    $wp_curtimize->add_control(
        'set_slider_limit',
        array(
            'label' => __( 'Number of post to display', 'wpcurso' ),
            'description' => __( 'Choose the number of posts to be displayed', 'wpcurso' ),
            'section' => 'sec_slider',
            'type' => 'number'
        )
    );
}

add_action( 'customize_register', 'wpcurso_customizer');

//select sanitization function
function wpcurso_slug_sanitize_select( $input, $setting ){
          
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                      
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
      
}