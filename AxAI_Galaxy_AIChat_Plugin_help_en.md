# AxAI Galaxy AIChat Plugin - LLM Fine-Tuning Handbook

**Version:** 2.2.1
**Purpose:** Comprehensive documentation for LLM systems on setup, configuration, and usage of the WordPress plugin

---

## 1. PLUGIN OVERVIEW

### 1.1 Description
AxAI Galaxy AIChat is a WordPress plugin that integrates the AnythingLLM Chat Widget into WordPress websites. It enables the embedding of an AI chat assistant with extensive customization options.

### 1.2 Core Functionality
- Integration of AnythingLLM Chat Widget via embed code
- Automatic rendering in WordPress footer (`wp_footer` hook)
- Extensive theme and styling options (17 predefined themes)
- AI parameter control (prompt, model, temperature)
- Branding and UI customization

### 1.3 Technical Architecture
```
WordPress Plugin
├── Main Class: AxAI_Galaxy_AIChat (Singleton Pattern)
├── Admin Interface: /includes/admin-page.php
├── Frontend Integration: render_chat_widget()
├── Styling: /assets/css/themes.css
└── JavaScript Embed: AnythingLLM Chat Widget Script
```

### 1.4 Dependencies
- **WordPress:** >= 5.0
- **PHP:** >= 7.4
- **AnythingLLM Server:** Required (Docker installation possible)
- **Browser:** Modern browser with JavaScript support

---

## 2. INSTALLATION AND SETUP

### 2.1 Basic Installation

**Step 1: Upload plugin**
```
/wp-content/plugins/axai-galaxy-aichat/
├── axai-galaxy-aichat.php (Main file)
├── includes/
├── assets/
└── README.md
```

**Step 2: Activate plugin**
- WordPress Admin → Plugins → Activate "AxAI Galaxy AIChat"

**Step 3: Access settings**
- WordPress Admin → Settings → "AxAI AI Chat"

### 2.2 Minimum Requirements for Functionality

**Required Fields:**
1. **Embed ID** (`axai_aichat_embed_id`): Unique workspace ID from AnythingLLM
2. **Server URL** (`axai_aichat_server_url`): AnythingLLM server endpoint

**Default Server URL:**
```
https://ai.axai.at:3002
```

**Example Embed ID:**
```
a1b2c3d4-e5f6-7890-abcd-ef1234567890
```

### 2.3 AnythingLLM Server Setup

**Option 1: Own Docker Container**
```bash
docker run -d \
  -p 3002:3001 \
  --name anythingllm \
  -v /path/to/data:/app/server/storage \
  mintplexlabs/anythingllm:latest
```

**Option 2: Use Hosted Service**
- Demo Server: `https://ai.axai.at:3002` (for testing only)

---

## 3. CONFIGURATION PARAMETERS

### 3.1 BASIC CONFIGURATION (Tab 1)

#### 3.1.1 Workspace Embed ID
- **Option:** `axai_aichat_embed_id`
- **Type:** String (UUID format)
- **Required:** Yes
- **Description:** Unique ID of the AnythingLLM Workspace Embed
- **Example:**
```
e8f9a123-4567-89bc-def0-123456789abc
```

#### 3.1.2 AI Server URL
- **Option:** `axai_aichat_server_url`
- **Type:** URL
- **Required:** Yes
- **Default:** `https://ai.axai.at:3002`
- **Description:** Complete URL with port of the AnythingLLM server
- **Examples:**
```
https://ai.axai.at:3002
http://localhost:3001
https://my-llm-server.com:8080
```

#### 3.1.3 Position
- **Option:** `axai_aichat_position`
- **Type:** Select (String)
- **Default:** `bottom-right`
- **Options:**
  - `bottom-right` - Bottom right
  - `bottom-left` - Bottom left
  - `top-right` - Top right
  - `top-left` - Top left
- **Usage:** Positions the chat widget on the website

#### 3.1.4 Chat Icon
- **Option:** `axai_aichat_chat_icon`
- **Type:** Select (String)
- **Default:** `chatBubble`
- **Options:**
  - `plus` - Plus symbol
  - `chatBubble` - Chat bubble
  - `support` - Support symbol
  - `search` - Search
  - `search2` - Search alternative
  - `magic` - Magic/Sparkle symbol
- **Usage:** Determines the icon of the closed chat button

#### 3.1.5 Behavior Options (Checkboxes)

