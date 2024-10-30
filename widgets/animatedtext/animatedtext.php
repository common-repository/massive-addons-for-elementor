<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_AnimatedText_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_animatedtext';
	}

	public function get_title() {
		return __('Animated Text', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-animation-text';
    }
    
    public function get_categories() {
		return ['massive_addons'];
	}

	public function get_script_depends() {
		return [
			'mae-js-anm',
			'mae-js-ani'
		];
	}

	protected function _register_controls() {
		
        $this->start_controls_section(
			'general',
			[
				'label' => __('Style', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'design',
		  	[
		   		'label'       	=> esc_html__('Style', 'massive-addons'),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'options' 		=> [
					'mae-animetext-1' => esc_html__('Animation 1', 'massive-addons'),
					'mae-animetext-2' => esc_html__('Animation 2', 'massive-addons'),
					'mae-animetext-3' => esc_html__('Animation 3', 'massive-addons'),
				],
				'default' 		=> 'mae-animetext-1',
			 ]
	    );

        $this->add_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'mae-animetext-left' => [
						'title' => __( 'Left', 'massive-addons'),
						'icon' => 'fa fa-align-left',
					],
					'mae-animetext-center' => [
						'title' => __( 'Center', 'massive-addons'),
						'icon' => 'fa fa-align-center',
					],
					'mae-animetext-right' => [
						'title' => __( 'Right', 'massive-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'mae-animetext-center',
				'toggle' => true,
			]
		);
		
        $this->end_controls_section();
        $this->start_controls_section(
			'content',
			[
				'label' => __('Content', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'before',
			[
				'label' => __( 'Before', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Success is the', 'massive-addons'),
				'placeholder' => __( 'Text Before Animation', 'massive-addons'),
			]
		);
		$this->add_control(
			'animetext',
			[
				'label' => __( 'Animation Text', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Best', 'massive-addons'),
				'placeholder' => __( 'Text to Animate', 'massive-addons'),
			]
		);
		$this->add_control(
			'after',
			[
				'label' => __( 'After', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Revenge', 'massive-addons'),
				'placeholder' => __( 'Text After Animation', 'massive-addons'),
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
			'text_style',
			[
				'label' => __('Style', 'massive-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-animetext .mae-animelines' => 'color: {{VALUE}};',
					'{{WRAPPER}} .mae-animetext .mae-animeletter' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'animetext_color',
			[
				'label' => __( 'Animated Text Color', 'massive-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mae-animetext .mae-animeletter' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __('Typography', 'massive-addons'),
				'selector' => '{{WRAPPER}} .mae-animetext .mae-animelines, {{WRAPPER}} .mae-animetext .mae-animeletter',
				'separator' => 'after',
            ]
		);

		$this->end_controls_section();
	}

    protected function render() {

		$settings = $this->get_settings_for_display();
		$design = $settings['design'];
		$text_align = $settings['text_align'];
		$before = $settings['before'];
		$after = $settings['after'];
		$animetext = $settings['animetext'];
		$anim = explode('-',$settings['design']);

		?>
			<div class="mae-animetext <?php echo $design; ?> <?php echo $text_align; ?>" data-loop="yes" data-anim="<?php echo $anim[2]; ?>">
				<span class="mae-animelines"><?php echo $before; ?></span>
				<span class="mae-animetext-wrapper">
					<span class="mae-animeletters"><?php echo $animetext; ?></span>
				</span>
				<span class="mae-animelines"><?php echo $after; ?></span>
			</div>
		<?php
	}

	protected function _content_template() {
		?>
		<# anim = settings.design.split('-')[2]; #>
		<div class="mae-animetext {{{settings.design}}} {{{settings.text_align}}}" data-loop="yes" data-anim="{{{anim}}}">
			<span class="mae-animelines">{{{settings.before}}}</span>
			<span class="mae-animetext-wrapper">
				<span class="mae-animeletters">{{{settings.animetext}}}</span>
			</span>
			<span class="mae-animelines">{{{settings.after}}}</span>
		</div>
		<?php
	}

}

$widgets_manager->register_widget_type(new Massive_AnimatedText_Widget());