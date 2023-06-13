<?php
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
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'hello-elementor','hello-elementor','hello-elementor-theme-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 100 );

// END ENQUEUE PARENT ACTION

if( !function_exists('child_theme_enqueue_styles')) :
    function child_theme_enqueue_styles() {
        //wp_enqueue_style( 'post-5', get_stylesheet_directory_uri() . '/assets/css/post-5.css', [], '', 'all' );
        wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' , [], '5.3.0', 'all');
        wp_enqueue_style( 'color-switcher-design', get_stylesheet_directory_uri() . '/assets/css/color-switcher-design.css' , [], '', 'all');
        wp_enqueue_style( 'default-color', get_stylesheet_directory_uri() . '/assets/css/default-color.css' , [], '', 'all');
        wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css' , [], '4.3.0', 'all');
        wp_enqueue_style( 'flaticon', get_stylesheet_directory_uri() . '/assets/css/flaticon.css' , [], '', 'all');
        wp_enqueue_style( 'icofont', get_stylesheet_directory_uri() . '/assets/css/icofont.css' , [], '', 'all');
        wp_enqueue_style( 'owl', get_stylesheet_directory_uri() . '/assets/css/owl.css' , [], '2.2.0', 'all');
        wp_enqueue_style( 'linearicons', get_stylesheet_directory_uri() . '/assets/css/linearicons.css' , [], '', 'all');
        wp_enqueue_style( 'magnific-popup', get_stylesheet_directory_uri() . '/assets/css/magnific-popup.css' , [], '', 'all');
        wp_enqueue_style( 'bootstrap-touchspin', get_stylesheet_directory_uri() . '/assets/css/jquery.bootstrap-touchspin.css' , [], '', 'all');
        wp_enqueue_style( 'odometer-theme-default', get_stylesheet_directory_uri() . '/assets/css/odometer-theme-default.css' , [], '', 'all');
        wp_enqueue_style( 'mCustomScrollbar', get_stylesheet_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css' , [], '', 'all');
        wp_enqueue_style( 'preloader', get_stylesheet_directory_uri() . '/assets/css/preloader.css' , [], '', 'all');
        wp_enqueue_style( 'uikit', get_stylesheet_directory_uri() . '/assets/css/uikit.min.css' , [], '3.1.9', 'all');
        wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/assets/css/animate.css' , [], '', 'all');
        wp_enqueue_style( 'branix-global', get_stylesheet_directory_uri() . '/assets/css/global.css' , [], '', 'all');
        wp_enqueue_style( 'header', get_stylesheet_directory_uri() . '/assets/css/header.css' , [], '', 'all');
        wp_enqueue_style( 'footer', get_stylesheet_directory_uri() . '/assets/css/footer.css', [], '', 'all' );
        wp_enqueue_style( 'custom-animate', get_stylesheet_directory_uri() . '/assets/css/custom-animate.css', [], '', 'all' );
        wp_enqueue_style( 'barnix-style', get_stylesheet_directory_uri() . '/assets/css/style.css', [], '', 'all' );
        wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', [], '', 'all' );
        //wp_enqueue_style( 'home-7', get_stylesheet_directory_uri() . '/assets/css/home-7.css', [], '', 'all' );
        //wp_enqueue_style( 'post-1741', get_stylesheet_directory_uri() . '/assets/css/post-1741.css', [], '', 'all' );

        wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', ['jquery'], '', true );
        wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], '5.3.0', true );
        wp_enqueue_script( 'magnific-popup', get_stylesheet_directory_uri() . '/assets/js/magnific-popup.min.js', ['jquery'], '1.1.0', true );
        wp_enqueue_script( 'mCustomScrollbar', get_stylesheet_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', ['jquery'], '3.1.13', true );
        wp_enqueue_script( 'appear', get_stylesheet_directory_uri() . '/assets/js/appear.js', ['jquery'], '', true );
        wp_enqueue_script( 'parallax', get_stylesheet_directory_uri() . '/assets/js/parallax.min.js', ['jquery'], '', true );
        wp_enqueue_script( 'paroller', get_stylesheet_directory_uri() . '/assets/js/jquery.paroller.min.js', ['jquery'], '', true );
        wp_enqueue_script( 'owl', get_stylesheet_directory_uri() . '/assets/js/owl.js', ['jquery'], '2.2.0', true );
        wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/assets/js/wow.js', ['jquery'], '1.0.1', true );
        wp_enqueue_script( 'odometer', get_stylesheet_directory_uri() . '/assets/js/odometer.js', ['jquery'], '0.4.8', true );
        wp_enqueue_script( 'mixitup', get_stylesheet_directory_uri() . '/assets/js/mixitup.js', ['jquery'], '2.1.10', true );
        wp_enqueue_script( 'TweenMax', get_stylesheet_directory_uri() . '/assets/js/TweenMax.min.js', ['jquery'], '2.1.2', true );
        //wp_enqueue_script( 'backToTop', get_stylesheet_directory_uri() . '/assets/js/backToTop.js', ['jquery'], '', true );
        //wp_enqueue_script( 'cursor', get_stylesheet_directory_uri() . '/assets/js/cursor-script.js', ['jquery'], '', true );
        wp_enqueue_script( 'nav-tool', get_stylesheet_directory_uri() . '/assets/js/nav-tool.js', ['jquery'], '', true );
        wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', ['jquery'], '', true );
        wp_enqueue_script( 'color-settings', get_stylesheet_directory_uri() . '/assets/js/color-settings.js', ['jquery'], '', true );
        //wp_enqueue_script( 'script-min', get_stylesheet_directory_uri() . '/assets/js/script.min.js', ['jquery'], '', true );

    }
    add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');