**Open on Load**
- **Option:** `axai_aichat_open_on_load`
- **Type:** Boolean (Checkbox)
- **Default:** `0` (disabled)
- **Values:**
  - `1` = Chat opens automatically on page load
  - `0` = Chat remains closed
- **Data Attribute:** `data-open-on-load="on"`

**Show Thoughts**
- **Option:** `axai_aichat_show_thoughts`
- **Type:** Boolean (Checkbox)
- **Default:** `0`
- **Description:** Shows internal AI thinking processes (for debugging/transparency)
- **Data Attribute:** `data-show-thoughts="on"`

**Hide Sponsor**
- **Option:** `axai_aichat_no_sponsor`
- **Type:** Boolean (Checkbox)
- **Default:** `0`
- **Description:** Hides the sponsor link
- **Data Attribute:** `data-no-sponsor="true"`

**Hide Header**
- **Option:** `axai_aichat_no_header`
- **Type:** Boolean (Checkbox)
- **Default:** `0`
- **Description:** Hides the header area of the chat
- **Data Attribute:** `data-no-header="true"`

---

### 3.2 AI SETTINGS (Tab 2)

#### 3.2.1 System Prompt
- **Option:** `axai_aichat_prompt`
- **Type:** Textarea (Multiline Text)
- **Description:** Overrides the default system prompt for the AI
- **Examples:**
```
You are a helpful customer service assistant for our e-commerce company.
Answer questions about products, orders, and delivery times.
```
```
You are a technical support agent specialized in WordPress.
Help users troubleshoot plugin issues and provide clear solutions.
```
```
You are a friendly AI tutor for mathematics.
Explain complex concepts simply and patiently.
```

#### 3.2.2 AI Model
- **Option:** `axai_aichat_model`
- **Type:** Text
- **Description:** Specifies which AI model should be used
- **Examples:**
```
gpt-4
gpt-4-turbo
gpt-3.5-turbo
claude-3-opus
claude-3-sonnet
claude-3-haiku
llama-2-70b
mixtral-8x7b
```

#### 3.2.3 Temperature
- **Option:** `axai_aichat_temperature`
- **Type:** Float (Number)
- **Range:** 0.0 - 1.0
- **Step:** 0.1
- **Description:** Controls the creativity/randomness of AI responses
- **Interpretation:**
  - `0.1 - 0.3`: Very focused, deterministic (for factual answers)
  - `0.4 - 0.6`: Balanced (default for most applications)
  - `0.7 - 0.9`: Creative, variable (for creative tasks)
  - `1.0`: Maximum creativity/randomness
- **Example Scenarios:**
  - Customer Service: `0.3`
  - General Chat: `0.7`
  - Creative Writing: `0.9`
  - Code Generation: `0.2`

#### 3.2.4 Language
- **Option:** `axai_aichat_language`
- **Type:** Text
- **Description:** Sets the language for the chat interface
- **Examples:**
```
en (English)
de (Deutsch)
es (Español)
fr (Français)
it (Italiano)
pt (Português)
nl (Nederlands)
ja (日本語)
zh (中文)
```

#### 3.2.5 Default Messages
- **Option:** `axai_aichat_default_messages`
- **Type:** Textarea
- **Format:** Comma-separated list
- **Description:** Predefined quick-reply buttons
- **Examples:**
```
Hello!, How can I help you?, What would you like to know?
```
```
Product Info, Track Order, Return Policy, Contact Support
```
```
Get Started, Pricing, Features, Documentation
```

---

### 3.3 APPEARANCE - BRANDING (Tab 3)

#### 3.3.1 Brand Image URL
- **Option:** `axai_aichat_brand_image_url`
- **Type:** URL
- **Description:** Logo/Icon in the header
- **Examples:**
```
https://example.com/logo.png
https://cdn.example.com/brand-icon.svg
/wp-content/uploads/2024/brand.png
```

#### 3.3.2 Sponsor Link
- **Option:** `axai_aichat_sponsor_link`
- **Type:** URL
- **Description:** Link to sponsor website
- **Example:**
```
https://www.sponsor-company.com
```

#### 3.3.3 Sponsor Text
- **Option:** `axai_aichat_sponsor_text`
- **Type:** Text
- **Description:** Displayed sponsor name
- **Example:**
```
Powered by TechCorp
Sponsored by AxAI
```

#### 3.3.4 Support Email
- **Option:** `axai_aichat_support_email`
- **Type:** Email
- **Description:** Support email in the menu (3-dot menu top right)
- **Examples:**
```
support@example.com
help@mycompany.com
info@axai.at
```

