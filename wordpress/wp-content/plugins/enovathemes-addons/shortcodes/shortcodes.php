<?php

/*  ELEMENTS
/*------------*/

	/* TYPOGRAPHY
	---------------*/

		/*	et_heading
		--------------*/

			function et_heading($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'type'              => 'h1',
						'link'              => '',
						'target'            => '_self',
						'text_align'        => 'left',
						'tablet_text_align' => 'inherit',
						'mobile_text_align' => 'inherit',
						'mobile_font_size'             => 'inherit',
						'mobile_line_height'           => 'inherit',
						'tablet_landscape_font_size'   => 'inherit',
						'tablet_landscape_line_height' => 'inherit',
						'tablet_portrait_font_size'    => 'inherit',
						'tablet_portrait_line_height'  => 'inherit',
						'extra_class'       => '',
						'element_id'        => '',
						'start_delay'       => '0',
						'animation_type'    => 'curtain-left',
						'animate'           => 'false',
						'parallax'          => 'false',
						'move'              => 'false',
						'parallax_speed'    => '10',
						'parallax_x'        => '0',
						'parallax_y'        => '0',
						'rp'                => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				if ($animate == "false") {
					$animation_type = 'no-animation-type';
				}

				$class   = array();
				$class[] = 'et-heading';
				$class[] = 'text-align-'.$text_align;
				$class[] = 'tablet-text-align-'.$tablet_text_align;
				$class[] = 'mobile-text-align-'.$mobile_text_align;
				$class[] = 'animate-'.$animate;
				$class[] = $animation_type;

				if (isset($parallax) && $parallax == "true") {
					$class[] = 'etp-parallax';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$class = array_merge($class,$responsive_parallax);
				}

				if ($animation_type == "curtain-left" || $animation_type == "curtain-right" || $animation_type == "curtain-top" || $animation_type == "curtain-bottom") {
					$class[] .= 'curtain';
				}

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$attributes   = array();
				$attributes[] = 'data-delay="'.esc_attr(absint($start_delay)).'"';
				$attributes[] = 'data-mobile-font="'.esc_attr($mobile_font_size).'"';
				$attributes[] = 'data-mobile-line-height="'.esc_attr($mobile_line_height).'"';
				$attributes[] = 'data-tablet-landscape-font="'.esc_attr($tablet_landscape_font_size).'"';
				$attributes[] = 'data-tablet-portrait-font="'.esc_attr($tablet_portrait_font_size).'"';
				$attributes[] = 'data-tablet-landscape-line-height="'.esc_attr($tablet_landscape_line_height).'"';
				$attributes[] = 'data-tablet-portrait-line-height="'.esc_attr($tablet_portrait_line_height).'"';
				$attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
				$attributes[] = 'data-move="'.esc_attr($move).'"';
				$attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
				$attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
				$attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';

				if (isset($content) && !empty($content)) {
					$output .= '<'.$type.' class="'.implode(" ",$class).'" id="et-heading-'.$element_id.'" '.implode(" ",$attributes).'>';

						if (isset($link) && !empty($link)) {
							$output .= '<a href="'.esc_url($link).'" target="'.esc_attr($target).'">';
						}

        					$content = preg_replace("/_break_/","[et_gap]",$content);

							$output .= '<span class="text-wrapper">';
								$output .= '<span class="text">'.do_shortcode($content).'</span>';
								switch ($animation_type) {
									case 'curtain-left':
									case 'curtain-right':
									case 'curtain-top':
									case 'curtain-bottom':
										$output .= '<span class="curtain"></span>';
										break;
									case 'line-appear':
										$output .= '<span class="line"></span>';
										break;
								}
							$output .= '</span>';

						if (isset($link) && !empty($link)) {
							$output .= '</a>';
						}

					$output .= '</'.$type.'>';
				}

				$id_counter++;

				return $output;
			}

			add_shortcode('et_heading', 'et_heading');

		/*  et_typeit
		/*------------*/

			function et_typeit( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'type'              => 'h1',
					'tablet_text_align' => 'left',
					'mobile_text_align' => 'left',
					'mobile_font_size'             => 'inherit',
					'mobile_line_height'           => 'inherit',
					'tablet_landscape_font_size'   => 'inherit',
					'tablet_landscape_line_height' => 'inherit',
					'tablet_portrait_font_size'    => 'inherit',
					'tablet_portrait_line_height'  => 'inherit',
					'text_align'        => 'left',
					'extra_class'       => '',
					'element_id'        => '',
					'start_delay'       => '0',
					'autostart'         => 'false',
					'onlyfirst'         => '',
					'string_1'		    => '',
					'string_2'		    => '',
					'string_3'		    => '',
					'string_4'		    => '',
					'string_5'		    => '',
				), $atts));

				static $id_counter = 1;

				$output      = '';

				$string_array = [];

				if (isset($string_2) && !empty($string_2)) {	
			    	array_push($string_array, $string_2);
				}

				if (isset($string_3) && !empty($string_3)) {	
			    	array_push($string_array, $string_3);
				}

				if (isset($string_4) && !empty($string_4)) {	
			    	array_push($string_array, $string_4);
				}

				if (isset($string_5) && !empty($string_5)) {	
			    	array_push($string_array, $string_5);
				}

				$class   = array();
				$class[] = 'et-typeit';
				$class[] = 'text-align-'.$text_align;
				$class[] = 'tablet-text-align-'.$tablet_text_align;
				$class[] = 'mobile-text-align-'.$mobile_text_align;
				$class[] = 'autostart-'.$autostart;

				if ($onlyfirst == "true") {
					$class[] = 'onlyfirst';
				}

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if ($onlyfirst == "true") {
					$string_array = array($string_1);
				}

				$attributes   = array();
				$attributes[] = 'data-delay="'.esc_attr(absint($start_delay)).'"';
				$attributes[] = 'data-mobile-font="'.esc_attr($mobile_font_size).'"';
				$attributes[] = 'data-mobile-line-height="'.esc_attr($mobile_line_height).'"';
				$attributes[] = 'data-tablet-landscape-font="'.esc_attr($tablet_landscape_font_size).'"';
				$attributes[] = 'data-tablet-portrait-font="'.esc_attr($tablet_portrait_font_size).'"';
				$attributes[] = 'data-tablet-landscape-line-height="'.esc_attr($tablet_landscape_line_height).'"';
				$attributes[] = 'data-tablet-portrait-line-height="'.esc_attr($tablet_portrait_line_height).'"';
				$attributes[] = 'data-strings="'.implode(',',$string_array).'"';

				if (is_array($string_array) && !empty($string_array)) {	
					$output .= '<'.$type.' class="'.implode(" ",$class).'" id="et-typeit-'.$element_id.'" '.implode(" ",$attributes).'>';
				    	$output .= '<span class="text-wrapper">';
				    		if ($onlyfirst != "true") {
					    		$output .= esc_attr($string_1);
					    	}
					    	$output .= '<span class="typeit-dynamic"></span>';
					    $output .= '</span>';
			    	$output .= '</'.$type.'>';
				}

				$id_counter++;

				return $output;

			}
			add_shortcode('et_typeit', 'et_typeit');

		/*	et_highlight_heading
		--------------*/

			function et_highlight_heading($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'title'             => '',
						'type'              => 'h1',
						'tablet_text_align'  => 'inherit',
						'mobile_text_align' => 'inherit',
						'mobile_font_size'             => 'inherit',
						'mobile_line_height'           => 'inherit',
						'tablet_landscape_font_size'   => 'inherit',
						'tablet_landscape_line_height' => 'inherit',
						'tablet_portrait_font_size'    => 'inherit',
						'tablet_portrait_line_height'  => 'inherit',
						'text_align'        => 'left',
						'extra_class'       => '',
						'element_id'        => '',
						'parallax'          => 'false',
						'move'              => 'false',
						'parallax_speed'    => '10',
						'parallax_x'        => '0',
						'parallax_y'        => '0',
						'rp'                => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				$class   = array();
				$class[] = 'et-highlight-heading';
				$class[] = 'text-align-'.$text_align;
				$class[] = 'tablet-text-align-'.$tablet_text_align;
				$class[] = 'mobile-text-align-'.$mobile_text_align;

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				if (isset($parallax) && $parallax == "true") {
					$class[] = 'etp-parallax';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$class = array_merge($class,$responsive_parallax);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$attributes   = array();
				$attributes[] = 'data-mobile-font="'.esc_attr($mobile_font_size).'"';
				$attributes[] = 'data-mobile-line-height="'.esc_attr($mobile_line_height).'"';
				$attributes[] = 'data-tablet-landscape-font="'.esc_attr($tablet_landscape_font_size).'"';
				$attributes[] = 'data-tablet-portrait-font="'.esc_attr($tablet_portrait_font_size).'"';
				$attributes[] = 'data-tablet-landscape-line-height="'.esc_attr($tablet_landscape_line_height).'"';
				$attributes[] = 'data-tablet-portrait-line-height="'.esc_attr($tablet_portrait_line_height).'"';
				$attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
				$attributes[] = 'data-move="'.esc_attr($move).'"';
				$attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
				$attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
				$attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';

				if (isset($title) && !empty($title)) {
					$output .= '<'.$type.' class="'.implode(" ",$class).'" id="et-highlight-heading-'.$element_id.'" '.implode(" ",$attributes).'>';
						$output .= '<span class="text-wrapper">';
							$output .= '<span class="text">'.esc_html($title).'</span>';
						$output .= '</span>';
					$output .= '</'.$type.'>';
				}

				$id_counter++;

				return $output;
			}

			add_shortcode('et_highlight_heading', 'et_highlight_heading');

		/*	et_font_size
		--------------*/

			function et_font_size( $atts, $content = null ) {

				extract(shortcode_atts(
					array(
						'font_size'   => '',
						'line_height' => ''
					), $atts)
				);

				if (isset($font_size) && !empty($font_size)) {
					$font_size = 'data-fontsize="'.esc_attr($font_size).'"';
				}

				if (isset($line_height) && !empty($line_height)) {
					$line_height = 'data-lineheight="'.esc_attr($line_height).'"';
				}

				$output = '<span class="et-font-size" '.$font_size.' '.$line_height.'>'.do_shortcode($content).'</span>';

				return $output;  		
			}

			add_shortcode('et_font_size', 'et_font_size');

		/*  et_dropcap
		--------------*/

			function et_dropcap( $atts, $content = null ) {

				extract(shortcode_atts(
					array(
						'type' => 'empty',
					), $atts)
				);

				static $id_counter = 1;
					
				$output = '<span id="et-dropcap-'.$id_counter.'" class="et-dropcap '.esc_attr($type).'">'.do_shortcode($content).'</span>';

				$id_counter++;

				return $output;  		
			}

			add_shortcode('et_dropcap', 'et_dropcap');

		/*	et_highlight
		--------------*/

			function et_highlight( $atts, $content = null ) {

				extract(shortcode_atts(
					array(
						'direction'       => 'left',
						'message_color'   => '',
						'message_width'   => '320',
						'message'         => '',
					), $atts)
				);

				static $id_counter = 1;

				$attributes   = array();

				if (!empty($message)) {
					$attributes[] = 'data-direction="'.esc_attr($direction).'"';
					$attributes[] = 'data-width="'.esc_attr($message_width).'"';
					$attributes[] = 'data-tipso="'.strip_tags($message).'"';
					$attributes[] = 'data-message-color="'.esc_attr($message_color).'"';
				}

				$output = '<mark id="et-highlight-'.$id_counter.'" class="et-highlight" '.implode(" ",$attributes).'>'.do_shortcode($content).'</mark>';

				$id_counter++;

				return $output; 		
			}

			add_shortcode('et_highlight', 'et_highlight');

		/*	et_blockquote
		--------------*/

			function et_blockquote($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'text'        => '',
						'author'      => '',
						'title'       => '',
						'extra_class' => '',
						'element_id'  => '',
						'element_font' => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				$class   = array();
				$class[] = 'et-blockquote';

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if (isset($text) && !empty($text)) {
					$output .= '<div class="'.implode(" ",$class).'" id="et-blockquote-'.$element_id.'">';
						$output .= '<div class="author-wrapper et-clearfix">';
							$output .= '<blockquote>'.do_shortcode($text).'</blockquote>';
							$output .= '<div class="author-info-wrapper et-clearfix">';
							if (isset($author) && !empty($author)) {
								$output .= '<h5 class="author">'.esc_html($author).'</h5>';
							}
							if (isset($title) && !empty($title)) {
								$output .= '<span class="title">'.esc_html($title).'</span>';
							}
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}
				$id_counter++;

				return $output;
			}

			add_shortcode('et_blockquote', 'et_blockquote');

	/* UI
	---------------*/

		/*	et_menu
		--------------*/

			function et_menu($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'menu'            		=> '',
						'align'                 => 'none',
						'menu_hover'            => 'none',
						'submenu_appear_from'   => 'bottom',
						'submenu_appear'        => 'none',
						'submenu_shadow'        => 'false',
						'submenu_hover'         => 'none',
						'submenu_indicator'     => 'false',
						'submenu_separator'     => 'false',
						'submenu_submenu_indicator' => 'false',
						'extra_class'     		=> '',
						'element_id'            => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'et-menu-container';
				$class[] = 'menu-align-'.$align;
				$class[] = 'menu-hover-'.$menu_hover;
				$class[] = 'submenu-appear-from-'.$submenu_appear_from;
				$class[] = 'submenu-appear-'.$submenu_appear;
				$class[] = 'submenu-hover-'.$submenu_hover;
				$class[] = 'submenu-shadow-'.$submenu_shadow;
				$class[] = 'tl-submenu-ind-'.$submenu_indicator;
				$class[] = 'sl-submenu-ind-'.$submenu_submenu_indicator;
				$class[] = 'separator-'.$submenu_separator;

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$menu_arg = array( 
					'menu'  => $menu, 
					'menu_class'      => 'et-menu et-menu-inner et-clearfix', 
					'menu_id'         => 'et-menu-'.$element_id,
					'container'       => 'nav', 
					'container_class' => implode(" ", $class), 
					'container_id'    => 'et-menu-container-'.$element_id, 
					'echo'            => false,
					'link_before'     => '<span class="txt">',
					'link_after'      => '</span><span class="arrow-down"></span>',
					'depth'           => 4,
					'walker'          => new et_scm_walker
				);

				$output .= wp_nav_menu($menu_arg);

				$id_counter++;

				return $output;
			}

			add_shortcode('et_menu', 'et_menu');

		/*	et_button
		--------------*/

			function et_button($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'button_text' 		=> '',
						'button_link' 		=> '',
						'target'            => '_self',
						'button_link_modal' => 'false',
						'button_size' 		=> 'medium',
						'button_shadow' 	=> 'false',
						'button_border_radius' 	=> '',
						'icon_prefix' 		=> '',
						'icon_name' 		=> '',
						'icon_position'     => 'left',
						'animate_hover' 	=> 'none',
						'animate_click' 	=> 'none',
						'click_smooth' 	    => 'false',
						'extra_class'       => '',
						'animation'         => 'none',
						'animation_delay'   => '',
						'element_id'        => '',
						'parallax'          => 'false',
						'move'              => 'false',
						'parallax_speed'    => '10',
						'parallax_x'        => '0',
						'parallax_y'        => '0',
						'rp'                => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				

				$class   = array();
				$class[] = 'et-button';
				$class[] = 'icon-position-'.esc_attr($icon_position);
				$class[] = 'modal-'.esc_attr($button_link_modal);
				$class[] = esc_attr($button_size);
				$class[] = 'hover-'.esc_attr($animate_hover);
				$class[] = 'click-'.esc_attr($animate_click);

				if ($animation == "none") {
					$animation = "no-animation";
				} else {
					$class[] = 'wpb_animate_when_almost_visible';
					$class[] = esc_attr($animation);
				}


				if ($button_link_modal == "true") {
					$target = "_self";
				}

				if (isset($icon_name) && !empty($icon_name)) {
					$class[] = 'has-icon';
				}

				if (isset($click_smooth) && $click_smooth == "true") {
					$class[] = 'click-smooth';
				}

				if (isset($button_border_radius) && !empty($button_border_radius) && $button_border_radius >= 16) {
		            $class[] = 'border-radius-large';
		        }

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				if (isset($parallax) && $parallax == "true") {
					$class[] = 'etp-parallax';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$class = array_merge($class,$responsive_parallax);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$attributes   = array();
				$attributes[] = 'target="'.esc_attr($target).'"';
				$attributes[] = 'href="'.esc_url($button_link).'"';
				$attributes[] = 'data-animation-delay="'.esc_attr($animation_delay).'"';
				$attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
				$attributes[] = 'data-move="'.esc_attr($move).'"';
				$attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
				$attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
				$attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';

				if (isset($button_text) && !empty($button_text) && isset($button_link) && !empty($button_link)) {
					$output .='<a id="et-button-'.$element_id.'" class="'.implode(" ",$class).'" '.implode(" ",$attributes).'>';
						$output .='<span class="hover"></span>';
						$output .='<span class="regular"></span>';
						if ($animate_hover == "glint") {$output .='<span class="glint"></span>';}
						if ($animate_click == "material") {$output .='<span class="et-ink"></span>';}

						if (!isset($icon_prefix) || empty($icon_prefix)) {
							$icon_prefix = 'fa';
						}
						if ($icon_position == "left") {
							if (isset($icon_name) && !empty($icon_name)) {
								$output .='<span class="icon '.$icon_prefix.' '.$icon_name.'"></span>';
							}
							$output .='<span class="text">'.esc_attr($button_text).'</span>';
						} else {
							$output .='<span class="text">'.esc_attr($button_text).'</span>';
							if (isset($icon_name) && !empty($icon_name)) {
								$output .='<span class="icon '.$icon_prefix.' '.$icon_name.'"></span>';
							}
						}
					$output .='</a>';
				}

				$id_counter++;

				return $output;
			}

			add_shortcode('et_button', 'et_button');

		/*	et_separator
		--------------*/

			function et_separator($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'type'        => 'solid',
						'align'       => 'left',
						'extra_class' => '',
						'element_id'  => '',
						'animate'     => 'false',
						'start_delay' => '',
						'width'       => '',
						'height'      => '',
						'rv'          => '',
					), $atts)
				);

				static $id_counter = 1;

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$responsive_visibility = array();

				if (!empty($rv)) {
					$rv = explode(',', $rv);

					foreach ($rv as $key) {
						$responsive_visibility[] = 'hide'.$key;
					}
					
				}

				$class[] = 'et-separator';
				$class[] = 'et-clearfix';
				$class[] = 'animate-'.$animate;
				$class[] = $type;
				$class[] = $align;

				if (isset($width) && !empty($width)) {
					if ($width > $height) {
						$class[] = 'horizontal';
					} else {
						$class[] = 'vertical';
					}
				} else {
					$class[] = 'horizontal';
				}

		        $element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$class[] = 'et-separator-'.$element_id;

				if (!empty($responsive_visibility)) {
					$class = array_merge($class,$responsive_visibility);
				}

				$output = '<div class="'.implode(" ", $class).'" data-delay="'.esc_attr($start_delay).'"><div class="line"></div></div>';
				
				$id_counter++;

				return $output;
			}
			add_shortcode('et_separator', 'et_separator');

		/*	et_icon_separator
		--------------*/

			function et_icon_separator($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'type'        => 'solid',
						'align'       => 'left',
						'extra_class' => '',
						'element_id'  => '',
						'width'       => '120',
						'height'      => '',
						'icon_prefix' => '',
						'icon_name'   => '',
						'icon_size'   => 'small',
					), $atts)
				);

				static $id_counter = 1;

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'et-icon-separator';
				$class[] = 'et-clearfix';
				$class[] = $align;

		        $element_id = (!empty($element_id)) ? $element_id : $id_counter;

		        $class[] = 'et-icon-separator-'.$element_id;

		        if (!isset($icon_prefix) || empty($icon_prefix)) {
					$icon_prefix = 'fa';
				}

				if (isset($icon_name) && !empty($icon_name)) {

					$output = '';

					$output .= '<div class="'.implode(" ", $class).'" >';
						if ($align != 'left') {
							$output .= '<span class="left line '.$icon_size.'"></span>';
						}
						$output .= '<span class="icon '.$icon_size.' '.$icon_prefix.' '.$icon_name.'"></span>';
						if ($align != 'right') {
							$output .= '<span class="right line '.$icon_size.'"></span>';
						}
					$output .= '</div>';
					
				}

				$id_counter++;

				return $output;
			}
			add_shortcode('et_icon_separator', 'et_icon_separator');

		/*	et_alert
		--------------*/

			function et_alert($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'type' => 'note'
					), $atts)
				);

				$output = '';

				$output .= '<div class="alert '.esc_attr($type).'">';
					$output .= '<div class="alert-message">'.strip_tags($content).'</div>';
				$output .= '</div>';

				return $output;
			}

			add_shortcode('et_alert', 'et_alert');

		/*	et_icon
		--------------*/
			
			function et_icon($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'icon_size'          => 'medium',
						'icon_prefix'        => '',
						'element_id'         => '',
						'icon_name'          => '',
						'icon_back_color'    => '',
						'icon_border_width'  => '0',
						'icon_border_radius' => '0',
						'extra_class'        => ''
					), $atts)
				);

				
				static $id_counter = 1;

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				if (isset($icon_border_radius) && $icon_border_radius >= 100) {
					$class[] = 'border-radius-large';
				}

				$class[] = 'et-icon';
				$class[] = $icon_size;

				if (!isset($icon_prefix) || empty($icon_prefix)) {
					$icon_prefix = 'fa';
				}
				
				if ((isset($icon_border_width) && !empty($icon_border_width)) || isset($icon_back_color) && !empty($icon_back_color)) {
					$class[] = 'full';
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$class[] = 'et-icon-'.$element_id;

				if (isset($icon_name) && !empty($icon_name)) {
					$output = '<div class="'.implode(" ", $class).'"><span class="el-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span></div>';
				}

				$id_counter++;

				return $output;
			}
			add_shortcode('et_icon', 'et_icon');

		/*	et_icon_list
		--------------*/
			
			function et_icon_list($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'icon_size'          => 'medium',
						'icon_prefix'        => '',
						'element_id'         => '',
						'icon_name'          => '',
						'icon_back_color'    => '',
						'icon_border_width'  => '0',
						'shadow'             => '',
						'extra_class'        => ''
					), $atts)
				);


				$output = "";

				static $id_counter = 1;

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'et-icon-list';
				$class[] = $icon_size;

				if (isset($shadow) && $shadow == 'true') {
					$class[] = 'shadow';
				}

				if (!isset($icon_prefix) || empty($icon_prefix)) {
					$icon_prefix = 'fa';
				}
				
				if ((isset($icon_border_width) && !empty($icon_border_width)) || isset($icon_back_color) && !empty($icon_back_color)) {
					$class[] = 'full';
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if (isset($icon_name) && !empty($icon_name)) {

					$output .= '<ul id="et-icon-list-'.$element_id.'" class="'.implode(" ", $class).'">';
						$split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);
						foreach($split as $haystack) {
				            $output .= '<li>';
				            	$output .= '<div class="icon-wrap">';
					            	$output .= '<div class="icon '.esc_attr($icon_size).'">';
				            			$output .= '<span class="'.esc_attr($icon_size).' '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
				            		$output .= '</div>';
			            		$output .= '</div>';
				            	$output .= '<div>' . do_shortcode($haystack) . '</div>';
				            $output .= '</li>';
				        }
				    $output .= '</ul>';
				}

				$id_counter++;

				return $output;
			}
			add_shortcode('et_icon_list', 'et_icon_list');

		/*	et_more_box
		--------------*/
			
			function et_more_box($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'element_id' => '',
						'width'      => '',
						'height'     => '',
						'extra_class'=> '',
						'crp'        => '',
						'position'   => 'left'
					), $atts)
				);

				
				static $id_counter = 1;

				$class = array();
				$responsive_padding = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				if (!empty($crp)) {
					$crp = explode(',', $crp);

					$query_array = array();

					foreach ($crp as $key => $value) {
						array_push($query_array, explode(':', $value));
					}

					foreach ($query_array as $key => $value) {
						if ($value[1] != "i") {
							$responsive_padding[] = 'data-'.$value[0].'-left="'.$value[1].'" ';
						}
						if ($value[2] != "i") {
							$responsive_padding[] = 'data-'.$value[0].'-right="'.$value[2].'" ';
						}
					}
				}

				$class[] = 'et-more-box';

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if (empty($width) && empty($height)) {
					$class[] = 'auto';
				}

				$class[] = 'et-more-box-'.$element_id;
				$class[] = $position;

				$output = '<div class="'.implode(" ", $class).'"><span class="et-more-box-icon"></span><div class="et-more-box-content vc_column-inner" '.implode(" ", $responsive_padding).'>'.do_shortcode($content).'</div></div>';

				$id_counter++;

				return $output;
			}
			add_shortcode('et_more_box', 'et_more_box');

		/*	et_animate_box
		--------------*/
			
			function et_animate_box($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'element_id'              => '',
						'extra_class'             => '',
						'parallax'                => 'false',
						'move'                    => 'false',
						'parallax_speed'          => '10',
						'parallax_x'              => '0',
						'parallax_y'              => '0',
						'rp'                      => '',
						'curtain'                 => 'false',
						'curtain_direction'       => 'left',
						'curtain_color'           => '',
						'curtain_animation_delay' => '0',
					), $atts)
				);
				
				$output = "";

				static $id_counter = 1;

				$class      = array();
				$attributes = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'et-animate-box';
				$class[] = 'curtain-'.$curtain_direction;

				if (isset($parallax) && $parallax == "true") {
					$class[] = 'etp-parallax';
				}

				if (isset($curtain) && $curtain == "true") {
					$class[] = 'curtain';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$class = array_merge($class,$responsive_parallax);
				}

				$attributes[] = 'data-curtain="'.esc_attr($curtain).'"';
				$attributes[] = 'data-animation-delay="'.esc_attr($curtain_animation_delay).'"';
				$attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
				$attributes[] = 'data-move="'.esc_attr($move).'"';
				$attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
				$attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
				$attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$class[] = 'et-animate-box-'.$element_id;

				$output .='<div class="'.implode(' ', $class).'" '.implode(' ', $attributes).'>';
					$output .='<div class="content">'.do_shortcode($content).'</div>';
					if ($curtain == "true") {$output .='<div class="curtain"></div>';}
				$output .='</div>';

				$id_counter++;

				return $output;
			}
			add_shortcode('et_animate_box', 'et_animate_box');

		/*	et_accordion
		--------------*/

			function et_accordion($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'collapsible' => 'false',
					), $atts)
				);

				$output = '';
				static $id_counter = 1;

				$output .= '<div class="et-accordion-wrapper">';
					$output .='<div id="et-accordion-'.$id_counter.'" class="et-accordion et-clearfix collapsible-'.esc_attr($collapsible).'">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';

				$id_counter++;

				return $output;
				
			}
			add_shortcode('et_accordion', 'et_accordion');
			
			function et_accordion_item($atts, $content = null) {

				extract(shortcode_atts(array(
					'title' 	  => '',
					'icon_prefix' => '',
					'icon_name'   => '',
					'open'  	  => 'false',
				), $atts));

				$output = '';
				static $id_counter = 1;

				$class = array();


				$class[] = 'toggle-title';
				$class[] = 'et-clearfix';

				if($open == 'true'){
					$class[] = "active";
				}

				if (isset($icon_name) && !empty($icon_name)) {
					$class[] = 'icon-true';
				}

				if (!isset($icon_prefix) || empty($icon_prefix)) {
					$icon_prefix = 'fa';
				}

				$output .= '<div class="'.implode(' ', $class).'">';
					if (isset($icon_name) && !empty($icon_name)) {
						$output .= '<span class="toggle-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
					}
					if (isset($title) && !empty($title)) {
						$output .= '<h6 class="toggle-title-tag">'.esc_attr($title).'</h6>';
					}
					$output .= '<span class="toggle-ind"></span>';
				$output .= '</div> ';
				$output .= '<div id="'.sanitize_title($title).'-'.$id_counter.'" class="toggle-content et-clearfix">';
				    $output .= do_shortcode($content);
				$output .= '</div>';

				$id_counter++;

				return $output;
			}
			add_shortcode('et_accordion_item', 'et_accordion_item');

		/*	et_tab
		--------------*/

			function et_tab($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'type'   => 'horizontal',
						'center' => 'false'
					), $atts)
				);

				$output = '';
				static $id_counter = 1;

				$class = array();

				$class[] = 'et-tab';
				$class[] = 'et-clearfix';
				$class[] = 'center-'.esc_attr($center);
				$class[] = $type;

				$output .= '<div class="et-tab-wrapper">';
					$output .='<div id="et-tab-'.$id_counter.'" class="'.implode(" ", $class).'">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';

				$id_counter++;

				return $output;
				
			}
			add_shortcode('et_tab', 'et_tab');
			
			function et_tab_item($atts, $content = null) {

				extract(shortcode_atts(array(
					'title' 	  => '',
					'icon_prefix' => '',
					'icon_name'   => '',
					'active'  	  => 'false',
				), $atts));

				$output = '';

				static $id_counter = 1;

				if($active == 'true'){
					$active = "active";
				}

				if (!isset($icon_prefix) || empty($icon_prefix)) {
					$icon_prefix = 'fa';
				}

				$output .= '<div data-target="tab-'. sanitize_title( $title ) .'" class="'.esc_attr($active).' tab et-clearfix">';
					if (isset($icon_name) && !empty($icon_name)) {
						$output .= '<span class="icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
					}
					if (isset($title) && !empty($title)) {
						$output .= '<h6 class="tab-title-tag">'.esc_attr($title).'</h6>';
					}
				$output .= '</div> ';
				$output .= '<div id="tab-'.sanitize_title($title).'-'.$id_counter.'" class="tab-content et-clearfix">';
				    $output .= do_shortcode($content);
				$output .= '</div>';

				$id_counter++;

				return $output;
			}
			add_shortcode('et_tab_item', 'et_tab_item');

	/* SOCIAL
	---------------*/

		/*	et_social_links
		--------------*/

			function et_social_links($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'extra_class'     		=> '',
						'element_id'            => '',
						'target' 				=> '_self',
						'styling_original'      => 'false',
						'shadow'                => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'et-social-links';
				$class[] = 'styling-original-'.$styling_original;

				if (isset($shadow) && !empty($shadow)) {
					$class[] = 'shadow-true';
				}


				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$output .= '<div id="et-social-links-'.$element_id.'" class="'.implode(" ", $class).'">';
					foreach($atts as $social => $href) {
						if($href && $social != 'target' && $social != 'icon_color' && $social != 'icon_color_hover' && $social != 'icon_background_color' && $social != 'icon_background_color' && $social != 'icon_background_color_hover' && $social != 'icon_border_color' && $social != 'icon_border_color_hover' && $social != 'icon_border_width' && $social != 'styling_original' && $social != 'element_id' && $social != 'extra_class' && $social != 'element_css' && $social != 'shadow') {
							if ($social == 'email') {
								$output .='<a class="ien-'.$social.'" href="'.esc_attr($href).'" target="'.esc_attr($target).'"></a>';
							} elseif ($social == 'skype') {
								$output .='<a class="ien-'.$social.'" href="'.esc_attr($href).'" target="'.esc_attr($target).'"></a>';
							} else {
								$output .='<a class="ien-'.$social.'" href="'.esc_url($href).'" target="'.esc_attr($target).'"></a>';
							}
						}
					}
				$output .= '</div>';

				$id_counter++;

				return $output;
			}
			add_shortcode('et_social_links', 'et_social_links');

		/*	et_social_share
		--------------*/

			function et_social_share($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'extra_class'     		=> '',
						'element_id'            => '',
						'target' 				=> '_self',
						'styling_original'      => 'false',
						'shadow'                => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'et-social-share';
				$class[] = 'et-social-links';
				$class[] = 'styling-original-'.$styling_original;

				if (isset($shadow) && !empty($shadow)) {
					$class[] = 'shadow-true';
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$output = '<div id="et-social-share-'.$element_id.'" class="'.implode(" ", $class).'">';
		            $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		            $output .= '<div class="social-links et-clearfix">';
		                $output .= '<a title="'.esc_html__("Share on Facebook", 'enovathemes-addons').'" class="social-share post-facebook-share ien-facebook" target="_blank" href="//facebook.com/sharer.php?u='.urlencode(get_the_permalink(get_the_ID())).'"></a>';
		                $output .= '<a title="'.esc_html__("Tweet this!", 'enovathemes-addons').'" class="social-share post-twitter-share ien-twitter" target="_blank" href="//twitter.com/intent/tweet?text='.urlencode(get_the_title(get_the_ID()).' - '.get_the_permalink(get_the_ID())).'"></a>';
		                $output .= '<a title="'.esc_html__("Share on Pinterest", 'enovathemes-addons').'" class="social-share post-pinterest-share ien-pinterest" target="_blank" href="//pinterest.com/pin/create/button/?url='.urlencode(get_the_permalink(get_the_ID())).'&media='.urlencode(esc_url($url)).'&description='.rawurlencode(get_the_title(get_the_ID())).'"></a>';
		                $output .= '<a title="'.esc_html__("Share on LinkedIn", 'enovathemes-addons').'" class="social-share post-linkedin-share ien-linkedin" target="_blank" href="//www.linkedin.com/shareArticle?mini=true&url='.urlencode(get_the_permalink(get_the_ID())).'&title='.rawurlencode(get_the_title(get_the_ID())).'"></a>';
		                $output .= '<a title="'.esc_html__("Share on Google+", 'enovathemes-addons').'" class="social-share post-google-share ien-google" target="_blank" href="//plus.google.com/share?url='.urlencode(get_the_permalink(get_the_ID())).'" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"></a>';
		            $output .= '</div>';

		        $output .= '</div>';

				$id_counter++;

				return $output;
			}
			add_shortcode('et_social_share', 'et_social_share');

		/*  et_mailchimp
		/*------------*/

			function et_mailchimp($atts, $content = null) {

				extract(shortcode_atts(
					array(
			 			'list'        => '',
			 			'element_id'  => '',
					), $atts)
				);

				$output = '';

				static $id_counter = 1;

					$element_id = (!empty($element_id)) ? $element_id : $id_counter;

					$args = array(
						'before_widget' => '<div id="et-mailchimp-'.$element_id.'" class="et-mailchimp widget_mailchimp">',
						'after_widget'  => '</div>',
						'before_title'  => '<h5 class="widget_title">',
		                'after_title'   => '</h5>',
					);

					$instance = array(
						'title'                => '',
			 			'description'          => '',
			 			'list'                 => $list,
			 			'first_name'           => false,
			 			'last_name'            => false,
			 			'phone'                => false,
			 			'required_first_name'  => false,
			 			'required_last_name'   => false,
			 			'required_phone'       => false,
					);

					$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Mailchimp', $instance,$args);

				$id_counter++;

				return $output;
			}

			add_shortcode('et_mailchimp', 'et_mailchimp');

		/*  et_instagram
		/*------------*/
			
			function et_instagram($atts) {

				extract( 
				 	shortcode_atts(
					array(
						'username' => '',
						'size'     => '150',
						'number'   => '',
						'type'     => 'grid',
						'columns'  => '1',
						'gap'      => '0',
					), $atts)
				);

				static $id_counter = 1;

				$output = "";

				$class = array();

				if ($type == 'carousel') {
					$class[] = 'carousel';
				}

				$class[] = 'et-instagram';
				$class[] = 'overlay-fade';
				$class[] = 'et-item-set';
				$class[] = 'et-clearfix';
				$class[] = esc_attr($type);

				if (isset($username) && !empty($username)) {

					$output .='<div id="et-instagram-'.$id_counter.'" data-columns="'.esc_attr($columns).'" data-gap="'.esc_attr($gap).'" class="'.implode(" ", $class).'" data-username="'.esc_attr($username).'" data-limit="'.esc_attr($number).'" data-size="'.esc_attr($size).'">';
					$output .= '</div>';

					$id_counter++;

					return $output;

				}
			}

			add_shortcode('et_instagram', 'et_instagram');

	/* SELFHOSTED
	---------------*/

		/*  et_icon_box
		/*------------*/

			function et_icon_box( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'icon_size'          => 'large',
					'icon_name'          => '',
					'icon_prefix'        => '',
					'title'              => '',
					'title_tag'          => 'h4',
					'link'               => '',
					'icon_position'      => 'top',
					'icon_alignment'     => 'left',
					'icon_back_color'    => '',
					'icon_border_width'  => '0',
					'icon_border_radius' => '',
					'hover'              => 'none',
					'shadow'             => '',
					'parallax'           => 'false',
					'move'               => 'false',
					'parallax_speed'     => '10',
					'parallax_x'         => '0',
					'parallax_y'         => '0',
					'rp'                 => '',
					'element_id'         => '',
					'extra_class'        => '',
				), $atts));

				$output = '';
				$link_before = "";
				$link_after  = "";

				static $id_counter = 1;

				$class = array();
				$attributes = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				if (isset($parallax) && $parallax == "true") {
					$class[] = 'etp-parallax';
				}
				

				if (isset($link) && !empty($link)) {
					$link_before = '<a href="'.esc_url($link).'">';
					$link_after  = '</a>';
					$class[] = 'link';
				}

				$class[] = 'et-icon-box';
				$class[] = 'et-item';
				$class[] = 'icon-position-'.esc_attr($icon_position);
				$class[] = 'icon-alignment-'.esc_attr($icon_alignment);
				$class[] = 'hover-'.esc_attr($hover);

				if (isset($shadow) && $shadow == 'true') {
					$class[] = 'shadow';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$class = array_merge($class,$responsive_parallax);
				}

				$attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
				$attributes[] = 'data-move="'.esc_attr($move).'"';
				$attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
				$attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
				$attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';

				if ((isset($icon_border_width) && !empty($icon_border_width)) || isset($icon_back_color) && !empty($icon_back_color)) {

					$icon_size = 'full '.$icon_size;

					if (!empty($icon_border_radius) && $icon_border_radius >=50) {
						$icon_size = 'border-radius-large '.$icon_size;
					}
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

		        $output .='<div id="et-icon-box-'.$element_id.'" class="'.implode(' ', $class).'" '.implode(' ', $attributes).'>';
		        		$output .='<div class="et-icon-box-inner et-item-inner et-clearfix">';
		        			$output .= $link_before;
				        	if (isset($icon_name) && !empty($icon_name)) {
								$output .= '<div class="et-icon '.esc_attr($icon_size).'">';
									$output .= '<span class="el-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
								$output .= '</div>';
							}
							$output .='<div class="et-icon-content et-clearfix">';
								if (isset($title) && !empty($title)) {

									$title = preg_replace("/_break_/","[et_gap]",$title);

									$output .='<'.$title_tag.' class="et-icon-box-title">'.do_shortcode($title).'</'.$title_tag.'>';
								}
								if (isset($content) && !empty($content)) {
									$output .='<p class="et-icon-box-content">'.do_shortcode(preg_replace("/_break_/","[et_gap]",$content)).'</p>';
								}
							$output .='</div>';
							$output .= $link_after;
						$output .='</div>';
						if ($hover == 'ghost') {
							if (isset($icon_name) && !empty($icon_name)) {
								$output .= '<span class="ghost-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
							}
						}
				$output .='</div>';

				$id_counter++;

				return $output;


			}
			add_shortcode('et_icon_box', 'et_icon_box');

		/*  et_icon_box_container
		/*------------*/

			function et_icon_box_container( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'animation'      => 'none',
					'animation_type' => 'sequential',
					'shadow'         => '',
					'border_color'   => '',
					'columns'        => '1',
					'vertical_align' => 'top',
					'element_id'     => '',
				), $atts));

				$output = '';

				static $id_counter = 1;

				$class = array();

				$class[] = 'column-'.$columns;

				$class[] = 'et-icon-box-container et-item-set';
				$class[] = 'effect-'.$animation;
				$class[] = 'animation-type-'.$animation_type;

				if (isset($shadow) && $shadow == 'true') {
					$class[] = 'shadow';
				}

				if (isset($vertical_align) && !empty($vertical_align)) {
					$class[] = $vertical_align;
				}

				if (!isset($border_color) || empty($border_color)) {
					$class[] = 'no-border';
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

		        $output .='<div id="et-icon-box-container-'.$element_id.'" class="'.implode(' ', $class).'">';
	        		$output .=do_shortcode($content);
				$output .='</div>';

				$id_counter++;

				return $output;


			}
			add_shortcode('et_icon_box_container', 'et_icon_box_container');

		/*  et_step_box
		/*------------*/

			function et_step_box( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'title'              => '',
					'title_tag'          => 'h4',
					'element_id'         => '',
					'extra_class'        => '',
				), $atts));

				$output = '';

				static $id_counter = 1;

				$class = array();
				$attributes = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}
				

				$class[] = 'et-step-box et-item';

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

		        $output .='<div id="et-step-box-'.$element_id.'" class="'.implode(' ', $class).'">';
		        		$output .='<div class="et-step-box-inner et-item-inner et-clearfix">';
							$output .='<div class="et-step-content et-clearfix">';
								$output .='<div class="step-dot"><span class="before"></span></div>';
								if (isset($title) && !empty($title)) {

									$title = preg_replace("/_break_/","[et_gap]",$title);

									$output .='<'.$title_tag.' class="et-step-box-title">'.do_shortcode($title).'</'.$title_tag.'>';
								}
								if (isset($content) && !empty($content)) {
									$output .='<p class="et-step-box-content">'.do_shortcode($content).'</p>';
								}
							$output .='</div>';
						$output .='</div>';
				$output .='</div>';

				$id_counter++;

				return $output;


			}
			add_shortcode('et_step_box', 'et_step_box');

		/*  et_step_box_container
		/*------------*/

			function et_step_box_container( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'columns'        => '1',
					'element_id'     => '',
					'extra_class'    => '',
				), $atts));

				$output = '';

				static $id_counter = 1;

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'column-'.$columns;

				$class[] = 'et-step-box-container';

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

		        $output .='<div id="et-step-box-container-'.$element_id.'" class="'.implode(' ', $class).'">';
	        		$output .=do_shortcode($content);
				$output .='</div>';

				$id_counter++;

				return $output;


			}
			add_shortcode('et_step_box_container', 'et_step_box_container');

		/*	et_carousel
		--------------*/

			function et_carousel($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'columns'         => '1',
						'gap'             => '0',
						'navigation_type' => 'only-arrows',
						'autoplay'        => 'false',
					), $atts)
				);

				$output = '';

				static $id_counter = 1;

				$output .='<div id="et-carousel-'.$id_counter.'" class="et-carousel owl-carousel et-item-set effect-none navigation-'.$navigation_type.'" data-autoplay="'.$autoplay.'" data-columns="'.esc_attr($columns).'" data-gap="'.esc_attr($gap).'">';
					$output .= do_shortcode($content);
				$output .= '</div>';

				$id_counter++;

				return $output;
				
			}
			add_shortcode('et_carousel', 'et_carousel');
			
			function et_carousel_item($atts, $content = null) {

				$output = '';

				$output .='<div class="et-carousel-item et-item et-clearfix">';
					$output .= do_shortcode($content);
				$output .='</div>';

				return $output;
			}
			add_shortcode('et_carousel_item', 'et_carousel_item');

		/*  et_pricing_table
		/*------------*/

			function et_pricing_table($atts, $content = null) {

				extract(shortcode_atts(array(
					'icon_name'   => '',
					'icon_prefix' => '',
					'highlight'=> 'false',
					'title'	   => '',
					'currency' => '',
					'price'    => '',
					'plan'     => '',
					'button_text' => '',
					'button_link' => '',
					'target'     => '_self',
					'label'      => '',
					'element_id' => '',
				), $atts));

				static $id_counter = 1;

				$output = '';

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$output .='<div id="et-pricing-table-'.$element_id.'" class="et-pricing-table highlight-'.$highlight.'">';
					
					$output .='<div class="pricing-table-inner">';

						$output .='<div class="pricing-table-head">';
							
							if (isset($label) && !empty($label)) {
								$output .= '<span class="label">'.esc_attr($label).'</span>';
							}

							if (isset($title) && !empty($title)) {
								$output .= '<h4 class="title">'.esc_attr($title).'</h4>';
							}
							$output .='<div class="pricing-table-price">';
								if (isset($currency) && !empty($currency)) {
									$output .= '<span class="currency">'.esc_attr($currency).'</span>';
								}
								if (isset($price) && !empty($price)) {
									$output .= '<span class="price">'.esc_attr($price).'</span>';
								}
							$output .='</div>';
							if (isset($plan) && !empty($plan)) {
								$output .= '<div class="plan">'.esc_attr($plan).'</div>';
							}
						$output .='</div>';

						$output .='<div class="pricing-table-body">';
							$output .='<ul>';
								$split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);
								foreach($split as $haystack) {
						            $output .= '<li>';
						            	$output .= $haystack;
						            $output .= '</li>';
						        }
					        $output .='</ul>';
				        $output .='</div>';

				        if (isset($button_text) && !empty($button_text) && isset($button_link) && !empty($button_link)) {
				        	$output .='<div class="pricing-table-footer">';
								$output .='<a target="'.$target.'" href="'.esc_url($button_link).'" class="et-button large">';
									$output .='<span class="text">'.esc_attr($button_text).'</span>';
								$output .='</a>';
							$output .='</div>';
						}

						if (isset($icon_name) && !empty($icon_name)) {
							$output .= '<span class="ghost-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
						}

					$output .='</div>';

				$output .='</div>';

				$id_counter++;

				return $output;
			}
			add_shortcode('et_pricing_table', 'et_pricing_table');

		/*	et_testimonial
		--------------*/

			function et_testimonial_container($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'columns'         => '1',
						'gap'             => '0',
						'navigation_type' => 'only-arrows',
						'autoplay'        => 'false',
						'element_id'      => '',
					), $atts)
				);

				$output = '';

				static $id_counter = 1;

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$output .='<div id="et-testimonial-container-'.$element_id.'" class="et-testimonial-container owl-carousel et-item-set autoplay-'.$autoplay.' navigation-'.$navigation_type.'" data-columns="'.esc_attr($columns).'" data-gap="'.esc_attr($gap).'">';
					$output .= do_shortcode($content);
				$output .= '</div>';

				$id_counter++;

				return $output;
				
			}
			add_shortcode('et_testimonial_container', 'et_testimonial_container');

			function et_testimonial($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'text'        => '',
						'author'      => '',
						'title'       => '',
						'image'       => '',
						'extra_class' => '',
						'element_id'  => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				$class   = array();
				$class[] = 'et-testimonial';
				$class[] = 'et-item';

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if (isset($text) && !empty($text)) {
					$output .= '<div id="et-testimonial-'.$element_id.'" class="'.implode(" ",$class).'">';
						$output .= '<div class="author-wrapper et-clearfix">';
							$output .= '<div class="author-text">'.do_shortcode($text).'</div>';
							$output .= '<div class="author-content-wrapper et-clearfix">';
								if (isset($image) && !empty($image)) {
									$image     = wp_get_attachment_image_src($image,'full');
									$image_src = $image[0];
									$output .= '<div class="author-image">';
										$output .= '<img alt="'.esc_html($author).'" src="'.esc_url($image_src).'" />';
									$output .= '</div>';
								}
								$output .= '<div class="author-info-wrapper et-clearfix">';
									if (isset($author) && !empty($author)) {
										$output .= '<h4 class="author">'.esc_html($author).'</h4>';
									}
									if (isset($title) && !empty($title)) {
										$output .= '<span class="title">'.esc_html($title).'</span>';
									}
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}
				$id_counter++;

				return $output;
			}

			add_shortcode('et_testimonial', 'et_testimonial');

		/*	et_client
		--------------*/

			function et_client_container($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'type'            => 'grid',
						'border'          => '',
						'columns'         => '1',
						'gap'             => '0',
						'navigation_type' => 'only-arrows',
						'autoplay'        => 'false',
						'element_id'      => '',
					), $atts)
				);

				$output = '';

				static $id_counter = 1;

				$class   = array();
				$class[] = 'et-client-container';
				$class[] = 'et-item-set';
				$class[] = 'effect-fadeIn';

				if (isset($type) && $type == "carousel") {
					$class[] = 'owl-carousel';
					$class[] = 'autoplay-'.$autoplay;
					$class[] = 'navigation-'.$navigation_type;
				}

				if (isset($type) && $type == "grid") {
					$class[] = 'grid';
					$class[] = 'border-'.$border;
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$output .='<div id="et-client-container-'.$element_id.'" class="'.implode(' ', $class).'" data-columns="'.esc_attr($columns).'" data-gap="'.esc_attr($gap).'">';
					$output .= do_shortcode($content);
				$output .= '</div>';

				$id_counter++;

				return $output;
				
			}
			add_shortcode('et_client_container', 'et_client_container');

			function et_client($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'link'  => '',
						'title' => '',
						'image' => '',
						'image_hover' => '',
						'element_id'  => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';
				$link_before = '';
				$link_after  = '';

				if (isset($link) && !empty($link)) {
					$link_before = '<a href="'.esc_url($link).'">';
					$link_after  = '</a>';
				}

				$class   = array();
				$class[] = 'et-client';
				$class[] = 'et-item';

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if (isset($image) && !empty($image)) {
					$output .= '<div id="et-client-'.$element_id.'" class="'.implode(" ",$class).'">';
						$output .= '<div class="client-inner et-item-inner">';
							$image     = wp_get_attachment_image_src($image,'full');
							$image_src = $image[0];
							$output .= $link_before;
								$output .= '<img class="regular" src="'.esc_url($image_src).'" alt="'.esc_attr($title).'" />';
								if (isset($image_hover) && !empty($image_hover)) {
									$image_hover     = wp_get_attachment_image_src($image_hover,'full');
									$image_hover_src = $image_hover[0];
									$output .= '<img class="hover" src="'.esc_url($image_hover_src).'" alt="'.esc_attr($title).'" />';
								}
							$output .= $link_after;
						$output .= '</div>';
						$output .= '<div class="plus"></div>';
						$output .= '<div class="back"></div>';
					$output .= '</div>';
				}

				$id_counter++;

				return $output;
			}

			add_shortcode('et_client', 'et_client');

		/*	et_person
		--------------*/

			function et_person_container($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'columns'         => '1',
						'gap'             => '0',
						'navigation_type' => 'only-arrows',
						'autoplay'        => 'false',
						'element_id'      => '',
					), $atts)
				);

				$output = '';

				static $id_counter = 1;

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$output .='<div id="et-person-container-'.$element_id.'" class="et-person-container owl-carousel et-item-set autoplay-'.$autoplay.' navigation-'.$navigation_type.'" data-columns="'.esc_attr($columns).'" data-gap="'.esc_attr($gap).'">';
					$output .= do_shortcode($content);
				$output .= '</div>';

				$id_counter++;

				return $output;
				
			}
			add_shortcode('et_person_container', 'et_person_container');

			function et_person($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'icon_name'   => '',
						'icon_prefix' => '',
						'name'        => '',
						'title'       => '',
						'image'       => '',
						'extra_class' => '',
						'element_id'  => '',
					), $atts)
				);

				static $id_counter = 1;

				$output      = '';

				$class   = array();
				$class[] = 'et-person';
				$class[] = 'et-item';

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if (isset($image) && !empty($image)) {
					$output .= '<div id="et-person-'.$element_id.'" class="'.implode(" ",$class).'">';
						$output .= '<div class="person-inner">';
							if (isset($image) && !empty($image)) {
								$image     = wp_get_attachment_image_src($image,'full');
								$image_src = $image[0];
								$output .= '<div class="person-image">';
									$output .= '<img alt="'.esc_html($name).'" src="'.esc_url($image_src).'" />';
								$output .= '</div>';
							}

							$output .= '<div class="person-content et-clearfix">';
								if (isset($name) && !empty($name)) {
									$output .= '<h4 class="name">'.esc_html($name).'</h4>';
								}
								if (isset($title) && !empty($title)) {
									$output .= '<span class="title">'.esc_html($title).'</span>';
								}

								$output .= '<div class="styling-original-false et-social-links">';
									foreach($atts as $social => $href) {
										if($href && $social != 'name' && $social != 'title' && $social != 'image' && $social != 'extra_class' && $social != 'element_id' && $social != 'icon_name' && $social != 'icon_prefix') {
											if ($social == 'email') {
												$output .='<a class="ien-'.$social.'" href="'.esc_attr($href).'" target="_blank"></a>';
											} elseif ($social == 'skype') {
												$output .='<a class="ien-'.$social.'" href="'.esc_attr($href).'" target="_blank"></a>';
											} else {
												$output .='<a class="ien-'.$social.'" href="'.esc_url($href).'" target="_blank"></a>';
											}
										}
									}
								$output .= '</div>';

								if (isset($icon_name) && !empty($icon_name)) {
									$output .= '<span class="ghost-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
								}

							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}
				$id_counter++;

				return $output;
			}

			add_shortcode('et_person', 'et_person');

		/*  et_map
		--------------*/
			
			function et_map($atts, $content = null) {

				extract(shortcode_atts(
					array(
						'zoom'    => '18',
						'type'    => 'roadmap',
						'marker'  => '',
						'x_coords_1' => '',
						'y_coords_1' => '',
						'content_1'  => '',
						'title_1'    => '',
						'image_1'    => '',
						'x_coords_2' => '',
						'y_coords_2' => '',
						'content_2'  => '',
						'title_2'    => '',
						'image_2'    => '',
						'x_coords_3' => '',
						'y_coords_3' => '',
						'content_3'  => '',
						'title_3'    => '',
						'image_3'    => '',
						'x_coords_4' => '',
						'y_coords_4' => '',
						'content_4'  => '',
						'title_4'    => '',
						'image_4'    => '',
						'x_coords_5' => '',
						'y_coords_5' => '',
						'content_5'  => '',
						'title_5'    => '',
						'image_5'    => '',
						'element_id' => '',
					), $atts)
				);

				static $id_counter = 1;
				
				$output ='';

				if(empty($zoom) || !is_numeric($zoom) || $zoom < 0){$zoom = "18";}

				if (!isset($marker) || empty($marker)) {
					$marker = SAMATEX_ENOVATHEMES_IMAGES.'/marker.svg';
				} else {
					$marker_ats = wp_get_attachment_image_src($marker, 'full');
					$marker     =  $marker_ats[0];
				}

				$attributes = array();

				if (isset($x_coords_1) && !empty($x_coords_1)) {$attributes[] = 'data-x1="'.esc_attr($x_coords_1).'"';}
				if (isset($x_coords_2) && !empty($x_coords_2)) {$attributes[] = 'data-x2="'.esc_attr($x_coords_2).'"';}
				if (isset($x_coords_3) && !empty($x_coords_3)) {$attributes[] = 'data-x3="'.esc_attr($x_coords_3).'"';}
				if (isset($x_coords_4) && !empty($x_coords_4)) {$attributes[] = 'data-x4="'.esc_attr($x_coords_4).'"';}
				if (isset($x_coords_5) && !empty($x_coords_5)) {$attributes[] = 'data-x5="'.esc_attr($x_coords_5).'"';}

				if (isset($y_coords_1) && !empty($y_coords_1)) {$attributes[] = 'data-y1="'.esc_attr($y_coords_1).'"';}
				if (isset($y_coords_2) && !empty($y_coords_2)) {$attributes[] = 'data-y2="'.esc_attr($y_coords_2).'"';}
				if (isset($y_coords_3) && !empty($y_coords_3)) {$attributes[] = 'data-y3="'.esc_attr($y_coords_3).'"';}
				if (isset($y_coords_4) && !empty($y_coords_4)) {$attributes[] = 'data-y4="'.esc_attr($y_coords_4).'"';}
				if (isset($y_coords_5) && !empty($y_coords_5)) {$attributes[] = 'data-y5="'.esc_attr($y_coords_5).'"';}

				if (isset($title_1) && !empty($title_1)) {$attributes[] = 'data-title1="'.esc_attr($title_1).'"';}
				if (isset($title_2) && !empty($title_2)) {$attributes[] = 'data-title2="'.esc_attr($title_2).'"';}
				if (isset($title_3) && !empty($title_3)) {$attributes[] = 'data-title3="'.esc_attr($title_3).'"';}
				if (isset($title_4) && !empty($title_4)) {$attributes[] = 'data-title4="'.esc_attr($title_4).'"';}
				if (isset($title_5) && !empty($title_5)) {$attributes[] = 'data-title5="'.esc_attr($title_5).'"';}

				if (isset($content_1) && !empty($content_1)) {$attributes[] = 'data-content1="'.esc_attr($content_1).'"';}
				if (isset($content_2) && !empty($content_2)) {$attributes[] = 'data-content2="'.esc_attr($content_2).'"';}
				if (isset($content_3) && !empty($content_3)) {$attributes[] = 'data-content3="'.esc_attr($content_3).'"';}
				if (isset($content_4) && !empty($content_4)) {$attributes[] = 'data-content4="'.esc_attr($content_4).'"';}
				if (isset($content_5) && !empty($content_5)) {$attributes[] = 'data-content5="'.esc_attr($content_5).'"';}

				if (isset($image_1) && !empty($image_1)) {
					$image_1 = wp_get_attachment_image_src($image_1,'full');
					$attributes[] = 'data-image1="'.esc_url($image_1[0]).'"';
				}
				if (isset($image_2) && !empty($image_2)) {
					$image_2 = wp_get_attachment_image_src($image_2,'full');
					$attributes[] = 'data-image2="'.esc_url($image_2[0]).'"';
				}
				if (isset($image_3) && !empty($image_3)) {
					$image_3 = wp_get_attachment_image_src($image_3,'full');
					$attributes[] = 'data-image3="'.esc_url($image_3[0]).'"';
				}
				if (isset($image_4) && !empty($image_4)) {
					$image_4 = wp_get_attachment_image_src($image_4,'full');
					$attributes[] = 'data-image4="'.esc_url($image_4[0]).'"';
				}
				if (isset($image_5) && !empty($image_5)) {
					$image_5 = wp_get_attachment_image_src($image_5,'full');
					$attributes[] = 'data-image5="'.esc_url($image_5[0]).'"';
				}

				$attributes[] = 'data-type="'.esc_attr($type).'"';
				$attributes[] = 'data-zoom="'.absint($zoom).'"';
				$attributes[] = 'data-marker="'.$marker.'"';

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$output .= '<div class="et-map" id="et-map-'.$element_id .'"  '.implode(" ", $attributes).'></div>';

				$id_counter++;

				return $output;

			}
			add_shortcode('et_map', 'et_map');

		/*  et_banner
		/*------------*/

			function et_banner( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'visible_mob'   => '',
					'visible_tablet'=> '',
					'cookie'        => '',
					'delay'         => '3000',
					'effect'        => 'fade-in-scale', 
					'text_align'    => 'left',
					'element_id'    => '',
				), $atts));

				$output = '';

				static $id_counter = 1;

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$attributes = array();
				if (isset($cookie) && !empty($cookie)) {
					$attributes[] = 'data-cookie="'.esc_attr($cookie).'"';
				}
				
				if (isset($delay) && !empty($delay)) {
					$attributes[] = 'data-delay="'.absint($delay).'"';
				}

				$output .='<div id="et-popup-banner-wrapper-'.$element_id.'" class="et-popup-banner-wrapper" data-mob="'.$visible_mob.'" data-tablet="'.$visible_tablet.'">';
					$output .='<div id="et-popup-banner-'.$element_id.'" class="et-popup-banner et-clearfix '.esc_attr($effect).' text-align-'.esc_attr($text_align).'" '.implode(" ", $attributes).'>';
						$output .='<div class="popup-banner-toggle"></div>';
						$output .= do_shortcode($content);
					$output .='</div>';
				$output .='</div>';

				$id_counter++;

				return $output;


			}
			add_shortcode('et_banner', 'et_banner');

		/*  et_tagline
		/*------------*/

			function et_tagline( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'visible_mob'   => 'false',
					'visible_tablet'=> 'false',
					'cookie'        => 'false',
					'delay'         => '3000',
					'title'         => '',
					'button_text'   => '',
					'button_link'   => '',
					'element_id'    => '',
				), $atts));

				$output = '';

				static $id_counter = 1;

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$attributes = array();

				$attributes[] = 'data-cookie="'.esc_attr($cookie).'"';
				$attributes[] = 'data-mob="'.$visible_mob.'"';
				$attributes[] = 'data-delay="'.absint($delay).'"';
				$attributes[] = 'data-tablet="'.$visible_tablet.'"';

				$output .='<div id="et-tagline-'.$element_id.'" class="et-tagline et-clearfix" '.implode(" ", $attributes).'>';
					$output .='<div class="tagline-toggle"></div>';
					$output .='<div class="container et-clearfix">';
						if (isset($title) && !empty($title)) {
							$output .='<h6 class="tagline-title">'.esc_html($title).'</h6>';
						}
						if (isset($button_link) && !empty($button_link) && isset($button_text) && !empty($button_text)) {
							$output .='<a href="'.esc_url($button_link).'" class="tagline-button et-button small">'.esc_html($button_text).'</a>';
						}
					$output .='</div>';
				$output .='</div>';

				$id_counter++;

				return $output;


			}
			add_shortcode('et_tagline', 'et_tagline');

	/* MEDIA
	---------------*/

		/*  et_image
		/*------------*/

			function et_image( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'image' 				  => '',
					'title' 				  => '',
					'size' 					  => 'full',
					'link' 					  => '',
					'link_target'             => '_self',
					'parallax'                => 'false',
					'move'                    => 'false',
					'parallax_speed'          => '10',
					'parallax_x'              => '0',
					'parallax_y'              => '0',
					'rp'                      => '',
					'alignment'               => 'none',
					'curtain'                 => 'false',
					'curtain_direction'       => 'left',
					'curtain_color'           => '',
					'curtain_animation_delay' => '0',
					'element_id'              => ''
				), $atts));


				$output = '';

				static $id_counter = 1;

				$class      = array();
				$attributes = array();

				$class[] = 'et-image';
				$class[] = 'align'.$alignment;
				$class[] = 'curtain-'.$curtain_direction;

				if (isset($parallax) && $parallax == "true") {
					$class[] = 'etp-parallax';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$class = array_merge($class,$responsive_parallax);
				}

				$attributes[] = 'data-curtain="'.esc_attr($curtain).'"';
				$attributes[] = 'data-animation-delay="'.esc_attr($curtain_animation_delay).'"';
				$attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
				$attributes[] = 'data-move="'.esc_attr($move).'"';
				$attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
				$attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
				$attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';

				if (isset($image) && !empty($image)) {

					$image_src = wp_get_attachment_image_src($image, $size);

					$image_src    = $image_src[0];
					$image_width  = $image_src[1];
					$image_height = $image_src[2];

					$link_before = '';
					$link_after  = '';

					if (isset($link) && !empty($link)) {
						$class[] = 'link';
						$link_before = '<a title="'.esc_attr($title).'" target="'.$link_target.'" href="'.esc_url($link).'">';
						$link_after  = '</a>';
					}

					$element_id = (!empty($element_id)) ? $element_id : $id_counter;

					$image_caption = get_post_meta($image, '_wp_attachment_image_alt',true);

					if (empty($image_caption)) {
						$image_caption  = get_the_post_thumbnail_caption($image);
						
					}

					$image_alt = (empty($title)) ? ((empty($image_caption)) ? get_bloginfo('name') : $image_caption) : esc_attr($title);

					$output .='<div id="et-image-'.$element_id.'" class="'.implode(' ', $class).'" '.implode(' ', $attributes).'>';
						$output .=$link_before;
							$output .='<img width="'.$image_width.'" height="'.$image_height.'" src="'.esc_url($image_src).'" alt="'.$image_alt.'">';
							if ($curtain == "true") {$output .='<div class="curtain"></div>';}
						$output .=$link_after;
					$output .='</div>';

					$id_counter++;

			    	return $output;
				}

			}
			add_shortcode('et_image', 'et_image');

		/*  et_image
		/*------------*/

			function et_image_box( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'image' 				  => '',
					'title' 				  => '',
					'size' 					  => 'full',
					'link' 					  => '',
					'link_target'             => '_self',
					'layout'                  => 'classic',
					'alignment'               => 'none',
					'element_id'              => ''
				), $atts));


				$output = '';

				static $id_counter = 1;

				$class      = array();
				$attributes = array();

				$class[] = 'et-image';
				$class[] = 'et-image-box';
				$class[] = 'overlay-hover';
				$class[] = $layout;
				$class[] = 'align'.$alignment;

				if (isset($image) && !empty($image)) {

					$image_src = wp_get_attachment_image_src($image, $size);

					$image_src    = $image_src[0];
					$image_width  = $image_src[1];
					$image_height = $image_src[2];

					$link_before = '';
					$link_after  = '';

					if (isset($link) && !empty($link)) {
						$class[] = 'link';
						$link_before = '<a title="'.esc_attr($title).'" target="'.$link_target.'" href="'.esc_url($link).'">';
						$link_after  = '</a>';
					}

					$element_id = (!empty($element_id)) ? $element_id : $id_counter;

					$image_caption = get_post_meta($image, '_wp_attachment_image_alt',true);

					if (empty($image_caption)) {
						$image_caption  = get_the_post_thumbnail_caption($image);
						
					}

					$image_alt = (empty($title)) ? ((empty($image_caption)) ? get_bloginfo('name') : $image_caption) : esc_attr($title);

					$output .='<div id="et-image-'.$element_id.'" class="'.implode(' ', $class).'" '.implode(' ', $attributes).'>';
						$output .=$link_before;
							$output .='<div class="post-image post-media">';
								if ($layout == "overlay") {
									$output .='<div class="post-image-overlay">';
										$output .='<div class="post-image-overlay-content">';
											$output .='<h4 class="post-title entry-title">';
												$output .= $image_alt;
											$output .='</h4>';
										$output .='</div>';
									$output .='</div>';
								}
								$output .='<img width="'.$image_width.'" height="'.$image_height.'" src="'.esc_url($image_src).'" alt="'.$image_alt.'">';
							$output .='</div>';
							if ($layout == "classic" || $layout == "caption") {
								$output .='<div class="post-body et-clearfix">';
									$output .='<div class="post-body-inner-wrap">';
										$output .='<div class="post-body-inner">';
											$output .='<h4 class="post-title entry-title">';
												$output .= $image_alt;
											$output .='</h4>';
										$output .='</div>';
									$output .='</div>';
								$output .='</div>';
							}
						$output .=$link_after;
					$output .='</div>';

					$id_counter++;

			    	return $output;
				}

			}
			add_shortcode('et_image_box', 'et_image_box');

		/*  et-gallery
		/*------------*/

			function et_gallery( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'images'     => '',
					'size'       => 'full',
					'type'       => 'grid',
					'link'       => 'none',
					'columns'    => '1',
					'gap'        => '0',
					'animation'  => 'none',
					'navigation_type' => 'only-arrows',
					'autoplay'        => 'false',
					'element_id' => ''
				), $atts));

				global $samatex_enovathemes;

            	$img_preloader  = (isset($GLOBALS['samatex_enovathemes']['img-preload']) && $GLOBALS['samatex_enovathemes']['img-preload'] == 1) ? 'true' : 'false';

				$output = '';
				$carousel_thumbs_output = '';

				static $id_counter = 1;

				$class      = array();
				$attributes = array();

				$class[] = 'et-gallery';
				$class[] = 'et-item-set';
				$class[] = $type;
				$class[] = 'effect-'.$animation;
				$class[] = 'navigation-'.$navigation_type;

				if ($type == 'carousel') {
					$class[] = 'owl-carousel';
				}

				if (($type == 'grid' && ($animation == 'fadeIn' || $animation == 'moveUp')) || ($type == 'grid' && $img_preloader == "true")) {
					$class[] = 'animate-gallery';
				}

				$attributes[] = 'data-columns="'.esc_attr($columns).'"';
				$attributes[] = 'data-gap="'.esc_attr($gap).'"';
				$attributes[] = 'data-autoplay="'.esc_attr($autoplay).'"';

				if ($type == 'carousel-thumbs') {
					$attributes = array();
					$attributes[] = 'data-autoplay="'.esc_attr($autoplay).'"';
				}

				if (isset($images) && !empty($images)) {

					$element_id = (!empty($element_id)) ? $element_id : $id_counter;

					$output .='<div id="et-gallery-'.$element_id.'" class="'.implode(' ', $class).'" '.implode(' ', $attributes).'>';

						if ($type == 'carousel-thumbs') {
							$output .= '<ul id="carousel-thumbs-'.$element_id.'" class="carousel-thumbs">';
						}

						$images = explode(',', $images);

						foreach ($images as $image) {

							$image_full = wp_get_attachment_image_src($image, "full");
							$image_thumbnail = wp_get_attachment_image_src($image, "thumbnail");
							
							$image_caption  = get_the_post_thumbnail_caption($image);

							if (empty($image_caption)) {
								$image_caption = get_post_meta($image, '_wp_attachment_image_alt',true);
							}

							$image      = wp_get_attachment_image_src($image, $size);
							
							$image_src    = $image[0];
							$image_width  = $image[1];
							$image_height = $image[2];

							$link_before = '';
							$link_after  = '';
							$image_alt = (empty($image_caption)) ? get_bloginfo('name') : $image_caption;

							if (isset($link) && $link != "none") {
								$link_before = ($link == "lightbox") ? '<a class="et-gallery-link lightbox" data-lightbox-gallery="et-gallery-'.$element_id.'" href="'.esc_url($image_full[0]).'">' : '<a class="et-gallery-link" href="'.esc_url($image_full[0]).'">';
								$link_after  = '</a>';
							}

							if ($type == 'carousel-thumbs') {
								$output .='<li class="et-item et-gallery-item">';
									$output .='<div class="et-item-inner">';
										$output .='<div class="image-container">';
											$output .='<div class="image-preloader"></div>';	
											$output .=$link_before;
												$output .='<img alt="'.$image_alt.'" width="'.$image_width.'" height="'.$image_height.'" src="'.esc_url($image_src).'">';
											$output .=$link_after;
										$output .='</div>';
									$output .='</div>';
								$output .='</li>';

								$carousel_thumbs_output .='<li class="et-item et-gallery-item">';
									$carousel_thumbs_output .='<img alt="'.$image_alt.'" width="'.$image_thumbnail[1].'" height="'.$image_thumbnail[2].'" src="'.esc_url($image_thumbnail[0]).'">';
								$carousel_thumbs_output .='</li>';

							} else {
								
								$output .='<div class="et-item et-gallery-item">';
									$output .='<div class="et-item-inner">';
										$output .='<div class="image-container">';
											$output .='<div class="image-preloader"></div>';
											$output .=$link_before;
												$output .='<img alt="'.$image_alt.'" width="'.$image_width.'" height="'.$image_height.'" src="'.esc_url($image_src).'">';
											$output .=$link_after;
										$output .='</div>';
									$output .='</div>';
								$output .='</div>';
							}

						}

						if ($type == 'carousel-thumbs') {
							$output .= '</ul>';
						}

						if ($type == 'carousel-thumbs') {
							$output .= '<ul id="carousel-navs-'.$element_id.'" class="carousel-navs slick-thumbnail-navigation">';
								$output .= $carousel_thumbs_output;
							$output .= '</ul>';
						}
						
					$output .='</div>';

					$id_counter++;

			    	return $output;
				}

			}
			add_shortcode('et_gallery', 'et_gallery');

		/*  et-video
		/*------------*/

			function et_video( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'mp4'        => '',
					'embed'      => '',
					'image'      => '',
					'modal'      => '',
				), $atts));

				$output = '';
				
				static $id_counter = 1;



				$output .='<div id="et-video-'.$id_counter.'" class="et-video">';

					$video_poster = wp_get_attachment_image_src($image, 'full');

					if (isset($modal) && !empty($modal)) {
						$url = '';
						if(!empty($embed) && empty($mp4)) {
		                    $url   = $embed;
						} elseif(!empty($mp4)) {
							$url   = $mp4;
						}
						$output .='<a class="modal-video-poster video-modal" href="'.$url.'"><img alt="'.esc_html__('Video poster', 'enovathemes-addons').'" src="'.$video_poster[0].'" /></a>';
					} else {
						if(!empty($embed) && empty($mp4)) {
		                    $output .='<div class="plyr__video-embed plyr-element">';
		                    	if ($video_poster) {
		                    		$output .='<div class="poster" style="background-image:url('.$video_poster[0].');"></div>';
		                    	}

		                    	$embed = str_replace('watch?v=', 'embed/', $embed);
		                    	$embed = str_replace('//vimeo.com/', '//player.vimeo.com/video/', $embed);

		                        $output .='<iframe allowfullscreen="allowfullscreen" frameBorder="0" src="'.$embed.'" class="iframevideo"></iframe>';
		                    $output .='</div>';
		                } elseif(!empty($mp4)) {

		                	if ($video_poster) {
		                		$video_poster = 'poster="'.$video_poster[0].'"';
		                	}

		                    $output .='<video class="plyr-element" '.$video_poster.' playsinline controls>';
		                    	$output .='<source src="'.$mp4.'" type="video/mp4">';
		                    $output .='</video>';
		                }
					}

	                
			
				$output .='</div>';

				$id_counter++;

		    	return $output;

			}
			add_shortcode('et_video', 'et_video');

		/*  et-audio
		/*------------*/

			function et_audio( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'mp3'        => '',
				), $atts));

				$output = '';
				
				static $id_counter = 1;

                if(!empty($mp3)) {

                	$output .='<div id="et-audio-'.$id_counter.'" class="et-audio">';
	                    $output .='<audio class="plyr-element" playsinline controls>';
	                    	$output .='<source src="'.$mp3.'" type="audio/mp3">';
	                    $output .='</audio>';
                    $output .='</div>';
                }

				$id_counter++;

		    	return $output;

			}
			add_shortcode('et_audio', 'et_audio');

	/* INFOGRAPHICS
	---------------*/

		/*  et_counter
		/*------------*/

			function et_counter( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'size'           => 'small',
					'title'          => '',
					'type'           => 'h4',
					'number'         => '',
					'number_postfix' => '',
					'icon_prefix'    => '',
					'icon_name'      => '',
					'value_font_size'=> '72px',
					'title_font_size'=> '24px',
					'element_id'     => '',
					'parallax'       => 'false',
					'move'           => 'false',
					'parallax_speed' => '10',
					'parallax_x'     => '0',
					'parallax_y'     => '0',
					'rp'             => '',
				), $atts));

				$output = '';

				static $id_counter = 1;

				if (empty($icon_prefix) || !isset($icon_prefix)) {
					$icon_prefix = 'fa';
				}

				$class = array();
				$class[] = 'et-counter';
				$class[] = 'et-clearfix';
				$class[] = 'size-'.$size;

				if (isset($parallax) && $parallax == "true") {
					$class[] = 'etp-parallax';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$class = array_merge($class,$responsive_parallax);
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$attributes   = array();
				$attributes[] = 'data-to="'.$number.'"';
				$attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
				$attributes[] = 'data-move="'.esc_attr($move).'"';
				$attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
				$attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
				$attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';

				if (isset($number) && !empty($number)) {	
			    	$output .='<div id="et-counter-'.$element_id.'" class="'.implode(' ', $class).'" '.implode(' ', $attributes).'>';

			    		$output .='<div class="et-counter-inner">';

				    		$output .='<div class="counter-moving"><div class="counter-moving-child"></div></div>';

				    		$output .='<div class="counter-content">';
				    		
					    		$output .='<div class="counter-value" data-font="'.esc_attr($value_font_size).'">';

						    		if (isset($icon_name) && !empty($icon_name)) {
							        	$output .= '<span class="counter-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
						    		}

						    		$output .='<span class="counter"></span>';

					    			if (isset($number_postfix) && !empty($number_postfix)) {
						    			$output .='<span class="postfix">'.esc_attr($number_postfix).'</span>';
						    		}

						    	$output .='</div>';

					    		if (isset($title) && !empty($title)) {
					    			$output .='<'.$type.' class="counter-title" data-font="'.esc_attr($title_font_size).'">'.esc_html($title).'</'.$type.'>';
					    		}

				    		$output .='</div>';

			    		$output .='</div>';

			    	$output .='</div>';

			    	$id_counter++;

			    	return $output;
				}

			}
			add_shortcode('et_counter', 'et_counter');

		/*  et_progress
		/*------------*/

			function et_progress( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'title'	         => '',
					'percentage'	 => '',
					'element_id'     => '',
					'icon_prefix'    => '',
					'icon_name'      => '',
				), $atts));

				$output = '';

				static $id_counter = 1;

				if (empty($icon_prefix) || !isset($icon_prefix)) {
					$icon_prefix = 'fa';
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if(!is_numeric($percentage) || $percentage < 0){$percentage = "";} 
				elseif ($percentage > 100) {$percentage = "100";}
			
				if (isset($percentage) && !empty($percentage)) {

					$output .= '<div id="et-progress-'.$element_id.'" class="et-progress">';
						$output .= '<div class="text">';
							$output .= '<h5 class="title">';
								if (isset($icon_name) && !empty($icon_name)) {
						        	$output .= '<span class="counter-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
					    		}
								$output .= esc_attr($title);
							$output .= '</h5>';
							$output .= '<span class="percent">'.absint($percentage).'</span>';
						$output .= '</div>';
						$output .= '<div class="track-bar">';
							$output .= '<div class="bar" data-percentage="'.absint($percentage).'"></div>';
							$output .= '<div class="track"></div>';
						$output .= '</div>';
					$output .= '</div>';

					$id_counter++;

			    	return $output;
				}

			}
			add_shortcode('et_progress', 'et_progress');

		/*  et_circle_progress
		/*------------*/

			function et_circle_progress( $atts, $content = null ) {

				global $samatex_enovathemes;

				$main_color = (isset($GLOBALS['samatex_enovathemes']['main-color']) && $GLOBALS['samatex_enovathemes']['main-color']) ? $GLOBALS['samatex_enovathemes']['main-color'] : '#ffd311';

				extract(shortcode_atts(array(
					'size'           => 'small',
					'title'          => '',
					'type'           => 'h6',
					'value_font_size'=> '48px',
					'title_font_size'=> '18px',
					'percentage'	 => '',
					'icon_prefix'    => '',
					'icon_name'      => '',
					'bar_color'      => $main_color,
					'track_color'    => '#e0e0e0',
					'element_id'     => '',
					'parallax'       => 'false',
					'move'           => 'false',
					'parallax_speed' => '10',
					'parallax_x'     => '0',
					'parallax_y'     => '0',
					'rp'             => '',
				), $atts));

				$output = '';

				static $id_counter = 1;

				if (empty($icon_prefix) || !isset($icon_prefix)) {
					$icon_prefix = 'fa';
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if(!is_numeric($percentage) || $percentage < 0){$percentage = "";} 
				elseif ($percentage > 100) {$percentage = "100";}

				$class = array();
				$class[] = 'et-circle-progress';
				$class[] = 'size-'.$size;

				if (isset($parallax) && $parallax == "true") {
					$class[] = 'etp-parallax';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$class = array_merge($class,$responsive_parallax);
				}
				

				$attributes = array();

				$attributes[] = 'data-percent="'.absint($percentage).'"';
				$attributes[] = 'data-bar="'.esc_attr($bar_color).'"';
				$attributes[] = 'data-track="'.esc_attr($track_color).'"';
				$attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
				$attributes[] = 'data-move="'.esc_attr($move).'"';
				$attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
				$attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
				$attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';
			
				if (isset($percentage) && !empty($percentage)) {

					$output .= '<div id="et-circle-progress-'.$element_id.'" class="'.implode(" ", $class).'" '.implode(" ", $attributes).'>';
						$output .= '<div class="circle-content">';
							$output .= '<span class="percent" data-font="'.esc_attr($value_font_size).'">'.absint($percentage).'</span>';
							$output .= '<'.$type.' class="title" data-font="'.esc_attr($title_font_size).'">';
								if (isset($icon_name) && !empty($icon_name)) {
						        	$output .= '<span class="counter-icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
					    		}
								$output .= '<span>'.esc_html($title).'</span>';
							$output .= '</'.$type.'>';
						$output .= '</div>';
					$output .= '</div>';

					$id_counter++;

			    	return $output;
				}

			}
			add_shortcode('et_circle_progress', 'et_circle_progress');

		/*  timer
		/*------------*/

			function et_timer( $atts, $content = null ) {

				extract(shortcode_atts(array(
					'enddate' => '',
					'days'    => '',
					'hours'   => '',
					'minutes' => '',
					'seconds' => '',
					'element_id'=> ''
				), $atts));

				static $id_counter = 1;

				$output 	  = '';

				$attributes = array();

				if (isset($enddate) && !empty($enddate)) {
					$attributes[] = 'data-enddate="'.esc_attr($enddate).'"';
				}

				if (isset($days) && !empty($days)) {
					$attributes[] = 'data-days="'.esc_attr($days).'"';
				} else {
					$attributes[] = 'data-days="Days"';
				}

				if (isset($hours) && !empty($hours)) {
					$attributes[] = 'data-hours="'.esc_attr($hours).'"';
				} else {
					$attributes[] = 'data-hours="Hours"';
				}

				if (isset($minutes) && !empty($minutes)) {
					$attributes[] = 'data-minutes="'.esc_attr($minutes).'"';
				} else {
					$attributes[] = 'data-minutes="Minutes"';
				}

				if (isset($seconds) && !empty($seconds)) {
					$attributes[] = 'data-seconds="'.esc_attr($seconds).'"';
				} else {
					$attributes[] = 'data-seconds="Seconds"';
				}

				$element_id = (!empty($element_id)) ? $element_id : $id_counter;

				if (isset($enddate) && !empty($enddate)) {

					$output .='<div id="et-timer-'.$element_id.'" '.implode(" ", $attributes).' class="et-timer et-clearfix">';
						$output .='<ul>';
						  $output .='<li><div><span class="timer-count days">00</span><h5 class="days_text timer-title">'.$days.'</h5></div></li>';
							$output .='<li><div><span class="timer-count hours">00</span><h5 class="hours_text timer-title">'.$hours.'</h5></div></li>';
							$output .='<li><div><span class="timer-count minutes">00</span><h5 class="minutes_text timer-title">'.$minutes.'</h5></div></li>';
							$output .='<li><div><span class="timer-count seconds">00</span><h5 class="seconds_text timer-title">'.$seconds.'</h5></div></li>';
						$output .='</ul>';
					$output .='</div>';

					$id_counter++;

			    	return $output;
				}

			}
			add_shortcode('et_timer', 'et_timer');

	/* OTHER
	---------------*/

		/*  et_gap
		/*------------*/

			function et_gap( $atts, $content = null ) {
				extract(shortcode_atts(array(
					'extra_class' => '',
					'element_id'  => '',
					'rv'          => '',
				), $atts));

				static $id_counter = 1;

				$responsive_visibility = array();

				if (!empty($rv)) {
					$rv = explode(',', $rv);

					foreach ($rv as $key) {
						$responsive_visibility[] = 'hide'.$key;
					}
					
				}

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'et-gap';
				$class[] = 'et-clearfix';

		        $element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$class[] = 'et-gap-'.$element_id;

				if (!empty($responsive_visibility)) {
					$class = array_merge($class,$responsive_visibility);
				}

				return '<span class="'.implode(" ", $class).'"></span>';

				$id_counter++;
			}
			add_shortcode('et_gap', 'et_gap');

			function et_gap_inline( $atts, $content = null ) {
				extract(shortcode_atts(array(
					'extra_class' => '',
					'element_id'  => '',
					'rv'          => '',
				), $atts));

				static $id_counter = 1;

				$responsive_visibility = array();

				if (!empty($rv)) {
					$rv = explode(',', $rv);

					foreach ($rv as $key) {
						$responsive_visibility[] = 'hide'.$key;
					}
					
				}

				$class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

				$class[] = 'et-gap-inline';
				$class[] = 'et-clearfix';

		        $element_id = (!empty($element_id)) ? $element_id : $id_counter;

				$class[] = 'et-gap-inline-'.$element_id;

				if (!empty($responsive_visibility)) {
					$class = array_merge($class,$responsive_visibility);
				}

				return '<div class="'.implode(" ", $class).'"></div>';

				$id_counter++;
			}
			add_shortcode('et_gap_inline', 'et_gap_inline');

/*  HEADER BUILDER
/*------------*/

	/*	et_header_logo
	--------------*/

		function et_header_logo($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'logo'            		=> '',
					'retina_logo'           => '',
					'sticky_logo'           => '',
					'sticky_retina_logo'    => '',
					'align'                 => 'none',
					'extra_class'     		=> '',
					'element_id'            => '',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'hbe';
			$class[] = 'header-logo';
			$class[] = 'hbe-'.$align;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			// logo

			if (!empty($logo)) {

				$logo = wp_get_attachment_image_src($logo,'full');
				$logo_src    = $logo[0];

				// retina logo

				if (!empty($retina_logo)) {

					$logo = wp_get_attachment_image_src($retina_logo,'full');
					$logo_src = $logo[0];
				}

			}

			// sticky logo

			if (!empty($sticky_logo)) {

				$sticky_logo = wp_get_attachment_image_src($sticky_logo,'full');
				$sticky_logo_src    = $sticky_logo[0];

				// sticky retina logo
				if (!empty($sticky_retina_logo)) {

					$sticky_logo = wp_get_attachment_image_src($sticky_retina_logo,'full');
					$sticky_logo_src    = $sticky_logo[0];

				}

			}

			$output .= '<div id="header-logo-'.$element_id.'" class="'.implode(" ", $class).'">';
				$output .= '<a href="'.esc_url(home_url('/')).'" title="'.get_bloginfo('name').'">';
					if (!empty($logo)) {
						$output .= '<img class="logo" src="'.$logo_src.'" alt="'.get_bloginfo('name').'">';
					}
					if (!empty($sticky_logo)) {
						$output .= '<img class="sticky-logo" src="'.$sticky_logo_src.'" alt="'.get_bloginfo('name').'">';
					}
				$output .= '</a>';
			$output .= '</div>';
			

			$id_counter++;

			return $output;
		}

		add_shortcode('et_header_logo', 'et_header_logo');

	/*	et_header_menu
	--------------*/

		function et_header_menu($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'menu'            		=> '',
					'align'                 => 'none',
					'menu_hover'            => 'none',
					'submenu_appear'        => 'none',
					'submenu_shadow'        => 'false',
					'submenu_hover'         => 'none',
					'submenu_indicator'     => 'false',
					'submenu_separator'     => 'false',
					'menu_separator'        => 'false',
					'submenu_submenu_indicator' => 'false',
					'extra_class'     		=> '',
					'element_id'            => '',
					'hide_default'          => 'false',
					'hide_sticky'           => 'false',
					'one_page'              => 'false',
					'offset'                => '0'
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'header-menu-container';
			$class[] = 'hbe';
			$class[] = 'hbe-'.$align;
			$class[] = 'one-page-'.$one_page;
			$class[] = 'one-page-offset-'.$offset;
			$class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
			$class[] = 'menu-hover-'.$menu_hover;
			$class[] = 'submenu-appear-'.$submenu_appear;
			$class[] = 'submenu-hover-'.$submenu_hover;
			$class[] = 'submenu-shadow-'.$submenu_shadow;
			$class[] = 'tl-submenu-ind-'.$submenu_indicator;
			$class[] = 'sl-submenu-ind-'.$submenu_submenu_indicator;
			$class[] = 'separator-'.$submenu_separator;
			$class[] = 'top-separator-'.$menu_separator;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			if (empty($menu) || $menu == "choose" || !isset($menu)) {
				if (has_nav_menu( 'header-menu' )) {
					$menu_arg = array( 
						'theme_location'  => 'header-menu', 
						'menu_class'      => 'header-menu hbe-inner et-clearfix', 
						'menu_id'         => 'header-menu-'.$element_id,
						'container'       => 'nav', 
						'container_class' => implode(" ", $class), 
						'container_id'    => 'header-menu-container-'.$element_id, 
						'echo'            => false,
						'link_before'     => '<span class="txt">',
						'link_after'      => '</span><span class="arrow-down"></span>',
						'depth'           => 4,
						'walker'          => new et_scm_walker
					);
				}
			} else {
				$menu_arg = array( 
					'menu'  => $menu, 
					'menu_class'      => 'header-menu hbe-inner et-clearfix', 
					'menu_id'         => 'header-menu-'.$element_id,
					'container'       => 'nav', 
					'container_class' => implode(" ", $class), 
					'container_id'    => 'header-menu-container-'.$element_id, 
					'echo'            => false,
					'link_before'     => '<span class="txt">',
					'link_after'      => '</span><span class="arrow-down"></span>',
					'depth'           => 4,
					'walker'          => new et_scm_walker
				);
			}

			$output .= wp_nav_menu($menu_arg);

			$id_counter++;

			return $output;
		}

		add_shortcode('et_header_menu', 'et_header_menu');

	/*	et_megamenu
	--------------*/

		function et_megamenu($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'menu'              => '',
					'submenu_hover'     => 'none',
					'submenu_separator' => 'false',
					'extra_class'       => '',
					'element_id'        => '',
					'columns'           => '1'
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'mm-container';
			$class[] = 'submenu-hover-'.$submenu_hover;
			$class[] = 'separator-'.$submenu_separator;
			$class[] = 'column-'.$columns;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$menu_arg = array( 
				'menu'  => $menu, 
				'menu_class'      => 'mm-'.$element_id.' et-mm et-clearfix', 
				'container'       => 'div', 
				'container_class' => implode(" ", $class), 
				'container_id'    => 'mm-container-'.$element_id, 
				'echo'            => false,
				'link_before'     => '<span class="txt">',
				'link_after'      => '</span>',
				'depth'           => 3,
				'walker'          => new et_scm_walker
			);

			$output .= wp_nav_menu($menu_arg);

			$id_counter++;

			return $output;
		}

		add_shortcode('et_megamenu', 'et_megamenu');

	/*	et_megamenu_tab
	--------------*/

		function et_megamenu_tab($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'size'       => 'small',
					'menu_hover' => 'none',
					'element_id' => ''
				), $atts)
			);

			$output = '';

			$class = array();

			$class[] = 'megamenu-tab';
			$class[] = 'et-clearfix';
			$class[] = esc_attr($size);
			$class[] = 'hover-'.$menu_hover;

			if (!isset($element_id) || empty($element_id)) {
				$element_id = rand(1,1000000);
			}

			$output .='<div id="megamenu-tab-'.$element_id.'" class="'.implode(" ", $class).'">';
				$output .= do_shortcode($content);
			$output .= '</div>';

			return $output;
			
		}
		add_shortcode('et_megamenu_tab', 'et_megamenu_tab');
		
		function et_megamenu_tab_item($atts, $content = null) {

			extract(shortcode_atts(array(
				'title' 	  => '',
				'icon_prefix' => '',
				'icon_name'   => '',
				'active'  	  => 'false',
			), $atts));

			$output = '';

			$id_counter = rand(1,1000000);

			if($active == 'true'){
				$active = "active";
			}

			if (!isset($icon_prefix) || empty($icon_prefix)) {
				$icon_prefix = 'fa';
			}

			$output .= '<div data-target="tab-item-'. sanitize_title( $title ) .'" class="'.esc_attr($active).' tab-item et-clearfix">';
				if (isset($icon_name) && !empty($icon_name)) {
					$output .= '<span class="icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
				}
				if (isset($title) && !empty($title)) {
					$output .= '<span class="txt">'.esc_attr($title).'</span>';
				}
				$output .= '<span class="arrow"></span>';
			$output .= '</div> ';
			$output .= '<div id="tab-item-'.sanitize_title($title).'-'.$id_counter.'" class="tab-content et-clearfix">';
			    $output .= do_shortcode($content);
			$output .= '</div>';

			return $output;
		}
		add_shortcode('et_megamenu_tab_item', 'et_megamenu_tab_item');

	/*	et_search_toggle
	--------------*/

		function et_search_toggle($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'icon'            		=> 'ien-esearch-15',
					'close_icon'            => 'ien-eclose-3',
					'align'                 => 'none',
					'box_align'             => 'left',
					'size'                  => 'medium',
					'extra_class'     		=> '',
					'element_id'            => '',
					'hide_default'          => 'false',
					'hide_sticky'           => 'false',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'header-search';
			$class[] = 'hbe hbe-icon-element';
			$class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
			$class[] = 'hbe-'.$align;
			$class[] = 'size-'.$size;
			$class[] = 'box-align-'.$box_align;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$output .= '<div id="header-search-'.$element_id.'" class="'.implode(" ", $class).'">';
				$output .= '<div id="search-toggle-'.$element_id.'" class="search-toggle hbe-toggle '.esc_attr($icon).'" data-icon="'.esc_attr($icon).'" data-close-icon="'.esc_attr($close_icon).'"></div>';
				$output .= '<div id="search-box-'.$element_id.'" class="search-box">'.get_search_form(false).'</div>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('et_search_toggle', 'et_search_toggle');

	/*	et_search_form
	--------------*/

		function et_search_form($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'icon'            		=> 'ien-esearch-15',
					'align'                 => 'none',
					'extra_class'     		=> '',
					'element_id'            => '',
					'hide_default'          => 'false',
					'hide_sticky'           => 'false',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'header-search-form';
			$class[] = 'hbe hbe-icon-element';
			$class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
			$class[] = 'hbe-'.$align;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$output .= '<div id="header-search-form-'.$element_id.'" class="'.implode(" ", $class).'">';
				$output .= '<form id="search-form-'.$element_id.'" class="search-form" action="'.esc_url(home_url("/")).'" method="get">';
				    $output .= '<fieldset>';
				        $output .= '<input type="text" name="s" id="s" placeholder="'.esc_attr__("Search...", "enovathemes-addons").'" />';
				        $output .= '<input type="submit" id="searchsubmit" />';
				    	$output .= '<div id="search-icon-'.$element_id.'" class="search-icon '.esc_attr($icon).'"></div>';
				    $output .= '</fieldset>';
				$output .= '</form>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('et_search_form', 'et_search_form');

	/*  et_cart_toggle
    --------------*/

        function et_cart_toggle($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'icon'                  => 'ien-ecart-35',
                    'close_icon'            => 'ien-eclose-3',
                    'align'                 => 'none',
                    'box_align'             => 'left',
                    'size'                  => 'medium',
                    'extra_class'           => '',
                    'element_id'            => '',
                    'hide_default'          => 'false',
					'hide_sticky'           => 'false',
                ), $atts)
            );
            

            static $id_counter = 1;

            global $woocommerce;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'header-cart';
            $class[] = 'hbe hbe-icon-element';
            $class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
            $class[] = 'hbe-'.$align;
            $class[] = 'size-'.$size;
            $class[] = 'box-align-'.$box_align;

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            $output .= '<div id="header-cart-'.$element_id.'" class="'.implode(" ", $class).'">';
                $output .= '<div id="cart-toggle-'.$element_id.'" class="cart-toggle hbe-toggle '.esc_attr($icon).'" data-close-icon="'.esc_attr($close_icon).'">';
	            	
	            	if (class_exists('Woocommerce')){    
		                $output .= '<a class="cart-contents" href="'.esc_url(wc_get_cart_url()).'" title="'.esc_html__('View your shopping cart', 'enovathemes-addons').'">';
				            $output .= '<span class="cart-title">'.esc_html__('Cart','enovathemes-addons').'</span>';
				            $output .= '<span class="cart-total">'.$woocommerce->cart->get_cart_total().'</span>';
				            $output .= '<span class="cart-info">'.$woocommerce->cart->cart_contents_count.'</span>';
				        $output .= '</a>';
			        } else {
			        	$output .= '<a class="cart-contents" href="#" title="'.esc_html__('View your shopping cart', 'enovathemes-addons').'">';
				            $output .= '<span class="cart-title">'.esc_html__('Cart','enovathemes-addons').'</span>';
				            $output .= '<span class="cart-total">0</span>';
				            $output .= '<span class="cart-info">0</span>';
				        $output .= '</a>';
			        }

		        $output .= '</div>';

		        if (class_exists('Woocommerce')){
                	$output .= '<div id="cart-box-'.$element_id.'" class="cart-box">'.samatex_enovathemes_get_the_widget( 'WC_Widget_Cart', 'title=Cart' ).'</div>';
                } else {
                	$output .= '<div id="cart-box-'.$element_id.'" class="cart-box">'.esc_html__('Please install Woocommerce','enovathemes-addons').'</div>';
                }

            $output .= '</div>';

            $id_counter++;

            return $output;
        	
        }

        add_shortcode('et_cart_toggle', 'et_cart_toggle');

    /*  et_language_switcher
    --------------*/

        function et_language_switcher($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'align'        => 'none',
                    'close_icon'   => 'ien-eclose-3',
                    'box_align'    => 'center',
                    'extra_class'  => '',
                    'element_id'   => '',
                    'hide_default' => 'false',
					'hide_sticky'  => 'false',
					'size'         => 'medium',
                ), $atts)
            );

	            static $id_counter = 1;

	            $output      = '';

	            $class = array();

				if (!empty($extra_class)) {
					$class[] = esc_attr($extra_class);
				}

	            $class[] = 'language-switcher';
	            $class[] = 'hbe';
	            $class[] = 'hide-default-'.$hide_default;
				$class[] = 'hide-sticky-'.$hide_sticky;
	            $class[] = 'hbe-'.$align;

	            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

	            $output .= '<div id="language-switcher-'.$element_id.'" class="'.implode(" ", $class).'">';

	            	$output .= '<div class="language-switcher-wrapper hbe-icon-element size-'.$size.' box-align-'.$box_align.'">';
	                	
	                	$output .= '<div class="language-toggle sm-globe hbe-toggle" data-close-icon="'.esc_attr($close_icon).'"></div>';

		            	if (class_exists('SitePress')){

		            		$languages = icl_get_languages('skip_missing=0');

		            		if(1 < count($languages)){
		            			$output .= '<ul class="wpml-ls">';
								    foreach($languages as $l){
								    	$output .= '<li><a href="'.$l['url'].'"><img src="'.$l['country_flag_url'].'" />'.$l['translated_name'].'</a><li>';
								    }
							    $output .= '</ul>';
							}

						}elseif(function_exists('pll_the_languages')) {
							$output .= '<ul class="polylang-ls">';
								$output .=pll_the_languages(
									array(
										'echo'=>0,
										'show_flags'=>1,
										'hide_if_empty'=>0
									)
								);
							$output .= '</ul>';
						} else {
							$output .= '<ul class="no-ls">';
								$output .= '<li><a target="_blank" href="//wordpress.org/plugins/polylang/">'.esc_html__("Polylang","enovathemes-addons").'</a></li>';
								$output .= '<li><a target="_blank" href="//wpml.org/">'.esc_html__("WPML","enovathemes-addons").'</a></li>';
							$output .= '</ul>';
						}

					$output .= '</div>';

	            $output .= '</div>';

	            $id_counter++;

	            return $output;
            
        }

        add_shortcode('et_language_switcher', 'et_language_switcher');

    /*	et_sidebar_toggle
	--------------*/

		function et_sidebar_toggle($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'icon'            		=> 'ien-emenu-1',
					'close_icon'            => 'ien-eclose-3',
					'align'                 => 'none',
					'size'                  => 'medium',
					'extra_class'     		=> '',
					'element_id'            => '',
					'hide_default'          => 'false',
					'hide_sticky'           => 'false',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'header-sidebar';
			$class[] = 'hbe hbe-icon-element';
			$class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
			$class[] = 'hbe-'.$align;
			$class[] = 'size-'.$size;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$output .= '<div id="header-sidebar-'.$element_id.'" class="'.implode(" ", $class).'">';
				$output .= '<div id="sidebar-toggle-'.$element_id.'" class="sidebar-toggle hbe-toggle '.esc_attr($icon).'" data-close-icon="'.esc_attr($close_icon).'"></div>';
			$output .= '</div>';

			$id_counter++;

			return $output;

		}

		add_shortcode('et_sidebar_toggle', 'et_sidebar_toggle');

	/*	et_login_toggle
	--------------*/

		function et_login_toggle($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'icon'        => 'ien-euser-1',
					'close_icon'  => 'ien-eclose-3',
					'align'       => 'none',
					'box_align'   => 'left',
					'size'        => 'medium',
					'extra_class' => '',
					'element_id'  => '',
					'hide_default'=> 'false',
					'hide_sticky' => 'false',
					'registration_link'  => '',
	 				'forgot_link'  => '',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'header-login';
			$class[] = 'hbe hbe-icon-element';
			$class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
			$class[] = 'hbe-'.$align;
			$class[] = 'size-'.$size;
			$class[] = 'box-align-'.$box_align;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$output .= '<div id="header-login-'.$element_id.'" class="'.implode(" ", $class).'">';
				$output .= '<div id="login-toggle-'.$element_id.'" class="login-toggle hbe-toggle '.esc_attr($icon).'" data-close-icon="'.esc_attr($close_icon).'">';
					$output .= '<div id="login-title-'.$element_id.'" class="login-title login">'.esc_html__("Login","enovathemes-addons").'</div>';
					$output .= '<div id="login-title-'.$element_id.'" class="login-title logout">'.esc_html__("Logout","enovathemes-addons").'</div>';
				$output .= '</div>';
				$instance = array('title'=> '','registration_link'=>$registration_link,'forgot_link'=>$forgot_link);
				$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Login', $instance,'');
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('et_login_toggle', 'et_login_toggle');

	/*	et_header_slogan
	--------------*/

		function et_header_slogan($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'align'       => 'none',
					'extra_class' => '',
					'element_id'  => '',
					'hide_default'=> 'false',
					'hide_sticky' => 'false',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'hbe';
			$class[] = 'header-slogan';
			$class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
			$class[] = 'hbe-'.$align;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$output .= '<div id="header-slogan-'.$element_id.'" class="'.implode(" ", $class).'">';
				$output .= do_shortcode($content);
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('et_header_slogan', 'et_header_slogan');

	/*	et_header_social_links
	--------------*/

		function et_header_social_links($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'align'                 => 'none',
					'size'                  => 'medium',
					'extra_class'     		=> '',
					'element_id'            => '',
					'target' 				=> '_self',
					'styling_original'      => 'false',
					'hide_default'          => 'false',
					'hide_sticky'           => 'false',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'header-social-links';
			$class[] = 'hbe hbe-icon-element';
			$class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
			$class[] = 'hbe-'.$align;
			$class[] = 'size-'.$size;
			$class[] = 'styling-original-'.$styling_original;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$output .= '<div id="header-social-links-'.$element_id.'" class="'.implode(" ", $class).'">';
				foreach($atts as $social => $href) {
					if($href && $social != 'target' && $social != 'icon_color' && $social != 'icon_color_hover' && $social != 'icon_background_color' && $social != 'icon_background_color' && $social != 'icon_background_color_hover' && $social != 'icon_border_color' && $social != 'icon_border_color_hover' && $social != 'icon_border_width' && $social != 'styling_original' && $social != 'size' && $social != 'icon_size' && $social != 'icon_box_size' && $social != 'margin' && $social != 'element_id' && $social != 'element_css' && $social != 'align') {
						if ($social == 'email') {
							$output .='<a class="ien-'.$social.'" href="'.esc_attr($href).'" target="'.esc_attr($target).'"></a>';
						} elseif ($social == 'skype') {
							$output .='<a class="ien-'.$social.'" href="'.esc_attr($href).'" target="'.esc_attr($target).'"></a>';
						} else {
							$output .='<a class="ien-'.$social.'" href="'.esc_url($href).'" target="'.esc_attr($target).'"></a>';
						}
					}
				}
			$output .= '</div>';

			$id_counter++;

			return $output;
		}
		add_shortcode('et_header_social_links', 'et_header_social_links');

	/*	et_header_vertical_separator
	--------------*/

		function et_header_vertical_separator($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'type'        => 'solid',
					'align'       => 'none',
					'extra_class' => '',
					'element_id'  => '',
					'width'       => '',
					'height'      => '',
					'hide_default'=> 'false',
					'hide_sticky' => 'false',
				), $atts)
			);

			static $id_counter = 1;

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'header-vertical-separator';
            $class[] = 'hbe';
            $class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
            $class[] = 'hbe-'.$align;
            $class[] = $type;

			if (isset($width) && !empty($width)) {
				if ($width > $height) {
					$class[] = 'horizontal';
				} else {
					$class[] = 'vertical';
				}
			} else {
				$class[] = 'horizontal';
			}

	        $element_id = (!empty($element_id)) ? $element_id : $id_counter;

	        $class[] = 'header-vertical-separator-'.$element_id;

			$output = '<div class="'.implode(" ", $class).'"><div class="line"></div></div>';
			
			$id_counter++;

			return $output;
		}
		add_shortcode('et_header_vertical_separator', 'et_header_vertical_separator');

	/*  et_header_icon
    --------------*/

        function et_header_icon($atts, $content = null) {

            extract(shortcode_atts(
                array(
                	'icon_prefix' => '',
					'icon_name'   => '',
					'icon_link'   => '',
					'target' 	  => '_self',
                    'align'       => 'none',
                    'size'        => 'medium',
                    'extra_class' => '',
                    'element_id'  => '',
                    'hide_default'=> 'false',
					'hide_sticky' => 'false',
                ), $atts)
            );


            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'header-icon';
            $class[] = 'hbe hbe-icon-element';
            $class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
            $class[] = 'hbe-'.$align;
            $class[] = 'size-'.$size;

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            if (!isset($icon_prefix) || empty($icon_prefix)) {
				$icon_prefix = 'fa';
			}

			if (isset($icon_name) && !empty($icon_name)) {

	            $output .= '<div id="header-icon-'.$element_id.'" class="'.implode(" ", $class).'">';
	            	if (!empty($icon_link)) {
	            		$output .= '<a href="'.esc_url($icon_link).'" target="'.esc_attr($target).'" class="hbe-toggle hicon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></a>';
	            	} else {
	            		$output .= '<span class="hbe-toggle hicon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
	            	}
	            $output .= '</div>';

	            $id_counter++;

	            return $output;

	        }
        }

        add_shortcode('et_header_icon', 'et_header_icon');

    /*  et_header_button
    --------------*/

	    function et_header_button( $atts, $content = null ) {

			extract(shortcode_atts(array(
				'button_text' 		=> '',
				'button_link' 	    => '',
				'target'            => '_self',
				'button_link_modal' => 'false',
				'size' 		        => 'medium',
				'button_shadow' 	=> 'false',
				'button_border_radius' 	=> '',
				'icon_prefix' 		=> '',
				'icon_name' 	    => '',
				'icon_position'     => 'left',
				'animate_hover' 	=> 'none',
				'animate_click' 	=> 'none',
				'click_smooth' 	    => 'false',
				'align'             => 'none',
				'animation'         => 'none',
				'animation_delay'   => '',
				'extra_class'       => '',
	            'element_id'        => '',
	            'hide_default'      => 'false',
				'hide_sticky'       => 'false',
			), $atts));

			static $id_counter = 1;

            $output      = '';

            $class = array();
            $link_class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'et-header-button';
            $class[] = 'hbe hbe-icon-element';
            $class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
            $class[] = 'hbe-'.$align;

            $link_class[] = 'et-button';
            $link_class[] = 'icon-position-'.$icon_position;
            $link_class[] = 'modal-'.$button_link_modal;
            $link_class[] = $size;
            $link_class[] = 'hover-'.$animate_hover;
            $link_class[] = 'click-'.$animate_click;
            $link_class[] = 'smooth-'.$click_smooth;

            if ($animation == "none") {
				$animation = "no-animation";
			} else {
				$class[] = 'wpb_animate_when_almost_visible';
				$class[] = esc_attr($animation);
			}

			if ($button_link_modal == "true") {
				$target = "_self";
			}

			if (isset($icon_name) && !empty($icon_name)) {
				$class[] = 'has-icon';
			}

			if (isset($click_smooth) && $click_smooth == "true") {
				$class[] = 'click-smooth';
			}

			if (isset($button_border_radius) && !empty($button_border_radius) && $button_border_radius >= 16) {
	            $class[] = 'border-radius-large';
	        }

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

			if ($button_link_modal == "true") {$target = "_self";}

			$attributes   = array();
			$attributes[] = 'target="'.esc_attr($target).'"';
			$attributes[] = 'href="'.esc_url($button_link).'"';
			$attributes[] = 'data-animation-delay="'.esc_attr($animation_delay).'"';

			if (isset($button_text) && !empty($button_text) && isset($button_link) && !empty($button_link)) {

				$output .='<div id="et-header-button-'.$element_id.'" class="'.implode(" ", $class).'">';

					$output .='<a target="'.$target.'" href="'.esc_url($button_link).'" class="'.implode(" ", $link_class).'">';
						
						if ($animate_hover == "glint") {$output .='<span class="glint"></span>';}

						$output .='<span class="hover"></span>';
						$output .='<span class="regular"></span>';

						if ($animate_click == "material") {
							$output .='<span class="et-ink"></span>';
						}

						if (!isset($icon_prefix) || empty($icon_prefix)) {
							$icon_prefix = 'fa';
						}

						if ($icon_position == "left") {
							if (isset($icon_name) && !empty($icon_name)) {
								$output .='<span class="icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
							}
							$output .='<span class="text">'.esc_attr($button_text).'</span>';
						} else {
							$output .='<span class="text">'.esc_attr($button_text).'</span>';
							if (isset($icon_name) && !empty($icon_name)) {
								$output .='<span class="icon '.esc_attr($icon_prefix).' '.esc_attr($icon_name).'"></span>';
							}
						}
						
					$output .='</a>';

				$output .='</div>';
			}

			$id_counter++;

			return $output;
		}
		add_shortcode('et_header_button', 'et_header_button');

	/*  et_align_container
    --------------*/

        function et_align_container($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'extra_class' => '',
                    'align'       => 'none',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] ='align-container';
            $class[] ='align-'.$align;

            $output .= '<div id="align-container-'.$id_counter.'" class="'.implode(" ", $class).'">'.do_shortcode($content).'</div>';

			$id_counter++;

	        return $output;
        }

        add_shortcode('et_align_container', 'et_align_container');

	/*  et_header_mobile_container
    --------------*/

        function et_header_mobile_container($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'extra_class' => '',
                    'element_id'  => '',
                    'effect'      => 'left',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'mobile-container';
            $class[] = 'effect-'.$effect;

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            $output .= '<div id="mobile-container-overlay-'.$element_id.'" class="mobile-container-overlay"></div><div id="mobile-container-'.$element_id.'" class="'.implode(" ", $class).'">'.do_shortcode($content).'</div>';

			$id_counter++;

	        return $output;
        }

        add_shortcode('et_header_mobile_container', 'et_header_mobile_container');

    /*	et_mobile_toggle
	--------------*/

		function et_mobile_toggle($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'icon'            		=> 'ien-emenu-1',
					'close_icon'            => 'ien-eclose-3',
					'align'                 => 'none',
					'size'                  => 'medium',
					'extra_class'     		=> '',
					'element_id'            => '',
					'hide_default'          => 'false',
					'hide_sticky'           => 'false',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'mobile-container-toggle';
			$class[] = 'hbe hbe-icon-element';
			$class[] = 'hide-default-'.$hide_default;
			$class[] = 'hide-sticky-'.$hide_sticky;
			$class[] = 'hbe-'.$align;
			$class[] = 'size-'.$size;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$output .= '<div id="mobile-container-toggle-'.$element_id.'" class="'.implode(" ", $class).'">';
				$output .= '<div id="mobile-toggle-'.$element_id.'" class="mobile-toggle hbe-toggle '.esc_attr($icon).'" data-close-icon="'.esc_attr($close_icon).'"></div>';
			$output .= '</div>';

			$id_counter++;

			return $output;

		}

		add_shortcode('et_mobile_toggle', 'et_mobile_toggle');

	/* et_mobile_close
    --------------*/

        function et_mobile_close($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'icon'                  => 'ien-eclose-3',
                    'align'                 => 'none',
                    'size'                  => 'medium',
                    'extra_class'           => '',
                    'element_id'            => '',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'mobile-container-close';
            $class[] = 'hbe hbe-icon-element';
            $class[] = 'hbe-'.$align;
            $class[] = 'size-'.$size;

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            $output .= '<div id="mobile-container-close-'.$element_id.'" class="'.implode(" ", $class).'">';
                $output .= '<div id="mobile-close-'.$element_id.'" class="mobile-close hbe-toggle '.esc_attr($icon).'"></div>';
            $output .= '</div>';

            $id_counter++;

            return $output;

        }

        add_shortcode('et_mobile_close', 'et_mobile_close');

	/*	et_mobile_menu
	--------------*/

		function et_mobile_menu($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'menu'            		=> 'choose',
					'extra_class'     		=> '',
					'element_id'            => '',
					'text_align'            => 'left'
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'mobile-menu-container';
			$class[] = 'hbe';
			$class[] = 'text-align-'.$text_align;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			if (empty($menu) || $menu == "choose" || !isset($menu)) {
				if (has_nav_menu( 'header-menu' )) {
					$menu_arg = array( 
						'theme_location'  => 'header-menu', 
						'menu_class'      => 'mobile-menu hbe-inner et-clearfix', 
						'menu_id'         => 'mobile-menu-'.$element_id,
						'container'       => 'div', 
						'container_class' => implode(" ", $class), 
						'container_id'    => 'mobile-menu-container-'.$element_id, 
						'echo'            => false,
						'link_before'     => '<span class="txt">',
						'link_after'      => '</span><span class="arrow-down"></span>',
						'depth'           => 4,
					);
				}
			} else {
				$menu_arg = array( 
					'menu'  => $menu, 
					'menu_class'      => 'mobile-menu hbe-inner et-clearfix', 
					'menu_id'         => 'mobile-menu-'.$element_id,
					'container'       => 'div', 
					'container_class' => implode(" ", $class), 
					'container_id'    => 'mobile-menu-container-'.$element_id, 
					'echo'            => false,
					'link_before'     => '<span class="txt">',
					'link_after'      => '</span><span class="arrow-down"></span>',
					'depth'           => 4,
				);
			}

			$output .= wp_nav_menu($menu_arg);

			$id_counter++;

			return $output;
		}

		add_shortcode('et_mobile_menu', 'et_mobile_menu');

	/*  et_header_modal_container
    --------------*/

        function et_header_modal_container($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'extra_class' => '',
                    'element_id'  => '',
                    'effect'      => 'left',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'modal-container';
            $class[] = 'effect-'.$effect;

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            $output .= '<div id="modal-container-'.$element_id.'" class="'.implode(" ", $class).'"><div class="modal-container-content">'.do_shortcode($content).'</div></div>';

            $id_counter++;

            return $output;
        }

        add_shortcode('et_header_modal_container', 'et_header_modal_container');

    /*  et_modal_toggle
    --------------*/

        function et_modal_toggle($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'icon'                  => 'ien-emenu-1',
                    'close_icon'            => 'ien-eclose-3',
                    'align'                 => 'none',
                    'size'                  => 'medium',
                    'extra_class'           => '',
                    'element_id'            => '',
                    'hide_default'          => 'false',
                    'hide_sticky'           => 'false',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'modal-container-toggle';
            $class[] = 'hbe hbe-icon-element';
            $class[] = 'hide-default-'.$hide_default;
            $class[] = 'hide-sticky-'.$hide_sticky;
            $class[] = 'hbe-'.$align;
            $class[] = 'size-'.$size;

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            $output .= '<div id="modal-container-toggle-'.$element_id.'" class="'.implode(" ", $class).'">';
                $output .= '<div id="modal-toggle-'.$element_id.'" class="modal-toggle hbe-toggle '.esc_attr($icon).'" data-close-icon="'.esc_attr($close_icon).'"></div>';
            $output .= '</div>';

            $id_counter++;

            return $output;

        }

        add_shortcode('et_modal_toggle', 'et_modal_toggle');

    /* et_modal_close
    --------------*/

        function et_modal_close($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'icon'                  => 'ien-eclose-3',
                    'align'                 => 'none',
                    'size'                  => 'medium',
                    'extra_class'           => '',
                    'element_id'            => '',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'modal-container-close';
            $class[] = 'hbe hbe-icon-element';
            $class[] = 'hbe-'.$align;
            $class[] = 'size-'.$size;

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            $output .= '<div id="modal-container-close-'.$element_id.'" class="'.implode(" ", $class).'">';
                $output .= '<div id="modal-close-'.$element_id.'" class="modal-close hbe-toggle '.esc_attr($icon).'"></div>';
            $output .= '</div>';

            $id_counter++;

            return $output;

        }

        add_shortcode('et_modal_close', 'et_modal_close');

    /*  et_modal_menu
    --------------*/

        function et_modal_menu($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'menu'                  => 'choose',
                    'extra_class'           => '',
                    'element_id'            => '',
                    'text_align'            => 'left'
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'modal-menu-container';
            $class[] = 'hbe';
            $class[] = 'text-align-'.$text_align;

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            if (empty($menu) || $menu == "choose" || !isset($menu)) {
				if (has_nav_menu( 'header-menu' )) {
					$menu_arg = array( 
						'theme_location'  => 'header-menu', 
						'menu_class'      => 'modal-menu hbe-inner et-clearfix', 
		                'menu_id'         => 'modal-menu-'.$element_id,
		                'container'       => 'div', 
		                'container_class' => implode(" ", $class), 
		                'container_id'    => 'modal-menu-container-'.$element_id, 
		                'echo'            => false,
		                'link_before'     => '<span class="txt">',
		                'link_after'      => '</span><span class="arrow-down"></span>',
		                'depth'           => 4,
					);
				}
			} else {

	            $menu_arg = array( 
	                'menu'  => $menu, 
	                'menu_class'      => 'modal-menu hbe-inner et-clearfix', 
	                'menu_id'         => 'modal-menu-'.$element_id,
	                'container'       => 'div', 
	                'container_class' => implode(" ", $class), 
	                'container_id'    => 'modal-menu-container-'.$element_id, 
	                'echo'            => false,
	                'link_before'     => '<span class="txt">',
	                'link_after'      => '</span><span class="arrow-down"></span>',
	                'depth'           => 4,
	            );

	        }

            $output .= wp_nav_menu($menu_arg);

            $id_counter++;

            return $output;
        }

        add_shortcode('et_modal_menu', 'et_modal_menu');

    /*  et_vertical_align_top
    --------------*/

        function et_vertical_align_top($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'extra_class' => '',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'snva';
            $class[] = 'vertical-align-top';

            $output .= '<div id="vertical-align-top-'.$id_counter.'" class="'.implode(" ", $class).'">'.do_shortcode($content).'</div>';

			$id_counter++;

	        return $output;
        }

        add_shortcode('et_vertical_align_top', 'et_vertical_align_top');

    /*  et_vertical_align_middle
    --------------*/

        function et_vertical_align_middle($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'extra_class' => '',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'snva';
            $class[] = 'vertical-align-middle';

            $output .= '<div id="vertical-align-middle-'.$id_counter.'" class="'.implode(" ", $class).'">'.do_shortcode($content).'</div>';

			$id_counter++;

	        return $output;
        }

        add_shortcode('et_vertical_align_middle', 'et_vertical_align_middle');

    /*  et_vertical_align_bottom
    --------------*/

        function et_vertical_align_bottom($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'extra_class' => '',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'snva';
            $class[] = 'vertical-align-bottom';

            $output .= '<div id="vertical-align-bottom-'.$id_counter.'" class="'.implode(" ", $class).'">'.do_shortcode($content).'</div>';

			$id_counter++;

	        return $output;
        }

        add_shortcode('et_vertical_align_bottom', 'et_vertical_align_bottom');

    /*  et_header_sidebar_container
    --------------*/

        function et_header_sidebar_container($atts, $content = null) {

            extract(shortcode_atts(
                array(
                    'extra_class' => '',
                    'element_id'  => '',
                ), $atts)
            );

            static $id_counter = 1;

            $output      = '';

            $class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

            $class[] = 'sidebar-container';

            $element_id = (!empty($element_id)) ? $element_id : $id_counter;

            $output .= '<div id="sidebar-container-'.$element_id.'" class="'.implode(" ", $class).'">'.do_shortcode($content).'</div>';

			$id_counter++;

	        return $output;
        }

        add_shortcode('et_header_sidebar_container', 'et_header_sidebar_container');

    /*	et_sidebar_menu
	--------------*/

		function et_sidebar_menu($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'menu'            		=> 'choose',
					'tl_text_align'         => 'left',
					'sub_text_align'        => 'left',
					'menu_hover'            => 'none',
					'submenu_appear'        => 'none',
					'submenu_shadow'        => 'false',
					'submenu_hover'         => 'none',
					'submenu_indicator'     => 'false',
					'submenu_separator'     => 'false',
					'tl_separator'          => 'false',
					'submenu_submenu_indicator' => 'false',
					'extra_class'     		=> '',
					'element_id'            => '',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'sidebar-menu-container';
			$class[] = 'hbe';
			$class[] = 'menu-hover-'.$menu_hover;
			$class[] = 'tl-text-align-'.$tl_text_align;
			$class[] = 'sub-text-align-'.$sub_text_align;
			$class[] = 'submenu-appear-'.$submenu_appear;
			$class[] = 'submenu-hover-'.$submenu_hover;
			$class[] = 'submenu-shadow-'.$submenu_shadow;
			$class[] = 'tl-submenu-ind-'.$submenu_indicator;
			$class[] = 'sl-submenu-ind-'.$submenu_submenu_indicator;
			$class[] = 'separator-'.$submenu_separator;
			$class[] = 'tl-separator-'.$tl_separator;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			if (empty($menu) || $menu == "choose" || !isset($menu)) {
				if (has_nav_menu( 'header-menu' )) {
					$menu_arg = array( 
						'theme_location'  => 'header-menu', 
						'menu_class'      => 'sidebar-menu hbe-inner et-clearfix', 
						'menu_id'         => 'sidebar-menu-'.$element_id,
						'container'       => 'div', 
						'container_class' => implode(" ", $class), 
						'container_id'    => 'sidebar-menu-container-'.$element_id, 
						'echo'            => false,
						'link_before'     => '<span class="txt">',
						'link_after'      => '</span><span class="arrow-down"></span>',
						'depth'           => 4,
						'walker'          => new et_scm_walker
					);
				}
			} else {

				$menu_arg = array( 
					'menu'  => $menu, 
					'menu_class'      => 'sidebar-menu hbe-inner et-clearfix', 
					'menu_id'         => 'sidebar-menu-'.$element_id,
					'container'       => 'div', 
					'container_class' => implode(" ", $class), 
					'container_id'    => 'sidebar-menu-container-'.$element_id, 
					'echo'            => false,
					'link_before'     => '<span class="txt">',
					'link_after'      => '</span><span class="arrow-down"></span>',
					'depth'           => 4,
					'walker'          => new et_scm_walker
				);

			}

			$output .= wp_nav_menu($menu_arg);

			$id_counter++;

			return $output;
		}

		add_shortcode('et_sidebar_menu', 'et_sidebar_menu');

	/*	et_bullets
	--------------*/

		function et_bullets($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'menu'        => '',
					'extra_class' => '',
					'element_id'  => '',
					'offset'      => '0'
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class = array();

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$class[] = 'bullets-container';
			$class[] = 'one-page-true';
			$class[] = 'one-page-offset-'.$offset;

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$menu_arg = array( 
				'menu'  => $menu, 
				'menu_class'      => 'bullets-menu hbe-inner et-clearfix', 
				'menu_id'         => 'bullets-menu-'.$element_id,
				'container'       => 'nav', 
				'container_class' => implode(" ", $class), 
				'container_id'    => 'bullets-menu-container-'.$element_id, 
				'link_before'     => '<span class="tooltip">',
				'link_after'      => '</span>',
				'echo'            => false,
				'depth'           => 1,
			);

			$output .= wp_nav_menu($menu_arg);

			$id_counter++;

			return $output;
		}

		add_shortcode('et_bullets', 'et_bullets');

