(function($){

    "use strict";

    function uniqueID() {return Math.floor((Math.random() * 1000000) + 1);}

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

    function hbeAlign(align,tag){
        var iframe = $('#vc_inline-frame');
        if (typeof(iframe) != 'undefined' && iframe != null){
            iframe.ready(function() {
                iframe.contents().find(".hbe").each(function(){
                    var $this = $(this);
                    var attr = $this.parent().attr('data-tag');
                    var hasAttribute = (typeof attr !== typeof undefined && attr !== false && attr == tag) ? true : false;
                    var CSS = '';

                    if (hasAttribute) {

                        if (align == "right") {
                            CSS = '.vc_element[data-model-id="'+$this.parent().attr('data-model-id')+'"] {float:right;}';
                            iframe.contents().find("#dynamic-styles-inline-css").append(CSS);
                            return;
                        }
                        if (align == "left") {
                            CSS = '.vc_element[data-model-id="'+$this.parent().attr('data-model-id')+'"] {float:left;}';
                            iframe.contents().find("#dynamic-styles-inline-css").append(CSS);
                            return;
                        }
                        if (align == "center" || align == "none") {
                            CSS = '.vc_element[data-model-id="'+$this.parent().attr('data-model-id')+'"] {float:none;}';
                            iframe.contents().find("#dynamic-styles-inline-css").append(CSS);
                            return;
                        }

                    }
                });
            });
        }
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

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_mobile_toggle"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_mobile_toggle"]');

                var element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]'),
                    margin_box   = edit_element.find(".margin-box"),
                    margin       = edit_element.find('input[name="margin"]'),
                    margin_val   = margin.val(),
                    icon         = edit_element.find('input[name="icon"]'),
                    icon_val     = icon.val(),
                    icon_list    = edit_element.find('ul.admin-icon-list.icon-menu'),
                    close_icon      = edit_element.find('input[name="close_icon"]'),
                    close_icon_val  = close_icon.val(),
                    close_icon_list = edit_element.find('ul.admin-icon-list.icon-close'),
                    margin_array = [];

                if(typeof(margin_val) != "undefined" && margin_val.length){

                    var margin_array = margin_val.split(",");

                    margin_box.find("input[name=\"margin-top\"]").attr('value',margin_array[0]);
                    margin_box.find("input[name=\"margin-right\"]").attr('value',margin_array[1]);
                    margin_box.find("input[name=\"margin-bottom\"]").attr('value',margin_array[2]);
                    margin_box.find("input[name=\"margin-left\"]").attr('value',margin_array[3]);

                }

                if(typeof(icon_val) != "undefined" && icon_val.length){


                    icon_list.find('li').each(function(){

                        var $this = $(this),
                            icon = $this.find('span');

                        if (icon.hasClass(icon_val)) {
                            icon.addClass('active');
                            $this.siblings().find('span').removeClass('active');
                        }

                    });
                } else {
                    icon_list.find('li:first-child span').addClass('active');
                }

                icon_list.find('li').each(function(){

                    var $this = $(this),
                        icon = $this.find('span');

                    icon.on('click',function(){
                        icon.addClass('active');
                        $this.siblings().find('span').removeClass('active');
                    });

                });

                if(typeof(close_icon_val) != "undefined" && close_icon_val.length){

                    close_icon_list.find('li').each(function(){

                        var $this = $(this),
                            close_icon = $this.find('span');

                        if (close_icon.hasClass(close_icon_val)) {
                            close_icon.addClass('active');
                            $this.siblings().find('span').removeClass('active');
                        }

                    });
                } else {
                    close_icon_list.find('li:first-child span').addClass('active');
                }

                close_icon_list.find('li').each(function(){

                    var $this = $(this),
                        close_icon = $this.find('span');

                    close_icon.on('click',function(){
                        close_icon.addClass('active');
                        $this.siblings().find('span').removeClass('active');
                    });

                });

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_mobile_toggle"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_mobile_toggle"]').length) {

                        var CSS = '';
                        var ID  = uniqueID();

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_mobile_toggle"]');

                        /* Styling
                        ---------------*/

                            var align                        = edit_element.find('select[name="align"] option:selected').val(),
                                icon_name                    = edit_element.find('ul.admin-icon-list.icon-menu span.active').data('name'),
                                close_icon_name              = edit_element.find('ul.admin-icon-list.icon-close span.active').data('name'),
                                icon_color                   = edit_element.find('input[name="icon_color"]').val(),
                                icon_color_hover             = edit_element.find('input[name="icon_color_hover"]').val(),
                                icon_background_color        = edit_element.find('input[name="icon_background_color"]').val(),
                                icon_background_color_hover  = edit_element.find('input[name="icon_background_color_hover"]').val(),
                                icon_border_color            = edit_element.find('input[name="icon_border_color"]').val(),
                                icon_border_color_hover      = edit_element.find('input[name="icon_border_color_hover"]').val(),
                                icon_border_width            = edit_element.find('input[name="icon_border_width"]').val(),
                                icon_size_type               = edit_element.find('select[name="size"] option:selected').val(),
                                icon_size                    = edit_element.find('input[name="icon_size"]').val(),
                                icon_box_size                = edit_element.find('input[name="icon_box_size"]').val();

                            if (icon_size_type != "custom") {
                                icon_size     = '';
                                icon_box_size = '';
                            }

                            icon.val(icon_name);
                            close_icon.val(close_icon_name );

                            CSS += '#mobile-toggle-'+ID+' {';

                                if (icon_color.length) {CSS += 'color:'+icon_color+';';}
                                if (icon_background_color.length) {
                                    CSS += 'background-color:'+icon_background_color+';';
                                } else {
                                    CSS += 'background-color:transparent;';
                                }

                                if (icon_size.length) {CSS += 'font-size:'+icon_size+'px;';}
                                if (icon_box_size.length) {CSS += 'width:'+icon_box_size+'px;height:'+icon_box_size+'px;line-height:'+icon_box_size+'px;';}
                                
                                if (icon_border_width.length) {

                                    if (!icon_border_color.length) {
                                        icon_border_color = icon_color;
                                    }

                                    CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_border_color+';';
                                } else {
                                    CSS += 'box-shadow:none;';
                                }

                            CSS += '}';

                            if (icon_size_type == "custom" && icon_size.length) {
                                CSS += '#mobile-toggle-'+ID+'.active {';
                                    CSS += 'font-size:'+(icon_size*0.8)+'px;';
                                CSS += '}';
                            }

                            CSS += '#mobile-toggle-'+ID+':hover {';

                                if (icon_color_hover.length) {CSS += 'color:'+icon_color_hover+';';}
                                if (icon_background_color_hover.length) {
                                    CSS += 'background-color:'+icon_background_color_hover+';';
                                } else {
                                    CSS += 'background-color:transparent;';
                                }
                                
                                if (icon_border_width.length) {

                                    if (!icon_border_color_hover.length) {
                                        icon_border_color_hover = icon_color_hover;
                                    }

                                    CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_border_color_hover+';';
                                } else {
                                    CSS += 'box-shadow:none;';
                                }

                            CSS += '}';

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

                            CSS += '#mobile-container-toggle-'+ID+' {';
                                CSS += 'margin:'+margin_value+';';
                            CSS += '}';

                        element_id.val(ID);

                        if (CSS) {
                            element_css.text(CSS);
                            iframeCSS(CSS);
                            CSS = '';
                        }

                        hbeAlign(align,dataObj['tag']);

                    }
                    
                });

                return;
            }

    });

})(jQuery);