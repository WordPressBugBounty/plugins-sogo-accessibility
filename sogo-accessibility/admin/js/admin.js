(function ($) {
    'use strict';

    /**
     * All of the code for your admin-specific JavaScript source
     * should reside in this file.
     *
     * Note that this assume you're going to use jQuery, so it prepares
     * the $ function reference to be used within the scope of this
     * function.
     *
     * From here, you're able to define handlers for when the DOM is
     * ready:
     *

     *
     * Or when the window is loaded:
     *
     * $( window ).on( 'load', function() {
	 *
	 * });
     *
     * ...and so on.
     *
     * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
     * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
     * be doing this, we should try to minimize doing that in our own work.
     */

    $( window ).on( 'load', function() {
        var $field = $('#sogo_accessibility_settings\\[license_key\\]');

        if ( ! $field.length || typeof sogoAccAdmin === 'undefined' ) {
            return;
        }

        $.ajax({
            type: "POST",
            url: sogoAccAdmin.ajaxurl,
            data: {
                'action': 'check_license',
                'nonce': sogoAccAdmin.nonce
            },
            success: function (response) {
                 $(response).insertAfter($field);
            }
        });

    });

})(jQuery);
