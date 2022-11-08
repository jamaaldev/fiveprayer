<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayer_DataQuery')) {
    class FivePrayer_DataQuery
    {
        public function sendDataUsingAjax()
        {
            wp_add_inline_script('fiveprayer-script', 'const FivePrayerData = ' . json_encode(array(
                'ajaxUrl' => admin_url('admin-ajax.php'),

                'Site_title' =>  get_bloginfo(sanitize_title('Site_title')),
                'Site_tagline' =>  get_bloginfo(sanitize_title('Site_tagline')),
                'Current_user' => wp_get_current_user()->user_login

            )), 'before');
        }
    }
}
