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
             $filteredColorHighLightRowClr = array_filter(
                 $setcolors,
                 function ($val) {
                     return $val['meta-key'] === "highlightcrl";
                 }
             );





             if ($color === 'firstbg') {
                 $getColorFirstBg = array_map(function ($key, $value) {
                     if (isset($value["value"])) {
                         return $value["value"];
                     }
                 }, array_keys($filteredColorFirstBg), array_values($filteredColorFirstBg));


                 return  isset($getColorFirstBg[0]) ? trim($getColorFirstBg[0], '"') : "#01b94b";
             }

             if ($color === 'firstclr') {
                 $getColorFirstClr = array_map(function ($key, $value) {
                     if (isset($value["value"])) {
                         return $value["value"];
                     }
                 }, array_keys($filteredColorFirstClr), array_values($filteredColorFirstClr));

                 return  isset($getColorFirstClr[0]) ? trim($getColorFirstClr[0], '"') : "#f5f5f5";
             }

             if ($color === 'secondbg') {
                 $getColorSecondBg = array_map(function ($key, $value) {
                     if (isset($value["value"])) {
                         return $value["value"];
                     }
                 }, array_keys($filteredColorSecondBg), array_values($filteredColorSecondBg));

                 return  isset($getColorSecondBg[0]) ? trim($getColorSecondBg[0], '"') : "#387d06";
             }
             if ($color === 'secondclr') {
                 $getColorSecondClr = array_map(function ($key, $value) {
                     if (isset($value["value"])) {
                         return $value["value"];
                     }
                 }, array_keys($filteredColorSecondClr), array_values($filteredColorSecondClr));

                 return  isset($getColorSecondClr[0]) ? trim($getColorSecondClr[0], '"') : "#e3d091";
             }
             if ($color === 'evenrowbg') {
                 $getColorEvenRowBg = array_map(function ($key, $value) {
                     if (isset($value["value"])) {
                         return $value["value"];
                     }
                 }, array_keys($filteredColorEvenRowBg), array_values($filteredColorEvenRowBg));
                 return  isset($getColorEvenRowBg[0]) ? trim($getColorEvenRowBg[0], '"') : "#007f33";
             }
             if ($color === 'evenrowclr') {
                 $getColorEvenRowClr = array_map(function ($key, $value) {
                     if (isset($value["value"])) {
                         return $value["value"];
                     }
                 }, array_keys($filteredColorEvenRowClr), array_values($filteredColorEvenRowClr));

                 return  isset($getColorEvenRowClr[0]) ? trim($getColorEvenRowClr[0], '"') : "#f5f5f5";
             }
             if ($color === 'highlightrowbg') {
                 $getColorHighLightRowBg = array_map(function ($key, $value) {
                     if (isset($value["value"])) {
                         return $value["value"];
                     }
                 }, array_keys($filteredColorHighLightRowBg), array_values($filteredColorHighLightRowBg));

                 return  isset($getColorHighLightRowBg[0]) ? trim($getColorHighLightRowBg[0], '"') : "#b4fc00";
             }
             if ($color === 'highlightrowclr') {
                 $getColorHighLightRowClr = array_map(function ($key, $value) {
                     if (isset($value["value"])) {
                         return $value["value"];
                     }
                 }, array_keys($filteredColorHighLightRowClr), array_values($filteredColorHighLightRowClr));

                 return  isset($getColorHighLightRowClr[0]) ? trim($getColorHighLightRowClr[0], '"') : "#035022";
             }
         }
     }
 }
