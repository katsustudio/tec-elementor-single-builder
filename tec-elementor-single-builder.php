<?php
/**
 * Plugin Name:       TEC Elementor Single Builder
 * Plugin URI:        https://katsustudio.net/wordpress-plugins
 * Description:       Create single event page with Elementor for The Events Calendar plguin
 * Version:           1.0
 * Author:            katsu Studio
 * Author URI:        https://katsustudio.net
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tec-elementor-single-builder
 * Domain Path:       /languages
 */


if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Plugin;
use Elementor\Post_CSS_File;
use Elementor\Core\Files\CSS\Post;

/**
 * Returns the main instance of TecEsb to prevent the need to use globals.
 *
 * @since  1.0
 * @return object TecEsb
 */
function TecEsb() {
    return TecEsb::instance();
}

add_action( 'plugins_loaded', 'TecEsb' );
/**
 * Main TecEsb Class
 *
 * @class TecEsb
 * @version	1.0
 * @since 1.0
 * @package	TecEsb
 * @author Nate
 */

final class TecEsb {
    /**
     * TecEsb The single instance of TecEsb.
     * @var 	object
     * @access  private
     * @since 	1.0
     */
    private static $_instance = null;
    /**
     * The token.
     * @var     string
     * @access  public
     * @since   1.0
     */
    public $token;
    /**
     * The version number.
     * @var     string
     * @access  public
     * @since   1.0
     */
    public $version;
    /**
     * The plugin directory URL.
     * @var     string
     * @access  public
     * @since   1.0
     */
    public $plugin_url;
    /**
     * The plugin directory path.
     * @var     string
     * @access  public
     * @since   1.0
     */
    public $plugin_path;

    /**
     * The admin object.
     * @var     object
     * @access  public
     * @since   1.0
     */
    public $admin;
    /**
     * The settings object.
     * @var     object
     * @access  public
     * @since   1.0
     */
    public $settings;

    /**
     * The post types we're registering.
     * @var     array
     * @access  public
     * @since   1.0
     */
    public $post_types = array();

    /**
     * The plugin routes.
     * @var     string
     * @access  public
     * @since   1.0
     */
    public $routes;

    /**
     * The plugin Text Domain.
     * @var     string
     * @access  public
     * @since   1.0
     */
    public $text_domain;

    /**
     * The plugin tec settings.
     * @var     string
     * @access  public
     * @since   1.0
     */
    public $tec_settings;

    /**
     * The plugin tec settings.
     * @var     string
     * @access  public
     * @since   1.0
     */
    public $assets;

