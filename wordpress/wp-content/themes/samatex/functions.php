<?php

/* Constantas
---------------*/
    
    define('SAMATEX_ENOVATHEMES_TEMPPATH', get_template_directory_uri());
    define('SAMATEX_ENOVATHEMES_IMAGES', SAMATEX_ENOVATHEMES_TEMPPATH. "/images");
    define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

    function samatex_enovathemes_global_variables(){
        global $samatex_enovathemes, $woocommerce, $post, $product, $wp_query, $query_string;
    }

/* Includes
---------------*/

    if (!class_exists('TGM_Plugin_Activation') && file_exists( get_template_directory() . '/includes/class-tgm-plugin-activation.php' ) ) {
        require_once(get_template_directory() . '/includes/class-tgm-plugin-activation.php');
    }

    if (defined( 'WPB_VC_VERSION' )) {
        require_once(get_template_directory() . '/includes/enovathemes_vc.php' );
    }

    require_once(get_template_directory() . '/includes/enovathemes-functions.php');
    require_once(get_template_directory() . '/includes/menu/custom-menu.php' );
    require_once(get_template_directory() . '/includes/dynamic-styles.php');
    
    if (class_exists('OCDI_Plugin')) {

        add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
        add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

        function samatex_enovathemes_intro_text( $default_text ) {
            $default_text = '<br><br><div class="ocdi__intro-text custom-intro-text">
            <h2 class="about-description">
            '.esc_html__( "Importing demo data (post, pages, images, theme settings, ...) is the easiest way to setup your theme.", "samatex" ).'
            '.esc_html__( "It will allow you to quickly edit everything instead of creating content from scratch.", "samatex" ).'
            </h2>
            <hr>
            <h3>'.esc_html__( "Important things to know before starting demo import", "samatex" ).'</h3><br><br>
            <ul>
            <li>'.esc_html__( "No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.", "samatex" ).'</li>
            <li>'.esc_html__( "Posts, pages, images, widgets, menus and other theme settings will get imported.", "samatex" ).'</li>
            <li>'.esc_html__( "Please click on the Import button only once and wait, it can take a couple of minutes.", "samatex" ).'</li>
            <li>'.esc_html__( "If you want to change the homepage version after import, do not import another demo, go to WordPress settings >> Reading and choose different homepage version as your front-page.", "samatex" ).'</li>
            <li>'.esc_html__( "If you want to import pages/posts/custom post type/menu etc. separately use regular WordPress importer", "samatex" ).'</li>
            <li>'.esc_html__( "Sometimes not all widgets are displayed after the import, this is known issue, you will need to replace these plugins or re-save one more time", "samatex" ).'</li>
            <li>'.esc_html__( "Sometimes not all images are imported during import process, this is known issue, you just need before import uncheck the 'Organize my uploads into month- and year-based folders' option from WordPress dashboard >> settings >> media", "samatex" ).'</li>
            </ul>
            <hr>
            <h3>'.esc_html__( "What to do after import", "samatex" ).'</h3><br><br>
            <ul>
            <li>'.esc_html__( "After import don't forget to import Revolution Slider separately from Revolution Slider settings page", "samatex" ).'</li>
            <li>'.esc_html__( "All the images will be imported with original sizes without cropping. This way your import process will be quicker and your server will have less work to do. After the import completed go to the WordPress >> Tools and use the Regenerate thumbnails plugin to crop images to theme supported sizes.", "samatex" ).'</li>
            <li>'.esc_html__( "Also change permalinks from default to whatever you want. (WordPress settings >> permalinks)", "samatex" ).'</li>
            </ul>
            <hr>
            <h3>'.esc_html__( "Troubleshooting", "samatex" ).'</h3><br>
            <p>'.esc_html__( "If you will have any issues with the import process, please update these option on your server (edit your php.ini file)", "samatex" ).' </p>
            <ul class="code">
            <li>upload_max_filesize (256M)</li>
            <li>max_input_time (300)</li>
            <li>memory_limit (256M)</li>
            <li>max_execution_time (300)</li>
            <li>post_max_size (512M)</li>
            </ul>
            <p>'.esc_html__( "These defaults are not perfect and it depends on how large of an import you are making. So the bigger the import, the higher the numbers should be.", "samatex" ).' </p>
            </div><br><br>';
            return $default_text;
        }
        add_filter( 'pt-ocdi/plugin_intro_text', 'samatex_enovathemes_intro_text' );

        function samatex_enovathemes_import_files() {
            return array(

                array(
                    'import_file_name'             => esc_html__('Full demo', 'samatex'),
                    'categories'                   => array( 'General' ),
                    'local_import_file'            => trailingslashit( get_template_directory() ) . '/demo/all.xml',
                    'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/demo/widgets.wie',
                    'local_import_redux'           => array(
                        array(
                            'file_path'   => trailingslashit( get_template_directory() ) . '/demo/options.json',
                            'option_name' => 'samatex_enovathemes',
                        ),
                    ),
                    'import_notice' => esc_html__( 'Import process can take up to 10 minutes, so please be patient and do not interrupt the import process', 'samatex' ),
                ),

            );
        }
        add_filter( 'pt-ocdi/import_files', 'samatex_enovathemes_import_files' );
    
        function samatex_enovathemes_ocdi_after_import( $selected_import ) {

            if ( 'Full demo' === $selected_import['import_file_name'] ) {

                // Set the homepage and blog page

                $home = get_page_by_title( 'Home' );
                $blog = get_page_by_title( 'Blog' );
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $home->ID );
                update_option( 'page_for_posts', $blog->ID );

                // Set default menu
                $header_menu = get_term_by('name', 'Header menu', 'nav_menu');
                $locations['header-menu'] = $header_menu->term_id;
                set_theme_mod( 'nav_menu_locations', $locations );

            }

            if ( class_exists( 'RevSlider' ) ) {
                    
                $slider_array = array(
                    get_template_directory()."/demo/auto.zip",
                    get_template_directory()."/demo/default.zip",
                    get_template_directory()."/demo/slider-2.zip",
                    get_template_directory()."/demo/slider-3.zip",
                    get_template_directory()."/demo/slider-4.zip"
                );

                $slider = new RevSlider();

                foreach($slider_array as $filepath){
                    $slider->importSliderFromPost(true,true,$filepath);  
                }

            }

            global $samatex_enovathemes;

            if ( function_exists( 'wp_update_custom_css_post' ) ) {

                $wp_custom_css_styles = Redux::getOption('samatex_enovathemes','custom-css');

                if (!empty($wp_custom_css_styles)) {
                    $core_css = wp_get_custom_css();
                    $return   =  wp_update_custom_css_post( $core_css . $wp_custom_css_styles );
                    if ( ! is_wp_error( $return ) ) {
                        Redux::setOption('samatex_enovathemes','custom-css','');
                    }
                }
            }

            Redux::setOption('samatex_enovathemes','disable-defaults',1);

            global $wpdb;

            $old_url = 'https://enovathemes.com/samatex_export/';
            $new_url = esc_url(home_url('/'));

            $posts_table = $wpdb->prefix . "posts";
            $meta_table  = $wpdb->prefix . "postmeta";

            $sql_1 = $wpdb->prepare( "UPDATE {$posts_table} SET post_content  = REPLACE (post_content, %s, '{$new_url}') ",$old_url);
            $sql_2 = $wpdb->prepare( "UPDATE {$meta_table} SET meta_value  = REPLACE (meta_value, %s, '{$new_url}') ",$old_url);
            $sql_3 = $wpdb->prepare( "UPDATE {$posts_table} SET guid  = REPLACE (guid, %s, '{$new_url}') ",$old_url);

            if (isset($old_url) && !empty($old_url) && $old_url != $new_url) {
                $wpdb->query($sql_1);
                $wpdb->query($sql_2);
                $wpdb->query($sql_3);

            }

        }
        add_action( 'pt-ocdi/after_import', 'samatex_enovathemes_ocdi_after_import' );
    }

