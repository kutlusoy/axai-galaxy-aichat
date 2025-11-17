<?php
/**
 * Plugin Name: AxAI Galaxy AIChat
 * Plugin URI: https://axai.at
 * Description: A powerful WordPress plugin that integrates AnythingLLM Chat Widget with advanced theme customization options and extensive configuration settings. You can use your own AnythingLLM Server (Docker). You can test the functioning version at https://axai.at
 * Version: 2.2.2
 * Author: Ali Kutlusoy
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
define('AXAI_AICHAT_VERSION', '2.2.1');
define('AXAI_AICHAT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AXAI_AICHAT_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Main Plugin Class
 */
class AxAI_Galaxy_AIChat {
    
    private static $instance = null;
    
    /**
     * Get singleton instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
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
        // Basic Configuration
        register_setting('axai_aichat_settings', 'axai_aichat_embed_id', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_server_url', array(
            'sanitize_callback' => 'esc_url_raw'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_position', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_chat_icon', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_open_on_load', array(
            'sanitize_callback' => array($this, 'sanitize_checkbox')
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_show_thoughts', array(
            'sanitize_callback' => array($this, 'sanitize_checkbox')
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_no_sponsor', array(
            'sanitize_callback' => array($this, 'sanitize_checkbox')
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_no_header', array(
            'sanitize_callback' => array($this, 'sanitize_checkbox')
        ));

        // AI Settings
        register_setting('axai_aichat_settings', 'axai_aichat_prompt', array(
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_model', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_temperature', array(
            'sanitize_callback' => array($this, 'sanitize_float')
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_language', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_default_messages', array(
            'sanitize_callback' => 'sanitize_textarea_field'
        ));

        // Appearance - Branding
        register_setting('axai_aichat_settings', 'axai_aichat_brand_image_url', array(
            'sanitize_callback' => 'esc_url_raw'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_sponsor_link', array(
            'sanitize_callback' => 'esc_url_raw'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_sponsor_text', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_support_email', array(
            'sanitize_callback' => 'sanitize_email'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_reset_chat_text', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        // Appearance - Colors
        register_setting('axai_aichat_settings', 'axai_aichat_button_color', array(
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_user_bg_color', array(
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_assistant_bg_color', array(
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Appearance - Text
        register_setting('axai_aichat_settings', 'axai_aichat_greeting', array(
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_send_message_text', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_assistant_name', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_assistant_icon', array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        // Appearance - Dimensions
        register_setting('axai_aichat_settings', 'axai_aichat_window_height', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_window_width', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        // Theme
        register_setting('axai_aichat_settings', 'axai_aichat_theme', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_transparency', array(
            'sanitize_callback' => 'absint'
        ));
        register_setting('axai_aichat_settings', 'axai_aichat_blur', array(
            'sanitize_callback' => 'absint'
        ));
    }

    /**
     * Sanitize checkbox value
     */
    public function sanitize_checkbox($value) {
        return $value ? 1 : 0;
    }

    /**
     * Sanitize float value
     */
    public function sanitize_float($value) {
        return $value !== '' ? floatval($value) : '';
    }
    
