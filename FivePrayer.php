<?php
/**
 * Five Prayer
 *
 * @package     FivePrayer
 * @author      Jamaaldev
 * @copyright   2022 Jamaal Mahamed
 * @license     GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: FivePrayer
 * Plugin URI:  https://fiveprayer.com
 * Description: FivePrayer - Plugin is For Muslim PrayerTimes.
 * Version:     1.1.0
 * Author:      Jamaaldev
 * Author URI:  https://profiles.wordpress.org/jamaaldev/
 * Text Domain: fiveprayer-slug
 * License:     GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayerPlugin')) {
    class FivePrayerPlugin
    {
        public function __construct()
        {
            add_action('wp_enqueue_scripts', array($this,'supportScripts'), 999);
            require_once(plugin_dir_path(__FILE__) . './php/classes/module/Validator.php');
            require_once(plugin_dir_path(__FILE__) . './php/classes/pages/FivePrayer_admin.php');
            require_once(plugin_dir_path(__FILE__) . './php/classes/enqueue/FivePrayer_enqueue.php');
            require_once(plugin_dir_path(__FILE__) . './php/classes/routers/CustomLocationController.php');
            require_once(plugin_dir_path(__FILE__) . './php/classes/routers/PrayerTimeTableController.php');
            require_once(plugin_dir_path(__FILE__) . './php/classes/routers/PrayerSettingsMetaController.php');
            require_once(plugin_dir_path(__FILE__) . './php/classes/routers/GetInfoWordpressController.php');
            require_once(plugin_dir_path(__FILE__) . './php/classes/shortcodes/FpTimeTableMonth.php');
            require_once(plugin_dir_path(__FILE__) . './php/classes/shortcodes/FpVerticalDailyPrayer.php');

            new FivePrayer_admin();
            new FivePrayer_enqueue();
            new FivePrayer_CustomLocationController();
            new FivePrayer_PrayerTimeTableController();
            new FivePrayer_PrayerSettingsMetaController();
            new FivePrayer_GetInfoWordpressController();
            new FivePrayer_FpTimetableMonth();
            new FivePrayer_FpVerticalDailyPrayer();
        }


        public function supportScripts()
        {
            wp_enqueue_script('jquery');
            wp_localize_script('table_script', 'table_ajax_url', array('ajax_url' => admin_url('admin-ajax.php')));
        }




         public function onActivate()
         {
             require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
             global $wpdb;


             dbDelta("CREATE TABLE IF NOT EXISTS `wp_fp_location_city` (
                `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `country` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
                `city` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
                `lat` float NOT NULL DEFAULT '0',
                `lng` float NOT NULL DEFAULT '0',
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci");



             dbDelta("CREATE TABLE IF NOT EXISTS `wp_fp_timetable` (
                `date` date NOT NULL,
                `fajr_begins` time DEFAULT NULL,
                `fajr_iqamah` time DEFAULT NULL,
                `fajr_masjid_jamaah` time DEFAULT NULL,
                `sunrise` time DEFAULT NULL,
                `dhuhr_begins` time DEFAULT NULL,
                `dhuhr_iqamah` time DEFAULT NULL,
                `asr_begins` time DEFAULT NULL,
                `asr_iqamah` time DEFAULT NULL,
                `maghrib_begins` time DEFAULT NULL,
                `maghrib_iqamah` time DEFAULT NULL,
                `isha_begins` time DEFAULT NULL,
                `isha_iqamah` time DEFAULT NULL,
                `midnight` time DEFAULT NULL,
                `currentDate` tinytext,
                `today` tinyint(4) DEFAULT NULL,
                `className` tinytext
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8");



             dbDelta("CREATE TABLE IF NOT EXISTS `wp_fp_prayer_settings_meta` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `meta-key` varchar(255) NOT NULL,
                `value` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB AUTO_INCREMENT=1743 DEFAULT CHARSET=utf8");
         }

         public function activate()
         {
             $this->onActivate();
             flush_rewrite_rules();
         }
         public function deactivate()
         {
             flush_rewrite_rules();
         }
    }

    //check if the class exit always
    if (class_exists('FivePrayerPlugin')) {
        $fivePrayerPlugin = new FivePrayerPlugin();
    }

    //activation
    register_activation_hook(__FILE__, array($fivePrayerPlugin,'activate'));

    //deactivation
    register_deactivation_hook(__FILE__, array($fivePrayerPlugin,'deactivate'));

    //uninstall
}
