<?php


defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');


class GenerateTimeTableMonthly
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this,'tablemonth'), 99);
    }
    public function tablemonth()
    {
        // wp_enqueue_style('tablemonth', plugin_dir_url(__FILE__) . './tablemonth.css');
    }

    public function DynamicGenerate()
    {
        global $wpdb;

        {?>


<div class="printer" id="divTo">
	<!-- <img class="noDisplay" src="https://picsum.photos/200" alt="image"> -->

	<table id='divToPrint' class='FP_TablePrayer_'>
		<thead id='waa'>
			<tr class="tbmonth">
				<th class="select_print">
					<form id="noPrint">
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
					<input class='clickPrint' id='noPrint' type="button" value="print" />
				</th>
				<th td colspan="3">Fajr</th>

				<th td colspan="2">Dhuhr</th>

				<th td colspan="2">Asr</th>

				<th td colspan="2">Maghrib</th>

				<th td colspan="2">Isha</th>

			</tr>
			<tr id="tbmonth">
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
            $monthss = array('newMonth' =>  sanitize_text_field(esc_sql(isset($_POST['newMonth'])) ? esc_sql($_POST['newMonth']) : ''));

            $monthdate =  $monthss['newMonth'] ? $monthss['newMonth'] : wp_date("n", null, $timezone = null) ;
            $yeardate = wp_date("Y", null, $timezone = null);
            $ourQueryTableGen = $wpdb->prepare("SELECT * FROM wp_fp_timetable WHERE YEAR(Date) = %d  AND MONTH(Date) = %d ", array($yeardate,$monthdate));
            $prayersettingmeta = $wpdb->get_results($ourQueryTableGen);
            foreach ($prayersettingmeta as $day) {?>


			<tr id=<?php echo esc_html($day->today == wp_date("j", null, $timezone = null) ? 'today-row' : null);?>>
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
			jQuery('#divTo').load(
				'<?php echo plugin_dir_url(__FILE__) . 'GenerateTimeTableDynamic.php'; ?>', {
					newMonth: month
				});
		});
	});
	jQuery(document).ready(function() {

		jQuery('.clickPrint').on('click', function(e) {
			
			console.log("🚀 ~ file: GenerateTimeTableMonthly.php ~ line 147 ~ jQuery ~ e", e.target)
			if(e.target){
				print();

			}
		});
	});
</script> <?php
    }
}