/*  TITLE SECTION
/*------------*/
	
	/*	et_title_section_title
	--------------*/

		function et_title_section_title($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'type'        => 'h1',
					'align'       => 'left',
					'tablet_align'=> 'left',
					'mobile_align'=> 'left',
					'text_align'  => 'left',
					'mobile_font_size'             => 'inherit',
					'mobile_line_height'           => 'inherit',
					'tablet_landscape_font_size'   => 'inherit',
					'tablet_landscape_line_height' => 'inherit',
					'tablet_portrait_font_size'    => 'inherit',
					'tablet_portrait_line_height'  => 'inherit',
					'extra_class' => '',
					'element_id'  => '',
					'etp_title'   => '',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class   = array();
			$class[] = 'title-section-title-container tse';
			$class[] = 'text-align-'.$text_align;
			$class[] = 'align-'.$align;
			$class[] = 'tablet-align-'.$tablet_align;
			$class[] = 'mobile-align-'.$mobile_align;

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$attributes   = array();
			$attributes[] = 'data-mobile-font="'.esc_attr($mobile_font_size).'"';
			$attributes[] = 'data-mobile-line-height="'.esc_attr($mobile_line_height).'"';
			$attributes[] = 'data-tablet-landscape-font="'.esc_attr($tablet_landscape_font_size).'"';
			$attributes[] = 'data-tablet-portrait-font="'.esc_attr($tablet_portrait_font_size).'"';
			$attributes[] = 'data-tablet-landscape-line-height="'.esc_attr($tablet_landscape_line_height).'"';
			$attributes[] = 'data-tablet-portrait-line-height="'.esc_attr($tablet_portrait_line_height).'"';

			$output .= '<div class="'.implode(" ",$class).'">';
				$output .= '<'.$type.' class="title-section-title" id="title-section-title-'.$element_id.'" '.implode(" ",$attributes).'>';
					$output .= esc_html($etp_title);
				$output .= '</'.$type.'>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('et_title_section_title', 'et_title_section_title');

	/*	et_title_section_subtitle
	--------------*/

		function et_title_section_subtitle($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'type'        => 'p',
					'align'       => 'left',
					'tablet_align'=> 'left',
					'mobile_align'=> 'left',
					'text_align'  => 'left',
					'mobile_font_size'             => 'inherit',
					'mobile_line_height'           => 'inherit',
					'tablet_landscape_font_size'   => 'inherit',
					'tablet_landscape_line_height' => 'inherit',
					'tablet_portrait_font_size'    => 'inherit',
					'tablet_portrait_line_height'  => 'inherit',
					'extra_class' => '',
					'element_id'  => '',
					'etp_subtitle'=> '',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class   = array();
			$class[] = 'title-section-subtitle-container tse';
			$class[] = 'text-align-'.$text_align;
			$class[] = 'align-'.$align;
			$class[] = 'tablet-align-'.$tablet_align;
			$class[] = 'mobile-align-'.$mobile_align;

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$attributes   = array();
			$attributes[] = 'data-mobile-font="'.esc_attr($mobile_font_size).'"';
			$attributes[] = 'data-mobile-line-height="'.esc_attr($mobile_line_height).'"';
			$attributes[] = 'data-tablet-landscape-font="'.esc_attr($tablet_landscape_font_size).'"';
			$attributes[] = 'data-tablet-portrait-font="'.esc_attr($tablet_portrait_font_size).'"';
			$attributes[] = 'data-tablet-landscape-line-height="'.esc_attr($tablet_landscape_line_height).'"';
			$attributes[] = 'data-tablet-portrait-line-height="'.esc_attr($tablet_portrait_line_height).'"';

			$output .= '<div class="'.implode(" ",$class).'">';
				$output .= '<'.$type.' class="title-section-subtitle" id="title-section-subtitle-'.$element_id.'" '.implode(" ",$attributes).'>';
					$output .= esc_html($etp_subtitle);
				$output .= '</'.$type.'>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('et_title_section_subtitle', 'et_title_section_subtitle');

	/*	et_breadcrumbs
	--------------*/

		function et_breadcrumbs($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'align'            => 'left',
					'tablet_align'     => 'left',
					'mobile_align'     => 'left',
					'text_align'       => 'left',
					'extra_class'      => '',
					'element_id'       => '',
					'etp_breadcrumbs'  => '',
				), $atts)
			);

			static $id_counter = 1;

			$output      = '';

			$class   = array();
			$class[] = 'et-breadcrumbs-container tse';
			$class[] = 'text-align-'.$text_align;
			$class[] = 'align-'.$align;
			$class[] = 'tablet-align-'.$tablet_align;
			$class[] = 'mobile-align-'.$mobile_align;

			if (!empty($extra_class)) {
				$class[] = esc_attr($extra_class);
			}

			$element_id = (!empty($element_id)) ? $element_id : $id_counter;

			$output .= '<div class="'.implode(" ",$class).'" id="et-breadcrumbs-container-'.$element_id.'">';
				$output .= '<div id="et-breadcrumbs-'.$element_id.'" class="et-breadcrumbs">'.$etp_breadcrumbs.'</div>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('et_breadcrumbs', 'et_breadcrumbs');