endif;

// Logo
if( !function_exists( 'tp_logo' )):
    function tp_logo() {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) :
            echo '<a href="' . get_bloginfo('url') . '"><img class="img-responsive" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
        else :
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        endif;
    }
endif;
// Registermenu
/*if( !function_exists( 'tp_register_menu' )) :
    function tp_register_menu() {
        register_nav_menus( [
            'menu-1' => esc_html__( 'Primary', 'doangiuky' ),
        ] );    
    }
    add_action( 'after_setup_theme', 'tp_register_menu');
endif;*/
// Menu
/*if( !function_exists( 'tp_menu' )) :
    function tp_menu() {
        wp_nav_menu( [
            'theme_loaction' => 'menu-1',
            'container' => false,
            'menu_id' => 'barnix-primary-menu',
            'menu_class' => 'navigation clearfix'
        ] );
    }
endif;*/

// Menu Footer
/*if( !function_exists( 'tp_menu_footer' )) :
    function tp_menu_footer() {
        wp_nav_menu( [
            'theme_loaction' => 'menu-2',
            'container' => true,
            'menu_id' => 'menu-community',
            'menu_class' => 'page-list'
        ] );
    }
endif;*/

// Đăng ký sidebar
if( !function_exists( 'tp_childtheme_register_sidebar' )):
    function tp_childtheme_register_sidebar() {        
        register_sidebar( [
            'name'          => __( 'Home', 'hello-elementor' ),
            'id'            => 'tp-home',
            'before_widget' => '<section id="%1$s" class="%2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ] );
        register_sidebar( [
            'name'          => __( 'Footer', 'hello-elementor' ),
            'id'            => 'tp-footer',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ] );
        register_sidebar( [
            'name'          => __( 'Footer Center', 'hello-elementor' ),
            'id'            => 'tp-footer1',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ] );
        register_sidebar( [
            'name'          => __( 'Footer End', 'hello-elementor' ),
            'id'            => 'tp-footer2',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ] );
        register_sidebar( [
            'name'          => __( 'Footer Page', 'hello-elementor' ),
            'id'            => 'tp-footer-page',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6 id="%1$s" class="%2$s widget-title">',
            'after_title'   => '</h6>',
        ] );
    }
    add_action( 'widgets_init', 'tp_childtheme_register_sidebar');
endif;

// Disable block editor
if( !function_exists( 'disable_block_editor' )):
    function disable_block_editor() {
        remove_theme_support( 'widgets-block-editor' );
    }
    add_action( 'after_setup_theme', 'disable_block_editor' );
endif;

/**
 * Khu vực widget cá nhân
 */
//$fle = realpath(dirname(__FILE__)).'/widgets/widgets_index.php';
require_once get_stylesheet_directory() . '/widgets/widgets_index.php';
