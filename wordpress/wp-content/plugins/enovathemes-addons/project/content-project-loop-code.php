<?php
	
	samatex_enovathemes_global_variables();
	
	$project_post_layout  	      = (isset($GLOBALS['samatex_enovathemes']['project-post-layout']) && !empty($GLOBALS['samatex_enovathemes']['project-post-layout'])) ? $GLOBALS['samatex_enovathemes']['project-post-layout'] : "project-with-details";
    $project_container   	      = (isset($GLOBALS['samatex_enovathemes']['project-container']) && !empty($GLOBALS['samatex_enovathemes']['project-container'])) ? $GLOBALS['samatex_enovathemes']['project-container'] : "boxed";
    $project_post_size   	      = (isset($GLOBALS['samatex_enovathemes']['project-post-size']) && !empty($GLOBALS['samatex_enovathemes']['project-post-size'])) ? $GLOBALS['samatex_enovathemes']['project-post-size'] : "medium";
	$project_animation_effect     = (isset($GLOBALS['samatex_enovathemes']['project-animation-effect']) && !empty($GLOBALS['samatex_enovathemes']['project-animation-effect'])) ? $GLOBALS['samatex_enovathemes']['project-animation-effect'] : "none";
	$project_navigation           = (isset($GLOBALS['samatex_enovathemes']['project-navigation']) && !empty($GLOBALS['samatex_enovathemes']['project-navigation'])) ? $GLOBALS['samatex_enovathemes']['project-navigation'] : "pagination";
	$project_image_full           = (isset($GLOBALS['samatex_enovathemes']['project-image-full']) && $GLOBALS['samatex_enovathemes']['project-image-full'] == 1) ? "true" : "false";
	$project_image_justify        = (isset($GLOBALS['samatex_enovathemes']['project-image-justify']) && $GLOBALS['samatex_enovathemes']['project-image-justify'] == 1) ? "true" : "false";
	$project_image_effect         = (isset($GLOBALS['samatex_enovathemes']['project-image-effect']) && !empty($GLOBALS['samatex_enovathemes']['project-image-effect'])) ? $GLOBALS['samatex_enovathemes']['project-image-effect'] : "overlay-fade";
	$project_image_effect_caption = (isset($GLOBALS['samatex_enovathemes']['project-image-effect-caption']) && !empty($GLOBALS['samatex_enovathemes']['project-image-effect-caption'])) ? $GLOBALS['samatex_enovathemes']['project-image-effect-caption'] : "caption-up";
	$project_image_effect_overlay = (isset($GLOBALS['samatex_enovathemes']['project-image-effect-overlay']) && !empty($GLOBALS['samatex_enovathemes']['project-image-effect-overlay'])) ? $GLOBALS['samatex_enovathemes']['project-image-effect-overlay'] : "overlay-fade";
	$project_ajax_filter          = (isset($GLOBALS['samatex_enovathemes']['project-filter']) && $GLOBALS['samatex_enovathemes']['project-filter'] == 1) ? "true" : "false";
	$projects_per_page            = (isset($GLOBALS['samatex_enovathemes']['project-per-page']) && !empty($GLOBALS['samatex_enovathemes']['project-per-page'])) ? $GLOBALS['samatex_enovathemes']['project-per-page'] : get_option( 'posts_per_page' );
	$project_post_category_filter = (isset($GLOBALS['samatex_enovathemes']['project-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['project-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['project-post-category-filter'] : array();
	
	if ($project_post_layout == "project-with-caption") {
		$project_image_effect = $project_image_effect_caption;
	}

	if ($project_post_layout == "project-with-overlay") {
		$project_image_effect = $project_image_effect_overlay;
	}

    $class = array();

	$class[] = 'loop-posts';
	$class[] = 'loop-project';
	$class[] = 'et-item-set';
	$class[] = $project_image_effect;
	$class[] = 'effect-'.$project_animation_effect;
	$class[] = 'nav-'.$project_navigation;
	$class[] = 'et-clearfix';

	if ($project_image_full == "true"){
		$class[] = 'image-full-true';
	}

	if ($project_image_full == "true" && $project_image_justify == "false"){
		$class[] = 'fluid-masonry';
	}

?>
<?php if (have_posts()) : ?>
	<?php if ($project_ajax_filter == "true"){

		$query_options = array( 
			'post_type'           => 'project',
			'post_status' 	 	  => 'publish',
			'ignore_sticky_posts' => true,
			'posts_per_page' 	  => -1, 
			'tax_query'           => array(
				array(
					'taxonomy' => 'project-category',
					'field'    => 'slug',
					'terms'    => $project_post_category_filter,
					'operator' => 'IN'
				)
			)
		);

		$projects_exluded_array = array();

		$projects_exluded = new WP_Query($query_options);

		if($projects_exluded->have_posts()){
			while ($projects_exluded->have_posts() ) {
				$projects_exluded->the_post();
				array_push($projects_exluded_array, get_the_ID());
			}
			wp_reset_postdata();
		}

		$options = array(
			'post_type' 	 => 'project',
			'term'      	 => 'project-category',
			'posts_per_page' => $projects_per_page,
			'exclude' 		 => $project_post_category_filter,
			'excluded_posts_num' => sizeof($projects_exluded_array),
			'default_filter' => 'all',
			'shortcode' 	 => false,
			'order' 		 => '',
			'orderby' 		 => '',
		);
		
		echo enovathemes_addons_term_filter($options);

	}?>
	<main id="loop-projects" class="<?php echo esc_attr(implode(' ', $class)); ?>" data-navigation="<?php echo esc_attr($project_navigation); ?>" data-exclude="<?php echo implode(',', $projects_exluded_array); ?>">
		
		<div class="grid-sizer"></div>

		<?php

			$thumb_size = 'samatex_400X320';

			switch ($project_post_size) {
				case 'small':
					$thumb_size = ($project_container == "wide") ? 'samatex_480X360' : 'samatex_400X320';
					break;
				case 'medium':
					$thumb_size = ($project_container == "wide") ? 'samatex_640X400' : 'samatex_400X320';
					break;
				case 'large':
					$thumb_size = ($project_container == "wide") ? 'samatex_960X600' : 'samatex_600X370';
					break;
			}

			if ($project_image_full == "true") {
				$thumb_size = 'full';
			}

		?>

		<?php while (have_posts()) : the_post(); ?>

			<?php echo enovathemes_addons_project_post($project_container,$project_post_layout,$project_image_effect, $thumb_size,$project_image_full,$project_image_justify); ?>

		<?php endwhile; ?>
	</main>

	<?php echo enovathemes_addons_ajax_nav($project_navigation,'project'); ?>

<?php else : ?>
	<?php samatex_enovathemes_not_found('project'); ?>
<?php endif; ?>