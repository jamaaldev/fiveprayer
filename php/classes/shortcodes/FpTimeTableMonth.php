<?php

 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

 
 if(!class_exists('FivePrayer_FpTimetableMonth')){

    require_once(plugin_dir_path(__FILE__) . '../module/GenerateTimeTableMonthly.php');


 
 class FivePrayer_FpTimetableMonth
 {
     public function __construct()
     {
         add_action('init', array($this, 'registerShortcodes'));
         add_action('wp_enqueue_scripts', array($this,'loadmeFirst'));

       
        }
        
        
        
        
        public function loadmeFirst()
        {
            global $post;

            if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'Fp_TimeTable_Monthly') ) {
                wp_enqueue_style('tablemonth', plugin_dir_url(__FILE__) . './tablemonth.css', true);
            }
            
        }
        public function registerShortcodes()
        {
            add_shortcode('Fp_TimeTable_Monthly', array($this, 'fpTimetableMonth'));

        }
        
        public function fpTimetableMonth()
        {
            ob_start();
            $this->loadmeFirst();
            $genTable = new FivePrayer_GenerateTimeTableMonthly();
            
            wp_kses_post( $genTable->DynamicGenerateCalendar());
            

         return ob_get_clean();
     }
 }
}