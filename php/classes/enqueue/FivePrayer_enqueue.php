<?php
defined('ABSPATH') or exit('May Allah Guide You To The Right Path, Ameen.');

class FivePrayer_enqueue{
    function __construct(){
        add_action( 'admin_enqueue_scripts', array($this,'fiveprayer_admin_enqueue_scripts'));
        // add_action( 'wp_enqueue_scripts', array($this,'register_wprs'),99 );


    }

    function register_wprs(){
        wp_enqueue_style( 'fiveprayer-style', plugin_dir_url( __FILE__ ) . '../../../build/index.css' ); // plugin_dir_url marka rabto inaad usheegto mesha fileka ku yaalo,sida css iyo js

    }

    /**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function fiveprayer_admin_enqueue_scripts() {
   
   
    // $valid_pages = array("etc","etc","etc");
		$valid_pages = array("fiveprayer");
        $page = (isset($_GET['page'])) ? $_GET['page'] : 0;
        if($page === 'fiveprayer'){
            
        wp_enqueue_style( 'fiveprayer-style', plugin_dir_url( __FILE__ ) . '../../../build/index.css' ); // plugin_dir_url marka rabto inaad usheegto mesha fileka ku yaalo,sida css iyo js
        wp_enqueue_script( 'fiveprayer-script', plugin_dir_url( __FILE__ ) . '../../../build/index.js', array( 'wp-element' ), '1.0.0', true );
        wp_localize_script( 'fiveprayer-script', 'prayerData', array(
            
            'nonce' => wp_create_nonce( 'wp_rest' )
        ) );
        // removes annoying ads in my plugin page
        add_action('admin_notices',function() {
                    remove_all_actions( 'admin_notices' );
            },
            0
        );
        } 
     
}


}