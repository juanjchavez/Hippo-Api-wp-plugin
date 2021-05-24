<?php
if(!defined('ABSPATH')) { exit; }
add_action("wp_ajax_hippo_getquote", "hippo_getquote");
add_action("wp_ajax_nopriv_hippo_getquote", "hippo_getquote");

function hippo_getquote(){
    // nonce check for an extra layer of security, the function will exit if it fails
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "hippo_getquote_nonce")) {
        exit();
    }   
    error_log("prueba");

    $baseURL=get_option('hippoURL',false);
    $baseURL=($baseURL != false) ? $baseURL : "";
    $Token=get_option('hippoToken',false);
    $Token=($Token != false) ? $Token : "";
    $args=$_REQUEST["args"];
    $URL =  "$baseURL?auth_token=$Token&$args";
    $result = CallAPI($URL);
    error_log(gettype($result));
    error_log($result);

    echo $result;  
    wp_die();
}

function CallAPI($url){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}