/* TGM
---------------*/
    
    add_action( 'tgmpa_register', 'samatex_enovathemes_register_required_plugins' );
    function samatex_enovathemes_register_required_plugins() {

        $plugins = array(

            array(
                'name'      => esc_html__('Contact Form 7', 'samatex'),
                'slug'      => 'contact-form-7',
                'required'  => true,
                'dismissable' => true
            ),
            array(
                'name'      => esc_html__('One Click Demo Import', 'samatex'),
                'slug'      => 'one-click-demo-import',
                'required'  => true
            ),
            array(
                'name'      => esc_html__('Regenerate Thumbnails', 'samatex'),
                'slug'      => 'regenerate-thumbnails',
                'required'  => true,
                'dismissable' => true
            ),
            array(
                'name'      => esc_html__('Envato market master', 'samatex'),
                'slug'      => 'envato-market',
                'source'    => get_template_directory() . '/plugins/envato-market.zip',
                'required'  => true,
                'dismissable' => true
            ),
            array(
                'name'      => esc_html__('WPBakery Visual Composer', 'samatex'),
                'slug'      => 'js_composer',
                'source'    => get_template_directory() . '/plugins/js_composer.zip',
                'required'  => true,
                'version'   => '6.9'
            ),
            array(
                'name'      => esc_html__('Revolution slider', 'samatex'),
                'slug'      => 'revslider',
                'source'    => get_template_directory() . '/plugins/revslider.zip',
                'required'  => true,
                'version'   => '6.5.20'
            ),
            array(
                'name'      => esc_html__('Enovathemes add-ons', 'samatex'),
                'slug'      => 'enovathemes-addons',
                'source'    => get_template_directory() . '/plugins/enovathemes-addons.zip',
                'required'  => true,
                'version'   => '3.1'
            ),
            
        );

        $config = array(
            'id'                => 'samatex',
            'default_path'      => '',                          // Default absolute path to pre-packaged plugins
            'parent_slug'       => 'themes.php',                // Default parent menu slug
            'capability'        => 'edit_theme_options',
            'menu'              => 'install-required-plugins',  // Menu slug
            'has_notices'       => true,                        // Show admin notices or not
            'dismissable'       => false,
            'is_automatic'      => false,                       // Automatically activate plugins after installation or not
            'message'           => '',                          // Message to output right before the plugins table
            'strings'           => array(
                'page_title'                                => esc_html__( 'Install Required Plugins', 'samatex' ),
                'menu_title'                                => esc_html__( 'Install Plugins', 'samatex' ),
                'installing'                                => esc_html__( 'Installing Plugin: %s', 'samatex' ), // %1$s = plugin name
                'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'samatex' ),
                'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'samatex' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'samatex' ), // %1$s = plugin name(s)
                'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'samatex' ), // %1$s = plugin name(s)
                'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'samatex' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'samatex' ), // %1$s = plugin name(s)
                'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'samatex' ), // %1$s = plugin name(s)
                'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'samatex' ), // %1$s = plugin name(s)
                'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'samatex' ), // %1$s = plugin name(s)
                'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'samatex' ),
                'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'samatex' ),
                'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'samatex' ),
                'plugin_activated'                          => esc_html__( 'Plugin activated successfully.', 'samatex' ),
                'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'samatex' ), // %1$s = dashboard link
                'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );

        tgmpa( $plugins, $config );

    }

/* Thumbnails
---------------*/

    if ( function_exists( 'add_theme_support' ) ) {

        add_theme_support( 'post-thumbnails');

        // Grid based
        add_image_size( 'samatex_1200X720', 1200, 720, true );
        add_image_size( 'samatex_1200X556', 1200, 556, true );
        add_image_size( 'samatex_900X556', 900, 556, true );
        add_image_size( 'samatex_600X370', 600, 370, true );
        add_image_size( 'samatex_400X320', 400, 320, true );
        add_image_size( 'samatex_400X400', 400, 400, true );
        add_image_size( 'samatex_300X250', 300, 250, true );

        // Wide screen
        add_image_size( 'samatex_960X600', 960, 600, true );
        add_image_size( 'samatex_640X400', 640, 400, true );
        add_image_size( 'samatex_480X360', 480, 360, true );

        // Thumbnails
        add_image_size( 'samatex_60X97', 60, 97, true );

    }

    function samatex_enovathemes_custom_image_sizes( $sizes ) {
        
        $new_sizes = array();
        
        $added_sizes = get_intermediate_image_sizes();

        foreach( $added_sizes as $key => $value) {
            $new_sizes[$value] = $value;
        }

        $new_sizes = array_merge( $new_sizes, $sizes );
        
        return $new_sizes;
    }
    add_filter('image_size_names_choose', 'samatex_enovathemes_custom_image_sizes', 11, 1);

/* Theme Config
---------------*/

    add_action('init', 'samatex_enovathemes_init');
    function samatex_enovathemes_init() {
        add_theme_support( 'html5', array( 'gallery', 'caption' ) );
        add_theme_support( 'post-formats', array( 'aside', 'audio', 'video', 'gallery', 'link', 'quote', 'status', 'chat') );
        add_theme_support( 'automatic-feed-links' );
        add_post_type_support( 'post', 'post-formats' );
        add_post_type_support( 'page', 'excerpt' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );
    }

    if ( ! isset( $content_width ) ) {$content_width = 1200;}

    if(function_exists('vc_set_as_theme')) vc_set_as_theme(true);

    add_action( 'after_setup_theme', 'samatex_enovathemes_woocommerce_support' );
    function samatex_enovathemes_woocommerce_support() {
        load_theme_textdomain('samatex', get_template_directory() . '/languages');
        add_theme_support( 'woocommerce' );
        add_theme_support( 'title-tag' );
    }

    function samatex_enovathemes_remove_redux_news() {
        remove_meta_box( 'redux_dashboard_widget', 'dashboard', 'side' );
    } 
    add_action('wp_dashboard_setup', 'samatex_enovathemes_remove_redux_news' );

    function samatex_enovathemes_redux_menu_page_removing() {
        remove_submenu_page( 'tools.php', 'redux-about' );
    }
    add_action( 'admin_menu', 'samatex_enovathemes_redux_menu_page_removing' );


    add_filter('body_class', 'samatex_enovathemes_general_body_classes');
    function samatex_enovathemes_general_body_classes($classes) {

            global $samatex_enovathemes, $post;

            $et_img_preloader  = (isset($GLOBALS['samatex_enovathemes']['img-preload']) && $GLOBALS['samatex_enovathemes']['img-preload'] == 1) ? 'true' : 'false';
            $header_desktop_id = (isset($GLOBALS['samatex_enovathemes']['header-desktop-id']) && !empty($GLOBALS['samatex_enovathemes']['header-desktop-id'])) ? $GLOBALS['samatex_enovathemes']['header-desktop-id'] : "default";

            $custom_class = array();
            $custom_class[] = "enovathemes";
            $custom_class[] = ($et_img_preloader == "true") ? 'preloader-active' : 'preloader-inactive';
            $custom_class[] = (isset($GLOBALS['samatex_enovathemes']['custom-scroll']) && $GLOBALS['samatex_enovathemes']['custom-scroll'] == 1) ? 'custom-scroll-true' : 'custom-scroll-false';
            $custom_class[] = (isset($GLOBALS['samatex_enovathemes']['layout']) && !empty($GLOBALS['samatex_enovathemes']['layout']) ) ? 'layout-'.$GLOBALS['samatex_enovathemes']['layout'] : ' layout-wide';

            if (class_exists('Woocommerce')){

                $wishlistpage = "false";
                if (defined('YITH_WCWL')) {
                    $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
                }

                if (is_cart() || is_checkout()) {$custom_class[] = "cart-checkout";}
                if (is_account_page()) {$custom_class[] = "my-account";}
                if ($wishlistpage == "true"){$custom_class[] = "wishlist-page";}

                $woocommerce_shop_page_display = get_option( 'woocommerce_shop_page_display' );

                if ($woocommerce_shop_page_display === '') {
                    $custom_class[] = "woocommerce-layout-product";
                } elseif ($woocommerce_shop_page_display === 'subcategories') {
                    $custom_class[] = "woocommerce-layout-category";
                } elseif($woocommerce_shop_page_display === 'both') {
                    $custom_class[] = "woocommerce-layout-both";
                }

                if (class_exists('YITH_WCQV_Frontend')){

                    if (get_option('yith-wcqv-enable-mobile') == 'no') {
                       $custom_class[] = "woocommerce-quick-view-no-mob";
                    }

                }

            }

            if (is_page()) {
                $page_header_desktop_id = get_post_meta( get_the_ID(), 'enovathemes_addons_desktop_header', true );
                if ($page_header_desktop_id != 'inherit') {
                    $header_desktop_id = $page_header_desktop_id;
                }
            }

            if ($header_desktop_id != "none" && $header_desktop_id != "default"){
                
                $et_header = new WP_Query(array( 
                    'post_type'=> 'header', 
                    'p'       => $header_desktop_id
                ));
                if($et_header->have_posts()){
                    while($et_header->have_posts()) { $et_header->the_post();

                            $type             = get_post_meta($header_desktop_id, 'enovathemes_addons_header_type', true);
                            $mobile           = get_post_meta($header_desktop_id, 'enovathemes_addons_mobile', true);
                            $tablet_portrait  = get_post_meta($header_desktop_id, 'enovathemes_addons_tablet_portrait', true);
                            $tablet_landscape = get_post_meta($header_desktop_id, 'enovathemes_addons_tablet_landscape', true);
                            $desktop          = get_post_meta($header_desktop_id, 'enovathemes_addons_desktop', true);
                            $sidebar_align    = get_post_meta($header_desktop_id, 'enovathemes_addons_sidebar_align', true);

                            $mobile           = (empty($mobile)) ? "false" : "true";
                            $tablet_portrait  = (empty($tablet_portrait)) ? "false" : "true";
                            $tablet_landscape = (empty($tablet_landscape)) ? "false" : "true";
                            $desktop          = (empty($desktop)) ? "false" : "true";

                            if ($type == "sidebar") {
                                $custom_class[] = "sidebar-navigation";
                                $custom_class[] = "sidebar-navigation-".$sidebar_align;
                            }

                            if ($mobile == "true") {$custom_class[] = "mobile-hide-important";}
                            if ($tablet_portrait == "true") {$custom_class[] = "tablet-portrait-hide-important";}
                            if ($tablet_landscape == "true") {$custom_class[] = "tablet-landscape-hide-important";}
                            if ($desktop == "true") {$custom_class[] = "desktop-hide-important";}
                    }
                }
                wp_reset_query();

            }

            if (is_singular('header')) {
                $type             = get_post_meta(get_the_ID(), 'enovathemes_addons_header_type', true);
                $sidebar_align    = get_post_meta(get_the_ID(), 'enovathemes_addons_sidebar_align', true);

                if ($type == "sidebar") {
                    $custom_class[] = "sidebar-navigation";
                    $custom_class[] = "sidebar-navigation-".$sidebar_align;
                }
            }

            $classes[] = implode(" ", $custom_class);
            return $classes;
    }

    // Allow shortcodes in Contact Form 7 
    function samatex_enovathemes_shortcodes_in_cf7( $form ) {
        $form = do_shortcode( $form );
        return $form;
    }
    add_filter( 'wpcf7_form_elements', 'samatex_enovathemes_shortcodes_in_cf7' );

/* Theme actions
/*-------------*/

    /* Header
    ---------------*/
        
        function samatex_enovathemes_header(){ ?>

            <?php

                global $samatex_enovathemes;

                $header_desktop_id = (isset($GLOBALS['samatex_enovathemes']['header-desktop-id']) && !empty($GLOBALS['samatex_enovathemes']['header-desktop-id'])) ? $GLOBALS['samatex_enovathemes']['header-desktop-id'] : "default";
                $header_mobile_id  = (isset($GLOBALS['samatex_enovathemes']['header-mobile-id']) && !empty($GLOBALS['samatex_enovathemes']['header-mobile-id'])) ? $GLOBALS['samatex_enovathemes']['header-mobile-id'] : "default";

                if (class_exists('SitePress') || function_exists('pll_the_languages')){

                    $current_lang = (function_exists('pll_the_languages')) ? pll_current_language() : ICL_LANGUAGE_CODE;

                    // WPML
                    $header_desktop_id_wpml = (isset($GLOBALS['samatex_enovathemes']['header-desktop-id-wpml']) && !empty($GLOBALS['samatex_enovathemes']['header-desktop-id-wpml'])) ? $GLOBALS['samatex_enovathemes']['header-desktop-id-wpml'] : $header_desktop_id;
                    $header_mobile_id_wpml  = (isset($GLOBALS['samatex_enovathemes']['header-mobile-id-wpml']) && !empty($GLOBALS['samatex_enovathemes']['header-mobile-id-wpml'])) ? $GLOBALS['samatex_enovathemes']['header-mobile-id-wpml'] : $header_mobile_id;

                    if ($header_desktop_id_wpml != $header_desktop_id && !empty($header_desktop_id_wpml)) {
                        $header_desktop_id_wpml = explode('|', $header_desktop_id_wpml);

                        $lang_header_obj = array();

                        foreach ($header_desktop_id_wpml as $wpml_lang_header) {
                            $lang_header_set = explode(":",$wpml_lang_header);
                            $lang_header_obj[$lang_header_set[0]] = $lang_header_set[1];
                        }

                        if (array_key_exists($current_lang,$lang_header_obj)) {
                            $header_desktop_id = $lang_header_obj[$current_lang];
                        }

                    }

                    if ($header_mobile_id_wpml != $header_mobile_id && !empty($header_mobile_id_wpml)) {
                        $header_mobile_id_wpml = explode('|', $header_mobile_id_wpml);

                        $lang_header_obj = array();

                        foreach ($header_mobile_id_wpml as $wpml_lang_header) {
                            $lang_header_set = explode(":",$wpml_lang_header);
                            $lang_header_obj[$lang_header_set[0]] = $lang_header_set[1];
                        }

                        if (array_key_exists($current_lang,$lang_header_obj)) {
                            $header_mobile_id = $lang_header_obj[$current_lang];
                        }

                    }
                }

                if (is_page()) {

                    $page_header_desktop_id = get_post_meta( get_the_ID(), 'enovathemes_addons_desktop_header', true );
                    $page_header_mobile_id  = get_post_meta( get_the_ID(), 'enovathemes_addons_mobile_header', true );

                    if ($page_header_desktop_id != "inherit" && !empty($page_header_desktop_id)) {
                        $header_desktop_id = $page_header_desktop_id;
                    }

                    if ($page_header_mobile_id != "inherit" && !empty($page_header_mobile_id)) {
                        $header_mobile_id = $page_header_mobile_id;
                    }

                }

                if (is_404()) {
                  
                    $header_desktop_id = 'none';
                    $header_mobile_id = 'none';

                }

                if ($header_desktop_id == $header_mobile_id && $header_desktop_id != "default") {
                    $header_mobile_id = "none";
                }

                if ($header_mobile_id != "none" && $header_mobile_id != "default" && function_exists('enovathemes_addons_header_html')) {
                    enovathemes_addons_header_html($header_mobile_id, 'mobile');
                } elseif ($header_mobile_id == "default") {
                    samatex_enovathemes_default_header('mobile');
                }

                if ($header_desktop_id != "none" && $header_desktop_id != "default" && function_exists('enovathemes_addons_header_html')) {
                    enovathemes_addons_header_html($header_desktop_id, 'desktop');
                } elseif ($header_desktop_id == "default") {
                    samatex_enovathemes_default_header('desktop');
                }

            ?>

        <?php }
        add_action('samatex_enovathemes_header', 'samatex_enovathemes_header');

    /* Footer
    ---------------*/
        
        function samatex_enovathemes_footer(){ ?>

            <?php 

                global $samatex_enovathemes;

                $footer_id  = (isset($GLOBALS['samatex_enovathemes']['footer-id']) && !empty($GLOBALS['samatex_enovathemes']['footer-id'])) ? $GLOBALS['samatex_enovathemes']['footer-id'] : "default";

                if (class_exists('SitePress') || function_exists('pll_the_languages')){

                    $current_lang = (function_exists('pll_the_languages')) ? pll_current_language() : ICL_LANGUAGE_CODE;

                    // WPML
                    $footer_id_wpml = (isset($GLOBALS['samatex_enovathemes']['footer-id-wpml']) && !empty($GLOBALS['samatex_enovathemes']['footer-id-wpml'])) ? $GLOBALS['samatex_enovathemes']['footer-id-wpml'] : $footer_id;

                    if ($footer_id_wpml != $footer_id && !empty($footer_id_wpml)) {
                        $footer_id_wpml = explode('|', $footer_id_wpml);

                        $lang_footer_obj = array();

                        foreach ($footer_id_wpml as $wpml_lang_footer) {
                            $lang_footer_set = explode(":",$wpml_lang_footer);
                            $lang_footer_obj[$lang_footer_set[0]] = $lang_footer_set[1];
                        }

                        if (array_key_exists($current_lang,$lang_footer_obj)) {
                            $footer_id = $lang_footer_obj[$current_lang];
                        }

                    }
                   
                }

                if (is_page()) {
                    $page_footer_id = get_post_meta( get_the_ID(), 'enovathemes_addons_footer', true );

                    if ($page_footer_id != "inherit" && !empty($page_footer_id)) {
                        $footer_id = $page_footer_id;
                    }
                }

                if (is_404()) {
                  
                    $footer_id = 'none';

                }

                if ($footer_id != "none" && $footer_id != "default" && function_exists('enovathemes_addons_footer_html')) {
                    enovathemes_addons_footer_html($footer_id);
                } elseif ($footer_id == "default") {
                    samatex_enovathemes_default_footer();
                }
                
            ?>

        <?php }
        add_action('samatex_enovathemes_footer', 'samatex_enovathemes_footer');

    /* Title section
    ---------------*/
        
        function samatex_enovathemes_title_section(){ ?>

            <?php

                global $samatex_enovathemes;

                $slider           = "none";
                $title_section_id = (isset($GLOBALS['samatex_enovathemes']['title-section-id']) && !empty($GLOBALS['samatex_enovathemes']['title-section-id'])) ? $GLOBALS['samatex_enovathemes']['title-section-id'] : "default";
                $etp_title        = "";
                $etp_subtitle     = "";
                $author_text      = esc_html__('Author: %s','samatex');
                $search_text      = esc_html__('Search','samatex');
                $etp_breadcrumbs  = (function_exists('enovathemes_addons_breadcrumbs')) ? enovathemes_addons_breadcrumbs() : "";

                $blog_title_id         = (isset($GLOBALS['samatex_enovathemes']['blog-title']) && !empty($GLOBALS['samatex_enovathemes']['blog-title'])) ? $GLOBALS['samatex_enovathemes']['blog-title'] : "default";
                $blog_title_text       = (isset($GLOBALS['samatex_enovathemes']['blog-title-text']) && $GLOBALS['samatex_enovathemes']['blog-title-text']) ? $GLOBALS['samatex_enovathemes']['blog-title-text'] : 'Blog';
                $blog_subtitle_text    = (isset($GLOBALS['samatex_enovathemes']['blog-subtitle-text']) && $GLOBALS['samatex_enovathemes']['blog-subtitle-text']) ? $GLOBALS['samatex_enovathemes']['blog-subtitle-text'] : '';

                $project_title_id      = (isset($GLOBALS['samatex_enovathemes']['project-title']) && !empty($GLOBALS['samatex_enovathemes']['project-title'])) ? $GLOBALS['samatex_enovathemes']['project-title'] : "default";
                $project_title_text    = (isset($GLOBALS['samatex_enovathemes']['project-title-text']) && $GLOBALS['samatex_enovathemes']['project-title-text']) ? $GLOBALS['samatex_enovathemes']['project-title-text'] : 'Projects';
                $project_subtitle_text = (isset($GLOBALS['samatex_enovathemes']['project-subtitle-text']) && $GLOBALS['samatex_enovathemes']['project-subtitle-text']) ? $GLOBALS['samatex_enovathemes']['project-subtitle-text'] : '';

                $product_title_id      = (isset($GLOBALS['samatex_enovathemes']['product-title']) && !empty($GLOBALS['samatex_enovathemes']['product-title'])) ? $GLOBALS['samatex_enovathemes']['product-title'] : "default";
                $product_title_text    = (isset($GLOBALS['samatex_enovathemes']['product-title-text']) && $GLOBALS['samatex_enovathemes']['product-title-text']) ? $GLOBALS['samatex_enovathemes']['product-title-text'] : 'Shop';
                $product_subtitle_text = (isset($GLOBALS['samatex_enovathemes']['product-subtitle-text']) && $GLOBALS['samatex_enovathemes']['product-subtitle-text']) ? $GLOBALS['samatex_enovathemes']['product-subtitle-text'] : '';

                if (class_exists('SitePress') || function_exists('pll_the_languages')){

                    $current_lang = (function_exists('pll_the_languages')) ? pll_current_language() : ICL_LANGUAGE_CODE;

                    // WPML
                    $title_section_id_wpml = (isset($GLOBALS['samatex_enovathemes']['title-section-id-wpml']) && !empty($GLOBALS['samatex_enovathemes']['title-section-id-wpml'])) ? $GLOBALS['samatex_enovathemes']['title-section-id-wpml'] : $title_section_id;

                    if ($title_section_id_wpml != $title_section_id && !empty($title_section_id_wpml)) {
                        $title_section_id_wpml = explode('|', $title_section_id_wpml);

                        $lang_titlesection_obj = array();

                        foreach ($title_section_id_wpml as $wpml_lang_titlesection) {
                            $lang_titlesection_set = explode(":",$wpml_lang_titlesection);
                            $lang_titlesection_obj[$lang_titlesection_set[0]] = $lang_titlesection_set[1];
                        }

                        if (array_key_exists($current_lang,$lang_titlesection_obj)) {
                            $title_section_id = $lang_titlesection_obj[$current_lang];
                        }

                    }
                   
                }

                /* Page
                ---------------*/

                    if (is_page()) {

                        $page_slider                 = get_post_meta( get_the_ID(), 'enovathemes_addons_slider', true );
                        $page_title_section_id       = get_post_meta( get_the_ID(), 'enovathemes_addons_title_section', true );
                        $page_title_section_subtitle = get_post_meta( get_the_ID(), 'enovathemes_addons_subtitle', true );

                        $etp_title     = get_the_title( get_the_ID() );
                        $etp_subtitle  = $page_title_section_subtitle;

                        if (!empty($page_slider)) {
                            $slider = $page_slider;
                        }

                        if ($page_title_section_id != "inherit" && !empty($page_title_section_id)) {
                            $title_section_id = $page_title_section_id;
                        }

                        if (!empty($page_title_section_subtitle)) {
                            $title_section_subtitle = $page_title_section_subtitle;
                        }

                    }

                /* Blog
                ---------------*/

                    if (is_home() || is_singular('post')) {
                        $etp_title     = $blog_title_text;
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }elseif (is_category()) {
                        $etp_title     = single_cat_title('', false);
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }elseif (is_tag()) {
                        $etp_title     = single_tag_title('', false);
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }elseif (is_day()) {
                        $etp_title     = get_the_date('F dS Y');
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }elseif (is_month()) {
                        $etp_title     = get_the_date('Y, F');
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }elseif (is_year()) {
                        $etp_title     = get_the_date('Y');
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }elseif (is_author()) {
                        $userdata      = get_userdata($GLOBALS['author']);
                        $author        = (!empty($userdata->first_name) && !empty($userdata->last_name)) ? esc_attr($userdata->first_name)." ".esc_attr($userdata->last_name) : $userdata->user_login;
                        $etp_title     = sprintf($author_text, $author);
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }elseif ( is_search()) {
                        $etp_title     = $search_text;
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }elseif ( is_tax() ) {
                        $etp_title     = single_cat_title('', false);
                        $etp_subtitle  = $blog_subtitle_text;
                        if ($blog_title_id != "inherit") {
                            $title_section_id = $blog_title_id;
                        }
                    }

                /*  CPT
                -------------------*/

                    if (!is_search()  && !is_404()) {

                        $post_info = get_post(get_the_ID());

                        if (!is_wp_error($post_info)) {

                            $post_type   = $post_info->post_type;

                            if ($post_type != 'post' && $post_type != 'page') {
                                switch ($post_type) {
                                    case 'project':
                                        $etp_title     = $project_title_text;
                                        $etp_subtitle  = $project_subtitle_text;
                                        if ($project_title_id != "inherit") {
                                            $title_section_id = $project_title_id;
                                        }
                                        break;
                                    case 'product':
                                        $etp_title     = $product_title_text;
                                        $etp_subtitle  = $product_subtitle_text;
                                        if ($product_title_id != "inherit") {
                                            $title_section_id = $product_title_id;
                                        }                                        
                                        break;
                                    default :
                                        $etp_title     = ucfirst(get_post_type( get_the_ID() ));
                                        $etp_subtitle  = '';
                                        if ($blog_title_id != "inherit") {
                                            $title_section_id = $blog_title_id;
                                        }
                                        break;
                                }

                                if ( is_tax() ) {
                                    $etp_title = single_cat_title('', false);
                                }
                            }
                            
                        }

                    }

                if (is_404()) {
                    $title_section_id = "none";
                }
            ?>

            <?php if(shortcode_exists("rev_slider") && $slider != "none" && !empty($slider)): ?>
                <?php echo(do_shortcode('[rev_slider '.$slider.']')); ?>
            <?php else: ?>

                <?php
                    if ($title_section_id != "none" && $title_section_id != "default" && function_exists('enovathemes_addons_title_section_html')) {
                        enovathemes_addons_title_section_html($title_section_id, $etp_title, $etp_subtitle, $etp_breadcrumbs);
                    } elseif ($title_section_id == "default") {
                        samatex_enovathemes_default_title_section($etp_title, $etp_subtitle, $etp_breadcrumbs);
                    }

                ?>

            <?php endif ?>

        <?php }
        add_action('samatex_enovathemes_title_section', 'samatex_enovathemes_title_section');

    /* Move top
    ---------------*/

        function samatex_enovathemes_move_top(){ ?>
            <?php global $samatex_enovathemes; ?>
            <?php if ((isset($GLOBALS['samatex_enovathemes']['mtt']) && $GLOBALS['samatex_enovathemes']['mtt'] == 1)): ?>
                <a id="to-top" href="#wrap"></a>
            <?php endif ?>
        <?php }
        add_action('samatex_enovathemes_move_top', 'samatex_enovathemes_move_top');

    /* Page comments
    ---------------*/

        function samatex_enovathemes_page_comments(){
            if (class_exists('Woocommerce')){

                $add_comment_template = "true";

                $wishlistpage = "false";
                if (defined('YITH_WCWL')) {
                    $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
                }

                if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                    $add_comment_template = "false";
                }

                if ($add_comment_template == "true") {
                    comments_template();
                }
                
            } else {

                $add_comment_template = "true";

                if ($add_comment_template == "true" &&  comments_open( get_the_ID() )) {
                    comments_template();
                }

            }
        }
        add_action('samatex_enovathemes_after_page_body', 'samatex_enovathemes_page_comments');
    
    /* Page container after/before
    ---------------*/

        function samatex_enovathemes_woocommerce_page_container_before(){
            if (class_exists('Woocommerce')){

                $wishlistpage = "false";
                if (defined('YITH_WCWL')) {
                    $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
                }

                if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                    echo '<div class="product-layout product-container-boxed">';
                }
                
            }
        }
        add_action('samatex_enovathemes_before_page_container', 'samatex_enovathemes_woocommerce_page_container_before');
        

        function samatex_enovathemes_woocommerce_page_container_after(){
            if (class_exists('Woocommerce')){

                $wishlistpage = "false";
                if (defined('YITH_WCWL')) {
                    $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
                }

                if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                    echo '</div>';
                }
                
            }
        }
        add_action('samatex_enovathemes_after_page_container', 'samatex_enovathemes_woocommerce_page_container_after');

