<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_Divider_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_divider';
	}

	public function get_title() {
		return __('Divider', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-divider';
    }
    
    public function get_categories() {
		return ['massive_addons'];
	}

	protected function _register_controls() {

		$this->addcontent();
		$this->addstyle();

	}

	protected function addcontent() {

        $this->start_controls_section(
			'mae_divider_content1',
			[
				'label' => __('Massive Divider', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'mae_divider_style',
			[
				'label' => __('Style', 'massive-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'mae-divider-default',
				'options' => [
					'mae-divider-default'  => __('Default','massive-addons'),
				]
			]
		);

		$this->add_control(
			'mae_divider_content',
			[
				'label' => __('Content', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'icon' => [
						'title' => __('Icon', 'massive-addons'),
						'icon' => 'fa fa-smile-o',
					],
					'text' => [
						'title' => __('Text', 'massive-addons'),
						'icon' => 'fa fa-font',
					],
				],
				'default' => '',
				'toggle' => true
			]
		);

		$this->add_control(
			'mae_divider_text',
			[
				'label' => __('Text', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Section', 'massive-addons'),
				'placeholder' => __('Type your title here', 'massive-addons'),
				'label_block' => true,
				'condition' => [
					'mae_divider_content' => 'text'
				]
			]
		);

		$this->add_control(
			'mae_divider_icon',
			[
				'label' => __( 'Icon', 'massive-addons'),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',
				'label_block' => true,
				'condition' => [
					'mae_divider_content' => 'icon'
				]
			]
		);

		$this->add_control(
			'mae_divider_content_align',
			[
				'label' => __('Alignment', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'mae-divider-content-left' => [
						'title' => __('Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
					],
					'mae-divider-content-center' => [
						'title' => __('Center', 'massive-addons'),
						'icon' => 'fa fa-align-center',
					],
					'mae-divider-content-right' => [
						'title' => __('Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'mae-divider-content-center',
				'toggle' => true
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
			'mae_divider_style1',
			[
				'label' => __('Divider', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mae_divider_color',
			[
				'label' => __('Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#CF2E5D',
				'selectors' => [
					'{{WRAPPER}} .mae-divider-line span' => 'border-top-color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'mae_divider_weight',
			[
				'label' => __('Weight', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-divider-line span' => 'border-top-width: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'mae_divider_width',
			[
				'label' => __('Width', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 600,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-divider' => 'width: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_divider_style2',
			[
				'label' => __('Content', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mae_divider_content_color',
			[
				'label' => __('Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#CF2E5D',
				'selectors' => [
					'{{WRAPPER}} .mae-divider__content i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .mae-divider__content span' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mae_divider_content_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .mae-divider__content span',
				'condition' => [
					'mae_divider_content' => 'text'
				]
			]
		);

		$this->add_control(
			'mae_divider_content_size',
			[
				'label' => __('Size', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 45,
				],
				'condition' => [
					'mae_divider_content' => 'icon'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-divider__content i' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mae_divider_content_padding',
			[
				'label' => __('Padding', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .mae-divider__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
	}
    
    protected function render() {

		$settings = $this->get_settings_for_display();

		?>

		<div class="mae-divider <?php echo $settings['mae_divider_content_align']; ?>">
			<div class="mae-divider-line mae-side--left <?php echo $settings['mae_divider_style']; ?>">
				<span></span>
			</div>
			<div class="mae-divider__separator">
				<?php if ($settings['mae_divider_content'] == 'icon') { ?>
					<div class="mae-divider__content">
						<i class="<?php echo $settings['mae_divider_icon']; ?>"></i>
					</div>
				<?php } else if ($settings['mae_divider_content'] == 'text') { ?>
					<div class="mae-divider__content">
						<span><?php echo $settings['mae_divider_text']; ?></span>
					</div>
				<?php } ?>
			</div>
			<div class="mae-divider-line mae-side--right <?php echo $settings['mae_divider_style']; ?>">
				<span></span>
			</div>
		</div>

        <?php

	}
	
	protected function _content_template() {

		?>
		
		<div class="mae-divider {{ settings.mae_divider_content_align }}">
			<div class="mae-divider-line mae-side--left {{ settings.mae_divider_style }}">
				<span></span>
			</div>
			<div class="mae-divider__separator">
				<# if (settings.mae_divider_content == 'icon') { #>
				<div class="mae-divider__content">
					<i class="{{ settings.mae_divider_icon }}"></i>
				</div>
				<# } else if (settings.mae_divider_content == 'text') { #>
				<div class="mae-divider__content">
					<span>{{ settings.mae_divider_text }}</span>
				</div>
				<# } #>
			</div>
			<div class="mae-divider-line mae-side--right {{ settings.mae_divider_style }}">
				<span></span>
			</div>
		</div>


        <?php

	}

}

$widgets_manager->register_widget_type(new Massive_Divider_Widget());