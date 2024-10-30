<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_ContentBox_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_contentbox';
	}

	public function get_title() {
		return esc_html__( 'Content Box Addon', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-post-content';
	}

	public function get_categories() {
		return [ 'massive_addons' ];
	}

	protected function _register_controls() {
		
		// General Settings
		$this->start_controls_section(
			'mae_cbae_general_settings',
			[
				'label' => esc_html__( 'General Settings', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'mae_cbae_hover_style',
			[
			'label'       	=> esc_html__( 'Effects', 'massive-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'mae-cbae-design-1',
				'options' 		=> [
					'mae-cbae-design-1' 	=> esc_html__( 'Design 1', 'massive-addons'),
					'mae-cbae-design-2' 	=> esc_html__( 'Design 2', 'massive-addons'),
					'mae-cbae-design-3' 	=> esc_html__( 'Design 3', 'massive-addons'),
					'mae-cbae-design-4' 	=> esc_html__( 'Design 4', 'massive-addons'),
					'mae-cbae-design-5' 	=> esc_html__( 'Design 5', 'massive-addons'),
					'mae-cbae-design-6' 	=> esc_html__( 'Design 6', 'massive-addons'),
					'mae-cbae-design-7' 	=> esc_html__( 'Design 7', 'massive-addons'),
				],
			]
		);

		$this->add_responsive_control(
			'mae_cbae_text_align',
			[
				'label' => esc_html__( 'Alignment', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'mae-cbae-left' => [
							'title' => esc_html__( 'Left', 'massive-addons'),
							'icon' => 'fa fa-align-left',
					],
					'mae-cbae-center' => [
							'title' => esc_html__( 'Center', 'massive-addons'),
							'icon' => 'fa fa-align-center',
					],
					'mae-cbae-right' => [
							'title' => esc_html__( 'Right', 'massive-addons'),
							'icon' => 'fa fa-align-right',
					]
				],
				'default' => 'mae-cbae-center',
				'condition'    => [
					'mae_cbae_hover_style!' => ['mae-cbae-design-3']
				]
			]
		);

		$this->add_responsive_control(
			'mae_cbae_text_align',
			[
				'label' => esc_html__( 'Alignment', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
						'left' => [
								'title' => esc_html__( 'Left', 'massive-addons'),
								'icon' => 'fa fa-align-left',
						],
						'center' => [
								'title' => esc_html__( 'Center', 'massive-addons'),
								'icon' => 'fa fa-align-center',
						],
						'right' => [
								'title' => esc_html__( 'Right', 'massive-addons'),
								'icon' => 'fa fa-align-right',
						]
				],
				'selectors' => [
						'{{WRAPPER}} .mae-cbae-container' => 'text-align: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'mae_cbae_tag',
			[
				'label' 	=> esc_html__( 'Tag', 'massive-addons'),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> esc_html__( 'Tag', 'massive-addons'),
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-1','mae-cbae-design-2']
				]
			]
		);

		$this->add_control(
			'mae_cbae_title',
			[
				'label' 	=> esc_html__( 'Title', 'massive-addons'),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> esc_html__( 'Title', 'massive-addons'),
			]
		);

		$this->add_control(
			'mae_cbae_description',
			[
				'label' 	=> esc_html__( 'Description', 'massive-addons'),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> esc_html__( 'Description', 'massive-addons'),
			]
		);
		
        $this->add_control(
			'mae_cbae_icon_switch',
			[
				'label'        => esc_html__( 'Show Icon/Image', 'massive-addons'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => esc_html__( 'Icon', 'massive-addons'),
				'label_off'    => esc_html__( 'Image', 'massive-addons'),
				'return_value' => 'yes',
				'condition'    => [
					'mae_cbae_hover_style!' => ['mae-cbae-design-1','mae-cbae-design-2','mae-cbae-design-5']
				]
			]
		);

		$this->add_control(
			'mae_cbae_icon',
			[
				'label' => esc_html__( 'Icon', 'massive-addons'),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-desktop',
				'condition'    => [
					'mae_cbae_hover_style!' => ['mae-cbae-design-1','mae-cbae-design-2','mae-cbae-design-5'],
					'mae_cbae_icon_switch' => 'yes'
				]
			]
		);

		$this->add_control(
			'mae_cbae_icon_image',
			[
				'label'			=> esc_html__( 'Icon Image', 'massive-addons'),
				'type'			=> Controls_Manager::MEDIA,
				'default'		=> [
					'url'		=> ''
				],
				'condition'    => [
					'mae_cbae_hover_style!' => ['mae-cbae-design-1','mae-cbae-design-2','mae-cbae-design-5'],
					'mae_cbae_icon_switch!' => 'yes'
				],
				'show_external'	=> true
			]
		);

		$this->add_control(
			'mae_cbae_image',
			[
				'label'			=> esc_html__( 'Banner Image', 'massive-addons'),
				'type'			=> Controls_Manager::MEDIA,
				'default'		=> [
					'url'		=> Utils::get_placeholder_image_src()
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-1']
				],
				'show_external'	=> true
			]
		);

		$this->add_control(
			'mae_cbae_button_text',
			[
				'label' 	=> esc_html__( 'Button', 'massive-addons'),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> esc_html__( 'Read More', 'massive-addons'),
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);

		$this->add_control(
			'mae_cbae_button_url',
			[
				'label' 	=> esc_html__( 'Buton URL', 'massive-addons'),
				'type' 		=> Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '',
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
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
		$this->start_controls_section(
			'mae_cbae_grid_style', 
			[
				'label'         => esc_html__('Style', 'massive-addons'),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'titlestyle',
			[
				'label' => __( 'Title', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'mae_cbae_title_color',
			[
				'label'         => esc_html__('Color', 'massive-addons'),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .mae-cbae-box h4'  => 'color: {{VALUE}};',
				]
			]
		);
		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'mae_cbae_title_typo',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
				'selector'      => '{{WRAPPER}} .mae-cbae-box h4',
			]
		);
		
		$this->add_responsive_control(
			'mae_cbae_title_line_border_bottom',
			[
				'label' => esc_html__( 'Line Width (%)', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 25,
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mae-cbae-columns .mae-cbae-box hr' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
                    'mae_cbae_hover_style' => 'mae-cbae-design-5',
                ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mae_cbae_title_line_border',
				'label' => esc_html__( 'Border', 'massive-addons'),
				'selector' => '{{WRAPPER}} .mae-cbae-columns .mae-cbae-box hr',
				'default'     => '1px',
				'condition' => [
                    'mae_cbae_hover_style' => 'mae-cbae-design-5',
                ],
			]
		);
        
        $this->add_control(
			'descstyle',
			[
				'label' => __( 'Description', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
        $this->add_control(
			'mae_cbae_desc_color',
			[
				'label'         => esc_html__('Color', 'massive-addons'),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .mae-cbae-box p'  => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'mae_cbae_desc_typo',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
				'selector'      => '{{WRAPPER}} .mae-cbae-box p',
			]
		);
        
        $this->add_control(
			'mae_cbae_tag_color',
			[
				'label'         => esc_html__('Tag Text Color', 'massive-addons'),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .mae-cbae-tag'  => 'color: {{VALUE}};',
				],
				'separator' => 'before',
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-1','mae-cbae-design-2']
				]
			]
		);
        
        $this->add_control(
			'iconstyle',
			[
				'label' => __( 'Icon', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'mae_cbae_icon_font_size',
			[
				'label' => esc_html__( 'Icon Size', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 300,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '40'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-cbae-columns .mae-cbae-box-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .mae-cbae-container .mae-cbae-columns .mae-cbae-box-icon' => 'padding: calc( {{SIZE}}{{UNIT}} / 2 ); width: calc( {{SIZE}}{{UNIT}} * 2 ); height: calc( {{SIZE}}{{UNIT}} * 2 );',
				],
				'condition' => [
					'mae_cbae_icon_switch' => 'yes',
				]
			]
		);
		
        $this->add_control(
			'mae_cbae_icon_color',
			[
				'label'         => esc_html__('Color', 'massive-addons'),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .mae-cbae-box-icon'  => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'mae_cbae_icon_bg',
			[
				'label' => esc_html__( 'Background Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .mae-cbae-box-icon'  => 'background-color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'btnstyle',
			[
				'label' => __( 'Button', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'mae_cbae_button_typo',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
				'selector'      => '{{WRAPPER}} .mae-cbae-info .mae-cbae-button a',
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
		
		$this->add_control(
			'mae_cbae_button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .mae-cbae-info .mae-cbae-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);

		$this->add_control(
			'mae_cbae_box_padding',
			[
				'label' => esc_html__( 'Padding', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .mae-cbae-info .mae-cbae-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				],
			]
		);
		
		$this->add_control(
			'mae_cbae_box_margin',
			[
				'label' => esc_html__( 'Margin', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .mae-cbae-info .mae-cbae-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
		
		$this->start_controls_tabs( 'mae_cbae_button_tab_style' );
		$this->start_controls_tab(
			'mae_cbae_tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'massive-addons'),
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
        
        $this->add_control(
			'mae_cbae_button_color',
			[
				'label'         => esc_html__('Color', 'massive-addons'),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .mae-cbae-info .mae-cbae-button a'  => 'color: {{VALUE}};',
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
		
        $this->add_control(
			'mae_cbae_button_bg',
			[
				'label' => esc_html__( 'Background Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mae-cbae-info .mae-cbae-button a'  => 'background-color: {{VALUE}};',
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
		
		$this->end_controls_tab();
		$this->start_controls_tab(
			'mae_cbae_tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'massive-addons'),
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
		
        
        $this->add_control(
			'mae_cbae_button_color_hover',
			[
				'label'         => esc_html__('Color', 'massive-addons'),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .mae-cbae-info .mae-cbae-button a:hover'  => 'color: {{VALUE}};',
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
		
        $this->add_control(
			'mae_cbae_button_bg_hover',
			[
				'label' => esc_html__( 'Background Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .mae-cbae-info .mae-cbae-button a:hover'  => 'background-color: {{VALUE}};',
				],
				'condition'    => [
					'mae_cbae_hover_style' => ['mae-cbae-design-2']
				]
			]
		);
		
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
        $this->end_controls_section();
		$this->start_controls_section(
			'mae_cbae_box_style', 
			[
				'label'         => esc_html__('Box', 'massive-addons'),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);
		
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'mae_cbae_box_bg',
				'label' => esc_html__( 'Background', 'massive-addons'),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .mae-cbae-box',
			]
		);

		$this->add_control(
			'mae_cbae_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .mae-cbae-box, {{WRAPPER}} .mae-cbae-box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="mae-cbae-container <?php echo $settings['mae_cbae_hover_style'] . ' ' . $settings['mae_cbae_text_align']; ?>" data-hover="<?php echo $settings['mae_cbae_hover_style']; ?>">
			<div class="mae-cbae-columns">
				<div class="mae-cbae-box">
					<?php
					if(($settings['mae_cbae_hover_style'] == 'mae-cbae-design-1') || ($settings['mae_cbae_hover_style'] == 'mae-cbae-design-2')){
						if($settings['mae_cbae_hover_style'] == 'mae-cbae-design-1' && $settings['mae_cbae_image']['url'] != ''){ ?>
							<img src="<?php echo $settings['mae_cbae_image']['url']; ?>" />
						<?php } ?>
						<div class="mae-cbae-info">
							<?php if($settings['mae_cbae_tag'] != ''){ ?><div class="mae-cbae-tag"><?php echo $settings['mae_cbae_tag']; ?></div><?php } ?>
							<?php if($settings['mae_cbae_title'] != ''){ ?><h4><?php echo $settings['mae_cbae_title']; ?> </h4><?php } ?>
							<?php if($settings['mae_cbae_description'] != ''){ ?><p><?php echo $settings['mae_cbae_description']; ?></p><?php } ?>
							<?php if(($settings['mae_cbae_hover_style'] == 'mae-cbae-design-2') && $settings['mae_cbae_button_text'] != ''){ ?>
								<div class="mae-cbae-button">
									<a href="<?php echo $settings['mae_cbae_button_url']['url']; ?>" <?php if(!empty($settings['mae_cbae_button_url']['is_external'])) : ?>target="_blank"<?php endif; ?> <?php if(!empty($settings['mae_cbae_button_url']['nofollow'])) : ?>rel="nofollow"<?php endif; ?>><?php echo $settings['mae_cbae_button_text']; ?></a>
								</div>
							<?php } ?>
						</div>
					<?php } else {
						if($settings['mae_cbae_hover_style'] != 'mae-cbae-design-5'){ ?>
							<div class="mae-cbae-box-left">
							<?php if($settings['mae_cbae_icon_switch'] == 'yes'){ 
								if($settings['mae_cbae_icon'] != ''){ ?><i class="mae-cbae-box-icon <?php echo $settings['mae_cbae_icon']; ?>"></i><?php } ?>
							<?php } else {
								if($settings['mae_cbae_icon_image']['url'] != ''){ ?><img class="mae-cbae-box-icon" src="<?php echo $settings['mae_cbae_icon_image']['url']; ?>" /><?php } ?>
							<?php } ?>
							</div>
						<?php } ?>
						<div class="mae-cbae-box-right">
							<?php
							if($settings['mae_cbae_title'] != ''){ ?><h4><?php echo $settings['mae_cbae_title']; ?> </h4><?php }
							if($settings['mae_cbae_hover_style'] == 'mae-cbae-design-5'){ echo '<hr />'; }
							if($settings['mae_cbae_description'] != ''){ ?><p><?php echo $settings['mae_cbae_description']; ?></p><?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	}

	protected function _content_template() {
		?>
		<div class="mae-cbae-container {{{ settings.mae_cbae_hover_style }}} {{{ settings.mae_cbae_text_align }}}" data-hover="{{{ settings.mae_cbae_hover_style }}}">
			<div class="mae-cbae-columns">
				<div class="mae-cbae-box">
					<#
					if((settings.mae_cbae_hover_style == 'mae-cbae-design-1') || (settings.mae_cbae_hover_style == 'mae-cbae-design-2')){
						if((settings.mae_cbae_hover_style == 'mae-cbae-design-1') && settings.mae_cbae_image.url != ''){ #>
							<img src="{{{ settings.mae_cbae_image.url }}}" />
						<# } #>
						<div class="mae-cbae-info">
							<# if(settings.mae_cbae_tag != ''){ #><div class="mae-cbae-tag">{{{ settings.mae_cbae_tag }}}</div><# } #>
							<# if(settings.mae_cbae_title != ''){ #><h4>{{{ settings.mae_cbae_title }}}</h4><# } #>
							<# if(settings.mae_cbae_description != ''){ #><p>{{{ settings.mae_cbae_description }}}</p><# } #>
							<# if((settings.mae_cbae_hover_style == 'mae-cbae-design-2') && settings.mae_cbae_button_text != ''){ #>
								<div class="mae-cbae-button">
									<a href="{{{ settings.mae_cbae_button_url.url }}}" <# if(settings.mae_cbae_button_url.is_external != ''){ #>target="_blank"<# } #> <# if(settings.mae_cbae_button_url.nofollow != ''){ #>rel="nofollow" <# } #>>{{{ settings.mae_cbae_button_text }}}</a>
								</div>
							<# } #>
						</div>
					<# } else {
						if(settings.mae_cbae_hover_style != 'mae-cbae-design-5') { #>
							<div class="mae-cbae-box-left">
								<# if(settings.mae_cbae_icon_switch == 'yes'){ 
									if(settings.mae_cbae_icon != ''){ #><i class="mae-cbae-box-icon {{{settings.mae_cbae_icon}}}"></i><# } #>
								<# } else {
									if(settings.mae_cbae_icon_image.url != ''){ #><img class="mae-cbae-box-icon" src="{{{ settings.mae_cbae_icon_image.url }}}" /><# } #>
								<# } #>
							</div>
						<# } #>
						<div class="mae-cbae-box-right">
							<#
							if(settings.mae_cbae_title != ''){ #><h4>{{{ settings.mae_cbae_title }}}</h4><# }
							if(settings.mae_cbae_hover_style == 'mae-cbae-design-5') { #> <hr> <# }
							if(settings.mae_cbae_description != ''){ #><p>{{{ settings.mae_cbae_description }}}</p><# } #>
						</div>
					<# } #>
				</div>
			</div>
		</div>
		<?php
	}
}

$widgets_manager->register_widget_type(new Massive_ContentBox_Widget());