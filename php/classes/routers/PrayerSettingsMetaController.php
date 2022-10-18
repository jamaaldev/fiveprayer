<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if(!class_exists('FivePrayer_PrayerSettingsMetaController')){


class FivePrayer_PrayerSettingsMetaController
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
  
        //   dont add duplicate meta-key delete if exists. this is a single selection
        $meta = sanitize_text_field($request['meta']);
        $wpdb->delete('wp_fp_prayer_settings_meta', array('meta-key' => $meta));
        
        
        $value = sanitize_text_field(json_encode($request['value']));
        $wpdb->insert('wp_fp_prayer_settings_meta', array('meta-key' => $meta, 'value' => $value));

        exit();
    }

    public function fp_get_meta(WP_REST_Request $request)
    {
        global $wpdb;
        $results = $wpdb->prepare("SELECT * FROM wp_fp_prayer_settings_meta "); 
        $prayersettingmeta = $wpdb->get_results($results);
        if ($prayersettingmeta) {
            return $prayersettingmeta;
        }
        exit();
    }
}
}