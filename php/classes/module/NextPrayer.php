<?php



class NextPrayer
{
    public $day;

    public function __construct($day)
    {
        $this->day = $day;
    }



       public function TodayPrayer()
       {
           $timeHour = wp_date("H", null, $timezone = null);
           $timeMin = wp_date("i", null, $timezone = null);
           $currentTimeHour = wp_date("H:i", $timezone = null);
           global $highlight;

           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->isha_iqamah))) {
               ?>
      <h5>FAJR IQAMAH</h5>
      <h2><?php echo date(' g:i A', strtotime($this->day->fajr_iqamah)); ?></h2>
      <?php
return $highlight = 'fajr';
           }

           if (wp_date("j", null, $timezone = null) == $this->day->today &&  (strtotime($currentTimeHour) < strtotime($this->day->fajr_iqamah))) {
               ?>
      <h5>FAJR IQAMAH</h5>
      <h2><?php echo date(' g:i A', strtotime($this->day->fajr_iqamah)); ?></h2>
<?php
return $highlight = 'fajr';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->fajr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->sunrise))) {
               ?>
      <h5>SUNRISE</h5>
      <h2><?php  echo date(' g:i A', strtotime($this->day->sunrise)); ?></h2>
      
<?php
return $highlight = 'sunrise';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->sunrise)) && (strtotime($currentTimeHour) < strtotime($this->day->dhuhr_iqamah))) {
               ?>
      <h5>DHUHR IQAMAH</h5>
      <h2><?php echo  date(' g:i A', strtotime($this->day->dhuhr_iqamah)); ?></h2>

<?php
return $highlight = 'dhuhr';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->dhuhr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->asr_iqamah))) {
               ?>
       <h5>ASR IQAMAH</h5>
       <h2><?php echo date(' g:i A', strtotime($this->day->asr_iqamah)); ?></h2>
      
 <?php
 return $highlight = 'asr';
           }


           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->asr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->maghrib_iqamah))) {
               ?>
      <h5>MAQHRIB IQAMAH</h5>
      <h2><?php echo date(' g:i A', strtotime($this->day->maghrib_iqamah)); ?></h2>
      
 <?php
 return $highlight = 'maqhrib';
           }

           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->maghrib_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->isha_iqamah))) {
               ?>
      <h5>ISHA IQAMAH</h5>
      <h2><?php echo date(' g:i A', strtotime($this->day->isha_iqamah)); ?></h2>
<?php
return $highlight = 'isha';
           }

           return $highlight;
       }
}
