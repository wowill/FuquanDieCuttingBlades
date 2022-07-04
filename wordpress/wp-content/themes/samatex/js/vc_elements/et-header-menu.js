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


    function iframeSCRIPT(element,doc){

        $(element).each(function(){

            var $this  = $(this);
            var width  = $this.parents('.container').first().width();
            var gap    = (width - 1200);
            var offset = $this.offset();
            var correction = Math.round(($(doc).outerWidth()/2) - offset.left,0);

            $this.find('.megamenu[data-width="100"]').each(function(){
                if (this) {
                    var megamenu = $(this);

                    if (megamenu.data('stretch') == "stretch") {
                        gap = 0;
                    }

                    CSS = '#'+megamenu.attr('id')+'{';
                        CSS += 'width:'+width+'px !important;';
                        CSS += 'max-width:'+width+'px !important;';
                        CSS += 'margin-left:-'+Math.round((width/2)+gap)+'px !important;';
                        CSS += 'right:auto !important;';
                        CSS += 'left:'+correction+'px !important;';
                    CSS += '}';
                    $(doc).find("#dynamic-styles-inline-css").append(CSS);
                }
            });

            $this.find('.megamenu-tab').each(function(){

                var $this    = $(this),
                    tabs     = $this.find('.tab-item'),
                    tabsQ    = tabs.length,
                    tabsDefaultWidth  = 0,
                    tabsDefaultHeight = 0,
                    tabsContent = $this.find('.tab-content');

                tabs.wrapAll('<div class="tabset et-clearfix"></div>');
                tabsContent.wrapAll('<div class="tabs-container et-clearfix"></div>');

                var tabSet = $this.find('.tabset');

                if(!tabs.hasClass('active')){
                    tabs.first().addClass('active');
                }
                
                tabs.each(function(){

                    var $thiz = $(this);

                    if ($thiz.hasClass('active')) {
                        $thiz.siblings()
                        .removeClass("active");
                        tabsContent.hide(0).removeClass('active');
                        tabsContent.eq($thiz.index()).show(0).addClass('active');
                    }

                });

                if(tabsQ >= 2){

                    tabs.on('click', function(){
                        var $self = $(this);
                        
                        if(!$self.hasClass("active")){

                            $self.addClass("active");

                            $self.siblings()
                            .removeClass("active");

                            tabsContent.hide(0).removeClass('active');
                            tabsContent.eq($self.index()).show(0).addClass('active');
                        }
                        
                    });
                }

            });

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
                return dataObj[key] === "et_header_menu";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_header_menu"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_header_menu"]');

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

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_header_menu"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_header_menu"]').length) {

                        var CSS = '';
                        var ID  = uniqueID();

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_header_menu"]');

                        /* Top level
                        ---------------*/

                            var align                 = edit_element.find('select[name="align"] option:selected').val(),
                                font_weight           = edit_element.find('select[name="font_weight"] option:selected').val(),
                                font_family           = edit_element.find('select[name="font_family"] option:selected').val(),
                                menu_separator        = edit_element.find('select[name="menu_separator"] option:selected').val(),
                                menu_separator_color  = edit_element.find('input[name="menu_separator_color"]').val(),
                                menu_separator_height = edit_element.find('input[name="menu_separator_height"]').val(),
                                menu_space            = edit_element.find('input[name="menu_space"]').val(),
                                menu_color            = edit_element.find('input[name="menu_color"]').val(),
                                menu_color_hover      = edit_element.find('input[name="menu_color_hover"]').val(),
                                menu_hover            = edit_element.find('select[name="menu_hover"] option:selected').val(),
                                menu_effect_color     = edit_element.find('input[name="menu_effect_color"]').val(),
                                font_size             = edit_element.find('input[name="font_size"]').val(),
                                letter_spacing        = edit_element.find('input[name="letter_spacing"]').val(),
                                text_transform        = edit_element.find('select[name="text_transform"] option:selected').val();

                            if (menu_space.length) {
                                CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0 {margin-left:'+menu_space+'px;}';
                            }

                            if (menu_separator.length && menu_separator_color.length) {
                                CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0:before, #header-menu-'+ID+' dir-child* .menu-item.depth-0:after {background:'+menu_separator_color+';}';
                                if (menu_space.length) {
                                    CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0:before {left:-'+(menu_space/2)+'px;}';
                                    CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0:after {right:-'+(menu_space/2)+'px;}';
                                    CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0 {margin-left:'+(menu_space/2)+'px !important;margin-right:'+(menu_space/2)+'px !important;}';
                                }
                                if (menu_separator_height.length) {
                                    CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0:before, #header-menu-'+ID+' dir-child* .menu-item.depth-0:after {height:'+menu_separator_height+'px;}';
                                }
                            }

                            CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0 dir-child* .mi-link {';

                                if (menu_color.length) {CSS += 'color:'+menu_color+';';}
                                if (font_size.length) {CSS += 'font-size:'+font_size+'px;';}

                                if (font_weight.length && font_weight != "italic" && font_weight != "regular") {

                                    if (isInArray(font_weight,font_weight_array)) {
                                        font_weight = font_weight.substring(0, 3);
                                        CSS += 'font-style:italic;';
                                    }

                                    CSS += 'font-weight:'+font_weight+';';
                                }

                                if (letter_spacing.length) {CSS += 'letter-spacing:'+letter_spacing+'px;';}
                                if (text_transform.length) {CSS += 'text-transform:'+text_transform+';';}
                                if (font_family.length && font_family != "Theme default") {CSS += 'font-family:\''+font_family+'\';';}

                            CSS += '}';

                            if (menu_color_hover.length) {
                                CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0:hover dir-child* .mi-link, #header-menu-'+ID+' dir-child* .menu-item.depth-0.current-menu-item dir-child* .mi-link, #header-menu-'+ID+' dir-child* .menu-item.depth-0.current-menu-parent dir-child* .mi-link, #header-menu-'+ID+' dir-child* .menu-item.depth-0.current-menu-ancestor dir-child* .mi-link, #header-menu-'+ID+' dir-child* .menu-item.depth-0.one-page-active dir-child* .mi-link {color:'+menu_color_hover+';}';
                            }

                            if (menu_hover.length && menu_hover !="none" && menu_effect_color.length ) {

                                switch(menu_hover){
                                    case 'underline':
                                        CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0 dir-child* .mi-link .txt:after {border-bottom-color:'+menu_effect_color+';}';
                                        break;
                                    case 'overline':
                                        CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0 dir-child* .mi-link:after {border-top-color:'+menu_effect_color+';background-color:transparent;box-shadow:none;}';
                                        break;
                                    case 'fill':
                                    case 'box':
                                        CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0 dir-child* .mi-link:after {background-color:'+menu_effect_color+';box-shadow:none;}';
                                        break;
                                    case 'outline':
                                        CSS += '#header-menu-'+ID+' dir-child* .menu-item.depth-0 dir-child* .mi-link:after {box-shadow:inset 0 0 0 1px '+menu_effect_color+';background-color:transparent;}';
                                        break;
                                }
                                
                            }

                        /* Submenu
                        ---------------*/

                            var subfont_weight      = edit_element.find('select[name="subfont_weight"] option:selected').val(),
                                subfont_family      = edit_element.find('select[name="subfont_family"] option:selected').val(),
                                submenu_back_color  = edit_element.find('input[name="submenu_back_color"]').val(),
                                submenu_color       = edit_element.find('input[name="submenu_color"]').val(),
                                submenu_color_hover = edit_element.find('input[name="submenu_color_hover"]').val(),
                                subfont_size        = edit_element.find('input[name="subfont_size"]').val(),
                                subletter_spacing   = edit_element.find('input[name="subletter_spacing"]').val(),
                                submenu_hover       = edit_element.find('select[name="submenu_hover"] option:selected').val(),
                                submenu_separator   = edit_element.find('select[name="submenu_separator"] option:selected').val(),
                                submenu_effect_color= edit_element.find('input[name="submenu_effect_color"]').val(),
                                subtext_transform   = edit_element.find('select[name="subtext_transform"] option:selected').val();

                            if (submenu_back_color.length) {
                                CSS += '#header-menu-'+ID+' .sub-menu {background-color:'+submenu_back_color+';}';
                            }

                            if (submenu_separator.length && submenu_color.length) {
                                CSS += '#header-menu-'+ID+' dir-child* .menu-item:not(.mm-true) .sub-menu .menu-item .mi-link:before {background-color:'+submenu_color+';}';
                            }

                            CSS += '#header-menu-'+ID+' dir-child* .menu-item:not(.mm-true) .sub-menu .menu-item .mi-link {';

                                if (submenu_color.length) {CSS += 'color:'+submenu_color+';';}
                                if (subfont_size.length) {CSS += 'font-size:'+subfont_size+'px;';}

                                if (subfont_weight.length && subfont_weight != "italic" && subfont_weight != "regular") {

                                    if (isInArray(subfont_weight,font_weight_array)) {
                                        subfont_weight = subfont_weight.substring(0, 3);
                                        CSS += 'font-style:italic;';
                                    }

                                    CSS += 'font-weight:'+subfont_weight+';';
                                }

                                if (subletter_spacing.length) {CSS += 'letter-spacing:'+subletter_spacing+'px;';}
                                if (subtext_transform.length) {CSS += 'text-transform:'+subtext_transform+';';}
                                if (subfont_family.length && subfont_family != "Theme default") {CSS += 'font-family:\''+subfont_family+'\';';}

                            CSS += '}';

                            if (submenu_color_hover.length) {
                                CSS += '#header-menu-'+ID+' dir-child* .menu-item:not(.mm-true) .sub-menu .menu-item:hover dir-child* .mi-link {color:'+submenu_color_hover+';}';
                            }

                            if (submenu_hover.length && submenu_hover !="none" && submenu_effect_color.length ) {

                                switch(submenu_hover){
                                    case 'dot':
                                    case 'fill':
                                    case 'box':
                                        CSS += '#header-menu-'+ID+' dir-child* .menu-item:not(.mm-true) .sub-menu .menu-item .mi-link:after {background-color:'+submenu_effect_color+';box-shadow:none;}';
                                        break;
                                    case 'line':
                                        CSS += '#header-menu-'+ID+' dir-child* .menu-item:not(.mm-true) .sub-menu .menu-item .mi-link .txt:after {background-color:'+submenu_effect_color+';box-shadow:none;}';
                                        break;
                                    case 'outline':
                                        CSS += '#header-menu-'+ID+' dir-child* .menu-item:not(.mm-true) .sub-menu .menu-item .mi-link:after {box-shadow:inset 0 0 0 1px '+submenu_effect_color+';background-color:transparent;}';
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

                            CSS += '#header-menu-container-'+ID+' {';
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
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .header-menu-container');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                            hbeAlign(element,doc);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);