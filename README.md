\# AxAI Galaxy AnythingLLM Chat Widget

Contributors: Ali Kutlusoy

Tags: chat, ai, chatbot, anythingllm, llm, artificial intelligence

Requires at least: 5.0

Tested up to: 6.4

Stable tag: 2.1.0

Requires PHP: 7.4

License: GPLv2 or later

License URI: https://www.gnu.org/licenses/gpl-2.0.html



Integrates AnythingLLM Chat Widget with advanced theme and customization options.



\## Description



AxAI Galaxy AnythingLLM Chat Widget enables easy integration of the AnythingLLM Chat Widget into your WordPress website with extensive customization options.



\*\*Key Features:\*\*



\* 17 predefined themes (including Linux Terminal, Cyberpunk, Neon, etc.)

\* Custom theme customization with your own color scheme

\* Transparency and blur effects

\* AI configuration options (prompt, model, temperature, language)

\* Default messages support

\* Easy configuration via WordPress Admin Panel

\* Clean, simple interface without unnecessary modal features



\*\*Available Themes:\*\*



1\. Default (AnythingLLM Original)

2\. Linux Terminal (with green glow effect)

3\. Dark Mode

4\. Ocean Blue

5\. Forest Green

6\. Sunset Orange

7\. Royal Purple

8\. Midnight

9\. Coffee

10\. Neon (with Cyan Glow)

11\. Minimalist

12\. Rose

13\. Cyberpunk (with Magenta Glow)

14\. Nature

15\. Professional

16\. Retro

17\. Candy

18\. Custom (your own colors)



\*\*Configuration Options:\*\*



\* System Prompt: Override the default AI instructions

\* Model: Specify which AI model to use (e.g., gpt-4, claude-3-opus)

\* Temperature: Control randomness (0.0 - 2.0)

\* Language: Set the chat interface language

\* Default Messages: Pre-populate the chat with messages (JSON array)



\## Installation



1\. Upload the plugin directory to `/wp-content/plugins/axai-galaxy-aichat`

2\. Activate the plugin through the 'Plugins' menu in WordPress

3\. Navigate to Settings > AxAI AI Chat

4\. Enter your Workspace Embed ID and AI Server URL

5\. Select a theme and customize settings as desired



\## Frequently Asked Questions



\### Do I need an AnythingLLM Server?



Yes, you need access to an AnythingLLM server and a Workspace Embed ID.



\### Can I use my own colors?



Yes, select "Custom Theme" in the theme settings and customize all colors individually.



\### Does the plugin work on mobile devices?



Yes, the plugin is fully responsive and works on all devices.



\### Can I have multiple chat widgets on different pages?



The plugin adds the widget to all pages. For page-specific settings, please use conditional tags in a customized version.



\### What AI parameters can I configure?



You can configure:

\- System Prompt: Override the default AI instructions

\- Model: Specify which AI model to use (e.g., gpt-4, claude-3-opus)

\- Temperature: Control randomness (0.0 - 2.0)

\- Language: Set the chat interface language

\- Default Messages: Pre-populate the chat with messages (JSON array)



\## Changelog



\### 2.1.0

\* Removed modal window functionality (float, shadow, drag, minimize)

\* Simplified user interface

\* Cleaner, more focused feature set

\* Improved stability and performance

\* Maintained all theme and AI configuration features



\### 2.0.3

\* Added AI configuration options (prompt, model, temperature, language)

\* Added default messages support (JSON format)

\* Improved theme application with proper CSS selectors

\* Fixed modal functionality (drag, minimize, float, shadow)

\* Complete English translation

\* Enhanced admin interface

\* Better code organization

\* Improved documentation



\### 2.0.2

\* Bug fixes and improvements



\### 2.0.1

\* Minor updates



= 2.0 =

\* Complete redesign

\* 17 predefined themes

\* Extended customization options

\* Modal functions (Float, Shadow, Drag, Minimize)

\* Transparency and blur effects

\* Improved admin interface with tabs



\### 1.0

\* Initial release



\## Upgrade Notice



\### 2.1.0

Simplified plugin by removing modal window features. The chat functionality remains unchanged and works perfectly. If you were using modal features (drag, minimize, float), these have been removed for a cleaner, simpler experience.



\### 2.0.3

Added AI configuration options, improved theme application, and fixed modal functionality. Complete English translation.



\### 2.0

Complete redevelopment with extended features and theme system.



\## Screenshots



1\. Admin Panel: Basic Configuration

2\. Admin Panel: AI Settings

3\. Admin Panel: Theme Selection

4\. Frontend: Linux Terminal Theme

5\. Frontend: Cyberpunk Theme

6\. Frontend: Ocean Blue Theme



\## Support



For support contact: ali@axai.at

Website: https://axai.at



\## Credits



\* Plugin developed by Ali Kutlusoy

\* Based on AnythingLLM by Mintplex Labs

\* https://github.com/Mintplex-Labs/anythingllm-embed



\## Configuration Examples



\*\*Default Messages Format:\*\*

```json

Hello!, How can I help you?, What would you like to know?

```



\*\*System Prompt Example:\*\*

```

You are a helpful assistant specialized in customer support. 

Always be polite and provide clear, concise answers.

```



\*\*Model Examples:\*\*

\- gpt-4

\- gpt-3.5-turbo

\- claude-3-opus

\- claude-3-sonnet

\- or ...



\*\*Temperature Guidelines:\*\*

\- 0.0 - 0.3: Very focused and deterministic

\- 0.4 - 0.7: Balanced (recommended)

\- 0.8 - 1.0: More creative and varied

