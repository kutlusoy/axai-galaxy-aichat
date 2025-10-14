<?php
/**
 * Plugin Name: AxAI Galaxy AnythingLLM Chat Widget
 * Plugin URI: https://axai.at
 * Description: Integrates AnythingLLM Chat Widget with advanced theme and customization options
 * Version: 2.1.4
 * Author: Ali Kutlusoy
 * Author URI: https://axai.at
 * License: GPL v2 or later
 * Text Domain: axai-galaxy-aichat
 * 
 * File Path: /axai-galaxy-aichat/axai-galaxy-aichat.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('AXAI_AICHAT_VERSION', '2.1.4');
define('AXAI_AICHAT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AXAI_AICHAT_PLUGIN_URL', plugin_dir_url(__FILE__));

// Plugin class
class AxAI_Galaxy_AIChat {
    
    private static $instance = null;
    
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('wp_footer', array($this, 'render_chat_widget'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
    }
    
    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_options_page(
            'AxAI Galaxy AI Chat',
            'AxAI AI Chat',
            'manage_options',
            'axai-galaxy-aichat',
            array($this, 'render_admin_page')
        );
    }
    
    /**
     * Enqueue admin scripts
     */
    public function enqueue_admin_scripts($hook) {
        if ('settings_page_axai-galaxy-aichat' !== $hook) {
            return;
        }
        
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script(
            'axai-aichat-admin',
            AXAI_AICHAT_PLUGIN_URL . 'assets/js/admin.js',
            array('jquery', 'wp-color-picker'),
            AXAI_AICHAT_VERSION,
            true
        );
        wp_enqueue_style(
            'axai-aichat-admin',
            AXAI_AICHAT_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            AXAI_AICHAT_VERSION
        );
    }
    
    /**
     * Register settings
     */
    public function register_settings() {
        // Basic Configuration > Main settings
        register_setting('axai_aichat_settings', 'axai_aichat_embed_id');
        register_setting('axai_aichat_settings', 'axai_aichat_server_url');
        
        // Basic Configuration > Position & Icon
        register_setting('axai_aichat_settings', 'axai_aichat_position');
        register_setting('axai_aichat_settings', 'axai_aichat_chat_icon');

        // Basic Configuration > Options
        register_setting('axai_aichat_settings', 'axai_aichat_open_on_load');
        register_setting('axai_aichat_settings', 'axai_aichat_show_thoughts');
        register_setting('axai_aichat_settings', 'axai_aichat_no_sponsor');
        register_setting('axai_aichat_settings', 'axai_aichat_no_header');

        // AI Settings > AI Configuration
        register_setting('axai_aichat_settings', 'axai_aichat_prompt');
        register_setting('axai_aichat_settings', 'axai_aichat_model');
        register_setting('axai_aichat_settings', 'axai_aichat_temperature');
        register_setting('axai_aichat_settings', 'axai_aichat_language');
        register_setting('axai_aichat_settings', 'axai_aichat_default_messages');

        // Appearance > Branding
        register_setting('axai_aichat_settings', 'axai_aichat_brand_image_url'); // Neu
        register_setting('axai_aichat_settings', 'axai_aichat_sponsor_link'); // Neu
        register_setting('axai_aichat_settings', 'axai_aichat_sponsor_text'); // Neu
        register_setting('axai_aichat_settings', 'axai_aichat_support_email'); // Neu
        register_setting('axai_aichat_settings', 'axai_aichat_reset_chat_text'); // Neu

        // Appearance > Colors & Text
        register_setting('axai_aichat_settings', 'axai_aichat_button_color');
        register_setting('axai_aichat_settings', 'axai_aichat_user_bg_color');
        register_setting('axai_aichat_settings', 'axai_aichat_assistant_bg_color');
        register_setting('axai_aichat_settings', 'axai_aichat_text_size'); // Neu

        // Appearance > Colors & Text
        register_setting('axai_aichat_settings', 'axai_aichat_greeting');
        register_setting('axai_aichat_settings', 'axai_aichat_send_message_text');
        register_setting('axai_aichat_settings', 'axai_aichat_assistant_name');
        register_setting('axai_aichat_settings', 'axai_aichat_assistant_icon');
        register_setting('axai_aichat_settings', 'axai_aichat_username');

        // Appearance > Window Dimensions
        register_setting('axai_aichat_settings', 'axai_aichat_window_height');
        register_setting('axai_aichat_settings', 'axai_aichat_window_width');
        
        // Color parameters
        register_setting('axai_aichat_settings', 'axai_aichat_text_color');
        
        // Theme > Theme Selection
        register_setting('axai_aichat_settings', 'axai_aichat_theme');
        register_setting('axai_aichat_settings', 'axai_aichat_transparency');
        register_setting('axai_aichat_settings', 'axai_aichat_blur');
        
        // Custom theme colors
        register_setting('axai_aichat_settings', 'axai_aichat_custom_bg_color');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_text_color');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_header_text_color');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_input_bg_color');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_border_color');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_hover_bg_color');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_user_msg_bg');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_user_msg_text');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_bot_msg_bg');
        register_setting('axai_aichat_settings', 'axai_aichat_custom_bot_msg_text');
    }
    
    /**
     * Get theme defaults
     */
    private function get_theme_defaults($theme) {
        $defaults = array(
            'default' => array(
                'user_bg_color' => '#3b82f6',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#f3f4f6',
                'assistant_text_color' => '#222628',
                'button_color' => '#3b82f6'
            ),
            'linux' => array(
                'user_bg_color' => '#003300',
                'user_text_color' => '#00ff00',
                'assistant_bg_color' => '#001100',
                'assistant_text_color' => '#00ff00',
                'button_color' => '#00ff00'
            ),
            'dark' => array(
                'user_bg_color' => '#60a5fa',
                'user_text_color' => '#1f2937',
                'assistant_bg_color' => '#374151',
                'assistant_text_color' => '#f9fafb',
                'button_color' => '#60a5fa'
            ),
            'ocean' => array(
                'user_bg_color' => '#0ea5e9',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#e0f2fe',
                'assistant_text_color' => '#0c4a6e',
                'button_color' => '#0ea5e9'
            ),
            'forest' => array(
                'user_bg_color' => '#16a34a',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#dcfce7',
                'assistant_text_color' => '#14532d',
                'button_color' => '#16a34a'
            ),
            'sunset' => array(
                'user_bg_color' => '#ea580c',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#ffedd5',
                'assistant_text_color' => '#7c2d12',
                'button_color' => '#ea580c'
            ),
            'royal' => array(
                'user_bg_color' => '#7c3aed',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#f3e8ff',
                'assistant_text_color' => '#4c1d95',
                'button_color' => '#7c3aed'
            ),
            'midnight' => array(
                'user_bg_color' => '#6366f1',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#1e293b',
                'assistant_text_color' => '#f1f5f9',
                'button_color' => '#6366f1'
            ),
            'coffee' => array(
                'user_bg_color' => '#92400e',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#fde68a',
                'assistant_text_color' => '#451a03',
                'button_color' => '#d97706'
            ),
            'neon' => array(
                'user_bg_color' => '#00ffff',
                'user_text_color' => '#000000',
                'assistant_bg_color' => '#1a1a1a',
                'assistant_text_color' => '#00ffff',
                'button_color' => '#00ffff'
            ),
            'minimalist' => array(
                'user_bg_color' => '#1e293b',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#f8fafc',
                'assistant_text_color' => '#1e293b',
                'button_color' => '#1e293b'
            ),
            'rose' => array(
                'user_bg_color' => '#e11d48',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#ffe4e6',
                'assistant_text_color' => '#881337',
                'button_color' => '#e11d48'
            ),
            'cyberpunk' => array(
                'user_bg_color' => '#ff00ff',
                'user_text_color' => '#000000',
                'assistant_bg_color' => '#1a0033',
                'assistant_text_color' => '#00ffff',
                'button_color' => '#ff00ff'
            ),
            'nature' => array(
                'user_bg_color' => '#166534',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#dcfce7',
                'assistant_text_color' => '#1a2e05',
                'button_color' => '#84cc16'
            ),
            'professional' => array(
                'user_bg_color' => '#1e40af',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#f8fafc',
                'assistant_text_color' => '#1e293b',
                'button_color' => '#1e40af'
            ),
            'retro' => array(
                'user_bg_color' => '#d97706',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#fde68a',
                'assistant_text_color' => '#78350f',
                'button_color' => '#f59e0b'
            ),
            'candy' => array(
                'user_bg_color' => '#db2777',
                'user_text_color' => '#ffffff',
                'assistant_bg_color' => '#fce7f3',
                'assistant_text_color' => '#831843',
                'button_color' => '#db2777'
            )
        );
        
        return isset($defaults[$theme]) ? $defaults[$theme] : $defaults['default'];
    }
    
    /**
     * Render admin page
     */
    public function render_admin_page() {
        include AXAI_AICHAT_PLUGIN_DIR . 'includes/admin-page.php';
    }
    
    /**
     * Render chat widget on frontend
     */
    public function render_chat_widget() {
        $embed_id = get_option('axai_aichat_embed_id');
        $server_url = get_option('axai_aichat_server_url', 'https://ai.axai.at:3002');
        
        if (empty($embed_id)) {
            return;
        }
        
        // Enqueue theme CSS
        wp_enqueue_style(
            'axai-aichat-themes',
            AXAI_AICHAT_PLUGIN_URL . 'assets/css/themes.css',
            array(),
            AXAI_AICHAT_VERSION
        );
        
        // Build script attributes
        $attributes = array();
        $attributes['data-embed-id'] = esc_attr($embed_id);
        $attributes['data-base-api-url'] = esc_url($server_url) . '/api/embed';
        
        // Get current theme
        $theme = get_option('axai_aichat_theme', 'default');
        $theme_defaults = $this->get_theme_defaults($theme);
        
        // Optional parameters
        $this->add_optional_attribute($attributes, 'position', 'data-position');
        $this->add_optional_attribute($attributes, 'chat_icon', 'data-chat-icon');
        
        // Button color with theme default
        $button_color = get_option('axai_aichat_button_color');
        if (empty($button_color)) {
            $button_color = $theme_defaults['button_color'];
        }
        if (!empty($button_color)) {
            $attributes['data-button-color'] = esc_attr($button_color);
        }
        
        $this->add_optional_attribute($attributes, 'window_height', 'data-window-height');
        $this->add_optional_attribute($attributes, 'window_width', 'data-window-width');
        $this->add_optional_attribute($attributes, 'greeting', 'data-greeting');
        $this->add_optional_attribute($attributes, 'send_message_text', 'data-send-message-text');
        $this->add_optional_attribute($attributes, 'assistant_name', 'data-assistant-name');
        $this->add_optional_attribute($attributes, 'assistant_icon', 'data-assistant-icon');
    
        
        // User background color with theme default
        $user_bg_color = get_option('axai_aichat_user_bg_color');
        if (empty($user_bg_color)) {
            $user_bg_color = $theme_defaults['user_bg_color'];
        }
        if (!empty($user_bg_color)) {
            $attributes['data-user-bg-color'] = esc_attr($user_bg_color);
        }
        
        // Assistant background color with theme default
        $assistant_bg_color = get_option('axai_aichat_assistant_bg_color');
        if (empty($assistant_bg_color)) {
            $assistant_bg_color = $theme_defaults['assistant_bg_color'];
        }
        if (!empty($assistant_bg_color)) {
            $attributes['data-assistant-bg-color'] = esc_attr($assistant_bg_color);
        }
        
        // AI parameters
        $this->add_optional_attribute($attributes, 'prompt', 'data-prompt');
        $this->add_optional_attribute($attributes, 'model', 'data-model');
        $this->add_optional_attribute($attributes, 'temperature', 'data-temperature');
        $this->add_optional_attribute($attributes, 'language', 'data-language');
        $this->add_optional_attribute($attributes, 'default_messages', 'data-default-messages');
        
        // Branding
        $this->add_optional_attribute($attributes, 'brand_image_url', 'data-brand-image-url');
        $this->add_optional_attribute($attributes, 'sponsor_link', 'data-sponsor-link');
        $this->add_optional_attribute($attributes, 'sponsor_text', 'data-sponsor-text');
        $this->add_optional_attribute($attributes, 'support_email', 'data-support-email');
        $this->add_optional_attribute($attributes, 'reset_chat_text', 'data-reset-chat-text');

        // Checkbox parameters
        if (get_option('axai_aichat_open_on_load')) {
            $attributes['data-open-on-load'] = 'true';
        }
        if (get_option('axai_aichat_show_thoughts')) {
            $attributes['data-show-thoughts'] = 'true';
        }
        if (get_option('axai_aichat_no_sponsor')) {
            $attributes['data-no-sponsor'] = 'true';
        }
        if (get_option('axai_aichat_no_header')) {
            $attributes['data-no-header'] = 'true';
        }
        
        // Theme and customizations
        $transparency = get_option('axai_aichat_transparency', '100');
        $blur = get_option('axai_aichat_blur', '0');
        
        // Apply theme class to body
        if ($theme !== 'default') {
            $theme_class = 'axai-theme-' . esc_attr($theme);
            echo '<script>document.body.classList.add("' . $theme_class . '");</script>' . "\n";
        }
        
        // Generate and output custom CSS
        $custom_css = $this->generate_custom_css($theme, $transparency, $blur, $theme_defaults);
        if (!empty($custom_css)) {
            echo '<style id="axai-aichat-custom-inline">' . $custom_css . '</style>' . "\n";
        }
        
        // Output script tag
        echo '<script';
        foreach ($attributes as $key => $value) {
            echo ' ' . $key . '="' . $value . '"';
        }
        echo ' src="' . esc_url($server_url) . '/embed/anythingllm-chat-widget.min.js"></script>' . "\n";
    }
    
    /**
     * Add optional attribute
     */
    private function add_optional_attribute(&$attributes, $option_key, $data_attr) {
        $value = get_option('axai_aichat_' . $option_key);
        if (!empty($value)) {
            $attributes[$data_attr] = esc_attr($value);
        }
    }
    
    /**
     * Generate custom CSS
     */
    private function generate_custom_css($theme, $transparency, $blur, $theme_defaults) {
        $css = '';
        
        // Determine selector based on theme
        if ($theme !== 'default') {
            $selector = 'body.axai-theme-' . esc_attr($theme);
        } else {
            $selector = ':root';
        }
        
        $css .= $selector . ' {' . "\n";
        
        // Transparency
        if ($transparency < 100) {
            $opacity = $transparency / 100;
            $css .= "    --axai-transparency: {$opacity};\n";
        }
        
        // Blur
        if ($blur > 0) {
            $css .= "    --axai-blur: {$blur}px;\n";
        }
        
        // Custom theme colors (only if custom theme selected)
        if ($theme === 'custom') {
            $custom_colors = array(
                'bg_color' => '--axai-bg-color',
                'text_color' => '--axai-text-color',
                'header_text_color' => '--axai-header-text-color',
                'input_bg_color' => '--axai-input-bg-color',
                'border_color' => '--axai-border-color',
                'hover_bg_color' => '--axai-hover-bg-color',
                'user_msg_bg' => '--axai-user-msg-bg',
                'user_msg_text' => '--axai-user-msg-text',
                'bot_msg_bg' => '--axai-bot-msg-bg',
                'bot_msg_text' => '--axai-bot-msg-text'
            );
            
            foreach ($custom_colors as $key => $var) {
                $value = get_option('axai_aichat_custom_' . $key);
                if (!empty($value)) {
                    $css .= "    {$var}: {$value};\n";
                }
            }
        }
        
        $css .= "}\n";
        
        return $css;
    }
}

// Initialize plugin
function axai_galaxy_aichat_init() {
    return AxAI_Galaxy_AIChat::get_instance();
}
add_action('plugins_loaded', 'axai_galaxy_aichat_init');

// Activation hook
register_activation_hook(__FILE__, 'axai_aichat_activate');
function axai_aichat_activate() {
    // Set default values
    add_option('axai_aichat_server_url', 'https://ai.axai.at:3002');
    add_option('axai_aichat_position', 'bottom-right');
    add_option('axai_aichat_chat_icon', 'chatBubble');
    add_option('axai_aichat_theme', 'default');
    add_option('axai_aichat_transparency', '100');
    add_option('axai_aichat_blur', '0');
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'axai_aichat_deactivate');
function axai_aichat_deactivate() {
    // Optional: Cleanup
}