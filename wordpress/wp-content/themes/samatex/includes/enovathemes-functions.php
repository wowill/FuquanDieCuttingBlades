<?php

/*  Default fonts
/*-------------------*/
    
    function samatex_enovathemes_fonts_url() {
        $font_url = '';
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'samatex' ) ) {
            $font_url = add_query_arg( 'family', urlencode( 'Nunito Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
        }
        return $font_url;
    }

/*  Enovathemes title
/*-------------------*/

    add_filter( 'wp_title', 'samatex_enovathemes_filter_wp_title' );
    function samatex_enovathemes_filter_wp_title( $title ) {
        global $page, $paged;

        if ( is_feed() ){
            return $title;
        }
            
        $site_description = get_bloginfo( 'description' );

        $filtered_title = $title . get_bloginfo( 'name' );
        $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
        $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( esc_html__( 'Page %s', 'samatex'), max( $paged, $page ) ) : '';

        return $filtered_title;
    }

/*  Post format chat
/*-------------------*/

    function samatex_enovathemes_post_chat_format($content) {
        global $post;
        if (has_post_format('chat')) {
            $chatoutput = "<ul class=\"chat\">\n";
            $split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);

            foreach($split as $haystack) {
                if (strpos($haystack, ":")) {
                    $string = explode(":", trim($haystack), 2);
                    $who = strip_tags(trim($string[0]));
                    $what = strip_tags(trim($string[1]));
                    $row_class = empty($row_class)? " class=\"chat-highlight\"" : "";
                    $chatoutput = $chatoutput . "<li><span class='name'>$who:</span><p>$what</p></li>\n";
                } else {
                    $chatoutput = $chatoutput . $haystack . "\n";
                }
            }

            $content = $chatoutput . "</ul>\n";
            return $content;
        } else { 
            return $content;
        }
    }
    add_filter( "the_content", "samatex_enovathemes_post_chat_format", 9);

/*  Get the widget
/*-------------------*/

    if( !function_exists('samatex_enovathemes_get_the_widget') ){
  
        function samatex_enovathemes_get_the_widget( $widget, $instance = '', $args = '' ){
            ob_start();
            the_widget($widget, $instance, $args);
            return ob_get_clean();
        }
        
    }

/*  Post image overlay
/*-------------------*/

    function samatex_enovathemes_post_image_overlay(){

        $output = '';

        $output .='<a class="post-image-overlay" href="'.get_the_permalink().'" title="'.esc_attr__("Read more about", 'samatex').' '.esc_attr(the_title_attribute( 'echo=0' )).'">';
            $output .='<span class="overlay-read-more"></span>';
        $output .='</a>';

        return $output;
    }

/*  Pagination
/*-------------------*/

    function samatex_enovathemes_post_nav_num($post_type){

        if( is_singular() ){
            return;
        }

        global $wp_query;

        $big    = 999999;
        $output = "";

        switch ($post_type) {
            case 'project':
                $posts_per_page = (isset($GLOBALS['samatex_enovathemes']['project-per-page']) && !empty($GLOBALS['samatex_enovathemes']['project-per-page'])) ? $GLOBALS['samatex_enovathemes']['project-per-page'] : get_option( 'posts_per_page' );
                break;
            case 'product':
                $posts_per_page = (isset($GLOBALS['samatex_enovathemes']['product-per-page']) && !empty($GLOBALS['samatex_enovathemes']['product-per-page'])) ? $GLOBALS['samatex_enovathemes']['product-per-page'] : get_option( 'posts_per_page' );
                break;
            default:
                $posts_per_page = '';
                break;
        }

        $total  = (empty($posts_per_page)) ? $wp_query->max_num_pages : ceil($wp_query->found_posts/$posts_per_page);

        $args = array(
        'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
        'format'    => '?paged=%#%',
        'total'     => $total,
        'current'   => max(1, get_query_var('paged')),
        'show_all'  => false,
        'end_size'  => 2,
        'mid_size'  => 3,
        'prev_next' => true,
        'prev_text' => '',
        'next_text' => '',
        'type'      => 'list');

        if ($posts_per_page < $wp_query->found_posts) {
            $output .='<nav class="enovathemes-navigation">';
                $output .= paginate_links($args);
            $output .='</nav>';
        }
        
        echo samatex_enovathemes_output_html($output);
    }

