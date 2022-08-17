<?php



class NextPrayer{
public $day;
function __construct($day){
$this->day = $day;
// fajr
  $this->fajrHour = wp_date(' G ', strtotime($this->day->fajr_iqamah));
  $this->fajrMin = wp_date(' i ', strtotime($this->day->fajr_iqamah));
// sunrise
 $this->sunriseHour = wp_date('G ', strtotime($this->day->sunrise));
 $this->sunriseMin = wp_date(' i ', strtotime($this->day->sunrise));
// dhuhr
 $this->dhuhrHour = wp_date(' G ', strtotime($this->day->dhuhr_iqamah));
 $this->dhuhrMin = wp_date(' i ', strtotime($this->day->dhuhr_iqamah));
// asr
 $this->asrHour = wp_date(' G ', strtotime($this->day->asr_iqamah));
 $this->asrMin = wp_date(' i ', strtotime($this->day->asr_iqamah));
// maghrib
 $this->maghribHour = wp_date(' G ', strtotime($this->day->maghrib_iqamah));
  $this->maghribMin = wp_date(' i ', strtotime($this->day->maghrib_iqamah));
// isha
 $this->ishaHour = wp_date(' G ', strtotime($this->day->isha_iqamah));
 $this->ishaMin = wp_date(' i ', strtotime($this->day->isha_iqamah));

}


   
   function TodayPrayer(){
    $currentTimeHour = wp_date("g:i A", $timezone = null);
    $currentTimeMin = wp_date("i", $timezone = null);
    // echo  wp_date("j", null, $timezone = null);
    // echo  ' current '. (json_decode( $ishaHour));
    // && json_decode( $currentTimeMin ) >  (json_decode( $asrMin ) + 5)
    // date(' g:i: A', strtotime($this->day->fajr_iqamah)) .'  ' .  ' fajrmin ' . ' ' .(json_decode( $fajrMin ) +5)
if ( (wp_date("j", null, $timezone = null)  == $this->day->today) && (strtotime($currentTimeHour)  <=  strtotime($this->day->fajr_iqamah)) )  {
        
        // echo json_decode( $currentTimeHour ) .''.  (json_decode( $fajrHour ));
        echo  $this->UpcomingPrayer($this->day->fajr_iqamah,$currentTimeHour);


}
if ((wp_date("j", null, $timezone = null)  == $this->day->today) && (strtotime($currentTimeHour)  <=  strtotime($this->day->sunrise))  ) {

    // echo date(' g:i: A', strtotime($this->day->sunrise));
    echo  $this->UpcomingPrayer($this->day->sunrise,$currentTimeHour);


}

if ( (wp_date("j", null, $timezone = null)  == $this->day->today) && (strtotime($currentTimeHour)  <= strtotime($this->day->dhuhr_iqamah))  ) {

//  echo date(' g:i: A', strtotime($this->day->dhuhr_iqamah)) ;
echo  $this->UpcomingPrayer($this->day->dhuhr_iqamah,$currentTimeHour);


}

if ( (wp_date("j", null, $timezone = null)  == $this->day->today) && (strtotime($currentTimeHour)  <= strtotime($this->day->asr_iqamah))  ) {
  
//  echo date(' g:i: A', strtotime($this->day->asr_iqamah)) ;
echo  $this->UpcomingPrayer($this->day->asr_iqamah,$currentTimeHour);
} 

if (  (wp_date("j", null, $timezone = null)  == $this->day->today) && (strtotime($currentTimeHour)  <= strtotime($this->day->maghrib_iqamah))  ) {

//  echo date(' g:i: A', strtotime($this->day->maghrib_iqamah));
echo  $this->UpcomingPrayer($this->day->maghrib_iqamah,$currentTimeHour);


}

// &&   (json_decode( $currentTimeHour )) > (json_decode( $maghribHour )) &&  (json_decode( $maghribMin ) + 5) >= json_decode( $maghribMin ) 
if (  (wp_date("j", null, $timezone = null)  == $this->day->today) && (strtotime($currentTimeHour)  <=  strtotime($this->day->isha_iqamah))   ) {
 
//  echo date(' g:i: A', strtotime($this->day->isha_iqamah));
echo  $this->UpcomingPrayer($this->day->isha_iqamah,$currentTimeHour);

}

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