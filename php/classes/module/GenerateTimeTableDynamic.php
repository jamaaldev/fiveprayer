
<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');
require_once(plugin_dir_path( __FILE__ ) . '../module/GenerateTimeTableMonthly.php');

class FivePrayer_DynamicTimeTableMonthly{
 
    function insertDynamicTimeTable(){

        if ( !defined('ABSPATH') ) {
         
            $genTable = new FivePrayer_GenerateTimeTableMonthly();
            $genTable->DynamicGenerate();    
        }
    }
}



