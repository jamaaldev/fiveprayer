
<?php
if ( !defined('ABSPATH') ) {
    //If wordpress isn't loaded load it up.
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . '/wp-load.php';
    require_once(plugin_dir_path( __FILE__ ) . '../module/GenerateTimeTableMonthly.php');
    $genTable = new GenerateTimeTableMonthly();
    $genTable->DynamicGenerate();    
}



