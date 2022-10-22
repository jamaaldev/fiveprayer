<?php 
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if(!class_exists('FivePrayer_Validator')){


class FivePrayer_Validator {
    
    
    function MonthlyNumber($month){
      
        if($month >= 1 && $month <= 12 || $month == wp_date("n", null, $timezone = null) ){
            return $month ? $month : wp_date("n", null, $timezone = null) ;
        } else {
            return  wp_date("n", null, $timezone = null);
        }
    }
    function customLocationInsert($data){

        if(!is_numeric(sanitize_text_field($data['country'])) && !is_numeric(sanitize_text_field($data['city'])) && is_numeric(sanitize_text_field($data['lat'])) && is_numeric(sanitize_text_field($data['lng'])))
        {
            return true;
        } else {
            return false;
        }
       
       
    }
    function customLocationUpdate($data){

        if(is_numeric(sanitize_text_field($data['id'])) && !is_numeric(sanitize_text_field($data['country'])) && !is_numeric(sanitize_text_field($data['city'])) && is_numeric(sanitize_text_field($data['lat'])) && is_numeric(sanitize_text_field($data['lng'])))
        {
            return true;
        } else {
            return false;
        }
       
       
    }
    function customLocationDelete($data){

        if(is_numeric(sanitize_text_field($data['id'])))
        {
            return true;
        } else {
            return false;
        }
       
       
    }

}



}