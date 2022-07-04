(function($){

    "use strict";

    function uniqueID() {return Math.floor((Math.random() * 1000000) + 1);}

    function isInArray(value, array) {return array.indexOf(value) > -1;}

    String.prototype.replaceAll = function(str1, str2, ignore) {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }

    function iframeCSS(CSS){
        var iframe = $('#vc_inline-frame');
        if (typeof(iframe) != 'undefined' && iframe != null){
            iframe.ready(function() {
                CSS = CSS.replaceAll("dir-child*",">");
                iframe.contents().find("#dynamic-styles-inline-css").append(CSS);
            });
        }
    }

    function hbeAlign(element,doc){
        var CSS = '';

        if (element.hasClass('hbe-right')) {
            CSS = '.vc_element[data-model-id="'+element.parent().attr('data-model-id')+'"] {float:right;}';
            doc.find("#dynamic-styles-inline-css").append(CSS);
            return;
        }
        if (element.hasClass('hbe-left')) {
            CSS = '.vc_element[data-model-id="'+element.parent().attr('data-model-id')+'"] {float:left;}';
            doc.find("#dynamic-styles-inline-css").append(CSS);
            return;
        }
        if (element.hasClass('hbe-center') || element.hasClass('hbe-none')) {
            CSS = '.vc_element[data-model-id="'+element.parent().attr('data-model-id')+'"] {float:none;}';
            doc.find("#dynamic-styles-inline-css").append(CSS);
            return;
        }
    }

    function iframeSCRIPT(element){
        $(element).each(function(){

            var $this  = $(this);

            // HBE
            var attr = $this.parent().parent().attr('data-tag');
            var hasAttribute = (typeof attr !== 'undefined' && attr !== false) ? true : false;

            if ($this.parent().hasClass('hbe-right') && hasAttribute) {$this.parent().parent().addClass('hbe-right');}
            if ($this.parent().hasClass('hbe-left') && hasAttribute) {$this.parent().parent().addClass('hbe-left');}
            if ($this.parent().hasClass('hbe-center') && hasAttribute) {$this.parent().parent().addClass('hbe-center');}

            if ($this.hasClass('hover-scale')) {
                var hover = $this.find(".hover");
                var d = Math.max($this.outerWidth(), $this.outerHeight());
                hover.css({'height': d*1.2, 'width': d*1.2});
            }

            if ($this.hasClass('material')) {
                $this.on('click',function(e){
                    var jQuerythis = jQuery(this);
                    
                    if(jQuerythis.find(".et-ink").length === 0){
                        jQuerythis.prepend("<span class='et-ink'></span>");
                    }

                    ink = jQuerythis.find(".et-ink");
                    ink.removeClass("click");
                     
                    if(!ink.height() && !ink.width()){
                        d = Math.max(jQuerythis.outerWidth(), jQuerythis.outerHeight());
                        ink.css({height: d, width: d});
                    }
                     
                    x = e.pageX - jQuerythis.offset().left - ink.width()/2;
                    y = e.pageY - jQuerythis.offset().top - ink.height()/2;
                     
                    ink.css({top: y+'px', left: x+'px'}).addClass("click");
                });
            }

            if ($this.hasClass('wpb_animate_when_almost_visible')) {
                $this
                .addClass('wpb_start_animation')
                .addClass('animated');
            }
        
        });
    }

    var font_weight_array = [];

    for (var i = 1; i <= 9; i++) {
        font_weight_array.push(i+'00italic');
    }

    $( document ).ajaxComplete(function( event, xhr, settings ) {

        if (settings['type'] != 'POST') {return;}

        /* Prepare settings
        /*-------------*/

            var data = decodeURIComponent(settings['data']);

            data = data.split("&");

            var dataObj = [{}];

            for (var i = 0; i < data.length; i++) {
                var property = data[i].split("=");
                var key      = (property[0]);
                var value    = (property[1]);
                dataObj[key] = value;
            }

            var elementExists = Object.keys(dataObj).some(function(key) {
                return dataObj[key] === "et_header_button";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_header_button"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_header_button"]');

                var element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]'),
                    margin_box   = edit_element.find(".margin-box"),
                    margin       = edit_element.find('input[name="margin"]'),
                    margin_val   = margin.val(),
                    margin_array = [];

                if(typeof(margin_val) != "undefined" && margin_val.length){

                    var margin_array = margin_val.split(",");

                    margin_box.find("input[name=\"margin-top\"]").attr('value',margin_array[0]);
                    margin_box.find("input[name=\"margin-right\"]").attr('value',margin_array[1]);
                    margin_box.find("input[name=\"margin-bottom\"]").attr('value',margin_array[2]);
                    margin_box.find("input[name=\"margin-left\"]").attr('value',margin_array[3]);

                }

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_header_button"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_header_button"]').length) {

                        var CSS = '';
                        var ID  = uniqueID();

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_header_button"]');

                        /* Styling
                        ---------------*/

                            var align                  = edit_element.find('select[name="align"] option:selected').val(),
                                size                   = edit_element.find('select[name="size"] option:selected').val(),
                                width                  = edit_element.find('input[name="width"]').val(),
                                height                 = edit_element.find('input[name="height"]').val(),
                                font_weight               = edit_element.find('select[name="font_weight"] option:selected').val(),
                                font_family               = edit_element.find('select[name="font_family"] option:selected').val(),
                                button_font_size          = edit_element.find('input[name="button_font_size"]').val(),
                                icon_font_size            = edit_element.find('input[name="icon_font_size"]').val(),
                                button_letter_spacing     = edit_element.find('input[name="button_letter_spacing"]').val(),
                                button_line_height        = edit_element.find('input[name="button_line_height"]').val(),
                                button_text_transform     = edit_element.find('select[name="button_text_transform"] option:selected').val(),
                                button_color              = edit_element.find('input[name="button_color"]').val(),
                                button_back_color         = edit_element.find('input[name="button_back_color"]').val(),
                                button_border_color       = edit_element.find('input[name="button_border_color"]').val(),
                                button_border_radius      = edit_element.find('input[name="button_border_radius"]').val(),
                                button_border_width       = edit_element.find('input[name="button_border_width"]').val(),
                                button_shadow             = edit_element.find('input[name="button_shadow"]:checked').val(),
                                button_color_hover        = edit_element.find('input[name="button_color_hover"]').val(),
                                button_back_color_hover   = edit_element.find('input[name="button_back_color_hover"]').val(),
                                button_border_color_hover = edit_element.find('input[name="button_border_color_hover"]').val(),
                                animate_hover             = edit_element.find('select[name="animate_hover"] option:selected').val(),
                                animate_click             = edit_element.find('select[name="animate_click"] option:selected').val();

                            if (size != "custom") {
                                width  = '';
                                height = '';
                            }

                            CSS += '#et-header-button-'+ID+' a {';

                                
                                if (width.length) {CSS += 'width:'+width+'px;'}
                                if (height.length) {CSS += 'height:'+height+'px;line-height:'+(height-1)+'px;padding-top:0;padding-bottom:0;';}

                                if (button_font_size.length) {
                                    CSS += 'font-size:'+button_font_size+'px !important;';
                                }
                                if (font_weight.length && font_weight != "italic") {

                                    if (isInArray(font_weight,font_weight_array)) {
                                        font_weight = font_weight.substring(0, 3);
                                        CSS += 'font-style:italic;';
                                    }

                                    if (font_weight == "regular") {
                                        font_weight = "400";
                                    }

                                    CSS += 'font-weight:'+font_weight+';';
                                }
                                if (font_family.length && font_family != "Theme default") {CSS += 'font-family:\''+font_family+'\';';}
                                if (button_letter_spacing.length) {
                                    CSS += 'letter-spacing:'+button_letter_spacing+'px;';
                                }
                                if (button_line_height.length) {
                                    CSS += 'line-height:'+button_line_height+'px !important;';
                                }
                                if (button_text_transform.length) {
                                    CSS += 'text-transform:'+button_text_transform+';';
                                }
                                if (button_color.length) {
                                    CSS += 'color:'+button_color+';';
                                }
                                if (button_border_radius.length) {
                                    CSS += 'border-radius:'+button_border_radius+'px;';
                                }
                                if (typeof(button_shadow) != 'undefined' && button_shadow == "true") {
                                    CSS += 'box-shadow:rgba(0, 0, 0, 0.1) 0px 4px 15px;';
                                }

                            CSS += '}';

                            if (button_font_size.length && button_font_size >= 24) {
                                CSS += '#et-header-button-'+ID+' a.icon-position-left .icon {margin-right:8px;}';
                                CSS += '#et-header-button-'+ID+' a.icon-position-right .icon {margin-left:8px;}';
                            }

                            if (icon_font_size.length) {
                                CSS += '#et-header-button-'+ID+' .icon {';
                                    CSS += 'font-size:'+icon_font_size+'px !important;';
                                CSS += '}';
                            }

                            if (button_color_hover.length) {
                                CSS += '#et-header-button-'+ID+':hover a {';
                                    CSS += 'color:'+button_color_hover+';';
                                CSS += '}';
                            }

                            CSS += '#et-header-button-'+ID+' .regular {';
                                if (button_back_color.length) {
                                    CSS += 'background-color:'+button_back_color+';';
                                }
                                if (button_border_width.length && button_border_color.length) {
                                    CSS += 'box-shadow:inset 0 0 0 '+button_border_width+'px '+button_border_color+';';
                                }
                            CSS += '}';

                            if (animate_hover.length && (animate_hover == "glint" || animate_hover == "scale") && button_border_width.length && button_border_color_hover.length) {
                                CSS += '#et-header-button-'+ID+':hover .regular {';
                                    CSS += 'box-shadow:inset 0 0 0 '+button_border_width+'px '+button_border_color_hover+';';
                                CSS += '}';
                            }

                            CSS += '#et-header-button-'+ID+' .hover {';
                                if (button_back_color_hover.length) {
                                    CSS += 'background-color:'+button_back_color_hover+';';
                                }
                                if (button_border_width.length && button_border_color_hover.length) {
                                    CSS += 'box-shadow:inset 0 0 0 '+button_border_width+'px '+button_border_color_hover+';';
                                }
                            CSS += '}';

                            if (animate_hover.length && animate_hover == "glint") {

                                if (button_color.length) {
                                    CSS += '#et-header-button-'+ID+' .glint {';
                                        CSS += 'color:'+button_color+';';
                                    CSS += '}';
                                }

                                if (button_color_hover.length) {
                                    CSS += '#et-header-button-'+ID+' .glint {';
                                        CSS += 'background-color:'+button_color_hover+';';
                                    CSS += '}';
                                }
                               
                            }

                            if (animate_click.length) {

                                if (button_color.length) {
                                    CSS += '#et-header-button-'+ID+' .et-ink {';
                                        CSS += 'color:'+button_color+';';
                                    CSS += '}';
                                }

                                if (button_color_hover.length) {
                                    CSS += '#et-header-button-'+ID+' .et-ink {';
                                        CSS += 'background-color:'+button_color_hover+';';
                                    CSS += '}';
                                }
                               
                            }

                        /* Margin
                        ---------------*/

                            var margin_left   = edit_element.find(".margin-box input[name=\"margin-left\"]").val(),
                                margin_top    = edit_element.find(".margin-box input[name=\"margin-top\"]").val(),
                                margin_right  = edit_element.find(".margin-box input[name=\"margin-right\"]").val(),
                                margin_bottom = edit_element.find(".margin-box input[name=\"margin-bottom\"]").val();

                            margin_top = (margin_top.length) ? margin_top : '0';
                            margin_right = (margin_right.length) ? margin_right : '0';
                            margin_bottom = (margin_bottom.length) ? margin_bottom : '0';
                            margin_left = (margin_left.length) ? margin_left : '0';

                            var margin_output = margin_top+','+margin_right+','+margin_bottom+','+margin_left,
                                margin_value  = margin_top+'px '+margin_right+'px '+margin_bottom+'px '+margin_left+'px';

                            margin.val(margin_output);

                            CSS += '#et-header-button-'+ID+' {';
                                CSS += 'margin:'+margin_value+';';
                            CSS += '}';

                        element_id.val(ID);

                        if (CSS) {
                            element_css.text(CSS);
                            iframeCSS(CSS);
                            CSS = '';
                        }

                    }
                    
                });

                return;

            }

        /* Load element
        /*-------------*/

            if((dataObj['action'] == "vc_load_shortcode" && elementExists)){
                var iframe = $('#vc_inline-frame');
                if (typeof(iframe) != 'undefined' && iframe != null){
                    iframe.ready(function() {
                        var doc = iframe.contents();
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-header-button a');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element);
                            element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-header-button')
                            hbeAlign(element,doc);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);