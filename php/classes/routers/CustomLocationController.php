<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class CustomLocationController
{
    public function __construct()
    {
        add_action('rest_api_init', array($this, 'customLocationRoute'));
        add_action('admin_notices', array($this, 'myAdminNotice'));

    }

    public function myAdminNotice()
    {
        echo '<div class="updated">
           <p>I am a little custom location class notice.</p>
        </div>';
    }

    public function customLocationRoute()
    {

        // register_rest_route() handles more arguments but we are going to stick to the basics for now.
        register_rest_route('fp/v1', '/fp_location', array(
            // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
            'methods'  => WP_REST_Server::CREATABLE,
            // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
            'callback' => array($this, 'fpInsertLocation'),
          'permission_callback' => function() {
        return current_user_can( 'manage_options' );
        }, 
        ));

        // register_rest_route() handles more arguments but we are going to stick to the basics for now.
        register_rest_route('fp/v1', '/fp_location', array(
            // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
            'methods'             => WP_REST_Server::DELETABLE,
            // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
            'callback'            => array($this, 'fpDeleteLocation'),
            'permission_callback' => function () {
                return current_user_can('manage_options');
            },
        ));
        // register_rest_route() handles more arguments but we are going to stick to the basics for now.
        register_rest_route('fp/v1', '/fp_location', array(
            // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
            'methods'  => WP_REST_Server::EDITABLE,
            // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
            'callback' => array($this, 'fpUpdateLocation'),
               'permission_callback' => function() {
        return current_user_can( 'manage_options' );
        }, 
        ));

        // register_rest_route() handles more arguments but we are going to stick to the basics for now.
        register_rest_route('fp/v1', '/fp_location', array(
            // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
            'methods'             => WP_REST_Server::READABLE,
            // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
            'callback'            => array($this, 'fpGetLocation'),
            'permission_callback' => function() {
                return current_user_can( 'manage_options' );
                }, 
        ));

    }

    public function fpDeleteLocation(WP_REST_Request $request)
    {
        global $wpdb;
        $json = file_get_contents("php://input");
        // Converts it into a PHP object
        $data = json_decode($json, true);

        $id = $data['id'];

        $wpdb->delete('wp_fp_location_city', array('id' => $id));

        return $request;

    }

    public function fpUpdateLocation(WP_REST_Request $request)
    {
        global $wpdb;
        $json = file_get_contents("php://input");
        // Converts it into a PHP object
        $data = json_decode($json, true);

        $id      = $data['id'];
        $country = $data['country'];
        $city    = $data['city'];
        $lat     = $data['lat'];
        $lng     = $data['lng'];


        $wpdb->update('wp_fp_location_city', array('id' => $id, 'country' => $country, 'city' => $city, 'lat' => $lat, 'lng' => $lng), array('id' => $id));
        return $request->get_params();

    }

    public function fpInsertLocation(WP_REST_Request $request)
    {
        global $wpdb;
        $json = file_get_contents("php://input");
        // Converts it into a PHP object
        $data = json_decode($json, true);

        $country = $data['country'];
        $city    = $data['city'];
        $lat     = $data['lat'];
        $lng     = $data['lng'];

    

        $wpdb->insert('wp_fp_location_city', array('country' => $country, 'city' => $city, 'lat' => $lat, 'lng' => $lng));

        return $request->get_params();

    }

    public function fpGetLocation(WP_REST_Request $request)
    {
        global $wpdb;

        $results      = $wpdb->prepare("SELECT * FROM wp_fp_location_city "); //query to fetch record only from user_ip field
        $locationList = $wpdb->get_results($results);
        if ($locationList) {
            return $locationList;
        }

    }

}
