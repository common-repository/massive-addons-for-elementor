<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_CountDown_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_countdown';
	}

	public function get_title() {
		return __('Countdown', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-countdown';
    }
    
    public function get_categories() {
		return ['massive_addons'];
	}

	public function get_script_depends() {
		return ['mae-js-ctn'];
	}

	protected function _register_controls() {
		
        $this->start_controls_section(
			'general',
			[
				'label' => __('Count Down', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

	    $this->add_control(
			'date',
			[
				'label' => __( 'Date', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
				'default' => date('Y-m-d H:i',strtotime('10 days')),
			]
		);
		
        $this->end_controls_section();
        $this->start_controls_section(
			'additional',
			[
				'label' => __('Additional Settings', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_expire',
			[
				'label' => __( 'Show Expiry Message', 'massive-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'expire',
			[
				'label' => __('Expire Message', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'Timer Expired!', 'massive-addons'),
			]
		);
		
        $this->end_controls_section();
        $this->start_controls_section(
			'translate',
			[
				'label' => __('String Translate', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'days',
			[
				'label' => __( 'Plural Days', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Days', 'massive-addons'),
				'placeholder' => __( '', 'massive-addons'),
			]
		);
		$this->add_control(
			'hours',
			[
				'label' => __( 'Plural Hours', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Hours', 'massive-addons'),
				'placeholder' => __( '', 'massive-addons'),
			]
		);
		$this->add_control(
			'minutes',
			[
				'label' => __( 'Plural Minutes', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Minutes', 'massive-addons'),
				'placeholder' => __( '', 'massive-addons'),
			]
		);
		$this->add_control(
			'seconds',
			[
				'label' => __( 'Plural Seconds', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Seconds', 'massive-addons'),
				'placeholder' => __( '', 'massive-addons'),
			]
		);
		$this->add_control(
			'day',
			[
				'label' => __( 'Singular Day', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Day', 'massive-addons'),
				'placeholder' => __( '', 'massive-addons'),
			]
		);
		$this->add_control(
			'hour',
			[
				'label' => __( 'Singular Hour', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Hour', 'massive-addons'),
				'placeholder' => __( '', 'massive-addons'),
			]
		);
		$this->add_control(
			'minute',
			[
				'label' => __( 'Singular Minute', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Minute', 'massive-addons'),
				'placeholder' => __( '', 'massive-addons'),
			]
		);
		$this->add_control(
			'second',
			[
				'label' => __( 'Singular Second', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Second', 'massive-addons'),
				'placeholder' => __( '', 'massive-addons'),
			]
		);

        $this->end_controls_section();
		$this->start_controls_section(
			'mae_pro',
			[
				'label' => esc_html__('PRO Features', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'mae_pro_html',
			[
				'label' => __( '', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'content_classes' => 'mae-pro-prepare',
				'raw' => __( '<br/><div>Meet Our Prime Addons for Elementor</div><br/>Thank you for installing our plugin, you can also try our premium version which includes 20+ Creative Addons<br/><br/><a target="_blank" href="http://tiny.cc/prime-pro">View Demo <sup>✱</sup></a>', 'massive-addons'),
			]
		);

		$this->end_controls_section();
        $this->start_controls_section(
			'count_style',
			[
				'label' => __('Count', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'count_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-countdown .mae-countdown-num' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'count_bg',
			[
				'label' => __( 'Background', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-countdown' => 'background-color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'count_typography',
                'label' => __('Typography', 'massive-addons'),
				'selector' => '{{WRAPPER}} .mae-countdown .mae-countdown-num, {{WRAPPER}} .mae-countdown.mae-countdown-1 .mae-countdown-count:after',
				'separator' => 'after',
            ]
		);

        $this->end_controls_section();
        $this->start_controls_section(
			'txt_style',
			[
				'label' => __('Text', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'txt_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-countdown .mae-countdown-txt' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'txt_typography',
                'label' => __('Typography', 'massive-addons'),
				'selector' => '{{WRAPPER}} .mae-countdown .mae-countdown-txt',
				'separator' => 'after',
            ]
		);

        $this->end_controls_section();
        $this->start_controls_section(
			'expire_style',
			[
				'label' => __('Expire Message', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'expire_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-countdown + .mae-expire' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'expire_typography',
                'label' => __('Typography', 'massive-addons'),
				'selector' => '{{WRAPPER}} .mae-countdown + .mae-expire',
				'separator' => 'after',
            ]
		);

        $this->add_control(
			'expire_text_align',
			[
				'label' => __( 'Alignment', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'mae-cd-text-left' => [
						'title' => __( 'Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
					],
					'mae-cd-text-center' => [
						'title' => __( 'Center', 'massive-addons'),
						'icon' => 'fa fa-align-center',
					],
					'mae-cd-text-right' => [
						'title' => __( 'Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'mae-cd-text-center',
				'toggle' => true,
			]
		);
		
		$this->add_control(
			'expire_bg_color',
			[
				'label' => __( 'Background Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-countdown + .mae-expire' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

    protected function render() {
		$settings = $this->get_settings_for_display();

		$date = $settings['date'];
		$expire = $settings['expire'];
		$show_expire = $settings['show_expire'];
		$days = $settings['days'];
		$hours = $settings['hours'];
		$minutes = $settings['minutes'];
		$seconds = $settings['seconds'];
		$day = $settings['day'];
		$hour = $settings['hour'];
		$minute = $settings['minute'];
		$second = $settings['second'];

		$expire_align = $settings['expire_text_align'];	
		?>

		<div class="mae-countdown-wrapper"
			data-days="<?php echo $days; ?>"
			data-hours="<?php echo $hours; ?>"
			data-minutes="<?php echo $minutes; ?>"
			data-seconds="<?php echo $seconds; ?>"
			data-day="<?php echo $day; ?>"
			data-hour="<?php echo $hour; ?>"
			data-minute="<?php echo $minute; ?>"
			data-second="<?php echo $second; ?>">
			<div class="mae-countdown mae-countdown-1" data-time="<?php echo $date; ?>" data-sync="<?php echo get_option('gmt_offset'); ?>">
				<div class="mae-countdown-inner">
					<div class="mae-countdown-box">
						<span class="mae-countdown-count mae-day">
							<span class="mae-countdown-num">00</span>
						</span>
						<span class="mae-countdown-txt"><?php echo $days; ?></span>
					</div>
					<div class="mae-countdown-box">
						<span class="mae-countdown-count mae-hour">
							<span class="mae-countdown-num">00</span>
						</span>
						<span class="mae-countdown-txt"><?php echo $hours; ?></span> 
					</div>
					<div class="mae-countdown-box">
						<span class="mae-countdown-count mae-minute">
							<span class="mae-countdown-num">00</span>
						</span>
						<span class="mae-countdown-txt"><?php echo $minutes; ?></span> 
					</div>	
					<div class="mae-countdown-box">
						<span class="mae-countdown-count mae-second">
							<span class="mae-countdown-num">00</span>
						</span>
						<span class="mae-countdown-txt"><?php echo $seconds; ?></span>
					</div>	
				</div>
			</div>
			<div class="mae-expire <?php echo $expire_align; ?>" data-expire="<?php echo $show_expire; ?>">
				<?php echo $expire; ?>
			</div>
		</div>
		<?php
	}

	protected function _content_template() {
		?>
		<#
			sync = '<?php echo get_option('gmt_offset'); ?>';
		#>
			<div class="mae-countdown-wrapper"
				data-days="{{{settings.days}}}"
				data-hours="{{{settings.hours}}}"
				data-minutes="{{{settings.minutes}}}"
				data-seconds="{{{settings.seconds}}}"
				data-day="{{{settings.day}}}"
				data-hour="{{{settings.hour}}}"
				data-minute="{{{settings.minute}}}"
				data-second="{{{settings.second}}}">
				<div class="mae-countdown mae-countdown-1" data-time="{{{settings.date}}}" data-sync="{{{sync}}}">
					<div class="mae-countdown-inner">
						<div class="mae-countdown-box">
							<span class="mae-countdown-count mae-day">
								<span class="mae-countdown-num">00</span>
							</span>
							<span class="mae-countdown-txt">{{{settings.days}}}</span>
						</div>
						<div class="mae-countdown-box">
							<span class="mae-countdown-count mae-hour">
								<span class="mae-countdown-num">00</span>
							</span>
							<span class="mae-countdown-txt">{{{settings.hours}}}</span> 
						</div>
						<div class="mae-countdown-box">
							<span class="mae-countdown-count mae-minute">
								<span class="mae-countdown-num">00</span>
							</span>
							<span class="mae-countdown-txt">{{{settings.minutes}}}</span> 
						</div>	
						<div class="mae-countdown-box">
							<span class="mae-countdown-count mae-second">
								<span class="mae-countdown-num">00</span>
							</span>
							<span class="mae-countdown-txt">{{{settings.seconds}}}</span>
						</div>	
					</div>
				</div>
				<div class="mae-expire {{{settings.expire_text_align}}}" data-expire="{{{settings.show_expire}}}">
					{{{settings.expire}}}
				</div>
			</div>
		<?php
	}

}

$widgets_manager->register_widget_type(new Massive_CountDown_Widget());