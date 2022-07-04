<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<!-- META TAGS -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=8">
	<!-- LINK TAGS -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part( '/includes/custom-loading' ); ?>
<!-- general wrap start -->
<div id="gen-wrap">
	<!-- wrap start -->
	<div id="wrap">
		<?php do_action('samatex_enovathemes_header'); ?>
		<div class="page-content-wrap">