define([
    'jquery',
    'mage/translate',
    'jquery/colorpicker/js/colorpicker'
], function ($, $t) {
    'use strict';

    return function (config, element) {
        var input = $(element).find('input[type="text"]').first(),
            pattern = /^#(?:[0-9a-f]{3}|[0-9a-f]{6})$/i,
            error, selectedColor;

        if (!input.length) {
            return;
        }

        error = $('<div class="mage-error" role="status"></div>')
            .text($t('Enter a hexadecimal color such as #fff or #ffffff.'))
            .hide()
            .appendTo(element);
        selectedColor = input.val().trim();

        input.ColorPicker({
            color: pattern.test(selectedColor) ? selectedColor : '#ffffff',
            onShow: function () {
                return !input.prop('disabled') && !input.prop('readOnly');
            },
            onChange: function (hsb, hex) {
                if (input.prop('disabled') || input.prop('readOnly')) {
                    return;
                }

                input.val('#' + hex).trigger('change');
            }
        });

        input.on('input change', function () {
            var color = input.val().trim(),
                valid = pattern.test(color);

            error.toggle(color !== '' && !valid);
            input.css('backgroundColor', valid ? color : '');

            if (valid) {
                input.ColorPickerSetColor(color);
            }
        }).triggerHandler('input');
    };
});
