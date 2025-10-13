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
$options = array(
    'axai_aichat_embed_id',
    'axai_aichat_server_url',
    'axai_aichat_position',
    'axai_aichat_chat_icon',
    'axai_aichat_button_color',
    'axai_aichat_window_height',
    'axai_aichat_window_width',
    'axai_aichat_greeting',
    'axai_aichat_send_message_text',
    'axai_aichat_assistant_name',
    'axai_aichat_assistant_icon',
    'axai_aichat_text_color',
    'axai_aichat_user_bg_color',
    'axai_aichat_assistant_bg_color',
    'axai_aichat_prompt',
    'axai_aichat_model',
    'axai_aichat_temperature',
    'axai_aichat_language',
    'axai_aichat_default_messages',
    'axai_aichat_open_on_load',
    'axai_aichat_show_thoughts',
    'axai_aichat_no_sponsor',
    'axai_aichat_no_header',
    'axai_aichat_theme',
    'axai_aichat_transparency',
    'axai_aichat_blur',
    // Old modal settings (no longer used but clean up if present)
    'axai_aichat_enable_float',
    'axai_aichat_enable_shadow',
    'axai_aichat_enable_drag',
    'axai_aichat_enable_minimize',
    // Custom theme colors
    'axai_aichat_custom_primary_bg',
    'axai_aichat_custom_secondary_bg',
    'axai_aichat_custom_header_bg',
    'axai_aichat_custom_text_primary',
    'axai_aichat_custom_text_secondary',
    'axai_aichat_custom_border_color',
    'axai_aichat_custom_user_msg_bg',
    'axai_aichat_custom_user_msg_text',
    'axai_aichat_custom_bot_msg_bg',
    'axai_aichat_custom_bot_msg_text'
);

foreach ($options as $option) {
    delete_option($option);
}

// Optional: Delete transients
delete_transient('axai_aichat_cache');
