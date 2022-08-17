<?php



class NextPrayer{
public $day;
function __construct($day){
$this->day = $day;
// // fajr
//   $this->fajrHour = wp_date(' G ', strtotime($this->day->fajr_iqamah));
//   $this->fajrMin = wp_date(' i ', strtotime($this->day->fajr_iqamah));
// // sunrise
//  $this->sunriseHour = wp_date('G ', strtotime($this->day->sunrise));
//  $this->sunriseMin = wp_date(' i ', strtotime($this->day->sunrise));
// // dhuhr
//  $this->dhuhrHour = wp_date(' G ', strtotime($this->day->dhuhr_iqamah));
//  $this->dhuhrMin = wp_date(' i ', strtotime($this->day->dhuhr_iqamah));
// // asr
//  $this->asrHour = wp_date(' G ', strtotime($this->day->asr_iqamah));
//  $this->asrMin = wp_date(' i ', strtotime($this->day->asr_iqamah));
// // maghrib
//  $this->maghribHour = wp_date(' G ', strtotime($this->day->maghrib_iqamah));
//   $this->maghribMin = wp_date(' i ', strtotime($this->day->maghrib_iqamah));
// // isha
//  $this->ishaHour = wp_date(' G ', strtotime($this->day->isha_iqamah));
//  $this->ishaMin = wp_date(' i ', strtotime($this->day->isha_iqamah));

}


   
   function TodayPrayer(){
    $timeHour = wp_date("H", null, $timezone = null);
    $timeMin = wp_date("i", null, $timezone = null);
    $currentTimeHour = wp_date("H:i", $timezone = null);
    // $currentTimeMin = wp_date("i", $timezone = null);
    // echo  wp_date("j", null, $timezone = null);
    // echo  ' current '. (json_decode( $ishaHour));
    // && json_decode( $currentTimeMin ) >  (json_decode( $asrMin ) + 5)
    // date(' g:i: A', strtotime($this->day->fajr_iqamah)) .'  ' .  ' fajrmin ' . ' ' .(json_decode( $fajrMin ) +5)
    if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->isha_iqamah)) ) {
      // echo $this->day->fajr_iqamah . '' . date(' H:i:s', $after) . '' . date(' H:i:s', $before)  ;
      // echo ((strtotime($this->day->fajr_iqamah)) >  $before) && (!(strtotime($this->day->fajr_iqamah)) >=  $after)  ? date(' g:i: A', strtotime($this->day->fajr_iqamah)) : '' ;
      
      ?>
      <h3>FAJR IQAMAH</h3>
      <h2><?php echo date(' g:i A', strtotime($this->day->fajr_iqamah) ); ?></h2>
<?php }
    if (wp_date("j", null, $timezone = null) == $this->day->today &&  (strtotime($currentTimeHour) < strtotime($this->day->fajr_iqamah)) ) {
      // echo $this->day->fajr_iqamah . '' . date(' H:i:s', $after) . '' . date(' H:i:s', $before)  ;
      // echo ((strtotime($this->day->fajr_iqamah)) >  $before) && (!(strtotime($this->day->fajr_iqamah)) >=  $after)  ? date(' g:i: A', strtotime($this->day->fajr_iqamah)) : '' ;
      
      ?>
      <h3>FAJR IQAMAH</h3>
      <h2><?php echo date(' g:i A', strtotime($this->day->fajr_iqamah) ); ?></h2>
<?php }
 if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->fajr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->sunrise)) ) {
      // echo ((strtotime($this->day->sunrise)) >  $beforeSunrise) && (!(strtotime($this->day->sunrise)) >=  $afterSunrise)  ? date(' g:i: A', strtotime($this->day->sunrise)) : '' ;
     

      ?>
      <h3>SUNRISE</h3>
      <h2><?php  echo date(' g:i A', strtotime($this->day->sunrise)); ?></h2>
      
<?php }
 if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->sunrise)) && (strtotime($currentTimeHour) < strtotime($this->day->dhuhr_iqamah))   ) {
      //     echo  date(' g:i: A', strtotime($this->day->dhuhr_iqamah)) . ''. date(' g:i: A', strtotime( $beforeDhuhr));
      // echo  !(strtotime($this->day->dhuhr_iqamah) >=  $afterDhuhr) ? 'a' : 'b';
      // echo ((strtotime($this->day->dhuhr_iqamah)) >  $beforeDhuhr) && (!(strtotime($this->day->dhuhr_iqamah)) >=  $afterDhuhr)  ? date(' g:i: A', strtotime($this->day->dhuhr_iqamah)) : '' ;
      
      ?>
      <h3>DHUHR IQAMAH</h3>
      <h2><?php echo  date(' g:i A', strtotime($this->day->dhuhr_iqamah) ); ?></h2>

<?php } 
 if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->dhuhr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->asr_iqamah)) ) {
      //     echo !(strtotime($this->day->asr_iqamah) >=  $afterAsr) ? '' :  date(' g:i: A', strtotime($this->day->asr_iqamah));
      // echo ((strtotime($this->day->asr_iqamah) >  $beforeAsr)) && (!(strtotime($this->day->asr_iqamah) >=  $afterAsr))  ? date(' g:i: A', strtotime($this->day->asr_iqamah)) : '' ;
       ?>
       <h3>ASR IQAMAH</h3>
       <h2><?php echo date(' g:i A', strtotime($this->day->asr_iqamah)); ?></h2>
      
 <?php }
 // if (wp_date("j", null, $timezone = null) == $this->day->today && ($timeHour >= 13) && ($timeHour < 17)  ) {
 //      //     echo !(strtotime($this->day->asr_iqamah) >=  $afterAsr) ? '' :  date(' g:i: A', strtotime($this->day->asr_iqamah));
 //      // echo ((strtotime($this->day->asr_iqamah) >  $beforeAsr)) && (!(strtotime($this->day->asr_iqamah) >=  $afterAsr))  ? date(' g:i: A', strtotime($this->day->asr_iqamah)) : '' ;
 //      echo date(' g:i: A', strtotime($this->day->asr_iqamah)) . ' ' . 'hour ' . strtotime($currentTimeHour) . ' ' . 'min ' .  strtotime($this->day->dhuhr_iqamah);
 // }
 
 
 if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->asr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->maghrib_iqamah))  ) {
      
      //     echo !(strtotime($this->day->asr_iqamah) >=  $afterAsr) ? '' :  date(' g:i: A', strtotime($this->day->asr_iqamah));
      // echo ((strtotime($this->day->maghrib_iqamah) >  $beforeMaghrib)) && (!(strtotime($this->day->maghrib_iqamah) >=  $afterMaghrib))  ? date(' g:i: A', strtotime($this->day->maghrib_iqamah)) : '' ;
      // echo $timeHour . '' . $timeMin;
      ?>
      <h3>MAQHRIB IQAMAH</h3>
      <h2><?php echo date(' g:i A', strtotime($this->day->maghrib_iqamah)); ?></h2>
      
 <?php }
 if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->maghrib_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->isha_iqamah))   ) {
      //     echo !(strtotime($this->day->asr_iqamah) >=  $afterAsr) ? '' :  date(' g:i: A', strtotime($this->day->asr_iqamah));
      // echo ((strtotime($this->day->isha_iqamah) >  $beforeIsha)) && (!(strtotime($this->day->isha_iqamah) >=  $afterIsha))  ? date(' g:i: A', strtotime($this->day->isha_iqamah)) : '' ;
     
      ?>
      <h3>ISHA IQAMAH</h3>
      <h2><?php echo date(' g:i A', strtotime($this->day->isha_iqamah)); ?></h2>
<?php } 

return;
}


function UpcomingPrayer($prayerIqamah,$currentTimeHour){
 
// echo date(' g:i  A,', strtotime($prayerIqamah));
//   if( (strtotime($prayerIqamah) ) ){
//     $pattern = "/''/";

//     $nextIqamah =   date(' g:i  A,', strtotime($prayerIqamah));
//      echo ($nextIqamah);


// }

}
// function tra(){
//   $input = 'lorem, lpsum, is, simply, dummy, text, of, the, printing, and';
//   $parts = explode(', ', $input, 5);
  
//        print_r($parts);

// }

}