#### 3.3.5 Reset Chat Text
- **Option:** `axai_aichat_reset_chat_text`
- **Type:** Text
- **Default:** `Reset Chat`
- **Description:** Label for the reset button in the menu

#### 3.3.6 Window Width
- **Option:** `axai_aichat_window_width`
- **Type:** Text (CSS Value)
- **Default:** `400px`
- **Description:** Width of the chat window
- **Examples:**
```
400px
30%
50vw
500px
```

#### 3.3.7 Window Height
- **Option:** `axai_aichat_window_height`
- **Type:** Text (CSS Value)
- **Default:** `600px`
- **Description:** Height of the chat window
- **Examples:**
```
600px
80vh
700px
90%
```

#### 3.3.8 Assistant Name
- **Option:** `axai_aichat_assistant_name`
- **Type:** Text
- **Default:** `AI Assistant`
- **Description:** Name displayed in the chat header
- **Examples:**
```
Support Bot
Customer Helper
Tech Assistant
```

#### 3.3.9 Assistant Icon
- **Option:** `axai_aichat_assistant_icon`
- **Type:** URL
- **Description:** Avatar/Icon for the AI assistant
- **Examples:**
```
https://example.com/avatar.png
/wp-content/uploads/2024/bot-icon.svg
```

#### 3.3.10 Greeting Message
- **Option:** `axai_aichat_greeting`
- **Type:** Textarea
- **Description:** First message displayed when opening the chat
- **Examples:**
```
Welcome! How can I help you today?
```
```
Hi there! I'm here to answer your questions about our products.
```
```
Hello! Ready to assist you 24/7.
```

---

### 3.4 APPEARANCE - THEMES (Tab 4)

#### 3.4.1 Theme Selection
- **Option:** `axai_aichat_theme`
- **Type:** Select (String)
- **Default:** `default`

**Available Themes:**
1. **default** - Classic AnythingLLM design
2. **dark** - Dark mode with high contrast
3. **light** - Bright, minimalist design
4. **minimalist** - Ultra-clean, reduced UI
5. **modern** - Contemporary design with gradients
6. **ocean** - Blue-green color scheme
7. **sunset** - Orange-red warm tones
8. **forest** - Green nature theme
9. **purple** - Purple-violet color palette
10. **coffee** - Brown earth tones
11. **midnight** - Deep dark blue
12. **cyberpunk** - Neon colors, futuristic
13. **retro** - Vintage 80s style
14. **professional** - Corporate blue-gray
15. **warm** - Warm beige tones
16. **cool** - Cool blue-gray palette
17. **gradient** - Dynamic color gradients

#### 3.4.2 Transparency
- **Option:** `axai_aichat_transparency`
- **Type:** Number (Integer)
- **Range:** 0 - 100
- **Default:** `100`
- **Unit:** Percentage (%)
- **Description:** Background transparency of the chat window
- **Examples:**
  - `100` = Fully opaque
  - `95` = Slightly transparent
  - `80` = Semi-transparent
  - `50` = Highly transparent

#### 3.4.3 Blur Effect
- **Option:** `axai_aichat_blur`
- **Type:** Number (Integer)
- **Range:** 0 - 20
- **Default:** `0`
- **Unit:** Pixels (px)
- **Description:** Backdrop blur effect (glassmorphism)
- **Examples:**
  - `0` = No blur
  - `5` = Subtle blur
  - `10` = Medium blur
  - `15` = Strong blur

**Browser Compatibility:**
- Requires `backdrop-filter` CSS support
- Safari needs `-webkit-backdrop-filter`
- Not supported in IE11

---

## 4. DATA ATTRIBUTES REFERENCE

### 4.1 Complete List of Data Attributes

All configuration options are passed as `data-*` attributes on the embed script:

```html
<script
  data-embed-id="abc-123-def"
  data-base-api-url="https://ai.axai.at:3002"
  data-position="bottom-right"
  data-chat-icon="chatBubble"
  data-assistant-name="AI Helper"
  data-assistant-icon="https://..."
  data-window-width="400px"
  data-window-height="600px"
  data-greeting="Hello!"
  data-prompt="System prompt text..."
  data-model="gpt-4"
  data-temperature="0.7"
  data-language="en"
  data-default-messages="Message1,Message2"
  data-brand-image-url="https://..."
  data-sponsor-text="Powered by X"
  data-sponsor-link="https://..."
  data-support-email="support@..."
  data-reset-chat-text="Reset"
  data-open-on-load="on"
  data-show-thoughts="on"
  data-no-sponsor="true"
  data-no-header="true"
  src=".../anythingllm-chat-widget.min.js">
</script>
```

