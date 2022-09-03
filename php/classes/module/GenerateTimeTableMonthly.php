<?php 


// date("m", strtotime(array_key_first($day)->date)) != $monthdate


class GenerateTimeTableMonthly {
    function __construct($prayersettingmeta){
        $this->prayersettingmeta = $prayersettingmeta;
        $this->DynamicGenerate();
    }

    function DynamicGenerate(){
        global $wpdb;

        $monthdate = getdate()["mon"];

        if($this->prayersettingmeta){
            // require_once(plugin_dir_url( __FILE__ ) . '../../../build/index.js');
            foreach ($this->prayersettingmeta as $key => $day) {
                if($key === array_key_first($this->prayersettingmeta) && date("m", strtotime($day->date)) != $monthdate ){
                    $wpdb->delete('wp_fp_prayer_settings_meta', array('meta-key' => 'generate'));
                    $wpdb->insert('wp_fp_prayer_settings_meta', array('meta-key' => 'generate', 'value' => true));
                    BugFu::log(date("m", strtotime($day->date)) == $monthdate);
                   
               ;
                    
                }else if($key === array_key_first($this->prayersettingmeta) && date("m", strtotime($day->date)) == $monthdate ){
                    
                    $wpdb->delete('wp_fp_prayer_settings_meta', array('meta-key' => 'generate'));
                    $wpdb->insert('wp_fp_prayer_settings_meta', array('meta-key' => 'generate', 'value' => false));
            }
        }
    }
    }
}