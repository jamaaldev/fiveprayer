<?php 
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class FivePrayer_Validator {
    
    
    function MonthlyNumber($month){
      
        if($month >= 1 && $month <= 12 || $month == wp_date("n", null, $timezone = null) ){
            return $month ? $month : wp_date("n", null, $timezone = null) ;
        } else {
            return  wp_date("n", null, $timezone = null);
        }
    }
    function customLocation($arg){

        if(!is_numeric(sanitize_text_field($arg['country'])) && !is_numeric(sanitize_text_field($arg['city'])) && is_numeric(sanitize_text_field($arg['lat'])) && is_numeric(sanitize_text_field($arg['lng'])))
        {
            return true;
        } else {
            return false;
        }
        if(is_numeric(sanitize_text_field($arg['id'])) && !is_numeric(sanitize_text_field($arg['country'])) && !is_numeric(sanitize_text_field($arg['city'])) && is_numeric(sanitize_text_field($arg['lat'])) && is_numeric(sanitize_text_field($arg['lng'])))
        {
            return true;
        } else {
            return false;
        }
       
       
    }

}