    /**
     * Get theme defaults
     */
    private function get_theme_defaults($theme) {
        $defaults = array(
            'default' => array(
                'user_bg_color' => '#3b82f6',
                'assistant_bg_color' => '#f3f4f6',
                'button_color' => '#3b82f6',
                'sponsor_color' => '#3b82f6'
            ),
            'linux' => array(
                'user_bg_color' => '#003300',
                'assistant_bg_color' => '#001100',
                'button_color' => '#00ff00',
                'sponsor_color' => '#00ff00'
            ),
            'dark' => array(
                'user_bg_color' => '#60a5fa',
                'assistant_bg_color' => '#374151',
                'button_color' => '#60a5fa',
                'sponsor_color' => '#60a5fa'
            ),
            'ocean' => array(
                'user_bg_color' => '#0ea5e9',
                'assistant_bg_color' => '#e0f2fe',
                'button_color' => '#0ea5e9',
                'sponsor_color' => '#0ea5e9'
            ),
            'forest' => array(
                'user_bg_color' => '#16a34a',
                'assistant_bg_color' => '#dcfce7',
                'button_color' => '#16a34a',
                'sponsor_color' => '#16a34a'
            ),
            'sunset' => array(
                'user_bg_color' => '#ea580c',
                'assistant_bg_color' => '#ffedd5',
                'button_color' => '#ea580c',
                'sponsor_color' => '#ea580c'
            ),
            'royal' => array(
                'user_bg_color' => '#7c3aed',
                'assistant_bg_color' => '#f3e8ff',
                'button_color' => '#7c3aed',
                'sponsor_color' => '#7c3aed'
            ),
            'midnight' => array(
                'user_bg_color' => '#6366f1',
                'assistant_bg_color' => '#1e293b',
                'button_color' => '#6366f1',
                'sponsor_color' => '#6366f1'
            ),
            'coffee' => array(
                'user_bg_color' => '#92400e',
                'assistant_bg_color' => '#fde68a',
                'button_color' => '#d97706',
                'sponsor_color' => '#d97706'
            ),
            'neon' => array(
                'user_bg_color' => '#00ffff',
                'assistant_bg_color' => '#1a1a1a',
                'button_color' => '#00ffff',
                'sponsor_color' => '#00ffff'
            ),
            'minimalist' => array(
                'user_bg_color' => '#1e293b',
                'assistant_bg_color' => '#f8fafc',
                'button_color' => '#1e293b',
                'sponsor_color' => '#1e293b'
            ),
            'rose' => array(
                'user_bg_color' => '#e11d48',
                'assistant_bg_color' => '#ffe4e6',
                'button_color' => '#e11d48',
                'sponsor_color' => '#e11d48'
            ),
            'cyberpunk' => array(
                'user_bg_color' => '#ff00ff',
                'assistant_bg_color' => '#1a0033',
                'button_color' => '#ff00ff',
                'sponsor_color' => '#ff00ff'
            ),
            'nature' => array(
                'user_bg_color' => '#166534',
                'assistant_bg_color' => '#dcfce7',
                'button_color' => '#84cc16',
                'sponsor_color' => '#84cc16'
            ),
            'professional' => array(
                'user_bg_color' => '#1e40af',
                'assistant_bg_color' => '#f8fafc',
                'button_color' => '#1e40af',
                'sponsor_color' => '#1e40af'
            ),
            'retro' => array(
                'user_bg_color' => '#d97706',
                'assistant_bg_color' => '#fde68a',
                'button_color' => '#f59e0b',
                'sponsor_color' => '#f59e0b'
            ),
            'candy' => array(
                'user_bg_color' => '#db2777',
                'assistant_bg_color' => '#fce7f3',
                'button_color' => '#db2777',
                'sponsor_color' => '#db2777'
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
            $attributes['data-open-on-load'] = 'on';
        }
        if (get_option('axai_aichat_show_thoughts')) {
            $attributes['data-show-thoughts'] = 'on';
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
            // Register a dummy script handle for inline theme JS
            wp_register_script('axai-aichat-theme-js', false, array(), AXAI_AICHAT_VERSION, true);
            wp_enqueue_script('axai-aichat-theme-js');
            wp_add_inline_script(
                'axai-aichat-theme-js',
                'document.body.classList.add("' . esc_js($theme_class) . '");'
            );
        }

        // Generate and output custom CSS
        $custom_css = $this->generate_custom_css($theme, $transparency, $blur);
        if (!empty($custom_css)) {
            wp_add_inline_style('axai-aichat-themes', $custom_css);
        }
        
        // Output script tag
        echo '<script';
        foreach ($attributes as $key => $value) {
            echo ' ' . esc_html($key) . '="' . esc_attr($value) . '"';
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
     * Adjust brightness of a color
     * 
     * @param string $hex Hex color code
     * @param int $percent Percentage to adjust (-100 to 100)
     * @return string Adjusted hex color
     */
    private function adjust_brightness($hex, $percent) {
        // Remove # if present
        $hex = str_replace('#', '', $hex);
        
        // Convert to RGB
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        
        // Adjust each component
        $r = max(0, min(255, $r + ($r * $percent / 100)));
        $g = max(0, min(255, $g + ($g * $percent / 100)));
        $b = max(0, min(255, $b + ($b * $percent / 100)));
        
        // Convert back to hex
        return '#' . str_pad(dechex(round($r)), 2, '0', STR_PAD_LEFT) . 
                     str_pad(dechex(round($g)), 2, '0', STR_PAD_LEFT) . 
                     str_pad(dechex(round($b)), 2, '0', STR_PAD_LEFT);
    }
    
    /**
     * Calculate luminance of a color
     * 
     * @param string $hex Hex color code
     * @return float Luminance value (0-1)
     */
    private function get_luminance($hex) {
        $hex = str_replace('#', '', $hex);
        
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        
        // Normalize and calculate luminance
        $r = $r / 255;
        $g = $g / 255;
        $b = $b / 255;
        
        return 0.299 * $r + 0.587 * $g + 0.114 * $b;
    }
    
    /**
     * Get hover color based on luminance
     * 
     * @param string $hex Base color
     * @return string Hover color
     */
    private function get_hover_color($hex) {
        $luminance = $this->get_luminance($hex);
        
        // If dark color, lighten it; if light color, darken it
        if ($luminance < 0.5) {
            return $this->adjust_brightness($hex, 20); // Lighten by 20%
        } else {
            return $this->adjust_brightness($hex, -15); // Darken by 15%
        }
    }
    
    /**
     * Generate custom CSS
     */
    private function generate_custom_css($theme, $transparency, $blur) {
        $css = '';

        // Determine selector based on theme
        if ($theme !== 'default') {
            $selector = 'html body.axai-theme-' . esc_attr($theme);
        } else {
            $selector = 'html body';
        }

        // Get custom colors from admin
        $button_color = get_option('axai_aichat_button_color');
        $user_bg_color = get_option('axai_aichat_user_bg_color');
        $assistant_bg_color = get_option('axai_aichat_assistant_bg_color');

        // Get theme defaults
        $theme_defaults = $this->get_theme_defaults($theme);

        // Check if custom colors override theme colors
        $has_custom_colors = false;

        if (!empty($button_color) || !empty($user_bg_color) || !empty($assistant_bg_color) ||
            $transparency < 100 || $blur > 0) {

            $css .= $selector . ' {' . "\n";

            // Button Color Override
            if (!empty($button_color)) {
                $has_custom_colors = true;
                $hover_color = $this->get_hover_color($button_color);
                $css .= "    --axai-button-color: {$button_color} !important;\n";
                $css .= "    --axai-button-hover-color: {$hover_color} !important;\n";
                $css .= "    --axai-button-hover-shadow: 0px 4px 14px {$button_color}80 !important;\n";
            }

            // User Message Background Override
            if (!empty($user_bg_color)) {
                $has_custom_colors = true;
                $css .= "    --axai-user-msg-bg: {$user_bg_color} !important;\n";
            }

            // Assistant Message Background Override
            if (!empty($assistant_bg_color)) {
                $has_custom_colors = true;
                $css .= "    --axai-bot-msg-bg: {$assistant_bg_color} !important;\n";
            }

            // Transparency
            if ($transparency < 100) {
                $opacity = $transparency / 100;
                $css .= "    --axai-transparency: {$opacity} !important;\n";
            }

            // Blur
            if ($blur > 0) {
                $css .= "    --axai-blur: {$blur}px !important;\n";
            }

            $css .= "}\n\n";
        }

        // Apply blur directly to chat element for better specificity
        if ($blur > 0) {
            $css .= $selector . ' #anything-llm-chat {' . "\n";
            $css .= "    backdrop-filter: blur({$blur}px) !important;\n";
            $css .= "    -webkit-backdrop-filter: blur({$blur}px) !important;\n";
            $css .= "}\n\n";
        }

        // Add glow effects for special themes
        if (in_array($theme, array('linux', 'neon', 'cyberpunk')) && !empty($button_color)) {
            $css .= $selector . ' #anything-llm-chat {' . "\n";
            $css .= "    box-shadow: 0px 0px 25px {$button_color} !important;\n";
            $css .= "}\n\n";

            $css .= $selector . ' button:hover {' . "\n";
            $css .= "    box-shadow: 0px 0px 25px {$button_color} !important;\n";
            $css .= "}\n";
        }

        return $css;
    }
}

/**
 * Initialize plugin
 */
function axai_galaxy_aichat_init() {
    return AxAI_Galaxy_AIChat::get_instance();
}
add_action('plugins_loaded', 'axai_galaxy_aichat_init');

/**
 * Activation hook
 */
register_activation_hook(__FILE__, 'axai_aichat_activate');
function axai_aichat_activate() {
    add_option('axai_aichat_server_url', 'https://ai.axai.at:3002');
    add_option('axai_aichat_position', 'bottom-right');
    add_option('axai_aichat_chat_icon', 'chatBubble');
    add_option('axai_aichat_theme', 'default');
    add_option('axai_aichat_transparency', '100');
    add_option('axai_aichat_blur', '0');
}

/**
 * Deactivation hook
 */
register_deactivation_hook(__FILE__, 'axai_aichat_deactivate');
function axai_aichat_deactivate() {
    // Optional: Cleanup
}
