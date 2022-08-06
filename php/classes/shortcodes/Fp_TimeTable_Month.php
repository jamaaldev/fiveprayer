<?php

     class Fp_TimeTable_Month
     {
          public function __construct()
          {
               add_action('init', array($this, 'register_shortcodes'));

          }

          public function register_shortcodes()
          {
               add_shortcode('datecountershortcode', array($this, 'fp_timetable_month'));
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
                foreach ($prayersettingmeta as $day) {?>
                    <tr class=<?php echo $day->className ?>>
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

                  public function fp_insert_timetable(WP_REST_Request $request)
                  {
                       global $wpdb;
                       $json = file_get_contents("php://input");
                       // Converts it into a PHP object
                       $data = json_decode($json, true);

                       // $wpdb->delete( "DELETE TABLE IF EXISTS wp_fp_timetable" );
                       $wpdb->query("TRUNCATE TABLE `wp_fp_timetable`");

                       foreach ($data as $day) {
                            // return $day['fajr'];
                            $wpdb->insert(
                                 'wp_fp_timetable',
                                 array(
                                      'date' => $day['date'],
                                      'currentDate' => $day['currentDate'],
                                      'fajr_begins' => $day['fajr'],
                                      //    'fajr_iqamah' => $day[null],
                                      'zuhr_begins' => $day['dhuhr'],
                                      //    'zuhr_iqamah' => $day[null],
                                      'asr_begins' => $day['asr'],
                                      //    'asr_iqamah' => $day[null],
                                      'maghrib_begins' => $day['maghrib'],
                                      //    'maghrib_iqamah' => $day[null],
                                      'isha_begins' => $day['isha'],
                                      'midnight' => $day['midnight'],
                                      'sunrise' => $day['sunrise'],
                                      'className' => $day['className'],
                                      'today' => $day['day']
                                      //    'isha_iqamah' => $day[null]
                                 ),
                                 //     array('date' => $day['date'])
                            );
                            //     $wpdb->insert('wp_fp_timetable', array('fajr_begins' => $day['fajr'], 'zuhr_begins' => $day['dhuhr']));

                       }

                       /*    foreach ($monthData as $day) {
                       $wpdb->update(
                       'wp_fp_timetable',
                       array(
                       'fajr_begins' => $day['fajr_begins'],
                       'fajr_iqamah' => $day['fajr_iqamah'],
                       'zuhr_begins' => $day['zuhr_begins'],
                       'zuhr_iqamah' => $day['zuhr_iqamah'],
                       'asr_mithl_1' => $day['asr_begins'],
                       'asr_iqamah' => $day['asr_iqamah'],
                       'maghrib_begins' => $day['maghrib_begins'],
                       'maghrib_iqamah' => $day['maghrib_iqamah'],
                       'isha_begins' => $day['isha_begins'],
                       'isha_iqamah' => $day['isha_iqamah']
                       ),
                       array('currentDate' => $day['date'])
                       );
                       }
                        */
                       // $fajr_begins = json_encode($data[0]['fajr']);
                       //    $meta = $data[0]['fajr'];
                       /*    $country = $data['country'];
                       $city = $data['city'];
                       $lat = $data['lat'];
                       $lng = $data['lng']; */
                       //   dont add duplicate meta-key delete if exists. this is a single selection
                       //   $wpdb->delete('wp_fp_timetable', array('meta-key' => $data['meta']));

                       // printf("There are million bicycles in", $fajr_begins);

                       //   $wpdb->insert('wp_fp_timetable', array('meta-key' => $data['meta'], 'value' => $value));

                       //    return  $request->get_params();
                       return $data;
                  }

        }
