<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayer_DataQuery')) {
    class FivePrayer_DataQuery
    {
        public function sendDataUsingAjax()
        {
            global $printerInfo;
            global $wpdb;
            $prayersettingmeta = $wpdb->get_results("SELECT * FROM wp_fp_prayer_settings_meta ");
            wp_add_inline_script('fiveprayer-script', 'const FivePrayerData = ' . json_encode(array(
                'ajaxUrl' => admin_url('admin-ajax.php'),

                'Site_title' => get_bloginfo(sanitize_title('Site_title')),
                'Site_tagline' => get_bloginfo(sanitize_title('Site_tagline')),
                'Current_user' => wp_get_current_user()->user_login,

            )), 'before');

            $result = json_encode($prayersettingmeta);
            $printerPage = json_decode($result, true);
            $printerDetail = array_filter(
                $printerPage,
                function ($val) {
                    return $val['meta-key'] === "printer";
                }
            );

            $getPrinter = array_map(function ($value) {
                if (isset($value["value"])) {
                    return $value['value'];
                }
            }, array_values($printerDetail));

            $printerInfo = isset($getPrinter[0]) ? json_decode($getPrinter[0]) : '';

            wp_add_inline_script('fiveprayer-script', 'const FivePrayerPrinter = ' . json_encode(array(

                'ajaxUrl' => admin_url('admin-ajax.php'),

                'printer_left1' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_left1'} : null),
                'printer_left2' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_left2'} : null),
                'printer_left3' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_left3'} : null),
                'printer_left4' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_left4'} : null),
                'printer_left5' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_left5'} : null),
                'printer_left6' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_left6'} : null),
                'printer_left7' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_left7'} : null),
                'printer_right1' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_right1'} : null),
                'printer_right2' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_right2'} : null),
                'printer_right3' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_right3'} : null),
                'printer_right4' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_right4'} : null),
                'printer_right5' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_right5'} : null),
                'printer_right6' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_right6'} : null),
                'printer_right7' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_right7'} : null),
                'printer_boolean' => rest_sanitize_boolean(isset($getPrinter[0]) ? $printerInfo->{'printer_boolean'} : null),
                'printer_logo' => sanitize_text_field(isset($getPrinter[0]) ? $printerInfo->{'printer_logo'} : null),

            )), 'before');

        }
    }
}
