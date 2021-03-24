jQuery(document).ready(function ($) {
    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    jQuery("html").addClass("colorpicker-ready");

    $("body").on("click", "#customize-control-meta_store_social_link a", function () {
        wp.customize.section("meta_store_social_section").expand();
        return false;
    });

    wp.customize("meta_store_mh_layout", function (setting) {
        var setupControl1 = function (control) {
            var visibility = function () {
                if ("header-style2" === setting.get()) {
                    control.container.addClass("customizer-hidden");
                } else {
                    control.container.removeClass("customizer-hidden");
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControl2 = function (control) {
            var visibility = function () {
                if ("header-style2" === setting.get()) {
                    control.container.removeClass("customizer-hidden");
                } else {
                    control.container.addClass("customizer-hidden");
                }
            };
            visibility();
            setting.bind(visibility);
        };

        //wp.customize.control("meta_store_show_toggle_menu", setupControl1);
        //wp.customize.control("meta_store_toggle_menu_label", setupControl1);
        //wp.customize.control("meta_store_toggle_menu", setupControl1);
        //wp.customize.control("meta_store_show_menu_on", setupControl1);
        //wp.customize.control("meta_store_mh_separator1", setupControl1);

        wp.customize.control("meta_store_contact_no", setupControl2);
    });

    wp.customize("meta_store_show_toggle_menu", function (setting) {
        var setupControl = function (control) {
            var visibility = function () {
                if ('1' == setting.get()) {
                    control.container.removeClass("customizer-hidden");
                } else {
                    control.container.addClass("customizer-hidden");
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control("meta_store_toggle_menu_label", setupControl);
        wp.customize.control("meta_store_toggle_menu", setupControl);
        wp.customize.control("meta_store_show_menu_on", setupControl);
    });

    /** Display Breadcrumb settings only if breadcrumb is enabled */
    wp.customize("meta_store_breadcrumb", function (setting) {
        var setupControl = function (control) {
            var visibility = function () {
                if (true === setting.get()) {
                    control.container.removeClass("customizer-hidden");
                } else {
                    control.container.addClass("customizer-hidden");
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control("meta_store_pg_textcolor", setupControl);
        wp.customize.control("meta_store_pg_linkcolor", setupControl);
    });

    /** Top Header Display Center */
    wp.customize("meta_store_top_header_display", function (setting) {
        var setupControl = function (control) {
            var visibility = function () {
                if ("center" === setting.get()) {
                    control.container.removeClass("customizer-hidden");
                } else {
                    control.container.addClass("customizer-hidden");
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControl1 = function (control) {
            var visibility = function () {
                if ("left" === setting.get() || "left-right" === setting.get()) {
                    control.container.removeClass("customizer-hidden");
                } else {
                    control.container.addClass("customizer-hidden");
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControl2 = function (control) {
            var visibility = function () {
                if ("right" === setting.get() || "left-right" === setting.get()) {
                    control.container.removeClass("customizer-hidden");
                } else {
                    control.container.addClass("customizer-hidden");
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControl3 = function (control) {
            var visibility = function () {
                if ("none" === setting.get()) {
                    control.container.addClass("customizer-hidden");
                } else {
                    control.container.removeClass("customizer-hidden");
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control("meta_store_th_center_display", setupControl);
        wp.customize.control("meta_store_th_left_display", setupControl1);
        wp.customize.control("meta_store_th_right_display", setupControl2);
        wp.customize.control("meta_store_th_separator1", setupControl3);
        wp.customize.control("meta_store_th_separator2", setupControl3);
    });

    // Icon Control JS
    $("body").on("click", ".meta-store-customizer-icon-box .meta-store-icon-list li", function () {
        var icon_class = $(this).find("i").attr("class");
        $(this).closest(".meta-store-icon-box").find(".meta-store-icon-list li").removeClass("icon-active");
        $(this).addClass("icon-active");
        $(this).closest(".meta-store-icon-box").prev(".meta-store-selected-icon").children("i").attr("class", "").addClass(icon_class);
        $(this).closest(".meta-store-icon-box").next("input").val(icon_class).trigger("change");
        $(this).closest(".meta-store-icon-box").slideUp();
    });

    $("body").on("click", ".meta-store-customizer-icon-box .meta-store-selected-icon", function () {
        $(this).next().slideToggle();
    });

    $("body").on("change", ".meta-store-customizer-icon-box .meta-store-icon-search select", function () {
        var selected = $(this).val();
        $(this).closest(".meta-store-icon-box").find(".meta-store-icon-search-input").val("");
        $(this).closest(".meta-store-icon-box").find(".meta-store-icon-list li").show();
        $(this).closest(".meta-store-icon-box").find(".meta-store-icon-list").hide().removeClass("active");
        $(this).closest(".meta-store-icon-box").find("." + selected).fadeIn().addClass("active");
    });

    $("body").on("keyup", ".meta-store-customizer-icon-box .meta-store-icon-search input", function (e) {
        var $input = $(this);
        var keyword = $input.val().toLowerCase();
        search_criteria = $input.closest(".meta-store-icon-box").find(".meta-store-icon-list.active i");

        delay(function () {
            $(search_criteria).each(function () {
                if ($(this).attr("class").indexOf(keyword) > -1) {
                    $(this).parent().show();
                } else {
                    $(this).parent().hide();
                }
            });
        }, 500);
    });

    // Switch Control
    $("body").on("click", ".ms-onoffswitch", function () {
        var $this = $(this);
        if ($this.hasClass("ms-switch-on")) {
            $(this).removeClass("ms-switch-on");
            $this.next("input").val("off").trigger("change");
        } else {
            $(this).addClass("ms-switch-on");
            $this.next("input").val("on").trigger("change");
        }
    });

    // Gallery Control
    $(".ms-upload-gallery-button").click(function (event) {
        var current_gallery = $(this).closest("label");

        if ($(this).hasClass(ms - clear - gallery)) {
            //remove value from input
            current_gallery.find(".ms-gallery-values").val("").trigger("change");

            //remove preview images
            current_gallery.find(".ms-gallery-screenshot").html("");
            return;
        }

        // Make sure the media gallery API exists
        if (typeof wp === "undefined" || !wp.media || !wp.media.gallery) {
            return;
        }
        event.preventDefault();

        // Activate the media editor
        var val = current_gallery.find(".ms-gallery-values").val();
        var final;

        if (!val) {
            final = '[gallery ids="0"]';
        } else {
            final = '[gallery ids="' + val + '"]';
        }
        var frame = wp.media.gallery.edit(final);

        frame.state("gallery-edit").on("update", function (selection) {
            //clear screenshot div so we can append new selected images
            current_gallery.find(".ms-gallery-screenshot").html("");

            var element, preview_html = "", preview_img;
            var ids = selection.models.map(function (e) {
                element = e.toJSON();
                preview_img = typeof element.sizes.thumbnail !== "undefined" ? element.sizes.thumbnail.url : element.url;
                preview_html = "<div class='ms-image-thumb'><img src='" + preview_img + "'/></div>";
                current_gallery.find(".ms-gallery-screenshot").append(preview_html);
                return e.id;
            });

            current_gallery.find(".ms-gallery-values").val(ids.join(",")).trigger("change");
        });
        return false;
    });

    // Chosen JS
    $(".ms-chosen-select").chosen({
        width: "100%",
    });

    // Image Selector JS
    $("body").on("click", ".ms-image-selector label", function () {
        var $this = $(this);
        var value = $this.attr("data-val");
        $this.siblings().removeClass("selector-selected");
        $this.addClass("selector-selected");
        $this.closest(".ms-image-selector").next("input").val(value).trigger("change");
    });

    $("body").on("change", '.meta-store-type-radio input[type="radio"]', function () {
        var $this = $(this);
        $this.parent("label").siblings("label").find('input[type="radio"]').prop("checked", false);
        var value = $this.closest(".ms-radio-labels").find('input[type="radio"]:checked').val();
        $this.closest(".radio-labels").next("input").val(value).trigger("change");
    }
    );

    // Range JS
    $(".customize-control-meta-store-range-slider").each(function () {
        var sliderValue = $(this).find(".slider-input").val();
        var newSlider = $(this).find(".meta-store-slider");
        var sliderMinValue = parseFloat(newSlider.attr("slider-min-value"));
        var sliderMaxValue = parseFloat(newSlider.attr("slider-max-value"));
        var sliderStepValue = parseFloat(newSlider.attr("slider-step-value"));

        newSlider.slider({
            value: sliderValue,
            min: sliderMinValue,
            max: sliderMaxValue,
            step: sliderStepValue,
            range: "min",
            slide: function (e, ui) {
                $(this).parent().find(".slider-input").trigger("change");
            },
            change: function (e, ui) {
                $(this).parent().find(".slider-input").trigger("change");
            },
        });
    });

    // Change the value of the input field as the slider is moved
    $(".customize-control-meta-store-range-slider .meta-store-slider").on("slide", function (event, ui) {
        $(this).parent().find(".slider-input").val(ui.value);
    });

    // Reset slider and input field back to the default value
    $(".customize-control-meta-store-range-slider .meta-store-slider-reset").on("click", function () {
        var resetValue = $(this).attr("slider-reset-value");
        $(this).parents(".customize-control-meta-store-range-slider").find(".slider-input").val(resetValue);
        $(this).parents(".customize-control-meta-store-range-slider").find(".meta-store-slider").slider("value", resetValue);
    });

    // Update slider if the input field loses focus as it's most likely changed
    $(".customize-control-meta-store-range-slider .slider-input").blur(function () {
        var resetValue = $(this).val();
        var slider = $(this).parents(".customize-control-meta-store-range-slider").find(".meta-store-slider");
        var sliderMinValue = parseInt(slider.attr("slider-min-value"));
        var sliderMaxValue = parseInt(slider.attr("slider-max-value"));

        // Make sure our manual input value doesn't exceed the minimum & maxmium values
        if (resetValue < sliderMinValue) {
            resetValue = sliderMinValue;
            $(this).val(resetValue);
        }
        if (resetValue > sliderMaxValue) {
            resetValue = sliderMaxValue;
            $(this).val(resetValue);
        }
        $(this).parents(".customize-control-meta-store-range-slider").find(".meta-store-slider").slider("value", resetValue);
    });

    // TinyMCE editor
    $(document).on("tinymce-editor-init", function () {
        $(".customize-control").find(".wp-editor-area").each(function () {
            var tArea = $(this),
                    id = tArea.attr("id"),
                    input = $('input[data-customize-setting-link="' + id + '"]'),
                    editor = tinyMCE.get(id),
                    content;

            if (editor) {
                editor.onChange.add(function () {
                    this.save();
                    content = editor.getContent();
                    input.val(content).trigger("change");
                });
            }

            tArea.css({
                visibility: "visible",
            }).on("keyup", function () {
                content = tArea.val();
                input.val(content).trigger("change");
            });
        });
    });

    // Select Image Js
    $(".ms-select-image").on("change", function () {
        var activeImage = $(this).find(":selected").attr("data-image");
        $(this).next(".ms-select-image-container").find("img").attr("src", activeImage);
    });

    // Date Picker Js
    $(".ms-datepicker-input").datepicker({
        dateFormat: "yy/mm/dd",
    });

    // Scroll to Footer
    $("body").on("click", "#accordion-section-meta_store_footer_section .accordion-section-title", function (event) {
        var preview_section_id = "ht-colophon";
        var $contents = jQuery("#customize-preview iframe").contents();

        if ($contents.find("#" + preview_section_id).length > 0) {
            $contents.find("html, body").animate({
                scrollTop: $contents.find("#" + preview_section_id).offset().top,
            }, 1000);
        }
    });

    $("#customize-theme-controls").on("click", ".meta-store-repeater-field-title", function () {
        $(this).next().slideToggle();
        $(this).closest(".meta-store-repeater-field-control").toggleClass("expanded");
    });

    $("#customize-theme-controls").on("click", ".meta-store-repeater-field-close", function () {
        $(this).closest(".meta-store-repeater-fields").slideUp();
        $(this).closest(".meta-store-repeater-field-control").toggleClass("expanded");
    });

    $("body").on("click", ".meta-store-add-control-field", function () {
        var $this = $(this).parent();
        if (typeof $this != "undefined") {
            var field = $this.find(".meta-store-repeater-field-control:first").clone();
            if (typeof field != "undefined") {
                field.find("input[type='text'][data-name]").each(function () {
                    var defaultValue = $(this).attr("data-default");
                    $(this).val(defaultValue);
                });

                field.find("textarea[data-name]").each(function () {
                    var defaultValue = $(this).attr("data-default");
                    $(this).val(defaultValue);
                });

                field.find("select[data-name]").each(function () {
                    var defaultValue = $(this).attr("data-default");
                    $(this).val(defaultValue);
                });

                field.find(".radio-labels input[type='radio']").each(function () {
                    var defaultValue = $(this).closest(".radio-labels").next("input[data-name]").attr("data-default");
                    $(this).closest(".radio-labels").next("input[data-name]").val(defaultValue);

                    if ($(this).val() == defaultValue) {
                        $(this).prop("checked", true);
                    } else {
                        $(this).prop("checked", false);
                    }
                });

                field.find(".ms-image-selector label").each(function () {
                    var defaultValue = $(this).closest(".ms-image-selector").next("input[data-name]").attr("data-default");
                    var dataVal = $(this).attr("data-val");
                    $(this).closest(".ms-image-selector").next("input[data-name]").val(defaultValue);

                    if (defaultValue == dataVal) {
                        $(this).addClass("selector-selected");
                    } else {
                        $(this).removeClass("selector-selected");
                    }
                });

                field.find(".range-input").each(function () {
                    var $dis = $(this);
                    $dis.removeClass("ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all").empty();
                    var defaultValue = parseFloat($dis.attr("data-defaultvalue"));
                    $dis.siblings(".range-input-selector").val(defaultValue);
                    $dis.slider({
                        range: "min",
                        value: parseFloat($dis.attr("data-defaultvalue")),
                        min: parseFloat($dis.attr("data-min")),
                        max: parseFloat($dis.attr("data-max")),
                        step: parseFloat($dis.attr("data-step")),
                        slide: function (event, ui) {
                            $dis.siblings(".range-input-selector").val(ui.value);
                            meta_store_refresh_repeater_values();
                        },
                    });
                });

                field.find(".ms-onoffswitch").each(function () {
                    var defaultValue = $(this).next("input[data-name]").attr("data-default");
                    $(this).next("input[data-name]").val(defaultValue);
                    if (defaultValue == "on") {
                        $(this).addClass("ms-switch-on");
                    } else {
                        $(this).removeClass("ms-switch-on");
                    }
                });

                field.find(".ms-switch").each(function () {
                    var defaultValue = $(this).find("input[data-name]").attr("data-default");
                    $(this).find("input[data-name]").val(defaultValue);
                    if (defaultValue == "yes") {
                        $(this).find(".ms-switch-label").addClass("checkbox-on");
                    } else {
                        $(this).find(".ms-switch-label").removeClass("checkbox-on");
                    }
                });

                field.find(".meta-store-color-picker").each(function () {
                    $colorPicker = $(this);
                    $colorPicker.closest(".wp-picker-container").after($(this));
                    $colorPicker.prev(".wp-picker-container").remove();
                    $(this).wpColorPicker({
                        change: function (event, ui) {
                            setTimeout(function () {
                                meta_store_refresh_repeater_values();
                            }, 100);
                        },
                    });
                });

                field.find(".attachment-media-view").each(function () {
                    var defaultValue = $(this).find("input[data-name]").attr("data-default");
                    $(this).find("input[data-name]").val(defaultValue);
                    if (defaultValue) {
                        $(this).find(".thumbnail-image").html('<img src="' + defaultValue + '"/>').prev(".placeholder").addClass("hidden");
                    } else {
                        $(this).find(".thumbnail-image").html("").prev(".placeholder").removeClass("hidden");
                    }
                });

                field.find(".meta-store-icon-list").each(function () {
                    var defaultValue = $(this).next("input[data-name]").attr("data-default");
                    $(this).next("input[data-name]").val(defaultValue);
                    $(this).prev(".meta-store-selected-icon").children("i").attr("class", "").addClass(defaultValue);

                    $(this).find("li").each(function () {
                        var icon_class = $(this).find("i").attr("class");
                        if (defaultValue == icon_class) {
                            $(this).addClass("icon-active");
                        } else {
                            $(this).removeClass("icon-active");
                        }
                    });
                });

                field.find(".meta-store-multi-category-list").each(function () {
                    var defaultValue = $(this).next("input[data-name]").attr("data-default");
                    $(this).next("input[data-name]").val(defaultValue);

                    $(this).find('input[type="checkbox"]').each(function () {
                        if ($(this).val() == defaultValue) {
                            $(this).prop("checked", true);
                        } else {
                            $(this).prop("checked", false);
                        }
                    });
                });

                //field.find('.meta-store-fields').show();

                $this.find(".meta-store-repeater-field-control-wrap").append(field);

                field.addClass("expanded").find(".meta-store-repeater-fields").show();
                $(".accordion-section-content").animate({
                    scrollTop: $this.height(),
                }, 1000);
                meta_store_refresh_repeater_values();
            }
        }
        return false;
    });

    $("#customize-theme-controls").on("click", ".meta-store-repeater-field-remove", function () {
        if (typeof $(this).parent() != "undefined") {
            $(this).closest(".meta-store-repeater-field-control").slideUp("normal", function () {
                $(this).remove();
                meta_store_refresh_repeater_values();
            });
        }
        return false;
    });

    $("#customize-theme-controls").on("keyup change", "[data-name]", function () {
        delay(function () {
            meta_store_refresh_repeater_values();
            return false;
        }, 500);
    });

    $("#customize-theme-controls").on("change", 'input[type="checkbox"][data-name]', function () {
        if ($(this).is(":checked")) {
            $(this).val("yes");
            $(this).parent("label").addClass("checkbox-on");
        } else {
            $(this).val("no");
            $(this).parent("label").removeClass("checkbox-on");
        }
        return false;
    });

    // Drag and drop to change order
    $(".meta-store-repeater-field-control-wrap").sortable({
        orientation: "vertical",
        handle: ".meta-store-repeater-field-title",
        update: function (event, ui) {
            meta_store_refresh_repeater_values();
        },
    });

    // Set all variables to be used in scope
    var frame;

    // ADD IMAGE LINK
    $(".customize-control-repeater").on("click", ".meta-store-upload-button", function (event) {
        event.preventDefault();

        var imgContainer = $(this).closest(".meta-store-fields-wrap").find(".thumbnail-image"),
                placeholder = $(this).closest(".meta-store-fields-wrap").find(".placeholder"),
                imgIdInput = $(this).siblings(".upload-id");

        // Create a new media frame
        frame = wp.media({
            title: "Select or Upload Image",
            button: {
                text: "Use Image",
            },
            multiple: false, // Set to true to allow multiple files to be selected
        });

        // When an image is selected in the media frame...
        frame.on("select", function () {
            // Get media attachment details from the frame state
            var attachment = frame.state().get("selection").first().toJSON();

            // Send the attachment URL to our custom image input field.
            imgContainer.html('<img src="' + attachment.url + '" style="max-width:100%;"/>');
            placeholder.addClass("hidden");

            // Send the attachment id to our hidden input
            imgIdInput.val(attachment.url).trigger("change");
        });

        // Finally, open the modal on click
        frame.open();
    }
    );

    // DELETE IMAGE LINK
    $(".customize-control-repeater").on("click", ".meta-store-delete-button", function (event) {
        event.preventDefault();
        var imgContainer = $(this).closest(".meta-store-fields-wrap").find(".thumbnail-image"),
                placeholder = $(this).closest(".meta-store-fields-wrap").find(".placeholder"),
                imgIdInput = $(this).siblings(".upload-id");

        // Clear out the preview image
        imgContainer.find("img").remove();
        placeholder.removeClass("hidden");

        // Delete the image id from the hidden input
        imgIdInput.val("").trigger("change");
    }
    );

    var ColorChange = false;
    $(".meta-store-color-picker").wpColorPicker({
        change: function (event, ui) {
            if (jQuery("html").hasClass("colorpicker-ready") && ColorChange) {
                meta_store_refresh_repeater_values();
            }
        },
    });
    ColorChange = true;

    //MultiCheck box Control JS
    $("body").on("change", '.customize-control-meta-store-multiple-checkbox input[type="checkbox"]', function () {
        var checkbox_values = $(this).parents(".customize-control-meta-store-multiple-checkbox").find('input[type="checkbox"]:checked').map(function () {
            return $(this).val();
        }).get().join(",");

        $(this).parents(".customize-control-meta-store-multiple-checkbox").find('input[type="hidden"]').val(checkbox_values).trigger("change");
        meta_store_refresh_repeater_values();
    });

    $(".meta-store-repeater-fields .range-input").each(function () {
        var $dis = $(this);
        $dis.slider({
            range: "min",
            value: parseFloat($dis.attr("data-value")),
            min: parseFloat($dis.attr("data-min")),
            max: parseFloat($dis.attr("data-max")),
            step: parseFloat($dis.attr("data-step")),
            slide: function (event, ui) {
                $dis.siblings(".range-input-selector").val(ui.value);
                meta_store_refresh_repeater_values();
            },
        });
    });

    $(".ms-color-tab-toggle").on("click", function () {
        $(this).closest(".customize-control").find(".ms-color-tab-wrap").slideToggle();
    });

    $(".ms-color-tab-switchers li").on("click", function () {
        if ($(this).hasClass("active")) {
            return false;
        }
        var clicked = $(this).attr("data-tab");
        $(this).parent(".ms-color-tab-switchers").find("li").removeClass("active");
        $(this).addClass("active");
        $(this).closest(".ms-color-tab-wrap").find(".ms-color-tab-contents > div").hide();
        $(this).closest(".ms-color-tab-wrap").find("." + clicked).fadeIn();
    });

    function meta_store_refresh_repeater_values() {
        $(".meta-store-repeater-field-control-wrap").each(function () {
            var values = [];
            var $this = $(this);

            $this.find(".meta-store-repeater-field-control").each(function () {
                var valueToPush = {};

                $(this).find("[data-name]").each(function () {
                    var dataName = $(this).attr("data-name");
                    var dataValue = $(this).val();
                    valueToPush[dataName] = dataValue;
                });

                values.push(valueToPush);
            });

            $this.next(".meta-store-repeater-collector").val(JSON.stringify(values)).trigger("change");
        });
    }
});

(function (api) {
    // Class extends the UploadControl
    api.controlConstructor["meta-store-background-image"] = api.UploadControl.extend({
        ready: function () {
            // Re-use ready function from parent class to set up the image uploader
            var image_url = this;
            image_url.setting = this.settings.image_url;
            api.UploadControl.prototype.ready.apply(image_url, arguments);

            // Set up the new controls
            var control = this;

            control.container.addClass("customize-control-image");

            control.container.on("click keydown", ".remove-button", function () {
                control.container.find(".background-image-fields").hide();
            });

            control.container.on("change", ".background-image-repeat select", function () {
                control.settings["repeat"].set(jQuery(this).val());
            });

            control.container.on("change", ".background-image-size select", function () {
                control.settings["size"].set(jQuery(this).val());
            });

            control.container.on("change", ".background-image-attach select", function () {
                control.settings["attach"].set(jQuery(this).val());
            });

            control.container.on("change", ".background-image-position select", function () {
                control.settings["position"].set(jQuery(this).val());
            });
        },

        /**
         * Callback handler for when an attachment is selected in the media modal.
         * Gets the selected image information, and sets it within the control.
         */
        select: function () {
            var attachment = this.frame.state().get("selection").first().toJSON();
            this.params.attachment = attachment;
            this.settings["image_url"].set(attachment.url);
            this.settings["image_id"].set(attachment.id);
        },
    });

    // Tab Control
    api.Tabs = [];

    api.Tab = api.Control.extend({
        ready: function () {
            var control = this;
            control.container.find("a.ms-customizer-tab").click(function (evt) {
                var tab = jQuery(this).data("tab");
                evt.preventDefault();
                control.container.find("a.ms-customizer-tab").removeClass("active");
                jQuery(this).addClass("active");
                control.toggleActiveControls(tab);
            });

            api.Tabs.push(control.id);
        },

        toggleActiveControls: function (tab) {
            var control = this,
                    currentFields = control.params.buttons[tab].fields;
            _.each(control.params.fields, function (id) {
                var tabControl = api.control(id);
                if (undefined !== tabControl) {
                    if (tabControl.active() && jQuery.inArray(id, currentFields) >= 0) {
                        tabControl.toggle(true);
                    } else {
                        tabControl.toggle(false);
                    }
                }
            });
        },
    });

    jQuery.extend(api.controlConstructor, {
        'meta-store-tab': api.Tab,
    });

    api.bind("ready", function () {
        _.each(api.Tabs, function (id) {
            var control = api.control(id);
            control.toggleActiveControls(0);
        });
    });

    // Alpha Color Picker Control
    api.controlConstructor["meta-store-alpha-color-picker"] = api.Control.extend({
        ready: function () {
            var control = this;

            var paletteInput = control.container
                    .find(".ms-alpha-color-input")
                    .data("palette");

            if (true == paletteInput) {
                palette = true;
            } else if (
                    typeof paletteInput !== "undefined" &&
                    paletteInput.indexOf("|") !== -1
                    ) {
                palette = paletteInput.split("|");
            } else {
                palette = false;
            }

            control.container.find(".ms-alpha-color-input").wpColorPicker({
                change: function (event, ui) {
                    var color = ui.color.toString();

                    if (jQuery("html").hasClass("colorpicker-ready")) {
                        control.setting.set(color);
                    }
                },
                clear: function (event) {
                    var element = jQuery(event.target).closest(".wp-picker-input-wrap").find(".wp-color-picker")[0];
                    var color = "";

                    if (element) {
                        control.setting.set(color);
                    }
                },
                palettes: palette,
            });
        },
    });

    // Color Tab Control
    api.controlConstructor["color-tab"] = api.Control.extend({
        ready: function () {
            var control = this;

            control.container.find(".ms-alpha-color-input").each(function () {
                var $elem = jQuery(this);
                var paletteInput = $elem.data("palette");
                var setting = jQuery(this).attr("data-customize-setting-link");

                if (true == paletteInput) {
                    palette = true;
                } else if (typeof paletteInput !== "undefined" && paletteInput.indexOf("|") !== -1) {
                    palette = paletteInput.split("|");
                } else {
                    palette = false;
                }

                $elem.wpColorPicker({
                    change: function (event, ui) {
                        var color = ui.color.toString();

                        if (jQuery("html").hasClass("colorpicker-ready")) {
                            wp.customize(setting, function (obj) {
                                obj.set(color);
                            });
                        }
                    },
                    clear: function (event) {
                        var element = jQuery(event.target).closest(".wp-picker-input-wrap").find(".wp-color-picker")[0];
                        var color = "";

                        if (element) {
                            wp.customize(setting, function (obj) {
                                obj.set(color);
                            });
                        }
                    },
                    palettes: palette,
                });
            });
        },
    });

    // Dimenstion Control
    api.controlConstructor["dimensions"] = wp.customize.Control.extend({
        ready: function () {
            var control = this;

            control.container.on("change keyup paste", ".dimension-desktop_top", function () {
                control.settings["desktop_top"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-desktop_right", function () {
                control.settings["desktop_right"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-desktop_bottom", function () {
                control.settings["desktop_bottom"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-desktop_left", function () {
                control.settings["desktop_left"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-tablet_top", function () {
                control.settings["tablet_top"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-tablet_right", function () {
                control.settings["tablet_right"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-tablet_bottom", function () {
                control.settings["tablet_bottom"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-tablet_left", function () {
                control.settings["tablet_left"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-mobile_top", function () {
                control.settings["mobile_top"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-mobile_right", function () {
                control.settings["mobile_right"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-mobile_bottom", function () {
                control.settings["mobile_bottom"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".dimension-mobile_left", function () {
                control.settings["mobile_left"].set(jQuery(this).val());
            });
        },
    });

    // Range Slider Control
    api.controlConstructor["range-slider"] = wp.customize.Control.extend({
        ready: function () {
            var control = this,
                    desktop_slider = control.container.find(".meta-store-slider.desktop-slider"),
                    desktop_slider_input = desktop_slider.next(".meta-store-slider-input").find("input.desktop-input"),
                    tablet_slider = control.container.find(".meta-store-slider.tablet-slider"),
                    tablet_slider_input = tablet_slider.next(".meta-store-slider-input").find("input.tablet-input"),
                    mobile_slider = control.container.find(".meta-store-slider.mobile-slider"),
                    mobile_slider_input = mobile_slider.next(".meta-store-slider-input").find("input.mobile-input"),
                    slider_input,
                    $this,
                    val;

            // Desktop slider
            desktop_slider.slider({
                range: "min",
                value: desktop_slider_input.val(),
                min: +desktop_slider_input.attr("min"),
                max: +desktop_slider_input.attr("max"),
                step: +desktop_slider_input.attr("step"),
                slide: function (event, ui) {
                    desktop_slider_input.val(ui.value).keyup();
                },
                change: function (event, ui) {
                    control.settings["desktop"].set(ui.value);
                },
            });

            // Tablet slider
            tablet_slider.slider({
                range: "min",
                value: tablet_slider_input.val(),
                min: +tablet_slider_input.attr("min"),
                max: +tablet_slider_input.attr("max"),
                step: +desktop_slider_input.attr("step"),
                slide: function (event, ui) {
                    tablet_slider_input.val(ui.value).keyup();
                },
                change: function (event, ui) {
                    control.settings["tablet"].set(ui.value);
                },
            });

            // Mobile slider
            mobile_slider.slider({
                range: "min",
                value: mobile_slider_input.val(),
                min: +mobile_slider_input.attr("min"),
                max: +mobile_slider_input.attr("max"),
                step: +desktop_slider_input.attr("step"),
                slide: function (event, ui) {
                    mobile_slider_input.val(ui.value).keyup();
                },
                change: function (event, ui) {
                    control.settings["mobile"].set(ui.value);
                },
            });

            // Update the slider when the number value change
            jQuery("input.desktop-input").on("change keyup paste", function () {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev(".meta-store-slider.desktop-slider");

                slider_input.slider("value", val);
            });

            jQuery("input.tablet-input").on("change keyup paste", function () {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev(".meta-store-slider.tablet-slider");

                slider_input.slider("value", val);
            });

            jQuery("input.mobile-input").on("change keyup paste", function () {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev(".meta-store-slider.mobile-slider");

                slider_input.slider("value", val);
            });

            // Save the values
            control.container.on("change keyup paste", ".desktop input", function () {
                control.settings["desktop"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".tablet input", function () {
                control.settings["tablet"].set(jQuery(this).val());
            });

            control.container.on("change keyup paste", ".mobile input", function () {
                control.settings["mobile"].set(jQuery(this).val());
            });
        },
    });

    // Sortable Control
    api.controlConstructor["sortable"] = wp.customize.Control.extend({
        ready: function () {
            var control = this;

            // Set the sortable container.
            control.sortableContainer = control.container.find("ul.sortable").first();

            // Init sortable.
            control.sortableContainer.sortable({
                // Update value when we stop sorting.
                stop: function () {
                    control.updateValue();
                },
            }).disableSelection().find("li").each(function () {
                // Enable/disable options when we click on the eye of Thundera.
                jQuery(this).find("i.visibility").click(function () {
                    jQuery(this).toggleClass("dashicons-visibility-faint").parents("li:eq(0)").toggleClass("invisible");
                });
            }).click(function () {
                // Update value on click.
                control.updateValue();
            });
        },

        /**
         * Updates the sorting list
         */
        updateValue: function () {
            var control = this,
                    newValue = [];

            this.sortableContainer.find("li").each(function () {
                if (!jQuery(this).is(".invisible")) {
                    newValue.push(jQuery(this).data("value"));
                }
            });

            control.setting.set(newValue);
        },
    });
})(wp.customize);


jQuery(document).ready(function ($) {
    // Responsive switchers
    $(".customize-control .responsive-switchers button").on("click", function (
            event
            ) {
        // Set up variables
        var $this = $(this),
                $devices = $(".responsive-switchers"),
                $device = $(event.currentTarget).data("device"),
                $control = $(".customize-control.has-switchers"),
                $body = $(".wp-full-overlay"),
                $footer_devices = $(".wp-full-overlay-footer .devices");

        // Button class
        $devices.find("button").removeClass("active");
        $devices.find("button.preview-" + $device).addClass("active");

        // Control class
        $control.find(".control-wrap").removeClass("active");
        $control.find(".control-wrap." + $device).addClass("active");
        $control.removeClass("control-device-desktop control-device-tablet control-device-mobile").addClass("control-device-" + $device);

        // Wrapper class
        $body.removeClass("preview-desktop preview-tablet preview-mobile").addClass("preview-" + $device);

        // Panel footer buttons
        $footer_devices.find("button").removeClass("active").attr("aria-pressed", false);
        $footer_devices.find("button.preview-" + $device).addClass("active").attr("aria-pressed", true);

        // Open switchers
        if ($this.hasClass("preview-desktop")) {
            $control.toggleClass("responsive-switchers-open");
        }
    });

    // If panel footer buttons clicked
    $(".wp-full-overlay-footer .devices button").on("click", function (event) {
        // Set up variables
        var $this = $(this),
                $devices = $(".customize-control.has-switchers .responsive-switchers"),
                $device = $(event.currentTarget).data("device"),
                $control = $(".customize-control.has-switchers");

        // Button class
        $devices.find("button").removeClass("active");
        $devices.find("button.preview-" + $device).addClass("active");

        // Control class
        $control.find(".control-wrap").removeClass("active");
        $control.find(".control-wrap." + $device).addClass("active");
        $control.removeClass("control-device-desktop control-device-tablet control-device-mobile").addClass("control-device-" + $device);

        // Open switchers
        if (!$this.hasClass("preview-desktop")) {
            $control.addClass("responsive-switchers-open");
        } else {
            $control.removeClass("responsive-switchers-open");
        }
    });

    // Linked button
    $(".meta-store-linked").on("click", function () {
        // Set up variables
        var $this = $(this);

        // Remove linked class
        $this.parent().parent(".dimension-wrap").prevAll().slice(0, 4).find("input").removeClass("linked").attr("data-element", "");

        // Remove class
        $this.parent(".link-dimensions").removeClass("unlinked");
    });

    // Unlinked button
    $(".meta-store-unlinked").on("click", function () {
        // Set up variables
        var $this = $(this),
                $element = $this.data("element");

        // Add linked class
        $this.parent().parent(".dimension-wrap").prevAll().slice(0, 4).find("input").addClass("linked").attr("data-element", $element);

        // Add class
        $this.parent(".link-dimensions").addClass("unlinked");
    });

    // Values linked inputs
    $(".dimension-wrap").on("input", ".linked", function () {
        var $data = $(this).attr("data-element"),
                $val = $(this).val();

        $('.linked[ data-element="' + $data + '" ]').each(function (key, value) {
            $(this).val($val).change();
        });
    });
});