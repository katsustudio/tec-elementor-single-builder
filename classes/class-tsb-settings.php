<?php

if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Tec_SB_Settings Class
 *
 * @class Tec_SB_Settings
 * @version	1.0
 * @since 1.0
 * @package	TecEsb
 * @author Jeffikus
 */
final class Tec_SB_Settings
{
    /**
     * Tec_SB_Settings The single instance of Tec_SB_Settings.
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
        add_action('admin_menu', array($this, 'register_settings_screen') , 999);
        add_action('wp_ajax_tec_save_settings', array($this, 'save_options'));
    }

    /**
     * Register the admin screen.
     * @access  public
     * @since   1.0
     * @return  void
     */
    public function register_settings_screen()
    {
        add_submenu_page('tec-intro', __('Settings', 'tec-elementor-single-builder'), __('Settings', 'tec-elementor-single-builder'), 'manage_options', 'tec-settings', array($this, 'display_settings'));
    }

    /**
     * Main Tec_SB_Settings Instance
     *
     * Ensures only one instance of Tec_SB_Settings is loaded or can be loaded.
     *
     * @since 1.0
     * @static
     * @return Main Tec_SB_Settings instance
     */
    public static function instance()
    {
        if (is_null(self::$_instance))
            self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * display settings
     * @access  public
     * @since   1.0
     * @return  void
     */
    public function display_settings()
    {
        require_once( TecEsb()->plugin_path . '/pages/settings.php' );
    }

    /**
     * save settings
     * @access  public
     * @since   1.0
     * @return  void
     */
    public function save_options()
    {
        // Check nonce is set.
        if(!isset($_POST['tec_settings_nonce'])) return;

        // Verify valid nonce.
        if(!wp_verify_nonce(sanitize_text_field($_POST['tec_settings_nonce']), 'tec_settings_data')) return;

        $tec = isset( $_POST['tec'] ) ? array_map( 'sanitize_key', (array) $_POST['tec'] ) : array();
        update_option('tec_esb_options', $tec);
        json_encode(array('message' => 'saved!'));

    }
}