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

    function iframeSCRIPT(element,doc){
        $(element).each(function(){

            var $this       = $(this),
                $thisParent = $this.parent(),
                speed       = $this.data('speed'),
                move        = $this.data('move'),
                xCoordinate = $this.data('coordinatex'),
                yCoordinate = $this.data('coordinatey'),
                classes     = $this.attr('class'),
                classArray  = classes.split(' '),
                disableArray = [];

                for (var i = 0; i < classArray.length; i++) {
                    if (classArray[i].includes("disable")) {
                        disableArray.push(classArray[i])
                    }
                }

            if ($this.attr('data-parallax') == "true") {

                $thisParent.parent().css('position','relative');

                $this
                .removeClass('etp-parallax')
                .removeAttr('data-parallax');

                $thisParent
                .addClass('etp-parallax')
                .attr('data-parallax','true')
                .css({
                    '-ms-transform':'translate3d('+xCoordinate+'px, '+yCoordinate+ 'px, 0px)',
                    'transform':'translate3d('+xCoordinate+'px, '+yCoordinate+ 'px, 0px)'
                });

                for (var i = 0; i < disableArray.length; i++) {
                    $thisParent.addClass(disableArray[i]);
                }

                if (move == true) {

                    $thisParent.on('mousemove',function(event){
                        
                        var clientRect  = this.getBoundingClientRect();
                        var yPosDefault = Math.round((0-doc.scrollTop()) / speed)  +  yCoordinate;
                        var yPos        = Math.round(0 - ((event.clientY-(clientRect.top+clientRect.height*0.5))/speed)) + yPosDefault;
                        var xPos        = Math.round(0 - (event.clientX-(clientRect.left+clientRect.width*0.5))/speed) + xCoordinate;

                        $thisParent.css({
                            '-ms-transform':'translate3d('+xPos+'px, '+yPos+ 'px, 0px)',
                            'transform':'translate3d('+xPos+'px, '+yPos+ 'px, 0px)'
                        });
                        
                    });

                }

                doc.scroll(function(){
                    var yPos = Math.round((0-doc.scrollTop()) / speed)  +  yCoordinate;
                    $thisParent.css({
                        '-ms-transform':'translate3d('+xCoordinate+'px, '+yPos+ 'px, 0px)',
                        'transform':'translate3d('+xCoordinate+'px, '+yPos+ 'px, 0px)'
                    });
                });
            }

            if ($this.parents().hasClass('effect-fadeIn') || $this.parents().hasClass('effect-moveUp')) {
                $this.find('.et-item-inner').addClass('animate');
            }
        });
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
                return dataObj[key] === "et_icon_box";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_icon_box"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_box"]'),
                    element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]'),
                    padding_box   = edit_element.find(".padding-box"),
                    padding       = edit_element.find('input[name="padding"]'),
                    padding_val   = padding.val(),
                    padding_array = [],
                    table        = edit_element.find(".responsive-parallax"),
                    media_query  = table.find(".media-query"),
                    rp           = edit_element.find("input[name=\"rp\"]"),
                    parallax_array = [];

                var rp_val = rp.val();

                if(typeof(rp_val) != "undefined" && rp_val.length){
                    var rp_array = rp_val.split(",");

                    media_query.each(function(index){
                        var $this = $(this);
                        var $thisQuery = String($this.data("query"));
                        if(isInArray($thisQuery, rp_array)){
                            $this.find("input[name=\""+$thisQuery +"\"]").attr("checked",true);
                        }
                    });
                }

                if(typeof(padding_val) != "undefined" && padding_val.length){

                    var padding_array = padding_val.split(",");

                    padding_box.find("input[name=\"padding-top\"]").attr('value',padding_array[0]);
                    padding_box.find("input[name=\"padding-right\"]").attr('value',padding_array[1]);
                    padding_box.find("input[name=\"padding-bottom\"]").attr('value',padding_array[2]);
                    padding_box.find("input[name=\"padding-left\"]").attr('value',padding_array[3]);

                }

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_box"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_box"]').length) {

                        var ID  = uniqueID();
                        var CSS = '';

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_box"]');

                        /* Styling
                        ---------------*/

                            var icon_color              = edit_element.find('input[name="icon_color"]').val(),
                                icon_back_color         = edit_element.find('input[name="icon_back_color"]').val(),
                                icon_border_color       = edit_element.find('input[name="icon_border_color"]').val(),
                                icon_color_hover        = edit_element.find('input[name="icon_color_hover"]').val(),
                                icon_back_color_hover   = edit_element.find('input[name="icon_back_color_hover"]').val(),
                                icon_border_color_hover = edit_element.find('input[name="icon_border_color_hover"]').val(),
                                icon_border_radius      = edit_element.find('input[name="icon_border_radius"]').val(),
                                icon_border_width       = edit_element.find('input[name="icon_border_width"]').val(),
                                title_color             = edit_element.find('input[name="title_color"]').val(),
                                text_color              = edit_element.find('input[name="text_color"]').val(),
                                box_color               = edit_element.find('input[name="box_color"]').val(),
                                title_color_hover       = edit_element.find('input[name="title_color_hover"]').val(),
                                text_color_hover        = edit_element.find('input[name="text_color_hover"]').val(),
                                box_color_hover         = edit_element.find('input[name="box_color_hover"]').val(),
                                box_border_color        = edit_element.find('input[name="box_border_color"]').val(),
                                box_border_color_hover  = edit_element.find('input[name="box_border_color_hover"]').val(),
                                box_border_width        = edit_element.find('input[name="box_border_width"]').val(),
                                shadow                  = edit_element.find('input[name="shadow"]'),
                                hover                   = edit_element.find('select[name="hover"] option:selected').val(),
                                parallax      = edit_element.find('input[name="parallax"]:checked').val(),
                                parallax_x    = edit_element.find('input[name="parallax_x"]').val(),
                                parallax_y    = edit_element.find('input[name="parallax_y"]').val(),
                                rp            = edit_element.find("input[name=\"rp\"]");

                            if (!parallax_x.length) {
                                parallax_x = 0;
                            }

                            if (!parallax_y.length) {
                                parallax_y = 0;
                            }

                            if(typeof(parallax) != "undefined" && parallax.length && parallax != null){

                                CSS += '#et-icon-box-'+ID+' {';
                                    CSS += '-ms-transform:translate3d('+parallax_x+'px,'+parallax_y+'px,0px);';
                                    CSS += 'transform:translate3d('+parallax_x+'px,'+parallax_y+'px,0px);';
                                CSS += '}';

                            }
                            if(rp.length){

                                for(var i=0;i<media_query.length;i++){

                                    var query = $(media_query[i]).data("query");
                                    var checked = $(media_query[i]).find("input[type='checkbox']:checked").val();

                                    if(typeof(checked) != "undefined" && checked.length){
                                        parallax_array.push(query);
                                    }
                                }

                                var parallax_string = parallax_array.join();
                                rp.val(parallax_string);
                                parallax_array = [];
                            }

                            if (shadow.length && shadow.is(":checked")) {
                                CSS += '#et-icon-box-'+ID+' {';
                                    CSS += 'box-shadow:0px 8px 24px 0px rgba(0, 0, 0, 0.08);';
                                CSS += '}';
                            }


                            CSS += '#et-icon-box-'+ID+' {';
                                if (box_color.length) {
                                    CSS += 'background-color:'+box_color+';';
                                }
                                if (box_border_color.length && box_border_width.length) {
                                    if (shadow.length && shadow.is(":checked")) {
                                        CSS += 'box-shadow:inset 0 0 0 '+box_border_width.length+'px '+box_border_color+', 0px 8px 24px 0px rgba(0, 0, 0, 0.08);';
                                    } else {
                                        CSS += 'box-shadow:inset 0 0 0 '+box_border_width.length+'px '+box_border_color+';';
                                    }
                                }
                            CSS += '}';

                            CSS += '#et-icon-box-'+ID+':hover {';
                                if (box_color_hover.length) {
                                    CSS += 'background-color:'+box_color_hover+';';
                                }
                                if (box_border_color_hover.length && box_border_width.length) {
                                    if (shadow.length && shadow.is(":checked")) {
                                        CSS += 'box-shadow:inset 0 0 0 '+box_border_width.length+'px '+box_border_color_hover+', 0px 8px 24px 0px rgba(0, 0, 0, 0.08);';
                                    } else {
                                        CSS += 'box-shadow:inset 0 0 0 '+box_border_width.length+'px '+box_border_color_hover+';';
                                    }
                                }

                            CSS += '}';

                            CSS += '#et-icon-box-'+ID+'.link:hover {';
                                if (box_border_color_hover.length && box_border_width.length) {
                                    if ((shadow.length && shadow.is(":checked")) || (hover.length && hover == "transform")) {
                                        CSS += 'box-shadow:inset 0 0 0 '+box_border_width.length+'px '+box_border_color_hover+', 0px 8px 24px 0px rgba(0, 0, 0, 0.08);';
                                    } else {
                                        CSS += 'box-shadow:inset 0 0 0 '+box_border_width.length+'px '+box_border_color_hover+';';
                                    }
                                }
                            CSS += '}';
                            

                            if (title_color.length) {
                                CSS += '#et-icon-box-'+ID+' .et-icon-box-title {';
                                    CSS += 'color:'+title_color+';';
                                CSS += '}';
                            }

                            if (title_color_hover.length) {
                                CSS += '#et-icon-box-'+ID+':hover .et-icon-box-title {';
                                    CSS += 'color:'+title_color_hover+';';
                                CSS += '}';
                            }

                            if (text_color.length) {
                                CSS += '#et-icon-box-'+ID+' .et-icon-box-content {';
                                    CSS += 'color:'+text_color+';';
                                CSS += '}';
                            }

                            if (text_color_hover.length) {
                                CSS += '#et-icon-box-'+ID+':hover .et-icon-box-content {';
                                    CSS += 'color:'+text_color_hover+';';
                                CSS += '}';
                            }

                            CSS += '#et-icon-box-'+ID+' .et-icon {';
                                if (icon_color.length) {CSS += 'color:'+icon_color+';';}
                                if (icon_back_color.length) {CSS += 'background-color:'+icon_back_color+';';}
                                if (icon_border_radius.length) {CSS += 'border-radius:'+icon_border_radius+'px;';}
                                if (icon_border_width.length) {
                                    if (icon_border_color.length) {
                                        CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_border_color+';';
                                    } else {
                                        if (icon_color.length) {
                                            CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_color+';';
                                        }
                                    }
                                    
                                }
                            CSS += '}';

                            if (icon_color.length) {
                                CSS += '#et-icon-box-'+ID+' .ghost-icon {';
                                    CSS += 'color:'+icon_color+';';
                                CSS += '}';
                            }

                            if (icon_color_hover.length) {
                                CSS += '#et-icon-box-'+ID+':hover .ghost-icon {';
                                    CSS += 'color:'+icon_color_hover+';';
                                CSS += '}';
                            }

                            if (icon_back_color_hover.length) {
                                CSS += '#et-icon-box-'+ID+' .et-icon:after {';
                                    CSS += 'background-color:'+icon_back_color_hover+';';
                                CSS += '}';
                            }

                            CSS += '#et-icon-box-'+ID+':hover .et-icon {';
                                if (icon_color_hover.length) {CSS += 'color:'+icon_color_hover+';';}
                                
                                if (icon_border_width.length) {
                                    if (icon_border_color_hover.length) {
                                        CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_border_color_hover+';';
                                    } else {
                                        if (icon_color_hover.length) {
                                            CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_color_hover+';';
                                        }
                                    }
                                    
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

                            CSS += '#et-icon-box-'+ID+' {';
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
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-icon-box');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }
    });

})(jQuery);