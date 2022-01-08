<?php

if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Tec_SB_Admin Class
 *
 * @class Tec_SB_Admin
 * @version	1.0
 * @since 1.0
 * @package	TecEsb
 * @author Jeffikus
 */
final class Tec_SB_Admin
{
    /**
     * Tec_SB_Admin The single instance of Tec_SB_Admin.
     * @var    object
     * @access  private
     * @since    1.0
     */
    private static $_instance = null;
    /**
     * The string containing the dynamically generated hook token.
     * @var     string
     * @access  private
     * @since   1.0
     */
    private $_hook;

    /**
     * Constructor function.
     * @access  public
     * @since   1.0
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'register_settings_screen') , 99);
        add_action( 'elementor/editor/after_enqueue_styles', function() {
            wp_enqueue_style( 'tec-elementor-style', TecEsb()->assets . '/elementor.css' );
        });

    }


    /**
     * Main Tec_SB_Admin Instance
     *
     * Ensures only one instance of Tec_SB_Admin is loaded or can be loaded.
     *
     * @since 1.0
     * @static
     * @return Main Tec_SB_Admin instance
     */
    public static function instance()
    {
        if (is_null(self::$_instance))
            self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * Register the admin screen.
     * @access  public
     * @since   1.0
     * @return  void
     */
    public function register_settings_screen()
    {
        global $submenu;
        unset($submenu['tec-intro'][0]);

        add_menu_page(__('TEC Single Builder', 'tec-elementor-single-builder'), __('TEC Single Builder', 'tec-elementor-single-builder'), 'edit_posts', 'tec-intro', array($this, 'tec_dashboard'), 'none' , 24);
        add_submenu_page('tec-intro', __('Dashboard', 'tec-elementor-single-builder'), __('Dashboard', 'tec-elementor-single-builder'), 'manage_options', 'tec-dashboard', array($this, 'tec_dashboard'));
        add_submenu_page('tec-intro', __('All Builders', 'tec-elementor-single-builder'), __('All Builders', 'tec-elementor-single-builder'), 'edit_posts', 'edit.php?post_type='.TecEsb()->post_types['tec']->post_type);
        add_submenu_page('tec-intro', __('Add New', 'tec-elementor-single-builder'), __('Add New', 'tec-elementor-single-builder'), 'edit_posts', 'post-new.php?post_type='.TecEsb()->post_types['tec']->post_type);
    }

    public function tec_dashboard(){
        require_once( TecEsb()->plugin_path . '/pages/dashboard.php' );
    }


    /**
     * Get js files from assets array.
     *
     * @param array $file_string
     *
     * @return bool
     */
    public function tec_filter_js_files ($file_string){
        return pathinfo($file_string, PATHINFO_EXTENSION) === 'js';
    }

    /**
     * Get css files from assets array.
     *
     * @param array $file_string
     *
     * @return bool
     */
    public function tec_filter_css_files ($file_string) {
        return pathinfo( $file_string, PATHINFO_EXTENSION ) === 'css';
    }

}