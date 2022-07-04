(function($){

    "use strict";

    function uniqueID() {return Math.floor((Math.random() * 1000000) + 1);}

    String.prototype.replaceAll = function(str1, str2, ignore) {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }

    function iframeSCRIPT(element,doc){
        $(element).each(function(){

            var $this        = $(this),
                loop         = $this.find('.loop-project');

            if($this.hasClass('grid')){
                imagesLoaded( $this, function() {
                    $this.find('.et-item-set').masonryIfame(doc,'.et-item');
                });

                var filter = $this.find('.enovathemes-filter');

                if (typeof(filter) != 'undefined' && filter != null && filter.length) {

                    var filterRequestRunning = false;
                    var postsPerPage = filter.data('posts-per-page');
                    var order        = filter.data('order');
                    var orderby      = filter.data('orderby');
                    var loadingText  = admin_opt.projectLoadingText;
                    var layout       = 'project-with-details';
                    var container    = $this.hasClass('project-container-boxed') ? 'boxed' : 'wide';
                    var column       = 'medium';
                    var imageEffect  = loop.hasClass('transform') ? 'transform' : 'overlay';
                    var imageFull    = loop.hasClass('image-full-true') ? true : false;

                    order = order.toLowerCase();
                    orderby = orderby.toLowerCase();

                    if ($this.hasClass('small')) {
                        column = 'small';
                    }

                    if ($this.hasClass('large')) {
                        column = 'large';
                    }

                    if ($this.hasClass('project-with-overlay')) {
                        layout = 'project-with-overlay';
                    }

                    if ($this.hasClass('project-with-caption')) {
                        layout = 'project-with-caption';
                    }

                    filter.find('.filter').on('click',function(event){

                        event.preventDefault();

                        if (filterRequestRunning) {
                            return;
                        }

                        filterRequestRunning = true;

                        loop.prepend('<div class="ajax-scroll-overlay"><div class="ajax-scroll-overlay-content"><div class="ajax-scroll-text">'+loadingText+'</div><div class="ajax-scroll"><span></span><span></span></div></div></div>');

                        loop.find('.ajax-scroll-overlay').fadeIn(300);
                        loop.find('.project').remove();

                        var currentFilter   = $(this);
                        var currentFilterID = currentFilter.data('filter-id');
                        var terms_exclude   = currentFilter.data('exclude');
                        var json_url        = admin_opt.projectJsonUrl;

                        json_url += '?per_page='+postsPerPage;
                        json_url += '&order='+order;
                        json_url += '&orderby='+orderby;

                        if (typeof(currentFilterID) != 'undefined' && currentFilterID != null){
                            json_url += '&project-category='+currentFilterID;
                        } else {
                            if (typeof(terms_exclude) != 'undefined' && terms_exclude != null){
                                json_url += '&project-category_exclude='+terms_exclude;
                            }
                        }

                        currentFilter.addClass('active').siblings().removeClass('active');

                        $.ajax({
                            dataType: 'json',
                            url:json_url
                        })

                        .done(function(response){

                            var $output = '';

                            $.each(response,function(index,object){

                                $output += '<article id="project-'+object.id+'" class="et-item post post-'+object.id+' project type-project hentry">';
                                    $output += '<div class="post-inner et-item-inner et-clearfix">';
                                        $output += '<div class="overlay-hover">';
                                            $output += '<div class="post-image post-media">';
                                                if (imageEffect == "overlay") {
                                                    if (layout == 'project-with-details' || layout == 'project-with-overlay') {
                                                        $output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">';
                                                            $output += '<div class="post-image-overlay">';
                                                                $output += '<div class="post-image-overlay-content">';
                                                                    $output += '<span class="overlay-read-more"></span>';
                                                                    if (layout == 'project-with-overlay') {
                                                                        $output += '<h4 class="post-title">'+object.title.rendered+'</h4>';
                                                                    }
                                                                $output += '</div>';
                                                            $output += '</div>';
                                                        $output += '</a>';
                                                    }
                                                }
                                                $output += '<div class="image-container">';
                                                    $output += '<a href="'+object.link+'">';

                                                        var imageSrc = '';
                                                        var imageObj = [{}];
                                                        var projectImageArray = object.project_image;

                                                        for (var i = 0; i < projectImageArray.length; i++) {
                                                            var key      = (projectImageArray[i][0]);
                                                            var value    = (projectImageArray[i][1]);
                                                            imageObj[key] = value;
                                                        }

                                                        switch (column) {
                                                            case 'small':
                                                                imageSrc = (container == "wide") ? imageObj['samatex_480X360'] : imageObj['samatex_400X320'];
                                                                break;
                                                            case 'medium':
                                                                imageSrc = (container == "wide") ? imageObj['samatex_640X400'] : imageObj['samatex_400X320'];
                                                                break;
                                                            case 'large':
                                                                imageSrc = (container == "wide") ? imageObj['samatex_960X600'] : imageObj['samatex_600X370'];
                                                                break;
                                                        }

                                                        if (imageFull) {
                                                            imageSrc = imageObj['full']
                                                        }
                                                        $output += '<div class="image-preloader"></div>';
                                                        $output += '<img src="'+imageSrc+'" class="wp-post-image" data-responsive-images="false">';
                                                    $output += '</a>';
                                                $output += '</div>';
                                            $output += '</div>';
                                            if (layout != 'project-with-overlay') {
                                                $output += '<div class="post-body et-clearfix">';
                                                    $output += '<div class="post-body-inner-wrap">';
                                                        $output += '<div class="post-body-inner">';
                                                            $output += '<h4 class="post-title entry-title">';
                                                                $output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">'+object.title.rendered+'</a>';
                                                            $output += '</h4>';
                                                            if (layout == 'project-with-details') {
                                                                $output += '<div class="project-category">';

                                                                    var projectCategoryArray       = object.project_category_array;
                                                                    var projectCategoryArrayOutput = [];

                                                                    for (var i = 0; i < projectCategoryArray.length; i++) {
                                                                        projectCategoryArrayOutput.push('<a href="'+projectCategoryArray[i][1]+'" rel="tag">'+projectCategoryArray[i][0]+'</a>');
                                                                    }

                                                                    $output += projectCategoryArrayOutput.join(", ");

                                                                $output += '</div>';
                                                            }
                                                        $output += '</div>';
                                                    $output += '</div>';
                                                $output += '</div>';
                                            }
                                        $output += '</div>';
                                    $output += '</div>';
                                $output += '</article>';

                            });

                            if ($output.length) {

                                $this.find('.loop-project').append($output);

                                imagesLoaded($this.find('.loop-project'), function() {
                                    $this.find('.loop-project').masonryIfame(doc,'.et-item');
                                });

                                $this.find('.et-item').each(function(){

                                    var $item =  $(this);

                                    var randomDelay = Math.round(( Math.random() * ( 400 - 100 ) + 100 ));
                                    var preloader   = $item.find('.image-preloader' );

                                    if (typeof(preloader) != 'undefined' && preloader != null){
                                        preloader.css('animation-delay',( 100 + randomDelay )+'ms');
                                    }

                                    $item.find('.et-item-inner')
                                    .css('animation-delay',randomDelay+'ms')
                                    .addClass('animate');

                                });

                            }

                            $this.find('.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

                            $this.find('.ajax-scroll-overlay').fadeOut(100,function(){
                                $(this).remove();
                                $output = '';
                                filterRequestRunning = false;
                            });

                        })

                        .fail(function(response){

                            $this.find('.ajax-scroll-overlay').fadeOut(100,function(){
                                $this.find('.loop-project').append('<span class="error fas fa-exclamation-triangle"></span>');
                            });

                        });

                    });

                }

            }

            var preloaderActive = $(doc).find('body').hasClass('preloader-active') ? true : false;

            if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {

                $this.find('.et-item').each(function(){

                    var $item =  $(this);

                    var randomDelay = Math.round(( Math.random() * ( 400 - 100 ) + 100 ));
                    var preloader   = $item.find('.image-preloader' );

                    if (typeof(preloader) != 'undefined' && preloader != null){
                        preloader.css('animation-delay',( 100 + randomDelay )+'ms');
                    }

                    $item.find('.et-item-inner')
                    .css('animation-delay',randomDelay+'ms')
                    .addClass('animate');

                });
            }

            $this.find('.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

            if ($this.hasClass('carousel')) {

                var carousel        = $this.find('.owl-carousel');
                var $thisColumns    =  carousel.data('columns');
                var columnsTabPort  = ($thisColumns < 2) ? 1 : 2;
                var columnsTabLand  = ($thisColumns <= 4) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 3 : 4;
                var columnsMob      = 1;
                var dots           = true;
                var autoplay       = carousel.data('autoplay');
                var center         = false;
                var loop           = false;

                imagesLoaded(carousel,function(){
                    var $owl = carousel.owlCarousel({
                        items:$thisColumns,
                        nav:true,
                        navText:[],
                        dots:dots,
                        autoplay:autoplay,
                        animateOut:false,
                        animateIn:false,
                        autoHeight: true,
                        responsive:{
                            300 : {items:1},
                            460 : {items:columnsMob},
                            750 : {items:columnsTabPort},
                            1000 : {items:columnsTabLand},
                            1280 : {items:$thisColumns}
                        },
                        responsiveRefreshRate:200,
                        responsiveBaseElement:doc,
                        center:center,
                        loop:loop
                    });

                    setTimeout(function(){
                        $owl.trigger('refresh.owl.carousel');
                    },50);
                });

            }

            setTimeout(function(){
                $this.find('.lazy-load').removeClass('lazy');
            },300);

        
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
                return dataObj[key] === "et_projects";
            });

        /* Load element
        /*-------------*/

            if((dataObj['action'] == "vc_load_shortcode" && elementExists)){
                var iframe = $('#vc_inline-frame');
                if (typeof(iframe) != 'undefined' && iframe != null){
                    iframe.ready(function() {
                        var doc = iframe.contents();
                        iframe = document.getElementById('vc_inline-frame');
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"]');
                        element = element.parent().find('.et-shortcode-projects')
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);