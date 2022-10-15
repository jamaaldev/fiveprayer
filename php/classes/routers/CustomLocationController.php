<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class FivePrayer_CustomLocationController
{
    public $customeValid;
    public function __construct()
    {
        add_action('rest_api_init', array($this, 'customLocationRoute'));
        $this->customeValid = new FivePrayer_Validator();

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
        if($this->customeValid->customLocationDelete($request)){
            $id = sanitize_text_field($request['id']);
    
            $wpdb->delete('wp_fp_location_city', array('id' => $id));

        }else {
            wp_send_json_error( array('id' => 'must be number'), 400);
        }

        return $request;
        exit();
    }

    public function fpUpdateLocation(WP_REST_Request $request)
    {
        global $wpdb;
        if($this->customeValid->customLocationUpdate($request)){

            $id = sanitize_text_field($request['id']);
            $country = sanitize_text_field($request['country']);
            $city    = sanitize_text_field($request['city']);
            $lat     = sanitize_text_field($request['lat']);
            $lng     = sanitize_text_field($request['lng']);
    
            $wpdb->update('wp_fp_location_city', array('id' => $id, 'country' => $country, 'city' => $city, 'lat' => $lat, 'lng' => $lng), array('id' => $id));
        } else {
            wp_send_json_error( array('country' => 'must be string','city' => 'must be string','lat' => 'must be number','lng' => 'must be number'), 400);
        }

        return $request->get_params();
        exit();
    }

    public function fpInsertLocation(WP_REST_Request $request)
    {
        global $wpdb;
     
        if($this->customeValid->customLocationInsert($request)){
            $country = sanitize_text_field($request['country']);
            $city    = sanitize_text_field($request['city']);
            $lat     = sanitize_text_field($request['lat']);
            $lng     = sanitize_text_field($request['lng']);
        
            $wpdb->insert('wp_fp_location_city', array('country' => $country, 'city' => $city, 'lat' => $lat, 'lng' => $lng));

        } else {
            wp_send_json_error( array('country' => 'must be string','city' => 'must be string','lat' => 'must be number','lng' => 'must be number'), 400);
        }
      

        return $request->get_params();
        exit();
    }

    public function fpGetLocation(WP_REST_Request $request)
    {
        global $wpdb;

        $results      = $wpdb->prepare("SELECT * FROM wp_fp_location_city "); //query to fetch record only from user_ip field
        $locationList = $wpdb->get_results($results);
        if ($locationList) {
            return $locationList;
        }
        exit();
    }

}
