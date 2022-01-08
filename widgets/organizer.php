<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;


class TEC_Organizer extends \Elementor\Widget_Base
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

		return 'event_organizer';

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

		return __( 'Event Organizer', 'tec-elementor-single-builder' );

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

		return 'eicon-lock-user';

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
		'org_details',
			array(
				'label' 	=> __( 'Organizer Details', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'org_name',
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
			'org_name_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-user',
					'library' => 'solid',
				],
                'condition' => [
					'org_name' => 'yes',
				],
			]
		);

		$this->add_control(
			'org_name_title',
			[
				'label' => __( 'Name Label', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Name', 'tec-elementor-single-builder' ),
				'condition' => [
					'org_name' => 'yes',
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
			'org_phone',
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
			'org_phone_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-phone-volume',
					'library' => 'solid',
				],
                'condition' => [
					'org_phone' => 'yes',
				],
			]
		);

		$this->add_control(
			'org_phone_title',
			[
				'label' => __( 'Phone Label', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Phone', 'tec-elementor-single-builder' ),
				'condition' => [
					'org_phone' => 'yes',
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
			'org_email',
			[
				'label' => __( 'Email', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'org_email_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-envelope',
					'library' => 'solid',
				],
                'condition' => [
					'org_email' => 'yes',
				],
			]
		);

		$this->add_control(
			'org_email_title',
			[
				'label' => __( 'Email Label', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Email', 'tec-elementor-single-builder' ),
				'condition' => [
					'org_email' => 'yes',
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
			'org_website',
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
			'org_website_icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-rss',
					'library' => 'solid',
				],
                'condition' => [
					'org_website' => 'yes',
				],
			]
		);

		$this->add_control(
			'org_website_title',
			[
				'label' => __( 'Website Label', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Website', 'tec-elementor-single-builder' ),
				'condition' => [
					'org_website' => 'yes',
				],
			]
		);

		$this->add_control(
			'org_website_link_title',
			[
				'label' => __( 'Link Label', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Visit Website', 'tec-elementor-single-builder' ),
				'condition' => [
					'org_website' => 'yes',
				],
			]
		);

		$this->add_control(
			'org_website_link_icon',
			[
				'label' => __( 'Link Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'solid',
				],
                'condition' => [
					'org_website' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
		'tec_name_style',
			array(
				'label' 	=> __( 'Name', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_name_title_typography',
				'label' 	=> __( 'Label Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-organizer-name .tec-event-organizer-name-title',
			]
		);

		$this->add_control(
			'tec_name_title_color',
			[
				'label' 		=> __( 'Label Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-name .tec-event-organizer-name-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_name_title_padding', //param_name
			[
				'label' 		=> __( 'Label Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-name .tec-event-organizer-name-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_name_title_margin', //param_name
			[
				'label' 		=> __( 'Label Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-name .tec-event-organizer-name-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'tec_name_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-name i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tec-event-organizer-name i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-event-organizer-name i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr5',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_name_text_typography',
				'label' 	=> __( 'Text Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-organizer-name .tec-event-organizer-name-text',
			]
		);

		$this->add_control(
			'tec_name_text_color',
			[
				'label' 		=> __( 'Text Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-name .tec-event-organizer-name-text' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tec-event-organizer-name .tec-event-organizer-name-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-event-organizer-name .tec-event-organizer-name-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
		'tec_phone_style',
			array(
				'label' 	=> __( 'Phone', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_phone_title_typography',
				'label' 	=> __( 'Label Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-organizer-phone .tec-event-organizer-phone-title',
			]
		);

		$this->add_control(
			'tec_phone_title_color',
			[
				'label' 		=> __( 'Label Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-phone .tec-event-organizer-phone-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_phone_title_padding', //param_phone
			[
				'label' 		=> __( 'Label Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-phone .tec-event-organizer-phone-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_phone_title_margin', //param_phone
			[
				'label' 		=> __( 'Label Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-phone .tec-event-organizer-phone-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr6',
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
					'{{WRAPPER}} .tec-event-organizer-phone i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tec-event-organizer-phone i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-event-organizer-phone i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr7',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_phone_text_typography',
				'label' 	=> __( 'Text Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-organizer-phone .tec-event-organizer-phone-text',
			]
		);

		$this->add_control(
			'tec_phone_text_color',
			[
				'label' 		=> __( 'Text Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-phone .tec-event-organizer-phone-text' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tec-event-organizer-phone .tec-event-organizer-phone-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-event-organizer-phone .tec-event-organizer-phone-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'tec_email_style',
			array(
				'label' 	=> __( 'Email', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_email_title_typography',
				'label' 	=> __( 'Label Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-organizer-email .tec-event-organizer-email-title',
			]
		);

		$this->add_control(
			'tec_email_title_color',
			[
				'label' 		=> __( 'Label Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email .tec-event-organizer-email-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_email_title_padding', //param_email
			[
				'label' 		=> __( 'Label Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email .tec-event-organizer-email-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_email_title_margin', //param_email
			[
				'label' 		=> __( 'Label Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email .tec-event-organizer-email-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr8',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'tec_email_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_email_icon_padding', //param_email
			[
				'label' 		=> __( 'Icon Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_email_icon_margin', //param_email
			[
				'label' 		=> __( 'Icon Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr9',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tec_email_text_typography',
				'label' 	=> __( 'Text Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-organizer-email .tec-event-organizer-email-text',
			]
		);

		$this->add_control(
			'tec_email_text_color',
			[
				'label' 		=> __( 'Text Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email .tec-event-organizer-email-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_email_text_padding', //param_email
			[
				'label' 		=> __( 'Text Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email .tec-event-organizer-email-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_email_text_margin', //param_email
			[
				'label' 		=> __( 'Text Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-email .tec-event-organizer-email-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'tec_org_website',
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
				'selector' 	=> '{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-title',
			]
		);

		$this->add_control(
			'tec_website_label_color',
			[
				'label' 		=> __( 'Label Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-title' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'tec_website_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-website > i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tec-event-organizer-website > i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-event-organizer-website > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' 		=> 'tec_website_link_typography',
				'label' 	=> __( 'Link Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link',
			]
		);

		$this->add_control(
			'tec_website_link_color',
			[
				'label' 		=> __( 'Link Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tec_website_link_hover_color',
			[
				'label' 		=> __( 'Link Hover Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link:hover,{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link:hover i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'tec_website_link_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-event-organizer-website .tec-event-organizer-website-link i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


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

		$organizer_ids = tribe_get_organizer_ids($event_id);
		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			}
			if ( 'yes' === $settings['org_name'] ) {
				?>
				<div class="tec-event-organizer-name">
					<?php \Elementor\Icons_Manager::render_icon( $settings['org_name_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					<span class="tec-event-organizer-name-title"><?php echo sanitize_text_field($settings['org_name_title']); ?></span>
					<span class="tec-event-organizer-name-text"><?php echo esc_html(get_the_title($organizer)) ?></span>
				</div>
				<?php
			}
			if ( 'yes' === $settings['org_phone'] ) {
				?>
				<div class="tec-event-organizer-phone">
					<?php \Elementor\Icons_Manager::render_icon( $settings['org_phone_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					<span class="tec-event-organizer-phone-title"><?php echo sanitize_text_field($settings['org_phone_title']); ?></span>
					<span class="tec-event-organizer-phone-text"><?php echo esc_html( tribe_get_event_meta( tribe_get_organizer_id( $organizer ), '_OrganizerPhone', true ) ) ?></span>
				</div>
				<?php
			}
			if ( 'yes' === $settings['org_email'] ) {
				?>
				<div class="tec-event-organizer-email">
					<?php \Elementor\Icons_Manager::render_icon( $settings['org_email_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					<span class="tec-event-organizer-email-title"><?php echo sanitize_text_field($settings['org_email_title']); ?></span>
					<span class="tec-event-organizer-email-text"><?php echo esc_html( tribe_get_event_meta( tribe_get_organizer_id( $organizer ), '_OrganizerEmail', true ) ) ?></span>
				</div>
				<?php
			}
			if ( 'yes' === $settings['org_website'] ) {
				?>
				<div class="tec-event-organizer-website">
					<?php \Elementor\Icons_Manager::render_icon( $settings['org_website_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					<span class="tec-event-organizer-website-title"><?php echo sanitize_text_field($settings['org_website_title']); ?></span>
					<a style="display:inline-block" class="tec-event-organizer-website-link" target="_blank" href="<?php echo esc_html( tribe_get_event_meta( tribe_get_organizer_id( $organizer ), '_OrganizerWebsite', true ) ) ?>"><span><?php echo esc_html__($settings['org_website_link_title']) ?></span>
					<?php \Elementor\Icons_Manager::render_icon( $settings['org_website_link_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</a>
				</div>
				<?php
			}
		}
	}
}

