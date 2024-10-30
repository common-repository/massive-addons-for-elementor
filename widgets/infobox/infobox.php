<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_InfoBox_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_infobox';
	}

	public function get_title() {
		return __('Info Box', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-info-box';
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
			'mae_info_content1',
			[
				'label' => __('Media', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'media',
			[
				'label' => __( 'Media', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'massive-addons'),
						'icon' => 'fa fa-smile-o',
					],
					'image' => [
						'title' => __( 'Image', 'massive-addons'),
						'icon' => 'fa fa-picture-o',
					]
				],
				'default' => 'icon',
				'toggle' => false,
			]
		);

        $this->add_control(
			'icon',
			[
                'label' => __( 'Icon', 'massive-addons'),
                'label_block' => true,
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',
				'condition' => [
					'media' => 'icon'
				]
			]
        );
        
        $this->add_control(
			'icon_view',
			[
                'label' => __( 'View', 'massive-addons'),
                'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'cover',
				'condition' => [
					'media' => 'icon'
				],
				'options' => [
					'default'  => __( 'Default', 'massive-addons'),
					'cover' => __( 'Cover', 'massive-addons'),
				],
			]
		);
		
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'massive-addons'),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'media' => 'image'
				],
				'default' => [
					'url' => MAE_URL . 'widgets/infobox/heart.png',
				],
			]
		);

		$this->add_control(
			'image_view',
			[
                'label' => __( 'View', 'massive-addons'),
                'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'condition' => [
					'media' => 'image'
				],
				'options' => [
					'default'  => __( 'Default', 'massive-addons'),
					'cover' => __( 'Cover', 'massive-addons'),
				],
			]
		);
		
		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
					],
					'top' => [
						'title' => __( 'Top', 'massive-addons'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => false,
			]
		);

        $this->end_controls_section();
        $this->start_controls_section(
			'mae_info_content2',
			[
				'label' => __('Content', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control(
			'title',
			[
                'label' => __( 'Title', 'massive-addons'),
                'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Title', 'massive-addons'),
				'placeholder' => __( 'Type your title here', 'massive-addons'),
			]
        );
		
		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'massive-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'massive-addons'),
				'placeholder' => __( 'Type your description here', 'massive-addons'),
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
			'title_tag',
			[
                'label' => __( 'Title HTML Tag', 'massive-addons'),
                'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'h1',
				'options' => [
					'h1' => __( 'H1', 'massive-addons'),
					'h2' => __( 'H2', 'massive-addons'),
					'h3' => __( 'H3', 'massive-addons'),
					'h4' => __( 'H4', 'massive-addons'),
					'h5' => __( 'H5', 'massive-addons'),
					'h6' => __( 'H6', 'massive-addons'),
				],
			]
		);
        
        $this->add_control(
			'link',
			[
				'label' => __( 'Link To', 'massive-addons'),
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
			'mae_info_style',
			[
				'label' => __('General', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'info_background',
				'label_block' => true,
				'label' => __( 'Background', 'massive-addons'),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .mae-info'
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'mae_info_style1',
			[
				'label' => __('Media', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->start_controls_tabs('icon_colors');

		$this->start_controls_tab(
			'icon_colors_normal',
			[
				'label' => __( 'Normal', 'massive-addons'),
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
					'media' => 'icon'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-info-icon i' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_background',
				'label' => __( 'Background', 'massive-addons'),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .mae-info-type-icon .mae-info-icon-box.cover',
				'condition' => [
					'media' => 'icon',
					'icon_view!' => ['default']
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'image_background',
				'label' => __( 'Background', 'massive-addons'),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .mae-info-type-image .mae-info-icon-box',
				'condition' => [
					'media' => 'image',
					'image_view' => 'cover'
				]
			]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_colors_hover',
			[
				'label' => __( 'Hover', 'massive-addons'),
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'media' => 'icon'
				],
				'selectors' => [
					'{{WRAPPER}} .mae-info-type-icon:hover .mae-info-icon-box i' => 'color: {{VALUE}};'
				]
			]
        );

		$this->add_control(
			'icon_hover_animation',
			[
				'label' => __( 'Hover Animation', 'massive-addons'),
				'type' => Controls_Manager::HOVER_ANIMATION
			]
		);

		$this->end_controls_tab();

        $this->end_controls_tabs();
        
        $this->add_control(
			'hr3',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
        );

        $this->add_control(
			'icon_size',
			[
				'label' => __( 'Size', 'massive-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-info-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .mae-info-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				]
			]
		);

        $this->add_control(
			'icon_margin',
			[
				'label' => __( 'Padding', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mae-info-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);


        $this->end_controls_section();
        
        $this->start_controls_section(
			'mae_info_style2',
			[
				'label' => __('Content', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'content_background',
			[
				'label' => __( 'Background', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#f0f0f0',
				'selectors' => [
					'{{WRAPPER}} .mae-info-content-box' => 'background-color: {{VALUE}};'
				]
			]
		);
		
		$this->add_control(
			'content_align',
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
				'default' => '',
				'toggle' => true,
			]
        );

        $this->add_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'massive-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mae-info-content-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );
        
        $this->add_control(
			'heading1',
			[
				'label' => __( 'Title', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
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
				'selectors' => [
					'{{WRAPPER}} .mae-info-content-box .mae-title' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mae-info-content-box .mae-title'
			]
        );
        
        $this->add_control(
			'heading2',
			[
				'label' => __( 'Description', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
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
				'selectors' => [
					'{{WRAPPER}} .mae-info-content-box .mae-desc' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mae-info-content-box .mae-desc'
			]
        );

        $this->end_controls_section();
	}
    
    protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute(
            'infobox',
            [
                'class' => [
					'mae-info-wrapper',
					'mae-info-type-' . $settings['media'],
					'mae-info-icon-' . $settings['position']
                ]
            ]
		);

		$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

		?>
		
		<?php if (!empty($settings['link']['url'])) { ?>
		<a href="<?php echo $settings['link']['url']; ?>"<?php echo $target.$nofollow; ?> <?php echo $this->get_render_attribute_string('infobox'); ?>>
		<?php } else { ?>
		<div <?php echo $this->get_render_attribute_string('infobox'); ?>>
		<?php } ?>
        
			<div class="mae-info">
				<?php if ($settings['media'] == 'icon' && !empty($settings['icon'])) { ?>
				<div class="mae-info-icon-box <?php echo $settings['icon_view']; ?>">
					<div class="mae-info-icon elementor-animation-<?php echo $settings['icon_hover_animation']; ?>">
						<i class="fa <?php echo $settings['icon']; ?>"></i>
					</div>
				</div>
				<?php } ?>

				<?php if ($settings['media'] == 'image' && !empty($settings['image']['url'])) { ?>
				<div class="mae-info-icon-box <?php echo $settings['image_view']; ?>">
					<div class="mae-info-image elementor-animation-<?php echo $settings['icon_hover_animation']; ?>">
						<img src="<?php echo $settings['image']['url']; ?>" alt="">
					</div>
				</div>
				<?php } ?>
				
				<div class="mae-info-content-box mae-info-content-<?php echo $settings['content_align']; ?>">
					<<?php echo $settings['title_tag']; ?> class="mae-title mae-title-top"><?php echo $settings['title']; ?></<?php echo $settings['title_tag']; ?>>
					<div class="mae-desc"><?php echo $settings['description']; ?></div>
				</div>
			</div>
		
		<?php if (!empty($settings['link']['url'])) { ?></a><?php } else { ?></div><?php } ?>

        <?php

	}
	
	protected function _content_template() {

		?>
		
		<#

		view.addRenderAttribute('infobox', {
			'class': [
				'mae-info-wrapper',
				'mae-info-type-' + settings.media,
				'mae-info-icon-' + settings.position
			],
		});

		var target = settings.link.is_external ? ' target="_blank"' : '';
		var nofollow = settings.link.nofollow ? ' rel="nofollow"' : '';

		#>

		<# if (settings.link.url) { #>
		<a href="{{ settings.link.url }}"{{{ target }}}{{{ nofollow }}} {{{ view.getRenderAttributeString('infobox') }}}>
		<# } else { #>
		<div {{{ view.getRenderAttributeString('infobox') }}}>
		<# } #>
        
            <div class="mae-info">
                <# if (settings.media == 'icon' && settings.icon) { #>
                <div class="mae-info-icon-box {{ settings.icon_view }}">
                    <div class="mae-info-icon elementor-animation-{{ settings.icon_hover_animation }}">
                        <i class="fa {{ settings.icon }}"></i>
                    </div>
                </div>
				<# } #>
				<# if (settings.media == 'image' && settings.image.url) { #>
				<div class="mae-info-icon-box {{ settings.image_view }}">
                    <div class="mae-info-image elementor-animation-{{ settings.icon_hover_animation }}">
                        <img src="{{ settings.image.url }}" alt="">
                    </div>
                </div>
				<# } #>
                <div class="mae-info-content-box mae-info-content-{{ settings.content_align }}">
                    <{{ settings.title_tag }} class="mae-title mae-title-top">{{ settings.title }}</{{ settings.title_tag }}>
                    <div class="mae-desc">{{{ settings.description }}}</div>
                </div>
            </div>
		
		<# if (settings.link.url) { #></a><# } else { #></div><# } #>

        <?php

	}

}

$widgets_manager->register_widget_type(new Massive_InfoBox_Widget());