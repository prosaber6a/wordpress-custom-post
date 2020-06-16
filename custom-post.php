<?php
/**
 * Plugin Name: Custom Post
 * Author: SaberHR
 * Plugin URI: http://saberhr.com
 * Author URI: http://saberhr.com
 * Description:
 * Version: 1.0.0
 * Licence: GPLv2 or later
 * Text Domain: custom-post
 * Domain Path: /languages/
 */

function custom_post_load_text_domain () {
	load_plugin_textdomain('custom-post', false, plugin_dir_url(__FILE__) . '/languages');
}
add_action('plugins_loaded', 'custom_post_load_text_domain');




