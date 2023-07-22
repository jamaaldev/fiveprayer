<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

if (!class_exists('FivePrayer_DailyStyleDynamic')) {
    require_once(plugin_dir_path(__FILE__) . '../module/StyleDynamicDB.php');

    class FivePrayer_DailyStyleDynamic
    {
        public function dailyStyleDynamic()
        {
            $monthstyle = new FivePrayer_StyleDynamicDB();


            $colorSecondBg = $monthstyle->StyleDynamic('secondbg');
            $colorSecondClr = $monthstyle->StyleDynamic('secondclr');
            $colorHighlightRowBg = $monthstyle->StyleDynamic('highlightrowbg');
            $colorHighlightRowClr = $monthstyle->StyleDynamic('highlightrowclr');



            ?>
<!-- Start Inline CSS Style -->
<style>
:root {

    --bg-second: <?=esc_attr($colorSecondBg) ?>;
    --clr-second: <?=esc_attr($colorSecondClr) ?>;
    --bg-highlight: <?=esc_attr($colorHighlightRowBg) ?>;
    --clr-highlight: <?=esc_attr($colorHighlightRowClr) ?>;
}

@media print {

    .FP_DairyPrayer_ {
        border-collapse: collapse;
        width: 100%;


    }

    .FP_DairyPrayer_ th,
    .FP_DairyPrayer_ td {
        padding: 5px;
        border-width: 0 1px 1px 0;
        border: 1px solid black;

        text-align: center;
    }

    .FP_DairyPrayerf_ th,
    .FP_DairyPrayerf_ td {
        padding: 10px;

    }


    #fiveprayer-tbmonth-second {
        background-color: var(--bg-second);
        color: var(--clr-second);
    }

    #today-row {
        background-color: var(--bg-highlight);
        color: var(--clr-highlight);
    }

    .fiveprayer__iqamah_next {
        font-size: 18px;
        color: var(--bg-second);
        font-weight: 700;

    }

    .fiveprayer__iqamah_time {
        padding: 0px;
        font-size: 40px;
        color: var(--bg-second);
        font-weight: 700;

    }
}

@media screen {




    .FP_DairyPrayer_ {
        border-collapse: collapse;
        width: 100%;


    }

    .FP_DairyPrayer_ th,
    .FP_DairyPrayer_ td {
        padding: 5px;
        border-width: 0 1px 1px 0;
        border: 1px solid black;

        text-align: center;
    }

    .FP_DairyPrayerf_ th,
    .FP_DairyPrayerf_ td {
        padding: 10px;

    }


    #fiveprayer-tbmonth-second {
        background-color: var(--bg-second);
        color: var(--clr-second);
    }

    #today-row {
        background-color: var(--bg-highlight);
        color: var(--clr-highlight);
    }

    .fiveprayer__iqamah_next {
        font-size: 18px;
        color: var(--bg-second);
        font-weight: 700;

    }

    .fiveprayer__iqamah_time {
        padding: 0px;
        font-size: 40px;
        color: var(--bg-second);
        font-weight: 700;

    }

}
</style>
<!-- End Inline CSS Style -->
<?php

        }
    }
}
