<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class PrayerSettingsMetaController
{
    public function __construct()
    {
        add_action('rest_api_init', array($this, 'prayer_settings_meta_route'));
    }

    public function prayer_settings_meta_route()
    {
        register_rest_route('fp/v1', '/fp_prayersettings_meta', array(
             'methods' => WP_REST_Server::CREATABLE,
             'callback' => array($this, 'fp_insert_meta'),
             'permission_callback' => function () {
                 return current_user_can('manage_options');
             },
        ));

        register_rest_route('fp/v1', '/fp_prayersettings_meta', array(
             'methods' => WP_REST_Server::READABLE,
             'callback' => array($this, 'fp_get_meta'),
             'permission_callback' => function () {
                 return current_user_can('manage_options');
             },

        ));
    }

    public function fp_insert_meta(WP_REST_Request $request)
    {
        global $wpdb;
        // $json = file_get_contents("php://input");
        $json =  sanitize_text_field(file_get_contents("php://input"));

        // Converts it into a PHP object
        $data = json_decode($json, true);

        $value = json_encode($data['value']);
        
        //   dont add duplicate meta-key delete if exists. this is a single selection
        $wpdb->delete('wp_fp_prayer_settings_meta', array('meta-key' => $data['meta']));


        $wpdb->insert('wp_fp_prayer_settings_meta', array('meta-key' => $data['meta'], 'value' => $value));

          //    return  $request->get_params();
        exit();
    }

    public function fp_get_meta(WP_REST_Request $request)
    {
        global $wpdb;
        $results = $wpdb->prepare("SELECT * FROM wp_fp_prayer_settings_meta "); //query to fetch record only from user_ip field
        $prayersettingmeta = $wpdb->get_results($results);
        if ($prayersettingmeta) {
            return $prayersettingmeta;
        }
        exit();
    }
}
