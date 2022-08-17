<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');
 
 class FpVerticalDailyPrayer
 {
      public function __construct()
      {
           add_action('init', array($this, 'registerShortcodes'));
          //  require_once(plugin_dir_path( __FILE__ ) . '../module/NextPrayer.php');
          require_once(plugin_dir_path( __FILE__ ) . '../module/NextPrayer.php');
          
          
}
protected $prayerLocal = array(
     "fajr iqamah"    => "fajr_iqamah",
     "sunrise"        => "sunrise",
     "dhuhr iqamah"   => "dhuhr_iqamah",
     "asr iqamah"     => "asr_iqamah",
   "maghrib iqamah" => "Maghrib",
   "isha iqamah"    => "isha_iqamah"
);

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
                              <h2>
                              <?php array_map(function ($day) {
                                   echo $day->today == wp_date("j", null, $timezone = null) ? $day->currentDate : null;
                                 }, $prayersettingmeta);?>
                              </h2>
                              <h3>

                              <?php array_map(function ($day) {
                                   // $prayerToday = new NextPrayer($day);
                                   // $prayerToday->TodayPrayer();

                                   $value = array($day->fajr_iqamah, $day->sunrise, $day->dhuhr_iqamah, $day->asr_iqamah, $day->maghrib_iqamah, $day->isha_iqamah);
                                   
                                   $after = strtotime($day->fajr_iqamah) + 60;
                                   $before = strtotime($day->fajr_iqamah) - 3600;// before one hour
                                   $afterSunrise = strtotime($day->sunrise) + 60;
                                   $beforeSunrise = strtotime($day->sunrise) - 3600;// before one hour
                                   $afterDhuhr = strtotime($day->dhuhr_iqamah) + 60;
                                   $beforeDhuhr = strtotime($day->dhuhr_iqamah) - 3600;// before one hour
                                   $afterAsr = strtotime($day->asr_iqamah) + 60;
                                   $beforeAsr = strtotime($day->asr_iqamah) - 18000;// before one hour
                                   $afterMaghrib = strtotime($day->maghrib_iqamah) + 60;
                                   $beforeMaghrib = strtotime($day->maghrib_iqamah) - 18000;// before one hour
                                   $afterIsha = strtotime($day->isha_iqamah) + 60;
                                   $beforeIsha = strtotime($day->isha_iqamah) - 18000;// before one hour
                                   $currentTimeHour = wp_date("H:i", null, $timezone = null);
                                   $timeHour = wp_date("H", null, $timezone = null);
                                   $timeMin = wp_date("i", null, $timezone = null);

                                    if (wp_date("j", null, $timezone = null) == $day->today && ($timeHour >= 0) && ($timeHour < 4 && $timeMin > 3) ) {
                                        // echo $day->fajr_iqamah . '' . date(' H:i:s', $after) . '' . date(' H:i:s', $before)  ;
                                        // echo ((strtotime($day->fajr_iqamah)) >  $before) && (!(strtotime($day->fajr_iqamah)) >=  $after)  ? date(' g:i: A', strtotime($day->fajr_iqamah)) : '' ;
                                        echo date(' g:i: A', strtotime($day->fajr_iqamah) );
                                   }
                                   if (wp_date("j", null, $timezone = null) == $day->today && (strtotime($currentTimeHour)  >= strtotime($day->fajr_iqamah)) && (strtotime($currentTimeHour) < strtotime($day->sunrise)) ) {
                                        // echo ((strtotime($day->sunrise)) >  $beforeSunrise) && (!(strtotime($day->sunrise)) >=  $afterSunrise)  ? date(' g:i: A', strtotime($day->sunrise)) : '' ;
                                        echo date(' g:i: A', strtotime($day->sunrise));


                                        
                                   }
                                   if (wp_date("j", null, $timezone = null) == $day->today && (strtotime($currentTimeHour)  >= strtotime($day->sunrise)) && (strtotime($currentTimeHour) < strtotime($day->dhuhr_iqamah))   ) {
                                        //     echo  date(' g:i: A', strtotime($day->dhuhr_iqamah)) . ''. date(' g:i: A', strtotime( $beforeDhuhr));
                                        // echo  !(strtotime($day->dhuhr_iqamah) >=  $afterDhuhr) ? 'a' : 'b';
                                        // echo ((strtotime($day->dhuhr_iqamah)) >  $beforeDhuhr) && (!(strtotime($day->dhuhr_iqamah)) >=  $afterDhuhr)  ? date(' g:i: A', strtotime($day->dhuhr_iqamah)) : '' ;
                                        echo  date(' g:i: A', strtotime($day->dhuhr_iqamah) );
                                   } 
                                   if (wp_date("j", null, $timezone = null) == $day->today && (strtotime($currentTimeHour)  >= strtotime($day->dhuhr_iqamah)) && (strtotime($currentTimeHour) < strtotime($day->asr_iqamah)) ) {
                                        //     echo !(strtotime($day->asr_iqamah) >=  $afterAsr) ? '' :  date(' g:i: A', strtotime($day->asr_iqamah));
                                        // echo ((strtotime($day->asr_iqamah) >  $beforeAsr)) && (!(strtotime($day->asr_iqamah) >=  $afterAsr))  ? date(' g:i: A', strtotime($day->asr_iqamah)) : '' ;
                                        echo date(' g:i: A', strtotime($day->asr_iqamah));
                                   }
                                   // if (wp_date("j", null, $timezone = null) == $day->today && ($timeHour >= 13) && ($timeHour < 17)  ) {
                                   //      //     echo !(strtotime($day->asr_iqamah) >=  $afterAsr) ? '' :  date(' g:i: A', strtotime($day->asr_iqamah));
                                   //      // echo ((strtotime($day->asr_iqamah) >  $beforeAsr)) && (!(strtotime($day->asr_iqamah) >=  $afterAsr))  ? date(' g:i: A', strtotime($day->asr_iqamah)) : '' ;
                                   //      echo date(' g:i: A', strtotime($day->asr_iqamah)) . ' ' . 'hour ' . strtotime($currentTimeHour) . ' ' . 'min ' .  strtotime($day->dhuhr_iqamah);
                                   // }
                                   
                                   
                                   if (wp_date("j", null, $timezone = null) == $day->today && (strtotime($currentTimeHour)  >= strtotime($day->asr_iqamah)) && (strtotime($currentTimeHour) < strtotime($day->maghrib_iqamah))  ) {
                                        
                                        //     echo !(strtotime($day->asr_iqamah) >=  $afterAsr) ? '' :  date(' g:i: A', strtotime($day->asr_iqamah));
                                        // echo ((strtotime($day->maghrib_iqamah) >  $beforeMaghrib)) && (!(strtotime($day->maghrib_iqamah) >=  $afterMaghrib))  ? date(' g:i: A', strtotime($day->maghrib_iqamah)) : '' ;
                                        // echo $timeHour . '' . $timeMin;
                                        echo date(' g:i: A', strtotime($day->maghrib_iqamah));
                                   }
                                   if (wp_date("j", null, $timezone = null) == $day->today && (strtotime($currentTimeHour)  >= strtotime($day->maghrib_iqamah)) && (strtotime($currentTimeHour) < strtotime($day->isha_iqamah))   ) {
                                        //     echo !(strtotime($day->asr_iqamah) >=  $afterAsr) ? '' :  date(' g:i: A', strtotime($day->asr_iqamah));
                                        // echo ((strtotime($day->isha_iqamah) >  $beforeIsha)) && (!(strtotime($day->isha_iqamah) >=  $afterIsha))  ? date(' g:i: A', strtotime($day->isha_iqamah)) : '' ;
                                        echo date(' g:i: A', strtotime($day->isha_iqamah));
                                   } 
 
                                 }, $prayersettingmeta);?>
                              </h3>
                              <span>
                                   <?php echo 'Current Local time: ' . wp_date("g:i A", null, $timezone = null); ?>



                              </span>


                         </td>
                         </tr>

                         <tr>
                              <th>Prayer</th>
                              <th>Begins</th>
                              <th>Iqamah</th>
                         </tr>
                         <tr>
                              <th>Fajr</th>
                              <td><?php array_map(function ($day) {
                                      echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->fajr_begins)) : null;
                                     }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                        echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->fajr_iqamah)) : null;
                                       }, $prayersettingmeta);?></td>
                         </tr>
                         <tr>
                              <th >Sunrise</th>
                              <td colspan="2"><?php array_map(function ($day) {
                                                  echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->sunrise)) : null;
                                                 }, $prayersettingmeta);?></td>

                         </tr>
                         <tr>
                              <th>Dhuhr</th>
                              <td><?php array_map(function ($day) {
                                      echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->dhuhr_begins)) : null;
                                     }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                        echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->dhuhr_iqamah)) : null;
                                       }, $prayersettingmeta);?></td>
                         </tr>
                         <tr>
                              <th>Asr</th>
                              <td><?php array_map(function ($day) {
                                      echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->asr_begins)) : null;
                                     }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                        echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->asr_iqamah)) : null;
                                       }, $prayersettingmeta);?></td>
                         </tr>
                         <tr>
                              <th>Maghrib</th>
                              <td><?php array_map(function ($day) {
                                      echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->maghrib_begins)) : null;
                                     }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                        echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->maghrib_iqamah)) : null;
                                       }, $prayersettingmeta);?></td>
                         </tr>
                         <tr>
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
