<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'twenty-twenty-one-style','twenty-twenty-one-style','twenty-twenty-one-print-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

// Register our custom block
add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {
    if( function_exists('acf_register_block_type') ) {
        acf_register_block_type(array(
            'name'            => 'jhl-split-image-block',
            'title'           => __('Split Image'),
            'description'     => __('Block with an image on one side, content on the other'),
            'render_template' => 'template-parts/blocks/split-image/split-image.php',
            'enqueue_style'   => get_stylesheet_directory_uri() . '/template-parts/blocks/split-image/split-image.css',
            'category'        => 'layout',
            'icon'            => 'analytics',
            'mode'            => 'edit',
        ));
        acf_register_block_type(array(
            'name'            => 'jhl-latest-posts-block',
            'title'           => __('Latest Posts'),
            'description'     => __('Block with an title, content, and latest posts'),
            'render_template' => 'template-parts/blocks/latest-posts/latest-posts.php',
            'enqueue_style'   => get_stylesheet_directory_uri() . '/template-parts/blocks/latest-posts/latest-posts.css',
            'category'        => 'layout',
            'icon'            => 'analytics',
            'mode'            => 'edit',
        ));
        acf_register_block_type(array(
            'name'            => 'slider',
            'title'           => __('Slider'),
            'description'     => __('ACF Slider w/large image support.'),
            'render_template' => 'template-parts/blocks/slider/slider.php',
            'category'        => 'embed',
            'icon'            => 'format-gallery',
            'keywords'        => array( 'slider', 'gallery', 'carousel' ),
            'align_content'   => 'center',
            'mode'            => 'edit',
            'enqueue_assets'  => function(){
                wp_enqueue_style( 'slider-slick',                get_stylesheet_directory_uri() . '/template-parts/blocks/slider/slick.css' );
                wp_enqueue_style( 'slider-slick-theme',          get_stylesheet_directory_uri() . '/template-parts/blocks/slider/slick-theme.min.css' );
                wp_enqueue_script( 'slider-slick',               get_stylesheet_directory_uri() . '/template-parts/blocks/slider/slick.min.js', array('jquery'), '', true );
                wp_enqueue_style( 'slider-slick-lightbox-theme', get_stylesheet_directory_uri() . '/template-parts/blocks/slider/slick-lightbox.min.css' );
                wp_enqueue_script( 'slider-slick-lightbox',      get_stylesheet_directory_uri() . '/template-parts/blocks/slider/slick-lightbox.min.js', array('jquery','slider-slick'), '', true );
                wp_enqueue_script( 'slider-slick-init',          get_stylesheet_directory_uri() . '/template-parts/blocks/slider/slick-init.js', array('jquery','slider-slick'), '', true );
            },
        ));
    }
}