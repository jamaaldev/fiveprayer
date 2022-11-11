

<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayer_StyleDynamicDB')) {
    class FivePrayer_StyleDynamicDB
    {
        public function StyleDynamic($color)
        {
            global $wpdb;
            $prayersettingmeta = $wpdb->get_results("SELECT * FROM wp_fp_prayer_settings_meta ");
            $result = json_encode($prayersettingmeta);
            $setcolors = json_decode($result, true);

            $filteredColorFirstBg = array_filter(
                $setcolors,
                function ($val) {
                    return $val['meta-key'] === "firstbg";
                }
            );
            $filteredColorFirstClr = array_filter(
                $setcolors,
                function ($val) {
                    return $val['meta-key'] === "firstclr";
                }
            );

            $filteredColorSecondBg = array_filter(
                $setcolors,
                function ($val) {
                    return $val['meta-key'] === "secondbg";
                }
            );
            $filteredColorSecondClr = array_filter(
                $setcolors,
                function ($val) {
                    return $val['meta-key'] === "secondclr";
                }
            );

            $getColorFirstBg = array_map(function ($key, $value) {
                return $value["value"];
            }, array_keys($filteredColorFirstBg), array_values($filteredColorFirstBg));

            $getColorFirstClr = array_map(function ($key, $value) {
                return $value["value"];
            }, array_keys($filteredColorFirstClr), array_values($filteredColorFirstClr));

            $getColorSecondBg = array_map(function ($key, $value) {
                return $value["value"];
            }, array_keys($filteredColorSecondBg), array_values($filteredColorSecondBg));
            $getColorSecondClr = array_map(function ($key, $value) {
                return $value["value"];
            }, array_keys($filteredColorSecondClr), array_values($filteredColorSecondClr));


            if ($color === 'firstbg') {
                return $colorFirstBg = trim($getColorFirstBg[0], '"');
            }
            if ($color === 'firstclr') {
                return $colorFirstClr = trim($getColorFirstClr[0], '"');
            }
            if ($color === 'secondbg') {
                return $colorSecondBg = trim($getColorSecondBg[0], '"');
            }
            if ($color === 'secondclr') {
                return $colorSecondClr = trim($getColorSecondClr[0], '"');
            }
        }
    }
}
