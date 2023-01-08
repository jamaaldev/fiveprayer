<?php


defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayer_GenerateTimeTableMonthly')) {
    class FivePrayer_GenerateTimeTableMonthly
    {
        public function DynamicGenerateCalendar($attributes)
        {
            $validatorChecker = new FivePrayer_Validator();
            global $wpdb;
            $prayersettingmeta = $wpdb->get_results("SELECT * FROM wp_fp_prayer_settings_meta ");
            $result = json_encode($prayersettingmeta);
            $printerPage = json_decode($result, true);
            $printerDetail = array_filter(
                $printerPage,
                function ($val) {
                    return $val['meta-key'] === "printer";
                }
            );

            $getPrinter = array_map(function ($value) {
                if (isset($value["value"])) {
                    return $value['value'];
                }
            }, array_values($printerDetail));

            $printerInfo = json_decode($getPrinter[0]);


            {?>


<div class="fiveprayer__printer" id="fiveprayer__divTo">
    <div class="printer-page-container">
        <div class="left-printer">
            <span id="printer_left1" class="printer_line"><?php echo esc_html($printerInfo->{'printer_left1'});   ?></span>
            <span id="printer_left2" class="printer_line"><?php echo esc_html($printerInfo->{'printer_left2'});   ?></span>
            <span id="printer_left3" class="printer_line"><?php echo esc_html($printerInfo->{'printer_left3'});   ?></span>
            <span id="printer_left4" class="printer_line"><?php echo esc_html($printerInfo->{'printer_left4'});   ?></span>
            <span id="printer_left5" class="printer_line"><?php echo esc_html($printerInfo->{'printer_left5'});   ?></span>
            <span id="printer_left6" class="printer_line"><?php echo esc_html($printerInfo->{'printer_left6'});   ?></span>
            <span id="printer_left7" class="printer_line"><?php echo esc_html($printerInfo->{'printer_left7'});   ?></span>
            <span id="space" class="space"></span>

        </div>
        <div class="med-printer">
            <img id="printer_logo" src="<?php echo esc_url($printerInfo->{'printer_logo'});   ?>" alt="logo" />
        </div>
        <div class="right-printer">
            <span id="printer_right1" class="printer_line"><?php echo esc_html($printerInfo->{'printer_right1'});   ?></span>
            <span id="printer_right2" class="printer_line"><?php echo esc_html($printerInfo->{'printer_right2'});   ?></span>
            <span id="printer_right3" class="printer_line"><?php echo esc_html($printerInfo->{'printer_right3'});   ?></span>
            <span id="printer_right4" class="printer_line"><?php echo esc_html($printerInfo->{'printer_right4'});   ?></span>
            <span id="printer_right5" class="printer_line"><?php echo esc_html($printerInfo->{'printer_right5'});   ?></span>
            <span id="printer_right6" class="printer_line"><?php echo esc_html($printerInfo->{'printer_right6'});   ?></span>
            <span id="printer_right7" class="printer_line"><?php echo esc_html($printerInfo->{'printer_right7'});   ?></span>
           
         
            <span class="space"></span>
            
        </div>

    </div>
    <table id='fiveprayer__divToPrint' class='fiveprayer__TablePrayer_'>
        <thead id='fiveprayer__waa'>
            <?php
                if ($attributes["printer_option"] === "outside") {
                    ?>
            <div class="fiveprayer__printer_option ">
                <form id="fiveprayer__noPrint">
                    <select name="country">
                        <option value="" disabled selected>--Select Months--</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June </option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </form>
                <input class='fiveprayer__clickPrint' id='fiveprayer__noPrint' type="button" value="print" />
            </div>
            <tr class="fiveprayer__tbmonthfirst">
                <th class="emty__th"></th>
                <th td colspan="3">Fajr</th>

                <th td colspan="2">Dhuhr</th>

                <th td colspan="2">Asr</th>

                <th td colspan="2">Maghrib</th>

                <th td colspan="2">Isha</th>
            </tr>
            <?php
                } ?>
            <?php
                if ($attributes["printer_option"] === "inside") {
                    ?>
            <tr class="fiveprayer__tbmonthfirst">
                <th class="fiveprayer__select_print fiveprayer__printer_option">
                    <form id="fiveprayer__noPrint">
                        <select name="country">
                            <option value="" disabled selected>--Select Months--</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June </option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </form>
                    <input class='fiveprayer__clickPrint' id='fiveprayer__noPrint' type="button" value="print" />
                </th>

                <th td colspan="3">Fajr</th>

                <th td colspan="2">Dhuhr</th>

                <th td colspan="2">Asr</th>

                <th td colspan="2">Maghrib</th>

                <th td colspan="2">Isha</th>

            </tr>
            <?php
                } ?>
            <tr id="fiveprayer__tbmonthsecond">
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
            </tr>
        </thead>

        <tbody key={index}>

            <?php
                $month = array('newMonth' =>  sanitize_text_field(esc_sql(isset($_POST['newMonth'])) ? esc_sql($_POST['newMonth']) : ''));

                $monthNumber =  $month['newMonth'] ? $month['newMonth'] : wp_date("n", null, $timezone = null) ;

                $ourQueryTableGen = $wpdb->prepare("SELECT * FROM wp_fp_timetable WHERE YEAR(Date) = %d  AND MONTH(Date) = %d ", array(wp_date("Y", null, $timezone = null),$validatorChecker->MonthlyNumber($monthNumber)));
                $timeTableMonthly = $wpdb->get_results($ourQueryTableGen);
                foreach ($timeTableMonthly as $day) {?>


            <tr id=<?php echo esc_attr($day->today == wp_date("j", null, $timezone = null) ? 'today-row' : null);?>>
                <td><?php echo esc_html($day->currentDate); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->fajr_begins))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->fajr_iqamah))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->sunrise))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->dhuhr_begins))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->dhuhr_iqamah))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->asr_begins))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->asr_iqamah))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->maghrib_begins))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->maghrib_iqamah))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->isha_begins))); ?>
                </td>
                <td><?php echo esc_html(date("g:i A ", strtotime($day->isha_iqamah))); ?>
                </td>

            </tr>
            <?php }
                ?>
        </tbody>

    </table>
</div>

<?php

            }
            ?>

<script type="text/javascript">
jQuery(document).ready(function() {

    jQuery('select').on('change', function(e) {
        const month = e.target.value;
        jQuery('body').load(
            '', {
                newMonth: month
            });
    });
});
jQuery(document).ready(function() {

    jQuery('.fiveprayer__clickPrint').on('click', function(e) {

        if (e.target) {
            print();

        }
    });
});
</script> <?php
        }
    }
}