/* Menu
---------------*/

    function samatex_enovathemes_register_menu() {

        register_nav_menus(
            array(
              'header-menu' => esc_html__( 'Header menu', 'samatex' ),
            )
        );

    }
    add_action( 'after_setup_theme', 'samatex_enovathemes_register_menu' );

/* Widget areas
---------------*/

    add_action( 'widgets_init', 'samatex_enovathemes_register_sidebars' );
    function samatex_enovathemes_register_sidebars() {

        if ( function_exists( 'register_sidebar' ) ){

            global $samatex_enovathemes;

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Blog widgets', 'samatex'),
                'id'            => 'blog-widgets',
                'description'   => esc_html__('Add your blog widgets here. This is the main blog widget area. It is visible only in blog archive pages.', 'samatex'),
                'class'         => 'blog-widgets',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Blog single post page widgets', 'samatex'),
                'id'            => 'blog-single-widgets',
                'description'   => esc_html__('Add your blog single post widgets here. This widget area is only visible in the single post page.', 'samatex'),
                'class'         => 'blog-single-widgets',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            if (class_exists("Woocommerce")) {
                
                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Shop widgets', 'samatex'),
                    'id'            => 'shop-widgets',
                    'description'   => esc_html__('Add your shop widgets here. This widget area is visible in shop arhive pages only.', 'samatex'),
                    'class'         => 'shop-widgets',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h5 class="widget_title">',
                    'after_title'   => '</h5>' )
                );

                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Shop single post page widgets', 'samatex'),
                    'id'            => 'shop-single-widgets',
                    'description'   => esc_html__('Add your shop single product widgets here. This widget area is only visible in single product page.', 'samatex'),
                    'class'         => 'shop-single-widgets',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h5 class="widget_title">',
                    'after_title'   => '</h5>' )
                );

            }
        }   
    }

