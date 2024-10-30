<?php
/**
 * Plugin Name: 		Massive Addons for Elementor
 * Plugin URI:  		https://blocksera.com/massive-addons-for-elementor/
 * Author: 				Blocksera
 * Author URI:			https://blocksera.com
 * Description: 		Collection of High Quality Elementor Addons to enhance the Elementor Page Builder
 * Version:     		1.1.1
 * Requires at least:   4.7
 * Tested up to:        5.1.1
 * License: 			GPL v3
 * Text Domain: 		massive-addons
 * Domain Path: 		/languages
**/

if (!defined('ABSPATH')) {
    exit;
}

define('MAE_VERSION', '1.1.1');
define('MAE_MINIMUM_ELEMENTOR_VERSION', '1.1.2');
define('MAE_PATH', plugin_dir_path(__FILE__));
define('MAE_URL', plugin_dir_url(__FILE__));

register_activation_hook(__FILE__, array('Massive_Elementor','activate'));
register_deactivation_hook(__FILE__, array('Massive_Elementor','deactivate'));

require_once MAE_PATH . 'includes/elementor-checker.php';

class Massive_Elementor {

    private static $_instance = null;

    public function activate() {
        add_option('mae_redirect', true);

        add_option('mae_google_maps_api','');
        
        add_option('mae_all','1');
        add_option('mae_maps','1');
        add_option('mae_video','1');
        add_option('mae_audio','1');
        add_option('mae_info_box','1');
        add_option('mae_divider','1');
        add_option('mae_social','1');
        add_option('mae_progress_bar','1');
        add_option('mae_pricing_table','1');
        add_option('mae_accordion','1');
        add_option('mae_button','1');
        add_option('mae_countdown','1');
        add_option('mae_animated_box','1');
        add_option('mae_image_hover','1');
        add_option('mae_content_box','1');


        wp_redirect("admin.php?page=massive-addons");
    }

    public function deactivate() {

    }
    
    public static function get_instance() {
        if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
    }

    public function __construct() {
        add_action('plugins_loaded', [$this, 'init']);
        add_action('admin_init', [$this, 'admininit']);
    }

    public function admininit(){
        if (get_option('mae_redirect', false)) {
            delete_option('mae_redirect');
            if (!is_network_admin()) {
                wp_redirect("admin.php?page=massive-addons");
            }
        }
    }
    
    public function init() {

		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', 'mae_addon_failed_load');
			return;
        }
        
		if (!version_compare(ELEMENTOR_VERSION, MAE_MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', [$this, 'mae_addon_failed_outofdate']);
			return;
        }

        //options
        register_setting('mae_options','mae_google_maps_api');
        register_setting('mae_options','mae_all');
        register_setting('mae_options','mae_maps');
        register_setting('mae_options','mae_video');
        register_setting('mae_options','mae_audio');
        register_setting('mae_options','mae_info_box');
        register_setting('mae_options','mae_divider');
        register_setting('mae_options','mae_social');
        register_setting('mae_options','mae_progress_bar');
        register_setting('mae_options','mae_pricing_table');
        register_setting('mae_options','mae_accordion');
        register_setting('mae_options','mae_button');
        register_setting('mae_options','mae_countdown');
        register_setting('mae_options','mae_animated_box');
        register_setting('mae_options','mae_image_hover');
        register_setting('mae_options','mae_content_box');

        //add admin page
        add_action( 'admin_menu', [$this,'mae_admin_menu']);
        add_action('admin_enqueue_scripts', [$this,'admin_scripts']);
        add_action( 'elementor/editor/before_enqueue_scripts', function() {
			wp_register_style( 'mae-editor-css', MAE_URL . 'assets/admin/css/pro.css');
			wp_enqueue_style( 'mae-editor-css' );
		});

        //widgets
        add_action('elementor/widgets/widgets_registered',      [$this, 'register_widgets']);
        add_action('elementor/elements/categories_registered',  [$this, 'mae_add_elementor_widget_categories']);

        //styles
        add_action('elementor/frontend/after_register_styles',  [$this, 'register_frontend_styles']);
        add_action('elementor/frontend/after_enqueue_styles',   [$this, 'enqueue_frontend_styles']);

        //scripts
        add_action('elementor/editor/before_enqueue_scripts',   [$this, 'before_enqueue_frontend_scripts']);
        add_action('elementor/frontend/after_register_scripts', [$this, 'register_frontend_scripts']);
    }
    
    public function mae_add_elementor_widget_categories($elements_manager) {
        $elements_manager->add_category('massive_addons', array('title' => __('Massive Addons', 'massive-addons-elementor'), 'icon' => 'fa fa-plug'));
    }

    public function before_enqueue_frontend_scripts() {
        wp_enqueue_script('massive-addons-editor', MAE_URL . 'assets/public/editor.js', ['elementor-editor'], MAE_VERSION, true);
    }

