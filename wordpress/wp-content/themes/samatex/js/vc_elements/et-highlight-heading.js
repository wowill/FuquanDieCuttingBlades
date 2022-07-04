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

            var $this   = $(this),
                $thisParent = $this.parent(),
                $thisDelay  = $this.attr('data-delay'),
                $thisText   = $this.find('.text'),
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
                        return dataObj[key] === "et_highlight_heading";
                    });

                /* Edit element
                /*-------------*/

                    if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_highlight_heading"){

                        var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_highlight_heading"]');

                        var element_css  = edit_element.find('textarea[name="element_css"]'),
                            element_id   = edit_element.find('input[name="element_id"]'),
                            margin_box   = edit_element.find(".margin-box"),
                            margin       = edit_element.find('input[name="margin"]'),
                            margin_val   = margin.val(),
                            margin_array = [],
                            table          = edit_element.find(".responsive-parallax"),
                            media_query    = table.find(".media-query"),
                            rp             = edit_element.find("input[name=\"rp\"]"),
                            parallax_array = [];

                        // Set defaults

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

                        if(typeof(margin_val) != "undefined" && margin_val.length){

                            var margin_array = margin_val.split(",");

                            margin_box.find("input[name=\"margin-top\"]").attr('value',margin_array[0]);
                            margin_box.find("input[name=\"margin-right\"]").attr('value',margin_array[1]);
                            margin_box.find("input[name=\"margin-bottom\"]").attr('value',margin_array[2]);
                            margin_box.find("input[name=\"margin-left\"]").attr('value',margin_array[3]);

                        }

                        $('#vc_ui-panel-edit-element[data-vc-shortcode="et_highlight_heading"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                            if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_highlight_heading"]').length) {

                                var ID  = uniqueID();
                                var CSS = '';

                                edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_highlight_heading"]');

                                /* Styling
                                ---------------*/

                                    var font_weight      = edit_element.find('select[name="font_weight"] option:selected').val(),
                                        font_family      = edit_element.find('select[name="font_family"] option:selected').val(),
                                        text_color       = edit_element.find('input[name="text_color"]').val(),
                                        border_color     = edit_element.find('input[name="border_color"]').val(),
                                        font_size        = edit_element.find('input[name="font_size"]').val(),
                                        letter_spacing   = edit_element.find('input[name="letter_spacing"]').val(),
                                        line_height      = edit_element.find('input[name="line_height"]').val(),
                                        text_transform   = edit_element.find('select[name="text_transform"] option:selected').val(),
                                        parallax         = edit_element.find('input[name="parallax"]:checked').val(),
                                        parallax_x       = edit_element.find('input[name="parallax_x"]').val(),
                                        parallax_y       = edit_element.find('input[name="parallax_y"]').val(),
                                        rp               = edit_element.find("input[name=\"rp\"]");

                                    if (!parallax_x.length) {
                                        parallax_x = 0;
                                    }

                                    if (!parallax_y.length) {
                                        parallax_y = 0;
                                    }

                                    if (border_color.length) {
                                        CSS += '#et-highlight-heading-'+ID+' .text-wrapper:before {';
                                            CSS += 'background-color:'+border_color+';';
                                        CSS += '}';
                                    } else {
                                        CSS += '#et-highlight-heading-'+ID+' .text-wrapper:before {';
                                            CSS += 'background-color:transparent;';
                                        CSS += '}';
                                    }

                                    CSS += '#et-highlight-heading-'+ID+' {';
                                        
                                        if (text_color.length) {CSS += 'color:'+text_color+';';}
                                        if (font_size.length) {CSS += 'font-size:'+font_size+'px;';}

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

                                        if (letter_spacing.length) {CSS += 'letter-spacing:'+letter_spacing+'px;';}
                                        if (line_height.length) {CSS += 'line-height:'+line_height+'px;';}
                                        if (text_transform.length) {CSS += 'text-transform:'+text_transform+';';}
                                        if (font_family.length && font_family != "Theme default") {CSS += 'font-family:\''+font_family+'\';';}

                                    CSS += '}';

                                    if(typeof(parallax) != "undefined" && parallax.length && parallax != null){

                                        CSS += '#et-highlight-heading-'+ID+' {';
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

                                    CSS += '#et-highlight-heading-'+ID+' {';
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
                                var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-highlight');
                                if (typeof(element) != 'undefined' && element != null) {
                                    iframeSCRIPT(element,doc);
                                }
                            });
                        }
                        return;
                    }
        });

})(jQuery);