### 4.2 Required vs Optional Attributes

**Required (Minimum):**
- `data-embed-id`
- `data-base-api-url`

**Optional (with defaults):**
- All other attributes have sensible defaults

---

## 5. THEME SYSTEM

### 5.1 CSS Variables Architecture

Each theme is defined via CSS variables in the `body` class:

```css
body.axai-theme-dark {
  --chat-bg-primary: #1a1a1a;
  --chat-bg-secondary: #2d2d2d;
  --chat-text-primary: #ffffff;
  --chat-text-secondary: #b0b0b0;
  --chat-accent: #4a9eff;
  --chat-border: #404040;
  --chat-hover: #3a3a3a;
}
```

### 5.2 Theme Color Palettes

**Default Theme:**
- Primary BG: `#ffffff`
- Secondary BG: `#f9fafb`
- Text Primary: `#111827`
- Text Secondary: `#6b7280`
- Accent: `#3b82f6`

**Dark Theme:**
- Primary BG: `#1a1a1a`
- Secondary BG: `#2d2d2d`
- Text Primary: `#ffffff`
- Text Secondary: `#b0b0b0`
- Accent: `#4a9eff`

**Ocean Theme:**
- Primary BG: `#0a1e2e`
- Secondary BG: `#1a3a4e`
- Text Primary: `#e0f2f1`
- Text Secondary: `#80cbc4`
- Accent: `#00bcd4`

**Cyberpunk Theme:**
- Primary BG: `#0d0221`
- Secondary BG: `#1a0d3e`
- Text Primary: `#00ff9f`
- Text Secondary: `#ff00ff`
- Accent: `#00ffff`

### 5.3 Applying Custom Colors

**Method 1: Select predefined theme**
```
Theme: cyberpunk
```

**Method 2: Custom CSS (advanced)**
Add to your theme's `functions.php`:
```php
add_action('wp_head', function() {
    echo '<style>
        body.axai-theme-custom {
            --chat-bg-primary: #your-color;
            --chat-accent: #your-accent;
        }
    </style>';
});
```

---

## 6. USE CASES AND EXAMPLES

### 6.1 E-Commerce Support

**Configuration:**
```
Theme: default
Position: bottom-right
Assistant Name: "Shopping Assistant"
Greeting: "Welcome! Need help finding something?"
System Prompt: "You are a helpful e-commerce assistant. Help users with:
                - Product information and recommendations
                - Order tracking and status
                - Return and refund policies
                - Sizing and specifications
                Be friendly and solution-oriented."
Temperature: 0.4
Model: gpt-4-turbo
Default Messages: "Track Order, Product Info, Returns, Shipping"
```

### 6.2 Technical Support

**Configuration:**
```
Theme: professional
Position: bottom-left
Assistant Name: "Tech Support"
Greeting: "Hi! Experiencing technical issues? I'm here to help!"
System Prompt: "You are a technical support specialist. Provide:
                - Step-by-step troubleshooting guides
                - Clear, non-technical explanations
                - Links to relevant documentation
                - Escalation to human support when needed
                Be patient and thorough."
Temperature: 0.3
Model: claude-3-sonnet
Support Email: support@example.com
Default Messages: "Login Issues, Bug Report, Feature Request, Documentation"
```

### 6.3 Creative Agency

**Configuration:**
```
Theme: gradient
Position: bottom-right
Assistant Name: "Creative Assistant"
Greeting: "Let's bring your vision to life! 🎨"
System Prompt: "You are a creative assistant for a design agency. Help with:
                - Project inquiries and quotes
                - Portfolio questions
                - Design trends and ideas
                - Creative briefs
                Be inspiring and professional."
Temperature: 0.8
Model: gpt-4
Brand Image URL: https://agency.com/logo.png
Window Width: 450px
Window Height: 650px
```

### 6.4 Healthcare/Medical

**Configuration:**
```
Theme: warm
Position: bottom-right
Assistant Name: "Health Guide"
Greeting: "Hello! How can I help with your health questions today?"
System Prompt: "You are a healthcare information assistant. Provide:
                - General health information (not medical advice)
                - Appointment scheduling help
                - Insurance and billing questions
                Always remind users to consult healthcare professionals for medical advice.
                Be compassionate and clear."
Temperature: 0.2
Model: gpt-4
Support Email: info@clinic.com
Default Messages: "Schedule Appointment, Insurance Info, Office Hours, Directions"
```

