<?php
/**
 * Plugins class.
 *
 * @since 1.0.0
 *
 * @package Plugin_Survey_Stopper
 * @author  David Bisset
 */
namespace Plugin_Survey_Stopper\Admin;

class Plugins {

    /**
     * Primary class constructor.
     *
     * @since 1.0.0
     */
    public function __construct() {

        add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );

    }

    /**
     * Enqueues the needed scripts and styles
     *
     * @since 1.0.0
    */
    public function scripts() {

        /* only load these scripts on the plugin page */

        $current_screen = get_current_screen();

        if ( $current_screen->id != 'plugins' ) {
            return;
        }

        wp_enqueue_style( PLUGIN_SURVEY_STOPPER_SLUG . '-style', plugins_url( 'assets/css/ps-stopper.css', PLUGIN_SURVEY_STOPPER_FILE ), array(), PLUGIN_SURVEY_STOPPER_VERSION );

        wp_enqueue_script( PLUGIN_SURVEY_STOPPER_SLUG . '-plugins', plugins_url( 'assets/js/plugin-page.js', PLUGIN_SURVEY_STOPPER_FILE ), array( 'jquery' ), PLUGIN_SURVEY_STOPPER_VERSION, true );
        
    }
    
}