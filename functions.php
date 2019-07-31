<?php

require get_template_directory() . '/inc/customizer.php';

// Incluindo os arquivo da TGM
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

// Carregando nossos scripts e styles
function load_scripts()
{
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_style('template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all');
    wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), null, true );
}
add_action('wp_enqueue_scripts', 'load_scripts');

// Carregando nossos styles do Gutenberg
function wpcurso_editor_style()
{
    wp_enqueue_style( 'editor-style', get_template_directory_uri() . '/css/style-editor.css' );
    wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato:400,900' );
    wp_enqueue_style( 'oswald', 'https://fonts.googleapis.com/css?family=Oswald:400,900' );
}
add_action( 'enqueue_block_editor_assets', 'wpcurso_editor_style' );

// Função de configuração do tema
function wpcurso_config()
{
    // Registrando nossos menus
    register_nav_menus(
        array(
            'my_main_menu' => __( 'Main menu', 'wpcurso' ),
            'footer_menu' => __( 'Footer menu', 'wpcurso' )
        )
    );

    $args = array(
        'height' => 225,
        'width' => 1920
    );
    add_theme_support( 'custom-header' , $args ); // Habilita inclusão de imagens de cabeçalho
    add_theme_support( 'post-thumbnails' ); // Habilita inclusão de thumbs nos posts
    add_theme_support( 'post-formats', array( 'image', 'video' ) );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array( 'width' => '110' , 'height' => '110') );

    //Suporte ao Gutenberg
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-color-palette', array(
            array(
                'name' => __( 'Blood Red', 'wpcurso' ),
                'slug' => 'blood-red',
                'color' => '#b9121b'
            ),
            array(
                'name' => __( 'White', 'wpcurso' ),
                'slug' => 'white',
                'color' => '#ffffff'
            )
        ) 
    );
    add_theme_support( 'disable-custom-colors' );


    // Habilitando suporte a tradução
    $textdomain = 'wpcurso';
    load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages' );
    load_theme_textdomain( $textdomain, get_template_directory() . '/languages' );
}
add_action('after_setup_theme', 'wpcurso_config', 0);

add_action('widgets_init', 'wpcurso_sidebars');
function wpcurso_sidebars()
{
    register_sidebar(
        array(
            'name' => __( 'Home Page Sidebar', 'wpcurso' ),
            'id' => 'sidebar-1',
            'description' => __( 'Sidebar to be used on Home Page', 'wpcurso' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Blog Sidebar', 'wpcurso' ),
            'id' => 'sidebar-2',
            'description' => __( 'Sidebar to be used on Blog', 'wpcurso' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    
    register_sidebar(
        array(
            'name' => __( 'Service 1', 'wpcurso' ),
            'id' => 'service-1',
            'description' => __( 'Sidebar to be used on Home', 'wpcurso' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Service 2', 'wpcurso' ),
            'id' => 'service-2',
            'description' => __( 'Sidebar to be used on Home', 'wpcurso' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Service 3', 'wpcurso' ),
            'id' => 'service-3',
            'description' => __( 'Sidebar to be used on Home', 'wpcurso' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Social Icons', 'wpcurso' ),
            'id' => 'social-midia',
            'description' => __( 'Widget social icons', 'wpcurso' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}