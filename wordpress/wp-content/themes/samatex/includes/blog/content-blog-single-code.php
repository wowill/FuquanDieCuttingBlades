<?php
	samatex_enovathemes_global_variables();
 	$blog_single_social         = (isset($GLOBALS['samatex_enovathemes']['blog-single-social']) && $GLOBALS['samatex_enovathemes']['blog-single-social'] == 1) ? "true" : "false";
    $blog_post_category_filder  = (isset($GLOBALS['samatex_enovathemes']['blog-post-category-filter']) && !empty($GLOBALS['samatex_enovathemes']['blog-post-category-filter'])) ? $GLOBALS['samatex_enovathemes']['blog-post-category-filter'] : array();
 	$blog_authorbox             = (isset($GLOBALS['samatex_enovathemes']['blog-authorbox']) && $GLOBALS['samatex_enovathemes']['blog-authorbox'] == 1) ? "true" : "false";
 	$blog_related_posts         = (isset($GLOBALS['samatex_enovathemes']['blog-related-posts']) && $GLOBALS['samatex_enovathemes']['blog-related-posts'] == 1) ? "true" : "false";
	$blog_related_posts_by      = (isset($GLOBALS['samatex_enovathemes']['blog-related-posts-by']) && $GLOBALS['samatex_enovathemes']['blog-related-posts-by']) ? $GLOBALS['samatex_enovathemes']['blog-related-posts-by'] : "categories";
	$blog_single_sidebar        = (isset($GLOBALS['samatex_enovathemes']['blog-single-sidebar']) && $GLOBALS['samatex_enovathemes']['blog-single-sidebar']) ? $GLOBALS['samatex_enovathemes']['blog-single-sidebar'] : "right";
	$blog_post_excerpt 	        = (isset($GLOBALS['samatex_enovathemes']['blog-post-excerpt']) && $GLOBALS['samatex_enovathemes']['blog-post-excerpt']) ? $GLOBALS['samatex_enovathemes']['blog-post-excerpt'] : 0;
	$blog_image_effect          = (isset($GLOBALS['samatex_enovathemes']['blog-image-effect']) && $GLOBALS['samatex_enovathemes']['blog-image-effect']) ? $GLOBALS['samatex_enovathemes']['blog-image-effect'] : "overlay-fade";

	if ($blog_post_excerpt > 150) {
		$blog_post_excerpt = 105;
	}

	$thumbnails_size = ($blog_single_sidebar == "none") ? 'samatex_1200X556' : 'samatex_1200X720';

