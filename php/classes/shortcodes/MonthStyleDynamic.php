<?php
 defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

 if (!class_exists('FivePrayer_MonthStyleDynamic')) {
     class FivePrayer_MonthStyleDynamic
     {
         public function monthStyleDynamic()
         {
             global $post;
             $colorREd = 'red';

             if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'Fp_TimeTable_Monthly')) {
                 ?>
<!-- Start Inline CSS Style -->
<style>
:root {
    --bg-red: <?=$colorREd;
                 ?>
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
    .fiveprayer__printer_option select {
        display: none;

    }

    .entry-content,.entry-content h1, .entry-content h2,.entry-content h3,.entry-content h4,.entry-content h5,.entry-content h6,.wp-block-image img{
        width: 0;
        height: 0;
        font-size: 0px;

    }
    .fiveprayer__printer{
    font-size: 17px;


}


    body * {

        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
        font-weight: 300 !important;
        line-height: 1.4 !important;
        max-width: none !important;
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
        /* visibility: visible; */
        white-space: nowrap !important;
        width: fit-content !important;
        height: fit-content !important;
        margin: 0 !important;
        padding: 0 !important;

    }

    .fiveprayer__noDisplay {
        display: block;
        border: #6b0606 solid 5px;
        margin-bottom: 10px !important;
    }

    .fiveprayer__printer {
        border-collapse: collapse;
        width: 100% !important;
    }

    .fiveprayer__printer th,
    .fiveprayer__printer td {

        padding: 0 !important;
        padding-inline: 3px !important;
        padding-block: 3px !important;
        border-width: 0 1px 1px 0 !important;
        border: 1px solid rgb(0, 0, 0) !important;
        text-align: center !important;
    }

    .fiveprayer__tbhead {
        width: 100%;
        background: rgb(4 94 20) !important;
        color: aliceblue;
    }


    .fiveprayer__tbmonth {
        background-color: var(--bg-red) !important;
        color: whitesmoke;
    }

    #fiveprayer__tbmonth {
        background-color: #a20000 !important;
        color: rgb(248, 245, 245);
    }


    .fiveprayer__printer tr:nth-child(even) {
        background-color: #3c9a61 !important;
        color: rgb(248, 246, 246) !important;
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
#fiveprayer__divToPrint{
    /* margin: auto; */
    width: 100%;
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

        padding: 0 ;
        padding-inline: 3px ;
        padding-block: 3px ;
        border-width: 0 1px 1px 0 ;
        border: 1px solid rgb(0, 0, 0) ;
        text-align: center ;
    }

    .fiveprayer__tbhead {
        width: 100%;
        background: rgb(4 94 20);
        color: aliceblue;
    }

    #today-row {
        background-color: #d2f847;
        color: #022f31;
    }

    .fiveprayer__tbmonth {
        background-color: var(--bg-red);
        color: whitesmoke;
    }

    #fiveprayer__tbmonth {
        background-color: #a20000;
        color: rgb(248, 245, 245);
    }


    .fiveprayer__printer tr:nth-child(even) {
        background-color: #3c9a61;
        color: rgb(248, 246, 246);
    }

    .fiveprayer__select_print {
        display: flex;
        /* align-items: center; */
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
        /* width: 100%;
height: inherit;
padding: 10px; */

    }

}
</style>
<!-- End Inline CSS Style -->
<?php
             }
         }
     }
 }
