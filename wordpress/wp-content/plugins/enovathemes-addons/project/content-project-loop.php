<?php
	
	samatex_enovathemes_global_variables();

	$project_container        = (isset($GLOBALS['samatex_enovathemes']['project-container']) && !empty($GLOBALS['samatex_enovathemes']['project-container'])) ? $GLOBALS['samatex_enovathemes']['project-container'] : "boxed";
	$project_post_size        = (isset($GLOBALS['samatex_enovathemes']['project-post-size']) && !empty($GLOBALS['samatex_enovathemes']['project-post-size'])) ? $GLOBALS['samatex_enovathemes']['project-post-size'] : "medium";
	$project_post_layout      = (isset($GLOBALS['samatex_enovathemes']['project-post-layout']) && !empty($GLOBALS['samatex_enovathemes']['project-post-layout'])) ? $GLOBALS['samatex_enovathemes']['project-post-layout'] : "project-with-details";
	$project_animation_effect = (isset($GLOBALS['samatex_enovathemes']['project-animation-effect']) && !empty($GLOBALS['samatex_enovathemes']['project-animation-effect'])) ? $GLOBALS['samatex_enovathemes']['project-animation-effect'] : "none";
	$project_gap              = (isset($GLOBALS['samatex_enovathemes']['project-gap']) && $GLOBALS['samatex_enovathemes']['project-gap'] == 1) ? "true" : "false";

	$class = array();
	$class[] = 'project-layout';
	$class[] = 'project-container-'.$project_container;
	$class[] = $project_post_layout;
	$class[] = 'gap-'.$project_gap;
	$class[] = $project_post_size;

	if($project_animation_effect == "none") {$class[] ="lazy lazy-load";}
?>
<div id="et-content" class="content et-clearfix padding-false">
	<div class="<?php echo implode(' ', $class); ?>">
		<div class="container et-clearfix">
			<?php include(ENOVATHEMES_ADDONS.'project/content-project-loop-code.php'); ?>
		</div>
	</div>
</div>