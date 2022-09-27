<?php

 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

 require_once(plugin_dir_path(__FILE__) . '../module/GenerateTimeTableMonthly.php');

 class FpTimetableMonth
 {
     public function __construct()
     {
         add_action('init', array($this, 'registerShortcodes'));
     }

   
    
    
    public function registerShortcodes()
     {
         add_shortcode('Fp_TimeTable_Monthly', array($this, 'fpTimetableMonth'));
     }

     public function fpTimetableMonth($atts)
     {
         $genTable = new GenerateTimeTableMonthly();

         ob_start();
         $genTable->DynamicGenerate();
         
         wp_enqueue_style('tablemonth', plugin_dir_url(__FILE__) . './tablemonth.css', true);

         return ob_get_clean();
     }
 }