/* Woo Commerce
---------------*/

    if (class_exists('Woocommerce')){

        /* Show mini cart on cart and checkout
        ---------------*/

            add_filter( 'woocommerce_widget_cart_is_hidden', 'samatex_enovathemes_always_show_cart', 40, 0 );
            function samatex_enovathemes_always_show_cart() {
                return false;
            }

        /* Remove default styling
        ---------------*/

            add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

        /* Woocommerce gallery sypport
        ---------------*/

            add_action( 'after_setup_theme', 'samatex_enovathemes_setup' );
            function samatex_enovathemes_setup() {
                add_theme_support( 'wc-product-gallery-zoom' );
                add_theme_support( 'wc-product-gallery-lightbox' );
                add_theme_support( 'wc-product-gallery-slider' );
            }

        /* Woocommerce image sizes
        ---------------*/

            add_theme_support( 'woocommerce', array(
                'thumbnail_image_width'         => 600,
                'gallery_thumbnail_image_width' => 106,
                'single_image_width'            => 600,
            ));

            add_filter( 'woocommerce_get_image_size_gallery_thumbnail', 'samatex_enovathemes_change_shop_thumbnail' );
            function samatex_enovathemes_change_shop_thumbnail( $size ) {
                return array(
                    'width'  => 106,
                    'height' => 106,
                    'crop'   => 1,
                );
            }
        
        /* Add to cart
        ---------------*/

            add_filter('woocommerce_add_to_cart_fragments', 'samatex_enovathemes_add_to_cart');
            function samatex_enovathemes_add_to_cart( $fragments ) {
                
                global $woocommerce;

                ob_start(); ?>
                <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php echo esc_attr__('View your shopping cart', 'samatex'); ?>">
                    <span class="cart-title"><?php echo esc_html__('Cart','samatex'); ?></span>
                    <span class="cart-total"><?php echo samatex_enovathemes_output_html($GLOBALS['woocommerce']->cart->get_cart_total()); ?></span>
                    <span class="cart-info"><?php echo esc_attr($GLOBALS['woocommerce']->cart->cart_contents_count); ?></span>
                </a>
                <?php

                $fragments['a.cart-contents'] = ob_get_clean();
                return $fragments;

            }

        /* Custom placeholder
        ---------------*/

            add_action( 'init', 'samatex_enovathemes_custom_placeholder' );
            function samatex_enovathemes_custom_placeholder() {
                add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
                function custom_woocommerce_placeholder_img_src( $src ) {
                    $src = SAMATEX_ENOVATHEMES_IMAGES . '/placeholder.jpg';
                    return $src;
                }
            }

        /* Shop loop
        ---------------*/

            remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
            remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
            remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
            remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
            remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

            /* Shop title
            ---------------*/

                add_filter( 'woocommerce_show_page_title' , 'samatex_enovathemes_woo_hide_page_title' );
                function samatex_enovathemes_woo_hide_page_title() {
                    return false;
                }

            /* Shop filter
            ---------------*/

                add_action( 'woocommerce_before_shop_loop', 'samatex_enovathemes_before_shop_loop_open', 15 );
                function samatex_enovathemes_before_shop_loop_open() {
                    global $samatex_enovathemes;

                    $product_ajax_filter           = (isset($GLOBALS['samatex_enovathemes']['product-filter']) && $GLOBALS['samatex_enovathemes']['product-filter'] == 1) ? "true" : "false";
                    $products_per_page             = (isset($GLOBALS['samatex_enovathemes']['product-per-page']) && !empty($GLOBALS['samatex_enovathemes']['product-per-page'])) ? $GLOBALS['samatex_enovathemes']['product-per-page'] : get_option( 'posts_per_page' );
                    $product_post_category_filder  = (isset($GLOBALS['samatex_enovathemes']['product-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['product-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['product-post-category-filter'] : array();
                    $woocommerce_shop_page_display = get_option( 'woocommerce_shop_page_display' );
                    $paged                         = (get_query_var('page')) ? get_query_var('page') : 1; ?>

                    <div class="woocommerce-before-shop-loop et-clearfix">
                    <?php

                        if ($product_ajax_filter == "true" && (!is_product_category() && !is_product_tag() && !is_search()) && $woocommerce_shop_page_display != "subcategories" && $woocommerce_shop_page_display != "both"){
                            if (function_exists('enovathemes_addons_term_filter')) {


                                $query_options = array( 
                                    'post_type'           => 'product',
                                    'post_status'         => 'publish',
                                    'ignore_sticky_posts' => true,
                                    'posts_per_page'      => -1, 
                                    'tax_query'           => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'slug',
                                            'terms'    => $product_post_category_filder,
                                            'operator' => 'IN'
                                        )
                                    )
                                );

                                $product_exluded_array = array();

                                $product_exluded = new WP_Query($query_options);

                                if($product_exluded->have_posts()){
                                    while ($product_exluded->have_posts() ) {
                                        $product_exluded->the_post();
                                        array_push($product_exluded_array, get_the_ID());
                                    }
                                    wp_reset_postdata();
                                }

                                $options = array(
                                    'post_type'      => 'product',
                                    'term'           => 'product_cat',
                                    'posts_per_page' => $products_per_page,
                                    'exclude'        => $product_post_category_filder,
                                    'excluded_posts_num' => sizeof($product_exluded_array),
                                    'default_filter' => 'all',
                                    'shortcode'      => false,
                                    'order'          => '',
                                    'orderby'        => '',
                                    'only_parent'    => '1',
                                );



                                echo enovathemes_addons_term_filter($options);
                            }
                        } else {
                            add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
                            add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
                        }
                }

                add_action( 'woocommerce_before_shop_loop', 'samatex_enovathemes_before_shop_loop_close', 40 );
                function samatex_enovathemes_before_shop_loop_close() {?>

                    </div>

                <?php }

            /* Shop loop item
            ---------------*/

                remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
                remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

                add_action( 'woocommerce_before_shop_loop_item', 'samatex_enovathemes_loop_product_inner_open', 10 );
                function samatex_enovathemes_loop_product_inner_open() { ?>

                    <?php 
                        global $samatex_enovathemes;
                        $product_image_effect = (isset($GLOBALS['samatex_enovathemes']['product-image-effect']) && $GLOBALS['samatex_enovathemes']['product-image-effect']) ? $GLOBALS['samatex_enovathemes']['product-image-effect'] : "overlay-none";
                    ?>

                    <div class="post-inner et-item-inner et-clearfix">

                        <div class="post-inner-wrapper">

                            <?php if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){ ?>
                                <div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>
                            <?php } ?>

                            <?php if ($product_image_effect == "transform"): ?>
                                <div class="overlay-hover">
                            <?php endif ?>

                <?php }

                    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
                    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

                    add_action( 'woocommerce_before_shop_loop_item_title', 'samatex_enovathemes_loop_product_thumbnail', 10 );
                    function samatex_enovathemes_loop_product_thumbnail() { ?>

                        <?php
                            global $post, $product, $samatex_enovathemes;

                            $product_image_full   = (isset($GLOBALS['samatex_enovathemes']['product-image-full']) && $GLOBALS['samatex_enovathemes']['product-image-full'] == 1) ? "true" : "false";
                            $product_image_effect = (isset($GLOBALS['samatex_enovathemes']['product-image-effect']) && $GLOBALS['samatex_enovathemes']['product-image-effect']) ? $GLOBALS['samatex_enovathemes']['product-image-effect'] : "overlay-none";

                            $product_id = $product->get_id();
                            $thumb_size = 'shop_catalog';

                            if ($product_image_full == "true") {
                                $thumb_size = 'full';
                            }

                            $image_class = array();

                            $image_class[] = 'post-image';
                            $image_class[] = 'post-media';

                            if ($product_image_effect != "transform") {
                                $image_class[] = 'overlay-hover';
                            }

                        ?>
                        
                        <div class="<?php echo implode(' ', $image_class); ?>">

                            <?php if (defined('YITH_WCWL')): ?>
                                <?php  echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                            <?php endif ?>

                            <?php if ( $product->is_on_sale() ) : ?>
                                <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'samatex' ) . '</span>', $post, $product ); ?>
                            <?php endif;?>
                            
                            <?php if (class_exists('YITH_WCQV_Frontend')): ?>
                                <?php if (get_option('yith-wcqv-enable') == 'yes'): ?>
                                    <?php echo '<a href="#" class="et-button yith-wcqv-button product-single-button product-quick-view medium" data-product_id="' . $product_id . '" title="'.esc_attr__("Product quick view", 'samatex').'">' . esc_html__("Quick view", 'samatex') . '</a>'; ?>
                                <?php endif ?>
                            <?php endif ?>

                            <?php if ($product_image_effect != "overlay-none"): ?>
                                <?php echo samatex_enovathemes_post_image_overlay($product_id); ?>
                                <div class="image-container visible">
                                    <div class="image-loading"></div>
                                    <div class="image-preloader"></div>
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id( $product_id ), $thumb_size,false); ?>
                                    <?php else: ?>
                                        <?php echo wc_placeholder_img($thumb_size); ?>
                                    <?php endif ?>
                                </div>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>" >
                                    <div class="product-image-gallery">
                                        <div class="image-container visible">
                                            <div class="image-loading"></div>
                                            <div class="image-preloader"></div>
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php echo wp_get_attachment_image(get_post_thumbnail_id( $product_id ), $thumb_size,false); ?>
                                            <?php else: ?>
                                                <?php echo wc_placeholder_img($thumb_size); ?>
                                            <?php endif ?>
                                        </div>
                                        <?php $product_gallery_ids = $product->get_gallery_image_ids(); ?>
                                        <?php if (is_array($product_gallery_ids) && !empty($product_gallery_ids)): ?>
                                            <?php foreach ($product_gallery_ids as $image_id): ?>
                                                <?php echo wp_get_attachment_image($image_id,$thumb_size,false); ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                </a>
                            <?php endif ?>

                        </div>

                    <?php }

                    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

                    add_action( 'woocommerce_shop_loop_item_title', 'samatex_enovathemes_loop_product_title', 10 );
                    function samatex_enovathemes_loop_product_title() { ?>
                        <div class="post-body et-clearfix">
                            <div class="post-body-inner-wrap">
                                <div class="post-body-inner">
                                    <h4 class="post-title et-clearfix">
                                        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr__("Read more avbout", 'samatex').' '.the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a>
                                    </h4>
                    <?php }

                add_action( 'woocommerce_after_shop_loop_item', 'samatex_enovathemes_loop_product_inner_close', 20 );
                function samatex_enovathemes_loop_product_inner_close() { ?>

                                        <?php 
                                            global $samatex_enovathemes;
                                            $product_image_effect = (isset($GLOBALS['samatex_enovathemes']['product-image-effect']) && $GLOBALS['samatex_enovathemes']['product-image-effect']) ? $GLOBALS['samatex_enovathemes']['product-image-effect'] : "overlay-none";
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <?php if ($product_image_effect == "transform"): ?>
                                </div>
                            <?php endif ?>

                        </div>

                    </div>
                <?php }

            /* Shop navigation
            ---------------*/

                add_action('init','samatex_enovathemes_woocommerce_pagination_init');
                function samatex_enovathemes_woocommerce_pagination_init(){

                    global $samatex_enovathemes;

                    $product_navigation = (isset($GLOBALS['samatex_enovathemes']['product-navigation']) && $GLOBALS['samatex_enovathemes']['product-navigation']) ? $GLOBALS['samatex_enovathemes']['product-navigation'] : "pagination";
                    if ($product_navigation == 'loadmore' || $product_navigation == 'scroll') {
                        remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
                        add_action( 'woocommerce_after_shop_loop', 'samatex_enovathemes_woocommerce_pagination', 10 );
                        function samatex_enovathemes_woocommerce_pagination() {

                            global $samatex_enovathemes;

                            $product_navigation = (isset($GLOBALS['samatex_enovathemes']['product-navigation']) && $GLOBALS['samatex_enovathemes']['product-navigation']) ? $GLOBALS['samatex_enovathemes']['product-navigation'] : "pagination";
                            
                            if (function_exists('enovathemes_addons_ajax_nav')) {
                                echo enovathemes_addons_ajax_nav($product_navigation,'product');
                            } else {
                                echo samatex_enovathemes_post_nav_num('product');
                            }
                        }

                    }

                }

        /* Category
        ---------------*/

            function samatex_enovathemes_category_class( $classes, $class, $category= null ){
                $classes[] = 'et-item post';
                return $classes;
            }
            add_filter( 'product_cat_class', 'samatex_enovathemes_category_class', 10, 3 );

            remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
            remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10);

            remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
            add_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
            if ( ! function_exists( 'woocommerce_template_loop_category_title' ) ) {
                function woocommerce_template_loop_category_title( $category ) { ?>
                    <h4 class="woocommerce-loop-category__title post-title">
                        <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" title="<?php echo esc_attr__("View ", 'samatex').' '.esc_attr( $category->name ); ?>">
                        <?php
                            echo esc_attr($category->name);
                            if ( $category->count > 0 ){
                                echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
                            }
                        ?>
                        </a>
                    </h4>

                <?php }
            }

            function samatex_enovathemes_before_subcategory($category){ ?>
                <div class="post-inner et-item-inner et-clearfix">
                    <div class="post-image post-media">
                        <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" title="<?php echo esc_attr__("View ", 'samatex').' '.esc_attr( $category->name ); ?>">
                            <div class="image-container visible">
                                <div class="image-loading"></div>
                                <div class="image-preloader"></div>
            <?php }
            add_filter( 'woocommerce_before_subcategory', 'samatex_enovathemes_before_subcategory', 10, 2);

            
                    
            add_filter( 'woocommerce_before_subcategory_title', 'samatex_enovathemes_before_subcategory_title', 10, 2 );
            function samatex_enovathemes_before_subcategory_title(){ ?>
                            </div>
                        </a>
                    </div>
                    <div class="post-body et-clearfix">
                        <div class="post-body-inner-wrap">
                            <div class="post-body-inner">
            <?php }

            add_filter( 'woocommerce_after_subcategory_title', 'samatex_enovathemes_after_subcategory_title', 10, 2 );
            function samatex_enovathemes_after_subcategory_title(){ ?>
                            </div>
                        </div>
                    </div>

            <?php }

            function samatex_enovathemes_after_subcategory(){ ?>      
                </div>
            <?php }
            add_filter( 'woocommerce_after_subcategory', 'samatex_enovathemes_after_subcategory', 10, 2 );

        /* Single product
        ---------------*/

            add_action( 'woocommerce_before_single_product_summary', 'samatex_enovathemes_single_product_wrapper_open', 5 );
            function samatex_enovathemes_single_product_wrapper_open() {?>
                <div class="single-product-wrapper et-clearfix">
            <?php }

                remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

                

                add_action( 'woocommerce_single_product_summary', 'samatex_enovathemes_single_product_before_title', 2 );
                function samatex_enovathemes_single_product_before_title(){ ?>
                    <div class="single-title-wrapper et-clearfix">
                <?php }

                add_action( 'woocommerce_single_product_summary', 'samatex_enovathemes_single_product_after_title', 6 );
                function samatex_enovathemes_single_product_after_title(){ ?>
                    </div>
                <?php }

                add_action('init', 'samatex_enovathemes_single_product');
                function samatex_enovathemes_single_product(){

                    global $samatex_enovathemes;
                    
                    $product_single_social  = (isset($GLOBALS['samatex_enovathemes']['product-single-social']) && $GLOBALS['samatex_enovathemes']['product-single-social'] == 1) ? "true" : "false";

                    if ($product_single_social == "true") {
                        add_filter( 'woocommerce_product_meta_end', 'samatex_enovathemes_woocommerce_product_meta_end', 5, 2 );
                        function samatex_enovathemes_woocommerce_product_meta_end(){ ?>
                            <?php echo enovathemes_addons_post_social_share('post-social-share'); ?>
                        <?php }
                    }

                }

            add_action( 'woocommerce_after_single_product_summary', 'samatex_enovathemes_single_product_wrapper_close', 5 );
            function samatex_enovathemes_single_product_wrapper_close() {?>
                </div>
            <?php }

            remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
            add_action( 'woocommerce_review_before', 'samatex_enovathemes_woocommerce_review_display_gravatar', 10 );
            function samatex_enovathemes_woocommerce_review_display_gravatar( $comment ) {
                echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '72' ), '' );
            }

            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
            add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 );

    }

