<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;


class TEC_Location extends \Elementor\Widget_Base
{

	/**
	 * Retrieve Alert widget name.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'event_location';

	}

	/**
	 * Retrieve Alert widget title.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return __( 'Event Location', 'tec-elementor-single-builder' );

	}

	/**
	 * Retrieve Alert widget icon.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'eicon-google-maps';

	}

	/**
	 * Set widget category.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @return array Widget category.
	 */
	public function get_categories() {

		return [ 'tec_single_builder' ];

	}

	/**
	 * Register Alert widget controls.
	 *
	 *
	 * @since 1.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
		'loc_details',
			array(
				'label' 	=> __( 'Location Details', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'loc_name',
			[
				'label' => __( 'Name', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'name_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
                'condition' => [
					'loc_name' => 'yes',
				],
			]
		);

		$this->add_control(
			'name_title',
			[
				'label' => __( 'Name Title', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Place Name', 'tec-elementor-single-builder' ),
				'condition' => [
					'loc_name' => 'yes',
				],
			]
		);

		$this->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'loc_website',
			[
				'label' => __( 'Website', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'website_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-rss',
					'library' => 'solid',
				],
                'condition' => [
					'loc_website' => 'yes',
				],
			]
		);

		$this->add_control(
			'website_title',
			[
				'label' => __( 'Website Title', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Website', 'tec-elementor-single-builder' ),
				'condition' => [
					'loc_website' => 'yes',
				],
			]
		);

		$this->add_control(
			'website_link',
			[
				'label' => __( 'Link Title', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Visit Website', 'tec-elementor-single-builder' ),
				'condition' => [
					'loc_website' => 'yes',
				],
			]
		);

		$this->add_control(
			'website_link_icon',
			[
				'label' => __( 'Link Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'solid',
				],
                'condition' => [
					'loc_website' => 'yes',
				],
			]
		);

		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'loc_address',
			[
				'label' => __( 'Address', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'address_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-map-marker-alt',
					'library' => 'solid',
				],
                'condition' => [
					'loc_address' => 'yes',
				],
			]
		);

		$this->add_control(
			'address_title',
			[
				'label' => __( 'Address Title', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Address', 'tec-elementor-single-builder' ),
				'condition' => [
					'loc_address' => 'yes',
				],
			]
		);

		$this->add_control(
			'hr3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'loc_phone',
			[
				'label' => __( 'Phone', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'phone_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-phone-volume',
					'library' => 'solid',
				],
                'condition' => [
					'loc_phone' => 'yes',
				],
			]
		);

		$this->add_control(
			'phone_title',
			[
				'label' => __( 'Phone Title', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Phone', 'tec-elementor-single-builder' ),
				'condition' => [
					'loc_phone' => 'yes',
				],
			]
		);

		$this->add_control(
			'hr4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'loc_map',
			[
				'label' => __( 'Map Button', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'map_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-map-marker-alt',
					'library' => 'solid',
				],
                'condition' => [
					'loc_map' => 'yes',
				],
			]
		);

		$this->add_control(
			'map_title',
			[
				'label' => __( 'Map Button Title', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Find on Google Map', 'tec-elementor-single-builder' ),
				'condition' => [
					'loc_map' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'tec_loc_name',
			array(
				'label' 	=> __( 'Name', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_name_label_typography',
				'label' 	=> __( 'Label Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-name .tec-event-location-name-title',
			]
		);

		$this->add_control(
			'tec_name_label_color',
			[
				'label' 		=> __( 'Label Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name .tec-event-location-name-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_name_label_padding', //param_name
			[
				'label' 		=> __( 'Label Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name .tec-event-location-name-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_name_label_margin', //param_name
			[
				'label' 		=> __( 'Label Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name .tec-event-location-name-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr5',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'tec_name_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_name_icon_padding', //param_name
			[
				'label' 		=> __( 'Icon Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_name_icon_margin', //param_name
			[
				'label' 		=> __( 'Icon Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr6',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_name_text_typography',
				'label' 	=> __( 'Text Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-name .tec-event-location-name-text',
			]
		);

		$this->add_control(
			'tec_name_text_color',
			[
				'label' 		=> __( 'Text Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name .tec-event-location-name-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_name_text_padding', //param_name
			[
				'label' 		=> __( 'Text Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name .tec-event-location-name-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_name_text_margin', //param_name
			[
				'label' 		=> __( 'Text Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-name .tec-event-location-name-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'tec_loc_website',
			array(
				'label' 	=> __( 'Website', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_website_label_typography',
				'label' 	=> __( 'Label Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-website .tec-event-location-website-title',
			]
		);

		$this->add_control(
			'tec_website_label_color',
			[
				'label' 		=> __( 'Label Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_website_label_padding', //param_website
			[
				'label' 		=> __( 'Label Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_website_label_margin', //param_website
			[
				'label' 		=> __( 'Label Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr7',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'tec_website_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website > i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_website_icon_padding', //param_website
			[
				'label' 		=> __( 'Icon Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website > i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_website_icon_margin', //param_name
			[
				'label' 		=> __( 'Icon Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr8',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_website_link_typography',
				'label' 	=> __( 'Link Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a',
			]
		);

		$this->add_control(
			'tec_website_link_color',
			[
				'label' 		=> __( 'Link Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tec_website_link_hover_color',
			[
				'label' 		=> __( 'Link Hover Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a:hover,{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_website_link_padding', //param_website
			[
				'label' 		=> __( 'Link Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_website_link_margin', //param_website
			[
				'label' 		=> __( 'Link Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr9',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'tec_website_link_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_website_link_icon_padding', //param_website
			[
				'label' 		=> __( 'Icon Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_website_link_icon_margin', //param_name
			[
				'label' 		=> __( 'Icon Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-website .tec-event-location-website-link a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
		'tec_loc_address',
			array(
				'label' 	=> __( 'Address', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_address_label_typography',
				'label' 	=> __( 'Label Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-address .tec-event-location-address-title',
			]
		);

		$this->add_control(
			'tec_address_label_color',
			[
				'label' 		=> __( 'Label Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address .tec-event-location-address-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_address_label_padding', //param_address
			[
				'label' 		=> __( 'Label Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address .tec-event-location-address-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_address_label_margin', //param_address
			[
				'label' 		=> __( 'Label Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address .tec-event-location-address-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr10',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'tec_address_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_address_icon_padding', //param_address
			[
				'label' 		=> __( 'Icon Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_address_icon_margin', //param_address
			[
				'label' 		=> __( 'Icon Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr11',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_address_text_typography',
				'label' 	=> __( 'Text Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-address .tec-event-location-address-text',
			]
		);

		$this->add_control(
			'tec_address_text_color',
			[
				'label' 		=> __( 'Text Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address .tec-event-location-address-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_address_text_padding', //param_address
			[
				'label' 		=> __( 'Text Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address .tec-event-location-address-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_address_text_margin', //param_address
			[
				'label' 		=> __( 'Text Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-address .tec-event-location-address-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
		'tec_loc_phone',
			array(
				'label' 	=> __( 'Phone', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_phone_label_typography',
				'label' 	=> __( 'Label Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-phone .tec-event-location-phone-title',
			]
		);

		$this->add_control(
			'tec_phone_label_color',
			[
				'label' 		=> __( 'Label Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone .tec-event-location-phone-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_phone_label_padding', //param_phone
			[
				'label' 		=> __( 'Label Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone .tec-event-location-phone-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_phone_label_margin', //param_phone
			[
				'label' 		=> __( 'Label Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone .tec-event-location-phone-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr12',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'tec_phone_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_phone_icon_padding', //param_phone
			[
				'label' 		=> __( 'Icon Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_phone_icon_margin', //param_phone
			[
				'label' 		=> __( 'Icon Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr13',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_phone_text_typography',
				'label' 	=> __( 'Text Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-phone .tec-event-location-phone-text',
			]
		);

		$this->add_control(
			'tec_phone_text_color',
			[
				'label' 		=> __( 'Text Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone .tec-event-location-phone-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_phone_text_padding', //param_phone
			[
				'label' 		=> __( 'Text Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone .tec-event-location-phone-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_phone_text_margin', //param_phone
			[
				'label' 		=> __( 'Text Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-phone .tec-event-location-phone-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'tec_loc_button',
			array(
				'label' 	=> __( 'Button', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'plugin-name' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_button_text_typo',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-map-button',
			]
		);

		$this->add_control(
			'tec_button_text_color',
			[
				'label' 		=> __( 'Text Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'tec_button_text_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tec-event-location-map-button',
			]
		);

		$this->add_responsive_control(
			'tec_button_text_padding', //param_phone
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_button_text_margin', //param_phone
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'tec_loc_button_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-event-location-map-button',
			]
		);

				$this->add_control(
			'tec_loc_button_border_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'tec_loc_button_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-map-button',
			]
		);

		$this->add_control(
			'tec_loc_button_align',
			[
				'label' => __( 'Alignment', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'tec-elementor-single-builder' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'tec-elementor-single-builder' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'tec-elementor-single-builder' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tec_loc_button_display',
			[
				'label' => __( 'Display', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'block'  => __( 'Block', 'tec-elementor-single-builder' ),
					'inline-block' => __( 'Inline Block', 'tec-elementor-single-builder' ),
					'inline' => __( 'Inline', 'tec-elementor-single-builder' ),
				],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button' => 'display: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tec_loc_button_width',
			[
				'label' => __( 'Width', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .tec-event-location-map-button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => __( 'Hover', 'plugin-name' ),
			]
		);

		$this->add_control(
			'tec_button_text_color_hover',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button:hover' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'tec_button_text_bg_hover',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tec-event-location-map-button',
			]
		);

		$this->add_responsive_control(
			'tec_button_text_padding_hover', //param_phone
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_button_text_margin_hover', //param_phone
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'tec_loc_button_border_hover',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-event-location-map-button:hover',
			]
		);

		$this->add_control(
			'tec_loc_button_border_radius_hover', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'tec_loc_button_shadow_hover',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-event-location-map-button:hover',
			]
		);

		$this->add_control(
			'tec_loc_button_align_hover',
			[
				'label' => __( 'Alignment', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'tec-elementor-single-builder' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'tec-elementor-single-builder' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'tec-elementor-single-builder' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button:hover' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tec_loc_button_display_hover',
			[
				'label' => __( 'Display', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'block'  => __( 'Block', 'tec-elementor-single-builder' ),
					'inline-block' => __( 'Inline Block', 'tec-elementor-single-builder' ),
					'inline' => __( 'Inline', 'tec-elementor-single-builder' ),
				],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-location-map-button:hover' => 'display: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tec_loc_button_width_hover',
			[
				'label' => __( 'Width', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .tec-event-location-map-button:hover' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Render Alert widget output on the frontend.
	 *
	 *
	 * @since 1.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        if ( Plugin::$instance->editor->is_edit_mode() ) {
			$latest_post = get_posts( 'post_type=tribe_events&numberposts=1' );
			$post = setup_postdata($latest_post[0]->ID);
			$main_settings =  TecEsb()->tec_settings;
			$event_id = $main_settings['event_id'] != 'none' ? $main_settings['event_id'] : $latest_post[0]->ID;
        } else {
			if ( !empty($_GET['preview_id']) && isset($_GET['preview_id']) ) {
				$latest_post = get_posts('post_type=tribe_events&numberposts=1');
				$event_id = $latest_post[0]->ID;
			} else {
				$event_id = get_the_ID();
			}
        }

		if ( 'yes' === sanitize_text_field($settings['loc_name']) ) {
			?>
			<div class="tec-event-location-name">
				<?php \Elementor\Icons_Manager::render_icon( $settings['name_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<span class="tec-event-location-name-title"><?php echo sanitize_text_field($settings['name_title']) ?></span>
				<span class="tec-event-location-name-text"><?php echo tribe_get_venue($event_id) ?></span>
			</div>
			<?php
		}

		if ( 'yes' === sanitize_text_field($settings['loc_website']) ) {
			$post_id = tribe_get_venue_id( $event_id );
			$url     = tribe_get_venue_website_url( $post_id );
			if ( ! empty( $url ) ) {
				$parseUrl = parse_url( $url );
				if ( empty( $parseUrl['scheme'] ) ) {
					$url = "http://$url";
				}
			}
			$website_link_target = apply_filters( 'tribe_get_venue_website_link_target', '_self', $url, $post_id );
			$rel                 = ( '_blank' === $website_link_target ) ? 'noopener noreferrer' : 'external';
			$website_link_label =  sanitize_text_field( $settings['website_link'] );
			?>
			<div class="tec-event-location-website">
				<?php \Elementor\Icons_Manager::render_icon( $settings['website_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<span class="tec-event-location-website-title"><?php echo sanitize_text_field($settings['website_title']) ?></span>
				<div style="display:inline-block" class="tec-event-location-website-link"><a href="<?php echo  esc_url( $url );  ?>" target="<?php echo esc_attr( $website_link_target ); ?>" rel="<?php echo esc_attr( $rel ); ?>"><?php echo esc_html( $website_link_label );
				 \Elementor\Icons_Manager::render_icon( $settings['website_link_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</a></div>
			</div>
			<?php
		}

		if ( 'yes' === sanitize_text_field($settings['loc_address']) ) {
			?>
			<div class="tec-event-location-address">
				<?php \Elementor\Icons_Manager::render_icon( $settings['address_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<span class="tec-event-location-address-title"><?php echo sanitize_text_field($settings['address_title']) ?></span>
				<span class="tec-event-location-address-text"><?php echo tribe_get_full_address($event_id,false) ?></span>
			</div>
			<?php
		}

		if ( 'yes' === sanitize_text_field($settings['loc_phone']) ) {
			?>
			<div class="tec-event-location-phone">
				<?php \Elementor\Icons_Manager::render_icon( $settings['phone_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<span class="tec-event-location-phone-title"><?php echo sanitize_text_field($settings['phone_title']) ?></span>
				<span class="tec-event-location-phone-text"><?php echo tribe_get_phone($event_id) ?></span>
			</div>
			<?php
		}

		if ( 'yes' === sanitize_text_field($settings['loc_map']) ) {
			?>
			<div class="tec-event-location-map">
				<?php if ( tribe_show_google_map_link($event_id) ) : 
					$map_link = esc_url( tribe_get_map_link( $event_id ) ); ?>
					<a class="tec-event-location-map-button" href="<?php echo $map_link ?>" title="<?php echo esc_html__( 'Click to view a Google Map', 'the-events-calendar' ) ?>" target="_blank" rel="noreferrer noopener">
					<?php \Elementor\Icons_Manager::render_icon( $settings['map_icon'], [ 'aria-hidden' => 'true' ] );?>
					<span class="tec-event-location-map-title"><?php echo sanitize_text_field($settings['map_title']) ?></span>
					</a>
				<?php endif;?>
			</div>
			<?php
		}
	}
}

