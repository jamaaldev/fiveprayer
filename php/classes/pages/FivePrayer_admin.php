<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class FivePrayer_admin
{
     public function __construct()
     {
          add_action('admin_menu', array($this, 'fiveprayer_init_menu'));
          add_action('admin_notices', array($this, 'my_admin_notice'));
     }
     
     public function my_admin_notice()
     {
          echo '<div class="updated">
           <p>I am a little yellow notice.</p>
        </div>';
     }

     /**
      * Init Admin Menu.
      *
      * @return void
      */
     public function fiveprayer_init_menu()
     {
          add_menu_page('Five Prayer', 'Five Prayer', 'manage_options', 'fiveprayer', array($this, 'fiveprayer_admin_page'), 'dashicons-plugins-checked', '50');
     }

     /**
      * Init Admin Page.
      *
      * @return void
      */
     public function fiveprayer_admin_page()
     {
          require_once plugin_dir_path(__FILE__) . './fiveprayer_index.php'; // plugin_dir_path marka rabto inaad soo gashato pagekaan ku xiratiid
     }
}