### 6.5 Educational Platform

**Configuration:**
```
Theme: ocean
Position: top-right
Assistant Name: "Study Buddy"
Greeting: "Ready to learn? Let's get started! 📚"
System Prompt: "You are a friendly educational assistant. Help students with:
                - Subject explanations
                - Study tips and resources
                - Course navigation
                - Assignment questions
                Encourage learning and critical thinking."
Temperature: 0.6
Model: claude-3-sonnet
Language: en
Default Messages: "Math Help, Homework, Explanation, Start Quiz"
```

### 6.6 Restaurant / Café

**Configuration:**
```
Theme: coffee
Position: bottom-left
Assistant Name: "Café Assistant"
Greeting: "Welcome to our café! ☕ May I help you?"
System Prompt: "You are a friendly café assistant. Help with:
                - Reservations
                - Menu questions and recommendations
                - Special dietary requirements
                Be warm and inviting."
Temperature: 0.7
Model: gpt-3.5-turbo
Default Messages: "Menu, Reservations, Hours, Events"
Window Width: 450px
Window Height: 600px
```

---

## 7. ADVANCED CONFIGURATION

### 7.1 Multi-Language Setup

**Scenario:** Website with language switcher

**Method 1: Multiple Embeds (different workspace IDs)**
```
DE: Embed ID abc-123 + Language: de
EN: Embed ID def-456 + Language: en
FR: Embed ID ghi-789 + Language: fr
```

**Method 2: One Embed with multilingual prompt**
```
System Prompt: "Detect the user's language and respond in that language.
                Support German, English, and French."
Language: en
```

### 7.2 Conditional Display (Theme-Matching)

**Dark Mode Website:**
```
Theme: dark or midnight
Transparency: 95%
Blur: 8px
```

**Light Mode Website:**
```
Theme: default or minimalist
Transparency: 100%
Blur: 0px
```

### 7.3 Custom Branding

**White-Label Setup:**
```
Brand Image URL: https://mycompany.com/logo.png
Assistant Name: "MyCompany Assistant"
Assistant Icon: https://mycompany.com/avatar.png
Sponsor Text: "Powered by MyCompany"
Sponsor Link: https://mycompany.com
Support Email: support@mycompany.com
No Sponsor: false (shows branding)
```

### 7.4 Mobile Optimization

**Recommended Settings:**
```
Window Width: 95%
Window Height: 85vh
Position: bottom-right
Theme: minimalist (better readability on small screens)
```

---

## 8. SECURITY AND BEST PRACTICES

### 8.1 Sanitization

The plugin uses WordPress sanitization:
- `sanitize_text_field()` for text inputs
- `esc_url_raw()` for URLs
- `sanitize_hex_color()` for colors
- `sanitize_textarea_field()` for multiline texts
- `sanitize_email()` for email addresses

### 8.2 Output Escaping

- `esc_attr()` for HTML attributes
- `esc_html()` for HTML content
- `esc_url()` for URLs
- `wp_kses()` for CSS

### 8.3 Recommended Security Measures

**1. Server Access:**
- Use HTTPS for server URL
- Secure AnythingLLM with authentication
- Use firewalls for server access

**2. Sensitive Data:**
- Do NOT store API keys in system prompt
- Avoid personal data in default messages
- Use secure email addresses

**3. Content Filtering:**
- Configure content filters in AnythingLLM backend
- Set rate limits
- Monitor chat logs

---

## 9. TROUBLESHOOTING

### 9.1 Chat Widget Doesn't Load

**Causes & Solutions:**
- **Missing Embed ID:** Check `axai_aichat_embed_id`
- **Server not reachable:** Test server URL in browser
- **JavaScript errors:** Check browser console
- **Firewall:** Verify server port is open

### 9.2 Styles Not Applied

**Solutions:**
- Clear browser cache
- Check if `themes.css` is loaded
- Verify theme class in `<body>` tag
- Test with different theme

### 9.3 AI Doesn't Respond

**Causes:**
- AnythingLLM server offline
- Workspace not configured
- LLM provider error (OpenAI, Anthropic, etc.)
- Rate limit reached

### 9.4 Transparency/Blur Not Working

