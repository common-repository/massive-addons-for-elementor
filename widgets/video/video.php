<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Massive_Video_Widget extends Widget_Base {
	
	public function get_name() {
		return 'massive_video';
	}

	public function get_title() {
		return __('Video', 'massive-addons');
	}

	public function get_icon() {
		return 'eicon-play';
    }
    
    public function get_categories() {
		return ['massive_addons'];
	}

	public function get_script_depends() {
        return [
			'mae-js-vjs',
			'mae-js-ytb',
			'mae-js-vme',
			'mae-js-vid'
        ];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'content1',
			[
				'label' => __('Video', 'massive-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'source',
			[
				'label' => __('Source', 'massive-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'youtube',
				'options' => [
					'youtube'  => __( 'YouTube', 'massive-addons'),
					'vimeo' => __( 'Vimeo', 'massive-addons'),
				],
			]
		);

		$this->add_control(
			'url',
			[
				'name' => 'link',
				'label' => __('Youtube URL', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'source' => 'youtube'
				],
				'default' => 'https://www.youtube.com/watch?v=xDMP3i36naA',
			]
		);

		$this->add_control(
			'vurl',
			[
				'name' => 'link',
				'label' => __('Vimeo URL', 'massive-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'source' => 'vimeo'
				],
				'default' => 'https://vimeo.com/59777392',
			]
		);
		
		$this->add_control(
			'video_options',
			[
				'label' => __( 'Video Options', 'massive-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'massive-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'False', 'massive-addons'),
				'label_on' => __( 'True', 'massive-addons'),
				'default' => '',
				'return_value' => 'true',
			]
		);

		$this->add_control(
			'muted',
			[
				'label' => __( 'Mute', 'massive-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'False', 'massive-addons'),
				'label_on' => __( 'True', 'massive-addons'),
				'default' => '',
				'return_value' => 'true',
				'condition' => [
					'autoplay!' => 'true'
				]
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop', 'massive-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'False', 'massive-addons'),
				'label_on' => __( 'True', 'massive-addons'),
				'default' => '',
				'return_value' => 'true',
				
			]
		);

		$this->add_control(
			'controls',
			[
				'label' => __( 'Player controls', 'massive-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'massive-addons'),
				'label_on' => __( 'Show', 'massive-addons'),
				'default' => 'true',
				'return_value' => 'true',
				'condition' => [
					'source!' => 'vimeo'
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
    
    protected function render() {

		$settings = $this->get_settings_for_display();
		$url = $settings['url'];
		$vurl = $settings['vurl'];
		$source = $settings['source'];

		$autoplay = $settings['autoplay'];
		$muted = $settings['muted'];
		$loop = $settings['loop'];
		$controls = $settings['controls'];

		if($source == 'youtube'){

			$pattern ='%^(?:https?://)?(?:www\.)?(?:youtu\.be/| youtube\.com(?:/embed/| /v/| .*v=))([\w-]{10,12})($|&).*$%x';
			$output = $url;
			if(strlen($url) != '11') {
				$result = preg_match($pattern, $url, $matches);
				$output = $matches[1];
			}
			if (false !== $result) {
				$embed = 'https://www.youtube.com/watch?v='.$output;
			} else {
				$embed = false;
			}

			$muted = ((string) $autoplay == 'true') ? true : $muted;

			$techorder = $source;
			$type = 'video/'.$source;

			?>
			<div class="mae-video-container">
				<video class="video-js vjs-default-skin" controls autoplay width="640" height="264"
					data-mae="video"
					data-techorder="<?php echo $techorder; ?>"
					data-type="<?php echo $type; ?>"
					data-src="<?php echo $embed; ?>"
					data-autoplay="<?php echo $autoplay; ?>"
					data-muted="<?php echo $muted; ?>"
					data-loop="<?php echo $loop; ?>"
					data-control="<?php echo $controls; ?>">
				</video>
			</div>
			<?php

		} elseif($source == 'vimeo'){

			$id = explode('/', $vurl);
			$id = end($id);
			$embed = $id;
			$muted = ((string) $autoplay == 'true') ? true : $muted;

			?>
			<div class="mae-video-container">
				<div class="vimeo-js"
					data-mae="vimeo"
					data-video="<?php echo $embed; ?>"
					data-autoplay="<?php echo $autoplay; ?>"
					data-muted="<?php echo $muted; ?>"
					data-loop="<?php echo $loop; ?>">
				</div>
			</div>
			<?php
			
		}
	}
	
	protected function _content_template() {
		?>
		<#
		var muted = settings.muted;
		muted = (settings.autoplay.toString() == 'true') ? true : muted;

		if (settings.source == 'youtube') {

			var video_url = settings.url;
			var output = video_url;

			if(video_url.length != '11') {
				var regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
				if(video_url.match(regExp)) {
					var match = video_url.match(regExp);
					output = match[1];
				} else {
					output = '9uOETcuFjbE';
				}		
			}

			var video_id = (output.length==11)? 'https://www.youtube.com/watch?v='+output : false;
			var techorder = settings.source;
			var type = 'video/'+settings.source;

			#>
			<div class="mae-video-container">
				<video class="video-js vjs-default-skin" controls autoplay width="640" height="264"
					data-mae="video"
					data-techorder="{{techorder}}"
					data-type="{{type}}"
					data-src="{{video_id}}"
					data-autoplay="{{settings.autoplay}}"
					data-muted="{{muted}}"
					data-loop="{{settings.loop}}"
					data-control="{{settings.controls}}">
				</video>
			</div>
			<#

		} else if(settings.source == 'vimeo'){

			var video_id = settings.vurl.split('/').pop();
			
			#>
			<div class="mae-video-container">
				<div class="vimeo-js"
					data-mae="vimeo"
					data-video="{{video_id}}"
					data-autoplay="{{settings.autoplay}}"
					data-muted="{{muted}}"
					data-loop="{{settings.loop}}">
				</div>
			</div>
		<# } #>
		<?php

	}
}

$widgets_manager->register_widget_type(new Massive_Video_Widget());