<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');


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
      <div>FAJR IQAMAH</div>
      <div><?php echo date(' g:i A', strtotime($this->day->fajr_iqamah)); ?></div>
      <?php
return $highlight = 'fajr';
           }

           if (wp_date("j", null, $timezone = null) == $this->day->today &&  (strtotime($currentTimeHour) < strtotime($this->day->fajr_iqamah))) {
               ?>
      <div>FAJR IQAMAH</div>
      <div><?php echo date(' g:i A', strtotime($this->day->fajr_iqamah)); ?></div>
<?php
return $highlight = 'fajr';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->fajr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->sunrise))) {
               ?>
      <div>SUNRISE</div>
      <div><?php  echo date(' g:i A', strtotime($this->day->sunrise)); ?></div>
      
<?php
return $highlight = 'sunrise';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->sunrise)) && (strtotime($currentTimeHour) < strtotime($this->day->dhuhr_iqamah))) {
               ?>
      <div>DHUHR IQAMAH</div>
      <div><?php echo  date(' g:i A', strtotime($this->day->dhuhr_iqamah)); ?></div>

<?php
return $highlight = 'dhuhr';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->dhuhr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->asr_iqamah))) {
               ?>
       <div>ASR IQAMAH</div>
       <div><?php echo date(' g:i A', strtotime($this->day->asr_iqamah)); ?></div>
      
 <?php
 return $highlight = 'asr';
           }


           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->asr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->maghrib_iqamah))) {
               ?>
      <div>MAQHRIB IQAMAH</div>
      <div><?php echo date(' g:i A', strtotime($this->day->maghrib_iqamah)); ?></div>
      
 <?php
 return $highlight = 'maqhrib';
           }

           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->maghrib_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->isha_iqamah))) {
               ?>
      <div>ISHA IQAMAH</div>
      <div><?php echo date(' g:i A', strtotime($this->day->isha_iqamah)); ?></div>
<?php
return $highlight = 'isha';
           }

           return $highlight;
       }
}
