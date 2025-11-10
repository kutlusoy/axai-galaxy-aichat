<?php
/**
 * Uninstall script for AxAI Galaxy AnythingLLM Chat Widget
 * 
 * File Path: /axai-galaxy-aichat/uninstall.php
 */

// Security check
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete all plugin options
$axai_aichat_options = array(
    // Basic Configuration
    'axai_aichat_embed_id',
    'axai_aichat_server_url',
    'axai_aichat_position',
    'axai_aichat_chat_icon',
    'axai_aichat_open_on_load',
    'axai_aichat_show_thoughts',
    'axai_aichat_no_sponsor',
    'axai_aichat_no_header',

    // AI Settings
    'axai_aichat_prompt',
    'axai_aichat_model',
    'axai_aichat_temperature',
    'axai_aichat_language',
    'axai_aichat_default_messages',

    // Appearance - Branding
    'axai_aichat_brand_image_url',
    'axai_aichat_sponsor_link',
    'axai_aichat_sponsor_text',
    'axai_aichat_support_email',
    'axai_aichat_reset_chat_text',

    // Appearance - Colors
    'axai_aichat_button_color',
    'axai_aichat_user_bg_color',
    'axai_aichat_assistant_bg_color',

    // Appearance - Text
    'axai_aichat_greeting',
    'axai_aichat_send_message_text',
    'axai_aichat_assistant_name',
    'axai_aichat_assistant_icon',

    // Appearance - Dimensions
    'axai_aichat_window_height',
    'axai_aichat_window_width',

    // Theme
    'axai_aichat_theme',
    'axai_aichat_transparency',
    'axai_aichat_blur',

    // Legacy/Old settings (cleanup)
    'axai_aichat_text_size',
    'axai_aichat_text_color',
    'axai_aichat_username',
    'axai_aichat_enable_float',
    'axai_aichat_enable_shadow',
    'axai_aichat_enable_drag',
    'axai_aichat_enable_minimize',
);

// Delete each option
foreach ($axai_aichat_options as $axai_aichat_option) {
    delete_option($axai_aichat_option);
}

// Delete transients
delete_transient('axai_aichat_cache');

// Optional: Remove custom database tables if any were created
global $wpdb;
// Example: $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}axai_aichat_logs");

// Clear any cached data
wp_cache_flush();
