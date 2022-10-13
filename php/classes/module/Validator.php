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

}