<?php 
/*
    Plugin Name: Enovathemes add-ons
    Plugin URI: http://www.enovathemes.com
    Text Domain: enovathemes-addons
    Domain Path: /languages/
    Description: Plugin comes with Enovathemes to extend theme functionality (shortcodes, portfolio, enovathemes slider)
    Author: Enovathemes
    Version: 3.1
    Author URI: http://enovathemes.com
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function enovathemes_addons_load_plugin_textdomain() {
    load_plugin_textdomain( 'enovathemes-addons', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'enovathemes_addons_load_plugin_textdomain' );

define( 'ENOVATHEMES_ADDONS', plugin_dir_path( __FILE__ ));
define( 'ENOVATHEMES_ADDONS_IMG', plugins_url( 'images/', __FILE__ ));

if ( !class_exists( 'ReduxFramework' ) && file_exists( ENOVATHEMES_ADDONS . '/optionpanel/framework.php' ) ) {
    require_once('optionpanel/framework.php' );
}
if (!isset( $redux_demo ) && file_exists( ENOVATHEMES_ADDONS . '/optionpanel/config.php' ) ) {
    require_once('optionpanel/config.php' );
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (is_plugin_active( 'js_composer/js_composer.php' )) {
    require_once('includes/megamenu.php' );
    require_once('includes/footer.php' );
    require_once('includes/header.php' );
    require_once('includes/title.php' );
    require_once('shortcodes/shortcodes.php' );
    require_once('includes/admin-footer-scripts.php' );
}

require_once('includes/cmb2.php' );
require_once('project/project.php' );
require_once('widgets/widget-login.php' );
require_once('widgets/widget-posts.php' );
require_once('widgets/widget-mailchimp.php' );
require_once('widgets/widget-flickr.php' );
require_once('widgets/widget-facebook.php' );
require_once('widgets/widget-contact-form.php' );

/*  Scripts
/*-------------------*/

    function enovathemes_addons_script(){
        if(!is_admin()){

            global $wp_query;

            wp_register_script( 'widget-contact-form', plugins_url('/js/widget-contact-form.js', __FILE__ ), array('jquery'), '', true);
            wp_register_script( 'widget-mailchimp', plugins_url('/js/widget-mailchimp.js', __FILE__ ), array('jquery'), '', true);
            
            if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

                wp_enqueue_script( 'wpb_composer_front_js' );
                wp_enqueue_style( 'js_composer_front' );
                wp_enqueue_style( 'js_composer_custom_css' );

            }

            /* < Dynamic google fonts
            ------------------------------------*/

                $global_dynamic_font = array();

                $title_section_id  = "none";
                $blog_title_id     = (isset($GLOBALS['samatex_enovathemes']['blog-title']) && !empty($GLOBALS['samatex_enovathemes']['blog-title'])) ? $GLOBALS['samatex_enovathemes']['blog-title'] : "none";
                $project_title_id  = (isset($GLOBALS['samatex_enovathemes']['project-title']) && !empty($GLOBALS['samatex_enovathemes']['project-title'])) ? $GLOBALS['samatex_enovathemes']['project-title'] : "none";
                $product_title_id  = (isset($GLOBALS['samatex_enovathemes']['product-title']) && !empty($GLOBALS['samatex_enovathemes']['product-title'])) ? $GLOBALS['samatex_enovathemes']['product-title'] : "none";

                $header_desktop_id = (isset($GLOBALS['samatex_enovathemes']['header-desktop-id']) && !empty($GLOBALS['samatex_enovathemes']['header-desktop-id'])) ? $GLOBALS['samatex_enovathemes']['header-desktop-id'] : "default";
                $header_mobile_id  = (isset($GLOBALS['samatex_enovathemes']['header-mobile-id']) && !empty($GLOBALS['samatex_enovathemes']['header-mobile-id'])) ? $GLOBALS['samatex_enovathemes']['header-mobile-id'] : "default";
                $footer_id         = (isset($GLOBALS['samatex_enovathemes']['footer-id']) && !empty($GLOBALS['samatex_enovathemes']['footer-id'])) ? $GLOBALS['samatex_enovathemes']['footer-id'] : "default";

                /* Page
                ---------------*/

                    if (is_page()) {

                        $page_header_desktop_id = get_post_meta( get_the_ID(), 'enovathemes_addons_desktop_header', true );
                        $page_header_mobile_id  = get_post_meta( get_the_ID(), 'enovathemes_addons_mobile_header', true );
                        $page_footer_id         = get_post_meta( get_the_ID(), 'enovathemes_addons_footer', true );
                        $title_section_id       = get_post_meta( get_the_ID(), 'enovathemes_addons_title_section', true );

                        if ($page_header_desktop_id != "inherit") {
                            $header_desktop_id = $page_header_desktop_id;
                        }

                        if ($page_header_mobile_id != "inherit") {
                            $header_mobile_id = $page_header_mobile_id;
                        }

                        if ($page_footer_id != "inherit") {
                            $footer_id = $page_footer_id;
                        }

                        $element_font = get_post_meta(get_the_ID(), 'element_font', true);
                        if (!empty($element_font)) {
                            $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                        }

                    }

                /* Blog
                ---------------*/

                    if (is_home() || is_category() || is_tag() || is_day() || is_month() || is_year() || is_author() || is_search() || is_singular('post')) {
                        $title_section_id = $blog_title_id;
                    }

                /*  CPT
                ---------------*/
                    
                    $post_info = get_post(get_the_ID());

                    if (!is_wp_error($post_info) && is_object($post_info)) {

                        $post_type   = $post_info->post_type;

                        if ($post_type != 'post' && $post_type != 'page') {
                            switch ($post_type) {
                                case 'project':
                                    $title_section_id = $project_title_id;
                                    break;
                                case 'product':
                                    $title_section_id = $product_title_id;
                                    break;
                                default :
                                    $title_section_id = $blog_title_id;
                                    break;
                            }
                        }

                    }

                if ($header_desktop_id == $header_mobile_id && $header_desktop_id != "default") {
                    $header_mobile_id = "none";
                }

                /*  Singular header
                ---------------*/

                    if (is_singular('header')) {
                        $header_mobile_id = get_the_ID();
                        $header_desktop_id = get_the_ID();
                    }

                /*  Singular footer
                ---------------*/

                    if (is_singular('footer')) {
                        $footer_id = get_the_ID();
                    }

                /*  Singular title section
                ---------------*/

                    if (is_singular('title_section')) {
                        $title_section_id = get_the_ID();
                    }

                /*  Singular post
                ---------------*/

                    if (is_singular('post')) {
                        $element_font = get_post_meta(get_the_ID(), 'element_font', true);
                        if (!empty($element_font)) {
                            $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                        }
                    }

                /*  Singular project
                ---------------*/

                    if (is_singular('project')) {
                        $element_font = get_post_meta(get_the_ID(), 'element_font', true);
                        if (!empty($element_font)) {
                            $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                        }
                    }

                /*  Singular product
                ---------------*/

                    if (is_singular('product')) {
                        $element_font = get_post_meta(get_the_ID(), 'element_font', true);
                        if (!empty($element_font)) {
                            $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                        }
                    }

                /*  Mobile header
                ---------------*/

                    if ($header_mobile_id != "none" && $header_mobile_id != "default") {
                        $element_font = get_post_meta($header_mobile_id, 'element_font', true);
                        if (!empty($element_font)) {
                            $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                        }
                    }

                /*  Desktop header
                ---------------*/

                    if ($header_desktop_id != "none" && $header_desktop_id != "default") {
                        $element_font = get_post_meta($header_desktop_id, 'element_font', true);
                        if (!empty($element_font)) {
                            $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                        }
                    }

                /* Megamenu
                --------------*/

                    $query_options = array(
                        'post_type'           => 'megamenu',
                        'post_status'         => 'publish',
                        'ignore_sticky_posts' => 0,
                        'orderby'             => 'title',
                        'order'               => 'ASK',
                        'posts_per_page'      => -1, 
                    );

                    $megamenu = new WP_Query($query_options);
                    if ($megamenu->have_posts()){
                        while($megamenu->have_posts()) { $megamenu->the_post();
                            $megamenu_id = get_the_ID();
                            $element_font = get_post_meta($megamenu_id, 'element_font', true);
                            if (!empty($element_font)) {
                                $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                            }
                        }
                        wp_reset_postdata();
                    }

                /*  Title section
                ---------------*/

                    if ($title_section_id != "none" && $title_section_id != "default") {
                        $element_font = get_post_meta($title_section_id, 'element_font', true);
                        if (!empty($element_font)) {
                            $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                        }
                    }

                /*  Footer
                ---------------*/

                    if ($footer_id != "none" && $footer_id != "default") {
                        $element_font = get_post_meta($footer_id , 'element_font', true);
                        if (!empty($element_font)) {
                            $global_dynamic_font = array_merge($global_dynamic_font,enovathemes_addons_create_dynamic_scripts($element_font));
                        }
                    }

                /*  Dynamic font enqueue
                ---------------*/

                    if (!empty($global_dynamic_font)) {

                        $global_dynamic_font = array_unique($global_dynamic_font,SORT_REGULAR);

                        $global_dynamic_font_result = array();
                        foreach ($global_dynamic_font as $dynamic_font) {

                            if (!isset($global_dynamic_font_result[$dynamic_font['font-name']])){
                                $global_dynamic_font_result[$dynamic_font['font-name']] = $dynamic_font;
                            }else{

                                if (!strpos($global_dynamic_font_result[$dynamic_font['font-name']]['font-style'], $dynamic_font['font-style'])) {
                                    $global_dynamic_font_result[$dynamic_font['font-name']]['font-style'] = $global_dynamic_font_result[$dynamic_font['font-name']]['font-style'].','.$dynamic_font['font-style'];
                                }

                                if (!strpos($global_dynamic_font_result[$dynamic_font['font-name']]['subset'], $dynamic_font['subset'])) {
                                    $global_dynamic_font_result[$dynamic_font['font-name']]['subset'] = $global_dynamic_font_result[$dynamic_font['font-name']]['subset'].','.$dynamic_font['subset'];
                                    $global_dynamic_font_result[$dynamic_font['font-name']]['subset'] = implode(',', array_unique(explode(',', $global_dynamic_font_result[$dynamic_font['font-name']]['subset'])));
                                }
                                
                            }
                        }

                        $global_dynamic_font_string   = '';
                        $global_dynamic_subset_string = '';

                        foreach ($global_dynamic_font_result as $global_dynamic_font_output) {
                            $global_dynamic_font_string .= str_replace(' ', '+', $global_dynamic_font_output['font-name']).':'.$global_dynamic_font_output['font-style'].'|';
                            $global_dynamic_subset_string .= $global_dynamic_font_output['subset'].',';
                        }

                        wp_enqueue_style( 'dynamic-google-fonts', 'https://fonts.googleapis.com/css?family='.rtrim($global_dynamic_font_string,'|').'&amp;subset='.rtrim($global_dynamic_subset_string,','),array(), false );

                    }
                    
            /* Dynamic google fonts >
            ------------------------------------*/

        }
    }
    add_action( 'wp_enqueue_scripts', 'enovathemes_addons_script' );

/*  Header html
/*-------------------*/

    function enovathemes_addons_header_html($header_id, $header_type){
    
        $query = new WP_Query(array(
            'post_type' => 'header',
            'p'         => $header_id,
        ));
        if ($query->have_posts()) {
            while ( $query->have_posts() ) { $query->the_post();

                $transparent   = get_post_meta($header_id, 'enovathemes_addons_transparent', true);
                $sticky        = get_post_meta($header_id, 'enovathemes_addons_sticky', true);
                $shadow        = get_post_meta($header_id, 'enovathemes_addons_shadow', true);
                $shadow_sticky = get_post_meta($header_id, 'enovathemes_addons_shadow_sticky', true);
                $type          = get_post_meta($header_id, 'enovathemes_addons_header_type', true);

                $mobile           = get_post_meta($header_id, 'enovathemes_addons_mobile', true);
                $tablet_portrait  = get_post_meta($header_id, 'enovathemes_addons_tablet_portrait', true);
                $tablet_landscape = get_post_meta($header_id, 'enovathemes_addons_tablet_landscape', true);
                $desktop          = get_post_meta($header_id, 'enovathemes_addons_desktop', true);

                $transparent      = (empty($transparent)) ? "false" : "true";
                $sticky           = (empty($sticky)) ? "false" : "true";
                $shadow           = (empty($shadow)) ? "false" : "true";
                $shadow_sticky    = (empty($shadow_sticky)) ? "false" : "true";
                $mobile           = (empty($mobile)) ? "false" : "true";
                $tablet_portrait  = (empty($tablet_portrait)) ? "false" : "true";
                $tablet_landscape = (empty($tablet_landscape)) ? "false" : "true";
                $desktop          = (empty($desktop)) ? "false" : "true";

                $class = array(); ?>

                <?php if ($header_type == "mobile"): ?>

                    <?php

                        $class[] = 'header et-mobile et-clearfix';
                        $class[] = 'transparent-'.$transparent;
                        $class[] = 'sticky-'.$sticky;
                        $class[] = 'shadow-'.$shadow;
                        $class[] = 'shadow-sticky-'.$shadow_sticky;
                        $class[] = 'mobile-'.$mobile;
                        $class[] = 'tablet-portrait-'.$tablet_portrait;
                        $class[] = 'tablet-landscape-'.$tablet_landscape;
                        $class[] = 'desktop-'.$desktop;

                    ?>
                    <?php if (get_the_content($header_id)): ?>
                        <header id="et-mobile-<?php echo esc_attr($header_id); ?>" class="<?php echo esc_attr(implode(" ", $class)); ?>">
                            <?php
                                $content = do_shortcode(get_the_content($header_id));
                                $content = str_replace( ']]>', ']]&gt;', $content );
                                echo $content;
                            ?>
                        </header>
                    <?php endif ?>
                <?php elseif($header_type == "desktop"): ?>

                    <?php

                        $class[] = 'header';
                        $class[] = 'et-desktop';
                        $class[] = 'et-clearfix';

                        if ($type == "sidebar") {
                            $class[] = 'side-true';
                        }
                        
                        $class[] = 'transparent-'.$transparent;
                        $class[] = 'sticky-'.$sticky;
                        $class[] = 'shadow-'.$shadow;
                        $class[] = 'shadow-sticky-'.$shadow_sticky;
                        $class[] = 'mobile-'.$mobile;
                        $class[] = 'tablet-portrait-'.$tablet_portrait;
                        $class[] = 'tablet-landscape-'.$tablet_landscape;
                        $class[] = 'desktop-'.$desktop;

                    ?>
                    <?php if (get_the_content($header_id)): ?>
                        <header id="et-desktop-<?php echo esc_attr($header_id); ?>" class="<?php echo esc_attr(implode(" ", $class)); ?>">
                            <?php
                                $content = do_shortcode(get_the_content($header_id));
                                $content = str_replace( ']]>', ']]&gt;', $content );
                                echo $content;
                            ?>
                        </header>
                    <?php endif ?>
                <?php endif; ?>
                
            <?php }
            wp_reset_query();
        } else {
            echo '<div class="container"><div class="alert error"><div class="alert-message">'.esc_html__("No custom header is found, make sure you create a one", "enovathemes-addons").'</div></div></div>';
        }
    }

