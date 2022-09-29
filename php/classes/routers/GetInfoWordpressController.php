<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class GetInfoWordpressController
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
           // $json = file_get_contents("php://input");
           $json =  sanitize_text_field(file_get_contents("php://input"));

           // Converts it into a PHP object
           $data = json_decode($json, true);
   
           $Site_title = sanitize_title(json_encode($data['Site_title']));
           $Site_tagline = sanitize_title(json_encode($data['Site_tagline']));
           $current_user = wp_get_current_user();
         

    
            if($data){
                return array('Site_title' => esc_html(sanitize_text_field( get_bloginfo( $Site_title ))),
                'Site_tagline' => esc_html(sanitize_text_field( get_bloginfo( $Site_tagline ))),
                'Current_user' => esc_html(sanitize_text_field( $current_user->user_login))

            );
            }
    
       
    }
}
