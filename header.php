<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width" />
		<meta name="description" content="" />
		<meta property="og:url" content="<?php echo site_url(); ?>/" />
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
		<meta property="og:title" content="<?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>" />
		<meta property="og:description" content="" />
		<title><?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class('bg-silver'); ?>>
		<header id="header" class="fixed top-0 left-0 bottom-0 pv4 ph3 w5 br bw2 white b--blood">
			<h1 class="mv0">
				<a href="/" class="blood">
					<img src="<?php echo content_url() . '/uploads/2017/09/logo-300x68.png'; ?>" alt="<?php bloginfo('name') ?>" title="<?php bloginfo('name') ?>" />
				</a>
			</h1>
			<h5 class="mt0 mb4 i tc"><?php bloginfo('description') ?></h5>
			<?php wp_nav_menu(array(
				'theme_location' => 'main_menu',
				'menu_class'     => 'mv0 pl0 list tc ttu b f4',
				'container'      => 'ul',
			)); ?>
			<?php wp_nav_menu(array(
				'theme_location' => 'social_links',
				'menu_class'     => 'mv0 pl0 list tc absolute f1 bottom-0 left-0 w-100 black',
				'container'      => 'ul',
			)); ?>
		</header>
		<main class="fl ml7 pa4">
