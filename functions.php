<?php


//die(site_url());
if(site_url() === "http://dev.learnwp.local") {
    define("VERSION", time());
}else {
    define("VERSION", wp_get_theme()->get('Version'));
}
function change_case( $text )
{
    return strtoupper($text);
}

//------------------------
// Hook
//------------------------
function alpha_bootstrapping() {
    load_theme_textdomain('alpha');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-header');
    register_nav_menu('topmenu', __('Top Menu', 'alpha'));
    register_nav_menu('footermenu', __('Footer Menu', 'alpha'));
}

add_action('after_setup_theme', 'alpha_bootstrapping');

//--------------------------------------------------

function alpha_assets() {

//    echo get_stylesheet_uri();
//    exit();
    wp_enqueue_style("alpha", get_stylesheet_uri(),null,VERSION);
    wp_enqueue_style('bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style('featherlight-css',"//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");

    wp_enqueue_script('featerlight-js',"//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js",array("jquery"),"0.0.1",true);
    wp_enqueue_script('alpha-main', get_theme_file_uri("/assets/js/main.js"), array('jquery', 'featerlight-js'), VERSION, true);
}
add_action('wp_enqueue_scripts', 'alpha_assets');

//---------------------------------------------------

function alpha_sidebar() {

    register_sidebar(
        array(
            'name' => __('Single Post Sidebar', 'alpha'),
            'id' => 'sidebar-1',
            'description' => __('Right Sidebar'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Footer Left', 'alpha'),
            'id' => 'footer-left',
            'description' => __('Widgets area on the left side'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => __('Footer Right', 'alpha'),
            'id' => 'footer-right',
            'description' => __('Widgets area on right side'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '',
            'after_title' => '',
        )
    );

    register_sidebar(array(
        'name' => __('Footer-3', 'alpha'),
        'id' => 'footer-3',
        'description' => __('Footer section-3'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '',
        'after_title' => '',
    ));

    
}

add_action("widgets_init", "alpha_sidebar");

//----------------------------------------------------

function add_link_css_class() {
    return 'class="my-class"';
}

add_filter('next_posts_link_attributes', 'add_link_css_class');
add_filter('previous_posts_link_attributes', 'add_link_css_class');

//-----------------------------------------------------------------

function alpha_the_excerpt( $excerpt ){
    if(!post_password_required()) {
        return $excerpt;
    }else {
        echo  get_the_password_form();
    }
}

function alpha_protected_title_change() {
    return "%s";
}

add_filter('the_excerpt', 'alpha_the_excerpt');


add_filter('protected_title_format', 'alpha_protected_title_change');

//----------------------------------------------

function alpha_nav_menu_css_class($classes, $item) {
    $classes[] = 'list-inline-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'alpha_nav_menu_css_class', 10,2);

//----------------------------------------------

function alpha_about_page_template_banner() {

    if(is_page()){
        $alpha_feat_image = get_the_post_thumbnail_url(null, "large");
    ?>
        <style>
            /*our style*/
            .page-header {
                background-image: url('<?php echo $alpha_feat_image ;?>');
            }
        </style>
<?php
    }
    
    if(is_front_page() || !is_page("about")){
        if(current_theme_supports("custom-header")){
            ?>

            <style>
                .header {
                    background-image: url(<?php echo header_image();?>);
                    background-size: cover;
                    background-position: center center;
                    margin-bottom: 50px;
                }
            </style>
<?php
        }
    }
}

add_action("wp_head", "alpha_about_page_template_banner",1000);
