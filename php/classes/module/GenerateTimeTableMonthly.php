<?php 


// date("m", strtotime(array_key_first($day)->date)) != $monthdate

if ( !defined('ABSPATH') ) {
    //If wordpress isn't loaded load it up.
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . '/wp-load.php';
    // require_once(plugin_dir_path( __FILE__ ) . '../module/GenerateTimeTableMonthly.php');
    
}
class GenerateTimeTableMonthly {
    function __construct(){
        // $this->prayersettingmeta = $prayersettingmeta;
        // $this->DynamicGenerate();
        add_action('wp_enqueue_scripts', array($this,'tablemonth'));

    }
    function tablemonth(){
        wp_enqueue_style('tablemonth', plugin_dir_url(__FILE__) . './tablemonth.css', true);
        wp_enqueue_script('jquery');

    }

    function DynamicGenerate(){


        global $wpdb;

        {?>

        <div class="printer" id="divTo">
        <link rel="stylesheet" type="text/css" media="print"  href=' <?php echo plugin_dir_url( __FILE__ ) . '../shortcodes/tablemonth.css' ?>'>
        <!-- <link rel="stylesheet" type="text/css" media="print"  href="../../../../../../wp-content/plugins/fiveprayer_alpha/php/classes/shortcodes/tablemonth.css"> -->

            <table  id='divToPrint' class='FP_TablePrayer_'>
                <thead class='waa'>
                    <tr class="tbmonth">
                        <th>  
                             <form class="noPrint">
                                <select name="country">
                                    <option value="" disabled selected>--select--</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                </select>
                            </form>
                            <input id='clickPrint' class='noPrint' type="button"   value="print" />
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
                 $monthss = array('newMonth' =>  sanitize_text_field(esc_sql(isset($_POST['newMonth'])))); 
                 $mydate    = wp_date("j", null, $timezone = null);
                 $monthdate =  wp_date("n", null, $timezone = null);
                 $mydate    = wp_date("j", null, $timezone = null);
                 $monthdate =  $monthss['newMonth'] ? $monthss['newMonth'] : wp_date("n", null, $timezone = null) ;
                 $yeardate = wp_date("Y", null, $timezone = null);
                 $ourQueryTableGen = $wpdb->prepare("SELECT * FROM wp_fp_timetable WHERE YEAR(Date) = %d  AND MONTH(Date) = %d ",array($yeardate,$monthdate));
                 $prayersettingmeta = $wpdb->get_results($ourQueryTableGen);
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
        </div>

        <?php
            
            } 
            ?> 

            <script type="text/javascript">    
            jQuery(document).ready(function(){
              
                        jQuery('select').change(function(e){
                            let month = e.target.value;
                            jQuery('#divTo').load('<?php echo plugin_dir_url( __FILE__ ) . 'Test.php'; ?>',{
                                newMonth: month
                            });
                        });
            });
            jQuery(document).ready(function(){
              
                        jQuery('#clickPrint').click(function(e){
                            print()
                        

                            // printTable('divTo')
                        });
            });
                      
             </script> <?php
    } 

}