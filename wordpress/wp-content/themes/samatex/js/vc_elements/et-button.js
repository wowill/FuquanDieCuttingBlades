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

            var $this  = $(this),
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
                        return dataObj[key] === "et_button";
                    });

                /* Edit element
                /*-------------*/

                    if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_button"){

                        var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_button"]');

                        var element_css  = edit_element.find('textarea[name="element_css"]'),
                            element_id   = edit_element.find('input[name="element_id"]'),
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

                        $('#vc_ui-panel-edit-element[data-vc-shortcode="et_button"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                            if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_button"]').length) {

                                var ID  = uniqueID();
                                var CSS = '';

                                edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_button"]');

                                /* Styling
                                ---------------*/

                                    var font_weight               = edit_element.find('select[name="font_weight"] option:selected').val(),
                                        font_family               = edit_element.find('select[name="font_family"] option:selected').val(),
                                        button_font_size          = edit_element.find('input[name="button_font_size"]').val(),
                                        icon_position             = edit_element.find('select[name="icon_position"] option:selected').val(),
                                        icon_font_size            = edit_element.find('input[name="icon_font_size"]').val(),
                                        icon_margin               = edit_element.find('input[name="icon_margin"]').val(),
                                        button_letter_spacing     = edit_element.find('input[name="button_letter_spacing"]').val(),
                                        button_line_height        = edit_element.find('input[name="button_line_height"]').val(),
                                        button_text_transform     = edit_element.find('select[name="button_text_transform"] option:selected').val(),
                                        button_color              = edit_element.find('input[name="button_color"]').val(),
                                        button_back_color         = edit_element.find('input[name="button_back_color"]').val(),
                                        button_border_color       = edit_element.find('input[name="button_border_color"]').val(),
                                        button_border_radius      = edit_element.find('input[name="button_border_radius"]').val(),
                                        button_border_width       = edit_element.find('input[name="button_border_width"]').val(),
                                        button_min_width          = edit_element.find('input[name="button_min_width"]').val(),
                                        button_shadow             = edit_element.find('input[name="button_shadow"]'),
                                        button_color_hover        = edit_element.find('input[name="button_color_hover"]').val(),
                                        button_back_color_hover   = edit_element.find('input[name="button_back_color_hover"]').val(),
                                        button_border_color_hover = edit_element.find('input[name="button_border_color_hover"]').val(),
                                        animate_hover             = edit_element.find('select[name="animate_hover"] option:selected').val(),
                                        animate_click             = edit_element.find('select[name="animate_click"] option:selected').val(),
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

                                        CSS += '#et-button-'+ID+' {';
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

                                    CSS += '#et-button-'+ID+' {';
                                        if (button_min_width.length) {
                                            CSS += 'min-width:'+button_min_width+'px;';
                                        }
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
                                        if (button_shadow.length && button_shadow.is(":checked")) {
                                            CSS += 'box-shadow: 0px 0 24px 0px rgba(0, 0, 0, 0.08);';
                                        }
                                    CSS += '}';

                                    if (icon_font_size.length) {
                                        CSS += '#et-button-'+ID+' .icon {';
                                            CSS += 'font-size:'+icon_font_size+'px !important;';
                                        CSS += '}';
                                    }

                                    if (icon_margin.length) {
                                        CSS += '#et-button-'+ID+' .icon {';
                                            if (icon_position == "left") {
                                                CSS += 'margin-right:'+icon_margin+'px !important;';
                                            } else {
                                                CSS += 'margin-left:'+icon_margin+'px !important;';
                                            }
                                        CSS += '}';
                                    }

                                    if (button_color_hover.length) {
                                        CSS += '#et-button-'+ID+':hover {';
                                            CSS += 'color:'+button_color_hover+';';
                                        CSS += '}';
                                    }

                                    CSS += '#et-button-'+ID+' .regular {';
                                        if (button_back_color.length) {
                                            CSS += 'background-color:'+button_back_color+';';
                                        }
                                        if (button_border_width.length && button_border_color.length) {
                                            CSS += 'box-shadow:inset 0 0 0 '+button_border_width+'px '+button_border_color+';';
                                        }
                                    CSS += '}';

                                    if (animate_hover.length && (animate_hover == "glint" || animate_hover == "scale") && button_border_width.length && button_border_color_hover.length) {
                                        CSS += '#et-button-'+ID+':hover .regular {';
                                            CSS += 'box-shadow:inset 0 0 0 '+button_border_width+'px '+button_border_color_hover+';';
                                        CSS += '}';
                                    }

                                    CSS += '#et-button-'+ID+' .hover {';
                                        if (button_back_color_hover.length) {
                                            CSS += 'background-color:'+button_back_color_hover+';';
                                        }
                                        if (button_border_width.length && button_border_color_hover.length) {
                                            CSS += 'box-shadow:inset 0 0 0 '+button_border_width+'px '+button_border_color_hover+';';
                                        }
                                    CSS += '}';

                                    if (animate_hover.length && animate_hover == "glint") {

                                        if (button_color.length) {
                                            CSS += '#et-button-'+ID+' .glint {';
                                                CSS += 'color:'+button_color+';';
                                            CSS += '}';
                                        }

                                        if (button_color_hover.length) {
                                            CSS += '#et-button-'+ID+' .glint {';
                                                CSS += 'background-color:'+button_color_hover+';';
                                            CSS += '}';
                                        }
                                       
                                    }

                                    if (animate_click.length) {

                                        if (button_color.length) {
                                            CSS += '#et-button-'+ID+' .et-ink {';
                                                CSS += 'color:'+button_color+';';
                                            CSS += '}';
                                        }

                                        if (button_color_hover.length) {
                                            CSS += '#et-button-'+ID+' .et-ink {';
                                                CSS += 'background-color:'+button_color_hover+';';
                                            CSS += '}';
                                        }
                                       
                                    }


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
                                var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-button');
                                if (typeof(element) != 'undefined' && element != null) {
                                    iframeSCRIPT(element,doc);
                                }
                            });
                        }
                        return;
                    }

                    

        });

})(jQuery);