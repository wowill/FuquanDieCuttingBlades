<?php

if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = "samatex_enovathemes";
$theme    = wp_get_theme();

$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => $theme->get( 'Name' ),
    'display_version'      => $theme->get( 'Version' ),
    'menu_type'            => 'submenu',
    'allow_sub_menu'       => true,
    'menu_title'           => esc_html__('Theme settings', 'enovathemes-addons'),
    'page_title'           => esc_html__('Theme settings', 'enovathemes-addons'),
    'google_api_key'       => '',
    'google_update_weekly' => true,
    'async_typography'     => true,
    'admin_bar'            => true,
    'admin_bar_icon'       => '',
    'admin_bar_priority'   => 50,
    'global_variable'      => 'samatex_enovathemes',
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => false,
    'page_priority'        => null,
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => '',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => 'enovathemes',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true
);

Redux::setArgs( $opt_name, $args );

if ( ! function_exists( 'remove_demo' ) ) {
    function remove_demo() {
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}

$inc = 123;

/* General
---------------*/
	
    Redux::setSection( $opt_name, array(
		'title'      => esc_html__('General', 'enovathemes-addons'),
		'id'         => esc_html__('sec_general', 'enovathemes-addons'),
		'icon_class' => 'icon-small',
	    'icon'       => 'el-icon-wrench',
	    'fields' => array(
	    	array(
				'id'       =>'disable-gutenberg',
				'type'     => 'switch',
				'title'    => esc_html__('Disable gutenberg', 'enovathemes-addons'),
				'subtitle' => esc_html__('By default WordPress comes with new block editor "Gutenberg". If you want classic editor or Visual Composer, make sure this option is active', 'enovathemes-addons'),
				"default"  => 1
			),
			array(
				'id'       =>'disable-gutenberg-type',
				'type'     => 'checkbox',
				'title'    => esc_html__('Choose post types to disable Gutenberg', 'enovathemes-addons'),
				'options'  => array(
			        'post' => esc_html__('Posts', 'enovathemes-addons'),
			        'page' => esc_html__('Pages', 'enovathemes-addons'),
			        'project' => esc_html__('Projects', 'enovathemes-addons'),
			        'product' => esc_html__('Products', 'enovathemes-addons'),
			        'widgets' => esc_html__('Widgets', 'enovathemes-addons'),
			    ),
			    'default' => array(
			        'post' => '0', 
			        'page' => '1', 
			        'project' => '1',
			        'widgets' => '1',
			        'product' => '0'
    			),
			    'required' => array('disable-gutenberg','equals',1)
			),
	    	array(
				'id'       =>'combine-scripts',
				'type'     => 'switch',
				'title'    => esc_html__('Combine theme scripts', 'enovathemes-addons'),
				'subtitle' => esc_html__('By default all theme scripts are enqueued separately. This is done to make possible scripts dequeuing if the user needs so. If this option is active theme loads the combined version of scripts, where all the scripts of the theme are combined in one file called controller-combined.js. With this option active user can no longer dequeue scripts, but combined scripts show better performance and higher level of speed.', 'enovathemes-addons'),
				"default"  => 1
			),
	    	array(
				'id'       =>'disable-defaults',
				'type'     => 'switch',
				'class'    => 'hidden-field',
				'title'    => esc_html__('Turn off default styling', 'enovathemes-addons'),
				"default"  => 0
			),
	    	array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Colors', 'enovathemes-addons')
			),
			array(
				'id'       =>'main-color',
				'type'     => 'color',
				'transparent' => false,
				'title'    => esc_html__('Main color', 'enovathemes-addons'),
				'default'  => '#ffd311'
			),
			array(
				'id'       =>'link-color-hover',
				'type'     => 'color',
				'title'    => esc_html__('Links color hover', 'enovathemes-addons'),
				'default'  => '#212121',
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Layout settings', 'enovathemes-addons')
			),
	    	array(
				'id'        =>'layout',
				'type'      => 'radio',
				'title'     => esc_html__('Layout', 'enovathemes-addons'), 
				'subtitle'  => esc_html__('Boxed layout allows you to display the whole website in the box. (works on screens larger than 1200px wide). Make sure your navigation is not sidebar', 'enovathemes-addons'), 
				'options'   => array(
					'wide'  => esc_html__('Wide', 'enovathemes-addons'), 
					'boxed' => esc_html__('Boxed', 'enovathemes-addons'),
				),
				'default' => 'wide',
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Site background settings', 'enovathemes-addons'),
			    'required' => array('layout','equals','boxed')
			),
	    	array(
				'id'       =>'site-background',
				'type'     => 'background',
				'title'    => esc_html__('Site background options', 'enovathemes-addons'),
				'required' => array('layout','equals','boxed')
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Footer settings', 'enovathemes-addons')
			),
			array(
				'id'   => 'warning-info-'.$inc++,
				'class'=> 'warning-info',
				'type' => 'info',
				'style' => 'warning',
				'desc' => esc_html__('Important! First you must', 'enovathemes-addons').' <a href="'.esc_url(home_url('/')).'wp-admin/post-new.php?post_type=footer">'.esc_html__("create a footer", "enovathemes-addons").'</a>'
			),
			array(
				'id'=>'footer-id',
				'type' => 'select',
				'data' => 'posts',
				'args' => array('post_type' => 'footer', 'posts_per_page' => -1),
				'title'    => esc_html__('Footer', 'enovathemes-addons'),
			),
			array(
				'id'=>'footer-id-wpml',
				'type' => 'text',
				'class'    => 'wpml-on',
				'title'    => esc_html__('WPML footer per language', 'enovathemes-addons'),
				'description'    => esc_html__('Specify footer for each language with the following format language code:footer id, separate multiple by | (example: en:7846|de:54568)', 'enovathemes-addons'),
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Header settings', 'enovathemes-addons')
			),
			array(
				'id'   => 'warning-info-'.$inc++,
				'class'=> 'warning-info',
				'type' => 'info',
				'style' => 'warning',
				'desc' => esc_html__('Important! First you must', 'enovathemes-addons').' <a href="'.esc_url(home_url('/')).'wp-admin/post-new.php?post_type=header">'.esc_html__("create a header", "enovathemes-addons").'</a>'
			),
			array(
				'id'=>'header-desktop-id',
				'type' => 'select',
				'data' => 'posts',
				'args' => array('post_type' => 'header', 'posts_per_page' => -1),
				'title'    => esc_html__('Desktop header', 'enovathemes-addons'),
			),
			array(
				'id'=>'header-desktop-id-wpml',
				'type' => 'text',
				'class'    => 'wpml-on',
				'title'    => esc_html__('WPML desktop header per language', 'enovathemes-addons'),
				'description'    => esc_html__('Specify desktop header for each language with the following format language code:header id, separate multiple by | (example: en:7846|de:54568)', 'enovathemes-addons'),
			),
			array(
				'id'=>'header-mobile-id',
				'type' => 'select',
				'data' => 'posts',
				'args' => array('post_type' => 'header', 'posts_per_page' => -1),
				'title'    => esc_html__('Mobile header', 'enovathemes-addons'),
			),
			array(
				'id'=>'header-mobile-id-wpml',
				'type' => 'text',
				'class'    => 'wpml-on',
				'title'    => esc_html__('WPML mobile header per language', 'enovathemes-addons'),
				'description'    => esc_html__('Specify mobile header for each language with the following format language code:header id, separate multiple by | (example: en:7846|de:54568)', 'enovathemes-addons'),
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Page title section settings', 'enovathemes-addons')
			),
			array(
				'id'   => 'warning-info-'.$inc++,
				'class'=> 'warning-info',
				'type' => 'info',
				'style' => 'warning',
				'desc' => esc_html__('Important! First you must', 'enovathemes-addons').' <a href="'.esc_url(home_url('/')).'wp-admin/post-new.php?post_type=title_section">'.esc_html__("create a title section", "enovathemes-addons").'</a>'
			),
			array(
				'id'=>'title-section-id',
				'type' => 'select',
				'data' => 'posts',
				'args' => array('post_type' => 'title_section', 'posts_per_page' => -1),
				'title'    => esc_html__('Page title section', 'enovathemes-addons'),
			),
			array(
				'id'=>'title-section-id-wpml',
				'type' => 'text',
				'class'    => 'wpml-on',
				'title'    => esc_html__('WPML title section per language', 'enovathemes-addons'),
				'description'    => esc_html__('Specify title section for each language with the following format language code:title section id, separate multiple by | (example: en:7846|de:54568)', 'enovathemes-addons'),
			),

			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('One page navigation settings', 'enovathemes-addons')
			),
			array(
				'id'       =>'one-page-speed',
				'type'     => 'slider',
				'title'    => esc_html__('One page scroll speed in ms', 'enovathemes-addons'),
				'min'      =>'500', 
				'max'      =>'1500', 
				'step'     =>'100',
				'default'  => '800'
			),
			array(
				'id'      =>'one-page-hash',
				'type'    => 'switch', 
				'title'   => esc_html__('One page layout hash', 'enovathemes-addons'),
				'subtitle'=> esc_html__("Toggle one page layout hash. In browsers that support the history object, update the url's hash when clicking on the links ", 'enovathemes-addons'),
				"default" => 0,
			),
			array(
				'id'       =>'one-page-filter',
				'type'     => 'text',
				'title'    => esc_html__('One page menu filter', 'enovathemes-addons'),
				'subtitle'=> esc_html__("Exclude links from one page menu by entering comma-separated menu items' ids", 'enovathemes-addons'),
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('API settings', 'enovathemes-addons')
			),
			array(
				'id'       =>'google-map-api',
				'type'     => 'text',
				'title'    => esc_html__("Google map API Key", 'enovathemes-addons'),
				'subtitle' => esc_html__("If you are not sure how to retrieve this, follow this link from Google Knowledge Base to retrieve your account's API key", 'enovathemes-addons').' <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">'.esc_html__("Retrieve your account's API key", 'enovathemes-addons').'</a>',
			),
			array(
				'id'      =>'mailchimp-api-key',
				'type'     => 'text',
				'title'    => esc_html__('Mailchimp API key', 'enovathemes-addons'),
				'subtitle' => esc_html__("If you are not sure how to retrieve this, follow this link from MailChimp Knowledge Base to retrieve your account's API key", 'enovathemes-addons').' <a href="http://kb.mailchimp.com/accounts/management/about-api-keys#Finding-or-generating-your-API-key" target="_blank">'.esc_html__("Retrieve your account's API key", 'enovathemes-addons').'</a>',
			),
			array(
				'id'       =>'flickr-api',
				'type'     => 'text',
				'title'    => esc_html__("Flickr API Key", 'enovathemes-addons'),
				'subtitle' => esc_html__("If you are not sure how to retrieve this, follow this link from Flickr Knowledge Base to retrieve your account's API key", 'enovathemes-addons').' <a href="https://www.flickr.com/services/developer/api/" target="_blank">'.esc_html__("Retrieve your account's API key", 'enovathemes-addons').'</a>',
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Move to top arrow settings', 'enovathemes-addons')
			),
			array(
				'id'       =>'mtt',
				'type'     => 'switch',
				'title'    => esc_html__('Move to top arrow', 'enovathemes-addons'),
				'subtitle' => esc_html__('Toggle this option if you want to have move to top arrow', 'enovathemes-addons'),
				"default"  => 1
			),
			array(
				'id'       =>'mtt-size',
				'type'     => 'slider',
				'title'    => esc_html__('Move to top arrow size', 'enovathemes-addons'),
				'min'      =>'32', 
				'max'      =>'150', 
				'step'     =>'1',
				'default'  =>'48',
				'required' => array('mtt','equals',1) 
			),
			array(
				'id'       =>'mtt-arrow-size',
				'type'     => 'slider',
				'title'    => esc_html__('Move to top icon size', 'enovathemes-addons'),
				'min'      =>'1', 
				'max'      =>'150', 
				'step'     =>'1',
				'default'  =>'16',
				'required' => array('mtt','equals',1)
			),
			array(
				'id'       =>'mtt-border-radius',
				'type'     => 'slider',
				'title'    => esc_html__('Move to top arrow border radius', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'150', 
				'step'     =>'1',
				'default'  =>'0',
				'required' => array('mtt','equals',1)
			),
			array(
				'id'       =>'mtt-color',
				'type'     => 'link_color',
				'active'   => false,
				'visisted' => false,
				'title'    => esc_html__('Move to top arrow icon colors', 'enovathemes-addons'),
				'default'  => array(
					'regular' => '#212121',
					'hover'   => '#000000'
				),
				'required' => array('mtt','equals',1)
			),
			array(
				'id'       =>'mtt-back-color',
				'type'     => 'link_color',
				'active'   => false,
				'visisted' => false,
				'title'    => esc_html__('Move to top arrow background colors', 'enovathemes-addons'),
				'default'  => array(
					'regular' => '#ffffff',
					'hover'   => '#ffd311'
				),
				'required' => array('mtt','equals',1)
			),
	    )
	));
	
