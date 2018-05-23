<?php
/**
 * Plugin Name: 	Plugin Survey Stopper
 * Plugin URI:  	http://davidbisset.com
 * Description: 	Stop annoying plugin surveys and popups when you deactivate plugins.
 * Author:      	David Bisset
 * Author URI:  	http://davidbisset.com
 * Version:     	1.0.0
 * Text Domain: 	plugin-survey-stopper
 * Domain Path: 	languages
 *
 * Plugin Survey Stopper is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Plugin Survey Stopper is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Envira Gallery. If not, see <http://www.gnu.org/licenses/>.
 *
 * @category            Plugin
 * @copyright           Copyright © 2018 David Bisset
 * @author              David Bisset
 * @package             PluginSurveyStopper
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !class_exists( 'Plugin_Survey_Stopper' ) ) :
    /**
     * Main plugin class.
     *
     * @since 1.0.0
     *
     * @package Plugin_Survey_Stopper
     * @author  David Bisset
     */
    class Plugin_Survey_Stopper {

        /**
         * Holds the class object.
         *
         * @since 1.0.0
         *
         * @var object
         */
        public static $instance;

        /**
         * Plugin version, used for cache-busting of style and script file references.
         *
         * @since 1.0.0
         *
         * @var string
         */
        public $version = '1.0.0';

        /**
         * The name of the plugin.
         *
         * @since 1.0.0
         *
         * @var string
         */
        public $plugin_name = 'Plugin Survey Stopper';

        /**
         * Unique plugin slug identifier.
         *
         * @since 1.0.0
         *
         * @var string
         */
        public $plugin_slug = 'plugin-survey-stoppers';

        /**
         * Plugin file.
         *
         * @since 1.0.0
         *
         * @var string
         */
        public $file = __FILE__;

        /**
         * Primary class constructor.
         *
         * @since 1.0.0
         */
        public function __construct() {

            // Load the plugin textdomain.
            add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

            // Load the plugin.
            add_action( 'init', array( $this, 'init' ), 99 );

        }

        /**
         * setup_constants function.
         *
         * @since 1.0.0
         *
         * @access public
         * @return void
         */
        public function setup_constants() {

            if ( ! defined( 'PLUGIN_SURVEY_STOPPER_VERSION' ) ){

                define( 'PLUGIN_SURVEY_STOPPER_VERSION', $this->version );

            }

            if ( ! defined( 'PLUGIN_SURVEY_STOPPER_SLUG' ) ){

                define( 'PLUGIN_SURVEY_STOPPER_SLUG', $this->plugin_slug );

            }

            if ( ! defined( 'PLUGIN_SURVEY_STOPPER_FILE' ) ){

                define( 'PLUGIN_SURVEY_STOPPER_FILE', $this->file );

            }

            if ( ! defined( 'PLUGIN_SURVEY_STOPPER_DIR' ) ){

                define( 'PLUGIN_SURVEY_STOPPER_DIR', plugin_dir_path( __FILE__ ) );


            }

            if ( ! defined( 'PLUGIN_SURVEY_STOPPER_URL' ) ){

                define( 'PLUGIN_SURVEY_STOPPER_URL', plugin_dir_url( __FILE__ ) );

            }

        }

        /**
         * Loads the plugin textdomain for translation.
         *
         * @since 1.0.0
         */
        public function load_plugin_textdomain() {

            load_plugin_textdomain( $this->plugin_slug, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        }

        /**
         * Loads the plugin into WordPress.
         *
         * @since 1.0.0
         */
        public function init() {

            // Run hook once the plugin has been initialized.
            do_action( 'ps_stopper_videos_init' );

            // Load admin only components.
            if ( is_admin() ) {
                $admin = new \Plugin_Survey_Stopper\Admin\Admin_Container();
            }

            // $frontend = new \Envira\Videos\Frontend\Frontend_Container();

        }

        /**
         * autoload function.
         *
         * @access public
         * @static
         * @param mixed $class
         * @return void
         */
        public static function autoload( $class ){

            // Prepare variables.
            $prefix  = 'Plugin_Survey_Stopper\\';
            $baseDir = __DIR__ . '/src/';
            $length  = mb_strlen( $prefix );

            // If the class is not using the namespace prefix, return.
            if ( 0 !== strncmp( $prefix, $class, $length ) ) {
                return;
            }

            // Prepare classes to be autoloaded.
            $relativeClass = mb_substr( $class, $length );
            $file          = $baseDir . str_replace( '\\', '/', $relativeClass ) . '.php';

            // If the file exists, load it.
            if ( file_exists( $file ) ) {
                require $file;
            }

        }

        /**
         * Returns the singleton instance of the class.
         *
         * @since 1.4.1
         *
         * @return object The Envira_Videos object.
         */
        public static function get_instance() {

            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Plugin_Survey_Stopper ) ) {
                self::$instance = new self();
                self::$instance->setup_constants();
            }

            return self::$instance;

        }

    }

    spl_autoload_register( 'Plugin_Survey_Stopper::autoload' );

    add_action( 'init', 'ps_stopper_init' );

    function ps_stopper_init(){
        return Plugin_Survey_Stopper::get_instance();
    }

endif;