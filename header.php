<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_category() ) {
		echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo 'Error 404 Not Found | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title(''); echo ' | '; bloginfo( 'name' );
	} ?></title>
	
	<meta name="description" content="<?php wp_title(''); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<!--<meta name="viewport" content="width=device-width; initial-scale=1"/>--><?php /* Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, but keep in mind that it will disable user-zooming completely. Bad for accessibility. */ ?>
	
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	
	
	<link href='http://fonts.googleapis.com/css?family=Arvo:400,700|PT+Sans:400,700,400italic|Droid+Sans+Mono' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/reset.css" type="text/css" />
	<link rel="stylesheet/less" href="<?php bloginfo('template_url'); ?>/style.less" type="text/css" />
	<script src="<?php bloginfo('template_url'); ?>/js/less-1.3.0.min.js" type="text/javascript"></script>

	<?php //wp_enqueue_script("jquery"); /* Loads jQuery if it hasn't been loaded already */ ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>
	<script src="<?php bloginfo('template_url'); ?>/js/functions.js" type="text/javascript"></script>
	
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="none">
	<p><a href="#content"><?php _e('Skip to Content'); ?></a></p><?php /* used for accessibility, particularly for screen reader applications */ ?>
</div><!--.none-->
<div id="background_img"></div>
<div id="main"><!-- this encompasses the entire Web site -->
	<div id="social">
		<div class="container">
			<a href="http://www.facebook.com/clare.bayley" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social-fb.png" /></a>
			<a href="https://twitter.com/clarebayley" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter.png" /></a>
			<a href="http://clarebayley.com/feed/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social-rss.png" /></a>
		</div>
	</div>
	<div id="nav">
		<div class="container">
			<?php get_search_form(); ?>
			<?php wp_nav_menu( array('theme_location' => 'header-menu') ); ?>		
		</div>
	</div>
	<div id="header"><header>
	<div id="banner">
		<div id="banner-tail">&nbsp;</div>
		<div id="banner-text">
			<div id="clare"><a href="<?php echo home_url(); ?>">CLARE</a></div><div id="bayley"><a href="<?php echo home_url(); ?>">BAYLEY</a></div></div>
		<div id="banner-end">&nbsp;</div>
	</div>

	</header></div><!--#header-->
	<div class="container">