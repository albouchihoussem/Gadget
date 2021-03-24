function meta_store_dynamic_css(control, style) {
    jQuery('style.' + control).remove();

    jQuery('head').append(
            '<style class="' + control + '">' + style + '</style>'
            );
}

jQuery(document).ready(function () {
    wp.customize("meta_store_body_font_family", function (value) {
        value.bind(function (to) {
            if (
                    to != "Courier" &&
                    to != "Times" &&
                    to != "Arial" &&
                    to != "Verdana" &&
                    to != "Trebuchet" &&
                    to != "Georgia" &&
                    to != "Tahoma" &&
                    to != "Palatino" &&
                    to != "Helvetica"
                    ) {
                WebFont.load({
                    google: {
                        families: [to],
                    },
                });
            }
            var css = "html, body, button, input, select, textarea{font-family:" + to + "}";
            meta_store_dynamic_css("meta_store_body_font_family", css);
        });
    });

    wp.customize("meta_store_body_font_style", function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, "");
            var style = to.replace(/\d+/g, "");
            if ("" == style) {
                style = "normal";
            }
            var css = "html, body, button, input, select, textarea{font-weight:" + weight + ";font-style:" + style + "}";
            meta_store_dynamic_css("meta_store_body_font_style", css);
        });
    });

    wp.customize("meta_store_body_text_transform", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{text-transform:" + to + "}";
            meta_store_dynamic_css("meta_store_body_text_transform", css);
        });
    });

    wp.customize("meta_store_body_text_decoration", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{text-decoration:" + to + "}";
            meta_store_dynamic_css("meta_store_body_text_decoration", css);
        });
    });

    wp.customize("meta_store_body_font_size", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{font-size:" + to + "px}";
            meta_store_dynamic_css("meta_store_body_font_size", css);
        });
    });

    wp.customize("meta_store_body_line_height", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{line-height:" + to + "}";
            meta_store_dynamic_css("meta_store_body_line_height", css);
        });
    });

    wp.customize("meta_store_body_letter_spacing", function (value) {
        value.bind(function (to) {
            var css = ".html, body, button, input, select, textarea{letter-spacing:" + to + "px}";
            meta_store_dynamic_css("meta_store_body_letter_spacing", css);
        });
    });

    wp.customize("meta_store_body_color", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{color:" + to + "}";
            meta_store_dynamic_css("meta_store_body_color", css);
        });
    });

    /*=== Menu ===*/
    wp.customize("meta_store_menu_font_family", function (value) {
        value.bind(function (to) {
            if (
                    to != "Courier" &&
                    to != "Times" &&
                    to != "Arial" &&
                    to != "Verdana" &&
                    to != "Trebuchet" &&
                    to != "Georgia" &&
                    to != "Tahoma" &&
                    to != "Palatino" &&
                    to != "Helvetica"
                    ) {
                WebFont.load({
                    google: {
                        families: [to],
                    },
                });
            }
            var css = "ul.ms-main-menu > li > a, .ms-main-navigation{font-family:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_font_family", css);
        });
    });

    wp.customize("meta_store_menu_font_style", function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, "");
            var style = to.replace(/\d+/g, "");
            if ("" == style) {
                style = "normal";
            }
            var css = "ul.ms-main-menu > li > a, .ms-main-navigation{font-weight:" + weight + ";font-style:" + style + "}";
            meta_store_dynamic_css("meta_store_menu_font_style", css);
        });
    });

    wp.customize("meta_store_menu_text_transform", function (value) {
        value.bind(function (to) {
            var css = "ul.ms-main-menu > li > a, .ms-main-navigation{text-transform:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_text_transform", css);
        });
    });

    wp.customize("meta_store_menu_text_decoration", function (value) {
        value.bind(function (to) {
            var css = "ul.ms-main-menu > li > a, .ms-main-navigation{text-decoration:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_text_decoration", css);
        });
    });

    wp.customize("meta_store_menu_font_size", function (value) {
        value.bind(function (to) {
            var css = "ul.ms-main-menu > li > a, .ms-main-navigation{font-size:" + to + "px}";
            meta_store_dynamic_css("meta_store_menu_font_size", css);
        });
    });

    wp.customize("meta_store_menu_line_height", function (value) {
        value.bind(function (to) {
            var css = "ul.ms-main-menu > li > a, .ms-main-navigation{line-height:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_line_height", css);
        });
    });

    wp.customize("meta_store_menu_letter_spacing", function (value) {
        value.bind(function (to) {
            var css = "ul.ms-main-menu > li > a, .ms-main-navigation{letter-spacing:" + to + "px}";
            meta_store_dynamic_css("meta_store_menu_letter_spacing", css);
        });
    });

    wp.customize("meta_store_menu_color", function (value) {
        value.bind(function (to) {
            var css = "ul.ms-main-menu > li > a, .ms-main-navigation{color:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_color", css);
        });
    });

    /* === <h> === */
    wp.customize("meta_store_h_font_family", function (value) {
        value.bind(function (to) {
            if (
                    to != "Courier" &&
                    to != "Times" &&
                    to != "Arial" &&
                    to != "Verdana" &&
                    to != "Trebuchet" &&
                    to != "Georgia" &&
                    to != "Tahoma" &&
                    to != "Palatino" &&
                    to != "Helvetica"
                    ) {
                WebFont.load({
                    google: {
                        families: [to],
                    },
                });
            }
            var css = "h1, h2, h3, h4, h5, h6 {font-family:" + to + "}";
            meta_store_dynamic_css("meta_store_h_font_family", css);
        });
    });

    wp.customize("meta_store_h_font_style", function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, "");
            var style = to.replace(/\d+/g, "");
            if ("" == style) {
                style = "normal";
            }
            var css = "h1, h2, h3, h4, h5, h6 {font-weight:" + weight + ";font-style:" + style + "}";
            meta_store_dynamic_css("meta_store_h_font_style", css);
        });
    });

    wp.customize("meta_store_h_text_transform", function (value) {
        value.bind(function (to) {
            var css = "h1, h2, h3, h4, h5, h6 {text-transform:" + to + "}";
            meta_store_dynamic_css("meta_store_h_text_transform", css);
        });
    });

    wp.customize("meta_store_h_text_decoration", function (value) {
        value.bind(function (to) {
            var css = "h1, h2, h3, h4, h5, h6 {text-decoration:" + to + "}";
            meta_store_dynamic_css("meta_store_h_text_decoration", css);
        });
    });

    wp.customize("meta_store_h_line_height", function (value) {
        value.bind(function (to) {
            var css = "h1, h2, h3, h4, h5, h6 {line-height:" + to + "}";
            meta_store_dynamic_css("meta_store_h_line_height", css);
        });
    });

    wp.customize("meta_store_h_letter_spacing", function (value) {
        value.bind(function (to) {
            var css = "h1, h2, h3, h4, h5, h6 {letter-spacing:" + to + "px}";
            meta_store_dynamic_css("meta_store_h_letter_spacing", css);
        });
    });
});