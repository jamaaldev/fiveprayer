<?php
/**
 * Five Prayer
 *
 * @package     FivePrayer
 * @author      Jamaaldev
 * @copyright   2022 Jamaal Mahamed or Company Name
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: FivePrayer
 * Plugin URI:  https://example.com/plugin-name
 * Description: FivePrayer - Plugin is For Muslim PrayerTimes.
 * Version:     1.0.0
 * Author:      Jamaaldev
 * Author URI:  https://example.com
 * Text Domain: fiveprayer-slug
 * License:     GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class FivePrayerPlugin {
    function __construct()
    {
   
        add_action( 'admin_notices', array($this,'independence_notice') );
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
            global $wpdb;


            dbDelta( "CREATE TABLE IF NOT EXISTS `wp_fp_location_city` (
                `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `country` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
                `city` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
                `lat` float NOT NULL DEFAULT '0',
                `lng` float NOT NULL DEFAULT '0',
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci");
                
            
         
            dbDelta("CREATE TABLE IF NOT EXISTS `wp_fp_timetable` (
                `date` date NOT NULL,
                `fajr_begins` time DEFAULT NULL,
                `fajr_iqamah` time DEFAULT NULL,
                `fajr_masjid_jamaah` time DEFAULT NULL,
                `sunrise` time DEFAULT NULL,
                `dhuhr_begins` time DEFAULT NULL,
                `dhuhr_iqamah` time DEFAULT NULL,
                `asr_begins` time DEFAULT NULL,
                `asr_iqamah` time DEFAULT NULL,
                `maghrib_begins` time DEFAULT NULL,
                `maghrib_iqamah` time DEFAULT NULL,
                `isha_begins` time DEFAULT NULL,
                `isha_iqamah` time DEFAULT NULL,
                `midnight` time DEFAULT NULL,
                `currentDate` tinytext,
                `today` tinyint(4) DEFAULT NULL,
                `className` tinytext
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8
              ");

            

            dbDelta("CREATE TABLE IF NOT EXISTS `wp_fp_prayer_settings_meta` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `meta-key` varchar(255) NOT NULL,
                `value` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB AUTO_INCREMENT=1743 DEFAULT CHARSET=utf8 ");

            



        }
    
     function activate(){
        $this->onActivate();
        flush_rewrite_rules(  );
     }
     function deactivate(){
        flush_rewrite_rules(  );
     }

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





