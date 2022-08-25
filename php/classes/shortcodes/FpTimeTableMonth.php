<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

 class FpTimetableMonth
 {
  public function __construct()
  {
   add_action('init', array($this, 'registerShortcodes'));

  }

  public function registerShortcodes()
  {
   add_shortcode('fp_timetable_month', array($this, 'fpTimetableMonth'));
  }

  public function fpTimetableMonth($atts)
  {
   global $wpdb;
   $prayersettingmeta = $wpdb->get_results("SELECT * FROM wp_fp_timetable ");
   ob_start();

  if ($prayersettingmeta) {?>

            <table  class='FP_TablePrayer_'>
                <thead>
                    <tr>
                        <th></th>
                        <th td colspan="3">Fajr</th>
        
                        <th td colspan="2">Dhuhr</th>
                        
                        <th td colspan="2">Asr</th>
                        
                        <th td colspan="2">Maghrib</th>
                    
                        <th td colspan="2">Isha</th>
                       
                        <th>Midnight</th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th> Begins</th>
                        <th> Iqamah</th>
                        <th>Sunrise</th>
                        <th> Begins</th>
                        <th> Iqamah</th>
                        <th> Begins</th>
                        <th> Iqamah</th>
                        <th> Begins</th>
                        <th> Iqamah</th>
                        <th> Begins</th>
                        <th> Iqamah</th>
                        <th>Midnight</th>
                    </tr>
                </thead>

                <tbody key={index}>
                <?php
                 // Return date/time info of a timestamp; then format the output

                    $mydate    = getdate()["mday"];
                    $monthdate = getdate()["mon"];

                   foreach ($prayersettingmeta as $day) {?>


                    <tr class=<?php echo $day->today == $mydate ? 'today-row' : null ?>>
                    <td><?php echo $day->currentDate ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->fajr_begins)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->fajr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->sunrise)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->dhuhr_begins)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->dhuhr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->asr_begins)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->asr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->maghrib_begins)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->maghrib_iqamah)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->isha_begins)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->isha_iqamah)) ?></td>
                    <td><?php echo date("g:i A ", strtotime($day->midnight)) ?></td>

                </tr>
                <?php }
                   ?>
                </tbody>

            </table>
        <?php

           }
           return ob_get_clean();

          }

        }
