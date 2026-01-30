/**
 * Admin JavaScript for Media Uploader
 *
 * @package wimper-theme
 */

jQuery(document).ready(function ($) {
    'use strict';

    // Media uploader for location images
    $('.wimper-upload-button').on('click', function (e) {
        e.preventDefault();

        const button = $(this);
        const fieldId = button.data('field');
        const inputField = $('#' + fieldId);
        const previewContainer = button.siblings('.wimper-image-preview');

        // Create WordPress media frame
        const mediaUploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        // When image is selected
        mediaUploader.on('select', function () {
            const attachment = mediaUploader.state().get('selection').first().toJSON();
            inputField.val(attachment.url);

            // Update preview if it exists
            if (previewContainer.length) {
                previewContainer.html('<img src="' + attachment.url + '" style="max-width: 200px; height: auto; margin-top: 10px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;" />');
            }
        });

        // Open media uploader
        mediaUploader.open();
    });

    // Clear image button
    $('.wimper-clear-button').on('click', function (e) {
        e.preventDefault();

        const button = $(this);
        const fieldId = button.data('field');
        const inputField = $('#' + fieldId);
        const previewContainer = button.siblings('.wimper-image-preview');

        inputField.val('');
        previewContainer.empty();
    });

    // Show preview for existing images
    $('.wimper-image-field').each(function () {
        const inputField = $(this);
        const imageUrl = inputField.val();
        const previewContainer = inputField.siblings('.wimper-image-preview');

        if (imageUrl && previewContainer.length) {
            previewContainer.html('<img src="' + imageUrl + '" style="max-width: 200px; height: auto; margin-top: 10px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;" />');
        }
    });
});
