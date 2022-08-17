<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');
 
 class MyTest
 {
      public function __construct()
      {
           add_action('init', array($this, 'registerShortcodes'));
          //  require_once(plugin_dir_path( __FILE__ ) . '../module/NextPrayer.php');        
        }

public function registerShortcodes()
{
     add_shortcode('Fp_Vertical_Daily_Prayer', array($this, 'MyTest'));
  }

  public function MyTest($atts)
  {
  
  }

}
