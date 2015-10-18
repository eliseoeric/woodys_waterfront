<?php
/*
|--------------------------------------------------------------------------
| Header.php
|--------------------------------------------------------------------------
|
| Header for the theme. All meta data is here.
| #page starts here.
|
*/

?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/Webpage"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="humans.txt">

<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Start #page -->
<div id="page" class="hfeed site">
	<!-- Screen reader link -->
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'waterfront' ); ?></a>

	<!-- start #masthead -->
	<header id="masthead" class="site-header row navbar" role="banner">
		<div class="site-branding two columns logo">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri() . '/img/red-no-stroke.png'; ?>" alt="Woody's Waterfront"/>
				</a>
			</h1>
		</div>

		<nav id="site-navigation" class="six columns" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>

		<div id="quick-contact" class="quick-contact">
			<ul>
				<li class="quick-contact__item--phone"><strong><a href="tel:727-360-9164"><i class="fa fa-phone"></i>727-360-9164</a></strong></li>
				<li class="quick-contact__item"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
				<li class="quick-contact__item"><a href="#"><i class="fa fa-twitter-square"></i></a></li>
				<li class="quick-contact__item"><a href="#"><i class="fa fa-instagram"></i></a></li>
				<li class="quick-contact__item"><a href="#"><i class="fa fa-tripadvisor"></i></a></li>
			</ul>
		</div>
	</header>
	<!-- End #masthead -->

	<div id="content" class="site-content">
