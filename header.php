<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' );?>/wp3.css">
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/wp3-colors-flat.css">
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/include/fonts/Montserrat.css">
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/include/fonts/OpenSans.css">
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/include/fonts/FontAwesome-5.12.0.css">
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/include/leaflet.css">
<link rel="icon" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon.png" sizes="32x32">
<script src="<?php bloginfo( 'template_directory' ); ?>/include/leaflet.js" type="text/javascript"></script>
<?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>
<header>
<nav class="w3-white wp3-header">
	<div class="w3-bar">
		<a class="w3-bar-item" href="/"><img src="<?php bloginfo('template_directory');?>/logo.gif" alt="logo"></a>
		<button id="nav-open" aria-label="open navigtie" onclick="nav_open()" class="w3-round-large w3-bar-item w3-right nav-right nav-button" style="display: block;"title="open navigation menu" ><i class="fa fa-bars"> </i></button>
		<button id="nav-close" aria-label="verberg navigtie" onclick="nav_close()" class="w3-bar-item w3-right w3-white nav-right nav-button" style="display: none;" title="close navigation menu"><i class="fa fa-times"> </i></button>
		<button id="nav-search" aria-label="zoek" onclick="nav_search()" class="w3-bar-item w3-right w3-white nav-right nav-button"><i class="fa fa-search"></i></button>
		<form class="w3-right nav-right" action="https://duckduckgo.com/" method="GET" id="nav-search-form" style="display:none;">
			<label for="q" style="display:none">Zoek: </label>
			<input id="q" type="text" name="q" class="w3-bar-item w3-input w3-right w3-white">
			<input type="hidden" name="sites" value="groeneregentes.nl">
			<input type="hidden" name="kl" value="nl-nl">
			<input type="hidden" name="kh" value="1">
			<input type="hidden" name="kn" value="1">
			<input type="hidden" name="kj" value="g">
			<input type="submit" aria-label="zoek" style="display:none">
		</form>
	</div>
	<nav id="nav" class="w3-bar-block w3-white" style="display: none;">
	<?php wp_nav_menu( array(
			'theme_location' => 'header-menu',
			'menu_class' => 'wp3-menu w3-bar w3-white')
	);?>
	</nav>
</nav>
</header>
<div class="wp3-body w3-content w3-container">