/*  Title section html
/*-------------------*/

    add_filter("the_content", "enovathemes_addons_title_section_filter");
    function enovathemes_addons_title_section_filter($content) {

        if (is_singular('title_section')) {

            $home_link   = esc_url(home_url('/'));
            $home_text   = esc_html__('Home','enovathemes-addons');

            if(!empty(get_option('page_on_front'))){$home_text = get_the_title( get_option('page_on_front') );}
            
            $text_before = '<span>';
            $text_after  = '</span>';

            $etp_title       = esc_html__("Page title here","samatex-enovathemes");
            $etp_subtitle    = esc_html__("Page subtitle here","samatex-enovathemes");
            $etp_breadcrumbs = $home_text.' / '.get_the_title();

            $content = str_replace("etp-title-replace-this", $etp_title, $content);
            $content = str_replace("etp-subtitle-replace-this", $etp_subtitle, $content);
            $content = preg_replace("/etp-breadcrumbs-replace-this/", $etp_breadcrumbs, $content);
        }
     
        return $content;
     
    }

    function enovathemes_addons_title_section_html($title_section_id, $etp_title, $etp_subtitle, $etp_breadcrumbs){
        
        $query = new WP_Query(array(
            'post_type' => 'title_section',
            'p'         => $title_section_id,
        ));
        if ($query->have_posts()) {
            while ( $query->have_posts() ) { $query->the_post(); ?>
                <?php if (get_the_content($title_section_id)): ?>
                    <section id="title-section-<?php echo esc_attr($title_section_id); ?>" class="title-section et-clearfix">
                        <?php
                            $content = do_shortcode(get_the_content($title_section_id));
                            $content = str_replace( ']]>', ']]&gt;', $content );
                            $content = str_replace("etp-title-replace-this", $etp_title, $content);
                            $content = str_replace("etp-subtitle-replace-this", $etp_subtitle, $content);
                            $content = preg_replace("/etp-breadcrumbs-replace-this/", $etp_breadcrumbs, $content);
                            echo samatex_enovathemes_output_html($content);
                        ?>
                    </section>
                <?php endif ?>
            <?php }
            wp_reset_query();
        } else {
            echo '<div class="container"><div class="alert error"><div class="alert-message">'.esc_html__("No custom title section is found, make sure you create a one", "enovathemes-addons").'</div></div></div>';
        }
    }

/*  Footer html
/*-------------------*/

    function enovathemes_addons_footer_html($footer_id){
        $query = new WP_Query(array(
            'post_type' => 'footer',
            'p'         => $footer_id,
        ));
        if ($query->have_posts()) {
            while ( $query->have_posts() ) { $query->the_post();

                $sticky = get_post_meta($footer_id, 'enovathemes_addons_sticky', true);
                $sticky = (empty($sticky)) ? "false" : "true";

                $class = array();

                $class[] = 'footer';
                $class[] = 'et-footer';
                $class[] = 'et-clearfix';
                $class[] = 'sticky-'.$sticky;

                ?>
                <?php if (get_the_content($footer_id)): ?>
                    <footer id="et-footer-<?php echo esc_attr($footer_id); ?>" class="<?php echo esc_attr(implode(" ", $class)); ?>">
                        <?php
                            $content = do_shortcode(get_the_content($footer_id));
                            $content = str_replace( ']]>', ']]&gt;', $content );
                            echo $content;
                        ?>
                    </footer>
                <?php endif ?>
            <?php }
            wp_reset_query();
        } else {
            echo '<div class="alert error"><div class="alert-message">'.esc_html__("No custom footer is found, make sure you create a one", "enovathemes-addons").'</div></div>';
        }
    }

