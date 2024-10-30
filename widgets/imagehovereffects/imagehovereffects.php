<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_Elementor_Image_Hover_Effects extends Widget_Base {
	
	public function get_name() {
		return 'massive_eihe';
	}

	public function get_title() {
		return esc_html__('Image Hover Effects', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-image-rollover';
	}

    public function get_categories() {
		return [ 'massive_addons' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'mae_eihe_content',
			[
				'label' => esc_html__('Image Hover Effects', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'mae_eihe_effect',
			[
				'label'       	=> esc_html__('Effect', 'massive-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> [
					'mae-eihe-fade'						=> esc_html__('Fade', 'massive-addons'),
					'mae-eihe-fade-in-up'				=> esc_html__('Fade In Up', 'massive-addons'),
					'mae-eihe-fade-in-down'				=> esc_html__('Fade In Down', 'massive-addons'),
					'mae-eihe-fade-in-left'				=> esc_html__('Fade In Left', 'massive-addons'),
					'mae-eihe-fade-in-right'			=> esc_html__('Fade In Right', 'massive-addons'),
					'mae-eihe-slide-up'					=> esc_html__('Slide Up', 'massive-addons'),
					'mae-eihe-slide-down'				=> esc_html__('Slide Down', 'massive-addons'),
					'mae-eihe-slide-left'				=> esc_html__('Slide Left', 'massive-addons'),
					'mae-eihe-slide-right'				=> esc_html__('Slide Right', 'massive-addons'),
					'mae-eihe-reveal-up'				=> esc_html__('Reveal Up', 'massive-addons'),
					'mae-eihe-reveal-down'				=> esc_html__('Reveal Down', 'massive-addons'),
					'mae-eihe-reveal-left'				=> esc_html__('Reveal Left', 'massive-addons'),
					'mae-eihe-reveal-right'				=> esc_html__('Reveal Right', 'massive-addons'),
					'mae-eihe-push-up'					=> esc_html__('Push Up', 'massive-addons'),
					'mae-eihe-push-down'				=> esc_html__('Push Down', 'massive-addons'),
					'mae-eihe-push-left'				=> esc_html__('Push Left', 'massive-addons'),
					'mae-eihe-push-right'				=> esc_html__('Push Right', 'massive-addons'),
					'mae-eihe-hinge-up'					=> esc_html__('Hinge Up', 'massive-addons'),
					'mae-eihe-hinge-down'				=> esc_html__('Hinge Down', 'massive-addons'),
					'mae-eihe-hinge-left'				=> esc_html__('Hinge Left', 'massive-addons'),
					'mae-eihe-hinge-right'				=> esc_html__('Hinge Right', 'massive-addons'),
					'mae-eihe-flip-horiz'				=> esc_html__('Flip Horizontal', 'massive-addons'),
					'mae-eihe-flip-vert'				=> esc_html__('Flip Vertical', 'massive-addons'),
					'mae-eihe-flip-diag-1'				=> esc_html__('Flip Crosss 1', 'massive-addons'),
					'mae-eihe-flip-diag-2'				=> esc_html__('Flip Crosss 2', 'massive-addons'),
					'mae-eihe-shutter-out-horiz'		=> esc_html__('Shutter Out Horizontal', 'massive-addons'),
					'mae-eihe-shutter-out-vert'			=> esc_html__('Shutter Out Vertical', 'massive-addons'),
					'mae-eihe-shutter-out-diag-1'		=> esc_html__('Shutter Out Crosss 1', 'massive-addons'),
					'mae-eihe-shutter-out-diag-2'		=> esc_html__('Shutter Out Crosss 2', 'massive-addons'),
					'mae-eihe-shutter-in-horiz'			=> esc_html__('Shutter In Horizontal', 'massive-addons'),
					'mae-eihe-shutter-in-vert'			=> esc_html__('Shutter In Vertical', 'massive-addons'),
					'mae-eihe-shutter-in-out-horiz'		=> esc_html__('Shutter In Out Horizontal', 'massive-addons'),
					'mae-eihe-shutter-in-out-vert'		=> esc_html__('Shutter In Out Vertical', 'massive-addons'),
					'mae-eihe-shutter-in-out-diag-1'	=> esc_html__('Shutter In Out Crosss 1', 'massive-addons'),
					'mae-eihe-shutter-in-out-diag-2'	=> esc_html__('Shutter In Out Crosss 2', 'massive-addons'),
					'mae-eihe-fold-up'					=> esc_html__('Fold Up', 'massive-addons'),
					'mae-eihe-fold-down'				=> esc_html__('Fold Down', 'massive-addons'),
					'mae-eihe-fold-left'				=> esc_html__('Fold Left', 'massive-addons'),
					'mae-eihe-fold-right'				=> esc_html__('Fold Right', 'massive-addons'),
					'mae-eihe-zoom-in'					=> esc_html__('Zoom In', 'massive-addons'),
					'mae-eihe-zoom-out'					=> esc_html__('Zoom Out', 'massive-addons'),
					'mae-eihe-zoom-out-up'				=> esc_html__('Zoom Out Up', 'massive-addons'),
					'mae-eihe-zoom-out-down'			=> esc_html__('Zoom Out Down', 'massive-addons'),
					'mae-eihe-zoom-out-left'			=> esc_html__('Zoom Out Left', 'massive-addons'),
					'mae-eihe-zoom-out-right'			=> esc_html__('Zoom Out Right', 'massive-addons'),
					'mae-eihe-zoom-out-flip-vert'		=> esc_html__('Zoom Out Flip Vertical', 'massive-addons'),
					'mae-eihe-zoom-out-flip-horiz'		=> esc_html__('Zoom Out Flip Horizontal', 'massive-addons'),
					'mae-eihe-blur'						=> esc_html__('Blur', 'massive-addons'),
				],
				'default' 		=> 'mae-eihe-fade-in-up',
			]
		);

		$this->add_control(
			'mae_eihe_image',
			[
				'label' => esc_html__('Choose Image', 'massive-addons'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'mae_eihe_thumbnail',
				'exclude' => ['custom'],
				'include' => [],
				'default' => 'full',
			]
		);

		$this->add_control(
			'mae_eihe_title',
			[
				'label' => __('Title', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Title', 'massive-addons'),
				'placeholder' => __('Type your title here', 'massive-addons'),
				'label_block' => true,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'mae_eihe_tag',
			[
				'label'     => esc_html__('Title Tag', 'massive-addons'),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1'	=> esc_html__('H1', 'massive-addons'),
					'h2'	=> esc_html__('H2', 'massive-addons'),
					'h3'	=> esc_html__('H3', 'massive-addons'),
					'h4'	=> esc_html__('H4', 'massive-addons'),
					'h5'	=> esc_html__('H5', 'massive-addons'),
					'h6'	=> esc_html__('H6', 'massive-addons'),
					'p'		=> esc_html__('Paragraph', 'massive-addons'),
					'span'	=> esc_html__('Span', 'massive-addons'),

				],
				'default' 	=> 'h3',
			]
		);

		$this->add_control(
			'mae_eihe_description',
			[
				'label' 	  => __('Description', 'massive-addons'),
				'type' 		  => Controls_Manager::TEXTAREA,
				'rows'	 	  => 5,
				'default' 	  => __('Description', 'massive-addons'),
				'placeholder' => __('Type your description here', 'massive-addons'),
				'show_label'  => true,
				'separator' => 'before',
			]
		);

        $this->add_control(
            'mae_icon',
            [
                'label'       => __( 'Icon', 'massive-addons'),
                'type'        => Controls_Manager::ICON,
                'label_block' => true,
				'separator' => 'before',
                'default'     => '',
            ]
        );

		$this->add_control(
			'mae_icon_order',
			[
			'label'       	    => esc_html__('Icon Position', 'massive-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> [
					'before' 	=> esc_html__('Before', 'massive-addons'),
					'after' 	=> esc_html__('After', 'massive-addons'),
				],
				'default' 		=> 'after',
			]
		);

		$this->add_control(
			'mae_eihe_link',
			[
				'label' 			=> __('Link To', 'massive-addons'),
				'type' 				=> Controls_Manager::URL,
				'placeholder' 	    => __('https://your-link.com', 'massive-addons'),
				'show_external'     => true,
				'separator' 		=> 'before',
				'default' 		    => [
					'url' 		    => '',
					'is_external' 	=> false,
					'nofollow' 		=> false,
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
			'mae_eihe_content_style', 
			[
				'label'         => esc_html__('Style', 'massive-addons'),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mae_eihe_background_color',
			[
				'label'         => esc_html__('Background', 'massive-addons'),
				'type'          => Controls_Manager::COLOR,
				'default' => '#000',
				'scheme'        => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors'     => [
					"{{WRAPPER}} .mae-eihe-box,
					{{WRAPPER}} .mae-eihe-box .mae-eihe-caption,
					{{WRAPPER}} .mae-eihe-box [class^='mae-eihe-shutter-in-']:after,
					{{WRAPPER}} .mae-eihe-box [class^='mae-eihe-shutter-in-']:before,
					{{WRAPPER}} .mae-eihe-box [class*=' mae-eihe-shutter-in-']:after,
					{{WRAPPER}} .mae-eihe-box [class*=' mae-eihe-shutter-in-']:before,
					{{WRAPPER}} .mae-eihe-box [class^='mae-eihe-shutter-out-']:before,
					{{WRAPPER}} .mae-eihe-box [class*=' mae-eihe-shutter-out-']:before,
					{{WRAPPER}} .mae-eihe-box [class^='mae-eihe-reveal-']:before,
					{{WRAPPER}} .mae-eihe-box [class*=' mae-eihe-reveal-']:before"  => "background-color: {{VALUE}};",
				]
			]
		);

		$this->add_responsive_control(
			'mae_eihe_align',
			[
				'label' => esc_html__('Horizontal Alignment', 'massive-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__('Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'massive-addons'),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => esc_html__('Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					]
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption' => 'align-items: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'mae_eihe_vertical_align',
			[
				'label' => __('Vertical Alignment', 'massive-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'flex-start'  	=> __('Top', 'massive-addons'),
					'center' 		=> __('Middle', 'massive-addons'),
					'flex-end' 		=> __('Bottom', 'massive-addons'),
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption' => 'justify-content: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'mae_eihe_padding',
			[
				'label'      => esc_html__('Padding', 'massive-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default' => [
					'top' => 30,
					'right' => 30,
					'bottom' => 30,
					'left' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'mae_eihe_image_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'massive-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .mae-eihe-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'mae_eihe_title_heading',
			[
				'label' => __('Title', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'mae_eihe_title_color',
			[
				'label' => __('Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption .mae-eihe-title-cover .mae-eihe-title' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mae_eihe_title_typography',
				'label' => __('Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .mae-eihe-box .mae-eihe-caption .mae-eihe-title-cover .mae-eihe-title'
			]
		);

		$this->add_control(
			'mae_eihe_description_heading',
			[
				'label' => __('Description', 'massive-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'mae_eihe_description_color',
			[
				'label' => __('Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption p' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mae_eihe_description_typography',
				'label' => __('Typography', 'massive-addons'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .mae-eihe-box .mae-eihe-caption p'
			]
		);

		$this->add_control(
			'mae_icon_heading',
			[
				'label'     => __('Icon', 'massive-addons'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
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
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption .mae-eihe-title-cover i' => 'color: {{VALUE}};',
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
	                'size' => 30
				],
				'selectors' => [
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption .mae-eihe-title-cover i' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
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
	                'size' => 15
				],
				'selectors' => [
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption .mae-eihe-title-cover i.mae-eihe-ileft' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .mae-eihe-box .mae-eihe-caption .mae-eihe-title-cover i.mae-eihe-iright' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
            ]
        );
		
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$mae_eihe_tag 	= $settings['mae_eihe_tag'];
		$mae_icon 		= $settings['mae_icon'];
		$mae_icon_order = $settings['mae_icon_order'];
		$mae_eihe_align = $settings['mae_eihe_align'];

		$target = $settings['mae_eihe_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['mae_eihe_link']['nofollow'] ? ' rel="nofollow"' : '';

		if (strlen($settings['mae_eihe_link']['url']) != '') { ?>
			<a href="<?php echo $settings['mae_eihe_link']['url']; ?>"<?php echo $target.$nofollow; ?>>
		<?php } ?>
			<div class="mae-eihe-box <?php echo $settings['mae_eihe_effect'] . ' mae_eihe_' . $mae_eihe_align; ?>">
				<?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'mae_eihe_thumbnail', 'mae_eihe_image'); ?>
				<div class="mae-eihe-caption">
					<div class="mae-eihe-title-cover">
						<?php if($mae_icon_order == 'before' && !empty($mae_icon)) { ?> <i class="mae-eihe-ileft <?php echo esc_attr($mae_icon); ?>"></i> <?php } ?>
						<<?php echo $mae_eihe_tag;?> class="mae-eihe-title"><?php echo $settings['mae_eihe_title']; ?></<?php echo $mae_eihe_tag; ?>>
						<?php if($mae_icon_order == 'after' && !empty($mae_icon)) { ?> <i class="mae-eihe-iright <?php echo esc_attr($mae_icon); ?>"></i> <?php } ?>
					</div>
					<p><?php echo $settings['mae_eihe_description']; ?></p>
				</div>
			</div>
		<?php if (strlen($settings['mae_eihe_link']['url']) != '') { ?>
			</a>
		<?php }
	}

	protected function _content_template() {
		?>
		<#
		var image = {
			id: settings.mae_eihe_image.id,
			url: settings.mae_eihe_image.url,
			size: settings.mae_eihe_thumbnail_size,
			dimension: settings.mae_eihe_thumbnail_custom_dimension,
			model: view.getEditModel()
		};
		var image_url = elementor.imagesManager.getImageUrl(image);
		var mae_icon = settings.mae_icon;
		var mae_icon_order = settings.mae_icon_order;

		var target = settings.mae_eihe_link.is_external ? ' target="_blank"' : '';
		var nofollow = settings.mae_eihe_link.nofollow ? ' rel="nofollow"' : '';

		if (settings.mae_eihe_link.url.length != '') { #>
			<a href="{{{ settings.mae_eihe_link.url }}}"{{ target }}{{ nofollow }}>
		<# } #>
			<div class="mae-eihe-box {{{ settings.mae_eihe_effect }}} mae_eihe_{{{ settings.mae_eihe_align }}}">
				<img src="{{{ image_url }}}" />
				<div class="mae-eihe-caption">
					<div class="mae-eihe-title-cover">
						<# if(mae_icon != '' && mae_icon_order == 'before'){ #><i class="mae-eihe-ileft {{{ mae_icon }}}"></i><# } #>
						<{{{settings.mae_eihe_tag}}} class="mae-eihe-title">{{{ settings.mae_eihe_title }}}</{{{settings.mae_eihe_tag}}}>
						<# if(mae_icon != '' && mae_icon_order == 'after'){ #><i class="mae-eihe-iright {{{ mae_icon }}}"></i><# } #>
					</div>
					<p>{{{ settings.mae_eihe_description }}}</p>
				</div>
			</div>
		<# if (settings.mae_eihe_link.url.length != '') { #>
			</a>
		<# } #>

		<?php
	}
}

$widgets_manager->register_widget_type(new Massive_Elementor_Image_Hover_Effects());