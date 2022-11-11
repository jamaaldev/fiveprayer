

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
            $filteredColorEvenRowBg = array_filter(
                $setcolors,
                function ($val) {
                    return $val['meta-key'] === "evenbg";
                }
            );
            $filteredColorEvenRowClr = array_filter(
                $setcolors,
                function ($val) {
                    return $val['meta-key'] === "evenclr";
                }
            );
            $filteredColorHighLightRowBg = array_filter(
                $setcolors,
                function ($val) {
                    return $val['meta-key'] === "highlightbg";
                }
            );





            if ($color === 'firstbg') {
                $getColorFirstBg = array_map(function ($key, $value) {
                    return $value["value"];
                }, array_keys($filteredColorFirstBg), array_values($filteredColorFirstBg));


                return $colorFirstBg = trim($getColorFirstBg[0], '"');
            }

            if ($color === 'firstclr') {
                $getColorFirstClr = array_map(function ($key, $value) {
                    return $value["value"];
                }, array_keys($filteredColorFirstClr), array_values($filteredColorFirstClr));
                return $colorFirstClr = trim($getColorFirstClr[0], '"');
            }

            if ($color === 'secondbg') {
                $getColorSecondBg = array_map(function ($key, $value) {
                    return $value["value"];
                }, array_keys($filteredColorSecondBg), array_values($filteredColorSecondBg));
                return $colorSecondBg = trim($getColorSecondBg[0], '"');
            }
            if ($color === 'secondclr') {
                $getColorSecondClr = array_map(function ($key, $value) {
                    return $value["value"];
                }, array_keys($filteredColorSecondClr), array_values($filteredColorSecondClr));

                return $colorSecondClr = trim($getColorSecondClr[0], '"');
            }
            if ($color === 'evenrowbg') {
                $getColorEvenRowBg = array_map(function ($key, $value) {
                    return $value["value"];
                }, array_keys($filteredColorEvenRowBg), array_values($filteredColorEvenRowBg));
                return $colorEvenRowBg = trim($getColorEvenRowBg[0], '"');
            }
            if ($color === 'evenrowclr') {
                $getColorEvenRowClr = array_map(function ($key, $value) {
                    return $value["value"];
                }, array_keys($filteredColorEvenRowClr), array_values($filteredColorEvenRowClr));

                return $colorEvenRowClr = trim($getColorEvenRowClr[0], '"');
            }
            if ($color === 'highlightrowbg') {
                $getColorHighLightRowBg = array_map(function ($key, $value) {
                    return $value["value"];
                }, array_keys($filteredColorHighLightRowBg), array_values($filteredColorHighLightRowBg));

                return $colorHighLightRowBg = trim($getColorHighLightRowBg[0], '"');
            }
        }
    }
}
