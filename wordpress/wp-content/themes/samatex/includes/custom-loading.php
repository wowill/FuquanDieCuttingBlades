<?php
samatex_enovathemes_global_variables();
$custom_loading         = (isset($GLOBALS['samatex_enovathemes']['custom-loading']) && $GLOBALS['samatex_enovathemes']['custom-loading'] == 1) ? "true" : "false";
$et_loading_logo        = (isset($GLOBALS['samatex_enovathemes']['loading-logo']['url']) && !empty($GLOBALS['samatex_enovathemes']['loading-logo']['url'])) ? esc_url($GLOBALS['samatex_enovathemes']['loading-logo']['url']) : "";
$et_loading_logo_w      = (isset($GLOBALS['samatex_enovathemes']['loading-logo']['url']) && !empty($GLOBALS['samatex_enovathemes']['loading-logo']['url'])) ? $GLOBALS['samatex_enovathemes']['loading-logo']['width']: "";
$et_loading_logo_h      = (isset($GLOBALS['samatex_enovathemes']['loading-logo']['url']) && !empty($GLOBALS['samatex_enovathemes']['loading-logo']['url'])) ? $GLOBALS['samatex_enovathemes']['loading-logo']['height'] : "";
if (isset($GLOBALS['samatex_enovathemes']['loading-logo-retina']['url']) && !empty($GLOBALS['samatex_enovathemes']['loading-logo-retina']['url'])) 
{$et_loading_logo = esc_url($GLOBALS['samatex_enovathemes']['loading-logo-retina']['url']);}
?>
<?php if ($custom_loading == "true"): ?>
	<div class="site-loading">
		<div class="site-loading-bar"></div>
		<div class="site-loading-content">
			<?php if (!empty($et_loading_logo)): ?>
				<div class="logo logo-loading">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
						<img style="max-width:<?php echo esc_attr($et_loading_logo_w); ?>px;max-height:<?php echo esc_attr($et_loading_logo_h); ?>px;" src="<?php echo esc_url($et_loading_logo); ?>" alt="<?php bloginfo('name'); ?>">
					</a>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php endif; ?>