<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;


class TEC_Title extends \Elementor\Widget_Base
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

		return 'event_title';

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

		return __( 'Event Title', 'tec-sb' );

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

		return 'eicon-site-title';

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
		'tec_title_typo',
			array(
				'label' 	=> __( 'Title Typography', 'tec-sb' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'tec-sb' ),
				'selector' 	=> '{{WRAPPER}} .tec-single-title',
			]
		);

		$this->add_control(
			'tec_title',
			[
				'label' 		=> __( 'Title Color', 'tec-sb' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tec_title_hover',
			[
				'label' 		=> __( 'Hover Title Color', 'tec-sb' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-title:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_title_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-sb' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_title_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-sb' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'tec_title_border',
				'label' 		=> __( 'Border', 'tec-sb' ),
				'selector' 		=> '{{WRAPPER}} .tec-single-title',
			]
		);

		$this->add_control(
			'tec_title_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-sb' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'tec_title_box_shadow',
				'label' 	=> __('Box Shadow', 'tec-sb'),
				'selector' 	=> '{{WRAPPER}} .tec-single-title',
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
		?>
		<h1 class="tec-single-title">
		<?php echo get_the_title( $event_id ) ?><br>
		</h1>
		<?php
	}
}

