<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');
 require_once(plugin_dir_path(__FILE__) . '../module/NextPrayer.php');

 class FivePrayer_FpVerticalDailyPrayer
 {
     public $highlight;
     public function __construct()
     {
         add_action('init', array($this, 'registerShortcodes'));
         add_action('wp_enqueue_scripts', array($this,'dailyPrayer'),999);
     }
public function dailyPrayer()
{
    wp_enqueue_style('dailyprayer', plugin_dir_url(__FILE__) . './dailyprayer.css', true);
}


public function registerShortcodes()
{
    add_shortcode('Fp_Vertical_Daily_Prayer', array($this, 'fpVerticalDailyPrayer'));
}

  public function fpVerticalDailyPrayer($atts)
  {
      global $wpdb;
      $mydate    = wp_date("j", null, $timezone = null);
      $monthdate =  wp_date("n", null, $timezone = null);
     
      $yeardate = wp_date("Y", null, $timezone = null);
     
    //   $todayPrayerTable = $wpdb->get_results("SELECT * FROM wp_fp_timetable ");
      $todayPrayerTable = $wpdb->get_results("SELECT * FROM wp_fp_timetable WHERE YEAR(Date) = $yeardate  AND MONTH(Date) = $monthdate " );

      if ($todayPrayerTable) {
          ob_start();
          ?>

            <table  class='FP_DairyPrayer_'>
                <thead>
                    <tr>
                         <tr>
                              <td colspan="3">
                              
                              <?php array_map(function ($prayer) {
                                  echo esc_html($prayer->today == wp_date("j", null, $timezone = null) ? $prayer->currentDate : null);
                              }, $todayPrayerTable);?>
                              
                              

                              <?php array_map(function ($prayer) {
                                  $prayerToday = new FivePrayer_NextPrayer();
                                  $this->highlight = $prayerToday->TodayPrayer($prayer);
                                  
                              }, $todayPrayerTable);?>
                             
                              <!-- <span>
                                   <?php echo esc_html('Local time: ' . wp_date("g:i A", null, $timezone = null)); ?>
                              </span> -->


                         </td>
                         </tr>

                         <tr class='fiveprayer__tbhead'>
                              <th>Prayer</th>
                              <th>Begins</th>
                              <th>Iqamah</th>
                         </tr>
                         <tr class="<?php echo esc_attr($this->highlight == 'fajr' ? 'fp__highlight' : null) ?>">
                              <th>Fajr</th>
                              <td><?php array_map(function ($prayer) {
                                  echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->fajr_begins)) : null);
                              }, $todayPrayerTable);?></td>
                                <td><?php array_map(function ($prayer) {
                                    echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->fajr_iqamah)) : null);
                                }, $todayPrayerTable);?></td>
                         </tr>
                         <tr class="<?php echo esc_attr($this->highlight == 'sunrise' ? 'fp__highlight' : null) ?>">
                              <th >Sunrise</th>
                              <td colspan="2"><?php array_map(function ($prayer) {
                                  echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->sunrise)) : null);
                              }, $todayPrayerTable);?></td>

                         </tr>
                         <tr class="<?php echo esc_attr($this->highlight == 'dhuhr' ? 'fp__highlight' : null) ?>">
                              <th>Dhuhr</th>
                              <td><?php array_map(function ($prayer) {
                                  echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->dhuhr_begins)) : null);
                              }, $todayPrayerTable);?></td>
                                <td><?php array_map(function ($prayer) {
                                    echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->dhuhr_iqamah)) : null);
                                }, $todayPrayerTable);?></td>
                         </tr>
                         <tr class="<?php echo esc_attr($this->highlight == 'asr' ? 'fp__highlight' : null) ?>">
                              <th>Asr</th>
                              <td><?php array_map(function ($prayer) {
                                  echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->asr_begins)) : null);
                              }, $todayPrayerTable);?></td>
                                <td><?php array_map(function ($prayer) {
                                    echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->asr_iqamah)) : null);
                                }, $todayPrayerTable);?></td>
                         </tr>
                         <tr class="<?php echo esc_attr($this->highlight == 'maqhrib' ? 'fp__highlight' : null) ?>">
                              <th>Maghrib</th>
                              <td><?php array_map(function ($prayer) {
                                  echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->maghrib_begins)) : null);
                              }, $todayPrayerTable);?></td>
                                <td><?php array_map(function ($prayer) {
                                    echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->maghrib_iqamah)) : null);
                                }, $todayPrayerTable);?></td>
                         </tr>
                         <tr class="<?php echo esc_attr($this->highlight == 'isha' ? 'fp__highlight' : null) ?>">
                              <th>Isha</th>
                              <td><?php array_map(function ($prayer) {
                                  echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->isha_begins)) : null);
                              }, $todayPrayerTable);?></td>
                                <td><?php array_map(function ($prayer) {
                                    echo esc_html($prayer->today == getdate()["mday"] ? date("g:i A ", strtotime($prayer->isha_iqamah)) : null);
                                }, $todayPrayerTable);?></td>
                         </tr>


                    </tr>
                </thead>

            </table>
           <?php

      }
      return ob_get_clean();
  }
 }
