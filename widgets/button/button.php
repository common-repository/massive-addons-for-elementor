<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_Button_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_button';
	}

	public function get_title() {
		return __('Advanced Button', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-button';
    }
    
    public function get_categories() {
		return ['massive_addons'];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'mae_btn_general',
			[
				'label' => __('Button', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'mae_btn_effect',
			[
			'label'       	=> esc_html__('Effect', 'massive-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> [
					'mae_btn_slide_dn'   => esc_html__('Slide', 'massive-addons'),
				],
				'default' 		=> 'mae_btn_slide_dn',
			]
		);

		$this->add_control(
			'mae_btn_slide_dn',
			[
				'label'       	=> esc_html__('Slide Direction', 'massive-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> [
					'mae-btn-slide-def' => esc_html__('Default', 'massive-addons'),
					'mae-btn-slide-top' => esc_html__('Top', 'massive-addons'),
					'mae-btn-slide-btm' => esc_html__('Bottom', 'massive-addons'),
					'mae-btn-slide-lft' => esc_html__('Left', 'massive-addons'),
					'mae-btn-slide-rgt' => esc_html__('Right', 'massive-addons'),
				],
				'default' 		=> 'mae-btn-slide-def',
				'condition' => [
					'mae_btn_effect' => 'mae_btn_slide_dn',
				],
			]
		);

		$this->add_control(
			'mae_btn_slide_bg_dn',
			[
				'label'       	=> esc_html__('Slide Background Direction', 'massive-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> [
					'mae-btn-slide-bg-def' => esc_html__('Default', 'massive-addons'),
					'mae-btn-slide-bg-top' => esc_html__('Top', 'massive-addons'),
					'mae-btn-slide-bg-btm' => esc_html__('Bottom', 'massive-addons'),
				],
				'default' 		=> 'mae-btn-slide-bg-def',
				'condition' => [
					'mae_btn_effect' => 'mae_btn_slide_bg_dn',
				],
			]
		);

        $this->add_control(
			'mae_btn_text_align',
			[
				'label' => __( 'Alignment', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'mae-text-left' => [
						'title' => __( 'Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
					],
					'mae-text-center' => [
						'title' => __( 'Center', 'massive-addons'),
						'icon' => 'fa fa-align-center',
					],
					'mae-text-right' => [
						'title' => __( 'Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'mae-text-center',
				'toggle' => true,
			]
		);

        $this->end_controls_section();
        $this->start_controls_section( // Content
			'mae_btn_content',
			[
				'label' => __('Content', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'mae_btn_url',
			[
				'label' 	=> esc_html__( 'Buton URL', 'massive-addons'),
				'type' 		=> Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '',
				],
			]
		);

		$this->start_controls_tabs( 'mae_btn_content_tab' );
		$this->start_controls_tab(
			'mae_btn_content_normal',
			[
				'label' => __( 'Normal', 'massive-addons'),
			]
		);

        $this->add_control(
			'mae_btn_text',
			[
				'label' => __('Normal Text', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Button', 'massive-addons'),
				'placeholder' => __( 'Type your title here', 'massive-addons'),
			]
		);

        $this->add_control(
            'mae_btn_icon',
            [
                'label' => __( 'Foreground Icon', 'massive-addons'),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'default' => '',
            ]
        );

		$this->add_control(
			'mae_btn_icon_order',
			[
			'label'       	=> esc_html__('Icon Position', 'massive-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> [
					'before' 	=> esc_html__('Before', 'massive-addons'),
					'after' 	=> esc_html__('After', 'massive-addons'),
				],
				'default' 		=> 'before',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'mae_btn_content_hover',
			[
				'label' => __( 'Hover', 'massive-addons'),
			]
		);
		
        $this->add_control(
			'mae_btn_text_hover',
			[
				'label' => __('Hover Text', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('', 'massive-addons'),
				'placeholder' => __( 'Type your title here', 'massive-addons'),
			]
		);

        $this->add_control(
            'mae_btn_icon_hover',
            [
                'label' => __( 'Background Icon', 'massive-addons'),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'default' => 'fa fa-heart',
            ]
		);

		$this->add_control(
			'mae_btn_icon_order_hover',
			[
			'label'       	=> esc_html__('Icon Position', 'massive-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> [
					'before' 	=> esc_html__('Before', 'massive-addons'),
					'after' 	=> esc_html__('After', 'massive-addons'),
				],
				'default' 		=> 'after',
			]
		);
		
		$this->end_controls_tab();
		$this->end_controls_tabs();
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
		$this->start_controls_section( // Layer
			'mae_layer_style',
			[
				'label'         => esc_html__('Layer', 'massive-addons'),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mae_bg_color',
			[
				'label' => __( 'Layer Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#eeeeee',
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-bg' => 'background-color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
		$this->start_controls_section( // Button Front
			'mae_btn_style_front', 
			[
				'label'         => esc_html__('Button Front', 'massive-addons'),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mae_btn_color',
			[
				'label' => __( 'Text Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-inner' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mae_btn_typography',
                'label' => __('Typography', 'massive-addons'),
				'selector' => '{{WRAPPER}} .mae-btn .mae-btn-inner',
				'separator' => 'after',
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'mae_btn_bg',
				'label' => esc_html__( 'Background', 'massive-addons'),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .mae-btn',
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'mae_btn_border',
				'label'                 => __( 'Border', 'massive-addons'),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .mae-btn',
				'separator'             => 'before',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section( // Button Back
			'mae_btn_style_back', 
			[
				'label'         => esc_html__('Button Back', 'massive-addons'),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'mae_btn_color_hover',
			[
				'label' => __( 'Text Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-inner-hover' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mae_btn_typography_hover',
                'label' => __('Typography', 'massive-addons'),
				'selector' => '{{WRAPPER}} .mae-btn .mae-btn-inner-hover',
				'separator' => 'after',
            ]
		);

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'mae_btn_bg_hover',
				'label' => esc_html__( 'Background', 'massive-addons'),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .mae-btn:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'mae_btn_border_hover',
				'label'                 => __( 'Border', 'massive-addons'),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .mae-btn:hover',
				'separator'             => 'before',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section( // Icon Front
			'mae_icon_style', 
			[
				'label'         => esc_html__('Icon Front', 'massive-addons'),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
		    'mae_icon_space',
            [
                'label' => __('Icon Space', 'massive-addons'),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
	                'px' => [
		                'min' => 0,
		                'max' => 150,
	                ],
                ],
                'default' => [
	                'size' => 10
				],
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-text i + .mae-btn-inner' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .mae-btn .mae-btn-text .mae-btn-inner + i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
            ]
        );

		$this->add_control(
		    'mae_icon_size',
            [
                'label' => __('Icon Size', 'massive-addons'),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
	                'px' => [
		                'min' => 5,
		                'max' => 200,
	                ],
                ],
                'default' => [
	                'size' => 14
				],
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-text i' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
            ]
        );

		$this->add_control(
			'mae_icon_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#dddddd',
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-text i' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
		$this->start_controls_section( // Icon Back
			'mae_icon_style_hover', 
			[
				'label'         => esc_html__('Icon Back', 'massive-addons'),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
		    'mae_icon_space_hover',
            [
                'label' => __('Icon Space', 'massive-addons'),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
	                'px' => [
		                'min' => 0,
		                'max' => 150,
	                ],
                ],
                'default' => [
	                'size' => 10
				],
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-text-hover i + .mae-btn-inner-hover' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .mae-btn .mae-btn-text-hover .mae-btn-inner-hover + i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
            ]
        );

		$this->add_control(
		    'mae_icon_size_hover',
            [
                'label' => __('Icon Size', 'massive-addons'),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
	                'px' => [
		                'min' => 5,
		                'max' => 200,
	                ],
                ],
                'default' => [
	                'size' => 14
				],
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-text-hover i' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
            ]
        );

		$this->add_control(
			'mae_icon_color_hover',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#555555',
				'selectors' => [
					'{{WRAPPER}} .mae-btn .mae-btn-text-hover i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
    
	}

    protected function render() {

		$settings = $this->get_settings_for_display();
		
		$btn_effect_dn = $settings['mae_btn_effect'];

		$btn_icon = $settings['mae_btn_icon'];
		$btn_icon_order = $settings['mae_btn_icon_order'];

		$btn_icon_hover = $settings['mae_btn_icon_hover'];
		$btn_icon_order_hover = $settings['mae_btn_icon_order_hover'];

        ?>
		<div class="mae-btn-wrapper <?php echo $settings['mae_btn_text_align']; ?>">
			<a href="#" class="mae-btn 
			<?php echo $settings[$btn_effect_dn]; ?>">
				<div class="mae-btn-text"> <?php
					if($btn_icon_order == 'before' && !empty($btn_icon)) { ?> <i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php } ?>
					<?php if(!empty($settings['mae_btn_text'])) { ?><span class="mae-btn-inner"><?php echo $settings['mae_btn_text']; ?></span><?php } 
					if($btn_icon_order == 'after' && !empty($btn_icon)) { ?> <i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php } ?>
				</div>
				<div class="mae-btn-text-hover"> <?php
					if($btn_icon_order_hover == 'before' && !empty($btn_icon_hover)) { ?> <i class="<?php echo esc_attr($btn_icon_hover); ?>"></i> <?php } ?>
					<?php if(!empty($settings['mae_btn_text_hover'])) { ?><span class="mae-btn-inner-hover"><?php echo $settings['mae_btn_text_hover']; ?></span><?php }
					if($btn_icon_order_hover == 'after' && !empty($btn_icon_hover)) { ?> <i class="<?php echo esc_attr($btn_icon_hover); ?>"></i> <?php } ?>
				</div>
				<div class="mae-btn-bg"></div>
			</a>
		</div>
        <?php
	}

	protected function _content_template() {
		?>
		<#

		var btn_effect = settings.mae_btn_effect;
		var settingsdn = settings[btn_effect];

		var btn_icon = settings.mae_btn_icon;
		var btn_icon_order = settings.mae_btn_icon_order;

		var btn_icon_hover = settings.mae_btn_icon_hover;
		var btn_icon_order_hover = settings.mae_btn_icon_order_hover;

		#>
		<div class="mae-btn-wrapper {{{ settings.mae_btn_text_align }}}">
			<a href="#" class="mae-btn {{{ settingsdn }}}">
				<div class="mae-btn-text">
					<# if(btn_icon != '' && btn_icon_order == 'before'){ #>
						<i class="{{{ btn_icon }}}"></i>
					<# } #>
					<# if(settings.mae_btn_text != '') { #><span class="mae-btn-inner">{{{ settings.mae_btn_text }}}</span><# } #>
					<# if(btn_icon != '' && btn_icon_order == 'after'){ #>
						<i class="{{{ btn_icon }}}"></i>
					<# } #>
				</div>
				<div class="mae-btn-text-hover">
					<# if(btn_icon_hover != '' && btn_icon_order_hover == 'before'){ #>
						<i class="{{{ btn_icon_hover }}}"></i>
					<# } #>
					<# if(settings.mae_btn_text_hover != '') { #><span class="mae-btn-inner-hover">{{{ settings.mae_btn_text_hover }}}</span><# } #>
					<# if(btn_icon_hover != '' && btn_icon_order_hover == 'after'){ #>
						<i class="{{{ btn_icon_hover }}}"></i>
					<# } #>
				</div>
				<div class="mae-btn-bg"></div>
			</a>
		</div>

		<?php
	}
}

$widgets_manager->register_widget_type(new Massive_Button_Widget());