<?php
define('LABASC_VERSION', '1.0.1');
require_once('wp_bootstrap_navwalker.php');

// chargement côté front-end
function labasc_scripts() {
    // chargement des styles
    wp_enqueue_style( 'labasc_bootstrap-core', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), LABASC_VERSION , 'all' );
    wp_enqueue_style( 'labasc_custom', get_template_directory_uri() . '/style.css', array('labasc_bootstrap-core'), LABASC_VERSION , 'all' );
    
    // chargement des scripts
    wp_enqueue_script( 'labasc_bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), LABASC_VERSION , true );
    wp_enqueue_script( 'labasc_index_script', get_template_directory_uri() . '/js/index.js', array('jquery', 'labasc_bootstrap-js'), LABASC_VERSION , true );
}
add_action('wp_enqueue_scripts', 'labasc_scripts');


// Fonction pour activer bootstrap sur la partie admin
// function labasc_admin_scripts() {
//     wp_enqueue_style( 'labasc_bootstrap-admin-core', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), LABASC_VERSION  );
// }
// add_action('admin_init', 'labasc_admin_scripts');


// Utilitaires
// function labasc_setup() {

//     // support des vignettes (image à la une dans articles wp)
//     add_theme_support( 'post-thumbnails' );

//     // enlève le générateur de version
//     remove_action('wp_head', 'wp_generator');

//     // enlève les guillemets à la française
//     // remove_filter('the_content', 'wptexturize');

//     // support du titre
//     add_theme_support('title-tag');
// }

// add_action('after_setup_theme', 'labasc_setup');

register_nav_menus(
    array(
        'primaire' => __('menu primaire', 'test')
    )
);


// Fonction qui rassemble les widgets
function labasc_widget(){
    // Première sidebar
    $args = array(
        'name' => __( 'Sidebar de droite', 'theme_text_domain' ),
        'id' => 'sidebar_droite',
        'description' => '',
        'class' => '',
        'before_widget' => '<li id="%1$s class=" widget">',
        'after_widget' => '</li>',
        'before_title' => '<h4 class="widgettitle">',
        'qfter_title' => '<>h4>'
    );

    register_sidebar( $args );

    // deuxième sidebar
    $args = array(
        'name' => __( 'Sidebar de droite', 'theme_text_domain' ),
        'id' => 'sidebar_droite',
        'description' => '',
        'class' => '',
        'before_widget' => '<li id="%1$s class=" widget">',
        'after_widget' => '</li>',
        'before_title' => '<h4 class="widgettitle">',
        'qfter_title' => '<>h4>'
    );

    register_sidebar( $args );

}

add_action('widgets_init', 'labasc_widget');