<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_ProgressBar_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_progress';
	}

	public function get_title() {
		return __('Progress Bar', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-skill-bar';
    }
    
    public function get_categories() {
		return ['massive_addons'];
	}

	public function get_script_depends() {
		return [
			'mae-js-way',
			'mae-js-prg'
		];
	}

	protected function _register_controls() {

		$this->addcontent();
		$this->addstyle();

	}

	protected function addcontent() {

        $this->start_controls_section(
			'mae_progress_content1',
			[
				'label' => __('Progress Bar', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'mae_progress_value',
			[
				'label' => __('Percentage', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mae-progress-bar-horizontal .mae-progress__complete' => 'width: {{SIZE}}%;',
                ]
			]
        );

        $this->add_control(
			'mae_progress_height',
			[
				'label' => __('Height', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mae-progress__bar' => 'height: {{SIZE}}px;',
                    '{{WRAPPER}} .mae-progress__complete' => 'height: {{SIZE}}px;',
                ]
			]
        );
		
        $this->add_control(
			'mae_progress_animate',
			[
				'label' => __('Animate On Scroll', 'massive-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'massive-addons'),
				'label_off' => __('No', 'massive-addons'),
				'return_value' => 'mae-waypoint',
				'default' => 'mae-waypoint',
			]
        );
        
        $this->add_control(
			'mae_progress_heading1',
			[
				'label' => __( 'Content', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_control(
			'mae_progress_text',
			[
				'label' => __('Title', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Awesomeness', 'massive-addons'),
				'placeholder' => __('Type your title here', 'massive-addons'),
				'label_block' => true
			]
		);
        
        $this->add_control(
			'mae_progress_text_align',
			[
				'label' => __('Alignment', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __('Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
						'title' => __('Center', 'massive-addons'),
						'icon' => 'fa fa-align-center',
                    ],
                    'space-between' => [
						'title' => __('Left & Right', 'massive-addons'),
						'icon' => 'fa fa-align-justify',
					],
					'flex-end' => [
						'title' => __('Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'space-between',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .mae-progress__info' => 'justify-content: {{VALUE}};'
                ]
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
	}

	protected function addstyle() {

        $this->start_controls_section(
			'mae_divider_style2',
			[
				'label' => __('Progress Bar', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'mae_progress_background',
			[
				'label' => __('Bar Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mae-progress__complete' => 'background-color: {{VALUE}};'
                ]
			]
        );
        
        $this->add_control(
			'mae_progress_backgroundcolor',
			[
				'label' => __('Background', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#eaeaea',
                'selectors' => [
                    '{{WRAPPER}} .mae-progress__bar' => 'background-color: {{VALUE}};'
                ]
			]
        );
        
        $this->add_control(
			'mae_progress_border_radius',
			[
				'label' => __('Border Radius', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%'],
                'selectors' => [
					'{{WRAPPER}} .mae-progress__complete' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mae-progress__bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		
        $this->end_controls_section();

        $this->start_controls_section(
			'mae_divider_style3',
			[
				'label' => __('Content', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'mae_progress_content_color',
			[
				'label' => __('Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-progress__title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .mae-progress__percent' => 'color: {{VALUE}}'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mae_progress_title_typography',
				'label' => __( 'Title', 'massive-addons'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mae-progress__title'
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mae_progress_percent_typography',
				'label' => __( 'Percent', 'massive-addons'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mae-progress__percent'
			]
		);

        
        $this->end_controls_section();
		
	}
    
    protected function render() {

        $settings = $this->get_settings_for_display();
        
        $this->add_render_attribute(
            'progress-bar',
            [
                'class' => [
                    'mae-progress-bar',
                    'mae-progress-bar-horizontal',
                    $settings['mae_progress_animate']
                ],
                'data-rate' => $settings['mae_progress_value']['size']
            ]
        );

        ?>
        
        <div <?php echo $this->get_render_attribute_string('progress-bar'); ?>>
            <div class="mae-progress__info">
                <span class="mae-progress__title"><?php echo $settings['mae_progress_text']; ?></span>
                <span class="mae-progress__percent"><?php echo $settings['mae_progress_value']['size']; ?>%</span>
            </div>
            <div class="mae-progress__bar"><div class="mae-progress__complete"></div></div>
        </div>
        <?php
	}
	
	protected function _content_template() {
        ?>
        <#
            view.addRenderAttribute('progressbar', {
                'class': [
                    'mae-progress-bar',
                    'mae-progress-bar-horizontal',
                    settings.mae_progress_animate
                ],
            });
        #>

        <div {{{ view.getRenderAttributeString('progressbar') }}}>
            <div class="mae-progress__info">
                <span class="mae-progress__title">{{ settings.mae_progress_text }}</span>
                <span class="mae-progress__percent">{{ settings.mae_progress_value.size }}%</span>
            </div>
            <div class="mae-progress__bar"><div class="mae-progress__complete"></div></div>
        </div>
        <?php
	}

}

$widgets_manager->register_widget_type(new Massive_ProgressBar_Widget());