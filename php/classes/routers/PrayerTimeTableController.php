<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class PrayerTimeTableController
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
          'permission_callback' => function () {
              return current_user_can('manage_options');
          },
        ));

        register_rest_route('fp/v1', '/fp_prayertimetable', array(
         'methods'             => WP_REST_Server::READABLE,
         'callback'            => array($this, 'fpGetTimetable'),
         'permission_callback' => function () {
             return current_user_can('manage_options');
         },

        ));
    }

    public function fpInsertTimetable(WP_REST_Request $request)
    {
        global $wpdb;
        $json =  sanitize_text_field(file_get_contents("php://input"));

        // Converts it into a PHP object
        $data = json_decode($json, true);

        // $wpdb->delete( "DELETE TABLE IF EXISTS wp_fp_timetable" );
        $wpdb->query("TRUNCATE TABLE `wp_fp_timetable`");

        foreach ($data as $day) {
            $wpdb->insert(
                'wp_fp_timetable',
                array(
                 'date'               => sanitize_text_field(stripslashes($day['date'])),
                 'currentDate'        => sanitize_text_field(stripslashes($day['currentDate'])),
                 'fajr_begins'        => sanitize_text_field(stripslashes($day['fajr_begins'])),
                 'fajr_iqamah'        => sanitize_text_field(stripslashes($day['fajr_iqamah'])),
                 'fajr_masjid_jamaah' => sanitize_text_field(stripslashes($day['fajr_masjid_jamaah'])),
                 'dhuhr_begins'       => sanitize_text_field(stripslashes($day['dhuhr_begins'])),
                 'dhuhr_iqamah'       => sanitize_text_field(stripslashes($day['dhuhr_iqamah'])),
                 'asr_begins'         => sanitize_text_field(stripslashes($day['asr_begins'])),
                 'asr_iqamah'         => sanitize_text_field(stripslashes($day['asr_iqamah'])),
                 'maghrib_begins'     => sanitize_text_field(stripslashes($day['maghrib_begins'])),
                 'maghrib_iqamah'     => sanitize_text_field(stripslashes($day['maghrib_iqamah'])),
                 'isha_begins'        => sanitize_text_field(stripslashes($day['isha_begins'])),
                 'isha_iqamah'        => sanitize_text_field(stripslashes($day['isha_iqamah'])),
                 'midnight'           => sanitize_text_field(stripslashes($day['midnight'])),
                 'sunrise'            => sanitize_text_field(stripslashes($day['sunrise'])),
                 'className'          => sanitize_text_field(stripslashes($day['className'])),
                 'today'              => sanitize_text_field(stripslashes($day['today']))
                ),
            );
        }

        exit();
    }

    public function fpGetTimetable(WP_REST_Request $request)
    {
        global $wpdb;
        $results           = $wpdb->prepare("SELECT * FROM wp_fp_timetable "); //query to fetch record only from user_ip field
        $prayerTimeTable = $wpdb->get_results($results);
        ob_start();
        
        if ($prayerTimeTable) {
            return array_map(function ($day) {
                return array(
                 'date'               => sanitize_text_field($day->date),
                 'currentDate'        => sanitize_text_field($day->currentDate),
                 'fajr_begins'        => sanitize_text_field(date("g:i A ", strtotime($day->fajr_begins))),
                 'fajr_iqamah'        => sanitize_text_field(date("g:i A ", strtotime($day->fajr_iqamah))),
                 'fajr_masjid_jamaah' => sanitize_text_field(date("g:i A ", strtotime($day->fajr_masjid_jamaah))),
                 'sunrise'            => sanitize_text_field(date("g:i A ", strtotime($day->sunrise))),
                 'dhuhr_begins'       => sanitize_text_field(date("g:i A ", strtotime($day->dhuhr_begins))),
                 'dhuhr_iqamah'       => sanitize_text_field(date("g:i A ", strtotime($day->dhuhr_iqamah))),
                 'asr_begins'         => sanitize_text_field(date("g:i A ", strtotime($day->asr_begins))),
                 'asr_iqamah'         => sanitize_text_field(date("g:i A ", strtotime($day->asr_iqamah))),
                 'maghrib_begins'     => sanitize_text_field(date("g:i A ", strtotime($day->maghrib_begins))),
                 'maghrib_iqamah'     => sanitize_text_field(date("g:i A ", strtotime($day->maghrib_iqamah))),
                 'isha_begins'        => sanitize_text_field(date("g:i A ", strtotime($day->isha_begins))),
                 'isha_iqamah'        => sanitize_text_field(date("g:i A ", strtotime($day->isha_iqamah))),
                 'midnight'           => sanitize_text_field(date("g:i A ", strtotime($day->midnight))),
                 'className'          => sanitize_text_field($day->className),
                 'today'              => sanitize_text_field($day->today)

                );
            }, $prayerTimeTable);
            return ob_get_clean();
        }
        exit();
    }
}