/*  Simple pagination
/*-------------------*/
    
    function samatex_enovathemes_post_nav($post_type,$post_id){

            global $samatex_enovathemes;

            $single_nav_mob = "false";

            if ($post_type == "post") {
                $post_prev_text = esc_html__('Previous post', 'samatex');
                $post_next_text = esc_html__('Next post', 'samatex');
            } elseif ($post_type == "product") {
                $post_prev_text = esc_html__('Previous product', 'samatex');
                $post_next_text = esc_html__('Next product', 'samatex');
            }

            $prev_post = get_adjacent_post(false, '', true);
            $next_post = get_adjacent_post(false, '', false);
            
        ?>
        <nav class="post-single-navigation <?php echo esc_attr($post_type) ?> mob-hide-false et-clearfix">  
          <?php if(!empty($next_post)) {echo '<a rel="prev" href="' . get_permalink($next_post->ID) . '">'.$post_prev_text.'</a>'; } ?>
          <?php if(!empty($prev_post)) {echo '<a rel="next" href="' . get_permalink($prev_post->ID) . '">'.$post_next_text.'</a>'; } ?>
        </nav>
        <?php 
    }

/*  Excerpt
/*-------------------*/

    function samatex_enovathemes_excerpt($limit) {
        
        $excerpt = get_the_excerpt();

        if (empty($excerpt)) {
            $excerpt = strip_shortcodes(get_the_content());
        }

        $limit++;

        $output = "";

        if ( mb_strlen( $excerpt ) > $limit ) {
            $subex = mb_substr( $excerpt, 0, $limit - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );

            if ( $excut < 0 ) {
                $output .= mb_substr( $subex, 0, $excut );
            } else {
                $output .= $subex;
            }

            $output .= '[...]';

        } else {
            $output .= $excerpt;
        }

        return $output;
    }

