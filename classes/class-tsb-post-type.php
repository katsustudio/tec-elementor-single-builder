<?php

if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Modern Form Builder Post Type Class
 *
 * All functionality pertaining to post types in Modern Form Builder.
 *
 * @package WordPress
 * @subpackage TecEsb
 * @category Plugin
 * @author Nate
 * @since 1.0
 */
class Tec_SB_Post_Type
{
    /**
     * The post type token.
     * @access public
     * @since  1.0
     * @var    string
     */
    public $post_type;
    /**
     * The post type singular label.
     * @access public
     * @since  1.0
     * @var    string
     */
    public $singular;
    /**
     * The post type plural label.
     * @access public
     * @since  1.0
     * @var    string
     */
    public $plural;
    /**
     * The post type args.
     * @access public
     * @since  1.0
     * @var    array
     */
    public $args;
    /**
     * The taxonomies for this post type.
     * @access public
     * @since  1.0
     * @var    array
     */
    public $taxonomies;

    /**
     * Constructor function.
     * @access public
     * @since 1.0
     */
    public function __construct($post_type = 'tec_single_builder', $singular = '', $plural = '', $args = array(), $taxonomies = array())
    {
        $this->post_type = $post_type;
        $this->singular = $singular;
        $this->plural = $plural;
        $this->args = $args;
        $this->taxonomies = $taxonomies;
        add_action('init', array($this, 'register_post_type'));
    }

    /**
     * Register the post type.
     * @access public
     * @return void
     */
    public function register_post_type()
    {
        $labels = array(
            'name' => sprintf(_x('%s', 'post type general name', 'tec-elementor-single-builder'), $this->plural),
            'singular_name' => sprintf(_x('%s', 'post type singular name', 'tec-elementor-single-builder'), $this->singular),
            'add_new' => _x('Add New', $this->post_type, 'tec-elementor-single-builder'),
            'add_new_item' => sprintf(__('Add New %s', 'tec-elementor-single-builder'), $this->singular),
            'edit_item' => sprintf(__('Edit %s', 'tec-elementor-single-builder'), $this->singular),
            'new_item' => sprintf(__('New %s', 'tec-elementor-single-builder'), $this->singular),
            'all_items' => sprintf(__('All %s', 'tec-elementor-single-builder'), $this->plural),
            'view_item' => sprintf(__('View %s', 'tec-elementor-single-builder'), $this->singular),
            'search_items' => sprintf(__('Search %s', 'tec-elementor-single-builder'), $this->plural),
            'not_found' => sprintf(__('No %s Found', 'tec-elementor-single-builder'), $this->plural),
            'not_found_in_trash' => sprintf(__('No %s Found In Trash', 'tec-elementor-single-builder'), $this->plural),
            'parent_item_colon' => '',
            'menu_name' => $this->plural,
        );
        $single_slug = apply_filters('tec_single_slug', _x(sanitize_title_with_dashes($this->singular), 'single post url slug', 'tec-elementor-single-builder'));
        $archive_slug = apply_filters('tec_archive_slug', _x(sanitize_title_with_dashes($this->plural), 'post archive url slug', 'tec-elementor-single-builder'));
        $defaults = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => 'tec-intro',
            'query_var' => true,
            'rewrite' => array('slug' => $single_slug),
            'capability_type' => 'post',
            'has_archive' => $archive_slug,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-smiley',
        );
        $args = wp_parse_args($this->args, $defaults);
        register_post_type($this->post_type, $args);
    }

    /**
     * Run on activation.
     * @access public
     * @since 1.0
     */
    public function activation()
    {
        $this->flush_rewrite_rules();
    }

    /**
     * Flush the rewrite rules
     * @access public
     * @since 1.0
     */
    private function flush_rewrite_rules()
    {
        $this->register_post_type();
        flush_rewrite_rules();
    } 

}