?>
<div id="single-post-page" class="single-post-page social-links-<?php echo esc_attr($blog_single_social); ?>">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<?php

					$post_format   = get_post_format(get_the_ID());
			        $link_url      = get_post_meta( get_the_ID(), 'enovathemes_addons_link', true );
			        $status_author = get_post_meta( get_the_ID(), 'enovathemes_addons_status', true );
			        $quote_author  = get_post_meta( get_the_ID(), 'enovathemes_addons_quote', true );
			        $audio         = get_post_meta( get_the_ID(), 'enovathemes_addons_audio', true );
			        $audio_embed   = get_post_meta( get_the_ID(), 'enovathemes_addons_audio_embed', true );
			        $video         = get_post_meta( get_the_ID(), 'enovathemes_addons_video', true );
			        $video_embed   = get_post_meta( get_the_ID(), 'enovathemes_addons_video_embed', true );
			        $gallery       = get_post_meta( get_the_ID(), 'enovathemes_addons_gallery', true );
			        $disable_image = get_post_meta( get_the_ID(), 'enovathemes_addons_disable_image', true );

					$media_output = "";
                    $body_output  = "";

					if ($post_format == "0" || $post_format == 'chat'){
						if ($disable_image != "on") {
	                        if (has_post_thumbnail()){
	                            $media_output .='<div class="post-image overlay-hover post-media">';
	                                $media_output .='<div class="image-container">';
	                                    $media_output .= '<div class="image-preloader"></div>';
	                                    $media_output .= get_the_post_thumbnail( get_the_ID(), $thumbnails_size);
	                                $media_output .='</div>';
	                            $media_output .='</div>';
	                        }
                        }
                    } elseif($post_format == "gallery") {

                        if (!empty($gallery)) {

                            $media_output .='<div class="post-gallery post-media overlay-hover">';
                                $media_output .='<ul class="slides">';
                                    foreach ($gallery as $image => $url){
                                        $media_output .='<li>';
                                            $media_output .='<div class="image-container">';
                                                $media_output .='<div class="image-preloader"></div>';
                                                $media_output .= wp_get_attachment_image($image, $thumbnails_size,false);
                                            $media_output .='</div>';
                                        $media_output .='</li>';
                                    }
                                $media_output .='</ul>';
                            $media_output .='</div>';

                        } else {

                            if (has_post_thumbnail()){
                                $media_output .='<div class="post-image overlay-hover post-media">';
                                    $media_output .= samatex_enovathemes_post_image_overlay(get_the_ID());
                                    $media_output .='<div class="image-container">';
                                        $media_output .= '<div class="image-preloader"></div>';
                                        $media_output .= get_the_post_thumbnail( get_the_ID(), $thumbnails_size);
                                    $media_output .='</div>';
                                $media_output .='</div>';
                            }

                        }
                    } elseif($post_format == "video") {
                        if (!empty($video) || !empty($video_embed)){

		                    $video_poster = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
                        	
		                    $media_output .='<div class="post-video post-media">';
		                        if(!empty($video_embed) && empty($video)) {
		                            $media_output .='<div class="plyr__video-embed plyr-element">';
		                                $media_output .='<iframe allowfullscreen="allowfullscreen" frameBorder="0" src="'.$video_embed.'" class="iframevideo"></iframe>';
		                            $media_output .='</div>';
		                        } elseif(!empty($video)) {

		                            $media_output .='<video poster="'.$video_poster[0].'" class="plyr-element" id="video-'.get_the_ID().'" playsinline controls>';
		                                if (!empty($video)) {
		                                    $media_output .='<source src="'.$video.'" type="video/mp4">';
		                                }
		                            $media_output .='</video>';

		                        }
		                    $media_output .='</div>';
		                }
                    } elseif($post_format == "audio"){
                        $media_output .='<div class="post-audio post-media">';
		                    if(!empty($audio_embed) && empty($audio)) {
		                        $media_output .= '<iframe allowfullscreen="allowfullscreen" frameBorder="0" src="'.$audio_embed.'" class="iframeaudio"></iframe>';
		                    } elseif (!empty($audio)) {
		                        $media_output .='<audio class="plyr-element" id="audio-'.get_the_ID().'" controls>';
		                            $media_output .='<source src="'.$audio.'" type="audio/mp3">';
		                        $media_output .='</audio>';
		                    }
		                $media_output .='</div>';
                    }

                    $body_output .='<div class="post-body et-clearfix">';

                    	if (function_exists('enovathemes_addons_post_social_share') && $blog_single_social == "true"){
							$body_output .= enovathemes_addons_post_social_share('post');
						}
                    	
	                    $body_output .='<div class="post-body-inner">';

	                    	$body_output .='<div class="post-content et-clearfix">';

	                    		if ($post_format == "link") {
				                    $body_output .='<a class="post-link" href="'.esc_url($link_url).'" target="_blank" >'.the_title_attribute( 'echo=0' ).' <i class="fas fa-external-link-alt"></i></a>';
				                } else {

			                        if ( '' != get_the_content() ){

			                        	$content = apply_filters( 'the_content', get_the_content() );
			                        	$content = str_replace( ']]>', ']]&gt;', $content );

		                                $body_output .= $content; 
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
		                                $body_output .= wp_link_pages($defaults);
			                            
			                        }

			                        if (!empty($quote_author)){
			                            $body_output .= '<div class="post-quote-author">- '.esc_attr($quote_author).'</div>';
			                        }

			                        if (!empty($status_author)){
			                            $body_output .= '<div class="post-status-author">- '.esc_attr($status_author).'</div>';
			                        }

		                        }

							$body_output .='</div>';

							if (has_tag()) {
								$body_output .='<div class="post-tags-single">'.esc_html__("Tags:", 'samatex').' '.get_the_tag_list( '', ' ', '' ).'</div>';
							}

						$body_output .='</div>';

					$body_output .='</div>';

				?>

				<div class="post-inner et-clearfix">

					<?php echo samatex_enovathemes_output_html($media_output); ?>

					<div class="post-title-section">
						<div class="post-meta et-clearfix">
							<?php echo esc_html__("Posted on ", 'samatex'); ?><div class="post-date-inline"><?php echo get_the_date(); ?></div>
							<?php if ('' != get_the_category_list()): ?>
								<?php echo esc_html__("in ", 'samatex'); ?><div class="post-category"><?php echo get_the_category_list(esc_html__( ', ', 'samatex' )); ?></div>
							<?php endif ?>
						</div>
						<?php if ( '' != the_title_attribute( 'echo=0' ) ): ?>
							<h2 class="post-title entry-title">
								<?php the_title(); ?>
							</h2>
						<?php endif ?>
					</div>

					<?php echo samatex_enovathemes_output_html($body_output); ?>

				</div>

			</article>

			<?php if ($blog_authorbox == "true"): ?>
				<?php if ('' != get_the_author_meta("description")): ?>
					<div class="post-author-box">
						<?php if ('' != get_avatar(get_the_author_meta('email'), '72')): ?>
							<div class="post-author-gavatar">
								<?php echo get_avatar(get_the_author_meta('email'), '72'); ?>
							</div>
						<?php endif ?>
						<div class="post-author-info">
							<h3 class="post-author-title"><a href="<?php echo get_author_posts_url( get_the_author_meta("ID") ); ?>"><?php echo get_the_author_meta("display_name"); ?></a></h3>
							<div class="post-author-description"><?php echo get_the_author_meta("description"); ?></div>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>

			<?php if ($blog_related_posts == "true"): ?>
				<?php $categories = wp_get_post_categories(get_the_ID());?>
				<?php $tags = wp_get_post_tags(get_the_ID());?>
				<?php if ($categories || $tags): ?>

					<?php

						if ($blog_related_posts_by == "categories") {
							$terms = array_diff( $categories, $blog_post_category_filder);
							$args = array(
								'post_type'           => 'post',
								'category__in'        => $terms,
								'posts_per_page'      => 4,
								'ignore_sticky_posts' => 1,
								'orderby'             => 'date',
								'post__not_in'        => array($post->ID)
							);
						} else {
							$terms = array();
							foreach ($tags as $tag) {
								array_push($terms, $tag->term_id);
							}
							
							$args = array(
								'post_type'           => 'post',
								'tag__in'             => $terms,
								'category__not_in'    => $blog_post_category_filder,
								'posts_per_page'      => 4,
								'ignore_sticky_posts' => 1,
								'orderby'             => 'date',
								'post__not_in'        => array($post->ID)
							);
						}

					    $related_posts = new WP_Query($args);

					?>

					<?php if ($related_posts->have_posts()): ?>
						<div class="related-posts-wrapper et-clearfix">
							<h4 class="related-posts-title"><?php echo esc_html__("Related posts", 'samatex'); ?></h4>
							<div id="related-posts" data-columns="2" class="related-posts owl-carousel et-clearfix <?php echo esc_attr($blog_image_effect); ?>">
								<?php while($related_posts->have_posts()) : $related_posts->the_post(); ?>
									<?php echo samatex_enovathemes_post('grid',$blog_post_excerpt,'samatex_400X320',false,false,false); ?>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							</div>
						</div>
					<?php endif ?>
					
				<?php endif ?>
			<?php endif ?>
			<?php samatex_enovathemes_post_nav('post',get_the_ID()); ?>
			<div class="post-comments-section">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>

	<?php else : ?>
		<?php samatex_enovathemes_not_found('post'); ?>
	<?php endif; ?>
</div>