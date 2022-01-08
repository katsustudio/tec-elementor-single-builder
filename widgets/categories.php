<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Page_Assets\Data_Managers\Font_Icon_Svg as Font_Icon_Svg_Data_Manager;
use Elementor\Core\Page_Assets\Managers\Font_Icon_Svg\Manager as Font_Icon_Svg_Manager;
use Elementor\Core\Files\Assets\Svg\Svg_Handler;

class TEC_Categories extends \Elementor\Widget_Base
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

		return 'event_categories';

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

		return __( 'Event Categories', 'tec-elementor-single-builder' );

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

		return 'eicon-folder-o';

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
		'tec_content',
			array(
				'label' 	=> __( 'Select Icon', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_CONTENT,
			)
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
		'tec_label',
			array(
				'label' 	=> __( 'Label', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'label_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tribe-events-event-categories-label',
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'label_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'label_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'label_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tribe-events-event-categories-label',
			]
		);

		$this->add_control(
			'label_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'label_box_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tribe-events-event-categories-label',
			]
		);		

		$this->end_controls_section();

		$this->start_controls_section(
		'tec_categories',
			array(
				'label' 	=> __( 'Categories', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'tec-elementor-single-builder' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'categories_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tribe-events-event-categories a',
			]
		);

		$this->add_control(
			'cats_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tribe-events-event-categories a',
			]
		);

		$this->add_responsive_control(
			'cats_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'cats_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'cats_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tribe-events-event-categories a',
			]
		);

		$this->add_control(
			'cats_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'cats_box_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tribe-events-event-categories a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => __( 'Hover', 'tec-elementor-single-builder' ),
			]
		);

		$this->add_control(
			'cats_color_color',
			[
				'label' 		=> __( 'Hover Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_hover',
				'label' => __( 'Background Hover', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tribe-events-event-categories a:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
		'tec_icon',
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
				'selector' 	=> '{{WRAPPER}} .tribe-events-event-categories-label i',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories-label i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' 		=> __( 'Hover Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories-label i:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_background',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tribe-events-event-categories-label i',
			]
		);

		$this->add_responsive_control(
			'icon_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories-label i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tribe-events-event-categories-label i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'icon_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tribe-events-event-categories-label i',
			]
		);

		$this->add_control(
			'icon_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tribe-events-event-categories-label i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'icon_box_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tribe-events-event-categories-label i',
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
		echo tribe_get_event_categories(
			$event_id,
			[
				'before'       => '',
				'sep'          => ' ',
				'after'        => '',
				'label'        => null, // An appropriate plural/singular label will be provided
				'label_before' => '<dt class="tribe-events-event-categories-label">' . self::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ),
				'label_after'  => '</dt>',
				'wrap_before'  => '<dd class="tribe-events-event-categories">',
				'wrap_after'   => '</dd>',
			]
		);
	}

	public static function render_icon( $icon, $attributes = [], $tag = 'i' ) {
		if ( empty( $icon['library'] ) ) {
			return false;
		}

		$output = '';

		/**
		 * When the library value is svg it means that it's a SVG media attachment uploaded by the user.
		 * Otherwise, it's the name of the font family that the icon belongs to.
		 */
		if ( 'svg' === $icon['library'] ) {
			$output = self::render_uploaded_svg_icon( $icon['value'] );
		} else {
			$output = self::render_font_icon( $icon, $attributes, $tag );
		}

		//Utils::print_unescaped_internal_string( $output );

		return $output;
	}

	public static function render_uploaded_svg_icon( $value ) {
		if ( ! isset( $value['id'] ) ) {
			return '';
		}

		return Svg_Handler::get_inline_svg( $value['id'] );
	}

	public static function render_font_icon( $icon, $attributes = [], $tag = 'i' ) {
		$icon_types = \Elementor\Icons_Manager::get_icon_manager_tabs();

		if ( isset( $icon_types[ $icon['library'] ]['render_callback'] ) && is_callable( $icon_types[ $icon['library'] ]['render_callback'] ) ) {
			return call_user_func_array( $icon_types[ $icon['library'] ]['render_callback'], [ $icon, $attributes, $tag ] );
		}

		$content = '';

		$font_icon_svg_family = self::is_font_icon_inline_svg() ? Font_Icon_Svg_Manager::get_font_family( $icon['library'] ) : '';

		if ( $font_icon_svg_family ) {
			$icon['font_family'] = $font_icon_svg_family;

			$content = \Elementor\Icons_Manager::get_font_icon_svg( $icon, $attributes );

			if ( $content ) {
				return $content;
			}
		}

		if ( ! $content ) {
			if ( empty( $attributes['class'] ) ) {
				$attributes['class'] = $icon['value'];
			} else {
				if ( is_array( $attributes['class'] ) ) {
					$attributes['class'][] = $icon['value'];
				} else {
					$attributes['class'] .= ' ' . $icon['value'];
				}
			}
		}

		return '<' . $tag . ' ' . \Elementor\Utils::render_html_attributes( $attributes ) . '>' . $content . '</' . $tag . '>';
	}

	/**
	 * is_font_awesome_inline
	 *
	 * @return bool
	 */
	public static function is_font_icon_inline_svg() {
		return \Elementor\Plugin::$instance->experiments->is_feature_active( 'e_font_icon_svg' );
	}
}

