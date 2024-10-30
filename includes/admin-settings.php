<?php
    settings_fields('mae_options');
    $mae_google_maps_api = get_option('mae_google_maps_api');

    $mae_all = get_option('mae_all');
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
?>
<h1 class="mae-title-main"><img src="<?php echo MAE_URL; ?>assets/admin/img/mae.png" />Massive Addons for Elementor</h1>
<h2>Thank You for installing our plugin! and you can start using our addons by navigating to edit pages</h1>
<div class="mae-tabs">
    <ul class="mae-head-tabs">
        <li class="mae-tab-link current" data-tab="about"><a href="#mae-about">About</a></li>
        <li class="mae-tab-link" data-tab="addons"><a href="#mae-addons">Addons</a></li>
        <li class="mae-tab-link" data-tab="maps"><a href="#mae-maps">Google Maps API</a></li>
        <li class="mae-tab-link" data-tab="pro"><a href="https://primeaddons.blocksera.com" target="_blank">Get the Pro Version</a></li>
    </ul>
    <div id="mae-about" class="mae-tab-content current">
        <b>Massive Addons:</b>
        <br/><br/>
        Massive Addons for Elementor adds 14 addon elements with first ever fully customizable capabilities that helps you build impressive websites with no coding required.
    </div>
    <div id="mae-addons" class="mae-tab-content">
        <b>Addons List:</b>
        <br/><br/>
        <b>Enable/Disable All Addons:<label style="display: inline-block;margin-left: 10px;margin-top: 5px;"><input type="checkbox" name="mae_all" id="mae_all" value="1" <?php if($mae_all == 1) { echo 'checked';} ?> /><span></span></label></b>
        <br/><br/>
        <ul class="mae-feature-list">
            <li>Google Maps<label for="mae_maps"><input type="checkbox" name="mae_maps" id="mae_maps" value="1" <?php if($mae_maps == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Video<label for="mae_video"><input type="checkbox" name="mae_video" id="mae_video" value="1" <?php if($mae_video == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Audio<label for="mae_audio"><input type="checkbox" name="mae_audio" id="mae_audio" value="1" <?php if($mae_audio == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Info Box<label for="mae_info_box"><input type="checkbox" name="mae_info_box" id="mae_info_box" value="1" <?php if($mae_info_box == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Divider<label for="mae_divider"><input type="checkbox" name="mae_divider" id="mae_divider" value="1" <?php if($mae_divider == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Social Icons<label for="mae_social"><input type="checkbox" name="mae_social" id="mae_social" value="1" <?php if($mae_social == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Progress Bar<label for="mae_progress_bar"><input type="checkbox" name="mae_progress_bar" id="mae_progress_bar" value="1" <?php if($mae_progress_bar == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Pricing Table<label for="mae_pricing_table"><input type="checkbox" name="mae_pricing_table" id="mae_pricing_table" value="1" <?php if($mae_pricing_table == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Accordion<label for="mae_accordion"><input type="checkbox" name="mae_accordion" id="mae_accordion" value="1" <?php if($mae_accordion == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Advanced Button<label for="mae_button"><input type="checkbox" name="mae_button" id="mae_button" value="1" <?php if($mae_button == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>CountDown<label for="mae_countdown"><input type="checkbox" name="mae_countdown" id="mae_countdown" value="1" <?php if($mae_countdown == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Animated Box<label for="mae_animated_box"><input type="checkbox" name="mae_animated_box" id="mae_animated_box" value="1" <?php if($mae_animated_box == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Image Hover Effects<label for="mae_image_hover"><input type="checkbox" name="mae_image_hover" id="mae_image_hover" value="1" <?php if($mae_image_hover == 1) { echo 'checked';} ?> /><span></span></label></li>
            <li>Content Box<label for="mae_content_box"><input type="checkbox" name="mae_content_box" id="mae_content_box" value="1" <?php if($mae_content_box == 1) { echo 'checked';} ?> /><span></span></label></li>
        </ul>
        <br/>
        <input class="button-primary" type="submit" name="Save" value="<?php _e('Save Options', 'massive-addons'); ?>" /><br/>
    </div>
    <div id="mae-maps" class="mae-tab-content">
        <label for="mae_google_maps_api">Google Maps API Key: </label>
        <input type="text" name="mae_google_maps_api" id="mae_google_maps_api" value="<?php echo $mae_google_maps_api; ?>" />
        <br/><br/>
        Massive Google Maps requires an API key. Get your API key from <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Google Developer API</a> and enter it above and Save Options.
        <br/><br/>
        <input class="button-primary" type="submit" name="Save" value="<?php _e('Save Options', 'massive-addons'); ?>" /><br/>
    </div>
</div>