/*  WIDGETS
/*------------*/
	
	/*  widget_contact_form
	/*------------*/

		function widget_contact_form($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'      => '',
					'submit_text'=> esc_html__('Send', 'enovathemes-addons'),
					'recipient'  => get_option('admin_email'),
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-contact-form-'.$id_counter.'" class="widget widget_fast_contact_widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
				);

				$instance = array(
					'title'       => $title,
					'submit_text' => $submit_text,
					'recipient' => $recipient,
				);

				$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Contact_Form', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_contact_form', 'widget_contact_form');

	/*  widget_facebook
	/*------------*/

		function widget_facebook($atts, $content = null) {

			extract(shortcode_atts(
				array(
				'title'         	    => '',
	 			'app_id'        	    => '',
				'language_code' 	    => 'en_US',
				'href'          	    => '',
				'width'         	    => '',
				'height'        	    => '',
				'timeline'      	    => 'true',
				'messages'      	    => 'true',
				'events'        	    => 'true',
				'hide_cover'    	    => 'false',
				'show_facepile' 	    => 'true',
				'small_header'  	    => 'false',
				'adapt_container_width' => 'true',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-facebook-'.$id_counter.'" class="widget widget_facebook">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
				);

				$instance = array(
					'title'         	    => $title,
		 			'app_id'        	    => $app_id,
					'language_code' 	    => $language_code,
					'href'          	    => $href,
					'width'         	    => $width,
					'height'        	    => $height,
					'timeline'      	    => $timeline,
					'messages'      	    => $messages,
					'events'        	    => $events,
					'hide_cover'    	    => $hide_cover,
					'show_facepile' 	    => $show_facepile,
					'small_header'  	    => $small_header,
					'adapt_container_width' => $adapt_container_width,
				);

				$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Facebook', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_facebook', 'widget_facebook');

	/*  widget_flickr
	/*------------*/

		function widget_flickr($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'          => '',
		 			'photos_number'  => '6',
		 			'flickr_id'      => '',
		 			'image_size'     => 'square',
		 			'display'        => 'latest',
		 			'columns_mob'    => '1',
		 			'columns_tablet' => '1',
		 			'columns_desk'   => '1',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-flickr-'.$id_counter.'" class="widget widget_flickr">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
				);

				$instance = array(
					'title'       => $title,
					'photos_number'  => $photos_number,
		 			'flickr_id'      => $flickr_id,
		 			'image_size'     => $image_size,
		 			'display'        => $display,
		 			'columns_mob'    => $columns_mob,
		 			'columns_tablet' => $columns_tablet,
		 			'columns_desk'   => $columns_desk,
				);

				$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Flickr', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_flickr', 'widget_flickr');

	/*  widget_instagram
	/*------------*/

		function widget_instagram($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'          => '',
					'link'           => '',
					'username'       => '',
					'size'           => 'large',
					'number'         => 9,
					'target'         => '_self',
					'columns_mob'    => '1',
			 		'columns_tablet' => '1',
			 		'columns_desk'   => '1',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-instagram-'.$id_counter.'" class="widget widget_instagram">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
				);

				$instance = array(
					'title'          => $title,
					'link'           => $link,
					'username'       => $username,
					'size'           => $size,
					'number'         => $number,
					'target'         => $target,
					'columns_mob'    => $columns_mob,
			 		'columns_tablet' => $columns_tablet,
			 		'columns_desk'   => $columns_desk,
				);

				$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Instagram', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_instagram', 'widget_instagram');

	/*  widget_mailchimp
	/*------------*/

		function widget_mailchimp($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'       => '',
		 			'description' => '',
		 			'list'        => '',
		 			'first_name'  => 'false',
		 			'last_name'   => 'false',
		 			'phone'       => 'false',
		 			'required_first_name'  => 'false',
		 			'required_last_name'   => 'false',
		 			'required_phone'       => 'false',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-mailchimp-'.$id_counter.'" class="widget widget_mailchimp">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
				);

				$instance = array(
					'title'       => $title,
		 			'description' => $description,
		 			'list'        => $list,
		 			'first_name'  => $first_name,
		 			'last_name'   => $last_name,
		 			'phone'       => $phone,
		 			'required_first_name'  => $required_first_name,
		 			'required_last_name'   => $required_last_name,
		 			'required_phone'       => $required_phone,
				);

				$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Mailchimp', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_mailchimp', 'widget_mailchimp');

	/*  widget_posts
	/*------------*/

		function widget_posts($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title' => '',
					'number'=> '',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-posts-'.$id_counter.'" class="widget widget_et_recent_entries">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
				);

				$instance = array(
					'title'  => $title,
					'number' => intval($number),
				);

				$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Posts', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_posts', 'widget_posts');

	/*  widget_login
	/*------------*/

		function widget_login($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'             => '',
					'registration_link' => '',
					'forgot_link'       => '',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-login-'.$id_counter.'" class="widget widget_login">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
				);

				$instance = array(
					'title'  => $title,
					'registration_link'=> $registration_link,
					'forgot_link'=> $forgot_link,
				);

				$output .= samatex_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Login', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_login', 'widget_login');

	/*  widget_product_categories
	/*------------*/

		function widget_product_categories($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'              => '',
					'orderby'            => 'order',
					'dropdown'           => '',
					'count'              => '',
					'hierarchical'       => '',
					'show_children_only' => '',
					'hide_empty'         => '',
					'max_depth'          => '',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-product-categories-'.$id_counter.'" class="widget widget_product_categories">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
				);

				$instance = array(
					'title'  			 => $title,
					'orderby'            => $orderby,
					'dropdown'           => $dropdown,
					'count'              => $count,
					'hierarchical'       => $hierarchical,
					'show_children_only' => $show_children_only,
					'hide_empty'         => $hide_empty,
					'max_depth'          => $max_depth,
				);

				$output .= samatex_enovathemes_get_the_widget( 'WC_Widget_Product_Categories', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_product_categories', 'widget_product_categories');

	/*  widget_products_by_rating
	/*------------*/

		function widget_products_by_rating($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'  => '',
					'number' => ''
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-top-rated-products-'.$id_counter.'" class="widget widget_top_rated_products">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
	                'widget_id'     => $id_counter,
				);

				$instance = array(
					'title'  	=> $title,
					'number'    => $number
				);

				$output .= samatex_enovathemes_get_the_widget( 'WC_Widget_Top_Rated_Products', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_products_by_rating', 'widget_products_by_rating');

	/*  widget_products
	/*------------*/

		function widget_products($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'       => '',
					'number'      => '',
					'show'        => '',
					'orderby'     => '',
					'order'       => '',
					'hide_free'   => '',
					'show_hidden' => '',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget-products-'.$id_counter.'" class="widget widget_products">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
	                'widget_id'     => $id_counter,
				);

				$instance = array(
					'title'  	=> $title,
					'number'    => $number,
					'show'        => $show,
					'orderby'     => $orderby,
					'order'       => $order,
					'hide_free'   => $hide_free,
					'show_hidden' => $show_hidden,
				);

				$output .= samatex_enovathemes_get_the_widget( 'WC_Widget_Products', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_products', 'widget_products');

	/*  widget_recent_product_reviews
	/*------------*/

		function widget_recent_product_reviews($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'  => '',
					'number' => ''
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget_recent_reviews-'.$id_counter.'" class="widget widget_recent_reviews">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
	                'widget_id'     => $id_counter,
				);

				$instance = array(
					'title'  	=> $title,
					'number'    => $number
				);

				$output .= samatex_enovathemes_get_the_widget( 'WC_Widget_Recent_Reviews', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_recent_product_reviews', 'widget_recent_product_reviews');

	/*  widget_recent_viewed_products
	/*------------*/

		function widget_recent_viewed_products($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'  => '',
					'number' => ''
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget_recently_viewed_products-'.$id_counter.'" class="widget widget_recently_viewed_products">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
	                'widget_id'     => $id_counter,
				);

				$instance = array(
					'title'  	=> $title,
					'number'    => $number
				);

				$output .= samatex_enovathemes_get_the_widget( 'WC_Widget_Recently_Viewed', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_recent_viewed_products', 'widget_recent_viewed_products');

	/*  widget_product_tag_cloud
	/*------------*/

		function widget_product_tag_cloud($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'  => '',
				), $atts)
			);

			$output = '';

			static $id_counter = 1;

				$args = array(
					'before_widget' => '<div id="widget_product_tag_cloud-'.$id_counter.'" class="widget widget_product_tag_cloud">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget_title">',
	                'after_title'   => '</h5>',
	                'widget_id'     => $id_counter,
				);

				$instance = array(
					'title'  	=> $title,
				);

				$output .= samatex_enovathemes_get_the_widget( 'WC_Widget_Product_Tag_Cloud', $instance,$args);

			$id_counter++;

			return $output;
		}

		add_shortcode('widget_product_tag_cloud', 'widget_product_tag_cloud');

/*  WOOCOMMERCE
/*------------*/

	function et_woo_products($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'layout' 		   => 'grid',
				'navigation_type'  => 'only-arrows',
				'autoplay'         => 'false',
				'animation_effect' => 'none',
				'columns' 		   => 'small',
				'quantity' 		   => '12',
				'category' 		   => '',
				'operator' 		   => 'IN',
				'orderby' 		   => 'date',
				'order' 		   => 'ASC',
				'type' 			   => 'recent',
				'attribute' 	   => '',
				'ids' 			   => ''
			), $atts)
		);

		if (class_exists('Woocommerce')) {

			$output = '';

			global $post, $samatex_enovathemes;

			$query_options = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'meta_query'          => WC()->query->get_meta_query(),
				'tax_query'           => WC()->query->get_tax_query(),
				'ignore_sticky_posts' => 1,
				'orderby'             => $orderby,
				'order'               => $order,
				'posts_per_page' 	  => absint($quantity), 
			);

			if ($type == "custom"){
				if ( ! empty( $ids ) ) {
					$query_options['post__in'] = array_map( 'trim', explode( ',', $ids ) );
				}
			}

			if ($type == "featured"){
				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'meta_query'          => WC()->query->get_meta_query(),
					'ignore_sticky_posts' => 1,
					'orderby'             => $orderby,
					'order'               => $order,
					'posts_per_page' 	  => absint($quantity), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'featured',
							'operator' => 'IN',
						)
					),
				);
			}

			if ($type == "related"){

				if ( $post && $post->post_type ) {
					$post_type = $post->post_type;
					if (!is_wp_error($post_type)) {
						if ( empty( $product ) || ! $product->is_visible() ) {
							return;
						}
						$terms = get_the_terms( $product->get_id() , 'product_tag');
						if ($terms) {
							$tagids = array();
							foreach($terms as $tag) {$tagids[] = $tag->term_id;}
						}
						$query_options = array(
							'post_type'           => 'product',
							'post_status'         => 'publish',
							'ignore_sticky_posts' => 1,
							'posts_per_page'      => absint($quantity),
							'orderby'             => $orderby,
							'order'               => $order,
							'meta_query'          => WC()->query->get_meta_query(),
							'tax_query' => array(
			                    array(
			                        'taxonomy' => 'product_tag',
			                        'field'    => 'id',
			                        'terms'    => $tagids,
			                        'operator' => 'IN'
			                     )
			                ),
							'post__not_in'        => array($product->get_id())
						);
					}
				}
			}

			if ($type == "sale"){
				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'meta_query'          => WC()->query->get_meta_query(),
					'ignore_sticky_posts' => 1,
					'orderby'             => $orderby,
					'order'               => $order,
					'posts_per_page' 	  => absint($quantity), 
					'post__in'            => array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
				);
			}

			if ($type == "best_selling"){
				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => WC()->query->get_tax_query(),
					'ignore_sticky_posts' => 1,
					'orderby'             => $orderby,
					'order'               => $order,
					'posts_per_page' 	  => absint($quantity), 
					'meta_key'            => 'total_sales',
				);
			}

			if ($type == "attribute"){
				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'meta_query'          => WC()->query->get_meta_query(),
					'ignore_sticky_posts' => 1,
					'orderby'             => $orderby,
					'order'               => $order,
					'posts_per_page' 	  => absint($quantity), 
					'tax_query'           => array(
						array(
							'taxonomy' => strstr( $attribute, 'pa_' ) ? sanitize_title( $attribute ) : 'pa_' . sanitize_title( $attribute ),
							'terms'    => array_map( 'sanitize_title', explode( ',', $filter ) ),
							'field'    => 'slug',
						)
					),
				);
			}

			if ($type != "custom" && $type != "related" && isset($category) && !empty($category)) {
				$query_options = array( 
					'post_type'           => 'product',
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true,
					'orderby'             => $orderby,
					'order'               => $order,
					'posts_per_page' 	  => absint($quantity), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						)
					)
				);

				if ($type == "featured"){
					$query_options = array(
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'meta_query'          => WC()->query->get_meta_query(),
						'ignore_sticky_posts' => 1,
						'orderby'             => $orderby,
						'order'               => $order,
						'posts_per_page' 	  => absint($quantity), 
						'tax_query'           => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'slug',
								'terms'    => explode(',',$category),
								'operator' => $operator
							),
							array(
								'taxonomy' => 'product_visibility',
								'field'    => 'name',
								'terms'    => 'featured',
								'operator' => 'IN',
							)
						),
					);
				}

				if ($type == "sale"){
					$query_options = array(
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'meta_query'          => WC()->query->get_meta_query(),
						'ignore_sticky_posts' => 1,
						'orderby'             => $orderby,
						'order'               => $order,
						'posts_per_page' 	  => absint($quantity), 
						'post__in'            => array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
						'tax_query'           => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'slug',
								'terms'    => explode(',',$category),
								'operator' => $operator
							)
						)
					);
				}

				if ($type == "best_selling"){

					$orderby = 'meta_value_num';

					$query_options = array(
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
						'orderby'             => $orderby,
						'order'               => $order,
						'posts_per_page' 	  => absint($quantity), 
						'meta_key'            => 'total_sales',
						'tax_query'           => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'slug',
								'terms'    => explode(',',$category),
								'operator' => $operator
							)
						)
					);
				}

				if ($type == "attribute"){
					$query_options = array(
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'meta_query'          => WC()->query->get_meta_query(),
						'ignore_sticky_posts' => 1,
						'orderby'             => $orderby,
						'order'               => $order,
						'posts_per_page' 	  => absint($quantity), 
						'tax_query'           => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'slug',
								'terms'    => explode(',',$category),
								'operator' => $operator
							),
							array(
								'taxonomy' => strstr( $attribute, 'pa_' ) ? sanitize_title( $attribute ) : 'pa_' . sanitize_title( $attribute ),
								'terms'    => array_map( 'sanitize_title', explode( ',', $filter ) ),
								'field'    => 'slug',
							)
						),
					);
				}

			}

			$products = new WP_Query($query_options);

			if($products->have_posts()){

				$product_image_effect = (isset($GLOBALS['samatex_enovathemes']['product-image-effect']) && $GLOBALS['samatex_enovathemes']['product-image-effect']) ? $GLOBALS['samatex_enovathemes']['product-image-effect'] : "overlay-fade";
				$product_image_full   = (isset($GLOBALS['samatex_enovathemes']['product-image-full']) && $GLOBALS['samatex_enovathemes']['product-image-full'] == 1) ? "true" : "false";

				$class = array();

				$class[] = 'loop-posts';
				$class[] = 'loop-product';
				$class[] = 'et-item-set';
				$class[] = $product_image_effect;
				$class[] = 'effect-'.$animation_effect;
				$class[] = 'et-clearfix';

				if ($layout == "carousel") {
					$class[] = 'owl-carousel';
					$class[] = 'et-carousel';
					$class[] = 'navigation-'.$navigation_type;
				}

				if($animation_effect == "none" && $layout != 'carousel') {$class[] = "lazy lazy-load";}

				$carousel_columns = 4;

				if ($columns == 'medium') {
					$carousel_columns = 3;
				} elseif($columns == 'large') {
					$carousel_columns = 2;
				}

				$attributes = array();

				$attributes[] = 'data-columns="'.esc_attr($carousel_columns).'"';
				$attributes[] = 'data-autoplay="'.esc_attr($autoplay).'"';

				$output .= '<div class="et-woo-products product-layout '.esc_attr($columns).' '.esc_attr($layout).'">';
					$output .= '<ul class="'.esc_attr(implode(' ', $class)).'" '.implode(' ', $attributes).'>';

						while ($products->have_posts() ) {
							$products->the_post();

							global $product;

							$output .= '<li class="'.join( ' ', get_post_class('et-item et-item post')).'" id="product-'.esc_attr($product->get_id()).'">';

								ob_start();

									do_action( 'woocommerce_before_shop_loop_item' );
									do_action( 'woocommerce_before_shop_loop_item_title' );
									do_action( 'woocommerce_shop_loop_item_title' );
									do_action( 'woocommerce_after_shop_loop_item_title' );
									do_action( 'woocommerce_after_shop_loop_item' );

								$output .= ob_get_clean();

							$output .= '</li>';

						}

						wp_reset_postdata();

					$output .= '</ul>';
				$output .= '</div>';

	            return $output;

			}

		}
	}
	add_shortcode('et_woo_products', 'et_woo_products');

	function et_woo_categories($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'layout' 		   => 'grid',
				'navigation_type'  => 'only-arrows',
				'autoplay'         => 'false',
				'animation_effect' => 'none',
				'columns' 		   => 'small',
				'category' 		   => '',
				'orderby' 		   => 'date',
				'order' 		   => 'ASC',
			), $atts)
		);

		if (class_exists('Woocommerce')) {
			
			$output = '';

			global $post, $samatex_enovathemes;

			$categories = array_filter( array_map( 'trim', explode( ',', $category ) ) );

			$args = array(
				'orderby'    => $orderby,
				'order'      => $order,
				'include'    => $categories,
				'pad_counts' => true,
				'taxonomy'   => 'product_cat',
			    'hide_empty' => true, 
			);

			$product_categories = get_terms($args);

			ob_start();

			if($product_categories){

				$product_image_effect = (isset($GLOBALS['samatex_enovathemes']['product-image-effect']) && $GLOBALS['samatex_enovathemes']['product-image-effect']) ? $GLOBALS['samatex_enovathemes']['product-image-effect'] : "overlay-fade";
				$product_image_full   = (isset($GLOBALS['samatex_enovathemes']['product-image-full']) && $GLOBALS['samatex_enovathemes']['product-image-full'] == 1) ? "true" : "false";

				$class = array();

				$class[] = 'loop-posts';
				$class[] = 'loop-product';
				$class[] = 'et-item-set';
				$class[] = $product_image_effect;
				$class[] = 'effect-'.$animation_effect;
				$class[] = 'et-clearfix';

				if ($layout == "carousel") {
					$class[] = 'owl-carousel';
					$class[] = 'et-carousel';
					$class[] = 'navigation-'.$navigation_type;
				}

				if($animation_effect == "none" && $layout != 'carousel') {$class[] = "lazy lazy-load";}

				$carousel_columns = 4;

				if ($columns == 'medium') {
					$carousel_columns = 3;
				} elseif($columns == 'large') {
					$carousel_columns = 2;
				}

				$attributes = array();

				$attributes[] = 'data-columns="'.esc_attr($carousel_columns).'"';
				$attributes[] = 'data-autoplay="'.esc_attr($autoplay).'"';

				foreach ( $product_categories as $product_category ) {
					wc_get_template( 'content-product_cat.php', array(
						'category' => $product_category,
					) );
				}

				$output .= '<div class="et-woo-products product-layout '.esc_attr($columns).' '.esc_attr($layout).'">';
					$output .= '<ul class="'.esc_attr(implode(' ', $class)).'" '.implode(' ', $attributes).'>';
						$output .= ob_get_clean();
					$output .= '</ul>';
				$output .= '</div>';

	            return $output;

	            woocommerce_reset_loop();

			}

		}
	}
	add_shortcode('et_woo_categories', 'et_woo_categories');

