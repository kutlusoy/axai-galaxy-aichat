/**
 * AxAI Galaxy AnythingLLM Chat Widget - Admin JavaScript
 * Version: 2.2.0
 * Author: Ali Kutlusoy
 * 
 * File Path: /axai-galaxy-aichat/assets/js/admin.js
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        console.log('AxAI Admin JS loaded v2.2.0');
        
        // ========================================
        // WordPress Color Picker
        // ========================================
        if ($.fn.wpColorPicker) {
            $('.axai-color-picker').wpColorPicker({
                change: function(event, ui) {
                    // Optional: Add custom logic when color changes
                },
                clear: function() {
                    // Optional: Add custom logic when color is cleared
                }
            });
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
            
            // Save active tab to localStorage
            localStorage.setItem('axai_active_tab', target);
        });
        
        // Restore last active tab or activate first tab
        var lastActiveTab = localStorage.getItem('axai_active_tab');
        if (lastActiveTab && $(lastActiveTab).length) {
            $('.nav-tab[href="' + lastActiveTab + '"]').trigger('click');
        } else if ($('.nav-tab-active').length === 0) {
            $('.nav-tab').first().addClass('nav-tab-active');
        }
        
        // Ensure at least one content is active
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
        // Form Validation
        // ========================================
        $('form').on('submit', function(e) {
            var embedId = $('#axai_aichat_embed_id').val();
            var serverUrl = $('#axai_aichat_server_url').val();
            
            if (!embedId || embedId.trim() === '') {
                alert('Please enter a Workspace Embed ID!');
                e.preventDefault();
                $('#axai_aichat_embed_id').focus();
                return false;
            }
            
            if (!serverUrl || serverUrl.trim() === '') {
                alert('Please enter an AI server URL!');
                e.preventDefault();
                $('#axai_aichat_server_url').focus();
                return false;
            }
            
            // Show loading state
            $(this).find('input[type="submit"]').prop('disabled', true).val('Saving...');
            
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
        // Copy to Clipboard (Advanced Tab)
        // ========================================
        if ($('#embed-code-preview').length) {
            // Add copy button
            var $copyButton = $('<button type="button" class="button button-secondary" style="margin-top: 10px;">Copy Code</button>');
            $('#embed-code-preview').after($copyButton);
            
            $copyButton.on('click', function() {
                var codeText = $('#embed-code-preview code').text();
                
                // Create temporary textarea
                var $temp = $('<textarea>');
                $('body').append($temp);
                $temp.val(codeText).select();
                
                try {
                    document.execCommand('copy');
                    $copyButton.text('Copied!').addClass('button-primary');
                    
                    setTimeout(function() {
                        $copyButton.text('Copy Code').removeClass('button-primary');
                    }, 2000);
                } catch (err) {
                    alert('Failed to copy code. Please copy manually.');
                }
                
                $temp.remove();
            });
        }
        
        // ========================================
        // Helpful Tooltips
        // ========================================
        $('.form-table input, .form-table select, .form-table textarea').on('focus', function() {
            var $description = $(this).closest('td').find('.description');
            if ($description.length) {
                $description.css('color', '#2271b1');
            }
        }).on('blur', function() {
            var $description = $(this).closest('td').find('.description');
            if ($description.length) {
                $description.css('color', '');
            }
        });
        
    });
    
})(jQuery);