/*  Loop post content
/*-------------------*/

    function samatex_enovathemes_post_media($blog_post_layout,$thumb_size){
        
        $post_format   = get_post_format(get_the_ID());
        $audio         = get_post_meta( get_the_ID(), 'enovathemes_addons_audio', true );
        $audio_embed   = get_post_meta( get_the_ID(), 'enovathemes_addons_audio_embed', true );
        $video         = get_post_meta( get_the_ID(), 'enovathemes_addons_video', true );
        $video_embed   = get_post_meta( get_the_ID(), 'enovathemes_addons_video_embed', true );
        $gallery       = get_post_meta( get_the_ID(), 'enovathemes_addons_gallery', true );

        $output = "";

        if ($blog_post_layout == "full"){
            if ($post_format == "0" || $post_format == 'chat'){
                if (has_post_thumbnail()){
                    $output .='<div class="post-image overlay-hover post-media">';
                        $output .= samatex_enovathemes_post_image_overlay();
                        $output .='<div class="image-container">';
                            $output .= '<div class="image-preloader"></div>';
                            $output .= get_the_post_thumbnail( get_the_ID(), $thumb_size);
                        $output .='</div>';
                    $output .='</div>';
                }
            } elseif($post_format == "gallery") {

                if (!empty($gallery)) {

                    $output .='<div class="post-gallery post-media overlay-hover">';
                        $output .='<ul class="slides">';
                            foreach ($gallery as $image => $url){
                                $output .='<li>';
                                    $output .='<div class="image-container">';
                                        $output .='<div class="image-preloader"></div>';
                                        $output .= wp_get_attachment_image($image, $thumb_size,false);
                                    $output .='</div>';
                                $output .='</li>';
                            }
                        $output .='</ul>';
                    $output .='</div>';

                } else {

                    if (has_post_thumbnail()){
                        $output .='<div class="post-image overlay-hover post-media">';
                            $output .= samatex_enovathemes_post_image_overlay();
                            $output .='<div class="image-container">';
                                $output .= '<div class="image-preloader"></div>';
                                $output .= get_the_post_thumbnail( get_the_ID(), $thumb_size);
                            $output .='</div>';
                        $output .='</div>';
                    }

                }
            } elseif($post_format == "video") {
                if (!empty($video) || !empty($video_embed)){
                    $output .='<div class="post-video media">';
                        if(!empty($video_embed) && empty($video)) {
                            $output .='<div class="plyr__video-embed plyr-element">';
                                $output .='<iframe allowfullscreen="allowfullscreen" frameBorder="0" src="'.$video_embed.'" class="iframevideo"></iframe>';
                            $output .='</div>';
                        } elseif(!empty($video)) {

                            $video_poster = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');

                            $output .='<video poster="'.$video_poster[0].'" class="plyr-element" id="video-'.get_the_ID().'" playsinline controls>';

                                if (!empty($video)) {
                                    $output .='<source src="'.$video.'" type="video/mp4">';
                                }
                                
                            $output .='</video>';

                        }
                    $output .='</div>';
                }
            } elseif($post_format == "audio"){
                $output .='<div class="post-audio media">';
                    if(!empty($audio_embed) && empty($audio)) {
                        $output .= '<iframe allowfullscreen="allowfullscreen" frameBorder="0" src="'.$audio_embed.'" class="iframeaudio"></iframe>';
                    } elseif (!empty($audio)) {
                        $output .='<audio class="plyr-element" id="audio-'.get_the_ID().'" controls>';
                            $output .='<source src="'.$audio.'" type="audio/mp3">';
                        $output .='</audio>';
                    }
                $output .='</div>';
            }
        } else {
            if (has_post_thumbnail()){
                $output .='<div class="post-image overlay-hover post-media">';
                    $output .= samatex_enovathemes_post_image_overlay();
                    $output .='<div class="image-container">';
                        $output .= '<div class="image-preloader"></div>';
                        $output .= get_the_post_thumbnail( get_the_ID(), $thumb_size);
                    $output .='</div>';
                $output .='</div>';
            }
        }

        return $output;
    }

    function samatex_enovathemes_post_body($blog_post_layout,$blog_post_excerpt){
        
        $post_format   = get_post_format(get_the_ID());
        $link_url      = get_post_meta( get_the_ID(), 'enovathemes_addons_link', true );
        $status_author = get_post_meta( get_the_ID(), 'enovathemes_addons_status', true );
        $quote_author  = get_post_meta( get_the_ID(), 'enovathemes_addons_quote', true );
        
        $output = "";

        $output .='<div class="post-body et-clearfix">';
            $output .='<div class="post-body-inner-wrap">';

                if ($post_format == "link" && $blog_post_layout == "full") {
                    $output .='<a class="post-link" href="'.esc_url($link_url).'" target="_blank" >';
                }

                $output .='<div class="post-body-inner">';

                    $output .='<div class="post-meta et-clearfix">';

                        if ($blog_post_layout == "grid" || $blog_post_layout == "carousel" || $blog_post_layout == "chess"){

                            if ('' != get_the_category_list()) {
                                $output .= '<div class="post-category">'.get_the_category_list(esc_html__( ', ', 'samatex' )).'</div>';
                            }
                            $output .= '<div class="post-date-inline">'.get_the_date().'</div>';
                            
                        } else {
                            $output .= esc_html__("Posted by ", 'samatex').'<div class="post-author vcard author">'.get_the_author().'</div>';
                            $output .= ' ';
                            $output .= esc_html__("on ", 'samatex').'<div class="post-date-inline">'.get_the_date().'</div>';
                        }
                        
                    $output .='</div>';

                    if ( '' != the_title_attribute( 'echo=0' ) ){
                        $output .='<h4 class="post-title entry-title">';
                            if ($post_format == "link" && $blog_post_layout == "full") {
                                $output .= the_title_attribute( 'echo=0' ).' <i class="fas fa-external-link-alt"></i>';
                            } else {
                                $output .= '<a href="'.get_the_permalink().'" title="'.esc_attr__("Read more about", 'samatex').' '.the_title_attribute( 'echo=0' ).'" rel="bookmark">';
                                    $output .= the_title_attribute( 'echo=0' );
                                $output .= '</a>';
                            }
                        $output .='</h4>';
                    }

                    if ($blog_post_layout == "full"){

                        if ($post_format == "aside" || $post_format == "quote" || $post_format == "status"){

                            if ( '' != get_the_content() ){
                                $output .='<div class="post-excerpt">';

                                    $output .= get_the_content(); 
                                    $defaults = array(
                                        'before'           => '<div id="page-links">',
                                        'after'            => '</div>',
                                        'link_before'      => '',
                                        'link_after'       => '',
                                        'next_or_number'   => 'next',
                                        'separator'        => ' ',
                                        'nextpagelink'     => esc_html__( 'Continue reading', 'samatex' ),
                                        'previouspagelink' => esc_html__( 'Go back' , 'samatex'),
                                        'pagelink'         => '%',
                                        'echo'             => 0
                                    );
                                    $output .= wp_link_pages($defaults);

                                $output .='</div>';
                            }

                            if (!empty($quote_author)){
                                $output .= '<div class="post-quote-author">- '.esc_attr($quote_author).'</div>';
                            }

                            if (!empty($status_author)){
                                $output .= '<div class="post-status-author">- '.esc_attr($status_author).'</div>';
                            }

                        } else {
                            if ( '' != get_the_excerpt() && $post_format != "link" && $blog_post_excerpt > 0){
                                $output .='<div class="post-excerpt">'.samatex_enovathemes_excerpt($blog_post_excerpt).'</div>';
                            }
                        }

                    } else {
                        
                        if ( '' != get_the_excerpt() && $blog_post_excerpt > 0){
                            $output .='<div class="post-excerpt">'.samatex_enovathemes_excerpt($blog_post_excerpt).'</div>';
                        }
                    }

                    if (($blog_post_layout == "full" && $post_format != "link") || $blog_post_layout != "full") {
                        $output .='<a href="'.get_the_permalink().'" class="post-read-more" title="'.esc_attr__("Read more about", 'samatex').' '.the_title_attribute( 'echo=0' ).'">'.esc_html__("Read more", 'samatex').'</a>';
                    }

                $output .='</div>';

                if ($post_format == "link" && $blog_post_layout == "full") {
                    $output .='</a>';
                }

            $output .='</div>';
        $output .='</div>';

        return $output;
        
    }

    function samatex_enovathemes_post($blog_post_layout,$blog_post_excerpt,$thumb_size,$image_full,$image_justify,$query){

        $output = "";
        $element_css = "";

        if ($image_full == "true" && $image_justify == "false") {
            $post_id      = get_the_ID();
            $post_image   = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full', false);
            $element_css  = 'width: '.(($post_image[1]/1200)*100).'%;';
        }

        if (!empty($element_css)) {
            $output .='<article class="'.join( ' ', get_post_class('et-item')).'" id="post-'.get_the_ID().'" style="'.$element_css.'">';
        } else {
            $output .='<article class="'.join( ' ', get_post_class('et-item')).'" id="post-'.get_the_ID().'">';
        }
        
            $output .='<div class="post-inner et-item-inner et-clearfix">';

                global $wp_query;

                if ($blog_post_layout == "chess") {

                    $current_post = $wp_query->current_post;

                    if ($query) {
                        $current_post = $query->current_post;
                    }

                    if ($current_post % 3 == 1){

                        // Post media
                        $output .= samatex_enovathemes_post_media($blog_post_layout,$thumb_size);
                        
                        // Post body
                        $output .= samatex_enovathemes_post_body($blog_post_layout,$blog_post_excerpt);

                    } else {

                        // Post body
                        $output .= samatex_enovathemes_post_body($blog_post_layout,$blog_post_excerpt);

                        // Post media
                        $output .= samatex_enovathemes_post_media($blog_post_layout,$thumb_size);
                        
                    }
                } else {

                    // Post media
                    $output .= samatex_enovathemes_post_media($blog_post_layout,$thumb_size);
                    
                    // Post body
                    $output .= samatex_enovathemes_post_body($blog_post_layout,$blog_post_excerpt); 

                }

            $output .='</div>';
        $output .='</article>';

        return $output;

    }

