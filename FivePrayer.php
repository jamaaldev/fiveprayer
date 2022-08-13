<?php
/**
 * Five Prayer
 *
 * @package     FivePrayer
 * @author      Jamaal Mahamed
 * @copyright   2022 Jamaal Mahamed or Company Name
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Five Prayer
 * Plugin URI:  https://example.com/plugin-name
 * Description: A Five Prayer platform made by WordPress React 17.
 * Version:     1.0.0
 * Author:      Jamaal Mahamed
 * Author URI:  https://example.com
 * Text Domain: fiveprayer-slug
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

//  if(! defined('ABSPATH')){
//     exit;
//  }
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class FivePrayerPlugin {
    function __construct()
    {
       /*  global $wpdb;
        $this->charset = $wpdb->get_charset_collate();
        $this->tablelocationcity = $wpdb->prefix . "fp_location_city"; */
        // add_action('init', array($this, 'onActivate'));
        
        // add_action('admin_head', array($this, 'onAdminRefresh'));
        
        // add_action( 'admin_menu', array($this,'fiveprayer_init_menu'));
        // add_action( 'admin_enqueue_scripts', array($this,'fiveprayer_admin_enqueue_scripts'));
        // add_action( 'rest_api_init', array($this,'fp_register_fp_routes'));
        // add_action( 'admin_notices', array($this,'independence_notice') );
        add_action('admin_notices', array($this,'my_admin_notice'));
        require_once(plugin_dir_path( __FILE__ ) . './php/classes/routers/CustomLocationController.php');
        require_once(plugin_dir_path( __FILE__ ) . './php/classes/routers/PrayerTimeTableController.php');
        require_once(plugin_dir_path( __FILE__ ) . './php/classes/routers/PrayerSettingsMetaController.php');
        require_once(plugin_dir_path( __FILE__ ) . './php/classes/shortcodes/FpTimeTableMonth.php');
        require_once(plugin_dir_path( __FILE__ ) . './php/classes/shortcodes/FpVerticalDailyPrayer.php');
        require_once(plugin_dir_path( __FILE__ ) . './php/classes/pages/FivePrayer_admin.php');
        require_once(plugin_dir_path( __FILE__ ) . './php/classes/enqueue/FivePrayer_enqueue.php');
        new FivePrayer_admin;
        new CustomLocationController;
        new PrayerTimeTableController;
        new PrayerSettingsMetaController;
        new FivePrayer_enqueue;
        new FpTimetableMonth;
        new FpVerticalDailyPrayer;

        
    }
    
   

    function my_admin_notice(){
        echo '<div class="updated">
           <p>I am a little am first active admin notice.</p>
        </div>';
    }
