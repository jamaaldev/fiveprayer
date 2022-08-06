<?php
   
spl_autoload_register(function($className){
    
    /* $path = './';
    $extension = '.php';
    $fullPath = $path . $className . $extension; */
    
    // everytime make sure to use plugin_dir_path or plugin_dir_url when you require files
    // require_once( plugin_dir_path( __FILE__ ) . './classes/' . $className .'.php');
    // require_once( plugin_dir_path( __FILE__ ) . './classes/routers/' . $className .'.php');
    // require_once dirname(__FILE__)."./classes/" . '.php';
    // require_once($_SERVER['./classes'].'./classes/' . '.php');
});


// function fp_autoload_custom_location($className){
//     $path = plugin_dir_path('./classes/routers/');
//     $extension = '.php';
//     $fullPath = $path . $className . $extension;
// }
// function fp_autoload_Admin($className){
//    /*  $path = require_once (plugin_dir_path(__FILE__) . './classes/');
//     $extension = '.php';
//     $fullPath = $path . $className . $extension;
//     require_once($fullPath); */
//     require_once( plugin_dir_path( __FILE__ ) . './classes/' . $className .'.php');
// }


