/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

function meta_store_dynamic_css(control, style) {
    jQuery("style." + control).remove();

    jQuery("head").append('<style class="' + control + '">' + style + "</style>");
}

function meta_store_get_contrast(hexcolor) {
    var hex = String(hexcolor).replace(/[^0-9a-f]/gi, "");
    if (hex.length < 6) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    var r = parseInt(hex.substr(0, 2), 16);
    var g = parseInt(hex.substr(2, 2), 16);
    var b = parseInt(hex.substr(4, 2), 16);
    var contrast = (r * 299 + g * 587 + b * 114) / 1000;
    return contrast;
}

function meta_store_convert_hex(hexcolor, opacity) {
    var hex = String(hexcolor).replace(/[^0-9a-f]/gi, "");
    if (hex.length < 6) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    r = parseInt(hex.substring(0, 2), 16);
    g = parseInt(hex.substring(2, 4), 16);
    b = parseInt(hex.substring(4, 6), 16);

    result = "rgba(" + r + "," + g + "," + b + "," + opacity / 100 + ")";
    return result;
}

(function ($) {
    wp.customize('meta_store_display_title', function (value) {
        value.bind(function (to) {
            if (!to) {
                var css = '.ms-site-title {clip:rect(1px, 1px, 1px, 1px); position:absolute}';
            } else {
                var css = '.ms-site-title {clip:auto; position:relative}';
            }
            meta_store_dynamic_css('meta_store_display_title', css);
        });
    });

    wp.customize('meta_store_display_tagline', function (value) {
        value.bind(function (to) {
            if (!to) {
                var css = '.ms-site-description {clip:rect(1px, 1px, 1px, 1px); position:absolute}';
            } else {
                var css = '.ms-site-description {clip:auto; position:relative}';
            }
            meta_store_dynamic_css('meta_store_display_tagline', css);
        });
    });

    wp.customize('meta_store_title_tagline_color', function (value) {
        value.bind(function (to) {
            var css = '.ms-site-title, .ms-site-description {color:' + to + '}';
            meta_store_dynamic_css('meta_store_title_tagline_color', css);
        });
    });
})(jQuery);
