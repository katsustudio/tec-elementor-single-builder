<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;


class TEC_Start_End extends \Elementor\Widget_Base
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

		return 'event_start_end_date';

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

		return __( 'Event Start and End Date', 'tec-elementor-single-builder' );

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

		return 'eicon-clock-o';

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
			'content_section',
			[
				'label' => __( 'Content', 'tec-elementor-single-builder' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'start_end',
			[
				'label' => __( 'Display Start or End', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'start',
				'options' => [
					'start'  => __( 'Start', 'tec-elementor-single-builder' ),
					'end' => __( 'End', 'tec-elementor-single-builder' ),
				],
			]
		);

		$this->add_control(
			'tec_title',
			[
				'label' => __( 'Title', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Start Date:', 'tec-elementor-single-builder' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'title_typo',
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
				'selector' 	=> '{{WRAPPER}} .tec-single-date-wrap .tec-single-date-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap .tec-single-date-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'title_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap .tec-single-date-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-single-date-wrap .tec-single-date-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'title_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-single-date-wrap .tec-single-date-title',
			]
		);

		$this->add_control(
			'title_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap .tec-single-date-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'title_box_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-single-date-wrap .tec-single-date-title',
			]
		);		

		$this->end_controls_section();

		$this->start_controls_section(
		'date_typo',
			array(
				'label' 	=> __( 'Date', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'date_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-single-date-wrap .tec-single-date-text',
			]
		);

		$this->add_control(
			'date_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap .tec-single-date-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'date_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap .tec-single-date-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'date_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap .tec-single-date-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'date_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-single-date-wrap .tec-single-date-text',
			]
		);

		$this->add_control(
			'date_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap .tec-single-date-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'date_box_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-single-date-wrap .tec-single-date-text',
			]
		);		

		$this->end_controls_section();

		$this->start_controls_section(
		'icon_typo',
			array(
				'label' 	=> __( 'Icon', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'icon_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-single-date-wrap i',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'icon_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-single-date-wrap i',
			]
		);

		$this->add_control(
			'icon_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-date-wrap i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'icon_box_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-single-date-wrap i',
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
		?>
		<div class="tec-single-date-wrap tribe-events-start-datetime-label"> <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?> <span class="tec-single-date-title"><?php echo esc_html($settings['tec_title']) ?></span>
		<?php
        if ( Plugin::$instance->editor->is_edit_mode() ) {
			$latest_post = get_posts( 'post_type=tribe_events&numberposts=1' );
			$post = setup_postdata($latest_post[0]->ID);
			$main_settings =  TecEsb()->tec_settings;
			$event_id 	= $main_settings['event_id'] != 'none' ? $main_settings['event_id'] : $latest_post[0]->ID;
        } else {
			if ( !empty($_GET['preview_id']) && isset($_GET['preview_id']) ) {
				$latest_post = get_posts('post_type=tribe_events&numberposts=1');
				$event_id = $latest_post[0]->ID;
			} else {
				$event_id = get_the_ID();
			}
        }
		$show_time_zone       = tribe_get_option( 'tribe_events_timezones_show_zone', false );
		$local_start_time     = tribe_get_start_date( $event_id, true, Tribe__Date_Utils::DBDATETIMEFORMAT );
		$time_zone_label      = Tribe__Events__Timezones::is_mode( 'site' ) ? Tribe__Events__Timezones::wp_timezone_abbr( $local_start_time ) : Tribe__Events__Timezones::get_event_timezone_abbr( $event_id );

		$start_datetime = tribe_get_start_date((int) $event_id,true,get_option('date_format'). ' '.get_option('time_format'));
		$start_ts = tribe_get_start_date( (int) $event_id, false, Tribe__Date_Utils::DBDATEFORMAT );

		$end_datetime = tribe_get_end_date((int) $event_id,true,get_option('date_format'). ' '.get_option('time_format'));
		$end_ts = tribe_get_end_date( (int) $event_id, false, Tribe__Date_Utils::DBDATEFORMAT );
		if ( $settings['start_end'] == 'start') {
		?>
			<span class="tec-single-date-text tribe-events-abbr tribe-events-start-datetime updated published dtstart" title="<?php echo esc_attr( $start_ts ); ?>"> <?php echo esc_html( $start_datetime ); ?> </span>
			<?php if ( $show_time_zone ) : ?>
				<span class="tribe-events-abbr tribe-events-time-zone published "><?php echo esc_html( $time_zone_label ); ?></span>
			<?php endif; ?>
		<?php
		}
		if ( $settings['start_end'] == 'end') {
		?>
			<span class="tec-single-date-text tribe-events-abbr tribe-events-end-datetime dtend" title="<?php echo esc_attr( $end_ts ); ?>"> <?php echo esc_html( $end_datetime ); ?> </span>
			<?php if ( $show_time_zone ) : ?>
				<span class="tribe-events-abbr tribe-events-time-zone published "><?php echo esc_html( $time_zone_label ); ?></span>
			<?php endif; ?>
		<?php
		}
		?>
		</div>
		<?php
	}
}

