
<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');


if(!class_exists('FivePrayer_DynamicTimeTableMonthly')){
    require_once(plugin_dir_path( __FILE__ ) . '../module/GenerateTimeTableMonthly.php');


class FivePrayer_DynamicTimeTableMonthly{
 
    function insertDynamicTimeTable(){
        global $post;

        if( !defined('ABSPATH') && is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'Fp_TimeTable_Monthly') ) {
            if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
            {
                $genTable = new FivePrayer_GenerateTimeTableMonthly();
                wp_kses_post( $genTable->DynamicGenerateCalendar());    
             
            }
        }
    }
}

}

