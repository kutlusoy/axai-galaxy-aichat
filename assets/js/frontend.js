/**
 * AxAI Galaxy AnythingLLM Chat Widget - Frontend JavaScript
 * Version: 2.2.5
 * Author: Ali Kutlusoy
 * 
 * File Path: /axai-galaxy-aichat/assets/js/frontend.js
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        console.log('AxAI Frontend JS loaded v2.2.5');
        
        // Wait for AnythingLLM widget to load
        var attempts = 0;
        var maxAttempts = 100; // 10 seconds (100 * 100ms)
        
        var checkWidget = setInterval(function() {
            attempts++;
            
            // AnythingLLM creates a div with this ID
            var chatContainer = $('#anythingllm-chat-widget-container');
            
            if (chatContainer.length) {
                console.log('AnythingLLM Widget detected!');
                clearInterval(checkWidget);
                initializeChatWidget(chatContainer);
            } else if (attempts >= maxAttempts) {
                console.log('AnythingLLM Widget not found after ' + maxAttempts + ' attempts');
                clearInterval(checkWidget);
            }
        }, 100);
        
        /**
         * Initialize chat widget after it's loaded
         */
        function initializeChatWidget(container) {
            console.log('Initializing AxAI chat widget enhancements');
            
            // Add custom class for additional styling if needed
            container.addClass('axai-enhanced');
            
            // Optional: Add custom event listeners
            container.on('click', function(e) {
                // Custom click handler if needed
            });
            
            console.log('AxAI chat widget initialization complete');
        }
        
    });
    
})(jQuery);
