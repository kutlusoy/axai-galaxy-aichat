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
    <h1>
        <?php echo esc_html(get_admin_page_title()); ?>
        <span class="axai-version">v<?php echo esc_html(AXAI_AICHAT_VERSION); ?></span>
    </h1>
    
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
                                $axai_aichat_positions = array(
                                    'bottom-right' => 'Bottom Right',
                                    'bottom-left' => 'Bottom Left',
                                    'top-right' => 'Top Right',
                                    'top-left' => 'Top Left'
                                );
                                $axai_aichat_current_position = get_option('axai_aichat_position', 'bottom-right');
                                foreach ($axai_aichat_positions as $axai_aichat_value => $axai_aichat_label) {
                                    printf(
                                        '<option value="%s"%s>%s</option>',
                                        esc_attr($axai_aichat_value),
                                        selected($axai_aichat_current_position, $axai_aichat_value, false),
                                        esc_html($axai_aichat_label)
                                    );
                                }
                                ?>
                            </select>
                            <p class="description">Position of the chat widget button</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_chat_icon">Chat Icon</label>
                        </th>
                        <td>
                            <select id="axai_aichat_chat_icon" name="axai_aichat_chat_icon">
                                <?php
                                $axai_aichat_icons = array(
                                    'plus' => 'Plus',
                                    'chatBubble' => 'Chat Bubble',
                                    'support' => 'Support',
                                    'search' => 'Search',
                                    'search2' => 'Search 2',
                                    'magic' => 'Magic'
                                );
                                $axai_aichat_current_icon = get_option('axai_aichat_chat_icon', 'chatBubble');
                                foreach ($axai_aichat_icons as $axai_aichat_value => $axai_aichat_label) {
                                    printf(
                                        '<option value="%s"%s>%s</option>',
                                        esc_attr($axai_aichat_value),
                                        selected($axai_aichat_current_icon, $axai_aichat_value, false),
                                        esc_html($axai_aichat_label)
                                    );
                                }
                                ?>
                            </select>
                            <p class="description">Icon displayed when chat is closed</p>
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
                            <label for="axai_aichat_default_messages">Default Messages</label>
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
                            <p class="description">URL to the brand icon/image to display on window header</p>
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
                            <p class="description">URL to the sponsor website</p>
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
                            <p class="description">Sponsor name or text to display</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_support_email">Support Email</label>
                        </th>
                        <td>
                            <input type="email" 
                                   id="axai_aichat_support_email" 
                                   name="axai_aichat_support_email" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_support_email')); ?>" 
                                   class="regular-text">
                            <p class="description">Support email accessible via the menu (top right three dots)</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="axai_aichat_reset_chat_text">Reset Chat Text</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="axai_aichat_reset_chat_text" 
                                   name="axai_aichat_reset_chat_text" 
                                   value="<?php echo esc_attr(get_option('axai_aichat_reset_chat_text')); ?>" 
                                   class="regular-text">
                            <p class="description">Override the text shown on the reset chat button</p>
                        </td>
                    </tr>
                </table>

                <h2>Colors</h2>
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
                            <p class="description">Chat bubble background color (when closed). Hex color code.</p>
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
                            <p class="description">Background color of user chat bubbles. Hex color code.</p>
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
                            <p class="description">Background color of assistant chat bubbles. Hex color code.</p>
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
                            <p class="description">Default message shown when chat is opened for the first time</p>
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
                            <p class="description">Name displayed above assistant messages</p>
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
                            <p class="description">URL to the assistant avatar icon</p>
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
                                $axai_aichat_themes = array(
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
                                    'candy' => 'Candy'
                                );
                                $axai_aichat_current_theme = get_option('axai_aichat_theme', 'default');
                                foreach ($axai_aichat_themes as $axai_aichat_value => $axai_aichat_label) {
                                    printf(
                                        '<option value="%s"%s>%s</option>',
                                        esc_attr($axai_aichat_value),
                                        selected($axai_aichat_current_theme, $axai_aichat_value, false),
                                        esc_html($axai_aichat_label)
                                    );
                                }
                                ?>
                            </select>
                            <p class="description">Choose a pre-made theme for your chat widget</p>
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
                            <p class="description">Transparency of the chat window (0% = invisible, 100% = opaque)</p>
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
                            <p class="description">Blur effect behind the chat window (glassmorphism effect)</p>
                        </td>
                    </tr>
                </table>
                
                <div class="axai-info-box">
                    <p><strong>Theme Tips:</strong> Each theme comes with pre-configured colors. You can override specific colors in the Appearance tab. Transparency and blur effects work best with lighter backgrounds.</p>
                </div>
            </div>
            
            <!-- Tab: Advanced -->
            <div id="tab-advanced" class="axai-tab-content">
                <h2>Advanced Settings</h2>
                <p>View the generated embed code for manual integration if needed.</p>
                
                <h3>Embed Code Preview</h3>
                <div class="code-preview">
                    <?php
                    $axai_aichat_embed_id = get_option('axai_aichat_embed_id', 'YOUR-EMBED-ID');
                    $axai_aichat_server_url = get_option('axai_aichat_server_url', 'https://ai.axai.at:3002');

                    $axai_aichat_code = '<script' . "\n";
                    $axai_aichat_code .= '  data-embed-id="' . esc_attr($axai_aichat_embed_id) . '"' . "\n";
                    $axai_aichat_code .= '  data-base-api-url="' . esc_url($axai_aichat_server_url) . '/api/embed"' . "\n";
                    $axai_aichat_code .= '  src="' . esc_url($axai_aichat_server_url) . '/embed/anythingllm-chat-widget.min.js"' . "\n";
                    $axai_aichat_code .= '></script>';
                    ?>
                    <pre id="embed-code-preview"><code><?php echo esc_html($axai_aichat_code); ?></code></pre>
                </div>
                
                <div class="axai-warning-box" style="margin-top: 30px;">
                    <p><strong>Note:</strong> This plugin automatically handles the embed integration. Manual code injection is only needed for special cases or troubleshooting.</p>
                </div>
            </div>
        </div>
        
        <div style="margin-top: 20px;">
            <?php submit_button('Save Settings', 'primary', 'submit', false); ?>
        </div>
    </form>
</div>
