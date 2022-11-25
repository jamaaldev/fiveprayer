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
    --bg-first: <?=esc_attr($colorFirstBg) ?>;
    --clr-first: <?=esc_attr($colorFirstClr) ?>;
    --bg-second: <?=esc_attr($colorSecondBg) ?>;
    --clr-second: <?=esc_attr($colorSecondClr) ?>;
    --bg-even: <?=esc_attr($colorEvenRowBg) ?>;
    --clr-even: <?=esc_attr($colorEvenRowClr) ?>;
    --bg-highlight: <?=esc_attr($colorHighlightRowBg) ?>;
    --clr-highlight: <?=esc_attr($colorHighlightRowClr) ?>;
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
    .wp-block-image,
    p {

        font-size: 0px !important;

    }



    body * {

        font-weight: 400 !important;

        line-height: 1.4 !important;
        max-width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box !important;
        height: 100% !important;

        white-space: nowrap !important;



    }


    body:has(.fiveprayer__printer) {
        white-space: nowrap !important;

        width: 100% !important;
    }

    .fiveprayer__printer * {
        white-space: nowrap !important;
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        font-size: 14px !important;
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

    .fiveprayer__tbhead {
        background: rgb(4 94 20);
        color: aliceblue;
    }

    .fp__highlight {
        background-color: #d2f847;
    }

    .fiveprayer__iqamah_next {
        font-size: 18px;
        color: hsl(131deg 92% 19%);
        font-weight: 700;

    }

    .fiveprayer__iqamah_time {
        font-size: 40px;
        color: hsl(131deg 92% 19%);
        font-weight: 700;
        padding-block: 20px;
    }
    .printer-page-container{
        display: grid !important;
    grid-template-columns: repeat(3,2fr) !important;
    grid-gap: 6px !important;
    align-items: stretch !important;
    margin-bottom: 10px !important;
    justify-content: stretch !important; 

    }
    .printer-page-container span{
        height: 0 !important;
    }
    .left-printer{
        display: grid;
height: 130px !important;

    
    }
    .med-printer{
        display: grid;
   justify-content: center !important;

    }
    .med-printer img{
        width: 160px !important;
        height: 130px !important;
    }
    .right-printer{
        display: grid;
        height: 130px !important;
    }
}

@media screen {
    .printer-page-container{
        display: grid;
    grid-template-columns: repeat(3,2fr);
    grid-gap: 0px;
    align-items: stretch ;
   

justify-content: stretch ; 

    }

    .printer-page-container span{
        height: 0;
    }
    .left-printer{
        display: grid;
background:red;
height: 130px 

    }
   
    .med-printer{
        display: grid;
   background:blue;
   justify-content: center ;

    }
    .med-printer img{
        width: 160px;
    height: 130px;
    }
    .right-printer{
        display: grid;
        background:green;
        height: 130px 
    }
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
        background-color: var(--bg-first) !important;
        color: var(--clr-first) !important;
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

    button {
        border: none;
        border-radius: 0px;
        padding-inline: 10px;
        padding-block: 8px;


        cursor: pointer;
    }

    .show-highlight {
        background: #079713e3;
        color: white
    }

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

    .fiveprayer__tbhead {
        background: rgb(4 94 20);
        color: aliceblue;
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
