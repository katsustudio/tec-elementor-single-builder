<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Icons_Manager;
use Elementor\Core\Page_Assets\Data_Managers\Font_Icon_Svg as Font_Icon_Svg_Data_Manager;
use Elementor\Core\Page_Assets\Managers\Font_Icon_Svg\Manager as Font_Icon_Svg_Manager;
use Elementor\Core\Files\Assets\Svg\Svg_Handler;


class TEC_NextPrev extends \Elementor\Widget_Base
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

		return 'event_nextprev';

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

		return __( 'Event Next/Previous', 'tec-elementor-single-builder' );

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

		return 'eicon-post-navigation';

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
			'tec_prev_icon',
			[
				'label' => __( 'Previous Link Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'tec_middle_icon',
			[
				'label' => __( 'Center Link Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'tec_next_icon',
			[
				'label' => __( 'Next Link Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);


		$this->add_control(
			'tec_events_text',
			[
				'label' => __( 'All Events Text', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'default' => __( 'See All Events', 'tec-elementor-single-builder' ),
			]
		);

		$this->add_control(
			'tec_events_url',
			[
				'label' => __( 'All Events URL', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'tec-elementor-single-builder' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'tec_nextprev_typo',
			array(
				'label' 	=> __( 'NextPrev Typography', 'tec-elementor-single-builder' ),
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

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Title Color', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tec-navigation a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tec-navigation div i,{{WRAPPER}} .tec-navigation div svg' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_margin',
			[
				'label' => __( 'Icon Margin', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tec-navigation div i,{{WRAPPER}} .tec-navigation div svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
			'text_color_hover',
			[
				'label' => __( 'Title Color', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tec-navigation a:hover' => 'color: {{VALUE}}',
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
		$prev_icon = $settings['tec_prev_icon'] ? self::render_icon( $settings['tec_prev_icon'], [ 'aria-hidden' => 'true' ] ) : '' ;
		$next_icon = $settings['tec_next_icon'] ? self::render_icon( $settings['tec_next_icon'], [ 'aria-hidden' => 'true' ] ) : '' ;
		$middle_icon = $settings['tec_middle_icon'] ?  self::render_icon( $settings['tec_middle_icon'], [ 'aria-hidden' => 'true' ] ) : '' ;
        if ( Plugin::$instance->editor->is_edit_mode() ) {
			$main_settings =  TecEsb()->tec_settings;
            $latest_post = get_posts( 'post_type=tribe_events&numberposts=1' );
            $post = setup_postdata($latest_post[0]->ID);
            $event_id = $main_settings['event_id'] != 'none' ? $main_settings['event_id'] : $latest_post[0]->ID;
        } else {
			if ( !empty($_GET['preview_id']) && isset($_GET['preview_id']) ) {
				$latest_post = get_posts('post_type=tribe_events&numberposts=1');
				$event_id = $latest_post[0]->ID;
			} else {
				$event_id = get_the_ID();
			}
        }
		tribe( 'tec.adjacent-events' )->set_current_event_id( $event_id );
		?>
		<div class="tec-navigation">
			<div class="tribe-events-nav-previous"><?php echo wp_kses_post($prev_icon) . apply_filters( 'tribe_get_prev_event_link', tribe( 'tec.adjacent-events' )->get_prev_event_link( false), $event_id ) ?></div>
			<div class="tribe-events-nav-center"><?php echo wp_kses_post($middle_icon) . '<a href="'.esc_url($settings['tec_events_url']).'">' .sanitize_text_field($settings['tec_events_text']).'</a>'; ?></div>
			<div class="tribe-events-nav-next"><?php echo apply_filters( 'tribe_get_next_event_link', tribe( 'tec.adjacent-events' )->get_next_event_link( false ), $event_id ) . $next_icon ?></div>
		</div>
		<?php
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

