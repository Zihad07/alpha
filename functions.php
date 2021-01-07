<?php

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
}

add_action('after_setup_theme', 'alpha_bootstrapping');

//--------------------------------------------------

function alpha_assets() {

//    echo get_stylesheet_uri();
//    exit();
    wp_enqueue_style("alpha", get_stylesheet_uri());
    wp_enqueue_style('bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");

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


