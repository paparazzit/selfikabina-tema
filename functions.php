<?php 

require get_theme_file_path('./inc_f/mailSender.php');
require get_theme_file_path('./inc_f/customPostTypes.php');

// SETUP TEME
function photoBooth_theme_support(){
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support('custom-spacing');
    add_theme_support('align-wide');

    // GUTENBERG EDITOR STILOVI
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // NAVIGACIJA
    register_nav_menus( array(
        'primary' => __('Primary Menu', "SselfiKabina_menu"),
        // 'secondary' => __('Footer menu', "selfikabina"),
        // 'page_menu' => __('Page Menu', "selfikabina"),
    ) );
}

function order_posts_by_title( $query ) { 
    if ( $query->is_home() && $query->is_main_query() ) { 
        $query->set( 'orderby', 'date' ); 
        $query->set( 'order', 'ASC' ); 
    } 
} 
add_action( 'pre_get_posts', 'order_posts_by_title' );

add_action( 'after_setup_theme', "photoBooth_theme_support" );

function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);

    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

// STILOVI
function photoBooth_theme_styles(){
    wp_enqueue_style('main_style', get_template_directory_uri(). '/style.css');
}
add_action( "wp_enqueue_scripts", "photoBooth_theme_styles");

function sk_novosti_single_layout_assets() {
    if ( is_singular('novosti') ) {
        $layout_css_path = get_template_directory() . '/assets/css/novosti-single-layout.css';
        $layout_js_path  = get_template_directory() . '/js/novosti-single-layout.js';

        wp_enqueue_style(
            'sk-novosti-single-layout',
            get_template_directory_uri() . '/assets/css/novosti-single-layout.css',
            array('main_style'),
            file_exists($layout_css_path) ? filemtime($layout_css_path) : '1.0'
        );

        wp_enqueue_script(
            'sk-novosti-single-layout',
            get_template_directory_uri() . '/js/novosti-single-layout.js',
            array(),
            file_exists($layout_js_path) ? filemtime($layout_js_path) : '1.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'sk_novosti_single_layout_assets', 101);

function my_n8n_chat_styles() {
    // Make sure the CDN stylesheet is printed first (you already add it in footer).
    // Then enqueue our overrides with a later priority or as a separate file.
    wp_enqueue_style(
        'my-n8n-chat-overrides',
        get_stylesheet_directory_uri() . '/n8n-chat.css',
        array(),
        filemtime(get_stylesheet_directory() . '/n8n-chat.css')
    );
}
add_action('wp_enqueue_scripts', 'my_n8n_chat_styles', 99);

// JS
function photoBooth_theme_js(){
    // wp_enqueue_script( 'axios', 'https://unpkg.com/axios/dist/axios.min.js' );
    wp_enqueue_script( 'axios', get_template_directory_uri() . '/js/axios.js', array(), '' ,true );
    // wp_enqueue_script( 'axios', 'https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js' );

    wp_enqueue_script('slider_js', get_template_directory_uri() . '/js/slider.js', array(), '' ,true );
    wp_enqueue_script('formValidation_js', get_template_directory_uri() . '/js/formValidation.js', array('axios'), "", true);
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', array(), '' ,true );
}
add_action('wp_enqueue_scripts', 'photoBooth_theme_js', 100, 0);

// Dodaj novosti CPT u category archive query
function novosti_u_kategorije($query) {
    if ( !is_admin() && $query->is_main_query() && is_category() ) {
        $query->set('post_type', array('post', 'novosti'));
    }
}
add_action('pre_get_posts', 'novosti_u_kategorije');

// Corp page JS — tooltip za brand logoe.
// CSS za corporate page se kompajlira kroz scss/style.scss u glavni style.css.
function sk_corp_page_scripts() {
    if ( is_front_page() || is_page( 'korporativni-dogadjaji' ) || is_page('corporate events') || is_page('corporate-events') ) {
        $corp_page_js_path = get_template_directory() . '/js/corp-page.js';

        wp_enqueue_script(
            'sk-corp-page-js',
            get_template_directory_uri() . '/js/corp-page.js',
            array(),
            file_exists($corp_page_js_path) ? filemtime($corp_page_js_path) : '1.0',
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'sk_corp_page_scripts' );

// CUSTOM MAILER
// SEND MAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

add_action('phpmailer_init', 'custom_mailer');

function custom_mailer ($phpmailer){
    $phpmailer ->isSMTP();
    $phpmailer ->SMTPDebug = 0; 
    $phpmailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );   
    $phpmailer -> setFrom('rezervacije@selfikabina.com', 'Selfi Kabina', false);

    $phpmailer ->Host= SMTP_HOST;  
    $phpmailer -> Username = SMTP_USERNAME;
    $phpmailer -> Password = SMTP_PASSWORD;
    // $phpmailer ->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $phpmailer ->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
    $phpmailer -> Port = 465;
    $phpmailer -> SMTPAuth = true;
    $phpmailer->isHTML(true);
}

/*Hide Author name*/
// function disable_version_authors($endpoints){
//     if(isset($endpoints['wp/v2/users'])){
//         unset($endpoints['wp/v2/users']);
//     }
//     
//     if(isset($endpoints['wp/v2/users(?P<id>[\d]+)'])){
//         unset($endpoints['wp/v2/users(?P<id>[\d]+)']);
//     }
//     return $endpoints;
// }
// add_filter('rest_endpoints', 'disable_version_authors');

// function disable_author(){
//     if(is_author()){
//         wp_redirect(home_url());
//         die();
//     }
// }
// add_action('template_redirect', 'disable_author');

?>