<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class FivePrayer_PrayerTimeTableController
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
        $json =  sanitize_text_field($request->get_body());

        // Converts it into a PHP object
        $data = json_decode($json, true);

        // $wpdb->delete( "DELETE TABLE IF EXISTS wp_fp_timetable" );
        $wpdb->query("TRUNCATE TABLE `wp_fp_timetable`");
        
        foreach ($data as $prayer) {
            $wpdb->insert(
                'wp_fp_timetable',
                array(
                 'date'               => sanitize_text_field(stripslashes($prayer['date'])),
                 'currentDate'        => sanitize_text_field(stripslashes($prayer['currentDate'])),
                 'fajr_begins'        => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['fajr_begins'])))),
                 'fajr_iqamah'        => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['fajr_iqamah'])))),
                 'fajr_masjid_jamaah' => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['fajr_masjid_jamaah'])))),
                 'dhuhr_begins'       => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['dhuhr_begins'])))),
                 'dhuhr_iqamah'       => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['dhuhr_iqamah'])))),
                 'asr_begins'         => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['asr_begins'])))),
                 'asr_iqamah'         => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['asr_iqamah'])))),
                 'maghrib_begins'     => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['maghrib_begins'])))),
                 'maghrib_iqamah'     => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['maghrib_iqamah'])))),
                 'isha_begins'        => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['isha_begins'])))),
                 'isha_iqamah'        => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['isha_iqamah'])))),
                 'midnight'           => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['midnight'])))),
                 'sunrise'            => sanitize_text_field(date(' H:i ', strtotime(stripslashes($prayer['sunrise'])))),
                 'className'          => sanitize_text_field(stripslashes($prayer['className'])),
                 'today'              => sanitize_text_field(stripslashes($prayer['today']))
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
            return array_map(function ($prayer) {
                return array(
                 'date'               => sanitize_text_field($prayer->date),
                 'currentDate'        => sanitize_text_field($prayer->currentDate),
                 'fajr_begins'        => sanitize_text_field(date("g:i A ", strtotime($prayer->fajr_begins))),
                 'fajr_iqamah'        => sanitize_text_field(date("g:i A ", strtotime($prayer->fajr_iqamah))),
                 'fajr_masjid_jamaah' => sanitize_text_field(date("g:i A ", strtotime($prayer->fajr_masjid_jamaah))),
                 'sunrise'            => sanitize_text_field(date("g:i A ", strtotime($prayer->sunrise))),
                 'dhuhr_begins'       => sanitize_text_field(date("g:i A ", strtotime($prayer->dhuhr_begins))),
                 'dhuhr_iqamah'       => sanitize_text_field(date("g:i A ", strtotime($prayer->dhuhr_iqamah))),
                 'asr_begins'         => sanitize_text_field(date("g:i A ", strtotime($prayer->asr_begins))),
                 'asr_iqamah'         => sanitize_text_field(date("g:i A ", strtotime($prayer->asr_iqamah))),
                 'maghrib_begins'     => sanitize_text_field(date("g:i A ", strtotime($prayer->maghrib_begins))),
                 'maghrib_iqamah'     => sanitize_text_field(date("g:i A ", strtotime($prayer->maghrib_iqamah))),
                 'isha_begins'        => sanitize_text_field(date("g:i A ", strtotime($prayer->isha_begins))),
                 'isha_iqamah'        => sanitize_text_field(date("g:i A ", strtotime($prayer->isha_iqamah))),
                 'midnight'           => sanitize_text_field(date("g:i A ", strtotime($prayer->midnight))),
                 'className'          => sanitize_text_field($prayer->className),
                 'today'              => sanitize_text_field($prayer->today)

                );
            }, $prayerTimeTable);
            return ob_get_clean();
        }
        exit();
    }
}
