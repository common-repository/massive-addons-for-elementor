<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_Audio_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_audio';
	}

	public function get_title() {
		return __('Audio', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-navigation-horizontal';
    }
    
    public function get_categories() {
		return ['massive_addons'];
	}

	public function get_script_depends() {
        return [
			'mae-js-apl',
			'mae-js-aud'
        ];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'settings',
			[
				'label' => __('Audio', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'audio',
			[
				'label' => __( 'Audio Source', 'massive-addons'),
				'type' => Controls_Manager::MEDIA,					
				'media_type' => 'audio',
			]
		);
		
        $this->add_control(
			'audio_options',
			[
				'label' => __( 'Audio Options', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'muted',
			[
				'label' => esc_html__( 'Set Volume', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 100,
					'unit' => 'px',
				],
			]
		);

		$this->add_control(
			'volume',
			[
				'label' => __( 'Show/Hide Volume', 'massive-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'False', 'massive-addons'),
				'label_on' => __( 'True', 'massive-addons'),
				'default' => 'true',
				'return_value' => 'true',
			]
		);
		
        $this->add_control(
			'align',
			[
				'label' => __( 'Alignment', 'plugin-domain' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'plugin-domain' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'plugin-domain' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'plugin-domain' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .mae-audio-container' => 'text-align: {{VALUE}}',
				],
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
			'style',
			[
				'label' => __('Audio', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => __( 'Controls Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#5B82FF',
				'selectors' => [
					'{{WRAPPER}} .mae-audio-container .audioplayer-time' => 'color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer:not(.audioplayer-playing) .audioplayer-playpause' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer:not(.audioplayer-playing) .audioplayer-playpause a' => 'border-left-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-bar-played' => 'background: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-bar-played::after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-volume-button a' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-volume-button a:before' => 'border-right-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-volume-adjust div div' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-volume-adjust div div:after' => 'border-color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'activecolor',
			[
				'label' => __( 'Controls Active Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FD4F1A',
				'selectors' => [
					'{{WRAPPER}} .mae-audio-container .audioplayer-playing .audioplayer-playpause' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-playing .audioplayer-playpause a::before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-playing .audioplayer-playpause a::after' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-playing .audioplayer-bar-played' => 'background: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-playing .audioplayer-bar-played::after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-mute .audioplayer-volume-button a' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-mute .audioplayer-volume-button a:before' => 'border-right-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-mute .audioplayer-volume-adjust div div:after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-volume:hover .audioplayer-volume-button a' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-volume:hover .audioplayer-volume-button a:before' => 'border-right-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-volume:hover .audioplayer-volume-adjust div div' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .mae-audio-container .audioplayer-volume:hover .audioplayer-volume-adjust div div:after' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'border',
				'label'                 => __( 'Border', 'massive-addons'),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .mae-audio-container .audioplayer',
				'separator'             => 'before',
			]
		);

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __('Background', 'plugin-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .mae-audio-container .audioplayer',
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => __('Padding', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .mae-audio-container .audioplayer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'radius',
			[
				'label' => __('Border Radius', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .mae-audio-container .audioplayer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
    }
    
	
    protected function render() {
        $settings = $this->get_settings_for_display();
		
		$audiosrc = $settings['audio']['url'];
		$muted = $settings['muted']['size'];
		$volume = $settings['volume'];

		?>
		<div class="mae-audio-container" data-volume="<?php echo $volume; ?>" data-muted="<?php echo $muted; ?>">
			<audio class="mae-audio">
				<source src="<?php echo $audiosrc; ?>" type="audio/mp3">	
			</audio>
		</div>
		<?php
	}
	
    protected function _content_template() {
		?>
		<div class="mae-audio-container" data-volume="{{{settings.volume}}}" data-muted="{{settings.muted.size}}">
			<audio class="mae-audio">
				<source src="{{{settings.audio.url}}}" type="audio/mp3">
			</audio>
		</div>
    <?php
    }
}
$widgets_manager->register_widget_type(new Massive_Audio_Widget());