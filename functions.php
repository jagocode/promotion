<?php 

//logo
function logo(){
    echo get_template_directory_uri().'/images/tokopedia-logo.png';
}

//after setup function
function promotion_setup(){
    //adding feed link
    add_theme_support('automatic-feed-links');
    //adding title 
    add_theme_support('title-tag');
    //adding post thumbnail
    add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme','promotion_setup');

function promotion_scripts(){
    //adding bootstrap css
    wp_enqueue_style('bootstrapcss',get_template_directory_uri().'/css/bootstrap.min.css');
    //adding style css
    wp_enqueue_style('stylesheet',get_stylesheet_uri());
    //add bootstrap js
    wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'2016',true);
}
add_action('wp_enqueue_scripts','promotion_scripts');

?>