<?php

defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if(!class_exists('FivePrayer_NextPrayer')){


class FivePrayer_NextPrayer
{
  
       public function TodayPrayer($prayer)
       {
           $timeHour = wp_date("H", null, $timezone = null);
           $timeMin = wp_date("i", null, $timezone = null);
           $currentTimeHour = wp_date("H:i", $timezone = null);
           global $highlight;
           

           if (wp_date("j", null, $timezone = null) == $prayer->today && (strtotime($currentTimeHour)  >= strtotime($prayer->isha_iqamah))) {
               ?>
      <div class="fiveprayer__iqamah_next">FAJR IQAMAH</div>
      <div class="fiveprayer__iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($prayer->fajr_iqamah))); ?></div>
      <?php
return $highlight = 'fajr';
           }

           if (wp_date("j", null, $timezone = null) == $prayer->today &&  (strtotime($currentTimeHour) < strtotime($prayer->fajr_iqamah))) {
               ?>
      <div class="fiveprayer__iqamah_next">FAJR IQAMAH</div>
      <div class="fiveprayer__iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($prayer->fajr_iqamah))); ?></div>
<?php
return $highlight = 'fajr';
           }
           if (wp_date("j", null, $timezone = null) == $prayer->today && (strtotime($currentTimeHour)  >= strtotime($prayer->fajr_iqamah)) && (strtotime($currentTimeHour) < strtotime($prayer->sunrise))) {
               ?>
      <div class="fiveprayer__iqamah_next">SUNRISE</div>
      <div class="fiveprayer__iqamah_time"><?php  echo  esc_html(date(' g:i A', strtotime($prayer->sunrise))); ?></div>
      
<?php
return $highlight = 'sunrise';
           }
           if (wp_date("j", null, $timezone = null) == $prayer->today && (strtotime($currentTimeHour)  >= strtotime($prayer->sunrise)) && (strtotime($currentTimeHour) < strtotime($prayer->dhuhr_iqamah))) {
               ?>
      <div class="fiveprayer__iqamah_next">DHUHR IQAMAH</div>
      <div class="fiveprayer__iqamah_time"><?php echo   esc_html(date(' g:i A', strtotime($prayer->dhuhr_iqamah))); ?></div>

<?php
return $highlight = 'dhuhr';
           }
           if (wp_date("j", null, $timezone = null) == $prayer->today && (strtotime($currentTimeHour)  >= strtotime($prayer->dhuhr_iqamah)) && (strtotime($currentTimeHour) < strtotime($prayer->asr_iqamah))) {
               ?>
       <div class="fiveprayer__iqamah_next">ASR IQAMAH</div>
       <div class="fiveprayer__iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($prayer->asr_iqamah))); ?></div>
      
 <?php
 return $highlight = 'asr';
           }


           if (wp_date("j", null, $timezone = null) == $prayer->today && (strtotime($currentTimeHour)  >= strtotime($prayer->asr_iqamah)) && (strtotime($currentTimeHour) < strtotime($prayer->maghrib_iqamah))) {
               ?>
      <div class="fiveprayer__iqamah_next">MAQHRIB IQAMAH</div>
      <div class="fiveprayer__iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($prayer->maghrib_iqamah))); ?></div>
      
 <?php
 return $highlight = 'maqhrib';
           }

           if (wp_date("j", null, $timezone = null) == $prayer->today && (strtotime($currentTimeHour)  >= strtotime($prayer->maghrib_iqamah)) && (strtotime($currentTimeHour) < strtotime($prayer->isha_iqamah))) {
               ?>
      <div class="fiveprayer__iqamah_next">ISHA IQAMAH</div>
      <div class="fiveprayer__iqamah_time"><?php echo  esc_html(date(' g:i A', strtotime($prayer->isha_iqamah))); ?></div>
<?php
return $highlight = 'isha';
           }

           return $highlight;
       }
}
}