/* CSS
---------------*/

	Redux::setSection( $opt_name, array(
		'title'      => esc_html__('CSS', 'enovathemes-addons'),
		'icon_class' => 'icon-small',
	    'icon'       => 'el-icon-star',
	    'fields'     => array(
	    	array(
	            'id'       => 'custom-css',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'class'    => 'hidden-field',
				'theme'    => 'monokai',
	            'title'    => esc_html__('Custom CSS Styles', 'enovathemes-addons'), 
	            'subtitle' => esc_html__('Enter custom css code here.', 'enovathemes-addons')
	        ),
	        array(
	            'id'       => 'custom-css-min-320',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 320px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-max-320',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(max-width: 320px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-max-479',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(max-width: 479px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-480',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 480px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-480-max-767',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 480px) and (max-width: 767px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-max-639',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(max-width: 639px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-640',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 640px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-640-max-767',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 640px) and (max-width: 767px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-max-767',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(max-width: 767px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-768',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 768px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-768-max-1023',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 768px) and (max-width: 1023px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-max-1023',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(max-width: 1023px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-1024',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 1024px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-1024-max-1279',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 1024px) and (max-width: 1279px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-max-1279',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(max-width: 1279px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-1280',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 1280px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-1280-max-1367',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 1280px) and (max-width: 1367px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-1366',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 1366px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-1366-max-1599',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 1366px) and (max-width: 1599px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-max-1599',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(max-width: 1599px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-1600',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 1600px)', 'enovathemes-addons'), 
	        ),
	        array(
	            'id'       => 'custom-css-min-1600-max-1919',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => esc_html__('(min-width: 1600px) and (max-width: 1919px)', 'enovathemes-addons'), 
	        ),
	    )
	));

/* Effects
---------------*/

	Redux::setSection( $opt_name, array(
		'title'      => esc_html__('Effects', 'enovathemes-addons'),
		'icon_class' => 'icon-small',
	    'icon'       => 'el-icon-magic',
	    'fields' => array(
	    	array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Smooth page scroll', 'enovathemes-addons')
			),
			array(
				'id'       =>'smooth-scroll',
				'type'     => 'switch',
				'title'    => esc_html__('Smooth scroll', 'enovathemes-addons'),
				'subtitle' => esc_html__('Toggle this option if you want to have smooth scroll', 'enovathemes-addons'),
				"default"  => 0
			),
	    	array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Custom scroll settings', 'enovathemes-addons')
			),
			array(
				'id'       =>'custom-scroll',
				'type'     => 'switch',
				'title'    => esc_html__('Custom scroll', 'enovathemes-addons'),
				'subtitle' => esc_html__('Toggle this option if you want to have custom nice scroll', 'enovathemes-addons'),
				"default"  => 0
			),
			array(
				'id'       =>'custom-scroll-cursorcolor',
				'type'     => 'color',
				'title'    => esc_html__('Custom scroll cursor color', 'enovathemes-addons'),
				'default'  => '#222222',
			    'required' => array('custom-scroll','equals',1)
			),
			array(
				'id'       =>'custom-scroll-railcolor',
				'type'     => 'color',
				'title'    => esc_html__('Custom scroll rail background color', 'enovathemes-addons'),
				'default'  => '#666666',
			    'required' => array('custom-scroll','equals',1)
			),
			array(
				'id'       =>'custom-scroll-cursoropacitymin',
				'type'     => 'slider',
				'title'    => esc_html__('Custom scroll cursor minimum opacity', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'100', 
				'step'     =>'10',
				'default'  =>'100',
			    'required' => array('custom-scroll','equals',1)
			),
			array(
				'id'       =>'custom-scroll-cursoropacitymax',
				'type'     => 'slider',
				'title'    => esc_html__('Custom scroll cursor maximum opacity', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'100', 
				'step'     =>'10',
				'default'  =>'100',
			    'required' => array('custom-scroll','equals',1)
			),
			array(
				'id'       =>'custom-scroll-cursorwidth',
				'type'     => 'slider',
				'title'    => esc_html__('Custom scroll cursor width', 'enovathemes-addons'),
				'min'      =>'5', 
				'max'      =>'40', 
				'step'     =>'1',
				'default'  =>'10',
			    'required' => array('custom-scroll','equals',1)
			),
			array(
				'id'       =>'custom-scroll-cursorborderradius',
				'type'     => 'slider',
				'title'    => esc_html__('Custom scroll cursor border radius', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'40', 
				'step'     =>'1',
				'default'  =>'5',
			    'required' => array('custom-scroll','equals',1)
			),
			array(
				'id'       =>'custom-scroll-scrollspeed',
				'type'     => 'slider',
				'title'    => esc_html__('Custom scroll speed', 'enovathemes-addons'),
				'min'      =>'60', 
				'max'      =>'180', 
				'step'     =>'10',
				'default'  =>'60',
			    'required' => array('custom-scroll','equals',1)
			),
			array(
				'id'       =>'custom-scroll-mousescrollstep',
				'type'     => 'slider',
				'title'    => esc_html__('Custom mousescroll step', 'enovathemes-addons'),
				'min'      =>'40', 
				'max'      =>'180', 
				'step'     =>'10',
				'default'  =>'40',
			    'required' => array('custom-scroll','equals',1)
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Custom site loading settings', 'enovathemes-addons')
			),
			array(
				'id'       =>'custom-loading',
				'type'     => 'switch',
				'title'    => esc_html__('Custom site loading', 'enovathemes-addons'),
				'subtitle' => esc_html__('Toggle this option if you want to have site loading', 'enovathemes-addons'),
				"default"  => 0
			),
			array(
				'id'       =>'custom-loading-backcolor',
				'type'     => 'color',
				'title'    => esc_html__('Custom site loading background color', 'enovathemes-addons'),
				'default'  => '#ffffff',
			    'required' => array('custom-loading','equals',1)
			),
			array(
				'id'       =>'custom-loading-color',
				'type'     => 'color',
				'title'    => esc_html__('Custom site loading color', 'enovathemes-addons'),
				'default'  => '#ffd311',
			    'required' => array('custom-loading','equals',1)
			),
			array(
				'id'       =>'loading-logo',
				'type'     => 'media', 
				'url'      => false,
				'title'    => esc_html__('Loading logo upload', 'enovathemes-addons'),
			    'required' => array('custom-loading','equals',1)
			),
			array(
				'id'       =>'loading-logo-retina',
				'type'     => 'media', 
				'url'      => false,
				'title'    => esc_html__('Loading retina logo upload', 'enovathemes-addons'),
			    'required' => array('custom-loading','equals',1)
			),
			array(
			    'id'   => 'info_normal_'.$inc++,
				'class'=> 'info-normal',
			    'type' => 'info',
			    'desc' => esc_html__('Image preload settings', 'enovathemes-addons')
			),
	    	array(
				'id'       =>'img-preload',
				'type'     => 'switch',
				'title'    => esc_html__('Image preload', 'enovathemes-addons'),
				'subtitle' => esc_html__('Refers to loop/archive pages', 'enovathemes-addons'),
				"default"  => 0
			)
	    )
	));

/* Typography
---------------*/

	Redux::setSection( $opt_name, array(
		'title'      => esc_html__('Typography', 'enovathemes-addons'),
		'icon_class' => 'icon-small',
	    'icon'       => 'el-icon-font',
	    'fields'     => array(
	    	array(
				'id'       =>'main-typo',
				'type'     => 'typography',
				'title'    => esc_html__('Main typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'text-transform' => false,
				'letter-spacing' => true,
				'font-style'     => false,
				'font-weight'    => true,
				'color'          => true,
				'text-align'     => false,
				'font-family'    => true,
				'default'     => array(
					'font-family'    => 'Nunito Sans',
			        'font-size'      => '16px', 
			        'font-weight'    => '400', 
			        'line-height'    => '32px', 
			        'letter-spacing' => '0px', 
			        'color'          => '#616161',
			    )
			),

			array(
				'id'       =>'headings-typo',
				'type'     => 'typography',
				'title'    => esc_html__('Headings typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'line-height'    => false,
				'font-style'     => false, 
				'font-size'      => false,
				'font-weight'    => true,
				'color'          => true,
				'text-align'     => false,
				'font-family'    => true,
				'default'     => array(
					'font-family'    => 'Nunito Sans',
			        'font-weight'    => '700', 
			        'letter-spacing' => '0',
			        'color'          => '#212121'
			    )
			),

			array(
				'id'       =>'h1-typo',
				'type'     => 'typography',
				'title'    => esc_html__('H1 typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'text-transform' => false,
				'letter-spacing' => false,
				'line-height'    => true,
				'font-style'     => false, 
				'font-size'      => true,
				'font-weight'    => false,
				'color'          => false,
				'text-align'     => false,
				'font-family'    => false,
				'default'     => array(
			        'font-size'   => '48px',
			        'line-height' => '56px'
			    )
			),

			array(
				'id'       =>'h2-typo',
				'type'     => 'typography',
				'title'    => esc_html__('H2 typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'text-transform' => false,
				'letter-spacing' => false,
				'line-height'    => true,
				'font-style'     => false, 
				'font-size'      => true,
				'font-weight'    => false,
				'color'          => false,
				'text-align'     => false,
				'font-family'    => false,
				'default'     => array(
			        'font-size'   => '40px',
			        'line-height' => '48px'
			    )
			),

			array(
				'id'       =>'h3-typo',
				'type'     => 'typography',
				'title'    => esc_html__('H3 typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'text-transform' => false,
				'letter-spacing' => false,
				'line-height'    => true,
				'font-style'     => false, 
				'font-size'      => true,
				'font-weight'    => false,
				'color'          => false,
				'text-align'     => false,
				'font-family'    => false,
				'default'     => array(
			        'font-size'   => '32px',
			        'line-height' => '40px'
			    )
			),

			array(
				'id'       =>'h4-typo',
				'type'     => 'typography',
				'title'    => esc_html__('H4 typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'text-transform' => false,
				'letter-spacing' => false,
				'line-height'    => true,
				'font-style'     => false, 
				'font-size'      => true,
				'font-weight'    => false,
				'color'          => false,
				'text-align'     => false,
				'font-family'    => false,
				'default'     => array(
			        'font-size'   => '24px',
			        'line-height' => '32px'
			    )
			),

			array(
				'id'       =>'h5-typo',
				'type'     => 'typography',
				'title'    => esc_html__('H5 typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'text-transform' => false,
				'letter-spacing' => false,
				'line-height'    => true,
				'font-style'     => false, 
				'font-size'      => true,
				'font-weight'    => false,
				'color'          => false,
				'text-align'     => false,
				'font-family'    => false,
				'default'     => array(
			        'font-size'   => '20px',
			        'line-height' => '28px'
			    )
			),

			array(
				'id'       =>'h6-typo',
				'type'     => 'typography',
				'title'    => esc_html__('H6 typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'text-transform' => false,
				'letter-spacing' => false,
				'line-height'    => true,
				'font-style'     => false, 
				'font-weight'    => false, 
				'font-size'      => true,
				'color'          => false,
				'text-align'     => false,
				'font-family'    => false,
				'default'     => array(
			        'font-size'   => '18px',
			        'line-height' => '26px'
			    )
			),
        )
	));

/* Forms
---------------*/

	Redux::setSection( $opt_name, array(
		'title'      => esc_html__('Forms', 'enovathemes-addons'),
		'icon_class' => 'icon-small',
	    'icon'       => 'el-icon-tasks',
	    'fields'     => array(
			array(
				'id'       =>'form-text-color',
				'type'     => 'link_color',
				'title'    => esc_html__('Forms fields text colors', 'enovathemes-addons'),
				'visited'  => false,
				'active'    => false,
				'default'  => array(
			        'regular' => '#616161',
			        'hover'   => '#616161',
			    )
			),
			array(
				'id'       =>'form-back-color',
				'type'     => 'link_color',
				'title'    => esc_html__('Forms fields background colors', 'enovathemes-addons'),
				'visited'  => false,
				'active'    => false,
				'default'   => array(
			        'regular' => '#ffffff',
			        'hover'   => '#ffffff',
			    ) 
			),
			array(
				'id'       =>'form-border-color',
				'type'     => 'link_color',
				'title'    => esc_html__('Forms fields border colors', 'enovathemes-addons'),
				'visited'  => false,
				'active'    => false,
				'default'   => array(
			        'regular' => '#e0e0e0',
			        'hover'   => '#bdbdbd',
			    ) 
			),
			array(
				'id'       =>'form-button-typo',
				'type'     => 'typography',
				'title'    => esc_html__('Button typography', 'enovathemes-addons'), 
				'units'          => 'px',
				'google'         => true,
				'subsets'        => true,
				'all_styles'     => true,
				'font-weight'    => true,
				'font-size'      => false,
				'font-family'    => true,
				'letter-spacing' => true,
				'text-transform' => true,
				'line-height'    => false,
				'font-style'     => false,
				'color'          => false,
				'text-align'     => false,
				'text-transform' => false,
				'word-spacing'   => false,
				'default'     => array(
					'font-weight'    => '700',
					'font-family'    => 'Nunito Sans',
					'letter-spacing' => '0.25px',
			    )
			),
			array(
				'id'       => 'form-button-back',
				'type'     => 'link_color',
				'active'   => false,
				'visited'  => false,
				'title'    => esc_html__('Button background colors', 'enovathemes-addons'),
				'default'  => array(
					'regular'  => '#ffd311',
					'hover'    => '#212121'
				)
			),
			array(
				'id'       =>'form-button-color',
				'type'     => 'link_color',
				'active'   => false,
				'visited'  => false,
				'title'    => esc_html__('Button text colors', 'enovathemes-addons'),
				'default'  => array(
					'regular'  => '#000000',
					'hover'    => '#ffffff'
				)
			),
		)
	));

/* Blog
---------------*/

	global $wpdb;

	$querystr = "
	    SELECT $wpdb->posts.* 
	    FROM $wpdb->posts, $wpdb->postmeta
	    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
	    AND $wpdb->posts.post_status = 'publish' 
	    AND $wpdb->posts.post_type = 'title_section'
	    ORDER BY $wpdb->posts.post_title ASC
	";

	$title_sections = $wpdb->get_results($querystr, OBJECT);

	$title_sections_array = array(
		'none'    => esc_html__( 'None', 'enovathemes-addons' ),
		'default' => esc_html__( 'Default', 'enovathemes-addons' ),
		'inherit' => esc_html__( 'Inherit', 'enovathemes-addons' ),
	);

    if($title_sections){

    	foreach ($title_sections as $title_section) {
    		$title_section_id    = $title_section->ID;
    		$title_section_title = $title_section->post_title;
    		$title_sections_array[$title_section_id] = $title_section_title;
    	}
    	
    }

	Redux::setSection( $opt_name, array(
		'title'      => esc_html__('Blog', 'enovathemes-addons'),
		'icon_class' => 'icon-small',
	    'icon'       => 'el-icon-pencil',
	    'fields' => array(
			array(
				'id'=>'blog-title',
				'type' => 'select',
				'title' => esc_html__('Choose title section', 'enovathemes-addons'),
				'options' => $title_sections_array,
				'default' => 'inherit',
			),
			array(
				'id'      =>'blog-title-text',
				'type'    => 'text',
				'title'   => esc_html__('Blog title', 'enovathemes-addons'),
				'default' => 'Blog',
			),
			array(
				'id'      =>'blog-subtitle-text',
				'type'    => 'text',
				'title'   => esc_html__('Blog subtitle', 'enovathemes-addons'),
				'default' => '',
			),
			array(
				'id'        =>'blog-sidebar',
				'type'      => 'select',
				'title'     => esc_html__('Blog sidebar position', 'enovathemes-addons'), 
				'options'   => array(
					'none'  => esc_html__('None', 'enovathemes-addons'), 
					'left'  => esc_html__('Left', 'enovathemes-addons'), 
					'right' => esc_html__('Right', 'enovathemes-addons'),
				),
				'default' => 'none',
			),
			array(
				'id'       =>'blog-navigation',
				'type'     => 'select',
				'title'    => esc_html__('Blog navigation', 'enovathemes-addons'),
				'subtitle' => esc_html__('Blog navigation', 'enovathemes-addons'),
				'options'  => array(
					'pagination'=> esc_html__('Pagination', 'enovathemes-addons'),
					'loadmore'  => esc_html__('Load more', 'enovathemes-addons'),
					'scroll'    => esc_html__('Infinite scroll', 'enovathemes-addons'),
				),
				'default'  => 'pagination'
			),
			array(
				'id'       => 'blog-post-layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Blog post layout', 'enovathemes-addons'),
				'width'    => '140', 
				'height'   => '140',
				'options'  => array(
					'grid' => array(
						'alt'   => esc_html__('Grid', 'enovathemes-addons'), 
						'title' => esc_html__('Grid', 'enovathemes-addons'), 
						'img'   => ENOVATHEMES_ADDONS_IMG.'grid.png'
					),
					'chess' => array(
						'alt'   => esc_html__('Chess', 'enovathemes-addons'), 
						'title' => esc_html__('Chess', 'enovathemes-addons'), 
						'img'   => ENOVATHEMES_ADDONS_IMG.'chess.png'
					),
					'list' => array(
						'alt'   => esc_html__('List', 'enovathemes-addons'),
						'title' => esc_html__('List', 'enovathemes-addons'),
						'img'   => ENOVATHEMES_ADDONS_IMG.'list.png'
					),
					'full' => array(
						'alt'   => esc_html__('Full', 'enovathemes-addons'), 
						'title' => esc_html__('Full', 'enovathemes-addons'), 
						'img'   => ENOVATHEMES_ADDONS_IMG.'full.png'
					),
				),
				'default' => 'grid'
			),
			array(
				'id'       =>'blog-image-full',
				'type'     => 'switch',
				'title'    => esc_html__('Use original image size (no cropping)', 'enovathemes-addons'),
				"default"  => 0,
				'required' => array('blog-post-layout','equals',array('grid'))
			),
			array(
				'id'       =>'blog-image-justify',
				'type'     => 'switch',
				'title'    => esc_html__('Justify post item width with post size', 'enovathemes-addons'),
				'subtitle' => esc_html__('If active, post item width will be justified with the post size, but the height depends on image height.', 'enovathemes-addons'),
				"default"  => 0,
			    'required' => array('blog-image-full','equals',1)
			),
			array(
				'id'      =>'blog-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__('Blog post animation effect', 'enovathemes-addons'),
				'options'  => array(
					"none"    => "None",
					"fadeIn"  => "Fade In",
					"moveUp"  => "Move Up",
				),
				'default' => "none",
				'required' => array('blog-post-layout','equals',array('grid'))
			),
			array(
				'id'      =>'blog-image-effect',
				'type'     => 'select',
				'title'    => esc_html__('Blog image hover effect', 'enovathemes-addons'),
				'options'  => array(
					"overlay-fade"               => esc_html__("Overlay fade", 'enovathemes-addons'), 
					"overlay-fade-zoom"          => esc_html__("Overlay fade with image zoom", 'enovathemes-addons'), 
					"overlay-fade-zoom-extreme"  => esc_html__("Overlay fade with extreme image zoom", 'enovathemes-addons'), 
					"overlay-move"               => esc_html__("Overlay move fluid", 'enovathemes-addons'), 
				),
				'default' => "overlay-fade"
			),
			array(
				'id'        =>'blog-meta-font-weight',
				'type'      => 'select',
				'title'     => esc_html__('Blog post meta font weight', 'enovathemes-addons'), 
				'options'   => array(
					'100'  => '100', 
					'200'  => '200',
					'300'  => '300',
					'400'  => '400',
					'500'  => '500',
					'600'  => '600',
					'700'  => '700',
					'800'  => '800',
					'900'  => '900',
				),
				'default' => '700',
			),
			array(
				'id'       =>'blog-post-excerpt',
				'type'     => 'slider',
				'title'    => esc_html__('Blog post excerpt length', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'500', 
				'step'     =>'1',
				'default'  => '112'
			),
			array(
				'id'        =>'blog-excerpt-font-weight',
				'type'      => 'select',
				'title'     => esc_html__('Blog post excerpt font weight', 'enovathemes-addons'), 
				'options'   => array(
					'100'  => '100', 
					'200'  => '200',
					'300'  => '300',
					'400'  => '400',
					'500'  => '500',
					'600'  => '600',
					'700'  => '700',
					'800'  => '800',
					'900'  => '900',
				),
				'default' => '600',
			),
			array(
				'id'       =>'blog-post-title-min-height',
				'type'     => 'slider',
				'title'    => esc_html__('Blog post title minimum height', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'500', 
				'step'     =>'1',
				'default'  => '0'
			),
			array(
				'id'       =>'blog-post-category-filter',
				'type' 	   => 'select',
				'data'     => 'categories',
				'multi'    => 'true',
				'args'     => array('taxonomies'=>'category', 'args'=>array()),
				'title'    => esc_html__('Exclude category from main loop', 'enovathemes-addons'),
			),
			array(
				'id'        =>'blog-single-sidebar',
				'type'      => 'select',
				'title'     => esc_html__('Blog single post sidebar position', 'enovathemes-addons'), 
				'options'   => array(
					'none'  => esc_html__('None', 'enovathemes-addons'), 
					'left'  => esc_html__('Left', 'enovathemes-addons'), 
					'right' => esc_html__('Right', 'enovathemes-addons'),
				),
				'default' => 'none',
			),
			array(
				'id'       =>'blog-single-social',
				'type'     => 'switch',
				'title'    => esc_html__('Blog single post social share', 'enovathemes-addons'),
				"default"  => 0
			),
			array(
				'id'       =>'blog-related-posts',
				'type'     => 'switch',
				'title'    => esc_html__('Blog single post related posts', 'enovathemes-addons'),
				"default"  => 1
			),
			array(
				'id'        =>'blog-related-posts-by',
				'type'      => 'select',
				'title'     => esc_html__('Related posts by', 'enovathemes-addons'), 
				'options'   => array(
					'categories'  => esc_html__('Categories', 'enovathemes-addons'), 
					'tags'  => esc_html__('Tags', 'enovathemes-addons'), 
				),
				'default' => 'categories',
				'required' => array('blog-related-posts','equals',1)
			),
			array(
				'id'       =>'blog-authorbox',
				'type'     => 'switch',
				'title'    => esc_html__('Blog single post author box', 'enovathemes-addons'),
				"default"  => 1
			),
		)
	));

/* Project
---------------*/

	Redux::setSection( $opt_name, array(
		'title'      => esc_html__('Project', 'enovathemes-addons'),
		'icon_class' => 'icon-small',
	    'icon'       => 'el-icon-folder-close',
	    'fields' => array(
			array(
				'id'=>'project-title',
				'type' => 'select',
				'title'    => esc_html__('Choose title section', 'enovathemes-addons'),
				'options' => $title_sections_array,
				'default' => 'inherit',
			),
			array(
				'id'      =>'project-title-text',
				'type'     => 'text',
				'title'    => esc_html__('Project title', 'enovathemes-addons'),
				'default'  => 'Projects',
			),
			array(
				'id'      =>'project-subtitle-text',
				'type'     => 'text',
				'title'    => esc_html__('Project subtitle', 'enovathemes-addons'),
				'default'  => '',
			),
			array(
				'id'        =>'project-container',
				'type'      => 'radio',
				'title'     => esc_html__('Project page container', 'enovathemes-addons'), 
				'options'   => array(
					'wide'  => esc_html__('Wide', 'enovathemes-addons'), 
					'boxed' => esc_html__('Boxed', 'enovathemes-addons'),
				),
				'default' => 'boxed',
			),
			array(
				'id'       =>'project-filter',
				'type'     => 'switch',
				'title'    => esc_html__('Project AJAX filter', 'enovathemes-addons'),
				'subtitle' => esc_html__('Toggle this option if you want to have AJAX powered filter for your projects', 'enovathemes-addons'),
				"default"  => 1
			),
			array(
				'id'       =>'project-per-page',
				'type'     => 'slider',
				'title'    => esc_html__('Projects per page', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'999', 
				'step'     =>'1',
				'default'  => '9'
			),
			array(
				'id'       =>'project-navigation',
				'type'     => 'select',
				'title'    => esc_html__('Project navigation', 'enovathemes-addons'),
				'options'  => array(
					'pagination'=> esc_html__('Pagination', 'enovathemes-addons'),
					'loadmore'  => esc_html__('Load more', 'enovathemes-addons'),
					'scroll'    => esc_html__('Infinite scroll', 'enovathemes-addons'),
				),
				'default'  => 'pagination'
			),
			array(
				'id'       => 'project-post-layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Project layout', 'enovathemes-addons'),
				'width'    => '140', 
				'height'   => '140',
				'options'  => array(
					'project-with-details' => array(
						'alt'   => esc_html__('Project with details', 'enovathemes-addons'), 
						'title' => esc_html__('Project with details', 'enovathemes-addons'), 
						'img'   => ENOVATHEMES_ADDONS_IMG.'project_post_layout_1.png'
					),
					'project-with-caption' => array(
						'alt'   => esc_html__('Project with caption', 'enovathemes-addons'), 
						'title' => esc_html__('Project with caption', 'enovathemes-addons'), 
						'img'   => ENOVATHEMES_ADDONS_IMG.'project_post_layout_2.png'
					),
					'project-with-overlay' => array(
						'alt'   => esc_html__('Project with overlay', 'enovathemes-addons'), 
						'title' => esc_html__('Project with overlay', 'enovathemes-addons'), 
						'img'   => ENOVATHEMES_ADDONS_IMG.'project_post_layout_3.png'
					)
				),
				'default' => 'project-with-details'
			),
			array(
				'id'        =>'project-post-size',
				'type'      => 'select',
				'title'     => esc_html__('Project size', 'enovathemes-addons'), 
				'options'   => array(
					'small'  => esc_html__('Small (1/4 - 25%)', 'enovathemes-addons'), 
					'medium' => esc_html__('Medium (1/3 - 33%)', 'enovathemes-addons'),
					'large'  => esc_html__('Large (1/2 - 50%)', 'enovathemes-addons'),
				),
				'default' => 'medium',
			),
			array(
				'id'       =>'project-image-full',
				'type'     => 'switch',
				'title'    => esc_html__('Use original image size (no cropping)', 'enovathemes-addons'),
				"default"  => 0,
			),
			array(
				'id'       =>'project-image-justify',
				'type'     => 'switch',
				'title'    => esc_html__('Justify project item width with project size', 'enovathemes-addons'),
				'subtitle' => esc_html__('If active, project item width will be justified with the project size, but the height depends on image height.', 'enovathemes-addons'),
				"default"  => 0,
			    'required' => array('project-image-full','equals',1)
			),
			array(
				'id'      =>'project-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__('Project animation effect', 'enovathemes-addons'),
				'options'  => array(
					"none"    => "None",
					"fadeIn"  => "Fade In",
					"moveUp"  => "Move Up",
				),
				'default' => "none"
			),
			array(
				'id'       =>'project-gap',
				'type'     => 'switch',
				'title'    => esc_html__('Project gap between items', 'enovathemes-addons'),
				"default"  => 1
			),
			array(
				'id'      =>'project-image-effect',
				'type'     => 'select',
				'title'    => esc_html__('Project hover effect', 'enovathemes-addons'),
				'options'  => array(
					"overlay-fade"  			 => esc_html__("Overlay fade", 'enovathemes-addons'),
					"overlay-fade-zoom"  		 => esc_html__("Overlay fade with image zoom", 'enovathemes-addons'),
					"overlay-fade-zoom-extreme"  => esc_html__("Overlay fade with extreme image zoom", 'enovathemes-addons'),
					"overlay-move"               => esc_html__("Overlay move fluid", 'enovathemes-addons'),
					"transform"                  => esc_html__("Transform", 'enovathemes-addons'),
				),
				'default' => "overlay-fade",
			    'required' => array('project-post-layout','equals','project-with-details')
			),
			array(
				'id'      =>'project-image-effect-overlay',
				'type'     => 'select',
				'title'    => esc_html__('Project hover effect', 'enovathemes-addons'),
				'options'  => array(
					"overlay-fade"  			 => esc_html__("Overlay fade", 'enovathemes-addons'),
					"overlay-fade-zoom"  		 => esc_html__("Overlay fade with image zoom", 'enovathemes-addons'),
					"overlay-fade-zoom-extreme"  => esc_html__("Overlay fade with extreme image zoom", 'enovathemes-addons'),
					"overlay-move"               => esc_html__("Overlay move fluid", 'enovathemes-addons'),
					"overlay-fall"               => esc_html__("Overlay fall", 'enovathemes-addons'),
					"transform"                  => esc_html__("Transform", 'enovathemes-addons'),
				),
				'default' => "overlay-fade",
			    'required' => array('project-post-layout','equals','project-with-overlay')
			),
			array(
				'id'       =>'project-image-effect-overlay-more',
				'type'     => 'color',
				'title'    => esc_html__('More plus color', 'enovathemes-addons'),
				'default'  => '#000000',
				'required' => array('project-post-layout','equals','project-with-overlay')
			),
			array(
				'id'       =>'project-image-effect-overlay-more-hover',
				'type'     => 'color',
				'title'    => esc_html__('More plus color hover', 'enovathemes-addons'),
				'default'  => '#ffffff',
				'required' => array('project-post-layout','equals','project-with-overlay')
			),
			array(
				'id'        =>'project-meta-font-weight',
				'type'      => 'select',
				'title'     => esc_html__('Project meta font weight', 'enovathemes-addons'), 
				'options'   => array(
					'100'  => '100', 
					'200'  => '200',
					'300'  => '300',
					'400'  => '400',
					'500'  => '500',
					'600'  => '600',
					'700'  => '700',
					'800'  => '800',
					'900'  => '900',
				),
				'default' => '800',
			),
			array(
				'id'        =>'project-title-font-weight',
				'type'      => 'select',
				'title'     => esc_html__('Project title font weight', 'enovathemes-addons'), 
				'options'   => array(
					'100'  => '100', 
					'200'  => '200',
					'300'  => '300',
					'400'  => '400',
					'500'  => '500',
					'600'  => '600',
					'700'  => '700',
					'800'  => '800',
					'900'  => '900',
				),
				'default' => '800',
			),
			array(
				'id'      =>'project-image-effect-caption',
				'type'     => 'select',
				'title'    => esc_html__('Project hover effect', 'enovathemes-addons'),
				'options'  => array(
					"caption-up"                 => esc_html__("Caption up", 'enovathemes-addons'),
					"caption-up-image"           => esc_html__("Caption up & image up", 'enovathemes-addons'),
				),
				'default' => "caption-up",
				'required' => array('project-post-layout','equals','project-with-caption')
			),
			array(
				'id'       =>'project-post-category-filter',
				'type' 	   => 'select',
				'data'     => 'terms',
				'multi'    => 'true',
				'args'     => array('taxonomies'=>'project-category', 'args'=>array()),
				'title'    => esc_html__('Exclude category from main loop', 'enovathemes-addons'),
			),
			array(
				'id'       =>'project-single-social',
				'type'     => 'switch',
				'title'    => esc_html__('Single project social share', 'enovathemes-addons'),
				"default"  => 1
			),
			array(
				'id'       =>'project-related-projects',
				'type'     => 'switch',
				'title'    => esc_html__('Single project related projects', 'enovathemes-addons'),
				"default"  => 1
			),
			array(
				'id'   => 'warning-info-'.$inc++,
				'class'=> 'warning-info',
				'type' => 'info',
				'style' => 'warning',
				'desc' => esc_html__("Important! Don't forget to update/resave permalinks after the slug change", "enovathemes-addons")
			),
			array(
				'id'       =>'project-slug',
				'type'     => 'text',
				'title'    => esc_html__("Project slug", 'enovathemes-addons'),
				'default'  => 'project'
			),
			array(
				'id'       =>'project-cat-slug',
				'type'     => 'text',
				'title'    => esc_html__("Project category slug", 'enovathemes-addons'),
				'default'  => 'project-category'
			),
			array(
				'id'       =>'project-tag-slug',
				'type'     => 'text',
				'title'    => esc_html__("Project tag slug", 'enovathemes-addons'),
				'default'  => 'project-tag'
			),
		)
	));

/* Woo Commerce
---------------*/

	Redux::setSection( $opt_name, array(
		'title'      => esc_html__('Shop', 'enovathemes-addons'),
		'icon_class' => 'icon-small',
	    'icon'       => 'el-icon-shopping-cart',
	    'fields' => array(
			array(
				'id'=>'product-title',
				'type' => 'select',
				'title'    => esc_html__('Choose title section', 'enovathemes-addons'),
				'options' => $title_sections_array,
				'default' => 'inherit',
			),
			array(
				'id'      =>'product-title-text',
				'type'     => 'text',
				'title'    => esc_html__('Shop title', 'enovathemes-addons'),
				'default'  => 'Shop',
			),
			array(
				'id'      =>'product-subtitle-text',
				'type'     => 'text',
				'title'    => esc_html__('Shop subtitle', 'enovathemes-addons'),
				'default'  => '',
			),
			array(
				'id'        =>'product-sidebar',
				'type'      => 'select',
				'title'     => esc_html__('Shop sidebar position', 'enovathemes-addons'), 
				'options'   => array(
					'none'  => esc_html__('None', 'enovathemes-addons'), 
					'left'  => esc_html__('Left', 'enovathemes-addons'), 
					'right' => esc_html__('Right', 'enovathemes-addons'),
				),
				'default' => 'none',
			),
			array(
				'id'       =>'product-filter',
				'type'     => 'switch',
				'title'    => esc_html__('Shop AJAX filter', 'enovathemes-addons'),
				'subtitle' => esc_html__('Toggle this option if you want to have AJAX powered filter for your products', 'enovathemes-addons'),
				'subtitle' => esc_html__('Make sure the products display option is set to "Products" (go to Appearance >> Customize >> Woocommerce)', 'enovathemes-addons'),
				"default"  => 0
			),
			array(
				'id'       =>'product-per-page',
				'type'     => 'slider',
				'title'    => esc_html__('Products per page', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'999', 
				'step'     =>'1',
				'default'  => '9'
			),
			array(
				'id'       =>'product-navigation',
				'type'     => 'select',
				'title'    => esc_html__('Shop navigation', 'enovathemes-addons'),
				'subtitle' => esc_html__('Shop navigation', 'enovathemes-addons'),
				'options'  => array(
					'pagination'=>'Pagination',
					'loadmore'  =>'Load more',
					'scroll'    =>'Infinite scroll'
				),
				'default'  => 'pagination'
			),
			array(
				'id'        =>'product-post-size',
				'type'      => 'select',
				'title'     => esc_html__('Product size', 'enovathemes-addons'), 
				'options'   => array(
					'small'  => esc_html__('Small (1/4 - 25%)', 'enovathemes-addons'), 
					'medium' => esc_html__('Medium (1/3 - 33%)', 'enovathemes-addons'),
					'large'  => esc_html__('Large (1/2 - 50%)', 'enovathemes-addons'),
				),
				'default' => 'medium',
			),
			array(
				'id'       =>'product-image-full',
				'type'     => 'switch',
				'title'    => esc_html__('Use original image size (no cropping)', 'enovathemes-addons'),
				"default"  => 0,
			),
			array(
				'id'       =>'product-image-justify',
				'type'     => 'switch',
				'title'    => esc_html__('Justify product item width with product size', 'enovathemes-addons'),
				'subtitle' => esc_html__('If active, product item width will be justified with the product size, but the height depends on image height.', 'enovathemes-addons'),
				"default"  => 0,
			    'required' => array('product-image-full','equals',1)
			),
			array(
				'id'       =>'product-post-category-filter',
				'type' 	   => 'select',
				'data'     => 'terms',
				'multi'    => 'true',
				'args'     => array('taxonomies'=>'product_cat', 'args'=>array()),
				'title'    => esc_html__('Exclude category from main loop', 'enovathemes-addons'),
			),
			array(
				'id'      =>'product-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__('Product animation effect', 'enovathemes-addons'),
				'options'  => array(
					"none"    => "None",
					"fadeIn"  => "Fade In",
					"moveUp"  => "Move Up",
				),
				'default' => "none"
			),
			array(
				'id'      =>'product-image-effect',
				'type'     => 'select',
				'title'    => esc_html__('Product hover effect', 'enovathemes-addons'),
				'options'  => array(
					"overlay-none"               => esc_html__("None", 'enovathemes-addons'),
					"overlay-fade"               => esc_html__("Overlay fade", 'enovathemes-addons'),
					"overlay-fade-zoom"          => esc_html__("Overlay fade with image zoom", 'enovathemes-addons'),
					"overlay-fade-zoom-extreme"  => esc_html__("Overlay fade with extreme image zoom", 'enovathemes-addons'),
					"overlay-move"               => esc_html__("Overlay move fluid", 'enovathemes-addons'),
				),
				'default' => "overlay-none",
			),
			array(
				'id'       =>'product-quick-modal-width',
				'type'     => 'slider',
				'title'    => esc_html__('Product quick look modal width', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'1200', 
				'step'     =>'1',
				'default'  =>'960'
			),
			array(
				'id'       =>'product-quick-modal-height',
				'type'     => 'slider',
				'title'    => esc_html__('Product quick look modal height', 'enovathemes-addons'),
				'min'      =>'0', 
				'max'      =>'1200', 
				'step'     =>'1',
				'default'  =>'480'
			),
			array(
				'id'        =>'product-single-sidebar',
				'type'      => 'select',
				'title'     => esc_html__('Single product sidebar position', 'enovathemes-addons'), 
				'options'   => array(
					'none'  => esc_html__('None', 'enovathemes-addons'), 
					'left'  => esc_html__('Left', 'enovathemes-addons'), 
					'right' => esc_html__('Right', 'enovathemes-addons'),
				),
				'default' => 'none',
			),
			array(
				'id'       => 'product-single-post-layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Single product layout', 'enovathemes-addons'),
				'width'    => '140', 
				'height'   => '140',
				'options'  => array(
					'single-product-thumbnails-down' => array(
						'alt'   => 'Horizonal thumbnails', 
						'title' => 'Horizonal thumbnails', 
						'img'   => ENOVATHEMES_ADDONS_IMG.'product_post_layout_1.png'
					),
					'single-product-thumbnails-left' => array(
						'alt'   => 'Vertical thumbnails', 
						'title' => 'Vertical thumbnails', 
						'img'   => ENOVATHEMES_ADDONS_IMG.'product_post_layout_2.png'
					),
				),
				'default' => 'single-product-thumbnails-down'
			),
			array(
				'id'       =>'product-single-social',
				'type'     => 'switch',
				'title'    => esc_html__('Social share', 'enovathemes-addons'),
				"default"  => 1
			)
		)
	));
	
?>