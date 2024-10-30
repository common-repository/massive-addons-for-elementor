<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_GoogleMaps_Widget extends Widget_Base {

	public function get_name() {
		return 'massive_gmaps';
	}

	public function get_title() {
		return __( 'Google Maps', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

    public function get_categories() {
		return [ 'massive_addons' ];
	}

	public function get_script_depends() {
		return [
			'mae-gmap',
			'mae-js-map'
		];
	}

	protected function _register_controls() {

	    $this->start_controls_section(
	        'general',
            [
					'label' => __('General', 'massive-addons'),
					'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

		$map_key = get_option('mae_google_maps_api');		
	
	    if(!isset($map_key) || $map_key == ''){
		    $this->add_control(
			    'notice',
			    [
				    'type'  => Controls_Manager::RAW_HTML,
				    'raw'   => '<div style="background: grey;color: white;padding: 20px;margin: -20px -20px 0;font-size: 14px;">
								<a target="_blank" href="'.admin_url('admin.php?page=massive-addons#mae-maps').'" style="color: lightblue;">Click Here</a>
								 to add Google Map API key
                            	</div>'
			    ]
		    );
        }

		$this->add_control(
	    	'lat',
		    [
		    	'label' => __('Latitude', 'massive-addons'),
			    'type'  => Controls_Manager::TEXT,
				'placeholder' => __('Enter latitude value here', 'massive-addons'),
				'default' => '28.612912',
				
		    ]
	    );

		$this->add_control(
			'long',
			[
				'label' => __('Longitude', 'massive-addons'),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => __('Enter latitude value here', 'massive-addons'),
				'default' => '77.229510',
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
	        'style',
            [
					'label' => __('Settings', 'massive-addons'),
					'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'mae_map_style',
			[
				'label' => __( 'Map Style', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default', 'massive-addons'),
					'nolabel'  => __( 'No Label', 'massive-addons'),
					'flatmap' => __( 'Flat Map', 'massive-addons'),
				],				
				
			]
		);
		
		$this->add_responsive_control(
			'height',
			[
				'label' => __('Height','massive-addons'),
				'type'  => Controls_Manager::NUMBER,
				'default' => 350,
				'selectors' => [
					'{{WRAPPER}} .mae-markers' => 'height:{{VALUE}}px'
				]
			]
		);
		$this->add_control(
			'zoom',
			[
				'label' => __('Zoom','massive-addons'),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 20,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
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

	protected function render( ) {

        $settings = $this->get_settings();
	
		$this->add_render_attribute('wrapper', 'data-zoom', $settings['zoom']['size']);
					
		$presets=array();
	
		$presets['default'] = '';
		$presets['nolabel'] = '[{"featureType":"all","elementType":"all","stylers":[{"saturation":"32"},{"lightness":"-3"},{"visibility":"on"},{"weight":"1.18"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"saturation":"-70"},{"lightness":"14"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"saturation":"100"},{"lightness":"-14"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"},{"lightness":"12"}]}]';
		$presets['flatmap'] = '[{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]}]';
		
		$this->add_render_attribute('wrapper', 'data-style', $presets[$settings['mae_map_style']]);
		?>
		<div class="mae-container">
			<div class="placeDiv">
				<div class="placecard__container">

				<div class="placecard__left">
					<p class="placecard__business-name"></p>
					<p class="placecard__info"></p>
					<a class="placecard__view-large" target="_blank" href="https://maps.google.com/maps?ll=18.416035,-66.162618&amp;z=18&amp;t=m&amp;hl=en-US&amp;gl=AR&amp;mapclient=embed&amp;cid=2947398168469204860" id="A_41">View larger map</a>
				</div> <!-- placecard__left -->

				<div class="placecard__right">
					<a class="placecard__direction-link" target="_blank" href="https://maps.google.com/maps?ll=18.416035,-66.162618&amp;z=18&amp;t=m&amp;hl=en-US&amp;gl=AR&amp;mapclient=embed&amp;daddr=Roberto%20Perez%20Obregon%20Law%20Office%209%20Avenida%20Ram%C3%B3n%20Luis%20Rivera%20Bayam%C3%B3n%2C%2000961%20Puerto%20Rico@18.4160349,-66.1626177"
					id="A_9">
						<div class="placecard__direction-icon"></div>
						Directions
					</a>
				</div> <!-- placecard__right -->

				</div> <!-- placecard__container -->
			</div> <!-- placeDiv -->
		</div> <!-- map-container -->
		<div class="mae-markers" <?php echo $this->get_render_attribute_string('wrapper'); ?>>
			<div class="marker" 
				data-lng="<?php echo $settings['long']; ?>" 
				data-lat="<?php echo $settings['lat']; ?>" 
				data-icon="" 
				data-zoom="<?php echo $settings['zoom']['size'];?>"
				data-icon-size="">
			</div>
		</div>
		<?php
		$map_key = get_option('mae_google_maps_api');
		if(!isset($map_key) || $map_key == ''){ ?>
			<div class="mae-apiimage"></div>
		<?php }
	}


	protected function _content_template() {
		?>
		<# apiimage = ''; #>
		<?php
			$map_key = get_option('mae_google_maps_api');
			if(!isset($map_key) || $map_key == ''){
		?>
		<# apiimage = '<div class="mae-apiimage"></div>'; #>
		<?php } ?>
		<# 
		var markers = settings.markers;

		view.addRenderAttribute('wrapper', {
                'data-zoom': settings.zoom.size				
			});

			var map_themes={
				default : '',
				nolabel : '[{"featureType":"all","elementType":"all","stylers":[{"saturation":"32"},{"lightness":"-3"},{"visibility":"on"},{"weight":"1.18"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"saturation":"-70"},{"lightness":"14"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"saturation":"100"},{"lightness":"-14"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"},{"lightness":"12"}]}]',
				flatmap :'[{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]}]',
			}

			view.addRenderAttribute('wrapper', {'data-style': map_themes[settings.mae_map_style] });

			#>
			<div class="mae-container">
				<div class="placeDiv">
					<div class="placecard__container">

					<div class="placecard__left">
						<p class="placecard__business-name">Business Name Goes Here</p>
						<p class="placecard__info">9 Avenida Ramón Luis Rivera, Bayamón, 00961, Puerto Rico</p>
						<a class="placecard__view-large" target="_blank" href="https://maps.google.com/maps?ll=18.416035,-66.162618&amp;z=18&amp;t=m&amp;hl=en-US&amp;gl=AR&amp;mapclient=embed&amp;cid=2947398168469204860" id="A_41">View larger map</a>
					</div> <!-- placecard__left -->

					<div class="placecard__right">
						<a class="placecard__direction-link" target="_blank" href="https://maps.google.com/maps?ll=18.416035,-66.162618&amp;z=18&amp;t=m&amp;hl=en-US&amp;gl=AR&amp;mapclient=embed&amp;daddr=Roberto%20Perez%20Obregon%20Law%20Office%209%20Avenida%20Ram%C3%B3n%20Luis%20Rivera%20Bayam%C3%B3n%2C%2000961%20Puerto%20Rico@18.4160349,-66.1626177"
						id="A_9">
							<div class="placecard__direction-icon"></div>
							Directions
						</a>
					</div> <!-- placecard__right -->

					</div> <!-- placecard__container -->
				</div> <!-- placeDiv -->
			</div> <!-- map-container -->
			<div class="mae-markers" {{{ view.getRenderAttributeString('wrapper') }}}>

				<div class="marker" 
			data-lng="{{settings.long}}" 
			data-lat="{{settings.lat}}" 
			data-icon="" 
			data-zoom="{{settings.zoom.size}}"
			data-icon-size=""></div>
			{{{apiimage}}}
        <?php
	}
}

$widgets_manager->register_widget_type(new Massive_GoogleMaps_Widget());