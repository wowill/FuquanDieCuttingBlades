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
                $thisTo = $this.data('to'),
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

            $this.addClass('animate');
            $this.find('.counter').countTo({
                from: 0,
                to: $thisTo,
                speed: 2000,
                refreshInterval: 30
            });
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
                        return dataObj[key] === "et_counter";
                    });

                /* Edit element
                /*-------------*/

                    if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_counter"){

                        var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_counter"]');

                        var element_css  = edit_element.find('textarea[name="element_css"]'),
                            element_id   = edit_element.find('input[name="element_id"]'),
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


                        $('#vc_ui-panel-edit-element[data-vc-shortcode="et_counter"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                            if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_counter"]').length) {

                                var ID  = uniqueID();
                                var CSS = '';

                                edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_counter"]');

                                /* Styling
                                ---------------*/

                                    var value_color = edit_element.find('input[name="value_color"]').val(),
                                        title_color = edit_element.find('input[name="title_color"]').val(),
                                        track_color = edit_element.find('input[name="track_color"]').val(),
                                        bar_color   = edit_element.find('input[name="bar_color"]').val(),
                                        parallax    = edit_element.find('input[name="parallax"]:checked').val(),
                                        parallax_x  = edit_element.find('input[name="parallax_x"]').val(),
                                        parallax_y  = edit_element.find('input[name="parallax_y"]').val(),
                                        rp          = edit_element.find("input[name=\"rp\"]");

                                    if (!parallax_x.length) {
                                        parallax_x = 0;
                                    }

                                    if (!parallax_y.length) {
                                        parallax_y = 0;
                                    }

                                    if (track_color.length) {
                                        CSS += '#et-counter-'+ID+' {';
                                            CSS += 'border-color:'+track_color+';';
                                        CSS += '}';
                                    }

                                    if (bar_color.length) {
                                        CSS += '#et-counter-'+ID+' .counter-moving-child:before {';
                                            CSS += 'border-color:'+bar_color+';';
                                        CSS += '}';
                                    }

                                    if (value_color.length) {
                                        CSS += '#et-counter-'+ID+' .counter-value, #et-counter-'+ID+' .counter-value dir-child* * {';
                                            CSS += 'color:'+value_color+';';
                                        CSS += '}';
                                    }

                                    if (title_color.length) {
                                        CSS += '#et-counter-'+ID+' .counter-title {';
                                            CSS += 'color:'+title_color+';';
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
                                var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-counter');
                                if (typeof(element) != 'undefined' && element != null) {
                                    iframeSCRIPT(element,doc);
                                }
                            });
                        }
                        return;
                    }

                    

        });

})(jQuery);