<?php

/* vc defaults
---------------*/

	vc_remove_param('vc_section', 'full_width');
	vc_remove_param('vc_row', 'full_width');
	vc_remove_param('vc_row_inner', 'gap');
	vc_remove_param('vc_row', 'gap');
	vc_remove_param('vc_row', 'parallax');
	vc_remove_param('vc_row', 'parallax_image');
	vc_remove_param('vc_row', 'video_bg');
	vc_remove_param('vc_row', 'video_bg_url');
	vc_remove_param('vc_row', 'video_bg_parallax');
	vc_remove_param('vc_row', 'parallax_speed_bg');
	vc_remove_param('vc_row', 'parallax_speed_video');

/* vc_row
---------------*/

	/* defaults
	---------------*/

		vc_add_param('vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Row stretch', 'samatex' ),
			'param_name' => 'full_width',
			'value'      => array(
				esc_html__( 'No stretching', 'samatex' )           => 'stretch_no',
				esc_html__( 'Stretch row and content', 'samatex' ) => 'stretch_row_content',
			),
			'weight' => 1,
			'description' => esc_html__( '"No stretching" alignes the row with the main theme container, Stretch row and content" makes the row and content full width', 'samatex' )
		));

		$column_gap_values = array(
			esc_html__('0px', 'samatex')    => '0', 
			esc_html__('2px', 'samatex')    => '2', 
			esc_html__('4px', 'samatex')    => '4', 
			esc_html__('8px', 'samatex')    => '8', 
			esc_html__('16px', 'samatex')   => '16', 
			esc_html__('24px', 'samatex')   => '24', 
			esc_html__('32px', 'samatex')   => '32', 
			esc_html__('40px', 'samatex')   => '40', 
			esc_html__('48px', 'samatex')   => '48', 
			esc_html__('56px', 'samatex')   => '56', 
			esc_html__('64px', 'samatex')   => '64', 
			esc_html__('72px', 'samatex')   => '72', 
			esc_html__('80px', 'samatex')   => '80',
		);

		vc_add_param('vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Columns gap', 'samatex' ),
			'param_name' => 'gap',
			'weight'     => 1,
			'value'      => $column_gap_values,
			'std' => '24'
		));

		vc_add_param('vc_row_inner', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Columns gap', 'samatex' ),
			'param_name' => 'gap',
			'weight'     => 1,
			'value'      => $column_gap_values,
			'std' => '24'
		));

		vc_add_param('vc_row_inner', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Z index (integer without any string)', 'samatex' ),
			'description'=> esc_html__( 'Higher value places the row on top', 'samatex' ),
			'param_name' => 'z_index',
		));

		vc_add_param('vc_row_inner', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Height in px (without any string)', 'samatex' ),
			'param_name' => 'row_height',
		));

		vc_add_param('vc_row_inner', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Height in px for sticky header version (without any string)', 'samatex' ),
			'param_name' => 'row_height_sticky',
		));

		vc_add_param('vc_row_inner', array(
			'type'       => 'checkbox',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Hide on sticky header version?', 'samatex' ),
			'param_name' => 'hide_row_sticky',
		));

		vc_add_param('vc_row_inner', array(
			'type'       => 'textfield',
			'heading'    => esc_html__('Element id','samatex'),
			'group'      => esc_html__('Header builder','samatex'),
			"class"      => "element-attr-hide",
			'param_name' => 'element_id',
			'value'      => '',
		));

		vc_add_param('vc_row_inner', array(
			'type'       => 'textarea',
			'heading'    => esc_html__('Element css','samatex'),
			'group'      => esc_html__('Header builder','samatex'),
			"class"      => "element-attr-hide",
			'param_name' => 'element_css',
			'value'      => '',
		));

	/* parallax
	---------------*/

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Parallax background', 'samatex' ),
			'param_name' => 'parallax',
			'group'      => esc_html__('Background options','samatex'),
		));

		vc_add_param('vc_row', array(
			'type'       => 'attach_image',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Parallax image', 'samatex' ),
			'param_name' => 'parallax_image',
			'dependency' => Array('element' => 'parallax', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Parallax speed', 'samatex' ),
			'param_name' => 'parallax_speed_bg',
			'description'=> esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','samatex'),
			'dependency' => Array('element' => 'parallax', 'value' => 'true'),
			'default'    => '1.5'
		));

	/* video
	---------------*/

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Background video', 'samatex' ),
			'param_name' => 'video_bg',
			'group'      => esc_html__('Background options','samatex'),
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Background video mp4 file url', 'samatex' ),
			'param_name' => 'video_bg_mp4',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Background video webm file url', 'samatex' ),
			'param_name' => 'video_bg_webm',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Background video ogv file url', 'samatex' ),
			'param_name' => 'video_bg_ogv',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'attach_image',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Video overlay', 'samatex' ),
			'param_name' => 'video_bg_overlay',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'attach_image',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Video placeholder', 'samatex' ),
			'param_name' => 'video_bg_placeholder',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Video parallax', 'samatex' ),
			'param_name' => 'video_bg_parallax',
			'group'      => esc_html__('Background options','samatex'),
			'dependency' => Array(
				'element' => 'video_bg', 'value' => 'true',

			)
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Background video parallax speed', 'samatex' ),
			'param_name' => 'video_bg_parallax_speed',
			'description'=> esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','samatex'),
			'dependency' => Array(
				'element' => 'video_bg_parallax', 'value' => 'true',
			),
			'default'    => '1.5'
		));

	/* fixed
	---------------*/

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Fixed background', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'fixed_bg',
		));

		vc_add_param('vc_row', array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Fixed background image', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'fixed_bg_image',
			'dependency' => Array('element' => 'fixed_bg', 'value' => 'true')
		));

	/* animated
	---------------*/

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Animated background', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'animated_bg',
		));

		vc_add_param('vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Animated background direction', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'animated_bg_dir',
			'value'     => array(
				esc_html__('Horizontal','samatex')  => 'horizontal',
				esc_html__('Vertical','samatex')  => 'vertical',
			),
			'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Animated background speed in ms (default is 35000)', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'animated_bg_speed',
			'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Animated background image', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'animated_bg_image',
			'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
		));

	/* header buiilder tab
	---------------*/

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Height in px (without any string)', 'samatex' ),
			'param_name' => 'row_height',
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Z index (integer without any string)', 'samatex' ),
			'description'=> esc_html__( 'Higher value places the row on top', 'samatex' ),
			'param_name' => 'z_index',
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Height in px for sticky header version (without any string)', 'samatex' ),
			'param_name' => 'row_height_sticky',
		));

		vc_add_param('vc_row', array(
			'type'       => 'colorpicker',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Background color of sticky header version', 'samatex' ),
			'param_name' => 'row_background_sticky',
		));

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Hide from default header version?', 'samatex' ),
			'param_name' => 'hide_row_default',
		));

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'group'      => esc_html__('Header builder','samatex'),
			'heading'    => esc_html__( 'Hide on sticky header version?', 'samatex' ),
			'param_name' => 'hide_row_sticky',
		));

		vc_add_param('vc_row', array(
			'type'       => 'textfield',
			'heading'    => esc_html__('Element id','samatex'),
			'group'      => esc_html__('Header builder','samatex'),
			"class"      => "element-attr-hide",
			'param_name' => 'element_id',
			'value'      => '',
		));

		vc_add_param('vc_row', array(
			'type'       => 'textarea',
			'heading'    => esc_html__('Element css','samatex'),
			'group'      => esc_html__('Header builder','samatex'),
			"class"      => "element-attr-hide",
			'param_name' => 'element_css',
			'value'      => '',
		));

	/* samatex
	---------------*/

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Top gradient border', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'top_gradient',
		));

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Bottom gradient border', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'bottom_gradient',
		));

		vc_add_param('vc_row', array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Gradient border color', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'gradient_color',
			'default'    => '#ffffff'
		));

		vc_add_param('vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Grid overlay', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'grid_overlay',
			'value'     => array(
				esc_html__('None','samatex')  => 'none',
				esc_html__('White','samatex')  => 'white',
				esc_html__('Black','samatex')  => 'black',
			),
		));

		vc_add_param('vc_row', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Curtain gradient overlay', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'curtain_gradient',
		));

		vc_add_param('vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Curtain gradient position', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'curtain_gradient_position',
			'value'     => array(
				esc_html__('Left','samatex')  => 'left',
				esc_html__('Right','samatex')  => 'right',
			),
			'dependency' => Array('element' => 'curtain_gradient', 'value' => 'true')
		));

		vc_add_param('vc_row', array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Curtain gradient color', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'curtain_gradient_color',
			'default'    => '#ffd311',
			'dependency' => Array('element' => 'curtain_gradient', 'value' => 'true')
		));

/* vc_column
---------------*/

	vc_remove_param('vc_column', 'parallax');
	vc_remove_param('vc_column', 'parallax_image');
	vc_remove_param('vc_column', 'video_bg');
	vc_remove_param('vc_column', 'video_bg_url');
	vc_remove_param('vc_column', 'video_bg_parallax');
	vc_remove_param('vc_column', 'parallax_speed_bg');
	vc_remove_param('vc_column', 'parallax_speed_video');

	$animation_delay_values = array();

	for ($i=0; $i <= 2000; $i = $i + 50) { 
		$animation_delay_values[$i.esc_html__('ms', 'samatex')] = $i;
	}

	vc_add_param('vc_column', array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Animation delay in ms (example 300)', 'samatex' ),
		'param_name' => 'animation_delay',
		'weight'     => 1,
		'value'      => $animation_delay_values
	));

	vc_add_param('vc_column', array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Text align', 'samatex' ),
		'param_name' => 'text_align',
		'value'      => array(
			esc_html__('None','samatex')   => 'none', 
			esc_html__('Left','samatex')   => 'left', 
			esc_html__('Right','samatex')  => 'right', 
			esc_html__('Center','samatex') => 'center'
		)
	));

	vc_add_param('vc_column', array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Shadow', 'samatex' ),
		'group'      => esc_html__( 'Design Options', 'samatex' ),
		'param_name' => 'shadow',
		'weight'     => 1,
		'value'      => ''
	));

	vc_add_param('vc_column', array(
		'type'       => 'crp',
		'heading'    => esc_html__( 'Responsive padding', 'samatex' ),
		'group'      => esc_html__('Responsive Options','samatex'),
		'param_name' => 'crp',
	));

	vc_add_param('vc_column', array(
		'type'       => 'textfield',
		'heading'    => esc_html__('Element id','samatex'),
		"class"      => "element-attr-hide",
		'param_name' => 'element_id',
		'value'      => '',
	));

	vc_add_param('vc_column', array(
		'type'       => 'textarea',
		'heading'    => esc_html__('Element css','samatex'),
		"class"      => "element-attr-hide",
		'param_name' => 'element_css',
		'value'      => '',
	));

	/* parallax
	---------------*/

		vc_add_param('vc_column', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Parallax background', 'samatex' ),
			'param_name' => 'parallax',
			'group'      => esc_html__('Background options','samatex'),
		));

		vc_add_param('vc_column', array(
			'type'       => 'attach_image',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Parallax image', 'samatex' ),
			'param_name' => 'parallax_image',
			'dependency' => Array('element' => 'parallax', 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Parallax speed', 'samatex' ),
			'param_name' => 'parallax_speed_bg',
			'description'=> esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','samatex'),
			'dependency' => Array('element' => 'parallax', 'value' => 'true'),
			'default'    => '1.5'
		));

	/* video
	---------------*/

		vc_add_param('vc_column', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Background video', 'samatex' ),
			'param_name' => 'video_bg',
			'group'      => esc_html__('Background options','samatex'),
		));

		vc_add_param('vc_column', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Background video mp4 file url', 'samatex' ),
			'param_name' => 'video_bg_mp4',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Background video webm file url', 'samatex' ),
			'param_name' => 'video_bg_webm',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Background video ogv file url', 'samatex' ),
			'param_name' => 'video_bg_ogv',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			'type'       => 'attach_image',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Video overlay', 'samatex' ),
			'param_name' => 'video_bg_overlay',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			'type'       => 'attach_image',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Video placeholder', 'samatex' ),
			'param_name' => 'video_bg_placeholder',
			'dependency' => Array('element' => 'video_bg', 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Video parallax', 'samatex' ),
			'param_name' => 'video_bg_parallax',
			'group'      => esc_html__('Background options','samatex'),
			'dependency' => Array(
				'element' => 'video_bg', 'value' => 'true',

			)
		));

		vc_add_param('vc_column', array(
			'type'       => 'textfield',
			'group'      => esc_html__('Background options','samatex'),
			'heading'    => esc_html__( 'Background video parallax speed', 'samatex' ),
			'param_name' => 'video_bg_parallax_speed',
			'description'=> esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','samatex'),
			'dependency' => Array(
				'element' => 'video_bg_parallax', 'value' => 'true',
			),
			'default'    => '1.5'
		));

	/* fixed
	---------------*/

		vc_add_param('vc_column', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Fixed background', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'fixed_bg',
		));

		vc_add_param('vc_column', array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Fixed background image', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'fixed_bg_image',
			'dependency' => Array('element' => 'fixed_bg', 'value' => 'true')
		));

	/* animated
	---------------*/

		vc_add_param('vc_column', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Animated background', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'animated_bg',
		));

		vc_add_param('vc_column', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Animated background direction', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'animated_bg_dir',
			'value'     => array(
				esc_html__('Horizontal','samatex')  => 'horizontal',
				esc_html__('Vertical','samatex')  => 'vertical',
			),
			'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Animated background speed in ms (default is 35000)', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'animated_bg_speed',
			'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Animated background image', 'samatex' ),
			'group'      => esc_html__('Background options','samatex'),
			'param_name' => 'animated_bg_image',
			'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
		));

/* vc_column_text
---------------*/

	vc_add_param('vc_column_text', array(
		'type'       => 'textfield',
		'heading'    => esc_html__('Element id','samatex'),
		"class"      => "element-attr-hide",
		'param_name' => 'element_id',
		'value'      => '',
	));

	vc_add_param('vc_column_text', array(
		'type'       => 'textarea',
		'heading'    => esc_html__('Element css','samatex'),
		"class"      => "element-attr-hide",
		'param_name' => 'element_css',
		'value'      => '',
	));

	vc_add_param('vc_column_text', array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Animation delay in ms (example 300)', 'samatex' ),
		'param_name' => 'animation_delay',
		'weight'     => 1,
		'value'      => $animation_delay_values
	));

	function samatex_enovathemes_remove_woocommerce() {
	    if (class_exists('Woocommerce')) {
	        vc_remove_element( 'recent_products' );
			vc_remove_element( 'featured_products' );
			vc_remove_element( 'product' );
			vc_remove_element( 'products' );
			vc_remove_element( 'product_category' );
			vc_remove_element( 'product_categories' );
			vc_remove_element( 'sale_products' );
			vc_remove_element( 'best_selling_products' );
			vc_remove_element( 'top_rated_products' );
			vc_remove_element( 'related_products' );
			vc_remove_element( 'product_attribute' );
	    }
	}
	add_action( 'vc_build_admin_page', 'samatex_enovathemes_remove_woocommerce', 11 );
	add_action( 'vc_load_shortcode', 'samatex_enovathemes_remove_woocommerce', 11 );

