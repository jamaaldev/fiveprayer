<?php
     defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

     class Fp_Vertical_Daily_Prayer
     {
          public function __construct()
          {
               add_action('init', array($this, 'register_shortcodes'));

          }

          public function register_shortcodes()
          {
               add_shortcode('Fp_Vertical_Daily_Prayer', array($this, 'Fp_Vertical_Daily_Prayer'));
          }

          public function Fp_Vertical_Daily_Prayer($atts)
          {
               global $wpdb;
               $prayersettingmeta = $wpdb->get_results("SELECT * FROM wp_fp_timetable ");

               $mydate = getdate()["mday"];
               $monthdate = getdate()["mon"];
          if ($prayersettingmeta) {?>

            <table  class='FP_TablePrayer_'>
                <thead>
                    <tr>
                         <tr>
                              <th>Prayer</th>
                              <th>Begins</th>
                              <th>Iqamah</th>
                         </tr>
                         <tr>
                              <th>Fajr</th>
                              <td><?php array_map(function ($day) {
                                                 echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->fajr_begins))    : null;
                                            }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                                   echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime( $day->fajr_iqamah))  : null;
                                              }, $prayersettingmeta);?></td>
                         </tr>
                         <tr>
                              <th >Sunrise</th>
                              <td colspan="2"><?php array_map(function ($day) {
                                                 echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime(  $day->sunrise)) : null;
                                            }, $prayersettingmeta);?></td>
                             
                         </tr>
                         <tr>
                              <th>Dhuhr</th>
                              <td><?php array_map(function ($day) {
                                                 echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime(  $day->dhuhr_begins))   : null;
                                            }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                                   echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->dhuhr_iqamah))  : null;
                                              }, $prayersettingmeta);?></td>
                         </tr>
                         <tr>
                              <th>Asr</th>
                              <td><?php array_map(function ($day) {
                                                 echo $day->today == getdate()["mday"] ?  date("g:i A ", strtotime($day->asr_begins))  : null;
                                            }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                                   echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->asr_iqamah)) : null;
                                              }, $prayersettingmeta);?></td>
                         </tr>
                         <tr>
                              <th>Maghrib</th>
                              <td><?php array_map(function ($day) {
                                                 echo $day->today == getdate()["mday"] ?  date("g:i A ", strtotime($day->maghrib_begins))   : null;
                                            }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                                   echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->maghrib_iqamah))   : null;
                                              }, $prayersettingmeta);?></td>
                         </tr>
                         <tr>
                              <th>Isha</th>
                              <td><?php array_map(function ($day) {
                                                 echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime( $day->isha_begins))  : null;
                                            }, $prayersettingmeta);?></td>
                                <td><?php array_map(function ($day) {
                                                   echo $day->today == getdate()["mday"] ? date("g:i A ", strtotime($day->isha_iqamah))   : null;
                                              }, $prayersettingmeta);?></td>
                         </tr>
                        

                    </tr>
                </thead>

            </table>
        <?php

                       }
                  }

        }
