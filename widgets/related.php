<?php
use Elementor\Plugin;

use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;


class TEC_Related extends \Elementor\Widget_Base
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

		return 'event_related';

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

		return __( 'Related Events', 'tec-elementor-single-builder' );

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

		return 'eicon-theme-builder';

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
			'image',
			[
				'label' => __( 'Featured Image', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'start',
			[
				'label' => __( 'Start Time', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'end',
			[
				'label' => __( 'End Time', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tec-elementor-single-builder' ),
				'label_off' => __( 'Hide', 'tec-elementor-single-builder' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'start_icon',
			[
				'label' => __( 'Start Time Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-calendar-alt',
					'library' => 'regular',
				],
			]
		);

        $this->add_control(
			'end_icon',
			[
				'label' => __( 'End Time Icon', 'tec-elementor-single-builder' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-calendar-alt',
					'library' => 'regular',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'box_style',
			array(
				'label' 	=> __( 'Box', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'box_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .tec-related-events-post',
			]
		);

		$this->add_control(
			'box_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tec-related-events-post',
			]
		);

		$this->add_responsive_control(
			'box_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-related-events-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'box_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-related-events-post',
			]
		);

		$this->add_control(
			'box_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-related-events-post',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
		'img_style',
			array(
				'label' 	=> __( 'Featured Image', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'img_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'img_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'img_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-related-events-post img',
			]
		);

		$this->add_control(
			'img_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'img_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-related-events-post img',
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
				'selector' 	=> '{{WRAPPER}} .tec-related-events-post h5',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post h5' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tec-related-events-post h5',
			]
		);

		$this->add_responsive_control(
			'title_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tec-related-events-post h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'title_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .tec-related-events-post h5',
			]
		);

		$this->add_control(
			'title_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tec-related-events-post h5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'title_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .tec-related-events-post h5',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
		'start_style',
			array(
				'label' 	=> __( 'Start Time', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'start_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .events-post-time-start,{{WRAPPER}} .events-post-time-start span',
			]
		);

		$this->add_control(
			'start_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .events-post-time-start,{{WRAPPER}} .events-post-time-start span' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'start_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .events-post-time-start,{{WRAPPER}} .events-post-time-start span',
			]
		);

		$this->add_responsive_control(
			'start_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .events-post-time-start,{{WRAPPER}} .events-post-time-start span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'start_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .events-post-time-start,{{WRAPPER}} .events-post-time-start span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'start_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .events-post-time-start,{{WRAPPER}} .events-post-time-start span',
			]
		);

		$this->add_control(
			'start_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .events-post-time-start,{{WRAPPER}} .events-post-time-start span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'start_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .events-post-time-start,{{WRAPPER}} .events-post-time-start span',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
		'end_style',
			array(
				'label' 	=> __( 'End Time', 'tec-elementor-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'end_typography',
				'label' 	=> __( 'Typography', 'tec-elementor-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .events-post-time-end,{{WRAPPER}} .events-post-time-end span',
			]
		);

		$this->add_control(
			'end_color',
			[
				'label' 		=> __( 'Color', 'tec-elementor-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR, 
				'selectors' 	=> [
					'{{WRAPPER}} .events-post-time-end,{{WRAPPER}} .events-post-time-end span' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'end_bg',
				'label' => __( 'Background', 'tec-elementor-single-builder' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .events-post-time-end,{{WRAPPER}} .events-post-time-end span',
			]
		);

		$this->add_responsive_control(
			'end_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .events-post-time-end,{{WRAPPER}} .events-post-time-end span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'end_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .events-post-time-end,{{WRAPPER}} .events-post-time-end span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'end_border',
				'label' 		=> __( 'Border', 'tec-elementor-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .events-post-time-end,{{WRAPPER}} .events-post-time-end span',
			]
		);

		$this->add_control(
			'end_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'tec-elementor-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .events-post-time-end,{{WRAPPER}} .events-post-time-end span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'end_shadow',
				'label' 	=> __('Box Shadow', 'tec-elementor-single-builder'),
				'selector' 	=> '{{WRAPPER}} .events-post-time-end,{{WRAPPER}} .events-post-time-end span',
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
			$event_id 	= $main_settings['event_id'] != 'none' ? $main_settings['event_id'] : $latest_post[0]->ID;
        } else {
			if ( !empty($_GET['preview_id']) && isset($_GET['preview_id']) ) {
				$latest_post = get_posts('post_type=tribe_events&numberposts=1');
				$event_id = $latest_post[0]->ID;
			} else {
				$event_id = get_the_ID();
			}
        }
		$post_id = $event_id;
        $cat_ids = array();
        $categories = get_the_category( $post_id );

        if(!empty($categories) && !is_wp_error($categories)):
            foreach ($categories as $category):
                array_push($cat_ids, $category->term_id);
            endforeach;
        endif;

        $current_post_type = get_post_type($post_id);

        $related = get_posts( 
            array( 
                'category__in' => $cat_ids, 
                'numberposts'  => 3, 
                'post__not_in' => array( $post_id ) ,
                'post_type' => $current_post_type,
            ) 
        );
		?>
        <div class="tec-related-events-wrap">
		<?php
        foreach( $related as $post ) {
            setup_postdata($post);
            $show_time_zone       = tribe_get_option( 'tribe_events_timezones_show_zone', false );
            $local_start_time     = tribe_get_start_date( $post->ID, true, Tribe__Date_Utils::DBDATETIMEFORMAT );
            $time_zone_label      = Tribe__Events__Timezones::is_mode( 'site' ) ? Tribe__Events__Timezones::wp_timezone_abbr( $local_start_time ) : Tribe__Events__Timezones::get_event_timezone_abbr( $post->ID );

            $start_datetime = tribe_get_start_date((int) $post->ID,true,get_option('date_format'). ' '.get_option('time_format'));
            $start_ts = tribe_get_start_date( (int) $post->ID, false, Tribe__Date_Utils::DBDATEFORMAT );

            $end_datetime = tribe_get_end_date((int) $post->ID,true,get_option('date_format'). ' '.get_option('time_format'));
            $end_ts = tribe_get_end_date( (int) $post->ID, false, Tribe__Date_Utils::DBDATEFORMAT );
			?>
            <div class="tec-related-events-post">
			<?php
            if ( 'yes' === $settings['image'] ) {
                echo tribe_event_featured_image( $post->ID, 'full', false );
            }
            if ( 'yes' === $settings['title'] ) {
                echo wp_kses_post('<a href="'. get_permalink($post->ID) .'" target="_blank"><h5>' . get_the_title($post->ID) . '</h5></a>');
            }
            if ( 'yes' === $settings['start'] ) {
            ?>
            <div class="tec-related-events-post-time events-post-time-start" title="<?php echo esc_attr( $start_ts ); ?>"> <span><?php \Elementor\Icons_Manager::render_icon( $settings['start_icon'], [ 'aria-hidden' => 'true' ] ); ?> <?php echo esc_html__('Start Time:', 'tec-elementor-single-builder'); ?></span> <?php echo esc_html( $start_datetime ); ?> </div>
            <?php } ?>
            <?php if ( 'yes' === $settings['end'] ) { ?>
            <div class="tec-related-events-post-time events-post-time-end" title="<?php echo esc_attr( $end_ts ); ?>"><span><?php \Elementor\Icons_Manager::render_icon( $settings['end_icon'], [ 'aria-hidden' => 'true' ] ); ?> <?php echo esc_html__('End Time:', 'tec-elementor-single-builder'); ?></span> <?php echo esc_html( $end_datetime ); ?> </div>
            <?php } ?>
			</div>
            <?php
        }
		?>
        </div>
		<?php
        wp_reset_postdata();
	}
}