function independence_notice() {
    global $pagenow;
    $admin_pages = [ 'index.php', 'edit.php', 'plugins.php' ];
    if ( in_array( $pagenow, $admin_pages ) ) {
        if ( date( 'j, F' ) === '29, July' ) { 
            ?>
            <div class="notice notice-warning is-dismissible">
                <p>Happy Independence Day, Nigeria...</p>
            </div>
            <?
        }
    }
}
   
     function insertLocation(){
            global $wpdb;
            // $wpdb->insert('wp_fp_generate', array('month' => '2','city' => 'islington',));

            $wpdb->insert($this->tablelocationcity, array(
                'country' => 'United State',
                'city' => 'london',
                'lat' => 39.896042,
                'lng' =>  -83.444595
            ));
     }
        
     function onActivate(){
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
           /* dbDelta( "CREATE TABLE $this->tablelocationcity (
                id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                country varchar(5) NOT NULL DEFAULT '',
                city varchar(5) NOT NULL DEFAULT '',
                lat smallint(5) NOT NULL DEFAULT 0,
                lng smallint(5) NOT NULL DEFAULT 0,
                PRIMARY KEY  (id)
            ) $this->charset;"); */
            dbDelta( "CREATE TABLE `wp_fp_location_city` (
                `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `country` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
                `city` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
                `lat` float NOT NULL DEFAULT '0',
                `lng` float NOT NULL DEFAULT '0',
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci");


        }
    
     function activate(){
        $this->onActivate();
        flush_rewrite_rules(  );
     }
     function deactivate(){
        flush_rewrite_rules(  );
     }
/**
 * Init Admin Menu.
 *
 * @return void
 */
// function fiveprayer_init_menu() {
//     add_menu_page(  'Five Prayer', 'Five Prayer', 'manage_options', 'fiveprayer', array($this,'fiveprayer_admin_page'), 'dashicons-plugins-checked', '50' );
// }
/**
 * This is our callback function that embeds our methods endpoint in a WP_REST_Response
 */
// function fp_delete_location(WP_REST_Request $request) {
//     global $wpdb;
//     $json = file_get_contents("php://input");
//     // Converts it into a PHP object 
//     $data = json_decode($json, true);

//     $id = $data['id'];
//     //  $country = $data['country'];
//     //  $city = $data['city'];
//     //  $lat = $data['lat'];
//     //  $lng = $data['lng'];
 
//     $number = 9;
//     $str = "Beijing";
//     printf("There are %u million bicycles in %s,%s",$number,$str,$id);
    
//     // to insert this work
//     // $wpdb->insert('wp_fp_generate', array('country' => 'united kingdom','city' => 'islington', 'lat' => '54545', 'lng' => '2222'));
//         // to update this works
//     // $wpdb->update('wp_fp_generate', array('id'=> $id, 'month'=> $months), array('id'=>'2'));
//     $wpdb->delete('wp_fp_location_city', array( 'id' => $id,));
  
//     return  $request;
   
// }

// function fp_update_location(WP_REST_Request $request) {
//     global $wpdb;
//     $json = file_get_contents("php://input");
//     // Converts it into a PHP object 
//     $data = json_decode($json, true);

//      $id = $data['id'];
//      $country = $data['country'];
//      $city = $data['city'];
//      $lat = $data['lat'];
//      $lng = $data['lng'];
 
//     $number = 9;
//     $str = "Beijing";
//     printf("There are %u million bicycles in %s,%s",$number,$str);
    
//     // to insert this work
//     // $wpdb->insert('wp_fp_generate', array('country' => 'united kingdom','city' => 'islington', 'lat' => '54545', 'lng' => '2222'));
//         // to update this works
//     // $wpdb->update('wp_fp_generate', array('id'=> $id, 'month'=> $months), array('id'=>'2'));
//     // $wpdb->delete('wp_fp_location_city', array( 'id' => $id,));
//     $wpdb->update('wp_fp_location_city', array('id'=> $id, 'country' => $country, 'city' => $city, 'lat' => $lat, 'lng' => $lng),array('id'=>$id));
//     return  $request->get_params();
   
// }

// function fp_insert_location(WP_REST_Request $request) {
//     global $wpdb;
//     $json = file_get_contents("php://input");
//     // Converts it into a PHP object 
//     $data = json_decode($json, true);

//     // $id = $data['id'];
//     $country = $data['country'];
//     $city = $data['city'];
//     $lat = $data['lat'];
//     $lng = $data['lng'];
 
//     $number = 9;
//     $str = "Beijing";
//     printf("There are %u million bicycles in %s,%s",$number,$str,$city);
    
//     // to insert this work
//     // $wpdb->insert('wp_fp_generate', array('country' => 'united kingdom','city' => 'islington', 'lat' => '54545', 'lng' => '2222'));
//         // to update this works
//     // $wpdb->update('wp_fp_generate', array('id'=> $id, 'month'=> $months), array('id'=>'2'));
//     $wpdb->insert('wp_fp_location_city', array( 'country' => $country, 'city' => $city, 'lat' => $lat, 'lng' => $lng));
  
//     return  $request->get_params();
   
// }

// function fp_get_location(WP_REST_Request $request) {
//     global $wpdb;
//    // $data = $_REQUEST($_POST)
//    // $response['month'] = $req['month'];
//    // $request = new WP_REST_Request($req);
//   /*  $number = 9;
//    $str = "Beijing";
//    printf("There are %u million bicycles in %s.",$number,$str); */
   
//    $results = $wpdb->prepare( "SELECT * FROM $this->tablelocationcity ");  //query to fetch record only from user_ip field
//    $locationList = $wpdb->get_results($results);
//    if($locationList){
//     /*    foreach($results as $index => $result)
//        {
//           // Change name column to FirstName using copy and delete
//           $tmp = $result->month;
//           unset($result->month);
//           $result->FirstName = $tmp;
//        } */
//        return  $locationList;
//    }
  
// }

//end location

function fp_put_generate(WP_REST_Request $request) {
    global $wpdb;
    // $data = $_REQUEST($_POST)
    // $response['month'] = $req['month'];
    // $request = new WP_REST_Request($req);
  // takes raw data from the request 
    $json = file_get_contents("php://input");
    // Converts it into a PHP object 
    $data = json_decode($json, true);

    $id = $data['id'];
    $months = $data['month'];
    $city = $data['city'];
    
    $number = 9;
    $str = "Beijing";
    printf("There are %u million bicycles in %s,%s",$number,$str,$city);
    
    // to insert this work
    // $wpdb->insert('wp_fp_generate', array('month' => '2','city' => 'islington',));
        // to update this works
    // $wpdb->update('wp_fp_generate', array('id'=> $id, 'month'=> $months), array('id'=>'2'));
    $wpdb->update('wp_fp_generate', array('id'=> $id, 'month'=> $months ,'city' => $city),array('id'=>$id));
  
    return  $request->get_params();
   
}



function fp_get_generate(WP_REST_Request $request) {
     global $wpdb;
    // $data = $_REQUEST($_POST)
	// $response['month'] = $req['month'];
    // $request = new WP_REST_Request($req);
   /*  $number = 9;
    $str = "Beijing";
    printf("There are %u million bicycles in %s.",$number,$str); */
    $results = $wpdb->get_results( "SELECT * FROM wp_fp_generate ");  //query to fetch record only from user_ip field
    if($results){
     /*    foreach($results as $index => $result)
        {
           // Change name column to FirstName using copy and delete
           $tmp = $result->month;
           unset($result->month);
           $result->FirstName = $tmp;
        } */
        return  $results[0];
    }
   
}

function fp_get_tune() {
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
    return rest_ensure_response( 'Hello World, this is the WordPress REST API fp_get_tune' );
}

function fp_get_iqama() {
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
    return rest_ensure_response( 'Hello World, this is the WordPress REST API fp_get_iqama' );
}
 
/**
 * This function is where we register our routes for our example endpoint.
 */
// function fp_register_fp_routes() {
 
//    // register_rest_route() handles more arguments but we are going to stick to the basics for now.
//    register_rest_route( 'fp/v1', '/fp_location', array(
//         // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
//         'methods'  => WP_REST_Server::CREATABLE,
//         // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
//         'callback' => array($this,'fp_insert_location'),
//     ));

//     // register_rest_route() handles more arguments but we are going to stick to the basics for now.
//     register_rest_route( 'fp/v1', '/fp_location', array(
//         // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
//         'methods'  => WP_REST_Server::DELETABLE,
//         // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
//         'callback' => array($this,'fp_delete_location'),
//     ) );
//     // register_rest_route() handles more arguments but we are going to stick to the basics for now.
//     register_rest_route( 'fp/v1', '/fp_location', array(
//         // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
//         'methods'  => WP_REST_Server::EDITABLE,
//         // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
//         'callback' => array($this,'fp_update_location'),
//     ) );
 
//     // register_rest_route() handles more arguments but we are going to stick to the basics for now.
//     register_rest_route( 'fp/v1', '/fp_location', array(
//         // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
//         'methods'  => WP_REST_Server::READABLE,
//         // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
//         'callback' => array($this,'fp_get_location'),
//     ) );
//     // register_rest_route() handles more arguments but we are going to stick to the basics for now.
//     register_rest_route( 'fp/v1', '/fp_generate', array(
//         // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
//         'methods'  => WP_REST_Server::READABLE,
//         // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
//         'callback' => array($this,'fp_get_generate'),
//     ) );
//     // register_rest_route() handles more arguments but we are going to stick to the basics for now.
//     register_rest_route( 'fp/v1', '/fp_generate', array(
//         // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
//         'methods'  => WP_REST_Server::ALLMETHODS,
//         // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
//         'callback' => array($this,'fp_put_generate'),
//     ) );
//     register_rest_route( 'fp/v1', '/fp_tune', array(
//         // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
//         'methods'  => WP_REST_Server::READABLE,
//         // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
//         'callback' => array($this,'fp_get_tune'),
//     ) );
//     register_rest_route( 'fp/v1', '/fp_iqama', array(
//         // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
//         'methods'  => WP_REST_Server::READABLE,
//         // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
//         'callback' => array($this,'fp_get_iqama'),
//     ) );
// }
 



/**
 * Init Admin Page.
 *
 * @return void
 */
// function fiveprayer_admin_page() {
//     require_once plugin_dir_path( __FILE__ ) . 'php/fiveprayer_index.php'; // plugin_dir_path marka rabto inaad soo gashato pagekaan ku xiratiid
// }


/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
// function fiveprayer_admin_enqueue_scripts() {
//     // everytime make sure to use plugin_dir_path or plugin_dir_url when you require files
//     // require_once plugin_dir_path( __FILE__ ) . './src/autoLoader.php'; // plugin_dir_path marka rabto inaad soo gashato pagekaan ku xiratiid
//     /* $Admin = new Admin;
//     $Admin->adminpage(); */
//     //    $Customlocation = new CustomLocationController;
   
//     // $valid_pages = array("etc","etc","etc");
// 		$valid_pages = array("fiveprayer");
// 		// we have to read the paremiter page value after ? for example we get fiveprayer after ?page=... if we are in that position we will use.;
// 		// $page = isset($_REQUEST['page']) ? isset($_REQUEST['page']) : '';
//         // we will check again to compare if our array value pages is valid inside variable $page
//         $page = (isset($_GET['page'])) ? $_GET['page'] : 0;
//         if($page === 'fiveprayer'){
//             // echo $_REQUEST['page'];
//         // wp_enqueue_style iyo wp_enqueue_script wordpress aya usheegesa styleka iyo script istacmaali laha mesha taalo.
//         // wp_register_style( 'fiveprayer-style', plugin_dir_url( __FILE__ ) . 'build/index.css', false, '1.0.0' );
//         wp_enqueue_style( 'fiveprayer-style', plugin_dir_url( __FILE__ ) . 'build/index.css' ); // plugin_dir_url marka rabto inaad usheegto mesha fileka ku yaalo,sida css iyo js
//         wp_enqueue_script( 'fiveprayer-script', plugin_dir_url( __FILE__ ) . 'build/index.js', array( 'wp-element' ), '1.0.0', true );
//         // removes annoying ads in my plugin page
//      /*    add_action('admin_notices',function() {
//                     remove_all_actions( 'admin_notices' );
//             },
//             0
//         ); */
//         } 
     
// }


 }

 //check if the class exit always
 if(class_exists('FivePrayerPlugin')) {
     $fivePrayerPlugin = new FivePrayerPlugin();
   
     
    //  require_once('./src/inc/base/autoLoader.php');
    //  $adminpag = new Admin();
 }

 //activation
 register_activation_hook( __FILE__, array($fivePrayerPlugin,'activate') );

 //deactivation
 register_deactivation_hook( __FILE__, array($fivePrayerPlugin,'deactivate') );

 //uninstall


// function fp_autoload_register($className){
// }





