<?php 
	samatex_enovathemes_global_variables();
	$project_related_projects  = (isset($GLOBALS['samatex_enovathemes']['project-related-projects']) && $GLOBALS['samatex_enovathemes']['project-related-projects'] == 1) ? "true" : "false";
?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php

			$project_layout = get_post_meta( get_the_ID(), 'enovathemes_addons_project_layout', true );
			$project_format = get_post_meta( get_the_ID(), 'enovathemes_addons_project_format', true );

	        $audio             = get_post_meta( get_the_ID(), 'enovathemes_addons_audio', true );
	        $audio_embed       = get_post_meta( get_the_ID(), 'enovathemes_addons_audio_embed', true );
	        $video             = get_post_meta( get_the_ID(), 'enovathemes_addons_video', true );
	        $video_embed       = get_post_meta( get_the_ID(), 'enovathemes_addons_video_embed', true );
	        
	        $gallery_type      = get_post_meta( get_the_ID(), 'enovathemes_addons_gallery_type', true );
			$gallery_container = get_post_meta( get_the_ID(), 'enovathemes_addons_gallery_container', true );
	        $gallery_columns   = get_post_meta( get_the_ID(), 'enovathemes_addons_gallery_columns', true );
	        $gallery_gap       = get_post_meta( get_the_ID(), 'enovathemes_addons_gallery_gap', true );
	        $gallery           = get_post_meta( get_the_ID(), 'enovathemes_addons_gallery', true );

	        $project_meta      = get_post_meta( get_the_ID(), 'enovathemes_addons_project_meta', true );


			$class   = array();
			$class[] = 'project-layout-single';
			$class[] = 'project-layout-'.$project_layout;
			$class[] = 'related-'.$project_related_projects;

			$project_media_class = "container";

			if ($project_format == "gallery" && $gallery_type != "carousel_thumb" && $gallery_container == "wide") {
				$project_media_class = "container-full";
			}

			$thumb_size = 'samatex_400X320';

			if ($gallery_type == "masonry") {
				$thumb_size = 'full';
			} elseif ($gallery_type == "grid" || $gallery_type == "carousel") {
				switch ($gallery_columns) {
					case '1':
						$thumb_size  = ($project_layout == "sidebar") ? 'samatex_900X556' : 'samatex_1200X556';
						break;
					case '2':
						$thumb_size  = ($project_layout == "sidebar") ? 'samatex_600X370' : (($gallery_container == "wide") ? 'samatex_960X600' : 'samatex_600X370');
						break;
					case '3':
						$thumb_size  = ($project_layout == "sidebar") ? 'samatex_400X320' : (($gallery_container == "wide") ? 'samatex_640X400' : 'samatex_400X320');
						break;
					case '4':
						$thumb_size  = ($project_layout == "sidebar") ? 'samatex_300X250' : (($gallery_container == "wide") ? 'samatex_480X360' : 'samatex_300X250');
						break;
				}
			} elseif ($gallery_type == "carousel_thumb") {
				$thumb_size  = ($project_layout == "sidebar") ? 'samatex_900X556' : 'samatex_1200X556';
			}


		?>

		<div id="et-content" class="content et-clearfix padding-false">
			<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
				<div id="single-project-page" class="single-project-page">

					<article <?php post_class() ?> id="project-<?php the_ID(); ?>">

						<div class="post-inner et-clearfix">

							<?php if ($project_layout == "sidebar" || $project_layout == "wide"): ?>

								<?php if ($project_layout == "sidebar"): ?>
									<div class="container et-clearfix">
										<div class="project-media">
											<?php echo enovathemes_addons_single_project_media($project_format, $gallery_type, $gallery_columns, $gallery_gap, $gallery, $audio, $audio_embed, $video, $video_embed,$thumb_size); ?>
										</div>
										<div class="project-details">
											<?php echo enovathemes_addons_single_project_details($project_meta); ?>
										</div>
									</div>
								<?php elseif($project_layout == "wide"): ?> 
									<div class="project-media">
										<div class="<?php echo esc_attr($project_media_class); ?>">
											<?php echo enovathemes_addons_single_project_media($project_format, $gallery_type, $gallery_columns, $gallery_gap, $gallery, $audio, $audio_embed, $video, $video_embed,$thumb_size); ?>
										</div>
									</div>
									<div class="project-details">
										<div class="container et-clearfix">
											<?php echo enovathemes_addons_single_project_details($project_meta); ?>
										</div>
									</div>
								<?php endif ?>
									
							<?php else: ?>
								<?php the_content(); ?>
							<?php endif ?>
						</div>

					</article>

					<?php echo enovathemes_addons_related_projects(); ?>

					<div class="project-title-section et-clearfix">
						<div class="container">
							<div class="project-single-navigation">
								<?php
					                $prev_post = get_adjacent_post(false,'', true);
					                $next_post = get_adjacent_post(false,'', false);
								?>
				              	<?php if(!empty($prev_post)) {echo '<a class="project-prev" rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' .esc_html__('Previous project', 'enovathemes-addons') .'"></a>'; } ?>
				              	<?php echo '<a class="projects-all fas fa-th" href="' . get_post_type_archive_link( 'project' ) . '"></a>'; ?>
				              	<?php if(!empty($next_post)) {echo '<a class="project-next" rel="next" href="' . get_permalink($next_post->ID) . '" title="' .esc_html__('Next project', 'enovathemes-addons') .'"></a>'; } ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	<?php endwhile; ?>
<?php endif; ?>