    public function register_widgets($widgets_manager) {
        $mae_maps = get_option('mae_maps');
        $mae_video = get_option('mae_video');
        $mae_audio = get_option('mae_audio');
        $mae_info_box = get_option('mae_info_box');
        $mae_divider = get_option('mae_divider');
        $mae_social = get_option('mae_social');
        $mae_progress_bar = get_option('mae_progress_bar');
        $mae_pricing_table = get_option('mae_pricing_table');
        $mae_accordion = get_option('mae_accordion');
        $mae_button = get_option('mae_button');
        $mae_countdown = get_option('mae_countdown');
        $mae_animated_box = get_option('mae_animated_box');
        $mae_image_hover = get_option('mae_image_hover');
        $mae_content_box = get_option('mae_content_box');

        if(isset($mae_accordion) && $mae_accordion != '') require_once(MAE_PATH . 'widgets/accordion/accordion.php');
        if(isset($mae_info_box) && $mae_info_box != '') require_once(MAE_PATH . 'widgets/infobox/infobox.php');
        if(isset($mae_pricing_table) && $mae_pricing_table != '') require_once(MAE_PATH . 'widgets/pricingtable/pricingtable.php');
        if(isset($mae_image_hover) && $mae_image_hover != '') require_once(MAE_PATH . 'widgets/imagehovereffects/imagehovereffects.php');
        if(isset($mae_divider) && $mae_divider != '') require_once(MAE_PATH . 'widgets/divider/divider.php');
        if(isset($mae_progress_bar) && $mae_progress_bar != '') require_once(MAE_PATH . 'widgets/progressbar/progressbar.php');
        if(isset($mae_social) && $mae_social != '') require_once(MAE_PATH . 'widgets/socialicons/socialicons.php');
        if(isset($mae_video) && $mae_video != '') require_once(MAE_PATH . 'widgets/video/video.php');
        if(isset($mae_audio) && $mae_audio != '') require_once(MAE_PATH . 'widgets/audio/audio.php');
        if(isset($mae_content_box) && $mae_content_box != '') require_once(MAE_PATH . 'widgets/contentbox/contentbox.php');
        if(isset($mae_button) && $mae_button != '') require_once(MAE_PATH . 'widgets/button/button.php');
        if(isset($mae_countdown) && $mae_countdown != '') require_once(MAE_PATH . 'widgets/countdown/countdown.php');
        if(isset($mae_animated_box) && $mae_animated_box != '') require_once(MAE_PATH . 'widgets/animatedtext/animatedtext.php');
        if(isset($mae_maps) && $mae_maps != '') require_once(MAE_PATH . 'widgets/gmaps/gmaps.php');
    }

    public function register_frontend_styles(){
        wp_register_style('mae-css-map', MAE_URL . 'widgets/gmaps/gmaps.css', array(), MAE_VERSION);
        wp_register_style('mae-css-vjs', MAE_URL . 'widgets/video/css/video-js.min.css', array(), MAE_VERSION);
        wp_register_style('mae-css-ytb', MAE_URL . 'widgets/video/css/youtube-skin.css', array(), MAE_VERSION);
        wp_register_style('mae-css-vid', MAE_URL . 'widgets/video/css/video.css', array(), MAE_VERSION);
        wp_register_style('mae-css-aud', MAE_URL . 'widgets/audio/audio.css', array(), MAE_VERSION);
        wp_register_style('mae-css-inf', MAE_URL . 'widgets/infobox/infobox.css', array(), MAE_VERSION);
        wp_register_style('mae-css-div', MAE_URL . 'widgets/divider/divider.css', array(), MAE_VERSION);
        wp_register_style('mae-css-soc', MAE_URL . 'widgets/socialicons/socialicons.css', array(), MAE_VERSION);
        wp_register_style('mae-css-prg', MAE_URL . 'widgets/progressbar/progressbar.css', array(), MAE_VERSION);
        wp_register_style('mae-css-tab', MAE_URL . 'widgets/pricingtable/pricingtable.css', array(), MAE_VERSION);
        wp_register_style('mae-css-acc', MAE_URL . 'widgets/accordion/accordion.css', array(), MAE_VERSION);
        wp_register_style('mae-css-btn', MAE_URL . 'widgets/button/button.css', array(), MAE_VERSION);
        wp_register_style('mae-css-ctn', MAE_URL . 'widgets/countdown/countdown.css', array(), MAE_VERSION);
        wp_register_style('mae-css-ani', MAE_URL . 'widgets/animatedtext/animatedtext.css', array(), MAE_VERSION);
        wp_register_style('mae-css-ihe', MAE_URL . 'widgets/imagehovereffects/imagehovereffects.css', array(), MAE_VERSION);
        wp_register_style('mae-css-box', MAE_URL . 'widgets/contentbox/contentbox.css', array(), MAE_VERSION);
    }

