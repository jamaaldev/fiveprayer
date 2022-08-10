<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class PrayerTimeTableController
{
     public function __construct()
     {
          add_action('rest_api_init', array($this, 'prayer_timetable_route'));

     }

     public function prayer_timetable_route()
     {
          register_rest_route('fp/v1', '/fp_prayertimetable', array(
               'methods' => WP_REST_Server::CREATABLE,
               'callback' => array($this, 'fp_insert_timetable'),
               /* 'permission_callback' => function() {
                    return current_user_can( 'manage_options' );
                }, */
          ));

          register_rest_route('fp/v1', '/fp_prayertimetable', array(
               'methods' => WP_REST_Server::READABLE,
               'callback' => array($this, 'fp_get_timetable'),
               'permission_callback' => '__return_true'

          ));
     }

     public function fp_insert_timetable(WP_REST_Request $request)
     {
          global $wpdb;
          $json = file_get_contents("php://input");
          // Converts it into a PHP object
          $data = json_decode($json, true);
          
          
        
          // $wpdb->delete( "DELETE TABLE IF EXISTS wp_fp_timetable" );
          $wpdb->query("TRUNCATE TABLE `wp_fp_timetable`");
          
          foreach ($data as $day) {
               // return $day['fajr'];
               $wpdb->insert(
                   'wp_fp_timetable',
                   array(
                        'date' => $day['date'],
                        'currentDate' => $day['currentDate'],
                       'fajr_begins' => $day['fajr'],
                       'fajr_iqamah' => $day['fajr_iqamah'],
                       'fajr_masjid_jamaah' => $day['fajr_masjid_jamaah'],
                       //    'fajr_iqamah' => $day[null],
                       'dhuhr_begins' => $day['dhuhr'],
                       'dhuhr_iqamah' => $day['dhuhr_iqamah'],
                       //    'zuhr_iqamah' => $day[null],
                       'asr_begins' => $day['asr'],
                       'asr_iqamah' => $day['asr_iqamah'],
                       //    'asr_iqamah' => $day[null],
                       'maghrib_begins' => $day['maghrib'],
                       'maghrib_iqamah' => $day['maghrib_iqamah'],
                       //    'maghrib_iqamah' => $day[null],
                       'isha_begins' => $day['isha'],
                       'isha_iqamah' => $day['isha_iqamah'],
                       'midnight' => $day['midnight'],
                       'sunrise' => $day['sunrise'],
                       'className' => $day['className'],
                       'today' => $day['day'],
                    //    'isha_iqamah' => $day[null]
                   ),
               //     array('date' => $day['date'])
               );
          //     $wpdb->insert('wp_fp_timetable', array('fajr_begins' => $day['fajr'], 'zuhr_begins' => $day['dhuhr']));

           }
             
       /*    foreach ($monthData as $day) {
               $wpdb->update(
                   'wp_fp_timetable',
                   array(
                       'fajr_begins' => $day['fajr_begins'],
                       'fajr_iqamah' => $day['fajr_iqamah'],
                       'zuhr_begins' => $day['zuhr_begins'],
                       'zuhr_iqamah' => $day['zuhr_iqamah'],
                       'asr_mithl_1' => $day['asr_begins'],
                       'asr_iqamah' => $day['asr_iqamah'],
                       'maghrib_begins' => $day['maghrib_begins'],
                       'maghrib_iqamah' => $day['maghrib_iqamah'],
                       'isha_begins' => $day['isha_begins'],
                       'isha_iqamah' => $day['isha_iqamah']
                   ),
                   array('currentDate' => $day['date'])
               );
           }
             */ 
          // $fajr_begins = json_encode($data[0]['fajr']);
          //    $meta = $data[0]['fajr'];
          /*    $country = $data['country'];
          $city = $data['city'];
          $lat = $data['lat'];
          $lng = $data['lng']; */
          //   dont add duplicate meta-key delete if exists. this is a single selection
        //   $wpdb->delete('wp_fp_timetable', array('meta-key' => $data['meta']));

          // printf("There are million bicycles in", $fajr_begins);

        //   $wpdb->insert('wp_fp_timetable', array('meta-key' => $data['meta'], 'value' => $value));

          //    return  $request->get_params();
          return $data;
     }

     public function fp_get_timetable(WP_REST_Request $request)
     {
          global $wpdb;
          $results = $wpdb->prepare("SELECT * FROM wp_fp_timetable "); //query to fetch record only from user_ip field
          $prayersettingmeta = $wpdb->get_results($results);
          if ($prayersettingmeta) {
               return $prayersettingmeta;
          }
     }
}
