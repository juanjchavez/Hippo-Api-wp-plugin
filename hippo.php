<?php
/* 
Plugin name: Hippo Api Test
Description: Take Home Assesment for Paktolus Solutions
version: 1.0.0
Author: Juan Chavez
Author URI: https://juanchavez.dev 
*/

function hippoLoadStyles(){
    wp_enqueue_style('bulmaStyles',plugin_dir_url( __FILE__ ).'Assets/css/bulma.min.css','','0.9.2','all');
    wp_enqueue_style('hippoStyles',plugin_dir_url( __FILE__ ).'Assets/css/hippo.css','','1.0.0','all');
    wp_enqueue_script('hippoJS', plugin_dir_url( __FILE__ ).'Assets/js/hippo.js',['jquery']);
}
add_action('wp_enqueue_scripts','hippoLoadStyles');

//Include Section
include_once 'Includes/frontend/shortcode.php';
include_once 'Includes/backend/settigsPage.php';