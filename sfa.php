<?php

/**
 *=========================
 *Plugin Name: Simple Floating Ads
 *Description: A simple plugin to display floating ads on your website.
 *Version: v1.0.0 Beta
 *Author: Budi Haryono
 *Author URI: https://budiharyono.com/jasa-pembuatan-web/
 *License: GPL2
 *License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *Plugin URI: https://budiharyono.com/
 *=========================
 */

add_action('plugins_loaded', 'sfa_plugin_loaded');
function sfa_plugin_loaded()
{
    if (!function_exists('carbon_fields_boot_plugin')) {
        // If Carbon Fields is not active, deactivate your plugin and display an error message
        add_action('admin_notices', 'sfa_plugin_activation_error');
        add_action('admin_init', 'sfa_deactivate_plugin');
    }
}
function sfa_plugin_activation_error()
{
    echo '<div class="error"><p>You need to install and activate the Carbon Fields plugin first.</p></div>';
}
function sfa_deactivate_plugin()
{
    deactivate_plugins(plugin_basename(__FILE__));
}
add_action('admin_init', 'sfa_check_carbon_fields_deactivation');
function sfa_check_carbon_fields_deactivation()
{
    if (!function_exists('carbon_fields_boot_plugin')) {
        deactivate_plugins(plugin_basename(__FILE__));
    }
}



include 'sfa-options.php';
include 'sfa-front-end.php';


/**
 *=========================
 *NAME: Enqueue Scripts Front End
 *=========================
 */
add_action('wp_enqueue_scripts', 'sfa_enqueue_scripts');
function sfa_enqueue_scripts()
{
    wp_enqueue_style('sfa-style', plugin_dir_url(__FILE__) . 'sfa.css', array(), '1.0.0', 'all');
    wp_enqueue_script('sfa-script', plugin_dir_url(__FILE__) . 'sfa.js', array('jquery'), '1.0.0', true);
}

/**
 *=========================
 *NAME: Enqueue Scripts Admin
 *=========================
 */
add_action('admin_enqueue_scripts', 'sfa_enqueue_scripts_admin');
function sfa_enqueue_scripts_admin()
{
    wp_enqueue_style('sfa-style-admin', plugin_dir_url(__FILE__) . 'sfa-admin.css', array(), '1.0.0', 'all');
}
