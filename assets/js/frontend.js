/**
 * AxAI Galaxy AnythingLLM Chat Widget - Frontend JavaScript
 * Version: 2.1.4
 * Author: Ali Kutlusoy
 * 
 * File Path: /axai-galaxy-aichat/assets/js/frontend.js
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        console.log('AxAI Frontend JS loaded v2.1.4');
        
        var chatWrapper = $('.axai-aichat-wrapper');
        
        if (!chatWrapper.length) {
            console.log('No chat wrapper found');
            return;
        }
        
        // Wait for AnythingLLM widget to load
        var attempts = 0;
        var maxAttempts = 100; // 10 seconds
        
        var checkWidget = setInterval(function() {
            attempts++;
            
            // AnythingLLM creates a div with this ID
            var chatContainer = $('#anythingllm-chat-widget-container');
            
            if (chatContainer.length) {
                console.log('AnythingLLM Widget found!');
                clearInterval(checkWidget);
                initializeChatWidget(chatWrapper, chatContainer);
            } else if (attempts >= maxAttempts) {
                console.log('AnythingLLM Widget not found after ' + maxAttempts + ' attempts');
                clearInterval(checkWidget);
            }
        }, 100);
        
        function initializeChatWidget(wrapper, container) {
            console.log('Initializing chat widget');
            console.log('Theme:', wrapper.attr('data-theme'));
            
            // Apply theme class to container
            var theme = wrapper.attr('data-theme');
            if (theme && theme !== 'default') {
                container.addClass('axai-theme-' + theme);
                console.log('Applied theme class: axai-theme-' + theme);
            }
            
            console.log('Chat widget initialization complete');
        }
        
    });
    
})(jQuery);
