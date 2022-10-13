<?php

 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

 require_once(plugin_dir_path(__FILE__) . '../module/GenerateTimeTableMonthly.php');

 class FivePrayer_FpTimetableMonth
 {
     public function __construct()
     {
         add_action('init', array($this, 'registerShortcodes'));
       
        }
        
        
        
        
        public function registerShortcodes()
        {
            add_shortcode('Fp_TimeTable_Monthly', array($this, 'fpTimetableMonth'));
            
        }
        
        public function fpTimetableMonth()
        {
            wp_enqueue_style('tablemonth', plugin_dir_url(__FILE__) . './tablemonth.css', true);
            $genTable = new FivePrayer_GenerateTimeTableMonthly();
            
            ob_start();
            $genTable->DynamicGenerate();
            

         return ob_get_clean();
     }
 }
