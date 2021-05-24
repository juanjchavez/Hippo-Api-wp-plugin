<?php
if(!defined('ABSPATH')) { exit; }
add_action('admin_menu','hippoMenuPage');
add_action('admin_init', 'hippoSettingsInit');
add_action('admin_notices', 'hippoAddSettingsErrors');

function hippoMenuPage(){
    add_menu_page("Hippo API","Hippo API",'activate_plugins','hippo_api','hippoMenuPageContent','dashicons-edit-page',21);
}

function hippoSettingsInit(){
    add_settings_section('hippoURLSection','','', 'hippo_api');
    add_settings_section('hippoTokenSection','', '', 'hippo_api');

    add_settings_field('hippoURLSetting','API Url', 'hippoURLSetting_callback', 'hippo_api','hippoURLSection');
    add_settings_field('hippoTokenSetting','API Token', 'hippoTokenSetting_callback', 'hippo_api','hippoTokenSection');

    register_setting('hippo_api','hippoURL',[
        "sanitize_callback" => "hippoURLSanitize"
    ]);
    register_setting('hippo_api','hippoToken');
}

function hippoURLSanitize($input = null){
    if($input == null){
        return null;
    }else{
        $result=filter_var($input, FILTER_VALIDATE_URL);
        if(empty($result)){
            add_settings_error('hippo_api','hippo-not-url',"API Urlfield has to be a valid url","error");
        }else{
            return $input;
        }
    }
}
function hippoURLSetting_callback(){
    $URL=get_option('hippoURL',false);
    $URL=($URL != false) ? $URL : "";
    echo '<input class="regular-text" type="text" id="hippoURL" name="hippoURL" value="'.$URL.'"  placeholder="https://api.test/endpoint">';
}

function hippoTokenSetting_callback(){
    $Token=get_option('hippoToken',false);
    $Token=($Token != false) ? $Token : "";
    echo '<input class="regular-text" type="text" id="hippoToken" name="hippoToken" value="'.$Token.'" placeholder="Token">';
}

function hippoAddSettingsErrors() {
	
    settings_errors();
    
}

function hippoMenuPageContent(){
    echo "<div class='wrap'>
            <h1>Settings page for Hippo API wordpress plugin</h1>
            <form action='options.php' method='post'>";
                do_settings_sections('hippo_api');
                settings_fields('hippo_api');
                submit_button();
    echo "  </form>         
         </div>";
}
