<?php



class NextPrayer{
public $day;
function __construct($day){
$this->day = $day;
}

protected $prayerLocal = array(
    "fajr iqamah"    => "fajr_iqamah",
    "sunrise"        => "sunrise",
    "dhuhr iqamah"   => "dhuhr_iqamah",
    "asr iqamah"     => "asr_iqamah",
    "maghrib iqamah" => "Maghrib",
    "isha iqamah"    => "isha_iqamah"
   );
   
   function TodayPrayer(){
    $value = array($this->day->fajr_iqamah, $this->day->sunrise, $this->day->dhuhr_iqamah, $this->day->asr_iqamah, $this->day->maghrib_iqamah, $this->day->isha_iqamah);
    $todayTimeHour = wp_date("H", null, $timezone = null);
    $todayTimeMin = wp_date("i", null, $timezone = null);
    // fajr
    $fajrHour = date(' H ', strtotime($this->day->fajr_iqamah));
    $fajrMin = date(' i ', strtotime($this->day->fajr_iqamah));
    // sunrise
    $sunriseHour = date(' H ', strtotime($this->day->sunrise));
    $sunriseMin = date(' i ', strtotime($this->day->sunrise));
    // dhuhr
    $dhuhrHour = date(' H ', strtotime($this->day->dhuhr_iqamah));
    $dhuhrMin = date(' i ', strtotime($this->day->dhuhr_iqamah));
    // asr
    $asrHour = date(' H ', strtotime($this->day->asr_iqamah));
    $asrMin = date(' i ', strtotime($this->day->asr_iqamah));
    // maghrib
    $maghribHour = date(' H ', strtotime($this->day->maghrib_iqamah));
    $maghribMin = date(' i ', strtotime($this->day->maghrib_iqamah));
    // isha
    $ishaHour = date(' H ', strtotime($this->day->isha_iqamah));
    $ishaMin = date(' i ', strtotime($this->day->isha_iqamah));



if (getdate()["mday"] == $this->day->today && ($todayTimeHour > 0) && ($todayTimeHour < 5)) {
      
 echo date(' g:i: A', strtotime($this->day->fajr_iqamah));
}
if (getdate()["mday"] == $this->day->today && ($todayTimeHour > 5) && ($todayTimeHour < 6)) {

    echo date(' g:i: A', strtotime($this->day->sunrise));

}
if (getdate()["mday"] == $this->day->today && ($todayTimeHour > 6) && ($todayTimeHour < 13)) {

 echo date(' g:i: A', strtotime($this->day->dhuhr_iqamah));
}
if (getdate()["mday"] == $this->day->today && ($todayTimeHour > 13) && ($todayTimeHour < 17)) {
  
 echo date(' g:i: A', strtotime($this->day->asr_iqamah)) . ' ' . 'hour ' . $todayTimeHour . ' ' . 'min ' . $todayTimeMin;
}

if (getdate()["mday"] == $this->day->today && ($todayTimeHour > 17) && ($todayTimeHour < 20)) {

 echo date(' g:i: A', strtotime($this->day->maghrib_iqamah));
}

if (getdate()["mday"] == $this->day->today && ($todayTimeHour > 20) && ($todayTimeHour < 24)) {
 
 echo date(' g:i: A', strtotime($this->day->isha_iqamah));
}
return;
}

}