    /**
     * Constructor function.
     * @access  public
     * @since   1.0
     */
    public function __construct () {
        define('TECSINGLE', 1);
        $this->token 			= 'TECESB';
        $this->plugin_url 		= plugin_dir_url( __FILE__ );
        $this->plugin_path 		= plugin_dir_path( __FILE__ );
        $this->version 			= '1.0';
        $this->tec_settings     = get_option('tec_esb_options');
        $this->assets           = $this->plugin_url . 'assets';

        require_once( 'classes/class-tsb-settings.php' );
        $this->settings = Tec_SB_Settings::instance();

        require_once( 'classes/class-tsb-admin.php' );
        $this->admin = Tec_SB_Admin::instance();

		require_once( 'classes/class-tsb-post-type.php' );
        $this->post_types['tec'] = new Tec_SB_Post_Type( 'tec_single_builder', __( 'TEC Single Builder', 'tec-sb' ), __( 'TEC Single Builder', 'tec-sb' ), array( 'menu_icon' => 'dashicons-carrot' ) );


        register_activation_hook( __FILE__, array( $this, 'install' ) );
        add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
        add_action( 'init', array( $this, 'load_tec_plugin_scripts' ) );
		add_filter('tribe_events_template_paths', array( $this, 'tec_esb_custom_template' ) , 1);
		add_action( 'elementor/elements/categories_registered', array( $this, 'tec_add_elementor_widget_categories' ) );
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'init_widgets' ) );
		add_action( 'tec_esb_content', array( $this,'tec_load_builder'), 10 , 1 );
		add_action( 'init', array( $this,'tec_add_cpt_support') );
        add_action( 'wp_enqueue_scripts', array( $this,'tec_frontend_style') );
        add_action( 'admin_enqueue_scripts', array( $this,'tec_admin_style') );
        add_action( 'admin_enqueue_scripts', array( $this,'tec_admin_scripts') );

    }


    /**
     * Main TecEsb Instance
     *
     * Ensures only one instance of TecEsb is loaded or can be loaded.
     *
     * @since 1.0
     * @static
     * @see TecEsb()
     * @return Main TecEsb instance
     */
    public static function instance () {
        if ( is_null( self::$_instance ) )
            self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * Load the localisation file.
     * @access  public
     * @since   1.0
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain( 'tec-elementor-single-builder', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }


    public function load_tec_plugin_scripts() {
        wp_set_script_translations( 'tec-single-builder-script', 'tec-elementor-single-builder' );
        wp_localize_script('tec-esb-js','tec_esb_ajax_data', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));
    }

    public function tec_frontend_style() {
        wp_enqueue_style( 'tec-frontend-style', plugin_dir_url(__FILE__) . 'assets/frontend.css' );
    }

    public function tec_admin_style() {
        wp_enqueue_style( 'tec-admin-style', plugin_dir_url(__FILE__) . 'assets/admin.css' );
        wp_enqueue_style( 'tec-niceselect-style', plugin_dir_url(__FILE__) . 'assets/niceselect.css' );
    }
    
    public function tec_admin_scripts() {
        wp_enqueue_script( 'tec-niceselect-script', plugin_dir_url(__FILE__) . 'assets/niceselect.js',array('jquery-core'),false, true );
        wp_enqueue_script( 'tec-admin-script', plugin_dir_url(__FILE__) . 'assets/admin.js' );
    }

    /**
     * Cloning is forbidden.
     * @access public
     * @since 1.0
     */
    public function __clone () {
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0' );
    }

    /**
     * Unserializing instances of this class is forbidden.
     * @access public
     * @since 1.0
     */
    public function __wakeup () {
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0' );
    }

    /**
     * Installation. Runs on activation.
     * @access  public
     * @since   1.0
     */
    public function install () {
        $this->_log_version_number();
    }

    /**
     * Log the plugin version number.
     * @access  private
     * @since   1.0
     */
    private function _log_version_number () {
        update_option( $this->token . '-version', $this->version );
    }

	/**
	 * Custom Single Page
	 * @since 1.0
	 * @access public
	 */
	public function tec_esb_custom_template($template_base_paths) {
        $post_id = get_option('tec_esb_options');
        if ( $post_id['builder_id'] == 'none' ) return $template_base_paths;
		$template_base_paths = ( array ) plugin_dir_path( __FILE__ );
		return $template_base_paths;
	}

	/**
	 * Register Elementor Category
	 * @since 1.0
	 * @access public
	 */
	public function tec_add_elementor_widget_categories( $elements_manager ){

		$elements_manager->add_category(
			'tec_single_builder',
			[
				'title' => __( 'TEC Single Builder', 'tec-elementor-single-builder' ),
				'icon' => 'fa fa-plug',
			]
		);

	}

	/**
	 * Init Widgets
	 * Include widgets files and register them
	 * @since 1.0
	 * @access public
	 */
	public function init_widgets() {
        if (!defined('TRIBE_EVENTS_FILE')) return;
		// Include Widget files
		require_once( $this->plugin_path . '/widgets/title.php' );
        require_once( $this->plugin_path . '/widgets/content.php' );
        require_once( $this->plugin_path . '/widgets/featuredImage.php' );
        require_once( $this->plugin_path . '/widgets/notice.php' );
        require_once( $this->plugin_path . '/widgets/time.php' );
        require_once( $this->plugin_path . '/widgets/cost.php' );
        require_once( $this->plugin_path . '/widgets/export-google.php' );
        require_once( $this->plugin_path . '/widgets/export-ical.php' );
        require_once( $this->plugin_path . '/widgets/start-end.php' );
        require_once( $this->plugin_path . '/widgets/organizer.php' );
        require_once( $this->plugin_path . '/widgets/location.php' );
        require_once( $this->plugin_path . '/widgets/tags.php' );
        require_once( $this->plugin_path . '/widgets/categories.php' );
        require_once( $this->plugin_path . '/widgets/next-prev.php' );
        require_once( $this->plugin_path . '/widgets/share.php' );
        require_once( $this->plugin_path . '/widgets/map.php' );
        require_once( $this->plugin_path . '/widgets/related.php' );
        require_once( $this->plugin_path . '/widgets/rsvp.php' );
        require_once( $this->plugin_path . '/widgets/ticket.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Title() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Content() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_FeaturedImage() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Notice() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Time() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Cost() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Export_Google() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Export_iCal() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Start_End() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Organizer() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Location() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Tags() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Categories() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_NextPrev() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Share() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Map() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Related() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_RSVP() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TEC_Ticket() );

	}

	public function tec_load_builder($event){
		global $tecEvent;
		$tecEvent = $event;
		$post_id = sanitize_text_field($this->tec_settings['builder_id']);
        ?>
		<div class="tec-single-builder-wrap"><?php echo  Plugin::instance()->frontend->get_builder_content_for_display($post_id, true); ?></div>
        <style>.tec-single-builder-wrap{width: <?php echo  get_option('elementor_container_width'); ?>px}</style>
        <?php
	}

	public function tec_add_cpt_support() {

		//if exists, assign to $cpt_support var
		$cpt_support = get_option( 'elementor_cpt_support' );

		//check if option DOESN'T exist in db
		if( ! $cpt_support ) {
			$cpt_support = [ 'page', 'post', $this->post_types['tec']->post_type ]; //create array of our default supported post types
			update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
		}

		//if it DOES exist, but portfolio is NOT defined
		else if( ! in_array( $this->post_types['tec']->post_type, $cpt_support ) ) {
			$cpt_support[] = $this->post_types['tec']->post_type; //append to array
			update_option( 'elementor_cpt_support', $cpt_support ); //update database
		}
	}

}