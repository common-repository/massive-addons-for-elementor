<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_Pricing_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_pricing';
	}

	public function get_title() {
		return __('Pricing Table', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-price-table';
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
			'mae_pricing_content2',
			[
				'label' => __('Header', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'massive-addons'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => 'Startup'
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'massive-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => 'Monthly'
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'massive-addons'),
				'label_block' => true,
				'type' => Controls_Manager::ICON
			]
		);

		$this->add_control(
			'heading1',
			[
				'label' => __( 'Price', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'price_layout',
			[
				'label' => __( 'Layout', 'massive-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'ascending',
				'options' => [
					'default'  => __( 'Default', 'massive-addons'),
					'ascending' => __( 'Ascending', 'massive-addons'),
					'descending' => __( 'Descending', 'massive-addons'),
				],
			]
		);

		$this->add_control(
			'symbol',
			[
				'label' => __( 'Symbol', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => '$'
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => '29'
			]
		);

		$this->add_control(
			'decimal',
			[
				'label' => __( 'Decimal', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => '99'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_pricing_content3',
			[
				'label' => __('Features', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'features',
			[
				'label' => __( 'Features', 'massive-addons'),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'content',
						'label' => __( 'Content', 'massive-addons'),
						'type' => Controls_Manager::TEXT,
						'default' => 'Simple to use',
						'label_block' => true,
					],
					[
						'name' => 'icon',
						'label' => __( 'Icon', 'massive-addons'),
						'type' => Controls_Manager::ICON,
						'default' => '',
						'label_block' => true,
					],
				],
				'default' => [
					[
						'content' => __( 'Unlimited Calls', 'massive-addons'),
					],
					[
						'content' => __( 'VPS Hosting', 'massive-addons'),
					],
					[
						'content' => __( 'Unlimited Addresses', 'massive-addons'),
					],
				],
				'title_field' => '<i class="fa {{{ icon }}}"></i> {{{ content }}}',
			]
		);

		$this->add_control(
			'hr2',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_control(
			'features_align',
			[
				'label' => __( 'Alignment', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'massive-addons'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => false
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_pricing_content4',
			[
				'label' => __('Footer', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label' => __( 'Link', 'massive-addons'),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'massive-addons'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'cta_linkto',
			[
				'label' => __( 'Link To', 'massive-addons'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'button',
				'options' => [
					'none'  => __( 'None', 'massive-addons'),
					'table'  => __( 'Table', 'massive-addons'),
					'button' => __( 'Button', 'massive-addons'),
				],
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'massive-addons'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'massive-addons'),
				'default' => 'Buy Now',
				'condition' => [
					'cta_linkto' => 'button'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_pricing_content5',
			[
				'label' => __('Options', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'enlarge',
			[
				'label' => __('Enlarge', 'massive-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'massive-addons'),
				'label_off' => __( 'No', 'massive-addons'),
				'return_value' => 'mae-pricing-enlarge',
				'default' => '',
			]
		);

		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1.5,
						'step' => 0.01
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1.2,
				],
				'condition' => [
					'enlarge!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-enlarge .mae-pricing' => 'margin: calc(-25px * {{SIZE}}); padding: calc(25px * {{SIZE}}) 0;'
				]
			]
		);

		$this->add_control(
			'hr5',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_control(
			'decor_style',
			[
				'label' => __( 'Decoration', 'massive-addons'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none'  => __( 'None', 'massive-addons'),
					'ribbon'  => __( 'Ribbon', 'massive-addons'),
				],
			]
		);

		$this->add_control(
			'decor_icon',
			[
				'label' => __( 'Icon', 'massive-addons'),
				'label_block' => true,
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
				'condition' => [
					'decor_style' => 'icon'
				]
			]
		);

		$this->add_control(
			'decor_text',
			[
				'label' => __( 'Text', 'massive-addons'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'massive-addons'),
				'default' => 'POPULAR',
				'condition' => [
					'decor_style' => ['ribbon']
				]
			]
		);

		$this->add_control(
			'decor_align',
			[
				'label' => __( 'Alignment', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => false,
				'condition' => [
					'decor_style' => 'ribbon'
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
			'mae_pricing_style',
			[
				'label' => __('General', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'massive-addons'),
				'selector' => '{{WRAPPER}} .mae-pricing',
			]
		);
		$this->add_control(
			'background',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .mae-pricing' => 'background-color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'heading12',
			[
				'label' => __( 'Border', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border',
			[
				'label' => __( 'Style', 'massive-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'none' => __( 'None', 'massive-addons'),
					'solid'  => __( 'Solid', 'massive-addons'),
					'dashed' => __( 'Dashed', 'massive-addons'),
					'dotted' => __( 'Dotted', 'massive-addons'),
					'double' => __( 'Double', 'massive-addons'),
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing' => 'border-style: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'border!' => 'none'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Width', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'condition' => [
					'border!' => 'none'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Radius', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_pricing_style1',
			[
				'label' => __('Header', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading2',
			[
				'label' => __( 'Title', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'title!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'condition' => [
					'title!' => ''
				],
				'selector' => '{{WRAPPER}} .mae-pricing-title'
			]
		);

		$this->add_control(
			'heading3',
			[
				'label' => __( 'Price', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-price' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mae-pricing-price'
			]
		);

		$this->add_control(
			'heading4',
			[
				'label' => __( 'Description', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'description!' => ''
				]
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'description!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-desc' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'condition' => [
					'description!' => ''
				],
				'selector' => '{{WRAPPER}} .mae-pricing-desc'
			]
		);

		$this->add_control(
			'heading5',
			[
				'label' => __( 'Icon', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'icon!' => ''
				]
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'icon!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-icon' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Size', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 130,
				],
				'condition' => [
					'icon!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_pricing_style3',
			[
				'label' => __('Features', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-features' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'list_background',
			[
				'label' => __( 'Background', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-features' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mae-pricing-features'
			]
		);

		$this->add_control(
			'heading10',
			[
				'label' => __( 'Icon', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'list_icon_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-features i.fa-icon' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'list_icon_size',
			[
				'label' => __( 'Size', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-features i.fa-icon' => 'font-size: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'heading8',
			[
				'label' => __( 'Border', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_pricing_style4',
			[
				'label' => __('Footer', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading9',
			[
				'label' => __('Button', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-cta .mae-pricing-button' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'btn_background',
			[
				'label' => __( 'Background', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-cta .mae-pricing-button' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'hr6',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mae-pricing-cta .mae-pricing-button',
			]
		);

		$this->add_control(
			'btn_padding',
			[
				'label' => __('Padding', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-cta .mae-pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'btn_border_radius',
			[
				'label' => __('Border Radius', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .mae-pricing-cta .mae-pricing-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_pricing_style5',
			[
				'label' => __('Decoration', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'dec_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-corner-ribbon' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'dec_background',
			[
				'label' => __( 'Background', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-corner-ribbon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .mae-corner-ribbon::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .mae-corner-ribbon::before' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'dec_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selectors' => [
					'{{WRAPPER}} .mae-corner-ribbon',
				]
			]
		);

		$this->end_controls_section();
		
	}
    
    protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute(
            'pricing',
            [
                'class' => [
					'mae-pricing-wrapper',
					$settings['enlarge'],
					($settings['decor_style'] == 'ribbon') ? 'mae-pricing-ribbon' : ''
                ]
            ]
		);

		$target = $settings['cta_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['cta_link']['nofollow'] ? ' rel="nofollow"' : '';

		?>

		<?php if ($settings['cta_linkto'] == 'table') { ?>
		<a href="<?php echo $settings['cta_link']['url']; ?>"<?php echo $target.$nofollow; ?> <?php echo $this->get_render_attribute_string('pricing'); ?>>
		<?php } else { ?>
		<div <?php echo $this->get_render_attribute_string('pricing'); ?>>
		<?php } ?>

			<div class="mae-pricing">

				<?php if ($settings['decor_style'] == 'ribbon') { ?>
				<div class="mae-corner-ribbon mae-corner-ribbon-<?php echo $settings['decor_align']; ?>"><?php echo $settings['decor_text']; ?></div>
				<?php } ?>

				<div class="mae-pricing-header">
					<?php if (!empty($settings['title'])) { ?>
						<div class="mae-pricing-title"><?php echo $settings['title']; ?></div>
					<?php } ?>
					<?php if (!empty($settings['icon'])) { ?>
						<div class="mae-pricing-icon"><i class="fa <?php echo $settings['icon']; ?>"></i></div>
					<?php } ?>
					<?php if (!empty($settings['price'])) { ?>
						<div class="mae-pricing-price mae-price-<?php echo $settings['price_layout']; ?>"><span class="symbol"><?php echo $settings['symbol']; ?></span><?php echo $settings['price']; ?><span class="decimal"><?php echo $settings['decimal']; ?></span></div>
					<?php } ?>
					<?php if (!empty($settings['description'])) { ?>
						<div class="mae-pricing-desc"><?php echo $settings['description']; ?></div>
					<?php } ?>

				</div>
				<ul class="mae-pricing-features mae-pricing-features-<?php echo $settings['features_align']; ?>">
					<?php foreach ($settings['features'] as $feature) { ?>
						<li>&nbsp;
							<?php if (!empty($feature['icon'])) { ?>
								<i class="fa <?php echo $feature['icon']; ?> fa-icon"></i>
							<?php } ?>
							<?php if (!empty($feature['content'])) { ?>
								<span><?php echo $feature['content']; ?></span>
							<?php } ?>
							&nbsp;
						</li>
					<?php } ?>
				</ul>
				<div class="mae-pricing-cta">
					<?php if (!empty($settings['btn_text']) && $settings['cta_linkto'] == 'button') { ?>
						<a class="mae-pricing-button" href="<?php echo $settings['cta_link']['url']; ?>"<?php echo $target.$nofollow; ?>><?php echo $settings['btn_text']; ?></a>
					<?php } ?>
				</div>
			</div>
		
		<?php if ($settings['cta_linkto'] == 'table') { ?></a><?php } else { ?></div><?php } ?>

		<?php
        
	}
	
	protected function _content_template() {

		?>

		<#

			view.addRenderAttribute('pricing', {
                'class': [
					'mae-pricing-wrapper',
					settings.enlarge,
					(settings.decor_style == 'ribbon') ? 'mae-pricing-ribbon' : ''
                ],
			});

			var target = settings.cta_link.is_external ? ' target="_blank"' : '';
			var nofollow = settings.cta_link.nofollow ? ' rel="nofollow"' : '';

		#>

		<# if (settings.cta_linkto == 'table') { #>
		<a href="{{ settings.cta_link.url }}"{{{ target }}}{{{ nofollow }}} {{{ view.getRenderAttributeString('pricing') }}}>
		<# } else { #>
		<div {{{ view.getRenderAttributeString('pricing') }}}>
		<# } #>

			<div class="mae-pricing">

				<# if (settings.decor_style == 'ribbon') { #>
				<div class="mae-corner-ribbon mae-corner-ribbon-{{ settings.decor_align }}">{{ settings.decor_text }}</div>
				<# } #>

				<div class="mae-pricing-header">
					<# if (settings.title) { #>
						<div class="mae-pricing-title">{{ settings.title }}</div>
					<# } #>
					<# if (settings.icon) { #>
						<div class="mae-pricing-icon"><i class="fa {{ settings.icon }}"></i></div>
					<# } #>
					<# if (settings.price) { #>
						<div class="mae-pricing-price mae-price-{{ settings.price_layout }}"><span class="symbol">{{ settings.symbol }}</span>{{ settings.price }}<span class="decimal">{{ settings.decimal }}</span></div>
					<# } #>
					<# if (settings.description) { #>
						<div class="mae-pricing-desc">{{ settings.description }}</div>
					<# } #>
				</div>
				<ul class="mae-pricing-features mae-pricing-features-{{ settings.features_align }}">
				<# _.each(settings.features, function(feature) { #>
					<li>
						&nbsp;
						<# if (feature.icon) { #>
							<i class="fa {{ feature.icon }} fa-icon"></i>
						<# } #>
						<# if (feature.content) { #>
							<span>{{ feature.content }}</span>
						<# } #>
						&nbsp;
					</li>
				<# }); #>
				</ul>
				<div class="mae-pricing-cta">
					<# if (settings.btn_text && settings.cta_linkto == 'button') { #>
						<a class="mae-pricing-button" href="{{ settings.cta_link.url }}"{{{ target }}}{{{ nofollow }}}>{{ settings.btn_text }}</a>
					<# } #>
				</div>
			</div>

		<# if (settings.cta_linkto == 'table') { #></a><# } else { #></div><# } #>

		<?php

	}

}

$widgets_manager->register_widget_type(new Massive_Pricing_Widget());