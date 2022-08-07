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
                        <th>Fajr</th>
                        <th>Sunrise</th>
                        <th>Zhuhr</th>
                        <th>Asr</th>
                        <th>Maghrib</th>
                        <th>Isha</th>
                        <th>Midnight</th>
                    </tr>
                </thead>

                <tbody key={index}>
                <?php
                // Return date/time info of a timestamp; then format the output
                   
                $mydate = getdate()["mday"];
               $waa =  $mydate === 7;
                echo 'waxaan iska fiiri ' . $waa;
                foreach ($prayersettingmeta as $day) {?>
               <?php echo $day->today == 7; ?>
                    <tr class=<?php echo $day->today == $mydate ?  'today-row'  : null ?>>
                    <td><?php echo $day->currentDate ?></td>
                    <td><?php echo $day->fajr_begins ?></td>
                    <td><?php echo $day->sunrise ?></td>
                    <td><?php echo $day->zuhr_begins ?></td>
                    <td><?php echo $day->asr_begins ?></td>
                    <td><?php echo $day->maghrib_begins ?></td>
                    <td><?php echo $day->isha_begins ?></td>
                    <td><?php echo $day->midnight ?></td>
                </tr>
                <?php }
                               ?>
                </tbody>

            </table>
        <?php

                       }
                  }

                  

        }
