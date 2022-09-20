<?php


 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');


 require_once(plugin_dir_path(__FILE__) . '../module/GenerateTimeTableMonthly.php');


 class FpTimetableMonth
 {
     public function __construct()
     {
         add_action('init', array($this, 'registerShortcodes'));
         add_action('wp_enqueue_scripts', array($this,'tablemonth'));
     }

       public function tablemonth()
       {
           wp_enqueue_script('jquery');

           wp_localize_script('table_script', 'table_ajax_url', array('ajax_url' => admin_url('admin-ajax.php')));
           wp_enqueue_style('tablemonth', plugin_dir_url(__FILE__) . './tablemonth.css', true);
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


         return ob_get_clean();
     }
 }
