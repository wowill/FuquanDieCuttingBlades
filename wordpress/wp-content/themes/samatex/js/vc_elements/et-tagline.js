(function($){

    "use strict";

    $.fn.placeholder = function() {

        $.each(this, function(){

            var $this       = $(this);

            if ($this.attr('placeholder')) {
                $this.attr("data-placeholder", $this.attr('placeholder'));
                $this.removeAttr('placeholder');
            };

            var placeholder = $this.data("placeholder");

            if($this.val() == '') { $this.val(placeholder);}

            $this
            .on('focus', function(){
                if($this.val() == placeholder) { $this.val('');}
            })
            .on('focusout', function(){
                if($this.val() == '') { $this.val(placeholder);}
            });

        });

    }

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

    function iframeSCRIPT(element,doc){
        $(element).each(function(){

            var $this  = $(this);
            var $delay = $this.data('delay');
            var cookie = $this.data('cookie');

            if (typeof($delay) == 'undefined' && $delay == null){
                $delay = 3000;
            }

            if (typeof($.cookie($this.attr('id'))) == 'undefined') {

                setTimeout(function(){
                    $this.slideToggle(300);
                },$delay);

                $this.find('.tagline-toggle').bind('click',function(){
                    $this.slideToggle(300);
                    if (cookie == true) {
                        $.cookie($this.attr('id'),'active',{ expires: 1,path: '/'});
                    }
                });

            }

        });
    }

    var font_weight_array = [];

    for (var i = 1; i <= 9; i++) {
        font_weight_array.push(i+'00italic');
    }

    /* Ajax complete
    /*-------------*/

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
                        return dataObj[key] === "et_tagline";
                    });

                /* Edit element
                /*-------------*/

                    if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_tagline"){

                        var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_tagline"]');

                        var element_css  = edit_element.find('textarea[name="element_css"]'),
                            element_id   = edit_element.find('input[name="element_id"]'),
                            padding_box   = edit_element.find(".padding-box"),
                            padding       = edit_element.find('input[name="padding"]'),
                            padding_val   = padding.val(),
                            padding_array = [];

                        if(typeof(padding_val) != "undefined" && padding_val.length){

                            var padding_array = padding_val.split(",");

                            padding_box.find("input[name=\"padding-top\"]").attr('value',padding_array[0]);
                            padding_box.find("input[name=\"padding-right\"]").attr('value',padding_array[1]);
                            padding_box.find("input[name=\"padding-bottom\"]").attr('value',padding_array[2]);
                            padding_box.find("input[name=\"padding-left\"]").attr('value',padding_array[3]);

                        }

                        $('#vc_ui-panel-edit-element[data-vc-shortcode="et_tagline"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                            if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_tagline"]').length) {

                                var ID  = uniqueID();
                                var CSS = '';

                                edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_tagline"]');

                                /* Styling
                                ---------------*/

                                    var back_color              = edit_element.find('input[name="back_color"]').val(),
                                        back_img                = edit_element.find('input[name="back_img"]').val(),
                                        title_color             = edit_element.find('input[name="title_color"]').val(),
                                        button_color            = edit_element.find('input[name="button_color"]').val(),
                                        button_background_color = edit_element.find('input[name="button_background_color"]').val(),
                                        button_color_hover            = edit_element.find('input[name="button_color_hover"]').val(),
                                        button_background_color_hover = edit_element.find('input[name="button_background_color_hover"]').val();

                                    CSS += '#et-tagline-'+ID+' {';

                                        if(back_img.length){
                                            back_img = edit_element.find("img[rel=\""+back_img+"\"]").attr("src").replace("-150x150", "");
                                            CSS += "background-image:url("+back_img+");";
                                        }

                                        if (back_color.length) {
                                            CSS += 'background-color:'+back_color+';';
                                        }

                                    CSS += '}';

                                    if (title_color.length) {
                                        CSS += '#et-tagline-'+ID+' .tagline-title, #et-tagline-'+ID+' .tagline-toggle {';
                                            CSS += 'color:'+title_color+';';
                                        CSS += '}';
                                    }

                                    
                                    CSS += '#et-tagline-'+ID+' .tagline-button {';
                                        if (button_color.length) {
                                            CSS += 'color:'+button_color+';';
                                        }
                                        if (button_background_color.length) {
                                            CSS += 'background-color:'+button_background_color+';';
                                        }
                                    CSS += '}';

                                    CSS += '#et-tagline-'+ID+' .tagline-button:hover {';
                                        if (button_background_color_hover.length) {
                                            CSS += 'background-color:'+button_background_color_hover+';';
                                        }
                                        if (button_color_hover.length) {
                                            CSS += 'color:'+button_color_hover+';';
                                        }
                                    CSS += '}';

                                /* Padding
                                ---------------*/

                                    var padding_left   = edit_element.find(".padding-box input[name=\"padding-left\"]").val(),
                                        padding_top    = edit_element.find(".padding-box input[name=\"padding-top\"]").val(),
                                        padding_right  = edit_element.find(".padding-box input[name=\"padding-right\"]").val(),
                                        padding_bottom = edit_element.find(".padding-box input[name=\"padding-bottom\"]").val();

                                    padding_top = (padding_top.length) ? padding_top : '0';
                                    padding_right = (padding_right.length) ? padding_right : '0';
                                    padding_bottom = (padding_bottom.length) ? padding_bottom : '0';
                                    padding_left = (padding_left.length) ? padding_left : '0';

                                    var padding_output = padding_top+','+padding_right+','+padding_bottom+','+padding_left,
                                        padding_value  = padding_top+'px '+padding_right+'px '+padding_bottom+'px '+padding_left+'px';

                                    padding.val(padding_output);

                                    CSS += '#et-tagline-'+ID+' {';
                                        CSS += 'padding:'+padding_value+';';
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
                                var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-tagline');
                                if (typeof(element) != 'undefined' && element != null) {
                                    iframeSCRIPT(element,doc);
                                }
                            });
                        }
                        return;
                    }

                    

        });

})(jQuery);