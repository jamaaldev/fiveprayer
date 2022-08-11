<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

     class Fp_TimeTable_Month
     {
          public function __construct()
          {
               add_action('init', array($this, 'register_shortcodes'));

          }

          public function register_shortcodes()
          {
               add_shortcode('fp_timetable_month', array($this, 'fp_timetable_month'));
          }

          public function fp_timetable_month($atts)
          {
               global $wpdb;
               $prayersettingmeta = $wpdb->get_results("SELECT * FROM wp_fp_timetable ");
              
          if ($prayersettingmeta) {?>
     
            <table  class='FP_TablePrayer_'>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Fajr Begins</th>
                        <th>Fajr Iqamah</th>
                        <th>Sunrise</th>
                        <th>Dhuhr Begins</th>
                        <th>Dhuhr Iqamah</th>
                        <th>Asr Begins</th>
                        <th>Asr Iqamah</th>
                        <th>Maghrib Begins</th>
                        <th>Maghrib Iqamah</th>
                        <th>Isha Begins</th>
                        <th>Isha Iqamah</th>
                        <th>Midnight</th>
                    </tr>
                </thead>

                <tbody key={index}>
                <?php
                // Return date/time info of a timestamp; then format the output
                   
                $mydate = getdate()["mday"];
                $monthdate = getdate()["mon"];
              
                echo ' iska fiiris ' . $monthdate;
                print_r('waaaa');
                foreach ($prayersettingmeta as $day) {?>
              
               <?php print_r(date_parse($day->date)['month'] === 8); ?>
                    <tr class=<?php  echo $day->today == $mydate ?  'today-row'  : null ?>>
                    <td><?php echo $day->currentDate ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->fajr_begins))  ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->fajr_iqamah)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->sunrise)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->dhuhr_begins)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->dhuhr_iqamah)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->asr_begins)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->asr_iqamah)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->maghrib_begins)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->maghrib_iqamah)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->isha_begins)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->isha_iqamah)) ?></td>
                    <td><?php echo  date("g:i A ", strtotime( $day->midnight)) ?></td>
                   
                </tr>
                <?php }
                               ?>
                </tbody>

            </table>
        <?php

                       }
                  }

                  

        }