/*  Not found
/*-------------------*/

    function samatex_enovathemes_not_found($post_type){

        $output = '';

        $output .= '<p class="enovathemes-not-found">';

        switch ($post_type) {

            case 'project':
                $output .= esc_html__('No project found.', 'samatex');
                break;

            case 'products':
                $output .= esc_html__('No products found.', 'samatex');
                break;

            case 'general':
                $output .= esc_html__('No search results found. Try a different search', 'samatex');
                break;
            
            default:
                $output .= esc_html__('No posts found.', 'samatex');
                break;
        }

        $output .= '</p>';

        return $output;
    }

/*  Hex to rgba
/*-------------------*/

    function samatex_enovathemes_hex_to_rgba($hex, $o) {
        $hex = (string) $hex;
        $hex = str_replace("#", "", $hex);
        $hex = array_map('hexdec', str_split($hex, 2));
        return 'rgba('.implode(",", $hex).','.$o.')';
    }

/*  Hex to rgb shade
/*-------------------*/

    function samatex_enovathemes_hex_to_rgb_shade($hex, $o) {
        $hex = (string) $hex;
        $hex = str_replace("#", "", $hex);
        $hex = array_map('hexdec', str_split($hex, 2));
        $hex[0] -= $o;
        $hex[1] -= $o;
        $hex[2] -= $o;
        return 'rgb('.implode(",", $hex).')';
    }

