<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class FivePrayer_GetInfoWordpressController
{
    public function __construct()
    {
        add_action('rest_api_init', array($this, 'prayer_settings_meta_route'));
        

    }

    public function prayer_settings_meta_route()
    {
    
      
        register_rest_route('fp/v1', '/fp_infoblog', array(
             'methods' => WP_REST_Server::ALLMETHODS,
             'callback' => array($this, 'fp_getInfoWordpress'),
             'permission_callback' => function () {
                 return current_user_can('manage_options');
             },

        ));
    }

 

    public function fp_getInfoWordpress(WP_REST_Request $request)
    {
        
         
            if(wp_get_current_user()->user_login){
                return array('Site_title' =>  get_bloginfo( sanitize_title(sanitize_text_field($request['Site_title'])) ),
                'Site_tagline' =>  get_bloginfo( sanitize_title(sanitize_text_field($request['Site_tagline'])) ),
                'Current_user' => wp_get_current_user()->user_login

            );
            }
    
            exit();
    }
}
