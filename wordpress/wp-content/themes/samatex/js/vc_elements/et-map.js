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

    function iframeSCRIPT(element,doc){
        $(element).each(function(){

            var $this = $(this),
                zoom      = ($this.attr('data-zoom')) ? parseInt($this.data('zoom')) : 18,
                type      = ($this.attr('data-type')) ? $this.attr('data-type') : 'roadmap',
                mapTypeId = "roadmap",
                styleArray = '';

                var dataX_1   = $this.data('x1'),
                    dataY_1   = $this.data('y1'),
                    title_1   = $this.attr('data-title1'),
                    image_1   = $this.attr('data-image1'),
                    content_1 = $this.attr('data-content1'),
                    location_1 = [];

                var buildContent_1 = '';

                    if (typeof(image_1) != 'undefined' && image_1 != null){
                        buildContent_1 += '<img class="map-image" src="'+image_1+'" />';
                    }

                    if (typeof(title_1) != 'undefined' && title_1 != null){
                        buildContent_1 += '<h5 class="map-title">'+title_1+'</h5>';
                    }
                    
                    if (typeof(content_1) != 'undefined' && content_1 != null){
                        buildContent_1 += '<p class="map-content">'+content_1+'</p>';
                    }

                    if (typeof(dataX_1) != 'undefined' && dataX_1 != null){location_1.push(dataX_1);}
                    if (typeof(dataY_1) != 'undefined' && dataY_1 != null){location_1.push(dataY_1);}
                    if (typeof(buildContent_1) != 'undefined' && buildContent_1 != null){location_1.push(buildContent_1);}
                    

                var dataX_2   = $this.data('x2'),
                    dataY_2   = $this.data('y2'),
                    title_2   = $this.attr('data-title2'),
                    image_2   = $this.attr('data-image2'),
                    content_2 = $this.attr('data-content2'),
                    location_2 = [];

                var buildContent_2 = '';

                    if (typeof(image_2) != 'undefined' && image_2 != null){
                        buildContent_2 += '<img class="map-image" src="'+image_2+'" />';
                    }

                    if (typeof(title_2) != 'undefined' && title_2 != null){
                        buildContent_2 += '<h5 class="map-title">'+title_2+'</h5>';
                    }
                    
                    if (typeof(content_2) != 'undefined' && content_2 != null){
                        buildContent_2 += '<p class="map-content">'+content_2+'</p>';
                    }

                    if (typeof(dataX_2) != 'undefined' && dataX_2 != null){location_2.push(dataX_2);}
                    if (typeof(dataY_2) != 'undefined' && dataY_2 != null){location_2.push(dataY_2);}
                    if (typeof(buildContent_2) != 'undefined' && buildContent_2 != null){location_2.push(buildContent_2);}

                var dataX_3   = $this.data('x3'),
                    dataY_3   = $this.data('y3'),
                    title_3   = $this.attr('data-title3'),
                    image_3   = $this.attr('data-image3'),
                    content_3 = $this.attr('data-content3'),
                    location_3 = [];

                var buildContent_3 = '';

                    if (typeof(image_3) != 'undefined' && image_3 != null){
                        buildContent_3 += '<img class="map-image" src="'+image_3+'" />';
                    }

                    if (typeof(title_3) != 'undefined' && title_3 != null){
                        buildContent_3 += '<h5 class="map-title">'+title_3+'</h5>';
                    }
                    
                    if (typeof(content_3) != 'undefined' && content_3 != null){
                        buildContent_3 += '<p class="map-content">'+content_3+'</p>';
                    }

                    if (typeof(dataX_3) != 'undefined' && dataX_3 != null){location_3.push(dataX_3);}
                    if (typeof(dataY_3) != 'undefined' && dataY_3 != null){location_3.push(dataY_3);}
                    if (typeof(buildContent_3) != 'undefined' && buildContent_3 != null){location_3.push(buildContent_3);}

                var dataX_4   = $this.data('x4'),
                    dataY_4   = $this.data('y4'),
                    title_4   = $this.attr('data-title4'),
                    image_4   = $this.attr('data-image4'),
                    content_4 = $this.attr('data-content4'),
                    location_4 = [];

                var buildContent_4 = '';

                    if (typeof(image_4) != 'undefined' && image_4 != null){
                        buildContent_4 += '<img class="map-image" src="'+image_4+'" />';
                    }

                    if (typeof(title_4) != 'undefined' && title_4 != null){
                        buildContent_4 += '<h5 class="map-title">'+title_4+'</h5>';
                    }
                    
                    if (typeof(content_4) != 'undefined' && content_4 != null){
                        buildContent_4 += '<p class="map-content">'+content_4+'</p>';
                    }

                    if (typeof(dataX_4) != 'undefined' && dataX_4 != null){location_4.push(dataX_4);}
                    if (typeof(dataY_4) != 'undefined' && dataY_4 != null){location_4.push(dataY_4);}
                    if (typeof(buildContent_4) != 'undefined' && buildContent_4 != null){location_4.push(buildContent_4);}

                var dataX_5   = $this.data('x5'),
                    dataY_5   = $this.data('y5'),
                    title_5   = $this.attr('data-title5'),
                    image_5   = $this.attr('data-image5'),
                    content_5 = $this.attr('data-content5'),
                    location_5 = [];

                var buildContent_5 = '';

                    if (typeof(image_5) != 'undefined' && image_5 != null){
                        buildContent_5 += '<img class="map-image" src="'+image_5+'" />';
                    }

                    if (typeof(title_5) != 'undefined' && title_5 != null){
                        buildContent_5 += '<h5 class="map-title">'+title_5+'</h5>';
                    }
                    
                    if (typeof(content_5) != 'undefined' && content_5 != null){
                        buildContent_5 += '<p class="map-content">'+content_5+'</p>';
                    }

                    if (typeof(dataX_5) != 'undefined' && dataX_5 != null){location_5.push(dataX_5);}
                    if (typeof(dataY_5) != 'undefined' && dataY_5 != null){location_5.push(dataY_5);}
                    if (typeof(buildContent_5) != 'undefined' && buildContent_5 != null){location_5.push(buildContent_5);}

                var locations = [];

                if (location_1.length >= 1) {locations.push(location_1);}
                if (location_2.length >= 1) {locations.push(location_2);}
                if (location_3.length >= 1) {locations.push(location_3);}
                if (location_4.length >= 1) {locations.push(location_4);}
                if (location_5.length >= 1) {locations.push(location_5);}

                switch(type){
                    case 'roadmap':
                    case 'black':
                    case 'grey':
                    case 'theme':
                        mapTypeId = google.maps.MapTypeId.ROADMAP
                        break;
                    case 'satellite':
                        mapTypeId = google.maps.MapTypeId.SATELLITE
                        break;
                }

                if (type === 'black') {
                    styleArray = [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}];
                } else if(type === 'grey') {
                    styleArray = [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#E0E0E0"},{"lightness": 17}]},{"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"},{"lightness": 20}]},{"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"},{"lightness": 17}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"},{"lightness": 29},{"weight": 0.2}]},{"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"},{"lightness": 18}]},{"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"},{"lightness": 16}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"},{"lightness": 21}]},{"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#BDBDBD"},{"lightness": 21}]},{"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},{"elementType": "labels.text.fill", "stylers": [{"saturation": 36},{"color": "#212121"},{"lightness": 40}]},{"elementType": "labels.icon", "stylers": [{"visibility": "off"}]},{"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},{"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#FAFAFA"},{"lightness": 20}]},{"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#FAFAFA"},{"lightness": 17},{"weight": 1.2}]}];
                }

                var options = {
                    center     : new google.maps.LatLng(dataX_1, dataY_1),
                    zoom       : zoom, 
                    mapTypeId  : mapTypeId,
                    styles     : styleArray,
                    disableDefaultUI: true
                };

                var map        = new google.maps.Map(doc.getElementById($this.attr('id')), options);

                var infowindow = new google.maps.InfoWindow();
                var marker, i = 0;
                var bounds = new google.maps.LatLngBounds();
                var interval = setInterval(function () {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                        map: map,
                        icon: $this.attr('data-marker'),
                        animation: google.maps.Animation.DROP
                    });

                    bounds.extend(marker.position);

                    if (locations[i][2]) {

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                              infowindow.setContent(locations[i][2]);
                              infowindow.open(map, marker);
                            }
                        })(marker, i));

                    }

                    i++;

                    if (i == locations.length) {
                        clearInterval(interval);
                    }

                    map.fitBounds(bounds);
                    map.setZoom(zoom);

                }, 200);

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
                return dataObj[key] === "et_map";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_map"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_map"]'),
                    element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]');

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_map"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_map"]').length) {

                        var ID  = uniqueID();
                        var CSS = '';

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_map"]');

                        var width  = edit_element.find('input[name="width"]').val(),
                            height = edit_element.find('input[name="height"]').val();

                        CSS += '#et-map-'+ID+' {';
                            if (width.length) {CSS += 'width:'+width+';';}
                            if (height.length) {CSS += 'height:'+height+';';}
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
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-map');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframe = document.getElementById('vc_inline-frame');
                            doc = iframe.contentDocument ? iframe.contentDocument : iframe.contentWindow.document;
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);