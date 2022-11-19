<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayer_admin')) {
    class FivePrayer_admin
    {
        public function __construct()
        {
            add_action('admin_menu', array($this, 'fiveprayer_init_menu'));
        }



        /**
         * Init Admin Menu.
         *
         * @return void
         */
        public function fiveprayer_init_menu()
        {
            add_menu_page('Five Prayer', 'Five Prayer', 'manage_options', 'fiveprayer', array($this, 'fiveprayer_admin_page'), plugin_dir_url(__FILE__) . '../../assets/fpicon.svg', '50');
        }

        /**
         * Init Admin Page.
         *
         * @return void
         */
        public function fiveprayer_admin_page()
        {
            require_once plugin_dir_path(__FILE__) . './fiveprayer_index.php';
        }
    }
}