/*  POSTS
/*------------*/

	function et_posts($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'layout' 		   => 'grid',
				'columns'          => '1',
				'image_full' 	   => 'false',
				'image_justify'    => 'false',
				'navigation_type'  => 'only-arrows',
				'autoplay'         => 'false',
				'animation_effect' => 'none',
				'quantity' 		   => '12',
				'category' 		   => '',
				'excerpt' 		   => '104',
				'operator' 		   => 'IN',
				'orderby' 		   => 'date',
				'order' 		   => 'ASC',
			), $atts)
		);

		$output = '';

		global $post, $samatex_enovathemes;

		$query_options = array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $orderby,
			'order'               => $order,
			'posts_per_page' 	  => absint($quantity), 
		);

		if (isset($category) && !empty($category)) {
			$query_options = array( 
				'post_type'           => 'post',
				'post_status' 	 	  => 'publish',
				'ignore_sticky_posts' => true,
				'orderby'             => $orderby,
				'order'               => $order,
				'posts_per_page' 	  => absint($quantity), 
				'tax_query'           => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => explode(',',$category),
						'operator' => $operator
					)
				)
			);

		}

		$posts = new WP_Query($query_options);

		if($posts->have_posts()){

			$blog_image_effect     = (isset($GLOBALS['samatex_enovathemes']['blog-image-effect']) && $GLOBALS['samatex_enovathemes']['blog-image-effect']) ? $GLOBALS['samatex_enovathemes']['blog-image-effect'] : "overlay-fade";

			$class = array();

			$class[] = 'loop-posts';
			$class[] = 'et-item-set';
			$class[] = $blog_image_effect;
			$class[] = 'effect-'.$animation_effect;
			$class[] = 'et-clearfix';

			if ($layout == "carousel") {
				$class[] = 'owl-carousel';
				$class[] = 'et-carousel';
				$class[] = 'navigation-'.$navigation_type;
			}
			

			if($animation_effect == "none" && $layout != 'carousel') {$class[] = "lazy lazy-load";}

			if ($layout == "grid" || $layout == "chess") {
				$columns = 'medium';
			}

			$attributes = array();

			$attributes[] = 'data-columns="'.esc_attr($columns).'"';
			$attributes[] = 'data-autoplay="'.esc_attr($autoplay).'"';

			

			$shortcode_class = array();
			$shortcode_class[] = 'et-shortcode-posts';
			$shortcode_class[] = 'blog-layout';
			$shortcode_class[] = 'blog-layout-'.esc_attr($layout);
			$shortcode_class[] = esc_attr($columns);
			$shortcode_class[] = esc_attr($layout);

			if ($image_full == "true" && $image_justify == "false"){
				$shortcode_class[] = 'fluid-masonry';
			}

			$output .= '<div class="'.implode(' ',$shortcode_class).'">';
				$output .= '<div class="'.esc_attr(implode(' ', $class)).'" '.implode(' ', $attributes).'>';

					$thumb_size = 'samatex_400X320';

					if ($image_full == "true") {
						$thumb_size = 'full';
					}

					if ($layout == "chess") {
						$thumb_size = 'samatex_400X400';
					}

					while ($posts->have_posts() ) {
						$posts->the_post();

						$output .= samatex_enovathemes_post($layout,$excerpt,$thumb_size,$image_full,$image_justify,$posts);
					}

					wp_reset_postdata();

				$output .= '</div>';
			$output .= '</div>';

            return $output;

		}
	}
	add_shortcode('et_posts', 'et_posts');

	function et_projects($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'container' 		           => 'boxed',
				'layout' 		               => 'grid',
				'layout_type' 	               => 'project-with-details',
				'project_image_effect'         => 'overlay-fade',
				'project_image_effect_caption' => 'caption-up',
				'project_image_effect_overlay' => 'overlay-fade',
				'project_image_full' 		   => 'false',
				'project_image_justify' 	   => 'false',
				'project_gap' 	               => 'false',
				'project_filter' 	           => 'false',
				'default_filter' 	           => 'all',
				'navigation_type'              => 'only-arrows',
				'autoplay'                     => 'false',
				'animation_effect'             => 'none',
				'quantity' 		               => '12',
				'category' 		               => '',
				'operator' 		               => 'IN',
				'orderby' 		               => 'date',
				'order' 		               => 'ASC',
				'columns' 		               => 'small',
			), $atts)
		);

		$output = '';

		global $post, $samatex_enovathemes;

		$project_post_category_filter = (isset($GLOBALS['samatex_enovathemes']['project-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['project-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['project-post-category-filter'] : array();

		$query_options = array(
			'post_type'           => 'project',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $orderby,
			'order'               => $order,
			'posts_per_page' 	  => absint($quantity), 
			'tax_query'           => array(
				array(
					'taxonomy' => 'project-category',
					'field'    => 'slug',
					'terms'    => $project_post_category_filter,
					'operator' => 'NOT IN'
				)
			)
		);

		if (isset($category) && !empty($category)) {

			$project_filter = false;

			$query_options = array( 
				'post_type'           => 'project',
				'post_status' 	 	  => 'publish',
				'ignore_sticky_posts' => true,
				'orderby'             => $orderby,
				'order'               => $order,
				'posts_per_page' 	  => absint($quantity), 
				'tax_query'           => array(
					array(
						'taxonomy' => 'project-category',
						'field'    => 'slug',
						'terms'    => explode(',',$category),
						'operator' => 'IN'
					)
				)
			);

		}

		if ($default_filter != 'all' && $project_filter == true) {
			$query_options = array( 
				'post_type'           => 'project',
				'post_status' 	 	  => 'publish',
				'ignore_sticky_posts' => true,
				'orderby'             => $orderby,
				'order'               => $order,
				'posts_per_page' 	  => absint($quantity), 
				'tax_query'           => array(
					array(
						'taxonomy' => 'project-category',
						'field'    => 'slug',
						'terms'    => $default_filter,
						'operator' => 'IN'
					),
					array(
						'taxonomy' => 'project-category',
						'field'    => 'slug',
						'terms'    => $project_post_category_filter,
						'operator' => 'NOT IN'
					)
				)
			);
		}

		if ($layout_type == "project-with-caption") {
			$project_image_effect = $project_image_effect_caption;
		}

		if ($layout_type == "project-with-overlay") {
			$project_image_effect = $project_image_effect_overlay;
		}

		$projects = new WP_Query($query_options);

		if($projects->have_posts()){

			$class = array();

			$class[] = 'loop-posts';
			$class[] = 'loop-project';
			$class[] = 'et-item-set';
			$class[] = $project_image_effect;
			$class[] = 'effect-'.$animation_effect;
			$class[] = 'et-clearfix';

			if ($layout == "carousel") {
				$class[] = 'owl-carousel';
				$class[] = 'et-carousel';
				$class[] = 'navigation-'.$navigation_type;
			}

			if($animation_effect == "none" && $layout != 'carousel') {$class[] = "lazy lazy-load";}

			$carousel_columns = 4;

			if ($columns == 'medium') {
				$carousel_columns = 3;
			} elseif($columns == 'large') {
				$carousel_columns = 2;
			}

			$attributes = array();

			$attributes[] = 'data-columns="'.esc_attr($carousel_columns).'"';
			$attributes[] = 'data-autoplay="'.esc_attr($autoplay).'"';

			$shortcode_class = array();
			$shortcode_class[] = 'et-shortcode-projects';
			$shortcode_class[] = 'project-layout';
			$shortcode_class[] = esc_attr($columns);
			$shortcode_class[] = esc_attr($layout_type);
			$shortcode_class[] = esc_attr($layout);
			$shortcode_class[] = 'gap-'.esc_attr($project_gap);
			$shortcode_class[] = 'image-full-'.esc_attr($project_image_full);
			$shortcode_class[] = 'project-container-'.esc_attr($container);

			if ($project_image_full == "true" && $project_image_justify == "false"){
				$shortcode_class[] = 'fluid-masonry';
			}

			$element_id = rand(1,1000000);

			$output .= '<div id="et-shortcode-projects-'.$element_id.'" class="'.implode(" ", $shortcode_class).'">';
				
				if ($project_filter == "true"){

					$excluded_query_options = array( 
						'post_type'           => 'project',
						'post_status' 	 	  => 'publish',
						'ignore_sticky_posts' => true,
						'posts_per_page' 	  => -1, 
						'tax_query'           => array(
							array(
								'taxonomy' => 'project-category',
								'field'    => 'term_id',
								'terms'    => $project_post_category_filter,
								'operator' => 'IN'
							)
						)
					);

					$projects_exluded_array = array();

					$projects_exluded = new WP_Query($excluded_query_options);

					if($projects_exluded->have_posts()){
						while ($projects_exluded->have_posts() ) {
							$projects_exluded->the_post();
							array_push($projects_exluded_array, get_the_ID());
						}
						wp_reset_postdata();
					}

					$options = array(
						'post_type' 	     => 'project',
						'term'      	     => 'project-category',
						'posts_per_page'     => $quantity,
						'exclude' 		     => $project_post_category_filter,
						'excluded_posts_num' => sizeof($projects_exluded_array),
						'default_filter'     => $default_filter,
						'shortcode' 	     => true,
						'order' 		     => $order,
						'orderby' 		     => $orderby,
					);

					$output .= enovathemes_addons_term_filter($options);
				}

				$output .= '<div class="'.esc_attr(implode(' ', $class)).'" '.implode(' ', $attributes).'>';

					$thumb_size = 'samatex_400X320';

					switch ($columns) {
						case 'small':
							$thumb_size = ($container == "wide") ? 'samatex_480X360' : 'samatex_400X320';
							break;
						case 'medium':
							$thumb_size = ($container == "wide") ? 'samatex_640X400' : 'samatex_400X320';
							break;
						case 'large':
							$thumb_size = ($container == "wide") ? 'samatex_960X600' : 'samatex_600X370';
							break;
					}

					if ($project_image_full == "true") {
						$thumb_size = 'full';
					}

					while ($projects->have_posts() ) {
						$projects->the_post();
						$output .= enovathemes_addons_project_post($container,$layout_type,$project_image_effect, $thumb_size,$project_image_full,$project_image_justify);
					}

					wp_reset_postdata();

				$output .= '</div>';
			$output .= '</div>';

            return $output;

		}
	}
	add_shortcode('et_projects', 'et_projects');


	function et_projects_full($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'title'      => '',
				'autoplay'   => 'false',
				'quantity'   => '12',
				'category'   => '',
				'operator'   => 'IN',
				'orderby'    => 'date',
				'order'      => 'ASC',
				'project_ids' => '',
				'grid_overlay' => 'none',
				'element_id'   => ''
			), $atts)
		);

		$output = '';

		global $post, $samatex_enovathemes;

		$project_post_category_filter = (isset($GLOBALS['samatex_enovathemes']['project-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['project-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['project-post-category-filter'] : '';

		$query_options = array(
			'post_type'           => 'project',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $orderby,
			'order'               => $order,
			'posts_per_page' 	  => absint($quantity), 
			'tax_query'           => array(
				array(
					'taxonomy' => 'project-category',
					'field'    => 'term_id',
					'terms'    => $project_post_category_filter,
					'operator' => 'NOT IN'
				)
			)
		);

		if (isset($category) && !empty($category)) {

			$project_filter = false;

			$query_options = array( 
				'post_type'           => 'project',
				'post_status' 	 	  => 'publish',
				'ignore_sticky_posts' => true,
				'orderby'             => $orderby,
				'order'               => $order,
				'posts_per_page' 	  => absint($quantity), 
				'tax_query'           => array(
					array(
						'taxonomy' => 'project-category',
						'field'    => 'slug',
						'terms'    => explode(',',$category),
						'operator' => 'IN'
					)
				)
			);

		}

		if (isset($project_ids) && !empty($project_ids)) {

			$query_options = array(
				'post_type'   => 'project',
				'post_status' => 'publish',
				'post__in'    => explode(',', $project_ids)               
			);

		}

		$projects = new WP_Query($query_options);

		if($projects->have_posts()){

			$class           = array();
			$attributes      = array();
			$shortcode_class = array();

			$class[] = 'et-item-set';
			$class[] = 'et-clearfix';
			$class[] = 'owl-carousel';
			$class[] = 'et-carousel';
			$class[] = 'navigation-arrows';

			$attributes[] = 'data-columns="1"';
			$attributes[] = 'data-autoplay="'.esc_attr($autoplay).'"';

			$shortcode_class[] = 'et-shortcode-projects-full';

			if (!isset($element_id) || empty($element_id)) {
				$element_id = rand(1,1000000);
			}

			$output .= '<div id="et-shortcode-projects-full-'.$element_id.'" class="'.implode(" ", $shortcode_class).'">';

				if (isset($title) && !empty($title)) {
					$output .= '<div class="et-projects-title"><div class="container"><span>'.esc_attr($title).'</span></div></div>';
				}

				$output .= '<div class="'.esc_attr(implode(' ', $class)).'" '.implode(' ', $attributes).'>';

					$thumb_size = 'full';

					while ($projects->have_posts() ) {
						$projects->the_post();

			            $post_id      = get_the_ID();
			            $post_image   = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full', false);
			            $element_css  = 'background-image: url('.$post_image[0].');';
				        
			            $post_class = array();
			            $post_attributes = array();

			            if ($grid_overlay == "black" || $grid_overlay == "white") {
							$post_class[] = 'grid-overlay-active';
							$post_attributes[] = 'data-grid-overlay="' . esc_attr( $grid_overlay ) . '"';
						}

				        $output .='<article class="'.join( ' ', get_post_class('et-item post '. implode(' ', $post_class))).'" '.implode(' ', $post_attributes).' id="project-'.get_the_ID().'">';
				            $output .='<div class="post-inner et-item-inner et-clearfix">';
				                
				                $output .='<div class="post-body et-clearfix">';
				                    $output .='<div class="post-body-inner-wrap">';
				                        $output .='<div class="post-body-inner">';

			                                $output .='<div class="project-category">';
			                                    $output .= get_the_term_list( get_the_ID(), 'project-category', '', ', ', '' );
			                                $output .='</div>';

				                            if ( '' != get_the_title() ){
				                                $output .='<h4 class="post-title entry-title">';
				                                    $output .= '<a href="'.get_the_permalink().'" title="'.esc_attr__("Read more about", 'enovathemes-addons').' '.get_the_title().'" rel="bookmark">';
				                                        $output .= get_the_title();
				                                    $output .= '</a>';
				                                $output .='</h4>';
				                            }

				                            if ( '' != get_the_excerpt() ){
				                                $output .='<div class="post-excerpt">';
				                                        $output .= samatex_enovathemes_excerpt(104);
				                                $output .='</div>';
				                            }

				                        $output .='</div>';
				                    $output .='</div>';
				                $output .='</div>';

				                $output .='<a href="'.get_the_permalink().'" class="overlay-read-more"></a>';

				            $output .='</div>';

				            if ($grid_overlay == "black" || $grid_overlay == "white") {
								$output .= '<div class="grid-overlay"></div>';
							}

							if (!empty($element_css)) {
								$output .= '<div class="background-image" style="'.$element_css.'"></div>';
				            }

				        $output .='</article>';

					}

					wp_reset_postdata();

				$output .= '</div>';
			$output .= '</div>';

            return $output;

		}
	}
	add_shortcode('et_projects_full', 'et_projects_full');

	function et_single_project($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'p_id'                         => '',
				'layout_type' 	               => 'project-with-details',
				'project_image_effect'         => 'overlay-fade',
				'project_image_effect_caption' => 'caption-up',
				'project_image_effect_overlay' => 'overlay-fade',
				'project_image_full' 		   => 'false',
				'parallax'                     => 'false',
				'move'                         => 'false',
				'parallax_speed'               => '10',
				'parallax_x'                   => '0',
				'parallax_y'                   => '0',
				'rp'                           => '',
				'element_id'                   => '',
			), $atts)
		);

		$output = '';

		global $post;

		if (isset($p_id) && !empty($p_id)) {
			
			$query_options = array(
				'post_type' => 'project',
				'p'         => $p_id,
			);

			if ($layout_type == "project-with-caption") {
				$project_image_effect = $project_image_effect_caption;
			}

			if ($layout_type == "project-with-overlay") {
				$project_image_effect = $project_image_effect_overlay;
			}

			$projects = new WP_Query($query_options);

			if($projects->have_posts()){

				$class = array();

				$class[] = $project_image_effect;
				$class[] = 'et-clearfix';
				
				$attributes = array();

				if (!isset($element_id) || empty($element_id)) {
					$element_id = rand(1,1000000);
				}

				$shortcode_class = array();
				$shortcode_class[] = 'et-shortcode-single-project';
				$shortcode_class[] = 'project-layout';
				$shortcode_class[] = esc_attr($layout_type);
				$shortcode_class[] = 'image-full-'.esc_attr($project_image_full);

				if (isset($parallax) && $parallax == "true") {
					$shortcode_class[] = 'etp-parallax';
				}

				$responsive_parallax = array();

				if (!empty($rp)) {
					$rp = explode(',', $rp);
					foreach ($rp as $key) {
						$responsive_parallax[] = 'disable'.$key;
					}
					
				}
				if (!empty($responsive_parallax)) {
					$shortcode_class = array_merge($shortcode_class,$responsive_parallax);
				}

				$shortcode_attributes = array();

				if (isset($parallax) && $parallax == "true") {
					$shortcode_attributes[] = 'data-parallax="'.esc_attr($parallax).'"';
					$shortcode_attributes[] = 'data-move="'.esc_attr($move).'"';
					$shortcode_attributes[] = 'data-coordinatex="'.esc_attr($parallax_x).'"';
					$shortcode_attributes[] = 'data-coordinatey="'.esc_attr($parallax_y).'"';
					$shortcode_attributes[] = 'data-speed="'.esc_attr($parallax_speed).'"';
				}

				$output .= '<div id="et-shortcode-single-project-'.$element_id.'" class="'.implode(" ", $shortcode_class).'" '.implode(" ", $shortcode_attributes).'>';
					
					$output .= '<div class="'.esc_attr(implode(' ', $class)).'" '.implode(' ', $attributes).'>';

						$thumb_size = 'full';

						while ($projects->have_posts() ) {
							$projects->the_post();
							$output .= enovathemes_addons_project_post('boxed',$layout_type,$project_image_effect, $thumb_size,true,false);
						}

						wp_reset_postdata();

					$output .= '</div>';
				$output .= '</div>';

	            return $output;

			}

		}
	}
	add_shortcode('et_single_project', 'et_single_project');

 /* the_content filter


	Content filter
/*------------*/

    add_filter("the_content", "enovathemes_addons_the_content_filter");
    function enovathemes_addons_the_content_filter($content) {
     
        $block = join("|",array("et_gap","et_gap_inline","et_icon","et_separator","et_dropcap","et_font_size"));
     
        $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
            
        $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

        return $rep;
     
    }

    function enovathemes_addons_shortcode_empty_paragraph_fix( $content ) {

        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );

        $content = strtr( $content, $array );

        return $content;
    }

    add_filter( 'the_content', 'enovathemes_addons_shortcode_empty_paragraph_fix' );

/*  Add elements to TinyMCE
/*------------*/

	add_action('admin_head', 'enovathemes_addons_add_tinymce_button');

	function enovathemes_addons_register_tinymce_plugins($buttons) {  
		array_push($buttons,
			'et_highlight',
			'et_dropcap',
			'et_font_size'
		);  
		return $buttons;  
	}

	function enovathemes_addons_add_tinymce_plugins($plugin_array) {
	   $plugin_array['et_highlight'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_dropcap'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_font_size'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   return $plugin_array;
	}

	function enovathemes_addons_add_tinymce_button() { 
		if(!current_user_can('edit_posts') && !current_user_can('edit_pages') ) {return;}
		if (get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", "enovathemes_addons_add_tinymce_plugins");
			add_filter('mce_buttons', 'enovathemes_addons_register_tinymce_plugins');
		}
	}

?>