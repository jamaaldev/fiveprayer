<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

 class FpTimetableMonth
 {
  public function __construct()
  {
      add_action('init', array($this, 'registerShortcodes'));
      add_action('wp_enqueue_scripts', array($this,'tablemonth'));
      
      
      require_once(plugin_dir_path( __FILE__ ) . '../module/GenerateTimeTableMonthly.php');
      
      
    }
    
    public function tablemonth()
    {
    wp_localize_script('table_script', 'table_ajax_url', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_enqueue_style('tablemonth', plugin_dir_url(__FILE__) . './tablemonth.css', true);
    wp_enqueue_script('table_script',  plugin_dir_url(__FILE__)  . '../../../build/index.js', '1.0.0', true);

  
}


  public function registerShortcodes()
  {
   add_shortcode('Fp_TimeTable_Monthly', array($this, 'fpTimetableMonth'));
  }

  public function fpTimetableMonth($atts)
  {
   global $wpdb;
   $month;
   if (isset($_COOKIE["fcookie"])) 
        $month = $_COOKIE["fcookie"]; 
else 
echo "Cookie Not Set";
   $mydate    = wp_date("j", null, $timezone = null);
      $monthdate =  $month ? $month : wp_date("n", null, $timezone = null) ;
      $yeardate = wp_date("Y", null, $timezone = null);
   $prayersettingmeta =  $wpdb->get_results("SELECT * FROM wp_fp_timetable WHERE YEAR(Date) = $yeardate  AND MONTH(Date) = $monthdate ");
    new GenerateTimeTableMonthly($prayersettingmeta);
   ob_start();


  if ($prayersettingmeta ) {?>

            <table  id="divToPrint" class='FP_TablePrayer_'>
                <thead class='waa'>
                    <tr class="tbmonth">
                        <th>  
                             <form>
                                <select name="country" onchange="getMonth(this)">
                                    <option value="" disabled selected>--select--</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                </select>
                            </form>
                            <input class='noPrint' type="button" value="print" onclick="PrintDiv('divToPrint');" />
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
                 // Return date/time info of a timestamp; then format the output

                 $mydate    = wp_date("j", null, $timezone = null);
                 $monthdate =  wp_date("n", null, $timezone = null);

                   foreach ($prayersettingmeta as $day) {?>
                

                    <tr id=<?php echo $day->today == wp_date("j", null, $timezone = null) ? 'today-row' : null ?>>
                    <td><?php echo $day->currentDate ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->fajr_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->fajr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->sunrise)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->dhuhr_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->dhuhr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->asr_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->asr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->maghrib_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->maghrib_iqamah)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->isha_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->isha_iqamah)) ?></td>

                </tr>
                <?php }
                   ?>
                </tbody>

            </table>
            <script type="text/javascript">     
            function getMonth(e){
                
                
                const value = e.value;
                document.cookie=`fcookie=${value}`; 
        
            }
    function PrintDiv(printThis) { 

        var printContents = document.getElementById(printThis).innerHTML;
         var originalContents = document.body.innerHTML;
         window.onbeforeprint = (event) => {
             document.body.innerHTML = `
             <link rel="stylesheet" type="text/css" media="print"  href="../../../../../../wp-content/plugins/FP_Plugin-main-main/php/classes/shortcodes/tablemonth.css">

             <table  id="divToPrint" class='FP_TablePrayer_'>
                <thead>
                    <tr class="tbmonth">
                        <th>  <input type="button" value="print" onclick="PrintDiv('divToPrint');" /></th>
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
                 // Return date/time info of a timestamp; then format the output
              
                 $mydate    = wp_date("j", null, $timezone = null);
                 $monthdate =  wp_date("n", null, $timezone = null);
              

                 ?>
                 <?php
                   foreach ($prayersettingmeta as $day) {?>
                

                    <tr id=<?php echo $day->today == wp_date("j", null, $timezone = null) ? 'today-row' : null ?>>
                    <td><?php echo $day->currentDate ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->fajr_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->fajr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->sunrise)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->dhuhr_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->dhuhr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->asr_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->asr_iqamah)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->maghrib_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->maghrib_iqamah)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->isha_begins)) ?></td>
                    <td><?php echo date("g:i A ",  strtotime($day->isha_iqamah)) ?></td>

                </tr>

                <?php }
                   ?>
                </tbody>

            </table>


            `;
             
             
             
             console.log('Before print');
            
            };
 
            setTimeout(() => {
                
              window.print();
        

            }, 10);
window.onafterprint = (event) => {
             document.body.innerHTML = originalContents;
  console.log('After print');

};
            }
 </script>

        <?php
               

           }
           return ob_get_clean();

          }

        }
