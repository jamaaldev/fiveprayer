<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

 if (!class_exists('FivePrayer_MonthStyleDynamic')) {
     require_once(plugin_dir_path(__FILE__) . '../module/StyleDynamicDB.php');

     class FivePrayer_MonthStyleDynamic
     {
         public function monthStyleDynamic()
         {
             $monthstyle = new FivePrayer_StyleDynamicDB();

             $colorFirstBg = $monthstyle->StyleDynamic('firstbg');
             $colorFirstClr = $monthstyle->StyleDynamic('firstclr');
             $colorSecondBg = $monthstyle->StyleDynamic('secondbg');
             $colorSecondClr = $monthstyle->StyleDynamic('secondclr');
             $colorEvenRowBg = $monthstyle->StyleDynamic('evenrowbg');
             $colorEvenRowClr = $monthstyle->StyleDynamic('evenrowclr');
             $colorHighlightRowBg = $monthstyle->StyleDynamic('highlightrowbg');
             $colorHighlightRowClr = $monthstyle->StyleDynamic('highlightrowclr');
             wp_add_inline_script('fiveprayer-script', 'const FivePrayerStyleMonth = ' . json_encode(array(
                'ajaxUrl' => admin_url('admin-ajax.php'),

                'firstbg' =>  sanitize_title($colorFirstBg),
                'firstclr' => sanitize_title($colorFirstClr),
                'secondbg' =>  sanitize_title($colorSecondBg),
                'secondclr' => sanitize_title($colorSecondClr),
                'evenrowbg' => sanitize_title($colorEvenRowBg),
                'evenrowclr' => sanitize_title($colorEvenRowClr),
                'highlightrowbg' => sanitize_title($colorHighlightRowBg),
                'highlightrowclr' => sanitize_title($colorHighlightRowClr)


            )), 'before');


             ?>
<!-- Start Inline CSS Style -->
<style>
:root {
    --bg-first: <?=$colorFirstBg ?>;
    --clr-first: <?=$colorFirstClr ?>;
    --bg-second: <?=$colorSecondBg ?>;
    --clr-second: <?=$colorSecondClr ?>;
    --bg-even: <?=$colorEvenRowBg ?>;
    --clr-even: <?=$colorEvenRowClr ?>;
    --bg-highlight: <?=$colorHighlightRowBg ?>;
    --clr-highlight: <?=$colorHighlightRowClr ?>;
}

@media print {

    header,
    footer,
    .nv-big-title {
        display: none !important;
    }

    @page {
        size: auto !important;
        margin: 5mm 5mm 5mm 5mm !important;
    }



    #fiveprayer__noPrint,
    .wp-block-post-title,
    .wp-container-6,
    .fiveprayer__printer_option select,
    .wp-block-image,
    aside,
    .widget-area.sidebar-primary {
        display: none;

    }

    .entry-content,
    .entry-content h1,
    .entry-content h2,
    .entry-content h3,
    .entry-content h4,
    .entry-content h5,
    .entry-content h6,
    .wp-block-image,p {

        font-size: 0px !important;

    }



    body * {

        font-weight: 400 !important;
        
        line-height: 1.4 !important;
        max-width: fit-content !important;
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box !important;
        height: fit-content !important;

        white-space: nowrap !important;



    }

    body:has(.fiveprayer__printer) {
        width: fit-content !important;
    }

    .fiveprayer__printer * {
        white-space: nowrap !important;
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        font-size: 13px !important;
    }

    .fiveprayer__noDisplay {
        display: block;
        border: #6b0606 solid 5px !important;
        margin-bottom: 10px !important;
    }

    .fiveprayer__printer {
        width: 100% !important;
    }

    #fiveprayer__divTo {
        max-width: inherit;
    }

    #fiveprayer__divToPrint {
        width: 100% !important;
        border-collapse: collapse !important;

    }

    .fiveprayer__printer th,
    .fiveprayer__printer td {

        padding: 0 !important;
        padding-inline: 7px !important;
        padding-block: 3px !important;
        border-width: 0 1px 1px 0 !important;
        border: 1px solid #00000024 !important;
        text-align: center !important;
    }

    .fiveprayer__tbhead {
        width: 100% !important;
       
    }


    .fiveprayer__tbmonthfirst {
        background-color: var(--bg-first) !important;
        color: var(--clr-first) !important;
    }

    #fiveprayer__tbmonthsecond {
        background-color: var(--bg-second) !important;
        color: var(--clr-second) !important;
    }


    .fiveprayer__printer tr:nth-child(even) {
        background-color: var(--bg-even) !important;
        color: var(--clr-even) !important;
    }



}

@media screen {


    .fiveprayer__noDisplay {
        display: none;

    }

    #fiveprayer__divTo {
        border-collapse: collapse;
        max-width: inherit;
    }

    #fiveprayer__divToPrint {
        width: 100%;
        border-collapse: collapse;
    }

    .fiveprayer__printer_option {
        display: flex;
        justify-content: space-between;
    }

    .fiveprayer__printer_option select {
        padding: 9px;
    }

    .fiveprayer__clickPrint {
        padding: 9px;
        background: azure;
        cursor: pointer;
    }

    .fiveprayer__printer_option form {
        display: contents;
    }


    #fiveprayer__noPrint>th {
        border: none;
    }

    .fiveprayer__printer thead {
        vertical-align: 0;
    }


    .fiveprayer__printer th,
    .fiveprayer__printer td {

        padding: 0;
        padding-inline: 3px;
        padding-block: 3px;
        border-width: 0 1px 1px 0;
        border: 1px solid #00000024;
        text-align: center;
    }

    .fiveprayer__tbhead {
        width: 100%;
        background: rgb(4 94 20);
        color: aliceblue;
    }

    #today-row {
        background-color: var(--bg-highlight);
        color: var(--clr-highlight);
    }

    .fiveprayer__tbmonthfirst {
        background-color: var(--bg-first);
        color: var(--clr-first);
    }

    #fiveprayer__tbmonthsecond {
        background-color: var(--bg-second);
        color: var(--clr-second);
    }


    .fiveprayer__printer tr:nth-child(even) {
        background-color: var(--bg-even);
        color: var(--clr-even);
    }

    .fiveprayer__select_print {
        display: flex;
        padding: 0;
        margin: 0;
    }

    .fiveprayer__select_print form {
        margin-bottom: 0;
    }

    .fiveprayer__select_print select,
    #fiveprayer__clickPrint {
        border: none;
        height: 100%;
    }

    .fiveprayer__select_print select {
        border: none;
        align-self: center;


    }

    .fiveprayer__select_print .fiveprayer__clickPrint {
        border: none;


    }
    button{
      border: none;
    border-radius: 0px;
    padding-inline: 10px;
    padding-block: 8px;
   

    cursor: pointer;
    }
    .show-highlight{
        background: #079713e3 ;
        color: white
        
    }
   

}
</style>
<!-- End Inline CSS Style -->
<?php

         }
     }
 }
