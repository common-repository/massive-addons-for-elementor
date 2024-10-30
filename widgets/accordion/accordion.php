<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_Accordion_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_accordion';
	}

	public function get_title() {
		return __('Accordion', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-accordion';
    }
    
    public function get_categories() {
		return ['massive_addons'];
	}

	public function get_script_depends() {
        return [
            'mae-js-acc'
        ];
    }

	protected function _register_controls() {

		$this->addcontent();
		$this->addstyle();

	}

	protected function addcontent() {

		$this->start_controls_section(
			'mae_accordion_content1',
			[
				'label' => __('Accordion', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'items',
			[
				'label' => __('Accordion Items', 'massive-addons'),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Title', 'massive-addons'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'active',
						'label' => __( 'Active', 'massive-addons'),
						'type' =>  Controls_Manager::SWITCHER,
						'label_on' => __( 'Yes', 'massive-addons'),
						'label_off' => __( 'No', 'massive-addons'),
						'return_value' => 'active',
						'default' => '',
					],
					[
						'name' => 'content',
						'label' => __( 'Content', 'massive-addons'),
						'type' => Controls_Manager::WYSIWYG,
						'show_label' => false,
					],
				],
				'default' => [
					[
						'title' => __( 'Accordion #1', 'massive-addons'),
						'active' => 'active',
						'content' => __( 'Lorem ipsum dolor sit amet, consectetur Testadipiscing elit. Morbi eu interdum diam. Donec interdum porttitor risus non bibendum. Maecenas sollicitudin eros in quam imperdiet placerat. ', 'massive-addons'),
					],
					[
						'title' => __( 'Accordion #2', 'massive-addons'),
						'content' => __( 'Lorem ipsum dolor sit amet, consectetur Testadipiscing elit. Morbi eu interdum diam. Donec interdum porttitor risus non bibendum. Maecenas sollicitudin eros in quam imperdiet placerat. ', 'massive-addons'),
					],
					[
						'title' => __( 'Accordion #3', 'massive-addons'),
						'content' => __( 'Lorem ipsum dolor sit amet, consectetur Testadipiscing elit. Morbi eu interdum diam. Donec interdum porttitor risus non bibendum. Maecenas sollicitudin eros in quam imperdiet placerat. ', 'massive-addons'),
					]
				],
				'title_field' => '{{ title }}',
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
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-plus-circle',
			]
		);

		$this->add_control(
			'active_icon',
			[
				'label' => __( 'Active Icon', 'massive-addons'),
				'label_block' => true,
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-minus-circle',
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
			'single',
			[
				'label' => __( 'Single Open', 'massive-addons'),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'massive-addons'),
				'label_off' => __( 'No', 'massive-addons'),
				'return_value' => 'mae-accordion-single',
				'default' => 'mae-accordion-single',
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
			'mae_accordion_style1',
			[
				'label' => __('Accordion', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
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
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-header h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .mae-icon-wrap .mae-general' => 'color: {{VALUE}};'
				]
			]
		);
		
		
		$this->add_control(
			'icon_active_color',
			[
				'label' => __( 'Active Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#53db4e',
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-item.active .mae-accordion-header h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .mae-icon-wrap .mae-hover' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'effects',
			[
				'label' => __( 'Effects', 'massive-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'item',
				'options' => [
					'none'  => __( 'None', 'massive-addons'),
					'item' => __( 'Accordion', 'massive-addons'),
					'title' => __( 'Header', 'massive-addons'),
					'content' => __( 'Content', 'massive-addons'),
				],
			]
		);

		$this->add_control(
			'background',
			[
				'label' => __( 'Background', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'effects!' => 'none'
				],
				'default'=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-background-item .mae-accordion-item, {{WRAPPER}} .mae-accordion-background-title .mae-accordion-header, {{WRAPPER}} .mae-accordion-background-content .mae-accordion-body' => 'background-color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'hr3',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'effects!' => 'none'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-background-item .mae-accordion-item, {{WRAPPER}} .mae-accordion-background-title .mae-accordion-header, {{WRAPPER}} .mae-accordion-background-content .mae-accordion-body' => 'border-color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'condition' => [
					'effects!' => 'none'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-background-item .mae-accordion-item, {{WRAPPER}} .mae-accordion-background-title .mae-accordion-header, {{WRAPPER}} .mae-accordion-background-content .mae-accordion-body' => 'border-width: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'condition' => [
					'effects!' => 'none'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-background-item .mae-accordion-item, {{WRAPPER}} .mae-accordion-background-title .mae-accordion-header, {{WRAPPER}} .mae-accordion-background-content .mae-accordion-body' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_accordion_style4',
			[
				'label' => __('Icon', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Alignment', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'massive-addons'),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'massive-addons'),
						'icon' => 'eicon-h-align-right',
					]
				],
				'default' => 'left',
				'toggle' => true,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Size', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 18,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-icon-wrap' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'icon_spacing',
			[
				'label' => __( 'Spacing', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-left .mae-icon-wrap' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_accordion_style2',
			[
				'label' => __('Title', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .mae-accordion-header h3'
			]
		);

		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mae_accordion_style3',
			[
				'label' => __('Content', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-body' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .mae-accordion-body'
			]
		);

		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .mae-accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();
		
	}
    
    protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute(
            'accordion',
            [
                'class' => [
					'mae-accordion',
					$settings['single'],
					'mae-accordion-background-' . $settings['effects'],
					'mae-accordion-' . $settings['icon_align']
                ]
            ]
		);

		$icon_class = empty($settings['icon']) ? 'mae-icon-wrap-hidden' : 'mae-icon-wrap';
		$active_icon = empty($settings['active_icon']) ? $settings['icon'] : $settings['active_icon'];

		?>

		<ul <?php echo $this->get_render_attribute_string('accordion'); ?>>

			<?php foreach($settings['items'] as $item) { ?>

				<li class="mae-accordion-item <?php echo $item['active']; ?> mae-accordion-icon-fade">

					<div class="mae-accordion-header">

						<div class="<?php echo $icon_class; ?>">
							<i class="fa <?php echo $settings['icon']; ?> mae-general"></i>
							<i class="fa <?php echo $active_icon; ?> mae-hover"></i>
						</div>

						<h3><?php echo $item['title']; ?></h3>
					</div>

					<div class="mae-accordion-body">
                    	<p><?php echo $item['content']; ?></p>
					</div>

				</li>

			<?php } ?>

		</ul>


        <?php

	}
	
	protected function _content_template() {

		?>

		<#
            view.addRenderAttribute('accordion', {
                'class': [
					'mae-accordion',
					settings.single,
					'mae-accordion-background-' + settings.effects,
					'mae-accordion-' + settings.icon_align

                ],
			});

			icon_class = settings.icon ? 'mae-icon-wrap' : 'mae-icon-wrap-hidden';
			active_icon = settings.active_icon ? settings.active_icon : settings.icon;

		#>

		<ul {{{ view.getRenderAttributeString('accordion') }}}>

			<# _.each(settings.items, function(item) { #>

			<li class="mae-accordion-item {{ item.active }} mae-accordion-icon-fade">

				<div class="mae-accordion-header">
					<div class="{{ icon_class }}">
						<i class="fa {{ settings.icon }} mae-general"></i>
						<i class="fa {{ active_icon }} mae-hover"></i>
					</div>
					<h3>{{ item.title }}</h3>
				</div>

				<div class="mae-accordion-body">
					<p>{{{ item.content }}}</p>
				</div>

			</li>

			<# }); #>

		</ul>

        <?php

	}

}

$widgets_manager->register_widget_type(new Massive_Accordion_Widget());