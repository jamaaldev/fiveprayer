<?php


defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if(!class_exists('FivePrayer_GenerateTimeTableMonthly')){


class FivePrayer_GenerateTimeTableMonthly
{
	public function __construct()
    {
        require_once(plugin_dir_path( __FILE__ ) . '../module/GenerateTimeTableDynamic.php');

    }

    public function DynamicGenerateCalendar()
    {
		$validatorChecker = new FivePrayer_Validator();
        global $wpdb;

        {?>


<div class="fiveprayer__printer" id="fiveprayer__divTo">
	<table id='fiveprayer__divToPrint' class='fiveprayer__TablePrayer_'>
		<thead id='fiveprayer__waa'>
			<tr class="fiveprayer__tbmonth">
				<th class="fiveprayer__select_print">
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
			<tr id="fiveprayer__tbmonth">
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
			
			if(e.target){
				print();

			}
		});
	});
</script> <?php
    }
}
}