if (defined( 'ENOVATHEMES_ADDONS' )) {
	add_action( 'init', 'samatex_enovathemes_integrateVC');
    function samatex_enovathemes_integrateVC() {

    	global $samatex_enovathemes;

		$main_color = (isset($GLOBALS['samatex_enovathemes']['main-color']) && $GLOBALS['samatex_enovathemes']['main-color']) ? $GLOBALS['samatex_enovathemes']['main-color'] : '#ffd311';

    	$google_fonts_family = array('Theme default');

		$google_fonts = enovathemes_addons_google_fonts();

		if (!is_wp_error( $google_fonts ) ) {

			foreach ( $google_fonts as $font ) {
				array_push($google_fonts_family, $font['family']);
			}

		}

    	$animation_delay_values = array();

		for ($i=0; $i <= 2000; $i = $i + 50) { 
			$animation_delay_values[$i.esc_html__('ms', 'samatex')] = $i;
		}

    	$order_by_values = array(
			esc_html__( 'Date', 'samatex' ) => 'date',
			esc_html__( 'ID', 'samatex' ) => 'ID',
			esc_html__( 'Author', 'samatex' ) => 'author',
			esc_html__( 'Title', 'samatex' ) => 'title',
			esc_html__( 'Modified', 'samatex' ) => 'modified',
			esc_html__( 'Random', 'samatex' ) => 'rand',
			esc_html__( 'Comment count', 'samatex' ) => 'comment_count',
			esc_html__( 'Menu order', 'samatex' ) => 'menu_order',
		);

		$order_way_values = array(
			esc_html__( 'Ascending', 'samatex' ) => 'ASC',
			esc_html__( 'Descending', 'samatex' ) => 'DESC',
		);

		$operator_values = array(
			esc_html__( 'IN', 'samatex' ) => 'IN',
			esc_html__( 'NOT IN', 'samatex' ) => 'NOT IN',
			esc_html__( 'AND', 'samatex' ) => 'AND',
		);

		$animation_values = array(
			esc_html__('None', 'samatex')     => 'none',
			esc_html__('Fade In', 'samatex')  => 'fadeIn',
			esc_html__('Move Up', 'samatex')  => 'moveUp',
		);

		$size_values_box = array(
			esc_html__('Small (1/4 - 25%)', 'samatex')        => 'small', 
			esc_html__('Medium (1/3 - 33%)', 'samatex')       => 'medium',
			esc_html__('Large (1/2 - 50%)', 'samatex')        => 'large'
		);

		$size_values_default = array(
			esc_html__('Small', 'samatex')        => 'small', 
			esc_html__('Medium', 'samatex')       => 'medium',
			esc_html__('Large', 'samatex')        => 'large'
		);

		$size_values_extra = array(
			esc_html__('Extra small', 'samatex')  => 'extra-small', 
			esc_html__('Small', 'samatex')        => 'small', 
			esc_html__('Medium', 'samatex')       => 'medium',
			esc_html__('Large', 'samatex')        => 'large',
			esc_html__('Extra large', 'samatex')  => 'large-x',
			esc_html__('Extra Extra large', 'samatex')  => 'large-xx'
		);

		$font_weight_values = array(
			'100'  => '100', 
			'200'  => '200', 
			'300'  => '300', 
			'400'  => '400', 
			'500'  => '500', 
			'600'  => '600', 
			'700'  => '700', 
			'800'  => '800', 
			'900'  => '900',
		);

		$font_size_values = array(esc_html__('Inherit', 'samatex') => 'inherit');
		for ($i=0; $i <= 72; $i++) { 
			$font_size_values[$i.esc_html__('px', 'samatex')] = $i.'px';
		}

		$line_height_values = array(esc_html__('Inherit', 'samatex') => 'inherit');
		for ($i=0; $i <= 80; $i++) { 
			$line_height_values[$i.esc_html__('px', 'samatex')] = $i.'px';
		}

		$align_values = array(
			esc_html__('Left','samatex')   => 'left', 
			esc_html__('Right','samatex')  => 'right', 
			esc_html__('Center','samatex') => 'center'
		);

		$align_values_extended = array(
			esc_html__('None','samatex')   => 'none', 
			esc_html__('Left','samatex')   => 'left', 
			esc_html__('Right','samatex')  => 'right', 
			esc_html__('Center','samatex') => 'center'
		);

		$logic_values = array(
			esc_html__('False','samatex')   => 'false', 
			esc_html__('True','samatex')  => 'true', 
		);

		$animation_type_values = array(
			esc_html__('Sequential','samatex')  => 'sequential',
			esc_html__('Random','samatex')      => 'random'
		);

		$image_size_values = array(
			'full'      => 'full',
			'thumbnail' => 'thumbnail',
			'1200X720'  => 'samatex_1200X720',
			'960X600'   => 'samatex_960X600',
			'900X556'   => 'samatex_900X556',
			'640X400'   => 'samatex_640X400',
			'600X370'   => 'samatex_600X370',
			'480X360'   => 'samatex_480X360',
			'400X320'   => 'samatex_400X320',
			'300X250'   => 'samatex_300X250',
		);

		$image_overlay_values = array(
			esc_html__('Overlay fade','samatex') 						 => 'overlay-fade',
			esc_html__('Overlay fade with image zoom','samatex')         => 'overlay-fade-zoom',
			esc_html__('Overlay fade with extreme image zoom','samatex') => 'overlay-fade-zoom-extreme',
			esc_html__('Overlay move fluid','samatex')                   => 'overlay-move',
			esc_html__('Transform','samatex')                            => 'transform'
		);

		$image_caption_values = array(
			esc_html__('Caption up','samatex') 					  => 'caption-up',
			esc_html__("Caption up and image up", 'samatex') => "caption-up-image"
		);

		$layout_type_values = array(
			esc_html__('Grid', 'samatex')     => 'grid', 
			esc_html__('Carousel', 'samatex') => 'carousel', 
		);

		$gap_values = array();

		for ($i=0; $i <= 80; $i = $i + 2) { 
			$gap_values[$i.esc_html__('px', 'samatex')] = $i;
		}


		$social_links_array = array(
			'youtube',
			'vk',
			'tripadvisor',
			'google',
			'linkedin',
			'facebook',
			'instagram',
			'twitter',
			'vimeo',
			'dribbble',
			'behance',
			'github',
			'skype',
			'pinterest',
			'email'
		);

		$menus = samatex_enovathemes_get_all_menus();

		$menu_list = array("choose" => esc_html__('Choose','samatex'));
		
		foreach ($menus as $menu => $attr) {
			$menu_list[$attr->slug] = $attr->name;
		}

		$menu_list = array_flip($menu_list);

		/* ELEMENTS
		---------------*/

			/* TYPOGRAPHY
			---------------*/

				/* et_heading
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Heading','samatex'),
			    		'description'             => esc_html__('Add/animate heading','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_heading',
			    		'class'                   => 'et_heading font',
			    		'icon'                    => 'et_heading',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-heading.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-heading.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Title','samatex'),
								'description'=> esc_html__('Do not use & in the text. If you want to highlight/style a separate word, wrap it inside the span like this <span class="highlight" style="color: #XXXXXX">word</span>. Use color/background styling options only. Also you can add additional classes like "box" "underline" "small"','samatex'),
								'param_name' => 'content',
							),
							array(
								'param_name'=>'text_align',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Text align', 'samatex'), 
								'value'     => $align_values
							),
							array(
								'param_name'=>'type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Tag', 'samatex'), 
								'value'     => array(
									'H1'  => 'h1', 
									'H2'  => 'h2', 
									'H3'  => 'h3', 
									'H4'  => 'h4', 
									'H5'  => 'h5', 
									'H6'  => 'h6', 
									'p'   => 'p', 
									'div' => 'div', 
								),
								'std' => 'h1'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Link','samatex'),
								'param_name' => 'link',
								'value'      => '',
							),
							array(
								'param_name'=>'target',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Target', 'samatex'), 
								'value'     => array(
									'_self'  => '_self',
									'_blank' => '_blank' 
								)
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Text color','samatex'),
								'param_name' => 'text_color',
								'value'      => '#212121',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Background color','samatex'),
								'param_name' => 'background_color',
								'value'      => '',
							),
							array(
								'param_name'=>'font_family',
								'type'      => 'dropdown',
								'group'     => esc_html__('Typography', 'samatex'),
								'heading'   => esc_html__('Font family', 'samatex'),
								'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
								'value'     => $google_fonts_family,
							),
							array(
								'param_name'=>'font_weight',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Font weight', 'samatex'),
								'group'     => esc_html__('Typography', 'samatex'),
								'value'     => $font_weight_values,
							),
							array(
								'param_name'=>'font_subsets',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Font subsets', 'samatex'),
								'group'     => esc_html__('Typography', 'samatex'),
								'value'     => array(
									'latin' => 'latin',
								)
							),
							array(
								'type'       => 'textfield',
								'group'      => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Font size (without any string)','samatex'),
								'param_name' => 'font_size',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
								'param_name' => 'letter_spacing',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Line height (without any string)','samatex'),
								'param_name' => 'line_height',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Text transform','samatex'),
								'param_name' => 'text_transform',
								'value'      => array(
									esc_html__('None','samatex')       => 'none',
									esc_html__('Uppercase','samatex')  => 'uppercase',
									esc_html__('Lowercase','samatex')  => 'lowercase',
									esc_html__('Capitalize','samatex') => 'capitalize',
								)
							),

							/* tablet
							---------------*/

								array(
									'param_name'=>'tablet_text_align',
									'type'      => 'dropdown',
									'group'      => esc_html__('Tablet','samatex'),
									'heading'   => esc_html__('Text align', 'samatex'), 
									'value'      => array(
										esc_html__('Inherit','samatex') => 'inherit',
										esc_html__('Left','samatex')    => 'left',
										esc_html__('Right','samatex')   => 'right',
										esc_html__('Center','samatex')  => 'center',
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet landscape font size (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_landscape_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet landscape line height (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_landscape_line_height',
									'value'      => $line_height_values,
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet portrait font size (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_portrait_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet portrait line height (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_portrait_line_height',
									'value'      => $line_height_values,
								),

							/* mobile
							---------------*/

								array(
									'param_name'=>'mobile_text_align',
									'type'      => 'dropdown',
									'group'      => esc_html__('Mobile','samatex'),
									'heading'   => esc_html__('Text align', 'samatex'), 
									'value'      => array(
										esc_html__('Inherit','samatex') => 'inherit',
										esc_html__('Left','samatex')    => 'left',
										esc_html__('Right','samatex')   => 'right',
										esc_html__('Center','samatex')  => 'center',
									)
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Font size (without any string)','samatex'),
									'group'      => esc_html__('Mobile','samatex'),
									'param_name' => 'mobile_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Line height (without any string)','samatex'),
									'group'      => esc_html__('Mobile','samatex'),
									'param_name' => 'mobile_line_height',
									'value'      => $line_height_values,
								),
			    		
							/* animation
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Animate','samatex'),
									'group'      => 'Animation',
									'param_name' => 'animate',
								),

								array(
									'type'       => 'dropdown',
									'group'      => esc_html__('Animation','samatex'),
									'heading'    => esc_html__('Animation type','samatex'),
									'param_name' => 'animation_type',
									'value'     => array(
										esc_html__('Curtain left', 'samatex')  		  => 'curtain-left', 
										esc_html__('Curtain right', 'samatex')  	  => 'curtain-right', 
										esc_html__('Curtain top', 'samatex')  		  => 'curtain-top', 
										esc_html__('Curtain bottom', 'samatex')  	  => 'curtain-bottom', 
										esc_html__('Letter fly-in direct', 'samatex') => 'letter-direct', 
										esc_html__('Letter fly-in angle', 'samatex')  => 'letter-angle', 
										esc_html__('Words fly-in direct', 'samatex')  => 'words-direct', 
										esc_html__('Words fly-in angle', 'samatex')   => 'words-angle', 
									),
									'dependency' => Array('element' => 'animate', 'value' => 'true')
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Line/Curtain Color','samatex'),
									'group'      => esc_html__('Animation','samatex'),
									'param_name' => 'element_color',
									'value'      => $main_color,
									'dependency' => Array(
										'element' => 'animate', 'value' => 'true',
										'element' => 'animation_type', 'value' => array('curtain-left','curtain-right','curtain-top','curtain-bottom','line-appear')
									)
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Animation','samatex'),
									'heading'    => esc_html__('Start delay in ms (enter only integer number)','samatex'),
									'param_name' => 'start_delay',
									'value'      => '0',
									'dependency' => Array('element' => 'animate', 'value' => 'true')
								),

							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),

							/* margin
							---------------*/

								array(
									'type'       => 'margin',
									'group'      => esc_html__('Margin','samatex'),
									'heading'    => esc_html__('Margin','samatex'),
									'param_name' => 'margin',
									'value'      => ''
								),

							/* padding
							---------------*/

								array(
									'type'       => 'padding',
									'group'      => esc_html__('Padding','samatex'),
									'heading'    => esc_html__('Padding','samatex'),
									'param_name' => 'padding',
									'value'      => ''
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element font','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_font',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));
				
				/* et_typeit
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Typeit','samatex'),
			    		'description'             => esc_html__('Add/animate typing','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_typeit',
			    		'class'                   => 'et_typeit font',
			    		'icon'                    => 'et_typeit',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-typeit.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-typeit.js',
			    		'params'                  => array(
			    			array(
								'param_name'=>'onlyfirst',
								'type'      => 'checkbox',
								'heading'   => esc_html__('Type only first word?', 'samatex'), 
								'value'     => ''
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Typing first word','samatex'),
								'description'=> esc_html__('The static first word that will always be visible','samatex'),
								'param_name' => 'string_1',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Typing second word','samatex'),
								'description'=> esc_html__('This will be typed','samatex'),
								'param_name' => 'string_2',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Typing third word','samatex'),
								'description'=> esc_html__('This will be typed','samatex'),
								'param_name' => 'string_3',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Typing fourth word','samatex'),
								'description'=> esc_html__('This will be typed','samatex'),
								'param_name' => 'string_4',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Typing fifth word','samatex'),
								'description'=> esc_html__('This will be typed','samatex'),
								'param_name' => 'string_5',
							),
							array(
								'param_name'=>'text_align',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Text align', 'samatex'), 
								'value'     => $align_values
							),
							array(
								'param_name'=>'autostart',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autostart', 'samatex'), 
								'value'     => $logic_values
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Start delay in ms (enter only integer number)','samatex'),
								'param_name' => 'start_delay',
								'value'      => '0',
							),
							array(
								'param_name'=>'type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Tag', 'samatex'), 
								'value'     => array(
									'H1'  => 'h1', 
									'H2'  => 'h2', 
									'H3'  => 'h3', 
									'H4'  => 'h4', 
									'H5'  => 'h5', 
									'H6'  => 'h6', 
									'p'   => 'p', 
									'div' => 'div', 
								),
								'std' => 'h1'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Text color','samatex'),
								'param_name' => 'text_color',
								'value'      => '#212121',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Background color','samatex'),
								'param_name' => 'background_color',
								'value'      => '',
							),
							array(
								'param_name'=>'font_family',
								'type'      => 'dropdown',
								'group'     => esc_html__('Typography', 'samatex'),
								'heading'   => esc_html__('Font family', 'samatex'),
								'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
								'value'     => $google_fonts_family,
							),
							array(
								'param_name'=>'font_weight',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Font weight', 'samatex'),
								'group'     => esc_html__('Typography', 'samatex'),
								'value'     => $font_weight_values,
							),
							array(
								'param_name'=>'font_subsets',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Font subsets', 'samatex'),
								'group'     => esc_html__('Typography', 'samatex'),
								'value'     => array(
									'latin' => 'latin',
								)
							),
							array(
								'type'       => 'textfield',
								'group'      => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Font size (without any string)','samatex'),
								'param_name' => 'font_size',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
								'param_name' => 'letter_spacing',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Line height (without any string)','samatex'),
								'param_name' => 'line_height',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Text transform','samatex'),
								'param_name' => 'text_transform',
								'value'      => array(
									esc_html__('None','samatex')       => 'none',
									esc_html__('Uppercase','samatex')  => 'uppercase',
									esc_html__('Lowercase','samatex')  => 'lowercase',
									esc_html__('Capitalize','samatex') => 'capitalize',
								)
							),

							/* tablet
							---------------*/

								array(
									'param_name'=>'tablet_text_align',
									'type'      => 'dropdown',
									'group'      => esc_html__('Tablet','samatex'),
									'heading'   => esc_html__('Text align', 'samatex'), 
									'value'      => array(
										esc_html__('Inherit','samatex') => 'inherit',
										esc_html__('Left','samatex')    => 'left',
										esc_html__('Right','samatex')   => 'right',
										esc_html__('Center','samatex')  => 'center',
									)
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet landscape font size (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_landscape_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet landscape line height (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_landscape_line_height',
									'value'      => $line_height_values,
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet portrait font size (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_portrait_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet portrait line height (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_portrait_line_height',
									'value'      => $line_height_values,
								),

							/* mobile
							---------------*/

								array(
									'param_name'=>'mobile_text_align',
									'type'      => 'dropdown',
									'group'      => esc_html__('Mobile','samatex'),
									'heading'   => esc_html__('Text align', 'samatex'), 
									'value'      => array(
										esc_html__('Inherit','samatex') => 'inherit',
										esc_html__('Left','samatex')    => 'left',
										esc_html__('Right','samatex')   => 'right',
										esc_html__('Center','samatex')  => 'center',
									)
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Font size (without any string)','samatex'),
									'group'      => esc_html__('Mobile','samatex'),
									'param_name' => 'mobile_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Line height (without any string)','samatex'),
									'group'      => esc_html__('Mobile','samatex'),
									'param_name' => 'mobile_line_height',
									'value'      => $line_height_values,
								),
			    		
							/* margin
							---------------*/

								array(
									'type'       => 'margin',
									'group'      => esc_html__('Margin','samatex'),
									'heading'    => esc_html__('Margin','samatex'),
									'param_name' => 'margin',
									'value'      => ''
								),

							/* padding
							---------------*/

								array(
									'type'       => 'padding',
									'group'      => esc_html__('Padding','samatex'),
									'heading'    => esc_html__('Padding','samatex'),
									'param_name' => 'padding',
									'value'      => ''
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element font','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_font',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));
	
				/* et_highlight_heading
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Highlight heading','samatex'),
			    		'description'             => esc_html__('Add highlight heading','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_highlight_heading',
			    		'class'                   => 'et_highlight_heading font',
			    		'icon'                    => 'et_highlight_heading',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-highlight-heading.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-highlight-heading.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
							),
							array(
								'param_name'=>'text_align',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Text align', 'samatex'), 
								'value'     => $align_values
							),
							array(
								'param_name'=>'type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Tag', 'samatex'), 
								'value'     => array(
									'H1'  => 'h1', 
									'H2'  => 'h2', 
									'H3'  => 'h3', 
									'H4'  => 'h4', 
									'H5'  => 'h5', 
									'H6'  => 'h6', 
									'p'   => 'p', 
									'div' => 'div', 
								),
								'std' => 'h1'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Text color','samatex'),
								'param_name' => 'text_color',
								'value'      => '#9a9a9a',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Border color','samatex'),
								'param_name' => 'border_color',
								'value'      => $main_color,
							),
							array(
								'param_name'=>'font_family',
								'type'      => 'dropdown',
								'group'     => esc_html__('Typography', 'samatex'),
								'heading'   => esc_html__('Font family', 'samatex'),
								'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
								'value'     => $google_fonts_family,
							),
							array(
								'param_name'=>'font_weight',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Font weight', 'samatex'),
								'group'     => esc_html__('Typography', 'samatex'),
								'value'     => $font_weight_values,
							),
							array(
								'param_name'=>'font_subsets',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Font subsets', 'samatex'),
								'group'     => esc_html__('Typography', 'samatex'),
								'value'     => array(
									'latin' => 'latin',
								)
							),
							array(
								'type'       => 'textfield',
								'group'      => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Font size (without any string)','samatex'),
								'param_name' => 'font_size',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
								'param_name' => 'letter_spacing',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Line height (without any string)','samatex'),
								'param_name' => 'line_height',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Text transform','samatex'),
								'param_name' => 'text_transform',
								'value'      => array(
									esc_html__('None','samatex')       => 'none',
									esc_html__('Uppercase','samatex')  => 'uppercase',
									esc_html__('Lowercase','samatex')  => 'lowercase',
									esc_html__('Capitalize','samatex') => 'capitalize',
								)
							),

							/* tablet
							---------------*/

								array(
									'param_name'=>'tablet_text_align',
									'type'      => 'dropdown',
									'group'      => esc_html__('Tablet','samatex'),
									'heading'   => esc_html__('Text align', 'samatex'), 
									'value'      => array(
										esc_html__('Inherit','samatex') => 'inherit',
										esc_html__('Left','samatex')    => 'left',
										esc_html__('Right','samatex')   => 'right',
										esc_html__('Center','samatex')  => 'center',
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet landscape font size (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_landscape_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet landscape line height (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_landscape_line_height',
									'value'      => $line_height_values,
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet portrait font size (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_portrait_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Tablet portrait line height (without any string)','samatex'),
									'group'      => esc_html__('Tablet','samatex'),
									'param_name' => 'tablet_portrait_line_height',
									'value'      => $line_height_values,
								),

							/* mobile
							---------------*/

								array(
									'param_name'=>'mobile_text_align',
									'type'      => 'dropdown',
									'group'      => esc_html__('Mobile','samatex'),
									'heading'   => esc_html__('Text align', 'samatex'), 
									'value'      => array(
										esc_html__('Inherit','samatex') => 'inherit',
										esc_html__('Left','samatex')    => 'left',
										esc_html__('Right','samatex')   => 'right',
										esc_html__('Center','samatex')  => 'center',
									)
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Font size (without any string)','samatex'),
									'group'      => esc_html__('Mobile','samatex'),
									'param_name' => 'mobile_font_size',
									'value'      => $font_size_values,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Line height (without any string)','samatex'),
									'group'      => esc_html__('Mobile','samatex'),
									'param_name' => 'mobile_line_height',
									'value'      => $line_height_values,
								),

							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),

							/* margin
							---------------*/

								array(
									'type'       => 'margin',
									'group'      => esc_html__('Margin','samatex'),
									'heading'    => esc_html__('Margin','samatex'),
									'param_name' => 'margin',
									'value'      => ''
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element font','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_font',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_blockquote
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Blockquote','samatex'),
			    		'description'             => esc_html__('Add blockquote','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_blockquote',
			    		'class'                   => 'et_blockquote',
			    		'icon'                    => 'et_blockquote',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-blockquote.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-blockquote.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Content','samatex'),
								'param_name' => 'text',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Author','samatex'),
								'param_name' => 'author',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
			    		
							/* margin
							---------------*/

								array(
									'type'       => 'margin',
									'group'      => esc_html__('Margin','samatex'),
									'heading'    => esc_html__('Margin','samatex'),
									'param_name' => 'margin',
									'value'      => ''
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element font','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_font',
									'value'      => '',
								),
			    		)
			    	));

			/* UI
			---------------*/

				/* et_menu
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Navigation menu','samatex'),
			    		'description'             => esc_html__('Do not use with header builder','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_menu',
			    		'class'                   => 'et_menu font',
			    		'icon'                    => 'et_menu',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-menu.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-menu.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Menu name','samatex'),
								'param_name' => 'menu',
								'value'      => $menu_list,
							),
							array(
								'param_name'=>'align',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Align', 'samatex'), 
								'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
								'value'     => $align_values_extended
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),

							/* top level
							---------------*/

								/* styling
								---------------*/

									array(
										'type'       => 'textfield',
										'heading'    => esc_html__('Space between menu items in px (without any string)','samatex'),
										'group'      => 'Top level',
										'param_name' => 'menu_space',
										'value'      => '40',
									),

									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Submenu indicator','samatex'),
										'group'      => 'Top level',
										'param_name' => 'submenu_indicator',
										'value'      => $logic_values
									),

									array(
										'type'       => 'colorpicker',
										'heading'    => esc_html__('Menu color','samatex'),
										'group'      => 'Top level',
										'param_name' => 'menu_color',
										'value'      => '#212121',
									),

									array(
										'type'       => 'colorpicker',
										'heading'    => esc_html__('Menu color hover','samatex'),
										'group'      => 'Top level',
										'param_name' => 'menu_color_hover',
										'value'      => $main_color,
									),

									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Menu hover effect','samatex'),
										'group'      => 'Top level',
										'param_name' => 'menu_hover',
										'value'      => array(
											esc_html__('None','samatex')      => 'none',
											esc_html__('Underline','samatex') => 'underline',
											esc_html__('Overline','samatex')  => 'overline',
											esc_html__('Outline','samatex')   => 'outline',
											esc_html__('Box','samatex')       => 'box',
											esc_html__('Fill','samatex')      => 'fill',
										),
									),

									array(
										'type'       => 'colorpicker',
										'heading'    => esc_html__('Menu hover effect color','samatex'),
										'group'      => 'Top level',
										'param_name' => 'menu_effect_color',
										'value'      => '',
										'dependency' => Array('element' => 'menu_hover', 'value' => array('underline','overline','outline','box','fill'))
									),

								/* typography
								---------------*/

									array(
										'param_name'=>'font_family',
										'type'      => 'dropdown',
										'group'     => esc_html__('Top level','samatex'), 
										'heading'   => esc_html__('Font family', 'samatex'),
										'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
										'value'     => $google_fonts_family,
									),
									array(
										'param_name'=>'font_weight',
										'type'      => 'dropdown',
										'group'     => esc_html__('Top level','samatex'), 
										'heading'   => esc_html__('Font weight', 'samatex'),
										'value'     => $font_weight_values,
										'std'       => '700'
									),
									array(
										'param_name'=>'font_subsets',
										'type'      => 'dropdown',
										'group'     => esc_html__('Top level','samatex'), 
										'heading'   => esc_html__('Font subsets', 'samatex'),
										'value'      => array(
											'latin' => 'latin',
										)
									),
									array(
										'type'       => 'textfield',
										'heading'    => esc_html__('Font size (without any string)','samatex'),
										'group'      => esc_html__('Top level','samatex'),
										'param_name' => 'font_size',
										'value'      => '14',
									),
									array(
										'type'       => 'textfield',
										'group'      => esc_html__('Top level','samatex'),
										'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
										'param_name' => 'letter_spacing',
										'value'      => '1'
									),
									array(
										'type'       => 'textfield',
										'group'      => esc_html__('Top level','samatex'),
										'heading'    => esc_html__('Line height (without any string)','samatex'),
										'param_name' => 'line_height',
										'value'      => ''
									),
									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Text transform','samatex'),
										'group'      => 'Top level',
										'param_name' => 'text_transform',
										'value'      => array(
											esc_html__('None','samatex')       => 'none',
											esc_html__('Uppercase','samatex')  => 'uppercase',
											esc_html__('Lowercase','samatex')  => 'lowercase',
											esc_html__('Capitalize','samatex') => 'capitalize',
										)
									),
			    		
							/* submenu
							---------------*/

								/* styling
								---------------*/

									array(
										'type'       => 'colorpicker',
										'heading'    => esc_html__('Submenu color','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_color',
										'value'      => '#bdbdbd',
									),

									array(
										'type'       => 'colorpicker',
										'heading'    => esc_html__('Submenu color hover','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_color_hover',
										'value'      => '#ffffff',
									),

									array(
										'type'       => 'colorpicker',
										'heading'    => esc_html__('Submenu background color','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_back_color',
										'value'      => '#212121',
									),

									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Submenu shadow','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_shadow',
										'value'      => $logic_values
									),

									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Submenu indicator','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_submenu_indicator',
										'value'      => $logic_values
									),

									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Submenu items separator','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_separator',
										'value'      => $logic_values
									),

									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Submenu appear','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_appear_from',
										'value'      => array(
											esc_html__('From bottom','samatex') => 'bottom',
											esc_html__('From top','samatex')    => 'top'
										),
									),

									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Submenu appear effect','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_appear',
										'value'      => array(
											esc_html__('Appear','samatex')    => 'none',
											esc_html__('Fade','samatex')      => 'fade',
											esc_html__('Move','samatex')      => 'move',
										),
									),

									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Submenu hover effect','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_hover',
										'value'      => array(
											esc_html__('None','samatex')      => 'none',
											esc_html__('Line','samatex')      => 'line',
											esc_html__('Dot','samatex')       => 'dot',
											esc_html__('Outline','samatex')   => 'outline',
											esc_html__('Box','samatex')       => 'box',
											esc_html__('Fill','samatex')      => 'fill',
										),
									),

									array(
										'type'       => 'colorpicker',
										'heading'    => esc_html__('Submenu hover effect color','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'submenu_effect_color',
										'value'      => '',
										'dependency' => Array('element' => 'submenu_hover', 'value' => array('line','dot','outline','box','fill'))
									),

								/* typography
								---------------*/

									array(
										'param_name'=>'subfont_family',
										'type'      => 'dropdown',
										'group'     => esc_html__('Submenu','samatex'), 
										'heading'   => esc_html__('Submenu font family', 'samatex'),
										'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
										'value'     => $google_fonts_family,
									),
									array(
										'param_name'=>'subfont_weight',
										'type'      => 'dropdown',
										'group'     => esc_html__('Submenu','samatex'), 
										'heading'   => esc_html__('Submenu font weight', 'samatex'),
										'value'     => $font_weight_values
									),
									array(
										'param_name'=>'subfont_subsets',
										'type'      => 'dropdown',
										'group'     => esc_html__('Submenu','samatex'), 
										'heading'   => esc_html__('Submenu font subsets', 'samatex'),
										'value'      => array(
											'latin' => 'latin',
										)
									),
									array(
										'type'       => 'textfield',
										'heading'    => esc_html__('Submenu font size (without any string)','samatex'),
										'group'      => esc_html__('Submenu','samatex'),
										'param_name' => 'subfont_size',
										'value'      => '',
									),
									array(
										'type'       => 'textfield',
										'group'      => esc_html__('Submenu','samatex'),
										'heading'    => esc_html__('Submenu letter spacing (without any string)','samatex'),
										'param_name' => 'subletter_spacing',
										'value'      => ''
									),
									array(
										'type'       => 'dropdown',
										'heading'    => esc_html__('Submenu text transform','samatex'),
										'group'      => 'Submenu',
										'param_name' => 'subtext_transform',
										'value'      => array(
											esc_html__('None','samatex')       => 'none',
											esc_html__('Uppercase','samatex')  => 'uppercase',
											esc_html__('Lowercase','samatex')  => 'lowercase',
											esc_html__('Capitalize','samatex') => 'capitalize',
										)
									),

							/* margin
							---------------*/

								array(
									'type'       => 'margin',
									'group'      => esc_html__('Margin','samatex'),
									'heading'    => esc_html__('Margin','samatex'),
									'param_name' => 'margin',
									'value'      => ''
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element font','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_font',
									'value'      => '',
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element font','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'subelement_font',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_button
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Button','samatex'),
			    		'description'             => esc_html__('Do not use with header builder','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_button',
			    		'class'                   => 'et_button',
			    		'icon'                    => 'et_button',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-button.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-button.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button text','samatex'),
								'param_name' => 'button_text',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button link','samatex'),
								'param_name' => 'button_link',
								'value'      => '',
							),
							array(
								'param_name'=>'target',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Target', 'samatex'), 
								'value'     => array(
									'_self'  => '_self',
									'_blank' => '_blank' 
								)
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Open link in modal window?', 'samatex'),
								'param_name' => 'button_link_modal',
								'value'      => '',
							),
			    			array(
								'param_name'=>'button_size',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Button size', 'samatex'), 
								'value'     => $size_values_default,
								'std'       => 'medium'
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),

			    			/* typography
							---------------*/

								array(
									'param_name'=>'font_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Typography', 'samatex'),
									'heading'   => esc_html__('Font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'font_weight',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Font weight', 'samatex'),
									'group'     => esc_html__('Typography', 'samatex'),
									'value'     => $font_weight_values,
								),
								array(
									'param_name'=>'font_subsets',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Font subsets', 'samatex'),
									'group'     => esc_html__('Typography', 'samatex'),
									'value'     => array(
										'latin' => 'latin',
									)
								),
				    			array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Button font size (without any string)','samatex'),
									'group'      => esc_html__('Typography','samatex'),
									'param_name' => 'button_font_size',
									'value'      => '',
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Button letter spacing (without any string)','samatex'),
									'group'      => esc_html__('Typography','samatex'),
									'param_name' => 'button_letter_spacing',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Button line height (without any string)','samatex'),
									'group'      => esc_html__('Typography','samatex'),
									'param_name' => 'button_line_height',
									'value'      => ''
								),
								array(
									'type'       => 'dropdown',
									'group'   	 => esc_html__('Typography', 'samatex'),
									'heading'    => esc_html__('Text transform','samatex'),
									'param_name' => 'button_text_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									),
									'std' => 'none'
								),

							/* styling
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Button min width (without any string)','samatex'),
									'group'      => esc_html__('Styling','samatex'),
									'param_name' => 'button_min_width',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button color','samatex'),
									'group'      => esc_html__('Styling','samatex'),
									'param_name' => 'button_color',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button background color','samatex'),
									'group'      => esc_html__('Styling','samatex'),
									'param_name' => 'button_back_color',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button border color','samatex'),
									'group'      => esc_html__('Styling','samatex'),
									'param_name' => 'button_border_color',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Button border radius (without any string)','samatex'),
									'group'      => esc_html__('Styling','samatex'),
									'param_name' => 'button_border_radius',
									'value'      => '0'
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Button border width (without any string)','samatex'),
									'group'      => esc_html__('Styling','samatex'),
									'param_name' => 'button_border_width',
								),

								array(
				    				'type'       => 'checkbox',
									'heading'    => esc_html__('Button shadow ?', 'samatex'),
									'group'      => esc_html__('Styling','samatex'),
									'param_name' => 'button_shadow',
									'value'      => '',
								),

							/* icon
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Icon prefix','samatex'),
									'group'      => esc_html__('Icon','samatex'),
									'param_name' => 'icon_prefix',
									'value'      => '',
									'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Icon name','samatex'),
									'group'      => esc_html__('Icon','samatex'),
									'param_name' => 'icon_name',
									'value'      => '',
									'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Icon size (without any string)','samatex'),
									'group'      => esc_html__('Icon','samatex'),
									'param_name' => 'icon_font_size',
									'value'      => '',
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Icon margin (without any string)','samatex'),
									'group'      => esc_html__('Icon','samatex'),
									'param_name' => 'icon_margin',
									'value'      => '',
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Icon position','samatex'),
									'group'      => esc_html__('Icon','samatex'),
									'param_name' => 'icon_position',
									'value'      => array(
										esc_html__('Left','samatex')  => 'left',
										esc_html__('Right','samatex')  => 'right',
									)
								),

							/* hover
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button color hover','samatex'),
									'group'      => esc_html__('Hover','samatex'),
									'param_name' => 'button_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button background color hover','samatex'),
									'group'      => esc_html__('Hover','samatex'),
									'param_name' => 'button_back_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button border color hover','samatex'),
									'group'      => esc_html__('Hover','samatex'),
									'param_name' => 'button_border_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Hover animation','samatex'),
									'group'      => esc_html__('Hover','samatex'),
									'param_name' => 'animate_hover',
									'value'      => array(
										esc_html__('None','samatex')  => 'none',
										esc_html__('Fill','samatex')  => 'fill',
										esc_html__('Scale','samatex') => 'scale',
										esc_html__('Glint','samatex') => 'glint',
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Click animation','samatex'),
									'group'      => esc_html__('Click','samatex'),
									'param_name' => 'animate_click',
									'value'      => array(
										esc_html__('None','samatex')  => 'none',
										esc_html__('Material','samatex')  => 'material',
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Smooth Click animation','samatex'),
									'group'      => esc_html__('Click','samatex'),
									'param_name' => 'click_smooth',
									'value'      => ''
								),

							/* animation
							---------------*/

								array(
					                'type'       => 'animation_style',
					                'heading'    => esc_html__('Animation','samatex'),
									'group'      => esc_html__('Animation','samatex'),
					                'param_name' => 'animation',
					                'weight'     => 0,
					            ),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__( 'Animation delay in ms (example 300)', 'samatex' ),
									'group'      => esc_html__('Animation','samatex'),
									'param_name' => 'animation_delay',
									'weight'     => 1,
									'value'      => $animation_delay_values
								),

							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element font','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_font',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_separator
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Separator','samatex'),
						'description'             => esc_html__('Use this element to separate content','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_separator',
						'class'                   => 'et_separator',
						'icon'                    => 'et_separator',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-separator.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-separator.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Type','samatex'),
								'param_name' => 'type',
								'value'      => array(
									esc_html__('solid','samatex')  => 'solid',
									esc_html__('dotted','samatex') => 'dotted',
									esc_html__('dashed','samatex') => 'dashed',
								)
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Color','samatex'),
								'param_name' => 'color',
								'value'      => '#e0e0e0'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Gap from top (without any string)','samatex'),
								'param_name' => 'top',
								'value'      => '24'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Gap from bottom (without any string)','samatex'),
								'param_name' => 'bottom',
								'value'      => '24'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Width (without any string, if you want 100% leave blank)','samatex'),
								'param_name' => 'width',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Height (without any string, if you want 1px leave blank)','samatex'),
								'param_name' => 'height',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Align','samatex'),
								'param_name' => 'align',
								'value'      => $align_values
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Animate','samatex'),
								'param_name' => 'animate',
								'value'      => $logic_values
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Animation delay in ms (without any string)','samatex'),
								'param_name' => 'start_delay',
								'value'      => '',
								'dependency' => Array('element' => 'animate', 'value' => 'true')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),
							array(
								'type'       => 'rv',
								'heading'    => esc_html__( 'Responsive visibility', 'samatex' ),
								'group'      => esc_html__('Responsive visibility','samatex'),
								'param_name' => 'rv',
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

			    /* et_icon_separator
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Icon separator','samatex'),
						'description'             => esc_html__('Use this element to separate content','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_icon_separator',
						'class'                   => 'et_icon_separator',
						'icon'                    => 'et_icon_separator',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon-separator.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon-separator.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
							array(
								'param_name'=>'icon_size',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Icon size', 'samatex'), 
								'value'     => $size_values_default
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Separator color','samatex'),
								'param_name' => 'color_sep',
								'value'      => '#e0e0e0'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'param_name' => 'color_icon',
								'value'      => $main_color
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Gap from top (without any string)','samatex'),
								'param_name' => 'top',
								'value'      => '24'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Gap from bottom (without any string)','samatex'),
								'param_name' => 'bottom',
								'value'      => '24'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Separator width (without any string)','samatex'),
								'param_name' => 'width',
								'value'      => '120'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Height (without any string, if you want 1px leave blank)','samatex'),
								'param_name' => 'height',
								'value'      => '1'
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Align','samatex'),
								'param_name' => 'align',
								'value'      => $align_values
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

			    /* et_alert
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Alert','samatex'),
						'description'             => esc_html__('Use this element for notifications','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_alert',
						'class'                   => 'et_alert',
						'icon'                    => 'et_alert',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Message type','samatex'),
								'param_name' => 'type',
								'value'      => array(
									esc_html__('Note','samatex')        => 'note',
									esc_html__('Success','samatex')     => 'success',
									esc_html__('Warning','samatex')     => 'warning',
									esc_html__('Error','samatex')       => 'error',
									esc_html__('Information','samatex') => 'information'
								)
							),
							array(
								'type'       => 'textarea',
								'param_name' => 'content',
								'value'      => 'Alert message content goes here'
							)
						)
					));

			    /* et_more_box
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('More box','samatex'),
						'description'             => esc_html__('Insert click to open box with any content','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_more_box',
						'class'                   => 'et_more_box',
						'icon'                    => 'et_more_box',
						"as_parent"               => array('except' => 'vc_row, vc_section'),
	    				'content_element'         => true,
						"js_view"                 => 'VcColumnView',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-more-box.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-more-box.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Position','samatex'),
								'param_name' => 'position',
								'value'      => array(
									esc_html__('From left bottom','samatex')       => 'left',
									esc_html__('From right bottom','samatex')  => 'right',
								),
								'std' => 'left'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'param_name' => 'icon_color',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'param_name' => 'icon_back_color',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Width in px (without any string)','samatex'),
								'description'=> esc_html__('If you want the box to fit the available width of the column, leave blank','samatex'),
								'param_name' => 'width',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Height in px (without any string)','samatex'),
								'description'=> esc_html__('If you want the box to fit the available height of the column, leave blank','samatex'),
								'param_name' => 'height',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),

							/* padding
							---------------*/

								array(
									'type'       => 'padding',
									'group'      => esc_html__('Padding','samatex'),
									'heading'    => esc_html__('Padding','samatex'),
									'param_name' => 'padding',
									'value'      => '48,48,48,48'
								),

								array(
									'type'       => 'crp',
									'heading'    => esc_html__( 'Responsive padding', 'samatex' ),
									'group'      => esc_html__('Responsive Options','samatex'),
									'param_name' => 'crp',
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

			    /* et_animate_box
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Animate box','samatex'),
						'description'             => esc_html__('Insert animate box with any content','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_animate_box',
						'class'                   => 'et_animate_box',
						'icon'                    => 'et_animate_box',
						"as_parent"               => array('except' => 'vc_row, vc_section'),
	    				'content_element'         => true,
						"js_view"                 => 'VcColumnView',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-animate-box.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-animate-box.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Background color','samatex'),
								'param_name' => 'color',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),

							/* padding
							---------------*/

								array(
									'type'       => 'padding',
									'group'      => esc_html__('Padding','samatex'),
									'heading'    => esc_html__('Padding','samatex'),
									'param_name' => 'padding',
									'value'      => '48,48,48,48'
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						
							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),

							/* curtain
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Curtain effect','samatex'),
									'group'      => esc_html__('Curtain effect','samatex'),
									'param_name' => 'curtain',
									'value'      => ''
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Curtain direction','samatex'),
									'group'      => esc_html__('Curtain effect','samatex'),
									'param_name' => 'curtain_direction',
									'value'      => array(
										esc_html__('Left to Right','samatex') => 'left',
										esc_html__('Right to Left','samatex') => 'right',
										esc_html__('Top to bottom','samatex') => 'top',
										esc_html__('Bottom to top','samatex') => 'bottom',
									),
									'dependency' => Array(
										'element' => 'curtain', 'value' => 'true'
									)
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Curtain color','samatex'),
									'group'      => esc_html__('Curtain effect','samatex'),
									'param_name' => 'curtain_color',
									'value'      => $main_color,
									'dependency' => Array(
										'element' => 'curtain', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__( 'Animation delay in ms (example 300)', 'samatex' ),
									'group'      => esc_html__('Curtain effect','samatex'),
									'param_name' => 'curtain_animation_delay',
									'value'      => $animation_delay_values,
									'dependency' => Array(
										'element' => 'curtain', 'value' => 'true'
									)
								),
						)
					));

			    /* et_icon
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Icon','samatex'),
						'description'             => esc_html__('Insert icon','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_icon',
						'class'                   => 'et_icon',
						'icon'                    => 'et_icon',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
			    			array(
								'param_name'=>'icon_size',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Size', 'samatex'), 
								'value'     => $size_values_extra,
								'std'       => 'medium'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'param_name' => 'icon_color',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'param_name' => 'icon_back_color',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'param_name' => 'icon_border_color',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon border radius (without any string)','samatex'),
								'param_name' => 'icon_border_radius',
								'value'      => '0'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon border width (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

			    /* et_icon_list
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Icon list','samatex'),
						'description'             => esc_html__('Insert icon list','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_icon_list',
						'class'                   => 'et_icon_list',
						'icon'                    => 'et_icon_list',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon-list.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon-list.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
			    			array(
								'param_name'=>'icon_size',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Size', 'samatex'), 
								'value'     => $size_values_default,
								'std'       => 'medium'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'param_name' => 'icon_color',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'param_name' => 'icon_back_color',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'param_name' => 'icon_border_color',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon border radius (without any string)','samatex'),
								'param_name' => 'icon_border_radius',
								'value'      => '0'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon border width (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),
							array(
								'type'       => 'checkbox',
								'heading'    => esc_html__('Shadow','samatex'),
								'param_name' => 'shadow',
								'value'      => ''
							),
							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('List items','samatex'),
								'param_name' => 'content',
								'value'      => '',
								'description' => esc_html__('Use line break (press Enter) to separate between items','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

			    /* et_accordion
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Accordion','samatex'),
			    		'description'             => esc_html__('Insert accordion','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_accordion',
			    		'class'                   => 'et_accordion',
			    		'icon'                    => 'et_accordion',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-accordion.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-accordion.js',
			    		'as_parent'               => array('only' => 'et_accordion_item'),
			    		'content_element'         => true,
			    		'show_settings_on_create' => true,
			    		'is_container'            => true,
			    		'js_view'                 => 'VcColumnView',
			    		'params'                  => array(
			    			array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Collapsible','samatex'),
								'param_name' => 'collapsible',
								'value'      => $logic_values
							),
			    		)
			    	));


			    	vc_map(array(
						'name'                    => esc_html__('Accordion item','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_accordion_item',
						'class'                   => 'et_accordion_item',
						'icon'                    => 'et_accordion_item',
						'as_child'                => array('only' => 'et_accordion'),
	    				"as_parent"               => array('except' => 'vc_section'),
	    				'content_element'         => true,
						"js_view"                 => 'VcColumnView',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Open','samatex'),
								'param_name' => 'open',
								'value'      => $logic_values
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
							array(
			    				'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => ''
							)
						)
					));

			    /* et_tabs
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Tabs','samatex'),
			    		'description'             => esc_html__('Insert tabs','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_tab',
			    		'class'                   => 'et_tab',
			    		'icon'                    => 'et_tab',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-tab.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-tab.js',
			    		'as_parent'               => array('only' => 'et_tab_item'),
			    		'content_element'         => true,
			    		'show_settings_on_create' => true,
			    		'is_container'            => true,
			    		'js_view'                 => 'VcColumnView',
			    		'params'                  => array(
			    			array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Type','samatex'),
								'param_name' => 'type',
								'value'      => array(
									esc_html__('Horizontal','samatex')  => 'horizontal',
									esc_html__('Vertical','samatex')  => 'vertical',
								)
							),
							array(
								'type'       => 'checkbox',
								'heading'    => esc_html__('Tabs center','samatex'),
								'param_name' => 'center',
							),
			    		)
			    	));


			    	vc_map(array(
						'name'                    => esc_html__('Tab','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_tab_item',
						'class'                   => 'et_tab_item',
						'icon'                    => 'et_tab_item',
						'as_child'                => array('only' => 'et_tab'),
	    				"as_parent"               => array('except' => 'vc_section'),
	    				'content_element'         => true,
						"js_view"                 => 'VcColumnView',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Active','samatex'),
							'param_name' => 'active',
							'value'      => array(
								'false' => 'false',
								'true'  => 'true'
							)
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Icon prefix','samatex'),
							'param_name' => 'icon_prefix',
							'value'      => '',
							'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Icon name','samatex'),
							'param_name' => 'icon_name',
							'value'      => '',
							'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
						),
						array(
		    				'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => ''
						),
						)
					));

			/* SOCIAL
			---------------*/

				/* et_social_icons
				---------------*/

					foreach ($social_links_array as $social) {
						vc_add_param('et_social_links', array(
							'type'       => 'textfield',
							'heading'    => ucfirst($social).' link',
							'param_name' => $social,
							'value'      => '',
							'weight' => 1
						));
					}

			    	vc_map(array(
						'name'                    => esc_html__('Social links','samatex'),
			    		'description'             => esc_html__('Use to add social links','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_social_links',
			    		'class'                   => 'et_social_links',
			    		'icon'                    => 'et_social_links',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-social-links.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-social-links.js',
						'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
							array(
								'param_name'=>'target',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Target', 'samatex'), 
								'value'     => array(
									'_self'  => '_self',
									'_blank' => '_blank' 
								)
							),

							/* styling
							---------------*/

								array(
									'param_name'=>'shadow',
									'type'      => 'checkbox',
									'group'     => esc_html__('Styling','samatex'), 
									'heading'   => esc_html__('Shadow', 'samatex'), 
									'value'     => ''
								),

								array(
									'param_name'=>'styling_original',
									'type'      => 'dropdown',
									'group'     => esc_html__('Styling','samatex'), 
									'heading'   => esc_html__('Original styling', 'samatex'), 
									'value'     => $logic_values
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon color','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'icon_color',
									'value'      => '#616161',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon color hover','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'icon_color_hover',
									'value'      => '#212121',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon background color','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'icon_background_color',
									'value'      => '',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon background color hover','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'icon_background_color_hover',
									'value'      => '',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon border color','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'icon_border_color',
									'value'      => '',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon border color hover','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'icon_border_color_hover',
									'value'      => '',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Icon border width (without any string)','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'icon_border_width',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

				/* et_social_icons
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Social share','samatex'),
			    		'description'             => esc_html__('Use to add social sharing','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_social_share',
			    		'class'                   => 'et_social_share',
			    		'icon'                    => 'et_social_share',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-social-share.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-social-share.js',
						'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
							
							/* styling
							---------------*/

								array(
									'param_name'=>'shadow',
									'type'      => 'checkbox',
									'heading'   => esc_html__('Shadow', 'samatex'), 
									'value'     => ''
								),

								array(
									'param_name'=>'styling_original',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Original styling', 'samatex'), 
									'value'     => $logic_values
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon color','samatex'),
									'param_name' => 'icon_color',
									'value'      => '#616161',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon color hover','samatex'),
									'param_name' => 'icon_color_hover',
									'value'      => '#212121',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon background color','samatex'),
									'param_name' => 'icon_background_color',
									'value'      => '',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon background color hover','samatex'),
									'param_name' => 'icon_background_color_hover',
									'value'      => '',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon border color','samatex'),
									'param_name' => 'icon_border_color',
									'value'      => '',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon border color hover','samatex'),
									'param_name' => 'icon_border_color_hover',
									'value'      => '',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Icon border width (without any string)','samatex'),
									'param_name' => 'icon_border_width',
									'dependency' => Array('element' => 'styling_original', 'value' => 'false')
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

				/* et_mailchimp
				---------------*/

	 				$list_array = enovathemes_addons_mailchimp_list();

	 				$list_values = array(''=>esc_html__('Choose','samatex'));

	 				if ( !is_wp_error( $list_array )  && is_array($list_array)){

	 					foreach ( $list_array as $list){
	 						$list_values[$list['id']] = $list['name'];
	 					}
	 				}
				
					$list_values = array_flip($list_values);

					if (empty($list_values)) {
						array_push($list_values, esc_html__('Mailchimp did not return any list','samatex'));
					}

			    	vc_map(array(
			    		'name'                    => esc_html__('Mailchimp','samatex'),
			    		'description'             => esc_html__('Use to add AJAX mailchimp subscribe','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_mailchimp',
			    		'class'                   => 'et_mailchimp',
			    		'icon'                    => 'et_mailchimp',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mailchimp.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mailchimp.js',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('List','samatex'),
								'description'=> esc_html__('Make sure you have the Mailchimp API key and at least one list in your Mailchimp dashboard. Go to theme options >> general >> Mailchimp API key','samatex'),
								'param_name' => 'list',
								'value'      => $list_values,
							),

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Text field color','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'text_color',
									'value'      => '#616161',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Text field color focus','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'text_color_focus',
									'value'      => '#616161',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Text field background color','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'text_background_color',
									'value'      => '#ffffff',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Text field background color focus','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'text_background_color_focus',
									'value'      => '#ffffff',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Text field border color','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'text_border_color',
									'value'      => '#e0e0e0',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Text field border color focus','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'text_border_color_focus',
									'value'      => '#bdbdbd',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button background color','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'button_background_color',
									'value'      => $main_color,
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button background color hover','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'button_background_color_hover',
									'value'      => '#212121',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button text color','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'button_color',
									'value'      => '#ffffff',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Button text color hover','samatex'),
									'group'     => esc_html__('Styling','samatex'), 
									'param_name' => 'button_color_hover',
									'value'      => '#ffffff',
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

			/* SELFHOSTED
			---------------*/

				/* et_icon_box_container
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Icon box container','samatex'),
						'description'             => esc_html__('Insert icon box container','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_icon_box_container',
						'class'                   => 'et_icon_box_container',
						'icon'                    => 'et_icon_box_container',
						"as_parent"               => array('only' => 'et_icon_box'),
	    				'content_element'         => true,
						"js_view"                 => 'VcColumnView',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon-box-container.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon-box-container.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Grid border color','samatex'),
								'param_name' => 'border_color',
								'value'      => ''
							),
							array(
								'type'       => 'checkbox',
								'heading'    => esc_html__('Shadow','samatex'),
								'param_name' => 'shadow',
								'value'      => ''
							),
							array(
								'param_name'=>'columns',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Column', 'samatex'), 
								'value'     => array(
									'1'  => '1',
									'2'  => '2',
									'3'  => '3',
									'4'  => '4',
								)
							),
							array(
								'param_name'=>'height',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Min height', 'samatex'), 
								'value'     => array(
									'0'      => '0',
									'100vh'  => '100vh',
									'70vh'   => '70vh',
									'60vh'   => '60vh',
									'50vh'   => '50vh',
									'custom'  => 'custom',
								)
							),
							array(
								'param_name'=>'custom-height',
								'type'      => 'textfield',
								'heading'   => esc_html__('Custom min height value (enter any value you need using all available units)', 'samatex'), 
								'value'     => '',
								'dependency' => Array(
									'element' => 'height', 'value' => 'custom',
								)
							),
							array(
								'param_name'=>'vertical_align',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Vertical align boxes', 'samatex'), 
								'value'     => array(
									'top'     => 'top',
									'middle'  => 'middle',
									'bottom'  => 'bottom',
								),
								'dependency' => Array(
									'element' => 'height', 'value' => array('100vh','70vh','60vh','50vh','custom'),
								)
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Box animation','samatex'),
								'param_name' => 'animation',
								'value'      => array(
									esc_html__('None','samatex')   => 'none',
									esc_html__('Fade','samatex') => 'fadeIn',
									esc_html__('Move','samatex') => 'moveUp',
								)
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Box animation type','samatex'),
								'param_name' => 'animation_type',
								'value'      => $animation_type_values,
								'dependency' => Array(
									'element' => 'animation', 'value' => array('fadeIn','moveUp'),
								)
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

				/* et_icon_box
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Icon box','samatex'),
						'description'             => esc_html__('Insert icon box','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_icon_box',
						'class'                   => 'et_icon_box',
						'icon'                    => 'et_icon_box',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon-box.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-icon-box.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
			    			array(
								'param_name'=>'icon_size',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Icon size', 'samatex'), 
								'value'     => array(
									esc_html__('Small','samatex')    => 'small',
									esc_html__('Medium','samatex')   => 'medium',
									esc_html__('Large','samatex')    => 'large',
									esc_html__('Large X','samatex')  => 'large-x',
									esc_html__('Large XX','samatex') => 'large-xx',
								),
								'std' => 'large'
							),
							array(
								'param_name'=>'icon_position',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Icon position', 'samatex'),
								'value'     => array(
									esc_html__('Top','samatex')  => 'top',
									esc_html__('Left','samatex')  => 'left',
									esc_html__('Right','samatex')  => 'right',
								),
							),
							array(
								'param_name'=>'icon_alignment',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Icon alignment', 'samatex'),
								'value'     => $align_values,
								'dependency' => Array(
									'element' => 'icon_position', 'value' => 'top',
								)
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Hover animation','samatex'),
								'param_name' => 'hover',
								'value'      => array(
									esc_html__('None','samatex')      => 'none',
									esc_html__('Scale','samatex')     => 'scale',
									esc_html__('Glint','samatex')     => 'glint',
									esc_html__('Transform','samatex') => 'transform',
									esc_html__('Ghost','samatex')     => 'ghost',
								)
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),


							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'icon_color',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon color hover','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'icon_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon background color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'icon_back_color',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon background color hover','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'icon_back_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon border color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'icon_border_color',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Icon border color hover','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'icon_border_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Icon border radius (without any string)','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'icon_border_radius',
									'value'      => '0'
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Icon border width (without any string)','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'icon_border_width',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Title color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'title_color',
									'value'      => '#212121'
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Title color hover','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'title_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Content color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'text_color',
									'value'      => '#616161'
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Content color hover','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'text_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Box background color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'box_color',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Box background color hover','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'box_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Box border width (without any string)','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'box_border_width',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Box border color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'box_border_color',
									'value'      => ''
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Box border color hover','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'box_border_color_hover',
									'value'      => ''
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Shadow','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'shadow',
									'value'      => ''
								),

							/* content
							---------------*/

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Title','samatex'),
									'group'      => esc_html__('Content', 'samatex'), 
									'param_name' => 'title',
									'value'      => ''
								),
								array(
									'param_name'=>'title_tag',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Tag', 'samatex'), 
									'group'      => esc_html__('Content', 'samatex'), 
									'value'     => array(
										'H1'  => 'h1', 
										'H2'  => 'h2', 
										'H3'  => 'h3', 
										'H4'  => 'h4', 
										'H5'  => 'h5', 
										'H6'  => 'h6', 
										'p'   => 'p', 
										'div' => 'div', 
									),
									'std' => 'h4'
								),
								array(
									'type'       => 'textarea_html',
									'heading'    => esc_html__('Content','samatex'),
									'group'      => esc_html__('Content', 'samatex'), 
									'param_name' => 'content',
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Link','samatex'),
									'group'      => esc_html__('Content', 'samatex'), 
									'param_name' => 'link',
									'value'      => ''
								),

							/* padding
							---------------*/

								array(
									'type'       => 'padding',
									'group'      => esc_html__('Padding','samatex'),
									'heading'    => esc_html__('Padding','samatex'),
									'param_name' => 'padding',
									'value'      => '48,32,48,32'
								),

							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

				/* et_step_box_container
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Step box container','samatex'),
						'description'             => esc_html__('Insert step box container','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_step_box_container',
						'class'                   => 'et_step_box_container',
						'icon'                    => 'et_step_box_container',
						"as_parent"               => array('only' => 'et_step_box'),
	    				'content_element'         => true,
						"js_view"                 => 'VcColumnView',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-step-box-container.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-step-box-container.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Dot color','samatex'),
								'param_name' => 'color',
								'value'      => $main_color
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Dot text color','samatex'),
								'param_name' => 'text_color',
								'value'      => ''
							),
							array(
								'param_name'=>'columns',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Column', 'samatex'), 
								'value'     => array(
									'1'  => '1',
									'2'  => '2',
									'3'  => '3',
									'4'  => '4',
								)
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

				/* et_step_box
				---------------*/

			    	vc_map(array(
						'name'                    => esc_html__('Step box','samatex'),
						'description'             => esc_html__('Insert step box','samatex'),
						'category'                => esc_html__('Enovathemes','samatex'),
						'base'                    => 'et_step_box',
						'class'                   => 'et_step_box',
						'icon'                    => 'et_step_box',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-step-box.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-step-box.js',
						'show_settings_on_create' => true,
						'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),


							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Title color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'title_color',
									'value'      => '#212121'
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Content color','samatex'),
									'group'      => esc_html__('Styling', 'samatex'), 
									'param_name' => 'text_color',
									'value'      => '#616161'
								),

							/* content
							---------------*/

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Title','samatex'),
									'group'      => esc_html__('Content', 'samatex'), 
									'param_name' => 'title',
									'value'      => ''
								),
								array(
									'param_name'=>'title_tag',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Tag', 'samatex'), 
									'group'      => esc_html__('Content', 'samatex'), 
									'value'     => array(
										'H1'  => 'h1', 
										'H2'  => 'h2', 
										'H3'  => 'h3', 
										'H4'  => 'h4', 
										'H5'  => 'h5', 
										'H6'  => 'h6', 
										'p'   => 'p', 
										'div' => 'div', 
									),
									'std' => 'h4'
								),
								array(
									'type'       => 'textarea_html',
									'heading'    => esc_html__('Content','samatex'),
									'group'      => esc_html__('Content', 'samatex'), 
									'param_name' => 'content',
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
						)
					));

				/* et_carousel
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Carousel','samatex'),
			    		'description'             => esc_html__('Insert carousel with any content you want','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_carousel',
			    		'class'                   => 'et_carousel',
			    		'icon'                    => 'et_carousel',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-carousel.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-carousel.js',
			    		'show_settings_on_create' => true,
				    	'content_element'         => true,
						"js_view"                 => 'VcColumnView',
			    		'as_parent'               => array('only' => 'et_carousel_item'),
			    		'params'                  => array(
							array(
								'param_name'=>'columns',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Column', 'samatex'), 
								'value'     => array(
									'1'  => '1',
									'2'  => '2',
									'3'  => '3',
									'4'  => '4',
									'5'  => '5',
									'6'  => '6',
								)
							),
							array(
								'param_name'=>'gap',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Gap', 'samatex'), 
								'value'     => array(
									esc_html__('0px', 'samatex')    => '0', 
									esc_html__('2px', 'samatex')    => '2', 
									esc_html__('4px', 'samatex')    => '4', 
									esc_html__('8px', 'samatex')    => '8', 
									esc_html__('16px', 'samatex')   => '16', 
									esc_html__('24px', 'samatex')   => '24', 
									esc_html__('32px', 'samatex')   => '32', 
									esc_html__('40px', 'samatex')   => '40',
								)
							),
							array(
								'param_name'=>'navigation_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Navigation type', 'samatex'), 
								'value'     => array(
									esc_html__('Only arrows','samatex')  => 'only-arrows',
									esc_html__('Only dottes','samatex')  => 'only-dottes',
									esc_html__('Both arrows and dottes','samatex')  => 'both'
								)
							),
							array(
								'param_name'=>'autoplay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autoplay', 'samatex'), 
								'value'     => $logic_values
							),
			    		)
			    	));

			    	vc_map(array(
			    		'name'                    => 'Carousel item',
			    		'description'             => esc_html__('Insert carousel item','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_carousel_item',
			    		'class'                   => 'et_carousel_item',
			    		'icon'                    => 'et_carousel_item',
			    		'show_settings_on_create' => false,
				    	'content_element'         => true,
			    		'as_child'                => array('only' => 'et_carousel'),
			    		"as_parent"               => array('except' => 'vc_row, vc_section'),
						"js_view"                 => 'VcColumnView',
			    		'params'                  => array()
			    	));

			    /* et_pricing_table
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Pricing table','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'description'             => esc_html__('Use to display your service/product pricing','samatex'),
			    		'base'                    => 'et_pricing_table',
			    		'icon'                    => 'et_pricing_table',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-pricing-table.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-pricing-table.js',
			    		'content_element'         => true,
			    		'params'                  => array(
			    			array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Color','samatex'),
								'param_name' => 'color',
								'value'      => ''
							),
			    			array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Highlight', 'samatex'),
								'param_name' => 'highlight',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Label','samatex'),
								'param_name' => 'label',
								'value'      => ''
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Currency','samatex'),
								'param_name' => 'currency',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Price','samatex'),
								'param_name' => 'price',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Plan','samatex'),
								'param_name' => 'plan',
								'value'      => ''
							),
							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('List items','samatex'),
								'param_name' => 'content',
								'value'      => '',
								'description' => esc_html__('Use line break (press Enter) to separate between items','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button text','samatex'),
								'param_name' => 'button_text',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button link','samatex'),
								'param_name' => 'button_link',
								'value'      => ''
							),
							array(
								'param_name'=>'target',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Target', 'samatex'), 
								'value'     => array(
									'_self'  => '_self',
									'_blank' => '_blank' 
								)
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_testimonial
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Testimonial carousel container','samatex'),
			    		'description'             => esc_html__('Add testimonials to carousel container','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_testimonial_container',
			    		'class'                   => 'et_testimonial_container',
			    		'icon'                    => 'et_testimonial_container',
			    		'show_settings_on_create' => true,
				    	'content_element'         => true,
			    		'js_view'                 => 'VcColumnView',
			    		'as_parent'               => array('only' => 'et_testimonial'),
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-testimonial-container.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-testimonial-container.js',
			    		'params'                  => array(
							array(
								'param_name'=>'columns',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Column', 'samatex'), 
								'value'     => array(
									'1'  => '1',
									'2'  => '2',
									'3'  => '3',
									'4'  => '4',
								)
							),
							array(
								'param_name'=>'gap',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Gap', 'samatex'), 
								'value'     => array(
									esc_html__('0px', 'samatex')    => '0', 
									esc_html__('2px', 'samatex')    => '2', 
									esc_html__('4px', 'samatex')    => '4', 
									esc_html__('8px', 'samatex')    => '8', 
									esc_html__('16px', 'samatex')   => '16', 
									esc_html__('24px', 'samatex')   => '24', 
									esc_html__('32px', 'samatex')   => '32', 
									esc_html__('40px', 'samatex')   => '40',
								)
							),
							array(
								'param_name'=>'navigation_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Navigation type', 'samatex'), 
								'value'     => array(
									esc_html__('Only arrows','samatex')  => 'only-arrows',
									esc_html__('Only dottes','samatex')  => 'only-dottes',
									esc_html__('Both arrows and dottes','samatex')  => 'both'
								)
							),
							array(
								'param_name'=>'autoplay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autoplay', 'samatex'), 
								'value'     => $logic_values
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							)
			    		)
			    	));

			    	vc_map(array(
			    		'name'                    => esc_html__('Testimonial','samatex'),
			    		'description'             => esc_html__('Add testimonial','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_testimonial',
			    		'class'                   => 'et_testimonial',
			    		'icon'                    => 'et_testimonial',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-testimonial.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-testimonial.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Content','samatex'),
								'param_name' => 'text',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Author','samatex'),
								'param_name' => 'author',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Author image','samatex'),
								'param_name' => 'image',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),
			    		)
			    	));

			    /* et_client
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Client container','samatex'),
			    		'description'             => esc_html__('Add clients to container','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_client_container',
			    		'class'                   => 'et_client_container',
			    		'icon'                    => 'et_client_container',
			    		'show_settings_on_create' => true,
			    		'is_container'            => true,
				    	'content_element'         => true,
			    		'js_view'                 => 'VcColumnView',
			    		'as_parent'               => array('only' => 'et_client'),
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-client-container.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-client-container.js',
			    		'params'                  => array(
			    			array(
								'param_name'=>'type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Type', 'samatex'), 
								'value'     => array(
									esc_html__('Grid', 'samatex')     => 'grid', 
									esc_html__('Carousel', 'samatex') => 'carousel', 
								)
							),
							array(
								'param_name'=>'border',
								'type'      => 'checkbox',
								'heading'   => esc_html__('Border', 'samatex'), 
								'dependency'=> Array('element' => 'type', 'value' => 'grid')
							),
							array(
								'param_name'=>'columns',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Column', 'samatex'), 
								'value'     => array(
									'1'  => '1',
									'2'  => '2',
									'3'  => '3',
									'4'  => '4',
									'5'  => '5',
									'6'  => '6',
								)
							),
							array(
								'param_name'=>'gap',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Gap', 'samatex'), 
								'value'     => array(
									esc_html__('0px', 'samatex')    => '0', 
									esc_html__('2px', 'samatex')    => '2', 
									esc_html__('4px', 'samatex')    => '4', 
									esc_html__('8px', 'samatex')    => '8', 
									esc_html__('16px', 'samatex')   => '16', 
									esc_html__('24px', 'samatex')   => '24', 
									esc_html__('32px', 'samatex')   => '32', 
									esc_html__('40px', 'samatex')   => '40',
								)
							),
							array(
								'param_name'=>'navigation_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Navigation type', 'samatex'), 
								'value'     => array(
									esc_html__('Only arrows','samatex')  => 'only-arrows',
									esc_html__('Only dottes','samatex')  => 'only-dottes',
									esc_html__('Both arrows and dottes','samatex')  => 'both'
								),
								'dependency' => Array('element' => 'type', 'value' => 'carousel')
							),
							array(
								'param_name'=>'autoplay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autoplay', 'samatex'), 
								'value'     => $logic_values,
								'dependency' => Array('element' => 'type', 'value' => 'carousel')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							)
			    		)
			    	));

			    	vc_map(array(
			    		'name'                    => esc_html__('Client','samatex'),
			    		'description'             => esc_html__('Add client','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_client',
			    		'class'                   => 'et_client',
			    		'icon'                    => 'et_client',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-client.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-client.js',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Link','samatex'),
								'param_name' => 'link',
								'value'      => '',
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Client image','samatex'),
								'param_name' => 'image',
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Client image hover','samatex'),
								'param_name' => 'image_hover',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Client background color','samatex'),
								'param_name' => 'color',
								'value'      => '',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Client background color hover','samatex'),
								'param_name' => 'color_hover',
								'value'      => '',
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

			    /* et_person
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Person carousel container','samatex'),
			    		'description'             => esc_html__('Add persons to carousel container','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_person_container',
			    		'class'                   => 'et_person_container',
			    		'icon'                    => 'et_person_container',
			    		'show_settings_on_create' => true,
			    		'is_container'            => true,
				    	'content_element'         => true,
			    		'js_view'                 => 'VcColumnView',
			    		'as_parent'               => array('only' => 'et_person'),
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-person-container.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-person-container.js',
			    		'params'                  => array(
							array(
								'param_name'=>'columns',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Column', 'samatex'), 
								'value'     => array(
									'1'  => '1',
									'2'  => '2',
									'3'  => '3',
									'4'  => '4',
								)
							),
							array(
								'param_name'=>'gap',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Gap', 'samatex'), 
								'value'     => array(
									esc_html__('0px', 'samatex')    => '0', 
									esc_html__('2px', 'samatex')    => '2', 
									esc_html__('4px', 'samatex')    => '4', 
									esc_html__('8px', 'samatex')    => '8', 
									esc_html__('16px', 'samatex')   => '16', 
									esc_html__('24px', 'samatex')   => '24', 
									esc_html__('32px', 'samatex')   => '32', 
									esc_html__('40px', 'samatex')   => '40',
								)
							),
							array(
								'param_name'=>'navigation_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Navigation type', 'samatex'), 
								'value'     => array(
									esc_html__('Only arrows','samatex')  => 'only-arrows',
									esc_html__('Only dottes','samatex')  => 'only-dottes',
									esc_html__('Both arrows and dottes','samatex')  => 'both'
								)
							),
							array(
								'param_name'=>'autoplay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autoplay', 'samatex'), 
								'value'     => $logic_values
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							)
			    		)
			    	));

			    	foreach ($social_links_array as $social) {
						vc_add_param('et_person', array(
							'type'       => 'textfield',
							'heading'    => ucfirst($social).' link',
							'group'      => esc_html__('Social','samatex'),
							'param_name' => $social,
							'value'      => '',
						));
					}

			    	vc_map(array(
			    		'name'                    => esc_html__('Person','samatex'),
			    		'description'             => esc_html__('Add person','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_person',
			    		'class'                   => 'et_person',
			    		'icon'                    => 'et_person',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-person.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-person.js',
			    		'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Name','samatex'),
								'param_name' => 'name',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Image','samatex'),
								'param_name' => 'image',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
			    		)
			    	));

			    /* et_map
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Google map','samatex'),
			    		'description'             => esc_html__('Inser google map','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_map',
			    		'class'                   => 'et_map',
			    		'icon'                    => 'et_map',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-map.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-map.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Google map zoom level (from 1 to 19 without any string)','samatex'),
								'param_name' => 'zoom',
								'value'      => '18'
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Type','samatex'),
								'param_name' => 'type',
								'value'      => array(
									esc_html__('Roadmap','samatex')    => 'roadmap',
									esc_html__('Satellite','samatex')  => 'satellite',
									esc_html__('Black','samatex')      => 'black',
									esc_html__('Grey','samatex')      => 'grey',
								)
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Width','samatex'),
								'param_name' => 'width',
								'value'      => '100%'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Height','samatex'),
								'param_name' => 'height',
								'value'      => '480px'
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Upload custom marker','samatex'),
								'param_name' => 'marker',
								'value'      => ''
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('X coordinate','samatex'),
								'group'       => esc_html__('Location 1','samatex'),
								'param_name'  => 'x_coords_1',
								'value'       => '',
								'description' => esc_html__('Use latitude coordinate for example 53.339381','samatex'),
							),
			    			array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Y coordinate','samatex'),
								'group'       => esc_html__('Location 1','samatex'),
								'param_name'  => 'y_coords_1',
								'value'       => '',
								'description' => esc_html__('Use longitude coordinate for example -6.260405','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'group'       => esc_html__('Location 1','samatex'),
								'param_name' => 'title_1',
								'value'      => ''
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Image','samatex'),
								'group'       => esc_html__('Location 1','samatex'),
								'param_name' => 'image_1',
								'value'      => ''
							),
							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Content','samatex'),
								'group'       => esc_html__('Location 1','samatex'),
								'param_name' => 'content_1',
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('X coordinate','samatex'),
								'group'       => esc_html__('Location 2','samatex'),
								'param_name'  => 'x_coords_2',
								'value'       => '',
								'description' => esc_html__('Use latitude coordinate for example 53.339381','samatex'),
							),
			    			array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Y coordinate','samatex'),
								'group'       => esc_html__('Location 2','samatex'),
								'param_name'  => 'y_coords_2',
								'value'       => '',
								'description' => esc_html__('Use longitude coordinate for example -6.260405','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'group'       => esc_html__('Location 2','samatex'),
								'param_name' => 'title_2',
								'value'      => ''
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Image','samatex'),
								'group'       => esc_html__('Location 2','samatex'),
								'param_name' => 'image_2',
								'value'      => ''
							),
							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Content','samatex'),
								'group'       => esc_html__('Location 2','samatex'),
								'param_name' => 'content_2',
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('X coordinate','samatex'),
								'group'       => esc_html__('Location 3','samatex'),
								'param_name'  => 'x_coords_3',
								'value'       => '',
								'description' => esc_html__('Use latitude coordinate for example 53.339381','samatex'),
							),
			    			array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Y coordinate','samatex'),
								'group'       => esc_html__('Location 3','samatex'),
								'param_name'  => 'y_coords_3',
								'value'       => '',
								'description' => esc_html__('Use longitude coordinate for example -6.260405','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'group'       => esc_html__('Location 3','samatex'),
								'param_name' => 'title_3',
								'value'      => ''
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Image','samatex'),
								'group'       => esc_html__('Location 3','samatex'),
								'param_name' => 'image_3',
								'value'      => ''
							),
							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Content','samatex'),
								'group'       => esc_html__('Location 3','samatex'),
								'param_name' => 'content_3',
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('X coordinate','samatex'),
								'group'       => esc_html__('Location 4','samatex'),
								'param_name'  => 'x_coords_4',
								'value'       => '',
								'description' => esc_html__('Use latitude coordinate for example 53.339381','samatex'),
							),
			    			array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Y coordinate','samatex'),
								'group'       => esc_html__('Location 4','samatex'),
								'param_name'  => 'y_coords_4',
								'value'       => '',
								'description' => esc_html__('Use longitude coordinate for example -6.260405','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'group'       => esc_html__('Location 4','samatex'),
								'param_name' => 'title_4',
								'value'      => ''
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Image','samatex'),
								'group'       => esc_html__('Location 4','samatex'),
								'param_name' => 'image_4',
								'value'      => ''
							),
							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Content','samatex'),
								'group'       => esc_html__('Location 4','samatex'),
								'param_name' => 'content_4',
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('X coordinate','samatex'),
								'group'       => esc_html__('Location 5','samatex'),
								'param_name'  => 'x_coords_5',
								'value'       => '',
								'description' => esc_html__('Use latitude coordinate for example 53.339381','samatex'),
							),
			    			array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Y coordinate','samatex'),
								'group'       => esc_html__('Location 5','samatex'),
								'param_name'  => 'y_coords_5',
								'value'       => '',
								'description' => esc_html__('Use longitude coordinate for example -6.260405','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'group'       => esc_html__('Location 5','samatex'),
								'param_name' => 'title_5',
								'value'      => ''
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Image','samatex'),
								'group'       => esc_html__('Location 5','samatex'),
								'param_name' => 'image_5',
								'value'      => ''
							),
							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Content','samatex'),
								'group'       => esc_html__('Location 5','samatex'),
								'param_name' => 'content_5',
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_banner
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Popup banner','samatex'),
			    		'description'             => esc_html__('Insert popup banner (if you want to have the popup in entire site, put the banner inside footer)','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_banner',
			    		'class'                   => 'et_banner',
			    		'icon'                    => 'et_banner',
			    		"as_parent"               => array('except' => 'vc_row, vc_section'),
						"js_view"                 => 'VcColumnView',
			    		"content_element"         => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-banner.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-banner.js',
			    		'params'                  => array(
			    			array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Hide on mobile', 'samatex'),
								'param_name' => 'visible_mob',
								'value'      => '',
								'description'=> esc_html__('Check this option if you want to hide banner on mobile', 'samatex'),
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Hide on tablet', 'samatex'),
								'param_name' => 'visible_tablet',
								'value'      => '',
								'description'=> esc_html__('Check this option if you want to hide banner on tablet', 'samatex'),
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Hide on desktop', 'samatex'),
								'param_name' => 'visible_desktop',
								'value'      => '',
								'description'=> esc_html__('Check this option if you want to hide banner on desktop', 'samatex'),
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Use cookie', 'samatex'),
								'param_name' => 'cookie',
								'value'      => '',
								'description'=> esc_html__('Toggle this option if you want to display your banner onces per visit session', 'samatex'),
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Delay in ms','samatex'),
								'param_name' => 'delay',
								'value'      => '3000',
							),
							array(
								'param_name'=>'effect',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Effect', 'samatex'),
								'value'     => array(
									esc_html__('Fade in and scale', 'samatex') => 'fade-in-scale', 
									esc_html__('Slide in right', 'samatex')  	 => 'slide-in-right', 
									esc_html__('Slide in bottom', 'samatex')   => 'slide-in-bottom', 
									esc_html__('3d flip horizontal', 'samatex')=> 'flip-horizonatal',
									esc_html__('3d flip vertical', 'samatex')  => 'flip-vertical'
								)
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Width in px','samatex'),
								'param_name' => 'width',
								'value'      => '720',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Height in px','samatex'),
								'param_name' => 'height',
								'value'      => '400',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Background color','samatex'),
								'param_name' => 'back_color',
								'value'      => '#ffffff'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Border color','samatex'),
								'param_name' => 'border_color',
								'value'      => ''
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Background image','samatex'),
								'param_name' => 'back_img',
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Text align','samatex'),
								'param_name' => 'text_align',
								'value'      => $align_values,
							),

							/* padding
							---------------*/

								array(
									'type'       => 'padding',
									'group'      => esc_html__('Padding','samatex'),
									'heading'    => esc_html__('Padding','samatex'),
									'param_name' => 'padding',
									'value'      => ''
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_tagline
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Tagline','samatex'),
			    		'description'             => esc_html__('Insert tagline (if you want to have the popup in entire site, put the tagline inside header)','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_tagline',
			    		'class'                   => 'et_tagline',
			    		'icon'                    => 'et_tagline',
			    		"content_element"         => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-tagline.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-tagline.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button text','samatex'),
								'param_name' => 'button_text',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button link','samatex'),
								'param_name' => 'button_link',
								'value'      => '',
							),
			    			array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Visible on mobile', 'samatex'),
								'param_name' => 'visible_mob',
								'value'      => '',
								'description'=> esc_html__('Check this option if you want to display banner on mobile', 'samatex'),
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Visible on tablet', 'samatex'),
								'param_name' => 'visible_tablet',
								'value'      => '',
								'description'=> esc_html__('Check this option if you want to display tablet on mobile', 'samatex'),
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Use cookie', 'samatex'),
								'param_name' => 'cookie',
								'value'      => '',
								'description'=> esc_html__('Toggle this option if you want to display your banner onces per visit session', 'samatex'),
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Delay in ms','samatex'),
								'param_name' => 'delay',
								'value'      => '3000',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Background color','samatex'),
								'param_name' => 'back_color',
								'value'      => $main_color
							),
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Background image','samatex'),
								'param_name' => 'back_img',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Title color','samatex'),
								'param_name' => 'title_color',
								'value'      => '#ffffff'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button color','samatex'),
								'param_name' => 'button_color',
								'value'      => $main_color
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button background color','samatex'),
								'param_name' => 'button_background_color',
								'value'      => '#ffffff'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button color hover','samatex'),
								'param_name' => 'button_color_hover',
								'value'      => '#ffffff'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button background color hover','samatex'),
								'param_name' => 'button_background_color_hover',
								'value'      => '#212121'
							),

							/* padding
							---------------*/

								array(
									'type'       => 'padding',
									'group'      => esc_html__('Padding','samatex'),
									'heading'    => esc_html__('Padding','samatex'),
									'param_name' => 'padding',
									'value'      => '16,0,16,0'
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

			/* MEDIA
			---------------*/

				/* et_image
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Image','samatex'),
			    		'description'             => esc_html__('Insert/animate single image','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_image',
			    		'class'                   => 'et_image',
			    		'icon'                    => 'et_image',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-image.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-image.js',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
			    			array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Upload image','samatex'),
								'param_name' => 'image',
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
			    			array(
								'param_name'=>'size',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Size', 'samatex'), 
								'value'     => $image_size_values
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Image link','samatex'),
								'param_name' => 'link',
								'value'      => '',
							),
							array(
								'param_name'=>'link_target',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Link target', 'samatex'), 
								'value'     => array(
									'_self'  => '_self',
									'_blank' => '_blank' 
								),
								'dependency' => Array('element' => 'link', 'value' => 'custom')
							),
							array(
								'param_name'=>'alignment',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Alignment', 'samatex'),
								'value'     => $align_values_extended
							),

							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),

							/* curtain
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Curtain effect','samatex'),
									'group'      => esc_html__('Curtain effect','samatex'),
									'param_name' => 'curtain',
									'value'      => ''
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Curtain direction','samatex'),
									'group'      => esc_html__('Curtain effect','samatex'),
									'param_name' => 'curtain_direction',
									'value'      => array(
										esc_html__('Left to Right','samatex') => 'left',
										esc_html__('Right to Left','samatex') => 'right',
										esc_html__('Top to bottom','samatex') => 'top',
										esc_html__('Bottom to top','samatex') => 'bottom',
									),
									'dependency' => Array(
										'element' => 'curtain', 'value' => 'true'
									)
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Curtain color','samatex'),
									'group'      => esc_html__('Curtain effect','samatex'),
									'param_name' => 'curtain_color',
									'value'      => '',
									'dependency' => Array(
										'element' => 'curtain', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__( 'Animation delay in ms (example 300)', 'samatex' ),
									'group'      => esc_html__('Curtain effect','samatex'),
									'param_name' => 'curtain_animation_delay',
									'value'      => $animation_delay_values,
									'dependency' => Array(
										'element' => 'curtain', 'value' => 'true'
									)
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_image_box
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Image box','samatex'),
			    		'description'             => esc_html__('Insert/animate single image with hover effect','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_image_box',
			    		'class'                   => 'et_image_box',
			    		'icon'                    => 'et_image',
			    		// 'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-image-box.js',
			    		// 'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-image-box.js',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
			    			array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Upload image','samatex'),
								'param_name' => 'image',
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
			    			array(
								'param_name'=>'size',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Size', 'samatex'), 
								'value'     => $image_size_values
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Image link','samatex'),
								'param_name' => 'link',
								'value'      => '',
							),
							array(
								'param_name'=>'link_target',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Link target', 'samatex'), 
								'value'     => array(
									'_self'  => '_self',
									'_blank' => '_blank' 
								),
							),
							array(
								'param_name'=>'alignment',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Alignment', 'samatex'),
								'value'     => $align_values_extended
							),
							array(
			    				'type'       => 'dropdown',
								'heading'    => esc_html__('Layout', 'samatex'),
								'param_name' => 'layout',
								'value'      => array(
									esc_html__('Classic','samatex') => 'classic',
									esc_html__('Caption','samatex') => 'caption',
									esc_html__('Overlay','samatex') => 'overlay'
								)
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_gallery
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Gallery','samatex'),
			    		'description'             => esc_html__('Insert/animate gallery','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_gallery',
			    		'class'                   => 'et_gallery',
			    		'icon'                    => 'et_gallery',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-gallery.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-gallery.js',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
			    			array(
								'type'       => 'attach_images',
								'heading'    => esc_html__('Upload images','samatex'),
								'param_name' => 'images',
							),
			    			array(
								'param_name'=>'size',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Size', 'samatex'), 
								'value'     => $image_size_values
							),
							array(
			    				'type'       => 'dropdown',
								'heading'    => esc_html__('Gallery type', 'samatex'),
								'param_name' => 'type',
								'value'      => array(
									esc_html__('Grid/Masonry','samatex')             => 'grid',
									esc_html__('Carousel','samatex')                 => 'carousel',
									esc_html__('Carousel with thumbnails','samatex') => 'carousel-thumbs',
								)
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Link to','samatex'),
								'param_name' => 'link',
								'value'      => array(
									esc_html__('None','samatex')       => 'none',
									esc_html__('Attachment','samatex') => 'attach',
									esc_html__('Lightbox','samatex')   => 'lightbox',
								)
							),
							array(
								'param_name'=>'columns',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Columns', 'samatex'), 
								'value'     => array(
									'1'  => '1',
									'2'  => '2',
									'3'  => '3',
									'4'  => '4',
									'5'  => '5',
									'6'  => '6',
									'7'  => '7',
									'8'  => '8',
									'9'  => '9',
									'10' => '10'
								),
								'dependency' => Array(
									'element' => 'type', 'value' => array('grid','carousel'),
								)
							),
							array(
								'param_name'=>'gap',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Gap', 'samatex'), 
								'value'     => array(
									esc_html__('0px', 'samatex')    => '0', 
									esc_html__('2px', 'samatex')    => '2', 
									esc_html__('4px', 'samatex')    => '4', 
									esc_html__('8px', 'samatex')    => '8', 
									esc_html__('16px', 'samatex')   => '16', 
									esc_html__('24px', 'samatex')   => '24', 
									esc_html__('32px', 'samatex')   => '32', 
									esc_html__('40px', 'samatex')   => '40',
								),
								'dependency' => Array(
									'element' => 'type', 'value' => array('carousel','grid'),
								)
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Animation','samatex'),
								'param_name' => 'animation',
								'value'      => array(
									esc_html__('None','samatex')   => 'none',
									esc_html__('Fade','samatex') => 'fadeIn',
									esc_html__('Move','samatex') => 'moveUp',
								),
								'dependency' => Array(
									'element' => 'type', 'value' => array('grid'),
								)
							),
							array(
								'param_name'=>'navigation_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Navigation type', 'samatex'), 
								'value'     => array(
									esc_html__('Only arrows','samatex')  => 'only-arrows',
									esc_html__('Only dottes','samatex')  => 'only-dottes',
									esc_html__('Both arrows and dottes','samatex')  => 'both'
								),
								'dependency' => Array(
									'element' => 'type', 'value' => array('carousel'),
								)
							),
							array(
								'param_name'=>'autoplay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autoplay', 'samatex'), 
								'value'     => $logic_values,
								'dependency' => Array(
									'element' => 'type', 'value' => array('carousel','carousel-thumbs'),
								)
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								)
			    		)
			    	));

				/* et_video
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Video','samatex'),
			    		'description'             => esc_html__('Insert video (selfhosted, youtube, vimeo)','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_video',
			    		'class'                   => 'et_video',
			    		'icon'                    => 'et_video',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
			    			array(
								'type'       => 'checkbox',
								'heading'    => esc_html__('Modal','samatex'),
								'param_name' => 'modal',
							),
			    			array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Poster','samatex'),
								'param_name' => 'image',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('MP4 video file url','samatex'),
								'param_name' => 'mp4',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Video embed url','samatex'),
								'param_name' => 'embed',
								'value'      => '',
							)
			    		)
			    	));

			    /* et_audio
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Audio','samatex'),
			    		'description'             => esc_html__('Insert audio','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_audio',
			    		'class'                   => 'et_audio',
			    		'icon'                    => 'et_audio',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('MP3 audio file url','samatex'),
								'param_name' => 'mp3',
								'value'      => '',
							),
			    		)
			    	));

			/* INFOGRAPHICS
			---------------*/

				/* et_counter
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Counter','samatex'),
			    		'description'             => esc_html__('Insert number counter','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_counter',
			    		'class'                   => 'et_counter',
			    		'icon'                    => 'et_counter',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-counter.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-counter.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'param_name' => 'size',
								'value'      => $size_values_default
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Number','samatex'),
								'param_name' => 'number',
								'value'      => '',
								'description' => esc_html__('Insert an integer value to count to','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
							array(
								'param_name'=>'type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Title tag', 'samatex'), 
								'value'     => array(
									'H1'  => 'h1', 
									'H2'  => 'h2', 
									'H3'  => 'h3', 
									'H4'  => 'h4', 
									'H5'  => 'h5', 
									'H6'  => 'h6', 
									'p'   => 'p', 
									'div' => 'div', 
								),
								'std' => 'h4'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Number postfix','samatex'),
								'param_name' => 'number_postfix',
								'value'      => '',
								'description' => esc_html__('Insert any postfix you want %,$, etc.','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Value font-size','samatex'),
								'param_name' => 'value_font_size',
								'value'      => array(
									esc_html__('14px', 'samatex')  => '14px', 
									esc_html__('16px', 'samatex')  => '16px', 
									esc_html__('18px', 'samatex')  => '18px', 
									esc_html__('20px', 'samatex')  => '20px', 
									esc_html__('24px', 'samatex')  => '24px', 
									esc_html__('32px', 'samatex')  => '32px', 
									esc_html__('40px', 'samatex')  => '40px', 
									esc_html__('48px', 'samatex')  => '48px', 
									esc_html__('56px', 'samatex')  => '56px', 
									esc_html__('64px', 'samatex')  => '64px', 
									esc_html__('72px', 'samatex')  => '72px',
								),
								'std' => '72px'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Value color','samatex'),
								'param_name' => 'value_color',
								'value'      => $main_color
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Title font-size','samatex'),
								'param_name' => 'title_font_size',
								'value'      => array(
									esc_html__('14px', 'samatex')  => '14px', 
									esc_html__('16px', 'samatex')  => '16px', 
									esc_html__('18px', 'samatex')  => '18px', 
									esc_html__('20px', 'samatex')  => '20px', 
									esc_html__('24px', 'samatex')  => '24px', 
									esc_html__('32px', 'samatex')  => '32px', 
									esc_html__('40px', 'samatex')  => '40px', 
									esc_html__('48px', 'samatex')  => '48px', 
									esc_html__('56px', 'samatex')  => '56px', 
									esc_html__('64px', 'samatex')  => '64px', 
									esc_html__('72px', 'samatex')  => '72px',
								),
								'std' => '24px'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Title color','samatex'),
								'param_name' => 'title_color',
								'value'      => '#212121'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Counter track color','samatex'),
								'param_name' => 'track_color',
								'value'      => '#e0e0e0'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Counter bar color','samatex'),
								'param_name' => 'bar_color',
								'value'      => $main_color
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),

							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));
				
				/* et_progress
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Progress','samatex'),
			    		'description'             => esc_html__('Insert progress bar','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_progress',
			    		'class'                   => 'et_progress',
			    		'icon'                    => 'et_progress',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-progress.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-progress.js',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Percentage','samatex'),
								'param_name' => 'percentage',
								'value'      => '',
								'description' => esc_html__('Only integer value, without any string','samatex'),
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Bar Color','samatex'),
								'param_name' => 'bar_color',
								'value'      => $main_color
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Track Color','samatex'),
								'param_name' => 'track_color',
								'value'      => '#e0e0e0'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Text color','samatex'),
								'param_name' => 'text_color',
								'value'      => '#212121'
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

				/* et_circle_progress
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Progress','samatex'),
			    		'description'             => esc_html__('Insert circle progress bar','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_circle_progress',
			    		'class'                   => 'et_circle_progress',
			    		'icon'                    => 'et_circle_progress',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-circle-progress.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-circle-progress.js',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
			    			array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'param_name' => 'size',
								'value'      => $size_values_default
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Title','samatex'),
								'param_name' => 'title',
								'value'      => '',
							),
							array(
								'param_name'=>'type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Title tag', 'samatex'), 
								'value'     => array(
									'H1'  => 'h1', 
									'H2'  => 'h2', 
									'H3'  => 'h3', 
									'H4'  => 'h4', 
									'H5'  => 'h5', 
									'H6'  => 'h6', 
									'p'   => 'p', 
									'div' => 'div', 
								),
								'std' => 'h6'
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Value font-size','samatex'),
								'param_name' => 'value_font_size',
								'value'      => array(
									esc_html__('14px', 'samatex')  => '14px', 
									esc_html__('16px', 'samatex')  => '16px', 
									esc_html__('18px', 'samatex')  => '18px', 
									esc_html__('20px', 'samatex')  => '20px', 
									esc_html__('24px', 'samatex')  => '24px', 
									esc_html__('32px', 'samatex')  => '32px', 
									esc_html__('40px', 'samatex')  => '40px', 
									esc_html__('48px', 'samatex')  => '48px', 
									esc_html__('56px', 'samatex')  => '56px', 
									esc_html__('64px', 'samatex')  => '64px', 
									esc_html__('72px', 'samatex')  => '72px',
								),
								'std' => '48px'
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Title font-size','samatex'),
								'param_name' => 'title_font_size',
								'value'      => array(
									esc_html__('14px', 'samatex')  => '14px', 
									esc_html__('16px', 'samatex')  => '16px', 
									esc_html__('18px', 'samatex')  => '18px', 
									esc_html__('20px', 'samatex')  => '20px', 
									esc_html__('24px', 'samatex')  => '24px', 
									esc_html__('32px', 'samatex')  => '32px', 
									esc_html__('40px', 'samatex')  => '40px', 
									esc_html__('48px', 'samatex')  => '48px', 
									esc_html__('56px', 'samatex')  => '56px', 
									esc_html__('64px', 'samatex')  => '64px', 
									esc_html__('72px', 'samatex')  => '72px',
								),
								'std' => '18px'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Percentage','samatex'),
								'param_name' => 'percentage',
								'value'      => '',
								'description' => esc_html__('Only integer value, without any string','samatex'),
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Bar Color','samatex'),
								'param_name' => 'bar_color',
								'value'      => $main_color
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Track Color','samatex'),
								'param_name' => 'track_color',
								'value'      => '#e0e0e0'
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Text color','samatex'),
								'param_name' => 'text_color',
								'value'      => '#212121'
							),

							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

			    /* et_timer
				---------------*/

					vc_map(array(
			    		'name'                    => esc_html__('Timer','samatex'),
			    		'description'             => esc_html__('Insert timer','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_timer',
			    		'class'                   => 'et_timer',
			    		'icon'                    => 'et_timer',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-timer.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-timer.js',
			    		'show_settings_on_create' => true,
			    		'params'                  => array(
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('End date to count to','samatex'),
								'param_name' => 'enddate',
								'value'      => '',
								'description' => esc_html__('Use format : June 7, 2025 15:03:25','samatex'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Days label','samatex'),
								'param_name' => 'days',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Hours label','samatex'),
								'param_name' => 'hours',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Minutes label','samatex'),
								'param_name' => 'minutes',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Seconds label','samatex'),
								'param_name' => 'seconds',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Text color','samatex'),
								'param_name' => 'text_color',
								'value'      => '#212121'
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

			/* OTHER
			---------------*/

				/* et_bullets
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Bulleted navigation','samatex'),
			    		'description'             => esc_html__('Use only with One page layout active','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_bullets',
			    		'class'                   => 'et_bullets hbe',
			    		'icon'                    => 'et_bullets',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-bullets.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-bullets.js',
			    		'params'                  => array(

			    			array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Menu name','samatex'),
								'param_name' => 'menu',
								'value'      => $menu_list,
							),
							
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Extra class','samatex'),
								'param_name' => 'extra_class',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('One page navigation offset in px (without any string)','samatex'),
								'description'=> esc_html__('If you have sticky header on the page, you can set the offset','samatex'),
								'param_name' => 'offset',
								'value'      => '0',
							),

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Color','samatex'),
									'group'      => 'Styling',
									'param_name' => 'bullet_color',
									'value'      => $main_color,
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Bullet color hover','samatex'),
									'group'      => 'Styling',
									'param_name' => 'bullet_color_hover',
									'value'      => '#212121',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Bullets wrapper background color','samatex'),
									'group'      => 'Styling',
									'param_name' => 'bullet_background_color',
									'value'      => '#ffffff',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Bullets wrapper border color','samatex'),
									'group'      => 'Styling',
									'param_name' => 'bullet_border_color',
									'value'      => '#e0e0e0',
								),

							/* tooltip
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Tooltip color','samatex'),
									'group'      => 'Styling',
									'param_name' => 'tooltip_color',
									'value'      => '#ffffff',
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Tooltip background color','samatex'),
									'group'      => 'Styling',
									'param_name' => 'tooltip_background_color',
									'value'      => '#212121',
								),


							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

			    /* et_gap
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Gap','samatex'),
			    		'description'             => esc_html__('Insert space','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_gap',
			    		'class'                   => 'et_gap',
			    		'icon'                    => 'et_gap',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-gap.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-gap.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Gap size (without any string)','samatex'),
								'param_name' => 'height',
								'value'      => '32'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Custom class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),
							array(
								'type'       => 'rv',
								'heading'    => esc_html__( 'Responsive visibility', 'samatex' ),
								'group'      => esc_html__('Responsive visibility','samatex'),
								'param_name' => 'rv',
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
					
			    		)
			    	));

			    	vc_map(array(
			    		'name'                    => esc_html__('Inline gap','samatex'),
			    		'description'             => esc_html__('Insert horizontal space','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_gap_inline',
			    		'class'                   => 'et_gap_inline',
			    		'icon'                    => 'et_gap_inline',
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-gap-inline.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-gap-inline.js',
			    		'params'                  => array(
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Gap size (without any string)','samatex'),
								'param_name' => 'width',
								'value'      => '32'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Custom class','samatex'),
								'param_name' => 'extra_class',
								'value'      => ''
							),
							array(
								'type'       => 'rv',
								'heading'    => esc_html__( 'Responsive visibility', 'samatex' ),
								'group'      => esc_html__('Responsive visibility','samatex'),
								'param_name' => 'rv',
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
					
			    		)
			    	));

			/* WOOCOMMERCE
			---------------*/

				if (class_exists('Woocommerce')) {

					$cat_args = array(
						'orderby'    => 'name',
					    'order'      => 'asc',
					    'hide_empty' => false
					);

					$category_values = array();
					$category_list   = get_terms( 'product_cat', $cat_args );
					if(is_object($category_list)  && !empty($category_list)){

					    foreach ($category_list as $category) {
					    	if ($category->parent) {
					    		$category_values[' - '.$category->name] = $category->slug;
					    	} else {
					    		$category_values[$category->name] = $category->slug;
					    	}
					    }
					}

					if(function_exists('wc_get_attribute_taxonomies')){

						$attributes_tax = wc_get_attribute_taxonomies();
						$attributes = array();
						foreach ( $attributes_tax as $attribute ) {
							$attributes[ $attribute->attribute_label ] = $attribute->attribute_name;
						}

					}

					$product_categories = array(
						esc_html__('All','samatex')  => 'all',
					);

					$args = array(
					    'orderby'           => 'name', 
					    'order'             => 'ASC',
					    'hide_empty'        => true, 
					    'exclude'           => array(), 
					    'exclude_tree'      => array(), 
					    'number'            => '', 
					    'fields'            => 'all', 
					    'slug'              => '', 
					    'parent'            => '',
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
					$tax_terms = get_terms('product_cat');

					if (count($tax_terms) != 0){
		            	foreach(get_terms('product_cat',$args) as $filter_term){
		        			$filter_count    = $filter_term->count;
		        			$filter_children = get_term_children( $filter_term->term_id, 'product_cat' );
		        			if(is_array($filter_children) && !empty($filter_children)) {
		        				foreach ($filter_children as $filter_child) {
		        					$filter_child_obj = get_term($filter_child, 'product_cat');
		        					$filter_count = $filter_count + $filter_child_obj->count;
		        				}
		        			}

		        			$product_categories[$filter_term->name] = $filter_term->slug;
			            }
					}

					/* et_woo_products
					---------------*/

				    	vc_map(array(
				    		'name'                    => esc_html__('Woocommerce products','samatex'),
				    		'description'             => esc_html__('Use this element to add different types of products','samatex'),
				    		'category'                => array(esc_html__('Enovathemes','samatex'),esc_html__('WooCommerce','samatex')),
				    		'base'                    => 'et_woo_products',
				    		'class'                   => 'et_woo_products',
				    		'icon'                    => 'et_woo_products',
				    		'show_settings_on_create' => true,
				    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-woo.js',
				    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-woo.js',
				    		'params'                  => array(
				    			array(
									'param_name'=>'layout',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Layout', 'samatex'), 
									'value'     => array(
										esc_html__('Grid', 'samatex')     => 'grid', 
										esc_html__('Carousel', 'samatex') => 'carousel',
									)
								),
								array(
									'param_name'=>'navigation_type',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Navigation type', 'samatex'), 
									'value'     => array(
										esc_html__('Only arrows','samatex')  => 'only-arrows',
										esc_html__('Only dottes','samatex')  => 'only-dottes',
										esc_html__('Both arrows and dottes','samatex')  => 'both',
									),
									'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
								),
								array(
									'param_name'=>'autoplay',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Autoplay', 'samatex'), 
									'value'     => $logic_values,
									'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
								),
								array(
									'param_name' =>'animation_effect',
									'type'       => 'dropdown',
									'heading'    => esc_html__('Animation effect', 'samatex'),
									'value'      => $animation_values,
									'dependency' => Array('element' => 'layout', 'value' => array('grid'))
								),
								array(
									'type' => 'dropdown',
									'heading'     => esc_html__( 'Columns', 'samatex' ),
									'value'       => $size_values_box,
									'param_name'  => 'columns',
									'save_always' => true
								),
								array(
									'type' => 'textfield',
									'heading' => esc_html__( 'Quantity', 'samatex' ),
									'value' => 12,
									'save_always' => true,
									'param_name' => "quantity",
									'description' => esc_html__( 'The "quantity" shortcode determines how many products to show', 'samatex' ),
								),
								array(
									'type' => 'textfield',
									'heading' => esc_html__( 'Category', 'samatex' ),
									'value' => '',
									'param_name' => 'category',
									'save_always' => true,
									'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'samatex' ),
									'dependency' => Array(
										'element' => 'type', 'value' => array('recent','featured','sale','best_selling','top_rated','attribute'),
									)
								),
								array(
									'type' => 'dropdown',
									'heading' => esc_html__( 'Operator', 'samatex' ),
									'param_name' => 'operator',
									'value' => $operator_values,
									'save_always' => true,
									'description' => esc_html__( 'Select filter operator', 'samatex' ),
									'dependency' => Array('element' => 'category', 'not_empty' => true)
								),
								array(
									'type' => 'dropdown',
									'heading' => esc_html__( 'Order by', 'samatex' ),
									'param_name' => 'orderby',
									'value' => $order_by_values,
									'save_always' => true,
									'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
								),
								array(
									'type' => 'dropdown',
									'heading' => esc_html__( 'Sort order', 'samatex' ),
									'param_name' => 'order',
									'value' => $order_way_values,
									'save_always' => true,
									'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
								),
								array(
									'param_name'=>'type',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Type', 'samatex'), 
									'value'     => array(
										esc_html__('Recent', 'samatex')       => 'recent', 
										esc_html__('Featured', 'samatex')     => 'featured', 
										esc_html__('Sale', 'samatex')         => 'sale', 
										esc_html__('Best selling', 'samatex') => 'best_selling', 
										esc_html__('Top rated', 'samatex')    => 'top_rated', 
										esc_html__('Attribute', 'samatex')    => 'attribute', 
										esc_html__('Related', 'samatex')      => 'related', 
										esc_html__('Custom', 'samatex')       => 'custom', 
									)
								),

								/* attribute
								---------------*/

									array(
										'type' => 'dropdown',
										'heading' => esc_html__( 'Attribute', 'samatex' ),
										'param_name' => 'attribute',
										'value' => $attributes,
										'save_always' => true,
										'description' => esc_html__( 'List of product taxonomy attributes', 'samatex' ),
										'dependency' => Array(
											'element' => 'type', 'value' => array('attribute'),
										)
									),
									array(
										'type' => 'textfield',
										'heading' => esc_html__( 'Filter', 'samatex' ),
										'value' => '',
										'param_name' => 'filter',
										'save_always' => true,
										'description' => esc_html__( 'Taxonomy values', 'samatex' ),
										'dependency' => Array(
											'element' => 'type', 'value' => array('attribute'),
										)
									),

								/* custom
								---------------*/

									array(
										'type' => 'textfield',
										'heading' => esc_html__( 'Products', 'samatex' ),
										'value' => '',
										'param_name' => 'ids',
										'save_always' => true,
										'description' => esc_html__( 'Enter comma separated products ids', 'samatex' ),
										'dependency' => Array(
											'element' => 'type', 'value' => array('custom'),
										)
									),
				    		)
				    	));

					/* et_woo_categories
					---------------*/

						vc_map(array(
				    		'name'                    => esc_html__('Woocommerce categories','samatex'),
				    		'description'             => esc_html__('Use this element to add product categories','samatex'),
				    		'category'                => array(esc_html__('Enovathemes','samatex'),esc_html__('WooCommerce','samatex')),
				    		'base'                    => 'et_woo_categories',
				    		'class'                   => 'et_woo_categories',
				    		'icon'                    => 'et_woo_categories',
				    		'show_settings_on_create' => true,
				    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-woo-category.js',
				    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-woo-category.js',
				    		'params'                  => array(
				    			array(
									'param_name'=>'layout',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Layout', 'samatex'), 
									'value'     => array(
										esc_html__('Grid', 'samatex')     => 'grid', 
										esc_html__('Carousel', 'samatex') => 'carousel',
									)
								),
								array(
									'param_name'=>'navigation_type',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Navigation type', 'samatex'), 
									'value'     => array(
										esc_html__('Only arrows','samatex')  => 'only-arrows',
										esc_html__('Only dottes','samatex')  => 'only-dottes',
										esc_html__('Both arrows and dottes','samatex')  => 'both',
									),
									'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
								),
								array(
									'param_name'=>'autoplay',
									'type'      => 'dropdown',
									'heading'   => esc_html__('Autoplay', 'samatex'), 
									'value'     => $logic_values,
									'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
								),
								array(
									'param_name' =>'animation_effect',
									'type'       => 'dropdown',
									'heading'    => esc_html__('Animation effect', 'samatex'),
									'value'      => $animation_values,
									'dependency' => Array('element' => 'layout', 'value' => array('grid'))
								),
								array(
								'type' => 'dropdown',
									'heading'     => esc_html__( 'Columns', 'samatex' ),
									'value'       => $size_values_box,
									'param_name'  => 'columns',
									'save_always' => true
								),
								array(
									'type' => 'textfield',
									'heading' => esc_html__( 'Category', 'samatex' ),
									'value' => '',
									'param_name' => 'category',
									'save_always' => true,
									'description' => esc_html__( 'Enter comma separated category IDs if you want to show certain categories', 'samatex' ),
								),
								array(
									'type' => 'dropdown',
									'heading' => esc_html__( 'Order by', 'samatex' ),
									'param_name' => 'orderby',
									'value' => array(
										esc_html__( 'Date', 'samatex' ) => 'date',
										esc_html__( 'ID', 'samatex' ) => 'ID',
										esc_html__( 'Menu order', 'samatex' ) => 'menu_order',
									),
									'save_always' => true,
									'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
								),
								array(
									'type' => 'dropdown',
									'heading' => esc_html__( 'Sort order', 'samatex' ),
									'param_name' => 'order',
									'value' => $order_way_values,
									'save_always' => true,
									'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
								),
				    		)
				    	));

				}

			/* POSTS
			---------------*/

				/* et_posts
				---------------*/

			    	vc_map(array(
			    		'name'                    => esc_html__('Posts','samatex'),
			    		'description'             => esc_html__('Use this element to add posts','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_posts',
			    		'class'                   => 'et_posts',
			    		'icon'                    => 'et_posts',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-post.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-post.js',
			    		'params'                  => array(
			    			array(
								'param_name'=>'layout',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Layout', 'samatex'), 
								'value'     => array(
									esc_html__('Grid', 'samatex')     => 'grid', 
									esc_html__('Chess', 'samatex')     => 'chess', 
									esc_html__('Carousel', 'samatex') => 'carousel',
								)
							),
							array(
								'param_name'=>'columns',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Column', 'samatex'), 
								'value'     => array(
									'1'  => '1',
									'2'  => '2',
									'3'  => '3',
								),
								'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
							),
							array(
								'param_name'=>'image_full',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Image full', 'samatex'), 
								'value'     => $logic_values,
								'dependency' => Array('element' => 'layout', 'value' => array('grid'))
							),
							array(
								'param_name'=>'image_justify',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Justify post item width with post size', 'samatex'),
								'description' => esc_html__('If active, post item width will be justified with the post size, but the height depends on image height.', 'samatex'),
								'value'     => $logic_values,
								'dependency' => Array('element' => 'layout', 'value' => array('grid'))
							),
							array(
								'param_name'=>'navigation_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Navigation type', 'samatex'), 
								'value'     => array(
									esc_html__('Only arrows','samatex')  => 'only-arrows',
									esc_html__('Only dottes','samatex')  => 'only-dottes',
									esc_html__('Both arrows and dottes','samatex')  => 'both',
								),
								'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
							),
							array(
								'param_name'=>'autoplay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autoplay', 'samatex'), 
								'value'     => $logic_values,
								'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
							),
							array(
								'param_name' =>'animation_effect',
								'type'       => 'dropdown',
								'heading'    => esc_html__('Animation effect', 'samatex'),
								'value'      => $animation_values,
								'dependency' => Array('element' => 'layout', 'value' => array('grid'))
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Quantity', 'samatex' ),
								'value' => 12,
								'save_always' => true,
								'param_name' => "quantity",
								'description' => esc_html__( 'The "quantity" shortcode determines how many posts to show', 'samatex' ),
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Category', 'samatex' ),
								'value' => '',
								'param_name' => 'category',
								'save_always' => true,
								'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'samatex' ),
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Operator', 'samatex' ),
								'param_name' => 'operator',
								'value' => $operator_values,
								'save_always' => true,
								'description' => esc_html__( 'Select filter operator', 'samatex' ),
								'dependency' => Array('element' => 'category', 'not_empty' => true)
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Order by', 'samatex' ),
								'param_name' => 'orderby',
								'value' => $order_by_values,
								'save_always' => true,
								'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Sort order', 'samatex' ),
								'param_name' => 'order',
								'value' => $order_way_values,
								'save_always' => true,
								'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Post excerpt length', 'samatex' ),
								'value' => '104',
								'param_name' => 'excerpt',
							)
			    		)
			    	));

				/* et_projects
				---------------*/

					$cat_args = array(
						'orderby'    => 'name',
					    'order'      => 'asc',
					    'hide_empty' => false
					);

					$category_values = array();
					$category_list   = get_terms( 'project-category', $cat_args );
					if( !empty($category_list) ){

					    foreach ($category_list as $category) {
					    	if ($category->parent) {
					    		$category_values[' - '.$category->name] = $category->slug;
					    	} else {
					    		$category_values[$category->name] = $category->slug;
					    	}
					    }
					}

					if(function_exists('wc_get_attribute_taxonomies')){

						$attributes_tax = wc_get_attribute_taxonomies();
						$attributes = array();
						foreach ( $attributes_tax as $attribute ) {
							$attributes[ $attribute->attribute_label ] = $attribute->attribute_name;
						}

					}

					$project_cat = array(
						esc_html__('All','samatex')  => 'all',
					);

					$args = array(
					    'orderby'           => 'name', 
					    'order'             => 'ASC',
					    'hide_empty'        => true, 
					    'exclude'           => array(), 
					    'exclude_tree'      => array(), 
					    'number'            => '', 
					    'fields'            => 'all', 
					    'slug'              => '', 
					    'parent'            => '',
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
					$tax_terms = get_terms('project-category');

					if (count($tax_terms) != 0){
		            	foreach(get_terms('project-category',$args) as $filter_term){
		        			$filter_count    = $filter_term->count;
		        			$filter_children = get_term_children( $filter_term->term_id, 'project-category' );
		        			if(is_array($filter_children) && !empty($filter_children)) {
		        				foreach ($filter_children as $filter_child) {
		        					$filter_child_obj = get_term($filter_child, 'project-category');
		        					$filter_count = $filter_count + $filter_child_obj->count;
		        				}
		        			}

		        			$project_cat[$filter_term->name] = $filter_term->slug;
			            }
					}

			    	vc_map(array(
			    		'name'                    => esc_html__('Projects','samatex'),
			    		'description'             => esc_html__('Use this element to add projects','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_projects',
			    		'class'                   => 'et_projects',
			    		'icon'                    => 'et_projects',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-project.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-project.js',
			    		'params'                  => array(
			    			array(
								'param_name'=>'container',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Container', 'samatex'), 
								'description' => esc_html__('If you choose wide container, also set the wrapper row "Row stretch" option to "Stretch row and content"', 'samatex'), 
								'value'     => array(
									esc_html__('Boxed', 'samatex') => 'boxed', 
									esc_html__('Wide', 'samatex') => 'wide',
								)
							),
			    			array(
								'param_name'=>'layout',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Layout', 'samatex'), 
								'value'     => array(
									esc_html__('Grid', 'samatex')     => 'grid', 
									esc_html__('Carousel', 'samatex') => 'carousel',
								)
							),
							array(
								'type' => 'dropdown',
								'heading'     => esc_html__( 'Columns', 'samatex' ),
								'value'       => $size_values_box,
								'param_name'  => 'columns',
								'save_always' => true
							),
							array(
								'param_name'=>'navigation_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Navigation type', 'samatex'), 
								'value'     => array(
									esc_html__('Only arrows','samatex')  => 'only-arrows',
									esc_html__('Only dottes','samatex')  => 'only-dottes',
									esc_html__('Both arrows and dottes','samatex')  => 'both',
								),
								'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
							),
							array(
								'param_name'=>'autoplay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autoplay', 'samatex'), 
								'value'     => $logic_values,
								'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
							),
							array(
								'param_name' =>'animation_effect',
								'type'       => 'dropdown',
								'heading'    => esc_html__('Animation effect', 'samatex'),
								'value'      => $animation_values,
								'dependency' => Array('element' => 'layout', 'value' => array('grid'))
							),
							array(
								'param_name'=>'layout_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Layout type', 'samatex'), 
								'value'     => array(
									esc_html__('Project with details', 'samatex') => 'project-with-details', 
									esc_html__('Project with caption', 'samatex') => 'project-with-caption',
									esc_html__('Project with overlay', 'samatex') => 'project-with-overlay',
								)
							),
							array(
								'param_name'=>'project_image_effect',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Project hover effect', 'samatex'), 
								'value'     => $image_overlay_values,
								'dependency' => Array(
									'element' => 'layout_type', 'value' => array('project-with-details')
								)
							),
							array(
								'param_name'=>'project_image_effect_overlay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Project hover effect', 'samatex'), 
								'value'     => array(
									esc_html__('Overlay fade','samatex') 						 => 'overlay-fade',
									esc_html__('Overlay fade with image zoom','samatex')         => 'overlay-fade-zoom',
									esc_html__('Overlay fade with extreme image zoom','samatex') => 'overlay-fade-zoom-extreme',
									esc_html__('Overlay move fluid','samatex')                   => 'overlay-move',
									esc_html__('Overlay fall','samatex')                         => 'overlay-fall',
									esc_html__('Transform','samatex')                            => 'transform'
								),
								'dependency' => Array(
									'element' => 'layout_type', 'value' => array('project-with-overlay')
								)
							),
							array(
								'param_name'=>'project_image_effect_caption',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Project hover effect', 'samatex'), 
								'value'     => $image_caption_values,
								'dependency' => Array('element' => 'layout_type', 'value' => array('project-with-caption'))
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Use original image size (no cropping)', 'samatex'),
								'param_name' => 'project_image_full',
								'value'      => '',
								'dependency' => Array(
									'element' => 'layout', 'value' => array('grid'),
								)
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Justify project item width with project size', 'samatex'),
								'description' => esc_html__('If active, project item width will be justified with the project size, but the height depends on image height.', 'samatex'),
								'param_name' => 'project_image_justify',
								'value'      => '',
								'dependency' => Array(
									'element' => 'layout', 'value' => array('grid'),
									'element' => 'project_image_full', 'value' => 'true',
								)
							),
							array(
			    				'type'       => 'dropdown',
								'heading'    => esc_html__('Project gap between items', 'samatex'),
								'param_name' => 'project_gap',
								'value'      => $logic_values,
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Quantity', 'samatex' ),
								'value' => 12,
								'save_always' => true,
								'param_name' => "quantity",
								'description' => esc_html__( 'The "quantity" shortcode determines how many projects to show', 'samatex' ),
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Category', 'samatex' ),
								'value' => '',
								'param_name' => 'category',
								'save_always' => true,
								'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'samatex' ),
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Operator', 'samatex' ),
								'param_name' => 'operator',
								'value' => $operator_values,
								'save_always' => true,
								'description' => esc_html__( 'Select filter operator', 'samatex' ),
								'dependency' => Array('element' => 'category', 'not_empty' => true)
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Order by', 'samatex' ),
								'param_name' => 'orderby',
								'value' => $order_by_values,
								'save_always' => true,
								'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Sort order', 'samatex' ),
								'param_name' => 'order',
								'value' => $order_way_values,
								'save_always' => true,
								'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
							),
							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Project filter', 'samatex'),
								'param_name' => 'project_filter',
								'value'      => '',
								'description'=> esc_html__('Check this option if you want to have AJAX category filter (Make sure the Category field is empty)', 'samatex'),
								'dependency' => Array(
									'element' => 'layout', 'value' => array('grid'),
								)
							),
							array(
								'param_name'=>'default_filter',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Define default filter', 'samatex'), 
								'value'     => $project_cat,
								'dependency' => Array('element' => 'project_filter', 'value' => 'true')
							),
			    		)
			    	));

					vc_map(array(
			    		'name'                    => esc_html__('Projects full width','samatex'),
			    		'description'             => esc_html__('Use this element to add projects','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_projects_full',
			    		'class'                   => 'et_projects_full',
			    		'icon'                    => 'et_projects_full',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-project-full.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-project-full.js',
			    		'params'                  => array(
			    			array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Title', 'samatex' ),
								'value' => '',
								'param_name' => "title",
							),
							array(
								'param_name'=>'autoplay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Autoplay', 'samatex'), 
								'value'     => $logic_values,
								'dependency' => Array('element' => 'layout', 'value' => array('carousel'))
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Limit to certain projects?', 'samatex' ),
								'value' => '',
								'param_name' => "project_ids",
								'description' => esc_html__( 'Enter comma separated project IDs', 'samatex' ),
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Quantity', 'samatex' ),
								'value' => 12,
								'save_always' => true,
								'param_name' => "quantity",
								'description' => esc_html__( 'The "quantity" shortcode determines how many projects to show', 'samatex' ),
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Category', 'samatex' ),
								'value' => '',
								'param_name' => 'category',
								'save_always' => true,
								'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'samatex' ),
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Operator', 'samatex' ),
								'param_name' => 'operator',
								'value' => $operator_values,
								'save_always' => true,
								'description' => esc_html__( 'Select filter operator', 'samatex' ),
								'dependency' => Array('element' => 'category', 'not_empty' => true)
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Order by', 'samatex' ),
								'param_name' => 'orderby',
								'value' => $order_by_values,
								'save_always' => true,
								'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Sort order', 'samatex' ),
								'param_name' => 'order',
								'value' => $order_way_values,
								'save_always' => true,
								'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'samatex' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Text color','samatex'),
								'param_name' => 'color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__( 'Grid overlay', 'samatex' ),
								'param_name' => 'grid_overlay',
								'value'     => array(
									esc_html__('None','samatex')  => 'none',
									esc_html__('White','samatex')  => 'white',
									esc_html__('Black','samatex')  => 'black',
								),
							),

							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

					vc_map(array(
			    		'name'                    => esc_html__('Single project','samatex'),
			    		'description'             => esc_html__('Use this element to add single project','samatex'),
			    		'category'                => esc_html__('Enovathemes','samatex'),
			    		'base'                    => 'et_single_project',
			    		'class'                   => 'et_single_project',
			    		'icon'                    => 'et_single_project',
			    		'show_settings_on_create' => true,
			    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-single-project.js',
			    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-single-project.js',
			    		'params'                  => array(
							array(
								'param_name'  =>'p_id',
								'type'        => 'textfield',
								'heading'     => esc_html__( 'Enter project ID', 'samatex' ),
								'description' => esc_html__('Only one, no multiple IDs', 'samatex'),
							),
							array(
								'param_name'=>'layout_type',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Layout type', 'samatex'), 
								'value'     => array(
									esc_html__('Project with details', 'samatex') => 'project-with-details', 
									esc_html__('Project with caption', 'samatex') => 'project-with-caption',
									esc_html__('Project with overlay', 'samatex') => 'project-with-overlay',
								)
							),
							array(
								'param_name'=>'project_image_effect',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Project hover effect', 'samatex'), 
								'value'     => $image_overlay_values,
								'dependency' => Array(
									'element' => 'layout_type', 'value' => array('project-with-details')
								)
							),
							array(
								'param_name'=>'project_image_effect_overlay',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Project hover effect', 'samatex'), 
								'value'     => array(
									esc_html__('Overlay fade','samatex') 						 => 'overlay-fade',
									esc_html__('Overlay fade with image zoom','samatex')         => 'overlay-fade-zoom',
									esc_html__('Overlay fade with extreme image zoom','samatex') => 'overlay-fade-zoom-extreme',
									esc_html__('Overlay move fluid','samatex')                   => 'overlay-move',
									esc_html__('Overlay fall','samatex')                         => 'overlay-fall',
									esc_html__('Transform','samatex')                            => 'transform'
								),
								'dependency' => Array(
									'element' => 'layout_type', 'value' => array('project-with-overlay')
								)
							),
							array(
								'param_name'=>'project_image_effect_caption',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Project hover effect', 'samatex'), 
								'value'     => $image_caption_values,
								'dependency' => Array('element' => 'layout_type', 'value' => array('project-with-caption'))
							),
							
							/* parallax
							---------------*/

								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Parallax','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset X coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_x',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Offset Y coordinate','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'parallax_y',
									'value'      => '0',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Parallax speed radtio','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'description'=> esc_html__('The more the value is the slower the parallax effect is','samatex'),
									'param_name' => 'parallax_speed',
									'value'     => array(
										'1'  => '1',
										'2'  => '2',
										'3'  => '3',
										'4'  => '4',
										'5'  => '5',
										'6'  => '6',
										'7'  => '7',
										'8'  => '8',
										'9'  => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20'
									),
									'std' => '10',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'checkbox',
									'heading'    => esc_html__('Move on mouse move','samatex'),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'move',
									'value'      => '',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
								array(
									'type'       => 'rp',
									'heading'    => esc_html__( 'Responsive parallax', 'samatex' ),
									'group'      => esc_html__('Parallax','samatex'),
									'param_name' => 'rp',
									'dependency' => Array(
										'element' => 'parallax', 'value' => 'true'
									)
								),
			    		
							/* element_css
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Element id','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_id',
									'value'      => '',
								),

								array(
									'type'       => 'textarea',
									'heading'    => esc_html__('Element css','samatex'),
									"class"      => "element-attr-hide",
									'param_name' => 'element_css',
									'value'      => '',
								),
			    		)
			    	));

		/* HEADER BUILDER
		---------------*/

			$vc_menu_categories = array(
				esc_html__('Desktop header','samatex'),
				esc_html__('Mobile header','samatex'),
				esc_html__('Sidebar header','samatex')
			);

			/* et_header_logo
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Header logo','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories,
		    		'base'                    => 'et_header_logo',
		    		'class'                   => 'et_header_logo hbe',
		    		'icon'                    => 'et_header_logo',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-logo.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-logo.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended,
							'default' => 'left'
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* static header
						---------------*/

							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Normal logo','samatex'),
								'group'      => esc_html__('Default logo','samatex'),
								'param_name' => 'logo',
							),

							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Retina logo (twice the width and height of normal logo)','samatex'),
								'group'      => esc_html__('Default logo','samatex'),
								'param_name' => 'retina_logo',
							),
		    		
						/* sticky header
						---------------*/

							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Normal logo','samatex'),
								'group'      => esc_html__('Sticky logo','samatex'),
								'param_name' => 'sticky_logo',
							),

							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Retina logo (twice the width and height of normal logo)','samatex'),
								'group'      => esc_html__('Sticky logo','samatex'),
								'param_name' => 'sticky_retina_logo',
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    		)
		    	));

			/* et_header_menu
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Header navigation menu','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories[0],
		    		'base'                    => 'et_header_menu',
		    		'class'                   => 'et_header_menu hbe font',
		    		'icon'                    => 'et_header_menu',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-menu.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-menu.js',
		    		'params'                  => array(
		    			array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Menu name','samatex'),
							'param_name' => 'menu',
							'value'      => $menu_list,
							'default'    => 'choose'
						),
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('One page layout navigation','samatex'),
							'description' => esc_html__('If you want yo use this menu as one page layout navigation, check this option.', 'samatex'), 
							'param_name' => 'one_page',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('One page navigation offset in px (without any string)','samatex'),
							'param_name' => 'offset',
							'value'      => '0',
							'dependency' => Array('element' => 'one_page', 'value' => "true")
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* top level
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Space between menu items in px (without any string)','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_space',
									'value'      => '40',
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Items separator','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_separator',
									'value'      => $logic_values
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Items separator color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_separator_color',
									'value'      => '#e0e0e0',
									'dependency' => Array('element' => 'menu_separator', 'value' => 'true')
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Items separator height (without any string)','samatex'),
									'description'=> esc_html__('Leave blank if you want 100% height','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_separator_height',
									'value'      => '',
									'dependency' => Array('element' => 'menu_separator', 'value' => 'true')
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu indicator','samatex'),
									'group'      => 'Top level',
									'param_name' => 'submenu_indicator',
									'value'      => $logic_values
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color',
									'value'      => '#212121',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color hover','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color_hover',
									'value'      => $main_color,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Menu hover effect','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_hover',
									'value'      => array(
										esc_html__('None','samatex')      => 'none',
										esc_html__('Underline','samatex') => 'underline',
										esc_html__('Overline','samatex')  => 'overline',
										esc_html__('Outline','samatex')   => 'outline',
										esc_html__('Box','samatex')       => 'box',
										esc_html__('Fill','samatex')      => 'fill',
									),
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu hover effect color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_effect_color',
									'value'      => '',
									'dependency' => Array('element' => 'menu_hover', 'value' => array('underline','overline','outline','box','fill'))
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'font_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'font_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font weight', 'samatex'),
									'value'     => $font_weight_values,
									'std'       => '700'
								),
								array(
									'param_name'=>'font_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Font size (without any string)','samatex'),
									'group'      => esc_html__('Top level','samatex'),
									'param_name' => 'font_size',
									'value'      => '14',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Top level','samatex'),
									'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
									'param_name' => 'letter_spacing',
									'value'      => '1'
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Text transform','samatex'),
									'group'      => 'Top level',
									'param_name' => 'text_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),
		    		
						/* submenu
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color',
									'value'      => '#bdbdbd',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color hover','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color_hover',
									'value'      => '#ffffff',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu background color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_back_color',
									'value'      => '#212121',
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu shadow','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_shadow',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu indicator','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_submenu_indicator',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu items separator','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_separator',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu appear effect','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_appear',
									'value'      => array(
										esc_html__('Appear','samatex')    => 'none',
										esc_html__('Fade','samatex')      => 'fade',
										esc_html__('Move','samatex')      => 'move',
										esc_html__('Fall','samatex')      => 'fall',
									),
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu hover effect','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_hover',
									'value'      => array(
										esc_html__('None','samatex')      => 'none',
										esc_html__('Underline','samatex') => 'line',
										esc_html__('Dot','samatex')       => 'dot',
										esc_html__('Outline','samatex')   => 'outline',
										esc_html__('Box','samatex')       => 'box',
										esc_html__('Fill','samatex')      => 'fill',
									),
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu hover effect color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_effect_color',
									'value'      => '',
									'dependency' => Array('element' => 'submenu_hover', 'value' => array('line','dot','outline','box','fill'))
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'subfont_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'subfont_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font weight', 'samatex'),
									'value'     => $font_weight_values
								),
								array(
									'param_name'=>'subfont_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Submenu font size (without any string)','samatex'),
									'group'      => esc_html__('Submenu','samatex'),
									'param_name' => 'subfont_size',
									'value'      => '',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Submenu','samatex'),
									'heading'    => esc_html__('Submenu letter spacing (without any string)','samatex'),
									'param_name' => 'subletter_spacing',
									'value'      => ''
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu text transform','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'subtext_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'subelement_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

						/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));

			/* et_megamenu
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Megamenu','samatex'),
		    		'description'             => esc_html__('Use only with megamenu builder','samatex'),
		    		'category'                => $vc_menu_categories[0],
		    		'base'                    => 'et_megamenu',
		    		'class'                   => 'et_megamenu hbe font',
		    		'icon'                    => 'et_megamenu',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-megamenu.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-megamenu.js',
		    		'params'                  => array(
		    			array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Menu name','samatex'),
							'param_name' => 'menu',
							'value'      => $menu_list,
						),
						array(
							'param_name'=>'columns',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Column', 'samatex'), 
							'value'     => array(
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6'
							)
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* top level
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color',
									'value'      => '#212121',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color hover','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color_hover',
									'value'      => $main_color,
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Megamenu top level item border-bottom color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'megamenu_border_color',
									'value'      => '#e0e0e0',
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'font_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'font_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font weight', 'samatex'),
									'value'     => $font_weight_values,
									'std'       => '700'
								),
								array(
									'param_name'=>'font_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Font size (without any string)','samatex'),
									'group'      => esc_html__('Top level','samatex'),
									'param_name' => 'font_size',
									'value'      => '14',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Top level','samatex'),
									'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
									'param_name' => 'letter_spacing',
									'value'      => '1'
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Text transform','samatex'),
									'group'      => 'Top level',
									'param_name' => 'text_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),
		    		
						/* submenu
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color',
									'value'      => '#bdbdbd',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color hover','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color_hover',
									'value'      => '#ffffff',
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu items separator','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_separator',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu hover effect','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_hover',
									'value'      => array(
										esc_html__('None','samatex')      => 'none',
										esc_html__('Uderline','samatex')      => 'line',
										esc_html__('Dot','samatex')       => 'dot',
										esc_html__('Outline','samatex')   => 'outline',
										esc_html__('Box','samatex')       => 'box',
										esc_html__('Fill','samatex')      => 'fill',
									),
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu hover effect color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_effect_color',
									'value'      => '',
									'dependency' => Array('element' => 'submenu_hover', 'value' => array('line','dot','outline','box','fill'))
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'subfont_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'subfont_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font weight', 'samatex'),
									'value'     => $font_weight_values
								),
								array(
									'param_name'=>'subfont_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Submenu font size (without any string)','samatex'),
									'group'      => esc_html__('Submenu','samatex'),
									'param_name' => 'subfont_size',
									'value'      => '',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Submenu','samatex'),
									'heading'    => esc_html__('Submenu letter spacing (without any string)','samatex'),
									'param_name' => 'subletter_spacing',
									'value'      => ''
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Submenu','samatex'),
									'heading'    => esc_html__('Submenu line height (without any string)','samatex'),
									'param_name' => 'subline_height',
									'value'      => ''
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu text transform','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'subtext_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => '32,0,16,0'
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'subelement_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    		)
		    	));

			/* et_megamenu_tab
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Megamenu tab','samatex'),
		    		'description'             => esc_html__('Use only with megamenu builder','samatex'),
		    		'category'                => $vc_menu_categories[0],
		    		'base'                    => 'et_megamenu_tab',
		    		'class'                   => 'et_megamenu_tab hbe font',
		    		'icon'                    => 'et_megamenu_tab',
		    		'as_parent'               => array('only' => 'et_megamenu_tab_item'),
		    		'content_element'         => true,
		    		'show_settings_on_create' => true,
		    		'is_container'            => true,
		    		'js_view'                 => 'VcColumnView',
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-megamenu-tab.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-megamenu-tab.js',
		    		'params'                  => array(
						array(
							'param_name'=>'size',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Tabs size', 'samatex'), 
							'value'     => $size_values_box
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Tabset background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'tabset_color',
								'value'      => '#f5f5f5',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Tab content background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'tab_content_color',
								'value'      => '#ffffff',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Menu color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'menu_color',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Menu color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'menu_color_hover',
								'value'      => $main_color,
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Menu hover effect','samatex'),
								'group'      => 'Styling',
								'param_name' => 'menu_hover',
								'value'      => array(
									esc_html__('None','samatex')      => 'none',
									esc_html__('Uderline','samatex')  => 'line',
									esc_html__('Dot','samatex')       => 'dot',
									esc_html__('Outline','samatex')   => 'outline',
									esc_html__('Box','samatex')       => 'box',
									esc_html__('Fill','samatex')      => 'fill',
								),
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Menu hover effect color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'menu_effect_color',
								'value'      => '',
								'dependency' => Array('element' => 'menu_hover', 'value' => array('line','dot','outline','box','fill'))
							),

						/* typography
						---------------*/

							array(
								'param_name'=>'font_family',
								'type'      => 'dropdown',
								'group'     => esc_html__('Typography','samatex'), 
								'heading'   => esc_html__('Font family', 'samatex'),
								'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
								'value'     => $google_fonts_family,
							),
							array(
								'param_name'=>'font_weight',
								'type'      => 'dropdown',
								'group'     => esc_html__('Typography','samatex'), 
								'heading'   => esc_html__('Font weight', 'samatex'),
								'value'     => $font_weight_values,
								'std'       => '700'
							),
							array(
								'param_name'=>'font_subsets',
								'type'      => 'dropdown',
								'group'     => esc_html__('Typography','samatex'), 
								'heading'   => esc_html__('Font subsets', 'samatex'),
								'value'      => array(
									'latin' => 'latin',
								)
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Font size (without any string)','samatex'),
								'group'      => esc_html__('Typography','samatex'),
								'param_name' => 'font_size',
								'value'      => '14',
							),
							array(
								'type'       => 'textfield',
								'group'      => esc_html__('Typography','samatex'),
								'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
								'param_name' => 'letter_spacing',
								'value'      => '1'
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Text transform','samatex'),
								'group'      => 'Typography',
								'param_name' => 'text_transform',
								'value'      => array(
									esc_html__('None','samatex')       => 'none',
									esc_html__('Uppercase','samatex')  => 'uppercase',
									esc_html__('Lowercase','samatex')  => 'lowercase',
									esc_html__('Capitalize','samatex') => 'capitalize',
								)
							),

						/* padding
						---------------*/

							array(
								'type'       => 'padding',
								'group'      => esc_html__('Padding','samatex'),
								'heading'    => esc_html__('Padding','samatex'),
								'param_name' => 'padding',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));

				vc_map(array(
					'name'                    => esc_html__('Megamenu tab item','samatex'),
					'category'                => $vc_menu_categories[0],
					'base'                    => 'et_megamenu_tab_item',
					'class'                   => 'et_megamenu_tab_item hbe',
					'icon'                    => 'et_megamenu_tab_item',
					'as_child'                => array('only' => 'et_megamenu_tab'),
					"as_parent"               => array('except' => 'vc_section'),
					'content_element'         => true,
					"js_view"                 => 'VcColumnView',
					'show_settings_on_create' => true,
					'params'                  => array(
						array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Active','samatex'),
						'param_name' => 'active',
						'value'      => array(
							'false' => 'false',
							'true'  => 'true'
						)
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon prefix','samatex'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon name','samatex'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
					),
					array(
	    				'type'       => 'textfield',
						'heading'    => esc_html__('Title','samatex'),
						'param_name' => 'title',
						'value'      => ''
					),
					)
				));

			/* et_search_toggle
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Search toggle','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => array($vc_menu_categories[0],$vc_menu_categories[1]),
		    		'base'                    => 'et_search_toggle',
		    		'class'                   => 'et_search_toggle hbe',
		    		'icon'                    => 'et_search_toggle',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-search-toggle.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-search-toggle.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_search',
								'heading'    => esc_html__('Icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-esearch-15',
							),

							array(
								'type'       => 'icon_close',
								'heading'    => esc_html__('Close icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'close_icon',
								'value'      => 'ien-eclose-3',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* searchbox
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Search box color','samatex'),
								'group'      => 'Search box',
								'param_name' => 'search_color',
								'value'      => '#616161',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Search box background color','samatex'),
								'group'      => 'Search box',
								'param_name' => 'search_background_color',
								'value'      => '#ffffff',
							),
							array(
								'param_name'=>'box_align',
								'group'      => 'Search box',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'      => array(
									esc_html__('Left','samatex')  => 'left',
									esc_html__('Right','samatex') => 'right',
								)
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    			/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));
	
			/* et_search_form
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Search form','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories,
		    		'base'                    => 'et_search_form',
		    		'class'                   => 'et_search_form hbe',
		    		'icon'                    => 'et_search_form',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-search-form.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-search-form.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_search',
								'heading'    => esc_html__('Icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-esearch-15',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

						/* searchbox
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Search box width in px (without any string)','samatex'),
								'group'      => 'Styling',
								'param_name' => 'search_width',
								'value'      => '256',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Search box height in px (without any string)','samatex'),
								'description'=> esc_html__('Minimum value is 32px','samatex'),
								'group'      => 'Styling',
								'param_name' => 'search_height',
								'value'      => '56',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Search box color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'search_color',
								'value'      => '#616161',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Search box background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'search_background_color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Search box border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'search_border_color',
								'value'      => '#e0e0e0',
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

						/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));

			/* et_cart_toggle
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Cart toggle','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => array($vc_menu_categories[0],$vc_menu_categories[1]),
		    		'base'                    => 'et_cart_toggle',
		    		'class'                   => 'et_cart_toggle hbe',
		    		'icon'                    => 'et_cart_toggle',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-cart-toggle.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-cart-toggle.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_cart',
								'heading'    => esc_html__('Icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-ecart-35',
							),

							array(
								'type'       => 'icon_close',
								'heading'    => esc_html__('Close icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'close_icon',
								'value'      => 'ien-eclose-3',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* cartbubble
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart bubble text color','samatex'),
								'group'      => 'Cart bubble',
								'param_name' => 'cart_bubble_color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart bubble background color','samatex'),
								'group'      => 'Cart bubble',
								'param_name' => 'cart_bubble_background_color',
								'value'      => $main_color,
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Offset right (without any string)','samatex'),
								'group'      => 'Cart bubble',
								'param_name' => 'cart_bubble_right',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Offset top (without any string)','samatex'),
								'group'      => 'Cart bubble',
								'param_name' => 'cart_bubble_top',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* cartbox
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart box product title color','samatex'),
								'group'      => 'Cart box',
								'param_name' => 'cart_title_color',
								'value'      => '#212121',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart box text color','samatex'),
								'group'      => 'Cart box',
								'param_name' => 'cart_color',
								'value'      => '#616161',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart box button color','samatex'),
								'group'      => 'Cart box',
								'param_name' => 'cart_button_color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart box button color hover','samatex'),
								'group'      => 'Cart box',
								'param_name' => 'cart_button_color_hover',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart box button background color','samatex'),
								'group'      => 'Cart box',
								'param_name' => 'cart_button_background_color',
								'value'      => $main_color,
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart box button background color hover','samatex'),
								'group'      => 'Cart box',
								'param_name' => 'cart_button_background_color_hover',
								'value'      => '#212121',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Cart box background color','samatex'),
								'group'      => 'Cart box',
								'param_name' => 'cart_background_color',
								'value'      => '#ffffff',
							),
							array(
								'param_name'=>'box_align',
								'type'      => 'dropdown',
								'group'      => 'Cart box',
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => array(
									esc_html__('Left','samatex')  => 'left',
									esc_html__('Right','samatex') => 'right',
								)
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

						/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));

			/* et_language_switcher
			---------------*/
					
				vc_map(array(
		    		'name'                    => esc_html__('Language switcher','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => array($vc_menu_categories[0],$vc_menu_categories[1]),
		    		'base'                    => 'et_language_switcher',
		    		'class'                   => 'et_language_switcher hbe',
		    		'icon'                    => 'et_language_switcher',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-language-switcher.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-language-switcher.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_close',
								'heading'    => esc_html__('Close icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-eclose-3',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* submenu
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Submenu color','samatex'),
								'group'      => 'Submenu',
								'param_name' => 'submenu_color',
								'value'      => '#bdbdbd',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Submenu color hover','samatex'),
								'group'      => 'Submenu',
								'param_name' => 'submenu_color_hover',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Submenu background color','samatex'),
								'group'      => 'Submenu',
								'param_name' => 'submenu_background_color',
								'value'      => '#212121',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Submenu background color hover','samatex'),
								'group'      => 'Submenu',
								'param_name' => 'submenu_background_color_hover',
								'value'      => $main_color,
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Submenu  width in px (without any string)','samatex'),
								'group'      => 'Submenu',
								'param_name' => 'submenu_width',
								'value'      => '200',
							),
							array(
								'param_name'=>'box_align',
								'group'      => 'Submenu',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => array(
									esc_html__('Center','samatex')  => 'center',
									esc_html__('Left','samatex')  => 'left',
									esc_html__('Right','samatex') => 'right',
								)
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    			/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));

			/* et_login_toggle
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Front-end login','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => array($vc_menu_categories[0],$vc_menu_categories[1]),
		    		'base'                    => 'et_login_toggle',
		    		'class'                   => 'et_login_toggle hbe',
		    		'icon'                    => 'et_login_toggle',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-login-toggle.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-login-toggle.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Registration page link','samatex'),
							'param_name' => 'registration_link',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Password recovery page','samatex'),
							'param_name' => 'forgot_link',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_user',
								'heading'    => esc_html__('Icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-euser-1',
							),

							array(
								'type'       => 'icon_close',
								'heading'    => esc_html__('Close icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'close_icon',
								'value'      => 'ien-eclose-3',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* loginbox
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box text color','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_color',
								'value'      => '#616161',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box background color','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_background_color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box input border color','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_border_color',
								'value'      => '#e0e0e0',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box button color','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_button_color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box button color hover','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_button_color_hover',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box button background color','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_button_background_color',
								'value'      => $main_color,
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box button background color hover','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_button_background_color_hover',
								'value'      => '#212121',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Login box button border width in px (without any string)','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_button_border_width',
								'value'      => '',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box button border color','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_button_border_color',
								'value'      => '',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Login box button border color hover','samatex'),
								'group'      => 'Login box',
								'param_name' => 'login_button_border_color_hover',
								'value'      => '',
							),
							array(
								'param_name'=>'box_align',
								'type'      => 'dropdown',
								'group'     => 'Login box',
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => array(
									esc_html__('Left','samatex')  => 'left',
									esc_html__('Right','samatex') => 'right',
								)
							),
						
						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    			/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));
			
			/* et_header_slogan
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Slogan','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories,
		    		'base'                    => 'et_header_slogan',
		    		'class'                   => 'et_header_slogan hbe',
		    		'icon'                    => 'et_header_slogan',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-slogan.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-slogan.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Max width (without any string)','samatex'),
							'param_name' => 'max_width',
							'value'      => '',
						),
						array(
							'type'       => 'textarea_html',
							'heading'    => esc_html__('Content','samatex'),
							'param_name' => 'content',
							'value'      => '',
						),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    			/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));

			/* et_header_social_links
			---------------*/

				foreach ($social_links_array as $social) {
					vc_add_param('et_header_social_links', array(
						'type'       => 'textfield',
						'heading'    => ucfirst($social).' link',
						'param_name' => $social,
						'value'      => '',
						'weight' => 1
					));
				}

		    	vc_map(array(
					'name'                    => esc_html__('Social links','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories,
		    		'base'                    => 'et_header_social_links',
		    		'class'                   => 'et_header_social_links hbe',
		    		'icon'                    => 'et_header_social_links',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-social-links.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-social-links.js',
					'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),
						array(
							'param_name'=>'target',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Target', 'samatex'), 
							'value'     => array(
								'_self'  => '_self',
								'_blank' => '_blank' 
							)
						),

						/* styling
						---------------*/

							array(
								'param_name'=>'styling_original',
								'type'      => 'dropdown',
								'group'     => esc_html__('Styling','samatex'), 
								'heading'   => esc_html__('Original styling', 'samatex'), 
								'value'     => $logic_values
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'     => esc_html__('Styling','samatex'), 
								'param_name' => 'icon_color',
								'value'      => '#616161',
								'dependency' => Array('element' => 'styling_original', 'value' => 'false')
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'     => esc_html__('Styling','samatex'), 
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
								'dependency' => Array('element' => 'styling_original', 'value' => 'false')
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'     => esc_html__('Styling','samatex'), 
								'param_name' => 'icon_background_color',
								'value'      => '',
								'dependency' => Array('element' => 'styling_original', 'value' => 'false')
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'     => esc_html__('Styling','samatex'), 
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
								'dependency' => Array('element' => 'styling_original', 'value' => 'false')
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'     => esc_html__('Styling','samatex'), 
								'param_name' => 'icon_border_color',
								'value'      => '',
								'dependency' => Array('element' => 'styling_original', 'value' => 'false')
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'     => esc_html__('Styling','samatex'), 
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
								'dependency' => Array('element' => 'styling_original', 'value' => 'false')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon border width (without any string)','samatex'),
								'group'     => esc_html__('Styling','samatex'), 
								'param_name' => 'icon_border_width',
								'dependency' => Array('element' => 'styling_original', 'value' => 'false')
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),
					
						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
					
						/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
					)
				));
	
			/* et_header_icon
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Header icon','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories,
		    		'base'                    => 'et_header_icon',
		    		'class'                   => 'et_header_icon hbe',
		    		'icon'                    => 'et_header_icon',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-icon.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-icon.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Icon prefix','samatex'),
							'param_name' => 'icon_prefix',
							'value'      => '',
							'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
						),

						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Icon name','samatex'),
							'param_name' => 'icon_name',
							'value'      => '',
							'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
						),

						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Icon link','samatex'),
							'param_name' => 'icon_link',
							'value'      => '',
						),

						array(
							'param_name'=>'target',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Target', 'samatex'), 
							'value'     => array(
								'_self'  => '_self',
								'_blank' => '_blank' 
							),
							'dependency' => Array('element' => 'icon_link', 'not_empty' => true)
						),

						/* styling
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    			/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));

			/* et_header_vertical_separator
			---------------*/

		    	vc_map(array(
					'name'                    => esc_html__('Vertical separator','samatex'),
					'description'             => esc_html__('Use only with header builder','samatex'),
					'category'                => $vc_menu_categories,
					'base'                    => 'et_header_vertical_separator',
		    		'class'                   => 'et_header_vertical_separator hbe',
		    		'icon'                    => 'et_header_vertical_separator',
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-vertical-separator.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-vertical-separator.js',
					'show_settings_on_create' => true,
					'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Type','samatex'),
							'param_name' => 'type',
							'value'      => array(
								esc_html__('solid','samatex')  => 'solid',
								esc_html__('dotted','samatex') => 'dotted',
								esc_html__('dashed','samatex') => 'dashed',
							)
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Color','samatex'),
							'param_name' => 'color',
							'value'      => '#e0e0e0'
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Width (without any string, if you want 100% leave blank)','samatex'),
							'param_name' => 'width',
							'value'      => ''
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Height (without any string, if you want 1px leave blank)','samatex'),
							'param_name' => 'height',
							'value'      => ''
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => ''
						),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
					)
				));

			/* et_header_button
			---------------*/

				vc_map(array(
	    			'name'                    => esc_html__('Header button','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories,
		    		'base'                    => 'et_header_button',
		    		'class'                   => 'et_header_button hbe',
		    		'icon'                    => 'et_header_button',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-button.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-header-button.js',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),

						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Button text','samatex'),
							'param_name' => 'button_text',
							'value'      => '',
						),

						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Button link','samatex'),
							'param_name' => 'button_link',
							'value'      => '',
						),
						array(
							'param_name'=>'target',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Target', 'samatex'), 
							'value'     => array(
								'_self'  => '_self',
								'_blank' => '_blank' 
							)
						),
						array(
		    				'type'       => 'checkbox',
							'heading'    => esc_html__('Open link in modal window?', 'samatex'),
							'param_name' => 'button_link_modal',
							'value'      => '',
						),

						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

		    			/* typography
						---------------*/

							array(
								'param_name'=>'font_family',
								'type'      => 'dropdown',
								'group'     => esc_html__('Typography', 'samatex'),
								'heading'   => esc_html__('Font family', 'samatex'),
								'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
								'value'     => $google_fonts_family,
							),
							array(
								'param_name'=>'font_weight',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Font weight', 'samatex'),
								'group'     => esc_html__('Typography', 'samatex'),
								'value'     => $font_weight_values,
							),
							array(
								'param_name'=>'font_subsets',
								'type'      => 'dropdown',
								'heading'   => esc_html__('Font subsets', 'samatex'),
								'group'     => esc_html__('Typography', 'samatex'),
								'value'     => array(
									'latin' => 'latin',
								)
							),
			    			array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button font size (without any string)','samatex'),
								'group'      => esc_html__('Typography','samatex'),
								'param_name' => 'button_font_size',
								'value'      => '',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button letter spacing (without any string)','samatex'),
								'group'      => esc_html__('Typography','samatex'),
								'param_name' => 'button_letter_spacing',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button line height (without any string)','samatex'),
								'group'      => esc_html__('Typography','samatex'),
								'param_name' => 'button_line_height',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'group'   	 => esc_html__('Typography', 'samatex'),
								'heading'    => esc_html__('Text transform','samatex'),
								'param_name' => 'button_text_transform',
								'value'      => array(
									esc_html__('None','samatex')       => 'none',
									esc_html__('Uppercase','samatex')  => 'uppercase',
									esc_html__('Lowercase','samatex')  => 'lowercase',
									esc_html__('Capitalize','samatex') => 'capitalize',
								)
							),

						/* styling
						---------------*/

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small','samatex')  => 'small',
									esc_html__('Medium','samatex') => 'medium',
									esc_html__('Large','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Button width in px (without any string)','samatex'),
								'param_name' => 'width',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Button height in px (without any string)','samatex'),
								'param_name' => 'height',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button color','samatex'),
								'group'      => esc_html__('Styling','samatex'),
								'param_name' => 'button_color',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button background color','samatex'),
								'group'      => esc_html__('Styling','samatex'),
								'param_name' => 'button_back_color',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button border color','samatex'),
								'group'      => esc_html__('Styling','samatex'),
								'param_name' => 'button_border_color',
								'value'      => ''
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button border radius (without any string)','samatex'),
								'group'      => esc_html__('Styling','samatex'),
								'param_name' => 'button_border_radius',
								'value'      => '0'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Button border width (without any string)','samatex'),
								'group'      => esc_html__('Styling','samatex'),
								'param_name' => 'button_border_width',
							),

							array(
			    				'type'       => 'checkbox',
								'heading'    => esc_html__('Button shadow ?', 'samatex'),
								'group'      => esc_html__('Styling','samatex'),
								'param_name' => 'button_shadow',
								'value'      => '',
							),

						/* icon
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon prefix','samatex'),
								'group'      => esc_html__('Icon','samatex'),
								'param_name' => 'icon_prefix',
								'value'      => '',
								'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon name','samatex'),
								'group'      => esc_html__('Icon','samatex'),
								'param_name' => 'icon_name',
								'value'      => '',
								'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','samatex')
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon size (without any string)','samatex'),
								'group'      => esc_html__('Icon','samatex'),
								'param_name' => 'icon_font_size',
								'value'      => '',
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Icon position','samatex'),
								'group'      => esc_html__('Icon','samatex'),
								'param_name' => 'icon_position',
								'value'      => array(
									esc_html__('Left','samatex')  => 'left',
									esc_html__('Right','samatex')  => 'right',
								)
							),

						/* hover
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button color hover','samatex'),
								'group'      => esc_html__('Hover','samatex'),
								'param_name' => 'button_color_hover',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button background color hover','samatex'),
								'group'      => esc_html__('Hover','samatex'),
								'param_name' => 'button_back_color_hover',
								'value'      => ''
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Button border color hover','samatex'),
								'group'      => esc_html__('Hover','samatex'),
								'param_name' => 'button_border_color_hover',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Hover animation','samatex'),
								'group'      => esc_html__('Hover','samatex'),
								'param_name' => 'animate_hover',
								'value'      => array(
									esc_html__('None','samatex')  => 'none',
									esc_html__('Fill','samatex')  => 'fill',
									esc_html__('Scale','samatex') => 'scale',
									esc_html__('Glint','samatex') => 'glint',
								)
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Click animation','samatex'),
								'group'      => esc_html__('Click','samatex'),
								'param_name' => 'animate_click',
								'value'      => array(
									esc_html__('None','samatex')  => 'none',
									esc_html__('Material','samatex')  => 'material',
								)
							),
							array(
								'type'       => 'checkbox',
								'heading'    => esc_html__('Smooth Click animation','samatex'),
								'group'      => esc_html__('Click','samatex'),
								'param_name' => 'click_smooth',
								'value'      => ''
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

		    			/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
	    		));

			/* et_align_container
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Align container','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => array($vc_menu_categories[1],$vc_menu_categories[2]),
		    		'base'                    => 'et_align_container',
		    		'class'                   => 'et_align_container',
		    		'icon'                    => 'et_align_container',
		    		'show_settings_on_create' => true,
		    		"as_parent"               => array('only' => 'et_gap, et_separator, et_header_button, et_header_icon, et_header_social_links, et_header_slogan, et_search_form, et_header_logo'),
					"js_view"                 => 'VcColumnView',
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Content align', 'samatex'), 
							'description' => esc_html__('Align any inside element', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),
		    		)
		    	));

		    /* et_vertical_align_top
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Vertical align top','samatex'),
		    		'description'             => esc_html__('Use only with header builder for sidebar navigation header','samatex'),
		    		'category'                => $vc_menu_categories[2],
		    		'base'                    => 'et_vertical_align_top',
		    		'class'                   => 'et_vertical_align_top',
		    		'icon'                    => 'et_vertical_align_top',
		    		'show_settings_on_create' => true,
		    		"as_parent"               => array('only' => 'et_gap, et_separator, et_header_button, et_header_icon, et_header_social_links, et_header_slogan, et_search_form, et_header_logo, et_align_container, et_sidebar_menu'),
					"js_view"                 => 'VcColumnView',
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),
		    		)
		    	));

		    /* et_vertical_align_middle
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Vertical align middle','samatex'),
		    		'description'             => esc_html__('Use only with header builder for sidebar navigation header','samatex'),
		    		'category'                => $vc_menu_categories[2],
		    		'base'                    => 'et_vertical_align_middle',
		    		'class'                   => 'et_vertical_align_middle',
		    		'icon'                    => 'et_vertical_align_middle',
		    		'show_settings_on_create' => true,
		    		"as_parent"               => array('only' => 'et_gap, et_separator, et_header_button, et_header_icon, et_header_social_links, et_header_slogan, et_search_form, et_header_logo, et_align_container, et_sidebar_menu'),
					"js_view"                 => 'VcColumnView',
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),
		    		)
		    	));

		    /* et_vertical_align_bottom
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Vertical align bottom','samatex'),
		    		'description'             => esc_html__('Use only with header builder for sidebar navigation header','samatex'),
		    		'category'                => $vc_menu_categories[2],
		    		'base'                    => 'et_vertical_align_bottom',
		    		'class'                   => 'et_vertical_align_bottom',
		    		'icon'                    => 'et_vertical_align_bottom',
		    		'show_settings_on_create' => true,
		    		"as_parent"               => array('only' => 'et_gap, et_separator, et_header_button, et_header_icon, et_header_social_links, et_header_slogan, et_search_form, et_header_logo, et_align_container, et_sidebar_menu'),
					"js_view"                 => 'VcColumnView',
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),
		    		)
		    	));

			/* et_mobile_container
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Mobile container','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories[1],
		    		'base'                    => 'et_header_mobile_container',
		    		'class'                   => 'et_header_mobile_container',
		    		'icon'                    => 'et_header_mobile_container',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mobile-container.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mobile-container.js',
		    		"as_parent"               => array('only' => 'et_gap, et_separator, et_header_button, et_header_icon, et_header_social_links, et_header_slogan, et_search_form, et_mobile_menu, et_header_logo,et_align_container, et_mobile_close'),
					"js_view"                 => 'VcColumnView',
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
							'param_name'=>'effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Appear from', 'samatex'), 
							'value'     => array(
								esc_html__('Left','samatex')  => 'left',
								esc_html__('Right','samatex') => 'right',
								esc_html__('Top','samatex') => 'top',
							)
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'background_color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Default text color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'text_color',
								'value'      => '#616161',
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Padding','samatex'),
								'heading'    => esc_html__('Padding','samatex'),
								'param_name' => 'margin',
								'value'      => '48,32,48,32'
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));
	
		    /* et_mobile_toggle
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Mobile container toggle','samatex'),
		    		'description'             => esc_html__('Use only with header builder to toggle the mobile container','samatex'),
		    		'category'                => $vc_menu_categories[1],
		    		'base'                    => 'et_mobile_toggle',
		    		'class'                   => 'et_mobile_toggle hbe',
		    		'icon'                    => 'et_mobile_toggle',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mobile-toggle.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mobile-toggle.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_menu',
								'heading'    => esc_html__('Icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-emenu-1',
							),

							array(
								'type'       => 'icon_close',
								'heading'    => esc_html__('Close icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'close_icon',
								'value'      => 'ien-eclose-3',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    			/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));
	
			/* et_mobile_close
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Mobile container close','samatex'),
		    		'description'             => esc_html__('Use only with header builder to close the mobile container','samatex'),
		    		'category'                => $vc_menu_categories[1],
		    		'base'                    => 'et_mobile_close',
		    		'class'                   => 'et_mobile_close hbe',
		    		'icon'                    => 'et_mobile_close',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mobile-close.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mobile-close.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_close',
								'heading'    => esc_html__('Icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-eclose-3',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    			
		    		)
		    	));

			/* et_mobile_menu
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Mobile menu','samatex'),
		    		'description'             => esc_html__('Use only with mobile container','samatex'),
		    		'category'                => $vc_menu_categories[1],
		    		'base'                    => 'et_mobile_menu',
		    		'class'                   => 'et_mobile_menu font',
		    		'icon'                    => 'et_mobile_menu',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mobile-menu.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-mobile-menu.js',
		    		'params'                  => array(
		    			array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Menu name','samatex'),
							'param_name' => 'menu',
							'value'      => $menu_list,
							'default'    => 'choose'
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Menu items separator color','samatex'),
							'param_name' => 'separator_color',
							'value'      => '#e0e0e0',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Text align','samatex'),
							'param_name' => 'text_align',
							'value'      => $align_values,
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* top level
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color',
									'value'      => '#212121',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color hover','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color_hover',
									'value'      => $main_color,
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu background color hover','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_background_color_hover',
									'value'      => '',
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'font_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'font_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font weight', 'samatex'),
									'value'     => $font_weight_values,
									'std'       => '700'
								),
								array(
									'param_name'=>'font_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Font size (without any string)','samatex'),
									'group'      => esc_html__('Top level','samatex'),
									'param_name' => 'font_size',
									'value'      => '14',
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Menu items line height (without any string)','samatex'),
									'group'      => esc_html__('Top level','samatex'),
									'param_name' => 'line_height',
									'value'      => '24',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Top level','samatex'),
									'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
									'param_name' => 'letter_spacing',
									'value'      => '1'
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Text transform','samatex'),
									'group'      => 'Top level',
									'param_name' => 'text_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),
		    		
						/* submenu
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color',
									'value'      => '#616161',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color hover','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color_hover',
									'value'      => $main_color,
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu background color hover','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_background_color_hover',
									'value'      => '',
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'subfont_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'subfont_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font weight', 'samatex'),
									'value'     => $font_weight_values
								),
								array(
									'param_name'=>'subfont_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Submenu font size (without any string)','samatex'),
									'group'      => esc_html__('Submenu','samatex'),
									'param_name' => 'subfont_size',
									'value'      => '',
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Submenu items line height (without any string)','samatex'),
									'group'      => esc_html__('Submenu','samatex'),
									'param_name' => 'subline_height',
									'value'      => '24',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Submenu','samatex'),
									'heading'    => esc_html__('Submenu letter spacing (without any string)','samatex'),
									'param_name' => 'subletter_spacing',
									'value'      => ''
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu text transform','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'subtext_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'subelement_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));
	
			/* et_modal_container
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Modal container','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories[0],
		    		'base'                    => 'et_header_modal_container',
		    		'class'                   => 'et_header_modal_container',
		    		'icon'                    => 'et_header_modal_container',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-modal-container.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-modal-container.js',
		    		"as_parent"               => array('only' => 'et_gap, et_separator, et_header_button, et_header_icon, et_header_social_links, et_header_slogan, et_search_form, et_modal_menu, et_header_logo,et_align_container, et_modal_close'),
					"js_view"                 => 'VcColumnView',
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
							'param_name'=>'effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Appear from', 'samatex'), 
							'value'     => array(
								esc_html__('Left','samatex')  => 'left',
								esc_html__('Right','samatex') => 'right',
								esc_html__('Top','samatex') => 'top',
								esc_html__('Center','samatex') => 'center',
							)
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'background_color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Default text color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'text_color',
								'value'      => '#616161',
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Padding','samatex'),
								'heading'    => esc_html__('Padding','samatex'),
								'param_name' => 'margin',
								'value'      => '48,32,48,32'
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));
	
		    /* et_modal_toggle
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Modal container toggle','samatex'),
		    		'description'             => esc_html__('Use only with header builder to toggle the modal container','samatex'),
		    		'category'                => $vc_menu_categories[0],
		    		'base'                    => 'et_modal_toggle',
		    		'class'                   => 'et_modal_toggle hbe',
		    		'icon'                    => 'et_modal_toggle',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-modal-toggle.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-modal-toggle.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_menu',
								'heading'    => esc_html__('Icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-emenu-1',
							),

							array(
								'type'       => 'icon_close',
								'heading'    => esc_html__('Close icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'close_icon',
								'value'      => 'ien-eclose-3',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),

		    			/* visibility
						---------------*/

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from default header version?','samatex'),
								'param_name' => 'hide_default',
								'value'      => '',
							),

							array(
								'type'       => 'checkbox',
								'group'    => esc_html__('Visibility','samatex'),
								'heading'    => esc_html__('Hide from sticky header version?','samatex'),
								'param_name' => 'hide_sticky',
								'value'      => '',
							),
		    		)
		    	));
	
			/* et_modal_close
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Modal container close','samatex'),
		    		'description'             => esc_html__('Use only with header builder to close the modal container','samatex'),
		    		'category'                => $vc_menu_categories[0],
		    		'base'                    => 'et_modal_close',
		    		'class'                   => 'et_modal_close hbe',
		    		'icon'                    => 'et_modal_close',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-modal-close.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-modal-close.js',
		    		'params'                  => array(
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'description' => esc_html__('!If you choose Center, do not forget to set the parent element text-align to center', 'samatex'), 
							'value'     => $align_values_extended
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'icon_close',
								'heading'    => esc_html__('Icon','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon',
								'value'      => 'ien-eclose-3',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color',
								'value'      => '#bdbdbd',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_color_hover',
								'value'      => '#212121',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon background color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_background_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color',
								'value'      => '',
							),

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon border color hover','samatex'),
								'group'      => 'Styling',
								'param_name' => 'icon_border_color_hover',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon border width in px (without any string)','samatex'),
								'param_name' => 'icon_border_width',
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Size','samatex'),
								'group'      => 'Styling',
								'param_name' => 'size',
								'value'      => array(
									esc_html__('Small (16px icon 32px icon box)','samatex')  => 'small',
									esc_html__('Medium (20px icon 36px icon box)','samatex') => 'medium',
									esc_html__('Large (24px icon 40px icon box)','samatex')  => 'large',
									esc_html__('Custom','samatex')  => 'custom',
								),
								'std' => 'medium'
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon size in px (without any string)','samatex'),
								'param_name' => 'icon_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

							array(
								'type'       => 'textfield',
								'group'      => 'Styling',
								'heading'    => esc_html__('Icon box size in px (without any string)','samatex'),
								'param_name' => 'icon_box_size',
								'value'      => '',
								'dependency' => Array('element' => 'size', 'value' => 'custom')
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    			
		    		)
		    	));

			/* et_modal_menu
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Modal menu','samatex'),
		    		'description'             => esc_html__('Use only with modal container','samatex'),
		    		'category'                => $vc_menu_categories[0],
		    		'base'                    => 'et_modal_menu',
		    		'class'                   => 'et_modal_menu font',
		    		'icon'                    => 'et_modal_menu',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-modal-menu.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-modal-menu.js',
		    		'params'                  => array(
		    			array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Menu name','samatex'),
							'param_name' => 'menu',
							'value'      => $menu_list,
							'default'    => 'choose'
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Menu items separator color','samatex'),
							'param_name' => 'separator_color',
							'value'      => '#e0e0e0',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Text align','samatex'),
							'param_name' => 'text_align',
							'value'      => $align_values,
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* top level
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color',
									'value'      => '#212121',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color hover','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color_hover',
									'value'      => $main_color,
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu background color hover','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_background_color_hover',
									'value'      => '',
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'font_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'font_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font weight', 'samatex'),
									'value'     => $font_weight_values,
									'std'       => '700'
								),
								array(
									'param_name'=>'font_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Font size (without any string)','samatex'),
									'group'      => esc_html__('Top level','samatex'),
									'param_name' => 'font_size',
									'value'      => '32',
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Menu items line height (without any string)','samatex'),
									'group'      => esc_html__('Top level','samatex'),
									'param_name' => 'line_height',
									'value'      => '48',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Top level','samatex'),
									'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
									'param_name' => 'letter_spacing',
									'value'      => '1'
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Text transform','samatex'),
									'group'      => 'Top level',
									'param_name' => 'text_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),
		    		
						/* submenu
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color',
									'value'      => '#616161',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color hover','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color_hover',
									'value'      => $main_color,
								),
								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu background color hover','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_background_color_hover',
									'value'      => '',
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'subfont_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'subfont_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font weight', 'samatex'),
									'value'     => $font_weight_values
								),
								array(
									'param_name'=>'subfont_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Submenu font size (without any string)','samatex'),
									'group'      => esc_html__('Submenu','samatex'),
									'param_name' => 'subfont_size',
									'value'      => '24',
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Submenu items line height (without any string)','samatex'),
									'group'      => esc_html__('Submenu','samatex'),
									'param_name' => 'subline_height',
									'value'      => '32',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Submenu','samatex'),
									'heading'    => esc_html__('Submenu letter spacing (without any string)','samatex'),
									'param_name' => 'subletter_spacing',
									'value'      => '1'
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu text transform','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'subtext_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Margin','samatex'),
								'heading'    => esc_html__('Margin','samatex'),
								'param_name' => 'margin',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'subelement_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));
	
			/* et_sidebar_container
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Sidebar container','samatex'),
		    		'description'             => esc_html__('Use only with header builder','samatex'),
		    		'category'                => $vc_menu_categories[2],
		    		'base'                    => 'et_header_sidebar_container',
		    		'class'                   => 'et_header_sidebar_container',
		    		'icon'                    => 'et_header_sidebar_container',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-sidebar-container.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-sidebar-container.js',
		    		"as_parent"               => array('only' => 'et_gap, et_separator, et_header_button, et_header_icon, et_header_social_links, et_header_slogan, et_search_form, et_sidebar_menu, et_header_logo,et_align_container,et_vertical_align_top,et_vertical_align_middle,et_vertical_align_bottom'),
					"js_view"                 => 'VcColumnView',
		    		"content_element"         => true,
		    		'params'                  => array(

						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* styling
						---------------*/

							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Background color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'background_color',
								'value'      => '#ffffff',
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Default text color','samatex'),
								'group'      => 'Styling',
								'param_name' => 'text_color',
								'value'      => '#616161',
							),

						/* margin
						---------------*/

							array(
								'type'       => 'margin',
								'group'      => esc_html__('Padding','samatex'),
								'heading'    => esc_html__('Padding','samatex'),
								'param_name' => 'margin',
								'value'      => '48,32,48,32'
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));
	
		    /* et_sidebar_menu
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Sidebar navigation menu','samatex'),
		    		'description'             => esc_html__('Use only with sidebar builder','samatex'),
		    		'category'                => $vc_menu_categories[2],
		    		'base'                    => 'et_sidebar_menu',
		    		'class'                   => 'et_sidebar_menu hbe font',
		    		'icon'                    => 'et_sidebar_menu',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-sidebar-menu.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-sidebar-menu.js',
		    		'params'                  => array(
		    			array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Menu name','samatex'),
							'param_name' => 'menu',
							'value'      => $menu_list,
							'default'    => 'choose'
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						/* top level
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color',
									'value'      => '#212121',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu color hover','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_color_hover',
									'value'      => $main_color,
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu indicator','samatex'),
									'group'      => 'Top level',
									'param_name' => 'submenu_indicator',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Text align','samatex'),
									'group'      => 'Top level',
									'param_name' => 'tl_text_align',
									'value'      => $align_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Top level items separator','samatex'),
									'group'      => 'Top level',
									'param_name' => 'tl_separator',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Menu hover effect','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_hover',
									'value'      => array(
										esc_html__('None','samatex')      => 'none',
										esc_html__('Outline','samatex')   => 'outline',
										esc_html__('Box','samatex')       => 'box',
										esc_html__('Fill','samatex')      => 'fill',
									),
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Menu hover effect color','samatex'),
									'group'      => 'Top level',
									'param_name' => 'menu_effect_color',
									'value'      => '',
									'dependency' => Array('element' => 'menu_hover', 'value' => array('outline','box','fill'))
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'font_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'font_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font weight', 'samatex'),
									'value'     => $font_weight_values,
									'std'       => 'uppercase'
								),
								array(
									'param_name'=>'font_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Top level','samatex'), 
									'heading'   => esc_html__('Font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Font size (without any string)','samatex'),
									'group'      => esc_html__('Top level','samatex'),
									'param_name' => 'font_size',
									'value'      => '14',
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Line height (without any string)','samatex'),
									'group'      => esc_html__('Top level','samatex'),
									'param_name' => 'line_height',
									'value'      => '24',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Top level','samatex'),
									'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
									'param_name' => 'letter_spacing',
									'value'      => '1'
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Text transform','samatex'),
									'group'      => 'Top level',
									'param_name' => 'text_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),
		    		
						/* submenu
						---------------*/

							/* styling
							---------------*/

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color',
									'value'      => '#bdbdbd',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu color hover','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_color_hover',
									'value'      => '#ffffff',
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu background color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_back_color',
									'value'      => '#212121',
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu shadow','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_shadow',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu indicator','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_submenu_indicator',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Text align','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'sub_text_align',
									'value'      => $align_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu items separator','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_separator',
									'value'      => $logic_values
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu appear effect','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_appear',
									'value'      => array(
										esc_html__('Appear','samatex')    => 'none',
										esc_html__('Fade','samatex')      => 'fade',
										esc_html__('Move','samatex')      => 'move',
									),
								),

								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu hover effect','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_hover',
									'value'      => array(
										esc_html__('None','samatex')      => 'none',
										esc_html__('Underline','samatex') => 'line',
										esc_html__('Dot','samatex')       => 'dot',
										esc_html__('Outline','samatex')   => 'outline',
										esc_html__('Box','samatex')       => 'box',
										esc_html__('Fill','samatex')      => 'fill',
									),
								),

								array(
									'type'       => 'colorpicker',
									'heading'    => esc_html__('Submenu hover effect color','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'submenu_effect_color',
									'value'      => '',
									'dependency' => Array('element' => 'submenu_hover', 'value' => array('line','dot','outline','box','fill'))
								),

							/* typography
							---------------*/

								array(
									'param_name'=>'subfont_family',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font family', 'samatex'),
									'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
									'value'     => $google_fonts_family,
								),
								array(
									'param_name'=>'subfont_weight',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font weight', 'samatex'),
									'value'     => $font_weight_values
								),
								array(
									'param_name'=>'subfont_subsets',
									'type'      => 'dropdown',
									'group'     => esc_html__('Submenu','samatex'), 
									'heading'   => esc_html__('Submenu font subsets', 'samatex'),
									'value'      => array(
										'latin' => 'latin',
									)
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Submenu font size (without any string)','samatex'),
									'group'      => esc_html__('Submenu','samatex'),
									'param_name' => 'subfont_size',
									'value'      => '',
								),
								array(
									'type'       => 'textfield',
									'heading'    => esc_html__('Submenu line height (without any string)','samatex'),
									'group'      => esc_html__('Submenu','samatex'),
									'param_name' => 'subline_height',
									'value'      => '',
								),
								array(
									'type'       => 'textfield',
									'group'      => esc_html__('Submenu','samatex'),
									'heading'    => esc_html__('Submenu letter spacing (without any string)','samatex'),
									'param_name' => 'subletter_spacing',
									'value'      => ''
								),
								array(
									'type'       => 'dropdown',
									'heading'    => esc_html__('Submenu text transform','samatex'),
									'group'      => 'Submenu',
									'param_name' => 'subtext_transform',
									'value'      => array(
										esc_html__('None','samatex')       => 'none',
										esc_html__('Uppercase','samatex')  => 'uppercase',
										esc_html__('Lowercase','samatex')  => 'lowercase',
										esc_html__('Capitalize','samatex') => 'capitalize',
									)
								),

						/* padding
						---------------*/

							array(
								'type'       => 'padding',
								'group'      => esc_html__('Padding','samatex'),
								'heading'    => esc_html__('Padding','samatex'),
								'param_name' => 'padding',
								'value'      => ''
							),

						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'subelement_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));

		/* TITLE SECTION
		---------------*/

			/* et_title_section_title
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Page title','samatex'),
		    		'description'             => esc_html__('Use only with title section','samatex'),
		    		'category'                => esc_html__('Title section','samatex'),
		    		'base'                    => 'et_title_section_title',
		    		'class'                   => 'et_title_section_title font',
		    		'icon'                    => 'et_title_section_title',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-title-section-title.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-title-section-title.js',
		    		'params'                  => array(
		    			array(
							'type'       => 'textfield',
							"class"      => "element-attr-hide",
							'heading'    => esc_html__('Etp title','samatex'),
							'param_name' => 'etp_title',
							'value'      => '',
						),
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'value'     => $align_values
						),
						array(
							'param_name'=>'text_align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Text align', 'samatex'), 
							'value'     => $align_values
						),
						array(
							'param_name'=>'type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Tag', 'samatex'), 
							'value'     => array(
								'H1'  => 'h1', 
								'H2'  => 'h2', 
								'H3'  => 'h3', 
								'H4'  => 'h4', 
								'H5'  => 'h5', 
								'H6'  => 'h6', 
								'p'   => 'p', 
								'div' => 'div', 
							),
							'std' => 'h1'
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Text color','samatex'),
							'param_name' => 'text_color',
							'value'      => '#212121',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Background color','samatex'),
							'param_name' => 'background_color',
							'value'      => '',
						),

						array(
							'param_name'=>'font_family',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font family', 'samatex'),
							'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
							'value'     => $google_fonts_family,
						),
						array(
							'param_name'=>'font_weight',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font weight', 'samatex'),
							'value'     => $font_weight_values,
						),
						array(
							'param_name'=>'font_subsets',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font subsets', 'samatex'),
							'value'      => array(
								'latin' => 'latin',
							)
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Font size (without any string)','samatex'),
							'param_name' => 'font_size',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
							'param_name' => 'letter_spacing',
							'value'      => ''
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Line height (without any string)','samatex'),
							'param_name' => 'line_height',
							'value'      => ''
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Text transform','samatex'),
							'param_name' => 'text_transform',
							'value'      => array(
								esc_html__('None','samatex')       => 'none',
								esc_html__('Uppercase','samatex')  => 'uppercase',
								esc_html__('Lowercase','samatex')  => 'lowercase',
								esc_html__('Capitalize','samatex') => 'capitalize',
							)
						),

						/* tablet
						---------------*/

							array(
								'param_name'=>'tablet_align',
								'type'      => 'dropdown',
								'group'      => esc_html__('Tablet','samatex'),
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => $align_values
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Tablet landscape font size (without any string)','samatex'),
								'group'      => esc_html__('Tablet','samatex'),
								'param_name' => 'tablet_landscape_font_size',
								'value'      => $font_size_values,
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Tablet landscape line height (without any string)','samatex'),
								'group'      => esc_html__('Tablet','samatex'),
								'param_name' => 'tablet_landscape_line_height',
								'value'      => $line_height_values,
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Tablet portrait font size (without any string)','samatex'),
								'group'      => esc_html__('Tablet','samatex'),
								'param_name' => 'tablet_portrait_font_size',
								'value'      => $font_size_values,
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Tablet portrait line height (without any string)','samatex'),
								'group'      => esc_html__('Tablet','samatex'),
								'param_name' => 'tablet_portrait_line_height',
								'value'      => $line_height_values,
							),

						/* mobile
						---------------*/

							array(
								'param_name'=>'mobile_align',
								'type'      => 'dropdown',
								'group'      => esc_html__('Mobile','samatex'),
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => $align_values
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Font size (without any string)','samatex'),
								'group'      => esc_html__('Mobile','samatex'),
								'param_name' => 'mobile_font_size',
								'value'      => $font_size_values,
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Line height (without any string)','samatex'),
								'group'      => esc_html__('Mobile','samatex'),
								'param_name' => 'mobile_line_height',
								'value'      => $line_height_values,
							),
		    		
						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));

			/* et_title_section_subtitle
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Page subtitle','samatex'),
		    		'description'             => esc_html__('Use only with title section','samatex'),
		    		'category'                => esc_html__('Title section','samatex'),
		    		'base'                    => 'et_title_section_subtitle',
		    		'class'                   => 'et_title_section_subtitle font',
		    		'icon'                    => 'et_title_section_subtitle',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-title-section-subtitle.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-title-section-subtitle.js',
		    		'params'                  => array(
		    			array(
							'type'       => 'textfield',
							"class"      => "element-attr-hide",
							'heading'    => esc_html__('Etp title','samatex'),
							'param_name' => 'etp_subtitle',
							'value'      => '',
						),
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'value'     => $align_values
						),
						array(
							'param_name'=>'text_align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Text align', 'samatex'), 
							'value'     => $align_values
						),
						array(
							'param_name'=>'type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Tag', 'samatex'), 
							'value'     => array(
								'H1'  => 'h1', 
								'H2'  => 'h2', 
								'H3'  => 'h3', 
								'H4'  => 'h4', 
								'H5'  => 'h5', 
								'H6'  => 'h6', 
								'p'   => 'p', 
								'div' => 'div', 
							),
							'std' => 'p'
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Text color','samatex'),
							'param_name' => 'text_color',
							'value'      => '#212121',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Background color','samatex'),
							'param_name' => 'background_color',
							'value'      => '',
						),

						array(
							'param_name'=>'font_family',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font family', 'samatex'),
							'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
							'value'     => $google_fonts_family,
						),
						array(
							'param_name'=>'font_weight',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font weight', 'samatex'),
							'value'     => $font_weight_values
						),
						array(
							'param_name'=>'font_subsets',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font subsets', 'samatex'),
							'value'      => array(
								'latin' => 'latin',
							)
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Font size (without any string)','samatex'),
							'param_name' => 'font_size',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
							'param_name' => 'letter_spacing',
							'value'      => ''
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Line height (without any string)','samatex'),
							'param_name' => 'line_height',
							'value'      => ''
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Text transform','samatex'),
							'param_name' => 'text_transform',
							'value'      => array(
								esc_html__('None','samatex')       => 'none',
								esc_html__('Uppercase','samatex')  => 'uppercase',
								esc_html__('Lowercase','samatex')  => 'lowercase',
								esc_html__('Capitalize','samatex') => 'capitalize',
							)
						),

						/* tablet
						---------------*/

							array(
								'param_name'=>'tablet_align',
								'type'      => 'dropdown',
								'group'      => esc_html__('Tablet','samatex'),
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => $align_values
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Tablet landscape font size (without any string)','samatex'),
								'group'      => esc_html__('Tablet','samatex'),
								'param_name' => 'tablet_landscape_font_size',
								'value'      => $font_size_values,
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Tablet landscape line height (without any string)','samatex'),
								'group'      => esc_html__('Tablet','samatex'),
								'param_name' => 'tablet_landscape_line_height',
								'value'      => $line_height_values,
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Tablet portrait font size (without any string)','samatex'),
								'group'      => esc_html__('Tablet','samatex'),
								'param_name' => 'tablet_portrait_font_size',
								'value'      => $font_size_values,
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Tablet portrait line height (without any string)','samatex'),
								'group'      => esc_html__('Tablet','samatex'),
								'param_name' => 'tablet_portrait_line_height',
								'value'      => $line_height_values,
							),

						/* mobile
						---------------*/

							array(
								'param_name'=>'mobile_align',
								'type'      => 'dropdown',
								'group'      => esc_html__('Mobile','samatex'),
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => $align_values
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Font size (without any string)','samatex'),
								'group'      => esc_html__('Mobile','samatex'),
								'param_name' => 'mobile_font_size',
								'value'      => $font_size_values,
							),

							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Line height (without any string)','samatex'),
								'group'      => esc_html__('Mobile','samatex'),
								'param_name' => 'mobile_line_height',
								'value'      => $line_height_values,
							),
		    		
						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));
			
			/* et_breadcrumbs
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Breadcrumbs','samatex'),
		    		'description'             => esc_html__('Use only with title section','samatex'),
		    		'category'                => esc_html__('Title section','samatex'),
		    		'base'                    => 'et_breadcrumbs',
		    		'class'                   => 'et_breadcrumbs font',
		    		'icon'                    => 'et_breadcrumbs',
		    		'show_settings_on_create' => true,
		    		'admin_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-breadcrumbs.js',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/et-breadcrumbs.js',
		    		'params'                  => array(
		    			array(
							'type'       => 'textfield',
							"class"      => "element-attr-hide",
							'heading'    => esc_html__('Etp breadcrumbs','samatex'),
							'param_name' => 'etp_breadcrumbs',
							'value'      => '',
						),
						array(
							'param_name'=>'align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Align', 'samatex'), 
							'value'     => $align_values
						),
						array(
							'param_name'=>'text_align',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Text align', 'samatex'), 
							'value'     => $align_values
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Extra class','samatex'),
							'param_name' => 'extra_class',
							'value'      => '',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Text color','samatex'),
							'param_name' => 'text_color',
							'value'      => '#616161',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Separator color','samatex'),
							'param_name' => 'separator_color',
							'value'      => '#616161',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Background color','samatex'),
							'param_name' => 'background_color',
							'value'      => '',
						),

						array(
							'param_name'=>'font_family',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font family', 'samatex'),
							'description' => esc_html__('800+ google fonts included. For preview click', 'samatex').' <a href="//fonts.google.com/" target="_blank">'.esc_html__('here', 'samatex').'</a>',
							'value'     => $google_fonts_family,
						),
						array(
							'param_name'=>'font_weight',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font weight', 'samatex'),
							'value'     => $font_weight_values
						),
						array(
							'param_name'=>'font_subsets',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Font subsets', 'samatex'),
							'value'      => array(
								'latin' => 'latin',
							)
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Font size (without any string)','samatex'),
							'param_name' => 'font_size',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Letter spacing (without any string)','samatex'),
							'param_name' => 'letter_spacing',
							'value'      => ''
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Line height (without any string)','samatex'),
							'param_name' => 'line_height',
							'value'      => ''
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Text transform','samatex'),
							'param_name' => 'text_transform',
							'value'      => array(
								esc_html__('None','samatex')       => 'none',
								esc_html__('Uppercase','samatex')  => 'uppercase',
								esc_html__('Lowercase','samatex')  => 'lowercase',
								esc_html__('Capitalize','samatex') => 'capitalize',
							)
						),

						/* tablet
						---------------*/

							array(
								'param_name'=>'tablet_align',
								'type'      => 'dropdown',
								'group'      => esc_html__('Tablet','samatex'),
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => $align_values
							),
							

						/* mobile
						---------------*/

							array(
								'param_name'=>'mobile_align',
								'type'      => 'dropdown',
								'group'      => esc_html__('Mobile','samatex'),
								'heading'   => esc_html__('Align', 'samatex'), 
								'value'     => $align_values
							),

		    		
						/* element_css
						---------------*/

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element id','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_id',
								'value'      => '',
							),

							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Element font','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_font',
								'value'      => '',
							),

							array(
								'type'       => 'textarea',
								'heading'    => esc_html__('Element css','samatex'),
								"class"      => "element-attr-hide",
								'param_name' => 'element_css',
								'value'      => '',
							),
		    		)
		    	));
		
		/* WIDGETS
		---------------*/

			/* widget_contact_form
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Fast contact form','samatex'),
		    		'description'             => esc_html__('Use to add AJAX contact form','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_contact_form',
		    		'class'                   => 'widget_contact_form',
		    		'icon'                    => 'widget_contact_form',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Submit button text','samatex'),
							'param_name' => 'submit_text',
							'value'      => 'Send',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Recipient','samatex'),
							'param_name' => 'recipient',
							'value'      => get_option('admin_email'),
						),
		    		)
		    	));

		    /* widget_facebook
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Facebook like box','samatex'),
		    		'description'             => esc_html__('Add facebook likebox','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_facebook',
		    		'class'                   => 'widget_facebook',
		    		'icon'                    => 'widget_facebook',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('App ID from the app dashboard','samatex'),
							'param_name' => 'app_id',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('The URL of the Facebook Page','samatex'),
							'param_name' => 'href',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Replace en_US with your locale, e.g., ru_RU for Russian (Russia)','samatex'),
							'description' => esc_html__('You can change the language of the Page plugin by loading a localized version of the Facebook JavaScript SDK.','samatex'),
							'param_name' => 'language_code',
							'value'      => 'en_US',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('The pixel width of the plugin. Min. is 180 & Max. is 500','samatex'),
							'param_name' => 'width',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('The pixel height of the plugin. Min. is 70','samatex'),
							'param_name' => 'height',
							'value'      => '',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show timeline','samatex'),
							'param_name' => 'timeline',
							'value'      => 'true',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show events','samatex'),
							'param_name' => 'events',
							'value'      => 'true',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show messages','samatex'),
							'param_name' => 'messages',
							'value'      => 'true',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Hide cover photo in the header','samatex'),
							'param_name' => 'hide_cover',
							'value'      => 'false',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show profile photos when friends like this','samatex'),
							'param_name' => 'show_facepile',
							'value'      => 'false',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Use the small header instead','samatex'),
							'param_name' => 'small_header',
							'value'      => 'false',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Try to fit inside the container width','samatex'),
							'param_name' => 'adapt_container_width',
							'value'      => 'true',
						),
						
		    		)
		    	));
	
		    /* widget_flickr
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Flickr images','samatex'),
		    		'description'             => esc_html__('Use to add images from flickr','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_flickr',
		    		'class'                   => 'widget_flickr',
		    		'icon'                    => 'widget_flickr',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/widget-flickr.js',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Number of photos to show','samatex'),
							'param_name' => 'photos_number',
							'value'      => '6',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Flickr id','samatex'),
							'description'=> esc_html__('For more infomration go:','samatex').' '.'<a target="_blank" href="http://idgettr.com/">'.esc_html__( 'here', 'samatex' ).'</a>',
							'param_name' => 'flickr_id',
							'value'      => '',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Image size','samatex'),
							'param_name' => 'image_size',
							'value'      => array(
								esc_html__('Small','samatex')      => 'square',
								esc_html__('Thumbnails','samatex') => 'thumb',
								esc_html__('Medium','samatex')     => 'mid',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Display','samatex'),
							'param_name' => 'image_size',
							'value'      => array(
								esc_html__('Latest','samatex') => 'latest',
								esc_html__('Random','samatex') => 'random',
							),
						),
						array(
							'param_name'=>'columns_mob',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Columns mobile', 'samatex'), 
							'value'     => array(
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6',
								'7'  => '7',
								'8'  => '8',
								'9'  => '9',
								'10'  => '10'
							)
						),
						array(
							'param_name'=>'columns_tablet',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Columns tablet', 'samatex'), 
							'value'     => array(
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6',
								'7'  => '7',
								'8'  => '8',
								'9'  => '9',
								'10'  => '10'
							)
						),
						array(
							'param_name'=>'columns_desk',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Columns desktop', 'samatex'), 
							'value'     => array(
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6',
								'7'  => '7',
								'8'  => '8',
								'9'  => '9',
								'10'  => '10'
							)
						),
		    		)

		    	));
	
		    /* widget_mailchimp
			---------------*/

 				$list_array = enovathemes_addons_mailchimp_list();

 				$list_values = array(''=>esc_html__('Choose','samatex'));

 				if ( !is_wp_error( $list_array )  && is_array($list_array)){

 					foreach ( $list_array as $list){
 						$list_values[$list['id']] = $list['name'];
 					}
 				}
			
				$list_values = array_flip($list_values);

				if (empty($list_values)) {
					array_push($list_values, esc_html__('Mailchimp did not return any list','samatex'));
				}

		    	vc_map(array(
		    		'name'                    => esc_html__('Mailchimp','samatex'),
		    		'description'             => esc_html__('Use to add AJAX mailchimp subscribe','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_mailchimp',
		    		'class'                   => 'widget_mailchimp',
		    		'icon'                    => 'widget_mailchimp',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__('Description','samatex'),
							'param_name' => 'description',
							'value'      => '',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('List','samatex'),
							'description'=> esc_html__('Make sure you have the Mailchimp API key and at least one list in your Mailchimp dashboard. Go to theme options >> general >> Mailchimp API key','samatex'),
							'param_name' => 'list',
							'value'      => $list_values,
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show First Name field','samatex'),
							'param_name' => 'first_name',
							'value'      => 'false',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Required?','samatex'),
							'param_name' => 'required_first_name',
							'value'      => 'false',
							'dependency' => Array('element' => 'first_name', 'value' => 'true')
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show Last Name field','samatex'),
							'param_name' => 'last_name',
							'value'      => 'false',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Required?','samatex'),
							'param_name' => 'required_last_name',
							'value'      => 'false',
							'dependency' => Array('element' => 'last_name', 'value' => 'true')
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show phone field','samatex'),
							'param_name' => 'phone',
							'value'      => 'false',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Required?','samatex'),
							'param_name' => 'required_phone',
							'value'      => 'false',
							'dependency' => Array('element' => 'phone', 'value' => 'true')
						),
		    		)
		    	));

			/* widget_posts
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Recent posts','samatex'),
		    		'description'             => esc_html__('Use to add recent posts with image','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_posts',
		    		'class'                   => 'widget_posts',
		    		'icon'                    => 'widget_posts',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/widget-posts.js',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Number of posts','samatex'),
							'param_name' => 'number',
							'value'      => '',
						)
		    		)
		    	));

		    /* widget_login
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Login form','samatex'),
		    		'description'             => esc_html__('Use to add front-end login form','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_login',
		    		'class'                   => 'widget_login',
		    		'icon'                    => 'widget_login',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Registration page link','samatex'),
							'param_name' => 'registration_link',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Password recovery page','samatex'),
							'param_name' => 'forgot_link',
							'value'      => '',
						)
		    		)
		    	));
		
			/* widget_product_categories
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Product categories','samatex'),
		    		'description'             => esc_html__('Woocommerce','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_product_categories',
		    		'class'                   => 'widget_product_categories',
		    		'icon'                    => 'widget_product_categories',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/widget-product-categories.js',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Order by','samatex'),
							'param_name' => 'orderby',
							'value'      => array(
								esc_html__('Category order','samatex') => 'order',
								esc_html__('Name','samatex') => 'name',
							),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show as dropdown','samatex'),
							'param_name' => 'dropdown',
							'value'      => '1',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show product counts','samatex'),
							'param_name' => 'count',
							'value'      => '1',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show hierarchy','samatex'),
							'param_name' => 'hierarchical',
							'value'      => '1',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Only show children of the current category','samatex'),
							'param_name' => 'show_children_only',
							'value'      => '1',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Hide empty categories','samatex'),
							'param_name' => 'hide_empty',
							'value'      => '1',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Maximum depth','samatex'),
							'param_name' => 'max_depth',
							'value'      => '',
						),
		    		)

		    	));

		    /* widget_products_by_rating
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Product by rating','samatex'),
		    		'description'             => esc_html__('Woocommerce','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_products_by_rating',
		    		'class'                   => 'widget_products_by_rating',
		    		'icon'                    => 'widget_products_by_rating',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/widget-products-by-rating.js',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Number of products to show','samatex'),
							'param_name' => 'number',
							'value'      => '',
						),
		    		)

		    	));

		    /* widget_products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Products','samatex'),
		    		'description'             => esc_html__('Woocommerce','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_products',
		    		'class'                   => 'widget_products',
		    		'icon'                    => 'widget_products',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/widget-products.js',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Number of products to show','samatex'),
							'param_name' => 'number',
							'value'      => '',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Show','samatex'),
							'param_name' => 'show',
							'value'      => array(
								esc_html__('All products','samatex') => '',
								esc_html__('Featured','samatex') => 'featured',
								esc_html__('On-sale products','samatex') => 'onsale',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Order by','samatex'),
							'param_name' => 'orderby',
							'value'      => array(
								esc_html__('Date','samatex') => 'date',
								esc_html__('Price','samatex') => 'price',
								esc_html__('Random','samatex') => 'random',
								esc_html__('Sales','samatex') => 'sales',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Order','samatex'),
							'param_name' => 'order',
							'value'      => array(
								esc_html__('ASC','samatex') => 'asc',
								esc_html__('DESC','samatex') => 'desc',
							),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Hide free products','samatex'),
							'param_name' => 'hide_free',
							'value'      => '1',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__('Show hidden products','samatex'),
							'param_name' => 'show_hidden',
							'value'      => '1',
						),
		    		)

		    	));

		    /* widget_recent_product_reviews
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Recent product reviews','samatex'),
		    		'description'             => esc_html__('Woocommerce','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_recent_product_reviews',
		    		'class'                   => 'widget_recent_product_reviews',
		    		'icon'                    => 'widget_recent_product_reviews',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/widget-products-reviews.js',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Number of products to show','samatex'),
							'param_name' => 'number',
							'value'      => '',
						),
		    		)

		    	));

		    /* widget_recent_viewed_products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Recent viewed products','samatex'),
		    		'description'             => esc_html__('Woocommerce','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_recent_viewed_products',
		    		'class'                   => 'widget_recent_viewed_products',
		    		'icon'                    => 'widget_recent_viewed_products',
		    		'front_enqueue_js'        => SAMATEX_ENOVATHEMES_TEMPPATH .'/js/vc_elements/widget-products-viewed.js',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Number of products to show','samatex'),
							'param_name' => 'number',
							'value'      => '',
						),
		    		)

		    	));

		    /* widget_product_tag_cloud
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Product tag cloud','samatex'),
		    		'description'             => esc_html__('Woocommerce','samatex'),
		    		'category'                => esc_html__('WordPress Widgets','samatex'),
		    		'base'                    => 'widget_product_tag_cloud',
		    		'class'                   => 'widget_product_tag_cloud',
		    		'icon'                    => 'widget_product_tag_cloud',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title','samatex'),
							'param_name' => 'title',
							'value'      => '',
						)
		    		)

		    	));

	}

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

		class WPBakeryShortCode_et_Carousel extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Carousel_Item extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Accordion extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Accordion_Item extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Tab extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Tab_Item extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Testimonial_Container extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Client_Container extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Person_Container extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Banner extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_More_Box extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Animate_Box extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Icon_Box_Container extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Step_Box_Container extends WPBakeryShortCodesContainer {}

		class WPBakeryShortCode_et_Header_Sidebar_Container extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Header_Mobile_Container extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Header_Modal_Container extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Align_Container extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Vertical_Align_Top extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Vertical_Align_Middle extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Vertical_Align_Bottom extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Megamenu_Tab extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Megamenu_Tab_Item extends WPBakeryShortCodesContainer {}

	}
}

?>