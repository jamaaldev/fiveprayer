<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');


class FivePrayer_NextPrayer
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
      <div class="iqamah_next">FAJR IQAMAH</div>
      <div class="iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($this->day->fajr_iqamah))); ?></div>
      <?php
return $highlight = 'fajr';
           }

           if (wp_date("j", null, $timezone = null) == $this->day->today &&  (strtotime($currentTimeHour) < strtotime($this->day->fajr_iqamah))) {
               ?>
      <div class="iqamah_next">FAJR IQAMAH</div>
      <div class="iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($this->day->fajr_iqamah))); ?></div>
<?php
return $highlight = 'fajr';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->fajr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->sunrise))) {
               ?>
      <div class="iqamah_next">SUNRISE</div>
      <div class="iqamah_time"><?php  echo  esc_html(date(' g:i A', strtotime($this->day->sunrise))); ?></div>
      
<?php
return $highlight = 'sunrise';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->sunrise)) && (strtotime($currentTimeHour) < strtotime($this->day->dhuhr_iqamah))) {
               ?>
      <div class="iqamah_next">DHUHR IQAMAH</div>
      <div class="iqamah_time"><?php echo   esc_html(date(' g:i A', strtotime($this->day->dhuhr_iqamah))); ?></div>

<?php
return $highlight = 'dhuhr';
           }
           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->dhuhr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->asr_iqamah))) {
               ?>
       <div class="iqamah_next">ASR IQAMAH</div>
       <div class="iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($this->day->asr_iqamah))); ?></div>
      
 <?php
 return $highlight = 'asr';
           }


           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->asr_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->maghrib_iqamah))) {
               ?>
      <div class="iqamah_next">MAQHRIB IQAMAH</div>
      <div class="iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($this->day->maghrib_iqamah))); ?></div>
      
 <?php
 return $highlight = 'maqhrib';
           }

           if (wp_date("j", null, $timezone = null) == $this->day->today && (strtotime($currentTimeHour)  >= strtotime($this->day->maghrib_iqamah)) && (strtotime($currentTimeHour) < strtotime($this->day->isha_iqamah))) {
               ?>
      <div class="iqamah_next">ISHA IQAMAH</div>
      <div class="iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($this->day->isha_iqamah))); ?></div>
<?php
return $highlight = 'isha';
           }

           return $highlight;
       }
}
