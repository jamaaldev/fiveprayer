<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class ImportExportController
{
 public function __construct()
 {
  add_action('rest_api_init', array($this, 'prayerTimetableRoute'));

 }

 public function prayerTimetableRoute()
 {
  register_rest_route('fp/v1', '/fp_prayertimetable', array(
   'methods'  => WP_REST_Server::CREATABLE,
   'callback' => array($this, 'fpInsertTimetable'),
    'permission_callback' => function() {
  return current_user_can( 'manage_options' );
  }, 
  ));

  register_rest_route('fp/v1', '/fp_prayertimetable', array(
   'methods'             => WP_REST_Server::READABLE,
   'callback'            => array($this, 'fpGetTimetable'),
   'permission_callback' => function() {
    return current_user_can( 'manage_options' );
    }, 

  ));
 }

 public function fpInsertTimetable(WP_REST_Request $request)
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
     'date'               => $day['date'],
     'currentDate'        => $day['currentDate'],
     'fajr_begins'        => $day['fajr'],
     'fajr_iqamah'        => $day['fajr_iqamah'],
     'fajr_masjid_jamaah' => $day['fajr_masjid_jamaah'],
     //    'fajr_iqamah' => $day[null],
     'dhuhr_begins'       => $day['dhuhr'],
     'dhuhr_iqamah'       => $day['dhuhr_iqamah'],
     //    'zuhr_iqamah' => $day[null],
     'asr_begins'         => $day['asr'],
     'asr_iqamah'         => $day['asr_iqamah'],
     //    'asr_iqamah' => $day[null],
     'maghrib_begins'     => $day['maghrib'],
     'maghrib_iqamah'     => $day['maghrib_iqamah'],
     //    'maghrib_iqamah' => $day[null],
     'isha_begins'        => $day['isha'],
     'isha_iqamah'        => $day['isha_iqamah'],
     'midnight'           => $day['midnight'],
     'sunrise'            => $day['sunrise'],
     'className'          => $day['className'],
     'today'              => $day['day']
    ),
   );

  }

  return $data;
 }

 public function fpGetTimetable(WP_REST_Request $request)
 {
  global $wpdb;
  $results           = $wpdb->prepare("SELECT * FROM wp_fp_timetable "); //query to fetch record only from user_ip field
  $prayersettingmeta = $wpdb->get_results($results);
  ob_start();

  if ($prayersettingmeta) {
   return array_map(function ($day) {

    return array(
     'date'               => $day->date,
     'currentDate'        => $day->currentDate,
     'fajr_begins'        => date("g:i A ", strtotime($day->fajr_begins)),
     'fajr_iqamah'        => date("g:i A ", strtotime($day->fajr_iqamah)),
     'fajr_masjid_jamaah' => date("g:i A ", strtotime($day->fajr_masjid_jamaah)),
     'sunrise'            => date("g:i A ", strtotime($day->sunrise)),
     //    'fajr_iqamah' => $day[null],
     'dhuhr_begins'       => date("g:i A ", strtotime($day->dhuhr_begins)),
     'dhuhr_iqamah'       => date("g:i A ", strtotime($day->dhuhr_iqamah)),
     //    'zuhr_iqamah' => $day[null],
     'asr_begins'         => date("g:i A ", strtotime($day->asr_begins)),
     'asr_iqamah'         => date("g:i A ", strtotime($day->asr_iqamah)),
     //    'asr_iqamah' => $day[null],
     'maghrib_begins'     => date("g:i A ", strtotime($day->maghrib_begins)),
     'maghrib_iqamah'     => date("g:i A ", strtotime($day->maghrib_iqamah)),
     //    'maghrib_iqamah' => $day[null],
     'isha_begins'        => date("g:i A ", strtotime($day->isha_begins)),
     'isha_iqamah'        => date("g:i A ", strtotime($day->isha_iqamah)),
     'midnight'           => date("g:i A ", strtotime($day->midnight)),
     'className'          => $day->className,
     'today'              => $day->today

    );
   }, $prayersettingmeta);

  }
  return ob_get_clean();

 }
}
