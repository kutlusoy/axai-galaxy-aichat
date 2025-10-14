/**
 * AxAI Galaxy AnythingLLM Chat Widget - Admin JavaScript
 * Version: 2.1.4
 * Author: Ali Kutlusoy
 * 
 * File Path: /axai-galaxy-aichat/assets/js/admin.js
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        console.log('AxAI Admin JS loaded v2.1.4');
        
        // ========================================
        // WordPress Color Picker
        // ========================================
        if ($.fn.wpColorPicker) {
            $('.axai-color-picker').wpColorPicker();
        }
        
        // ========================================
        // Tab Switching
        // ========================================
        $('.nav-tab').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            
            // Update navigation
            $('.nav-tab').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            
            // Update content
            $('.axai-tab-content').removeClass('active').hide();
            $(target).addClass('active').fadeIn(200);
            
            console.log('Switched to tab:', target);
        });
        
        // Activate first tab if none active
        if ($('.nav-tab-active').length === 0) {
            $('.nav-tab').first().addClass('nav-tab-active');
        }
        if ($('.axai-tab-content.active').length === 0) {
            $('.axai-tab-content').first().addClass('active').show();
        }
        
        // ========================================
        // Slider Value Display (Transparency & Blur)
        // ========================================
        $('.axai-slider').each(function() {
            var $slider = $(this);
            var $valueDisplay = $slider.next('.slider-value');
            
            // Initial display
            updateSliderDisplay($slider, $valueDisplay);
            
            // Update on change
            $slider.on('input change', function() {
                updateSliderDisplay($slider, $valueDisplay);
            });
        });
        
        function updateSliderDisplay($slider, $valueDisplay) {
            var value = $slider.val();
            var sliderId = $slider.attr('id');
            
            if (sliderId === 'axai_aichat_transparency') {
                $valueDisplay.text(value + '%');
            } else if (sliderId === 'axai_aichat_blur') {
                $valueDisplay.text(value + 'px');
            } else {
                $valueDisplay.text(value);
            }
        }
        
        // ========================================
        // Theme Selector - Show/Hide Custom Colors
        // ========================================
        var $themeSelect = $('#axai_aichat_theme');
        var $customThemeColors = $('#custom-theme-colors');
        
        if ($themeSelect.length && $customThemeColors.length) {
            // Initial state
            toggleCustomColors();
            
            // On change
            $themeSelect.on('change', function() {
                toggleCustomColors();
            });
        }
        
        function toggleCustomColors() {
            if ($themeSelect.val() === 'custom') {
                $customThemeColors.slideDown(300);
            } else {
                $customThemeColors.slideUp(300);
            }
        }
        
        // ========================================
        // Theme Preview
        // ========================================
        if ($('#theme-preview').length) {
            var $preview = $('#theme-preview .theme-preview-box');
            
            // Theme names and colors
            var themeColors = {
                'default': { bg: '#ffffff', text: '#222628', name: 'Default' },
                'linux': { bg: '#000000', text: '#00ff00', name: 'Linux Terminal' },
                'dark': { bg: '#1f2937', text: '#f9fafb', name: 'Dark Mode' },
                'ocean': { bg: '#f0f9ff', text: '#0c4a6e', name: 'Ocean Blue' },
                'forest': { bg: '#f0fdf4', text: '#14532d', name: 'Forest Green' },
                'sunset': { bg: '#fef7ed', text: '#7c2d12', name: 'Sunset Orange' },
                'royal': { bg: '#faf5ff', text: '#4c1d95', name: 'Royal Purple' },
                'midnight': { bg: '#0f172a', text: '#f1f5f9', name: 'Midnight' },
                'coffee': { bg: '#fef3c7', text: '#451a03', name: 'Coffee' },
                'neon': { bg: '#0a0a0a', text: '#00ffff', name: 'Neon' },
                'minimalist': { bg: '#ffffff', text: '#1e293b', name: 'Minimalist' },
                'rose': { bg: '#fff1f2', text: '#881337', name: 'Rose' },
                'cyberpunk': { bg: '#000000', text: '#00ffff', name: 'Cyberpunk' },
                'nature': { bg: '#f0fdf4', text: '#1a2e05', name: 'Nature' },
                'professional': { bg: '#ffffff', text: '#1e293b', name: 'Professional' },
                'retro': { bg: '#fef3c7', text: '#78350f', name: 'Retro' },
                'candy': { bg: '#fdf2f8', text: '#831843', name: 'Candy' },
                'custom': { bg: '#ffffff', text: '#222628', name: 'Custom Theme' }
            };
            
            // Initial Preview
            updatePreview($themeSelect.val());
            
            // Update on change
            $themeSelect.on('change', function() {
                var theme = $(this).val();
                updatePreview(theme);
            });
            
            function updatePreview(theme) {
                var colors = themeColors[theme] || themeColors['default'];
                
                // Remove all theme classes
                $preview.removeClass(function (index, className) {
                    return (className.match(/(^|\s)axai-theme-\S+/g) || []).join(' ');
                });
                
                // Add new theme class to body for CSS variables
                $('body').removeClass(function (index, className) {
                    return (className.match(/(^|\s)axai-theme-\S+/g) || []).join(' ');
                });
                
                if (theme !== 'default') {
                    $('body').addClass('axai-theme-' + theme);
                }
                
                // Apply inline styles to preview box
                $preview.css({
                    'background-color': colors.bg,
                    'color': colors.text
                });
                
                // Update preview text
                $preview.text(colors.name + ' Preview');
                
                console.log('Theme preview updated:', theme, colors);
            }
        }
        
        // ========================================
        // Form Validation
        // ========================================
        $('form').on('submit', function(e) {
            var embedId = $('#axai_aichat_embed_id').val();
            var serverUrl = $('#axai_aichat_server_url').val();
            
            if (!embedId || embedId.trim() === '') {
                alert('Please enter a Workspace Embed ID!');
                e.preventDefault();
                return false;
            }
            
            if (!serverUrl || serverUrl.trim() === '') {
                alert('Please enter an AI server URL!');
                e.preventDefault();
                return false;
            }
            
            // Remove theme class from body when saving
            $('body').removeClass(function (index, className) {
                return (className.match(/(^|\s)axai-theme-\S+/g) || []).join(' ');
            });
            
            return true;
        });
        
        // ========================================
        // Code Preview Update (Advanced Tab)
        // ========================================
        function updateCodePreview() {
            var embedId = $('#axai_aichat_embed_id').val() || 'YOUR-EMBED-ID';
            var serverUrl = $('#axai_aichat_server_url').val() || 'https://ai.axai.at:3002';
            
            var code = '<script\n';
            code += '  data-embed-id="' + embedId + '"\n';
            code += '  data-base-api-url="' + serverUrl + '/api/embed"\n';
            code += '  src="' + serverUrl + '/embed/anythingllm-chat-widget.min.js"\n';
            code += '></script>';
            
            $('#embed-code-preview code').text(code);
        }
        
        // Update code preview when fields change
        $('#axai_aichat_embed_id, #axai_aichat_server_url').on('input', function() {
            updateCodePreview();
        });
        
        // Initial code preview
        updateCodePreview();
        
        // ========================================
        // Helpful Tips
        // ========================================
        console.log('Tipps:');
        console.log('- All themes should now work!');
        console.log('- Transparency: 0-100% (100% = fully visible)');
        console.log('- Blur: 0-20px (0 = no blur)');
        console.log('- Custom Theme: Select "Custom Theme" and customize all colors');
        console.log('- Version 2.1.4: Improved theme support for all elements');
        
    });
    
})(jQuery);
