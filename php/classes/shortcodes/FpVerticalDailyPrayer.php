<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

 class FpVerticalDailyPrayer
 {
     public $highlight;
     public function __construct()
     {
         add_action('init', array($this, 'registerShortcodes'));
         require_once(plugin_dir_path(__FILE__) . '../module/NextPrayer.php');
         add_action('wp_enqueue_scripts', array($this,'dailyPrayer'));
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
      $prayersettingmeta = $wpdb->get_results("SELECT * FROM wp_fp_timetable ");

      $mydate    = getdate()["mday"];
      $monthdate = getdate()["mon"];
      ob_start();
      if ($prayersettingmeta) {
          ?>

            <table  class='FP_TablePrayer_'>
                <thead>
                    <tr>
                         <tr>
                              <td colspan="3">
                              <div>
                              <?php array_map(function ($day) {
                                  echo $day->today == wp_date("j", null, $timezone = null) ? $day->currentDate : null;
                              }, $prayersettingmeta);?>
                              </div>
                              <div>

                              <?php array_map(function ($day) {
                                  $prayerToday = new NextPrayer($day);
                                  $this->highlight = $prayerToday->TodayPrayer();
                              }, $prayersettingmeta);?>
                              </div>
                              <!-- <span>
                                   <?php echo 'Current Local time: ' . wp_date("g:i A", null, $timezone = null); ?>

                              </span> -->


                         </td>
                         </tr>

                         <tr class='tbhead'>
                              <th>Prayer</th>
                              <th>Begins</th>
                              <th>Iqamah</th>
                         </tr>
                         <tr class="<?php echo $this->highlight == 'fajr' ? 'highlight' : null ?>">
                              <th>Fajr</th>
                              <td><?php array_map(function ($day) {
                                  echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->fajr_begins)) : null;
                              }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                    echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->fajr_iqamah)) : null;
                                }, $prayersettingmeta);?></td>
                         </tr>
                         <tr class="<?php echo $this->highlight == 'sunrise' ? 'highlight' : null ?>">
                              <th >Sunrise</th>
                              <td colspan="2"><?php array_map(function ($day) {
                                  echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->sunrise)) : null;
                              }, $prayersettingmeta);?></td>

                         </tr>
                         <tr class="<?php echo $this->highlight == 'dhuhr' ? 'highlight' : null ?>">
                              <th>Dhuhr</th>
                              <td><?php array_map(function ($day) {
                                  echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->dhuhr_begins)) : null;
                              }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                    echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->dhuhr_iqamah)) : null;
                                }, $prayersettingmeta);?></td>
                         </tr>
                         <tr class="<?php echo $this->highlight == 'asr' ? 'highlight' : null ?>">
                              <th>Asr</th>
                              <td><?php array_map(function ($day) {
                                  echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->asr_begins)) : null;
                              }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                    echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->asr_iqamah)) : null;
                                }, $prayersettingmeta);?></td>
                         </tr>
                         <tr class="<?php echo $this->highlight == 'maqhrib' ? 'fp__highlight' : null ?>">
                              <th>Maghrib</th>
                              <td><?php array_map(function ($day) {
                                  echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->maghrib_begins)) : null;
                              }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                    echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->maghrib_iqamah)) : null;
                                }, $prayersettingmeta);?></td>
                         </tr>
                         <tr class="<?php echo $this->highlight == 'isha' ? 'highlight' : null ?>">
                              <th>Isha</th>
                              <td><?php array_map(function ($day) {
                                  echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->isha_begins)) : null;
                              }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                    echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->isha_iqamah)) : null;
                                }, $prayersettingmeta);?></td>
                         </tr>


                    </tr>
                </thead>

            </table>
           <?php

      }
      return ob_get_clean();
  }
 }