/*  Actions/Filters
/*-------------------*/

    // register_activation_hook(__FILE__, 'enovathemes_addons_plugin_activate');
    // add_action('admin_init', 'enovathemes_addons_plugin_activate');
    // function enovathemes_addons_plugin_activate() {
    //     update_option('uploads_use_yearmonth_folders', false);
    // }

    add_filter('body_class', 'enovathemes_addons_general_body_classes');
    function enovathemes_addons_general_body_classes($classes) {
            
            $custom_class = array();
            $custom_class[] = "addon-active";
            
            $classes[] = implode(" ", $custom_class);
            return $classes;
    }


    function enovathemes_addons_recursively_parse_nested_shortcodes( $regex, $content, $existing = array() ) {

        if ( is_array( $content ) ) {
            $content = implode( ' ', $content );
        }

        $count = preg_match_all( "/$regex/", $content, $matches );

        if ( $count ) {

            foreach ( $matches[3] as $index => $attributes ) {
 
                if ( empty( $existing[ $matches[2][ $index ] ] ) ) {
                    $existing[ $matches[2][ $index ] ] = array();
                }

                $shortcode_data = shortcode_parse_atts( $attributes );

                $existing[ $matches[2][ $index ] ][] = $shortcode_data;
                
            }

            return enovathemes_addons_recursively_parse_nested_shortcodes( $regex, $matches[5], $existing );

        } else {
 
            return $existing;
        }
       
    }

    function enovathemes_addons_extract_shortcode_attrs($post_id,$content,$element_css,$element_font){

        global $shortcode_tags;

        $extended_shortcode_tags = $shortcode_tags;
        $extended_shortcode_tags['vc_row'] = 'vc_row';
        $extended_shortcode_tags['vc_row_inner'] = 'vc_row_inner';
        $extended_shortcode_tags['vc_column'] = 'vc_column';
        $extended_shortcode_tags['vc_column_text'] = 'vc_column_text';

        preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches );
        $tagnames = array_intersect( array_keys( $extended_shortcode_tags ), $matches[1] );

        $shortcode_regex = get_shortcode_regex($tagnames);
        $shortcode_data  = enovathemes_addons_recursively_parse_nested_shortcodes( $shortcode_regex, $content );

        if ($element_css == true) {

            $element_styling = array();

            foreach ($shortcode_data as $shortcode => $attributes) {
                foreach ($attributes as $attribute => $group) {
                    if (is_array($group)) {
                        if (array_key_exists('element_css',$group)) {
                            $element_styling[] = str_replace('dir-child*', '>', $group['element_css']);
                        }
                    }
                }
            }

            if (!empty($element_styling)) {
                $element_styling = array_unique($element_styling);
                $element_styling = implode('', $element_styling);
                $element_styling = samatex_enovathemes_minify_css($element_styling);
            } else {
                $element_styling = '';
            }

            update_post_meta($post_id, "element_css",$element_styling);

        }

        if ($element_font == true) {

            $element_font = array();

            foreach ($shortcode_data as $shortcode => $attributes) {
                foreach ($attributes as $attribute => $group) {
                    if (is_array($group)) {
                        if (array_key_exists('element_font',$group)) {
                            array_push($element_font, $group['element_font']);
                        }
                        if (array_key_exists('subelement_font',$group)) {
                            array_push($element_font, $group['subelement_font']);
                        }
                    }
                }
            }

            if (!empty($element_font)) {
                $element_font = implode(",", $element_font);
            } else {
                $element_font = '';
            }

            update_post_meta($post_id, "element_font",$element_font);

        }

    }

    add_action( 'init', 'enovathemes_addons_init' );
    function enovathemes_addons_init(){

        global $samatex_enovathemes;

        add_action( 'save_post', 'enovathemes_addons_save_elements_styles', 99, 3);  
        function enovathemes_addons_save_elements_styles( $post_id )  
        {  

            if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
            if (!current_user_can( 'edit_page', $post_id ) ) return;

            $post_info = get_post($post_id);

            if (!is_wp_error($post_info) && is_object($post_info)) {

                $content   = $post_info->post_content;
                $post_type = $post_info->post_type;

                $element_css = (isset($_POST['element_css'])) ? true : false;
                $element_font = (isset($_POST['element_font'])) ? true : false;

                enovathemes_addons_extract_shortcode_attrs($post_id,$content,$element_css,$element_font);

                if ($post_type == "megamenu" && isset($_POST['enovathemes_addons_megamenu_width'])) {
                    if ($_POST['enovathemes_addons_megamenu_width'] == 100) {
                        update_post_meta($post_id, "enovathemes_addons_megamenu_position","left");
                        update_post_meta($post_id, "enovathemes_addons_megamenu_offset","");
                    }
                }

                if ($post_type == "header" && isset($_POST['enovathemes_addons_header_type'])) {

                    switch ($_POST['enovathemes_addons_header_type']) {
                        case 'sidebar':
                            update_post_meta($post_id, "enovathemes_addons_mobile", "");
                            update_post_meta($post_id, "enovathemes_addons_tablet_portrait", "");
                            update_post_meta($post_id, "enovathemes_addons_tablet_landscape", "");
                            update_post_meta($post_id, "enovathemes_addons_transparent", "");
                            update_post_meta($post_id, "enovathemes_addons_sticky", "");
                            update_post_meta($post_id, "enovathemes_addons_shadow", "");
                            update_post_meta($post_id, "enovathemes_addons_desktop", "on");
                            break;
                        case 'mobile':
                            update_post_meta($post_id, "enovathemes_addons_desktop", "");
                            break;
                    }

                }

            }
            
        }

        if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

            // Disable Gutenberg

            if (isset($GLOBALS['samatex_enovathemes']['disable-gutenberg']) && $GLOBALS['samatex_enovathemes']['disable-gutenberg'] == 1) {


                $disable_gutenberg_post = (isset($GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['post']) && $GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['post'] == 1) ? 'true' : 'false';
                $disable_gutenberg_page = (isset($GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['page']) && $GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['page'] == 1) ? 'true' : 'false';
                $disable_gutenberg_project = (isset($GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['project']) && $GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['project'] == 1) ? 'true' : 'false';
                $disable_gutenberg_product = (isset($GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['product']) && $GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['product'] == 1) ? 'true' : 'false';
                $disable_gutenberg_widgets = (isset($GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['widgets']) && $GLOBALS['samatex_enovathemes']['disable-gutenberg-type']['widgets'] == 1) ? 'true' : 'false';


                function enovathemes_addons_disable_gutenberg_post($is_enabled, $post_type) {
                    if ($post_type === 'post') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_post == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_post', 10, 2);
                }

                function enovathemes_addons_disable_gutenberg_page($is_enabled, $post_type) {
                    if ($post_type === 'page') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_page == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_page', 10, 2);
                }

                function enovathemes_addons_disable_gutenberg_project($is_enabled, $post_type) {
                    if ($post_type === 'project') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_project == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_project', 10, 2);
                }

                function enovathemes_addons_disable_gutenberg_product($is_enabled, $post_type) {
                    if ($post_type === 'product') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_product == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_product', 10, 2);
                }

                if ($disable_gutenberg_widgets == "true") {
                    add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
                    add_filter( 'use_widgets_block_editor', '__return_false' );
                }

            }


            $list = array(
                'page',
                'footer',
                'header',
                'megamenu',
                'title_section',
            );

            if(function_exists('vc_set_default_editor_post_types')){
                vc_set_default_editor_post_types( $list );
            }

            vc_add_shortcode_param( 'rv', 'enovathemes_addons_param_settings_rv' );
            function enovathemes_addons_param_settings_rv( $settings, $value ) {

                $output = '';

                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Responsive visibility options','enovathemes-addons').'</span><br>';
                $output .= '<table class="responsive-visibility">';
                    $output .= '<tr>';
                        $output .= '<th>'.esc_html__('Screen width','enovathemes-addons').'</th>';
                        $output .= '<th>'.esc_html__('Hide?','enovathemes-addons').'</th>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="480">';
                        $output .= '<td class="title">'.esc_html__('max-width 480px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="480" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="480">';
                        $output .= '<td class="title">'.esc_html__('min-width 480px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="480" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="480-768">';
                        $output .= '<td class="title">'.esc_html__('min-width 480px and max-width 768px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="480-768" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="767">';
                        $output .= '<td class="title">'.esc_html__('max-width 768px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="767" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="768">';
                        $output .= '<td class="title">'.esc_html__('min-width 768px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="768" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="768-1024">';
                        $output .= '<td class="title">'.esc_html__('min-width 768px and max-width 1024px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="768-1024" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1024">';
                        $output .= '<td class="title">'.esc_html__('min-width 1024px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1024" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1024-1280">';
                        $output .= '<td class="title">'.esc_html__('min-width 1024px and max-width 1280px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1024-1280" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1280">';
                        $output .= '<td class="title">'.esc_html__('min-width 1280px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1280" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1280-1366">';
                        $output .= '<td class="title">'.esc_html__('min-width 1280px and max-width 1366px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1280-1366" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1366">';
                        $output .= '<td class="title">'.esc_html__('min-width 1366px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1366" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1366-1600">';
                        $output .= '<td class="title">'.esc_html__('min-width 1366px and max-width 1600px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1366-1600" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1600">';
                        $output .= '<td class="title">'.esc_html__('min-width 1600px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1600" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1600-1920">';
                        $output .= '<td class="title">'.esc_html__('min-width 1600px and max-width 1920px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1600-1920" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1920">';
                        $output .= '<td class="title">'.esc_html__('min-width 1920px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1920" class="rvc" value="true"></td>';
                    $output .= '</tr>';
                $output .= '</table>';

                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

                return $output;
            }

            vc_add_shortcode_param( 'rp', 'enovathemes_addons_param_settings_rp' );
            function enovathemes_addons_param_settings_rp( $settings, $value ) {

                $output = '';

                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Responsive parallax options','enovathemes-addons').'</span><br>';
                $output .= '<table class="responsive-parallax">';
                    $output .= '<tr>';
                        $output .= '<th>'.esc_html__('Screen width','enovathemes-addons').'</th>';
                        $output .= '<th>'.esc_html__('Disable?','enovathemes-addons').'</th>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="480">';
                        $output .= '<td class="title">'.esc_html__('max-width 480px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="480" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="480">';
                        $output .= '<td class="title">'.esc_html__('min-width 480px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="480" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="480-768">';
                        $output .= '<td class="title">'.esc_html__('min-width 480px and max-width 768px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="480-768" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="767">';
                        $output .= '<td class="title">'.esc_html__('max-width 768px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="767" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="768">';
                        $output .= '<td class="title">'.esc_html__('min-width 768px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="768" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="768-1024">';
                        $output .= '<td class="title">'.esc_html__('min-width 768px and max-width 1024px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="768-1024" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1024">';
                        $output .= '<td class="title">'.esc_html__('min-width 1024px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1024" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1024-1280">';
                        $output .= '<td class="title">'.esc_html__('min-width 1024px and max-width 1280px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1024-1280" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1280">';
                        $output .= '<td class="title">'.esc_html__('min-width 1280px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1280" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1280-1366">';
                        $output .= '<td class="title">'.esc_html__('min-width 1280px and max-width 1366px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1280-1366" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1366">';
                        $output .= '<td class="title">'.esc_html__('min-width 1366px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1366" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1366-1600">';
                        $output .= '<td class="title">'.esc_html__('min-width 1366px and max-width 1600px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1366-1600" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1600">';
                        $output .= '<td class="title">'.esc_html__('min-width 1600px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1600" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1600-1920">';
                        $output .= '<td class="title">'.esc_html__('min-width 1600px and max-width 1920px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1600-1920" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1920">';
                        $output .= '<td class="title">'.esc_html__('min-width 1920px','enovathemes-addons').'</th>';
                        $output .= '<td class="checkbox"><input type="checkbox" name="1920" class="rpc" value="true"></td>';
                    $output .= '</tr>';
                $output .= '</table>';

                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

                return $output;
            }
            
            vc_add_shortcode_param( 'crp', 'enovathemes_addons_param_settings_crp' );
            function enovathemes_addons_param_settings_crp( $settings, $value ) {

                $output = '';

                $padding_array = array('i','0');

                for ($i=0; $i <= 50; $i+=5) { 
                    array_push($padding_array, $i);
                }

                $select = '<select class="column-responsive-padding-opt">';
                    $select .= '<option value="i" selected="selected">'.esc_html__('inherit','enovathemes-addons').'</option>';
                    $select .= '<option value="0">0</option>';
                    foreach ($padding_array as $option) {
                        if ($option != "i" && $option != "0") {
                            $select .= '<option value="'.$option.'">'.$option.'%</option>';   
                        }
                    }
                $select .= '</select>';

                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Responsive padding is advanced option designed to take controll over column left/right padding, when you are using the full width layout, which goes beyond the main container (1200px). A common example is 2 equal column full width layout. If you select "inherit" it will inherit the "Design Options" padding settings','enovathemes-addons').'</span><br>';
                $output .= '<table class="column-responsive-padding">';
                    $output .= '<tr>';
                        $output .= '<th>'.esc_html__('Screen width','enovathemes-addons').'</th>';
                        $output .= '<th>'.esc_html__('Padding left','enovathemes-addons').'</th>';
                        $output .= '<th>'.esc_html__('Padding right','enovathemes-addons').'</th>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="480">';
                        $output .= '<td class="title">'.esc_html__('max-width 480px','enovathemes-addons').'</th>';
                        $output .= '<td class="left">'.$select.'</td>';
                        $output .= '<td class="right">'.$select.'</td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="480-768">';
                        $output .= '<td class="title">'.esc_html__('min-width 480px and max-width 768px','enovathemes-addons').'</th>';
                        $output .= '<td class="left">'.$select.'</td>';
                        $output .= '<td class="right">'.$select.'</td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="768-1024">';
                        $output .= '<td class="title">'.esc_html__('min-width 768px and max-width 1024px','enovathemes-addons').'</th>';
                        $output .= '<td class="left">'.$select.'</td>';
                        $output .= '<td class="right">'.$select.'</td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1024-1280">';
                        $output .= '<td class="title">'.esc_html__('min-width 1024px and max-width 1280px','enovathemes-addons').'</th>';
                        $output .= '<td class="left">'.$select.'</td>';
                        $output .= '<td class="right">'.$select.'</td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1280-1366">';
                        $output .= '<td class="title">'.esc_html__('min-width 1280px and max-width 1366px','enovathemes-addons').'</th>';
                        $output .= '<td class="left">'.$select.'</td>';
                        $output .= '<td class="right">'.$select.'</td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1366-1600">';
                        $output .= '<td class="title">'.esc_html__('min-width 1366px and max-width 1600px','enovathemes-addons').'</th>';
                        $output .= '<td class="left">'.$select.'</td>';
                        $output .= '<td class="right">'.$select.'</td>';
                    $output .= '</tr>';
                    $output .= '<tr class="media-query" data-query="1600-1920">';
                        $output .= '<td class="title">'.esc_html__('min-width 1600px and max-width 1920px','enovathemes-addons').'</th>';
                        $output .= '<td class="left">'.$select.'</td>';
                        $output .= '<td class="right">'.$select.'</td>';
                    $output .= '</tr>';
                $output .= '</table>';

                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

                return $output;
            }

            vc_add_shortcode_param( 'margin', 'enovathemes_addons_param_settings_margin' );
            function enovathemes_addons_param_settings_margin( $settings, $value ) {

                $output = '';
                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Use only numbers without any string. Default unit is px','enovathemes-addons').'</span><br>';
                $output .= '<form class="margin-box">';
                     $output .= '<input class="margin-input" type="text" value="0" name="margin-left" />';
                     $output .= '<input class="margin-input" type="text" value="0" name="margin-top" />';
                     $output .= '<input class="margin-input" type="text" value="0" name="margin-right" />';
                     $output .= '<input class="margin-input" type="text" value="0" name="margin-bottom" />';
                     $output .= '<div class="element">'.esc_html__("Element", "enovathemes-addons").'</div>';
                $output .= '</form>';
                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
                return $output;
            }

            vc_add_shortcode_param( 'padding', 'enovathemes_addons_param_settings_padding' );
            function enovathemes_addons_param_settings_padding( $settings, $value ) {

                $output = '';
                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Use only numbers without any string. Default unit is px','enovathemes-addons').'</span><br>';
                $output .= '<form class="padding-box">';
                     $output .= '<input class="padding-input" type="text" value="0" name="padding-left" />';
                     $output .= '<input class="padding-input" type="text" value="0" name="padding-top" />';
                     $output .= '<input class="padding-input" type="text" value="0" name="padding-right" />';
                     $output .= '<input class="padding-input" type="text" value="0" name="padding-bottom" />';
                     $output .= '<div class="element">'.esc_html__("Element", "enovathemes-addons").'</div>';
                $output .= '</form>';
                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
                return $output;
            }

            vc_add_shortcode_param( 'icon_user', 'enovathemes_addons_param_settings_icon_user' );
            function enovathemes_addons_param_settings_icon_user( $settings, $value ) {

                $output = '';
                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Choose the icon','enovathemes-addons').'</span><br>';
                $output .= '<ul class="admin-icon-list icon-user">';
                    for ($i=1; $i <= 17; $i++) { 
                        $output .= '<li>';
                            $output .= '<span data-name="ien-euser-'.$i.'" class="ien-euser-'.$i.'"></span>';
                        $output .= '</li>';
                    }
                $output .= '</ul>';
                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
                return $output;
            }

            vc_add_shortcode_param( 'icon_menu', 'enovathemes_addons_param_settings_icon_menu' );
            function enovathemes_addons_param_settings_icon_menu( $settings, $value ) {

                $output = '';
                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Choose the icon','enovathemes-addons').'</span><br>';
                $output .= '<ul class="admin-icon-list icon-menu">';
                    for ($i=1; $i <= 8; $i++) { 
                        $output .= '<li>';
                            $output .= '<span data-name="ien-emenu-'.$i.'" class="ien-emenu-'.$i.'"></span>';
                        $output .= '</li>';
                    }
                $output .= '</ul>';
                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
                return $output;
            }

            vc_add_shortcode_param( 'icon_close', 'enovathemes_addons_param_settings_icon_close' );
            function enovathemes_addons_param_settings_icon_close( $settings, $value ) {

                $output = '';
                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Choose the icon','enovathemes-addons').'</span><br>';
                $output .= '<ul class="admin-icon-list icon-close">';
                    for ($i=1; $i <= 12; $i++) { 
                        $output .= '<li>';
                            $output .= '<span data-name="ien-eclose-'.$i.'" class="ien-eclose-'.$i.'"></span>';
                        $output .= '</li>';
                    }
                $output .= '</ul>';
                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
                return $output;
            }

            vc_add_shortcode_param( 'icon_search', 'enovathemes_addons_param_settings_icon_search' );
            function enovathemes_addons_param_settings_icon_search( $settings, $value ) {

                $output = '';
                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Choose the icon','enovathemes-addons').'</span><br>';
                $output .= '<ul class="admin-icon-list icon-search">';
                    for ($i=1; $i <= 20; $i++) { 
                        $output .= '<li>';
                            $output .= '<span data-name="ien-esearch-'.$i.'" class="ien-esearch-'.$i.'"></span>';
                        $output .= '</li>';
                    }
                $output .= '</ul>';
                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
                return $output;
            }

            vc_add_shortcode_param( 'icon_cart', 'enovathemes_addons_param_settings_icon_cart' );
            function enovathemes_addons_param_settings_icon_cart( $settings, $value ) {

                $output = '';
                $output .= '<span class="vc_description vc_clearfix">'.esc_html__('Choose the icon','enovathemes-addons').'</span><br>';
                $output .= '<ul class="admin-icon-list icon-cart">';
                    for ($i=1; $i <= 43; $i++) { 
                        $output .= '<li>';
                            $output .= '<span data-name="ien-ecart-'.$i.'" class="ien-ecart-'.$i.'"></span>';
                        $output .= '</li>';
                    }
                $output .= '</ul>';
                $output.= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
                return $output;
            }

            function enovathemes_addons_vc_param_animation_style_list( $styles ) {
                $styles = array(
                    array(
                        'values' => array(
                            esc_html__( 'None', 'enovathemes-addons' ) => 'none',
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Attention Seekers', 'enovathemes-addons' ),
                        'values' => array(
                            // text to display => value
                            esc_html__( 'bounce', 'enovathemes-addons' ) => array(
                                'value' => 'bounce',
                                'type' => 'other',
                            ),
                            esc_html__( 'flash', 'enovathemes-addons' ) => array(
                                'value' => 'flash',
                                'type' => 'other',
                            ),
                            esc_html__( 'pulse', 'enovathemes-addons' ) => array(
                                'value' => 'pulse',
                                'type' => 'other',
                            ),
                            esc_html__( 'rubberBand', 'enovathemes-addons' ) => array(
                                'value' => 'rubberBand',
                                'type' => 'other',
                            ),
                            esc_html__( 'shake', 'enovathemes-addons' ) => array(
                                'value' => 'shake',
                                'type' => 'other',
                            ),
                            esc_html__( 'swing', 'enovathemes-addons' ) => array(
                                'value' => 'swing',
                                'type' => 'other',
                            ),
                            esc_html__( 'tada', 'enovathemes-addons' ) => array(
                                'value' => 'tada',
                                'type' => 'other',
                            ),
                            esc_html__( 'wobble', 'enovathemes-addons' ) => array(
                                'value' => 'wobble',
                                'type' => 'other',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Bouncing Entrances', 'enovathemes-addons' ),
                        'values' => array(
                            // text to display => value
                            esc_html__( 'bounceIn', 'enovathemes-addons' ) => array(
                                'value' => 'bounceIn',
                                'type' => 'in',
                            ),
                            esc_html__( 'bounceInDown', 'enovathemes-addons' ) => array(
                                'value' => 'bounceInDown',
                                'type' => 'in',
                            ),
                            esc_html__( 'bounceInLeft', 'enovathemes-addons' ) => array(
                                'value' => 'bounceInLeft',
                                'type' => 'in',
                            ),
                            esc_html__( 'bounceInRight', 'enovathemes-addons' ) => array(
                                'value' => 'bounceInRight',
                                'type' => 'in',
                            ),
                            esc_html__( 'bounceInUp', 'enovathemes-addons' ) => array(
                                'value' => 'bounceInUp',
                                'type' => 'in',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Bouncing Exits', 'enovathemes-addons' ),
                        'values' => array(
                            // text to display => value
                            esc_html__( 'bounceOut', 'enovathemes-addons' ) => array(
                                'value' => 'bounceOut',
                                'type' => 'out',
                            ),
                            esc_html__( 'bounceOutDown', 'enovathemes-addons' ) => array(
                                'value' => 'bounceOutDown',
                                'type' => 'out',
                            ),
                            esc_html__( 'bounceOutLeft', 'enovathemes-addons' ) => array(
                                'value' => 'bounceOutLeft',
                                'type' => 'out',
                            ),
                            esc_html__( 'bounceOutRight', 'enovathemes-addons' ) => array(
                                'value' => 'bounceOutRight',
                                'type' => 'out',
                            ),
                            esc_html__( 'bounceOutUp', 'enovathemes-addons' ) => array(
                                'value' => 'bounceOutUp',
                                'type' => 'out',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Fading Entrances', 'enovathemes-addons' ),
                        'values' => array(
                            // text to display => value
                            esc_html__( 'fadeIn', 'enovathemes-addons' ) => array(
                                'value' => 'fadeIn',
                                'type' => 'in',
                            ),
                            esc_html__( 'fadeInDown', 'enovathemes-addons' ) => array(
                                'value' => 'fadeInDown',
                                'type' => 'in',
                            ),
                            esc_html__( 'fadeInDownBig', 'enovathemes-addons' ) => array(
                                'value' => 'fadeInDownBig',
                                'type' => 'in',
                            ),
                            esc_html__( 'fadeInLeft', 'enovathemes-addons' ) => array(
                                'value' => 'fadeInLeft',
                                'type' => 'in',
                            ),
                            esc_html__( 'fadeInLeftBig', 'enovathemes-addons' ) => array(
                                'value' => 'fadeInLeftBig',
                                'type' => 'in',
                            ),
                            esc_html__( 'fadeInRight', 'enovathemes-addons' ) => array(
                                'value' => 'fadeInRight',
                                'type' => 'in',
                            ),
                            esc_html__( 'fadeInRightBig', 'enovathemes-addons' ) => array(
                                'value' => 'fadeInRightBig',
                                'type' => 'in',
                            ),
                            esc_html__( 'fadeInUp', 'enovathemes-addons' ) => array(
                                'value' => 'fadeInUp',
                                'type' => 'in',
                            ),
                            esc_html__( 'fadeInUpBig', 'enovathemes-addons' ) => array(
                                'value' => 'fadeInUpBig',
                                'type' => 'in',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Fading Exits', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'fadeOut', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOut',
                                'type' => 'out',
                            ),
                            esc_html__( 'fadeOutDown', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOutDown',
                                'type' => 'out',
                            ),
                            esc_html__( 'fadeOutDownBig', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOutDownBig',
                                'type' => 'out',
                            ),
                            esc_html__( 'fadeOutLeft', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOutLeft',
                                'type' => 'out',
                            ),
                            esc_html__( 'fadeOutLeftBig', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOutLeftBig',
                                'type' => 'out',
                            ),
                            esc_html__( 'fadeOutRight', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOutRight',
                                'type' => 'out',
                            ),
                            esc_html__( 'fadeOutRightBig', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOutRightBig',
                                'type' => 'out',
                            ),
                            esc_html__( 'fadeOutUp', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOutUp',
                                'type' => 'out',
                            ),
                            esc_html__( 'fadeOutUpBig', 'enovathemes-addons' ) => array(
                                'value' => 'fadeOutUpBig',
                                'type' => 'out',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Flippers', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'flip', 'enovathemes-addons' ) => array(
                                'value' => 'flip',
                                'type' => 'other',
                            ),
                            esc_html__( 'flipInX', 'enovathemes-addons' ) => array(
                                'value' => 'flipInX',
                                'type' => 'in',
                            ),
                            esc_html__( 'flipInY', 'enovathemes-addons' ) => array(
                                'value' => 'flipInY',
                                'type' => 'in',
                            ),
                            esc_html__( 'flipOutX', 'enovathemes-addons' ) => array(
                                'value' => 'flipOutX',
                                'type' => 'out',
                            ),
                            esc_html__( 'flipOutY', 'enovathemes-addons' ) => array(
                                'value' => 'flipOutY',
                                'type' => 'out',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Lightspeed', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'lightSpeedIn', 'enovathemes-addons' ) => array(
                                'value' => 'lightSpeedIn',
                                'type' => 'in',
                            ),
                            esc_html__( 'lightSpeedOut', 'enovathemes-addons' ) => array(
                                'value' => 'lightSpeedOut',
                                'type' => 'out',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Rotating Entrances', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'rotateIn', 'enovathemes-addons' ) => array(
                                'value' => 'rotateIn',
                                'type' => 'in',
                            ),
                            esc_html__( 'rotateInDownLeft', 'enovathemes-addons' ) => array(
                                'value' => 'rotateInDownLeft',
                                'type' => 'in',
                            ),
                            esc_html__( 'rotateInDownRight', 'enovathemes-addons' ) => array(
                                'value' => 'rotateInDownRight',
                                'type' => 'in',
                            ),
                            esc_html__( 'rotateInUpLeft', 'enovathemes-addons' ) => array(
                                'value' => 'rotateInUpLeft',
                                'type' => 'in',
                            ),
                            esc_html__( 'rotateInUpRight', 'enovathemes-addons' ) => array(
                                'value' => 'rotateInUpRight',
                                'type' => 'in',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Rotating Exits', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'rotateOut', 'enovathemes-addons' ) => array(
                                'value' => 'rotateOut',
                                'type' => 'out',
                            ),
                            esc_html__( 'rotateOutDownLeft', 'enovathemes-addons' ) => array(
                                'value' => 'rotateOutDownLeft',
                                'type' => 'out',
                            ),
                            esc_html__( 'rotateOutDownRight', 'enovathemes-addons' ) => array(
                                'value' => 'rotateOutDownRight',
                                'type' => 'out',
                            ),
                            esc_html__( 'rotateOutUpLeft', 'enovathemes-addons' ) => array(
                                'value' => 'rotateOutUpLeft',
                                'type' => 'out',
                            ),
                            esc_html__( 'rotateOutUpRight', 'enovathemes-addons' ) => array(
                                'value' => 'rotateOutUpRight',
                                'type' => 'out',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Specials', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'hinge', 'enovathemes-addons' ) => array(
                                'value' => 'hinge',
                                'type' => 'out',
                            ),
                            esc_html__( 'rollIn', 'enovathemes-addons' ) => array(
                                'value' => 'rollIn',
                                'type' => 'in',
                            ),
                            esc_html__( 'rollOut', 'enovathemes-addons' ) => array(
                                'value' => 'rollOut',
                                'type' => 'out',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Zoom Entrances', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'zoomIn', 'enovathemes-addons' ) => array(
                                'value' => 'zoomIn',
                                'type' => 'in',
                            ),
                            esc_html__( 'zoomInDown', 'enovathemes-addons' ) => array(
                                'value' => 'zoomInDown',
                                'type' => 'in',
                            ),
                            esc_html__( 'zoomInLeft', 'enovathemes-addons' ) => array(
                                'value' => 'zoomInLeft',
                                'type' => 'in',
                            ),
                            esc_html__( 'zoomInRight', 'enovathemes-addons' ) => array(
                                'value' => 'zoomInRight',
                                'type' => 'in',
                            ),
                            esc_html__( 'zoomInUp', 'enovathemes-addons' ) => array(
                                'value' => 'zoomInUp',
                                'type' => 'in',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Zoom Exits', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'zoomOut', 'enovathemes-addons' ) => array(
                                'value' => 'zoomOut',
                                'type' => 'out',
                            ),
                            esc_html__( 'zoomOutDown', 'enovathemes-addons' ) => array(
                                'value' => 'zoomOutDown',
                                'type' => 'out',
                            ),
                            esc_html__( 'zoomOutLeft', 'enovathemes-addons' ) => array(
                                'value' => 'zoomOutLeft',
                                'type' => 'out',
                            ),
                            esc_html__( 'zoomOutRight', 'enovathemes-addons' ) => array(
                                'value' => 'zoomOutRight',
                                'type' => 'out',
                            ),
                            esc_html__( 'zoomOutUp', 'enovathemes-addons' ) => array(
                                'value' => 'zoomOutUp',
                                'type' => 'out',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Slide Entrances', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'slideInDown', 'enovathemes-addons' ) => array(
                                'value' => 'slideInDown',
                                'type' => 'in',
                            ),
                            esc_html__( 'slideInLeft', 'enovathemes-addons' ) => array(
                                'value' => 'slideInLeft',
                                'type' => 'in',
                            ),
                            esc_html__( 'slideInRight', 'enovathemes-addons' ) => array(
                                'value' => 'slideInRight',
                                'type' => 'in',
                            ),
                            esc_html__( 'slideInUp', 'enovathemes-addons' ) => array(
                                'value' => 'slideInUp',
                                'type' => 'in',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Slide Exits', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'slideOutDown', 'enovathemes-addons' ) => array(
                                'value' => 'slideOutDown',
                                'type' => 'out',
                            ),
                            esc_html__( 'slideOutLeft', 'enovathemes-addons' ) => array(
                                'value' => 'slideOutLeft',
                                'type' => 'out',
                            ),
                            esc_html__( 'slideOutRight', 'enovathemes-addons' ) => array(
                                'value' => 'slideOutRight',
                                'type' => 'out',
                            ),
                            esc_html__( 'slideOutUp', 'enovathemes-addons' ) => array(
                                'value' => 'slideOutUp',
                                'type' => 'out',
                            ),
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Defaults', 'enovathemes-addons' ),
                        'values' => array(
                            esc_html__( 'Top to bottom', 'enovathemes-addons' ) => array(
                                'value' => 'top-to-bottom',
                                'type' => 'in',
                            ),
                            esc_html__( 'Bottom to top', 'enovathemes-addons' ) => array(
                                'value' => 'bottom-to-top',
                                'type' => 'in',
                            ),
                            esc_html__( 'Left to right', 'enovathemes-addons' ) => array(
                                'value' => 'left-to-right',
                                'type' => 'in',
                            ),
                            esc_html__( 'Right to left', 'enovathemes-addons' ) => array(
                                'value' => 'right-to-left',
                                'type' => 'in',
                            ),
                            esc_html__( 'Appear from center', 'enovathemes-addons' ) => array(
                                'value' => 'appear',
                                'type' => 'in',
                            ),
                        ),
                    ),
                );
                return $styles;
            }
            add_filter( 'vc_param_animation_style_list', 'enovathemes_addons_vc_param_animation_style_list' );
        }

    }

    add_action( 'pre_get_posts', 'enovathemes_addons_pre_get_post' );
    function enovathemes_addons_pre_get_post( $query ) {

        global $samatex_enovathemes;

        if( (is_post_type_archive( 'project' ) || is_tax( 'project-category' ) || is_tax( 'project-tag' )) && !is_admin() && $query->is_main_query() ) {
            
            $project_per_page             = (isset($GLOBALS['samatex_enovathemes']['project-per-page']) && !empty($GLOBALS['samatex_enovathemes']['project-per-page'])) ? $GLOBALS['samatex_enovathemes']['project-per-page'] : get_option( 'posts_per_page' );
            $project_post_category_filter = (isset($GLOBALS['samatex_enovathemes']['project-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['project-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['project-post-category-filter'] : '';

            $query->set( 'posts_per_page', $project_per_page );
            $query->set( 'order_by', 'date' );
            $query->set( 'order', 'DESK' );

            if (!empty($project_post_category_filter)) {
                $query->set( 'tax_query', array(array(
                    'taxonomy' => 'project-category',
                    'field'    => 'slug',
                    'terms'    => $project_post_category_filter,
                    'operator' => 'NOT IN'
                )));
            }
        }

        if( (is_post_type_archive( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' )) && !is_admin() && $query->is_main_query() ) {
            
            $product_per_page             = (isset($GLOBALS['samatex_enovathemes']['product-per-page']) && !empty($GLOBALS['samatex_enovathemes']['product-per-page'])) ? $GLOBALS['samatex_enovathemes']['product-per-page'] : get_option( 'posts_per_page' );
            $product_post_category_filter = (isset($GLOBALS['samatex_enovathemes']['product-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['product-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['product-post-category-filter'] : '';

            $query->set( 'posts_per_page', $product_per_page );
            $query->set( 'order_by', 'date' );
            $query->set( 'order', 'DESK' );

            if (!empty($product_post_category_filter)) {
                $query->set( 'tax_query', array(array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $product_post_category_filter,
                    'operator' => 'NOT IN'
                )));
            }
        }

        if( (is_home() || is_tax() || is_category() || is_tag()) && !is_admin() && $query->is_main_query()) {

            $blog_post_category_filter = (isset($GLOBALS['samatex_enovathemes']['blog-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['blog-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['blog-post-category-filter'] : '';
            
            $query->set( 'ignore_sticky_posts', 1 );

            if (!empty($blog_post_category_filter)) {
                $query->set( 'category__not_in', $blog_post_category_filter );
            }
            
        }

    }

    remove_filter( 'the_content', 'wp_make_content_images_responsive' );
    add_action('init', 'enovathemes_addons_disable_responsive_images');
    function enovathemes_addons_disable_responsive_images() {

        add_filter( 'wp_get_attachment_image_attributes', function( $attr ){
            if( isset( $attr['sizes'] ) ){unset( $attr['sizes'] );}
            if( isset( $attr['srcset'] ) ){unset( $attr['srcset'] );}
            $attr['data-responsive-images'] = 'false';
            $attr['alt'] = esc_html(get_the_title(get_the_ID()));
            return $attr;

        }, PHP_INT_MAX );

        add_filter( 'wp_calculate_image_sizes', '__return_empty_array',  PHP_INT_MAX );
        add_filter( 'wp_calculate_image_srcset', '__return_empty_array', PHP_INT_MAX );
        remove_filter( 'the_content', 'wp_make_content_images_responsive' );
    }

    add_action( 'redux/loaded', 'samatex_enovathemes_remove_demo' );
    if ( ! function_exists( 'samatex_enovathemes_remove_demo' ) ) {
        function samatex_enovathemes_remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

/*  Visual composer front-end save
/*-------------------*/

    function enovathemes_addons_et_vc_save(){

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            
            if (isset($_POST["post_id"]) && !empty($_POST["post_id"])) {

                $post_id   = $_POST["post_id"];
                $post_info = get_post($post_id);

                if (!is_wp_error($post_info) && is_object($post_info)) {

                    $post_type = $post_info->post_type;

                    if (
                        $post_type == "post" || 
                        $post_type == "page" || 
                        $post_type == "project" || 
                        $post_type == "product" || 
                        $post_type == "header" || 
                        $post_type == "footer" || 
                        $post_type == "megamenu" || 
                        $post_type == "title_section"
                    ) {
                        $element_css  = true;
                        $element_font = true;
                        $content      = urldecode($_POST["content"]);
                        
                        if (!empty($content)) {
                            enovathemes_addons_extract_shortcode_attrs($post_id,$content,$element_css,$element_font);
                        }
                    }

                }

            }
            die;
            
        }

        die();

    }

    add_action('wp_ajax_nopriv_et_vc_save', 'enovathemes_addons_et_vc_save');
    add_action('wp_ajax_et_vc_save', 'enovathemes_addons_et_vc_save');

/*  Fast contact form
/*-------------------*/

    function enovathemes_addons_et_contact_form_send(){

        if ( ! isset( $_POST['et_contact_form_nonce'] ) || !wp_verify_nonce( $_POST['et_contact_form_nonce'], 'et_contact_form_action' )) {
           echo esc_html__("Sorry, your nonce did not verify.", "enovathemes-addons");
           exit;
        } else {

            $name    = strip_tags(trim($_POST["name"]));
            $name    = str_replace(array("\r","\n"),array(" "," "),$name);
            $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
            $recipient = filter_var(trim($_POST["recipient"]), FILTER_SANITIZE_EMAIL);
            $message = trim($_POST["message"]);

            // Check that data was sent to the mailer.
            if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Set a 400 (bad request) response code and exit.
                http_response_code(400);
                echo esc_html__("Oops! There was a problem with your submission. Please complete the form and try again.", "enovathemes-addons");
                exit;
            }

            if (empty($recipient)) {
                $recipient = get_option('admin_email');
            }

            // Set the email subject.
            $subject = esc_html__("Fast contact mail from ", "enovathemes-addons")." ".$name;

            // Build the email content.
            $email_content .= esc_html__("Name: ", "enovathemes-addons").$name."\n";
            $email_content .= esc_html__("Email: ", "enovathemes-addons").$email."\n";
            $email_content .= esc_html__("Message: ", "enovathemes-addons")."\n\n".$message."\n";

            // Build the email headers.
            $email_headers = "From: $name <$email>";

            // Send the email.
            if (wp_mail($recipient, $subject, $email_content, $email_headers)) {
                // Set a 200 (okay) response code.
                http_response_code(200);
                echo esc_html__("Thank You! Your message has been sent.", "enovathemes-addons");
            } else {
                // Set a 500 (internal server error) response code.
                http_response_code(500);
                echo esc_html__("Oops! Something went wrong and we couldn't send your message.", "enovathemes-addons");
            }
            die;

        }
    }

    add_action('admin_post_nopriv_et_contact_form', 'enovathemes_addons_et_contact_form_send');
    add_action('admin_post_et_contact_form', 'enovathemes_addons_et_contact_form_send');

/*  Instagram
/*-------------------*/

    function enovathemes_addons_scrape_instagram( $username ) {

        $username = trim( strtolower( $username ) );

        switch ( substr( $username, 0, 1 ) ) {
            case '#':
                $url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
                $transient_prefix = 'h';
                break;

            default:
                $url              = 'https://instagram.com/' . str_replace( '@', '', $username );
                $transient_prefix = 'u';
                break;
        }

        if ( false === ( $instagram = get_transient( 'instagram-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {

            $remote = wp_remote_get( $url );

            if ( is_wp_error( $remote ) ) {
                return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'enovathemes-addons' ) );
            }

            if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
                return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'enovathemes-addons' ) );
            }

            $shards      = explode( 'window._sharedData = ', $remote['body'] );
            $insta_json  = explode( ';</script>', $shards[1] );
            $insta_array = json_decode( $insta_json[0], true );

            if ( ! $insta_array ) {
                return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'enovathemes-addons' ) );
            }

            if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
                $images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
            } elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
                $images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
            } else {
                return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'enovathemes-addons' ) );
            }

            if ( ! is_array( $images ) ) {
                return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'enovathemes-addons' ) );
            }

            $instagram = array();

            foreach ( $images as $image ) {
                if ( true === $image['node']['is_video'] ) {
                    $type = 'video';
                } else {
                    $type = 'image';
                }

                $caption = __( 'Instagram Image', 'enovathemes-addons' );
                if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
                    $caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
                }

                $instagram[] = array(
                    'description' => $caption,
                    'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
                    'time'        => $image['node']['taken_at_timestamp'],
                    'comments'    => $image['node']['edge_media_to_comment']['count'],
                    'likes'       => $image['node']['edge_liked_by']['count'],
                    'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
                    'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
                    'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
                    'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
                    'type'        => $type,
                );
            } // End foreach().

            // do not set an empty transient - should help catch private or empty accounts.
            if ( ! empty( $instagram ) ) {
                $instagram = base64_encode( serialize( $instagram ) );
                set_transient( 'instagram-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
            }
        }

        if ( ! empty( $instagram ) ) {

            return unserialize( base64_decode( $instagram ) );

        } else {

            return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'enovathemes-addons' ) );

        }
    }

/*  Google fonts
/*-------------------*/

    function enovathemes_addons_google_fonts() {

        $api_key = 'AIzaSyD4_siUiwNbGDKcVNPQjCl-6eyzhctrPsM';
        $url     = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $api_key;
        
        $transient_prefix = $api_key;

        if ( false === ( $google_fonts = get_transient( 'gfonts-' . $transient_prefix . '-enovathemes' ) ) ) {

            $remote = wp_remote_get( $url );

            if ( is_wp_error( $remote ) ) {
                return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Google fonts.', 'enovathemes-addons' ) );
            }

            if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
                return new WP_Error( 'invalid_response', esc_html__( 'Google fonts did not return a 200.', 'enovathemes-addons' ) );
            }
           
            $gfonts_array = json_decode( $remote['body'], true );

            if ( ! $gfonts_array ) {
                return new WP_Error( 'bad_json', esc_html__( 'Google fonts has returned invalid data.', 'enovathemes-addons' ) );
            }

            if ( isset( $gfonts_array['items'] ) ) {
                $fonts = $gfonts_array['items'];
            } else {
                return new WP_Error( 'bad_json_2', esc_html__( 'Google fonts has returned invalid data.', 'enovathemes-addons' ) );
            }

            if ( ! is_array( $fonts ) ) {
                return new WP_Error( 'bad_array', esc_html__( 'Google fonts has returned invalid data.', 'enovathemes-addons' ) );
            }

            foreach ( $fonts as $font ) {
                $google_fonts[] = array(
                    'family'   => $font['family'],
                    'variants' => $font['variants'],
                    'subsets'  => $font['subsets']
                );
            } // End foreach().

            // do not set an empty transient - should help catch private or empty accounts.
            if ( ! empty( $google_fonts ) ) {
                $google_fonts = base64_encode( serialize( $google_fonts ) );
                set_transient( 'gfonts-' . $transient_prefix . '-enovathemes', $google_fonts, apply_filters( 'null_gfonts_cache_time', MONTH_IN_SECONDS * 2 ) );
            }
        }

        if ( ! empty( $google_fonts ) ) {

            return unserialize( base64_decode( $google_fonts ) );

        } else {

            return new WP_Error( 'no_fonts', esc_html__( 'Google fonts did not return any fonts.', 'enovathemes-addons' ) );

        }
    }

    function enovathemes_addons_create_dynamic_scripts($element_font){
        if (!empty($element_font)) {

            $element_font_builder = array();

            $element_font = explode(",", $element_font);

            foreach ($element_font as $font) {
                $font = explode(":", $font);
                array_push($element_font_builder, $font);
            }

            $element_font_result = array();
            foreach ($element_font_builder as $font_style) {

                if (!isset($element_font_result[$font_style[0]])){
                    $element_font_result[$font_style[0]] = $font_style;
                }else{
                    
                    if (array_key_exists(2,$font_style)) {

                        if (strpos($element_font_result[$font_style[0]][1], $font_style['1'])) {
                            $element_font_result[$font_style[0]][2] = $element_font_result[$font_style[0]][2];
                        } else {
                            $element_font_result[$font_style[0]][1] = $element_font_result[$font_style[0]][1].','.$font_style['1'];
                            $element_font_result[$font_style[0]][2] = $element_font_result[$font_style[0]][2];
                        }
                        
                    } else {
                        if (strpos($element_font_result[$font_style[0]][1], $font_style['1']) !== false) {
                            $element_font_result[$font_style[0]][2] = $element_font_result[$font_style[0]][2];
                        }
                    }
                    
                }
            }

            $element_font_result = array_values($element_font_result);

            $element_font_output = array();
            
            foreach ($element_font_result as $font_output) {

                if ($font_output[0] != "Theme default") {
                    $font_output = array(str_replace(' ', '+', $font_output[0]),$font_output[1],$font_output[2]);
                    array_push($element_font_output, array(
                        'font-name' => $font_output[0],
                        'font-style'=> str_replace('italic','i',$font_output[1]),
                        'subset'    => $font_output[2]
                    ));
                }

            }

            return $element_font_output;
        }
    }

/*  Flickr
/*-------------------*/

    function enovathemes_addons_flickr($user_id,$per_page) {

        global $samatex_enovathemes;
        $api_key = (isset($samatex_enovathemes['flickr-api']) && !empty($samatex_enovathemes['flickr-api'])) ? esc_attr($samatex_enovathemes['flickr-api']): "";
       
        $transient_prefix = $api_key.esc_attr($user_id);

        if ( false === ( $flickr_images = get_transient( 'flickr-' . $transient_prefix . '-enovathemes' ) ) ) {

            $params = array(
                'api_key'   => $api_key,
                'method'    => 'flickr.people.getPublicPhotos',
                'user_id'   => $user_id,
                'per_page'  => $per_page,
                'format'    => 'php_serial',
                'content_type' => 1,
                'privacy_filter' => 1,
                'extras'    => 'url_q'
            );

            $encoded_params = array();
            foreach ($params as $k => $v){
                $encoded_params[] = urlencode($k).'='.urlencode($v);
            }

            $url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);

            $rsp = file_get_contents($url);

            if ($rsp === FALSE) {
                return new WP_Error( 'flickr_no_images', esc_html__( 'Server Error. Not data is found', 'enovathemes-addons' ) );
            }

            $rsp_obj = unserialize($rsp);

            if ($rsp_obj['stat'] == 'ok'){

                if ($rsp_obj['photos']['photo']) {
                    foreach ( $rsp_obj['photos']['photo'] as $photo ) {
                        $flickr_images[] = array(
                            'url_q'   => $photo['url_q'],
                            'url_o'   => '//flickr.com/photos/'.$user_id,
                        );
                    }
                } else {
                    return new WP_Error( 'flickr_no_images', esc_html__( 'Flickr did not find any images.', 'enovathemes-addons' ) );
                }

                // do not set an empty transient - should help catch private or empty accounts.
                if ( ! empty( $flickr_images ) ) {
                    set_transient( 'flickr-' . $transient_prefix . '-enovathemes', $flickr_images, apply_filters( 'null_flickr_cache_time', HOUR_IN_SECONDS * 2 ) );
                }
            } else {
                return $rsp_obj['message'];
            }
            
        }

        if ( ! empty( $flickr_images ) ) {
            return $flickr_images;
        } else {
            return new WP_Error( 'flickr_no_images', esc_html__( 'Flickr did not find any images.', 'enovathemes-addons' ) );
        }
    }

/*  Mailchimp
/*-------------------*/

    function enovathemes_addons_mailchimp_curl_connect( $url, $request_type, $api_key, $data = array() ) {
        if( $request_type == 'GET' )
            $url .= '?' . http_build_query($data);
     
        $mch = curl_init();
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode( 'user:'. $api_key )
        );
        curl_setopt($mch, CURLOPT_URL, $url );
        curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
        curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
        curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
        curl_setopt($mch, CURLOPT_TIMEOUT, 10);
        curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection
     
        if( $request_type != 'GET' ) {
            curl_setopt($mch, CURLOPT_POST, true);
            curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
        }
     
        return curl_exec($mch);
    }

    function enovathemes_addons_mailchimp_subscriber_status( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '','ADDRESS' => '','PHONE' => '') ){

        $data = array(
            'apikey'        => $api_key,
            'email_address' => $email,
            'status'        => $status,
            'merge_fields'  => $merge_fields
        );
        $mch_api = curl_init(); // initialize cURL connection
     
        curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
        curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
        curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
        curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
        curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
        curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
        curl_setopt($mch_api, CURLOPT_POST, true);
        curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
     
        $result = curl_exec($mch_api);
        return $result;
    }

    function enovathemes_addons_mailchimp_list() {

        global $samatex_enovathemes;
        $mailchimp_api_key = (isset($samatex_enovathemes['mailchimp-api-key']) && !empty($samatex_enovathemes['mailchimp-api-key'])) ? esc_attr($samatex_enovathemes['mailchimp-api-key']): "";

        $api_key = $mailchimp_api_key;
        $transient_prefix = $api_key;

        if (empty($api_key)) {
            return new WP_Error( 'no_api_key', esc_html__( 'No Mailchimp API key is found. Go to theme options >> general >> Mailchimp API key', 'enovathemes-addons' ) );
        }

        $url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/';

        if ( false === ( $mailchimp_list = get_transient( 'mailchimp-' . $transient_prefix . '-enovathemes' ) ) ) {

            $data = array(
                'fields' => 'lists',
                'count' => 'all',
            );
             
            $result = json_decode( enovathemes_addons_mailchimp_curl_connect( $url, 'GET', $api_key, $data) );
           
            if (! $result ) {
                return new WP_Error( 'bad_json', esc_html__( 'Mailchimp has returned invalid data.', 'enovathemes-addons' ) );
            }

            if ( !empty( $result->lists ) ) {
                foreach( $result->lists as $list ){
                    $mailchimp_list[] = array(
                        'id'      => $list->id,
                        'name'    => $list->name,
                    );
                }
            } elseif(is_int( $result->status)) {
                return '<strong>' . $result->title . ':</strong> ' . $result->detail;
            } else {
                return new WP_Error( 'bad_json_2', esc_html__( 'Mailchimp has returned invalid data.', 'enovathemes-addons' ) );
            }

            // do not set an empty transient - should help catch private or empty accounts.
            if ( ! empty( $mailchimp_list ) ) {
                $mailchimp_list = base64_encode( serialize( $mailchimp_list ) );
                set_transient( 'mailchimp-' . $transient_prefix . '-enovathemes', $mailchimp_list, apply_filters( 'null_mailchimp_cache_time', WEEK_IN_SECONDS * 2 ) );
            }
        }

        if ( ! empty( $mailchimp_list ) ) {

            return unserialize( base64_decode( $mailchimp_list ) );

        } else {

            return new WP_Error( 'no_list', esc_html__( 'Mailchimp did not return any list.', 'enovathemes-addons' ) );

        }
    }

    function enovathemes_addons_mailchimp_subscribe(){

        global $post, $samatex_enovathemes;

        if ( ! isset( $_POST['et_mailchimp_nonce'] ) || !wp_verify_nonce( $_POST['et_mailchimp_nonce'], 'et_mailchimp_action' )) {
           echo esc_html__("Sorry, your nonce did not verify.", "enovathemes-addons");
           exit;
        } else {

            $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
            $fname   = strip_tags(trim($_POST["fname"]));
            $lname   = strip_tags(trim($_POST["lname"]));
            $phone   = strip_tags(trim($_POST["phone"]));
            $list    = strip_tags(trim($_POST["list"]));

            $list_id = $list;
            $api_key = (isset($samatex_enovathemes['mailchimp-api-key']) && !empty($samatex_enovathemes['mailchimp-api-key'])) ? esc_attr($samatex_enovathemes['mailchimp-api-key']): "";
            $result  = json_decode( enovathemes_addons_mailchimp_subscriber_status($email, 'subscribed', $list_id, $api_key, array('FNAME' => $fname,'LNAME' => $lname,'PHONE' => $phone) ) );

            if( $result->status == 400 ){
                foreach( $result->errors as $error ) {
                    echo '<p>Error: ' . $error->message . '</p>';
                }
            } elseif( $result->status == 'subscribed' ){
                echo 'Thank you, ' . $result->merge_fields->FNAME . '. You have subscribed successfully';
            }
            
            die;
        }
    }

    add_action('admin_post_nopriv_et_mailchimp', 'enovathemes_addons_mailchimp_subscribe');
    add_action('admin_post_et_mailchimp', 'enovathemes_addons_mailchimp_subscribe');

/*  Post social share
/*-------------------*/

    function enovathemes_addons_post_social_share($class){

        $output = '<div id="post-social-share" class="post-social-share '.esc_attr($class).' et-clearfix">';

            $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
            $output .= '<div class="social-links et-clearfix">';
                $output .= '<a title="'.esc_html__("Share on Facebook", 'enovathemes-addons').'" class="social-share post-facebook-share ien-facebook" target="_blank" href="//facebook.com/sharer.php?u='.urlencode(get_the_permalink(get_the_ID())).'"></a>';
                $output .= '<a title="'.esc_html__("Tweet this!", 'enovathemes-addons').'" class="social-share post-twitter-share ien-twitter" target="_blank" href="//twitter.com/intent/tweet?text='.urlencode(get_the_title(get_the_ID()).' - '.get_the_permalink(get_the_ID())).'"></a>';
                $output .= '<a title="'.esc_html__("Share on Pinterest", 'enovathemes-addons').'" class="social-share post-pinterest-share ien-pinterest" target="_blank" href="//pinterest.com/pin/create/button/?url='.urlencode(get_the_permalink(get_the_ID())).'&media='.urlencode(esc_url($url)).'&description='.rawurlencode(get_the_title(get_the_ID())).'"></a>';
                $output .= '<a title="'.esc_html__("Share on LinkedIn", 'enovathemes-addons').'" class="social-share post-linkedin-share ien-linkedin" target="_blank" href="//www.linkedin.com/shareArticle?mini=true&url='.urlencode(get_the_permalink(get_the_ID())).'&title='.rawurlencode(get_the_title(get_the_ID())).'"></a>';
            $output .= '</div>';

        $output .= '</div>';

        return $output;

    }

    add_action('wp_head', 'enovathemes_addons_open_graph_tags');
    function enovathemes_addons_open_graph_tags(){ ?>
        <?php

        if (defined( 'WPSEO_PATH' )) {
            return;
        }

        global $post;

        $sitename    = get_bloginfo('name');
        $image       = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),"full");
        $url         = get_the_permalink(get_the_ID());
        $title       = get_the_title(get_the_ID());
        $description = (has_excerpt(get_the_ID())) ? get_the_excerpt(get_the_ID()) : '';

        ?>
        <?php if ($title): ?>
            <meta property="og:site_name" content="<?php echo esc_attr($sitename); ?>" />
            <meta name="twitter:title" content="<?php echo esc_attr($sitename); ?>">
        <?php endif ?>
        <?php if ($url): ?>
            <meta property="og:url" content="<?php echo esc_url($url); ?>" />
            <meta property="og:type" content="article" />
        <?php endif ?>
        <?php if ($title): ?>
            <meta property="og:title" content="<?php echo esc_attr($title); ?>" />
        <?php endif ?>
        <?php if ($description): ?>
            <meta property="og:description" content="<?php echo esc_attr($description); ?>" />
            <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
        <?php endif ?>
        <?php if ($image): ?>
            <meta property="og:image" content="<?php echo esc_url($image[0]); ?>" />
            <meta property="og:image:width" content="<?php echo esc_attr($image[1]); ?>" />
            <meta property="og:image:height" content="<?php echo esc_attr($image[2]); ?>" />
            <meta name="twitter:image" content="<?php echo esc_url($image[0]); ?>">
            <meta name="twitter:card" content="summary_large_image">
        <?php endif ?>
        
    <?php }

/*  Breadcrumbs
/*-------------------*/

    function enovathemes_addons_breadcrumbs() {

        global $post, $samatex_enovathemes;

        $text_before = '<span>';
        $text_after  = '</span>';
        $output      = '';

        $home_text     = esc_html__('Home','enovathemes-addons');

        if(!empty(get_option('page_on_front')))
        $home_text = get_the_title( get_option('page_on_front') );

        $category_text = esc_html__('Category "%s"','enovathemes-addons');
        $tax_text      = esc_html__('Archive by "%s"','enovathemes-addons');
        $tag_text      = esc_html__('Posts tagged "%s"','enovathemes-addons');
        $author_text   = esc_html__('Articles posted by %s','enovathemes-addons');
        $error_text    = esc_html__('Error 404','enovathemes-addons');
        $search_text   = esc_html__('Search results for "%s" Query','enovathemes-addons');
        $wishlist_text = esc_html__("Wishlist", 'enovathemes-addons');

        $blog_text     = (isset($GLOBALS['samatex_enovathemes']['blog-title-text']) && !empty($GLOBALS['samatex_enovathemes']['blog-title-text'])) ? esc_attr($GLOBALS['samatex_enovathemes']['blog-title-text']) : esc_html__("Blog", "enovathemes-addons");
        $project_text  = (isset($GLOBALS['samatex_enovathemes']['project-title-text']) && !empty($GLOBALS['samatex_enovathemes']['project-title-text'])) ? esc_attr($GLOBALS['samatex_enovathemes']['project-title-text']) : esc_html__("Projects", "enovathemes-addons");
        $product_text  = (isset($GLOBALS['samatex_enovathemes']['product-title-text']) && !empty($GLOBALS['samatex_enovathemes']['product-title-text'])) ? esc_attr($GLOBALS['samatex_enovathemes']['product-title-text']) : esc_html__("Product", "enovathemes-addons");

        $home_link = esc_url(home_url('/'));
        $blog_link = get_post_type_archive_link( 'post' );
        $shop_link = (function_exists('wc_get_page_id')) ? get_permalink( wc_get_page_id( 'shop' ) ) : '';

        if (is_home() && is_front_page()) {
            // Post is frontpage
            $output .= $text_before . $blog_text . $text_after;
        } elseif (is_home() && !is_front_page()) {
            // Post is separate page
            $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            if ( get_query_var('paged') ) {
               $output .= '<a href="' . $blog_link . '">' . $blog_text . '</a>';
            } else {
               $output .= $text_before . $blog_text . $text_after; 
            }

        } elseif (is_front_page() && !is_home()) {
            // Front page and not post page
            $output .= $text_before . $home_text . $text_after;
        } else {

            /*  Page
            -------------------*/

                if (is_page()) {

                    $page_title = get_the_title();

                    $wishlistpage    = "false";
                    $wishlistpage_id = get_option('yith_wcwl_wishlist_page_id');
                    if (defined('YITH_WCWL') && !empty($wishlistpage_id)) {
                        $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
                    }

                    if ($wishlistpage == "true") {
                        $page_title = $wishlist_text;
                    }

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';

                    if (class_exists('Woocommerce')) {

                        if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                            $output .= '<a href="' . $shop_link . '">' . $product_text . '</a>';
                        }

                    }

                    if ($post->post_parent) {

                        $this_parents = get_post_ancestors($post->ID);

                        foreach (array_reverse($this_parents) as $parent_ID) {
                            $output .= '<a href="'.get_page_link($parent_ID, false, false).'">'.get_the_title($parent_ID).'</a>';
                        }

                        $output .= $text_before.$page_title.$text_after;

                    } else {
                        $output .= $text_before.$page_title.$text_after;
                    }
                }

            /*  Single post
            -------------------*/

                if (is_singular( 'post' )) {

                    $this_cats         = get_the_category();
                    $first_cat         = $this_cats[0];
                    $first_cat_link    = get_category_link($first_cat->cat_ID);

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                    $output .= '<a href="' . $blog_link . '">' . $blog_text . '</a>';

                    if ($first_cat->parent) {
                        $first_cat_parents = get_category_parents($first_cat->parent, true, '');
                        $output .= $first_cat_parents;
                    }

                    $output .= '<a href="'.$first_cat_link.'">'. $first_cat->name .'</a>';
                    $output .= $text_before.get_the_title().$text_after;
                    
                }

            /*  Category / Tag / Taxonomy
            -------------------*/

                if ( is_category() ) {

                    $this_cat = get_category(get_query_var('cat'), false);

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                    $output .= '<a href="' . $blog_link . '">' . $blog_text . '</a>';

                    if ($this_cat->parent != 0) {
                        $this_parents = get_category_parents($this_cat->parent, true, '');
                        $output .= $this_parents;
                        $output .= $text_before . sprintf($category_text, single_cat_title('', false)) . $text_after;
                    } else {
                        $output .= $text_before . sprintf($category_text, single_cat_title('', false)) . $text_after;
                    }
                    
                }

                if (is_tag()) {

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                    $output .= '<a href="' . $blog_link . '">' . $blog_text . '</a>';
                    $output .= $text_before . sprintf($tag_text, single_tag_title('', false)) . $text_after;

                }

            /*  Date
            -------------------*/

                if ( is_day() ) {

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                    $output .= '<a href="'.get_year_link(get_the_time('Y'),get_the_time('Y')).'">'. get_the_time('Y') .'</a>';
                    $output .= '<a href="'.get_month_link(get_the_time('Y'),get_the_time('m')).'">'. get_the_time('F') .'</a>';
                    $output .= $text_before . get_the_time('d') . $text_after;

                }

                if ( is_month() ) {

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                    $output .= '<a href="'.get_year_link(get_the_time('Y'),get_the_time('Y')).'">'. get_the_time('Y') .'</a>';
                    $output .= $text_before . get_the_time('F') . $text_after;
                }

                if ( is_year() ) {
                   
                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                    $output .= $text_before . get_the_time('Y') . $text_after;
                }

            /*  Misc
            -------------------*/

                if ( is_search() ) {

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';

                    $cpt_list = get_post_types( array(
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search'=> false,
                        '_builtin' => false,
                    ), 'objects', 'and' );

                    if (is_array($cpt_list)) {
                        foreach ($cpt_list as $cpt) {

                            $cpt_title = $cpt->labels->name;

                            switch ($cpt->name) {
                                case 'project':
                                    $cpt_title = $project_text;
                                    break;
                                case 'product':
                                    $cpt_title = $product_text;
                                    break;
                            }

                            if (is_post_type_archive($cpt->name)) {
                                $output .= '<a href="' . get_post_type_archive_link($cpt->name) . '">' . $cpt_title . '</a>';
                            }

                        }
                    }


                    $output .= $text_before . sprintf($search_text, get_search_query()) . $text_after;

                }

                if ( is_author() ) {
                    global $author;
                    $userdata = get_userdata($author);

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                    $output .= $text_before . sprintf($author_text, $userdata->display_name) . $text_after;

                }

                if ( is_404() ) {

                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                    $output .= $text_before . $error_text . $text_after;
                }

            /*  CPT
            -------------------*/

                if (!is_search()  && !is_404()) {

                    $cpt_list = get_post_types( array(
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search'=> false,
                        '_builtin' => false,
                    ), 'objects', 'and' );

                    if (is_array($cpt_list)) {
                        foreach ($cpt_list as $cpt) {

                            $cpt_title = $cpt->labels->name;

                            switch ($cpt->name) {
                                case 'project':
                                    $cpt_title = $project_text;
                                    break;
                                case 'product':
                                    $cpt_title = $product_text;
                                    break;
                            }

                            /*  Archive
                            -------------------*/

                                if (is_post_type_archive($cpt->name)) {

                                    $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';

                                    if ( get_query_var('paged') ) {
                                       $output .= '<a href="' . get_post_type_archive_link($cpt->name) . '">' . $cpt_title . '</a>';
                                    } else {
                                       $output .= $text_before . $cpt_title . $text_after; 
                                    }

                                }

                            /*  Taxonomy
                            -------------------*/

                                $cpt_taxonomies = get_object_taxonomies($cpt->name);
                                if (is_array($cpt_taxonomies)) {
                                    foreach ($cpt_taxonomies as $cpt_tax) {
                                        if (is_tax($cpt_tax)) {


                                            $this_tax    = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                                            $this_parents = ($this_tax) ? get_ancestors( $this_tax->term_id, get_query_var('taxonomy') ) : '';

                                            $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                                            $output .= '<a href="'.get_post_type_archive_link($cpt->name).'">'. $cpt_title .'</a>';

                                            if (is_array($this_parents) && !empty($this_parents)) {
                                                foreach (array_reverse($this_parents) as $this_parent_ID) {
                                                    $this_parent = get_term($this_parent_ID, get_query_var('taxonomy'));
                                                    $output .= '<a href="'.get_term_link( $this_parent->slug, get_query_var('taxonomy')).'">'. $this_parent->name .'</a>';
                                                }
                                                $output .= $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;
                                            } else {
                                                $output .= $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;
                                            }
                                            
                                        }
                                    }
                                } else {
                                    if (is_tax()) {

                                        $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                                        $output .= $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;

                                    }
                                }

                            /*  Single post
                            -------------------*/

                                if ($cpt->name == 'project') {
                                    if (is_singular( 'project' )) {

                                        $this_terms = get_the_terms( $post->ID, 'project-category');

                                        $first_term         = $this_terms[0];
                                        $first_term_link    = ($first_term) ? get_term_link($first_term->term_id,'project-category') : "";
                                        $first_term_parents = ($first_term) ? get_ancestors($first_term->term_id,'project-category') : "";

                                        $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                                        $output .= '<a href="'.get_post_type_archive_link($cpt->name).'">'. $cpt_title .'</a>';

                                        if ($this_terms && is_array($first_term_parents) && !empty($first_term_parents)) {
                                            foreach (array_reverse($first_term_parents) as $this_parent_ID) {
                                                $this_parent = get_term($this_parent_ID, 'project-category');
                                                $output .= '<a href="'.get_term_link( $this_parent->slug, 'project-category').'">'. $this_parent->name .'</a>';
                                            }
                                        }

                                        if ($first_term) {
                                            $output .= '<a href="'.$first_term_link.'">'. $first_term->name .'</a>';
                                        }
                                        
                                        $output .= $text_before.get_the_title().$text_after;

                                    }
                                } elseif ($cpt->name == 'product') {

                                    if (is_singular( 'product' )) {

                                        $this_terms         = get_the_terms( $post->ID, 'product_cat');
                                        $first_term         = $this_terms[0];
                                        $first_term_link    = get_term_link($first_term->term_id,'product_cat');
                                        $first_term_parents = get_ancestors($first_term->term_id,'product_cat');
                                   
                                        $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                                        $output .= '<a href="' . $shop_link . '">' . $product_text . '</a>';

                                        if (is_array($first_term_parents)) {
                                            foreach (array_reverse($first_term_parents) as $this_parent_ID) {
                                                $this_parent = get_term($this_parent_ID, 'product_cat');
                                                $output .= '<a href="'.get_term_link( $this_parent->slug, 'product_cat').'">'. $this_parent->name .'</a>';
                                            }
                                        }

                                        $output .= '<a href="'.$first_term_link.'">'. $first_term->name .'</a>';
                                        $output .= $text_before.get_the_title().$text_after;

                                    }

                                } else {

                                    if (is_singular() && $cpt->name != 'project' && $cpt->name != 'product' && !is_single() && !is_page()) {
                                        $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                                        $output .= $text_before.get_the_title().$text_after;
                                    }

                                }

                        }
                    } else {
                        if (is_tax()) {

                            $output .= '<a href="' . $home_link . '">' . $home_text . '</a>';
                            $output .= $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;

                        }
                    }

                }
            
        }

        if ( get_query_var('paged') ) {
            $output .= $text_before.esc_html__('Page','enovathemes-addons') . ' ' . get_query_var('paged').$text_after;
        }

        return $output;
    }

/*  Navigation AJAX
/*-------------------*/

    function enovathemes_addons_ajax_nav($navigation,$post_type){

        $output = "";

        $output .='<div class="navigation-wraper">';
            if ($navigation == 'pagination'){
                $output .= samatex_enovathemes_post_nav_num($post_type);
            } else{
                $output .='<div class="ajax-container center">';
                    
                    if ($navigation == 'loadmore') {
                        $output .='<div id="'.$post_type.'-ajax-loader" class="et-ajax-loader et-button medium">'.esc_html__("Load more", "enovathemes-addons").'</div>';
                    } elseif ($navigation == 'scroll') {
                        $output .='<div id="'.$post_type.'-ajax-scroll" class="et-ajax-scroll"></div>';
                        $output .='<div id="'.$post_type.'-ajax-scroll-status" class="et-ajax-scroll-status"></div>';
                    }

                    $output .='<div id="'.$post_type.'-ajax-error" class="et-ajax-error">'.esc_html__("Something went wrong, please try again later or contact the site administrator", "enovathemes-addons").'</div>';

                $output .='</div>';
            }
        $output .='</div>';

        return $output;
    }

/*  Term filter
/*-------------------*/

    function enovathemes_addons_term_filter($options){

        $post_type          = $options['post_type']; 
        $term               = $options['term']; 
        $posts_per_page     = $options['posts_per_page']; 
        $exclude            = $options['exclude']; 
        $excluded_posts_num = $options['excluded_posts_num'];
        $default_filter     = $options['default_filter']; 
        $shortcode          = $options['shortcode']; 
        $order              = $options['order']; 
        $orderby            = $options['orderby'];
        $only_parent        = (isset($options['only_parent']) && !empty($options['only_parent'])) ? 0 : '';

        if (!is_tax()){

            $exclude_terms_ids = array();

            if ($exclude) {
                $exclude_terms = get_terms($term,array('fields' => 'all','slug' => $exclude));

                if (count($exclude_terms) != 0){
                    foreach($exclude_terms as $exclude_term){
                        array_push($exclude_terms_ids, $exclude_term->term_id);
                    }
                }
            }

            $args = array(
                'orderby'           => 'name', 
                'order'             => 'ASC',
                'hide_empty'        => true, 
                'exclude'           => $exclude_terms_ids, 
                'exclude_tree'      => array(), 
                'number'            => '', 
                'fields'            => 'all', 
                'slug'              => '', 
                'parent'            => $only_parent,
                'hierarchical'      => false, 
                'child_of'          => 0, 
                'get'               => '', 
                'name__like'        => '',
                'description__like' => '',
                'pad_counts'        => false, 
                'offset'            => '', 
                'search'            => '', 
                'cache_domain'      => 'core'
            );
            $count_posts = wp_count_posts($post_type);
            $taxonomy  = $term; 
            $tax_terms = get_terms($taxonomy,$args);

            if (count($tax_terms) != 0){

                $output = $container_start = $container_end = "";

                $filter_id = ($shortcode == true) ? $post_type.'-'.rand(1,1000000).'-filter' : $post_type.'-filter';

                $attributes = array();
                $attributes[] = 'data-posts-per-page="'.$posts_per_page.'"';
                $attributes[] = 'data-default-filter="'.$default_filter.'"';
                $attributes[] = 'data-order="'.$order.'"';
                $attributes[] = 'data-orderby="'.$orderby.'"';

                $output .= '<div id="'.$filter_id.'" '.implode(' ', $attributes).' class="et-post-filter container enovathemes-filter button-group filter-button-group">';
                    
                    if ($default_filter == "all"){    
                        $output .= '<a href="'.get_post_type_archive_link($post_type).'"  class="first-filter active filter et-button small" data-filter="*" data-exclude="'.implode(',', $exclude_terms_ids).'" data-count="'.($count_posts->publish - $excluded_posts_num).'">'.esc_html__('Show All', 'enovathemes-addons').'</a>';
                    }

                    foreach($tax_terms as $filter_term){
                        $filter_count    = $filter_term->count;
                        $filter_children = get_term_children( $filter_term->term_id, $term);
                        if(is_array($filter_children) && !empty($filter_children)) {
                            foreach ($filter_children as $filter_child) {
                                $filter_child_obj = get_term($filter_child, $term);
                                if ($filter_term->taxonomy != 'product_cat') {
                                    $filter_count = $filter_count + $filter_child_obj->count;
                                }
                            }
                        }

                        $active_class = "";

                        if ($default_filter != 'all') {
                            if ($filter_term->slug == $default_filter) {
                                $active_class = "first-filter active";
                            }
                        }

                        $output .= '<a href="'.esc_url(get_term_link($filter_term, $term)).'" class="filter et-button small '.$active_class.'" data-filter="'.$filter_term->slug.'" data-filter-id="'.$filter_term->term_id.'" data-count="'.$filter_count.'">'.$filter_term->name.'</a>';

                    }
                $output .= '</div>';

                return $output;

            }

        }
    }

/*  Project image overlay
/*-------------------*/

    function enovathemes_addons_project_image_overlay($project_post_layout){

        $output = '';

        $output .= '<a href="'.get_the_permalink().'" title="'.esc_attr__("Read more about", "enovathemes-addons").' '.get_the_title().'" rel="bookmark">';
            $output .='<div class="post-image-overlay">';
                    $output .='<div class="post-image-overlay-content">';
                        $output .='<span class="overlay-read-more"></span>';
                        if ($project_post_layout == "project-with-overlay") {
                            $output .='<div class="project-category">';
                                $output .= strip_tags(get_the_term_list( get_the_ID(), 'project-category', '', ', ', '' ));
                            $output .='</div>';

                            if ( '' != get_the_title()){
                                 $output .='<h4 class="post-title">';
                                    $output .=get_the_title();
                                 $output .='</h4>';
                            }
                        }
                    $output .='</div>';
            $output .='</div>';
        $output .= '</a>';

        return $output;
    }

/*  Project loop content
/*-------------------*/

    function enovathemes_addons_project_body($project_post_layout, $project_image_effect, $thumb_size){
        
        $output = "";

        $image_link_before = "";
        $image_link_after  = "";

        if ($project_post_layout == "project-with-caption") {
            $image_link_before = '<a href="'.get_the_permalink().'" title="'.esc_attr__("Read more about", "enovathemes-addons").' '.get_the_title().'" rel="bookmark">';
            $image_link_after  = '</a>';
        }

        $output .='<div class="overlay-hover">';

            if (has_post_thumbnail()) {
                $output .='<div class="post-image post-media">';

                    $output .= $image_link_before;

                        if ($project_post_layout != "project-with-caption") {
                            $output .= enovathemes_addons_project_image_overlay($project_post_layout);
                        }

                        $output .='<div class="image-container">';

                            if($project_image_effect == "transform"){
                                $output .='<a href="'.get_the_permalink().'">';
                                    $output .=get_the_post_thumbnail( get_the_ID(), $thumb_size);
                                $output .='</a>';
                            } else {
                                
                                $output .='<div class="image-preloader"></div>';
                                $output .=get_the_post_thumbnail( get_the_ID(), $thumb_size);
                            }

                        $output .='</div>';

                    $output .= $image_link_after;

                $output .='</div>';
            }

            if ($project_post_layout == "project-with-details" || $project_post_layout == "project-with-caption"){
                $output .='<div class="post-body et-clearfix">';
                    $output .='<div class="post-body-inner-wrap">';
                        $output .='<div class="post-body-inner">';

                            if ($project_post_layout == "project-with-details") {
                                $output .='<div class="project-category">';
                                    $output .= get_the_term_list( get_the_ID(), 'project-category', '', ', ', '' );
                                $output .='</div>';
                            }

                            if ( '' != get_the_title() ){
                                $output .='<h4 class="post-title entry-title">';
                                    $output .= '<a href="'.get_the_permalink().'" title="'.esc_attr__("Read more about", 'enovathemes-addons').' '.get_the_title().'" rel="bookmark">';
                                        $output .= get_the_title();
                                    $output .= '</a>';
                                $output .='</h4>';
                            }

                        $output .='</div>';
                    $output .='</div>';
                $output .='</div>';
            }

        $output .='</div>';

        return $output;
        
    }

    function enovathemes_addons_project_post($container,$project_post_layout,$project_image_effect, $thumb_size,$image_full,$image_justify){

        $output = "";
        $element_css = "";

        if ($image_full == "true" && $image_justify == "false") {
            $total = ($container == "wide") ? 1920 : 1200;
            $post_id      = get_the_ID();
            $post_image   = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full', false);
            $element_css  = 'width: '.(($post_image[1]/$total)*100).'%;';
        }

        if (!empty($element_css)) {
            $output .='<article class="'.join( ' ', get_post_class('et-item post')).'" id="project-'.get_the_ID().'" style="'.$element_css.'">';
        } else {
            $output .='<article class="'.join( ' ', get_post_class('et-item post')).'" id="project-'.get_the_ID().'">';
        }
            $output .='<div class="post-inner et-item-inner et-clearfix">';
                $output .= enovathemes_addons_project_body($project_post_layout,$project_image_effect, $thumb_size);
            $output .='</div>';
        $output .='</article>';

        return $output;

    }

/*  Project single content
/*-------------------*/
    
    function enovathemes_addons_single_project_media($project_format, $gallery_type, $gallery_columns, $gallery_gap, $gallery, $audio, $audio_embed, $video, $video_embed, $thumb_size){

        $output      = "";

        if ($project_format == "audio"){
            $output .='<div class="post-audio post-media">';
                if(!empty($audio_embed) && empty($audio)) {
                    $output .= '<iframe allowfullscreen="allowfullscreen" frameBorder="0" src="'.$audio_embed.'" class="iframeaudio"></iframe>';;
                } elseif (!empty($audio)) {
                    $output .='<audio class="plyr-element" id="audio-'.get_the_ID().'" controls>';
                        $output .='<source src="'.$audio.'" type="audio/mp3">';
                    $output .='</audio>';
                }
            $output .='</div>';
        } elseif($project_format == "video") {
            if (!empty($video) || !empty($video_embed)){
                $output .='<div class="post-video post-media">';
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
        } elseif($project_format == "gallery") {

            if (!empty($gallery)) {

                $class = array();

                $class[] = $gallery_type;
                $class[] = 'columns-'.$gallery_columns;
                $class[] = 'gap-'.$gallery_gap;

                if($gallery_type == "carousel"){
                    $class[] = 'owl-carousel';
                }

                if($gallery_type == "grid" || $gallery_type == "masonry"){
                    $class[] = 'grid-mas';
                    $class[] = 'effect-fadeIn';
                } else {
                    $class[] = 'effect-none';
                }

                $output .='<div id="project-gallery" class="project-gallery post-media '.esc_attr($gallery_type).'">';
                    $output .='<ul id="project-gallery-set" data-columns="'.esc_attr($gallery_columns).'" class="slides et-clearfix et-item-set '.esc_attr(implode(' ', $class)).'">';
                        
                        if ($gallery_type != "carousel" && $gallery_type != "carousel_thumb") {
                            $output .='<li class="grid-sizer"><li>';
                        }

                        foreach ($gallery as $image => $url){

                            $post_img_original = wp_get_attachment_image_src($image, "full");

                            $output .='<li id="gallery-image-'.$image.'" class="et-item">';
                                $output .='<div class="et-item-inner">';
                                    $output .='<div class="image-container">';
                                        $output .='<div class="image-preloader"></div>';
                                        $output .='<a class="photoswip-project" data-size="'.$post_img_original[1].'x'.$post_img_original[2].'" href="'.$post_img_original[0].'">';
                                            $output .= wp_get_attachment_image($image, $thumb_size,false);
                                        $output .='</a>';
                                    $output .='</div>';
                                $output .='</div>';
                            $output .='</li>';
                            
                        }
                    $output .='</ul>';
                $output .='</div>';

                if ($gallery_type == "carousel_thumb"){
                    $output .='<div id="project-gallery-navigation" class="project-gallery-navigation gallery-navigation slick-thumbnail-navigation">';
                        $output .='<ul id="project-gallery-navigation-set" class="slides et-clearfix">';
                            foreach ($gallery as $image => $url){
                                $output .='<li>';
                                    $output .= wp_get_attachment_image($image, 'thumbnail',false);
                                $output .='</li>';
                            }
                        $output .='</ul>';
                    $output .='</div>';
                }

            } else {

                if (has_post_thumbnail()){
                    $output .='<div class="project-image overlay-hover post-media">';
                        $output .='<div class="image-container">';
                            $output .= '<div class="image-preloader"></div>';
                            $output .= get_the_post_thumbnail( get_the_ID(), $thumb_size);
                        $output .='</div>';
                    $output .='</div>';
                }

            }
        } 

        return $output;

    }

    function enovathemes_addons_single_project_details($project_meta){

        global $samatex_enovathemes;

        $project_single_social = (isset($GLOBALS['samatex_enovathemes']['project-single-social']) && $GLOBALS['samatex_enovathemes']['project-single-social'] == 1) ? "true" : "false";

        $output = "";

        if (get_the_content()) {
            $output .= '<div class="project-description">';
                
                $output .= '<h5 class="project-description-title">';
                    $output .= esc_html__("Project description", 'enovathemes-addons');
                $output .= '</h5>';

                $content = apply_filters( 'the_content', get_the_content() );
                $content = str_replace( ']]>', ']]&gt;', $content );

                $output .= $content;

            $output .= '</div>';
        }

        if ($project_meta) {

            $output .= '<div class="project-meta">';

                $output .= '<h5 class="project-meta-title">';
                    $output .= esc_html__("Project details", 'enovathemes-addons');
                $output .= '</h5>';

                $output .= '<ul>';

                    if('' != get_the_title())  {
                    
                        $output .= '<li>';
                            $output .= '<span class="label">'.esc_html__("Project", 'enovathemes-addons').': </span>';
                            $output .= get_the_title( get_the_ID());
                        $output .= '</li>';

                    }

                    $output .= '<li>';
                        $output .= '<span class="label">'.esc_html__("Category", 'enovathemes-addons').': </span>';
                        $output .= get_the_term_list( get_the_ID(), 'project-category', '', ', ', '' );
                    $output .= '</li>';

                    $output .= '<li>';
                        $output .= '<span class="label">'.esc_html__("Client", 'enovathemes-addons').': </span>';
                        $output .= $project_meta;
                    $output .= '</li>';

                    if ($project_single_social == "true") {
                        $output .= '<li>';
                            $output .= enovathemes_addons_post_social_share('project-social-share');
                        $output .= '</li>';
                    }

                $output .= '</ul>';

            $output .= '</div>';
        }

        return $output;

    }

    function enovathemes_addons_related_projects(){
        
        global $samatex_enovathemes, $post;

        $project_related_projects     = (isset($GLOBALS['samatex_enovathemes']['project-related-projects']) && $GLOBALS['samatex_enovathemes']['project-related-projects'] == 1) ? "true" : "false";
        $project_post_layout          = (isset($GLOBALS['samatex_enovathemes']['project-post-layout']) && !empty($GLOBALS['samatex_enovathemes']['project-post-layout'])) ? $GLOBALS['samatex_enovathemes']['project-post-layout'] : "project-with-details";
        $project_image_full           = (isset($GLOBALS['samatex_enovathemes']['project-image-full']) && $GLOBALS['samatex_enovathemes']['project-image-full'] == 1) ? "true" : "false";
        $project_image_effect         = (isset($GLOBALS['samatex_enovathemes']['project-image-effect']) && !empty($GLOBALS['samatex_enovathemes']['project-image-effect'])) ? $GLOBALS['samatex_enovathemes']['project-image-effect'] : "overlay-fade";
        $project_image_effect_caption = (isset($GLOBALS['samatex_enovathemes']['project-image-effect-caption']) && !empty($GLOBALS['samatex_enovathemes']['project-image-effect-caption'])) ? $GLOBALS['samatex_enovathemes']['project-image-effect-caption'] : "caption-up";
        $project_post_category_filter = (isset($GLOBALS['samatex_enovathemes']['project-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['project-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['project-post-category-filter'] : '';

        if ($project_post_layout == "project-with-caption") {
            $project_image_effect = $project_image_effect_caption;
        }

        $thumb_size = 'samatex_400X320';

        if ($project_image_full == "true") {
            $thumb_size = 'full';
        }

        $output = "";

        if ($project_related_projects == "true") {
            $terms = get_the_terms( $post->ID , 'project-category');
            if ($terms){
                $category_ids = array();
                foreach($terms as $category) {$category_ids[] = $category->term_id;}

                $args = array(
                    'post_type' => 'project',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'project-category',
                            'field'    => 'id',
                            'terms'    => $category_ids,
                            'operator' => 'IN'
                        ),
                        array(
                            'taxonomy' => 'project-category',
                            'field'    => 'term_id',
                            'terms'    => $project_post_category_filter,
                            'operator' => 'NOT IN'
                        )
                    ),
                    'posts_per_page'      => 10,
                    'ignore_sticky_posts' => 1,
                    'orderby'             => 'date',
                    'post__not_in'        => array(get_the_ID())
                );

                $related_projects = new WP_Query($args);

                if ($related_projects->have_posts()){
                    $output .='<div class="related-projects-wrapper et-clearfix project-layout '.esc_attr($project_post_layout).'">';
                        $output .='<div class="container">';
                            $output .='<h4 class="related-projects-title">'.esc_html__("Related projects", 'enovathemes-addons').'</h4>';
                            $output .='<div id="related-projects" data-columns="3" class="owl-carousel related-projects et-clearfix '.esc_attr($project_image_effect).'">';
                                while($related_projects->have_posts()) : $related_projects->the_post();
                                    $output .= enovathemes_addons_project_post('boxed',$project_post_layout,$project_image_effect, $thumb_size,false,false);
                                endwhile;
                                wp_reset_postdata();
                            $output .='</div>';
                        $output .='</div>';
                    $output .='</div>';
                }
            }

            return $output;

        }

    }

/*  Woocommerce content
/*-------------------*/

    if ( ! function_exists( 'woocommerce_content' ) ) {
        
        function woocommerce_content() {

            if ( is_singular( 'product' ) ) {

                while ( have_posts() ) :
                    the_post();
                    wc_get_template_part( 'content', 'single-product' );
                endwhile;

            } else {
                ?>

                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

                    <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

                <?php endif; ?>

                <?php do_action( 'woocommerce_archive_description' ); ?>

                <?php if ( have_posts() ) : ?>

                    <?php do_action( 'woocommerce_before_shop_loop' ); ?>

                    <?php woocommerce_product_loop_start(); ?>

                    <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                        <?php while ( have_posts() ) : ?>
                            <?php the_post(); ?>
                            <?php include(ENOVATHEMES_ADDONS.'woocommerce/content-product.php'); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php woocommerce_product_loop_end(); ?>

                    <?php do_action( 'woocommerce_after_shop_loop' ); ?>

                <?php else : ?>

                    <?php do_action( 'woocommerce_no_products_found' ); ?>

                <?php
                endif;

            }
        }
    }
   
/*  Clear extra space from string
/*-------------------*/

    function enovathemes_addons_extra_white_space($text){
        $text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
        $text = preg_replace('/([\s])\1+/', ' ', $text);
        $text = trim($text);
        return $text;
    }

/*  Color change
/*-------------------*/

    $old_color = Redux::getOption('samatex_enovathemes','main-color');

    add_action( "redux/options/samatex_enovathemes/saved", "enovathemes_addons_redux_save");
    function enovathemes_addons_redux_save(){

        global $wpdb, $old_color;

        $new_color = Redux::getOption('samatex_enovathemes','main-color');;

        $posts_table = $wpdb->prefix . "posts";
        $meta_table  = $wpdb->prefix . "postmeta";

        $sql_1 = $wpdb->prepare( "UPDATE {$posts_table} SET post_content  = REPLACE (post_content, %s, '{$new_color}') ",$old_color);
        $sql_2 = $wpdb->prepare( "UPDATE {$meta_table} SET meta_value  = REPLACE (meta_value, %s, '{$new_color}') ",$old_color);

        if (isset($old_color) && !empty($old_color) && $old_color != $new_color && $old_color != 'transparent') {
            $wpdb->query($sql_1);
            $wpdb->query($sql_2);

            Redux::setOption('samatex_enovathemes','custom-loading-color',$new_color);
            Redux::setOption('samatex_enovathemes','mtt-back-color',array('hover'=> $new_color));
            Redux::setOption('samatex_enovathemes','form-button-back',array('regular'=> $new_color));
        }

    }

/*  REST API custom fields
/*-------------------*/

    function enovathemes_addons_register_fields(){

        /*  Projects
        /*-------------------*/

            register_rest_field('project',
                'project_category_array',
                array(
                    'get_callback'    => 'enovathemes_addons_project_categories',
                    'update_callback' => null,
                    'schema'          => null
                )
            );

            register_rest_field('project',
                'project_image',
                array(
                    'get_callback'    => 'enovathemes_addons_project_image',
                    'update_callback' => null,
                    'schema'          => null
                )
            );


    }

    function enovathemes_addons_project_categories($object,$field_name,$request){

        $term_array = array();

        $terms_raw =  wp_get_post_terms( $object['id'], 'project-category');

        foreach ($terms_raw as $term) {
            array_push($term_array, $term->name."__".get_term_link($term->term_id));
        }

        $term_array_result = array();

        foreach ($term_array as $term_string) {
            $term_string = explode("__", $term_string);
            array_push($term_array_result, $term_string);
        }

        return $term_array_result;
    }

    function enovathemes_addons_project_image($object,$field_name,$request){

        $project_image = array();

        $samatex_400X320 = wp_get_attachment_image_src($object['featured_media'],'samatex_400X320');
        $samatex_480X360 = wp_get_attachment_image_src($object['featured_media'],'samatex_480X360');
        $samatex_600X370 = wp_get_attachment_image_src($object['featured_media'],'samatex_600X370');
        $samatex_640X400 = wp_get_attachment_image_src($object['featured_media'],'samatex_640X400');
        $samatex_960X600 = wp_get_attachment_image_src($object['featured_media'],'samatex_960X600');
        $full            = wp_get_attachment_image_src($object['featured_media'],'full');

        if (strpos($samatex_400X320[0], '400x')) {
            array_push($project_image, 'samatex_400X320__'.$samatex_400X320[0]);
        }

        if (strpos($samatex_480X360[0], '480x')) {
            array_push($project_image, 'samatex_480X360__'.$samatex_480X360[0]);
        }

        if (strpos($samatex_600X370[0], '600x')) {
            array_push($project_image, 'samatex_600X370__'.$samatex_600X370[0]);
        }

        if (strpos($samatex_960X600[0], '600x')) {
            array_push($project_image, 'samatex_960X600__'.$samatex_960X600[0]);
        }

        array_push($project_image, 'full__'.$full[0]);

        $project_image_result = array();

        foreach ($project_image as $image_string) {
            $image_string = explode("__", $image_string);
            array_push($project_image_result, $image_string);
        }

        return $project_image_result;
    }

    add_action('rest_api_init','enovathemes_addons_register_fields');

/*  CPT Templates
/*-------------------*/

    function enovathemes_addons_project_single_template($single_template) {
        global $post;
        if ($post->post_type == 'project') {
            if ( $theme_file = locate_template( array ( 'single-project.php' ) ) ) {
                $single_template = $theme_file;
            } else {
                $single_template = ENOVATHEMES_ADDONS . 'project/single-project.php';
            }
        }
        return $single_template;
    }
    add_filter( "single_template", "enovathemes_addons_project_single_template", 20 );

    function enovathemes_addons_project_archive_template($archive_template) {
        global $post;
        if ($post->post_type == 'project') {
            if ( $theme_file = locate_template( array ( 'archive-project.php' ) ) ) {
                $archive_template = $theme_file;
            } else {
                $archive_template = ENOVATHEMES_ADDONS . 'project/archive-project.php';
            }
        }
        return $archive_template;
    }
    add_filter( "archive_template", "enovathemes_addons_project_archive_template", 20 );

    function enovathemes_addons_project_taxonomy_template($taxonomy_template) {
        if (is_tax('project-category') || is_tax('project-tag')) {

            if ( $theme_file = locate_template( array ( 'taxonomy-project.php' ) ) ) {
                $taxonomy_template = $theme_file;
            } else {

                $taxonomy_template = ENOVATHEMES_ADDONS . 'project/taxonomy-project.php';
            }

        }
        return $taxonomy_template;
    }
    add_filter( "taxonomy_template", "enovathemes_addons_project_taxonomy_template", 20 );


    function enovathemes_addons_header_single_template($single_template) {
        global $post;
        if ($post->post_type == 'header') {
            if ( $theme_file = locate_template( array ( 'single-header.php' ) ) ) {
                $single_template = $theme_file;
            } else {
                $single_template = ENOVATHEMES_ADDONS . 'templates/single-header.php';
            }
        }
        return $single_template;
    }
    add_filter( "single_template", "enovathemes_addons_header_single_template", 20 );

    function enovathemes_addons_megamenu_single_template($single_template) {
        global $post;
        if ($post->post_type == 'megamenu') {
            if ( $theme_file = locate_template( array ( 'single-megamenu.php' ) ) ) {
                $single_template = $theme_file;
            } else {
                $single_template = ENOVATHEMES_ADDONS . 'templates/single-megamenu.php';
            }
        }
        return $single_template;
    }
    add_filter( "single_template", "enovathemes_addons_megamenu_single_template", 20 );

    function enovathemes_addons_footer_single_template($single_template) {
        global $post;
        if ($post->post_type == 'footer') {
            if ( $theme_file = locate_template( array ( 'single-footer.php' ) ) ) {
                $single_template = $theme_file;
            } else {
                $single_template = ENOVATHEMES_ADDONS . 'templates/single-footer.php';
            }
        }
        return $single_template;
    }
    add_filter( "single_template", "enovathemes_addons_footer_single_template", 20 );

    function enovathemes_addons_title_section_single_template($single_template) {
        global $post;
        if ($post->post_type == 'title_section') {
            if ( $theme_file = locate_template( array ( 'single-title-section.php' ) ) ) {
                $single_template = $theme_file;
            } else {
                $single_template = ENOVATHEMES_ADDONS . 'templates/single-title-section.php';
            }
        }
        return $single_template;
    }
    add_filter( "single_template", "enovathemes_addons_title_section_single_template", 20 );

    add_filter( 'woocommerce_locate_template', 'enovathemes_addons_woocommerce_locate_template', 10, 3 );
    function enovathemes_addons_woocommerce_locate_template( $template, $template_name, $template_path ) {
      global $woocommerce;

      $_template = $template;

      if ( ! $template_path ) $template_path = $woocommerce->template_url;

      $plugin_path  = ENOVATHEMES_ADDONS . '/woocommerce/';

      // Look within passed path within the theme - this is priority
      $template = locate_template(

        array(
          $template_path . $template_name,
          $template_name
        )
      );

      // Modification: Get the template from this plugin, if it exists
      if ( ! $template && file_exists( $plugin_path . $template_name ) )
        $template = $plugin_path . $template_name;

      // Use default template
      if ( ! $template )
        $template = $_template;

      // Return what we found
      return $template;
    }

?>