    public function enqueue_frontend_styles() {
        $mae_maps = get_option('mae_maps');
        $mae_video = get_option('mae_video');
        $mae_audio = get_option('mae_audio');
        $mae_info_box = get_option('mae_info_box');
        $mae_divider = get_option('mae_divider');
        $mae_social = get_option('mae_social');
        $mae_progress_bar = get_option('mae_progress_bar');
        $mae_pricing_table = get_option('mae_pricing_table');
        $mae_accordion = get_option('mae_accordion');
        $mae_button = get_option('mae_button');
        $mae_countdown = get_option('mae_countdown');
        $mae_animated_box = get_option('mae_animated_box');
        $mae_image_hover = get_option('mae_image_hover');
        $mae_content_box = get_option('mae_content_box');
        
        if(isset($mae_maps) && $mae_maps != '') wp_enqueue_style('mae-css-map');
        if(isset($mae_video) && $mae_video != '') {
            wp_enqueue_style('mae-css-vjs');
            wp_enqueue_style('mae-css-ytb');
            wp_enqueue_style('mae-css-vid');
        }
        if(isset($mae_audio) && $mae_audio != '') wp_enqueue_style('mae-css-aud');
        if(isset($mae_info_box) && $mae_info_box != '') wp_enqueue_style('mae-css-inf');
        if(isset($mae_divider) && $mae_divider != '') wp_enqueue_style('mae-css-div');
        if(isset($mae_social) && $mae_social != '') wp_enqueue_style('mae-css-soc');
        if(isset($mae_progress_bar) && $mae_progress_bar != '') wp_enqueue_style('mae-css-prg');
        if(isset($mae_pricing_table) && $mae_pricing_table != '') wp_enqueue_style('mae-css-tab');
        if(isset($mae_accordion) && $mae_accordion != '') wp_enqueue_style('mae-css-acc');
        if(isset($mae_button) && $mae_button != '') wp_enqueue_style('mae-css-btn');
        if(isset($mae_countdown) && $mae_countdown != '') wp_enqueue_style('mae-css-ctn');
        if(isset($mae_animated_box) && $mae_animated_box != '') wp_enqueue_style('mae-css-ani');
        if(isset($mae_image_hover) && $mae_image_hover != '') wp_enqueue_style('mae-css-ihe');
        if(isset($mae_content_box) && $mae_content_box != '') wp_enqueue_style('mae-css-box');
    }

    public function register_frontend_scripts() {
        $map_key = get_option('mae_google_maps_api');
        if(isset($map_key) && $map_key != ''){
            wp_register_script('mae-gmap', 'https://maps.googleapis.com/maps/api/js?key='.$map_key.'&libraries=places');
        }

        wp_register_script('mae-js-map', MAE_URL . 'widgets/gmaps/gmaps.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-vme', 'https://player.vimeo.com/api/player.js', array(), MAE_VERSION, true);
        wp_register_script('mae-js-vjs', MAE_URL . 'widgets/video/js/video-js.min.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-ytb', MAE_URL . 'widgets/video/js/youtube.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-vid', MAE_URL . 'widgets/video/js/video.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-aud', MAE_URL . 'widgets/audio/audio.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-apl', MAE_URL . 'widgets/audio/audioplayer.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-acc', MAE_URL . 'widgets/accordion/accordion.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-ctn', MAE_URL . 'widgets/countdown/countdown.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-anm', MAE_URL . 'widgets/animatedtext/anime.min.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-ani', MAE_URL . 'widgets/animatedtext/animatedtext.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-way', MAE_URL . 'widgets/progressbar/jquery.waypoints.min.js', array('jquery'), MAE_VERSION, true);
        wp_register_script('mae-js-prg', MAE_URL . 'widgets/progressbar/progressbar.js', array('jquery'), MAE_VERSION, true);
    }

    public function admin_scripts() {
        wp_enqueue_style('mae-css-admin', MAE_URL . 'assets/admin/css/style.css', array(), MAE_VERSION);
		wp_enqueue_script('mae-js-admin', MAE_URL . 'assets/admin/js/common.js', array('jquery'), MAE_VERSION, true);
    }

    public function mae_admin_menu() {
        add_menu_page(
            'Massive Addons for Elementor', 
            'Massive Addons for Elementor',
            'manage_options',
            'massive-addons',
            array( $this , 'mae_admin_page' ),
            '',
            100
        );
    }

    public function mae_admin_page() {
        ?>
        <div class="mae-edit">
            <form action="options.php" method="POST">
                <?php require_once(MAE_PATH . 'includes/admin-settings.php'); ?>
            </form>
        </div>
        <?php
    }
}

Massive_Elementor::get_instance();
?>