/* Scripts
---------------*/

    function samatex_enovathemes_scripts_styles_general() {
            
        global $samatex_enovathemes;

        wp_enqueue_style('samatex-style', get_stylesheet_uri() );

        wp_enqueue_style( 'samatex-default-fonts', samatex_enovathemes_fonts_url(), array(), '1.0.0' );

        if (isset($GLOBALS['samatex_enovathemes']['disable-defaults']) && $GLOBALS['samatex_enovathemes']['disable-defaults'] == 1) {
            wp_dequeue_style( 'samatex-default-fonts' );
        }

        if ( is_singular() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
        
        wp_enqueue_script( 'modernizr', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/modernizr.js', array(), false);

        if (isset($GLOBALS['samatex_enovathemes']['smooth-scroll']) && $GLOBALS['samatex_enovathemes']['smooth-scroll'] == 1) {
            wp_enqueue_script( 'smoothpagescroll', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/smoothPageScroll.min.js', array('jquery'), '', true);
        }

        // dequeue
        wp_dequeue_style( 'yith-wcwl-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
        wp_deregister_style( 'woocommerce_prettyPhoto_css' );
            
    }

    function samatex_enovathemes_scripts() {

        global $samatex_enovathemes,$wp_query;

        if (isset($GLOBALS['samatex_enovathemes']['google-map-api']) && !empty($GLOBALS['samatex_enovathemes']['google-map-api'])) {
            wp_enqueue_script( 'samatex-gmap', '//maps.google.com/maps/api/js?key='.esc_attr($GLOBALS['samatex_enovathemes']['google-map-api']), array(), false);
        }

        wp_enqueue_script( 'imagesloaded');
        wp_enqueue_script( 'hoverIntent');

        wp_enqueue_script( 'plyr', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/plyr.min.js', array('jquery'), '', true);

        if (!is_admin()) {

            wp_enqueue_script( 'jquery-masonry');

            if (isset($GLOBALS['samatex_enovathemes']['combine-scripts']) && $GLOBALS['samatex_enovathemes']['combine-scripts'] == 1) {
                wp_enqueue_script( 'controller', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/controller-combined.js', array('jquery'), '', true);
            } else {
                wp_enqueue_script( 'nice-scroll', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/nice-scroll.js', array('jquery'), '', true);
                wp_enqueue_script( 'classie', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/classie.js', array('jquery'), '', true);
                wp_enqueue_script( 'waypoint', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/waypoint.js', array('jquery'), '', true);
                wp_enqueue_script( 'easing', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/easing.js', array('jquery'), '', true);
                wp_enqueue_script( 'mobile-events', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/mobile-events.js', array('jquery'), '', true);
                wp_enqueue_script( 'easy-pie-chart', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/easy-pie-chart.js', array('jquery'), '', true);
                wp_enqueue_script( 'flex-slider', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/flex-slider.js', array('jquery'), '', true);
                wp_enqueue_script( 'mousewheel', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/mousewheel.js', array('jquery'), '', true);
                wp_enqueue_script( 'from-to', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/from-to.js', array('jquery'), '', true);
                wp_enqueue_script( 'count-down', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/count-down.js', array('jquery'), '', true);
                wp_enqueue_script( 'tooltip', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/tooltip.js', array('jquery'), '', true);
                wp_enqueue_script( 'overlay-fluid', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/overlay-fluid.js', array('jquery'), '', true);
                wp_enqueue_script( 'nivolightbox', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/nivolightbox.js', array('jquery'), '', true);
                wp_enqueue_script( 'slick-carousel', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/slick-carousel.js', array('jquery'), '', true);
                wp_enqueue_script( 'footer-sticky', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/footer-sticky.js', array('jquery'), '', true);
                wp_enqueue_script( 'cookie', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/cookie.js', array('jquery'), '', true);
                wp_enqueue_script( 'typeit', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/typeit.js', array('jquery'), '', true);
                wp_enqueue_script( 'sticky-kit', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/sticky-kit.js', array('jquery'), '', true);
                wp_enqueue_script( 'owl-carousel', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/owl-carousel.js', array('jquery'), '', true);
                wp_enqueue_script( 'isotop', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/isotop.js', array('jquery'), '', true);
                wp_enqueue_script( 'photoswip', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/photoswip.js', array('jquery'), '', true);
                wp_enqueue_script( 'plyr', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/plyr.min.js', array('jquery'), '', true);
                wp_enqueue_script( 'controller', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/controller.js', array('jquery'), '', true);
            }

            $custom_scroll                    = (isset($GLOBALS['samatex_enovathemes']['custom-scroll']) && $GLOBALS['samatex_enovathemes']['custom-scroll'] == 1) ? "true" : "false";
            $custom_scroll_cursorcolor        = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-cursorcolor']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-cursorcolor'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-cursorcolor'] : '#222222';
            $custom_scroll_railcolor          = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-railcolor']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-railcolor'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-railcolor'] : '#666666'; 
            $custom_scroll_cursoropacitymin   = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-cursoropacitymin']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-cursoropacitymin'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-cursoropacitymin'] : '100';
            $custom_scroll_cursoropacitymax   = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-cursoropacitymax']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-cursoropacitymax'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-cursoropacitymax'] : '100';
            $custom_scroll_cursorwidth        = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-cursorwidth']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-cursorwidth'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-cursorwidth'] : '10';
            $custom_scroll_cursorborderradius = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-cursorborderradius']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-cursorborderradius'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-cursorborderradius'] : '5';
            $custom_scroll_scrollspeed        = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-scrollspeed']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-scrollspeed'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-scrollspeed'] : '60';
            $custom_scroll_mousescrollstep    = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-mousescrollstep']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-mousescrollstep'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-mousescrollstep'] : '40';
            $custom_scroll_mousescrollstep    = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-mousescrollstep']) && !empty($GLOBALS['samatex_enovathemes']['custom-scroll-mousescrollstep'])) ? $GLOBALS['samatex_enovathemes']['custom-scroll-mousescrollstep'] : '40';

            $project_per_page = (isset($GLOBALS['samatex_enovathemes']['project-per-page']) && !empty($GLOBALS['samatex_enovathemes']['project-per-page'])) ? $GLOBALS['samatex_enovathemes']['project-per-page'] : get_option( 'posts_per_page' );
            $product_per_page = (isset($GLOBALS['samatex_enovathemes']['product-per-page']) && !empty($GLOBALS['samatex_enovathemes']['product-per-page'])) ? $GLOBALS['samatex_enovathemes']['product-per-page'] : get_option( 'posts_per_page' );
            $post_paged       = (get_query_var('page')) ? get_query_var('page') : 1;
            $post_max         = $wp_query->max_num_pages;
            $project_max      = (empty($project_per_page)) ? $wp_query->max_num_pages : ceil($wp_query->found_posts/$project_per_page);
            $product_max      = (empty($product_per_page)) ? $wp_query->max_num_pages : ceil($wp_query->found_posts/$product_per_page);

            wp_localize_script( 
                'controller', 
                'controller_opt', 
                array(
                    'customScroll'                   => $custom_scroll, 
                    'customScrollCursorcolor'        => $custom_scroll_cursorcolor,
                    'customScrollRailcolor'          => $custom_scroll_railcolor,
                    'customScrollCursorOpacityMin'   => $custom_scroll_cursoropacitymin,
                    'customScrollCursorOpacityMax'   => $custom_scroll_cursoropacitymax,
                    'customScrollCursorWidth'        => $custom_scroll_cursorwidth,
                    'customScrollCursorBorderRadius' => $custom_scroll_cursorborderradius,
                    'customScrollScrollSpeed'        => $custom_scroll_scrollspeed,
                    'customScrollMouseScrollStep'    => $custom_scroll_mousescrollstep,
                    'postMax'                        => $post_max,
                    'projectMax'                     => $project_max,
                    'productMax'                     => $product_max,
                    'postStartPage'                  => $post_paged,
                    'postNextLink'                   => next_posts($post_max, false),
                    'projectNextLink'                => next_posts($project_max, false),
                    'productNextLink'                => next_posts($product_max, false),
                    'postNoText'                     => esc_html__("No more posts", 'samatex'),
                    'projectNoText'                  => esc_html__("No more projects", 'samatex'),
                    'productNoText'                  => esc_html__("No more products", 'samatex'),
                    'postLoadingText'                => esc_html__("Loading posts", 'samatex'),
                    'projectLoadingText'             => esc_html__("Loading projects", 'samatex'),
                    'productLoadingText'             => esc_html__("Loading products", 'samatex'),
                    'ajaxError'                      => esc_html__("Something went wrong, please try again later or contact the site administrator", "samatex"),
                    'ajaxurl'                        => admin_url( 'admin-ajax.php', 'relative' ),
                    'projectJsonUrl'                 => rest_url('wp/v2/project'),
                )
            );

            if (is_page()) {

                $one_page = get_post_meta( get_the_ID(), 'enovathemes_addons_one_page', true );

                if ($one_page == "on") {
                   
                    $one_page_speed  = ($GLOBALS['samatex_enovathemes']['one-page-speed']) ? esc_js($GLOBALS['samatex_enovathemes']['one-page-speed']) : 750;
                    $one_page_hash   = ($GLOBALS['samatex_enovathemes']['one-page-hash'] && $GLOBALS['samatex_enovathemes']['one-page-hash'] == 1) ? 'true' : 'false';
                    $one_page_filter = (isset($GLOBALS['samatex_enovathemes']['one-page-filter']) && $GLOBALS['samatex_enovathemes']['one-page-filter']) ? explode(',',esc_attr($GLOBALS['samatex_enovathemes']['one-page-filter'])) : '';
                    $et_filter_array = array();

                    if (is_array($one_page_filter)) {
                        foreach ($one_page_filter as $filter) {
                            array_push($et_filter_array, '#'.$filter.' > a');
                        }
                    }

                    wp_enqueue_script( 'samatex-single-page-nav', SAMATEX_ENOVATHEMES_TEMPPATH.'/js/single-page-nav.js', array('jquery'), '', true);
                    wp_localize_script( 
                        'samatex-single-page-nav', 
                        'single_page_nav_opt', 
                        array(
                            'speed'       => $one_page_speed,
                            'hash'        => $one_page_hash,
                            'filterArray' => (!empty($et_filter_array)) ? implode(', ', $et_filter_array) : ''
                        )
                    );

                }
            }

        }

        if (is_admin()) {
            $screen = get_current_screen();
            if (class_exists('WPBakeryShortCodesContainer') && $screen->base != 'toplevel_page_revslider') {
                wp_enqueue_script( 'plugins', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/plugins-combined.js', array('jquery'), '', true);
            }
        }

    }

    function samatex_enovathemes_admin_scripts_styles() {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_style( 'samatex-admin', SAMATEX_ENOVATHEMES_TEMPPATH . '/css/admin.css', false, '');
        wp_enqueue_script( 'samatex-admin', SAMATEX_ENOVATHEMES_TEMPPATH . '/js/admin.js', array('jquery'), '', true);
        wp_localize_script( 
            'samatex-admin', 
            'admin_opt', 
            array(
                'homeurl'            => esc_url(home_url('/')),
                'projectLoadingText' => esc_html__("Loading projects", 'samatex'),
                'projectJsonUrl'     => rest_url('wp/v2/project'),
            )
        );
        return;
    }

    add_action( 'wp_enqueue_scripts', 'samatex_enovathemes_scripts_styles_general');
    add_action( 'wp_enqueue_scripts', 'samatex_enovathemes_scripts');

    add_action('admin_enqueue_scripts','samatex_enovathemes_scripts');
    add_action('admin_enqueue_scripts','samatex_enovathemes_admin_scripts_styles');

    function samatex_enovathemes_editor_styles() {
        wp_enqueue_style('samatex-default-fonts', '//fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' );
        wp_enqueue_style( 'samatex-editor-style', SAMATEX_ENOVATHEMES_TEMPPATH . '/css/editor-style.css' );

    }
    add_action( 'enqueue_block_editor_assets', 'samatex_enovathemes_editor_styles' );
?>