/*  Brightness detection
/*-------------------*/

    function samatex_enovathemes_brightness($hex) {
        $hex = (string) $hex;
        $hex = str_replace("#", "", $hex);
        
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $output = 'dark';

        if($r + $g + $b > 382){
            $output = 'light';
        }else{
            $output = 'dark';
        }

        return $output;
    }

/*  Minify CSS
/*-------------------*/

    function samatex_enovathemes_minify_css($css) {
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        $css = str_replace(': ', ':', $css);
        $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
        return $css;
    }

/*  Output html
/*-------------------*/

    function samatex_enovathemes_output_html($html) {
        $html = preg_replace('~>\s+<~', '><', $html);
        return $html;
    }

/*  Get all menus
/*-------------------*/

    function samatex_enovathemes_get_all_menus(){
        return get_terms( 'nav_menu', array( 'hide_empty' => false ) ); 
    }

/*  Default header
/*-------------------*/

    function samatex_enovathemes_default_header($header_type){

        if ($header_type == "mobile") { ?>
            <header id="et-mobile-default" class="header et-mobile et-clearfix transparent-false sticky-false shadow-true mobile-true tablet-portrait-true tablet-landscape-true desktop-false">
                <div class="container et-clearfix">
                    <?php

                        $output = "";

                        $class = array();
                        $class[] = 'hbe';
                        $class[] = 'header-logo';
                        $class[] = 'hbe-left';

                        $output .= '<div id="header-logo-default-mobile" class="'.implode(" ", $class).'">';
                            $output .= '<a href="'.esc_url(home_url('/')).'" title="'.get_bloginfo('name').'">';
                                $output .= '<img class="logo" src="'.SAMATEX_ENOVATHEMES_IMAGES.'/logo-retina.png" alt="'.get_bloginfo('name').'">';
                            $output .= '</a>';
                        $output .= '</div>';

                        echo samatex_enovathemes_output_html($output);

                    ?>
                    <div class="mobile-container-toggle hbe hbe-icon-element hide-default-false hide-sticky-false hbe-right size-medium">
                        <div class="mobile-toggle hbe-toggle ien-emenu-1" data-close-icon="ien-eclose-3"></div>
                    </div>
                    <div class="mobile-container-overlay"></div>
                    <div class="mobile-container effect-left">
                        <div class="mobile-container-close hbe hbe-icon-element hbe-right size-small">
                            <div class="mobile-close hbe-toggle ien-eclose-3"></div>
                        </div>
                        <?php

                            $output = "";

                            $class = array();

                            $class[] = 'mobile-menu-container';
                            $class[] = 'hbe';
                            $class[] = 'text-align-left';

                            $menu_arg = array( 
                                'theme_location'  => 'header-menu',
                                'menu_class'      => 'mobile-menu hbe-inner et-clearfix', 
                                'menu_id'         => 'mobile-menu-default',
                                'container'       => 'div', 
                                'container_class' => implode(" ", $class), 
                                'container_id'    => 'mobile-menu-container-default', 
                                'echo'            => false,
                                'link_before'     => '<span class="txt">',
                                'link_after'      => '</span><span class="arrow-down"></span>',
                                'depth'           => 4,
                            );

                            $output .= wp_nav_menu($menu_arg);

                            echo samatex_enovathemes_output_html($output);

                        ?>
                    </div>
                </div>
            </header>
        <?php } elseif($header_type == "desktop"){ ?>
            <header id="et-desktop-default" class="header et-desktop et-clearfix transparent-false sticky-false shadow-true mobile-false tablet-portrait-false tablet-landscape-false desktop-true">
                <div class="vc_row wpb_row vc_row-fluid vc_row-has-fill vc_row-o-equal-height vc_row-flex vc-row-default">
                    <div class="container et-clearfix">
                        
                        <?php

                            $output = "";

                            $class = array();
                            $class[] = 'hbe';
                            $class[] = 'header-logo';
                            $class[] = 'hbe-left';

                            $output .= '<div id="header-logo-default" class="'.implode(" ", $class).'">';
                                $output .= '<a href="'.esc_url(home_url('/')).'" title="'.get_bloginfo('name').'">';
                                    $output .= '<img class="logo" src="'.SAMATEX_ENOVATHEMES_IMAGES.'/logo-retina.png" alt="'.get_bloginfo('name').'">';
                                $output .= '</a>';
                            $output .= '</div>';

                            echo samatex_enovathemes_output_html($output);

                        ?>
                        
                        <?php

                            $output = "";

                            $class = array();

                            

                            $class[] = 'header-menu-container';
                            $class[] = 'hbe';
                            $class[] = 'hbe-right';
                            $class[] = 'shadow-true';
                            $class[] = 'one-page-false';
                            $class[] = 'one-page-offset-0';
                            $class[] = 'hide-default-false';
                            $class[] = 'hide-sticky-false';
                            $class[] = 'menu-hover-underline';
                            $class[] = 'submenu-appear-fall';
                            $class[] = 'submenu-hover-line';
                            $class[] = 'submenu-shadow-true';
                            $class[] = 'tl-submenu-ind-false';
                            $class[] = 'sl-submenu-ind-true';
                            $class[] = 'separator-false';

                            $menu_arg = array( 
                                'theme_location'  => 'header-menu', 
                                'menu_class'      => 'header-menu hbe-inner et-clearfix', 
                                'menu_id'         => 'header-menu-default',
                                'container'       => 'nav', 
                                'container_class' => implode(" ", $class), 
                                'container_id'    => 'header-menu-container-default', 
                                'echo'            => false,
                                'link_before'     => '<span class="txt">',
                                'link_after'      => '</span><span class="arrow-down"></span>',
                                'depth'           => 4,
                                'walker'          => new et_scm_walker
                            );

                            if (has_nav_menu('header-menu')) {
                                $output .= wp_nav_menu($menu_arg);
                                echo samatex_enovathemes_output_html($output);
                            }

                        ?>
                                
                    </div>
                </div>
            </header>
        <?php }
    }

/*  Default title section
/*-------------------*/

    function samatex_enovathemes_default_title_section($etp_title, $etp_subtitle, $etp_breadcrumbs){ ?>

        <section id="title-section-default" class="title-section et-clearfix">
            <div class="vc_row wpb_row vc_row-fluid vc_custom_1537274704747 vc_row-has-fill vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                <div class="container et-clearfix">
                    <div class="title-section-title-container tse text-align-left align-left tablet-align-left mobile-align-left">
                        <h1 class="title-section-title" id="title-section-title-default">
                            <?php echo esc_html($etp_title); ?>
                        </h1>
                        <?php if (!empty($etp_subtitle)): ?>
                            <div class="et-gap"></div>
                            <p class="title-section-subtitle" id="title-section-subtitle-default">
                                <?php echo esc_html($etp_subtitle); ?>
                            </p> 
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>

    <?php }

/*  Default footer
/*-------------------*/

    function samatex_enovathemes_default_footer(){ ?>

        <footer id="et-footer-default" class="footer et-footer et-clearfix sticky-false">
            <?php echo '&copy; '.date("Y").' '.esc_html__( 'Copyright', 'samatex' ).' '.esc_html(get_bloginfo('name')); ?>        
        </footer>

    <?php }

?>