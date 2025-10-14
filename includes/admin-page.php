<?php
/**
 * Admin Settings Page
 * 
 * File Path: /axai-galaxy-aichat/includes/admin-page.php
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap axai-aichat-admin">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <form method="post" action="options.php">
        <?php settings_fields('axai_aichat_settings'); ?>
        
        <div class="axai-admin-tabs">
            <nav class="nav-tab-wrapper">
                <a href="#tab-basic" class="nav-tab nav-tab-active">Basic Configuration</a>
                <a href="#tab-ai-settings" class="nav-tab">AI Settings</a>
                <a href="#tab-appearance" class="nav-tab">Appearance</a>
                <a href="#tab-themes" class="nav-tab">Themes</a>
                <a href="#tab-advanced" class="nav-tab">Advanced</a>
            </nav>
            
            <!-- Tab: Basic Configuration -->
            <div id="tab-basic" class="axai-tab-content active">
                <h2>Main Settings</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_embed_id">Workspace Embed ID *</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_embed_id" 
                                   name="axai_aichat_embed_id" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_embed_id')); ?>" 
                                   class="regular-text" 
                                   required>
                            <p class="description">The unique ID of your AnythingLLM Workspace Embed</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_server_url">AI Server URL *</label>
                        </th>
                        <td>
                            <input type="url" 
                                   id="axai_aichat_server_url" 
                                   name="axai_aichat_server_url" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_server_url', 'https://ai.axai.at:3002')); ?>" 
                                   class="regular-text" 
                                   required>
                            <p class="description">URL with port of your AnythingLLM server (e.g. https://ai.axai.at:3002)</p>
                        </td>
                    </tr>
                </table>
                
                <h2>Position & Icon</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_position">Position</label>
                        </th>
                        <td>
                            <select id="axai_aichat_position" name="axai_aichat_position">
                                <?php
                                $positions = array(
                                    'bottom-right' => 'Bottom Right',
                                    'bottom-left' => 'Bottom Left',
                                    'top-right' => 'Top Right',
                                    'top-left' => 'Top Left'
                                );
                                $current_position = get_option('axai_aichat_position', 'bottom-right');
                                foreach ($positions as $value => $label) {
                                    printf(
                                        '<option value="%s"%s>%s</option>',
                                        esc_attr($value),
                                        selected($current_position, $value, false),
                                        esc_html($label)
                                    );
                                }
                                ?>
                            </select>
                            <p class="description">Adjust the positioning of the embed chat widget and open chat button.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_chat_icon">Chat Icon</label>
                        </th>
                        <td>
                            <select id="axai_aichat_chat_icon" name="axai_aichat_chat_icon">
                                <?php
                                $icons = array(
                                    'plus' => 'Plus',
                                    'chatBubble' => 'Chat Bubble',
                                    'support' => 'Support',
                                    'search2' => 'Search 2',
                                    'search' => 'Search',
                                    'magic' => 'Magic'
                                );
                                $current_icon = get_option('axai_aichat_chat_icon', 'chatBubble');
                                foreach ($icons as $value => $label) {
                                    printf(
                                        '<option value="%s"%s>%s</option>',
                                        esc_attr($value),
                                        selected($current_icon, $value, false),
                                        esc_html($label)
                                    );
                                }
                                ?>
                            </select>
                            <p class="description">The chat bubble icon show when chat is closed.</p>
                        </td>
                    </tr>
                </table>
                
                <h2>Options</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">Behavior</th>
                        <td>
                            <fieldset>
                                <label>
                                    <input type="checkbox" 
                                           name="axai_aichat_open_on_load" 
                                           value="1" 
                                           <?php checked(get_option('axai_aichat_open_on_load'), 1); ?>>
                                    Open automatically on page load
                                </label><br>
                                <label>
                                    <input type="checkbox" 
                                           name="axai_aichat_show_thoughts" 
                                           value="1" 
                                           <?php checked(get_option('axai_aichat_show_thoughts'), 1); ?>>
                                    Show AI thoughts
                                </label><br>
                                <label>
                                    <input type="checkbox" 
                                           name="axai_aichat_no_sponsor" 
                                           value="1" 
                                           <?php checked(get_option('axai_aichat_no_sponsor'), 1); ?>>
                                    Hide sponsor link
                                </label><br>
                                <label>
                                    <input type="checkbox" 
                                           name="axai_aichat_no_header" 
                                           value="1" 
                                           <?php checked(get_option('axai_aichat_no_header'), 1); ?>>
                                    Hide header
                                </label>
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </div>
            
            <!-- Tab: AI Settings -->
            <div id="tab-ai-settings" class="axai-tab-content">
                <h2>AI Configuration</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_prompt">System Prompt</label>
                        </th>
                        <td>
                            <textarea id="axai_aichat_prompt" 
                                      name="axai_aichat_prompt" 
                                      rows="5" 
                                      class="large-text"><?php echo esc_textarea(get_option('axai_aichat_prompt')); ?></textarea>
                            <p class="description">Override the default system prompt for the AI</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_model">AI Model</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_model" 
                                   name="axai_aichat_model" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_model')); ?>" 
                                   class="regular-text">
                            <p class="description">Specify which AI model to use (e.g., gpt-4, claude-3-opus)</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_temperature">Temperature</label>
                        </th>
                        <td>
                            <input type="number" 
                                   id="axai_aichat_temperature" 
                                   name="axai_aichat_temperature" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_temperature')); ?>" 
                                   min="0" 
                                   max="1" 
                                   step="0.1" 
                                   class="small-text">
                            <p class="description">Controls randomness (0.1 - 1.0). Lower = more focused, Higher = more creative</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_language">Language</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_language" 
                                   name="axai_aichat_language" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_language')); ?>" 
                                   class="regular-text">
                            <p class="description">Set the language for the chat interface (e.g., en, de, es, fr)</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_default_messages">Default Messages (JSON)</label>
                        </th>
                        <td>
                            <textarea id="axai_aichat_default_messages" 
                                      name="axai_aichat_default_messages" 
                                      rows="6" 
                                      class="large-text code"><?php echo esc_textarea(get_option('axai_aichat_default_messages')); ?></textarea>
                            <p class="description">Pre-populate the chat with default messages.<br>
                            Example: <code>Hello!, How can I help you?, What would you like to know?</code></p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <!-- Tab: Appearance -->
            <div id="tab-appearance" class="axai-tab-content">
                <h2>Branding</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_brand_image_url">Brand Image URL</label>
                        </th>
                        <td>
                            <input type="url" 
                                   id="axai_aichat_brand_image_url" 
                                   name="axai_aichat_brand_image_url" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_brand_image_url')); ?>" 
                                   class="regular-text">
                                <p class="description">URL to the Brand Icon/Image to display on window header.</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_sponsor_link">Sponsor Link</label>
                        </th>
                        <td>
                            <input type="url" 
                                   id="axai_aichat_sponsor_link" 
                                   name="axai_aichat_sponsor_link" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_sponsor_link')); ?>" 
                                   class="regular-text">
                                <p class="description">URL to the Sponsor</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_sponsor_text">Sponsor Text</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_sponsor_text" 
                                   name="axai_aichat_sponsor_text" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_sponsor_text')); ?>" 
                                   class="regular-text">
                            <p class="description">Sponsor Name or Text</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_support_email">Suppport email</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_support_email" 
                                   name="axai_aichat_support_email" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_support_email')); ?>" 
                                   class="regular-text">
                            <p class="description">Shows a support email that the user can used to draft an email via the "three dot" menu in the top right. Option will not appear if it is not set.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_assistant_name">Reset Chat Text</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_reset_chat_text" 
                                   name="axai_aichat_reset_chat_text" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_reset_chat_text')); ?>" 
                                   class="regular-text">
                            <p class="description">Override the text shown on the reset chat button.</p>
                        </td>
                    </tr>
                </table>

                <h2>Colors & Text</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_button_color">Button Color</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_button_color" 
                                   name="axai_aichat_button_color" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_button_color')); ?>" 
                                   class="axai-color-picker">
                                <p class="description">Overwrite the chat bubble background color shown when chat is closed. Value must be hex color code.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_user_bg_color">User Message Background</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_user_bg_color" 
                                   name="axai_aichat_user_bg_color" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_user_bg_color')); ?>" 
                                   class="axai-color-picker">
                                <p class="description">Overwrite the background color of the user chat bubbles when chatting. Value must be hex color code.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_assistant_bg_color">Assistant Message Background</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_assistant_bg_color" 
                                   name="axai_aichat_assistant_bg_color" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_assistant_bg_color')); ?>" 
                                   class="axai-color-picker">
                            <p class="description">Overwrite the background color of the assistant response chat bubbles when chatting. Value must be hex color code.</p>
                        </td>
                    </tr>
                </table>
                
                <h2>Text Content</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_greeting">Greeting Text</label>
                        </th>
                        <td>
                            <textarea id="axai_aichat_greeting" 
                                      name="axai_aichat_greeting" 
                                      rows="3" 
                                      class="large-text"><?php echo esc_textarea(get_option('axai_aichat_greeting')); ?></textarea>
                            <p class="description">Default text message to be shown when chat is opened and no previous message history is found.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_send_message_text">Input Placeholder</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_send_message_text" 
                                   name="axai_aichat_send_message_text" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_send_message_text')); ?>" 
                                   class="regular-text">
                            <p class="description">Placeholder text in the input field (e.g., "Type your message...")</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_assistant_name">Assistant Name</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_assistant_name" 
                                   name="axai_aichat_assistant_name" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_assistant_name')); ?>" 
                                   class="regular-text">
                            <p class="description">Set the chat assistant name that appears above each chat message. Default AnythingLLM Chat Assistant.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_assistant_icon">Assistant Icon URL</label>
                        </th>
                        <td>
                            <input type="url" 
                                   id="axai_aichat_assistant_icon" 
                                   name="axai_aichat_assistant_icon" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_assistant_icon')); ?>" 
                                   class="regular-text">
                            <p class="description">Set the icon of the chat assistant.</p>
                        </td>
                    </tr>
                </table>
                
                <h2>Dimensions</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_window_height">Window Height</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_window_height" 
                                   name="axai_aichat_window_height" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_window_height')); ?>" 
                                   class="small-text">
                            <p class="description">e.g., 500px, 95% or 80vh</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_window_width">Window Width</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_window_width" 
                                   name="axai_aichat_window_width" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_window_width')); ?>" 
                                   class="small-text">
                            <p class="description">e.g., 400px, 40% or 30vw</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <!-- Tab: Themes -->
            <div id="tab-themes" class="axai-tab-content">
                <h2>Theme Selection</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_theme">Theme</label>
                        </th>
                        <td>
                            <select id="axai_aichat_theme" name="axai_aichat_theme" class="theme-selector">
                                <?php
                                $themes = array(
                                    'default' => 'Default (AnythingLLM Original)',
                                    'linux' => 'Linux Terminal',
                                    'dark' => 'Dark Mode',
                                    'ocean' => 'Ocean Blue',
                                    'forest' => 'Forest Green',
                                    'sunset' => 'Sunset Orange',
                                    'royal' => 'Royal Purple',
                                    'midnight' => 'Midnight',
                                    'coffee' => 'Coffee',
                                    'neon' => 'Neon',
                                    'minimalist' => 'Minimalist',
                                    'rose' => 'Rose',
                                    'cyberpunk' => 'Cyberpunk',
                                    'nature' => 'Nature',
                                    'professional' => 'Professional',
                                    'retro' => 'Retro',
                                    'candy' => 'Candy',
                                    'custom' => 'Custom Theme'
                                );
                                $current_theme = get_option('axai_aichat_theme', 'default');
                                foreach ($themes as $value => $label) {
                                    printf(
                                        '<option value="%s"%s>%s</option>',
                                        esc_attr($value),
                                        selected($current_theme, $value, false),
                                        esc_html($label)
                                    );
                                }
                                ?>
                            </select>
                            <div class="theme-preview" id="theme-preview">
                                <div class="theme-preview-box"></div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_transparency">Transparency</label>
                        </th>
                        <td>
                            <input type="range" 
                                   id="axai_aichat_transparency" 
                                   name="axai_aichat_transparency" 
                                   min="0" 
                                   max="100" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_transparency', '100')); ?>" 
                                   class="axai-slider">
                            <span class="slider-value"><?php echo esc_html(get_option('axai_aichat_transparency', '100')); ?>%</span>
                            <p class="description">Transparency of the chat window (text remains visible)</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_blur">Background Blur</label>
                        </th>
                        <td>
                            <input type="range" 
                                   id="axai_aichat_blur" 
                                   name="axai_aichat_blur" 
                                   min="0" 
                                   max="20" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_blur', '0')); ?>" 
                                   class="axai-slider">
                            <span class="slider-value"><?php echo esc_html(get_option('axai_aichat_blur', '0')); ?>px</span>
                            <p class="description">Blur effect of the chat window background</p>
                        </td>
                    </tr>
                </table>
                
                <div id="custom-theme-colors" style="<?php echo get_option('axai_aichat_theme') === 'custom' ? '' : 'display:none;'; ?>">
                    <h3>Custom Theme Colors</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label>Primary Background</label></th>
                            <td><input type="text" name="axai_aichat_custom_primary_bg" value="<?php echo esc_attr(get_option('axai_aichat_custom_primary_bg')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>Secondary Background</label></th>
                            <td><input type="text" name="axai_aichat_custom_secondary_bg" value="<?php echo esc_attr(get_option('axai_aichat_custom_secondary_bg')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>Header Background</label></th>
                            <td><input type="text" name="axai_aichat_custom_header_bg" value="<?php echo esc_attr(get_option('axai_aichat_custom_header_bg')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>Primary Text Color</label></th>
                            <td><input type="text" name="axai_aichat_custom_text_primary" value="<?php echo esc_attr(get_option('axai_aichat_custom_text_primary')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>Secondary Text Color</label></th>
                            <td><input type="text" name="axai_aichat_custom_text_secondary" value="<?php echo esc_attr(get_option('axai_aichat_custom_text_secondary')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>Border Color</label></th>
                            <td><input type="text" name="axai_aichat_custom_border_color" value="<?php echo esc_attr(get_option('axai_aichat_custom_border_color')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>User Message Background</label></th>
                            <td><input type="text" name="axai_aichat_custom_user_msg_bg" value="<?php echo esc_attr(get_option('axai_aichat_custom_user_msg_bg')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>User Message Text</label></th>
                            <td><input type="text" name="axai_aichat_custom_user_msg_text" value="<?php echo esc_attr(get_option('axai_aichat_custom_user_msg_text')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>Bot Message Background</label></th>
                            <td><input type="text" name="axai_aichat_custom_bot_msg_bg" value="<?php echo esc_attr(get_option('axai_aichat_custom_bot_msg_bg')); ?>" class="axai-color-picker"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label>Bot Message Text</label></th>
                            <td><input type="text" name="axai_aichat_custom_bot_msg_text" value="<?php echo esc_attr(get_option('axai_aichat_custom_bot_msg_text')); ?>" class="axai-color-picker"></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <!-- Tab: Advanced -->
            <div id="tab-advanced" class="axai-tab-content">
                <h2>Advanced Settings</h2>
                <p>Additional parameters can be added here.</p>
                
                <h3>Code Preview</h3>
                <div class="code-preview">
                    <?php
                    $embed_id = get_option('axai_aichat_embed_id', 'YOUR-EMBED-ID');
                    $server_url = get_option('axai_aichat_server_url', 'https://ai.axai.at:3002');
                    
                    $code = '<script' . "\n";
                    $code .= '  data-embed-id="' . esc_attr($embed_id) . '"' . "\n";
                    $code .= '  data-base-api-url="' . esc_url($server_url) . '/api/embed"' . "\n";
                    $code .= '  src="' . esc_url($server_url) . '/embed/anythingllm-chat-widget.min.js"' . "\n";
                    $code .= '></script>';
                    ?>
                    <pre id="embed-code-preview"><code><?php echo esc_html($code); ?></code></pre>
                </div>
            </div>
        </div>
        
        <div style="margin-top: 20px;">
            <?php submit_button('Save Settings', 'primary', 'submit', false); ?>
        </div>
    </form>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    // Fallback tab functionality if admin.js doesn't load
    if (typeof console !== 'undefined') {
        console.log('AxAI Admin Page loaded');
    }
    
    // Tab Switching
    $('.nav-tab').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        
        // Update navigation
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        
        // Update content
        $('.axai-tab-content').removeClass('active').hide();
        $(target).addClass('active').fadeIn(200);
        
        if (typeof console !== 'undefined') {
            console.log('Switched to tab:', target);
        }
    });
    
    // First tab active
    if ($('.nav-tab-active').length === 0) {
        $('.nav-tab').first().addClass('nav-tab-active');
    }
    if ($('.axai-tab-content.active').length === 0) {
        $('.axai-tab-content').first().addClass('active').show();
    }
});
</script>
