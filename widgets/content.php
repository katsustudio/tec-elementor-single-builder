<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;


class TEC_Content extends \Elementor\Widget_Base
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

		return 'event_content';

	}

	/**
	 * Retrieve Alert widget content.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @return string Widget content.
	 */
	public function get_title() {

		return __( 'Event content', 'tec-sb' );

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

		return 'eicon-table-of-contents';

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
		'tec_content_typo',
			array(
				'label' 	=> __( 'content Typography', 'tec-sb' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'content_typography',
				'label' 	=> __( 'Typography', 'tec-sb' ),
				'selector' 	=> '{{WRAPPER}} .tec-single-content p,{{WRAPPER}} .tec-single-content',
			]
		);

		$this->add_control(
			'tec_content',
			[
				'label' 		=> __( 'content Color', 'tec-sb' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-content p,{{WRAPPER}} .tec-single-content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tec_content_hover',
			[
				'label' 		=> __( 'Hover content Color', 'tec-sb' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-content:hover p,{{WRAPPER}} .tec-single-content:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'tec_content_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-sb' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tec_content_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-sb' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'tec_content_border',
				'label' 		=> __( 'Border', 'tec-sb' ),
				'selector' 		=> '{{WRAPPER}} .tec-single-content',
			]
		);

		$this->add_control(
			'tec_content_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-sb' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-single-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'tec_content_box_shadow',
				'label' 	=> __('Box Shadow', 'tec-sb'),
				'selector' 	=> '{{WRAPPER}} .tec-single-content',
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
			$event_id = $main_settings['event_id'] != 'none' ? $main_settings['event_id'] : $latest_post[0]->ID;
        } else {
			if ( !empty($_GET['preview_id']) && isset($_GET['preview_id']) ) {
				$latest_post = get_posts('post_type=tribe_events&numberposts=1');
				$event_id = $latest_post[0]->ID;
			} else {
				$event_id = get_the_ID();
			}
        }
		?>
		<div class="tec-single-content">
		<?php echo apply_filters('the_content', get_post_field('post_content', $event_id)); ?>
		</div>
		<?php
	}
}

