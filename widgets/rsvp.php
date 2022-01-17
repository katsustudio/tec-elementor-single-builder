<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;


class TEC_RSVP extends \Elementor\Widget_Base
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

		return 'event_rsvp';

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

		return __( 'Event RSVP', 'tec-elementor-single-builder' );

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

		return 'eicon-purchase-summary';

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
		'box_style',
			array(
				'label' 	=> __( 'Box', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'width',
			[
				'label' => __( 'Width', 'plugin-domain' ),
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
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'box_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper',
			]
		);

		$this->add_control(
			'box_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper',
			]
		);

		$this->add_responsive_control(
			'box_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'box_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper',
			]
		);

		$this->add_control(
			'box_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-wrapper',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
		'title_style',
			array(
				'label' 	=> __( 'Title', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-title' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-title',
			]
		);

		$this->add_responsive_control(
			'title_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'title_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-title',
			]
		);

		$this->add_control(
			'title_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'title_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-title',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
		'buttons_style',
			array(
				'label' 	=> __( 'Buttons', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'buttons_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-common-c-btn',
			]
		);

		$this->add_control(
			'buttons_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-common-c-btn' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'buttons_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-common-c-btn',
			]
		);

		$this->add_responsive_control(
			'buttons_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-common-c-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'buttons_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-common-c-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'buttons_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-common-c-btn',
			]
		);

		$this->add_control(
			'buttons_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-common-c-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'buttons_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-common-c-btn',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
		'attendees_style',
			array(
				'label' 	=> __( 'Attendees', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'attendees_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-attendance span',
			]
		);

		$this->add_control(
			'attendees_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-attendance span' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'attendees_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-attendance span',
			]
		);

		$this->add_responsive_control(
			'attendees_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-attendance span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'attendees_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-attendance span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'attendees_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-attendance span',
			]
		);

		$this->add_control(
			'attendees_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-attendance span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'attendees_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-rsvp-events-wrap .tribe-tickets__rsvp-attendance span',
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
		$class = new Tribe__Tickets__Tickets_View();
        if ( Plugin::$instance->editor->is_edit_mode() ) {
			$latest_post = get_posts( 'post_type=tribe_events&numberposts=1' );
			$post = setup_postdata($latest_post[0]->ID);
			$main_settings =  TecEsb()->tec_settings;
			$event_id 	= $main_settings['event_id'] != 'none' ? $main_settings['event_id'] : $latest_post[0]->ID;
			?>
			<style>.tribe-common{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-smoothing:antialiased}.tribe-common *{box-sizing:border-box}.tribe-common article,.tribe-common aside,.tribe-common details,.tribe-common figcaption,.tribe-common figure,.tribe-common footer,.tribe-common header,.tribe-common main,.tribe-common menu,.tribe-common nav,.tribe-common section,.tribe-common summary{display:block}.tribe-common svg:not(:root){overflow:hidden}.tribe-common audio,.tribe-common canvas,.tribe-common progress,.tribe-common video{display:inline-block}.tribe-common audio:not([controls]){display:none;height:0}.tribe-common progress{vertical-align:baseline}.tribe-common [hidden],.tribe-common template{display:none}.tribe-common pre{overflow:auto}.tribe-common sub,.tribe-common sup{position:relative;vertical-align:baseline}.tribe-common sup{top:-.5em}.tribe-common sub{bottom:-.25em}.tribe-common button,.tribe-common input,.tribe-common select,.tribe-common textarea{box-sizing:border-box;margin:0}.tribe-common input[type=number]::-webkit-inner-spin-button,.tribe-common input[type=number]::-webkit-outer-spin-button{height:auto}.tribe-common legend{color:inherit;display:table;max-width:100%;white-space:normal}.tribe-common textarea{overflow:auto;resize:none}.tribe-common button,.tribe-common input[type=button],.tribe-common input[type=reset],.tribe-common input[type=submit]{cursor:pointer;overflow:visible}.tribe-common button[disabled],.tribe-common input[disabled]{cursor:default}.tribe-common button::-moz-focus-inner,.tribe-common input::-moz-focus-inner{border:0;padding:0}.tribe-common a,.tribe-common abbr,.tribe-common acronym,.tribe-common address,.tribe-common applet,.tribe-common article,.tribe-common aside,.tribe-common audio,.tribe-common b,.tribe-common big,.tribe-common blockquote,.tribe-common canvas,.tribe-common caption,.tribe-common center,.tribe-common cite,.tribe-common code,.tribe-common dd,.tribe-common del,.tribe-common details,.tribe-common dfn,.tribe-common div,.tribe-common dl,.tribe-common dt,.tribe-common em,.tribe-common embed,.tribe-common fieldset,.tribe-common figcaption,.tribe-common figure,.tribe-common footer,.tribe-common form,.tribe-common h1,.tribe-common h2,.tribe-common h3,.tribe-common h4,.tribe-common h5,.tribe-common h6,.tribe-common header,.tribe-common i,.tribe-common iframe,.tribe-common img,.tribe-common ins,.tribe-common kbd,.tribe-common label,.tribe-common legend,.tribe-common li,.tribe-common main,.tribe-common mark,.tribe-common menu,.tribe-common nav,.tribe-common object,.tribe-common ol,.tribe-common output,.tribe-common p,.tribe-common pre,.tribe-common q,.tribe-common ruby,.tribe-common s,.tribe-common samp,.tribe-common section,.tribe-common small,.tribe-common span,.tribe-common strike,.tribe-common strong,.tribe-common sub,.tribe-common summary,.tribe-common sup,.tribe-common table,.tribe-common tbody,.tribe-common td,.tribe-common tfoot,.tribe-common th,.tribe-common thead,.tribe-common time,.tribe-common tr,.tribe-common tt,.tribe-common u,.tribe-common ul,.tribe-common var,.tribe-common video{border:0;margin:0;padding:0}.tribe-common ol,.tribe-common ul{list-style:none}.tribe-common img{border-style:none;height:auto;-ms-interpolation-mode:bicubic;max-width:100%}.tribe-common embed,.tribe-common iframe,.tribe-common video{max-height:100%;max-width:100%}.tribe-theme-avada input[type=text]{margin:0}.tribe-theme-divi .entry-content .tribe-common table,.tribe-theme-divibody.et-pb-preview #main-content .container .tribe-common table{border:0;margin:0}.tribe-theme-divi .entry-content .tribe-common td,.tribe-theme-divibody.et-pb-preview #main-content .container .tribe-common td{border:0}.tribe-theme-divi #content-area .tribe-common td,.tribe-theme-divi #content-area .tribe-common th,.tribe-theme-divi #content-area .tribe-common tr,.tribe-theme-divi #left-area .tribe-common ul{padding:0}#top .main_color .tribe-common button[disabled],#top.tribe-theme-enfold .tribe-common button[disabled]{cursor:default}#top .main_color .tribe-common form,#top .main_color .tribe-common input,#top.tribe-theme-enfold .tribe-common form,#top.tribe-theme-enfold .tribe-common input{margin:0}.entry-content-wrapper .tribe-common li,.entry-content .tribe-common ol,.entry-content .tribe-common ul,.tribe-theme-genesis .tribe-common ol,.tribe-theme-genesis .tribe-common ul{margin:0;padding:0}.tribe-theme-twentynineteen .tribe-common svg{fill:none}.tribe-theme-twentyseventeen .tribe-common div.tribe-dialog{z-index:5!important}.tribe-common .tribe-common-form-control-checkbox,.tribe-common .tribe-common-form-control-radio{align-items:flex-start;display:flex}.tribe-common .tribe-common-form-control-checkbox__label,.tribe-common .tribe-common-form-control-radio__label{cursor:pointer;margin-left:15px}.tribe-common .tribe-common-form-control-checkbox__input,.tribe-common .tribe-common-form-control-radio__input{cursor:pointer;flex:none;margin:1px 0 0}#top .main_color .tribe-common .tribe-common-form-control-checkbox__input,#top.tribe-theme-enfold .tribe-common .tribe-common-form-control-checkbox__input{margin:1px 0 0}.tribe-theme-twentytwenty .tribe-common .tribe-common-form-control-checkbox__input{top:0}.tribe-theme-twentytwentyone .tribe-common .tribe-common-form-control-checkbox__input:checked:after{border:none}.tribe-theme-twentytwentyone .tribe-common .tribe-common-form-control-radio__input:checked:after{background-color:transparent}.tribe-common .tribe-common-form-control-checkbox-radio-group>*{margin-bottom:15px}.tribe-common .tribe-common-form-control-checkbox-radio-group>:last-child{margin-bottom:0}.tribe-common .tribe-common-form-control-slider__input{cursor:pointer;display:inline-block;margin:0;padding:0;vertical-align:middle;width:120px}.tribe-common .tribe-common-form-control-slider__label{cursor:pointer;display:inline-block;margin-left:11px;vertical-align:middle}.tribe-common .tribe-common-form-control-slider--vertical .tribe-common-form-control-slider__label{display:block;margin:0 0 6px}.tribe-common .tribe-common-form-control-text__label{border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.tribe-common .tribe-common-form-control-text__input{height:auto;padding:var(--tec-spacer-2) var(--tec-spacer-6) var(--tec-spacer-2) 0;width:100%}.tribe-common--breakpoint-medium.tribe-common .tribe-common-form-control-text__input{padding:var(--tec-spacer-4) var(--tec-spacer-4) var(--tec-spacer-4) var(--tec-spacer-8)}#top .main_color .tribe-common .tribe-common-form-control-text__input,#top.tribe-theme-enfold .tribe-common .tribe-common-form-control-text__input{padding:var(--tec-spacer-2) var(--tec-spacer-6) var(--tec-spacer-2) 0;width:100%}#top .main_color .tribe-common.tribe-common--breakpoint-medium .tribe-common-form-control-text__input,#top.tribe-theme-enfold .tribe-common.tribe-common--breakpoint-medium .tribe-common-form-control-text__input{padding:var(--tec-spacer-4) var(--tec-spacer-4) var(--tec-spacer-4) var(--tec-spacer-8)}.tribe-common .tribe-common-form-control-toggle__input,.tribe-common .tribe-common-form-control-toggle__label{cursor:pointer;display:inline-block;vertical-align:middle}.tribe-common .tribe-common-form-control-toggle__label{margin-left:11px}.tribe-common .tribe-common-form-control-toggle--vertical .tribe-common-form-control-toggle__label{display:block;margin:0 0 6px}#top .main_color .tribe-common .tribe-common-form-control-toggle__input,#top.tribe-theme-enfold .tribe-common .tribe-common-form-control-toggle__input{display:inline-block;margin:5px 0}.tribe-common .tribe-common-g-row{display:flex;flex-wrap:wrap}.tribe-common .tribe-common-g-row--gutters{margin-left:var(--tec-grid-gutter-small-half-negative);margin-right:var(--tec-grid-gutter-small-half-negative)}.tribe-common--breakpoint-medium.tribe-common .tribe-common-g-row--gutters{margin-left:var(--tec-grid-gutter-half-negative);margin-right:var(--tec-grid-gutter-half-negative)}.tribe-common .tribe-common-g-row--gutters>.tribe-common-g-col{padding-left:var(--tec-grid-gutter-small-half);padding-right:var(--tec-grid-gutter-small-half)}.tribe-common--breakpoint-medium.tribe-common .tribe-common-g-row--gutters>.tribe-common-g-col{padding-left:var(--tec-grid-gutter-half);padding-right:var(--tec-grid-gutter-half)}.tribe-theme-twentynineteen .tribe-common .entry.tribe-common-g-row--gutters{margin-left:var(--tec-grid-gutter-small-half-negative);margin-right:var(--tec-grid-gutter-small-half-negative);padding:0}.tribe-theme-twentynineteen .tribe-common.tribe-common--breakpoint-medium .entry.tribe-common-g-row--gutters{margin-left:var(--tec-grid-gutter-half-negative);margin-right:var(--tec-grid-gutter-half-negative)}.tribe-theme-twentynineteen .tribe-common .tribe-common-g-row--gutters>.entry.tribe-common-g-col{margin:0;padding-left:var(--tec-grid-gutter-small-half);padding-right:var(--tec-grid-gutter-small-half)}.tribe-theme-twentynineteen .tribe-common.tribe-common--breakpoint-medium .tribe-common-g-row--gutters>.entry.tribe-common-g-col{padding-left:var(--tec-grid-gutter-half);padding-right:var(--tec-grid-gutter-half)}.tribe-common a{cursor:pointer}.tribe-theme-divi #left-area .tribe-common ul,.tribe-theme-divi .entry-content .tribe-common ul,body.et-pb-preview.tribe-theme-divi #main-content .container .tribe-common ul{list-style-type:none;padding:0}.entry-content .tribe-common ol>li,.entry-content .tribe-common ul>li{list-style-type:none}.tribe-common button{padding:0}.tribe-common .tribe-common-l-container{margin-left:auto;margin-right:auto;max-width:var(--tec-grid-width);padding-left:var(--tec-grid-gutter-page-small);padding-right:var(--tec-grid-gutter-page-small);width:100%}.tribe-common--breakpoint-medium.tribe-common .tribe-common-l-container{padding-left:var(--tec-grid-gutter-page);padding-right:var(--tec-grid-gutter-page)}.tribe-common .tribe-common-a11y-hidden{display:none!important;visibility:hidden}.tribe-common .tribe-common-a11y-visual-hide{border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.tribe-common .tribe-common-a11y-visual-show{clip:auto;height:auto;margin:0;position:static;width:auto}.tribe-common .tribe-common-c-btn-border,.tribe-common a.tribe-common-c-btn-border{padding:11px 20px;width:100%}.tribe-common--breakpoint-medium.tribe-common .tribe-common-c-btn-border,.tribe-common--breakpoint-medium.tribe-common a.tribe-common-c-btn-border{width:auto}.tribe-common .tribe-common-c-btn-border-small,.tribe-common a.tribe-common-c-btn-border-small{padding:14px 20px;width:100%}.tribe-common--breakpoint-medium.tribe-common .tribe-common-c-btn-border-small,.tribe-common--breakpoint-medium.tribe-common a.tribe-common-c-btn-border-small{padding:6px 15px;width:auto}.tribe-common .tribe-common-c-btn-icon:before{background-repeat:no-repeat;background-size:contain;content:"";display:block}.tribe-common .tribe-common-c-btn-icon--caret-left .tribe-common-c-btn-icon__icon-svg,.tribe-common .tribe-common-c-btn-icon--caret-right .tribe-common-c-btn-icon__icon-svg{width:11px}.tribe-common .tribe-common-c-btn-icon--caret-left .tribe-common-c-btn-icon__icon-svg path,.tribe-common .tribe-common-c-btn-icon--caret-right .tribe-common-c-btn-icon__icon-svg path{fill:currentColor}.tribe-common .tribe-common-c-btn,.tribe-common a.tribe-common-c-btn{padding:11px 20px;width:100%}.tribe-common--breakpoint-medium.tribe-common .tribe-common-c-btn,.tribe-common--breakpoint-medium.tribe-common a.tribe-common-c-btn{width:auto}.tribe-common .tribe-common-c-image{display:block;height:auto;margin-left:auto;margin-right:auto;width:100%}.tribe-common .tribe-common-c-image--bg{position:relative}.tribe-common .tribe-common-c-image__bg{background:50% no-repeat;background-size:cover;bottom:0;height:100%;left:0;position:absolute;right:0;top:0;width:100%}.tribe-common .tribe-common-c-loader{display:flex;padding-top:calc(var(--tec-spacer-11)*3)}.tribe-common--breakpoint-medium.tribe-common .tribe-common-c-loader{padding-top:calc(var(--tec-spacer-13)*3)}.tribe-common .tribe-common-c-loader__dot{width:15px}.tribe-common .tribe-common-c-loader__dot:not(:first-of-type){margin-left:8px}.tribe-common .tribe-common-c-loader__dot circle{fill:currentColor}.tribe-common .tribe-common-c-svgicon--featured{width:8px}.tribe-common .tribe-common-c-svgicon--recurring{width:12px}.tribe-common .tribe-common-c-svgicon--search{width:16px}.tribe-common .tribe-common-c-svgicon--location{width:10px}.tribe-common .tribe-common-c-svgicon--day,.tribe-common .tribe-common-c-svgicon--map,.tribe-common .tribe-common-c-svgicon--month,.tribe-common .tribe-common-c-svgicon--photo,.tribe-common .tribe-common-c-svgicon--week{height:100%;width:100%}.tribe-common .tribe-common-c-svgicon--close-alt path,.tribe-common .tribe-common-c-svgicon--close path{stroke:currentColor}.tribe-common .tribe-common-c-svgicon--hybrid circle,.tribe-common .tribe-common-c-svgicon--mail,.tribe-common .tribe-common-c-svgicon--map-pin,.tribe-common .tribe-common-c-svgicon--messages-not-found g,.tribe-common .tribe-common-c-svgicon--no-map,.tribe-common .tribe-common-c-svgicon--phone,.tribe-common .tribe-common-c-svgicon--virtual g,.tribe-common .tribe-common-c-svgicon--website{fill:none}.tribe-common .tribe-common-c-svgicon--messages-not-found{width:22px}.tribe-common .tribe-common-c-svgicon--messages-not-found path{stroke:currentColor}.tribe-common .tribe-common-c-svgicon--error{width:18px}.tribe-common .tribe-common-c-svgicon--error g,.tribe-common .tribe-common-c-svgicon--reset path{fill:none}.tribe-common .tribe-common-c-svgicon__svg-fill{fill:currentColor}.tribe-common .tribe-common-c-svgicon__svg-stroke{stroke:currentColor}
			 :root {--tec-color-text-primary: #141827;--tec-color-text-primary-light: rgba(20, 24, 39, 0.62);--tec-color-text-secondary: #5d5d5d;--tec-color-text-disabled: #d5d5d5;--tec-color-text-events-title: var(--tec-color-text-primary);--tec-color-text-event-title: var(--tec-color-text-events-title);--tec-color-text-event-date: var(--tec-color-text-primary);--tec-color-text-secondary-event-date: var(--tec-color-text-secondary);--tec-color-icon-primary: #5d5d5d;--tec-color-icon-primary-alt: #757575;--tec-color-icon-secondary: #bababa;--tec-color-icon-active: #141827;--tec-color-icon-disabled: #d5d5d5;--tec-color-icon-focus: #334aff;--tec-color-icon-error: #da394d;--tec-color-event-icon: #141827;--tec-color-event-icon-hover: #334aff;--tec-color-accent-primary: #334aff;--tec-color-accent-primary-hover: rgba(51, 74, 255, 0.8);--tec-color-accent-primary-active: rgba(51, 74, 255, 0.9);--tec-color-accent-primary-background: rgba(51, 74, 255, 0.07);--tec-color-accent-secondary: #141827;--tec-color-accent-secondary-hover: rgba(20, 24, 39, 0.8);--tec-color-accent-secondary-active: rgba(20, 24, 39, 0.9);--tec-color-accent-secondary-background: rgba(20, 24, 39, 0.07);--tec-color-button-primary: var(--tec-color-accent-primary);--tec-color-button-primary-hover: var(--tec-color-accent-primary-hover);--tec-color-button-primary-active: var(--tec-color-accent-primary-active);--tec-color-button-primary-background: var(--tec-color-accent-primary-background);--tec-color-button-secondary: var(--tec-color-accent-secondary);--tec-color-button-secondary-hover: var(--tec-color-accent-secondary-hover);--tec-color-button-secondary-active: var(--tec-color-accent-secondary-active);--tec-color-button-secondary-background: var(--tec-color-accent-secondary-background);--tec-color-link-primary: var(--tec-color-text-primary);--tec-color-link-accent: var(--tec-color-accent-primary);--tec-color-link-accent-hover: rgba(51, 74, 255, 0.8);--tec-color-border-default: #d5d5d5;--tec-color-border-secondary: #e4e4e4;--tec-color-border-tertiary: #7d7d7d;--tec-color-border-hover: #5d5d5d;--tec-color-border-active: #141827;--tec-color-background: #fff;--tec-color-background-events: transparent;--tec-color-background-transparent: rgba(255, 255, 255, 0.6);--tec-color-background-secondary: #f7f6f6;--tec-color-background-messages: rgba(20, 24, 39, 0.07);--tec-color-background-secondary-hover: #f0eeee;--tec-color-background-error: rgba(218, 57, 77, 0.08);--tec-color-box-shadow: rgba(#000, 0.14);--tec-color-box-shadow-secondary: rgba(#000, 0.1);--tec-color-scroll-track: rgba(#000, 0.25);--tec-color-scroll-bar: rgba(#000, 0.5);--tec-color-background-primary-multiday: rgba(51, 74, 255, 0.24);--tec-color-background-primary-multiday-hover: rgba(51, 74, 255, 0.34);--tec-color-background-secondary-multiday: rgba(20, 24, 39, 0.24);--tec-color-background-secondary-multiday-hover: rgba(20, 24, 39, 0.34);--tec-color-accent-primary-week-event: rgba(51, 74, 255, 0.1);--tec-color-accent-primary-week-event-hover: rgba(51, 74, 255, 0.2);--tec-color-accent-primary-week-event-featured: rgba(51, 74, 255, 0.04);--tec-color-accent-primary-week-event-featured-hover: rgba(51, 74, 255, 0.14);--tec-color-background-secondary-datepicker: var(--tec-color-background-secondary);--tec-color-accent-primary-background-datepicker: var(--tec-color-accent-primary-background);--color-text-primary: var(--tec-color-text-primary);--color-text-primary-light: var(--tec-color-text-primary-light);--color-text-secondary: var(--tec-color-text-secondary);--color-text-disabled: var(--tec-color-text-disabled);--color-icon-primary: var(--tec-color-icon-primary);--color-icon-primary-alt: var(--tec-color-icon-primary);--color-icon-secondary: var(--tec-color-icon-secondary);--color-icon-active: var(--tec-color-icon-active);--color-icon-disabled: var(--tec-color-icon-disabled);--color-icon-focus: var(--tec-color-icon-focus);--color-icon-error: var(--tec-color-icon-error);--color-accent-primary: var(--tec-color-accent-primary);--color-accent-primary-hover: var(--tec-color-accent-primary-hover);--color-accent-primary-active: var(--tec-color-accent-primary-active);--color-accent-primary-background: var(--tec-color-accent-primary-background);--color-accent-primary-multiday: var(--tec-color-accent-primary-multiday);--color-accent-primary-multiday-hover: var(--tec-color-accent-primary-multiday-hover);--color-accent-primary-week-event: var(--tec-color-accent-primary-week-event);--color-accent-primary-week-event-hover: var(--tec-color-accent-primary-week-event-hover);--color-accent-primary-week-event-featured: var(--tec-color-accent-primary-week-event-featured);--color-accent-primary-week-event-featured-hover: var(--tec-color-accent-primary-week-event-featured-hover);--color-accent-secondary: var(--tec-color-accent-secondary);--color-accent-secondary-hover: var(--tec-color-accent-secondary-hover);--color-accent-secondary-active: var(--tec-color-accent-secondary-active);--color-accent-secondary-background: var(--tec-color-accent-secondary-background);--color-border-default: var(--tec-color-border-default);--color-border-secondary: var(--tec-color-border-secondary);--color-border-tertiary: var(--tec-color-border-tertiary);--color-border-hover: var(--tec-color-border-hover);--color-border-active: var(--tec-color-border-active);--color-background: var(--tec-color-background);--color-background-transparent: var(--tec-color-background-transparent);--color-background-secondary: var(--tec-color-background-secondary);--color-background-messages: var(--tec-color-background-messages);--color-background-secondary-hover: var(--tec-color-background-secondary-hover);--color-background-error: var(--tec-color-icon-error);--color-box-shadow: var(--tec-color-box-shadow);--color-box-shadow-secondary: var(--tec-color-box-shadow-secondary);--color-scroll-track: var(--tec-color-scroll-track);--color-scroll-bar: var(--tec-color-scroll-bar);}:root {--tec-spacer-0: 4px;--tec-spacer-1: 8px;--tec-spacer-2: 12px;--tec-spacer-3: 16px;--tec-spacer-4: 20px;--tec-spacer-5: 24px;--tec-spacer-6: 28px;--tec-spacer-7: 32px;--tec-spacer-8: 40px;--tec-spacer-9: 48px;--tec-spacer-10: 56px;--tec-spacer-11: 64px;--tec-spacer-12: 80px;--tec-spacer-13: 96px;--tec-spacer-14: 160px;--spacer-0: var(--tec-spacer-0);--spacer-1: var(--tec-spacer-1);--spacer-2: var(--tec-spacer-2);--spacer-3: var(--tec-spacer-3);--spacer-4: var(--tec-spacer-4);--spacer-5: var(--tec-spacer-5);--spacer-6: var(--tec-spacer-6);--spacer-7: var(--tec-spacer-7);--spacer-8: var(--tec-spacer-8);--spacer-9: var(--tec-spacer-9);--spacer-10: var(--tec-spacer-10);--spacer-11: var(--tec-spacer-11);--spacer-12: var(--tec-spacer-12);--spacer-13: var(--tec-spacer-13);--spacer-14: var(--tec-spacer-14);}:root {--tec-grid-gutter: 48px;--tec-grid-gutter-negative: calc(var(--tec-grid-gutter) * -1);--tec-grid-gutter-half: calc(var(--tec-grid-gutter) / 2);--tec-grid-gutter-half-negative: calc(var(--tec-grid-gutter-half) * -1);--tec-grid-gutter-small: 42px;--tec-grid-gutter-small-negative: calc(var(--tec-grid-gutter-small) * -1);--tec-grid-gutter-small-half: calc(var(--tec-grid-gutter-small) / 2);--tec-grid-gutter-small-half-negative: calc(var(--tec-grid-gutter-small-half) * -1);--tec-grid-gutter-page: 42px;--tec-grid-gutter-page-small: 19.5px;--tec-grid-width-default: 1176px;--tec-grid-width-min: 320px;--tec-grid-width: calc(var(--tec-grid-width-default) + 2 * var(--tec-grid-gutter-page));--tec-grid-width-1-of-2: 50%;--tec-grid-width-1-of-3: 33.333%;--tec-grid-width-1-of-4: 25%;--tec-grid-width-1-of-5: 20%;--tec-grid-width-1-of-7: 14.285%;--tec-grid-width-1-of-8: 12.5%;--tec-grid-width-1-of-9: 11.111%;--grid-gutter: var(--tec-grid-gutter);--grid-gutter-negative: var(--tec-grid-gutter-negative);--grid-gutter-half: var(--tec-grid-gutter-half);--grid-gutter-half-negative: var(--tec-grid-gutter-half-negative);--grid-gutter-small: var(--tec-grid-gutter-small);--grid-gutter-small-negative: var(--tec-grid-gutter-small-negative);--grid-gutter-small-half: var(--tec-grid-gutter-small-half);--grid-gutter-small-half-negative: var(--tec-grid-gutter-small-half-negative);--grid-gutter-page: var(--tec-grid-gutter-page);--grid-gutter-page-small: var(--tec-grid-gutter-page-small);--grid-width-default: var(--tec-grid-width-default);--grid-width-min: var(--tec-grid-width-min);--grid-width: var(--tec-grid-width);--grid-width-1-of-2: var(--tec-grid-width-1-of-2);--grid-width-1-of-3: var(--tec-grid-width-1-of-3);--grid-width-1-of-4: var(--tec-grid-width-1-of-4);--grid-width-1-of-5: var(--tec-grid-width-1-of-5);--grid-width-1-of-7: var(--tec-grid-width-1-of-7);--grid-width-1-of-8: var(--tec-grid-width-1-of-8);--grid-width-1-of-9: var(--tec-grid-width-1-of-9);}
			</style>
			<?php
        } else {
			if ( !empty($_GET['preview_id']) && isset($_GET['preview_id']) ) {
				$latest_post = get_posts('post_type=tribe_events&numberposts=1');
				$event_id = $latest_post[0]->ID;
			} else {
				$event_id = get_the_ID();
			}
        }
		?>
		<div class="tec-rsvp-events-wrap">
		    <?php $class->get_rsvp_block($event_id); ?>
        </div>
		<?php
	}
}