**Check browser support:**
- `backdrop-filter` requires modern browsers
- Safari: `-webkit-backdrop-filter` prefix needed
- IE11: Not supported

---

## 10. API REFERENCE

### 10.1 WordPress Hooks

**Actions:**
```php
add_action('admin_menu', 'add_admin_menu')           // Add admin menu
add_action('admin_init', 'register_settings')         // Register settings
add_action('wp_footer', 'render_chat_widget')         // Render widget
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts') // Admin assets
add_action('plugins_loaded', 'axai_galaxy_aichat_init')     // Initialize plugin
```

**Activation Hooks:**
```php
register_activation_hook(__FILE__, 'axai_aichat_activate')
register_deactivation_hook(__FILE__, 'axai_aichat_deactivate')
```

### 10.2 WordPress Options

All settings are stored as WordPress options:
```php
get_option('axai_aichat_embed_id')
get_option('axai_aichat_server_url', 'default_value')
update_option('axai_aichat_theme', 'dark')
```

### 10.3 Programmatic Access

```php
// Get plugin instance
$plugin = AxAI_Galaxy_AIChat::get_instance();

// Set options programmatically
update_option('axai_aichat_theme', 'cyberpunk');
update_option('axai_aichat_temperature', 0.8);
```

---

## 11. DATABASE SCHEMA

### 11.1 WordPress Options Table

All plugin settings in `wp_options`:

| option_name | option_value | autoload |
|-------------|--------------|----------|
| `axai_aichat_embed_id` | `abc-123-def` | yes |
| `axai_aichat_server_url` | `https://...` | yes |
| `axai_aichat_position` | `bottom-right` | yes |
| `axai_aichat_theme` | `default` | yes |
| `axai_aichat_temperature` | `0.7` | yes |
| ... | ... | yes |

**Autoload:** All options with `autoload=yes` for fast access

---

## 12. PERFORMANCE OPTIMIZATION

### 12.1 Lazy Loading

The widget script is loaded in the footer (non-blocking):
```html
<script ... src="...anythingllm-chat-widget.min.js"></script>
```

### 12.2 Caching

- CSS is loaded with version hash: `?ver=2.2.1`
- Browser caching enabled
- WordPress Object Cache compatible

### 12.3 Asset Sizes

- `themes.css`: ~30 KB (all 17 themes)
- `admin.css`: ~5 KB
- `admin.js`: ~3 KB
- AnythingLLM Widget: ~150 KB (external)

---

## 13. SUMMARY FOR LLM TRAINING

### 13.1 Core Concepts

1. **Plugin Purpose:** WordPress integration for AnythingLLM Chat Widget
2. **Main Components:** Embed code generator, theme system, admin interface
3. **Configuration:** 40+ settings options via WordPress admin
4. **Themes:** 17 predefined color schemes with CSS variables
5. **AI Control:** Prompt, model, temperature, language

### 13.2 Most Important Parameters for LLM Fine-Tuning

**Required:**
- Embed ID (unique workspace ID)
- Server URL (AnythingLLM endpoint)

**AI Behavior:**
- System Prompt (defines role/behavior)
- Temperature (creativity: 0.0-1.0)
- Model (LLM selection)

**UX:**
- Theme (visual presentation)
- Position (placement)
- Greeting (welcome message)

### 13.3 Typical Value Ranges

| Parameter | Minimum | Maximum | Recommended |
|-----------|---------|---------|-------------|
| Temperature | 0.0 | 1.0 | 0.3-0.7 |
| Transparency | 0% | 100% | 100% |
| Blur | 0px | 20px | 0-10px |
| Window Width | 300px | 100% | 400px-40% |
| Window Height | 400px | 100vh | 600px-80vh |

---

## 14. CHANGELOG

### Version 2.2.1
- Security: Added output escaping
- Security: Sanitization callbacks for all settings
- Updated README (WordPress standards)

### Version 2.2.0
- Implemented 17 theme system
- Transparency and blur effects
- CSS variables system

---

## 15. SUPPORT AND RESOURCES

**Plugin URI:** https://axai.at
**Author:** Ali Kutlusoy
**License:** GPL v2 or later
**AnythingLLM Docs:** https://docs.anythingllm.com/
**WordPress Plugin API:** https://developer.wordpress.org/plugins/

---

**End of Handbook**

This document provides complete information on the configuration, customization, and usage of the AxAI Galaxy AIChat Plugin for WordPress. All parameters, options, and use cases are documented in detail with examples.
