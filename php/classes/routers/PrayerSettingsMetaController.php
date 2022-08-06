<?php

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
               'permission_callback' => function() {
                    return current_user_can( 'manage_options' );
                },
          ));

          register_rest_route('fp/v1', '/fp_prayersettings_meta', array(
               'methods' => WP_REST_Server::READABLE,
               'callback' => array($this, 'fp_get_meta'),
               'permission_callback' => '__return_true'

          ));
     }

     public function fp_insert_meta(WP_REST_Request $request)
     {
          global $wpdb;
          $json = file_get_contents("php://input");
          // Converts it into a PHP object
          $data = json_decode($json, true);

          $value = json_encode($data['value']);
          //    $meta = $data['meta'];
          /*    $country = $data['country'];
          $city = $data['city'];
          $lat = $data['lat'];
          $lng = $data['lng']; */
          //   dont add duplicate meta-key delete if exists. this is a single selection
          $wpdb->delete('wp_fp_prayer_settings_meta', array('meta-key' => $data['meta']));

          printf("There are million bicycles in", $data['value']);

          $wpdb->insert('wp_fp_prayer_settings_meta', array('meta-key' => $data['meta'], 'value' => $value));

          //    return  $request->get_params();
          return $data['value'];
     }

     public function fp_get_meta(WP_REST_Request $request)
     {
          global $wpdb;
          $results = $wpdb->prepare("SELECT * FROM wp_fp_prayer_settings_meta "); //query to fetch record only from user_ip field
          $prayersettingmeta = $wpdb->get_results($results);
          if ($prayersettingmeta) {
               return $prayersettingmeta;
          }
     }
}
