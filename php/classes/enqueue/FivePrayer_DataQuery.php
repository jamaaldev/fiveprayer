<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayer_DataQuery')) {
    class FivePrayer_DataQuery
    {
        public function sendDataUsingAjax()
        {
            global $wpdb;
            $prayersettingmeta = $wpdb->get_results("SELECT * FROM wp_fp_prayer_settings_meta ");
            wp_add_inline_script('fiveprayer-script', 'const FivePrayerData = ' . json_encode(array(
                'ajaxUrl' => admin_url('admin-ajax.php'),

                'Site_title' =>  get_bloginfo(sanitize_title('Site_title')),
                'Site_tagline' =>  get_bloginfo(sanitize_title('Site_tagline')),
                'Current_user' => wp_get_current_user()->user_login

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

            $printerInfo = json_decode($getPrinter[0]);
            wp_add_inline_script('fiveprayer-script', 'const FivePrayerPrinter = ' . json_encode(array(
                'ajaxUrl' => admin_url('admin-ajax.php'),

                'printer_left1' =>  sanitize_text_field($printerInfo->{'printer_left1'}),
                'printer_left2' => sanitize_text_field($printerInfo->{'printer_left2'}),
                'printer_left3' =>  sanitize_text_field($printerInfo->{'printer_left3'}),
                'printer_left4' => sanitize_text_field($printerInfo->{'printer_left4'}),
                'printer_left5' => sanitize_text_field($printerInfo->{'printer_left5'}),
                'printer_left6' => sanitize_text_field($printerInfo->{'printer_left6'}),
                'printer_left7' => sanitize_text_field($printerInfo->{'printer_left7'}),
                'printer_right1' => sanitize_text_field($printerInfo->{'printer_right1'}),
                'printer_right2' => sanitize_text_field($printerInfo->{'printer_right2'}),
                'printer_right3' => sanitize_text_field($printerInfo->{'printer_right3'}),
                'printer_right4' => sanitize_text_field($printerInfo->{'printer_right4'}),
                'printer_right5' => sanitize_text_field($printerInfo->{'printer_right5'}),
                'printer_right6' => sanitize_text_field($printerInfo->{'printer_right6'}),
                'printer_right7' => sanitize_text_field($printerInfo->{'printer_right7'}),
                'printer_boolean' => rest_sanitize_boolean($printerInfo->{'printer_boolean'}),
                'printer_logo' => sanitize_text_field($printerInfo->{'printer_logo'})


            )), 'before');
        }
    }
}
