<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayer_FpTimetableMonth')) {
    require_once plugin_dir_path(__FILE__) . '../module/GenerateTimeTableMonthly.php';
    require_once plugin_dir_path(__FILE__) . '../module/MonthStyleDynamic.php';

    class FivePrayer_FpTimetableMonth
    {
        public function __construct()
        {
            add_action('init', array($this, 'registerShortcodes'));
            add_action('wp_enqueue_scripts', array($this, 'loadmeFirst'));
        }

        public function loadmeFirst()
        {
            global $post;

            if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'Fp_TimeTable_Monthly')) {
                // wp_enqueue_style('tablemonth', plugin_dir_url(__FILE__) . './tablemonth.css', true);
                $monthstyle = new FivePrayer_MonthStyleDynamic();
                $monthstyle->monthStyleDynamic();
            }
        }
        public function registerShortcodes()
        {
            add_shortcode('Fp_TimeTable_Monthly', array($this, 'fpTimetableMonth'));
        }

        public function fpTimetableMonth($atts)
        {
            ob_start();
            $this->loadmeFirst();
            $attributes = shortcode_atts([
                'printer_option' => 'inside',
            ], $atts);

            $genTable = new FivePrayer_GenerateTimeTableMonthly();
            if ($genTable->DynamicGenerateCalendar($attributes) !== null) {

                wp_kses_post($genTable->DynamicGenerateCalendar($attributes));
            }

            return ob_get_clean();
        }
    }
}
